<?php
  session_start();
  require_once "../../../Model/ModelEntrevistas.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";
  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelMensagens.class.php";

  $Entrevista      = new ModelEntrevistas();
  $Empresa         = new ModelEmpresa();
  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Notificacao     = new Mensagens();
  $idUsuario       = $_SESSION['id'];
  $ConsultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa       = $ConsultEmpresa->idEmpresa;
  if (mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"))){

      $ConsultaNum = mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = 'S' "));
      // $ResultEntrevista = mysqli_fetch_object($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"));
      $ConsultaEntrevista            = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = 'S' ");
      $ConsultaEntrevistaFinalizada  = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = '' ");
  }
  else{
    $ConsultaNum = 0;
  }
  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $totalVaga        = mysqli_num_rows($Vaga -> ReadVaga("where codEmpresa = $idEmpresa"));
 ?>
 <head>
   <script type="text/javascript" src="js/HomeEmpresa.js"></script>
 </head>
 <?php if ($totalNotificacao > 0) {
   $ConsultaNotificacao  = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario");
   ?>
     <ul class="collection">
   <?php
   while ($ResultNotificacao = mysqli_fetch_object($ConsultaNotificacao)) {
     $codEntrevista                = $ResultNotificacao -> codEntrevista;
     $ResultEntrevistaNotificacao  = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista = $codEntrevista"));

     $idAluno                      = $ResultEntrevistaNotificacao -> codAluno;
     $ResultAlunoNotificacao       = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));

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
