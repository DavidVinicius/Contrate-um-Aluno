<?php
  require_once "Model/ModelEntrevistas.class.php";
  require_once "Model/ModelEmpresa.class.php";
  $Entrevista      = new ModelEntrevistas();
  $Empresa         = new ModelEmpresa();
  $idUsuario       = $_SESSION['id'];
  $ConsultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa       = $ConsultEmpresa->idEmpresa;
  if (mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"))){

      $ConsultaNum = mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"));
  }
  else{
    $ConsultaNum = 0;
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="row">
        <h1 class="center-align flow-text">Notificações</h1>
      </div>
      <div class="row">
        <div class="col s12 m12">

            <h1 class="center-align flow-text">Entrevistas marcadas</h1>
            <ul class="collection">
              <?php if ($ConsultaNum > 0):
                  require_once "Model/ModelAluno.class.php";
                ?>
                <li class="avatar hoverable collection-item ">
                  <div class="col s4 m1">
                    <img src="Images/Padrao/PerfilPadrao.png" alt="" class="circle" />
                     <button data-target="" class="secondary-content modal-trigger btn-flat btn-large waves-effect waves-light">
                        <i class="material-icons blue-text">add</i>
                    </button>
                  </div>
                  <div class="col s8 m8 pull-m1">
                    <span class="title">de: </span>
                    <br>
                      <span class="flow-text"> </span>

                  </div>
                </li><br>
              <?php endif; ?>


            </ul>

        </div>
      </div>
    </div>
</body>
</html>
