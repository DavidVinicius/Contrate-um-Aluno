<?php

if(isset($_POST['tabela']) && $_POST['tabela'] == "aluno"){
    require_once("../Model/ModelAluno.class.php");
    $idAluno  = isset($_POST['idAluno'])  ? $_POST['idAluno']:null;
    $aluno  = new ModelAluno();

    $aluno->UpdateAluno("ativo", "", "where idAluno = $idAluno");
    // if($aluno->UpdateAluno("ativo", "N", "where idAluno = $idAluno"))
    // {
    //     echo "Update deu certo";
    // } else{
    //     echo "Update falhou".var_dump($aluno->UpdateAluno("ativo", "N", "where idAluno = $idAluno"));
    // }
}

if(isset($_POST['tabela']) && $_POST['tabela'] == "empresa"){
    require_once("../Model/ModelEmpresa.class.php");
    $idEmpresa  = isset($_POST['idEmpresa'])  ? $_POST['idEmpresa']:null;
    $empresa  = new ModelEmpresa();

    $empresa->UpdateEmpresa("ativo", " ", "where idEmpresa = $idEmpresa");
    // if()
    // {
    //     echo "Update deu certo";
    // } else{
    //     echo "Update falhou";
    // }
}

if(isset($_POST['tabela']) && $_POST['tabela'] == "usuario"){
    require_once("../Model/ModelUsuario.class.php");
    $idUsuario  = isset($_POST['idUsuario'])  ? $_POST['idUsuario']:null;
    $usuario  = new ModelUsuario();

    // $usuario->UpdateUsuario("ativo", "N", "where idAluno = $idAluno");
    if($usuario->UpdateUsuario("ativo", " ", "where idUsuario = $idUsuario"))
    {
        echo "Update deu certo";
    } else{
        echo "Update falhou ";
    }
}
 ?>
