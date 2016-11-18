<?php
include "./../Model/Database.class.php";
    if(isset($_POST['dado']))
    {
        $VerificarSeExisteEmail = new Database();
        $teste = isset($_POST['dado'])?$_POST['dado']:null;

        $consulta = $VerificarSeExisteEmail -> SearchQuery("usuario","WHERE email = '$teste'");
        $result = mysqli_fetch_assoc($consulta);

        if(mysqli_num_rows($consulta) > 0){
            echo 1;
        }else{
            echo 0;    
        }
    }
    if(isset($_POST['excluirAngularFormacao']) == "sim")
    {
        $idAluno = isset($_POST['idAluno'])?$_POST['idAluno']:null;
        
        $DB = new Database();
        $Consulta = $DB->SearchQuery("select idFormacao from formacoes where codAluno = $idAluno order by idFormacao DESC limit 1");
        
        $pegaUltimoId = mysqli_fetch_assoc($Consulta);
        
        echo $pegaUltimoId['idFormacao'];
            
            
    }

     

?>