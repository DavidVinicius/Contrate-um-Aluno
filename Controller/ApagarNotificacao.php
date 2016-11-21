<?php
  if (isset($_POST['tabela']) && $_POST['tabela'] == "notificacoes") {
    # code...
    require_once "../Model/ModelMensagens.class.php";
    $Notificao = new Mensagens();
    $idMensagem = isset($_POST['idMensagem'])?$_POST['idMensagem']:null;

   if ($Notificao -> DeleteMensagens("where idMensagem = $idMensagem")) {
       echo "<br /> apagou a notificação";
   }else{
     echo "<br /> não apagou a notificacão";
   }
 }else{
   echo "<br /> não achou a tabela notificações ";
 }

  if (isset($_POST['tabela']) && $_POST['tabela'] == "notificacoesCandidatouse") {
    require_once "../Model/ModelNotificacoesCandidatouse.class.php";
    $NotCandidatouse = new ModelNotificacoesCandidatouse();
    $idNotificacoesCandidatouse = isset($_POST['idMensagem'])?$_POST['idMensagem']:null;

    if ($NotCandidatouse -> DeleteNotificacoesCandidatouse("where idNotificacoesCandidatouse = $idNotificacoesCandidatouse")) {
          echo "Apagou a notificaçao de candidatou-se";
    }else{
      echo "<br />Erro ao apagar a notificacão de candidatou-se";
    }
  }else{
    echo "<br />Não achou a tabela notificações Candidatou-se";
  }
 ?>
