<?php
  require_once "../Model/ModelCandidatouse.class.php";
  $Candidato      = new Candidatouse();
  $idCandidatouse = isset($_POST['idCandidatouse'])?$_POST['idCandidatouse']:null;

  if ($Candidato -> UpdateCandidatouse("ativo",'',"where idCandidatouse = $idCandidatouse")) {
        echo "Mudou status do candidatouse";
  }else{
    echo "Não mudou status do candidatouse";
  }

 ?>
