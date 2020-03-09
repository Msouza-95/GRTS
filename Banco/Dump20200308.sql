-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: grts
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bairro`
--

DROP TABLE IF EXISTS `bairro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bairro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `idcidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcidade_fk_idx` (`idcidade`),
  CONSTRAINT `idcidade_fk` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairro`
--

LOCK TABLES `bairro` WRITE;
/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` VALUES (3,'adasdasd',14),(4,'dasd',15),(5,'adasdas',16),(6,'asdasd',17),(7,'bairro',1),(8,'sadasd',19),(9,'BAIRO',18),(10,'sadasaAd',19),(11,'sadasdasas',24),(12,'sadasdqqqsasa',25),(13,'birro',18),(14,'bairro323',26),(15,'bairroas',27),(16,'bairroadasd',28),(17,'bairr',28),(18,'bairroasas',1),(19,'bairroasasas',29),(20,'bairrowqw',1),(21,'bairrosasas',29),(22,'123123',30),(23,'sasas',32),(24,'qweqwe',33),(25,'sdasd',36),(26,'São Caetano',1),(27,'asas',1),(28,'asasqwq',1),(29,'asassadasd',1),(30,'adasd',36),(31,'qwqw',1),(32,'qeqweq',40);
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_fk_idx` (`idestado`),
  CONSTRAINT `estado_fk` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'salvador',2),(2,'rio de janeiro',18),(14,'adasdasddasd',29),(15,'dasda',30),(16,'dasdasd',31),(17,'dad',32),(18,'cidade',33),(19,'sdasd',34),(20,'sdasdasaas',35),(21,'sdasdasasasas',36),(22,'sdasdaA',37),(23,'cidadde',34),(24,'sdasdasasa',47),(25,'q',49),(26,'salvador23232',52),(27,'salvadoras',53),(28,'salvadorasdasd',54),(29,'salvadorasas',57),(30,'23123123',59),(31,'1231231',59),(32,'asas',60),(33,'weqwe',61),(34,'salvado',2),(35,'qweqwe',62),(36,'asdasd',63),(37,'asdad',74),(38,'qwqw',75),(39,'qwqwq',75),(40,'qweqweq',76);
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `nome` varchar(30) DEFAULT NULL,
  `cnpj` varchar(30) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `Responsavel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (NULL,'',NULL,NULL),('teste2','111111115','31231','teste'),('teste','11111112','12312','eett'),('teste4','11111113','13123','teste'),('teste3','11111114','1213','tteste'),('bahia comecios','222222','31313','responsavel');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `numero` varchar(10) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `logradouro` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpjempresa` varchar(20) NOT NULL,
  `idbairro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `endereco_ibfk_1` (`cnpjempresa`),
  KEY `bairro_fk_idx` (`idbairro`),
  CONSTRAINT `bairro_fk` FOREIGN KEY (`idbairro`) REFERENCES `bairro` (`id`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cnpjempresa`) REFERENCES `empresa` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=359 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES ('1','CEP','ap','rua do paraiso',35,'222222',7),('1','40390520','teste','rua do paraiso',355,'11111112',8),('1','40390522','tet','rua do paraiso',356,'11111112',7),('2','40390521','te','rua do paraiso',357,'11111113',8),('3','40390522','sa','rua do paraiso',358,'11111114',8);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (2,'BA'),(18,'RJ'),(29,'sadasdasda'),(30,'asdasdad'),(31,'dasdasd'),(32,'dasdad'),(33,'uf'),(34,'sdad'),(35,'sdadsas'),(36,'sdadasaaaaaaaa'),(37,'sdadAaa'),(38,'novo'),(39,'sdadaA'),(40,'BAHIA'),(41,'sdadasdasd'),(42,'sdadsas'),(43,'BA'),(44,'ba'),(45,'ba'),(46,'BA'),(47,'aasasas'),(48,'aasadadada'),(49,'q'),(50,'estao'),(51,'RC'),(52,'BA323'),(53,'BAas'),(54,'BAdasd'),(55,'BAa'),(56,'BAasa'),(57,'BAasas'),(58,'BAweqw'),(59,'312312'),(60,'asas'),(61,'eqwe'),(62,'qeqwe'),(63,'adasd'),(64,NULL),(65,NULL),(66,NULL),(67,NULL),(68,NULL),(69,NULL),(70,NULL),(71,NULL),(72,'sAS'),(73,'asdasd'),(74,'BAasd'),(75,'qwqw'),(76,'qweqwe');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'grts'
--

--
-- Dumping routines for database 'grts'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-08 23:58:23
