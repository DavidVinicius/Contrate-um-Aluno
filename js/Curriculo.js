
var app = angular.module('curriculo',[]);

app.controller('Curriculo',['$scope',function($scope){
    $scope.names = [
    {name:'Jani',country:'Norway'},
    {name:'Carl',country:'Sweden'},
  ];
    $scope.formacao = [];
    $scope.data = "aa";
    $scope.anoFormacao = "";
        $scope.curso = "teste";
        $scope.escola = "";
    $scope.adicionarFormacao = function(){
        var a = $scope.anoFormacao;
        $scope.formacao.push({ano:$scope.anoFormacao,curso:$scope.curso,instituicao:$scope.escola});
        $scope.ano = "";
        $scope.curso = "";
        $scope.escola = "";
        alert($scope.ano);
    }
       
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
    $('select').material_select();
        
        
}])