<?php
    session_start();
    include_once("Controller/VerificaSeEstaLogado.class.php");

    $Logado = new VerificaSeEstaLogado();
    $Logado->EstaLogado();
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
      <div class="navbar-fixed">
          
        
           <nav>
           
            <div class="nav-wrapper menuCor">
              <a href="#!" class="brand-logo"><span style="margin-left:5%"></span>Contrate um Aluno</a>
              <a href="#" data-activates="menuLateral" class="button-collapse"><i class="fa fa-bars " style="font-size:23px"></i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="OnePage.php?link=Home">Home</a></li>
                <li><a href="OnePage.php?link=Vagas">Vagas</a></li>
                <li><a href="OnePage.php?link=Curriculo">Curriculo</a></li>
                <li><a href="OnePage.php?link=Perfil">Perfil</a></li>
               <li><a href="" data-activates="Configuracoes" class="abrir"><img src="Images/Padrao/PerfilPadrao.png" class='circle responsive-img valign' width='40px' style='margin-top:10px'><span class='badge red circle white-text'>2</span></a></li>
                <li><a href="./Controller/Sair.php">Sair</a></li>
                <li><span style="margin-right:5%">&nbsp &nbsp</span></li>
              </ul>
              <ul class="side-nav" id="menuLateral">
               <li><div class="userView">
                  <img class="background responsive-img" src="Images/Office.jpg">
                  <a href="#!user"><img class="circle" src="images/Padrao/PerfilPadrao.png"></a>
                  <a href="#!name"><span class="white-text name">Aqui vai o Nome</span></a>
                  <a href="#!email"><span class="white-text email">email@email.com</span></a>
                </div></li>
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
              </ul>
              <ul class="side-nav" id="Configuracoes">
                  <li><div class="userView">
                  <img class="background responsive-img" src="Images/Office.jpg">
                  <a href="#!user"><img class="circle" src="images/Padrao/PerfilPadrao.png"></a>
                  <a href="#!name"><span class="white-text name">John Doe</span></a>
                  <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div></li>
                    <li><a href="">Notificações <span class='badge red circle white-text'>2</span></a></li>
                    <li><a href="">Alterar configurações de Login</a></li>
                    <li><a href="">Trocar Imagem de fundo</a></li>
              </ul>
            </div>
          </nav>
          
      </div>
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