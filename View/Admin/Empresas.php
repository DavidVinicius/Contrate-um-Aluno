<?php
  if(file_exists("Model/ModelEmpresa.class.php"))
      require_once "Model/ModelEmpresa.class.php";
    elseif(file_exists("../../Model/ModelEmpresa.class.php"))
      require_once "../../Model/ModelEmpresa.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo ModelEmpresa.class.php</h1>";

    if(file_exists("Controller/EstaLogado.class.php"))
      require_once "Controller/EstaLogado.class.php";
    elseif(file_exists("../../Controller/EstaLogado.class.php"))
      require_once "../../Controller/EstaLogado.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo EstaLogado.class.php</h1>";

  $pagina = new EstaLogado();
  if(!$pagina->EstaLogado())//Se tentar acessar direto pela URL
    header("location: ../../Index.php");

  $empresa = new ModelEmpresa();

  $empresaNumRows = mysqli_num_rows( $empresa->ReadEmpresa("") );
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
        $consultaEmpresa = $empresa->ReadEmpresa("");
        if ($empresaNumRows > 0 ) {
          echo "<h1 class='center-align flow-text'>Empresas cadastradas</h1>";
          echo "<ul class='collection'>";
          while ($resultEmpresa = mysqli_fetch_object($consultaEmpresa)) {
            if(!$resultEmpresa->ativo == "N"){
              ?>
              <li class="collection-item avatar">
                <img src="Images/Upload/<?= $resultEmpresa -> foto ?>" alt="foto perfil" class="circle">
                <span class="title"><b>Nome:</b> <?= $resultEmpresa -> nome ?></span>
                   <a href="#">
                     Ver Perfil
                   </a>
                </p>
                <a href="#!" class="secondary-content excluirEmpresa" data-id="<?= $resultEmpresa->idEmpresa ?>"><i class="material-icons red-text">delete</i></a>
              </li>

              <?php
              }
          }
          echo "</ul>";
        }else{
          echo "Sem empresas cadastradas";
        }
         ?>
      </div>
    </div>
  </div>

  <script src="js/jquery.js"> </script>
  <script>
    $('.excluirEmpresa').click(function(){
      var idEmpresa = $(this).data('id');
      var tabela    = "empresa";
      $.ajax({
        url: 'Controller/ExcluirDados.php',
        method: 'post',
        data: {
          idEmpresa: idEmpresa,
          tabela: tabela,
        },
        success: function(data){
          alert('Resposta: ' + data);
        }
      });
    });
  </script>

</body>
</html>
