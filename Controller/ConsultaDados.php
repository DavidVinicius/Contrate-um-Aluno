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

     

?>