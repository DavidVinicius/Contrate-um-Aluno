<?php
  include_once "Model/ModelEntrevistas.class.php";
  include_once "Model/ModelAluno.class.php";
  $Aluno            = new ModelAluno();
  $Entrevista       = new ModelEntrevistas();
  $idUsuario        = $_SESSION['id'];
  $ConsultaAluno    = mysqli_fetch_object($Aluno->ReadAluno("where codUsuario = $idUsuario"));
  $idAluno          = isset($ConsultaAluno->idAluno)?$ConsultaAluno->idAluno:null;
   if($Entrevista->ReadEntrevista("where codAluno = $idAluno")){
    $ConsultaNum      = mysqli_num_rows($Entrevista->ReadEntrevista("where codAluno = $idAluno"));
  }
  else{
    $ConsultaNum      = 0;
  }
  $ConsultaEntrevista = $Entrevista->ReadEntrevista("where codAluno = $idAluno");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"> </script>
    <script type="text/javascript" src="js/materialize.min.js"> </script>
    <script type="text/javascript" src="js/HomeAluno.js"> </script>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col s12 m12">
            <h1 class="flow-text">Usuario: <?php echo $_SESSION["usuario"] ?></h1>

            <?php
              if ($ConsultaNum > 0) {
                ?>
                <div class="col s12 m12">
                <ul class="collection">
                <?php

                      include_once "Model/ModelMensagens.class.php";
                      include_once "Model/ModelEmpresa.class.php";
                      $Empresa = new ModelEmpresa();
                      $Notificao = new Mensagens();
                      while ($result = mysqli_fetch_object($ConsultaEntrevista)) {
                        $idEmpresa = $result->codEmpresa;
                        $idEntrevista = $result->idEntrevista;
                        $ResultMensagem = mysqli_fetch_object($Notificao->ReadMensagens("where codEntrevista = $idEntrevista"));
                        $ResultEmpresa = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
                  ?>
                        <li class="collection-item avatar hoverable">
                          <div class="col s4 m1">
                            <img src="Images/Upload/<?=$ResultEmpresa -> foto ?>" alt="" class="circle" />
                             <button data-target="<?= $idEntrevista?>" class="secondary-content modal-trigger btn-flat btn-large waves-effect waves-light">
                                <i class="material-icons blue-text">add</i>
                            </button>
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
                            <a href="OnePage.php?link=VerPerfilEmpresa&id=<?=$idEmpresa?>"> Ver perfil</a>
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
</body>
</html>
