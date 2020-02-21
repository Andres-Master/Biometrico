CREATE DATABASE  IF NOT EXISTS `biometrico` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `biometrico`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biometrico
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `detalle_marcacion`
--

DROP TABLE IF EXISTS `detalle_marcacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_marcacion` (
  `id_detalle_marcacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha_activacion` datetime DEFAULT NULL,
  `fecha_inactivacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_marcacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_marcacion`
--

LOCK TABLES `detalle_marcacion` WRITE;
/*!40000 ALTER TABLE `detalle_marcacion` DISABLE KEYS */;
INSERT INTO `detalle_marcacion` VALUES (1,'Entrada','Entrada al Trabajo','2020-01-05 00:00:00',NULL,'A'),(2,'Almuerzo','Salida para el amuerzo','2020-01-05 00:00:00',NULL,'A'),(3,'Regreso del Almuerzo','Regreso de la hora de Almuerzo','2020-01-05 00:00:00',NULL,'A'),(4,'Salida','Salida del trabjo','2020-01-05 00:00:00',NULL,'A');
/*!40000 ALTER TABLE `detalle_marcacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `id_empleado` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `fecha_activacion` datetime DEFAULT NULL,
  `fecha_inactivacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (0,'xxxxxx','xxxx','xxx','2000-07-24','xxxxxx','xxxxxx','2020-01-05 00:00:00','2020-01-05 00:00:00','A','XXXX',NULL),(1,'0931978365','Andres','Bajaña','2000-07-24','Guasmo Norte','0987654321','2020-01-05 00:00:00',NULL,'A','Rector del colegio',NULL),(3,'0953555414','freddy oswaldo','suarez olvera',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'095355588','freddy oswaldo','suarez olvera',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'0906292453','narcisa ','olvera','1959-11-06','','',NULL,NULL,NULL,NULL,NULL),(6,'0906292453','narcisa ','olvera','1959-11-06','argentina y gallegos lara','0985066601',NULL,NULL,NULL,NULL,NULL),(7,'0953555414','oswaldo','olvera','0000-00-00','las orquideas','2898565',NULL,NULL,NULL,NULL,NULL),(8,'5555','555','66','0000-00-00','62','62',NULL,NULL,NULL,NULL,NULL),(9,'09855','5555','5555','0000-00-00','5555555','5555',NULL,NULL,NULL,NULL,NULL),(10,'0944037977','Alex Francisco ','Marin Gurumendi','2000-12-22','10 Y Cedala','0967742399',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `huellas`
--

DROP TABLE IF EXISTS `huellas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `huellas` (
  `id_huella` int NOT NULL DEFAULT '0',
  `id_empleado` int DEFAULT NULL,
  `huella` blob,
  `fecha_activacion` datetime DEFAULT NULL,
  `fecha_inactivacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_huella`),
  KEY `fk_huella_empleado` (`id_empleado`),
  CONSTRAINT `fk_huella_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `huellas`
--

LOCK TABLES `huellas` WRITE;
/*!40000 ALTER TABLE `huellas` DISABLE KEYS */;
/*!40000 ALTER TABLE `huellas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornada`
--

DROP TABLE IF EXISTS `jornada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jornada` (
  `id_jornada` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornada`
--

LOCK TABLES `jornada` WRITE;
/*!40000 ALTER TABLE `jornada` DISABLE KEYS */;
INSERT INTO `jornada` VALUES (1,'Matutina','06:00:00','12:00:00','A'),(2,'Vespertina','12:00:00','18:00:00','A'),(3,'Norturna','18:00:00','24:00:00','A');
/*!40000 ALTER TABLE `jornada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornada_empleados`
--

DROP TABLE IF EXISTS `jornada_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jornada_empleados` (
  `id_jornada_empleados` int NOT NULL AUTO_INCREMENT,
  `id_jornada` int DEFAULT NULL,
  `id_empleado` int DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_jornada_empleados`),
  KEY `fk_je_empleado` (`id_empleado`),
  KEY `fk_je_jornada` (`id_jornada`),
  CONSTRAINT `fk_je_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  CONSTRAINT `fk_je_jornada` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornada_empleados`
--

LOCK TABLES `jornada_empleados` WRITE;
/*!40000 ALTER TABLE `jornada_empleados` DISABLE KEYS */;
INSERT INTO `jornada_empleados` VALUES (1,1,1,'A'),(2,2,1,'A'),(3,3,1,'A');
/*!40000 ALTER TABLE `jornada_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcaciones`
--

DROP TABLE IF EXISTS `marcaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marcaciones` (
  `id_marcaciones` int NOT NULL AUTO_INCREMENT,
  `id_detalle_marcacion` int DEFAULT NULL,
  `id_empleado` int DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_marcaciones`),
  KEY `fk_marcacion_empleado` (`id_empleado`),
  KEY `fk_marcacion_dm` (`id_detalle_marcacion`),
  CONSTRAINT `fk_marcacion_dm` FOREIGN KEY (`id_detalle_marcacion`) REFERENCES `detalle_marcacion` (`id_detalle_marcacion`),
  CONSTRAINT `fk_marcacion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcaciones`
--

LOCK TABLES `marcaciones` WRITE;
/*!40000 ALTER TABLE `marcaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `orden` int NOT NULL,
  `pagina` int DEFAULT NULL,
  `id_padre` int DEFAULT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A',
  `fecha_inserccion` date NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `fk_paginas_menu_idx` (`pagina`),
  CONSTRAINT `fk_paginas_menu` FOREIGN KEY (`pagina`) REFERENCES `paginas` (`id_pagina`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'PRINCIPAL','PAGINA DE INICIO',1,6,NULL,'A','2020-01-11'),(2,'INICIO SESION','PAGINA DE LOGEO',2,4,NULL,'A','2020-01-11'),(3,'INFORMACION','INFORMACION ACERCA DE LA ESCUELA',5,NULL,NULL,'A','2020-01-11'),(4,'REGISTRO','PAGINA  DE REGISTRO',3,5,NULL,'I','2020-01-11'),(5,'CERRAR SESION','SALIR',6,2,NULL,'A','2020-01-11'),(6,'REPORTES','REPORTES',3,NULL,NULL,'A','2020-01-11'),(7,'ADMINISTRACION','ADMIN',2,NULL,NULL,'A','2020-01-11'),(8,'MARCACION','MARCACION',4,NULL,NULL,'A','2020-01-11'),(9,'USUARIO','USER',1,7,7,'A','2020-01-11'),(10,'ROL','ROL',2,NULL,7,'A','2020-01-11'),(11,'JORNADAS','JORNADAS',3,NULL,7,'A','2020-01-11'),(12,'MENU','MENU',4,NULL,7,'A','2020-01-11'),(13,'MARCACION DEL DIA','MARCA',1,NULL,6,'A','2020-01-11'),(14,'ASISTENCIA','ASISTENCIA',1,NULL,8,'A','2020-01-11'),(15,'PAGINAS','PAGINAS',5,NULL,7,'A','2020-01-11'),(16,'MARCAR','MARCAR',2,NULL,8,'A','2020-01-11');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paginas` (
  `id_pagina` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`id_pagina`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (1,'head','pagina para la etiqueta head','A'),(2,'cerrar.php','pagina que cierra la sesion','A'),(3,'defecto.php','pagina por dfecto vacia','A'),(4,'login.php','pagina de login','A'),(5,'Registro.php','pagina de Registro de usuario','A'),(6,'Principal.php','pagina principal','A'),(7,'usuario/consulta_usuario.php','consulta','A');
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros_paginas`
--

DROP TABLE IF EXISTS `parametros_paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parametros_paginas` (
  `id_pagina` int NOT NULL,
  `id_parametro` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `valor` varchar(1000) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`id_pagina`,`id_parametro`),
  CONSTRAINT `fk_parametro_pagina` FOREIGN KEY (`id_pagina`) REFERENCES `paginas` (`id_pagina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros_paginas`
--

LOCK TABLES `parametros_paginas` WRITE;
/*!40000 ALTER TABLE `parametros_paginas` DISABLE KEYS */;
INSERT INTO `parametros_paginas` VALUES (1,1,'titulo','titulo de la pagina','Biometrico','A');
/*!40000 ALTER TABLE `parametros_paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `fecha_activacion` datetime DEFAULT NULL,
  `fecha_inactivacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Rector(a)','2020-01-05 00:00:00',NULL,'A'),(2,'Supervisor','2020-01-05 00:00:00',NULL,'A'),(3,'Maestro','2020-01-05 00:00:00',NULL,'A'),(4,'Sistema','2020-01-05 00:00:00',NULL,'A'),(5,'Guardia','2020-01-05 00:00:00',NULL,'A'),(6,'INVITADO',NULL,NULL,'A'),(7,'ROLNUEVo','2020-02-11 21:47:08','2020-02-11 21:55:11','I');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_empleados`
--

DROP TABLE IF EXISTS `rol_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_empleados` (
  `id_rol_empleados` int NOT NULL AUTO_INCREMENT,
  `id_empleado` int DEFAULT NULL,
  `id_rol` int DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol_empleados`),
  KEY `fk_re_empleado` (`id_empleado`),
  KEY `fk_re_rol` (`id_rol`),
  CONSTRAINT `fk_re_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  CONSTRAINT `fk_re_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_empleados`
--

LOCK TABLES `rol_empleados` WRITE;
/*!40000 ALTER TABLE `rol_empleados` DISABLE KEYS */;
INSERT INTO `rol_empleados` VALUES (1,1,1,'A'),(2,1,2,'A'),(3,1,3,'A'),(4,1,4,'A'),(5,0,6,'A');
/*!40000 ALTER TABLE `rol_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_menu`
--

DROP TABLE IF EXISTS `rol_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_menu` (
  `id_menu` int NOT NULL,
  `id_rol` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_menu`,`id_rol`),
  KEY `fk_rol_rm_idx` (`id_rol`),
  CONSTRAINT `fk_menu_rm` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  CONSTRAINT `fk_rol_rm` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_menu`
--

LOCK TABLES `rol_menu` WRITE;
/*!40000 ALTER TABLE `rol_menu` DISABLE KEYS */;
INSERT INTO `rol_menu` VALUES (1,1,'ROLRECTOR','A'),(1,2,'ROLSUPER','A'),(1,3,'ROLMAES','A'),(1,4,'ROLSIST','A'),(1,5,'ROLGUARD','A'),(1,6,'ROLINV','A'),(2,6,'ROLINV','A'),(3,1,'ROLRECTOR','A'),(3,2,'ROLSUPER','A'),(3,3,'ROLMAES','A'),(3,4,'ROLSIST','A'),(3,5,'ROLGUARD','A'),(3,6,'ROLINV','A'),(4,1,'ROLRECT','A'),(5,1,'ROLRECTOR','A'),(6,1,'ROLRECTOR','A'),(7,1,'ROLRECTOR','A'),(8,1,'ROLRECTOR','A'),(9,1,'ROLRECTOR','A'),(10,1,'ROLRECTOR','A'),(11,1,'ROLRECTOR','A'),(12,1,'ROLRECTOR','A'),(13,1,'ROLRECTOR','A'),(14,1,'ROLRECTOR','A'),(15,1,'ROLRECTOR',NULL),(16,1,'ROLRECTOR',NULL);
/*!40000 ALTER TABLE `rol_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesion`
--

DROP TABLE IF EXISTS `sesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sesion` (
  `id_sesion` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `IP` varchar(60) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`id_sesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesion`
--

LOCK TABLES `sesion` WRITE;
/*!40000 ALTER TABLE `sesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `id_empleado` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_empleado_usu_idx` (`id_empleado`),
  KEY `fk_empleado_usu_idx2` (`id_empleado`),
  CONSTRAINT `fk_empleado_usu` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'Andres_Master','12345','A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'biometrico'
--

--
-- Dumping routines for database 'biometrico'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-20 21:21:20
