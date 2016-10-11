<?php
    include "ManipulaVarSession.class.php";
    class VerificaSeEstaLogado
    {

        public function EstaLogado()
        {

            if( (!isset($_SESSION['usuario'])) and ( !isset($_SESSION['senha']) ) and ( !isset($_SESSION['id'])) )
            {
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['id']);
                return false;
            }else
                return true;
        }

    }

?>