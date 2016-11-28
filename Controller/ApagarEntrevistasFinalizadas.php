<?php

  require_once "../Model/ModelEntrevistas.class.php";

  $Entrevista   = new ModelEntrevistas();

  $idEntrevista = isset($_POST['idEntrevista'])?$_POST['idEntrevista']:null;

  if ($Entrevista -> DeleteEntrevista("where idEntrevista = $idEntrevista")) {
    echo "\n Deletou essa entrevista";
  }else{
    echo "\n Erro ao tentar apagar entrevista";
  }

 ?>
