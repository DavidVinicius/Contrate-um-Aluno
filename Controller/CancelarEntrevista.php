<?php
require_once "../Model/ModelAluno.class.php";
require_once "../Model/ModelMensagens.class.php";
require_once "../Model/ModelEntrevistas.class.php";
require_once "../Model/ModelRespostas.class.php";

  date_default_timezone_set('America/Sao_Paulo');
  $dataAtual          = date("Y-m-d");
  $horaAtual          = date("H:i:s");

  $idAluno            = isset($_POST['idAluno'])?$_POST['idAluno']:null;
  $idEntrevista       = isset($_POST['idEntrevista'])?$_POST['idEntrevista']:null;
  $codUsuarioEmpresa  = isset($_POST['codUsuarioEmpresa'])?$_POST['codUsuarioEmpresa']:null;

  $Aluno              = new ModelAluno();
  $Entrevista         = new ModelEntrevistas();
  $Notificacao        = new Mensagens();
  $Resposta           = new Respostas();

  $ResultAluno        = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));
  $ResultEntrevista   = mysqli_fetch_object($Entrevista -> ReadEntrevista("where idEntrevista =  $idEntrevista"));

  $nomeAluno          = $ResultAluno      -> nome;
  $nomeVaga           = $ResultEntrevista -> vaga;
  $mensagem           = "O Aluno $nomeAluno recusou a entrevista para a vaga de $nomeVaga";

  if ($Entrevista -> UpdateEntrevista("ativo","","where idEntrevista = $idEntrevista") && $Entrevista -> UpdateEntrevista("status","recusado pelo aluno","where idEntrevista = $idEntrevista")) {
       $dados = array(
         "titulo"        => "Entrevista recusada",
         "de"            => $nomeAluno,
         "data"          => $dataAtual,
         "hora"          => $horaAtual,
         "mensagem"      => $mensagem,
         "codUsuario"    => $codUsuarioEmpresa,
         "codEntrevista" => $idEntrevista
       );
       if ($Notificacao -> CreateMensagens($dados)) {
         # code...
          echo "deu certo cachorreira 1";
          $dados2 = array(
            "resposta" => 0,
            "codEntrevista" => $idEntrevista
          );
          if ($Resposta -> CreateRespostas($dados2)) {
            echo "deu certo cachorreira 2";
            # code...
          }
       }

  }
  else {
    echo "Deu erro ao update na entrevista";
  }
?>
