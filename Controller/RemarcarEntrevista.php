<?php
    // aqui faz a condicional indicando que vai remarcar a entrevista
    if(isset($_POST['empresa']) && $_POST['empresa'] == "empresa")
    {
      require_once "../Model/ModelMensagens.class.php";
      require_once "../Model/ModelEntrevistas.class.php";
      require_once "../Model/ModelEmpresa.class.php";
      $Notificacao = new Mensagens();
      $Entrevista  = new ModelEntrevistas();
          $idAluno = isset($_POST['idAluno'])?$_POST['idAluno']:null;
          $idEntrevista = isset($_POST['idEntrevista'])?$_POST['idEntrevista']:null;
          $codUsuarioAluno = isset($_POST['codUsuarioAluno'])? $_POST['codUsuarioAluno']:null;
          $nomeEmpresa = isset($_POST['nomeEmpresa'])?$_POST['nomeEmpresa']:null;

          $data   = isset($_POST['data'])?$_POST['data']:null;
          $hora   = $_POST['hora'];
          $motivo = $_POST['motivo'] ;
          $mensagem = isset($_POST['mensagem'])?$_POST['mensagem']:"a empresa alterou a entrevista";
          if ($Entrevista->UpdateEntrevista('data',$data, "where idEntrevista = $idEntrevista") &&
              $Entrevista->UpdateEntrevista('hora',$hora, "where idEntrevista = $idEntrevista"))
               {

            $data = array(
              'titulo' => $motivo,
              'de'     => $nomeEmpresa,
              'data'   => $data,
              'hora'   => $hora,
              'mensagem' => "A empresa alterou a data da entrevista\n".$mensagem,
              'codUsuario' => $codUsuarioAluno,
              'codEntrevista' => $idEntrevista
            );
              if($Notificacao -> CreateMensagens($data))
              {
                  echo "deu certo cachorreira";
              }
            }


    }

 ?>
