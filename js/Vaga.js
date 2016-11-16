
    $(document).ready(function(){
      $('.parallax').parallax();

      $("#candidatar").submit(function(e){
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
            success: function(data)
            {
              alert(data);

            }
        });
      });
    });
