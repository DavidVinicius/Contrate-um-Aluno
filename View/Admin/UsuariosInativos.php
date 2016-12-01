<?php
  if(file_exists("Model/ModelUsuario.class.php"))
      require_once "Model/ModelUsuario.class.php";
    elseif(file_exists("../../Model/ModelUsuario.class.php"))
      require_once "../../Model/ModelUsuario.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo ModelUsuario.class.php</h1>";

    if(file_exists("Controller/EstaLogado.class.php"))
      require_once "Controller/EstaLogado.class.php";
    elseif(file_exists("../../Controller/EstaLogado.class.php"))
      require_once "../../Controller/EstaLogado.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo EstaLogado.class.php</h1>";

  $pagina = new EstaLogado();
  if(!$pagina->EstaLogado())//Se tentar acessar direto pela URL
    header("location: ../../Index.php");

  $usuario = new ModelUsuario();

  $usuarioNumRows = mysqli_num_rows( $usuario->ReadUsuario("where ativo='N'") );
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
        $consultaUsuario = $usuario->ReadUsuario("where ativo='N'");
        if ($usuarioNumRows > 0 ) {
          echo "<h1 class='center-align flow-text'>Usuários cadastrados</h1>";
          echo "<ul class='collection'>";
          while ($resultUsuario = mysqli_fetch_object($consultaUsuario)) {
            if($resultUsuario->ativo == "N"){
              ?>
              <li class="collection-item avatar">
                <!--<img src="Images/Upload/" alt="foto perfil" class="circle">-->
                <span class="title"><b>E-mail:</b> <?= $resultUsuario -> email ?></span>
                   <a href="#!">
                     Ver Perfil
                   </a>
                </p>
                <a href="#!" class="secondary-content excluirUsuario" data-id="<?= $resultUsuario -> idUsuario ?>"><i class="material-icons green-text">check</i></a>
              </li>
              <?php
              }
          }
          echo "</ul>";
        }else{
          echo "<h1 class='center-align flow-text'>Sem usuários inativos</h1>";
        }
         ?>
      </div>
    </div>
  </div>

  <script src="js/jquery.js"> </script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $('.excluirUsuario').click(function(){
      var idUsuario = $(this).data('id');
      var tabela    = "usuario";
      var pai       = $(this).parent();
      $.ajax({
        url: 'Controller/AtivarUsuarios.php',
        method: 'post',
        data: {
          idUsuario: idUsuario,
          tabela: tabela,
        },
        success: function(data){
          console.log(data);
          Materialize.toast("O usuario foi reativado",4000);
          $(pai).remove();
        }
      });
    });
  </script>

</body>
</html>
