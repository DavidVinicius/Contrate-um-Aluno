<?php
    session_start();

    if(isset($_POST['tabela']) && $_POST['tabela'] == "formacoes")
    {
        require_once("../Model/ModelFormacoes.class.php");
        $idAluno      = isset($_POST['idAluno'])        ?   $_POST['idAluno']:null;
        $anoConclusao = isset($_POST['anoConclusao'])   ?   $_POST['anoConclusao']:null;
        $instituicao  = isset($_POST['instituicao'])    ?   $_POST['instituicao']:null;
        $curso        = isset($_POST['curso'])          ?   $_POST['curso']:null;
        $Formacao     = new Formacoes();
        $dados = array(
            "anoConclusao" => $anoConclusao,
            "instituicao"  => $instituicao,
            "curso"        => $curso,
            "codAluno"     => $idAluno
        );
        $Formacao->CreateFormacoes($dados);
    }

    if(isset($_POST['tabela']) && $_POST['tabela'] == "telefones")
    {
        require_once("../Model/ModelTelefones.class.php");
        $codUsuario     = $_SESSION['id'];
        $telefone       = isset($_POST['telefone']) ?   $_POST['telefone']:null;
        $tipo           = isset($_POST['tipo'])     ?   $_POST['tipo']:null;

        $Telefone       = new Telefones();
        $dados = array(
            "telefone"          => $telefone,
            "tipo"              => $tipo,
            "codUsuario"        => $codUsuario
        );
        $Telefone->CreateTelefones($dados);
    }

    if(isset($_POST['tabela']) && $_POST["tabela"] == "experiencias")
    {
        require_once("../Model/ModelExperiencias.class.php");
        $idAluno    = isset($_POST['idAluno'])      ?   $_POST['idAluno']:null;
        $descricao  = isset($_POST['descricao'])    ?   $_POST['descricao']:null;
        $dataInicio = isset($_POST['dataInicio'])   ?   $_POST['dataInicio']:null;
        $dataSaida  = isset($_POST['dataSaida'])    ?   $_POST['dataSaida']:null;
        $cargo      = isset($_POST['cargo'])        ?   $_POST['cargo']:null;

        $Experiencia   = new Experiencias();
        $dados = array(
            "descricao"     => $descricao,
            "dataInicio"    => $dataInicio,
            "dataSaida"     => $dataSaida,
            "cargo"         => $cargo,
            "codAluno"      => $idAluno
        );
        if($Experiencia->CreateExperiencias($dados))
            echo "deu certo";
    }

?>
