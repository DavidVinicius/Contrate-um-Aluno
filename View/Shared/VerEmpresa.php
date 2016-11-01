<?php
    //require_once "../../Model/DataBase.class.php";
    require_once "Model/ModelEmpresa.class.php";

    $id = $_SESSION['id'];
    //$DB = new DataBase();
    $Empresa = new ModelEmpresa();
    $Result = $Empresa->ReadEmpresa("WHERE codUsuario = $id");

    if(mysqli_num_rows($Result) > 0)
        require_once "MostraEmpresa.php"; //Página que não deixa ele cadastrar aluno novo
    else
        require_once "Empresa.php"//Pode cadastrar um aluno
?>
