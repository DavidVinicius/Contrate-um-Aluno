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
    $beneficios    = $Assoc['beneficios'];
    $CodEmpresa    = $Assoc['codEmpresa'];
    $Result2       = $DB->SearchQuery("empresa", "where idEmpresa = $CodEmpresa");
    $EmpresaAssoc   = mysqli_fetch_assoc($Result2);
    $nomeEmpresa   = $EmpresaAssoc['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

</head>
<body >
    <div class="container">

        <div class="row">
            <h1 class='flow-text center-align'><?php echo $titulo. " - ". $nomeEmpresa;?></h1>
            <div class="col m12 s12 l12">

                    <div class="col m12 s12">
                        <h5 class='flow-text'>Descrição:</h5>
                        <?php echo $descricao;?>
                    </div>
                    <div class="col m12 s12">
                        <h5 class='flow-text'>Requisitos:</h5>
                        <?php echo $requisitos;?>

                    </div>
                    <div class="col m12 s12">
                        <h5 class='flow-text'>Beneficios:</h5>
                        <?php echo $beneficios;?>

                    </div>
            </div>
        </div>
        <div class="row">
            <span class='flow-text'>Salário: <?php echo number_format($salario,2,',','.'); ?></span><br>
            <span class='flow-text'>Carga horária: <?= $cargaHoraria ?></span>
        </div>
        <div class="row">
            <a href="" class='btn blue'>Candidatar-se</a>
        </div>
    </div>
    <script src='js/jquery-3.1.0.min.js'></script>
    <script src="js/materialize.js"></script>
    <script src="js/angular.min.js"></script>

</body>
</html>
