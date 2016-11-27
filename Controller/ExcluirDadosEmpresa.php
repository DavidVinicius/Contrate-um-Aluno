<?php
  session_start();
  if(isset($_POST['existeEmpresa'])){
    $tabela     = isset($_POST['tabela'])?$_POST['tabela']:null;
    $idUsuario  = $_SESSION['id'];


    if($tabela == "telefones")
      {
        include_once "../Model/ModelTelefones.class.php";
        $Telefone       = new Telefones();
        $idTelefone     = isset($_POST['idTelefone'])?$_POST['idTelefone']:null;
        if ($Telefone->DeleteTelefones("where idTelefone = $idTelefone")) {
              echo "deu certo";
        }
      }

      if ($tabela == "valores") {
         include_once "../Model/ModelValores.class.php";
         $Valor         = new Valores();
         $idValor       = isset($_POST['idValor'])?$_POST['idValor']:null;
         if ($Valor->DeleteValores("where idValores = $idValor")) {
             echo "deu certo";
         }
      }
  }

  if (isset($_POST['tabela']) && $_POST['tabela'] == 'vaga') {
    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date("Y-m-d");
    $horaAtual = date("H:i:s");

    $tabela             = isset($_POST['tabela'])?$_POST['tabela']:null;
    $idVaga             = isset($_POST['idVaga'])?$_POST['idVaga']:null;
    $codUsuarioEmpresa  = $_SESSION['id'];

    include_once "../Model/ModelVaga.class.php";
    require_once "../Model/ModelCandidatouse.class.php";
    require_once "../Model/ModelNotificacoesCandidatouse.class.php";
    require_once "../Model/ModelAluno.class.php";
    require_once "../Model/ModelEmpresa.class.php";
    require_once "../Model/ModelBeneficiosVaga.class.php";

    $Candidato      = new Candidatouse();
    $Vaga           = new ModelVaga();
    $NotCandidato   = new ModelNotificacoesCandidatouse();
    $Aluno          = new ModelAluno();
    $Empresa        = new ModelEmpresa();
    $BeneficiosVaga = new ModelBeneficiosVaga();

    $ConsultaCandidatouse = $Candidato -> ReadCandidatouse("where codVaga = $idVaga and ativo = 'S' ");

    $ResultVaga    = mysqli_fetch_object($Vaga -> ReadVaga("where idVaga = $idVaga"));
    $ResultEmpresa = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $codUsuarioEmpresa"));

    $nomeVaga      = $ResultVaga -> titulo;
    $nomeEmpresa   = $ResultEmpresa -> nome;
    echo "entrou aqui";
    while ($ResultCandidatouse = mysqli_fetch_object($ConsultaCandidatouse)) {
          $codAluno       = $ResultCandidatouse -> codAluno;
          $idCandidatouse = $ResultCandidatouse -> idCandidatouse;

          $ResultAluno = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $codAluno"));
          $codUsuarioAluno = $ResultAluno -> codUsuario;

          $data = array(
            "titulo"           => "Encerramento do processo de seleção"  ,
            "de"               => $nomeEmpresa,
            "data"             => $dataAtual,
            "hora"             => $horaAtual,
            "mensagem"         => "Foi encerrado o processo seletivo iniciado pela empresa $nomeEmpresa referente a vaga $nomeVaga ",
            "codCandidatouse"  => $idCandidatouse,
            "codUsuario"       => $codUsuarioAluno

          );
          if ($NotCandidato -> CreateNotificacoesCandidatouse($data)) {
            echo "criou notificação";
          }else{
            echo "Não criou notificação";
          }

    }
    if($BeneficiosVaga -> DeleteBeneficiosVaga("where codVaga = $idVaga")){
      echo "\n deletou todos os beneficios da vaga";

      if ($Vaga -> UpdateVaga("ativo",'',"where idVaga = $idVaga")) {
        echo "\n deletou vaga";
      }else{
        echo "\n erro a deletar vaga";
      }
    }else{
      echo "erro ao deletar todos os benefícios";
    }
  }


 ?>
