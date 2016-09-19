<?php
    include "../Model/DataBase.class.php";
    include "CreateVarSessions.class.php";
    $RealizaLogin = new DataBase();
    session_start();
    

    $usuario    = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
    $senha      = (isset($_POST['senha'])) ? $_POST['senha'] : null;


    $consulta = $RealizaLogin -> SearchQuery("usuario","WHERE email = '$usuario' AND senha = '$senha'");

//    $consulta   = Select("usuario", "WHERE email = '$usuario' AND senha = '$senha'");
    $assoc      = mysqli_fetch_assoc($consulta);
    $id         = $assoc['idUsuario'];
    $nivel      = $assoc['nivel'];

    if(mysqli_num_rows($consulta) > 0){
        
    $CriarVariavesDeSessao = new CreateVarSessions();
        $CriarVariavesDeSessao -> setSessionUsuario($usuario);
        $CriarVariavesDeSessao -> setSessionSenha($senha);
        $CriarVariavesDeSessao -> setSessionID($id);
        $CriarVariavesDeSessao -> setSessionNivel($nivel);
//        
//        $_SESSION['usuario'] = $usuario;
//        $_SESSION['senha']   = $senha;
//        $_SESSION['id']      = $id;
//        $_SESSION['nivel']   = $nivel;
        header("Location:./../OnePage.php");
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        unset($_SESSION['id']);
        unset($_SESSION['nivel']);
        echo "<script>
                    window.location.href = '../Index.php'; 
                    alert('Usuário e/ou senhas incorretos');
                </script>";
    }

?>