<?php
  require_once "Model/ModelEntrevistas.class.php";
  require_once "Model/ModelAluno.class.php";
  require_once "Model/ModelMensagens.class.php";
  require_once "Model/ModelNotificacoesCandidatouse.class.php";
  require_once "Model/ModelCandidatouse.class.php";
  $Entrevista      = new ModelEntrevistas();
  $Aluno           = new ModelAluno();
  $Notificacao     = new Mensagens();
  $NotCandidatouse = new ModelNotificacoesCandidatouse();
  $Candidato       = new Candidatouse();
  $idUsuario       = $_SESSION['id'];

  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $totalNotCandidatouse = mysqli_num_rows($NotCandidatouse -> ReadNotificacoesCandidatouse("where codUsuario = $idUsuario "));
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
    @media screen and (min-width:320px) and (max-width:769px){
      .tabsfont{
        font-size: 10px;

      }

    }
  </style>

</head>
<body>
  <!-- <div id="barra"></div> -->
  <div class="fixed-action-btn ">
      <?= $notificacoes ?>
    <a class="btn-floating btn-large blue">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul class="">
      <li class="tab">
        <a href="#Notificacao" class="btn-floating red conteudo tooltipped" data-position="left" data-delay="50" data-tooltip="Notificações" data-caminho="Notificacoes.php">
        <?= $numMensagens ?>
        <i class="material-icons">email</i>
      </a>
      </li>
      <li>
        <a href="#Candidato" class="btn-floating yellow darken-1 conteudo tooltipped" data-filho="Candidato" data-caminho="Candidataramse.php" data-position="left" data-delay="50" data-tooltip="Candidatos a vaga" >
          <i class="material-icons">perm_identity</i>
        </a>
      </li>
      <li>
        <a href="#Entrevista" class="btn-floating green conteudo tooltipped"  data-caminho="Entrevistas.php" data-position="left" data-delay="50" data-tooltip="Suas entrevistas">
          <i class="material-icons">alarm_on</i>
        </a>
      </li>
      <li>
        <a href="#finalizadas" class="btn-floating blue conteudo tooltipped" data-position="left" data-delay="50" data-tooltip="Entrevistas Finalizadas" data-caminho="EntrevistasFinalizadas.php" >
          <i class="material-icons">done_all</i>
        </a>
      </li>
    </ul>
  </div>
    <div class="container">
      <div class="row">

        <div class="col s12 m12">

          <div id="conteudo" class="col s12 m12">




            <?php if ($totalNotificacao > 0 || $totalNotCandidatouse > 0) {
               $ConsultaNotificacao  = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario order by codUsuario desc");
                $ConsultaNotCandidatouse = $NotCandidatouse -> ReadNotificacoesCandidatouse("where codUsuario = $idUsuario order by codUsuario desc ");
              ?>
              <h1 class="center-align flow-text">Suas Notificações</h1>
                <ul class="collection">
              <?php
              while ($ResultNotCandidatouse = mysqli_fetch_object($ConsultaNotCandidatouse)) {
                $codCandidatouse    = $ResultNotCandidatouse -> codCandidatouse;
                $ResultCandidatouse = mysqli_fetch_object($Candidato -> ReadCandidatouse("where idCandidatouse = $codCandidatouse"));
                  ?>
                  <li class="collection-item avatar">
                    <img src="Images/Upload/<?= $ResultCandidatouse -> foto ?>" alt="foto perfil" class="responsive-img circle">
                    <span class="title"><b>Assunto: </b><?= $ResultNotCandidatouse -> titulo ?></span><br>
                    <p><b>De:</b> <?= $ResultNotCandidatouse -> de ?> <br>
                       <b>Mensagem:</b><br>
                       <?= $ResultNotCandidatouse -> mensagem ?>
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons ApagarNotificacao" data-tabela="notificacoesCandidatouse" data-idnotificacao="<?= $ResultNotCandidatouse -> idNotificacoesCandidatouse ?>">delete</i></a>
                  </li>
                  <?php
              }

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
                  <a href="#!" class="secondary-content"><i class="material-icons ApagarNotificacao" data-tabela="notificacoes" data-idnotificacao="<?= $ResultNotificacao -> idMensagem ?>">delete</i></a>
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
