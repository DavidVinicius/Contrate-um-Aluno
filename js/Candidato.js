var app = angular.module("myapp",[]);

app.controller("Candidato",["$scope", function($scope){
  $scope.beneficios = [];




  $(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
   $('.chips').material_chip();
   $('select').material_select();
   $('.chips').click(function(event) {
      Materialize.toast("Digite e aperte enter para adicionar benefícios",4000);
   });
   $(".chips").focusin(function(){
     Materialize.toast("Digite e aperte enter para adicionar benefícios",4000);
   });
   $('.chips-placeholder').material_chip({
     placeholder: 'Enter a tag',
     secondaryPlaceholder: 'Digite ',
  });
  $('.chips').on('chip.add', function(e, chip){
        // you have the added chip here
     //  alert(chip);
     if($scope.beneficios.push(chip))
     {
       console.log(chip);
       Materialize.toast("Adicionado com sucesso",4000);

     }


 });
 $('.chips').on('chip.delete', function(e, chip){


      if($scope.beneficios.splice(chip,1))
      {
        Materialize.toast("Excluido com sucesso",4000);
      }
     //  console.log($scope.qualificacoes);
 //                  alert(a);
 });

  $("#marcarEntrevista").submit(function(e){
      var dados = new FormData(this);
      e.preventDefault();
       $.ajax({
           cache: false,
           processData:false,
          contentType: false,
          mimeType:"multipart/form-data",
          data: dados,
          type: 'POST',
          url: 'Controller/MarcarEntrevista.php',
          success: function(data)
          {
              // alert(data);
              Materialize.toast("Entrevista marcada com sucesso, clique para continuar",4000);
              $(".modal").hide(1000);
          }
      });
    });
});


}]);
