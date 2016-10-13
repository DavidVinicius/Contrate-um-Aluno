<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/materialize.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
           <h2 class="center-align">Digite seu e-mail e enviaremos sua senha!</h2>
            <div class="col s12 m12">
                <form action="">
                    <div class="input-field">
                        <label for="email" class="center-align">Digite seu email</label>
                        <input type="text" name="email" id="email" style="font-size:30px; text-align:center;" class="flow-text">
                        <input type="submit" value="Enviar senha" class="btn yellow" id="enviar">
                
                    </div>   
                 </form>
            </div>
        </div>
    </div>
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $("form").submit(function(e){
                e.preventDefault();            
                $.ajax({
                    url: "../../Controller/ConsultaDados.php",
                    method: "POST",
                    data: {dado: $("#email").val()},
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
    </script>
</body>
</html>