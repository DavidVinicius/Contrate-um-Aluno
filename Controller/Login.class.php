<?php
    include_once("../Model/DataBase.class.php");
    include_once("ManipulaVarSession.class.php");
    //include_once("CreateVarSessions.class.php");

    class Login
    {
        function __construct($User, $Pass)
        {
            $BD = new DataBase();
            $Result = $BD -> SearchQuery("usuario", "WHERE email = '{$User}' AND senha = '{$Pass}'");
            $Data   = mysqli_fetch_assoc($Result);
            if(mysqli_num_rows($Result) > 0){
                $_SESSION["usuario"] = $User;
                $_SESSION["senha"] = $Pass;
                $_SESSION["id"] = $Data["idUsuario"];
                $_SESSION["nivel"] = $Data["nivel"];

                /*$Sessions = new CreateVarSessions($_SESSION["usuario"],$_SESSION["senha"],
                    $_SESSION["id"],$_SESSION["nivel"]);*/
                $Sessions = new ManipulaVarSession();
                $Sessions->CreateVarSession($_SESSION["usuario"],$_SESSION["senha"],
                    $_SESSION["id"],$_SESSION["nivel"]);

                $id = $Sessions->getSessionID();
                echo "<script>
                        window.location.href='../OnePage.php';
                        alert('Logado com sucesso!');</script>";
            } else{
                unset($_SESSION["usuario"]);
                unset($_SESSION["senha"]);
                unset($_SESSION["id"]);
                unset($_SESSION["nivel"]);
                echo "<script>
                    window.location.href = '../Index.php'
                    alert('Erro ao logar');</script>";
            }
        }

        /**
         * @return mixed
         */
        public function getSessionUser()
        {
            return $this->SessionUser;
        }

        /**
         * @param mixed $SessionUser
         */
        public function setSessionUser($SessionUser)
        {
            $this->SessionUser = $SessionUser;
        }

        /**
         * @return mixed
         */
        public function getSessionPass()
        {
            return $this->SessionPass;
        }

        /**
         * @param mixed $SessionPass
         */
        public function setSessionPass($SessionPass)
        {
            $this->SessionPass = $SessionPass;
        }

        /**
         * @return mixed
         */
        public function getSessionId()
        {
            return $this->SessionId;
        }

        /**
         * @param mixed $SessionId
         */
        public function setSessionId($SessionId)
        {
            $this->SessionId = $SessionId;
        }

        /**
         * @return mixed
         */
        public function getSessionNivel()
        {
            return $this->SessionNivel;
        }

        /**
         * @param mixed $SessionNivel
         */
        public function setSessionNivel($SessionNivel)
        {
            $this->SessionNivel = $SessionNivel;
        }



    }

?>