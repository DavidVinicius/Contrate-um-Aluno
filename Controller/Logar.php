<?php
    include_once "../Model/DataBase.class.php";
    include_once "CreateVarSessions.class.php";
    include_once "VerificaSeEstaLogado.class.php";
    $RealizaLogin = new DataBase();
    session_start();

    $VerificaLogado = new VerificaSeEstaLogado();

/*  Se estiver logado, irá jogar as variaveis de sessão aqui, caso não, retorna false
    e da um clean nas variáveis de sessão, redireciona pra página inicial

*/
    $VarSessions = $VerificaLogado->EstaLogado();

    //Se estiver logado iremos pegar as variáveis de sessão assim:
    $id     = $VarSessions->getSessionID(); //Pega o ID, que está em $_SESSION["id"];
    $user   = $VarSessions->getSessionUsuario(); //Pega o user ...
    $pass   = $VarSessions->getSessionSenha();
    $nivel  = $VarSessions->getSessionNivel();

/* VOU SUBSTITUIR ISSO AQUI EMBAIXO, COM A CLASSE QUE FIZ
    $usuario    = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
    $senha      = (isset($_POST['senha'])) ? $_POST['senha'] : null;
*/

    $consulta = $RealizaLogin -> SearchQuery("usuario","WHERE email = '$usuario' AND senha = '$senha'");

//    $consulta   = Select("usuario", "WHERE email = '$usuario' AND senha = '$senha'");
    $assoc      = mysqli_fetch_assoc($consulta);
    $id         = $assoc['idUsuario'];
    $nivel      = $assoc['nivel'];

    if(mysqli_num_rows($consulta) > 0){
        
    $CriarVariavesDeSessao = new CreateVarSessions();
//        $CriarVariavesDeSessao -> setSessionUsuario($usuario);
//        $CriarVariavesDeSessao -> setSessionSenha($senha);
//        $CriarVariavesDeSessao -> setSessionID($id);
//        $CriarVariavesDeSessao -> setSessionNivel($nivel);
//        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha']   = $senha;
        $_SESSION['id']      = $id;
        $_SESSION['nivel']   = $nivel;
        header("Location:./../OnePage.php");
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        unset($_SESSION['id']);
        unset($_SESSION['nivel']);
        echo "<script>
                    window.location.href = './../Index.php'; 
                    alert('Usuário e/ou senhas incorretos');
                </script>";
    }

?>