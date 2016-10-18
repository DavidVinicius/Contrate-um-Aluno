<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="fonts/material-icons.css">
    <style>
        .menuCor{
            background-color: rgb(50,49,51);    
        }
    </style>
</head>
<body>
    <ul id="slide-out" class="side-nav">
        <li><div class="userView">
          <img class="background" src="images/office.jpg">
          <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
          <a href="#!name"><span class="white-text name">John Doe</span></a>
          <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>
     <div class="row">
      <?php
         include_once("View/Shared/Menu.php");
         ?>
           <div class="teste blue">
               <div class="progress">
                  <div class="determinate blue" ></div>
               </div>
           </div>
            <section class="section">
                <?php 
			  //Se não clicou para abrir, mostra página home
			 if(empty($_SERVER['QUERY_STRING'])){
                    include "View/Shared/Home.php";
                }else{ //Se não abri conteúdo especificado no ?link=....
				    include "View/Shared/".$_GET['link'].".php";
                }
			 ?>
            </section>
    </div>
    
                   
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
            $(".teste").hide();
            $("li").click(function(){
                $(".teste").show();
                
               function barra(){
                   
                   var width = new Number();
                   width += 100;
                    $(".determinate").css({
                        width: width+"%",
                    });
//                   alert(width);
               }
                
                var aumenta = setInterval(barra(),1000);
                
                if(width == 100){
                    clearInterval(aumenta);
                }
                
                alert(width);
                
            });
              // Initialize collapse button
              $(".button-collapse").sideNav();
              $(".abrir").sideNav();
              // Initialize collapsible (uncomment the line below if you use the dropdown variation)
              //$('.collapsible').collapsible();
    </script>
</body>
</html>