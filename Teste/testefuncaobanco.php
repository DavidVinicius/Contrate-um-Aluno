<?php
  include "../Model/DataBase.class.php";

  $DB = new DataBase();

  $assoc = $DB->SearchReturnLast("usuario", "", "idUsuario");
  echo $assoc['email'];
?>
