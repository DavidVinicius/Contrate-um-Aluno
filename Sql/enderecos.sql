CREATE TABLE `enderecos` (
  `idEndereco` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(9) NOT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `codAlunoEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `enderecos` (`idEndereco`, `numero`, `rua`, `bairro`, `cidade`, `estado`, `cep`, `complemento`, `codAluno`) VALUES
(1, '122', 'Rua da Laranjeiras', 'Vila esplanada', 'Legolândia', 'SP', '15011-111', 'perto de casa', 1);

ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `fk_enderecos_aluno` (`codAluno`);

ALTER TABLE `enderecos`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_enderecos_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`);

