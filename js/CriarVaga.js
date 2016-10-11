var app = angular.module("myapp",[]);

app.controller("CriarVaga",["$scope",function($scope){
    $scope.vaga = [];
    $scope.beneficios = $(".chips").material_chip("data");
    $scope.adicionarVaga = function(){
        $scope.vaga.push({titulo:$scope.titulo, carga: $scope.cargaHoraria, Salario: $scope.salario, requisitos:$scope.requisitos, descricao:$scope.descricao});
    };
   $scope.teste = "teste"; 
    
    $('.chips').material_chip();
    $('.chips-placeholder').material_chip({
    placeholder: 'Auxílio Transporte',
    secondaryPlaceholder: 'Beneficios',
  });
}]);