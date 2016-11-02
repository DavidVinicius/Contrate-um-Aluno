<?php
//    include_once("Controller/ManipulaVarSession.class.php");
    include_once("Model/DataBase.class.php");
    include_once("Controller/VerificaSeEstaLogado.class.php");

    $Verifica = new VerificaSeEstaLogado();
    $Verifica->EstaLogado();
    $DB = new DataBase();

    $Result = $DB->SearchQuery("vaga");
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

            while($Linha = mysqli_fetch_assoc($Result) ) {
                $CodEmpresa = $Linha['codEmpresa'];
                $Result2 = $DB->SearchQuery("empresa", "where idEmpresa = $CodEmpresa");
                $EmpresaAssoc = mysqli_fetch_assoc($Result2);
                ?>
                <div class='col m6'>
                    <div class='card small'>
                        <div class='card-image waves-effect waves-block waves-light'>

                            <img class='activator' src='images/office.jpg'>

                        </div>
                        <div class='card-content'>
                            <span class='card-title activator grey-text text-darken-4'>
                                <?php $TamTitulo = strlen($Linha['titulo']);
                                        $TituloMenor = substr($Linha['titulo'], 0, 30)."...";
                                    if($TamTitulo > 29)
                                    {
                                        echo $TituloMenor;
                                    }else
                                    {
                                        echo $Linha['titulo'];
                                    }
                                ?><i class='material-icons right'>add</i></span>
                            <p class="blue-text"><?php echo $EmpresaAssoc['nome']; ?></p>
                        </div>
                        <div class='card-reveal'>
                              <span class='card-title grey-text text-darken-4'>
                                  <?php $TamTitulo = strlen($Linha['titulo']);
                                        if($TamTitulo > 29)
                                        {
                                            echo $TituloMenor;
                                        }else
                                        {
                                            echo $Linha['titulo'];
                                        }
                                  ?><br>
                                  <br>
                                  <i class='material-icons right'>close</i></span>
                            <p>Descrição: <?php
                                            $TamDesc = strlen($Linha['descricao']);
                                            if($TamDesc > 150)
                                            {
                                                echo substr($Linha['descricao'], 0, 49)."...";
                                                echo "<a href='OnePage.php?link=Vaga&id=".$Linha["idVaga"]."'>Ver mais</a>";
                                            }else
                                            {
                                                echo $Linha['descricao'];
                                            }

                                        ?></p>
                            <p>Carga horária: <?php echo number_format($Linha['cargaHoraria'], 1, ',', '.'); ?></p>
                            <p>Salário: R$: <?php echo number_format($Linha['salario'], 2, ',', '.'); ?></p>

                            <a class='btn blue' href='OnePage.php?link=Vaga&id=<?php echo $Linha["idVaga"]; ?>'>Candidatar-se</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>

    </div>
</body>
</html>
