<?php
    require_once "../Model/ModelEntrevistas.class.php";
    require_once "../Model/ModelBeneficiosExperiencia.class.php";

    $entrevista             = new ModelEntrevistas();
    $beneficiosExperiencia  = new ModelBeneficiosExperiencia();

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
    $descricao    = isset($_POST['descricao'])  ? $_POST['descricao']:null;

    $dados = array(
        "data" => $data,
        "hora" => $hora,
        "local" => $local,
        "numero" => $numero,
        "bairro" => $bairro,
        "complemento" => $complemento,
        "cidade" => $cidade,
        "estado" => $estado,
        "vaga" => $vaga,
        "salario" => $salario,
        "descricao" => $descricao
    );
    $insert             = $entrevista->CreateEntrevista($dados);
    $selectObject       = mysqli_fetch_object($entrevista->ReadEntrevista("order by idEntrevista desc limit 1"));
    $ultimaExperiencia  = $selectObject->idEntrevista;

    for($i = 0; $i < count($beneficios); $i++){
        $dados22 = new array(
            "beneficio"     => $beneficios[$i]['tag'],
            "codEntrevista" => $ultimaExperiencia
        );
        $insertBeneficiosExperiencia    = $beneficiosExperiencia->InsertQuery($dados22);
    }
    
    echo $ultimaExperiencia;
 ?>
