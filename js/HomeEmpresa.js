$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('input, textarea').characterCounter();
    $('.chips').material_chip();
    $('select').material_select();
    $('.chips').click(function(event) {
       Materialize.toast("Digite e aperte enter para adicionar benefícios",4000);
    });
    $(".chips").focusin(function(){
      Materialize.toast("Digite e aperte enter para adicionar benefícios",4000);
    });

      $(".conteudo").click(function(){
        var filho   = $(this).data("filho");
        var caminho = $(this).data("caminho");
        var barra   = " <div class='progress '><div class='indeterminate'></div></div>";
        $.ajax({
          url:"View/Shared/EmpresaNots/"+ caminho,
          method:"PUT",
          cache:false,
          beforeSend:function(){
            $("#barra").html(barra);

          },
          success:function(data){
            console.log("deu certo");
            setTimeout(function () {
              $("#barra").html('');
              $("#conteudo").html(data);
              console.log('esperando...');
            }, 1000);
          },
          error:function(data){
            console.log(data);
          },
          complete:function(data){
          }
        });
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
        var tabela      = $(this).data('tabela');
        var idMensagem  = $(this).data('idnotificacao');
        var Notificacao = $(this).parent().parent().hide();
        var barra       = " <div class='progress'><div class='indeterminate'></div></div>";

        console.log("tabela:"+ tabela +"\n idMensagem:" +idMensagem);

        $.ajax({
          url: "Controller/ApagarNotificacao.php",
          method: "POST",
          data:{idMensagem: idMensagem, tabela:tabela},
          beforeSend:function(){
              $("#barra").html(barra);
          },
          success: function(data){
              // alert(data);
              console.log(data);
              setTimeout(function () {
                Materialize.toast("Apagado com sucesso", 4000);
                $("#barra").html('');
              }, 1000);
          },
          error:function(err){
            console.log(err);
          }
        });
});
    $(".ApagarEntrevistasFinalizadas").click(function(event) {
      var idEntrevista  = $(this).data('identrevista');
      var linha         = $(this).data('linha');
      var barra         = " <div class='progress'><div class='indeterminate'></div></div>";

      $.ajax({
        url:"Controller/ApagarEntrevistasFinalizadas.php",
        method:"POST",
        data:{idEntrevista:idEntrevista},
        beforeSend:function(){
          $("#barra").html(barra);
        },
        success:function(data){
          console.log(data);
          setTimeout(function () {
            $("#barra").html('');
            Materialize.toast("Apagado com sucesso",4000);
            $("#"+linha).remove();
          }, 1000);
        },
        error:function(err){
          console.log(err);
          $("#barra").html('');
          Materialize.toast("Erro ao tentar apagar",4000);
        }
      });
    });

    $('.remarcar').click(function(event) {
      var codUsuario  = $(this).data("codusuario");
      var idmodal     = $(this).data("idmodal");
      var data        = $("#data"+codUsuario).val();
      var hora        = $("#hora"+codUsuario).val();
      var motivo      = $("#motivo"+codUsuario).val();
      var mensagem    = $("#mensagem"+codUsuario).val();
      var idAluno     = $("#idAluno"+codUsuario).val();
      var idEntrevista = $("#idEntrevista"+codUsuario).val();
      var nomeEmpresa  = $("#nomeEmpresa"+codUsuario).val();
      var empresa      = $("#empresa"+codUsuario).val();
      var codUsuarioAluno = $("#codUsuarioAluno"+codUsuario).val();
      var barra         = " <div class='progress'><div class='indeterminate'></div></div>";

      console.log(data + " " + hora + " " + motivo + " " + mensagem + " " + idAluno + " " + idEntrevista + " " + nomeEmpresa + " " + empresa + " " + codUsuarioAluno);

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
          beforeSend:function(){
            $("#barra").html(barra);
          },
          success:function(data){
            // alert(data);
            console.log(data);
            setTimeout(function () {
              $("#barra").html('');
              Materialize.toast("A entrevista foi alterada e foi notificado ao aluno, clique para continuar",4000);
              $("#"+idmodal).hide();
            }, 1000);
          },
          error:function(err){
            console.log(err);
            Materialize.toast("Erro, Atualize a página e tente novamente");
          }
        });
      }


    });
    var FormularioNegarCandidato;
    $(".cancelarCandidato").click(function(){
      var FormularioNegarCandidato  = $(this).data('form');
      var linha                     = $(this).data("linha");
      var barra   = " <div class='progress'><div class='indeterminate'></div></div>";
      console.log("Form id:" + FormularioNegarCandidato);

      $("#"+FormularioNegarCandidato).submit(function(e){
        e.preventDefault();

        var dados = new FormData(this);

        $.ajax({
          cache: false,
          processData:false,
          contentType: false,
          mimeType:"multipart/form-data",
          url:"Controller/NegarCandidato.php",
          method:"POST",
          data: dados,
          beforeSend:function(){
            $("#barra").html(barra);
          },
          success:function(data){
            console.log(data);
            setTimeout(function () {
              $("#barra").html('');
              Materialize.toast("O candidato foi negado e recebeu a notificação",4000);
              $("#"+linha).remove();
            }, 1000);
          },
          error:function(data){
            console.log(data);
            Materialize.toast("Erro ao tentar negar a candidatura do aluno",4000);
          }
        });
      });
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
                console.log(data);
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
          var barra   = " <div class='progress'><div class='indeterminate'></div></div>";

          $.ajax({
            url: "Controller/EntrevistaRealizada.php",
            method: "POST",
            data:{idEntrevista: idEntrevista, codUsuarioAluno:codUsuarioAluno, idEmpresa:idEmpresa},
            beforeSendo:function(){
              $("#barra").html(barra);
            },
            success:function(data){
                console.log(data);
                setTimeout(function () {
                  $("#barra").html('');
                  Materialize.toast("Status modificado, obrigado por utilizar o Contrate um Aluno", 4000);
                  $(apagarDiv).remove();
                }, 1000);

            },
            error:function(err){
              Materialize.toast("Erro tente novamente",4000);
              console.log(err);
            }
          });
        });
        $(".marcar").click(function(){
          var Formulario      = $(this).data('form');
          var Linha           = $(this).data('linha');
          var idCandidatouse  = $(this).data("idcandidatouse");
          var barra   = " <div class='progress'><div class='indeterminate'></div></div>";
          // alert(idCandidatouse);
          $("#"+Formulario).submit(function(e){
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
              beforeSend:function(){
                $("#barra").html(barra);
              },
              success: function(data)
              {
                console.log(data);
                setTimeout(function () {
                  $("#barra").html('');
                  Materialize.toast("Entrevista marcada com sucesso, clique para continuar",4000);
                  $(".modal").hide(1000);
                  $("#"+Linha).remove();
                  $.ajax({
                    url: "Controller/ModificaStatusCandidatouse.php",
                    method: "POST",
                    data:{idCandidatouse:idCandidatouse},
                    success:function(data){
                      console.log(data);
                      Materiliaze.toast("Status modificado com sucesso",4000);
                    },
                    error:function(err){
                      console.log(err);
                    }
                }, 1000);

                });
              }
            });
          });
        });
});
