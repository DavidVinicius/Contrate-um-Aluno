<?php
    include_once "Model/DataBase.class.php";
    include_once "Model/ModelQualificacoes.class.php";
    include_once "Model/ModelAluno.class.php";
    $DB = new DataBase();
    $id = $_SESSION['id'];


    $ConsultaAluno  = $DB->SearchQuery("aluno");
    $Qualificacoes  = new ModelQualificacoes();
    $Aluno      = new ModelAluno();
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
                while( $linha = mysqli_fetch_assoc($ConsultaAluno) ){
                    $idUsuario  = $_SESSION['id'];
                    $LerAluno   = $Aluno->ReadAluno("where codUsuario = $idUsuario");
                    $FetchAluno = mysqli_fetch_assoc($LerAluno);
                 ?>
                <div class="col s12 m6">
                    <div class="card horizontal hoverable">
                        <div class="card-image activator"> 
                            <img src="Images/Padrao/PerfilPadrao.png" alt=""> 
                            <span class="card-title"><?=$linha['nome']?></span>
                        </div>
                        <div class="card-content">
                            <?php while($qualificacao = mysqli_fetch_assoc($Ler)){ ?>
                            <span class="chip blue"><?= $qualificacao['competencia'] ?></span>
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