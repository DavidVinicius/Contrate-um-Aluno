$(document).ready(function() {
    var filtro =  $("[name=filtroSemPesquisa]").val()    || "nada";
    var pesquisa = $("[name=pesquisaSemPesquisa]").val() || "nada" ;
    if (filtro != "nada"  && pesquisa != "nada") {
      $.ajax({
        url: 'Controller/PesquisaVagas.php',
        type: 'POST',
        data: {filtro: filtro, pesquisa:pesquisa}
      })
      .done(function(data) {
        console.log("success");
        console.log(filtro);
        $("#VagaSemPesquisa").hide(1000);
        $("#VagasComPesquisa").html(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }else{
      console.log("Nada foi buscado");
    }

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
          url: 'Controller/PesquisaVagas.php',
          success: function(data)
          {
            // alert(data);
            $("#VagaSemPesquisa").hide(1000);
            $("#VagasComPesquisa").html(data);

          }
      });
    });

});
