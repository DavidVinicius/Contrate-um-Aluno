<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:36
 */
    class ModelAluno
    {
        private $idAluno;
        private $dataNascimento;
        private $nacionalidade;
        private $formacao;
        private $experiencias;
        private $informacoesAdicionais;
        private $foto;
        private $nome;
        private $cpf;
        private $objetivo;
        private $qualificacoes;
        private $telefone;
        private $endereco;
        private $rg;
        private $codCurso;
        private $codUsuario;

        /**
         * @return mixed
         */
        public function getIdAluno()
        {
            return $this->idAluno;
        }

        /**
         * @param mixed $idAluno
         */
        public function setIdAluno($idAluno)
        {
            $this->idAluno = $idAluno;
        }

        /**
         * @return mixed
         */
        public function getDataNascimento()
        {
            return $this->dataNascimento;
        }

        /**
         * @param mixed $dataNascimento
         */
        public function setDataNascimento($dataNascimento)
        {
            $this->dataNascimento = $dataNascimento;
        }

        /**
         * @return mixed
         */
        public function getNacionalidade()
        {
            return $this->nacionalidade;
        }

        /**
         * @param mixed $nacionalidade
         */
        public function setNacionalidade($nacionalidade)
        {
            $this->nacionalidade = $nacionalidade;
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
        public function getExperiencias()
        {
            return $this->experiencias;
        }

        /**
         * @param mixed $experiencias
         */
        public function setExperiencias($experiencias)
        {
            $this->experiencias = $experiencias;
        }

        /**
         * @return mixed
         */
        public function getInformacoesAdicionais()
        {
            return $this->informacoesAdicionais;
        }

        /**
         * @param mixed $informacoesAdicionais
         */
        public function setInformacoesAdicionais($informacoesAdicionais)
        {
            $this->informacoesAdicionais = $informacoesAdicionais;
        }

        /**
         * @return mixed
         */
        public function getFoto()
        {
            return $this->foto;
        }

        /**
         * @param mixed $foto
         */
        public function setFoto($foto)
        {
            $this->foto = $foto;
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
        public function getCpf()
        {
            return $this->cpf;
        }

        /**
         * @param mixed $cpf
         */
        public function setCpf($cpf)
        {
            $this->cpf = $cpf;
        }

        /**
         * @return mixed
         */
        public function getObjetivo()
        {
            return $this->objetivo;
        }

        /**
         * @param mixed $objetivo
         */
        public function setObjetivo($objetivo)
        {
            $this->objetivo = $objetivo;
        }

        /**
         * @return mixed
         */
        public function getQualificacoes()
        {
            return $this->qualificacoes;
        }

        /**
         * @param mixed $qualificacoes
         */
        public function setQualificacoes($qualificacoes)
        {
            $this->qualificacoes = $qualificacoes;
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
        public function getRg()
        {
            return $this->rg;
        }

        /**
         * @param mixed $rg
         */
        public function setRg($rg)
        {
            $this->rg = $rg;
        }

        /**
         * @return mixed
         */
        public function getCodCurso()
        {
            return $this->codCurso;
        }

        /**
         * @param mixed $codCurso
         */
        public function setCodCurso($codCurso)
        {
            $this->codCurso = $codCurso;
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