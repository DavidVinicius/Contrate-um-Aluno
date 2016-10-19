<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:29
 */
    class ModelEmpresa extends HelperDataBase
    {
        private $idEmpresa;
        private $nome;
        private $cnpj;
        private $email;
        private $telefone;
        private $endereco;
        private $codUsuario;

        public function CreateEmpresa($Data)
        {
            return parent::Create("empresa",$Data);
        }

        public function ReadEmpresa($Condition)
        {
            return parent::Read("empresa",$Condition);
        }

        public function UpdateEmpresa($Field, $NewValue, $Id)
        {
            return parent::Update("empresa", $Field, $NewValue, $Id);
        }

        public function DeleteEmpresa($Condition)
        {
            return parent::Delete("empresa", $Condition);
        }

        /**
         * @return mixed
         */
        public function getIdEmpresa()
        {
            return $this->idEmpresa;
        }

        /**
         * @param mixed $idEmpresa
         */
        public function setIdEmpresa($idEmpresa)
        {
            $this->idEmpresa = $idEmpresa;
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
        public function getCnpj()
        {
            return $this->cnpj;
        }

        /**
         * @param mixed $cnpj
         */
        public function setCnpj($cnpj)
        {
            $this->cnpj = $cnpj;
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
        public function getTelefone()
        {
            return $this->telefone;
        }

        /**
         * @param mixed $telefone
         */
        public function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }

        /**
         * @return mixed
         */
        public function getEndereco()
        {
            return $this->endereco;
        }

        /**
         * @param mixed $endereco
         */
        public function setEndereco($endereco)
        {
            $this->endereco = $endereco;
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