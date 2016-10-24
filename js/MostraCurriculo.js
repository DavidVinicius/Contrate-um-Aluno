var app = angular.module('myapp',[]);

app.controller("MostraCurriculo",["$scope",function($scope){
    $scope.formacao = [];
    $scope.anoC   = "";
    $scope.curso  = "";
    $scope.escola = "";
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
                                existeDados:"sim",
                                anoConclusao:$scope.anoC, 
                                instituicao:$scope.escola, 
                                curso:$scope.curso
                            },
                            success:function(data){
                                alert(data);
                                Materialize.toast('Adicionado com Sucesso', 4000);    
                                
                            }
                        });
                        $scope.anoC = "";
                        $scope.curso = "";
                        $scope.escola = "";
                    }
            }
    
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
    
    $(".tooltipped").tooltip();
        $(".tooltipped").click(function(){
                Materialize.toast('Clique fora do campo para salvar',4000);
            $(this).focusout(function(){
                var valor      = $(this).val() || $(this).text();
                var tabela     = $(this).data("tabela");
                var campo      = $(this).data("campo"); 
                var idAluno    = $(this).data("idaluno");
                var idTelefone = $(this).data("idtelefone") || null;
                var idFormacao = $(this).data("idformacao") || null;
                
                $.ajax({
                    url:"Controller/AlterarDados.php",
                    method: "POST",
                    data:{existeCurriculo:"sim", valor: valor, tabela: tabela, campo: campo, idAluno: idAluno, idTelefone:idTelefone, idFormacao: idFormacao},
                    success:function(data){
//                        alert(data);
                        Materialize.toast("Alterado com sucesso",4000);
                    }
                });
            });
        });
}]);