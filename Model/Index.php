<?php
    include "../Controller/VerificaSeEstaLogado.class.php";

    $Logado = new VerificaSeEstaLogado();
    if($Logado)
        header("Location: ../OnePage.php");
    else
        header("Location: ../Index.php");
?>