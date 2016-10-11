<?php

$nome = $_POST['nome'];
$senha = $_POST['senha'];

echo $nome;
echo $senha;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="testeAjaxFormulario.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <label for="senha">Senha</label>
        <input type="text" name="senha" id="senha">
        <input type="submit" value="enviar" id="enviar">
    </form>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#enviar").click(function(e){
                e.preventDefault();
                 $.ajax({
                    contentType: 'application/json'
                    data: $("form").serialize(),
                    type: 'POST',
                    url: 'testeAjax.php'
                });
            });
        });
    </script>
</body>
</html>