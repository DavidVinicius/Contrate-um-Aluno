<head>
    <meta charset="utf-8">
</head>
<?php

    session_start(); 
    include_once("../Model/DataBase.class.php");
    include_once("../Util.php");
 
    $DB = new DataBase();
    $idSession = $_SESSION['id'];
    var_dump($idSession);

    $result = $DB->SearchQuery("aluno", "where codUsuario = $idSession");
    $assoc = mysqli_fetch_assoc($result);

    var_dump($assoc);
    $idAluno = $assoc['idAluno'];

    if(isset($_FILES['foto'])){
//        $nomeOriginal   = $_FILES['foto']['name']; #Nome do arquivo original
//        $tipo           = $_FILES['foto']['type']; #O tipo do arquivo
//        $tamanho        = $_FILES['foto']['size']; #Tamanho em bytes
        $nomeTemporario = $_FILES['foto']['tmp_name']; #O nome temporário com o qual o arquivo
//        # enviado foi armazenado no servidor.
//        $codErro        = $_FILES['foto']['error']; #O código de erro associado ao upload do arquivo

        $diretorio = "../Images/Upload/";
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novoNome = md5(time()).$extensao;
        
        $localFull = $diretorio.$novoNome;
        if(move_uploaded_file($nomeTemporario, $localFull))
        {
            echo "deu certo";
        }#Move o arquivo temporário para pasta
        else{
            echo "erro";
        }
    } else {
        //Carregar a foto padrão
    }
    echo "<br>";
    
    $Telefones      = json_decode($_POST['Telefones'],true);
    $Experiencias   = json_decode($_POST['Experiencias'],true);
    $Formacoes      = json_decode($_POST['Formacoes'],true);
    $Qualificaoes   = json_decode($_POST['Qualificacoes'],true);

    var_dump($Qualificaoes);
    //Cadastro alunos
    $dadosAluno  = array(
        "dataNascimento"            => $_POST["dataNascimento"],
        "informacoesAdicionais"     => $_POST["informacoesAdicionais"],
        "foto"                      => $novoNome,
        "nome"                      => $_POST["nome"],
        "cpf"                       => $_POST["cpf"],
        "objetivo"                  => $_POST["objetivo"],
        "qualificacoes"             => $_POST["qualificacoes"],
        "rg"                        => $_POST["rg"],
        "codUsuario"                => $_SESSION['id']
    );
    var_dump($dadosAluno);
    //$CadastraAluno = $DB->InsertQuery("aluno", $dadosAluno);

    //Cadastro experiências
    for($i = 0; $i < count($Experiencias);$i++){
        if($Experiencias[$i]['ate'] == "Emprego atual")
            $Experiencias[$i]['ate'] = null;

        $dados = array(
            "descricao" => $Experiencias[$i]['texto'],
            "dataInicio" => $Experiencias[$i]['de'],
            "dataSaida" => $Experiencias[$i]['ate'],
            "cargo" => $Experiencias[$i]['cargo'],
            "codAluno" => $idAluno);
        //$Result22 = $DB->InsertQuery("experiencias", $dados);
        var_dump($dados);
    }

    for($i = o; $i < count($Qualificaoes); $i++){
        //$Qualificaoes[$i][''];
    }
?>