use tcc;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tcc
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,'1996-06-04','Brasil','Sou um autodidÃ¡ta','5abab5711b1b41579a88d374b98b0174.jpg','David Vinicius da Silva','4333333333333','Programador web','4222222222',3,1);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Programadores LTDA','11111111111111','ComÃ©rcio','9b9bc7bf30aac258075dcf7d67637ee2.jpg','Ser a melhor do nosso segmento','Aprender a valorizar sempre','ComeÃ§amos com muita vontade e desde sempre aprendamos a lidar com tudo\r\n                    ',2);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (1,'212','Joao Marques Pimentel','Vila Hipodromo','SÃ£o JosÃ© do Rio Preto','SP','15075-150','',1),(2,'111','Avenida da esperanÃ§a','vila','SÃ£o JosÃ© do Rio Preto','SP','15','',2);
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `experiencias`
--

LOCK TABLES `experiencias` WRITE;
/*!40000 ALTER TABLE `experiencias` DISABLE KEYS */;
INSERT INTO `experiencias` VALUES (1,'Aprendi muito com essa experiÃªncias','2015-11-10','2016-10-23','Agente de NegÃ³cios','Hipertec',1);
/*!40000 ALTER TABLE `experiencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `formacoes`
--

LOCK TABLES `formacoes` WRITE;
/*!40000 ALTER TABLE `formacoes` DISABLE KEYS */;
INSERT INTO `formacoes` VALUES (1,'2016','TÃ©cnico em informÃ¡tica para internet','Etec philadelpho gouvÃªa netto',1);
/*!40000 ALTER TABLE `formacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `qualificacoes`
--

LOCK TABLES `qualificacoes` WRITE;
/*!40000 ALTER TABLE `qualificacoes` DISABLE KEYS */;
INSERT INTO `qualificacoes` VALUES (1,'Html ',1),(2,'css',1),(3,'javascript',1),(4,'jquery',1),(5,'angular',1),(6,'ReactJS',1),(7,'Electron',1),(8,'IONIC',1);
/*!40000 ALTER TABLE `qualificacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `telefones`
--

LOCK TABLES `telefones` WRITE;
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` VALUES (1,'17 981304808','Celular',1),(2,'17 32223788','Comercial',2);
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'aluno@aluno.com','1','12345'),(2,'empresa@empresa.com','2','12345'),(3,'email@email.com','1','12345');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `valores`
--

LOCK TABLES `valores` WRITE;
/*!40000 ALTER TABLE `valores` DISABLE KEYS */;
INSERT INTO `valores` VALUES (1,'Responsabilidade',1),(2,'Aprendizagem',1);
/*!40000 ALTER TABLE `valores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-13 23:30:40
