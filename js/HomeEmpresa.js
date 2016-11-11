$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $("#recusar").click(function(event) {
      /* Act on the event */
      var candidato = $(this).data("target");
      // alert(candidato);
      Materialize.toast("Para cancelar é preciso enviar uma justificativa ao Aluno",4000);

       $("#confirmar").click(function(){
          $('.modal-abrir').leanModal();

       });

    });

    var $toastContent = $("<span> Você tem certeza? <a href=#"+candidato+" class='modal-abrir' data-target="+ candidato +"><button id='confirmar' class='btn red waves-effect waves-light'>confirmar</button></a></span>");

     var confirmar = Materialize.toast($toastContent, 5000, '', function(){

     });
});
