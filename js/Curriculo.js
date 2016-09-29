
var app = angular.module('curriculo',[]);

app.controller('Curriculo',['$scope',function($scope){
    $scope.names = [
    {name:'Jani',country:'Norway'},
    {name:'Carl',country:'Sweden'},
  ];
       
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
    $('select').material_select();
        
        
}])