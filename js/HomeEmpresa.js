$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('input, textarea').characterCounter();

      $('ul.tabs').tabs({
        onShow: function(){
          var filho   = $(this).data("filho");
          var caminho = $(this).data("caminho");
          // alert(filho);
          $.ajax({
            url:"View/Shared/EmpresaNots/"+ caminho,
            method:"POST",
            success:function(data){
              $("#"+filho).html(data);
            }
          });
          // $().load();
        }
      });
    $("#recusar").click(function(event) {
      /* Act on the event */
      // alert(candidato);
      Materialize.toast("Para cancelar é preciso enviar uma justificativa ao Aluno",4000);

       $("#confirmar").click(function(){
          $('.modal-abrir').leanModal();

       });
      $(".recusar").click(function(){
        Materialize.toast("Para cancelar é preciso enviar uma justificativa ao Aluno",4000);
      });

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
});
    // var candidato = $(this).data("target");
    // var $toastContent = $("<span> Você tem certeza? <a href=#"+candidato+" class='modal-abrir' data-target="+ candidato +"><button id='confirmar' class='btn red waves-effect waves-light'>confirmar</button></a></span>");
    //
    //  var confirmar = Materialize.toast($toastContent, 5000, '', function(){
    //
    //  });
    $('.remarcar').click(function(event) {
      /* Act on the event */
      var codUsuario  = $(this).data("codusuario");
      var idmodal     = $(this).data("idmodal");
      alert(codUsuario);
      var data        = $("#data"+codUsuario).val();
      var hora        = $("#hora"+codUsuario).val();
      var motivo      = $("#motivo"+codUsuario).val();
      var mensagem    = $("#mensagem"+codUsuario).val();
      var idAluno     = $("#idAluno"+codUsuario).val();
      var idEntrevista = $("#idEntrevista"+codUsuario).val();
      var nomeEmpresa  = $("#nomeEmpresa"+codUsuario).val();
      var empresa      = $("#empresa"+codUsuario).val();
      var codUsuarioAluno = $("#codUsuarioAluno"+codUsuario).val();
      // alert(data + " " + hora + " " + motivo + " " + mensagem + " " + idAluno + " " + idEntrevista + " " + nomeEmpresa + " " + empresa + " " + codUsuarioAluno);
      if (data == "" || data == null) {
        Materialize.toast("O campo data está vazio",4000);

      }
      if(hora == "" || hora == null){
        Materialize.toast("O campo hora está vazio",4000);
      }
      if (motivo == "" || motivo == null) {
        Materialize.toast("O campo motivo está vazio",4000);
      }
      if (mensagem == "" || mensagem == null) {
        Materialize.toast("O campo mensagem está vazio",4000);
      }

      if (mensagem != "" && data != "" && motivo != "" && mensagem != "") {
        $.ajax({
          url:"Controller/RemarcarEntrevista.php",
          method: "POST",
          data:{
            data:data ,
            hora: hora,
            motivo: motivo,
            mensagem: mensagem,
            idAluno: idAluno,
            idEntrevista: idEntrevista,
            nomeEmpresa: nomeEmpresa,
            empresa:empresa,
            codUsuarioAluno:codUsuarioAluno
          },
          success:function(data){
            // alert(data);
            Materialize.toast("A entrevista foi alterada e foi notificado ao aluno, clique para continuar",4000);
            $("#"+idmodal).hide();

          }
        });
      }
      

    });

      $("#CancelarEntrevistaEmpresa").submit(function(e){
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
              url: 'Controller/CancelarEntrevistaEmpresa.php',
              success: function(data)
              {
                // alert(data);
                Materialize.toast("A entrevista foi cancelada e foi notificado ao aluno",4000);
                $(apagarDiv).remove();
              }
          });
        });

        $("#realizada").click(function(){
          var idEntrevista    = $(this).data('identrevista');
          var codUsuarioAluno = $(this).data('codusuarioaluno');
          var idEmpresa       = $(this).data("idempresa");
          var apagarDiv       = $(this).parent().parent().parent();
          $.ajax({
            url: "Controller/EntrevistaRealizada.php",
            method: "POST",
            data:{idEntrevista: idEntrevista, codUsuarioAluno:codUsuarioAluno, idEmpresa:idEmpresa},
            success:function(data){
                alert(data);
                Materialize.toast("Status modificado, obrigado por utilizar o Contrate um Aluno", 4000);
                $(apagarDiv).remove();

            },
            error:function(){
              Materialize.toast("Erro tente novamente",4000);
            }
          });
        });
});
