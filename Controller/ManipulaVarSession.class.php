<?php

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