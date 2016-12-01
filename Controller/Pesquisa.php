<?php
  include_once "../Model/DataBase.class.php";
  include_once "../Model/ModelAluno.class.php";

  $DB     = new DataBase();
  $Aluno  = new ModelAluno();

  $tabela = isset($_REQUEST['filtro'])?$_REQUEST['filtro']:'todos';
  $valor  = isset($_REQUEST['pesquisa']) ? $_REQUEST['pesquisa'] : null;

  if(!$tabela)
      echo "Tabela não informada";
  if ($tabela && $tabela == "todos") {
      include_once "../Model/ModelQualificacoes.class.php";
      $Consulta = $DB -> SearchQuery('aluno',"where nome like '%".$valor."%'");
      echo "<h1 class='center-align flow-text'>Resultados para: $valor</h1>";
      if(isset($Consulta) )
      {
        while($linha = mysqli_fetch_assoc($Consulta))
        {
          $idAluno         = $linha['idAluno'];
          $Qualificacao    = new ModelQualificacoes();
          $ResultadoQ =    $Qualificacao -> ReadQualificacoes("where codAluno = $idAluno limit 4");

          ?>
          <div class="col s12 m6">
              <div class="card horizontal hoverable">
                  <div class="card-image activator">
                      <img src="Images/Upload/<?= $linha['foto'] ?>" alt="Imagem perfil" class="responsive-img circle" >
                      <span class="card-title  blue-grey-text text-lighten-3"><?=$linha['nome']?></span>
                  </div>
                  <div class="card-content">
                    <!-- <span class="center-align">Habilidades:</span> -->
                      <?php while($qualificacao = mysqli_fetch_assoc($ResultadoQ)){ ?>
                      <span class="chip"><?=$qualificacao['competencia']?></span>
                      <?php } ?>
                      <a href="OnePage.php?link=Candidato&id=<?=$linha['idAluno']?>&cod= <?= $linha['codUsuario']?>">
                        <button class="btn blue">Ver perfil</button>
                      </a>
                  </div>
              </div>
          </div>
          <?php
        }
      }
      else{
        echo "Nada encontrado :)";
      }
  }
  else if($tabela && $tabela == "qualificacoes")
  {
    include_once "../Model/ModelQualificacoes.class.php";
    $Consulta  = $DB -> SearchQuery("qualificacoes q, aluno a", "where q.codAluno = a.idAluno AND q.competencia like '%".$valor."%' group by nome","distinct(codAluno), competencia, nome, foto, idAluno, codUsuario");
    if(isset($Consulta) )
    {
      echo "<h1 class='center-align flow-text'>Resultado para: $valor</h1>";
      while($linha = mysqli_fetch_assoc($Consulta))
      {
        $idAluno         = $linha['idAluno'];
        $Qualificacao    = new ModelQualificacoes();
        $ResultadoQ      =    $Qualificacao -> ReadQualificacoes("where codAluno = $idAluno limit 4");

        ?>
        <div class="col s12 m6">
            <div class="card horizontal hoverable">
                <div class="card-image activator">
                    <img src="Images/Upload/<?= $linha['foto'] ?>" alt="Imagem perfil" class="responsive-img circle" >
                    <span class="card-title  blue-grey-text text-lighten-3"><?=$linha['nome']?></span>
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
        <?php
      }
    }
    else{
      echo "Nada encontrado :(";
    }
  }
  else if($tabela && $tabela == "experiencias")
  {
    $Consulta  = $DB->SearchQuery("experiencias e, aluno a",
    "where e.codAluno = a.idAluno and descricao like '%".$valor."%' or cargo like '%".$valor."%' group by cargo","distinct(codAluno),nome,foto,idAluno,codUsuario, cargo");
    if(isset($Consulta) )
    {
      include_once "../Model/ModelExperiencias.class.php";
      echo "<h1 class='center-align flow-text'>Resultado para: $valor</h1>";
      while($linha = mysqli_fetch_assoc($Consulta))
      {
        $idAluno         = $linha['idAluno'];
        $Experiencia     = new Experiencias();
        $ConsultaE       =    $Experiencia -> ReadExperiencias("where codAluno = $idAluno");

        ?>
        <div class="col s12 m6">
            <div class="card horizontal hoverable">
                <div class="card-image activator">
                    <img src="Images/Upload/<?= $linha['foto'] ?>" alt="Imagem perfil" class="responsive-img circle" >
                    <span class="card-title  blue-grey-text text-lighten-3"><?=$linha['nome']?></span>
                </div>
                <div class="card-content">
                  <span class="center-align flow-text">Experiências:</span><br>
                  <?php while ($ResultE = mysqli_fetch_object($ConsultaE)) {
                    ?>
                      <b><span><?= $ResultE -> cargo . " - ". $ResultE->empresa ?></span></b><br>
                    <?php
                  } ?>
                  <a href="OnePage.php?link=Candidato&id=<?=$linha['idAluno']?>&cod=<?= $linha['codUsuario']?>"><button class="btn blue">Ver perfil</button></a>
                </div>
            </div>
        </div>
        <?php
      }
    }
    else{
      echo "Nada encontrado :(";
    }
  }
  else if($tabela && $tabela == "formacoes")
  {
    $Consulta = $DB->SearchQuery("formacoes f, aluno a", "where f.codAluno = a.idAluno and curso like '%".$valor."%' or instituicao like '%".$valor."%' group by a.nome");
    include_once "../Model/ModelFormacoes.class.php";
    if(isset($Consulta) )
    {
      echo "<h1 class='center-align flow-text'>Resultado para: $valor</h1>";
      while($linha = mysqli_fetch_assoc($Consulta))
      {
        $idAluno         = $linha['idAluno'];
        $Formacao        = new Formacoes();
        $ConsultaF       =    $Formacao -> ReadFormacoes("where codAluno = $idAluno");

        ?>
        <div class="col s12 m6">
            <div class="card horizontal hoverable">
                <div class="card-image activator">
                    <img src="Images/Upload/<?= $linha['foto'] ?>" alt="Imagem perfil" class="responsive-img circle" >
                    <span class="card-title  blue-grey-text text-lighten-3"><?=$linha['nome']?></span>
                </div>
                <div class="card-content">
                  <span class="center-align flow-text">Formações:</span><br>
                  <?php while ($ResultF = mysqli_fetch_object($ConsultaF)) {
                    ?>
                     <b><span class=""><?=$ResultF -> curso?></span></b><br>
                    <?php
                  } ?>
                  <a href="OnePage.php?link=Candidato&id=<?=$linha['idAluno']?>&cod=<?= $linha['codUsuario']?>"><button class="btn blue">Ver perfil</button></a>
                </div>
            </div>
        </div>
        <?php
      }
    }
    else{
      echo "Nada encontrado :(";
    }
  }
  else{
    $resultado = "nada encontrado";
  }
?>
