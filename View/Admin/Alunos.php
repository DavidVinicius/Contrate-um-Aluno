<?php

    if(file_exists("Model/ModelAluno.class.php"))
      require_once "Model/ModelAluno.class.php";
    elseif(file_exists("../../Model/ModelAluno.class.php"))
      require_once "../../Model/ModelAluno.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo ModelAluno.class.php</h1>";

    if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "Controller/PaginaPrivadaOuPublica.class.php";
    elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  $pagina = new PaginaPrivadaOuPublica() ? new PaginaPrivadaOuPublica() : null;

  $Aluno = new ModelAluno() ? new ModelAluno() : null;
  if( !$Aluno )
    header("location: Index.php");


  $ConsultaNumAlunos = mysqli_num_rows($Aluno -> ReadAluno(""));

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <?php

        if ($ConsultaNumAlunos > 0 ) {
          echo "<h1 class='center-align flow-text'>Alunos cadastrados</h1>";
          $ConsultaAlunos = $Aluno -> ReadAluno("");
          echo "<ul class='collection'>";
          while ($ResultAluno = mysqli_fetch_object($ConsultaAlunos)) {

              ?>
              <li class="collection-item avatar">
                <img src="Images/Upload/<?= $ResultAluno -> foto ?>" alt="foto perfil" class="circle">
                <span class="title"><b>Nome:</b> <?= $ResultAluno -> nome ?></span>
                <p><b>visualizacoes perfil: </b><?= $ResultAluno -> visualizacoes ?><br>
                   <a href="#">
                     Ver Perfil
                   </a>
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons red-text">delete</i></a>
              </li>

              <?php

          }
          echo "</ul>";
        }else{
          echo "Sem alunos cadastrados";
        }
         ?>
      </div>
    </div>
  </div>
</body>
</html>