<?php
  session_start();
  if(isset($_POST['existeEmpresa'])){
    $tabela     = isset($_POST['tabela'])?$_POST['tabela']:null;
    $idUsuario  = $_SESSION['id'];


    if($tabela == "telefones")
      {
        include_once "../Model/ModelTelefones.class.php";
        $Telefone       = new Telefones();
        $idTelefone     = isset($_POST['idTelefone'])?$_POST['idTelefone']:null;
        if ($Telefone->DeleteTelefones("where idTelefone = $idTelefone")) {
              echo "deu certo";
        }
      }

      if ($tabela == "valores") {
         include_once "../Model/ModelValores.class.php";
         $Valor         = new Valores();
         $idValor       = isset($_POST['idValor'])?$_POST['idValor']:null;
         if ($Valor->DeleteValores("where idValores = $idValor")) {
             echo "deu certo";
         }
      }
  }

  if (isset($_POST['tabela']) && $_POST['tabela'] == 'vaga') {
    $tabela     = isset($_POST['tabela'])?$_POST['tabela']:null;
    $idVaga     = isset($_POST['idVaga'])?$_POST['idVaga']:null;
    include_once "../Model/ModelVaga.class.php";
    $Vaga       = new ModelVaga();
    if ($Vaga -> DeleteVaga("where idVaga = $idVaga")) {
      echo "deu certo";
    }
  }


 ?>
