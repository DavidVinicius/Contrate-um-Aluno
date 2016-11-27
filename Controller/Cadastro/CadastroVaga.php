<?php
    session_start();
    include_once("../VerificaSeEstaLogado.class.php");
    include_once("../../Model/DataBase.class.php");

    require_once "../../Model/ModelBeneficiosVaga.class.php";
    require_once "../../Model/ModelVaga.class.php";
    $DB        = new DataBase();
    $Beneficio = new ModelBeneficiosVaga();
    $Vaga      = new ModelVaga();
    //$VerificaSeEstaLogado = new VerificaSeEstaLogado();
    //$VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $msg        = "Não informado";
    $tabela     = "vaga";
    $id         = $_SESSION['id'];
    $resultado  = $DB->SearchQuery("empresa", "WHERE codUsuario = {$id}");
    $arrayDados = mysqli_fetch_assoc($resultado);
    $codEmpresa = $arrayDados['idEmpresa'];
    $beneficios   = json_decode($_POST['beneficios'],true);
    $dados = array(
        "titulo"        => (isset($_POST["titulo"])) ? $_POST["titulo"] : $msg,
        "descricao"     => (isset($_POST["descricao"])) ? $_POST["descricao"] : $msg,
        "cargaHoraria"  => (isset($_POST["cargaHoraria"])) ? $_POST["cargaHoraria"] : $msg,
        "salario"       => (isset($_POST["salario"])) ? $_POST["salario"] : $msg,
        "requisitos"    => (isset($_POST["requisitos"])) ? $_POST["requisitos"] : $msg,
        "ativo"         => "S",
        "codEmpresa"    => $codEmpresa
    );

    if ($DB->InsertQuery($tabela, $dados)) {
      echo "cadastrou <br />";
    }else{
      echo "erro <br />";
    }

    $Consulta = mysqli_fetch_assoc($Vaga -> ReadVaga('order by idVaga desc limit 1'));

    $idVaga   = $Consulta['idVaga'];


    for($i = 0; $i < count($beneficios); $i++){
        $dados22 = array(
            "beneficio"     => $beneficios[$i]['tag'],
            "codVaga"       => $idVaga
        );
      if ($InsertBeneficios = $Beneficio->CreateBeneficiosVaga($dados22)) {
            echo "sucesso";
      }
    }

?>
