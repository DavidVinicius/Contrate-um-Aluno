<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:26
 */
    class ModelUsuario
    {
        private $idUsuario;
        private $email;
        private $nivel;
        private $senha;

        /**
         * @return mixed
         */
        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        /**
         * @param mixed $idUsuario
         */
        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getNivel()
        {
            return $this->nivel;
        }

        /**
         * @param mixed $nivel
         */
        public function setNivel($nivel)
        {
            $this->nivel = $nivel;
        }

        /**
         * @return mixed
         */
        public function getSenha()
        {
            return $this->senha;
        }

        /**
         * @param mixed $senha
         */
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }


    }

?>