<?php

    if(isset($_POST['existeDados']))
    {
        require_once("../Model/ModelFormacoes.class.php");
        $anoConclusao = isset($_POST['anoConclusao'])?$_POST['anoConclusao']:null;
        $Formacao     = new Formacoes();
        
    }


?>