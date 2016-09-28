<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src='js/jquery-3.1.0.min.js'></script>
    <script src="js/materialize.js"></script>
</head>
<body>
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
                <div class="input-field col s6">
                    <label for="data">Data de Nascimento </label>
                    <input type="date" name="" id="data" class="validate datepicker">
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
    </script>
</body>
</html>