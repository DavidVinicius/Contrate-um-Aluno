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
    <form action="testeAjax.php" method="post" id="form" enctype="multipart/form-data">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <label for="senha">Senha</label>
        <input type="text" name="senha" id="senha">
        <input type="hidden" name="teste" value="amor">
        <input type="submit" value="enviar" id="enviar">
    </form>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#form").submit(function(e){
                var dados = new FormData(this);
                e.preventDefault();
                 $.ajax({
                     cache: false,
                     processData:false,
                    contentType: false,
                    mimeType:"multipart/form-data",
                    data: dados,
                    type: 'POST',
                    url: 'testeAjax.php',
                    success: function(data)
                    {
                        if(data == 1)
                        {
                            alert("verdadeiro");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
