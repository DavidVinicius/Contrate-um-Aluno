<?php
    session_start();
    include_once("../Model/DataBase.class.php");

    $DB = new DataBase();

    $Telefones = json_decode($_POST['Telefones'],true);

    for($i = 0; $i < count($Telefones); $i++){
        $dados = array(
            "telefone"      => $Telefones[$i]['telefone'],
            "tipo"          => $Telefones[$i]['tipo'],
            "codUsuario"    => $_SESSION['id']
        );
        $Result22 = $DB->InsertQuery("telefones",$dados);
    }
    $dados = array(
      "nome"        => $_POST['nome'],
      "cnpj"        => $_POST['cnpj'],
      "areaAtuacao" => $_POST['areaAtuacao'],
      "foto"        => $_FILES['foto']['name'],
      "missao"      => $_POST['missao'],
      "visao"       => $_POST['visao'],
      "historia"    => $_POST['historia'],
      "codUsuario"  => $_SESSION['id']
    );
    $Result = $DB->InsertQuery("empresa", $dados);
    var_dump($Result);
?>
