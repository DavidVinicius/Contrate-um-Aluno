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
        if( ( $this->getSessionUser() == null ) and ( $this->getSessionPass() == null ) and ( $this->getSessionID() == null ) and ( $this->getSessionLevel() == null ) )
        {
            $this->DeleteVarSession();
            return false;
        }else
            return true;
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