<?php
    if(file_exists("Model/DataBase.class.php"))
      require_once "Model/DataBase.class.php";
    elseif(file_exists("../../Model/DataBase.class.php"))
      require_once "../../Model/DataBase.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo DataBase.class.php</h1>";

      if(file_exists("Model/ModelQualificacoes.class.php"))
      require_once "Model/ModelQualificacoes.class.php";
    elseif(file_exists("../../Model/ModelQualificacoes.class.php"))
      require_once "../../Model/ModelQualificacoes.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo ModelQualificacoes.class.php</h1>";

    if(file_exists("Model/ModelAluno.class.php"))
      require_once "Model/ModelAluno.class.php";
    elseif(file_exists("../../Model/ModelAluno.class.php"))
      require_once "../../Model/ModelAluno.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo ModelAluno.class.php</h1>";

    if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "Controller/PaginaPrivadaOuPublica.class.php";
    elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  // $pagina = new PaginaPrivadaOuPublica();
  // if(!$pagina->PrivadaOuPublica())
  //   header("location: ../../Index.php");
  // else
  //   header("location: ../../Home.php");

    $DB = new DataBase() ? new DataBase() : null;
    $id = $_SESSION['id'];


    $ConsultaAluno  = $DB->SearchQuery("aluno");
    $Qualificacoes  = new ModelQualificacoes() ? new ModelQualificacoes() : null;
    $Aluno          = new ModelAluno() ? new ModelAluno() : null;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src='js/Candidatos.js'></script>
</head>

<body>
    <div class="container">
      <div class="row">
        <form method="Model/Pesquisa.php" class="" method="get" id="pesquisar">
        <div class="input-field col s12 m12">
          <label for="pesquisa">Pesquisa:</label>
          <input type="text" name="pesquisa" id="pesquisa" required>

        </div>
        <div class="input-field col s12 m8">
            <input class="with-gap" name="filtro" type="radio" id="todos"  value="todos" />
            <label for="todos">Todos</label>
            <input class="with-gap" name="filtro" type="radio" id="qualificacao" value="qualificacoes" />
            <label for="qualificacao">Competência</label>
            <input class="with-gap" name="filtro" type="radio" id="formacao" value="formacoes"  />
            <label for="formacao">Formação</label>
            <input class="with-gap" name="filtro" type="radio" id="experiencia" value="experiencias"  />
            <label for="experiencia">Experiência</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="submit" value="Pesquisar" class="btn btn-large blue">
        </div>
      </form>
      </div>
        <div class="row" id="CandidatosSemPesquisa">
          <h1 class="center-align flow-text">Atuais Candidatos</h1>
            <div class="row">
                <?php

                while( $linha = mysqli_fetch_assoc($ConsultaAluno) ){
                    $idUsuario  = $_SESSION['id'];
                    $LerAluno   = $Aluno->ReadAluno("where codUsuario = $idUsuario");
                    $FetchAluno = mysqli_fetch_assoc($LerAluno);
                //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
                $pagina = (isset( $_GET['pagina']) ) ? $_GET['pagina'] : 1;

                //seleciona todos os itens da tabela
                $alunos = $DB->SearchQuery("aluno");
                //conta o total de itens
                $total = mysqli_num_rows($alunos);

                //seta a quantidade de itens por página, neste caso, 2 itens
                $registros = 1;

                //calcula o número de páginas arredondando o resultado para cima
                $numPaginas = ceil($total/$registros);

                //variavel para calcular o início da visualização com base na página atual
                $inicio = ($registros*$pagina)-$registros;

                //seleciona os itens por página
                $queryAlunos   = $DB -> SearchQuery("aluno", "order by idAluno desc limit $inicio, $registros");

                while( $linha = mysqli_fetch_assoc($queryAlunos) ){
                  $idAluno = $linha['idAluno'];
                  $Qualificacao = new ModelQualificacoes();
                  $ResultadoQ = $Qualificacao->ReadQualificacoes("where codAluno = $idAluno");

                ?>

                <div class="col s12 m6">
                    <div class="card horizontal hoverable">
                        <div class="card-image activator">
                            <img src="Images/Upload/<?= $linha['foto'] ?>" alt="Imagem perfil" class="responsive-img circle" >
                            <span class="card-title black-text"><?=$linha['nome']?></span>
                        </div>
                        <div class="card-content">

                          <!-- <span class="center-align">Habilidades:</span> -->
                            <?php while($qualificacao = mysqli_fetch_assoc($ResultadoQ)){ ?>
                            <span class="chip"><?=$qualificacao['competencia']?></span>
                            <?php } ?>
                            <a href="OnePage.php?link=Candidato<?= '&id='.$linha['idAluno'].'&cod='.$linha['codUsuario'].'&anterior='.$_SERVER['QUERY_STRING']?>"><button class="btn blue">Ver perfil</button></a>

                        </div>
                    </div>
                </div>
                <?php }
              }
                $paginaMenosUm  = isset($_GET['pagina']) ? ($_GET['pagina'] - 1) : 1;
                $paginaMaisUm   = isset($_GET['pagina']) ? ($_GET['pagina'] + 1) : 1;
                ?>

            </div>
        <div class="row">
            <center>
              <ul class="pagination">
                  <li class="<?php if($pagina == 1) echo 'disabled' ?>">
                      <a href="<?php if($pagina > 1) echo 'OnePage.php?link=Candidatos&pagina='.$paginaMenosUm ?>">
                          <i class="material-icons">chevron_left</i>
                      </a>
                  </li>
                  <?php
                      for($i = 1; $i < $numPaginas + 1; $i++) {
                           //echo "<a href='OnePage.php?link=Vagas&pagina=$i'>".$i."</a> ";
                           if($i == $pagina)
                              echo "<li class='active blue'><a href='OnePage.php?link=Candidatos&pagina='.$i>$i</a></li>";
                           else
                              echo "<li class='waves-effect'><a href='OnePage.php?link=Candidatos&pagina=".$i."'> $i</a></li>";
                      }
          ?>
              <li class="waves-effect <?php if($pagina == $numPaginas) echo 'disabled' ?>">
                  <a href="<?php if($pagina < $numPaginas) echo 'OnePage.php?link=Candidatos&pagina='.$paginaMaisUm ?>">
                      <i class="material-icons">chevron_right</i>
                  </a>
              </li>
          </ul>
            </center>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row" >
        <div class="col s12 m12" id="CandidatosComPesquisa">

        </div>
      </div>
    </div>
</body>

</html>
