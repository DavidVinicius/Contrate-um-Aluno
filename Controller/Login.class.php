<?php
    include_once("../Model/DataBase.class.php");
    include_once("ManipulaVarSession.class.php");

    class Login
    {
        function __construct($User, $Pass)
        {
            $BD = new DataBase();
            $Sessions = new ManipulaVarSession();

            $Result     = $BD -> SearchQuery("usuario", "WHERE email = '{$User}' AND senha = '{$Pass}'");
            $Data       = mysqli_fetch_assoc($Result);
            $idUsuario  = $Data["idUsuario"];
            if(mysqli_num_rows($Result) > 0){
                $_SESSION["usuario"] = $User;
                $_SESSION["senha"] = $Pass;
                $_SESSION["id"] = $Data["idUsuario"];
                $_SESSION["nivel"] = $Data["nivel"];

                $Sessions->CreateVarSession($_SESSION["usuario"],$_SESSION["senha"],
                    $_SESSION["id"],$_SESSION["nivel"]);
                  if ($Data["nivel"] == 1) {
                      if (mysqli_num_rows($BD -> SearchQuery('aluno',"where codUsuario = $idUsuario")) == 1 ) {
                        echo "<script>
                                window.location.href='../OnePage.php';
                                alert('Logado com sucesso!');
                              </script>";
                      }
                      else{
                        echo "<script>
                                window.location.href='../OnePage.php?link=VerCurriculo';
                                alert('Logado com sucesso!');
                              </script>";
                      }
                  }
                  else if($Data["nivel"] == 2){
                        if (mysqli_num_rows($BD -> SearchQuery('empresa',"where codUsuario = $idUsuario")) == 1 ) {
                          echo "<script>
                                  window.location.href='../OnePage.php';
                                  alert('Logado com sucesso!');
                                </script>";
                        }
                        else{
                          echo "<script>
                                  window.location.href='../OnePage.php?link=VerEmpresa';
                                  alert('Logado com sucesso!');
                                </script>";
                        }
                  }
                  else if($Data["nivel"] == 3){
                        if (mysqli_num_rows($BD -> SearchQuery('professor',"where codUsuario = $idUsuario")) == 1 ) {
                          echo "<script>
                                  window.location.href='../OnePage.php';
                                  alert('Logado com sucesso!');
                                </script>";
                        }
                        else{
                          echo "<script>
                                  window.location.href='../OnePage.php?link=VerEmpresa';
                                  alert('Logado com sucesso!');
                                </script>";
                        }
                  }
                  else {
                        echo "<script>
                                window.location.href='../OnePage.php';
                                alert('Logado com sucesso!');
                              </script>";
                    }

            } else{
                $Sessions->DeleteVarSession();
                echo "<script>
                    window.location.href = '../Index.php';
                    alert('Erro ao logar');</script>";
            }
        }

    }

?>
