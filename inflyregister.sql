-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: inflyregister
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

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
-- Table structure for table `data_customer`
--

DROP TABLE IF EXISTS `data_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `paket` varchar(255) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `nik_customer` varchar(255) NOT NULL,
  `tlp_customer` varchar(50) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  PRIMARY KEY (`id_customer`),
  KEY `id_kelurahan` (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`),
  KEY `id_kota` (`id_kota`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `FK_customer_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `data_kecamatan` (`id_kecamatan`),
  CONSTRAINT `FK_customer_kelurahan` FOREIGN KEY (`id_kelurahan`) REFERENCES `data_kelurahan` (`id_kelurahan`),
  CONSTRAINT `FK_customer_kota` FOREIGN KEY (`id_kota`) REFERENCES `data_kota` (`id_kota`),
  CONSTRAINT `FK_customer_status` FOREIGN KEY (`id_status`) REFERENCES `data_status` (`id_status`),
  CONSTRAINT `data_customer_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `data_kelurahan` (`id_kelurahan`),
  CONSTRAINT `data_customer_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `data_kota` (`id_kota`),
  CONSTRAINT `data_customer_ibfk_3` FOREIGN KEY (`id_kecamatan`) REFERENCES `data_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_customer`
--

LOCK TABLES `data_customer` WRITE;
/*!40000 ALTER TABLE `data_customer` DISABLE KEYS */;
INSERT INTO `data_customer` VALUES (2,'1','a','22','2312313','gg',1,1,1,1,'0000-00-00','Luky'),(5,'1','a','2','3','c',2,1,1,1,'0000-00-00','Luky'),(6,'2','x','5','z','n',2,1,1,1,'0000-00-00','Luky');
/*!40000 ALTER TABLE `data_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_jabatan`
--

DROP TABLE IF EXISTS `data_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_jabatan`
--

LOCK TABLES `data_jabatan` WRITE;
/*!40000 ALTER TABLE `data_jabatan` DISABLE KEYS */;
INSERT INTO `data_jabatan` VALUES (1,''),(2,'Founder');
/*!40000 ALTER TABLE `data_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_kecamatan`
--

DROP TABLE IF EXISTS `data_kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_kota` int(11) NOT NULL,
  PRIMARY KEY (`id_kecamatan`),
  KEY `id_kota` (`id_kota`),
  CONSTRAINT `FK_kecamatan_kota` FOREIGN KEY (`id_kota`) REFERENCES `data_kota` (`id_kota`),
  CONSTRAINT `data_kecamatan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `data_kota` (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_kecamatan`
--

LOCK TABLES `data_kecamatan` WRITE;
/*!40000 ALTER TABLE `data_kecamatan` DISABLE KEYS */;
INSERT INTO `data_kecamatan` VALUES (1,'Kademangan',1),(2,'Kanigaran',1),(3,'Kedopok',1),(4,'Mayangan',1),(5,'Wonoasih',1);
/*!40000 ALTER TABLE `data_kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_kelurahan`
--

DROP TABLE IF EXISTS `data_kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_kelurahan` (
  `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelurahan` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`),
  CONSTRAINT `FK_kelurahan_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `data_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_kelurahan`
--

LOCK TABLES `data_kelurahan` WRITE;
/*!40000 ALTER TABLE `data_kelurahan` DISABLE KEYS */;
INSERT INTO `data_kelurahan` VALUES (1,'Kademangan',1),(2,'Ketapang',1);
/*!40000 ALTER TABLE `data_kelurahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_kota`
--

DROP TABLE IF EXISTS `data_kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_kota`
--

LOCK TABLES `data_kota` WRITE;
/*!40000 ALTER TABLE `data_kota` DISABLE KEYS */;
INSERT INTO `data_kota` VALUES (1,'Kota Probolinggo'),(2,'Kabupaten Probolinggo');
/*!40000 ALTER TABLE `data_kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_login`
--

DROP TABLE IF EXISTS `data_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nama_login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_login`
--

LOCK TABLES `data_login` WRITE;
/*!40000 ALTER TABLE `data_login` DISABLE KEYS */;
INSERT INTO `data_login` VALUES (1,'Admin Infly Networks','adminInflynetworks@gmail.com','12345','admin'),(2,'Super Admin Infly Networks','superadminInflynetworks@gmail.com','12345','superadmin');
/*!40000 ALTER TABLE `data_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pegawai`
--

DROP TABLE IF EXISTS `data_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(255) NOT NULL,
  `nik_pegawai` varchar(255) NOT NULL,
  `tlp_pegawai` varchar(255) NOT NULL,
  `id_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `FK_pegawai_jabatan` (`id_jabatan`),
  CONSTRAINT `FK_pegawai_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `data_jabatan` (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pegawai`
--

LOCK TABLES `data_pegawai` WRITE;
/*!40000 ALTER TABLE `data_pegawai` DISABLE KEYS */;
INSERT INTO `data_pegawai` VALUES (1,'Luky','213149786175','0812345678',1,'Founder');
/*!40000 ALTER TABLE `data_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_status`
--

DROP TABLE IF EXISTS `data_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_status`
--

LOCK TABLES `data_status` WRITE;
/*!40000 ALTER TABLE `data_status` DISABLE KEYS */;
INSERT INTO `data_status` VALUES (1,'Berlangganan Baru'),(2,'Survey'),(3,'Instalasi'),(4,'Tidak Tercover');
/*!40000 ALTER TABLE `data_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'inflyregister'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-20 13:55:09
