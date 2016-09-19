<?php
 
class CreateVarSessions
{
    private $SessionUsuario;
    private $SessionSenha;
    private $SessionID;

    function __construct()
    {
        $this->setSessionUsuario($_SESSION["usuario"]);
        $this->setSessionSenha($_SESSION["senha"]);
        $this->setSessionID($_SESSION["id"]);
        $this->setSessionNivel($_SESSION["nivel"]);
    }

    public function getSessionUsuario()
    {
        return $this->SessionUsuario;
    }

    public function setSessionUsuario($SessionUsuario)
    {
        $this->SessionUsuario = $SessionUsuario;
    }

    public function getSessionSenha()
    {
        return $this->SessionSenha;
    }

    public function setSessionSenha($SessionSenha)
    {
        $this->SessionSenha = $SessionSenha;
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