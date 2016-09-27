
$(".editar").click(function(){
//    $(this).hide();
    var BotaoEditar = $(this).parent();
//    var BotaoCancelar = $(this).parent().prepend("<a class='btn yellow cancelar' >Cancelar</a>");
    var BotaoSalvar = $(this).parent().prepend("<a class='btn green' style='margin-right:1%;' id='salvar'>Salvar</a>"); 
    var valor = $(this).parent().prev().text();
    var td = $(this).parent().prev();
                $(this).removeClass("editar blue").addClass("cancelar yellow").text("Cancelar");
                var campoDeAlteracao = $(this).parent().prev();
                 var Campo = $(this).parent().parent().data('id');   
                var inputText = "<input type='text' class='flow-text' placeholder='Digite seu novo email'>";
                if(Campo == "senha"){
                    
                }else{
                   $(campoDeAlteracao).html(inputText); 
                }
                
    
                $("#salvar").click(function(){
                   
                   var valorDoCampo = $(this).parent().prev().children().val();
                    
                    
                    if(valorDoCampo == ""){
                        Materialize.toast('Campo Vazio', 4000);
                    }
                    else{
                        $.ajax({
                            url:"Controller/ConsultaDados.php",
                            method:"POST",
                            data: {dado: valorDoCampo},
                            beforeSend: function(){
                                $(this).next().prepend("<p>teste</p>");
                            },
                            success: function(retorno){
                                if(retorno == 1){
                                    Materialize.toast("Esse email já está sendo utilizado",4000);
                                }
                                else{
                                    $.ajax({
                                        url:"Controller/AlterarDados.php",
                                        method: "POST",
                                        data: {dado: valorDoCampo, campo: Campo},
                                        success: function(dado){
                                            if(dado == 0){
                                                Materialize.toast("Erro, tente novamente",4000);
                                            }else{
                                                Materialize.toast("Alterado com sucesso",4000);
                                                $(td).html(dado);
                                                $(BotaoEditar).html("<button class='editar btn green' disable='true'><i class='fa fa-check'></i></button>");
                                                
                                            }
                                        }
                                    });
                                }
                            }
                            
                        });    
                    }
                });
                $(".cancelar").click(function(){
                   $("#salvar").remove();
                   $(this).parent().prev().text(valor);
                    $(this).parent().html("<button class='editar btn green' disable='true'><i class='fa fa-check'></i></button>");
                    $(this).remove();
                });
                
    
                
});

