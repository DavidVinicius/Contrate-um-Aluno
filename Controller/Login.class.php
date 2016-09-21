<?php
    include_once("../Model/DataBase.class.php");
    include_once("CreateVarSessions.class.php");
    session_start();
    class Login
    {
        function __construct($User, $Pass)
        {
            $BD = new DataBase();
            $Result = $BD -> SearchQuery("usuario", "WHERE email = '{$User}' AND senha = '{$Pass}'");
            $Data   = mysqli_fetch_assoc($Result);
            if(mysqli_num_rows($Result) > 0){
//                $_SESSION["User"]= $User;
//                $_SESSION["Pass"]= $Pass;
//                $_SESSION["ID"]  = $Data["idUsuario"];
                $Sessions = new CreateVarSessions();
                $id = $Sessions -> getSessionId();
                echo "<script>
                        window.location.href='../OnePage.php';
                        alert('Logado com sucesso!');</script>";
//                header("Location: ../OnePage.php");
            } else{
                unset($_SESSION["User"]);
                unset($_SESSION["Pass"]);
                unset($_SESSION["ID"]);
                echo "<script>
                    window.location.href = '../Index.php'
                    alert('Erro ao logar');</script>";
//                header("Location: ../Index.php");
            }
        }
    }

?>