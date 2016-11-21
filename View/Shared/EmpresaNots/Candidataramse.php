
<?php
  session_start();

  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelCandidatouse.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";
  require_once "../../../Model/ModelBeneficiosVaga.class.php";

  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Candidatou      = new Candidatouse();
  $Empresa         = new ModelEmpresa();
  $BeneficiosV     = new ModelBeneficiosVaga();
  $idUsuario       = $_SESSION['id'];

  $ResultEmpresa      = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa          = $ResultEmpresa -> idEmpresa;
  $totalVaga          = mysqli_num_rows($Vaga -> ReadVaga("where codEmpresa = $idEmpresa"));


 ?>
 <?php if ($totalVaga > 0) {
   $TotalCandidatouramse = mysqli_num_rows($Candidatou -> ReadCandidatouse("where codEmpresa = $idEmpresa AND ativo = 'S'"));
   if ($TotalCandidatouramse > 0) {
     $ConsultaCandidataramse = $Candidatou -> ReadCandidatouse("where codEmpresa = $idEmpresa AND ativo = 'S' ");
     $i = 0;
     $j = "linha";
     $cancelar = "cancelar";
     ?>
      <ul class="collection">

     <?php
     while ($ResultCandidataramse = mysqli_fetch_object($ConsultaCandidataramse)) {
        $codVaga        = $ResultCandidataramse -> codVaga;
        $codAluno       = $ResultCandidataramse -> codAluno;
        $idCandidatouse = $ResultCandidataramse -> idCandidatouse;
        $ResultVaga     = mysqli_fetch_object($Vaga -> ReadVaga("where idVaga = $codVaga"));
        $ResultAluno    = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $codAluno"));
        $i++;
        $idLinha = $j.$i;
       ?>
       <li class="avatar hoverable collection-item " id="<?= $idLinha ?>">
         <div class="col s4 m1">
           <img src="Images/Upload/<?= $ResultCandidataramse -> foto?>" alt="" class="circle" />
           <div class="secondary-content">
             <button data-target="<?= $ResultCandidataramse -> tokenModal ?>" class="modal-trigger btn-flat btn-large waves-effect waves-light">
               <i class="material-icons blue-text">add</i>
             </button>
             <button data-target="<?= $ResultCandidataramse -> tokenRecusarEntrevista ?>" class="modal-trigger btn-flat btn-large waves-effect waves-light recusar">
                <i class="material-icons red-text">close</i>
             </button>
           </div>
         </div>
         <div class="col s8 m8 pull-m1">
           <span class="title"><b>Candidato:</b> <?= $ResultCandidataramse -> nome ?> </span>
           <br><b>Vaga:</b>
           <span class="flow-text">
            <?= $ResultVaga -> titulo ?><br></span>

         </div>
       </li><br>
       <div id="<?= $ResultCandidataramse -> tokenModal ?>" class="modal modal-fixed-footer">
         <div class="modal-content">
           <h1 class="center-align flow-text">Nova candidatura</h1>
                <h4 class="flow-text"><?= $ResultAluno -> nome  ?></h4>
                <a href="OnePage.php?link=MostraCandidato<?= '&id='.$codAluno.'&cod='.$ResultAluno->codUsuario.'&anterior='.$_SERVER['QUERY_STRING'] ?>" > Ver perfil</a>
                <p>
                  <b>Dados sobre a vaga:</b><br>
                  Vaga: <?= $ResultVaga -> titulo ?><br>
                  Salário: <?= $ResultVaga -> salario ?><br>
                  Carga horária semanal: <?= $ResultVaga -> cargaHoraria ?><br>

                </p>

         </div>
         <div class="modal-footer">
              <button data-target="<?= $ResultCandidataramse -> tokenMarcarEntrevista ?>" class="btn-flat modal-trigger waves-effect waves-green modal-close">Marcar Entrevista</button>
              <button data-target="<?= $ResultCandidataramse -> tokenRecusarEntrevista ?>" class="btn-flat waves-effect waves-red modal-trigger modal-close">Negar Candidato</button>
         </div>
       </div>
       <div class="modal modal-fixed-footer" id="<?= $ResultCandidataramse -> tokenMarcarEntrevista ?>">
         <form action="Controller/MarcarEntrevista.php" method="post" id="form<?=$i?>">
           <div class="modal-content">
             <h1 class="center-align flow-text">Preencha e marque a entrevista</h1>
             <div class="col s12 m12 l12">
                 <div class="row">
                   <div class="input-field col s12 m6">
                     <label for="data">Data da Entrevista</label><br>
                     <input type="date" name="data" id="data" required="true">
                   </div>
                   <div class="input-field col s12 m6">
                     <label for="hora">Hora da entrevista</label><br>
                     <input type="time" name="hora" id="hora" required="true">
                   </div>
                 </div>
                 <div class="row">

                   <div class="input-field col s12 m6">
                     <label for="local">Local da entrevista:</label>
                     <input type="text" name="local" id="local" required="true">
                   </div>
                   <div class="input-field col s12 m2">
                     <label for="numero">Número:</label>
                     <input type="text" name="numero" id="numero" required="true">
                   </div>
                   <div class="input-field col s12 m4">
                     <label for="bairro">Bairro:</label>
                     <input type="text" name="bairro" id="bairro" required="true">
                   </div>
                   <div class="input-field col s12 m4">
                     <label for="completemento">Complemento</label>
                     <input type="text" name="complemento" id="complemento">
                   </div>
                   <div class="input-field col s12 m4">
                     <label for="cidade">Cidade:</label>
                     <input type="text" name="cidade" id="cidade" required="true">
                   </div>
                   <div class="input-field col s12 m3" >
                     <!-- <label for="estado">Estado</label> -->
                     <select name="estado" id="estado">
                         <option value="" selected disabled>Estado</option>
                         <option value="AC">AC</option>
                         <option value="AL">AL</option>
                         <option value="AM">AM</option>
                         <option value="AP">AP</option>
                         <option value="BA">BA</option>
                         <option value="CE">CE</option>
                         <option value="DF">DF</option>
                         <option value="ES">ES</option>
                         <option value="GO">GO</option>
                         <option value="MA">MA</option>
                         <option value="MG">MG</option>
                         <option value="MS">MS</option>
                         <option value="MT">MT</option>
                         <option value="PA">PA</option>
                         <option value="PB">PB</option>
                         <option value="PE">PE</option>
                         <option value="PI">PI</option>
                         <option value="PR">PR</option>
                         <option value="RJ">RJ</option>
                         <option value="RN">RN</option>
                         <option value="RO">RO</option>
                         <option value="RR">RR</option>
                         <option value="RS">RS</option>
                         <option value="SC">SC</option>
                         <option value="SE">SE</option>
                         <option value="SP">SP</option>
                         <option value="TO">TO</option>
                     </select>
                   </div>
                 </div>
                 <div class="row">
                   <div class="input-field col s12 m6">
                     <label for="vaga">Vaga</label><br>
                     <input type="text" name="vaga" id="vaga" readonly="true" value="<?= $ResultVaga -> titulo?>">
                   </div>
                   <div class="input-field col s12 m3">
                     <label for="salario">Salário</label><br>
                     <input type="text" name="salario" id="salario" value="<?= $ResultVaga -> salario ?>" readonly="true">
                   </div>
                   <div class="input-field col s12 m3">
                     <label for="cargaHoraria">Carga horária semanal:</label><br>
                     <input type="number" name="cargaHoraria" id="cargaHoraria" value="<?= $ResultVaga -> cargaHoraria ?>" readonly="true">
                   </div>
                   <div class="input-field col s12 m12">
                     Benefícios:
                     <?php
                         $ConsultaBeneficiosVaga = $BeneficiosV -> ReadBeneficiosVaga("where codVaga = $codVaga");
                          while ($ResultBeneficiosV = mysqli_fetch_object($ConsultaBeneficiosVaga)) {
                            ?>
                            <span class="chip"><?= $ResultBeneficiosV -> beneficio?></span>

                            <?php
                          }
                      ?>
                   </div>
                   <div class="input-field col s12 m12">
                     <label for="descricao">Descrição:</label><br>
                     <textarea name="descricao" rows="8" cols="40" class="materialize-textarea" ng-model="descricao" readonly="true"><?= $ResultVaga -> descricao ?></textarea>
                   </div>
                   <div class="input-field col s12 m12">
                     <label for="requisitos">Requisitos:</label>
                     <textarea name="" id="" cols="30" rows="10" class="materialize-textarea" readonly="true">
                      <?= $ResultVaga -> requisitos ?>
                     </textarea>
                   </div>
                  </div>
               <input type="hidden" name="beneficios" id="beneficios" value="{{beneficios}}">
               <input type="hidden" id="idAluno" name="idAluno" value="<?= $codAluno ?>" />
               <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $idUsuario ?>" />

             </div>
           </div>
           <div class="modal-footer">
             <input type="submit" value="Marcar entrevista" class="btn-flat waves-light waves-green marcar " data-form="form<?=$i?>" data-linha="<?= $idLinha ?>" data-idcandidatouse="<?= $idCandidatouse ?>">
             <a href="#!" class="btn-flat red-text modal-close">Cancelar</a>

           </form>
           </div>
         </div>
       </div>
       <div class="modal modal-fixed-footer" id="<?= $ResultCandidataramse -> tokenRecusarEntrevista ?>">
         <form action="Controller/CancelarEntrevistaEmpresa.php" method="post" id="<?= $cancelar.$i ?>">
         <div class="modal-content">
           Enviar Para:
           <div class="chip flow-text">
             <img src="images/Upload/<?= $ResultAluno -> foto?>" alt="Contact Person" width="50px" height="50px">
             <?= $ResultAluno -> nome?>
           </div>
             <div class="input-field col s12 m12">
               <label for="motivo">Motivo:</label>
               <input type="text" name="motivo" id="motivo" required="true" length="40" maxlength="40">
             </div>
             <div class="input-field col s12 m12">
               <label for="mensagem">Mensagem:</label>
               <textarea name="mensagem" class="materialize-textarea" id="mensagem" rows="8" cols="40" required="true" length="255" maxlength="255"></textarea>
             </div>
             <input type="hidden" name="codUsuarioEmpresa" value="<?= $idUsuario ?>">
         </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-flat waves-effect waves-red cancelarCandidato" data-form="<?= $cancelar.$i ?>" data-idaluno="<?= $codAluno ?>" data-idcandidatouse="<?= $idCandidatouse?>">Negar Candidato</button>
         </form>
         <!-- <button class="btn btn-flat modal-close waves-effect waves-yellow">Cancelar</button> -->
         <a href="#!" class="btn btn-flat modal-close waves-effect waves-yellow">Cancelar</a>
         </div>
       </div>

       <?php
     }
     ?>
      </ul>
     <?php
   }else{
     echo "<h1 class='center-align flow-text'>ainda ninguém se candidatou a sua vaga</h1>";
   }




 }else{
   echo "<h1 class='center-align flow-text'>Você não tem vagas cadastradas</h1>";
 } ?>
<script type="text/javascript" src="js/HomeEmpresa.js">

</script>
