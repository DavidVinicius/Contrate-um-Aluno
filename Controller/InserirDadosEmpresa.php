<?php
  session_start();
  if(isset($_POST['existeEmpresa'])){
    $tabela     = isset($_POST['tabela'])?$_POST['tabela']:null;
    $idUsuario  = $_SESSION['id'];


    if($tabela == "telefones")
      {
        include_once "../Model/ModelTelefones.class.php";
        $Telefone = new Telefones();
        $tipo     = isset($_POST['tipo'])?$_POST['tipo']:null;
        $telefone = isset($_POST['telefone'])?$_POST['telefone']:null;
        $dados = array(
            "tipo"        => $tipo,
            "telefone"    => $telefone,
            "codUsuario"  => $idUsuario
        );
        if ($Telefone->CreateTelefones($dados)) {
              echo "deu certo";
        }
      }

      if($tabela == "valores")
      {
        include_once "../Model/ModelValores.class.php";
        $Valor = new Valores();
        $idEmpresa = isset($_POST['idEmpresa'])?$_POST['idEmpresa']:null;
        $valor     = isset($_POST['valor'])?$_POST['valor']:null;
        $dados = array(
          "valor"      => $valor,
          "codEmpresa" => $idEmpresa,
        );
        if($Valor->CreateValores($dados))
            echo "deu certo";
      }
  }


 ?>
