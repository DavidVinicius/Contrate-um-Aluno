<?php
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");
    include_once("../CreateVarSessions.class.php");

    $VerificaSeEstaLogado = new VerificaSeEstaLogado();
    $VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $tabela = "professor";
    $dados = array(
        "nome" => (isset($_POST["nome"])) ? $_POST["nome"] : $msg,
        "email" => (isset($_POST["email"])) ? $_POST["email"] : $msg,
        "formacao" => (isset($_POST["formacao"])) ? $_POST["formacao"] : $msg
    );

    $resultado = InsertQuery($tabela, $dados); #retorna 1 se cadastrou
                                            ####0 se não cadastrou
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