<?php
    session_start();
    include_once("Login.class.php");

    $User = $_POST["usuario"];
    $Pass = $_POST["senha"];

    $Login = new Login();
?>