<?php
    include_once("../../Model/DataBase.class.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");
    include_once("../CreateVarSessions.class.php");

    $VerificaSeEstaLogado = new VerificaSeEstaLogado();
    $VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $nomeOriginal   = $_FILES['grade']['name']; #Nome do arquivo original
    $tipo           = $_FILES['grade']['type']; #O tipo do arquivo
    $tamanho        = $_FILES['grade']['size']; #Tamanho em bytes
    $nomeTemporario = $_FILES['grade']['tmp_name']; #O nome temporário com o qual o arquivo
                                                    # enviado foi armazenado no servidor.
    $codErro        = $_FILES['grade']['error']; #O código de erro associado ao upload do arquivo

    #move_uploaded_file(nomeTemporario, diretório+nomeImagem.extensao)
    $diretorio = "../../Images/ImagensUser/";
    $localFull = $diretorio.$nomeOriginal;
    move_uploaded_file($nomeTemporario, $localFull); #Move o arquivo temporário para pasta
                                                     ##permanente

    $dados = array(
        "nome" => ( isset($_POST["nomeCurso"]) ) ? $_POST["nomeCurso"] : $msg,
        "escola" => ( isset($_POST["escola"]) ) ? $_POST["escola"] : $msg,
        "gradeCurricular" => $localFull,
        "periodo" => ( isset($_POST["periodo"]) ) ? $_POST["periodo"] : $msg
    );

    $resultado = InsertQuery("curso", $dados);
    if($resultado){
        echo "<script>
                    window.location.href = '../../OnePage.html';
                    alert('".$Sucess."');
                </script>";
    }
    else{
        echo "<script>
                    window.location.href = '../../OnePage.html';
                    alert('".$Failed."');
                </script>";
    }
/*echo "<br>";
    print_r($tipo);
    echo "<br>";
    print_r($tamanho); echo " bytes";
echo "<br>";
    print_r($nomeOriginal);
echo "<br>";
    print_r($nomeTemporario);*/
?>