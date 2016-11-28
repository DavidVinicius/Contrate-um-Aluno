<?php
    /**
        Implementação: Se o método "PaginaEPrivadaOuPublica()"
        retorna true se a página for true, e false se a
        página for privada.
    */
    session_start();
    
    require_once "PaginaPrivada.class.php";

    $pagina = new PaginaPrivada();

    if(!$pagina->PaginaEPrivadaOuPublica)
        header("location: ../../Index.php");
    
?>