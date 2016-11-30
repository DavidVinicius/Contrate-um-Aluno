<?php
  session_start();

  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelEmpresa.class.php";
  require_once "../Model/ModelExperiencias.class.php";
  require_once "../Model/ModelFormacoes.class.php";
  require_once "../Model/ModelEnderecos.class.php";
  require_once "../Model/ModelTelefones.class.php";
  require_once "../Model/ModelQualificacoes.class.php";

  $Aluno             = new ModelAluno();
  $Empresa           = new ModelEmpresa();
  $Experiencia       = new Experiencias();
  $Formacoes         = new Formacoes();
  $Enderecos         = new Enderecos();
  $Telefones         = new Telefones();
  $Qualificacoes     = new ModelQualificacoes();

  $codUsuario        = $_SESSION['id'];
  $ComFoto           = isset($_POST['ComFoto'])?$_POST['ComFoto']:null;
  $gerarPDF          = isset($_POST['gerarPDF'])?$_POST['gerarPDF']:null;
  $comCompetencias   = isset($_POST['comCompetencias'])?$_POST['comCompetencias']:null;
  $enviarNoMeuEmail  = isset($_POST['enviarNoMeuEmail'])?"true":"false";
  $enviar            = isset($_POST['enviarE'])?$_POST["enviarE"]:null;

  $ResultAluno       = mysqli_fetch_object($Aluno -> ReadAluno("where codUsuario = $codUsuario"));
  $idAluno           = $ResultAluno -> idAluno;

  $ConsultaTelefones   = $Telefones -> ReadTelefones("where codUsuario = $codUsuario");
  $ResultEnderecos     = mysqli_fetch_object($Enderecos -> ReadEnderecos("where codUsuario = $codUsuario"));
  $ConsultaExperiencia = $Experiencia -> ReadExperiencias("where codAluno = $idAluno");
  $ConsultaFormacoes   = $Formacoes -> ReadFormacoes("where codAluno = $idAluno");
  $ConsultaQualificacoes = $Qualificacoes -> ReadQualificacoes("where codAluno = $idAluno");


  if ($enviar == "true") {
      if ($enviarNoMeuEmail == "false"){
          $enviarEmail = isset($_POST['enviarEmail'])?$_POST['enviarEmail']:null;
      }else{
         $enviarEmail  =  $_SESSION['usuario'];
      }
  }else{
    $enviarEmail = false;
  }




 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../css/materialize.min.css">
   <link rel="stylesheet" href="../css/imprimir.css">
   <title>Document</title>
 </head>
   <body>
     <div class="container" id="pdf">
       <div class="row">
         <h5 class="center-align flow-text">CURRÍCULO VITAE</h5>
         <br>
         <div class="col s8 m6 l6">
            <b>Nome:</b> <?= $ResultAluno -> nome ?><br>
            <b>RG:</b>  <?= $ResultAluno -> rg ?><br>
            <b>CPF:</b> <?= $ResultAluno -> cpf?><br>
            <b>Data de Nascimento:</b> <?=  date('d/m/Y', strtotime($ResultAluno -> dataNascimento));?><br>
            <b>Endereço</b>: <?= $ResultEnderecos -> rua. ", ". $ResultEnderecos -> numero . ", " . $ResultEnderecos -> bairro. ", <br />". $ResultEnderecos -> cidade. " - ". $ResultEnderecos -> estado ?><br>
            <b>Telefones: </b><?php
                while ($ResultTelefone = mysqli_fetch_object($ConsultaTelefones)) {
                  echo  $ResultTelefone -> telefone." ";
                }
             ?>

         </div>
         <div class="col s4 pull-s2 m4 push-m3 l4 push-l3">
           <?php
                if ($ComFoto == "true") {
                    ?>
                    <img src="../Images/Upload/<?= $ResultAluno -> foto ?>" alt="" class="circle img" width="150px" height="150px">
                    <?php
                }
            ?>
         </div>
       </div>
       <div class="row">
            <h5 class="center-align flow-text">FORMAÇÕES</h5>
            <br>
            <div class="col s12 m12 l12">
              <?php
                  while ($ResultFormacoes = mysqli_fetch_object($ConsultaFormacoes)) {
                    ?>
                    <span class='flow-print'> <b>Ano de conclusão:</b> <?=$ResultFormacoes -> anoConclusao?><br>
                      <b>Curso: </b><?= $ResultFormacoes -> curso?><br>
                      <b>Instituição: </b> <?=$ResultFormacoes -> instituicao ?> </span><br><br>
                    <?php
                  }
               ?>
            </div>
            <br>
       </div>
       <?php
            if ($comCompetencias == "true") {
              ?>
              <div class="row">
                <h5 class="center-align flow-text">HABILIDADES</h5>
                <br>
                <div class="col s12 m12 l12">
                  <?php
                      while ($ResultQualificacoes = mysqli_fetch_object($ConsultaQualificacoes)) {
                        echo $ResultQualificacoes -> competencia.", ";
                      }
                   ?>
                </div>
              </div>

              <?php
            }
        ?>
        <div class="row">
          <h5 class="center-align flow-text">EXPERIÊNCIAS</h5>
          <br>
          <div class="col s12 m12 l12">
            <?php
                while ($ResultExperiencias = mysqli_fetch_object($ConsultaExperiencia)) {
                  ?>
                  <b>Data de Início:</b> <?= date('d/m/Y', strtotime($ResultExperiencias -> dataInicio))  ?> <br>
                 <b> Data de Saída:</b> <?=  date('d/m/Y', strtotime($ResultExperiencias -> dataSaida)) ?><br>
                  <b>Empresa:</b> <?= $ResultExperiencias -> empresa ?><br>
                    <b>Cargo:</b> <?= $ResultExperiencias -> cargo ?><br>
                    <b>Descrição: </b>
                    <?= $ResultExperiencias -> descricao?>
                  <?php
                }
             ?>
          </div>
          <br>
        </div>
        <div class="row">
          <h5 class="center-align flow-text">INFORMAÇÕES ADICIONAIS</h5>
          <br>
          <div class="col s12 m12 l12">
            <?= $ResultAluno -> informacoesAdicionais ?>
          </div>
          <br>
        </div>
        <div class="row rodape">
          <p class="center-align">Currículo gerado por <b>Contrate um Aluno</b></p>
        </div>
     </div>
     <div class="row">
       <div class="col s12 m6 l6 push-m4 push-l4">
         <button class="btn btn-large blue esconde" id="imprimir">Imprimir</button>
         <button class="btn btn-large green esconde" id="gerarPDF">Baixar PDF</button>
         <a href="../OnePage.php?link=VerCurriculo" class="btn btn-large yellow esconde">Voltar</a>
       </div>
     </div>
     <script type="text/javascript" src="../js/jspdf.min.js"></script>
     <script type="text/javascript" src="../js/html2canvas.js"></script>
     <script type="text/javascript">
       var imprimir = document.getElementById("imprimir");
       var body     = document.getElementsByTagName('body')[0].innerHTML;
       var pdf      = document.getElementById('pdf');
       var botaopdf = document.getElementById('gerarPDF');

       botaopdf.addEventListener('click',function(){
          html2canvas(document.getElementById('pdf'), {
            onrendered: function (canvas) {
              var img = canvas.toDataURL("image/png");

              var doc = new jsPDF();
              doc.addImage(img,'JPEG',10, 20, 180, 200);
              doc.save('curriculo.pdf');
            }
          })
       });
       imprimir.addEventListener('click',function(){
         window.print();
       });
     </script>
   </body>
 </html>
