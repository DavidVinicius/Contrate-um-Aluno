<?php
  date_default_timezone_set('America/Sao_Paulo');
  $dataAtual = date("Y-m-d");
  $horaAtual = date("H:i:s");

  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelEmpresa.class.php";
  require_once "../Model/ModelCandidatouse.class.php";
  require_once "../Model/ModelNotificacoesCandidatouse.class.php";

  $idAluno           = isset($_POST['idAluno'])?$_POST['idAluno']:null;
  $idCandidatouse    = isset($_POST['idCandidatouse'])?$_POST['idCandidatouse']:null;
  $codUsuarioEmpresa = isset($_POST['codUsuarioEmpresa'])?$_POST['codUsuarioEmpresa']:null;
  $motivo            = isset($_POST['motivo'])?$_POST['motivo']:null;
  $mensagem          = isset($_POST['mensagem'])?$_POST['mensagem']:null;

  $Aluno             = new ModelAluno();
  $Empresa           = new ModelEmpresa();
  $Candidato         = new Candidatouse();
  $NotCandidatouse   = new ModelNotificacoesCandidatouse();

  $ResultEmpresa     = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $codUsuarioEmpresa"));
  $ResultAluno       = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));

  $nomeEmpresa       = $ResultEmpresa -> nome;
  $codUsuarioAluno   = $ResultAluno -> codUsuario;

  //Fazer update do campo ativo da tabela candidatouse para ''
  if ($Candidato -> UpdateCandidatouse("ativo",'',"where idCandidatouse = $idCandidatouse") ) {
    echo "\n Fez o update a candidatura na tabela candidatou-se \n";
        $data = array(
          "titulo"           => $motivo,
          "de"               => $nomeEmpresa,
          "data"             => $dataAtual,
          "hora"             => $horaAtual,
          "mensagem"         => $mensagem,
          "codCandidatouse"  => $idCandidatouse,
          "codUsuario"       => $codUsuarioAluno
        );
        //Criar notificaçao na tabela notificacoescandidatouse para o aluno;
        if ($NotCandidatouse -> CreateNotificacoesCandidatouse($data)){
              echo "\nCriou a notificação\n";
        }else{
              echo "\n Erro ao criar a notificação \n";
        }
  }else{
    echo "\n erro ao tentar fazer o update na tabela candidatou-se";
  }

 ?>
