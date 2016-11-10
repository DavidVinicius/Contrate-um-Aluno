<?php
  $idEmpresa = $_GET['id'];
  require_once "Model/ModelEmpresa.class.php";
  $Empresa = new ModelEmpresa();
  $ConsultaEmpresa = mysqli_fetch_object($Empresa->ReadEmpresa("where idEmpresa = $idEmpresa"));

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <?php
        echo $ConsultaEmpresa -> nome;
    ?>
</body>
</html>
