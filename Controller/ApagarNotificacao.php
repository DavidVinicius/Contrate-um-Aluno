<?php
  if (isset($_POST['tabela']) && $_POST['tabela'] == "notificacoes") {
    # code...
    require_once "../Model/ModelMensagens.class.php";
    $Notificao = new Mensagens();
    $idMensagem = isset($_POST['idMensagem'])?$_POST['idMensagem']:null;

   if ($Notificao -> DeleteMensagens("where idMensagem = $idMensagem")) {
       echo "deu certo";
   }
  }

  if (isset($_POST['tabela']) && $_POST['tabela'] == "notificacoesCandidatouse") {
    require_once "../Model/ModelNotificacoesCandidatouse.class.php";
    $NotCandidatouse = new ModelNotificacoesCandidatouse();
    $idNotificacoesCandidatouse = isset($_POST['idMensagem'])?$_POST['idMensagem']:null;

    if ($NotCandidatouse -> DeleteNotificacoesCandidatouse("where idNotificacoesCandidatouse = $idNotificacoesCandidatouse")) {
          echo "Apagou a notificaçao de candidatou-se";
    }else{
      echo "Erro ao apagar a notificacão de candidatou-se";
    }
  }
 ?>
