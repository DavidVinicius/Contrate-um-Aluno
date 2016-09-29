<?php
    session_start();
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../ManipulaVarSession.class.php");

    $VarSessions = new ManipulaVarSession();
 
    $DB = new DataBase();

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
        "dataNascimento"            => (isset($_POST["nascimento"])) ? $_POST["nascimento"] : $MsgString,
        "formacao"                  => (isset($_POST["formacao"])) ? $_POST["formacao"] : $MsgString,
        "experiencias"              => (isset($_POST["experiencias"])) ? $_POST["experiencias"] : $MsgString,
        "informacoesAdicionais"     => (isset($_POST["info"])) ? $_POST["info"] : $MsgString,
        "foto"                      => $localFull,
        "nome"                      => (isset($_POST["nome"])) ? $_POST["nome"] : $MsgString,
        "cpf"                       => (isset($_POST["cpf"])) ? $_POST["cpf"] : $MsgString,
        "objetivo"                  => (isset($_POST["objetivo"])) ? $_POST["objetivo"] : $MsgString,
        "qualificacoes"             => (isset($_POST["qualificacoes"])) ? $_POST["qualificacoes"] : $MsgString,
        "telefone"                  => (isset($_POST["telefone"])) ? $_POST["telefone"] : $MsgString,
        "endereco"                  => (isset($_POST["endereco"])) ? $_POST["endereco"] : $MsgString,
        "rg"                        => (isset($_POST["rg"])) ? $_POST["rg"] : $MsgString,
        "codCurso"                  => (isset($_POST["curso"])) ? $_POST["curso"] : $MsgNumber,
        "codUsuario"                => $VarSessions->getSessionID()
    );

    $resultado = $DB->InsertQuery($tabela, $dados);  #retorna 1 se cadastrou
                                                #0 se não cadastrou
    if($resultado){
        echo "<script>
                window.location.href = '../../OnePage.php';
                alert('".$Sucess."');
              </script>";
    } else {
        echo "<script>
                window.location.href = '../../OnePage.php';
                alert('".$Failed."');
              </script>";
    }
?>