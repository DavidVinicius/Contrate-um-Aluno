<?php

    session_start();
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");

    $DB = new DataBase();
    $idUsuario = $_SESSION['id'];
    //var_dump($idUsuario);

    if(isset($_FILES['foto'])){
        $nomeTemporario = $_FILES['foto']['tmp_name']; #O nome temporário com o qual o arquivo
        $diretorio = "../Images/Upload/";
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novoNome = md5(time()).$extensao;

        $localFull = $diretorio.$novoNome;
        if(move_uploaded_file($nomeTemporario, $localFull))#Move o arquivo temporário para pasta
            echo "Upou a foto<br>";
        else
            echo "Erro ao upar a foto<br>";
    } else {
        $novoNome = "PerfilPadrao.png";
    }

    //Transforma de Json em matriz
    $Telefones      = json_decode($_POST['Telefones'],true);
    $Experiencias   = json_decode($_POST['Experiencias'],true);
    $Formacoes      = json_decode($_POST['Formacoes'],true);
    $Qualificaoes   = json_decode($_POST['Qualificacoes'],true);

    //Cadastro alunos
    $qual = "";
    for($i = 0; $i < count($Qualificaoes); $i++){
        if($i == 0)
            $qual = $Qualificaoes[$i]['tag'];
        else
            $qual .= ", ".$Qualificaoes[$i]['tag'];
    }

    $dadosAluno  = array(
        "dataNascimento"            => $_POST["dataNascimento"],
        "informacoesAdicionais"     => $_POST["informacoesAdicionais"],
        "foto"                      => $novoNome,
        "nome"                      => $_POST["nome"],
        "cpf"                       => $_POST["cpf"],
        "objetivo"                  => $_POST["objetivo"],
        "rg"                        => $_POST["rg"],
        "codUsuario"                => $_SESSION['id']
    );
    $CadastraAluno = $DB->InsertQuery("aluno", $dadosAluno);

    $consultaAluno = $DB->SearchQuery("aluno", "where codUsuario = $idUsuario");
    $fetchAluno = mysqli_fetch_assoc($consultaAluno);
    $codAluno = $fetchAluno['idAluno'];
    echo "ID do aluno: ";
    //   var_dump($codAluno);

    //Cadastro experiências
    for($i = 0; $i < count($Experiencias);$i++){
        if($Experiencias[$i]['ate'] == "Emprego atual")
            $Experiencias[$i]['ate'] = null;

        $dados = array(
            "descricao"     => $Experiencias[$i]['texto'],
            "dataInicio"    => $Experiencias[$i]['de'],
            "dataSaida"     => $Experiencias[$i]['ate'],
            "cargo"         => $Experiencias[$i]['cargo'],
            "codAluno"      => $codAluno
        );
        $Result22 = $DB->InsertQuery("experiencias", $dados);
        //var_dump($Result22);
    }

    //Cadastro qualificações
    for($i = 0; $i < count($Qualificaoes);$i++){
        $dados = array(
            "competencia" => $Qualificaoes[$i]['tag'],
            "codUsuario" => $_SESSION['id']
        );
        $Result22 = $DB->InsertQuery("qualificacoes", $dados);
    }

    //Cadastro telefones
    for($i = 0; $i < count($Telefones); $i++){
        $dados = array(
            "telefone"      => $Telefones[$i]['telefone'],
            "tipo"          => $Telefones[$i]['tipo'],
            "codUsuario"    => $_SESSION['id']
        );
        $Result22 = $DB->InsertQuery("telefones",$dados);
    }

    //Cadastro endereço
    $endereco = array(
        "numero"            => $_POST['numero'],
        "rua"               => $_POST['rua'],
        "bairro"            => $_POST['bairro'],
        "cidade"            => $_POST['cidade'],
        "estado"            => $_POST['estado'],
        "cep"               => $_POST['cep'],
        "complemento"       => $_POST['complemento'],
        "codUsuario"        => $_SESSION['id']
    );
    $nomeQueQuiser = $DB->InsertQuery('enderecos',$endereco);

    //Cadastro formações
    for($i = 0; $i < count($Formacoes); $i++){
        $formacao = array(
            "anoConclusao"      => $Formacoes[$i]['ano'],
            "curso"             => $Formacoes[$i]['curso'],
            "instituicao"       => $Formacoes[$i]['instituicao'],
            "codAluno"          => $codAluno
        );
        $insert = $DB->InsertQuery("formacoes", $formacao);
    }

    header("location:OnePage.php?link=VerCurriculo");
?>
