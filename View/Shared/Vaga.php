<?php
    include_once("Model/DataBase.class.php");
    $IdVaga = $_GET['id'];
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
    $EmpresaAssoc   = mysqli_fetch_assoc($Result2);
    $nomeEmpresa   = $EmpresaAssoc['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"> </script>
    <!-- <script type="text/javascript" src="js/materialize.min.js"> </script> -->
    <script type="text/javascript" src="js/Vaga.js"></script>
    <style media="screen">
    .parallax-container {
      height: 200px;
    }
    </style>

</head>
<body >
    <div class="container">


        <div class="row">
            <h1 class='flow-text center-align'><?php echo $titulo;?></h1>
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
            <a href="" class='btn btn-large blue'>Candidatar-se</a>
        </div>
    </div>


</body>
</html>
