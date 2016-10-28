var app = angular.module("myapp",[]);

app.controller("Empresa",["$scope",function($scope){
$scope.telefones = [];
$scope.tipo      = "";
$scope.telefone  = "";
$("[name=radio]").click(function(){
    $scope.tipo = $(this).val();
});
$scope.adicionarTelefone = function(event){
  event.preventDefault();
  $scope.telefones.push({tipo:$scope.tipo, telefone:$scope.telefone});
}

 $('select').material_select();
 $('.chips').material_chip({
   secondaryPlaceholder: "Honestidade ...",
   placeholder: "Honestidade ..."
 });
 $(".chips").click(function(){
   Materialize.toast("Digite os valores e aperte enter para adicionar",4000);
 });

 $('input, textarea').characterCounter();
}]);
