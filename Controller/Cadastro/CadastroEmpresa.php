<?php
    session_start();
    include_once("../../Model/DataBase.class.php");

    $DB = new DataBase();
    $idUsuario = $_SESSION['id'];

    $Telefones  = json_decode($_POST['Telefones'],true);
    $Valores    = json_decode($_POST['valores'],true);

    if(isset($_FILES['foto'])){
        $nomeTemporario = $_FILES['foto']['tmp_name']; #O nome temporário com o qual o arquivo
        $diretorio      = "../../Images/Upload/";
        $extensao       = strtolower(substr($_FILES['foto']['name'], -4));
        $novoNome       = md5(time()).$extensao;

        $localFull = $diretorio.$novoNome;
        if(move_uploaded_file($nomeTemporario, $localFull))#Move o arquivo temporário para pasta
            echo "Upou a foto<br>";
        else
            echo "Erro ao upar a foto<br>";
    } else {
        $novoNome = "PerfilPadrao.png";
    }

    for($i = 0; $i < count($Telefones); $i++){
        $dados = array(
            "telefone"      => $Telefones[$i]['telefone'],
            "tipo"          => $Telefones[$i]['tipo'],
            "codUsuario"    => $_SESSION['id']
        );
        $Result22 = $DB->InsertQuery("telefones",$dados);
    }

    $dados22 = array(
      "numero"      => $_POST['numero'],
      "rua"         => $_POST['rua'],
      "bairro"      => $_POST['bairro'],
      "cidade"      => $_POST['cidade'],
      "estado"      => $_POST['estado'],
      "cep"         => $_POST['cep'],
      "complemento" => $_POST['complemento'],
      "codUsuario"  => $_SESSION['id']
    );

    $DB->InsertQuery("enderecos", $dados22);

    $dados = array(
      "nome"        => $_POST['nome'],
      "cnpj"        => $_POST['cnpj'],
      "areaAtuacao" => $_POST['areaAtuacao'],
      "foto"        => $novoNome,
      "missao"      => $_POST['missao'],
      "visao"       => $_POST['visao'],
      "historia"    => $_POST['historia'],
      "codUsuario"  => $_SESSION['id']
    );
    $Result = $DB->InsertQuery("empresa", $dados);

    $consultaEmpresa = $DB->SearchReturnLast("empresa", "where codUsuario = $idUsuario", "idEmpresa");
    $idEmpresa = $consultaEmpresa['idEmpresa'];

    for($i = 0; $i < count($Valores); $i++){
        $dados1 = array(
          "valor"     => $Valores[$i]['tag'],
          "codEmpresa"=> $idEmpresa
        );
        $Result2 = $DB->InsertQuery("valores", $dados1);
    }

    header("location:../../OnePage.php?link=VerEmpresa");
?>
