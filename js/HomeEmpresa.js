$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('input, textarea').characterCounter();
      $('ul.tabs').tabs();
    $("#recusar").click(function(event) {
      /* Act on the event */
      // alert(candidato);
      Materialize.toast("Para cancelar é preciso enviar uma justificativa ao Aluno",4000);

       $("#confirmar").click(function(){
          $('.modal-abrir').leanModal();

       });

    });

    // var candidato = $(this).data("target");
    // var $toastContent = $("<span> Você tem certeza? <a href=#"+candidato+" class='modal-abrir' data-target="+ candidato +"><button id='confirmar' class='btn red waves-effect waves-light'>confirmar</button></a></span>");
    //
    //  var confirmar = Materialize.toast($toastContent, 5000, '', function(){
    //
    //  });

    $("#remarcar").submit(function(e){
        var dados = new FormData(this);
        var apagarDiv = $(this).parent().parent().parent();
        e.preventDefault();
         $.ajax({
             cache: false,
             processData:false,
            contentType: false,
            mimeType:"multipart/form-data",
            data: dados,
            type: 'POST',
            url: 'Controller/RemarcarEntrevista.php',
            success: function(data)
            {
              alert(data);
              Materialize.toast("A entrevista foi alterada e foi notificado ao aluno, clique para continuar",4000);
              $(apagarDiv).hide(1000);
            }
        });
      });
});
