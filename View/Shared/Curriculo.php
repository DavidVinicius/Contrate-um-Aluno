<?php
    $email = $_SESSION['usuario'];
    
    if(file_exists("Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "Controller/PaginaPrivadaOuPublica.class.php";
    elseif(file_exists("../../Controller/PaginaPrivadaOuPublica.class.php"))
      require_once "../../Controller/PaginaPrivadaOuPublica.class.php";
    else
      echo "<h1>Impossível encontrar o arquivo PaginaPrivadaOuPublica.class.php</h1>";

  $pagina = new PaginaPrivadaOuPublica();
  if(!$pagina->PrivadaOuPublica())
    header("location: ../../Index.php");
  else
    header("location: ../../Home.php");
?>
    <!DOCTYPE html>
    <html lang="pt-br" ng-app='curriculo'>

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <script src='js/jquery-3.1.0.min.js'></script>
        <script src='js/angular.min.js'></script>
        <script src="js/materialize.js"></script>
        <script src='js/Curriculo.js'></script>
    </head>

    <body ng-controller='Curriculo'>
        <div class="container">
            <h1 class="flow-text center-align">Currículo</h1>
            <form action="Controller/Cadastro/CadastroAluno.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="nome">Nome Completo</label>
                        <input placeholder="Digite seu nome" name="nome" id="nome" type="text" class="" required> </div>
                    <div class="col s12 m6 push-m1 ">
                        <div class="file-field input-field col s12 push-s3 m3">
                            <div class="btn blue" style='margin-bottom:10px'> <span> Foto perfil</span>
                                <input type="file" id='foto' name="foto" accept='image/*' onchange='loadFile(event)'> </div>
                        </div>
                        <br>
                        <div class="file-path-wrapper col s4 push-s3 m6 push-m1 center">
                            <input class="file-path validate" type="text"> <img src="images/Padrao/PerfilPadrao.png" alt="Imagem Perfil" class='circle' id='preview' width="200px" height="200px"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                       <label for="data">Data de Nascimento: </label><br>
                        <input type="date" placeholder="Digite sua data de Nascimento" name="dataNascimento" required id="data" ng-model="dataNascimento"> </div>
                    <div class="input-field col s12 m6">
                        <label for="rg">RG</label><br>
                        <input type="text" name="rg" id="rg" class="validate" required> </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class='validate' required> </div>

                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" id="cep" required> </div>
                    <div class="input-field col s12 m4">
                        <select name="estado" id="estado" required>
                            <option value="" selected disabled></option>
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
                        <label for="estado">Estado</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m7">
                        <label for="rua">Rua:</label>
                        <input type="text" name="rua" id="rua" required> </div>
                    <div class="input-field col s12 m2">
                        <label for="numero">Número:</label>
                        <input type="number" name="numero" id="numero" required> </div>
                    <div class="input-field col s12 m3">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" required> </div>
                </div>
                <div class="row">
                   <div class="input-field col s12 m6">
                       <label for="complemento">Complemento:</label>
                       <input type="text" name="complemento" id="complemento">
                   </div>
                    <div class="input-field col s12 m6">
                        <label for="objetivo">Objetivo</label>
                        <input placeholder="Qual a vaga que você almeja?" type="text" name="objetivo" id="objetivo">
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <div class="chips chips-placeholder autocomplete"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <h1 class='flow-text'>Seus Telefones</h1>
                        <div class="card-panel small" ng-repeat="tel in Telefones"> <i class="material-icons right" ng-click="removeTelefone($Index)">close</i>
                            <span class="card-title flow-text">{{tel.tipo}} - {{tel.telefone}}</span>

                         </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="input-field col s12 m4">

                           <input class="with-gap" name="tipo" type="radio" id="celular" value="Celular" ng-model="tipo" />
                            <label for="celular">Celular</label><br>
                            <input class="with-gap" name="tipo" type="radio" id="Comercial" value="Comercial" ng-model="tipo" />
                            <label for="Comercial">Comercial</label><br>
                            <input class="with-gap" name="tipo" type="radio" id="recado" value="Recado" ng-model="tipo" />
                            <label for="recado">Recado</label><br>
                            <input class="with-gap" name="tipo" type="radio" id="Residencial" value="Residencial" ng-model="tipo" />
                            <label for="Residencial">Residencial</label><br>

                        </div>
                        <div class="input-field col s12 m8">
                            <label for="telefone">Telefone</label>
                            <input placeholder="99 99999-9999" type="tel" id='telefone' class='flow-text' ng-model="telefone">
                                 <a href="" class='btn blue' ng-click='adicionarTelefone()'>Adicionar Telefone</a>

                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <h1 class='flow-text'>Suas formações</h1>
                        <div class="col m12">
                            <div class="card-panel small hoverable" ng-repeat='x in formacao'> <i class='material-icons right' ng-click='remove($Index)'>close</i> <span class="card-title"><h6>{{x.ano}} - {{x.instituicao}}</h6></span>
                                <div class="card-content">
                                    <p class='flow-text'>{{x.curso}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col m6">
                        <h1 class='flow-text  center-align'>Formação</h1>
                        <div class="input-field col s12 m12">
                            <label for="data">Ano de Conclusão</label>
                            <input type="text" name="ano" id="data" ng-model="anoC" maxlength="4"> </div>
                        <div class="input-field col s12 m12">
                            <label for="titulo">Formação</label>
                            <input type="text" class='validate length' id="titulo" ng-model='curso' length="40" maxlength="40"> </div>
                        <div class="input-field col s12 m12">
                            <label for="instituicao">Instituição</label>
                            <input type="text" class='validate length' id="instituicao" ng-model="escola" length="40" maxlength="40"> </div> <a class="btn blue" ng-click='adicionarFormacao()'>Adicionar Formação</a> </div>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <h1 class='flow-text'>Suas experiências</h1>
                        <div class="col s12 m12">
                            <div class="card-panel medium hoverable" ng-repeat="exp in Experiencia"> <i class="material-icons right" ng-click="removeExp($Index)">close</i> <span class="card-title"><h6 class="flow-text"> {{exp.cargo}} - {{exp.empresa}}</h6></span>
                                <div class="card-content truncate">
                                  <p>
                                    Data de início: {{exp.de}}
                                  </p>
                                  <p>
                                    Data de saída: {{exp.ate}}
                                  </p>
                                    <p>
                                      Descrição:<br>{{exp.texto}}
                                    </p>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12 m6">
                        <div class="col s12 m12">
                            <h1 class='flow-text center-align'>Experiência</h1>
                            <div class="input-field col s12 m6">
                                <label for="deExp">Data de inicio:</label><br>
                                <input type="date" name="deExp" id="deExp" ng-model="deExp"> </div>
                            <div class="input-field col s12 m6">
                              <label for="ateExp">Data de Saída:</label><br>
                                <input type="date" name="ateExp" id="ateExp" class="" ng-model="ateExp" ng-If="!atualExp">
                                <input type="checkbox" id="atualExp" ng-model="atualExp" />
                                <label for="atualExp">É o atual?</label>
                            </div>
                        </div>
                        <div class="input-field col s12 m12">
                          <label for="empresa">Qual empresa?</label>
                          <input type="text" name="empresa" id="empresa" ng-model="empresa" length="20" maxlength="20">
                        </div>
                        <div class="input-field col s12 m12">
                            <label for="cargo">Qual o cargo?</label>
                            <input type="text" class='validate' id="cargo" ng-model='nomeExperiencia' length="30" maxlength="30">
                        </div>
                        <div class="input-field col s12 m12">
                            <label for="experiencia">Diga sobre sua experiência</label>
                            <textarea name="" id="experiencia" cols="30" rows="10" class='materialize-textarea' length='255' ng-model="textoExperiencia" maxlength="255"></textarea>
                        </div> <a class="btn blue" ng-click='adicionarExperiencia()'>Adicionar Experiência</a> </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                       <label for="informacoesAdicionais">Informações Adicionais</label>
                        <textarea name="informacoesAdicionais" id="informacoesAdicionais" cols="30" rows="10" class="materialize-textarea" length="255" maxlength="255"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <input type="hidden" value="{{Telefones}}" name="Telefones" id="">
                        <input type="hidden" value="{{formacao}}" name="Formacoes" id="">
                        <input type="hidden" value="{{Qualificacoes}}" name="Qualificacoes" id="">
                        <input type="hidden" value="{{Experiencia}}" name="Experiencias" id=""> </div>
                    <div class=" center-align">
                        <input type="submit" value="Salvar Informações" class="btn btn-large blue">
                    </div>
                </div>
            </form>
        </div>
        <div class="col s12 m12" ng-repeat="x in master"> {{x}} </div>
        <script>
            var loadFile = function (event) {
                var foto = document.getElementById('preview');
                foto.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </body>

    </html>
