<?php
    include "./../Model/Database.class.php";
    session_start();
    $id = $_SESSION['id'];
    
    $Banco = new DataBase();
    $Campo            = isset($_POST['campo'])?$_POST['campo']:null;
    $ValorDeAlteracao = isset($_POST['dado'])?$_POST['dado']:null;
    
    $Alteracao = $Banco -> UpdateQuery('usuario', $Campo, $ValorDeAlteracao);
    var_dump($Alteracao);
    if($Alteracao){
        echo $ValorDeAlteracao;
    }
    else{
        echo 0;
        mysqli_error(mysqli_connect("localhost","root","123","tcc"));
    }
    
    
    


?>