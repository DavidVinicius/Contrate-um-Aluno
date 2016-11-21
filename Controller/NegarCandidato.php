<?php
  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelEmpresa.class.php";
  require_once "../Model/ModelCandidatouse.class.php";

  $idAluno           = isset($_POST['idAluno'])?$_POST['idAluno']:null;
  $idCandidatouse    = isset($_POST['idCandidatouse'])?$_POST['idCandidatouse']:null;
  $codUsuarioEmpresa = isset($_POST['codUsuarioEmpresa'])?$_POST['codUsuarioEmpresa']:null;
  $motivo            = isset($_POST['motivo'])?$_POST['motivo']:null;
  $mensagem          = isset($_POST['mensagem'])?$_POST['mensagem']:null;

  //Fazer update do campo ativo da tabela candidatouse para ''

  //Criar notificaçao na tabela notificacoescandidatouse para o aluno;

 ?>
