<?php
  date_default_timezone_set('America/Sao_Paulo');
  $dataAtual = date("Y-m-d");
  $horaAtual = date("H:i:s");

  require_once "../Model/ModelEmpresa.class.php";
  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelEntrevistas.class.php";
  require_once "../Model/ModelMensagens.class.php";


  $idEntrevista = isset($_POST['idEntrevista'])?$_POST['idEntrevista']:null;
  $idEmpresa    = isset($_POST['idEmpresa'])?$_POST['idEmpresa']:null;
  $idAluno      = isset($_POST['idAluno'])?$_POST['idAluno']:null;

  $Aluno               = new ModelAluno();
  $Empresa             = new ModelEmpresa();
  $Notificacao         = new Mensagens();
  $Entrevista          = new ModelEntrevistas();

  $ResultAluno         = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));
  $ResultEmpresa       = mysqli_fetch_object($Empresa -> ReadEmpresa("where idEmpresa = $idEmpresa"));
  $ResultEntrevista    = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista = $idEntrevista"));

  $nomeAluno           = $ResultAluno      -> nome;
  $codUsuarioEmpresa    = $ResultEmpresa    -> codUsuario;
  $dataEntrevista      = date('d/m/Y', strtotime($ResultEntrevista -> data));
  $horaEntrevista      = $ResultEntrevista -> hora;


  $assunto             = "Entrevista confirmada";
  $mensagem            = "O aluno $nomeAluno, confirmou a entrevista marcada para o dia $dataEntrevista as $horaEntrevista";


  if ($Entrevista -> UpdateEntrevista('ativo','',"where idEntrevista = $idEntrevista ") && $Entrevista -> UpdateEntrevista('status','Entrevista confirmada',"where idEntrevista = $idEntrevista ")) {
        echo "Fez o update na entrevista";
        $data = array(
          "titulo"        => $assunto,
          'de'            => $nomeAluno,
          "data"          => $dataAtual,
          'hora'          => $horaAtual,
          "mensagem"      => $mensagem,
          "codUsuario"    => $codUsuarioEmpresa,
          "codEntrevista" => $idEntrevista

        );

        if ($Notificacao -> CreateMensagens($data)) {
              echo "\n criou a notificação";

        }else{
          echo "\n Erro ao criar a notificação";

        }
  }
  else{
    echo "Erro ao tentar fazer o update na tabela Entrevista";
  }
 ?>
