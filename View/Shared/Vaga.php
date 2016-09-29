<?php
    include_once("Model/DataBase.class.php");
    $IdVaga = $_GET['id'];
    $DB = new DataBase();
    $Result = $DB->SearchQuery("vaga", "where idVaga = $IdVaga");
    $Assoc = mysqli_fetch_assoc($Result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src='js/jquery-3.1.0.min.js'></script>
    <script src="js/materialize.js"></script>
</head>
<body>
    <div class="container">
        <?php
            echo $Assoc['titulo'];
        ?>
        <h1>MATHEUS É MUITO FODA!!</h1>
    </div>
</body>
</html>