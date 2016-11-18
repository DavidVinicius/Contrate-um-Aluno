<?php
require_once "../Model/ModelEmpresa.class.php";
require_once "../Model/ModelMensagens.class.php";
require_once "../Model/ModelEntrevistas.class.php";


  date_default_timezone_set('America/Sao_Paulo');
  $dataAtual          = date("Y-m-d");
  $horaAtual          = date("H:i:s");

  $idEmpresa          = isset($_POST['idEmpresa'])?$_POST['idEmpresa']:null;
  $idEntrevista       = isset($_POST['idEntrevista'])?$_POST['idEntrevista']:null;
  $codUsuarioAluno    = isset($_POST['codUsuarioAluno'])?$_POST['codUsuarioAluno']:null;


  $Empresa            = new ModelEmpresa();
  $ResultEmpresa      = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
  $nomeEmpresa        = $ResultEmpresa -> nome;
  $Entrevista         = new ModelEntrevistas();
  $Notificacao        = new Mensagens();

  $motivo   =  "Entrevista Realizada";
  $mensagem =  "A entrevista já foi realizada, obrigado por utilizar o Contrate um Aluno";


  // $ResultEntrevista   = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista =  $idEntrevista"));
  // echo $idEntrevista."retorno";
  if ($Entrevista -> UpdateEntrevista("ativo",'',"where idEntrevista = $idEntrevista") && $Entrevista ->                 UpdateEntrevista("status",'A entrevista já foi realizada',"where idEntrevista = $idEntrevista")) {
      echo "deu certo cachorreira";
      $data = array(
        "titulo"         => $motivo,
        "de"             => $nomeEmpresa,
        "data"           => $dataAtual,
        "hora"           => $horaAtual,
        "mensagem"       => $mensagem,
        "codUsuario"     => $codUsuarioAluno,
        "codEntrevista"  => $idEntrevista
      );
      if ($Notificacao -> CreateMensagens($data)) {
            echo "deu certo cachorreira 2";

      }
  }

 ?>
