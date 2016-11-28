<?php
//   if(file_exists("Model/ModelEmpresa.class.php"))
//       require_once "Model/ModelEmpresa.class.php";
//     elseif(file_exists("../../Model/ModelEmpresa.class.php"))
//       require_once "../../Model/ModelEmpresa.class.php";
//     else
//       echo "<h1>Impossível encontrar o arquivo ModelEmpresa.class.php</h1>";

    if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "Controller/PaginaPrivadaOuPublica.class.php";
    elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  $pagina = new PaginaPrivadaOuPublica();
  if(!$pagina->PrivadaOuPublica())
    header("location: ../../Index.php");

//   $empresa = new ModelEmpresa() ? new ModelEmpresa() : null;
//   if( !$empresa )
//     header("location: Index.php");
?>