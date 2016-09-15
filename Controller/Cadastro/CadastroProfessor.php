<?php
    include("../Banco/funcoesBanco.php");

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
                    alert('".$sucesso."');
                </script>";
    }
    else{
        echo "<script>
                    alert('".$falha."');
                </script>";
    }
?>