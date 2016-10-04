<?php
    $email = $_SESSION['usuario'];
 
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
        <form action="Teste/testeCadastroAluno.php" method="post">
            <div class="row">
                <div class="input-field col s12 m6">
                 <label for="nome">Nome Completo</label>
                 <input placeholder="Digite seu nome" name="nome" id="nome" type="text" class="">
                  
                </div>
                <div class="col s12 m6 push-m1 ">
                   <div class="file-field input-field col s12 push-s3 m3">
                       <div class="btn blue" style='margin-bottom:10px'>
                           <span> Foto perfil</span>
                           <input type="file"  id='foto' name="" accept='image/*' onchange='loadFile(event)'>
                        </div>
                   </div><br>
                   <div class="file-path-wrapper col s4 push-s3 m6 push-m1 center">
                      <input class="file-path validate" type="text">
                       <img src="images/Padrao/PerfilPadrao.png" name="foto" alt="Imagem Perfil" class='circle responsive-img' id='preview' >
                   </div>
                   
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="data">Data de Nascimento </label>
                    <input type="date" name="dataNascimento" id="data" class="datepicker" ng-model="dataNascimento">
                </div>
                <div class="input-field col s12 m6">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" id="rg" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class='validate'>
                </div>
                <div class="input-field col s12 m6">
                    <select name="nacionalidade">
                      <option value="" disabled selected></option>
                      <option value="1">Carro</option>
                      <option value="2">Moto</option>
                      <option value="3">Elefante</option>
                    </select>
                    <label>Escolha sua Nacionalidade</label>
                    
                </div>
            </div>
            <div class="row">
               <div class="input-field col s12 m4">
                  <label for="cep">CEP:</label>
                   <input type="text" name="cep" id="cep">
               </div>
                <div class="input-field col s12 m4">
                    <select name="estado" id="estado">
                       <option value="" selected disabled></option>
                        <option value="1">AC</option>
                        <option value="2">AL</option>
                        <option value="3">AM</option>
                        <option value="4">AP</option>
                        <option value="5">BA</option>
                        <option value="6">CE</option>
                        <option value="7">DF</option>
                        <option value="8">ES</option>
                        <option value="9">GO</option>
                        <option value="10">MA</option>
                        <option value="11">MG</option>
                        <option value="12">MS</option>
                        <option value="13">MT</option>
                        <option value="14">PA</option>
                        <option value="15">PB</option>
                        <option value="16">PE</option>
                        <option value="17">PI</option>
                        <option value="18">PR</option>
                        <option value="19">RJ</option>
                        <option value="20">RN</option>
                        <option value="21">RO</option>
                        <option value="22">RR</option>
                        <option value="23">RS</option>
                        <option value="24">SC</option>
                        <option value="25">SE</option>
                        <option value="27">TO</option>	
                    </select>
                    <label for="">Estado</label>
                </div>
                <div class="input-field col s12 m4">
                   <select name="" id="">
                        <option value="" disabled selected>test</option>
                        <option value="">q</option>
                        <option value="">e</option>   
                    </select>
                    <label for="">Estado</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m7">
                   <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" id="endereco">
                </div>
                <div class="input-field col s12 m2">
                    <label for="numero">Número</label>
                    <input type="number" name="numero" id="numero">
                </div>
                <div class="input-field col s12 m3">
                    <label for="numero">Bairro</label>
                    <input type="text" name="bairro" id="numero">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">                   
                   <label for="objetivo">Objetivo</label>
                    <input type="text" name="objetivo" id="objetivo">
                </div>
                <div class="input-field col s12 m6">
                    <div class="chips chips-placeholder autocomplete"></div>
                </div>
            </div>
            <div class="row">
              <div class="col s12 m6">
                      <h1 class='flow-text'>Seus Telefones</h1>
                   <div class="card-panel small" ng-repeat="tel in Telefones">
                       <i class="material-icons right" ng-click="removeTelefone($Index)">close</i>
                       <span class="card-title">{{tel.telefone}}</span>
                       
                   </div>
               </div>
               <div class="col s12 m6">
                   
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
                        <div class="card-panel small hoverable" ng-repeat='x in formacao'>
                            
                           <i class='material-icons right' ng-click='remove($Index)'>close</i>
                            <span class="card-title"><h6>{{x.ano}} - {{x.instituicao}}</h6></span>

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
                        <input type="text" name="ano" id="data" ng-model="anoC">
                        </div>
                        <div class="input-field col s12 m12">
                           <label for="titulo">Formação</label>
                            <input type="text" class='validate length' id="titulo" ng-model='curso' length="25">
                        </div>
                        <div class="input-field col s12 m12">
                            <label for="instituicao">Instituição</label>
                            <input type="text" class='validate length' id="instituicao" ng-model="escola" length="30">
                        </div>
                        <a class="btn blue" ng-click='adicionarFormacao()'>Adicionar Formação</a>
                </div>
            </div>
            <div class="row">
               <div class="col s12 m6">
                   <h1 class='flow-text'>Suas experiências</h1>
                   <div class="col s12 m12">
                       <div class="card-panel medium hoverable" ng-repeat="exp in Experiencia">
                           <i class="material-icons right" ng-click="removeExp($Index)">close</i>
                           <span class="card-title"><h6 class="flow-text">{{exp.tempoExperiencia}} - {{exp.cargo}}</h6></span>
                           <div class="card-content truncate">
<!--                                <a href="" ng-click="verExp($Index)">Ver Descrição</a>-->
                                {{exp.texto}}
                           </div>
                           
                       </div>
                   </div>
               </div>
                <div class="input-field col s12 m6">
                    <div class="col s12 m12">
                       <h1 class='flow-text center-align'>Experiência</h1>
                        <div class="input-field col s12 m6">
                           <label for="deExp">Data de inicio:</label>
                            <input type="text" name="deExp" id="deExp" ng-model="deExp">
                        </div>
                        <div class="input-field col s12 m6">
                           
                            <input type="date" name="ateExp" id="ateExp" class="anoFormacao" ng-model="ateExp" ng-If="!atualExp">
                            <input type="checkbox" id="atualExp" ng-model="atualExp"/>
                            <label for="atualExp">É o atual?</label>
                        </div>
                    </div>
                        <div class="input-field col s12 m12">
                           <label for="cargo">Cargo</label>
                            <input type="text" class='validate' id="cargo" ng-model='nomeExperiencia'>
                        </div>
                        <div class="input-field col s12 m12">
                            <label for="experiencia">Diga sobre sua experiência</label>
                            <textarea name="" id="experiencia" cols="30" rows="10" class='materialize-textarea' length='255' ng-model="textoExperiencia"></textarea>
                        </div>
                        <a class="btn blue" ng-click='adicionarExperiencia()'>Adicionar Experiência</a>
                </div>
            </div>
            <div class="row">
               <div class="input-field col s12 m12">
                   <input type="text" value="{{Telefones}}" name="Telefones" id="">
                   <input type="text" value="{{formacao}}" name="Formacoes" id="">
                   <input type="text" value="{{Qualificacoes}}" name="Qualificacoes" id="">
                   <input type="text" value="{{Experiencia}}" name="Experiencias" id="">
               </div>
                <div class=" center-align">
                    <input type="submit" value="Salvar Informações" class="btn blue">
                </div>
            </div>
            
        </form>
    </div>
    
    <div class="col s12 m12" ng-repeat="x in master">
        {{x}}
    </div>
    
    <script>
        var loadFile = function(event){
            var foto = document.getElementById('preview');
            foto.src = URL.createObjectURL(event.target.files[0]);
        }
        
        
        
    </script>
    
</body>
</html>