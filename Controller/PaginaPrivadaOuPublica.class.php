<?php
    /**
        Se o método PrivadaOuPublica retornar false,
        significa que o usuário não está logado.
        ***Tratamento do false é feita na implementação
    */
    class PaginaPrivadaOuPublica{

        public function PrivadaOuPublica(){
            $usuario= isset($_SESSION['usuario'])   ? $_SESSION['usuario']  : null;
            $senha  = isset($_SESSION['senha'])     ? $_SESSION['senha']    : null;
            $id     = isset($_SESSION['id'])        ? $_SESSION['id']       : null;
            $nivel  = isset($_SESSION['nivel'])     ? $_SESSION['nivel']    : null;

            if(!$usuario or !$senha or !$id or !$nivel ){
                return false;
            }else
                return true;
        }

    }

?>