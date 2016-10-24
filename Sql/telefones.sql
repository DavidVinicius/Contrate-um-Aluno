CREATE TABLE `telefones` (
  `idTelefone` int(11) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `telefones` (`idTelefone`, `telefone`, `tipo`, `codUsuario`) VALUES
(1, '17 8130-2222', '', 2),
(2, '17 8130-4444', '', 2);

ALTER TABLE `telefones`
  ADD PRIMARY KEY (`idTelefone`),
  ADD KEY `fk_telefones_aluno` (`codAluno`);

ALTER TABLE `telefones`
  MODIFY `idTelefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_telefones_aluno` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`);