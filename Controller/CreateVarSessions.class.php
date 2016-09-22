<?php

class CreateVarSessions
{
    private $SessionUser;
    private $SessionPass;
    private $SessionID;
    private $SessionNivel;
 
    function __construct($SessionUser, $SessionPass, $SessionId, $SessionNivel)
    {
        $this->setSessionUser($SessionUser);
        $this->setSessionPass($SessionPass);
        $this->setSessionID($SessionId);
        $this->setSessionNivel($SessionNivel);
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