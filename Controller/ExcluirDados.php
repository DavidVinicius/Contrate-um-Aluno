<?php

    if(isset($_POST['tabela']) == "formacoes")
    {
        require_once("../Model/ModelFormacoes.class.php");
        $idLinha     = isset($_POST['idLinha'])  ? $_POST['idLinha']:null;
        $Formacao    = new Formacoes();
        
        if($Formacao->DeleteFormacoes("where idFormacao = $idLinha"))
        {
            echo 1;
        }
    } 
    
    if(isset($_POST['tabela']) == "experiencias")
    {
        require_once("../Model/ModelExperiencias.class.php");
        $idLinha        = isset($_POST['idLinha'])?$_POST['idLinha']:null;
        $Experiencia    = new Experiencias();
        if($Experiencia -> DeleteExperiencias("where idExperiencia = $idLinha"))
        {
            echo 1;
        }
    }
    else if(isset($_POST['tabela']) == "telefones")
    {
        require_once("../Model/ModelTelefones.class.php");
        $codUsuario     = $_SESSION['id'];
        $Telefone       = new Telefones();
        $Telefone->DeleteTelefones("where codUsuario = $codUsuario");
    }  
    else{
        echo "erro";
    }

    

?>