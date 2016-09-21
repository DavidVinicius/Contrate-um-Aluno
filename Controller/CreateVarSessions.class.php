<?php
 
class CreateVarSessions
{
    private $SessionUser;
    private $SessionPass;
    private $SessionID;
 
    function __construct()
    {
        $this->setSessionUser($_SESSION["usuario"]);
        $this->setSessionPass($_SESSION["senha"]);
        $this->setSessionID($_SESSION["id"]);
        $this->setSessionNivel($_SESSION["nivel"]);
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