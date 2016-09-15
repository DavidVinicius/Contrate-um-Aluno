<?php
    include("../Banco/funcoesBanco.php");
    session_start();

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
                    alert('".$sucesso."');
                </script>";
    }
    else{
        echo "<script>
                    alert('".$falha."');
                </script>";
    }
?>