<?php
    include_once "Model/DataBase.class.php";
    include_once "Model/ModelQualificacoes.class.php";
    include_once "Model/ModelAluno.class.php";
    $Aluno = new ModelAluno();
    $id = $_SESSION['id'];
    $Consulta = $Aluno->ReadAluno("");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src='js/Candidatos.js'></script>
</head>

<body>
    <div class="container">
      <div class="row">
        <form method="Controller/Pesquisa.php" class="" method="get" id="pesquisar">
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
            <div class="">
                <?php
                while( $linha = mysqli_fetch_assoc($Consulta) ){
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
                            <a href="OnePage.php?link=Candidato&id=<?=$linha['idAluno']?>&cod=<?= $linha['codUsuario']?>"><button class="btn blue">Ver perfil</button></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
