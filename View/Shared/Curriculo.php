<!DOCTYPE html>
<html lang="pt-br" ng-app='curriculo'>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src='js/jquery-3.1.0.min.js'></script>
    <script src='js/angular.min.js'></script>
    <script src="js/materialize.js"></script>
    
   
</head>
<body ng-controller='Curriculo'>
    <div class="container">
        <h1 class="flow-text">aqui ficará o currículo</h1>
        <form action="../../Controller/Cadastro/CadastroAluno.php">
            <div class="row">
                <div class="input-field col s12 m6">
                 <label for="nome">Nome Completo</label>
                 <input placeholder="Digite seu nome" id="nome" type="text" class="">
                  
                </div>
                <div class="col s12 m4 push-m1 ">
                   <div class="file-field input-field col s12 push-s3 m8">
                       <div class="btn blue" style='margin-bottom:10px'>
                           <span>Subir foto perfil</span>
                           <input type="file" name="foto">
                        </div>
                   </div><br>
                   <div class="file-path-wrapper col s4 push-s3 m4 push-m1 center">
                       <img src="images/Padrao/PerfilPadrao.png" alt="Imagem Perfil" class='responsive-img circle' style=''>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                   <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
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
                      <option value="" disabled selected>Choose your option</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Materialize Multiple Select</label>
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
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Experiência</label>
                </div>
            </div>
            
        </form>
    </div>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 100,
            showDaysShort:true,
            format: 'dd/mm/yyyy',
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
            weekdaysFull:['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            weekdaysShort:['Dom','Seg','Ter','Qua','Qui','S','Sáb'],
            
            monthsFull:['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthsShort:['Jan','Fev','Mar','Abril','Maio','Jun','Jul','Ago','Set','Out','Nov','Dez'],         
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione o Mês',
            min: new Date(1950,1,1),
            max: [2020,12,12]
            
        });
        
        $('.chips-placeholder').material_chip({
            placeholder: "word, excel ..",
            secondaryPlaceholder: "Suas qualificações",
            
        });
        $("#teste").click(function(e){
            e.eventDefault();
            var teste = $('.chips-placeholder').material_chips('data');
            alert(teste);
            alert(teste);
        });
        
        var app = angular.module("curriculo",[]);
        app.controller("Curriculo",['$scope', function($scope){
            $scope.colocaFormacao = function(e){
                
                
               
            }
        }])
    </script>
</body>
</html>