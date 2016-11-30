<?php
  // if(file_exists("Model/ModelEmpresa.class.php"))
  //     require_once "Model/ModelEmpresa.class.php";
  //   elseif(file_exists("../../Model/ModelEmpresa.class.php"))
  //     require_once "../../Model/ModelEmpresa.class.php";
  //   else
  //     echo "<h1>Impossível encontrar o arquivo ModelEmpresa.class.php</h1>";

  //   if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
  //     require_once "Controller/PaginaPrivadaOuPublica.class.php";
  //   elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
  //     require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
  //   else
  //     echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  // $pagina = new PaginaPrivadaOuPublica();
  // if(!$pagina->PrivadaOuPublica())
  //   header("location: Index.php");
  // else
  //   header("location: OnePage.php");

  // $empresa = new ModelEmpresa() ? new ModelEmpresa() : null;
  // if( !$empresa )
  //   header("location: Index.php");

  require_once "Model/DataBase.class.php";
  $DB = new DataBase();
  $numUsuario = mysqli_num_rows($DB->SearchQuery('usuario','order by idUsuario desc'));
  $numAluno   = mysqli_num_rows($DB->SearchQuery('aluno','order by idAluno desc'));
  $numEmpresa = mysqli_num_rows($DB->SearchQuery('empresa','order by idEmpresa desc'));

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
      <table>
            <thead>
              <tr>
                  <th data-field="id">Tabela</th>
                  <th data-field="name">Registros</th>

              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Usuarios</td>
                <td><?= $numUsuario ?></td>
              </tr>
              <tr>
                <td>Alunos</td>
                <td><?= $numAluno ?></td>

              </tr>
              <tr>
                <td>Empresas</td>
                <td><span class="chip circle blue white-text"><?= $numEmpresa ?></span></td>

              </tr>
            </tbody>
          </table>
    </div>
  </div>

</body>
</html>
