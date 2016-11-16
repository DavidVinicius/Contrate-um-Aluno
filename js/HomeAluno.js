$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('.collapsible').collapsible();
    $('ul.tabs').tabs({
      onShow: function(){
        var filho = $(this).data("filho");
        var caminho = $(this).data("caminho");
        $("#"+filho).load("View/Shared/AlunoNots/"+caminho);
      }
    });

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
      var idEntrevista      = $(this).data('identrevista');
      var idAluno           = $(this).data('idaluno');
      var codUsuarioEmpresa = $(this).data("codusuarioempresa");

      alert(idAluno + " " + idEntrevista + " " + codUsuarioEmpresa);
      var $toastContent = $("<span> tem certeza que deseja apagar, isso irá cancelar a entrevista? <button id='confirmar' class='btn red waves-effect waves-light'>confirmar</button></span>");
       Materialize.toast($toastContent, 5000, '', function(){});
       $("#confirmar").click(function(event) {

         $.ajax({
           url: "Controller/CancelarEntrevista.php",
           method: "POST",
           data:{idEntrevista:idEntrevista,idAluno:idAluno,codUsuarioEmpresa:codUsuarioEmpresa},
           success: function(data){
             alert(data);
             Materialize.toast("Entrevista cancelada com sucesso");
           },
           error:function(){
             Materialize.toast("Erro ao tentar cancelar a entrevista, tente novamente",4000);
           }

         });

       });
    });


    $(".CancelarEntrevista").click(function(event) {
      /* Act on the event */
      var idEntrevista = $(this).data("identrevista");
      var idAluno      = $(this).data("idaluno");
      var codUsuarioEmpresa = $(this).data("codusuarioempresa");
      alert(idAluno + " " + idEntrevista + " " + codUsuarioEmpresa);

      var $toastContent = $("<span> tem certeza que deseja cancelar a entrevista? <button id='cancelar' class='btn red waves-effect waves-light'>confirmar</button></span>");
      Materialize.toast($toastContent, 5000, '', function(){});
      $("#cancelar").click(function(event) {

        $.ajax({
          url: "Controller/CancelarEntrevista.php",
          method: "POST",
          data:{idEntrevista:idEntrevista,idAluno:idAluno,codUsuarioEmpresa:codUsuarioEmpresa},
          success: function(data){
            alert(data);
            Materialize.toast("Entrevista cancelada com sucesso",4000);
          },
          error:function(){
            Materialize.toast("Erro ao tentar cancelar a entrevista, tente novamente",4000);
          }

        });
    });
  });
});
