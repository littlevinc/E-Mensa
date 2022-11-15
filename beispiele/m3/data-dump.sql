-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for osx10.17 (arm64)
--
-- Host: localhost    Database: emensawerbeseite
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

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
-- Table structure for table `allergen`
--

DROP TABLE IF EXISTS `allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allergen` (
  `code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('f2','Käse','Allergen'),
('f3','Margarine','Allergen'),
('g','Sesam','Allergen'),
('h','Nüsse','Allergen'),
('h1','Mandeln','Allergen'),
('h2','Haselnüsse','Allergen'),
('h3','Walnüsse','Allergen'),
('i','Erdnüsse','Allergen');
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
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschreibung` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL,
  `erfasst_am` date NOT NULL,
  `vegetarisch` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `preis_intern` double NOT NULL,
  `preis_extern` double NOT NULL,
  PRIMARY KEY (`id`),
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
(4,'Grilltofu','Fein gewürzt und mariniert','2020-08-25',1,1,2.5,4.5),
(5,'Lasagne','Klassisch mit Bolognesesoße und Creme Fraiche','2020-08-24',0,0,2.5,4.5),
(6,'Lasagne vegetarisch','Klassisch mit Sojagranulatsoße und Creme Fraiche','2020-08-24',1,0,2.5,4.5),
(7,'Hackbraten','Nicht nur für Hacker','2020-08-25',0,0,2.5,4),
(8,'Gemüsepfanne','Gesundes aus der Region, deftig angebraten','2020-08-25',1,1,2.3,4),
(9,'Hühnersuppe','Suppenhuhn trifft Petersilie','2020-08-25',0,0,2,3.5),
(10,'Forellenfilet','mit Kartoffeln und Dilldip','2020-08-22',0,0,3.8,5),
(11,'Kartoffel-Lauch-Suppe','der klassische Bauchwärmer mit frischen Kräutern','2020-08-22',1,0,2,3),
(12,'Kassler mit Rosmarinkartoffeln','dazu Salat und Senf','2020-08-23',0,0,3.8,5.2),
(13,'Drei Reibekuchen mit Apfelmus','grob geriebene Kartoffeln aus der Region','2020-08-23',1,0,2.5,4.5),
(14,'Pilzpfanne','die legendäre Pfanne aus Pilzen der Saison','2020-08-23',1,0,3,5),
(15,'Pilzpfanne vegan','die legendäre Pfanne aus Pilzen der Saison ohne Käse','2020-08-24',1,1,3,5),
(16,'Käsebrötchen','schmeckt vor und nach dem Essen','2020-08-24',1,0,1,1.5),
(17,'Schinkenbrötchen','schmeckt auch ohne Hunger','2020-08-25',0,0,1.25,1.75),
(18,'Tomatenbrötchen','mit Schnittlauch und Zwiebeln','2020-08-25',1,1,1,1.5),
(19,'Mousse au Chocolat','sahnige schweizer Schokolade rundet jedes Essen ab','2020-08-26',1,0,1.25,1.75),
(20,'Suppenkreation á la Chef','was verschafft werden muss, gut und günstig','2020-08-26',0,0,0.5,0.9),
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
  `code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eltern_id` tinyint(4) DEFAULT NULL,
  `bildname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
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

-- Dump completed on 2022-11-05 15:21:12
