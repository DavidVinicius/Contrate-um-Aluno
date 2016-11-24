$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('.collapsible').collapsible();
    $('ul.tabs').tabs({
      onShow: function(){
        var filho = $(this).data("filho");
        var caminho = $(this).data("caminho");
        var barra   = " <div class='progress'><div class='indeterminate'></div></div>";
        // $("#"+filho).load("View/Shared/AlunoNots/"+caminho);
        $.ajax({
          url:"View/Shared/AlunoNots/"+caminho,
          method:"PUT",
          cache:false,
          beforeSend:function(){
            $("#"+filho).html(barra);

          },
          success:function(data){
            console.log("deu certo");
            setTimeout(function () {
              $("#"+filho).html(data);
              console.log('esperando...');
            }, 1000);
          },
          error:function(data){
            console.log(data);
          },
          complete:function(data){
          }
        });
      }
    });
    $('.aceitar').click(function(){
        var idEntrevista = $(this).data('identrevista');
        var idEmpresa    = $(this).data('idempresa');
        var idAluno      = $(this).data('idaluno');
        var linha        = $(this).data('linha');
        var barra        = " <div class='progress'><div class='indeterminate'></div></div>";
        $.ajax({
          url:"Controller/AceitarEntrevista.php",
          method:"POST",
          data:{idEntrevista:idEntrevista,idEmpresa:idEmpresa,idAluno:idAluno},
          beforeSend: function(){
            $("#barra").html(barra);
          },
          success:function(data){
            console.log(data);
            setTimeout(function () {
              Materialize.toast("A entrevista foi confirmada", 4000);
              $("#barra").html('');
              $("#"+linha).remove();
            }, 1000);

          }
        });
    });
    $(".ApagarNotificacao").click(function(event) {
        var tabela     = $(this).data("tabela");
        var idMensagem = $(this).data('idnotificacao');
        var Notificacao = $(this).parent().parent().hide();
        console.log("tabela: " + tabela + "\n idMensagem: "+idMensagem);
        $.ajax({
          url: "Controller/ApagarNotificacao.php",
          method: "POST",
          data:{idMensagem: idMensagem,tabela:tabela},
          success: function(data){
              // alert(data);
              console.log(data);
              Materialize.toast("Apagado com sucesso", 4000);
          }
        });
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
