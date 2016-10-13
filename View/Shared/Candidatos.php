<?php
    include_once "Model/DataBase.class.php";
    $DB = new DataBase();
    $id = $_SESSION['id'];
    $Consulta = $DB->SearchQuery("aluno", "WHERE idAluno = $id");
    $Assoc = mysqli_fetch_assoc($Consulta);
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
                <div class="col s12 m6">
                    <div class="card horizontal hoverable">
                        <div class="card-image activator"> 
                            <img src="Images/Padrao/PerfilPadrao.png" alt=""> 
                            <span class="card-title"><?=$Assoc['nome']?></span>
                        </div>
                        <div class="card-content">
                            <p><?=$Assoc['qualificacoes']?></p>
                            <a href="OnePage.php?link=Candidato&id=<?=$id?>"><button class="btn blue">Ver perfil</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>