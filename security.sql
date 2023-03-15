-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: security
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
-- Table structure for table `contactanos`
--

DROP TABLE IF EXISTS `contactanos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactanos` (
  `id_contactanos` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula_pasaporte` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contactanos`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactanos`
--

LOCK TABLES `contactanos` WRITE;
/*!40000 ALTER TABLE `contactanos` DISABLE KEYS */;
INSERT INTO `contactanos` VALUES (1,'kayler','Zuñiga','0912901290','2000-01-01','Soltero','kayler.zunigag@hotmail.com','0912901290','Se contacto con el se&ntilde;or y se procedi&oacute; a la explicaci&oacute;n de los servicios',0,1),(2,'Kayler','Zuniga','0924112718','1999-06-04','Casado','kayler.zunigag@ug.edu.ec','0921901199',NULL,1,NULL),(3,'Kayler','Zuniga','0924112619','2000-06-04','Soltero','kayler.zunigag@ug.edu.ec','0961397955',NULL,1,NULL),(4,'Kayler','Zuniga','0924112618','2000-06-04','Casado','kayler.zunigag@ug.edu.ec','0961397955',NULL,1,NULL),(5,'Kayler','Zuniga','0924112618','2000-06-04','Casado','kayler.zunigag@ug.edu.ec','0961397955',NULL,1,NULL),(6,'Kayler','Zuniga','0924112618','2000-06-04','Casado','kayler.zunigag@ug.edu.ec','0909009091',NULL,1,NULL),(7,'Kayler','Zuniga','0924112618','2000-06-01','Viudo','kayler.zunigag@ug.edu.ec','0909011111',NULL,1,NULL),(8,'Kayler','Zuniga','0924112618','2000-06-04','Casado','kayler.zuniga@ug.edu.ec','0961397955',NULL,1,NULL),(9,'Kayler','Zuniga','0924112618','2000-06-04','Viudo','kayler.zunigag@ug.edu.ec','0961397955',NULL,1,NULL),(10,'Kayler','Zuniga','0924112617','2000-06-05','Viudo','kayler.zunigag@ug.edu.ec','0909009011',NULL,1,NULL);
/*!40000 ALTER TABLE `contactanos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador','Este rol es el encargado de llevar el control de todo el sistema'),(2,'Supervisor','Este rol llevara acabo ciertas funciones dentro del sistema.'),(3,'Cliente','Este rol tendra acceso al lado menu principal');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_act` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (6,'Pichinchaa','pip','matutina',0,'Trinitaria','2022-09-18 06:23:13'),(7,'Guayasaa','Guayaquil','matutina',1,'Guasmo Sur','2022-09-18 06:23:19'),(12,'Guayas','Duran','nocturno',1,'duran city.','2022-09-18 06:24:43'),(13,'Guayas','Duran','vespertino',1,'duran city.','2022-09-18 06:25:27');
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_usuario` varchar(50) NOT NULL,
  `apellidos_usuario` varchar(50) NOT NULL,
  `telefono_usuario` varchar(10) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `tipo_servicio` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1',
  `descripcion` varchar(250) DEFAULT NULL,
  `estado_servicio` varchar(45) NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,'Cristhian','Piguave','0912891389','cristhian.piguavev@ug.edu.ec','Seguridad VIP','2022-09-15 23:16:37',1,'atendido','Finalizado'),(2,'Prueba','Cliente','0961397955','prueba.cliente@ug.edu.ec','Seguridad Electr&oacute;nica','2022-09-16 01:58:32',1,'Esta haciendo atendido por el usuario zu&ntilde;iga','En proceso'),(3,'Kayler','Zu&ntilde;iga','0961397955','kayler.zunigag@ug.edu.ec','Transporte de Valores','2022-09-16 22:09:30',1,NULL,'Pendiente'),(4,'Prueba','Cliente','0961397955','prueba.cliente@ug.edu.ec','Servicio de guardian&iacute;a armada a nivel nacional','2022-09-17 02:52:14',1,'atendido','Finalizado');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `usuario_creacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_idx` (`id_rol`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'0929315687','Kayler','Zu&ntilde;iga','kayler.zunigag@ug.edu.ec','123456',1,1,NULL),(2,'1314375310','Cristhian','Piguave','cristhian.piguavev@ug.edu.ec','123456',2,1,NULL),(3,'1234567890','Prueba','Cliente','prueba.cliente@ug.edu.ec','123456',3,1,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'security'
--

--
-- Dumping routines for database 'security'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-17 23:30:05
