<?php
  include_once "Model/ModelEntrevistas.class.php";
  include_once "Model/ModelAluno.class.php";
  $Aluno            = new ModelAluno();
  $Entrevista       = new ModelEntrevistas();
  $idUsuario        = $_SESSION['id'];
  $ConsultaAluno    = mysqli_fetch_object($Aluno->ReadAluno("where codUsuario = $idUsuario"));
  $idAluno          = $ConsultaAluno->idAluno;
  $ConsultaNum      = mysqli_num_rows($Entrevista->ReadEntrevista("where codAluno = $idAluno"));
  $ConsultaEntrevista = $Entrevista->ReadEntrevista("where codAluno = $idAluno");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"> </script>
    <script type="text/javascript" src="js/materialize.min.js"> </script>
    <script type="text/javascript" src="js/Home.js"> </script>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col s12 m12">
            <h1 class="flow-text">Usuario: <?php echo $_SESSION["usuario"] ?></h1>

            <?php
              if ($ConsultaNum > 0) {
                ?>
                <div class="col s12 m12">
                <ul class="collection">
                <?php

                      include_once "Model/ModelMensagens.class.php";
                      include_once "Model/ModelEmpresa.class.php";
                      while ($result = mysqli_fetch_object($ConsultaEntrevista)) {

                  ?>
                        <li class="collection-item avatar hoverable">
                          <div class="col s4 m1">
                            <img src="Images/Padrao/PerfilPadrao.png" alt="" class="circle" />
                            <a href="#!" class="secondary-content btn-flat btn-large waves-effect waves-light"><i class="material-icons blue-text">add</i></a>  
                          </div>
                          <div class="col s8 m8 pull-m1">
                            <span class="title">Empresa:</span>
                            <br>
                              <span class="flow-text">Você tem uma nova Entrevista </span>

                          </div>

                        </li><br>

                  <?php
                }
                ?>
                  </ul>
                </div>
                <?php
              }
              else{
                echo "you don't have a new e-mail";
              }
             ?>
          </div>
        </div>
    </div>
</body>
</html>
