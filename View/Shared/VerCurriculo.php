<?php
    //require_once "../../Model/DataBase.class.php";
    require_once "Model/ModelAluno.class.php";

    $id = $_SESSION['id'];
    //$DB = new DataBase();
    $Aluno = new ModelAluno();
    $Result = $Aluno->ReadAluno("WHERE codUsuario = $id");

    if(mysqli_num_rows($Result) > 0)
        require_once "MostraCurriculo.php"; //Página que não deixa ele cadastrar aluno novo
    else
        require_once "Curriculo.php";//Pode cadastrar um aluno
?>
