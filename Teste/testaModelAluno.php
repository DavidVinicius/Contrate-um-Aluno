<?php
    include("../Model/ModelAluno.class.php");

    //Se precisar criar um aluno novo, tem que setar um valor inválido
    //Se for necessário alterar, ou ler, necessita o valor do aluno em questão
    $Aluno = new ModelAluno(-2);


    $Array = $Aluno->ReadAluno();
    //Pega o campo 'nome' de todo o conjunto de campos
    //poderia ser 'email'
    echo $Array['nome'];

    //Cria um aluno com as informações que for passadas (construtor deve estar com valor inválido)
    #$Result = $Aluno->CreateAluno('1998-10-08','einfo',null,'nome','cpf','obj','qualificaç~eos','rg',22,2);

    //Altera informações de um campo especifico, params(campo, valorNovo)
    //necessita valor válido passado ao construtor
    #$res = $Aluno->UpdateAluno("objetivo", "Objetivo novo");

    //Deleta o aluno, com o qual id que foi passado na hora
    //da instancia do objeto
    #$res = $Aluno->DeleteAluno();
?>