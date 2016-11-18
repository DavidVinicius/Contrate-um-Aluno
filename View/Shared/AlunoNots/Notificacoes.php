<head>
  <script type="text/javascript" src="js/HomeAluno.js">

  </script>
</head>
<?php
  session_start();
  include_once "../../../Model/ModelCandidatouse.class.php";
  include_once "../../../Model/ModelEntrevistas.class.php";
  include_once "../../../Model/ModelAluno.class.php";
  include_once "../../../Model/ModelMensagens.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";

  $candidatouse     = new Candidatouse();
  $notfCandidatouse = new ModelNotificacoesCandidatouse();
  $Aluno            = new ModelAluno();
  $Entrevista       = new ModelEntrevistas();
  $Notificacao      = new Mensagens();
  $Empresa          = new ModelEmpresa();

  $idUsuario        = $_SESSION['id'];
  $ConsultaAluno    = mysqli_fetch_object($Aluno->ReadAluno("where codUsuario = $idUsuario"));
  $idAluno          = isset($ConsultaAluno->idAluno)?$ConsultaAluno->idAluno:null;

   if($Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S' ")){
      $ConsultaNum  = mysqli_num_rows($Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S'"));
      $badge        = "<span class='chip red white-text'>$ConsultaNum</span>";

  }
  else{
    $ConsultaNum    = 0;
    $badge          = "";
  }
  $total = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  if ($total > 0) {
     $nots = "<span class='white-text chip red'>$total</span>";
  }
  $ConsultaEntrevista            = $Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S' and ativo is not null");
  $ConsultaEntrevistaFinalizadas = $Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = '' ");
  $resultNotfNumRowsCandidatouse = mysqli_num_rows($notfCandidatouse->ReadNotificacoesCandidatouse());
  $consultaNotfCandidatouse      = mysqli_fetch_object($notfCandidatouse->ReadNotificacoesCandidatouse());
 ?>

 <ul class="collection">
 <?php
       if ($total > 0 || $resultNotfNumRowsCandidatouse > 0) {
             $pagina = (isset( $_GET['pagina']) ) ? $_GET['pagina'] : 1;
             $registros = 5;

             $numPaginas = ceil($total/$registros);

             $inicio = ($registros*$pagina)-$registros;

             $ConsultaNot = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario order by idMensagem desc limit $inicio, $registros") ;

             while($object = mysqli_fetch_object( $consultaCandidatouse )){
                 //
                 ?>
                 <li class="collection-item avatar">
                     <img src="Images/Upload/<?= $EmpresaN -> foto?>" alt="" class="responsive-img circle">
                     <span class="title"><b>Assunto: </b><?= $object -> titulo ?></span><br>
                     <p><b>De:</b> <?= $object -> de ?> <br>
                        <b>Mensagem:</b><br>
                        <?= $object -> mensagem ?>
                     </p>
                     <a href="#!" class="secondary-content"><i class="material-icons ApagarNotificacao" data-idnotificacao="<?= $object -> idMensagem ?>">delete</i></a>
                   </li>
                   <?php
             }

             while ($ResultN = mysqli_fetch_object($ConsultaNot)) {
                   $codEntrevista = $ResultN -> codEntrevista;
                   $ConsultEA = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista = $codEntrevista"));
                   $codEmpresa = $ConsultEA -> codEmpresa;
                   $EmpresaN = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $codEmpresa"));

                   ?>
                   <li class="collection-item avatar">
                     <img src="Images/Upload/<?= $EmpresaN -> foto?>" alt="" class="responsive-img circle">
                     <span class="title"><b>Assunto: </b><?= $ResultN -> titulo ?></span><br>
                     <p><b>De:</b> <?= $ResultN -> de ?> <br>
                        <b>Mensagem:</b><br>
                        <?= $ResultN -> mensagem ?>
                     </p>
                     <a href="#!" class="secondary-content"><i class="material-icons ApagarNotificacao" data-idnotificacao="<?= $ResultN -> idMensagem ?>">delete</i></a>
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
echo "Você não tem notificações";
}
?>
