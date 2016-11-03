<?php
session_start();
if (isset($_POST['existeEmpresa'] )) {
   $idEmpresa   = isset($_POST['idEmpresa'])?$_POST['idEmpresa']:null;
   $idUsuario   = $_SESSION['id'];
   $idTelefone  = isset($_POST['idTelefone'])?$_POST['idTelefone']:null;
   $idValor     = isset($_POST['idValor'])?$_POST['idValor']:null;
   $tabela      = isset($_POST['tabela'])?$_POST['tabela']:null;
   $campo       = isset($_POST['campo'])?$_POST['campo']:null;
   $valor       = isset($_POST['valor'])?$_POST['valor']:null;


   if ($tabela == "empresa") {
        include_once "../Model/ModelEmpresa.class.php";
        $Empresa = new ModelEmpresa();
        if($Empresa->UpdateEmpresa($campo, $valor, "where codUsuario = $idUsuario"))
        {

           echo "deu certo";
        }
   }

   if ($tabela == "enderecos") {
     include_once "../Model/ModelEnderecos.class.php";
     $Endereco = new Enderecos();
     if ($Endereco->UpdateEnderecos($campo,$valor,"where codUsuario = $idUsuario")) {
           echo "deu certo";
     }
     # code...
   }

   if ($tabela == "telefones") {
     include_once "../Model/ModelTelefones.class.php";
     $Telefone = new Telefones();
     if ($Telefone->UpdateTelefones($campo,$valor,"where idTelefone = $idTelefone and codUsuario = $idUsuario")) {

       echo "deu certo";
     }
   }

   if ($tabela == "valores") {
     include_once "../Model/ModelValores.class.php";
     $Valor = new Valores();
     if ($Valor->UpdateValores($campo, $valor,"where idValores = $idValor")) {
       echo "deu certo valores $valor";
     }


   }



}
if(isset($_POST['existeFoto']))
{
  if(isset($_FILES['foto'])){
      $nomeTemporario = $_FILES['foto']['tmp_name']; #O nome temporário com o qual o arquivo
      $diretorio      = "../Images/Upload/";
      $extensao       = strtolower(substr($_FILES['foto']['name'], -4));
      $novoNome       = md5(time()).$extensao;
      $localFull = $diretorio.$novoNome;
      if(move_uploaded_file($nomeTemporario, $localFull))#Move o arquivo temporário para pasta
      {
        require_once "../Model/ModelEmpresa.class.php";
        $Empresa          = new ModelEmpresa();
        $idUsuario        =   $_SESSION['id'];
        $consultaEmpresa  = mysqli_fetch_assoc($Empresa->ReadEmpresa("where codUsuario = $idUsuario"));
        $nomeAntigo       =  $consultaEmpresa['foto'];
        echo $nomeAntigo;
        if ($Empresa->UpdateEmpresa('foto', $novoNome ,"where codUsuario = $idUsuario")) {
             echo "foto subiu para a pasta e guardou o nome no banco";
             unlink("../Images/Upload/$nomeAntigo");
        }
      }
      else{
          echo "Erro ao upar a foto<br>";
      }
  } else {
      require_once "../Model/ModelEmpresa.class.php";
      $Empresa = new ModelEmpresa();
      $idUsuario = $_SESSION['id'];
      $consultaEmpresa  = mysqli_fetch_assoc($Empresa->ReadEmpresa("where codUsuario = $idUsuario"));
      $nomeAntigo       = $consultaEmpresa['foto'];
      $novoNome = "PerfilPadrao.png";
      if ($Empresa->UpdateEmpresa('foto', $novoNome ,"where codUsuario = $idUsuario")) {
           echo "guardou o nome no banco";
           unlink("Images/Upload/$nomeAntigo");

      }
  }
}


?>
