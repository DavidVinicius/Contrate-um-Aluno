<?php
    if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "Controller/PaginaPrivadaOuPublica.class.php";
    elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  $pagina = new PaginaPrivadaOuPublica();
  if(!$pagina->PrivadaOuPublica())
    header("location: ../../Index.php");
?>