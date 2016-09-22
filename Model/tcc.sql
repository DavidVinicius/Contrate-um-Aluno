-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2016 às 23:35
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `nacionalidade` varchar(30) DEFAULT 'Brasil',
  `formacao` text NOT NULL,
  `experiencias` text NOT NULL,
  `informacoesAdicionais` varchar(255) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `qualificacoes` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `codCurso` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `dataNascimento`, `nacionalidade`, `formacao`, `experiencias`, `informacoesAdicionais`, `foto`, `nome`, `cpf`, `objetivo`, `qualificacoes`, `telefone`, `endereco`, `rg`, `codCurso`, `codUsuario`) VALUES
(1, '1998-10-08', 'Brasil', 'asd', 'asd', 'asd', '/opt/lampp/htdocs/TCC/ImagensUsuarios/13birl.png', 'Matheus Picioli', '401.564.828-51', 'asdas', 'asd', '21903986', 'asd', '1293867', 22, 2),
(2, '1998-10-08', 'Brasil', 'asd', 'asd', 'ads', '/opt/lampp/htdocs/TCC/ImagensUsuarios/13.png', 'Matheus', '81236723', 'asd', 'daas', '182537231', 'dasd', '27934684', 22, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `escola` varchar(100) DEFAULT NULL,
  `gradeCurricular` varchar(200) DEFAULT NULL,
  `periodo` enum('Manhã','Tarde','Noite') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nome`, `escola`, `gradeCurricular`, `periodo`) VALUES
(22, 'InformÃ¡tica p/ Internet', 'Etec Philadelpho', '/opt/lampp/htdocs/Projetos/TCC/imagensUpadas/tcc.sql', 'Tarde'),
(23, 'MecÃ¢nica', 'Etec Philadelpho', '/opt/lampp/htdocs/Projetos/TCC/imagensUpadas/Mudando barra unity de posiÃ§Ã£o', 'Noite'),
(24, 'MecÃ¢nica', 'Etec Philadelpho GouvÃªa Netto', '/opt/lampp/htdocs/Projetos/TCC/imagensUpadas/Abrindo o php.ini', 'Noite'),
(25, 'Protese DentÃ¡ria', 'Etec Philadelpho GouvÃªa Netto', '/opt/lampp/htdocs/Projetos/TCC/imagensUpadas/', 'Noite'),
(26, 'Protese DentÃ¡ria', 'Etec Philadelpho GouvÃªa Netto', '/opt/lampp/htdocs/Projetos/TCC/imagensUpadas/Lista de exercÃ­cios 2ÂºBimestre - MatemÃ¡tica 3ÂºAno.pdf', 'Noite'),
(27, '', '', 'C:wampwwwTCCimagensUpadas	cc-conceitual.png', 'Manhã'),
(28, '', '', 'C:wampwwwTCCimagensUpadasCorreÃ§Ãµes no banco.txt', 'Noite'),
(29, '', '', 'C:wampwwwTCCimagensUpadas	cc.sql', 'Manhã'),
(30, 'Ã©oq', 'Ã£o', 'C:wampwwwTCCimagensUpadasformPadrao.html', 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cnpj` varchar(17) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `cnpj`, `email`, `telefone`, `endereco`, `codUsuario`) VALUES
(8, 'asdsad', '13123', 'asd@asd.com', '(17) 98206-402', 'asudasydi', 1),
(9, 'Picioli LTDA', '401.564.828-51', 'matheus.picioli98@gmail.com', '(17)98206-4024', 'aisudtfasgdyh', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `idMensagem` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `de` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  `mensagem` text NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `formacao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nome`, `email`, `formacao`) VALUES
(1, 'nomePicioli', 'email@email.com', 'tÃ©cnico'),
(2, 'nomePicioli', 'email@email.com', 'tÃ©cnico'),
(3, 'nomePicioli', 'email@email.com', 'tÃ©cnico'),
(4, 'nomePicioli', 'email@email.com', 'tÃ©cnico'),
(5, 'nomePicioli', 'email@email.com', 'tÃ©cnico'),
(6, 'NÃ£o informado!', 'NÃ£o informado!', 'NÃ£o informado!'),
(7, 'NovoNome', 'NovoEmail@gmail.com', 'Nova FormaÃ§Ã£o'),
(8, 'NÃ£o informado!', 'NÃ£o informado!', 'NÃ£o informado!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nivel` enum('1','2','3','4') NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `nivel`, `senha`) VALUES
(1, 'empresa@empresa.com', '2', '123'),
(2, 'aluno@aluno.com', '1', '123'),
(3, 'empresa1@empresa1.com', '2', '123'),
(4, 'admin@admin.com', '3', '123'),
(5, 'empresa2@empresa2.com', '2', '123'),
(6, 'aluno2@aluno2.com', '1', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `idVaga` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `cargaHoraria` float(3,1) NOT NULL,
  `salario` float(6,2) DEFAULT NULL,
  `requisitos` varchar(255) DEFAULT NULL,
  `beneficios` varchar(255) DEFAULT NULL,
  `codEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `codCurso` (`codCurso`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`idMensagem`),
  ADD KEY `fk_mensagens_usuario` (`codUsuario`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `codEmpresa` (`codEmpresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vaga`
--
ALTER TABLE `vaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `aluno_ibfk_2` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `fk_mensagens_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `vaga_ibfk_1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`idEmpresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
