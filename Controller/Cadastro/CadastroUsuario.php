<?php
    include("../Banco/funcoesBanco.php");

    $tabela = "usuario";
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    if($senha == $senha2){
        $dados = array(
            "email" => (isset($_POST["email"])) ? $_POST["email"] : $msg,
            "senha" => (isset($_POST["senha"])) ? $_POST["senha"] : $msg,
            "nivel" => (isset($_POST["valor"])) ? $_POST["valor"] : $msg
        );

        $resultado = InsertQuery($tabela, $dados);

        if($resultado){
            echo "<script>
                    window.location.href = '../onePage.html'; 
                    alert('".$sucesso."');
                </script>";
        }else{
            echo "<script>
                    window.location.href = '../onePage.html';
                    alert('".$falha."');
                </script>";
        }

    } else {
        echo "<script>
                    window.location.href = '../onePage.html'; 
                    alert('Senhas não correspondem');
                </script>";
    }


?>