<?php
    /**
        Se a página for pública o retorno será true,
        mas se a página for privada, irá retornar true.
    */
    class PaginaPrivada{
        public function PaginaEPrivadaOuPublica(){
            $usuario= isset($_SESSION['usuario'])   ? $_SESSION['usuario']  : null;
            $senha  = isset($_SESSION['senha'])     ? $_SESSION['senha']    : null;
            $id     = isset($_SESSION['id'])        ? $_SESSION['id']       : null;

            if( $usuario == null || $senha == null || $nivel == null)
                return false;
            else
                return true;
        }
    }

?>