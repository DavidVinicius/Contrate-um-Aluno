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
    <div class="container" ng-controller='Variaveis'>
        <h1 class="flow-text center-align">Currículo</h1>
        <form action="../../Controller/Cadastro/CadastroAluno.php">
            <div class="row">
                <div class="input-field col s12 m6">
                 <label for="nome">Nome Completo</label>
                 <input placeholder="Digite seu nome" id="nome" type="text" class="" onchange='loadFile(event)' value='{{nome}}' ngIf="nome != '' ? alert('teste') ">
                  
                </div>
                <div class="col s12 m6 push-m1 ">
                   <div class="file-field input-field col s12 push-s3 m3">
                       <div class="btn blue" style='margin-bottom:10px'>
                           <span> Foto perfil</span>
                           <input type="file" name="foto" id='foto' accept='image/*' onchange='loadFile(event)'>
                        </div>
                   </div><br>
                   <div class="file-path-wrapper col s4 push-s3 m6 push-m1 center" id='fotoPerfil'>
                       <img src="images/Padrao/PerfilPadrao.png" alt="Imagem Perfil" class='circle responsive-img' id='preview' >
                   </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                   <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value='{{email}}' ng-disabled="email != ''">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6">
                    <label for="data">Data de Nascimento </label>
                    <input type="date" name="" id="data" class="validate datepicker">
                </div>
                <div class="input-field col s12 m6">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" id="rg" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class='validate'>
                </div>
                <div class="input-field col s12 m6">
                    <select>
                      <option value="" disabled selected></option>
                      <option value="1">Carro</option>
                      <option value="2">Moto</option>
                      <option value="3">Elefante</option>
                    </select>
                    <label>Escolha sua Nacionalidade</label>
                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                   <label for="endereco">Endereço:</label>
                    <input type="text" name="" id="endereco">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">                   
                   <label for="objetivo">Objetvio</label>
                    <input type="text" name="" id="objetivo">
                </div>
                <div class="input-field col s12 m6">
                   
                    <div class="chips chips-placeholder" ></div>
                </div>
            </div>
            <div class="row">
                <label for="">Aqui ficará a formação</label>
                <a href="" class="btn blue">Adicionar Formação</a>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <label for="textarea1">Experiência</label>
                </div>
            </div>
            
        </form>
    </div>
    
    <a href="" id="teste" class="btn blue">teste</a>
    <script>
        var loadFile = function(event){
            var foto = document.getElementById('preview');
            foto.src = URL.createObjectURL(event.target.files[0]);
        }
        app.controller('Variaveis',['$scope',function($scope){
            $scope.nome = "<?=  $email;?>" || " teste";
            $scope.email = "<?=  $email;?>" || " teste";
        }])
        
        $('#teste').click(function(){
            var teste = $('.chips-placeholder').material_chip('data');
        });
    </script>
    
</body>
</html>