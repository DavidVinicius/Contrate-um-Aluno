<?php
  include_once "../Model/DataBase.class.php";

  $DB = new DataBase();

  $total = mysqli_num_rows($DB->SearchQuery("aluno", "", "idAluno"));
  var_dump($total);
  $i = 1;
  $max = $total - 5;
  $query = mysqli_fetch_object($DB->SearchQuery("aluno", "where idAluno BETWEEN $max AND $total"));
  foreach($query as $linha){
    echo $linha->cpf;
  }
  echo "<pre>";
  var_dump($query);
  echo "</pre>";

?>
