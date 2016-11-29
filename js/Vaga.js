
    $(document).ready(function(){
      $('.parallax').parallax();
      var barra = `<div class="progress"><div class="indeterminate"></div></div>`;
      $("#candidatar").submit(function(e){
        var botaoCandidatarse = $(this);
        var dados = new FormData(this);
        e.preventDefault();
        // alert("teste");
         $.ajax({
            cache: false,
            processData:false,
            contentType: false,
            mimeType:"multipart/form-data",
            data: dados,
            type: 'POST',
            url: 'Controller/Candidatarse.php',
            beforeSend:function(){
                $('#esperar').html(barra);
            },
            success: function(data)
            {
              // alert(data);
              console.log(data);
              setTimeout(function () {
                Materialize.toast("Você se candidatou com sucesso!",4000);
                $("#candidatar").remove();
                $('#esperar').html('');

              }, 1000);
            }
        });
      });
    });
