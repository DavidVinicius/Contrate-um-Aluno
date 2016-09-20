<?php
    session_start();
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");
    include_once("../CreateVarSessions.class.php");
    $DB = new DataBase();

    //$VerificaSeEstaLogado = new VerificaSeEstaLogado();
    //$VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $nomeOriginal   = $_FILES['foto']['name']; #Nome do arquivo original
    $tipo           = $_FILES['foto']['type']; #O tipo do arquivo
    $tamanho        = $_FILES['foto']['size']; #Tamanho em bytes
    $nomeTemporario = $_FILES['foto']['tmp_name']; #O nome temporário com o qual o arquivo
    # enviado foi armazenado no servidor.
    $codErro        = $_FILES['foto']['error']; #O código de erro associado ao upload do arquivo

    $diretorio = "../../Images/ImagensUser/";
    $localFull = $diretorio.$nomeOriginal;
    move_uploaded_file($nomeTemporario, $localFull); #Move o arquivo temporário para pasta

    $tabela = "aluno";
    $dados  = array(
        "dataNascimento"            => (isset($_POST["nascimento"])) ? $_POST["nascimento"] : $msg,
        "formacao"                  => (isset($_POST["formacao"])) ? $_POST["formacao"] : $msg,
        "experiencias"              => (isset($_POST["experiencias"])) ? $_POST["experiencias"] : $msg,
        "informacoesAdicionais"     => (isset($_POST["info"])) ? $_POST["info"] : $msg,
        "foto"                      => $localFull,
        "nome"                      => (isset($_POST["nome"])) ? $_POST["nome"] : $msg,
        "cpf"                       => (isset($_POST["cpf"])) ? $_POST["cpf"] : $msg,
        "objetivo"                  => (isset($_POST["objetivo"])) ? $_POST["objetivo"] : $msg,
        "qualificacoes"             => (isset($_POST["qualificacoes"])) ? $_POST["qualificacoes"] : $msg,
        "telefone"                  => (isset($_POST["telefone"])) ? $_POST["telefone"] : $msg,
        "endereco"                  => (isset($_POST["endereco"])) ? $_POST["endereco"] : $msg,
        "rg"                        => (isset($_POST["rg"])) ? $_POST["rg"] : $msg,
        "codCurso"                  => (isset($_POST["curso"])) ? $_POST["curso"] : 0,
        "codUsuario"                => $VarSessions->getSessionID()
    );

    $resultado = $DB->InsertQuery($tabela, $dados);  #retorna 1 se cadastrou
                                                #0 se não cadastrou
    if($resultado){
        echo "<script>
                window.location.href = '../../OnePage.html';
                alert('".$Sucess."');
              </script>";
    } else {
        echo "<script>
                window.location.href = '../../OnePage.html';
                alert('".$Failed."');
              </script>";
    }
?>