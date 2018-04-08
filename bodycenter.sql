-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: bodycenter
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `Clientes`
--

DROP TABLE IF EXISTS `Clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Clientes` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `CI` int(10) NOT NULL,
  `Telefono` int(12) NOT NULL,
  `Nacimiento` date NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CI` (`CI`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clientes`
--

LOCK TABLES `Clientes` WRITE;
/*!40000 ALTER TABLE `Clientes` DISABLE KEYS */;
INSERT INTO `Clientes` VALUES (13,'Vicente','Mendoza','Masculino',4932788,982911288,'1987-09-22'),(14,'Mariela','Bogado','Femenino',5093933,975392900,'1990-03-02'),(15,'Melisa','Gimenez','Femenino',2345765,986765435,'1993-12-30'),(16,'Ana','Jara','Femenino',4567342,21675432,'1986-12-20'),(17,'Pelusa','Roa','Femenino',6789234,21789000,'1996-03-12'),(20,'Esmeralda','Lugo','Femenino',4567777,987654321,'1990-11-06'),(21,'Lucia','Villalba','Femenino',321212,77777777,'2012-11-06'),(22,'Ana ','Barrios ','Femenino',8888888,77777777,'1990-12-15'),(23,'Hilda','Galeano','Femenino',1111111,99999999,'1995-03-03'),(24,'Liliana','Andrade','Femenino',8989898,98098900,'1980-11-16'),(25,'Lupita','Perez','Femenino',66666666,333333,'1982-11-08'),(26,'mirta','villagra','Femenino',123,987654,'1990-12-19');
/*!40000 ALTER TABLE `Clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cobros`
--

DROP TABLE IF EXISTS `Cobros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cobros` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Clientes_Id` int(10) NOT NULL,
  `Cursos_Id` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Clientes_Id` (`Clientes_Id`),
  KEY `Cursos_Id` (`Cursos_Id`),
  CONSTRAINT `Cobros_ibfk_1` FOREIGN KEY (`Clientes_Id`) REFERENCES `Clientes` (`Id`),
  CONSTRAINT `Cobros_ibfk_2` FOREIGN KEY (`Cursos_Id`) REFERENCES `Cursos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cobros`
--

LOCK TABLES `Cobros` WRITE;
/*!40000 ALTER TABLE `Cobros` DISABLE KEYS */;
INSERT INTO `Cobros` VALUES (3,13,4,'2016-11-05'),(4,14,4,'2016-11-05'),(5,16,7,'2016-11-04'),(6,15,10,'2016-11-05'),(7,14,9,'2016-11-05'),(8,13,4,'2016-10-01'),(10,20,14,'2016-11-06'),(11,21,4,'2016-11-06'),(12,22,10,'2016-11-06'),(13,22,16,'2016-01-06'),(14,21,4,'2016-11-06'),(15,23,17,'2016-11-07'),(16,13,6,'2016-11-08'),(17,13,4,'2016-11-07'),(18,26,9,'2016-11-08'),(19,13,4,'2016-11-18');
/*!40000 ALTER TABLE `Cobros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cursos`
--

DROP TABLE IF EXISTS `Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cursos` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Horario_de_Inicio` time NOT NULL,
  `Horario_de_Termino` time NOT NULL,
  `Instructores_Id` int(10) NOT NULL,
  `Precio` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Instructores_Id` (`Instructores_Id`),
  CONSTRAINT `Cursos_ibfk_1` FOREIGN KEY (`Instructores_Id`) REFERENCES `Instructores` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cursos`
--

LOCK TABLES `Cursos` WRITE;
/*!40000 ALTER TABLE `Cursos` DISABLE KEYS */;
INSERT INTO `Cursos` VALUES (4,'Full Box','18:00:00','18:45:00',3,130000),(6,'Power Fit','14:00:00','15:00:00',9,200000),(7,'Zumba','10:30:00','11:00:00',8,140000),(8,'Eliptica','08:00:00','09:00:00',2,100000),(9,'Spining','09:30:00','10:15:00',9,150000),(10,'Pilates','18:30:00','19:15:00',2,200000),(11,'Aerobic','16:30:00','17:30:00',3,130000),(12,'Aqua Aerobics  ','09:00:00','10:00:00',10,300000),(13,'Hidrogym','15:00:00','16:00:00',10,300000),(14,'king boxin','19:00:00','19:30:00',8,150000),(16,'TonificaciÃ³n Muscular','17:00:00','19:00:00',17,400000),(17,'cinta','09:00:00','10:00:00',17,100000),(18,'Hidrogimnasia.','08:00:00','09:00:00',12,200000);
/*!40000 ALTER TABLE `Cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gepon`
--

DROP TABLE IF EXISTS `Gepon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gepon` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Slot` int(2) NOT NULL,
  `Pon` int(2) NOT NULL,
  `Onu` int(2) NOT NULL,
  `Port` int(2) NOT NULL,
  `UpStream` int(6) NOT NULL,
  `DownStream` int(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gepon`
--

LOCK TABLES `Gepon` WRITE;
/*!40000 ALTER TABLE `Gepon` DISABLE KEYS */;
/*!40000 ALTER TABLE `Gepon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inscripciones`
--

DROP TABLE IF EXISTS `Inscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inscripciones` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Clientes_Id` int(10) NOT NULL,
  `Cursos_Id` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Cursos_Id` (`Cursos_Id`),
  KEY `Clientes_Id` (`Clientes_Id`),
  CONSTRAINT `Inscripciones_ibfk_1` FOREIGN KEY (`Cursos_Id`) REFERENCES `Cursos` (`Id`),
  CONSTRAINT `Inscripciones_ibfk_2` FOREIGN KEY (`Clientes_Id`) REFERENCES `Clientes` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inscripciones`
--

LOCK TABLES `Inscripciones` WRITE;
/*!40000 ALTER TABLE `Inscripciones` DISABLE KEYS */;
INSERT INTO `Inscripciones` VALUES (7,13,4,'2016-11-05'),(14,22,10,'2016-11-06'),(16,21,12,'2016-11-07'),(17,20,13,'2016-11-07'),(18,15,8,'2016-11-07'),(19,23,4,'2016-11-07'),(20,25,11,'2016-11-08'),(21,22,9,'2016-11-08'),(22,26,9,'2016-11-08'),(23,22,17,'2016-11-12');
/*!40000 ALTER TABLE `Inscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instructores`
--

DROP TABLE IF EXISTS `Instructores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Instructores` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `CI` int(10) NOT NULL,
  `Telefono` int(12) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CI` (`CI`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instructores`
--

LOCK TABLES `Instructores` WRITE;
/*!40000 ALTER TABLE `Instructores` DISABLE KEYS */;
INSERT INTO `Instructores` VALUES (2,'Marcos','Candia',3949931,981288399),(3,'Romina','Mancuello',3217973,986555444),(8,'Juan Pablo','Zena',4567892,21333444),(9,'Daniel','Gonzalez',5678900,21555777),(10,'Lorena','Martinez',2134566,21321123),(12,'Aldolfo','PeÃ±a',4444444,9999999),(13,'Diogenes','Gonzalez',6545459,480661),(14,'Francisco','Lopez',8989898,6565432),(15,'Gustavo','Chaparro',6546666,3333333),(16,'Blas','Barrios',5789999,1111111),(17,'Christian','Toledo',9999999,7777777);
/*!40000 ALTER TABLE `Instructores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Marcaciones`
--

DROP TABLE IF EXISTS `Marcaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Marcaciones` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Instructores_Id` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `Hora_Salida` time NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Instructores_Id` (`Instructores_Id`),
  CONSTRAINT `Marcaciones_ibfk_1` FOREIGN KEY (`Instructores_Id`) REFERENCES `Instructores` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marcaciones`
--

LOCK TABLES `Marcaciones` WRITE;
/*!40000 ALTER TABLE `Marcaciones` DISABLE KEYS */;
INSERT INTO `Marcaciones` VALUES (1,2,'2016-11-05','10:00:00','11:03:00'),(4,13,'2016-11-06','16:03:00','18:04:00'),(5,2,'2016-11-08','08:00:00','09:00:00');
/*!40000 ALTER TABLE `Marcaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'Recepcionista'),(2,'Propietaria');
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Roles_Id` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Usuario` (`Usuario`),
  KEY `Roles_Id` (`Roles_Id`),
  CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`Roles_Id`) REFERENCES `Roles` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'carolina','123456',2),(2,'maria','654321',1);
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-18 11:16:29
