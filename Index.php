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
    <meta name="viewport" content="width=device-width, initial-scale=1.0 and max-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <video src="videos/conversa.mp4" class="responsive-video" autoplay="true" loop="true" muted="true">

  </video>
  <img src="Images/Office.jpg" alt="" class="imgfundo">
    <div class="navbar-fixed">

       <nav>
        <div class="nav-wrapper menuCor ">
          <a href="#!" class="brand-logo"></span> Contrate um Aluno</a>

          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" style="font-siz:20px margin-left:5%;"></i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">A ideia</a></li>
            <li><a href="badges.html">Sobre os Desenvolvedores</a></li>
            <li><a href="http://www.estudeaqui.pe.hu" class="btn orange">Estude aqui</a></li>
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

    </div>
    <section class="Aideia section">
        <div class="row">
            <h1 class="center-align white-text">A ideia</h1>
        </div>
    </section>
    <div class="EmpresasParralax">
      <div class="parallax-container">
        <div class="parallax">
          <img src="Images/Office.jpg" >
        </div>
        <div class="carousel">
          <h3 class="center-align mytext white-text">Empresas cadastradas</h3>
          <?php
              require_once "Model/ModelEmpresa.class.php";
              $Empresa = new ModelEmpresa();
              $ResultEmpresa = $Empresa -> ReadEmpresa("order by idEmpresa desc limit 5");
              while ($Empresas = mysqli_fetch_object($ResultEmpresa) ) {
                # code...
           ?>

                <a class="carousel-item" href="#!">
                  <center>
                    <span class="center flow-text white-text">
                      <?= $Empresas -> nome ?>
                    </span>
                  </center>
                  <img src="Images/Upload/<?= $Empresas -> foto?>" class="circle" width="200px" height="200px">
                  <center>
                    <span class="center flow-text white-text">
                      <?= $Empresas -> areaAtuacao ?>
                    </span>
                  </center>
                </a>

        <?php
              }
         ?>

        </div>
      </div>

    </div>
    <section class="section SobreOsDesenvolvedores menuCor">
            <h1 class="center-align white-text">Sobre os Fundadores</h1>
            <div class="row">
              <div class="col s12  m6">
                <h1 class="center-align flow-text white-text">David Vinicius da Silva</h1>
                <div class="row">
                  <div class="col s6 m6 white-text">
                    Desenvolvedor front end sssssssssssss sssssssssssssssssss
                  </div>
                  <div class="col s3 pull-s1 m4 push-m2">
                    <img src="Images/Office.jpg" alt="" class=" circle" width="150px" height="150px">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 pull-s2 m12">
                    <span class="right">
                      <button class="btn-flat white-text"><i class="fa fa-facebook"></i></button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 abaixo-1">
                <h1 class="center-align flow-text white-text">Matheus Augusto Picioli</h1>
                <div class="row">
                  <div class="col s4 pull-s1 m4">
                    <img src="Images/Office.jpg" alt="" class=" circle" width="150px" height="150px">
                  </div>
                  <div class="col s6  m6">
                    <span class="right white-text">Desenvolvedor Back-end <br>
                    Adoro banco de dados, LOL é minha vidassssssssssss

                     </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 push-s2 m12">
                    <button class="btn-flat white-text"><i class="fa fa-github"></i></button>
                  </div>
                </div>
              </div>
            </div>
    </section>
     <section class="AlunosParallax section ">
      <div class="parallax-container">
        <div class="parallax"><img src="Images/Office.jpg"></div>
        <div class="carousel">
          <h4 class="center-align mytext white-text">Alunos cadastrados</h4>
          <?php
              require_once "Model/ModelAluno.class.php";
              $Aluno = new ModelAluno();
              $ResultAluno = $Aluno -> ReadAluno("order by idAluno desc limit 5");
              while ($Alunos = mysqli_fetch_object($ResultAluno) ) {
                # code...
           ?>
                <a class="carousel-item" href="#!" class="white-text">
                   <center>
                     <span class="center flow-text white-text">
                       <?= $Alunos -> nome ?>
                     </span>
                   </center>
                   <img src="Images/Upload/<?= $Alunos -> foto?>" class="circle" width="200px" height="200px">
                   <center>
                     <span class="center flow-text white-text">
                       <?= $Alunos -> objetivo ?>
                     </span>
                   </center><br>
                 </a>

        <?php
              }
         ?>
          <p>

          </p>
        </div>
      </div>
    </section>
    <section class="footer ">
      <footer class="page-footer grey darken-4">
        <div class="container  ">
          <div class="row  ">
            <div class="col l6 s12">
              <h5 class="white-text">Footer Content</h5>
              <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">A ideia</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Sobre os Desenvolvedores</a></li>

              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright  ">
          <div class="container  ">
          © 2016 Copyright Text
          <a class="grey-text text-lighten-4 right" href="#!">Produzido com <i class="fa fa-heart red-text" aria-hidden="true"></i> por David Vinicius e Matheus Picioli</a>
          </div>
        </div>
      </footer>
    </section>
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
    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
             $(".button-collapse").sideNav();
            $(".abrirFormulario").leanModal();
            $('.parallax').parallax();
            $('.carousel').carousel();
            if ($(window).width() < 769) {
              alert();
              $('video').remove();
              $('.imgfundo').show();
            }
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
