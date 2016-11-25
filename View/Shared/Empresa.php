<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js">
    </script>
    <script type="text/javascript" src="js/angular.min.js">
    </script>
    <script type="text/javascript" src="js/materialize.min.js">

    </script>
    <script type="text/javascript" src="js/Empresa.js">

    </script>

</head>
<body ng-app="myapp" ng-controller="Empresa">

    <div class="container">
    <div class="row">
        <div class="col s12 m12">
            <form action="Controller/Cadastro/CadastroEmpresa.php" method="post" enctype="multipart/form-data" id="CadastrarEmpresa">
                <div class="row">
                  <div class="input-field col s12 m6">
                      <label for="nome">Nome Fantasia:</label>
                      <input type="text" name="nome" id="nome" required="">
                  </div>
                  <div class="col s12 m6 push-m1 ">
                      <div class="file-field input-field col s12 push-s3 m3">
                          <div class="btn blue" style='margin-bottom:10px'> <span> Foto perfil</span>
                              <input type="file" id='foto' name="foto" accept='image/*' onchange='loadFile(event)'> </div>
                      </div>
                      <br>
                      <div class="file-path-wrapper col s4 push-s3 m6 push-m1 center">
                          <input class="file-path validate" type="text" value="Logo da sua empresa" readonly="">  <img src="images/Padrao/PerfilPadrao.png" alt="Imagem Perfil" class=' responsive-img' id='preview'> </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <label for="cnpf">CNPJ:</label>
                    <input type="text" name="cnpj" id="cnpj" required="">
                  </div>
                  <div class="input-field col s12 m6">
                    <label for="area">Área de atuação:</label>
                    <input type="text" name="areaAtuacao" id="areaAtuacao" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m3">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" required>
                  </div>
                  <div class="input-field col s12 m4">
                    <label for="rua">Logradouro:</label>
                    <input type="text" name="rua" id="rua" required>
                  </div>
                  <div class="input-field col s12 m2">
                    <label for="numero">numero</label>
                    <input type="number" name="numero" id="numero" required>
                  </div>
                  <div class="input-field col s12 m3">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" required>
                  </div>
                  <div class="input-field col s12 m5">
                    <label for="complemento">Complemento:</label>
                    <input type="text" name="complemento" id="complemento">
                  </div>
                  <div class="input-field col s12 m4">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" required>
                  </div>
                  <div class="input-field col s12 m3" >
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" >
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
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <h1 class="center-align flow-text">Seus Telefones</h1>
                    <div class="card-panel small" ng-repeat="tel in telefones"> <i class="material-icons right" ng-click="removeTelefone($Index)">close</i>
                        <span class="card-title flow-text">{{tel.tipo}} - {{tel.telefone}}</span>
                     </div>
                  </div>
                  <div class="input-field col s12 m6">
                    <div class="input-field col s12 m4">
                      <input type="radio" name="radio" id="celular" class="with-gap" value="Celular">
                      <label for="celular">Celular:</label>
                      <input type="radio" name="radio" id="Comercial" class="with-gap" value="Comercial">
                      <label for="Comercial">Comercial:</label>
                      <input type="radio" name="radio" id="Recado" class="with-gap" value="Recado">
                      <label for="Recado">Recado:</label>
                    </div>
                    <div class="input-field col s12 m8">
                      <label for="telefone">Telefone:</label>
                      <input type="tel" name="telefone" id="telefone" ng-model="Tel">
                      <button class="btn blue cancelaEvento" ng-click="adicionarTelefone()">Adicionar telefone</button>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="input-field col s12 m12">
                    <label for="historia"> Conte sobre sua empresa</label>
                    <textarea name="historia" id="empresa" cols="30" rows="10" class="materialize-textarea" maxlength="65000" length="65000" required>

                    </textarea>
                  </div>
                </div>
                <div class="row">
                    <div class="col s12 m12">
                      <label for="valores">Quais são os Valores da sua empresa?</label><br>
                      <div class="chips" id="valores"></div>
                    </div>
                </div>
                <div class="row">

                  <div class="input-field col s12 m12">
                    <label for="missao"> Qual a Missão da sua empresa?</label>
                    <textarea name="missao" id="missao" cols="30" rows="10" class="materialize-textarea"  maxlength="255" length="255" required ng-model="missao">

                    </textarea>
                  </div>
                </div>
                <div class="row">

                  <div class="input-field col s12 m12">
                    <label for="visao"> Qual a Visão da sua empresa?</label>
                    <textarea name="visao" id="visao" cols="30" rows="10" class="materialize-textarea" maxlength="255" length="255" required ng-model="visao">

                    </textarea>
                  </div>
                </div>


                <a href="#confirmacao" class="btn blue waves-effect waves-light modal-trigger btn-large" data-target="confirmacao" >Cadastrar dados</a>
                <input type="hidden" name="Telefones" id="Telefones" value="{{telefones}}" autocomplete="off">
                <input type="hidden" name="valores" id="valores" value="{{Valores}}" autocomplete="off">

            <div class="modal modal-fixed-bottom" id="confirmacao">
              <div class="modal-content">
                  <h1 class="center-align flow-text yellow-text">Atenção</h1>
                  <p><b> Seus dados estarão sujeitos a verificação, em caso de falsas informações seu usuário será excluido! </b></p>
                   <div class="switch">
                      <label>
                        Não concordo
                        <input  type="checkbox" ng-model="check">
                        <span class="lever"></span>
                        Concordo
                      </label>
                    </div>
              </div>
              <div class="modal-footer">
                  <input type="submit" value="Salvar dados" class="btn blue modal-close" data-target="confirmacao" ng-disabled="!check">
                </form>
                  <a href="#!" class="btn-flat red-text waves-effect waves-red modal-close">Cancelar</a>
              </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loadFile = function (event) {
        var foto = document.getElementById('preview');
        foto.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
</body>
</html>
