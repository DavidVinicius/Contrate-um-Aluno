<?php
    require_once "Model/ModelAluno.class.php";
    require_once "Model/ModelEnderecos.class.php";
    require_once "Model/ModelTelefones.class.php";
    require_once "Model/ModelFormacoes.class.php";
    require_once "Model/ModelExperiencias.class.php";
    require_once "Model/ModelQualificacoes.class.php";

    $idUsuario = $_SESSION['id'];
    $Aluno = new ModelAluno();
    $LerAluno = $Aluno->ReadAluno("where codUsuario = $idUsuario");
    $AssocAluno = mysqli_fetch_assoc($LerAluno);
    $idAluno = $AssocAluno['idAluno'];

    $Endereco = new Enderecos();
    $LerEndereco = $Endereco->ReadEnderecos("where codUsuario=$idUsuario");
    $AssocEndereco = mysqli_fetch_assoc($LerEndereco);

    $Telefones = new Telefones();
    $LerTelefones = $Telefones->ReadTelefones("where codUsuario=$idUsuario");

    $Qualificacoes = new ModelQualificacoes();
    $LerQualificacoes = $Qualificacoes->ReadQualificacoes("where codAluno=$idAluno");
//    $AssocQualificacoes = mysqli_fetch_assoc($LerQualificacoes);

    $Formacoes = new Formacoes();
    $LerFormacoes = $Formacoes->ReadFormacoes("where codAluno=$idAluno");


    $Experiencias = new Experiencias();
    $LerExperiencias = $Experiencias->ReadExperiencias("where codALuno=$idAluno");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/MostraCurriculo.js"></script>
    <style>
        .mycircle{
            width: 300px;
            height: 300px;
            border: none;
            border-radius: 100%;
        }
    </style>
