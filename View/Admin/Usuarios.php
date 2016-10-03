<?php
    include "Model/DataBase.class.php";
    $id = $_SESSION['id'];

    $Banco = new DataBase();

    for($i=1;$i<=7;$i++){
    $consulta = $Banco -> SearchQuery("usuario","where idUsuario = '$i'");
    $result = mysqli_fetch_assoc($consulta);
    $a[$i] = $result;
//        echo "<pre>";
//    print_r($result);
//        echo "</pre>";
//    echo json_encode($result);
    }
    $idBotao = $_GET['escondido'];
    if($idBotao){
        echo "O botão de id nº $idBotao foi clicado";
        
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--   <link rel="stylesheet" href="../../css/materialize.css">-->
<!--   <link rel="stylesheet" href="../../fonts/material-icons.css">-->
    <meta charset="utf-8">
    <title>Document</title>
</head>
<body ng-app='app' ng-controller='div'>
    <h1 class="center-align">Usuarios</h1>
    <div class="center-align col m8 s12 push-m2">
<!--        <input type="text" ng-model="filtrar">-->
    </div>
    <div class="col m8 s12 push-m2">
        <div class='card-panel medium' ng-repeat="t in usuario" >
            <h2 class='flow-text'>O id é {{t.idUsuario}} </h2>
            <p class='flow-text hoverable' ng-click='ola(this)'> {{t.email}} <span class='chip' ng-init="  " ><i class='material-icons'>cloud</i></span> </p>
            <p> {{t.senha}} </p>
            <p> {{t.nivel}} </p>
            <form action="" method='get'>
               <input type="hidden" name="escondido" value='{{t.idUsuario}}'>
                <input type='submit' class="btn red" value='Excluir'>

            </form>
        </div>
    </div>
            
    <script src='js/angular.min.js'></script>
    <script>
     var app = angular.module('app',[]);
        app.controller('div',['$scope',function($scope){
            $scope.usuario = <?= json_encode($a); ?> ;
            $scope.filtrar = "";
            $scope.ola = function(a){
                var id = a.id;
                alert("olá" + id);
            }
            
        }]);
    
    </script>
</body>
</html>