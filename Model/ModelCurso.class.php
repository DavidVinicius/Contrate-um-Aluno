<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:33
 */
    class ModelCurso extends HelperDataBase
    {
        private $idCurso;
        private $nome;
        private $escola;
        private $gradeCurricular;
        private $periodo;

        public function CreateCurso($Data)
        {
            return parent::Create("curso", $Data);
        }

        public function ReadCurso($Condition)
        {
            return parent::Read("curso", $Condition);
        }

        public function UpdateCurso($Field, $NewValue, $Id)
        {
            return parent::Update("curso",$Field, $NewValue, $Id);
        }

        public function DeleteCurso($Condition)
        {
            return parent::Delete("curso", $Condition);
        }

        /**
         * @return mixed
         */
        public function getIdCurso()
        {
            return $this->idCurso;
        }

        /**
         * @param mixed $idCurso
         */
        public function setIdCurso($idCurso)
        {
            $this->idCurso = $idCurso;
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
        public function getEscola()
        {
            return $this->escola;
        }

        /**
         * @param mixed $escola
         */
        public function setEscola($escola)
        {
            $this->escola = $escola;
        }

        /**
         * @return mixed
         */
        public function getGradeCurricular()
        {
            return $this->gradeCurricular;
        }

        /**
         * @param mixed $gradeCurricular
         */
        public function setGradeCurricular($gradeCurricular)
        {
            $this->gradeCurricular = $gradeCurricular;
        }

        /**
         * @return mixed
         */
        public function getPeriodo()
        {
            return $this->periodo;
        }

        /**
         * @param mixed $periodo
         */
        public function setPeriodo($periodo)
        {
            $this->periodo = $periodo;
        }

    }
?>