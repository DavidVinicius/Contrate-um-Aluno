<?php
    session_start();
    require_once "../Model/ModelEntrevistas.class.php";
    require_once "../Model/ModelBeneficiosExperiencia.class.php";
    require_once "../Model/ModelEmpresa.class.php";
    require_once "../Model/ModelAluno.class.php";
    require_once "../Model/ModelMensagens.class.php";
    require_once "../Model/ModelVaga.class.php";

    $notificacao            = new Mensagens();
    $vaga                   = new ModelVaga();
    $empresa                = new ModelEmpresa();
    $entrevista             = new ModelEntrevistas();
    $beneficiosExperiencia  = new ModelBeneficiosExperiencia();
    $aluno                  = new ModelAluno();

    $idUsuario    = $_SESSION['id'];
    $beneficios   = json_decode($_POST['beneficios'],true);

    $data         = isset($_POST['data'])       ? $_POST['data']:null;
    $hora         = isset($_POST['hora'])       ? $_POST['hora']:null;
    $local        = isset($_POST['local'])      ? $_POST['local']:null;
    $numero       = isset($_POST['numero'])     ? $_POST['numero']:null;
    $bairro       = isset($_POST['bairro'])     ? $_POST['bairro']:null;
    $complemento  = isset($_POST['complemento'])? $_POST['complemento']:null;
    $cidade       = isset($_POST['cidade'])     ? $_POST['cidade']:null;
    $estado       = isset($_POST['estado'])     ? $_POST['estado']:null;
    $vaga         = isset($_POST['vaga'])       ? $_POST['vaga']:null;
    $salario      = isset($_POST['salario'])    ? $_POST['salario']:null;
    $cargaHoraria = isset($_POST['cargaHoraria'])? $_POST['cargaHoraria']:null;
    $descricao    = isset($_POST['descricao'])  ? $_POST['descricao']:null;
    $idAluno      = $_POST['idAluno'];

    $empresaObject  = mysqli_fetch_object($empresa->ReadEmpresa("where codUsuario = $idUsuario"));
    var_dump($empresaObject);

    $idEmpresa  = $empresaObject->idEmpresa;
    $dados = array(
        "data"          => $data,
        "hora"          => $hora,
        "local"         => $local,
        "numero"        => $numero,
        "bairro"        => $bairro,
        "complemento"   => $complemento,
        "cidade"        => $cidade,
        "estado"        => $estado,
        "vaga"          => $vaga,
        "salario"       => $salario,
        "cargaHoraria"  => $cargaHoraria,
        "descricao"     => $descricao,
        "codAluno"      => $idAluno,
        "codEmpresa"    => $idEmpresa
    );
    $insert                         = $entrevista->CreateEntrevista($dados);
    $selectObjectEntrevistaUltimo   = mysqli_fetch_object($entrevista->ReadEntrevista("order by idEntrevista desc limit 1"));
    $ultimaEntrevista               = $selectObjectEntrevistaUltimo->idEntrevista;

    for($i = 0; $i < count($beneficios); $i++){
        $dados22 = array(
            "beneficio"     => $beneficios[$i]['tag'],
            "codEntrevista" => $ultimaEntrevista
        );
        $insertBeneficiosExperiencia = $beneficiosExperiencia->CreateBeneficiosExperiencia($dados22);
    }

//================================= ############################ ===================================\\
//================================= DADOS PARA A TABELA NOTIFICAÇÕES ===============================\\
    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date("Y-m-d");
    $horaAtual = date("H:i:s");

    $empresaEntrevistaID    = $selectObjectEntrevistaUltimo->codEmpresa;
    $selectObjectEmpresa    = mysqli_fetch_object($empresa->ReadEmpresa("where idEmpresa = $empresaEntrevistaID"));
    $nomeEmpresa            = $selectObjectEmpresa->nome;

    $dataEntrevista         = $selectObjectEntrevistaUltimo->data;
    $horaEntrevista         = $selectObjectEntrevistaUltimo->hora;
    $localEntrevista        = $selectObjectEntrevistaUltimo->local;
    $numeroEntrevista       = $selectObjectEntrevistaUltimo->numero;
    $bairroEntrevista       = $selectObjectEntrevistaUltimo->bairro;
    $complementoEntrevista  = isset($selectObjectEntrevistaUltimo->complemento) ? $selectObjectEntrevistaUltimo->complemento : "Sem complemento";
    $cidadeEntrevista       = $selectObjectEntrevistaUltimo->cidade;
    $estadoEntrevista       = $selectObjectEntrevistaUltimo->estado;


    $codAlunoTabelaEntrevista   = $selectObjectEntrevistaUltimo->codAluno;
    $vagaEntrevista             = $selectObjectEntrevistaUltimo->vaga;
    $selectObjectAluno          = mysqli_fetch_object($aluno->ReadAluno("where idAluno = $codAlunoTabelaEntrevista"));
    $codUsuarioAluno            = $selectObjectAluno->codUsuario;

    // $mensagem = "A empresa $nomeEmpresa deseja marcar uma entrevista com você referente a vaga $vagaEntrevista
    //             na data $dataEntrevista, às $horaEntrevista. \n
    //             Local: $localEntrevista, número: $numeroEntrevista, bairro: $bairroEntrevista $complementoEntrevista. \n
    //             Cidade: $cidadeEntrevista, estado: $estadoEntrevista";
    $mensagem = "A empresa $nomeEmpresa deseja marcar uma entrevista com você referente a vaga $vagaEntrevista";

    $dadosNotificacoes = array(
        'titulo'        => 'Entrevista de emprego',
        'de'            => $nomeEmpresa,
        'data'          => $dataAtual,
        'hora'          => $horaAtual,
        'mensagem'      => $mensagem,
        'codUsuario'    => $codUsuarioAluno,
        'codEntrevista' => $ultimaEntrevista
    );

    $insertNotificacao = $notificacao->CreateMensagens($dadosNotificacoes);
    var_dump($insertNotificacao);
 ?>
