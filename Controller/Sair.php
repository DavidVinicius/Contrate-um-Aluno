<?php

    session_start();
    session_unset($_SESSION['usuario']);
    session_unset($_SESSION['senha']);
    session_destroy();
    
    header("Location:./../Index.php");
        
?>