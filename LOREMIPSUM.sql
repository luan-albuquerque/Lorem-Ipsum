-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: LOREMIPSUM
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `PROJETOS`
--

DROP TABLE IF EXISTS `PROJETOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PROJETOS` (
  `ID_PROJ` int NOT NULL AUTO_INCREMENT,
  `DESC_PROJ` varchar(30) NOT NULL,
  `DT_INICIAL` date NOT NULL,
  `DT_FIM` date NOT NULL,
  `VALOR` float NOT NULL,
  `RISCO` int NOT NULL,
  `PART` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_PROJ`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJETOS`
--

LOCK TABLES `PROJETOS` WRITE;
/*!40000 ALTER TABLE `PROJETOS` DISABLE KEYS */;
INSERT INTO `PROJETOS` VALUES (1,'BATERIA_SOLAR','2020-05-14','2020-05-17',10000,1,'Pedro Vitor Albuquerque/Willy Robson'),(6,'Arduino','2021-05-12','2021-05-14',9000,1,'Luan Albuquerque/Pedro Vitor Albuquerque dos Santos/Lucas Andre'),(7,'Control de Servos','2021-05-17','2021-05-17',1000,2,'Luan ALbuquerque/Bruna Batista');
/*!40000 ALTER TABLE `PROJETOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-17 16:39:49
