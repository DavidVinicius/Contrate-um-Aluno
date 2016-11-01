<?php
    include "./../Model/Database.class.php";
    include "ManipulaVarSession.class.php";

    session_start();
    $id = $_SESSION['id'];
    $VarSession = new ManipulaVarSession();

    $Banco = new DataBase();
    $Campo            = isset($_REQUEST['campo'])?$_REQUEST['campo']:null;
    $ValorDeAlteracao = isset($_REQUEST['dado'])?$_REQUEST['dado']:null;

    $Alteracao = $Banco -> UpdateQuery('usuario', $Campo, $ValorDeAlteracao, "WHERE idUsuario = $id");

    if($Alteracao){
        $Consulta = $Banco -> SearchQuery('usuario', "WHERE idUsuario = $id");
        $Assoc = mysqli_fetch_assoc($Consulta);

        //Carrega novos valores para as sessions
        $_SESSION['usuario'] = $Assoc['email'];$_SESSION['senha']  = $Assoc['senha'];
        $_SESSION['nivel'] = $Assoc['nivel'];$_SESSION['id'] = $Assoc['idUsuario'];

        //Deleta os valores antigos
        $VarSession->DeleteVarSession();

        //Seta os valores novos
        $VarSession->CreateVarSession($_SESSION['usuario'], $_SESSION['senha'], $_SESSION['id'], $_SESSION['nivel']);
        echo $ValorDeAlteracao;
    }


    if(isset($_POST['alterar']))
    {
            echo "aqui";

    }


    if(isset($_POST['existeCurriculo']))
    {

        $valor           = isset($_POST['valor'])?$_POST['valor']:null;
        $idAluno         = isset($_POST['idAluno'])?$_POST['idAluno']:null;
        $campo           = isset($_POST['campo'])?$_POST['campo']:null;
        $tabela          = isset($_POST['tabela'])?$_POST['tabela']:null;
        $idTelefone      = isset($_POST['idTelefone'])?$_POST['idTelefone']:null;
        $idFormacao      = isset($_POST['idFormacao'])?$_POST['idFormacao']:null;
        $idExperiencia   = isset($_POST['idExperiencia'])?$_POST['idExperiencia']:null;
        $idQualificacoes = isset($_POST['idQualificacoes'])?$_POST['idQualificacoes']:null;
        $idUsuario       = $_SESSION['id'];

        if($tabela == "aluno")
        {
            require_once("../Model/ModelAluno.class.php");
            $Aluno = new ModelAluno();
            $Aluno->UpdateAluno($campo,$valor,"where idAluno = $idAluno");
            echo "$idTelefone";

        }

         if($tabela == "telefones")
        {
            require_once("../Model/ModelTelefones.class.php");
            $Telefone = new Telefones();
            $Telefone->UpdateTelefones($campo, $valor, "where codUsuario = $idUsuario and idTelefone = $idTelefone");
            echo "deu certo";
        }

        if($tabela == "enderecos")
        {
            require_once("../Model/ModelEnderecos.class.php");
            $Endereco = new Enderecos();
            $Endereco->UpdateEnderecos($campo, $valor, "Where codUsuario = $idUsuario");
            echo "deu certo";
        }

        if($tabela == "formacoes")
        {
            require_once("../Model/ModelFormacoes.class.php");
            $Formacao = new Formacoes();
            $Formacao->UpdateFormacoes($campo,$valor,"where codAluno = $idAluno and idFormacao = $idFormacao");
            echo "deu certo";
        }

        if($tabela == "qualificacoes")
        {
            require_once "../Model/ModelQualificacoes.class.php";
            $Qualificacao = new ModelQualificacoes();
            $Qualificacao->UpdateQualificacoes($campo, $valor, "where codAluno = $idAluno and idQualificacoes = $idQualificacoes");
        }

        if($tabela == "experiencias")
        {
            require_once "../Model/ModelExperiencias.class.php";
            $Experiencia = new Experiencias();
            if($Experiencia->UpdateExperiencias($campo, $valor, "where codAluno = $idAluno and idExperiencia = $idExperiencia"))
            {
              echo "deu certo";
            }
        }

    }
?>
