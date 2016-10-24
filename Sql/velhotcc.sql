-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2016 às 01:36
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
  `informacoesAdicionais` varchar(255) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `qualificacoes` varchar(255) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `dataNascimento`, `nacionalidade`, `informacoesAdicionais`, `foto`, `nome`, `cpf`, `objetivo`, `qualificacoes`, `rg`, `codUsuario`) VALUES
(1, '1998-10-08', 'Brasil', 'asd', '/opt/lampp/htdocs/TCC/ImagensUsuarios/13birl.png', 'Matheus Picioli', '401.564.828-51', 'asdas', 'html, css, javascript', '1293867', 2),
(2, '1998-10-08', 'Brasil', 'ads', '/opt/lampp/htdocs/TCC/ImagensUsuarios/13.png', 'Matheus', '81236723', 'asd', 'daas', '27934684', 6);

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
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `idEndereco` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(9) NOT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `codAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`idEndereco`, `numero`, `rua`, `bairro`, `cidade`, `estado`, `cep`, `complemento`, `codAluno`) VALUES
(1, '122', 'Rua da Laranjeiras', 'Vila esplanada', 'Legolândia', 'SP', '15011-111', 'perto de casa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `idExperiencia` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dataInicio` varchar(4) NOT NULL,
  `dataSaida` varchar(4) DEFAULT NULL,
  `cargo` varchar(30) NOT NULL,
  `codAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `experiencias`
--

INSERT INTO `experiencias` (`idExperiencia`, `descricao`, `dataInicio`, `dataSaida`, `cargo`, `codAluno`) VALUES
(1, 'aprendi bastante com essa experiência, com isso puder melhorar meus desafios pois não é facil ser adolecênte nessa idade gostaria de focar cada vez mais na programação e na matemática por que matemática é muito legal', '2014', '2016', 'Agente de Negocios', 1),
(2, 'Essa é minha segunda experiência', '2016', '2018', 'Programador', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes`
--

CREATE TABLE `formacoes` (
  `idFormacao` int(11) NOT NULL,
  `anoConclusao` date NOT NULL,
  `curso` varchar(30) NOT NULL,
  `instituicao` varchar(40) NOT NULL,
  `codAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formacoes`
--

INSERT INTO `formacoes` (`idFormacao`, `anoConclusao`, `curso`, `instituicao`, `codAluno`) VALUES
(1, '0000-00-00', 'Técnico em informática ', 'Etec Philadelpho Gouvêa Netto', 1),
(2, '0000-00-00', 'Ensino Médio ', 'Etec Philadelpho Gouvêa Netto', 1);

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
  `formacao` varchar(30) NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `idTelefone` int(11) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `codAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`idTelefone`, `telefone`, `tipo`, `codAluno`) VALUES
(1, '17 8130-2222', '', 1),
(2, '17 8130-4444', '', 1);

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
(2, 'novo@novo.com', '1', '1234'),
(3, 'empresa1@empresa1.com', '2', '123'),
(4, 'admin@admin.com', '3', '123'),
(5, 'empresa2@empresa2.com', '2', '123'),
(6, 'aluno2@aluno2.com', '1', '123'),
(7, 'novaemp@emp.com', '2', '1234');

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
-- Extraindo dados da tabela `vaga`
--

INSERT INTO `vaga` (`idVaga`, `titulo`, `descricao`, `cargaHoraria`, `salario`, `requisitos`, `beneficios`, `codEmpresa`) VALUES
(1, 'Programador ASP.NET', 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 36.4, 1200.69, 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 9),
(2, 'Professor de banco de dados - MySQL', 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 36.4, 1200.69, 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 9),
(3, 'Desenvolvedor de sistemas operacionais - C/C++', 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 36.4, 1200.69, 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 'O que é Lorem Ipsum?\r\nLorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI', 9),
(41, 'Programador php', 'AprenderÃ¡ bastante javascript', 44.0, 1300.00, 'Ser legal', '', 8),
(43, 'MinhaVaga', 'aprender', 44.0, 1300.00, 'ser legal', '', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `fk_enderecos_aluno` (`codAluno`);

--
-- Indexes for table `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`idExperiencia`),
  ADD KEY `fk_experiencias_aluno` (`codAluno`);

--
-- Indexes for table `formacoes`
--
ALTER TABLE `formacoes`
  ADD PRIMARY KEY (`idFormacao`),
  ADD KEY `fk_formacoes_aluno` (`codAluno`);

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
  ADD PRIMARY KEY (`idProfessor`),
  ADD KEY `fk_professor_usuario` (`codUsuario`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`idTelefone`),
  ADD KEY `fk_telefones_aluno` (`codAluno`);

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
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `idExperiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `formacoes`
--
ALTER TABLE `formacoes`
  MODIFY `idFormacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `idTelefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vaga`
--
ALTER TABLE `vaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_2` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_enderecos_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`);

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `fk_experiencias_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`);

--
-- Limitadores para a tabela `formacoes`
--
ALTER TABLE `formacoes`
  ADD CONSTRAINT `fk_formacoes_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`);

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `fk_mensagens_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_telefones_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`);

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `vaga_ibfk_1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`idEmpresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
