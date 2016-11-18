<?php
  require_once "../Model/ModelMensagens.class.php";
  $Notificao = new Mensagens();
  $idMensagem = isset($_POST['idMensagem'])?$_POST['idMensagem']:null;

 if ($Notificao -> DeleteMensagens("where idMensagem = $idMensagem")) {
     echo "deu certo";
 }
 ?>
