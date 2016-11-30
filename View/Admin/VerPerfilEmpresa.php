<?php
  $idEmpresa = $_GET['empresa'];
  $codUsuarioEmpresa = $_GET['perfil'];
  $anterior       = $_GET['anterior'];
  include_once "Model/ModelEmpresa.class.php";
  include_once "Model/ModelEnderecos.class.php";
  include_once "Model/ModelValores.class.php";
  include_once "Model/ModelTelefones.class.php";

  $Empresa           = new ModelEmpresa();
  $ResultEmpresa = mysqli_fetch_object($Empresa->ReadEmpresa("where idEmpresa = $idEmpresa"));
  $Endereco          = new Enderecos();
  $Valor             = new Valores();
  $Telefone          = new Telefones();
  $ConsultaTelefone  = $Telefone -> ReadTelefones("where codUsuario = $codUsuarioEmpresa");
  $ResultEndereco    = mysqli_fetch_object($Endereco->ReadEnderecos("where codUsuario = $codUsuarioEmpresa"));
  $consultaValor     = $Valor->ReadValores("where codEmpresa = $idEmpresa ");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/VerPerfilEmpresa.js"></script>



</head>
<body>

  <div class="container">
    <div class="row">
      <div class="input-field col s12 m6">
        <h1 class="center-align flow-text"><?= $ResultEmpresa -> nome ?></h1>
      </div>
      <div class="input-field col s12 m6">
        <img src="Images/Upload/<?= $ResultEmpresa -> foto?>" alt="Imagem Perfil" class='circle' id='preview' width="220px" height="200px">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12 m6">
        <label for="cnpf">CNPJ:</label>
        <input type="text" name="cnpj" id="cnpj"  value="<?= $ResultEmpresa -> cnpj?>" readonly="true">
      </div>
      <div class="input-field col s12 m6">
        <label for="area">Área de atuação:</label>
        <input type="text" name="areaAtuacao" id="areaAtuacao" value="<?= $ResultEmpresa -> areaAtuacao?>" readonly="true" >
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12 m3">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" value="<?= $ResultEndereco -> cep?>" readonly="true">
      </div>
      <div class="input-field col s12 m4">
        <label for="rua">Logradouro:</label>
        <input type="text" name="rua" id="rua" value="<?= $ResultEndereco -> rua?>" readonly="true">
      </div>
      <div class="input-field col s12 m2">
        <label for="numero">numero</label>
        <input type="number" name="numero" id="numero" value="<?= $ResultEndereco -> numero?>"  readonly="true">
      </div>
      <div class="input-field col s12 m3">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" value="<?= $ResultEndereco -> bairro ?>" readonly="true">
      </div>
      <div class="input-field col s12 m5">
        <label for="complemento">Complemento:</label>
        <input type="text" name="complementol" id="complemento" value="<?= $ResultEndereco -> complemento?>" readonly="true">
      </div>
      <div class="input-field col s12 m4">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="<?= $ResultEndereco -> cidade?>" readonly="true">
      </div>
      <div class="input-field col s12 m3" >
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" value="<?= $ResultEndereco -> estado?>" readonly="true">
      </div>
    </div>
    <div class="row">
          <?php
            while($ResultTelefone = mysqli_fetch_assoc($ConsultaTelefone)){
          ?>

            <div class="input-field col s12 m4">
              <label for="">Telefone <?= $ResultTelefone['tipo']?></label>
              <input placeholder=" " type="tel" name="<?= $ResultTelefone['telefone']?>" value="<?= $ResultTelefone['telefone']?>" readonly="true">

            </div>
          <?php
        }
        ?>
    </div>
    <div class="row">
      <div class="input-field col s12 m12">
        <label for="historia">Sobre a Empresa:</label>
        <textarea name="historia" id="história" rows="8" cols="40" class='materialize-textarea' readonly="true"><?= $ResultEmpresa->historia?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12 m12">
        <label for="missao">Missão:</label>
        <textarea name="missao" id="missao" rows="8" cols="40" class='materialize-textarea' readonly="true"><?= $ResultEmpresa->missao?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12 m12">
        <label for="visao">Visão:</label>
        <textarea name="visao" id="missao" rows="8" cols="40" class='materialize-textarea' readonly="true"><?= $ResultEmpresa->visao?></textarea>
      </div>
    </div>
    <div class="row">
      <h1 class="center-align flow-text">Valores</h1>
      <div class="flow-text">
      <?php
       while ($Valor = mysqli_fetch_object($consultaValor)) {
        ?>
              <span class="chip">
                <?= $Valor -> valor?>
              </span>

          <?php
      }

      ?>
    </div>
    </div>
    <div class="row">
      <div class="col s12 m9 push-m3">
        <a href="OnePage.php?<?= $anterior?>"><button class="btn btn-large blue col s12 m6">Voltar</button></a>
      </div>
    </div>
  </div>

</body>
</html>
