var app = angular.module("myapp",[]);

app.controller("Candidato",["$scope", function($scope){




  $(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
   $('.chips').material_chip();
   $('select').material_select();
   $('.chips').click(function(event) {
      Materialize.toast("Digite e aperte enter para adicionar benefícios",4000);
   });
   $('.chips-placeholder').material_chip({
     placeholder: 'Enter a tag',
     secondaryPlaceholder: 'Digite ',
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
              alert(data);
              Materialize.toast("Entrevista marcada com sucesso, clique para continuar",4000);
              $(".modal").hide(1000);

          }
      });
    });
});


}]);
