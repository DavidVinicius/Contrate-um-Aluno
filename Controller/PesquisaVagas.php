<?php
require_once "../Model/ModelVaga.class.php";
require_once "../Model/ModelEmpresa.class.php";
$Vaga = new ModelVaga();
$Empresa = new ModelEmpresa();
$tabela = isset($_REQUEST['filtro'])?$_REQUEST['filtro']:'todos';
$valor  = isset($_REQUEST['pesquisa']) ? $_REQUEST['pesquisa'] : null;
$anterior = "link=Vagas&pesquisa=$valor&filtro=$tabela";

// $valor = "Programador";
      if ($tabela == 'todos') {
        echo "<h1 class='center-align flow-text'>Resultado para: $valor</h1>";
          if ( $Vaga -> ReadVaga(" where titulo like '". $valor ."'")) {
            $Consulta =  $Vaga -> ReadVaga(" where titulo like '%". $valor ."%'");
              while ($Linha = mysqli_fetch_assoc($Consulta)) {
                  $idEmpresa = $Linha['codEmpresa'];
                  $EmpresaAssoc = mysqli_fetch_assoc($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
                ?>
                <div class='col m6'>
                    <div class='card small hoverable'>
                        <div class='card-image waves-effect waves-block waves-light'>

                            <img class='activator' src='images/office.jpg'>

                        </div>
                        <div class='card-content'>
                            <span class='card-title activator grey-text text-darken-4'>
                                <?php $TamTitulo = strlen($Linha['titulo']);
                                        $TituloMenor = substr($Linha['titulo'], 0, 30)."...";
                                    if($TamTitulo > 29)
                                    {
                                        echo $TituloMenor;
                                    }else
                                    {
                                        echo $Linha['titulo'];
                                    }
                                ?><i class='material-icons right'>add</i></span>
                            <p class="blue-text"><?php echo $EmpresaAssoc['nome']; ?></p>
                        </div>
                        <div class='card-reveal'>
                              <span class='card-title grey-text text-darken-4'>
                                  <?php $TamTitulo = strlen($Linha['titulo']);
                                        if($TamTitulo > 29)
                                        {
                                            echo $TituloMenor;
                                        }else
                                        {
                                            echo $Linha['titulo'];
                                        }
                                  ?><br>
                                  <br>
                                  <i class='material-icons right'>close</i></span>
                            <p>Descrição: <?php
                                            $TamDesc = strlen($Linha['descricao']);
                                            if($TamDesc > 150)
                                            {
                                                echo substr($Linha['descricao'], 0, 49)."...";
                                                echo "<a href='OnePage.php?link=Vaga&id=".$Linha["idVaga"]."'>Ver mais</a>";
                                            }else
                                            {
                                                echo $Linha['descricao'];
                                            }

                                        ?></p>
                            <p>Carga horária: <?php echo number_format($Linha['cargaHoraria'], 1, ',', '.'); ?></p>
                            <p>Salário: R$: <?php echo number_format($Linha['salario'], 2, ',', '.'); ?></p>

                            <a class='btn blue' href='OnePage.php?link=Vaga<?= "&id=".$Linha["idVaga"]."&anterior=".$anterior ?>'>Ver vaga</a>
                        </div>
                    </div>
                </div>

                <?php
              }
          }else {
            echo "Nada encontrado";
          }

      }
      else if ($tabela == "salario") {

        if ( $Vaga -> ReadVaga("where salario like '%. $valor. %'")){

          $Consulta =  $Vaga -> ReadVaga(" where salario like '%". $valor ."%'");
          while ($Linha = mysqli_fetch_assoc($Consulta)) {
              $idEmpresa = $Linha['codEmpresa'];
              $EmpresaAssoc = mysqli_fetch_assoc($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
            ?>
            <div class='col m6'>
                <div class='card small hoverable'>
                    <div class='card-image waves-effect waves-block waves-light'>

                        <img class='activator' src='images/office.jpg'>

                    </div>
                    <div class='card-content'>
                        <span class='card-title activator grey-text text-darken-4'>
                            <?php $TamTitulo = strlen($Linha['titulo']);
                                    $TituloMenor = substr($Linha['titulo'], 0, 30)."...";
                                if($TamTitulo > 29)
                                {
                                    echo $TituloMenor;
                                }else
                                {
                                    echo $Linha['titulo'];
                                }
                            ?><i class='material-icons right'>add</i></span>
                        <p class="blue-text"><?php echo $EmpresaAssoc['nome']; ?></p>
                    </div>
                    <div class='card-reveal'>
                          <span class='card-title grey-text text-darken-4'>
                              <?php $TamTitulo = strlen($Linha['titulo']);
                                    if($TamTitulo > 29)
                                    {
                                        echo $TituloMenor;
                                    }else
                                    {
                                        echo $Linha['titulo'];
                                    }
                              ?>
                              <!-- <br> -->
                              <i class='material-icons right'>close</i></span>
                        <p>Descrição: <?php
                                        $TamDesc = strlen($Linha['descricao']);
                                        if($TamDesc > 150)
                                        {
                                            echo substr($Linha['descricao'], 0, 49)."...";
                                            echo "<a href='OnePage.php?link=Vaga&id=".$Linha["idVaga"]."'>Ver mais</a>";
                                        }else
                                        {
                                            echo $Linha['descricao'];
                                        }

                                    ?></p>
                        <p>Carga horária: <?php echo number_format($Linha['cargaHoraria'], 1, ',', '.'); ?></p>
                        <p>Salário: R$: <?php echo number_format($Linha['salario'], 2, ',', '.'); ?></p>

                        <a class='btn blue' href='OnePage.php?link=Vaga<?php echo "&id=".$Linha["idVaga"]."&anterior=".$_SERVER['QUERY_STRING'] ?>'>Ver vaga</a>
                    </div>
                </div>
            </div>

            <?php
          }
      }
      else{
        echo "Nada encontrado para $valor";
      }
    }

 ?>
