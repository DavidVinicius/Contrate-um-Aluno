<?php
     include_once "../Model/DataBase.class.php";
    $DB = new DataBase();

     //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
     $pagina = (isset( $_GET['pagina']) ) ? $_GET['pagina'] : 1;

     //seleciona todos os itens da tabela
     $alunos = $DB->SearchQuery("qualificacoes");
     //conta o total de itens
     $total = mysqli_num_rows($alunos);
    
     //seta a quantidade de itens por página, neste caso, 2 itens
     $registros = 2;

     //calcula o número de páginas arredondando o resultado para cima
     $numPaginas = ceil($total/$registros);

     //variavel para calcular o início da visualização com base na página atual
     $inicio = ($registros*$pagina)-$registros;

     //seleciona os itens por página
     $alunos1   = $DB->SearchQuery("qualificacoes", "order by idQualificacoes desc limit $inicio,$registros",'competencia');
     $total1    = mysqli_num_rows($alunos1);
     $aluno     = mysqli_fetch_object($alunos1);
    //  var_dump($aluno);
     foreach ($aluno as $valor) {
       # code...
       echo $valor."<br />";
     }
     //exibe os produtos selecionados
    //  while ($aluno = mysqli_fetch_object($alunos1)) {
    //     echo "=============######================<br/><br/>";
    //       echo $aluno->competencia." - ";
     //
    //     echo "<br/><br/><br/>";
    //  }

     //exibe a paginação
     for($i = 1; $i < $numPaginas + 1; $i++) {
          echo "<a href='testePaginacao.php?pagina=$i'>".$i."</a> ";
     }
?>
