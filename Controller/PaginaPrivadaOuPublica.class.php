<?php
    /**
        Se a página for pública o retorno será true,
        mas se a página for privada, irá retornar false;
    */
    class PaginaPrivadaOuPublica{
        function __construct(){
            $usuario= isset($_SESSION['usuario'])   ? $_SESSION['usuario']  : null;
            $senha  = isset($_SESSION['senha'])     ? $_SESSION['senha']    : null;
            $id     = isset($_SESSION['id'])        ? $_SESSION['id']       : null;
            $nivel  = isset($_SESSION['nivel'])     ? $_SESSION['nivel']    : null;

            if( $usuario == null || $senha == null || $nivel == null || $id == null)
                return false;
            else
                return true;
        }
    }

?>