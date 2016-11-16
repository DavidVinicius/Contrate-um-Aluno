<head>
  <script type="text/javascript" src="js/HomeAluno.js">

  </script>
</head>
<?php
  session_start();
  include_once "../../../Model/ModelEntrevistas.class.php";
  include_once "../../../Model/ModelAluno.class.php";
  include_once "../../../Model/ModelMensagens.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";
  $Aluno            = new ModelAluno();
  $Entrevista       = new ModelEntrevistas();
  $Notificacao      = new Mensagens();
  $Empresa          = new ModelEmpresa();
  $idUsuario        = $_SESSION['id'];
  $ConsultaAluno    = mysqli_fetch_object($Aluno->ReadAluno("where codUsuario = $idUsuario"));
  $idAluno          = isset($ConsultaAluno->idAluno)?$ConsultaAluno->idAluno:null;
   if($Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S' ")){
      $ConsultaNum      = mysqli_num_rows($Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S'"));
      $badge = "<span class='chip red white-text'>$ConsultaNum</span>";

  }
  else{
    $ConsultaNum      = 0;
    $badge = "";
  }
  $total = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  if ($total > 0) {
     $nots = "<span class='white-text chip red'>$total</span>";
  }
  $ConsultaEntrevista            = $Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S' and ativo is not null");
  $ConsultaEntrevistaFinalizadas = $Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = '' ");
 ?>



<ul class="collection">
<?php
  while ($ResultFinalizada = mysqli_fetch_object($ConsultaEntrevistaFinalizadas)) {
    $idEmpresa      = $ResultFinalizada -> codEmpresa;
    $idEntrevista   = $ResultFinalizada ->idEntrevista;
    $ResultMensagem = mysqli_fetch_object($Notificacao->ReadMensagens("where codEntrevista = $idEntrevista"));
    $ResultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
    $Resposta       = 0;
    ?>
    <li class="collection-item avatar hoverable">
      <div class="col s12 m1">
        <img src="Images/Upload/<?=$ResultEmpresa -> foto ?>" alt="" class="circle" />


      </div>
      <div class="col s8 m8 pull-m1 ">
        <span class="title">Empresa: <?= $ResultEmpresa -> nome ?></span>
        <br>
        <span>Vaga: <?= $ResultFinalizada -> vaga ?></span><br>
        <span class=""> Status: <?= $ResultFinalizada -> status ?></span>

      </div>
      <div class="col s4 hide-on-med-and-up">
        <button data-target="<?= $idEntrevista ?>" class=" modal-trigger btn-flat waves-effect waves-light">
          <i class="material-icons blue-text">add</i>
        </button>
        <button type="button" name="button" class="btn-flat ">
          <i class="material-icons apagarEntrevista red-text " data-idaluno="<?= $result -> codAluno ?>" data-identrevista="<?= $idEntrevista?>"  data-codusuarioempresa="<?= $ResultEmpresa -> codUsuario ?>">delete</i>
        </button>

      </div>

    </li><br>
    <?php
  }
 ?>

 </ul>
