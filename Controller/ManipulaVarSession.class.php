<?php

<<<<<<< HEAD
class ManipulaVarSession
{
    private $SessionUser;
    private $SessionPass;
    private $SessionID;
    private $SessionNivel;

    public function CriaVarSession($SessionUser, $SessionPass, $SessionId, $SessionNivel)
    {
        $this->setSessionUser($SessionUser);
        $this->setSessionPass($SessionPass);
        $this->setSessionID($SessionId);
        $this->setSessionNivel($SessionNivel);
    }

    public function DeletaVarSession()
    {
        $this->setSessionUser(null);
        $this->setSessionPass(null);
        $this->setSessionNivel(null);
        $this->setSessionID(null);
    }

    public function VerificaEstaLogado()
    {
        if( (!$this->getSessionUser() == null) && (!$this->getSessionPass() == null) && (!$this->getSessionNivel() == null) )
        {
            echo "<script>alert('Logado')</script>";
        }else
        {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            unset($_SESSION['id']);
            header('location:Index.php');
        }
    }

    public function getSessionUser()
    {
        return $this->SessionUser;
    }

    public function setSessionUser($SessionUser)
    {
        $this->SessionUser = $SessionUser;
    }

    public function getSessionPass()
    {
        return $this->SessionPass;
    }

    public function setSessionPass($SessionPass)
    {
        $this->SessionPass = $SessionPass;
    }

    public function getSessionID()
    {
        return $this->SessionID;
    }

    public function setSessionID($SessionID)
    {
        $this->SessionID = $SessionID;
    }
    public function getSessionNivel()
    {
        return $this->SessionNivel;
    }

    public function setSessionNivel($SessionNivel)
    {
        $this->SessionNivel = $SessionNivel;
    }


}
=======
/**
 * Created by PhpStorm.
 * User: Matheus Picioli
 * Date: 27/09/2016
 * Time: 22:10
 */
    class ManipulaVarSession
    {
        private $SessionUser;
        private $SessionPass;
        private $SessionID;
        private $SessionLevel;

        public function CreateVarSession($SessionUser, $SessionPass, $SessionId, $SessionLevel)
        {
            $this->setSessionUser($SessionUser);
            $this->setSessionPass($SessionPass);
            $this->setSessionID($SessionId);
            $this->setSessionLevel($SessionLevel);
        }

        public function DeleteVarSession()
        {
            $this->setSessionUser(null);
            $this->setSessionPass(null);
            $this->setSessionID(null);
            $this->setSessionLevel(null);
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
        public function getSessionID()
        {
            return $this->SessionID;
        }

        /**
         * @param mixed $SessionID
         */
        public function setSessionID($SessionID)
        {
            $this->SessionID = $SessionID;
        }

        /**
         * @return mixed
         */
        public function getSessionLevel()
        {
            return $this->SessionLevel;
        }

        /**
         * @param mixed $SessionLevel
         */
        public function setSessionLevel($SessionLevel)
        {
            $this->SessionLevel = $SessionLevel;
        }


    }
?>
>>>>>>> af7b9cd700d53f79c6c4b6f1ef46530e2488524d
