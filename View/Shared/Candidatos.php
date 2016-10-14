<?php
    include_once "Model/DataBase.class.php";
    $DB = new DataBase();
    $id = $_SESSION['id'];
    $Consulta = $DB->SearchQuery("aluno");
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
                ?>
                <div class="col s12 m6">
                    <div class="card horizontal hoverable">
                        <div class="card-image activator"> 
                            <img src="Images/Padrao/PerfilPadrao.png" alt=""> 
                            <span class="card-title"><?=$linha['nome']?></span>
                        </div>
                        <div class="card-content">
                            <p><?=$linha['qualificacoes']?></p>
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