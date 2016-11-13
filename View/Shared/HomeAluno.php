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
   if($Entrevista->ReadEntrevista("where codAluno = $idAluno")){
      $ConsultaNum      = mysqli_num_rows($Entrevista->ReadEntrevista("where codAluno = $idAluno"));
  }
  else{
    $ConsultaNum      = 0;
  }
  $total = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $ConsultaEntrevista = $Entrevista->ReadEntrevista("where codAluno = $idAluno");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/HomeAluno.js"> </script>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col s12 m12 ">
            <ul class="tabs ">
              <li class="tab col s3 red-text"><a class="active " href="#Notificacao">Notificacões</a></li>
              <li class="tab col s3"><a href="#Entrevista">Entrevistas</a></li>
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
                                  <a href="#!" class="secondary-content"><i class="material-icons apagarNotificacao" data-idnotificacao="<?= $ResultN -> idMensagem ?>">delete</i></a>
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
            </div>
            <div id="Entrevista" class="col s12">

              <h1 class="center-align flow-text">Entrevistas</h1>
              <?php
              if ($ConsultaNum > 0) {
                ?>
                <div class="col s12 m12">
                  <ul class="collection">
                    <?php

                    while ($result = mysqli_fetch_object($ConsultaEntrevista)) {
                      $idEmpresa = $result->codEmpresa;
                      $idEntrevista = $result->idEntrevista;
                      $ResultMensagem = mysqli_fetch_object($Notificacao->ReadMensagens("where codEntrevista = $idEntrevista"));
                      $ResultEmpresa = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
                      ?>
                      <li class="collection-item avatar hoverable">
                        <div class="col s4 m1">
                          <img src="Images/Upload/<?=$ResultEmpresa -> foto ?>" alt="" class="circle" />
                          <div class="secondary-content">
                            <button data-target="<?= $idEntrevista?>" class=" modal-trigger btn-flat btn-large waves-effect waves-light">
                              <i class="material-icons blue-text">add</i>
                            </button>
                            <button type="button" name="button" class="btn-flat ">
                              <i class="material-icons apagarEntrevista red-text " data-idnotificacao="<?= $ResultN -> idMensagem ?>">delete</i>
                            </button>
                          </div>
                        </div>
                        <div class="col s8 m8 pull-m1">
                          <span class="title">de: <?= $ResultMensagem -> de?></span>
                          <br>
                          <span class="flow-text">Você tem uma nova Entrevista </span>

                        </div>

                      </li><br>
                      <div id="<?=$idEntrevista?>" class="modal modal-fixed-footer">
                        <div class="modal-content">
                          <h1 class="center-align flow-text">Nova Entrevista</h1>
                          <h4 class="flow-text"><?= $ResultMensagem -> de ?></h4>
                          <a href="OnePage.php?link=VerPerfilEmpresa<?= '&empresa='.$idEmpresa.'&perfil='.$ResultEmpresa->codUsuario.'&anterior='.$_SERVER['QUERY_STRING'] ?>" > Ver perfil</a>

                          <p class="flow-text"><?= $ResultMensagem -> mensagem?></p>
                          <p>
                            <b>Dados sobre a vaga:</b><br>
                            Vaga: <span class="flow-text"><?= $result-> vaga ?></span><br>
                            Salário: <span class="flow-text"><?=$result-> salario ?></span><br>
                            Carga horária semanal: <span class="flow-text"><?=$result-> cargaHoraria ?></span><br>
                            descrição: <?=$result-> descricao ?><br>
                            Benefícios: <?php
                            include_once "Model/ModelBeneficiosExperiencia.class.php";
                            $Beneficio = new ModelBeneficiosExperiencia();
                            $ConsultaB = $Beneficio -> ReadBeneficiosExperiencia("where codEntrevista = $idEntrevista");
                            while($ResultB = mysqli_fetch_object($ConsultaB))
                            {
                              ?>
                              <span class="chip"><?= $ResultB -> beneficio ?></span>
                              <?php
                            }
                            ?>
                          </p>
                          <p>
                            <b>Endereço da entrevista</b> <br>
                            Local: <?= $result -> local?><br>
                            Número: <?= $result -> numero?><br>
                            Bairro: <?= $result -> bairro . " - " . $result->complemento?><br>
                            Cidade: <?= $result -> cidade. " - ". $result->estado?><br>
                          </p>
                          <p>
                            <b>Horário da Entrevista</b><br>
                            <?php
                            $dataE = date('d/m/Y', strtotime($result -> data));
                            $horaE = $result -> hora;
                            ?>
                            Data: <?= $dataE ." as ". $horaE?>
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button data-identrevista="<?=$idEntrevista?>" data-resposta="Recusado" class="modal-action modal-close waves-effect waves-red btn-flat ">Recusar</button>
                          <button data-identrevista="<?=$idEntrevista?>" data-resposta="Aceitado" class="modal-action waves-effect waves-green btn-flat">Aceitar</button>
                          <?php
                          $data = date('d/m/Y', strtotime($ResultMensagem -> data));
                          $hora = $ResultMensagem -> hora;
                          ?>
                          <button type="button" class="modal-action btn-flat">Enviado no dia: <?= $data. " as ". $hora ?></button>

                        </div>
                      </div>

                      <?php
                    }
                    ?>
                  </ul>
                </div>
                <?php
              }
              else{
                echo "you don't have a new e-mail";
              }
              ?>


            </div>
          </div>
        </div>
    </div>
</body>
</html>
