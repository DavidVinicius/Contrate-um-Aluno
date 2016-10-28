"use stricts"

var a = "aa"
var app = angular.module("myapp",[]);

app.controller("Empresa",["$scope",function($scope){
$scope.telefones = [];
$scope.tipo      = "";
$scope.Telefone  = "";
$scope.adicionarTelefone = function(){
  $scope.telefones.push({tipo:$scope.tipo, telefone:$scope.Telefone});
}
$("[name=radio]").click(function(){
    $scope.tipo = $(this).val();
}),

$(".cancelaEvento").click(function(e){
  e.preventDefault();

});
 $('select').material_select();
 $('.chips').material_chip({
   placeholder: "Honestidade ...",
   secondaryPlaceholder: "Honestidade ..."
 });
 $(".chips").click(function(){
   Materialize.toast("Digite os valores e aperte enter para adicionar",4000);
 });

 $('input, textarea').characterCounter();
}]);
