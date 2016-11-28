<?php
  session_start();
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

    if(isset($_POST['tabela']) == "empresa"){
        require_once("../Model/ModelEmpresa.class.php");
        $idLinha  = isset($_POST['idLinha'])  ? $_POST['idLinha']:null;
        $empresa  = new ModelEmpresa();

        if($empresa->UpdateEmpresa("ativo", "N", "where idEmpresa = $idLinha"))
        {
            echo 1;
        }
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
