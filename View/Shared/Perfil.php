<?php


    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.1.0.min.js"></script>
</head>
<body>
    <div class="">
        <table class="bordered highlight centered ">

        <tbody>
          <tr data-id="email">
            <td class="flow-text">Email</td>
            <td class="flow-text"><?php echo $usuario ?></td>
            <td> <button class="btn blue editar">Editar</button></td>
          </tr>
          <tr data-id="senha">
            <td class="flow-text">Senha</td>
            <td class="flow-text "><?php for ($i=0; $i < strlen($senha) ; $i++) {
                    echo "*";
            } ?></td>
            <td><button  class="btn blue editar">Editar</button></td>
          </tr>

        </tbody>
      </table>

    </div>
    <script src="js/Perfil.js"></script>
</body>
</html>
