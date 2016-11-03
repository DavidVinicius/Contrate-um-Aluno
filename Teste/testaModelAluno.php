<?php
    include("../Model/DataBase.class.php");
    $DB = new DataBase();

    $Valores   = mysqli_fetch_array($DB->SearchQuery('qualificacoes'," "));
    $Consulta  = $DB->SearchQuery('qualificacoes'," ");
    $a = array();
    $i = 0;
    while ($result = mysqli_fetch_object($Consulta)) {
        $a['competencia'][$i] = $result->competencia;
        $a['codAluno'][$i]    = $result->codAluno;
        $i++;
    }
    $arquivo = glob("../Images/Upload/*.*");

    $qtd = 1;
    $atual = (isset($_GET['pg']))? intval($_GET['pg']):1;
    $pagArquivo = array_chunk($a['competencia'], $qtd);
    $contar = count($pagArquivo);
    $resultado  = $pagArquivo[$atual-1];
    echo "<pre>";
    print_r($a);
    echo "</pre>";



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
  <?php foreach ($resultado as $valor){
      // printf("<img src='../Upload/%s' width='200px'>",$valor);
      echo $valor. "<br />";
}


echo "<hr />";
  for ($i=1; $i <= $contar ; $i++) {
      if ($i == $atual) {
          printf("<a href='#'> (%s) </a>", $i);
      }else {
        printf("<a href='?pg=%s'>(%s)</a>" , $i, $i);
      }
  }
   ?>


</body>
</html>
