<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:34
 */
    class ModelVaga
    {
        private $idVaga;
        private $titulo;
        private $descricao;
        private $cargaHoraria;
        private $salario;
        private $requisitos;
        private $beneficios;
        private $codEmpresa;

        /**
         * @return mixed
         */
        public function getIdVaga()
        {
            return $this->idVaga;
        }

        /**
         * @param mixed $idVaga
         */
        public function setIdVaga($idVaga)
        {
            $this->idVaga = $idVaga;
        }

        /**
         * @return mixed
         */
        public function getTitulo()
        {
            return $this->titulo;
        }

        /**
         * @param mixed $titulo
         */
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }

        /**
         * @return mixed
         */
        public function getDescricao()
        {
            return $this->descricao;
        }

        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        /**
         * @return mixed
         */
        public function getCargaHoraria()
        {
            return $this->cargaHoraria;
        }

        /**
         * @param mixed $cargaHoraria
         */
        public function setCargaHoraria($cargaHoraria)
        {
            $this->cargaHoraria = $cargaHoraria;
        }

        /**
         * @return mixed
         */
        public function getSalario()
        {
            return $this->salario;
        }

        /**
         * @param mixed $salario
         */
        public function setSalario($salario)
        {
            $this->salario = $salario;
        }

        /**
         * @return mixed
         */
        public function getRequisitos()
        {
            return $this->requisitos;
        }

        /**
         * @param mixed $requisitos
         */
        public function setRequisitos($requisitos)
        {
            $this->requisitos = $requisitos;
        }

        /**
         * @return mixed
         */
        public function getBeneficios()
        {
            return $this->beneficios;
        }

        /**
         * @param mixed $beneficios
         */
        public function setBeneficios($beneficios)
        {
            $this->beneficios = $beneficios;
        }

        /**
         * @return mixed
         */
        public function getCodEmpresa()
        {
            return $this->codEmpresa;
        }

        /**
         * @param mixed $codEmpresa
         */
        public function setCodEmpresa($codEmpresa)
        {
            $this->codEmpresa = $codEmpresa;
        }


    }

?>