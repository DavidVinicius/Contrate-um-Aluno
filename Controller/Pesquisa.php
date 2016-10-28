<?php
  include_once "../Model/DataBase.class.php";
  include_once "../Model/ModelAluno.class.php";

  $DB     = new DataBase();
  $Aluno  = new ModelAluno();

  $tabela = $_GET['tabela'];
  $valor  = isset($_GET['valor']) ? $_GET['valor'] : null;

  if(!$tabela)
    echo "Tabela não informada";

  if($tabela && $tabela == "qualificacoes")
  {
    $resultado  = mysqli_fetch_assoc($DB->SearchQuery("$tabela", "where competencia like '%".$valor."%'"));
  }
  else if($tabela && $tabela == "experiencias")
  {
    $resultado = mysqli_fetch_assoc($DB->SearchQuery("$tabela", "where descricao like '%".$valor."%' or cargo like '%".$valor."%'"));
  }
  else if($tabela && $tabela == "formacoes")
  {
    $resultado = mysqli_fetch_assoc($DB->SearchQuery("$tabela", "where curso like '%".$valor."%' or instituicao like '%".$valor."%'"));
  }
?>
