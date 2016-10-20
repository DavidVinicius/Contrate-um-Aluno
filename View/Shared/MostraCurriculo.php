<?php
    require_once "Model/ModelAluno.class.php";
    require_once "Model/ModelEnderecos.class.php";
    require_once "Model/ModelTelefones.class.php";
    require_once "Model/ModelFormacoes.class.php";
    require_once "Model/ModelExperiencias.class.php";

    $idUsuario = $_SESSION['id'];
    $Aluno = new ModelAluno();
    $LerAluno = $Aluno->ReadAluno("where codUsuario = $idUsuario");
    $AssocAluno = mysqli_fetch_assoc($LerAluno);
    $idAluno = $AssocAluno['idAluno'];

    $Endereco = new Enderecos();
    $LerEndereco = $Endereco->ReadEnderecos("where codAluno=$idAluno");
    $AssocEndereco = mysqli_fetch_assoc($LerEndereco);

    $Telefones = new Telefones();
    $LerTelefones = $Telefones->ReadTelefones("where codAluno=$idAluno");

    $Formacoes = new Formacoes();
    $LerFormacoes = $Formacoes->ReadFormacoes("where codAluno=$idAluno");


    $Experiencias = new Experiencias();
    $LerExperiencias = $Experiencias->ReadExperiencias("where codALuno=$idAluno");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $AssocAluno['nome'] ?>" readonly>
                    </div>
                    <div class="input-field col s12 m6 push-m2">
                        <img src="Images/Upload/<?= $AssocAluno['foto'] ?>" alt="Foto Perfil" class="responsive-img circle" width="200px" height="200px">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="text" name="dataNascimento" id="dataNascimento" value="<?= $AssocAluno['dataNascimento'] ?>" readonly>
                    </div>,
                    <div class="input-field col s12 m4">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?= $AssocAluno['cpf']?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="rg">Rg:</label>
                        <input type="text" name="rg" id="rg" value="<?= $AssocAluno['rg']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <?php
                        while($ResultTelefone = mysqli_fetch_assoc($LerTelefones))
                        {
                    ?>
                        <div class="input-field col s12 m4">
                            <label for="<?=$ResultTelefone['idTelefone']?>">Telefone:</label>
                            <input type="text" name="<?=$ResultTelefone['idTelefone']?>" id="<?=$ResultTelefone['idTelefone']?>" value="<?=$ResultTelefone['telefone']?>" readonly>
                        </div>   
                    
                    <?php        
                        }
                    ?>
                </div>
                <div class="row">
                  <div class="input-field col s12 m2">
                      <label for="cep">CEP:</label>
                      <input type="text" name="cep" id="cep" value="<?= $AssocEndereco['cep'] ?>">
                  </div>
                   <div class="input-field col s12 m4">
                       <label for="rua">Rua:</label>
                       <input type="text" name="rua" id="rua" value="<?= $AssocEndereco['rua'] ?>" readonly>
                   </div>
                   <div class="input-field col s12 m1">
                       <label for="numero">Número:</label>
                       <input type="text" name="numero" id="numero" value="<?= $AssocEndereco['numero']?>" readonly>
                   </div>
                   <div class="input-field col s12 m4">
                       <label for="bairro">Bairro:</label>
                       <input type="text" name="bairro" id="bairro" value="<?= $AssocEndereco['bairro']?>" readonly>
                   </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m5">
                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento" id="complemento" value="<?= $AssocEndereco['complemento']?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" value="<?= $AssocEndereco['cidade']?>" readonly>
                    </div>
                    <div class="input-field col s12 m3">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" value="<?= $AssocEndereco['estado']?>">
                    </div>
                </div>
                <div class="row">
                    <p class="center-align flow-text">Habilidades</p>
                    <p class="flow-text"><?= $AssocAluno['qualificacoes'] ?></p>
                </div>
                <div class="row">
                   <p class="center-align flow-text">Formações</p>
                    <?php
                        while($ResultFormacoes = mysqli_fetch_assoc($LerFormacoes))
                        {
                    
                        ?>
                            <div class="card col s12 m6">
                                <span class="card-title"><?=  $ResultFormacoes['curso'] ?></span>
                                <div class="card-content">
                                    <?= $ResultFormacoes['anoConclusao']. " - ". $ResultFormacoes['instituicao'] ?>
                                </div>
                                
                            </div>                        
                        
                        <?php
                        }             
                    
                    ?>
                </div>
                <div class="row">
                              <p class="center-align flow-text">Experiências</p>

                    <?php
                        while($ResultExperiencia = mysqli_fetch_assoc($LerExperiencias)){
                    ?>
                        <div class="card col s12 m6 hoverable">
                            <span class="card-title"><?= $ResultExperiencia['dataInicio']?> - <?= $ResultExperiencia['dataSaida']  ?> - <?= $ResultExperiencia['cargo']  ?></span>
                            <div class="card-content">
                                <?= $ResultExperiencia['descricao']  ?>
                            </div>
                            
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="row">
                    <a href="" class="btn blue">Alguma ação</a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>