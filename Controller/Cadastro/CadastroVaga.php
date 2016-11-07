<?php
    session_start();
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");

    $DB = new DataBase();
    //$VerificaSeEstaLogado = new VerificaSeEstaLogado();
    //$VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $tabela     = "vaga";
    $id         = $_SESSION['id'];
    $resultado  = $DB->SearchQuery("empresa", "WHERE codUsuario = {$id}");
    $arrayDados = mysqli_fetch_assoc($resultado);
    $codEmpresa = $arrayDados['idEmpresa'];

    $dados = array(
        "titulo"        => (isset($_POST["titulo"])) ? $_POST["titulo"] : $msg,
        "descricao"     => (isset($_POST["descricao"])) ? $_POST["descricao"] : $msg,
        "cargaHoraria"  => (isset($_POST["cargaHoraria"])) ? $_POST["cargaHoraria"] : $msg,
        "salario"       => (isset($_POST["salario"])) ? $_POST["salario"] : $msg,
        "requisitos"    => (isset($_POST["requisitos"])) ? $_POST["requisitos"] : $msg,
        "codEmpresa"    => $codEmpresa
    );

    $resultado = $DB->InsertQuery($tabela, $dados);

    if($resultado){
        echo "<script>
                    window.location.href = '../../OnePage.html';
                    alert('".$Sucess."');
                </script>";
    }
    else{
        echo "<script>
                    window.location.href = '../../OnePage.html';
                    alert('".$Failed."');
                </script>";
    }
?>
