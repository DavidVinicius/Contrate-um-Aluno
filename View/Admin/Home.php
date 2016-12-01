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
  $numUsuarioInativos = mysqli_num_rows($DB->SearchQuery('usuario',"where ativo='N' order by idUsuario desc"));

  $numAluno   = mysqli_num_rows($DB->SearchQuery('aluno','order by idAluno desc'));
  $numAlunosInativo = mysqli_num_rows($DB->SearchQuery('aluno',"where ativo='N' order by idAluno desc"));

  $numEmpresa = mysqli_num_rows($DB->SearchQuery('empresa','order by idEmpresa desc'));
  $numEmpresaInativas = mysqli_num_rows($DB->SearchQuery("empresa","where ativo='N' order by idEmpresa desc"));

  $numVagas   = mysqli_num_rows($DB->SearchQuery('vaga','order by idVaga desc'));
  $numEntrevistas   = mysqli_num_rows($DB->SearchQuery('entrevistas','order by idEntrevista desc'));

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
                  <th data-field="name">Inativos</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Usuarios</td>
                <td><span class="chip circle black white-text"><?= $numUsuario ?></span></td>
                <td><?=$numUsuarioInativos?></td>
              </tr>
              <tr>
                <td>Alunos</td>
                <td><span class="chip circle yellow white-text"><?= $numAluno ?></span></td>
                <td><?= $numAlunosInativo ?></td>

              </tr>
              <tr>
                <td>Empresas</td>
                <td><span class="chip circle blue white-text"><?= $numEmpresa ?></span></td>
                <td><?= $numEmpresaInativas ?></td>
              </tr>
              <tr>
                <td>Vagas</td>
                <td><span class="chip circle orange white-text"><?=$numVagas?></span></td>
              </tr>
              <tr>
                <td>Entrevistas</td>
                <td><span class="chip circle blue white-text"><?= $numEntrevistas ?></span></td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>

</body>
</html>
