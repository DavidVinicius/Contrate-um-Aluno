<?php
  include_once "Model/ModelEmpresa.class.php";
  include_once "Model/ModelEnderecos.class.php";
  include_once "Model/ModelValores.class.php";
  include_once "Model/ModelTelefones.class.php";
  $idUsuario         = $_SESSION['id'];
  $Empresa           = new ModelEmpresa();
  $Endereco          = new Enderecos();
  $Valor             = new Valores();
  $Telefone          = new Telefones();
  $ConsultaTelefone  = $Telefone -> ReadTelefones("where codUsuario = $idUsuario");

  $ResultEmpresa     = mysqli_fetch_assoc($Empresa->ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa         = $ResultEmpresa['idEmpresa'];
  $ResultEndereco    = mysqli_fetch_assoc($Endereco->ReadEnderecos("where codUsuario = $idUsuario"));
  $consultaValor     = $Valor->ReadValores("where codEmpresa = $idEmpresa ");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery-3.1.0.min.js">
    </script>
    <script type="text/javascript" src="js/angular.min.js">
    </script>
    <script type="text/javascript" src="js/materialize.min.js">

    </script>
    <script type="text/javascript" src="js/MostraEmpresa.js">

    </script>

</head>
<body ng-app="myapp" ng-controller="MostraEmpresa">

    <div class="container">
    <div class="row">
        <div class="col s12 m12">

                <div class="row">
                  <div class="input-field col s12 m6">
                      <label for="nome">Nome Fantasia:</label>
                      <input type="text" name="nome" id="nome" value="<?= $ResultEmpresa['nome'] ?>"
                      data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="empresa" data-campo="nome" data-idempresa="<?= $idEmpresa ?>">
                  </div>
                  <div class="col s12 m6 push-m1 ">
                    <form action="Controller/AlterarEmpresa.php" method="post" id="enviarFoto" enctype="multipart/form-data">
                      <input type="hidden" name="existeFoto" value="sim">
                      <div class="file-field input-field col s12 push-s3 m3">
                          <div class="btn blue" style='margin-bottom:10px'> <span> Trocar foto</span>
                              <input type="file" id='foto' name="foto" accept='image/*' onchange='loadFile(event)'> </div>
                      </div>
                      <br>
                      <div class="file-path-wrapper col s4 push-s3 m6 push-m1 center">
                          <input class="file-path validate" type="text" value="Logo da sua empresa" readonly="">  <img src="Images/Upload/<?= $ResultEmpresa['foto']?>" alt="Imagem Perfil" class=' responsive-img' id='preview'>
                        <div class="row">
                          <div class="col s12 m12">
                            <input type="submit" value="Salvar" class="btn blue" id="salvarFoto">
                          </div>
                        </div>
                        </div>
                      </form>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <label for="cnpf">CNPJ:</label>
                    <input type="text" name="cnpj" id="cnpj"  value="<?= $ResultEmpresa['cnpj']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="empresa" data-campo="cnpj" data-idempresa="<?= $idEmpresa ?>">
                  </div>
                  <div class="input-field col s12 m6">
                    <label for="area">Área de atuação:</label>
                    <input type="text" name="areaAtuacao" id="areaAtuacao" value="<?= $ResultEmpresa['areaAtuacao']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="empresa" data-campo="areaAtuacao" data-idempresa="<?= $idEmpresa ?>" >
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m3">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" value="<?= $ResultEndereco['cep']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="cep" data-idusuario="<?= $idUsuario ?>">
                  </div>
                  <div class="input-field col s12 m4">
                    <label for="rua">Logradouro:</label>
                    <input type="text" name="rua" id="rua" value="<?= $ResultEndereco['rua']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="rua" data-idusuario="<?= $idUsuario ?>">
                  </div>
                  <div class="input-field col s12 m2">
                    <label for="numero">numero</label>
                    <input type="number" name="numero" id="numero" value="<?= $ResultEndereco['numero']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="numero" data-idusuario="<?= $idUsuario ?>">
                  </div>
                  <div class="input-field col s12 m3">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" value="<?= $ResultEndereco['bairro']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="bairro" data-idusuario="<?= $idUsuario ?>">
                  </div>
                  <div class="input-field col s12 m5">
                    <label for="complemento">Complemento:</label>
                    <input type="text" name="complementol" id="complemento" value="<?= $ResultEndereco['complemento']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="complemento" data-idusuario="<?= $idUsuario ?>">
                  </div>
                  <div class="input-field col s12 m4">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" value="<?= $ResultEndereco['cidade']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="cidade" data-idusuario="<?= $idUsuario ?>">
                  </div>
                  <div class="input-field col s12 m3" >
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" value="<?= $ResultEndereco['estado']?>" data-position="right" data-delay="50" data-tooltip="Clique para editar" class="tooltipped" data-tabela="enderecos" data-campo="estado" data-idusuario="<?= $idUsuario ?>" >
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12">
                    <div class="col s12 m8 push-m4">
                      <button class="btn blue" id="adicionarNovoTelefone">Adicionar novo telefone</button>
                    </div>
                  </div>
                </div>
                <div class="row" id="novoTelefone">

                  <div class="input-field col s12 m12">
                    <div class="input-field col s12 m12">
                      <input type="radio" name="radio" id="celular" class="with-gap" value="Celular">
                      <label for="celular">Celular:</label>
                      <input type="radio" name="radio" id="Comercial" class="with-gap" value="Comercial">
                      <label for="Comercial">Comercial:</label>
                      <input type="radio" name="radio" id="Recado" class="with-gap" value="Recado">
                      <label for="Recado">Recado:</label>
                    </div>
                    <div class="input-field col s12 m12">
                      <label for="telefone">Telefone:</label>
                      <input type="tel" name="telefone" id="telefone" ng-model="Tel">
                      <button class="btn blue cancelaEvento" ng-click="adicionarTelefone()">Adicionar telefone</button>
                      <button class="btn red" id="esconderTelefone">Esconder</button>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12 m12">
                    <h1 class="center-align flow-text">Seus Telefones</h1>
                    <!-- Aqui vai ficar os telefones trazidos do banco -->
                      <div class="col s12 m12">
                        <div class="input-field col s12 m4" ng-repeat="x in telefones">
                          <label for="{{x.telefone}}">Telefone {{x.tipo}}:</label>
                          <input placeholder=" " type="tel" name="{{x.telefone}}" id="{{x.telefone}}" value="{{x.telefone}}" data-position="right" data-delay="50" data-tooltip="É preciso atualizar para editar ou excluir" class="tooltipped" readonly>
                          <span class="yellow-text ">É preciso atualizar para editar ou excluir</span>

                        </div>

                        <?php
                          while($ResultTelefone = mysqli_fetch_assoc($ConsultaTelefone)){
                        ?>

                          <div class="input-field col s12 m4">
                            <label for="">Telefone <?= $ResultTelefone['tipo']?></label>
                            <input placeholder=" " type="tel" name="<?= $ResultTelefone['telefone']?>" value="<?= $ResultTelefone['telefone']?>" data-idtelefone="<?= $ResultTelefone['idTelefone']?>" data-position="right" data-delay="50"  data-tooltip="Clique para editar" class="tooltipped" data-tabela="telefones" data-campo="telefone">
                            <span class="red-text excluir">Excluir</span>

                          </div>
                        <?php
                      }
                      ?>
                      </div>
                  </div>
                </div>
                <div class="row">

                  <div class="input-field col s12 m12">
                    <h1 class="center-align flow-text">Sobre sua Empresa</h1>
                    <p class="flow-text tooltipped" id="historia" contenteditable="true" data-tabela="empresa" data-campo="historia" data-idempresa="<?= $ResultEmpresa['idEmpresa']?>"  data-position="right" data-delay="50"  data-tooltip="Clique para editar"><?= $ResultEmpresa['historia']?></p>

                    </textarea>
                  </div>
                </div>
                <div class="row">

                  <div class="input-field col s12 m12">
                    <h1 class="center-align flow-text">Missão</h1>
                    <p class="flow-text tooltipped" id="missao" data-tabela="empresa" data-campo="missao" data-idempresa="<?= $ResultEmpresa['idEmpresa']?>" contenteditable="true" data-position="right" data-delay="50"  data-tooltip="Clique para editar"><?= $ResultEmpresa['missao']?></p>

                    </textarea>
                  </div>
                </div>
                <div class="row">
                  <h1 class="flow-text center-align">Visão</h1>
                  <div class="input-field col s12 m12">
                    <p class="flow-text tooltipped" id="visao" data-tabela="empresa" data-campo="visao" data-idempresa="<?= $ResultEmpresa['idEmpresa']?>" contenteditable="true" data-position="right" data-delay="50"  data-tooltip="Clique para editar"><?= $ResultEmpresa['visao']?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 push-m4 m8">
                      <button class="btn blue" id="adicionarNovoValor">Adicionar novo valor</button>
                  </div>

                  <div class="col s12 m12" id="novoValor">
                      <div class="input-field col s12 m12">
                        <label for="valor">Digite o novo valor:</label>
                        <input type="text" name="valor" id="valor" ng-model="valor">
                      </div>
                      <button class="btn red" id="esconderValor">Esconder</button>
                  </div>
                </div>
                <div class="row">
                  <h1 class="center-align flow-text">Valores</h1>
                    <div class="col s12 m12">
                      <?php while($ResultValor = mysqli_fetch_assoc($consultaValor)){ ?>
                        <span class="chip flow-text tooltipped" data-tabela="valores" data-campo="valor" data-idvalores="<?= $ResultValor['idValores']?>" data-position="right" data-delay="50"  data-tooltip="Clique para editar" contenteditable="true"> <?= $ResultValor['valor']?> <i class="material-icons close">close</i></span>
                        <?php } ?>
                        <div class="chip" ng-repeat="x in valores">
                          <span class="" >{{x.valor}}</span>
                          <i class="material-icons close">close</i>
                        </div>
                    </div>
                </div>



        </div>
    </div>
</div>

<input type="hidden" name="idEmpresa" id="idEmpresa" value="<?= $ResultEmpresa['idEmpresa']?>">
<script>
    var loadFile = function (event) {
        var foto = document.getElementById('preview');
        foto.src = URL.createObjectURL(event.target.files[0]);
    }


</script>
</body>
</html>
