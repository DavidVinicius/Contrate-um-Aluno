<?php
  session_start();
    if(isset($_POST['tabela']) && $_POST['tabela'] == "formacoes")
    {
        require_once("../Model/ModelFormacoes.class.php");
        $idLinha     = isset($_POST['idLinha'])  ? $_POST['idLinha']:null;
        $Formacao    = new Formacoes();

        if($Formacao->DeleteFormacoes("where idFormacao = $idLinha"))
        {
            echo 1;
        }
    }

    if(isset($_POST['tabela']) && $_POST['tabela'] == "usuario"){
        require_once("../Model/ModelUsuario.class.php");
        $idUsuario  = isset($_POST['idUsuario'])  ? $_POST['idUsuario']:null;
        $usuario  = new ModelUsuario();

        // $usuario->UpdateUsuario("ativo", "N", "where idAluno = $idAluno");
        if($usuario->UpdateUsuario("ativo", "N", "where idUsuario = $idUsuario"))
        {
            echo "Update deu certo";
        } else{
            echo "Update falhou ";
        }
    }

    if(isset($_POST['tabela']) && $_POST['tabela'] == "aluno"){
        require_once("../Model/ModelAluno.class.php");
        $idAluno  = isset($_POST['idAluno'])  ? $_POST['idAluno']:null;
        $aluno  = new ModelAluno();

        $aluno->UpdateAluno("ativo", "N", "where idAluno = $idAluno");
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

        $empresa->UpdateEmpresa("ativo", "N", "where idEmpresa = $idEmpresa");
        // if()
        // {
        //     echo "Update deu certo";
        // } else{
        //     echo "Update falhou";
        // }
    }

    if(isset($_POST['tabela']) && $_POST['tabela'] == "experiencias")
    {
        require_once("../Model/ModelExperiencias.class.php");
        $idLinha        = isset($_POST['idLinha'])?$_POST['idLinha']:null;
        $Experiencia    = new Experiencias();
        if($Experiencia -> DeleteExperiencias("where idExperiencia = $idLinha"))
        {
            echo 1;
        }
    }

     if(isset($_POST['tabela']) && $_POST['tabela'] == "telefones")
    {
        require_once("../Model/ModelTelefones.class.php");
        $codUsuario     = $_SESSION['id'];
        $idTelefone     = isset($_POST['idTelefone'])?$_POST['idTelefone']:null;
        $Telefone       = new Telefones();
        $Telefone->DeleteTelefones("where idTelefone = $idTelefone");
    }
    if (isset($_POST['tabela']) && $_POST['tabela'] = "qualificacoes") {
      # code...
      require_once("../Model/ModelQualificacoes.class.php");
      $idQualificacoes = isset($_POST['idQualificacoes'])?$_POST['idQualificacoes']:null;
      $Qualificacao = new ModelQualificacoes();
      if($Qualificacao -> DeleteQualificacoes("Where idQualificacoes = $idQualificacoes"))
      {
        echo "deu certo";
      }


    }
    else{
        echo "erro";
    }



?>
