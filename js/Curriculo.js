 
var app = angular.module('curriculo',[]);

app.controller('Curriculo',['$scope',function($scope){
    
    $scope.formacao = [];
    
        $scope.ano = "";
        $scope.curso = "";
        $scope.escola = "";
        $scope.Experiencia = [];
        $scope.anoExperiencia = "";
        $scope.nomeExperiencia = "";
        $scope.textoExperiencia = "";
    
    $scope.Telefones =[];
    
            
            
            $scope.adicionarFormacao = function(){
                var anoFormacao = $("#data").val();
               if($scope.anoC == ""){
                   Materialize.toast("O campo Ano de conclusão está vazio", 4000);
               }
                else if($scope.curso == ""){
                   Materialize.toast("O campo curso está vazio", 4000); 
                }
                else if($scope.escola == ""){
                  Materialize.toast("O campo Instituição está vazio", 4000);  
                }
                else if($scope.anoC.length > 4 || $scope.anoC.length < 4){
                    Materialize.toast("O ano deve ter 4 dígitos",4000);
                }
                else{
                    
                    
                     $scope.formacao.push({ano:$scope.anoC,curso:$scope.curso,instituicao:$scope.escola});
                    $scope.anoC = "";
                    $scope.curso = "";
                    $scope.escola = "";
                    Materialize.toast('Adicionado com Sucesso', 4000);    
                }
            }
            $scope.remove = function(x){
                
                if($scope.formacao.splice(x,1)){
                    Materialize.toast("Excluido com sucesso",4000);
                }
                else{
                    Materialize.toast("Erro ao excluir",4000);
                }
            }
            
            $scope.adicionarExperiencia = function(){
                 var tempo = "";
                
                 if( $scope.atualExp == true){
                     var tempo = "Emprego atual";                   
                    
                }
                else{
                    var tempo = $scope.ateExp;
                }
                
                
                if($scope.deExp == null){
                    Materialize.toast("Indique o inicio da sua experiência",4000);
                }
                if($scope.ateExp == null && $scope.atualExp != true){
                    Materialize.toast("Indique a data de saída");
                }
                 else if($scope.nomeExperiencia == null){
                    Materialize.toast("Campo cargo está vazio",4000);
                }
                else if($scope.textoExperiencia == null ){
                    Materialize.toast("Campo experiência está vazio",4000);
                }
                else if($scope.textoExperiencia.length > 254){
                    Materialize.toast("No máximo são 255 caracteres na descrição da experiência",4000);
                }
                else{
                    
                    $scope.Experiencia.push({de:$scope.deExp, ate: tempo, cargo: $scope.nomeExperiencia, texto: $scope.textoExperiencia});
                    $scope.deExp = "";
                    $scope.ateExp = "";
                    $scope.atualExp = false;
                    $scope.nomeExperiencia = "";
                    $scope.textoExperiencia = "";
                }
            }
            
            $scope.adicionarTelefone = function(){
                
                if($scope.telefone == ""){
                    Materialize.toast("Campo telefone vazio",4000);
                }
                else if($scope.tipo == null)
                {
                    Materialize.toast("Campo tipo está vazio");
                }
                else{
                    $scope.Telefones.push({telefone: $scope.telefone,tipo: $scope.tipo});
                    $scope.telefone = "";
                    $scope.tipo     = "";
                    Materialize.toast("Telefone adicionado com sucesso",4000);
                }
            }
            $scope.removeTelefone = function(x){
                if($scope.Telefones.splice(x,1)){
                    Materialize.toast("Telefone removido com sucesso",4000);
                }
                else{
                    Materialize.toast("Erro ao apagar telefone",4000);
                }
            }
            
            $scope.removeExp = function(x){
                if($scope.Experiencia.splice(x,1)){
                    Materialize.toast("Removido com sucesso",4000);
                }
                else{
                    Materialize.toast("Erro ao remover",4000);
                }
            }
            $scope.verExp = function(x){
                
            }
            $scope.Qualificacoes = [];
              $('.chips').on('chip.add', function(e, chip){
                    // you have the added chip here
                 
                  var a = $(".chips").material_chip('data');
                  console.log(a);
                  $scope.Qualificacoes.push(chip);
                 
            });
            $('.chips').on('chip.delete', function(e, chip){
                    
                  var a = [];
                  var a = $(".chips").material_chip('data');
                  console.log(a);
                    console.log(chip);
                  $scope.qualificacoes.splice(chip);
                  console.log($scope.qualificacoes);
//                  alert(a);
            });
            
            $('.chips').focusin(function(){
                Materialize.toast("Digite suas qualificações e aperte enter para adicionar",4000);
            });
            
       
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
        $(".anoFormacao").pickadate({
            selectYears: 100,
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
            format: 'yyyy',
            weekdaysFull:['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            weekdaysShort:['Dom','Seg','Ter','Qua','Qui','S','Sáb'],
            
            monthsFull:['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthsShort:['Jan','Fev','Mar','Abril','Maio','Jun','Jul','Ago','Set','Out','Nov','Dez'],  
        });
        
        $('.chips-placeholder').material_chip({
            placeholder: "word, excel ..",
            secondaryPlaceholder: "Suas qualificações",
            
        });
    $('#experiencia').characterCounter();
    $('.length').characterCounter();
    $('select').material_select();
//    $('.autocomplete').autocomplete({
//    data: {
//      "Apple": null,
//      "Microsoft": null,
//      "Google": 'http://placehold.it/250x250'
//    }
//  });
        
        
}])