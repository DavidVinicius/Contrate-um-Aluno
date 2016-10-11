<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/Materialize.min.js"></script>
    <script src="js/CriarVaga.js"></script>
</head>
<body ng-app="myapp" ng-controller="CriarVaga">
    <div class="container">
        <div class="row">
            <h3 class="center-align">Publique sua vaga no contrate um aluno</h3>
            <div class="col s12 m12">
                <form action="">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <label for="titulo">Nome da vaga</label>
                            <input type="text" name="titulo" id="titulo" class="flow-text" style="font-size:22px" ng-model="titulo">
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="cargaHoraria">Carga horária semanal</label>
                            <input type="number" class="flow-text" name="cargaHoraria" id="cargaHoraria" max="50" min="24" maxlength="2" style="font-size:22px" ng-model="cargaHoraria">
                        </div>
                    </div>
                    <div class="row">
                       
                        
                        <div class="input-field col s12 m6">
                           <div class="chips chips-placeholder"></div>
                           
                       </div>
                        <div class="input-field col s12 m6">
                            <label for="salario">Salário</label>
                            <input type="number" name="salario" id="salario" min="400" ng-model="salario">
                        </div>
                    </div>
                    <div class="row">
                       <div class="input-field col s12 m6">
                            <label for="requisitos">Requisitos</label>
                            <textarea name="requisitos" id="requisitos" cols="30" rows="10" class="materialize-textarea" ng-model="requisitos"></textarea>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" class="materialize-textarea" ng-model="descricao"></textarea>
                        </div>
                        
                    </div>
                    <div class="row">
                        <a href="" class="btn blue" ng-click="adicionarVaga()">Adicionar vaga</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="col s12 m6"  ng-repeat="x in vaga">
                    <div class="card  hoverable">
                        <div class="card-content">
                          <span class="card-title">{{x.titulo}}</span>
                          <p>Carga horária: {{x.carga}}</p>
                          <p>Salario: {{x.Salario}}</p>
                          <p class="truncate">beneficos: {{x.beneficio}}</p>
                          <p class="truncate">Descrição: {{x.descricao}}</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                          <a href="#">This is a link</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>