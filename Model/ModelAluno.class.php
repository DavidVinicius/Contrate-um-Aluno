<?php
    include_once("DataBase.class.php");
    $DB = new DataBase();
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

        function __construct($IdAluno)
        {
            $DB = $this->InstanciaDB();
            $Result = $DB->SearchQuery("aluno","where idAluno = $IdAluno");
            $Assoc = mysqli_fetch_assoc($Result);

            $this->setDataNascimento($Assoc['dataNascimento']);
            $this->setFormacao($Assoc['formacao']);
            $this->setExperiencias($Assoc['experiencias']);
            $this->setInformacoesAdicionais($Assoc['informacoesAdicionais']);
            $this->setFoto($Assoc['foto']);
            $this->setNome($Assoc['nome']);
            $this->setCpf($Assoc['cpf']);
            $this->setObjetivo($Assoc['objetivo']);
            $this->setQualificacoes($Assoc['qualificacoes']);
            $this->setTelefone($Assoc['telefone']);
            $this->setEndereco($Assoc['endereco']);
            $this->setRg($Assoc['rg']);
            $this->setCodCurso($Assoc['codCurso']);
            $this->setCodUsuario($Assoc['codUsuario']);
        }

        public function CreateAluno($DataNascimento, $Formacao, $Experiencias, $InformacoesAdicionais,
        $Foto, $Nome, $Cpf, $Objetivo, $Qualificacoes, $Telefone, $Endereco, $Rg, $CodCurso,$CodUsuario)
        {
            $Dados = array(
                "dataNascimento" =>$DataNascimento,
                "formacao" => $Formacao,
                "experiencias" => $Experiencias,
                "informacoesAdicionais" => $InformacoesAdicionais,
                "foto" => $Foto,
                "nome" => $Nome,
                "cpf" => $Cpf,
                "objetivos" => $Objetivo,
                "qualificacoes" => $Qualificacoes,
                "telefone" => $Telefone,
                "endereco" => $Endereco,
                "rg" => $Rg,
                "codCurso" => $CodCurso,
                "codUsuario" => $CodUsuario
            );
            $DB = $this->InstanciaDB();
            $Resultado = $DB->InsertQuery("aluno", $Dados);
            return $Resultado;
        }

        public function ReadAluno()
        {
            $Data = array(
                "dataNascimento" =>$this->getDataNascimento(),
                "formacao" => $this->getFormacao(),
                "experiencias" => $this->getExperiencias(),
                "informacoesAdicionais" => $this->getInformacoesAdicionais(),
                "foto" => $this->getFoto(),
                "nome" => $this->getNome(),
                "cpf" => $this->getCpf(),
                "objetivos" => $this->getObjetivo(),
                "qualificacoes" => $this->getQualificacoes(),
                "telefone" => $this->getTelefone(),
                "endereco" => $this->getEndereco(),
                "rg" => $this->getRg(),
                "codCurso" => $this->getCodCurso(),
                "codUsuario" => $this->getCodUsuario()
            );

            return $Data;
        }

        public function UpdateAluno($Field, $NewValue, $Id)
        {
            $DB = $this->InstanciaDB();
            $Result = $DB->UpdateQuery("aluno", $Field, $NewValue, " WHERE idAluno = $Id");
            return $Result;
        }

        public function DeleteAluno($Id)
        {
            $DB = $this->InstanciaDB();
            $Result = $DB->DeleteQuery("aluno", "WHERE idAluno = $Id");
            return $Result;
        }

        public function InstanciaDB()
        {
            $DB = new DataBase();
            return $DB;
        }

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