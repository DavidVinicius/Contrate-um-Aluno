
<?php
 $nivel = $_SESSION['nivel'];
 $idUsuario = $_SESSION['id'];
 $email = $_SESSION['usuario'];
if($nivel == 1){
    include_once "Model/ModelAluno.class.php";
    include_once "Model/ModelMensagens.class.php";
    include_once "Model/ModelEntrevistas.class.php";

    $aluno = new ModelAluno();
    $Mensagem = new Mensagens();
    $Entrevista = new ModelEntrevistas();

    $fetch = mysqli_fetch_assoc($aluno->ReadAluno("where codUsuario = $idUsuario"));
    $idAluno = $fetch['idAluno'];

    // $NumEntrevistas = mysqli_num_rows($Entrevista -> ReadEntrevista("where codAluno = $idAluno and ativo='S' "))
    // ?
    // mysqli_num_rows($Entrevista -> ReadEntrevista("where codAluno = $idAluno and ativo='S' "))
    // :'';

    $numMensagens = mysqli_num_rows($Mensagem->ReadMensagens("where codUsuario = $idUsuario"));

    if($numMensagens != 0){
     $totalnotificacoes =  $numMensagens;
     $notificacoes =  "<span class='chip red white-text'> $totalnotificacoes </span>";
    }
    else{
      $notificacoes = "";
    }
    if ($fetch) {
      $fotoAluno = $fetch['foto'];
      $nomeAluno = $fetch['nome'];
      $disabled  = "<li><a href='OnePage.php?link=HomeAluno'>Home</a></li>
                    <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                    <li><a href='OnePage.php?link=VerCurriculo'>Curriculo</a></li>
                    <li><a href='OnePage.php?link=Perfil'>Config</a></li>
                   <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Upload/".$fotoAluno."' class='circle' style='margin-top:5px' width='50px' height='50px' >$notificacoes</a></li>
                    <li><a href='./Controller/Sair.php'>Sair</a></li>
                    <li><span style='margin-right:5%'>&nbsp &nbsp</span></li>";

      $disabledMobile ="<li><a href='OnePage.php?link=HomeAluno'>Home</a></li>
                        <li><a href='OnePage.php?link=Vagas'>Vagas</a></li>
                        <li><a href='OnePage.php?link=VerCurriculo'>Curriculo</a></li>
                        <li><a href='OnePage.php?link=Perfil'>Config</a></li>
                        <li><a href='./Controller/Sair.php'>Sair</a></li>" ;
    }
    else{
      $fotoAluno = "PerfilPadrao.png";
      $nomeAluno = "Não informado";
      $disabled        = "<li><a href='OnePage.php?link=VerCurriculo'>Crie seu currículo para utilizar o site</a></li>
                          <li><a href='OnePage.php?link=VerCurriculo'>Curriculo</a></li>
                          <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Upload/".$fotoAluno."' class='circle' width='60px' height='60px' >$notificacoes</a></li>
                          <li><a href='./Controller/Sair.php'>Sair</a></li>
                          <li><span style='margin-right:5%'>&nbsp &nbsp</span></li>";
      $disabledMobile = " <li><a href='OnePage.php?link=VerCurriculo'>Crie seu currículo para utilizar o site</a></li>
                          <li><a href='OnePage.php?link=VerCurriculo'>Curriculo</a></li>
                          <li><a href='./Controller/Sair.php'>Sair</a></li>";
    }
    // var_dump($fotoAluno);
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                $disabled
              </ul>
              <ul class='side-nav' id='menuLateral'>
               <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='images/Upload/".$fotoAluno."'></a>
                  <a href='#!name'><span class='white-text name'>". $nomeAluno ."</span></a>
                  <a href='#!email'><span class='white-text email'>".$email ."</span></a>
                </div></li>
                $disabledMobile

              </ul>
              <ul class='side-nav' id='Configuracoes'>
                  <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='Images/Upload/".$fotoAluno."'></a>
                  <a href='#!name'><span class='white-text name'>".$nomeAluno ."</span></a>
                  <a href='#!email'><span class='white-text email'>$email</span></a>
                    </div></li>
                    <!--<li><a href=''>Notificações $notificacoes</a></li>
                    <li><a href=''>Alterar configurações de Login</a></li>
                    <li><a href=''>Trocar Imagem de fundo</a></li>!-->
              </ul>
            </div>
          </nav>

      </div>
    ";
}
else if ($nivel == 2){
  include_once "Model/ModelEmpresa.class.php";
  include_once "Model/ModelMensagens.class.php";

  $Mensagem = new Mensagens();
  $numMensagens = mysqli_num_rows($Mensagem->ReadMensagens("where codUsuario = $idUsuario"));
  if($numMensagens != 0){
   $notificacoes =  "<span class='chip red white-text'> $numMensagens </span>";

  }
  else{
    $notificacoes = "";
    $numMensagens = "";
  }
  $empresa       = new ModelEmpresa();
  $fetch         = mysqli_fetch_assoc($empresa->ReadEmpresa("where codUsuario = $idUsuario"));
  $email         = $_SESSION['usuario'];
  if ($fetch) {
    $fotoEmpresa      = $fetch['foto'];
    $nomeEmpresa      = $fetch['nome'];
    $disabled         = "<li><a href='OnePage.php?link=HomeEmpresa'>Home</a></li>
                          <li><a href='OnePage.php?link=Candidatos'>Candidatos</a></li>
                          <li><a href='OnePage.php?link=VerEmpresa'>Suas Informações</a></li>
                          <li><a href='OnePage.php?link=CriarVaga'>Criar Vaga</a></li>
                          <li><a href='OnePage.php?link=Perfil'>Config</a></li>";
    $disabledMobile   =  "<li><a href='OnePage.php?link=HomeEmpresa'>Home</a></li>
                          <li><a href='OnePage.php?link=Candidatos'>Candidatos</a></li>
                          <li><a href='OnePage.php?link=Empresa'>Suas Informações</a></li>
                          <li><a href='OnePage.php?link=CriarVaga'>Criar Vaga</a></li>
                          <li><a href='OnePage.php?link=Perfil'>Config</a></li>";
  }
  else{
    $fotoEmpresa     = "PerfilPadrao.png";
    $nomeEmpresa     = "Não informado";
    $disabled        = "<li><a href='OnePage.php?link=VerEmpresa'>Crie seu perfil para utilizar o site</a></li>
                        <li><a href='OnePage.php?link=VerEmpresa'>Suas Informações</a></li>";
    $disabledMobile  =  "<li><a href='OnePage.php?link=VerEmpresa'>Crie seu perfil para utilizar o site</a></li>
                        <li><a href='OnePage.php?link=VerEmpresa'>Suas Informações</a></li>";

  }
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                $disabled
               <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Upload/".$fotoEmpresa."' class='circle responsive-img valign' width='60px' style='margin-top:10px'>$notificacoes</a></li>
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
                $disabledMobile
                <li><a href='./Controller/Sair.php'>Sair</a></li>
              </ul>
              <ul class='side-nav' id='Configuracoes'>
                  <li><div class='userView'>
                  <img class='background responsive-img' src='Images/Office.jpg'>
                  <a href='#!user'><img class='circle' src='Images/Upload/".$fotoEmpresa."'></a>
                  <a href='#!name'><span class='white-text name'>".$nomeEmpresa."</span></a>
                  <a href='#!email'><span class='white-text email'>". $email ."</span></a>
                    </div></li>
                    <!--<li><a href=''>Notificações $notificacoes</a></li>
                    <li><a href=''>Alterar configurações de Login</a></li>
                    <li><a href=''>Trocar Imagem de fundo</a></li>--!>
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
      </div>
      ";
}
else{
    echo "<div class='navbar-fixed'>


           <nav>

            <div class='nav-wrapper menuCor'>
              <a href='#!' class='brand-logo'><span style='margin-left:5%'></span>Contrate um Aluno</a>
              <a href='#' data-activates='menuLateral' class='button-collapse'><i class='material-icons'>	menu</i></a>
              <ul class='right hide-on-med-and-down'>
                <li><a href='OnePage.php?link=Home'>Home</a></li>
                <li><a href='OnePage.php?link=Alunos'>Alunos</a></li>
                <li><a href='OnePage.php?link=AlunosInativos'>Alunos inativos</a></li>
                <li><a href='OnePage.php?link=Empresas'>Empresas</a></li>
                <li><a href='OnePage.php?link=EmpresaInativas'>Empresas inativas</a></li>
                <li><a href='OnePage.php?link=Usuarios'>Usuarios</a></li>
                <li><a href='OnePage.php?link=UsuariosInativos'>Usuarios inativos</a></li>
               <li><a href='' data-activates='Configuracoes' class='abrir'><img src='Images/Padrao/PerfilPadrao.png' class='circle responsive-img valign' width='40px' style='margin-top:10px'></a></li>
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
