<?php
  if(file_exists("Model/ModelEmpresa.class.php"))
      require_once "Model/ModelEmpresa.class.php";
    elseif(file_exists("../../Model/ModelEmpresa.class.php"))
      require_once "../../Model/ModelEmpresa.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo ModelEmpresa.class.php</h1>";

    if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "Controller/PaginaPrivadaOuPublica.class.php";
    elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  $pagina = new PaginaPrivadaOuPublica();
  if(!$pagina->PrivadaOuPublica())
    header("location: ../../Index.php");
  else
    header("location: ../../Home.php");

  $empresa = new ModelEmpresa() ? new ModelEmpresa() : null;
  if( !$empresa )
    header("location: Index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
</head>
<body>
  <h1>Empresas Admin</h1>
</body>
</html>
