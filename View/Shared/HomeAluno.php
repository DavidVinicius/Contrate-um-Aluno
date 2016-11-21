<?php
  include_once "Model/ModelEntrevistas.class.php";
  include_once "Model/ModelAluno.class.php";
  include_once "Model/ModelMensagens.class.php";
  require_once "Model/ModelEmpresa.class.php";
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/HomeAluno.js"> </script>
    <style media="screen">
      .tabs>li>a:hover{
        opacity: 0.5;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col s12 m12 ">
            <ul class="tabs blue-text">
              <li class="tab col s3 grey-text text-darken-4">
                <a class="active  grey-text text-darken-4 " href="#Notificacao" data-filho="Notificacao" data-caminho="Notificacoes.php">Notificacões <?= $nots?></a>
              </li>
              <li class="tab col s3 grey-text text-darken-4">
                <a href="#Entrevista" class="grey-text text-darken-4" data-filho="Entrevista" data-caminho="Entrevistas.php">Entrevistas <?= $badge ?></a>
              </li>
              <li class="tab col s3 grey-text text-darken-4">
                <a href="#Finalizadas" class="grey-text text-darken-4" data-filho="Finalizadas" data-caminho="EntrevistasFinalizadas.php">Entrevistas Finalizadas</a>
              </li>


            </ul>
            <div id="Notificacao" class="col s12">
              <ul class="collection">
              <?php
                    if ($total > 0) {
                          $pagina = (isset( $_GET['pagina']) ) ? $_GET['pagina'] : 1;
                          $registros = 5;

                          $numPaginas = ceil($total/$registros);

                          $inicio = ($registros*$pagina)-$registros;

                          $ConsultaNot = $Notificacao -> ReadMensagens("where codUsuario = $idUsuario order by idMensagem desc limit $inicio, $registros") ;


                          ?>


                          <?php
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
                                  <a href="#!" class="secondary-content"><i class="material-icons ApagarNotificacao" data-idnotificacao="<?= $ResultN -> idMensagem ?>" data-tabela="notificacoes">delete</i></a>
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
                      echo "<h1 class='center-align flow-text'>Você não possui notificações</h1>";
                    }
               ?>
            </div>
            <div id="Entrevista" class="col s12">
            </div>
            <div id="Finalizadas" class="col s12 m12 " >
            </div>
          </div>
        </div>
    </div>
</body>
</html>
