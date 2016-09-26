<?php
    include "./../Model/Database.class.php";
    session_start();
    $id = $_SESSION['id'];
    
    $Banco = new DataBase();
    $Campo            = isset($_REQUEST['campo'])?$_REQUEST['campo']:null;
    $ValorDeAlteracao = isset($_REQUEST['dado'])?$_REQUEST['dado']:null;

    $Alteracao = $Banco -> UpdateQuery('usuario', $Campo, $ValorDeAlteracao, "WHERE idUsuario = $id");

    if($Alteracao){
        echo $ValorDeAlteracao;
    }
    else{
        echo "Erro no AlterarDados.php";
    }
    
    
    


?>