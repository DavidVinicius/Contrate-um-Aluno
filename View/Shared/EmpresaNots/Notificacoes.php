<?php
  session_start();

  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelMensagens.class.php";
  require_once "../../../Model/ModelCandidatouse.class.php";
  require_once "../../../Model/ModelNotificacoesCandidatouse.class.php";


  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Notificacao     = new Mensagens();
  $Candidato       = new Candidatouse();
  $NotCandidatouse = new ModelNotificacoesCandidatouse();

  $idUsuario       = $_SESSION['id'];



  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $totalNotCandidatouse = mysqli_num_rows($NotCandidatouse -> ReadNotificacoesCandidatouse("where codUsuario = $idUsuario "));

 ?>
 <head>
   <script type="text/javascript" src="js/HomeEmpresa.js"></script>
 </head>
 <?php if ( $totalNotCandidatouse > 0 || $totalNotCandidatouse > 0 ) {
   $ConsultaNotificacao  = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario order by codUsuario desc");
   $ConsultaNotCandidatouse = $NotCandidatouse -> ReadNotificacoesCandidatouse("where codUsuario = $idUsuario order by codUsuario desc ");
   ?>
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
     $ResultAlunoNotificacao       = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));

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
