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
    
    


?>