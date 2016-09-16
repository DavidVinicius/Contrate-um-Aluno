<?php
    session_start();
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");
    include_once("../CreateVarSessions.class.php");

    $VerificaSeEstaLogado = new VerificaSeEstaLogado();
    $VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $tabela     = "vaga";
    $id         = $_SESSION['id'];
    $resultado  = Select("empresa", "WHERE codUsuario = {$id}");
    $arrayDados = mysqli_fetch_assoc($resultado);
    $codEmpresa = $arrayDados['idEmpresa'];

    $dados = array(
        "titulo"        => (isset($_POST["titulo"])) ? $_POST["titulo"] : $msg,
        "descricao"     => (isset($_POST["descricao"])) ? $_POST["descricao"] : $msg,
        "cargaHoraria"  => (isset($_POST["cargaHoraria"])) ? $_POST["cargaHoraria"] : $msg,
        "salario"       => (isset($_POST["salario"])) ? $_POST["salario"] : $msg,
        "requisitos"    => (isset($_POST["requisitos"])) ? $_POST["requisitos"] : $msg,
        "beneficios"    => (isset($_POST["beneficios"])) ? $_POST["beneficios"] : $msg,
        "codEmpresa"    => $codEmpresa
    );

    $resultado = InsertQuery($tabela, $dados);

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