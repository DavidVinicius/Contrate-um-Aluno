var app = angular.module('myapp',[]);
app.controller("MostraEmpresa",['$scope',function($scope){
  $scope.telefones    = [];
  $scope.valores      = [];
  $scope.tipo         = "";
  $scope.Tel          = '';

  $("[name=radio]").click(function(){
    $scope.tipo = $(this).val();
  });
  $scope.adicionarTelefone = function(){
    if($scope.tipo == "" || $scope.tipo == null)
    {
      Materialize.toast("O campo tipo não está selecionado",4000);
    }
    else if($scope.Tel == "" || $scope.Tel == null)
    {
      Materialize.toast("O campo telefone está vazio",4000);
    }
    else
    {
      $scope.telefones.push({tipo:$scope.tipo, telefone:$scope.Tel});
      $.ajax({
        url: "Controller/InserirDadosEmpresa.php",
        method: "POST",
        data:{existeEmpresa:"sim",tabela:"telefones",tipo:$scope.tipo, telefone:$scope.Tel},
        success: function(data){
          // alert(data);
          Materialize.toast("Adicionado com sucesso",4000);

        }
      });
      $scope.Tel = "";
      $scope.tipo = "";

    }
  };

  $("#novoTelefone").hide();
  $("#novoValor").hide();

  $("#adicionarNovoTelefone").click(function(){
    $("#novoTelefone").show(1000);
    $(this).hide();
  });

  $("#esconderTelefone").click(function(){
    $("#novoTelefone").hide(1000);
    $("#adicionarNovoTelefone").show(1000);
  });

  $("#adicionarNovoValor").click(function(){
    $("#novoValor").show(1000);
    $(this).hide(1000);
  });

  $("#esconderValor").click(function(){
    $("#novoValor").hide(1000);
    $("#adicionarNovoValor").show(1000);
  });

  $(".tooltipped").click(function(){
      Materialize.toast("Clique fora do campo para salvar",4000);
    $(this).focusout(function(event) {
      var tabela        = $(this).data("tabela");
      var campo         = $(this).data("campo");
      var valor         = $(this).val() || $(this).text();
      var idEmpresa     = $(this).data("idempresa")  || null;
      var idUsuario     = $(this).data("idusuario")  || null;
      var idTelefone    = $(this).data("idtelefone") || null;
      var idValor       = $(this).data("idvalores")  || null;
      $.ajax({
        url:"Controller/AlterarEmpresa.php",
        method:"POST",
        data:{
          existeEmpresa:"sim",
          tabela: tabela,
          campo:campo,
          valor: valor,
          idEmpresa: idEmpresa,
          idUsuario: idUsuario,
          idTelefone: idTelefone,
          idValor   : idValor
        },
        success:function(data){
          Materialize.toast("Alterado com sucesso",4000);
          console.log(data);
        }
      });
    });
  });

  $("#valor").click(function(){
    Materialize.toast("Digite e aperte enter para adicionar",4000);
    $(this).keyup(function(event) {
      /* Act on the event */
      if(event.which == 13){
          var valorAtual   = $(this).val();
          var idEmpresa    = $("[name=idEmpresa]").val();
          if ($scope.valores.push({valor:valorAtual})) {
            // alert(valorAtual + " " + idEmpresa);
              $.ajax({
                url: "Controller/InserirDadosEmpresa.php",
                method: "POST",
                data:{
                  existeEmpresa:"sim",
                  tabela: "valores",
                  idEmpresa: idEmpresa,
                  valor: valorAtual
                },
                success: function(data){
                  Materialize.toast("Adicionado com sucesso", 4000);
                  // alert(data);
                }
              });
              $(this).val(" ");

          }
      }
    });
  });

  $("#salvarFoto").hide();
  $("#foto").click(function(){
    $("#salvarFoto").show(1000);
  });
  $("#enviarFoto").submit(function(e){
      var dados = new FormData(this);
      e.preventDefault();
       $.ajax({
           cache: false,
           processData:false,
          contentType: false,
          mimeType:"multipart/form-data",
          data: dados,
          type: 'POST',
          url: 'Controller/AlterarEmpresa.php',
          success: function(data)
          {
              Materialize.toast("Alterado com sucesso",4000);
              $("#salvarFoto").hide(1000);
          }
      });
    });

    $(".excluir").click(function(){
      var idTelefone   = $(this).data("idtelefone");
      var idValor      = $(this).data("idvalor");
      var tabela       = $(this).data("tabela");
      var ApagarDivPai = $(this).parent();
      // alert(idValor);
      $.ajax({
        url: "Controller/ExcluirDadosEmpresa.php",
        method: "POST",
        data:{existeEmpresa:"sim", tabela:tabela, idTelefone:idTelefone, idValor:idValor },
        success: function(data){
            // alert(data);
            $(ApagarDivPai).remove();
            Materialize.toast("Removido com sucesso",4000);
        }
      });
    });



}]);
