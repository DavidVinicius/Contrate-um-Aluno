var app = angular.module("myapp",[]);

app.controller("CriarVaga",["$scope",function($scope){
    $scope.vaga = [];
    $scope.beneficios = [];
    var barra   = " <div class='progress '><div class='indeterminate'></div></div>";
    $scope.adicionarVaga = function(){


        if($scope.titulo == "")
        {
            Materialize.toast('Campo título está vazio',4000);

        }
        if($scope.cargaHoraria == "")
        {
            Materialize.toast('Campo carga horária está vazio',4000);
        }
        if($scope.salario == "")
        {
            Materialize.toast('Campo salário está vazio',4000);
        }
        if($scope.requisitos == "")
        {
            Materialize.toast('Campo requisitos está vazio',4000);
        }
        if($scope.descricao == "")
        {
            Materialize.toast('Campo descrição está vazio', 4000);
        }

        if($scope.titulo != null && $scope.cargaHoraria != "" && $scope.salario != "" && $scope.requisitos != "" && $scope.descricao != "")
        {
            $scope.vaga.push({titulo:$scope.titulo, carga: $scope.cargaHoraria, Salario: $scope.salario, requisitos:$scope.requisitos, descricao:$scope.descricao, beneficios:$('[name=beneficios]').val()});


                    var titulo       = $scope.titulo;
                    var cargaHoraria = $scope.cargaHoraria;
                    var salario      = $scope.salario;
                    var beneficios   = $('[name=beneficios]').val();
                    var requisitos   = $scope.requisitos;
                    var descricao    = $scope.descricao;
//                    e.preventDefault();
                     $.ajax({
//                         cache: false,
//                         processData:false,
//                        contentType: false,
//                        mimeType:"multipart/form-data",
                        data: {titulo:$scope.titulo, cargaHoraria: $scope.cargaHoraria, requisitos: $scope.requisitos, descricao: $scope.descricao,salario:$scope.salario, beneficios:beneficios},
                        type: 'POST',
                        url: 'Controller/Cadastro/CadastroVaga.php',
                        success: function(data)
                        {
                            Materialize.toast('Vaga cadastrada com sucesso',4000);
                            //alert(data);
                        },
                        error: function(){
                            Materialize.toast('Erro ao cadastrar vaga, tente novamente',4000);
                        }
                    });

            $scope.titulo       = "";
            $scope.cargaHoraria = "";
            $scope.salario      = "";
            $scope.requisitos   = "";
            $scope.descricao    = "";
        }

    }


   $scope.teste = "teste";
    $('.contentEditable').click(function(){
        Materialize.toast('Para Salvar basta apenas clicar fora do campo',4000);
        $('.contentEditable').focusout(function(){
            var dadoAlteracao = $(this).text();
            $.ajax({
                url:"Controller/AlterarDados.php",
                method: "POST",
                data:{alterar:dadoAlteracao},
                success:function(data){
                    //alert(data);
                    Materialize.toast("Alterado com sucesso",4000);

                }
            });
        });

    });

    $('.chips').material_chip();
    $('.chips-placeholder').material_chip({
    placeholder: 'Auxílio Transporte',
    secondaryPlaceholder: 'Beneficios',
  });
  $('.chips').on('chip.add', function(e, chip){
        // you have the added chip here
     //  alert(chip);
     if($scope.beneficios.push(chip))
     {
       console.log(chip);
       Materialize.toast("Adicionado com sucesso",4000);

     }


 });
 $('.chips').on('chip.delete', function(e, chip){


      if($scope.beneficios.splice(chip,1))
      {
        Materialize.toast("Excluido com sucesso",4000);
      }
     //  console.log($scope.qualificacoes);
 //                  alert(a);
 });
  $(".chips").focusin(function(event) {
    Materialize.toast("Digite e aperte enter para adicionar benefícios",4000);
  });

  $(".excluir").submit(function(e){
      var dados     = new FormData(this);
      var apagarDiv = $(this).parent().parent();
      e.preventDefault();
       $.ajax({
           cache: false,
           processData:false,
          contentType: false,
          mimeType:"multipart/form-data",
          data: dados,
          type: 'POST',
          url: 'Controller/ExcluirDadosEmpresa.php',
          beforeSend:function(){
            $("#barra").html(barra);
          },
          success: function(data)
          {
              console.log(data);
              setTimeout(function () {
                $("#barra").html('');
                Materialize.toast("Excluido com sucesso",4000);
                $(apagarDiv).remove();
              }, 1000);

          },
          error:function(err){
            console.log(err);
            Materialize.toast("Erro, Atualize ap");
          }

      });
    });
}]);
