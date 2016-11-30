<?php
    require_once "Model/ModelUsuario.class.php";
    $Usuario = new ModelUsuario();


    $usuario = $_SESSION['usuario'];

    $id = $_SESSION['id'];
    $ResultUsuario = mysqli_fetch_object($Usuario -> ReadUsuario("where idUSuario = $id"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="row" id="emailAtual">
              <div class="input-field col s12">
                <label for="email">Trocar Email</label>
                <input type="email" name="email" id="email" value="<?= $ResultUsuario -> email?>" style="font-size:25px" class="flow-text" readonly="true">

              </div>
              <div class="input-field">
                <button class="btn  blue trocarEmail ">Trocar email</button>
              </div>
            </div>
            <div class="row" id="trocarEmail">
              <div class="barra"></div>
              <div class="input-field col s12">
                <form class="" action="index.html" method="post" id="enviarEmail">
                  <label for="novoEmail">Novo email:</label>
                  <input type="email" name="novoEmail" id="novoEmail" required="true" style="font-size:25px" class="flow-text">
                  <input type="hidden" name="idUsuario" value="<?= $id ?>">
                  <div class="input-field">
                    <button class="green btn confirmarEmail" type="submit">Confirmar</button>

                    <a href="#!" class="red btn cancelar">Cancelar</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="input-field">
                <label for="senha">Trocar Senha</label>
                <input type="text" name="senha" id="senha" value="<?php
                    for ($i=0; $i <= strlen($ResultUsuario -> senha); $i++) {

                         echo "*";
                    }
                ?>" readonly="true" style="font-size:25px">
              </div>
              <div class="input-field">
                <button class="btn blue trocarSenha">Trocar senha</button>
              </div>
            </div>
            <div class="row" id="novaSenha">
              <div class="barra"></div>
                <div class="input-field">
                  <label for="senha">Nova senha:</label>
                  <input type="password" name="novasenha" id="senha">
                </div>
                <div class="input-field">
                  <label for="novasenha">confirme a senha:</label>
                  <input type="password" name="novanovasenha" id="novasenha" >
                </div>
                <div class="input-field">
                  <button class="green btn confirmarSenha">Confirmar</button>
                  <button class="btn red cancelarSenha">Cancelar</button>
                </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l12">
            <button class="btn red desativar">Desativar meu perfil</button>
          </div>
        </div>

    </div>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/Perfil.js"></script>
</body>
</html>
