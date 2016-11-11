$(document).ready(function() {

  $("#pesquisar").submit(function(e){
      var dados = new FormData(this);
      e.preventDefault();
       $.ajax({
           cache: false,
           processData:false,
          contentType: false,
          mimeType:"multipart/form-data",
          data: dados,
          type: 'POST',
          url: 'Controller/Pesquisa.php',
          success: function(data)
          {
            $("#CandidatosSemPesquisa").hide(1000);
            $("#CandidatosComPesquisa").html(data);

          }
      });
    });

    $(this).keyup(function(event) {
      /* Act on the event */
      // var dados = new FormData(this);
      if(event.which == 13){
        $.ajax({
            cache: false,
            processData:false,
           contentType: false,
           mimeType:"multipart/form-data",
           data: dados,
           type: 'POST',
           url: 'Controller/Pesquisa.php',
           success: function(data)
           {
             $("#CandidatosSemPesquisa").hide(1000);
             $("#CandidatosComPesquisa").html(data);

           }
       });
      }
    });

});
