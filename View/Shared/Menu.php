
<?php
 $nivel = $_SESSION['nivel'];
 $idUsuario = $_SESSION['id'];
if($nivel == 1){
    include_once "Model/ModelAluno.class.php";
    $aluno = new ModelAluno();
    $fetch = mysqli_fetch_assoc($aluno->ReadAluno("where codUsuario = $idUsuario"));
    $email = $_SESSION['usuario'];
    if ($fetch) {
      $fotoAluno = $fetch['foto'];
      $nomeAluno = $fetch['nome'];
    }
    else{
      $fotoAluno = "PerfilPadrao.png";
      $nomeAluno = "Não informado";
    }
    // var_dump($fotoAluno);
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                <li><a href='OnePage.php?link=HomeAluno'>Home</a></li>
                <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                <li><a href='OnePage.php?link=VerCurriculo'>Curriculo</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
               <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Upload/".$fotoAluno."' class='circle' width='60px' style='margin-top:10px'><span class='badge red circle white-text'>2</span></a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
                <li><span style='margin-right:5%'>&nbsp &nbsp</span></li>
              </ul>
              <ul class='side-nav' id='menuLateral'>
               <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='images/Upload/".$fotoAluno."'></a>
                  <a href='#!name'><span class='white-text name'>". $nomeAluno ."</span></a>
                  <a href='#!email'><span class='white-text email'>".$email ."</span></a>
                </div></li>
                <li><a href='OnePage.php?link=HomeAluno'>Home</a></li>
                <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                <li><a href='OnePage.php?link=VerCurriculo'>Curriculo</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
              </ul>
              <ul class='side-nav' id='Configuracoes'>
                  <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='Images/Upload/".$fotoAluno."'></a>
                  <a href='#!name'><span class='white-text name'>".$nomeAluno ."</span></a>
                  <a href='#!email'><span class='white-text email'>$email</span></a>
                    </div></li>
                    <li><a href=''>Notificações <span class='badge red circle white-text'>2</span></a></li>
                    <li><a href=''>Alterar configurações de Login</a></li>
                    <li><a href=''>Trocar Imagem de fundo</a></li>
              </ul>
            </div>
          </nav>

      </div>";
}
else if ($nivel == 2){
  include_once "Model/ModelEmpresa.class.php";
  $empresa       = new ModelEmpresa();
  $fetch         = mysqli_fetch_assoc($empresa->ReadEmpresa("where codUsuario = $idUsuario"));
  $email         = $_SESSION['usuario'];
  if ($fetch) {
    $fotoEmpresa = $fetch['foto'];
    $nomeEmpresa = $fetch['nome'];
  }
  else{
    $fotoEmpresa = "PerfilPadrao.png";
    $nomeEmpresa = "Não informado";

  }
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                <li><a href='OnePage.php?link=HomeEmpresa'>Home</a></li>
                <li><a href='OnePage.php?link=Candidatos'>Candidatos</a></li>
                <li><a href='OnePage.php?link=VerEmpresa'>Suas Informações</a></li>
                <li><a href='OnePage.php?link=CriarVaga'>Criar Vaga</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
               <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Upload/".$fotoEmpresa."' class='circle responsive-img valign' width='60px' style='margin-top:10px'><span class='badge red circle white-text'>2</span></a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
                <li><span style='margin-right:5%'>&nbsp &nbsp</span></li>
              </ul>
              <ul class='side-nav' id='menuLateral'>
               <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='Images/Upload/".$fotoEmpresa."'></a>
                  <a href='#!name'><span class='white-text name'>".$nomeEmpresa."</span></a>
                  <a href='#!email'><span class='white-text email'".$email."</span></a>
                </div></li>
                <li><a href='OnePage.php?link=HomeEmpresa'>Home</a></li>
                <li><a href='OnePage.php?link=Candidatos'>Candidatos</a></li>
                <li><a href='OnePage.php?link=Empresa'>Suas Informações</a></li>
                <li><a href='OnePage.php?link=CriarVaga'>Criar Vaga</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
              </ul>
              <ul class='side-nav' id='Configuracoes'>
                  <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='Images/Upload/".$fotoEmpresa."'></a>
                  <a href='#!name'><span class='white-text name'>".$nomeEmpresa."</span></a>
                  <a href='#!email'><span class='white-text email'>". $email ."</span></a>
                    </div></li>
                    <li><a href=''>Notificações <span class='badge red circle white-text'>2</span></a></li>
                    <li><a href=''>Alterar configurações de Login</a></li>
                    <li><a href=''>Trocar Imagem de fundo</a></li>
              </ul>
            </div>
          </nav>

      </div>";
}
else if ($nivel == 3){
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                <li><a href='OnePage.php?link=HomeProfessor'>Home</a></li>
                <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                <li><a href='OnePage.php?link=Curriculo'>Curriculo</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
               <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Padrao/PerfilPadrao.png' class='circle responsive-img valign' width='40px' style='margin-top:10px'><span class='badge red circle white-text'>2</span></a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
                <li><span style='margin-right:5%'>&nbsp &nbsp</span></li>
              </ul>
              <ul class='side-nav' id='menuLateral'>
               <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='images/Padrao/PerfilPadrao.png'></a>
                  <a href='#!name'><span class='white-text name'>Aqui vai o Nome</span></a>
                  <a href='#!email'><span class='white-text email'>email@email.com</span></a>
                </div></li>
                <li><a href='OnePage.php?link=HomeProfessor'>Home</a></li>
                <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                <li><a href='OnePage.php?link=Curriculo'>Curriculo</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
                 <li><a href='./Controller/Sair.php'>Sair</a></li>
              </ul>
              <ul class='side-nav' id='Configuracoes'>
                  <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='images/Padrao/PerfilPadrao.png'></a>
                  <a href='#!name'><span class='white-text name'>John Doe</span></a>
                  <a href='#!email'><span class='white-text email'>jdandturk@gmail.com</span></a>
                    </div></li>
                    <li><a href=''>Notificações <span class='badge red circle white-text'>2</span></a></li>
                    <li><a href=''>Alterar configurações de Login</a></li>
                    <li><a href=''>Trocar Imagem de fundo</a></li>
              </ul>
            </div>
          </nav>

      </div>";
}
else{
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                <li><a href='OnePage.php?link=Home'>Home</a></li>
                <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                <li><a href='OnePage.php?link=Curriculo'>Curriculo</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
               <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Padrao/PerfilPadrao.png' class='circle responsive-img valign' width='40px' style='margin-top:10px'><span class='badge red circle white-text'>2</span></a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
                <li><span style='margin-right:5%'>&nbsp &nbsp</span></li>
              </ul>
              <ul class='side-nav' id='menuLateral'>
               <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='images/Padrao/PerfilPadrao.png'></a>
                  <a href='#!name'><span class='white-text name'>Aqui vai o Nome</span></a>
                  <a href='#!email'><span class='white-text email'>email@email.com</span></a>
                </div></li>

                <li><a href='OnePage.php?link=Home'>Home</a></li>
                <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                <li><a href='OnePage.php?link=Curriculo'>Curriculo</a></li>
                <li><a href='OnePage.php?link=Perfil'>Perfil</a></li>
                <li><a href='./Controller/Sair.php'>Sair</a></li>
              </ul>
              <ul class='side-nav' id='Configuracoes'>
                  <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='images/Padrao/PerfilPadrao.png'></a>
                  <a href='#!name'><span class='white-text name'>John Doe</span></a>
                  <a href='#!email'><span class='white-text email'>jdandturk@gmail.com</span></a>
                    </div></li>
                    <li><a href=''>Notificações <span class='badge red circle white-text'>2</span></a></li>
                    <li><a href=''>Alterar configurações de Login</a></li>
                    <li><a href=''>Trocar Imagem de fundo</a></li>
              </ul>
            </div>
          </nav>

      </div>";
}



?>
