var app = angular.module('myapp',[]);

app.controller("MostraCurriculo",["$scope",function($scope){
    $scope.formacao         = [];
    $scope.experiencias     = [];
    $scope.telefones        = [];
    $scope.anoC             = "";
    $scope.curso            = "";
    $scope.escola           = "";
    $scope.resultado        = "";
    $scope.deExp            = "";
    $scope.ateExp           = "";
    $scope.atualExp         = false;
    $scope.nomeExperiencia  = "";
    $scope.textoExperiencia = "";
    $scope.telefone         = "";
    $scope.tipo             = "";

    $scope.adicionarFormacao = function(){
                    if($scope.anoC == "")
                    {
                        Materialize.toast("O campo Ano de conclusão está vazio", 4000);

                    }else if($scope.anoC.length < 4){
                        Materialize.toast("O campo ano de conclusão deve ter no mínimo 4 dígitos",4000);

                    }else if($scope.curso == ""){
                        Materialize.toast("O campo curso está vazio",4000);
                    }else if($scope.escola == ""){
                        Materialize.toast("O campo instituição está vazio");
                    }else{
                        $scope.formacao.push({ano:$scope.anoC,curso:$scope.curso,instituicao:$scope.escola});

                        $.ajax({
                            url:"Controller/InserirDados.php",
                            method:"POST",
                            data:{
                                tabela:"formacoes",
                                anoConclusao:$scope.anoC,
                                instituicao:$scope.escola,
                                curso:$scope.curso,
                                idAluno:$("[name=idAluno]").val(),
                            },

                            success:function(data){
                                Materialize.toast('Adicionado com Sucesso', 4000);
                                $.ajax({
                                    url:"Controller/ConsultaDados.php",
                                    method: "POST",
                                    data:{excluirAngularFormacao:"sim", idAluno: $("[name=idAluno]").val()},
                                    success:function(data){

                                        $scope.resultado = data;
                                    }
                                });
                            }
                        });
                        $scope.anoC = "";
                        $scope.curso = "";
                        $scope.escola = "";
                    }
            }

    $scope.excluirAngular = function(){
        alert($scope.resultado);

    }

    $scope.adicionarNovaExperiencia = function(){
            if($scope.atualExp == true)
            {
                var ate = "Emprego atual";
                $scope.ateExp = "data";

            }
            else{
                var ate = $('[name=ateExp]').val();
                $scope.ateExp = "data";
            }

            if($scope.deExp == "" || $scope.deExp == null){
                Materialize.toast("Campo data de início está vazio",4000);
            }else if($scope.ateExp == "" || $scope.ateExp == null){
                Materialize.toast("O campo data de saída está vazio", 4000);
            }else if($scope.nomeExperiencia == "" || $scope.nomeExperiencia == null){
                Materialize.toast("O campo cargo está vazio", 4000);
            }else if($scope.textoExperiencia == "" || $scope.textoExperiencia == null)
            {
                Materialize.toast("O campo descrição está vazio",4000);
            }else{
                $.ajax({
                    url: "Controller/InserirDados.php",
                    method: "POST",
                    data:{
                        tabela:"experiencias",
                        idAluno:$("[name=idAluno]").val(),
                        dataInicio:$('[name=deExp]').val(),
                        dataSaida:ate,
                        cargo:$scope.nomeExperiencia,
                        descricao:$scope.textoExperiencia
                    },
                    success: function(data){
                        alert(data);
                    }
                });

                        $scope.experiencias.push({de:$('[name=deExp]').val(), ate:ate, cargo:$scope.nomeExperiencia, descricao:$scope.textoExperiencia});

                $scope.deExp = "";
                $scope.ateExp = "";
                $scope.nomeExperiencia = "";
                $scope.textoExperiencia = "";

            }

    }

    $("[name=radio]").click(function(){
      $scope.tipo = $(this).val();
    });
    $scope.adicionarNovoTelefone = function(){
      if ($scope.tipo == "" || $scope.tipo == null) {
          Materialize.toast("O campo tipo de telefone está vazio",4000);
      }
      else if($scope.telefone == "" || $scope.telefone == null)
      {
          Materialize.toast("O campo telefone está vazio",4000);
      }
      else if($scope.telefone == isNaN)
      {
          Materialize.toast("O campo telefone deve conter apenas números", 4000);
      }
      $scope.telefones.push({tipo:$scope.tipo, telefone: $scope.telefone});
    }

    $("#novaExperiencia").hide();
    $("#novoTelefone").hide();

    $("#adicionarExperiencia").click(function(){
        $(this).hide();
        $("#esconderNovaExperiencia").show();
        $("#novaExperiencia").show(1000);
    });

    $("#esconderNovaExperiencia").click(function(){
        $(this).hide();
        $("#adicionarExperiencia").show(1000);
        $('#novaExperiencia').hide(1000);
    })

    $("#adicionarTelefone").click(function(){
      $("#novoTelefone").show(1000);
      $(this).hide(1000);
    });
    $("#esconderTelefone").click(function(){
        $("#novoTelefone").hide();
        $("#adicionarTelefone").show(1000);
    });
     $('.chip').on('click', function(e, chip){
        // you have the deleted chip here
         alert('deletado');
         console.log("alert");
    });

    $("#novaFormacao").hide();

    $("#adicionarNovaFormacao").click(function(){
        $(this).hide(1000);
        $('#novaFormacao').show(1000);
        $('#esconderNovaFormacao').show();
    });
    $("#esconderNovaFormacao").click(function(){
        $(this).hide(1000);
        $('#novaFormacao').hide(1000);
        $("#adicionarNovaFormacao").show(1000);
    });

    $(".excluir").click(function(){
        var tabela     = $(this).data('tabela');
        var idLinha    = $(this).data('idlinha');
        var apagarDiv  = $(this).parent().parent();
        $.ajax({
            url:"Controller/ExcluirDados.php",
            method: "POST",
            data:{ tabela:tabela, idLinha:idLinha },
            success:function(data){
                    $(apagarDiv).remove();
                    Materialize.toast("Excluido com sucesso", 4000);


            }
        })

    });

    $(".tooltipped").tooltip();
        $(".tooltipped").click(function(){
                Materialize.toast('Clique fora do campo para salvar',4000);
            $(this).focusout(function(){
                var valor         = $(this).val() || $(this).text();
                var tabela        = $(this).data("tabela");
                var campo         = $(this).data("campo");
                var idAluno       = $(this).data("idaluno");
                var idTelefone    = $(this).data("idtelefone") || null;
                var idFormacao    = $(this).data("idformacao") || null;
                var idExperiencia = $(this).data("idexperiencia") || null;
                alert(valor);
                $.ajax({
                    url:"Controller/AlterarDados.php",
                    method: "POST",
                    data:{existeCurriculo:"sim", valor: valor, tabela: tabela, campo: campo, idAluno: idAluno, idTelefone:idTelefone, idFormacao: idFormacao, idExperiencia:idExperiencia},
                    success:function(data){
//                        alert(data);
                        Materialize.toast("Alterado com sucesso",4000);
                    }
                });
            });
        });
}]);
