<?php
  session_start();

  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelMensagens.class.php";
  require_once "../../../Model/ModelCandidatouse.class.php";
  require_once "../../../Model/ModelNotificacoesCandidatouse.class.php";
  require_once "../../../Model/ModelEntrevistas.class.php";


  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Notificacao     = new Mensagens();
  $Entrevista      = new ModelEntrevistas();
  $Candidato       = new Candidatouse();
  $NotCandidatouse = new ModelNotificacoesCandidatouse();

  $idUsuario       = $_SESSION['id'];



  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $totalNotCandidatouse = mysqli_num_rows($NotCandidatouse -> ReadNotificacoesCandidatouse("where codUsuario = $idUsuario "));

 ?>
 <head>
   <script type="text/javascript" src="js/HomeEmpresa.js"></script>
 </head>
 <?php if ( $totalNotificacao > 0 || $totalNotCandidatouse > 0 ) {
   $ConsultaNotificacao  = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario order by codUsuario desc");

   $pagina = (isset( $_GET['pagina']) ) ? $_GET['pagina'] : 1;
   $registros = 1;

   $numPaginas = ceil($totalNotificacao/$registros);

   $inicio = ($registros*$pagina)-$registros;

   $ConsultaNotCandidatouse = $NotCandidatouse -> ReadNotificacoesCandidatouse("where codUsuario = $idUsuario order by codUsuario desc limit $inicio, $registros ");

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
   $paginaMenosUm  = isset($_GET['pagina']) ? ($_GET['pagina'] - 1) : 1;
   $paginaMaisUm   = isset($_GET['pagina']) ? ($_GET['pagina'] + 1) : 1;
   ?>
 </ul>
     <div class="row">
         <center>
           <ul class="pagination">
               <li class="<?php if($pagina == 1) echo 'disabled' ?>">
                   <a href="<?php if($pagina > 1) echo 'OnePage.php?link=HomeAluno&pagina='.$paginaMenosUm ?>">
                       <i class="material-icons">chevron_left</i>
                   </a>
               </li>
               <?php
                   for($i = 1; $i < $numPaginas + 1; $i++) {
                        //echo "<a href='OnePage.php?link=Vagas&pagina=$i'>".$i."</a> ";
                        if($i == $pagina)
                           echo "<li class='active blue'><a href='OnePage.php?link=HomeAluno&pagina='.$i>$i</a></li>";
                        else
                           echo "<li class='waves-effect'><a href='OnePage.php?link=HomeAluno&pagina=".$i."'> $i</a></li>";
                   }
       ?>
           <li class="waves-effect <?php if($pagina == $numPaginas) echo 'disabled' ?>">
               <a href="<?php if($pagina < $numPaginas) echo 'OnePage.php?link=HomeAluno&pagina='.$paginaMaisUm ?>">
                   <i class="material-icons">chevron_right</i>
               </a>
           </li>
       </ul>
         </center>
     </div>
   <?php
 }else{
   echo "<h1 class='center-align flow-text'>Você não tem notificações</h1>";
 } ?>
