<?php

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
        $this->setSessionLevel(null);
        $this->setSessionID(null);
    }

    public function VerificaEstaLogado()
    {
        if( (!$this->getSessionUser() == null) && (!$this->getSessionPass() == null) && (!$this->getSessionLevel() == null) )
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
    public function getSessionLevel()
    {
        return $this->SessionLevel;
    }

    public function setSessionLevel($SessionLevel)
    {
        $this->SessionLevel = $SessionLevel;
    }


}
?>