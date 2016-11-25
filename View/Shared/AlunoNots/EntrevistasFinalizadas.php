<head>
  <script type="text/javascript" src="js/HomeAluno.js">

  </script>
</head>
<?php
  session_start();
  include_once "../../../Model/ModelEntrevistas.class.php";
  include_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";
  $Aluno            = new ModelAluno();
  $Entrevista       = new ModelEntrevistas();
  $Empresa          = new ModelEmpresa();
  $idUsuario        = $_SESSION['id'];
  $ConsultaAluno    = mysqli_fetch_object($Aluno->ReadAluno("where codUsuario = $idUsuario"));
  $idAluno          = isset($ConsultaAluno->idAluno)?$ConsultaAluno->idAluno:null;

  $ConsultaNumEntrevistasFinalizdas = mysqli_num_rows($Entrevista -> ReadEntrevista("where codAluno = $idAluno and ativo = ''"));
  $ConsultaEntrevistaFinalizadas = $Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = '' order by idEntrevista desc ");
if ($ConsultaNumEntrevistasFinalizdas > 0) {
  # code...
 ?>
<ul class="collection">

<?php
  while ($ResultFinalizada = mysqli_fetch_object($ConsultaEntrevistaFinalizadas)) {
    $idEmpresa      = $ResultFinalizada -> codEmpresa;
    $idEntrevista   = $ResultFinalizada ->idEntrevista;
    $ResultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
    $Resposta       = 0;
    ?>
    <li class="collection-item avatar hoverable">
      <div class="col s12 m1">
        <img src="Images/Upload/<?=$ResultEmpresa -> foto ?>" alt="" class="circle" />


      </div>
      <div class="col s12 m8 pull-m1 ">
        <span class="title">Empresa: <?= $ResultEmpresa -> nome ?></span>
        <br>
        <span>Vaga: <?= $ResultFinalizada -> vaga ?></span><br>
        <span class=""> Status: <?= $ResultFinalizada -> status ?></span>

      </div>
      

    </li><br>
    <?php
  }
}else{
  echo "<h1 class='center-align flow-text'>Você não possui nenhuma entrevista finalizada</h1>";
}
 ?>

 </ul>
