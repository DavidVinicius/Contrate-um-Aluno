<?php
  require_once "Model/ModelEntrevistas.class.php";
  require_once "Model/ModelAluno.class.php";
  require_once "Model/ModelMensagens.class.php";
  $Entrevista      = new ModelEntrevistas();
  $Aluno           = new ModelAluno();
  $Notificacao     = new Mensagens();
  $idUsuario       = $_SESSION['id'];

  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contrate um Aluno</title>
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/HomeEmpresa.js"></script>
  <style media="screen">
    .tabs>li>a:hover{
      opacity: 0.5;
    }
  </style>

</head>
<body>
    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <div class="col s12 m12">
          <ul class="tabs grey-text text-darken-4">
            <li class="tab col s3 grey-text text-darken-4" >
              <a href="#Notificacao" class="active grey-text text-darken-4" data-filho="Notificacao" data-caminho="Notificacoes.php">Notificações</a>
            </li>
            <li class="tab col s3 grey-text text-darken-4" >
              <a href="#Candidato" class="grey-text text-darken-4" data-filho="Candidato" data-caminho="Candidataramse.php">Candidatos a vaga</a>
            </li>
            <li class="tab col s3 grey-text text-darken-4">
              <a  href="#Entrevista" class="grey-text text-darken-4" data-filho="Entrevista" data-caminho="Entrevistas.php">Entrevistas</a>
            </li>
            <li class="tab col s3 grey-text text-darken-4">
              <a  href="#finalizadas" class="grey-text text-darken-4" data-filho="finalizadas" data-caminho="EntrevistasFinalizadas.php">Entrevistas finalizadas</a>
            </li>

          </ul>
          <div id="Notificacao" class="col s12">


            <?php if ($totalNotificacao > 0) {
               $ConsultaNotificacao  = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario");
              ?>
                <ul class="collection">
              <?php
              while ($ResultNotificacao = mysqli_fetch_object($ConsultaNotificacao)) {
                $codEntrevista                = $ResultNotificacao -> codEntrevista;
                $ResultEntrevistaNotificacao  = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista = $codEntrevista"));

                $idAluno                      = $ResultEntrevistaNotificacao -> codAluno;
                $ResultAlunoNotificacao       =mysqli_fetch_object( $Aluno -> ReadAluno("where idAluno = $idAluno"));

                ?>
                <li class="collection-item avatar">
                  <img src="Images/Upload/<?= $ResultAlunoNotificacao -> foto ?>" alt="foto perfil" class="responsive-img circle">
                  <span class="title"><b>Assunto: </b><?= $ResultNotificacao -> titulo ?></span><br>
                  <p><b>De:</b> <?= $ResultNotificacao -> de ?> <br>
                     <b>Mensagem:</b><br>
                     <?= $ResultNotificacao -> mensagem ?>
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons ApagarNotificacao" data-idnotificacao="<?= $ResultNotificacao -> idMensagem ?>">delete</i></a>
                </li>


                <?php
              }
              ?>
            </ul>
              <?php
            }else{
              echo "<h1 class='center-align flow-text'>Você não tem notificações</h1>";
            } ?>
          </div>
          <div class="col s12 m12" id="Candidato">

          </div>
          <div id="Entrevista" class="col s12">




          </div>
         <div id="finalizadas" class="col s12">


         </div>


        </div>
      </div>
    </div>
</body>
</html>
