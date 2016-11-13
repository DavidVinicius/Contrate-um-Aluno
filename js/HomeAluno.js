$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('.collapsible').collapsible();
    $('ul.tabs').tabs();

    $(".ApagarNotificacao").click(function(event) {
        var idMensagem = $(this).data('idnotificacao');
        var Notificacao = $(this).parent().parent().hide();
        $.ajax({
          url: "Controller/ApagarNotificacao.php",
          method: "POST",
          data:{idMensagem: idMensagem},
          success: function(data){
              // alert(data);
              Materialize.toast("Apagado com sucesso", 4000);
          }
        });
        // var $toastContent = $("<span> desfazer? <button id='confirmar' class='btn red waves-effect waves-light'>confirmar</button></span>");
        //
        //  Materialize.toast($toastContent, 5000, '', function(){});
        //  $("#confirmar").click(function(event) {
        //
        //    $(Notificacao).show();
        //  });

    });

    $(".apagarEntrevista").click(function(event) {
      /* Act on the event */
      alert("aa");
    });
});
