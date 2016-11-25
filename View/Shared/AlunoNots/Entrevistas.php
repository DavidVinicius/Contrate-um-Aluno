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
  }
  else{
    $ConsultaNum      = 0;
  }

  $ConsultaEntrevista            = $Entrevista->ReadEntrevista("where codAluno = $idAluno and ativo = 'S' and ativo is not null order by idEntrevista desc");
 ?>

              <?php
              if ($ConsultaNum > 0) {
                $identificador = "linha";
                $i =0;
                ?>
                <!-- <div class="col s12 m12"> -->
                <h1 class="center-align flow-text">Suas entrevistas marcadas</h1>
                  <ul class="collection">
                    <?php

                    while ($result = mysqli_fetch_object($ConsultaEntrevista)) {
                      $idEmpresa    = $result->codEmpresa;
                      $idEntrevista = $result->idEntrevista;
                      $ResultMensagem = mysqli_fetch_object($Notificacao->ReadMensagens("where codEntrevista = $idEntrevista"));
                      $ResultEmpresa = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
                      ?>
                      <li class="collection-item avatar hoverable" id="<?= $identificador.$i  ?>">
                        <div class="col s12 m1">
                          <img src="Images/Upload/<?=$ResultEmpresa -> foto ?>" alt="" class="circle" />
                          <div class="secondary-content col s1 m3 hide-on-small-only">
                            <button data-target="<?= $idEntrevista ?>" class=" modal-trigger btn-flat btn-large waves-effect waves-light">
                              <i class="material-icons blue-text">add</i>
                            </button>
                            <button type="button" name="button" class="btn-flat ">
                              <i class="material-icons apagarEntrevista red-text " data-idaluno="<?= $result -> codAluno ?>" data-identrevista="<?= $idEntrevista?>" data-codusuarioempresa="<?= $ResultEmpresa -> codUsuario ?>">delete</i>
                            </button>
                          </div>

                        </div>
                        <div class="col s8 m8 pull-m1 ">
                          <span class="title">de: <?= $ResultMensagem -> de?></span>
                          <br>
                          <span class="flow-text">Você tem uma nova Entrevista </span>

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
                      <div id="<?=$idEntrevista?>" class="modal modal-fixed-footer">
                        <div class="modal-content">
                          <h1 class="center-align flow-text">Nova Entrevista</h1>
                          <h4 class="flow-text"><?= $ResultMensagem -> de ?></h4>
                          <a href="OnePage.php?link=VerPerfilEmpresa<?= '&empresa='.$idEmpresa.'&perfil='.$ResultEmpresa->codUsuario.'&anterior='.$_SERVER['QUERY_STRING'] ?>" > Ver perfil</a>
                          <?php
                          $data = date('d/m/Y', strtotime($ResultMensagem -> data));
                          $hora = $ResultMensagem -> hora;
                          ?>
                          <button type="button" class="modal-action btn-flat">Enviado no dia: <?= $data. " as ". $hora ?></button>
                          <p class="flow-text"><?= $ResultMensagem -> mensagem?></p>
                          <p>
                            <b>Dados sobre a vaga:</b><br>
                            Vaga: <span class="flow-text"><?= $result-> vaga ?></span><br>
                            Salário: <span class="flow-text"><?=$result-> salario ?></span><br>
                            Carga horária semanal: <span class="flow-text"><?=$result-> cargaHoraria ?></span><br>
                            descrição: <?=$result-> descricao ?><br>
                            Benefícios: <?php
                            include_once "../../../Model/ModelBeneficiosExperiencia.class.php";
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
                          <button  data-identrevista="<?=$idEntrevista?>" data-idempresa="<?=$idEmpresa?>" data-idaluno="<?= $result -> codAluno ?>" data-linha="<?= $identificador.$i  ?>" class="modal-action waves-effect waves-green btn-flat col s12 m3 aceitar modal-close">
                            Aceitar
                          </button>
                          <button class="waves-effect waves-yellow btn-flat col s12 m4">
                            Pedir para remarcar
                          </button>
                          <button data-identrevista="<?=$idEntrevista?>" data-idaluno="<?= $result -> codAluno?>"  data-codusuarioempresa="<?= $ResultEmpresa -> codUsuario ?>" class="modal-action modal-close waves-effect waves-red btn-flat CancelarEntrevista col s12 m3">Recusar
                          </button>


                        </div>
                      </div>

                      <?php
                    }
                    ?>
                  </ul>
                <!-- </div> -->
                <?php
              }
              else{
                echo "<h1 class='center-align flow-text'>Você não tem entrevistas marcadas</h1>";;
              }
              ?>
