<?php
//     if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
//       require_once "Controller/PaginaPrivadaOuPublica.class.php";
//     elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
//       require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
//     else
//       echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

//   $pagina = new PaginaPrivadaOuPublica();
//   if(!$pagina->PrivadaOuPublica())
//     header("location: ../../Index.php");
?>
    <h2 class="flow-text center-align"> Bem-vindo ao Contrate um Aluno</h2>
    <div class="row">
        <form  method="post" action="Controller/Logar.php" autocomplete="false">
            <div class="row ">
                <div class="input-field col s12 m6 push-m3">
                   <label for="emailLogin" ><i class='fa fa-user'></i> Email login</label>

                    <input type="email" id="emailLogin" name="usuario" class="validate" required >
                   <label for="emailLogin" data-error="" data-success=""></label> 
                </div>

            </div>
            <div class="row">
                 <div class="input-field col s12 m6 push-m3">

                   <label for="senha"><i class='fa fa-at '></i> Digite sua Senha</label>
                    <input type="password" id="senha" name="senha" class="validate" required><br>                
                </div><br>

            </div>
            
                <div class="center-align hide-on-med-and-up">
                    <input type="submit" value="Entrar" class="btn blue col s12">
                    <a  href="#" class=" waves-effect abaixo-1 waves-light btn yellow col s12">Esqueceu a Senha?</a>
                    <a href="" id="fechar" class="btn red abaixo-1 waves-effect waves-light modal-close col s12">Cancelar</a>
                    
                </div>
                <div class="center-align hide-on-small-only">
                    <input type="submit" value="Entrar" class="btn blue ">
                    <a  href="#" class=" waves-effect waves-light btn yellow ">Esqueceu a Senha?</a>
                    <a href="" id="fechar" class="btn red waves-effect waves-light modal-close">Cancelar</a>
                    
                </div>
            
        </form>
    </div>
    
    
    
