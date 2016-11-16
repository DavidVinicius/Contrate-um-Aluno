<?php
  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelCandidatouse.class.php";


  $idUsuario = isset($_POST['idUsuario'])?$_POST['idUsuario']:null;
  $idVaga    = isset($_POST['idVaga'])?$_POST['idVaga']:null;
  

  $Aluno     = new ModelAluno();
  $Candidato = new Candidatouse();


  $ResultAluno = mysqli_fetch_object($Aluno -> ReadAluno("where codUsuario = $idUsuario"));
  $idAluno     = $ResultAluno -> idAluno;

  $nome        = $ResultAluno -> nome;
  $foto        = $ResultAluno -> foto;

  $data        = array(
                    "nome"            => $nome,
                    "foto"            => $foto,
                    "ativo"           => 'S',
                    "codAluno"        => $idAluno,
                    "codVaga"         => $idVaga,
                    "codUsuarioAluno" => $idUsuario
                );

  if ($Candidato -> CreateCandidatouse($data)) {
          echo "criou a candidatura";

  }
  else{
    echo "erro ao criar candidatura";
  }

 ?>
