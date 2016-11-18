<?php
    include_once("Model/DataBase.class.php");
    require_once "Model/ModelCandidatouse.class.php";
    $IdVaga    = $_GET['id'];
    $idUsuario = $_SESSION['id'];
    $pesquisa  = isset($_GET['pesquisa'])? "&pesquisa=".$_GET['pesquisa']:null;
    $filtro    = isset($_GET['filtro'])?"&filtro=".$_GET['filtro']:null;
    $anterior  = $_GET['anterior'];
    $Candidato  =  new Candidatouse();
    $Num        = mysqli_num_rows($Candidato -> ReadCandidatouse("where codUsuarioAluno = $idUsuario && codVaga = $IdVaga"));
    if ($Num > 0) {
       $disabled = "disabled='true'";
       $candidatar = 'Você já se candidatou-se para essa vaga';
    }
    else{
      $disabled = '';
      $candidatar = 'Candidatar-se';
    }
    $DB = new DataBase();
    $Result = $DB->SearchQuery("vaga", "where idVaga = $IdVaga");
    $Assoc = mysqli_fetch_assoc($Result);

    $titulo        = $Assoc['titulo'];
    $descricao     = $Assoc['descricao'];
    $salario       = $Assoc['salario'];
    $cargaHoraria  = $Assoc['cargaHoraria'];
    $requisitos    = $Assoc['requisitos'];
    $CodEmpresa    = $Assoc['codEmpresa'];
    $Result2       = $DB->SearchQuery("empresa", "where idEmpresa = $CodEmpresa");
    $EmpresaAssoc  = mysqli_fetch_assoc($Result2);
    $nomeEmpresa   = $EmpresaAssoc['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery.js"> </script>
    <script type="text/javascript" src="js/materialize.min.js"> </script>
    <script type="text/javascript" src="js/Vaga.js"></script>
    <style media="screen">
    .parallax-container {
      height: 300px;
      top:-15px;
    }
    </style>

</head>
<body>
  <div class="parallax-container">
    <div class="parallax"><img src="Images/Office.jpg"></div>
    <h1 class='center-align white-text'><?php echo $titulo;?></h1>

  </div>
    <div class="container">
      <div class="divider"></div>
        <section class="section">
          <div class="row">
              <div class="col m12 s12 l12">
                <div class="row">

                  <div class="input-field col s12 m12">
                    <label for="empresa">Empresa:</label>
                    <input type="text" name="empresa" id="empresa" value="<?=$nomeEmpresa ?>" readonly class="flow-text" style="font-size:25px">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <label for="salário">Salário:</label>
                    <input type="text" name="salario" id="salario" class="flow-text" value="R$ <?php echo number_format($salario,2,',','.'); ?>" style="font-size:25px">
                  </div>
                  <div class="input-field col s12 m6">
                    <label for="cargaHoraria">Carga horária:</label>
                    <input type="text" name="cargaHoraria" id="cargaHoraria" class="flow-text" value="<?= $cargaHoraria ?>" style="font-size:25px" readonly="true">
                  </div>
                </div>
                <div class="input-field col s12 m12">
                  <p class="flow-text">
                    Benefícios:

                  <?php
                    require_once "Model/ModelBeneficiosVaga.class.php";
                    $Beneficio = new ModelBeneficiosVaga();
                    $Consulta  = $Beneficio->ReadBeneficiosVaga("where codVaga = $IdVaga");
                      while ($ResultB = mysqli_fetch_object($Consulta)) {
                        ?>
                          <span class="chip"><?= $ResultB -> beneficio ?></span>

                        <?php
                      }
                   ?>
                 </p>
                </div>
                <div class="row">
                  <div class="input-field col s12 m12">
                    <label for="requisitos">Requisitos:</label>
                    <textarea name="requisitos" rows="8" cols="40" class="materialize-textarea" readonly="true"><?php echo $requisitos;?></textarea>
                  </div>
                  <div class="input-field col s12 m12">
                      <label for="descricao">Descrição:</label>
                      <textarea name="descricao" id="descricao" cols="30" rows="10" class="materialize-textarea" readonly="true"><?php echo $descricao;?></textarea>
                  </div>
                </div>



              </div>
          </div>

          <div class="row">
              <form action="Controller/Candidatarse.php" method="post" id="candidatar">
                <input type="hidden" name="idUsuario" value="<?= $idUsuario ?>">
                <input type="hidden" name="idVaga" value="<?= $IdVaga ?>">
                <!-- <a href="" class='btn btn-large blue'>Candidatar-se</a> -->
                <button class="btn btn-large blue waves-effect waves-light " type="submit" <?= $disabled?>><?= $candidatar ?></button>
                <a href="OnePage.php?<?=$anterior.$pesquisa.$filtro ?>"><button type="button" name="button" class="btn btn-large waves-effect waves-light">Voltar</button></a>
              </form>
          </div>
        </section>
    </div>


</body>
</html>
