-- MariaDB dump 10.19  Distrib 10.9.4-MariaDB, for osx10.18 (arm64)
--
-- Host: localhost    Database: emensawerbeseite
-- ------------------------------------------------------
-- Server version	10.9.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_log`
--

DROP TABLE IF EXISTS `access_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_log` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `access_time` time DEFAULT NULL,
  `log_type` varchar(100) NOT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_log`
--

LOCK TABLES `access_log` WRITE;
/*!40000 ALTER TABLE `access_log` DISABLE KEYS */;
INSERT INTO `access_log` VALUES
(1,'11:41:30','Website Access'),
(2,'11:41:33','Website Access'),
(3,'11:41:34','Website Access'),
(4,'23:12:48','Website Access'),
(5,'23:13:03','Website Access'),
(6,'23:13:04','Website Access'),
(7,'23:13:04','Website Access'),
(8,'23:13:05','Website Access'),
(9,'23:13:05','Website Access'),
(10,'23:13:06','Website Access'),
(11,'23:13:06','Website Access'),
(12,'23:13:06','Website Access'),
(13,'23:13:06','Website Access'),
(14,'23:13:07','Website Access'),
(15,'23:13:07','Website Access'),
(16,'23:13:07','Website Access'),
(17,'23:13:07','Website Access'),
(18,'23:13:07','Website Access'),
(19,'23:13:08','Website Access'),
(20,'23:13:08','Website Access'),
(21,'23:13:08','Website Access'),
(22,'23:13:08','Website Access'),
(23,'23:13:08','Website Access'),
(24,'23:13:08','Website Access'),
(25,'23:13:12','Website Access'),
(26,'14:23:57','Website Access'),
(27,'16:48:53','Website Access'),
(28,'16:01:01','Website Access'),
(29,'16:11:16','Website Access'),
(30,'18:22:43','Website Access'),
(31,'18:22:52','Website Access'),
(32,'16:10:17','Website Access');
/*!40000 ALTER TABLE `access_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `allergen`
--

DROP TABLE IF EXISTS `allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allergen` (
  `code` char(4) NOT NULL,
  `name` varchar(300) NOT NULL,
  `typ` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergen`
--

LOCK TABLES `allergen` WRITE;
/*!40000 ALTER TABLE `allergen` DISABLE KEYS */;
INSERT INTO `allergen` VALUES
('a','Getreideprodukte','Getreide (Gluten)'),
('a1','Weizen','Allergen'),
('a2','Roggen','Allergen'),
('a3','Gerste','Allergen'),
('a4','Dinkel','Allergen'),
('a5','Hafer','Allergen'),
('a6','Kamut','Allergen'),
('b','Fisch','Allergen'),
('c','Krebstiere','Allergen'),
('d','Schwefeldioxid/Sulfit','Allergen'),
('e','Sellerie','Allergen'),
('f','Milch und Laktose','Allergen'),
('f1','Butter','Allergen'),
('f2','K??se','Allergen'),
('f3','Margarine','Allergen'),
('g','Sesam','Allergen'),
('h','N??sse','Allergen'),
('h1','Mandeln','Allergen'),
('h2','Haseln??sse','Allergen'),
('h3','Waln??sse','Allergen'),
('i','Erdn??sse','Allergen');
/*!40000 ALTER TABLE `allergen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht`
--

DROP TABLE IF EXISTS `gericht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(80) NOT NULL,
  `beschreibung` varchar(800) NOT NULL,
  `erfasst_am` date NOT NULL,
  `vegetarisch` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `preis_intern` double NOT NULL,
  `preis_extern` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  CONSTRAINT `controll_price` CHECK (`preis_extern` > `preis_intern`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht`
--

LOCK TABLES `gericht` WRITE;
/*!40000 ALTER TABLE `gericht` DISABLE KEYS */;
INSERT INTO `gericht` VALUES
(1,'Bratkartoffeln mit Speck und Zwiebeln','Kartoffeln mit Zwiebeln und gut Speck','2020-08-25',0,0,2.3,4),
(3,'Bratkartoffeln mit Zwiebeln','Kartoffeln mit Zwiebeln und ohne Speck','2020-08-25',1,1,2.3,4),
(4,'Grilltofu','Fein gew??rzt und mariniert','2020-08-25',1,1,2.5,4.5),
(5,'Lasagne','Klassisch mit Bologneseso??e und Creme Fraiche','2020-08-24',0,0,2.5,4.5),
(6,'Lasagne vegetarisch','Klassisch mit Sojagranulatso??e und Creme Fraiche','2020-08-24',1,0,2.5,4.5),
(7,'Hackbraten','Nicht nur f??r Hacker','2020-08-25',0,0,2.5,4),
(8,'Gem??sepfanne','Gesundes aus der Region, deftig angebraten','2020-08-25',1,1,2.3,4),
(9,'H??hnersuppe','Suppenhuhn trifft Petersilie','2020-08-25',0,0,2,3.5),
(10,'Forellenfilet','mit Kartoffeln und Dilldip','2020-08-22',0,0,3.8,5),
(11,'Kartoffel-Lauch-Suppe','der klassische Bauchw??rmer mit frischen Kr??utern','2020-08-22',1,0,2,3),
(12,'Kassler mit Rosmarinkartoffeln','dazu Salat und Senf','2020-08-23',0,0,3.8,5.2),
(13,'Drei Reibekuchen mit Apfelmus','grob geriebene Kartoffeln aus der Region','2020-08-23',1,0,2.5,4.5),
(14,'Pilzpfanne','die legend??re Pfanne aus Pilzen der Saison','2020-08-23',1,0,3,5),
(15,'Pilzpfanne vegan','die legend??re Pfanne aus Pilzen der Saison ohne K??se','2020-08-24',1,1,3,5),
(16,'K??sebr??tchen','schmeckt vor und nach dem Essen','2020-08-24',1,0,1,1.5),
(17,'Schinkenbr??tchen','schmeckt auch ohne Hunger','2020-08-25',0,0,1.25,1.75),
(18,'Tomatenbr??tchen','mit Schnittlauch und Zwiebeln','2020-08-25',1,1,1,1.5),
(19,'Mousse au Chocolat','sahnige schweizer Schokolade rundet jedes Essen ab','2020-08-26',1,0,1.25,1.75),
(20,'Suppenkreation ?? la Chef','was verschafft werden muss, gut und g??nstig','2020-08-26',0,0,0.5,0.9),
(21,'Currywurst mit Pommes','Ein Klassiker der Gerichte','2022-11-05',0,0,2.5,4.5);
/*!40000 ALTER TABLE `gericht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_allergen`
--

DROP TABLE IF EXISTS `gericht_hat_allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_allergen` (
  `code` char(4) NOT NULL,
  `gericht_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`code`,`gericht_id`),
  KEY `gericht_id` (`gericht_id`),
  CONSTRAINT `gericht_hat_allergen_ibfk_1` FOREIGN KEY (`code`) REFERENCES `allergen` (`code`),
  CONSTRAINT `gericht_hat_allergen_ibfk_2` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_allergen`
--

LOCK TABLES `gericht_hat_allergen` WRITE;
/*!40000 ALTER TABLE `gericht_hat_allergen` DISABLE KEYS */;
INSERT INTO `gericht_hat_allergen` VALUES
('a1',15),
('a2',7),
('a2',9),
('a3',1),
('a3',4),
('a3',8),
('a4',1),
('a4',4),
('a4',15),
('a5',12),
('a6',3),
('c',1),
('c',7),
('d',6),
('d',10),
('f',10),
('f1',1),
('f1',3),
('f1',4),
('f2',12),
('f3',15),
('h',1),
('h1',7),
('h1',12),
('h3',4),
('h3',7),
('h3',10),
('h3',15),
('i',3),
('i',14),
('i',15);
/*!40000 ALTER TABLE `gericht_hat_allergen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_kategorie`
--

DROP TABLE IF EXISTS `gericht_hat_kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_kategorie` (
  `gericht_id` tinyint(4) NOT NULL,
  `kategorie_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`gericht_id`,`kategorie_id`),
  KEY `kategorie_id` (`kategorie_id`),
  CONSTRAINT `gericht_hat_kategorie_ibfk_1` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`),
  CONSTRAINT `gericht_hat_kategorie_ibfk_2` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_kategorie`
--

LOCK TABLES `gericht_hat_kategorie` WRITE;
/*!40000 ALTER TABLE `gericht_hat_kategorie` DISABLE KEYS */;
INSERT INTO `gericht_hat_kategorie` VALUES
(1,3),
(3,3),
(4,3),
(5,3),
(6,3),
(7,3),
(9,3),
(16,4),
(16,5),
(17,4),
(17,5),
(18,4),
(18,5),
(21,3);
/*!40000 ALTER TABLE `gericht_hat_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorie` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(80) NOT NULL,
  `eltern_id` tinyint(4) DEFAULT NULL,
  `bildname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `eltern_id` (`eltern_id`),
  CONSTRAINT `kategorie_ibfk_1` FOREIGN KEY (`eltern_id`) REFERENCES `kategorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;
INSERT INTO `kategorie` VALUES
(1,'Aktionen',NULL,'kat_aktionen.png'),
(2,'Menus',NULL,'kat_menu.gif'),
(3,'Hauptspeisen',2,'kat_menu_haupt.bmp'),
(4,'Vorspeisen',2,'kat_menu_vor.svg'),
(5,'Desserts',2,'kat_menu_dessert.pic'),
(6,'Mensastars',1,'kat_stars.tif'),
(7,'Erstiewoche',1,'kat_erties.jpg');
/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-18 17:17:52
