<?php
  session_start();
  require_once "../../../Model/ModelEntrevistas.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";
  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelMensagens.class.php";

  $Entrevista      = new ModelEntrevistas();
  $Empresa         = new ModelEmpresa();
  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Notificacao     = new Mensagens();
  $idUsuario       = $_SESSION['id'];
  $ConsultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa       = $ConsultEmpresa->idEmpresa;
  if (mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"))){

      $ConsultaNum = mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = 'S' "));
      // $ResultEntrevista = mysqli_fetch_object($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"));
      $ConsultaEntrevista            = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = 'S' ");
      $ConsultaEntrevistaFinalizada  = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = '' ");
  }
  else{
    $ConsultaNum = 0;
  }
  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $totalVaga        = mysqli_num_rows($Vaga -> ReadVaga("where codEmpresa = $idEmpresa"));
 ?>
 <?php if ($totalVaga > 0) {
   echo "teste";

 }else{
   echo "<h1 class='center-align flow-text'>Você não tem vagas cadastradas</h1>";
 } ?>
