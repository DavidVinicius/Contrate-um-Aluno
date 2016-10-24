<?php

    if(isset($_POST['tabela']))
    {
        require_once("../Model/ModelFormacoes.class.php");
        $idAluno      = isset($_POST['idAluno'])?$_POST['idAluno']:null;
        $anoConclusao = isset($_POST['anoConclusao'])?$_POST['anoConclusao']:null;
        $instituicao  = isset($_POST['instituicao'])?$_POST['instituicao']:null;
        $curso        = isset($_POST['curso'])?$_POST['curso']:null;
        $Formacao     = new Formacoes();
        $dados = array(
            "anoConclusao" => $anoConclusao,
            "instituicao"  => $instituicao,
            "curso"        => $curso,
            "codAluno"     => $idAluno
        );
        if($Formacao->CreateFormacoes($dados))
        {
            echo "certo";
        }
        else{
            echo "erro";
        }
    }


?>