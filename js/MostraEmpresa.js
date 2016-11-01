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
      Materialize.toast("Adicionado com sucesso",4000);
      $scope.telefones.push({tipo:$scope.tipo, telefone:$scope.Tel});
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
    var tabela        = $(this).data("tabela");
    var campo         = $(this).data("campo");
    var idEmpresa     = $(this).data("idempresa");
    alert(tabela + " " + campo + " " + idEmpresa);
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
              Materialize.toast("Adicionado com sucesso", 4000);
              $(this).val(" ");

          }
      }
    });
  });

}]);
