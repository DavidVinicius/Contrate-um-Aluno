<?php
    session_start();

    if(!isset($_SESSION['id']) and !isset($_SESSION['senha']) and !isset($_SESSION['usuario']) and !isset($_SESSION['nivel']) )
        header("location: Index.php");
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
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
                    if($_SESSION['nivel'] == 1){
        			    if(empty($_SERVER['QUERY_STRING'])){
                            include "View/Shared/HomeAluno.php";
                        }else{ //Se não abri conteúdo especificado no ?link=....
        				    include "View/Shared/".$_GET['link'].".php";
                        }
                    }else if($_SESSION['nivel'] == 2){
            			    if(empty($_SERVER['QUERY_STRING'])){
                                include "View/Shared/HomeEmpresa.php";
                            }else{ //Se não abri conteúdo especificado no ?link=....
            				            include "View/Shared/".$_GET['link'].".php";
                            }
                    }
                    else if($_SESSION['nivel'] == 3){
          			    if(empty($_SERVER['QUERY_STRING'])){
                              include "View/Shared/HomeProfessor.php";
                          }else{ //Se não abri conteúdo especificado no ?link=....
          				            include "View/Shared/".$_GET['link'].".php";
                          }
                    }else{
                        if(empty($_SERVER['QUERY_STRING'])){
                            include "View/Admin/Home.php";
                        }else{
                            include "View/Admin/".$_GET['link'].".php";
                        }
                    }
			 ?>
            </section>
    </div>


    <!-- <script src="js/jquery-3.1.0.min.js"></script> -->
    <script src="js/materialize.min.js"></script>
    <script>
            $(".teste").hide();
            $(".nav-wrapper > li").click(function(){
                $(".teste").show();
               function barra(){


                  var  width = 100;
                    $(".determinate").css({
                        width: "100%",
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
