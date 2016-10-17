<?php
    include "Model/DataBase.class.php";
    $DB                 = new DataBase();
    $idUsuario          =  $_SESSION['id'];
    $ConsultaEmpresa    = $DB   -> SearchQuery('empresa',"where codUsuario = $idUsuario");
    $ResultEmpresa      = mysqli_fetch_assoc($ConsultaEmpresa);
    $idEmpresa          = $ResultEmpresa['idEmpresa'];
    $ConsultaVaga       = $DB   -> SearchQuery('vaga',"where codEmpresa = $idEmpresa");
    $ResultVaga2        = mysqli_fetch_assoc($ConsultaVaga);
    if(isset($_GET['idVaga']))
    {
        $idVaga = $_GET['idVaga'];
        if($DB->DeleteQuery('vaga',"where idVaga = $idVaga"))
        {
            echo "<script>alert('Excluido com sucesso')</script>";
            
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/Materialize.min.js"></script>
    <script src="js/CriarVaga.js"></script>
</head>
<body ng-app="myapp" ng-controller="CriarVaga">
    <div class="container">
        <div class="row">
            <h3 class="center-align">Publique sua vaga no contrate um aluno</h3>
            <div class="col s12 m12">
                <form action="Controller/Cadastro/CadastroVaga.php" method="post">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <label for="titulo">Nome da vaga</label>
                            <input type="text" name="titulo" id="titulo" class="flow-text" style="font-size:22px" ng-model="titulo" required>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="cargaHoraria">Carga horária semanal</label>
                            <input type="number" class="flow-text" name="cargaHoraria" id="cargaHoraria" max="50" min="24" maxlength="2" style="font-size:22px" ng-model="cargaHoraria" required >
                        </div>
                    </div>
                    <div class="row">
                       
                        
                        <div class="input-field col s12 m6">
                           <div class="chips chips-placeholder"></div>
                           
                       </div>
                        <div class="input-field col s12 m6">
                            <label for="salario">Salário</label>
                            <input type="number" name="salario" id="salario" min="400" ng-model="salario" required>
                        </div>
                    </div>
                    <div class="row">
                       <div class="input-field col s12 m6">
                            <label for="requisitos">Requisitos</label>
                            <textarea name="requisitos" id="requisitos" cols="30" rows="10" class="materialize-textarea" ng-model="requisitos" required ></textarea>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" class="materialize-textarea" ng-model="descricao" required></textarea>
                        </div>
                        
                    </div>
                    <div class="row">
                        
                        <button class="btn blue" ng-click='adicionarVaga()'>Adicionar vaga</button>
                    </div>
                </form>
            </div>
        </div>

   <div class="row">
         <h1 class="flow-text center-align">Suas vagas cadastradas</h1>
      <div class="col s12 m12">
              <div class="col s12 m6"  ng-repeat="x in vaga">
                    <div class="card  hoverable">
                        <div class="card-content">
                          <span class="card-title">{{x.titulo}}</span>
                          <p class="contentEditable" contenteditable="true">Carga horária: {{x.carga}}</p>
                          <p class="contentEditable" contenteditable="true">Salario: {{x.Salario}}</p>
                          <p class="truncate contentEditable" contenteditable="true">beneficos: {{x.beneficio}}</p>
                          <p class="truncate contentEditable" contenteditable="true">Descrição: {{x.descricao}}</p>
                        </div>
                        <div class="card-action">
                          <form action="" method="get">
                              <input type="submit" value="Excluir" class="btn red ">
                              
                          </form>
                        </div>
                      </div>
                </div>
       <?php
            while($ResultVaga = mysqli_fetch_assoc($ConsultaVaga))
            {
            ?>
            <div class="card col s12 m6 hoverable">
                <span class="card-title"><?= $ResultVaga['titulo'] ?></span>
                <div class="card-content">
                    <p>Carga horária: <span class="contentEditable" contenteditable="true"><?= $ResultVaga['cargaHoraria']?></span></p>
                    <p>Salario: <span class="contentEditable" contenteditable="true"><?= $ResultVaga['salario']?></span></p>
                    <p>Benefícios: <span class="contentEditable" contenteditable="true"><?= $ResultVaga['beneficios']?></span></p>
                    <p>Descrição: <span class="contentEditable" contenteditable="true"><?= $ResultVaga['descricao']?></span></p>
                </div>
                <div class="card-action">
                          <form action="OnePage.php?link=CriarVaga&idVaga=<?=$ResultVaga['idVaga'] ?>" method="post">
                              <input type="submit" value="Excluir" class="btn red">
                          </form>
                          
                </div>
            </div>
            
            <?php
            }
       ?>
       </div>
   </div>
    </div>
</body>
</html>