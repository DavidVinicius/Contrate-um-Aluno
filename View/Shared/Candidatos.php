<?php
    include_once "Model/DataBase.class.php";
    include_once "Model/ModelQualificacoes.class.php";
    include_once "Model/ModelAluno.class.php";
    $Aluno = new ModelAluno();
    $id = $_SESSION['id'];
    $Consulta = $Aluno->ReadAluno();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src='js/Candidato.js'></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <?php
                while( $linha = mysqli_fetch_assoc($Consulta) ){
                  $idAluno = $linha['idAluno'];
                  $Qualificacao = new ModelQualificacoes();
                  $ResultadoQ = $Qualificacao->ReadQualificacoes("where codAluno = $idAluno");
                ?>
                <div class="col s12 m6">
                    <div class="card horizontal hoverable">
                        <div class="card-image activator">
                            <img src="Images/Padrao/PerfilPadrao.png" alt="">
                            <span class="card-title"><?=$linha['nome']?></span>
                        </div>
                        <div class="card-content">
                            <?php while($qualificacao = mysqli_fetch_assoc($ResultadoQ)){ ?>
                            <p><?=$qualificacao['competencia']?></p>
                            <?php } ?>
                            <a href="OnePage.php?link=Candidato&id=<?=$linha['idAluno']?>"><button class="btn blue">Ver perfil</button></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
