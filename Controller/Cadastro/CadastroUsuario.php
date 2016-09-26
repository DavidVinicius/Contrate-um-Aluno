<?php
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");
    include_once("../CreateVarSessions.class.php");
    $DB = new DataBase();
//    $VerificaSeEstaLogado = new VerificaSeEstaLogado();
//    $VarSessions = $VerificaSeEstaLogado->EstaLogado();
    $msg =123; // Alterar esse valor
    $tabela = "usuario";
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    if($senha == $senha2){
        $dados = array(
            "email" => (isset($_POST["email"])) ? $_POST["email"] : $msg,
            "senha" => (isset($_POST["senha"])) ? $_POST["senha"] : $msg,
            "nivel" => (isset($_POST["valor"])) ? $_POST["valor"] : $msg
        );

        $resultado = $DB -> InsertQuery($tabela, $dados);

        if($resultado){
            echo "<script>
                    window.location.href = '../../Index.php'; 
                    alert('". $Success."');
                </script>";
        }else{
            echo "<script>
                    window.location.href = '../../Index.php';
                    alert('". $Failed."');
                </script>";
        }

    } else {
        echo "<script>
                    window.location.href = '../../Index.php'; 
                    alert('Senhas não correspondem');
                </script>";
    }


?>