</head>
<body ng-app="myapp" ng-controller="MostraCurriculo">
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $AssocAluno['nome'] ?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="aluno" data-campo="nome" data-idaluno="<?= $idAluno?>">
                    </div>
                    <div class="input-field col s12 m6 push-m2">
                        <img src="Images/Upload/<?= $AssocAluno['foto'] ?>" alt="Foto Perfil" class="responsive-img mycircle">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m3">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="text" name="dataNascimento" id="dataNascimento" value="<?= $AssocAluno['dataNascimento'] ?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="aluno" data-campo="dataNascimento" data-idaluno="<?= $idAluno?>">
                    </div>,
                    <div class="input-field col s12 m4">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?= $AssocAluno['cpf']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="aluno" data-campo="cpf" data-idaluno="<?= $idAluno?>">
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="rg">Rg:</label>
                        <input type="text" name="rg" id="rg" value="<?= $AssocAluno['rg']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="aluno" data-campo="rg" data-idaluno="<?= $idAluno?>">
                    </div>
                </div>
                <div class="row">
                  <div class="col s12 m8 push-m4">
                    <button class="btn blue" id="adicionarTelefone">Adicionar Novo telefone</button>
                  </div>
                  <div class="col s12 m12" id="novoTelefone">
                    <div class="input-field">
                      <input type="radio" name="radio" id="celular" class="with-gap" value="Celular">
                      <label for="celular">Celular</label>
                      <input type="radio" name="radio" id="comercial" class="with-gap" value="Comercial">
                      <label for="comercial">Comercial</label>
                      <input type="radio" name="radio" id="recado" class="with-gap" value="Recado">
                      <label for="recado">Recado</label>
                      <input type="radio" name="radio" id="residencial" class="with-gap" value="Residencial">
                      <label for="residencial">Residencial</label>
                    </div><br>
                    <div class="input-field">
                      <label for="telefone">Adicionar novo telefone</label>
                      <input type="text" name="telefone" id="telefone" class="flow-text" style="font-size:22px" ng-model="telefone">
                    </div>
                    <div class="input-field">
                      <button class="btn blue" id="adicionarNovoTelefone" ng-click="adicionarNovoTelefone()">Adicionar novo telefone</button>
                      <button class="btn red" id="esconderTelefone">Esconder</button>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col s12 m12">
                    <div class="input-field col s12 m4" ng-repeat="x in telefones">
                      <label for="{{x.telefone}}">Telefone {{x.tipo}}:</label>
                      <input placeholder=" " type="tel" name="{{x.telefone}}" id="{{x.telefone}}" value="{{x.telefone}}" data-position="right" data-delay="50" data-tooltip="É preciso atualizar para editar ou excluir" class="tooltipped" readonly>
                      <span class="yellow-text ">É preciso atualizar para editar ou excluir</span>

                    </div>
                    <?php
                        while($ResultTelefone = mysqli_fetch_assoc($LerTelefones))
                        {
                    ?>
                    <div class="input-field col s12 m3">
                            <label for="<?=$ResultTelefone['idTelefone']?>">Telefone <?= $ResultTelefone['tipo']?>: </label>
                            <input type="text" name="<?=$ResultTelefone['idTelefone']?>" id="<?=$ResultTelefone['idTelefone']?>" value="<?=$ResultTelefone['telefone']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="telefones" data-campo="telefone" data-idaluno="<?= $idAluno?>"       data-idtelefone="<?= $ResultTelefone['idTelefone'] ?>"><span class="red-text excluir" style="cursor:pointer" data-tabela="telefones" data-idtelefone="<?= $ResultTelefone['idTelefone'] ?>">Excluir</span>
                        </div>
                    <?php
                        }
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m2">
                      <label for="cep">CEP:</label>
                      <input type="text" name="cep" id="cep" value="<?= $AssocEndereco['cep'] ?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="cep" data-idaluno="<?= $idAluno?>">
                  </div>
                   <div class="input-field col s12 m4">
                       <label for="rua">Logradouro:</label>
                       <input type="text" name="rua" id="rua" value="<?= $AssocEndereco['rua'] ?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="rua" data-idaluno="<?= $idAluno?>">
                   </div>
                   <div class="input-field col s12 m1">
                       <label for="numero">Número:</label>
                       <input type="text" name="numero" id="numero" value="<?= $AssocEndereco['numero']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="numero" data-idaluno="<?= $idAluno?>">
                   </div>
                   <div class="input-field col s12 m4">
                       <label for="bairro">Bairro:</label>
                       <input type="text" name="bairro" id="bairro" value="<?= $AssocEndereco['bairro']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="bairro" data-idaluno="<?= $idAluno?>">
                   </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m5">
                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento" id="complemento" value="<?= $AssocEndereco['complemento']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="complemento" data-idaluno="<?= $idAluno?>">
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" value="<?= $AssocEndereco['cidade']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="cidade" data-idaluno="<?= $idAluno?>">
                    </div>
                    <div class="input-field col s12 m3">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" value="<?= $AssocEndereco['estado']?>" class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="enderecos" data-campo="estado" data-idaluno="<?= $idAluno?>">
                    </div>
                </div>

                <div class="row">
                  <div class="col s12 m8 push-m4">
                    <button class="blue btn " id="adicionarNovaHabilidade">Adicionar nova habilidade</button>
                  </div><br>
                  <div class="col s12 m12" id="novaHabilidade">
                    <div class="input-field col s12 m12">
                      <label for="competencia">Nova Habilidade: </label>
                      <input type="text" name="competencia" id="competencia" ng-model="competencia">
                      <button class="btn red" id="esconderNovaHabilidade">Esconder</button>
                    </div>
                  </div>
                    <p class="center-align flow-text">Habilidades</p>
                             <div class="col s12 m12">
                    <?php
                        while($AssocQualificacoes = mysqli_fetch_assoc($LerQualificacoes))
                        {
                            ?>
                                <div class="chip">
                                    <span class="tooltipped contentEditable flow-text" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="qualificacoes" data-campo="competencia" data-idaluno="<?= $idAluno?>" contentEditable='true' data-idqualificacao="<?= $AssocQualificacoes['idQualificacoes']?>"><?= $AssocQualificacoes["competencia"]?></span>
                                    <i class="close material-icons excluir" data-tabela="qualificacoes" data-idqualificacao="<?= $AssocQualificacoes['idQualificacoes']?>">close</i>
                                </div>
                            <?php
                        }
                    ?>
                                <div class="chip" ng-repeat="x in qualificacoes">
                                  <span class="flow-text">{{x.competencia}}</span>
                                  <i class="material-icons close">close</i>
                                </div>
                             </div>
                </div><br>
                <div class="row" >
                    <div class="col s12 m8 push-m4">
                        <button class="btn blue " id="adicionarNovaFormacao">Adicionar nova Formação</button>
                    </div>
                    <div class="col m12" id="novaFormacao">
                        <h1 class='flow-text  center-align'>Adicionar nova formação</h1>
                        <div class="input-field col s12 m12">
                            <label for="data">Ano de Conclusão</label>
                            <input type="text" name="ano" id="data" ng-model="anoC" maxlength="4"> </div>
                        <div class="input-field col s12 m12">
                            <label for="titulo">Formação</label>
                            <input type="text" class='validate length' id="titulo" ng-model='curso' length="35" maxlength="35"> </div>
                        <div class="input-field col s12 m12">
                            <label for="instituicao">Instituição</label>
                            <input type="text" class='validate length' id="instituicao" ng-model="escola" length="30" maxlength="30"> </div> <a class="btn blue" ng-click='adicionarFormacao()'>Adicionar Formação</a>
                            <input type="hidden" name="idAluno" value="<?= $idAluno?>">
                            <button class="btn red" id="esconderNovaFormacao">Esconder </button>
                    </div>
                <br>
                   <p class="center-align flow-text">Suas formações</p>

                    <div class="col s12 m12">

                    <div class="card col m6 hoverable" ng-repeat='x in formacao'>
                       <span class="card-title"> {{x.curso}} </span>
                        <div class="card-content">
                            <h6>{{x.ano}} - {{x.instituicao}}</h6>
                        </div>
                        <div class="card-action">
                              <button class="btn yellow excluir" ng-click="excluirAngular()">Atualize a página para poder Excluir</button>
                        </div>
                    </div>


                    <?php
                        while($ResultFormacoes = mysqli_fetch_assoc($LerFormacoes))
                        {

                        ?>
                            <div class="card hoverable  col m6" >

                                <span class="card-title tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="formacoes" data-campo="curso" data-idaluno="<?= $idAluno?>" data-idformacao="<?= $ResultFormacoes['idFormacao'] ?>" contenteditable="true"><?=  $ResultFormacoes['curso'] ?></span>
                                <div class="card-content">
                                    <span class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="formacoes" data-campo="anoConclusao" data-idaluno="<?= $idAluno?>" data-idformacao="<?= $ResultFormacoes['idFormacao'] ?>" contenteditable="true"><?= $ResultFormacoes['anoConclusao']?></span>  -

                                      <span class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="formacoes" data-campo="instituicao" data-idaluno="<?= $idAluno?>" data-idformacao="<?= $ResultFormacoes['idFormacao'] ?>" contenteditable="true"><?= $ResultFormacoes['instituicao'] ?></span>
                                </div>
                                <div class="card-action">
                                    <button class="btn red excluir" data-idlinha="<?= $ResultFormacoes['idFormacao'] ?>" data-tabela="formacoes">Excluir</button>
                                </div>

                            </div>

                        <?php
                        }

                    ?>
                    </div>
                </div><br>
                <div class="row">
                            <div class="col s12 m8 push-m4">
                                <button class="btn blue " id="adicionarExperiencia">Adicionar nova Experiência</button>
                            </div>
                             <div class="input-field col s12 m12" id="novaExperiencia">
                                    <div class="col s12 m12">
                                        <h1 class='flow-text center-align'>Experiência</h1>
                                        <div class="input-field col s12 m6">
                                            <label for="deExp">Data de inicio:</label><br>
                                            <input type="date" name="deExp" id="deExp" ng-model="deExp"> </div>
                                        <div class="input-field col s12 m6">
                                           <label for="ateExp" ng-If="!atualExp">Data de Saída:</label><br>
                                            <input type="date" name="ateExp" id="ateExp" class="" ng-model="ateExp" ng-If="!atualExp">
                                            <input type="checkbox" id="atualExp" ng-model="atualExp" />
                                            <label for="atualExp">É o atual?</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s12 m12">
                                        <label for="cargo">Cargo</label>
                                        <input type="text" class='validate' id="cargo" ng-model='nomeExperiencia'> </div>
                                    <div class="input-field col s12 m12">
                                        <label for="experiencia">Diga sobre sua experiência</label>
                                        <textarea name="" id="experiencia" cols="30" rows="10" class='materialize-textarea' length='255' ng-model="textoExperiencia"></textarea>
                                    </div>

                                        <input type="hidden" name="idAluno" value="<?= $idAluno?>">

                                         <a class="btn blue" ng-click='adicionarNovaExperiencia()'>Adicionar Experiência</a>
                                          <a class="btn red" id="esconderNovaExperiencia" >Esconder</a>
                             </div>
                             <br>
                              <p class="center-align flow-text">Suas Experiências</p>

                        <div class=" col s12 m12">
                        <div class="card col s12 m6" ng-repeat="x in experiencias">
                            <span class="card-title" contenteditable="true"> {{x.cargo}}</span>
                            <div class="card-content">
                                <p>Data de início: <span class="flow-text">{{x.de}}</span></p>
                                <p>Data de Saída:    <span class="flow-text">{{x.ate}}</span></p>
                               <p> descrição: <br>{{x.descricao}}</p>
                            </div>
                            <div class="card-action">
                                <button class="btn red excluir">Excluir</button>
                            </div>

                        </div>
                    <?php
                        while($ResultExperiencia = mysqli_fetch_assoc($LerExperiencias)){
                    ?>
                           <div class="card hoverable col m6 s12">


                                    <span class="tooltipped contentEditable card-title" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="experiencias" data-campo="cargo" data-idaluno="<?= $idAluno?>" data-idexperiencia="<?= $ResultExperiencia['idExperiencia'] ?>" contenteditable="true" maxlength="20"><?= $ResultExperiencia['cargo']  ?></span> -

                                    <span class="card-title tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="experiencias" data-campo="empresa" data-idaluno="<?= $idAluno?>" data-idexperiencia="<?= $ResultExperiencia['idExperiencia'] ?>" contenteditable="true" >
                                      <?= $ResultExperiencia['empresa']?></span>
                                <div class="card-content">
                                  <p>
                                    Data de Inicio:
                                     <span class=" tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="experiencias" data-campo="dataInicio" data-idaluno="<?= $idAluno?>" data-idexperiencia="<?= $ResultExperiencia['idExperiencia'] ?>" contenteditable="true" >
                                         <?= $ResultExperiencia['dataInicio']?></span>
                                  </p>
                                  <p>
                                    Data de Saída:
                                    - <span class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="experiencias" data-campo="dataSaida" data-idaluno="<?= $idAluno?>" data-idexperiencia="<?= $ResultExperiencia['idExperiencia'] ?>"  contenteditable="true"> <?= $ResultExperiencia['dataSaida']  ?></span>

                                  </p>
                                    <p>
                                      Descrição: <br>
                                      <span class="tooltipped contentEditable" data-position="right" data-delay="50" data-tooltip="Click para editar" data-tabela="experiencias" data-campo="descricao" data-idaluno="<?= $idAluno?>" data-idexperiencia="<?= $ResultExperiencia['idExperiencia'] ?>" contenteditable="true"><?= $ResultExperiencia['descricao']  ?></span>
                                    </p>
                                </div>
                                <div class="card-action">
                                    <button class="btn red excluir" data-idlinha="<?= $ResultExperiencia['idExperiencia'] ?>" data-tabela="experiencias" >Excluir</button>
                                </div>
                           </div>

                    <?php
                        }
                    ?>
                        </div>
                </div>
                

            </div>
        </div>
    </div>



</body>
</html>
