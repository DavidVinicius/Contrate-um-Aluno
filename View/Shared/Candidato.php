<?php
  // include "Model/DataBase.class.php";
   /*$DB                    = new DataBase();

   $ConsultaAluno         = $DB->SearchQuery("aluno","where idAluno = $idAluno");
   $ResultAluno           = mysqli_fetch_assoc($ConsultaAluno);
   $codUsuario  = $ResultAluno['codUsuario'];
   //var_dump($codUsuario);
   $ConsultaEndereco      = $DB->SearchQuery("enderecos e
                                              inner join aluno a",
                                              "on e.codUsuario = $codUsuario
                                              and a.codUsuario = $codUsuario");
   $ResultEndereco        = mysqli_fetch_assoc($ConsultaEndereco);

   $ConsultaTelefone      = $DB->SearchQuery("telefones","where codUsuario = $idUsuario");

   $ConsultaExperiencia   = $DB->SearchQuery("experiencias","where codAluno = $idAluno");

   $ConsultaFormacoes     = $DB->SearchQuery("formacoes","where codAluno = $idAluno");

   $ConsultaQualificacoes = $DB->SearchQuery("qualificacoes", "where codAluno = $idAluno");*/
   include_once "Model/ModelTelefones.class.php";
   include_once "Model/ModelAluno.class.php";
   include_once "Model/ModelEnderecos.class.php";
   include_once "Model/ModelExperiencias.class.php";
   include_once "Model/ModelFormacoes.class.php";
   include_once "Model/ModelAluno.class.php";
   include_once "Model/ModelQualificacoes.class.php";
   $idAluno                = $_GET['id'];
   $idUsuario              = $_GET['cod'];
   $idUsuarioEmpresa       = $_SESSION['id'];
   $Aluno                  = new ModelAluno();
   $Endereco               = new Enderecos();
   $Telefone               = new Telefones();
   $Formacao               = new Formacoes();
   $Experiencia            = new Experiencias();
   $Qualificacao           = new ModelQualificacoes();
   $ResultAluno            = mysqli_fetch_assoc($Aluno -> ReadAluno("where idAluno = $idAluno"));
   $ConsultaTelefone       = $Telefone -> ReadTelefones("where codUsuario = $idUsuario");
   $ResultEndereco         = mysqli_fetch_assoc($Endereco-> ReadEnderecos("where codUsuario  = $idUsuario"));
   $ConsultaExperiencia    = $Experiencia -> ReadExperiencias("where codAluno = $idAluno");
   $ConsultaFormacoes      = $Formacao -> ReadFormacoes("where codAluno = $idAluno");
   $ConsultaQualificacoes  = $Qualificacao -> ReadQualificacoes("where codAluno = $idAluno");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/Candidato.js">    </script>
