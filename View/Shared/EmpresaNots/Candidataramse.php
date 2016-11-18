<?php
  session_start();

  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelCandidatouse.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";

  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Candidatou      = new Candidatouse();
  $Empresa         = new ModelEmpresa();
  $idUsuario       = $_SESSION['id'];

  $ResultEmpresa      = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa          = $ResultEmpresa -> idEmpresa;
  $ResultVaga         = 0;
  $totalCandidatouse  = mysqli_num_rows($Candidatou -> ReadCandidatouse("where codVaga = "));
 ?>
 <?php if ($totalVaga > 0) {
   echo "teste";


 }else{
   echo "<h1 class='center-align flow-text'>Você não tem vagas cadastradas</h1>";
 } ?>
