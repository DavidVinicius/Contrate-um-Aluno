 <!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['id']) and isset($_SESSION['senha']) and isset($_SESSION['usuario']) and isset($_SESSION['nivel']) )
        header("location: OnePage.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contrate um Aluno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <video src="videos/conversa.mp4" class="responsive-video" autoplay loop muted>

  </video>
  <div class="navbar-fixed">

       <nav>
        <div class="nav-wrapper menuCor ">
          <a href="#!" class="brand-logo"><span style="margin-left:5%;"></span> Contrate um Aluno</a>

          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" style="font-siz:20px margin-left:5%;"></i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">A ideia</a></li>
            <li><a href="badges.html">Sobre os Desenvolvedores</a></li>
            <li><a href="" class="abrirFormulario waves-effect waves-light btn blue" data-target="modal1" data-page="Login/LoginModal.php">Login</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">A ideia</a></li>
            <li><a href="badges.html">Sobre os Desenvolvedores</a></li>
            <li><a href="" class="abrirFormulario waves-effect waves-light btn blue" data-target="modal1" data-page="Login/LoginModal.php" >Login</a></li>
          </ul>
        </div>
      </nav>
   </div>
    <div class="container zIndex abaixo-1">

        <section class="section">
        <div class="row">
            <div class="center-align">
                <h2 class="text-white">Contrate um Aluno</h2>
                <p class="flow-text text-white">O lugar onde a oportunidade de emprego corre atrás do candidato</p>
                <div class="m12">
                    <a href="#modal1"><button data-target="modal1" class="abrirFormulario waves-effect waves-light btn-large btn-flat col s12 m5 text-white" data-page="Modal/CadastroAluno.html" style="border:1px solid white"><i class="fa fa-male text-white" style="margin-right:1%"></i>Sou Aluno</button></a>
                    <a href="#modal1">
                        <button class="abrirFormulario waves-effect waves-light btn-large btn-flat col m5 s12 push-m1 text-white" data-page="Modal/CadastroEmpresa.html" style="border:1px solid white" data-target="modal1"><i class="fa fa-building text-white" style="margin-right:1%;"></i>Sou Empresa</button></a>
                </div>
            </div>


        </div>
        </section>
        <section class="Aideia section">
            <div class="row">
                <h1 class="center-align white-text">A ideia</h1>
            </div>
        </section>
    </div>
    <div class="col s12 m4 l4">
        <div id="modal1" class="modal modal-top">
             <div class="modal-content">

               </div>
        </div>
    </div>
    <!-- Modal Trigger -->

  <!-- Modal Structure -->

    <div class="fundoPreto"></div>
    <div class="fundoModal"></div>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
             $(".button-collapse").sideNav();
            $(".abrirFormulario").leanModal();

            $(".abrirFormulario").click(function(){

                var pagina = $(this).data("page");
                $.ajax({
                    method:"POST",
                    url: "View/"+pagina,
                    success: function(retorno){
                        $(".modal-content").html(retorno);
                    }
                });

            });
        });
    </script>
</body>
</html>
