<?php
    session_start();
    include_once("../Model/DataBase.class.php");

    class Login
    {
        function __construct($User, $Pass)
        {
            $BD = new DataBase();
            $Result = $BD->SearchQuery("usuario", "WHERE email = '$User' AND senha = '$Pass'");
            $Data   = mysqli_fetch_assoc($Result);
            if($Result){
                $_SESSION["User"]= $User;
                $_SESSION["Pass"]= $Pass;
                $_SESSION["ID"]  = $Data["id"];
                echo "<script>alert('Logado com sucesso!');</script>";
                header("Location: ../OnePage.php");
            } else{
                unset($_SESSION["User"]);
                unset($_SESSION["Pass"]);
                unset($_SESSION["ID"]);
                echo "<script>alert('Erro ao logar');</script>";
                header("Location: ../Index.php");
            }
        }
    }

?>