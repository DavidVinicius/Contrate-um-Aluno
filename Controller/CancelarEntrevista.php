<?php
require_once "../Model/ModelAluno.class.php";
require_once "../Model/ModelMensagens.class.php";
require_once "../Model/ModelEntrevistas.class.php";

  date_default_timezone_set('America/Sao_Paulo');
  $dataAtual          = date("Y-m-d");
  $horaAtual          = date("H:i:s");

  $idAluno            = isset($_POST['idAluno'])?$_POST['idAluno']:null;
  $idEntrevista       = isset($_POST['idEntrevista'])?$_POST['idEntrevista']:null;
  $codUsuarioEmpresa  = isset($_POST['codUsuarioEmpresa'])?$_POST['codUsuarioEmpresa']:null;

  $Aluno              = new ModelAluno();
  $Entrevista         = new ModelEntrevistas();
  $Notificacao        = new Mensagens();

  $ResultAluno        = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));
  $ResultEntrevista   = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista $idEntrevista"));

  $nomeAluno          = $ResultAluno      -> nome;
  $nomeVaga           = $ResultEntrevista -> vaga;
  $mensagem           = "O Aluno $nomeAluno recusou a entrevista para a vaga de $nomeVaga";

  if ($Entrevista -> DeleteEntrevista("where idEntrevista = $idEntrevista")) {
       $dados = array(
         "titulo"        => "Entrevista recusada",
         "de"            => $nomeAluno,
         "data"          => $dataAtual,
         "hora"          => $horaAtual,
         "mensagem"      => $mensagem,
         "codUsuario"    => $codUsuarioEmpresa,
         "codEntrevista" => $idEntrevista
       );
       if ($Notificacao -> CreateMensagem($dados)) {
         # code...
         echo "deu certo cachorreira";
       }

  }
?>