</head>
<body ng-app="myapp" ng-controller="Candidato">
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $ResultAluno['nome'] ?>" readonly>
                    </div>
                    <div class="input-field col s12 m6 push-m2">
                        <img src="Images/Upload/<?= $ResultAluno['foto']?>" alt="Foto Perfil" class="responsive-img circle" width="200px" height="200px">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="text" name="dataNascimento" id="dataNascimento" value="<?= $ResultAluno['dataNascimento'] ?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?= $ResultAluno['cpf']?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="rg">Rg:</label>
                        <input type="text" name="rg" id="rg" value="<?= $ResultAluno['rg']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <?php
                        while($ResultTelefone = mysqli_fetch_assoc($ConsultaTelefone))
                        {
                    ?>
                        <div class="input-field col s12 m4">
                            <label for="<?=$ResultTelefone['idTelefone']?>">Telefone:</label>
                            <input type="text" name="<?=$ResultTelefone['idTelefone']?>" id="<?=$ResultTelefone['idTelefone']?>" value="<?=$ResultTelefone['telefone']?>" readonly>
                        </div>

                    <?php
                        }
                    ?>
                </div>
                <div class="row">
                  <div class="input-field col s12 m2">
                      <label for="cep">CEP:</label>
                      <input type="text" name="cep" id="cep" value="<?= $ResultEndereco['cep'] ?>">
                  </div>
                   <div class="input-field col s12 m4">
                       <label for="rua">Rua:</label>
                       <input type="text" name="rua" id="rua" value="<?= $ResultEndereco['rua'] ?>" readonly>
                   </div>
                   <div class="input-field col s12 m1">
                       <label for="numero">Número:</label>
                       <input type="text" name="numero" id="numero" value="<?= $ResultEndereco['numero']?>" readonly>
                   </div>
                   <div class="input-field col s12 m4">
                       <label for="bairro">Bairro:</label>
                       <input type="text" name="bairro" id="bairro" value="<?= $ResultEndereco['bairro']?>" readonly>
                   </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m5">
                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento" id="complemento" value="<?= $ResultEndereco['complemento']?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" value="<?= $ResultEndereco['cidade']?>" readonly>
                    </div>
                    <div class="input-field col s12 m3">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" value="<?= $ResultEndereco['estado']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <p class="center-align flow-text">Habilidades</p>
                    <?php while($Qualificacao = mysqli_fetch_assoc($ConsultaQualificacoes)){ ?>
                    <span class="chip blue white-text"><?= $Qualificacao['competencia']?></span>
                    <?php } ?>
                </div>
                <div class="row">
                   <p class="center-align flow-text">Formações</p>
                    <?php
                        while($ResultFormacoes = mysqli_fetch_assoc($ConsultaFormacoes))
                        {

                        ?>
                            <div class="card col s12 m6 hoverable">
                                <span class="card-title"><?=  $ResultFormacoes['curso'] ?></span>
                                <div class="card-content">
                                    <?= $ResultFormacoes['anoConclusao']. " - ". $ResultFormacoes['instituicao'] ?>
                                </div>

                            </div>

                        <?php
                        }

                    ?>
                </div>
                <div class="row">
                              <p class="center-align flow-text">Experiências</p>

                    <?php
                        while($ResultExperiencia = mysqli_fetch_assoc($ConsultaExperiencia)){
                    ?>
                        <div class="card col s12 m6 hoverable">
                            <span class="card-title">  <?= $ResultExperiencia['cargo']. " - ". $ResultExperiencia['empresa']  ?></span>
                            <div class="card-content">
                               <p>
                                 Data de Inicio: <?= $ResultExperiencia['dataInicio']?>
                               </p>
                               <p>
                                 Data de Saída: <?= $ResultExperiencia['dataSaida']  ?>
                               </p>
                                <p>
                                  Descrição: <?= $ResultExperiencia['descricao']  ?>
                                </p>
                            </div>

                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="row">
                    <a href="#modal1" class="btn btn-large blue modal-trigger waves-effect waves-light">Marcar Entrevista</a>
                    <a href="" class="btn btn-large waves-effect waves-light">Voltar a página de candidatos</a>
                </div>
                <div class="row">
                  <div id="modal1" class="modal modal-fixed-footer">
                    <div class="modal-content">
                      <h1 class="center-align flow-text">Preencha e marque a entrevista</h1>
                      <div class="col s12 m12 l12">
                        <form action="Controller/MarcarEntrevista.php" method="post" id="marcarEntrevista">
                          <div class="row">
                            <div class="input-field col s12 m6">
                              <label for="data">Data da Entrevista</label><br>
                              <input type="date" name="data" id="data">
                            </div>
                            <div class="input-field col s12 m6">
                              <label for="hora">Hora da entrevista</label><br>
                              <input type="time" name="hora" id="hora">
                            </div>
                          </div>
                          <div class="row">

                            <div class="input-field col s12 m6">
                              <label for="local">Local da entrevista:</label>
                              <input type="text" name="local" id="local">
                            </div>
                            <div class="input-field col s12 m2">
                              <label for="numero">Número:</label>
                              <input type="text" name="numero" id="numero">
                            </div>
                            <div class="input-field col s12 m4">
                              <label for="bairro">Bairro:</label>
                              <input type="text" name="bairro" id="bairro">
                            </div>
                            <div class="input-field col s12 m4">
                              <label for="completemento">Complemento</label>
                              <input type="text" name="complemento" id="complemento">
                            </div>
                            <div class="input-field col s12 m4">
                              <label for="cidade">Cidade:</label>
                              <input type="text" name="cidade" id="cidade">
                            </div>
                            <div class="input-field col s12 m3" >
                              <!-- <label for="estado">Estado</label> -->
                              <select name="estado" id="estado" >
                                  <option value="" selected disabled>Estado</option>
                                  <option value="AC">AC</option>
                                  <option value="AL">AL</option>
                                  <option value="AM">AM</option>
                                  <option value="AP">AP</option>
                                  <option value="BA">BA</option>
                                  <option value="CE">CE</option>
                                  <option value="DF">DF</option>
                                  <option value="ES">ES</option>
                                  <option value="GO">GO</option>
                                  <option value="MA">MA</option>
                                  <option value="MG">MG</option>
                                  <option value="MS">MS</option>
                                  <option value="MT">MT</option>
                                  <option value="PA">PA</option>
                                  <option value="PB">PB</option>
                                  <option value="PE">PE</option>
                                  <option value="PI">PI</option>
                                  <option value="PR">PR</option>
                                  <option value="RJ">RJ</option>
                                  <option value="RN">RN</option>
                                  <option value="RO">RO</option>
                                  <option value="RR">RR</option>
                                  <option value="RS">RS</option>
                                  <option value="SC">SC</option>
                                  <option value="SE">SE</option>
                                  <option value="SP">SP</option>
                                  <option value="TO">TO</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m6">
                              <label for="vaga">Qual a vaga que vai oferecer?</label>
                              <input type="text" name="vaga" id="vaga">
                            </div>
                            <div class="input-field col s12 m3">
                              <label for="salario">Qual o salário?</label>
                              <input type="text" name="salario" id="salario">
                            </div>
                            <div class="input-field col s12 m3">
                              <label for="cargaHoraria">Carga horária semanal:</label>
                              <input type="number" name="cargaHoraria" id="cargaHoraria" maxlength="2" max="44" min="20">
                            </div>
                            <div class="input-field col s12 m12">
                              <label for="beneficios">Benefícios:</label><br><br>
                              <div class="chips chips-placeholder"></div>
                            </div>
                            <div class="input-field col s12 m12">
                              <label for="descricao">Descrição:</label>
                              <textarea name="name" rows="8" cols="40" class="materialize-textarea"></textarea>
                            </div>
                           </div>

                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="" class="btn-flat red-text modal-close">Cancelar</a>
                      <input type="hidden" id="idAluno" name="idAluno" value="<?= $idAluno ?>" />
                      <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $idUsuarioEmpresa ?>" />
                      <input type="submit" value="Marcar entrevista" class="btn-flat waves-light waves-green">
                    </form>
                    </div>
                  </div>

                </div>

            </div>
        </div>
    </div>
</body>
</html>
