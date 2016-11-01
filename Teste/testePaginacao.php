<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/materialize.min.css" >
  <link rel="stylesheet" href="../fonts/material-icons.css" media="screen" title="no title">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
    include_once '../Model/DataBase.class.php';
    $DB = new DataBase();
    $items_por_paginas = 3;

    $pagina = intval($_GET['pagina']);
    // $pagina = 1;

    //Numero total de linhas
    $numTotal = mysqli_num_rows($DB->SearchQuery("qualificacoes",""));

    //Consulta que vai trazer os dados do banco
    $consulta = $DB->SearchQuery("qualificacoes","limit $pagina, $items_por_paginas");



    $num_paginas = ceil($numTotal/$items_por_paginas);
echo $numTotal;
   ?>
  <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h1>Produtos</h1>
          <?php if($numTotal > 0){ ?>
            <table class="table">
                  <thead>
                    <tr>
                      <td>Competencia</td>
                      <td>valor</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($produto = mysqli_fetch_assoc($consulta)){ ?>
                    <tr>
                      <td>
                        <?php echo $produto['competencia'] ?>
                      </td>
                    </tr>
                    <?php }?>

                  </tbody>
            </table>
            <?php
          }else {
            echo "Nada encontrado";
          }
             ?>
        </div>
        <ul class="pagination">
          <li class="disabled"><a href="http://localhost/novotcc/Teste/testePaginacao.php?pagina=<?php echo ($i - 1); ?>"><i class="material-icons">chevron_left</i></a></li>
          <?php
              for($i=1; $i <= $num_paginas; $i++){
           ?>
          <li class=""><a href="http://localhost/novotcc/Teste/testePaginacao.php?pagina=<?php echo $i; ?>"><?php echo $i ?></a></li>
            <?php } ?>
          <li class="waves-effect"><a href="http://localhost/novotcc/Teste/testePaginacao.php?pagina=<?php echo ($i + 1); ?>"><i class="material-icons">chevron_right</i></a></li>
        </ul>
      </div>
  </div>

</body>
</html>
