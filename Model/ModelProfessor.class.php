<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:32
 */
    class ModelProfessor
    {
        private $idProfessor;
        private $nome;
        private $email;
        private $formacao;
        private $codUsuario;

        /**
         * @return mixed
         */
        public function getIdProfessor()
        {
            return $this->idProfessor;
        }

        /**
         * @param mixed $idProfessor
         */
        public function setIdProfessor($idProfessor)
        {
            $this->idProfessor = $idProfessor;
        }

        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
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
        public function getFormacao()
        {
            return $this->formacao;
        }

        /**
         * @param mixed $formacao
         */
        public function setFormacao($formacao)
        {
            $this->formacao = $formacao;
        }

        /**
         * @return mixed
         */
        public function getCodUsuario()
        {
            return $this->codUsuario;
        }

        /**
         * @param mixed $codUsuario
         */
        public function setCodUsuario($codUsuario)
        {
            $this->codUsuario = $codUsuario;
        }


    }

?>