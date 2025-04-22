-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: colegio
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `personal_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cargo_personal_idx` (`personal_id`),
  CONSTRAINT `fk_cargo_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Director',1),(2,'Sub-director',1),(3,'Orientador',1),(4,'Administrador',1),(5,'Docente de aula',1),(6,'Coordinador',3),(7,'Profesor por hora',4),(8,'Obrero',5),(9,'Aprendiz',6),(10,'Secretario',7),(11,'Asistente Administrativo',7),(12,'Diseño gráfico',7),(13,'Mensajero',7);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `columna`
--

DROP TABLE IF EXISTS `columna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `columna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columna`
--

LOCK TABLES `columna` WRITE;
/*!40000 ALTER TABLE `columna` DISABLE KEYS */;
INSERT INTO `columna` VALUES (1,'Nombre'),(2,'Cargo'),(3,'Cédula'),(4,'Fecha de ingreso'),(5,'Sueldo mensual'),(6,'Sueldo Quincenal'),(7,'Inasistencias'),(8,'BANAVIH (1%)'),(9,'R.I.V.S.S (4%)'),(10,'R.P.E (0,5%)'),(11,'Anticipo préstamo'),(12,'Total deducciones'),(13,'Neto a pagar'),(14,'Firma y huella digital'),(15,'Sueldo diario'),(16,'Meses trabajados'),(17,'Días a pagar'),(18,'Días hábiles'),(19,'Días Efectivamente Laborados'),(20,'Valor jornada'),(21,'Total a pagar'),(22,'Monto'),(23,'Firma'),(24,'Huella'),(25,'N.º');
/*!40000 ALTER TABLE `columna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_semana`
--

DROP TABLE IF EXISTS `dia_semana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dia_semana` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_semana`
--

LOCK TABLES `dia_semana` WRITE;
/*!40000 ALTER TABLE `dia_semana` DISABLE KEYS */;
INSERT INTO `dia_semana` VALUES (1,'Lunes'),(2,'Martes'),(3,'Miércoles'),(4,'Jueves'),(5,'Viernes');
/*!40000 ALTER TABLE `dia_semana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleado` (
  `id` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_ingerso` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado_cargo`
--

DROP TABLE IF EXISTS `empleado_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleado_cargo` (
  `empleado_id` int NOT NULL,
  `cargo_id` int NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`empleado_id`,`cargo_id`),
  KEY `fk_empleado_subcargo_subcargo_idx` (`cargo_id`),
  CONSTRAINT `fk_empleado_cargo_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`),
  CONSTRAINT `fk_empleado_cargo_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='fk_empleado_subcargo_empleado colegio. empleadoo emplead_id id';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado_cargo`
--

LOCK TABLES `empleado_cargo` WRITE;
/*!40000 ALTER TABLE `empleado_cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario` (
  `dia_semana_id` int NOT NULL,
  `empleado_id` int NOT NULL,
  `cargo_id` int NOT NULL,
  `horas` int NOT NULL,
  PRIMARY KEY (`dia_semana_id`,`empleado_id`,`cargo_id`),
  KEY `fk_horario_empleado_cargo_idx` (`empleado_id`,`cargo_id`),
  KEY `fk_horario_dia_semana_idx` (`dia_semana_id`),
  CONSTRAINT `fk_horario_dia_semana` FOREIGN KEY (`dia_semana_id`) REFERENCES `dia_semana` (`id`),
  CONSTRAINT `fk_horario_empleado_cargo` FOREIGN KEY (`empleado_id`, `cargo_id`) REFERENCES `empleado_cargo` (`empleado_id`, `cargo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inasistencia`
--

DROP TABLE IF EXISTS `inasistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inasistencia` (
  `fecha` date NOT NULL,
  `empleado_id` int NOT NULL,
  `cargo_id` int NOT NULL,
  `horas` int DEFAULT NULL,
  `justificada` tinyint(1) NOT NULL,
  `observacion` text NOT NULL,
  PRIMARY KEY (`fecha`,`empleado_id`,`cargo_id`),
  KEY `fk_inasistencia_empleado_cargo_idx` (`empleado_id`,`cargo_id`),
  CONSTRAINT `fk_inasistencia_empleado_cargo` FOREIGN KEY (`empleado_id`, `cargo_id`) REFERENCES `empleado_cargo` (`empleado_id`, `cargo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inasistencia`
--

LOCK TABLES `inasistencia` WRITE;
/*!40000 ALTER TABLE `inasistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `inasistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moneda`
--

DROP TABLE IF EXISTS `moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moneda` (
  `id` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `simbolo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='nombre: USD, VES, etc.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moneda`
--

LOCK TABLES `moneda` WRITE;
/*!40000 ALTER TABLE `moneda` DISABLE KEYS */;
INSERT INTO `moneda` VALUES (1,'Dolar','$'),(2,'Bolivar','Bs');
/*!40000 ALTER TABLE `moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `tasa` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_detalle`
--

DROP TABLE IF EXISTS `pago_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago_detalle` (
  `pago_id` int NOT NULL,
  `empleado_id` int NOT NULL,
  `tipo_remuneracion_id` int NOT NULL,
  `columna_id` int NOT NULL,
  `valor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pago_id`,`empleado_id`,`tipo_remuneracion_id`,`columna_id`),
  KEY `fk_nomina_detalle_tipo_remuneracion_columna_idx` (`tipo_remuneracion_id`,`columna_id`),
  KEY `fk_nomina_detalle_empleado_idx` (`empleado_id`),
  CONSTRAINT `fk_nomina_detalle_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`),
  CONSTRAINT `fk_nomina_detalle_nomina` FOREIGN KEY (`pago_id`) REFERENCES `pago` (`id`),
  CONSTRAINT `fk_nomina_detalle_tipo_remuneracion_columna` FOREIGN KEY (`tipo_remuneracion_id`, `columna_id`) REFERENCES `tipo_remuneracion_columna` (`tipo_remuneracion_id`, `columna_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_detalle`
--

LOCK TABLES `pago_detalle` WRITE;
/*!40000 ALTER TABLE `pago_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso_temporal`
--

DROP TABLE IF EXISTS `permiso_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permiso_temporal` (
  `empleado_id` int NOT NULL,
  `desde_fecha` date NOT NULL,
  `hasta_fecha` date NOT NULL,
  `razon` text NOT NULL,
  PRIMARY KEY (`empleado_id`),
  CONSTRAINT `fk_permiso_temporal_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso_temporal`
--

LOCK TABLES `permiso_temporal` WRITE;
/*!40000 ALTER TABLE `permiso_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `tipo` tinyint NOT NULL COMMENT '0 normal, 1 por horas',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Personal administrativo, docente, profesor, directivo, obrero. También podrán existir coordinador, aula virtual, etc.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'Directivo',0),(2,'Docentes de aula',0),(3,'Coordinadores',0),(4,'Profesores por horas',1),(5,'Personal obrero',0),(6,'Aprendiz INCES en Formación',0),(7,'Personal Administrativo',0);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_tipo_remuneracion`
--

DROP TABLE IF EXISTS `personal_tipo_remuneracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_tipo_remuneracion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `personal_id` int NOT NULL,
  `remuneracion_id` int NOT NULL,
  `monto` decimal(10,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personal_tipo_remuneracion_personal_idx` (`personal_id`),
  KEY `fk-personal_tipo_remuneracion_tipo_remuneracion_idx` (`remuneracion_id`),
  CONSTRAINT `fk-personal_tipo_remuneracion_tipo_remuneracion` FOREIGN KEY (`remuneracion_id`) REFERENCES `tipo_remuneracion` (`id`),
  CONSTRAINT `fk_personal_tipo_remuneracion_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_tipo_remuneracion`
--

LOCK TABLES `personal_tipo_remuneracion` WRITE;
/*!40000 ALTER TABLE `personal_tipo_remuneracion` DISABLE KEYS */;
INSERT INTO `personal_tipo_remuneracion` VALUES (1,1,1,310.00),(2,1,2,40.00),(3,1,3,NULL),(4,1,4,1900.00),(5,2,1,230.00),(6,2,2,40.00),(7,2,3,NULL),(8,2,4,850.00),(9,3,1,260.00),(10,3,2,40.00),(11,3,3,NULL),(12,3,4,1050.00),(13,4,1,230.00),(14,4,2,40.00),(15,4,3,NULL),(16,4,4,7.00),(17,5,1,190.00),(18,5,2,40.00),(19,5,3,NULL),(20,5,4,650.00),(21,6,2,40.00),(22,6,4,97.50),(23,4,1,180.00),(24,7,1,230.00),(25,7,2,40.00),(26,7,3,NULL),(27,7,4,850.00);
/*!40000 ALTER TABLE `personal_tipo_remuneracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peticion_justificacion`
--

DROP TABLE IF EXISTS `peticion_justificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peticion_justificacion` (
  `fecha` date NOT NULL,
  `empleado_id` int NOT NULL,
  `cargo_id` int NOT NULL,
  `razon` text NOT NULL,
  `aceptada` tinyint NOT NULL,
  PRIMARY KEY (`fecha`,`empleado_id`,`cargo_id`),
  CONSTRAINT `fk_peticio_justificacion_inasistencia` FOREIGN KEY (`fecha`, `empleado_id`, `cargo_id`) REFERENCES `inasistencia` (`fecha`, `empleado_id`, `cargo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peticion_justificacion`
--

LOCK TABLES `peticion_justificacion` WRITE;
/*!40000 ALTER TABLE `peticion_justificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `peticion_justificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peticion_prestamo`
--

DROP TABLE IF EXISTS `peticion_prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peticion_prestamo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int NOT NULL,
  `cargo_id` int NOT NULL,
  `tipo_remuneracion_id` int NOT NULL,
  `aceptada` tinyint NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_peticion_prestamo_tipo_remuneracion_idx` (`tipo_remuneracion_id`),
  KEY `fk_peticion_prestamo_empleado_idx` (`empleado_id`,`cargo_id`),
  CONSTRAINT `fk_peticion_prestamo_empleado` FOREIGN KEY (`empleado_id`, `cargo_id`) REFERENCES `empleado_cargo` (`empleado_id`, `cargo_id`),
  CONSTRAINT `fk_peticion_prestamo_tipo_remuneracion` FOREIGN KEY (`tipo_remuneracion_id`) REFERENCES `tipo_remuneracion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peticion_prestamo`
--

LOCK TABLES `peticion_prestamo` WRITE;
/*!40000 ALTER TABLE `peticion_prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `peticion_prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestamo` (
  `prestamo_id` int NOT NULL,
  `dia_aceptacion` date NOT NULL,
  PRIMARY KEY (`prestamo_id`),
  CONSTRAINT `fk_prestamo_peticion_prestamo` FOREIGN KEY (`prestamo_id`) REFERENCES `peticion_prestamo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_permiso`
--

DROP TABLE IF EXISTS `rol_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_permiso` (
  `rol_id` int NOT NULL,
  `permiso_id` int NOT NULL,
  PRIMARY KEY (`rol_id`,`permiso_id`),
  KEY `fk_rol_permiso_permiso_idx` (`permiso_id`),
  CONSTRAINT `fk_rol_permiso_permiso` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`id`),
  CONSTRAINT `fk_rol_permiso_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_remuneracion`
--

DROP TABLE IF EXISTS `tipo_remuneracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_remuneracion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `moneda_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_remuneracion_moneda_idx` (`moneda_id`),
  CONSTRAINT `fk_tipo_remuneracion_moneda` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_remuneracion`
--

LOCK TABLES `tipo_remuneracion` WRITE;
/*!40000 ALTER TABLE `tipo_remuneracion` DISABLE KEYS */;
INSERT INTO `tipo_remuneracion` VALUES (1,'Bono Complementario',1),(2,'Bono de Alimentación',1),(3,'Aguinaldo',1),(4,'Sueldo',2);
/*!40000 ALTER TABLE `tipo_remuneracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_remuneracion_columna`
--

DROP TABLE IF EXISTS `tipo_remuneracion_columna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_remuneracion_columna` (
  `tipo_remuneracion_id` int NOT NULL,
  `columna_id` int NOT NULL,
  PRIMARY KEY (`tipo_remuneracion_id`,`columna_id`),
  KEY `fk_tipo_remuneracion_columna_columna_idx` (`columna_id`),
  CONSTRAINT `fk_tipo_remuneracion_columna_columna` FOREIGN KEY (`columna_id`) REFERENCES `columna` (`id`),
  CONSTRAINT `fk_tipo_remuneracion_columna_tipo_remuneracion` FOREIGN KEY (`tipo_remuneracion_id`) REFERENCES `tipo_remuneracion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_remuneracion_columna`
--

LOCK TABLES `tipo_remuneracion_columna` WRITE;
/*!40000 ALTER TABLE `tipo_remuneracion_columna` DISABLE KEYS */;
INSERT INTO `tipo_remuneracion_columna` VALUES (1,1),(2,1),(3,1),(4,1),(3,2),(4,2),(1,3),(2,3),(3,3),(4,3),(3,4),(4,4),(3,5),(4,5),(3,6),(4,6),(4,7),(4,8),(4,9),(4,10),(4,11),(4,12),(3,13),(4,13),(2,14),(3,14),(4,14),(3,15),(3,16),(3,17),(2,18),(2,19),(2,20),(2,21),(1,22),(1,23),(1,24),(1,25);
/*!40000 ALTER TABLE `tipo_remuneracion_columna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `rol_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_rol_idx` (`rol_id`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacaciones`
--

DROP TABLE IF EXISTS `vacaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int NOT NULL,
  `fecha_toma` varchar(45) NOT NULL,
  `dias_habiles` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vacaciones_empleado_idx` (`empleado_id`),
  CONSTRAINT `fk_vacaciones_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacaciones`
--

LOCK TABLES `vacaciones` WRITE;
/*!40000 ALTER TABLE `vacaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacaciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-18  9:43:39
