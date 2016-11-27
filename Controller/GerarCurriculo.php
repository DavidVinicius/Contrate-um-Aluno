<?php
  session_start();

  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelExperiencias.class.php";
  require_once "../Model/ModelFormacoes.class.php";
  require_once "../Model/ModelEnderecos.class.php";
  require_once "../Model/ModelTelefones.class.php";

  $ComFoto           = isset($_POST['ComFoto'])?$_POST['ComFoto']:null;
  $gerarPDF          = isset($_POST['gerarPDF'])?$_POST['gerarPDF']:null;
  $comCompetencias   = isset($_POST['comCompetencias'])?$_POST['comCompetencias']:null;
  $enviarNoMeuEmail  = isset($_POST['enviarNoMeuEmail'])?"true":"false";
  $enviar            = isset($_POST['enviarE'])?$_POST["enviarE"]:null;

  if ($enviar == "true") {
      if ($enviarNoMeuEmail == "false"){
          $enviarEmail = isset($_POST['enviarEmail'])?$_POST['enviarEmail']:null;
      }else{
         $enviarEmail  =  $_SESSION['usuario'];
      }
  }else{
    $enviarEmail = false;
  }




 ?>
