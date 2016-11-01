"use strict";


var app = angular.module("myapp",[]);

app.controller("Empresa",["$scope",function($scope){
$scope.telefones = [];
$scope.tipo      = "";
$scope.Tel  = "";

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
    $scope.tipo = unchecked;

  }
};

// $scope.adicionarTelefone = function(){
//       alert("aaaa");
// };
$(".cancelaEvento").click(function(e){
  e.preventDefault();

});


 $scope.Valores   = [];
 $('.chips').on('chip.add', function(e, chip){
       // you have the added chip here
    //  alert(chip);
    if($scope.Valores.push(chip))
    {
       console.log(chip);
      Materialize.toast("Adicionado com sucesso",4000);

    }


});
$('.chips').on('chip.delete', function(e, chip){


     if($scope.Valores.splice(chip,1))
     {
       Materialize.toast("Excluido com sucesso",4000);
     }
    //  console.log($scope.qualificacoes);
//                  alert(a);
});
 $(".chips").click(function(){
   Materialize.toast("Digite os valores e aperte enter para adicionar",4000);
 });
 $('.chips').material_chip({
   placeholder: "Honestidade ...",
   secondaryPlaceholder: "Honestidade ..."
 });

 $('select').material_select();
 $('input, textarea').characterCounter();
}]);
