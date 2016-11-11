<?php
  require_once "Model/ModelEntrevistas.class.php";
  require_once "Model/ModelEmpresa.class.php";
  require_once "Model/ModelAluno.class.php";
  $Entrevista      = new ModelEntrevistas();
  $Empresa         = new ModelEmpresa();
  $Aluno           = new ModelAluno();
  $idUsuario       = $_SESSION['id'];
  $ConsultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa       = $ConsultEmpresa->idEmpresa;
  if (mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"))){

      $ConsultaNum = mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"));
      // $ResultEntrevista = mysqli_fetch_object($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"));
      $ConsultaEntrevista = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa");


  }
  else{
    $ConsultaNum = 0;
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contrate um Aluno</title>
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/HomeEmpresa.js"></script>

</head>
<body>
    <div class="container">
      <div class="row">
        <h1 class="center-align flow-text">Notificações</h1>
      </div>
      <div class="row">
        <div class="col s12 m12">

            <h1 class="center-align flow-text">Entrevistas marcadas</h1>
            <ul class="collection">
              <?php if ($ConsultaNum > 0){
                  require_once "Model/ModelAluno.class.php";
                  require_once "Model/ModelMensagens.class.php";
                  $Notificao = new Mensagens();
                  while ($result = mysqli_fetch_object($ConsultaEntrevista)) {
                    $idEntrevista = $result->idEntrevista;
                    $idAluno      = $result -> codAluno;
                    $ResultAluno      = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));
                    $ResultMensagem = mysqli_fetch_object($Notificao->ReadMensagens("where codEntrevista = $idEntrevista"));


                ?>

                <li class="avatar hoverable collection-item ">
                  <div class="col s4 m1">
                    <img src="Images/Upload/<?= $ResultAluno -> foto?>" alt="" class="circle" />
                    <button data-target="<?= $idEntrevista?>" class="secondary-content modal-trigger btn-flat btn-large waves-effect waves-light">
                       <i class="material-icons blue-text">add</i>
                   </button>
                  </div>
                  <div class="col s8 m8 pull-m1">
                    <span class="title">Candidato: <?= $ResultAluno -> nome ?> </span>
                    <br>
                      <span class="flow-text">
                        <?php
                        $data = date('d/m/Y', strtotime($result -> data));
                        $hora = $result -> hora;
                        ?>
                        Entrevista Marcada para <?= $data ." as ".$hora?>
                      </span>

                  </div>
                </li><br>
                <div id="<?=$idEntrevista?>" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h1 class="center-align flow-text">Entrevista Marcada</h1>
                    <h4 class="flow-text"><?= $ResultAluno -> nome ?></h4>
                    <a href="OnePage.php?link=Candidato<?= '&id='.$idAluno.'&cod='.$ResultAluno->codUsuario.'&anterior='.$_SERVER['QUERY_STRING'] ?>" > Ver perfil</a>


                    <p>
                      <b>Dados sobre a vaga oferecida:</b><br>
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
                    <button data-target="<?= $ResultAluno -> rg?>" data-identrevista="<?=$idEntrevista?>" data-resposta="Recusado" class="modal-action modal-trigger modal-close waves-effect waves-red btn-flat " id="recusar">Cancelar Entrevista</button>

                    <?php
                      $data = date('d/m/Y', strtotime($ResultMensagem -> data));
                      $hora = $ResultMensagem -> hora;
                    ?>
                    <button type="button" class="modal-action btn-flat">Enviado no dia: <?= $data. " as ". $hora ?></button>

                  </div>
                </div>
                <div class="modal modal-fixed-footer" id="<?=$ResultAluno -> rg ?>">
                        <div class="modal-content">
                          aaaaaa
                        </div>
                </div>
              <?php
                }

            }else{
              echo "Você não tem entrevistas marcadas";
            } ?>


            </ul>

        </div>
      </div>
    </div>
</body>
</html>
