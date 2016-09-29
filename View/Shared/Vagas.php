<?php
    include_once("Controller/ManipulaVarSession.class.php");
    include_once("Model/DataBase.class.php");
    include_once("Controller/VerificaSeEstaLogado.class.php");

    $Verifica = new VerificaSeEstaLogado();
    $Verifica->EstaLogado();
    $DB = new DataBase();

    $Result = $DB->SearchQuery("vaga",null, "*");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="container">
       <h1 class="flow-text center-align">Vagas no Contrate um Aluno</h1>

        <?php
            while($Linha = mysqli_fetch_assoc($Result) )
            {
                $CodEmpresa = $Linha['codEmpresa'];
                $Result2 = $DB->SearchQuery("empresa", "where idEmpresa = $CodEmpresa");
                $EmpresaAssoc = mysqli_fetch_assoc($Result2);
            ?>
                <div class='col m12'>
                    <div class='card medium'>
                        <div class='card-image waves-effect waves-block waves-light'>

                            <img class='activator' src='images/office.jpg'>

                        </div>
                        <div class='card-content'>
                            <span class='card-title activator grey-text text-darken-4'><?php echo $Linha['titulo']; ?><i class='fa fa-ellipsis-v right'></i></span>
                            <p class="blue-text"><?php echo $EmpresaAssoc['nome']; ?></p>
                        </div>
                        <div class='card-reveal'>
                              <span class='card-title grey-text text-darken-4'>
                                  <?php echo $Linha['titulo']; ?><br>
                                  <br>
                                  <i class='fa fa-remove right'></i></span>
                            <p>Descrição: <?php echo $Linha['descricao']; ?></p>
                            <p>Carga horária: <?php echo number_format($Linha['cargaHoraria'], 1, ',', '.'); ?></p>
                            <p>Salário: R$: <?php echo number_format($Linha['salario'], 2, ',', '.'); ?></p>
                            <p>Requisitos:  <?php echo $Linha['requisitos']; ?></p>
                            <p>Benefícios:  <?php echo $Linha['beneficios']; ?></p>

                            <a class="btn blue" href="OnePage.php?link=Vaga&id=<?php echo $Linha['idVaga'] ?>">Candidatar-se</a>
                        </div>
                    </div>
                </div>
        <?php
            }

        ?>

    </div>
</body>
</html>