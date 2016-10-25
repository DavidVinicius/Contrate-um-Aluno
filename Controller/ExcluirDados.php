<?php

    if(isset($_POST['tabela']) == "formacoes")
    {
        require_once("../Model/ModelFormacoes.class.php");
        $idAluno      = isset($_POST['idAluno'])        ?   $_POST['idAluno']:null;
        $Formacao     = new Formacoes();
        $Formacao->DeleteFormacoes("where codAluno = $idAluno");
    } else if(isset($_POST['tabela']) == "telefones")
    {
        require_once("../Model/ModelTelefones.class.php");
        $codUsuario     = $_SESSION['id'];
        $Telefone       = new Telefones();
        $Telefone->DeleteTelefones("where codUsuario = $codUsuario");
    }  else if(isset($_POST['tabela']) == "experiencias")
    {
        require_once("../Model/ModelExperiencias.class.php");
        $idAluno        = isset($_POST['idAluno'])        ?   $_POST['idAluno']:null;
        $Experiencia    = new Experiencias();
        $Experiencia->DeleteExperiencias("where codAluno = $idAluno");
    }

?>