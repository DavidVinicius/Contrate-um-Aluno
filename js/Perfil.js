$(document).ready(function() {
    $("#trocarEmail").hide();
    $("#novaSenha").hide();
    var barra = `<div class="progress"><div class="indeterminate"></div></div>`;

    $('.desativar').click(function(event) {
        var botaoDesativar = `<div>Tem certeza que deseja desativar? <button id='desativar' class='red btn'>DESATIVAR</button> </div>`;
        Materialize.toast(botaoDesativar,4000);

        $("#desativar").click(function(){
          $.ajax({
            url: "Controller/AlterarDados.php",
            method:"POST",
            data:{desativar:"sim"},
            beforeSend:function(){
              $('.desativar').parent().prepend(barra);
            },
            success:function(data){
              console.log(data);
              setTimeout(function () {
                $(".barra").html('');
                Materialize.toast("Seu perfil foi desativado, para reativar entre em contato com contrateumaluno@gmail.com",5000,'',function(){
                    window.location.reload();
                });
              }, 1000);
            }
          });
        });

    });
    $(".trocarEmail").click(function(event) {

        $("#trocarEmail").show(1000);



        $("#enviarEmail").submit(function(e) {
          /* Act on the event */
          var email = $('[name=novoEmail]').val();
          var idUsuario = $('[name=idUsuario]').val();
          e.preventDefault();
          var dados = new FormData(this);
          $.ajax({
              cache: false,
              processData:false,
             contentType: false,
             mimeType:"multipart/form-data",
             url:"Controller/ConsultaDados.php",
             method:"POST",
             data:dados,
            beforeSend:function(){
              $('.barra').html(barra);
            },
            success:function(data){
              console.log(data);
              if (data == 'true' || data == 1) {
                setTimeout(function () {
                  Materialize.toast("Esse email não está disponível",4000);
                  $('.barra').html('');
                }, 1000);
              }else{
                console.log(email);
                $.ajax({
                  url:"Controller/AlterarDados.php",
                  method: "POST",
                  data:{
                     novoEmail:email,
                     idUsuario:idUsuario,
                  },
                  success:function(data){
                    console.log(data);
                    setTimeout(function () {
                      $(".barra").html('');
                      Materialize.toast("Email alterado com sucesso",4000);
                    $("[name=email]").val(email);
                    $("#trocarEmail").hide(1000);
                    }, 1000);
                  },

                });

              }

            }
          });
        });
    });
    $('.cancelar').click(function(event) {
        $("#trocarEmail").hide(1000);

    });

    $(".cancelarSenha").click(function(event) {

        $("#novaSenha").hide(1000);
    });

    $('.trocarSenha').click(function(event) {


        $("#novaSenha").show(1000);

          $(".confirmarSenha").click(function(){

        var senha          = $("[name=novasenha]").val();
        var confirmarSenha = $("[name=novanovasenha]").val();

        if (senha == "" || senha == null) {
            Materialize.toast("O campo nova senha esta vazio",4000);
        }
        else if(confirmarSenha == "" || confirmarSenha == null){
          Materialize.toast("O campo de confirmar senha está vazio",4000);
        }
        else if (senha.length <= 4) {
           Materialize.toast("A senha deve ter no mínimo 5 caracter",4000);
        }
        else if (senha != confirmarSenha) {
          Materialize.toast("As senhas estão diferentes",4000);
        }else{
          $.ajax({
            url: "Controller/AlterarDados.php",
            method: "POST",
            data:{senha:senha},
            beforeSend:function(){
              $(".barra").html(barra);
            },
            success:function(data){
              console.log(data);
              setTimeout(function () {
                Materialize.toast("Senha alterado com sucesso",4000);
                 $('.barra').html('');
                 $("[name=novasenha]").val('');
                 $("[name=novanovasenha]").val('');
                 $("#novaSenha").hide(1000);
              }, 1000);
            }
          });
        }

      });
    });
});
