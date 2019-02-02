-- MySQL dump 10.16  Distrib 10.2.10-MariaDB, for osx10.13 (x86_64)
--
-- Host: localhost    Database: skt_menu
-- ------------------------------------------------------
-- Server version	10.2.10-MariaDB

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
-- Table structure for table `bottles`
--

DROP TABLE IF EXISTS `bottles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bottles` (
  `bottle_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_price` int(11) DEFAULT NULL,
  `sake_id` int(10) unsigned DEFAULT NULL,
  `wine_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bottle_id`),
  KEY `bottles_sake_id_foreign` (`sake_id`),
  KEY `bottles_wine_id_foreign` (`wine_id`),
  CONSTRAINT `bottles_sake_id_foreign` FOREIGN KEY (`sake_id`) REFERENCES `sakes` (`sake_id`) ON DELETE CASCADE,
  CONSTRAINT `bottles_wine_id_foreign` FOREIGN KEY (`wine_id`) REFERENCES `wines` (`wine_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bottles`
--

LOCK TABLES `bottles` WRITE;
/*!40000 ALTER TABLE `bottles` DISABLE KEYS */;
/*!40000 ALTER TABLE `bottles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_add_on_items`
--

DROP TABLE IF EXISTS `c_add_on_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_add_on_items` (
  `c_add_on_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`c_add_on_id`),
  KEY `c_add_on_item_course_id_foreign` (`course_id`),
  CONSTRAINT `c_add_on_item_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_add_on_items`
--

LOCK TABLES `c_add_on_items` WRITE;
/*!40000 ALTER TABLE `c_add_on_items` DISABLE KEYS */;
INSERT INTO `c_add_on_items` VALUES (1,'Served with miso soup',NULL,1,NULL,'2018-03-27 07:21:39'),(2,'Substitute with all sustainable fish/ +3',NULL,1,NULL,NULL),(3,'Add sashimi course',15,2,'2018-03-24 00:32:58','2018-04-06 21:52:38'),(4,'Add sake pairing',23,2,'2018-03-24 00:35:31','2018-04-06 21:52:38'),(14,'Add sashimi course',15,36,NULL,NULL),(15,'Add sake pairing',34,36,NULL,NULL),(16,'Add sashimi course',15,4,NULL,NULL),(17,'Add sake pairing',40,4,NULL,NULL),(20,'Featuring lcal and seasonal ingredients in an authentic yet creative Japanese prepatation.',NULL,39,NULL,NULL);
/*!40000 ALTER TABLE `c_add_on_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_items`
--

DROP TABLE IF EXISTS `c_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_items` (
  `c_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`c_item_id`),
  KEY `c_item_course_id_foreign` (`course_id`),
  CONSTRAINT `c_item_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_items`
--

LOCK TABLES `c_items` WRITE;
/*!40000 ALTER TABLE `c_items` DISABLE KEYS */;
INSERT INTO `c_items` VALUES (1,'Bara Chirashi*',25,'sushi rice layered with nori, shrimp oboro, tamago, ginger and topped with a mix of tuna, salmon, yellowtail and ikura','N',1,NULL,NULL),(2,'Sushi Combo*',28,'seven pieces of nigiri sushi and a roll','N',1,NULL,NULL),(3,'Sashimi Combo*',30,'variety of sashimi chosen by the chef served with rice','N',1,NULL,NULL),(4,'Washington albacore tuna and mustard green*,',NULL,NULL,'Y',2,'2018-03-24 01:02:22','2018-04-06 21:52:38'),(5,'Shigoku oysters on the half shell*, or',NULL,NULL,'N',2,'2018-03-24 01:11:37','2018-04-06 21:52:38'),(6,'String bean salad',NULL,NULL,'N',2,'2018-03-24 01:13:56','2018-04-06 21:52:38'),(7,'Bara chirashi*, or',NULL,NULL,'Y',2,'2018-03-24 01:15:07','2018-04-06 21:52:38'),(8,'Sushi combination*',NULL,NULL,'N',2,'2018-03-24 01:15:51','2018-04-06 21:52:38'),(9,'Chestnut and butter scotch creme brulee, or',NULL,NULL,'Y',2,'2018-03-24 01:16:47','2018-04-06 21:52:38'),(11,'Yuzu and yogurt panna cotta',NULL,NULL,'N',2,'2018-03-24 01:17:55','2018-04-06 21:52:38'),(15,'Washington albacore tuna and mustard green*,',NULL,NULL,'Y',36,NULL,NULL),(16,'Shigoku oysters on the half shell*, or',NULL,NULL,'N',36,NULL,NULL),(17,'String bean salad',NULL,NULL,'N',36,NULL,NULL),(18,'Chawanmushi',NULL,NULL,'N',36,NULL,NULL),(19,'Special roll*',NULL,NULL,'N',36,NULL,NULL),(20,'Chef\'s selection of 7 pieces of Sushi',NULL,NULL,'N',36,NULL,NULL),(21,'Chestnut and butter scotch creme brulee, or',NULL,NULL,'Y',36,NULL,NULL),(23,'Yuzu and yogurt panna cotta',NULL,NULL,'N',36,NULL,NULL),(24,'Washington albacore tuna and mustard green*,',NULL,NULL,'Y',4,NULL,NULL),(25,'Shigoku oysters on the half shell*, or',NULL,NULL,'N',4,NULL,NULL),(26,'String bean salad',NULL,NULL,'N',4,NULL,NULL),(27,'Chawanmushi',NULL,NULL,'N',4,NULL,NULL),(28,'Black cod miso yuan yaki',NULL,NULL,'N',4,NULL,NULL),(29,'Chef\'s selection of 5 pieces of Sushi*',NULL,NULL,'N',4,NULL,NULL),(30,'Chef\'s selection of 5 pieces of Sushi*',NULL,NULL,'N',4,NULL,NULL),(31,'Chestnut and butter scotch creme brulee, or',NULL,NULL,'Y',4,NULL,NULL),(33,'Yuzu and yogurt panna cotta',NULL,NULL,'N',4,NULL,NULL),(37,'Sashimi Omakase',NULL,NULL,'N',39,NULL,NULL),(38,'Sushi Omakase',NULL,NULL,'N',39,NULL,NULL),(42,'Seven course Omakase',110,'Add sake pairing/ +55','N',39,NULL,NULL);
/*!40000 ALTER TABLE `c_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_omakases`
--

DROP TABLE IF EXISTS `c_omakases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_omakases` (
  `c_omakase_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `om_price` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_price` int(11) DEFAULT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`c_omakase_id`),
  KEY `c_omakase_course_id_foreign` (`course_id`),
  CONSTRAINT `c_omakase_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_omakases`
--

LOCK TABLES `c_omakases` WRITE;
/*!40000 ALTER TABLE `c_omakases` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_omakases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `categories_title_id_foreign` (`title_id`),
  CONSTRAINT `categories_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `page_titles` (`title_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_omakase` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_order` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Two courses',NULL,NULL,'2018-03-27 07:38:03','',1),(2,'Three courses',39,'2018-03-24 00:27:21','2018-03-27 07:50:43','',2),(4,'Six courses',90,'2018-03-24 00:47:06','2018-03-27 06:58:34','',4),(36,'Five courses',55,'2018-04-05 03:36:27','2018-04-17 01:03:17','',3),(39,'Omakase',NULL,'2018-04-17 00:36:45','2018-05-09 00:39:37','Y',5);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ippins`
--

DROP TABLE IF EXISTS `ippins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ippins` (
  `ippin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_sustainable` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_raw` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_gf` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_special` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_on_menu` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ippin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ippins`
--

LOCK TABLES `ippins` WRITE;
/*!40000 ALTER TABLE `ippins` DISABLE KEYS */;
INSERT INTO `ippins` VALUES (1,'Mustard greens and Washington albacore tuna dressed with an almond wasabi sauce',10,'Y','Y','Y','AP','N','Y',NULL,NULL),(2,'Asparagus and himeji mushrooms in a creamy tofu sauce',9,'N','N','Y','AP','N','Y',NULL,NULL),(3,'Tempura assortment with white prawns, local rockfish, kabocha squash, shishito pepper, and satsuma yam',17,'Y','N','N','TM','N','Y',NULL,NULL),(4,'Madai (Ehime, JP) aradaki with hari ginger and fresh gobo',NULL,'N','N','Y','FS','N','N',NULL,NULL),(5,'Skagit River Ranch organic pork tenderloin tonkatsu with sesame tonkatsu sauce',19,'N','N','N','MT','N','Y',NULL,NULL),(6,'Organic butter lettuce, radishes, toasted almonds and Washington Fuji apples tossed in a sweet miso dressing',15,'N','N','Y','AP','N','Y','2018-03-18 13:34:16','2018-03-18 13:43:34'),(7,'Shigoku oysters on the half shell with momiji ponzu',20,'Y','Y','Y','AP','N','Y','2018-03-18 13:36:18','2018-03-18 13:36:18'),(8,'Assorted vegetable tempura with kabocha squash, asparagus, organic shiitake, shishito pepper and satsuma yam served with shiitake mushroom and konbu dashi',14,'N','N','N','TM','N','Y','2018-03-18 14:01:10','2018-03-18 14:01:10'),(9,'Braised Snake River Farms wagyu beef skirt konabe with maitake mushrooms and yuchoi',20,'N','N','Y','MT','N','Y','2018-03-18 14:02:39','2018-03-18 14:02:39'),(10,'Edited test item',NULL,'Y','N','Y','AP','N','N','2018-04-12 01:03:53','2018-05-21 02:17:27'),(11,'Hijiki seaweed nimono',9,'N','N','Y','AP','N','Y','2018-05-17 00:47:41','2018-05-17 00:47:57'),(12,'Shishito peppers blistered and sprinkled with sea salt',9,'N','N','Y','AP','N','Y','2018-05-17 00:54:36','2018-05-17 00:54:36'),(13,'Geoduck (Puget Sound, WA) tender with mustard greens and shimeji mushrooms sautéed in a sake soy butter sauce',17,'Y','N','N','FS','N','Y','2018-05-17 01:02:26','2018-05-17 01:53:08'),(14,'Shishito peppers blistered and sprinkled with sea salt',9,'N','N','Y','AP','N','N','2018-05-17 01:08:45','2018-05-17 01:08:45'),(15,'Shishito peppers blistered and sprinkled with sea salt',9,'N','N','Y','AP','N','N','2018-05-17 01:09:30','2018-05-17 01:09:30'),(16,'Shishito peppers blistered and sprinkled with sea salt',9,'N','N','Y','AP','N','N','2018-05-17 01:09:42','2018-05-17 01:09:42'),(17,'King salmon kama shioyaki',NULL,'Y','N','Y','FS','N','N','2018-05-17 01:53:54','2018-05-25 04:57:01'),(18,'Alaskan kinki nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N','2018-05-17 01:54:07','2018-05-17 01:54:07'),(19,'Alaskan kinki nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N','2018-05-17 01:55:17','2018-05-17 01:55:17'),(20,'Black cod (Nea Bay, WA) miso yuanyaki',20,'Y','N','Y','FS','N','Y','2018-05-18 00:37:32','2018-05-18 00:37:32'),(21,'E Test item',NULL,'Y','Y','Y','AP','N','N','2018-05-21 02:13:19','2018-05-23 00:51:44'),(22,'Test item 2',NULL,'Y','Y','Y','AP','N','N','2018-05-21 02:14:08','2018-05-21 02:14:08'),(23,'Edited Test item 3',NULL,'Y','Y','Y','AP','N','N','2018-05-21 02:14:17','2018-05-23 00:47:06'),(24,'Test item 4',NULL,'Y','Y','Y','AP','N','N','2018-05-21 02:14:36','2018-05-21 02:14:36'),(25,'Test item 4',NULL,'Y','Y','Y','AP','N','N','2018-05-21 02:15:33','2018-05-21 02:15:33'),(26,'Test 6',NULL,'Y','Y','Y','AP','N','N','2018-05-23 00:41:53','2018-05-23 00:41:53'),(27,'Test 6',NULL,'Y','Y','Y','AP','N','N','2018-05-23 00:41:53','2018-05-23 00:41:53'),(28,'Test 7',NULL,'Y','Y','Y','AP','N','N','2018-05-23 00:45:44','2018-05-23 00:45:44'),(29,'Kinki nitsuke (Neah Bay) with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(30,'Red king salmon kama shioyaki',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(31,'Spotted parrot fish (Japan) aradaki with hari ginger and fresh gobo',16,'Y','N','Y','FS','N','N',NULL,NULL),(32,'Grouper (East Coast) aradaki with hari ginger and fresh gobo',16,'Y','N','Y','FS','N','N',NULL,NULL),(33,'Sakura smoked tofu with scallions, ginger, dark soy sauce and sizzling peanut oil',12,'N','N','N','AP','N','N',NULL,NULL),(34,'Duck breast sansho yaki served medium rare  with sauteed mustard greens',21,'N','Y','Y','MT','N','N',NULL,NULL),(35,'Dobin-mushi with Olympic Peninsula Matsutake, Neah Bay black cod, and red crab steamed with clam dashi',20,'Y','N','Y','AP','N','N',NULL,NULL),(36,'Bering Sea octopus tempura with matcha sea salt',12,'Y','N','N','TM','N','N',NULL,NULL),(37,'Steamed and chilled monk fish liver in ponzu sauce',12,'Y','N','Y','AP','N','Y',NULL,NULL),(38,'Kinmedai (New Zealand) aradaki with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','Y',NULL,NULL),(39,'King Salmon (Alaska) kama shioyaki',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(40,'Live sea urchin (San Juan Islands, WA) Sashimi',24,'Y','Y','Y','FS','N','Y',NULL,NULL),(41,'Golden eye snapper (Japan) aradaki with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','Y',NULL,NULL),(42,'Rockfish aradaki with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','Y',NULL,NULL),(43,'Tempura with wild white prawns, purple yam, maitake mushroom and shishito pepper with matcha se salt',20,'Y','N','N','TM','N','Y',NULL,NULL),(44,'Cabezone nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(45,'Cabezone (Neah Bay) tempura served with matcha sea salt',16,'Y','N','N','TM','N','N',NULL,NULL),(46,'Ling Cod (Neah Bay, WA) steamed with fresh ginger, scallions, dark soy sauce and topped with sizzling peanut oil',19,'Y','N','N','FS','N','Y',NULL,NULL),(47,'Rock fish (Neah Bay) nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(48,'Ocean Perch (Washington) nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(49,'Sockeye salmon (Bristol Bay) kama shioyaki',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(50,'Halibut (Neah Bay, WA) tempura served with matcha sea salt',18,'Y','N','N','AP','N','N',NULL,NULL),(51,'Neah Bay Rockfish nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(52,'Spring King salmon (Washington) kama shioyaki',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(53,'Pan seared Copper River smelt served with ponzu dipping sauce',14,'Y','N','N','FS','N','N',NULL,NULL),(54,'Black rockfish (Neah Bay) nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(55,'Rooftop nasu eggplant misoni',7,'N','N','Y','AP','N','N',NULL,NULL),(56,'Sockeye salmon (Fraser River) kama shioyaki',NULL,'Y','N','Y','FS','N','N',NULL,NULL),(57,'Red rockfish (Neah Bay, WA) nitsuke with hari ginger and fresh gobo',NULL,'Y','N','Y','FS','N','N',NULL,NULL);
/*!40000 ALTER TABLE `ippins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_displays`
--

DROP TABLE IF EXISTS `l_displays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_displays` (
  `l_disp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disp_section` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_title` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_subtitle` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_combo_title` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_combo_desc` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lunch_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`l_disp_id`),
  KEY `l_display_lunch_id_foreign` (`lunch_id`),
  CONSTRAINT `l_display_lunch_id_foreign` FOREIGN KEY (`lunch_id`) REFERENCES `lunches` (`lunch_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_displays`
--

LOCK TABLES `l_displays` WRITE;
/*!40000 ALTER TABLE `l_displays` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_displays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_item_displays`
--

DROP TABLE IF EXISTS `l_item_displays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_item_displays` (
  `l_item_disp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disp_name` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_desc` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`l_item_disp_id`),
  KEY `l_item_display_l_item_id_foreign` (`l_item_id`),
  CONSTRAINT `l_item_display_l_item_id_foreign` FOREIGN KEY (`l_item_id`) REFERENCES `l_items` (`l_item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_item_displays`
--

LOCK TABLES `l_item_displays` WRITE;
/*!40000 ALTER TABLE `l_item_displays` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_item_displays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_items`
--

DROP TABLE IF EXISTS `l_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_items` (
  `l_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_raw` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lunch_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`l_item_id`),
  KEY `l_item_lunch_id_foreign` (`lunch_id`),
  CONSTRAINT `l_item_lunch_id_foreign` FOREIGN KEY (`lunch_id`) REFERENCES `lunches` (`lunch_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_items`
--

LOCK TABLES `l_items` WRITE;
/*!40000 ALTER TABLE `l_items` DISABLE KEYS */;
INSERT INTO `l_items` VALUES (1,'Asa Gozen',23,'Wild sockeye salmon shioyaki and organic tamago yaki','N',1,NULL,NULL),(2,'Hiru Gozen',28,'Braised Snake River Ranch Wagyu beef skirt steak and maitake mushrooms konabe and Chef\'s sashimi selection of the day','Y',1,NULL,NULL),(3,'Nigiri Gozen',33,'seven pieces of chef\'s choice nigiri sushi','Y',1,NULL,NULL),(4,'Bara Chirashi',25,'Sushi rice layered with nori, shrimp oboro, tamago, ginger and topped with a mix of tuna, salmon, yellowtail, albacore and ikura','Y',2,NULL,NULL),(5,'Tempura Udon',19,'Udon with two wild gulf prawn tempura with scallion','N',3,NULL,NULL),(6,'Mustard greens and Washington albacore tuna dressed with an almond wasabi sauce',10,NULL,'Y',4,NULL,NULL),(7,'Organic spring mix, radishes, toasted almonds and Washington Fuji apples tossed in a sweet miso dressing',15,NULL,'N',4,NULL,NULL),(8,'Totten Shigoku oysters on the half shell with momiji ponzu',20,NULL,'Y',4,NULL,NULL),(9,'Chawan mushi with Jidori eggs, red crab and Neah Bay black cod',11,NULL,'N',4,NULL,NULL),(10,'Tempura Udon Combo',25,'Tempura udon with 3 pieces of nigiri of maguro, hamachi, and sockeye salmon','Y',3,NULL,NULL),(15,'Sushi Combo',28,'7 pieces of nigiri with a roll','Y',2,NULL,NULL),(16,'Deluxe Sushi Combo',33,'9 pieces of nigiri with a roll','Y',2,NULL,NULL),(17,'Sashimi Combo',30,'Daily selection of sashimi served with rice','Y',2,NULL,NULL);
/*!40000 ALTER TABLE `l_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lunches`
--

DROP TABLE IF EXISTS `lunches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lunches` (
  `lunch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `combo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `combo_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lunch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lunches`
--

LOCK TABLES `lunches` WRITE;
/*!40000 ALTER TABLE `lunches` DISABLE KEYS */;
INSERT INTO `lunches` VALUES (1,'Gozen','','All gozen Include:','Hijiki, agedashi tofu, string beans, and miso soup /   \r\nSubstitute with chawanmushi for miso +4 /\r\nAdd chef\'s sashimi selection +10 /\r\nAdd yuzu yogurt panna cotta +3',NULL,'2018-06-25 11:02:14'),(2,'Combinations','','','All combinations are served with miso soup / with all sustainable fish +3',NULL,'2018-06-25 11:05:54'),(3,'Noodle','','','','2018-06-02 01:24:11','2018-06-07 10:31:40'),(4,'Lunch Ippins',NULL,NULL,NULL,'2018-06-02 01:47:54','2018-06-02 01:47:54');
/*!40000 ALTER TABLE `lunches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (21,'2014_10_12_000000_create_users_table',1),(22,'2014_10_12_100000_create_password_resets_table',1),(23,'2018_03_01_040222_create_sb_table',1),(24,'2018_03_01_050908_create_ippin_table',1),(25,'2018_03_01_051355_create_roll_table',1),(26,'2018_03_01_051727_create_course_table',1),(27,'2018_03_01_051927_create_c_item_table',1),(28,'2018_03_01_172340_create_c_add_on_item_table',1),(29,'2018_03_01_172709_create_c_omakase_table',1),(30,'2018_03_01_174029_create_lunch_table',1),(31,'2018_03_01_175646_create_l_item_table',1),(32,'2018_03_01_175835_create_l_display_table',1),(33,'2018_03_01_180436_create_l_item_display_table',1),(34,'2018_03_01_180644_create_update_table',1),(35,'2018_03_04_234321_change_table_names',2),(36,'2018_03_15_224136_add_timestamps_to_tables',3),(37,'2018_05_08_171207_add_omakase_to_course',4),(38,'2018_05_09_204924_add_list_order_to_course',5),(39,'2018_05_29_202847_change_lunch_table_name',6),(46,'2018_12_06_180228_add_description2',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_titles`
--

DROP TABLE IF EXISTS `page_titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_titles` (
  `title_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_titles`
--

LOCK TABLES `page_titles` WRITE;
/*!40000 ALTER TABLE `page_titles` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_area` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolls`
--

DROP TABLE IF EXISTS `rolls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rolls` (
  `roll_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_sustainable` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_raw` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_gf` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_special` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_on_menu` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`roll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolls`
--

LOCK TABLES `rolls` WRITE;
/*!40000 ALTER TABLE `rolls` DISABLE KEYS */;
INSERT INTO `rolls` VALUES (1,'Black Cod, Avocado & Cucumber','Grilled Neah Bay black cod, avocado and cucumber',12,'Y','N','Y','SP_R','N','Y',NULL,NULL),(2,'Black Dragon Roll','Shrimp tempura, avocado, cucumber topped with grilled black cod, black tobiko, yuzu gosh and tsume sauce',23,'N','Y','N','SP_R','N','Y',NULL,'2018-09-12 00:49:01'),(3,'California Roll','Crab, avocado, mayo, cucumber, masago',10,'N','Y','N','R','N','Y',NULL,'2018-05-30 01:08:25'),(4,'Negihama Roll','Yellowtail, green onions, avocado, cucumber',10,'N','Y','Y','R','N','Y',NULL,NULL),(5,'Avocado Roll','Fresh avocado',4,'N','N','Y','VG_R','N','Y',NULL,NULL),(6,'Eastlake Vegetable Roll','Satsuma yam and kabocha squash tempura, romaine lettuce, cucumber, avocado and ume paste',9,'N','N','N','VG_R','N','Y',NULL,NULL),(7,'Oishi Roll','Shrimp tempura, avocado, and cucumber topped with seared creamy spicy crab, scallop and masago',20,'N','Y','N','SP_R','N','Y','2018-03-20 14:05:39','2018-03-20 14:05:39'),(8,'Ebi-Tempura Roll','Wild Shrimp tempura, cucumber, avocado, masago',11,'N','Y','N','R','N','Y','2018-03-20 14:06:31','2018-03-20 14:06:31'),(9,'Golden Dragon Roll','Spicy tuna, avocado, cucumber, and jalapeno inside topped with spicy tuna and golden tobiko',23,'N','Y','N','SP_R','N','Y','2018-05-30 00:58:44','2018-05-30 00:58:44'),(10,'Hamtastic Roll','Yellowtail, green onions, cucumber, avocado topped with yellowtail, jalapeno, golden tobiko and ponzu',23,'N','Y','N','SP_R','N','Y','2018-05-30 00:59:46','2018-05-30 01:01:41'),(11,'Rising Salmon Roll','Wild salmon, avocado, cucumber topped with seared salmon, nikiri sauce, jalapeno and golden tobiko',21,'N','Y','N','SP_R','N','Y','2018-05-30 01:07:40','2018-05-30 01:07:40'),(12,'Gari Saba','Japanese mackerel, ginger, shiso leaf',9,'Y','Y','Y','R','N','Y','2018-05-30 01:41:05','2018-05-30 01:41:05'),(13,'Futomaki','kampyo fourd, organic tamago, spinach, shrimp oboro',9,'N','Y','Y','R','N','Y','2018-05-30 01:42:08','2018-05-30 01:42:08'),(14,'Rosanna Roll','Hokkaido sea scallops, crab, masago, avocado, mayo',9,'N','Y','N','R','N','Y','2018-05-30 01:43:01','2018-05-30 01:43:01'),(15,'Salmon Skin Roll','Kaiware, green onion, gobo, broiled wild salmon skin',8,'Y','N','Y','R','N','Y','2018-05-30 01:43:40','2018-05-30 01:43:40'),(16,'Seattle Roll','Wild salmon, avocado, cucumber, masago',10,'Y','Y','N','R','N','Y','2018-05-30 01:51:09','2018-05-30 01:51:09'),(17,'Spicy Tuna Roll','Tuna, spicy chili sauce, cucumber, avocado',9,'N','Y','N','R','N','Y','2018-05-30 01:51:45','2018-05-30 01:51:45'),(18,'Spider Roll','Fried Maryland blue soft shell crab, cucumber, avocado, masago',13,'Y','Y','Y','R','N','Y','2018-05-30 01:52:38','2018-05-30 01:52:38'),(19,'Cucumber and Avocado Roll','Fresh avocado and cucumber slices',5,'N','N','Y','VG_R','N','Y','2018-05-30 01:53:34','2018-05-30 01:53:34'),(20,'Oshinko Maki','Pickled daikon radish',4,'N','N','Y','VG_R','N','Y','2018-05-30 01:54:02','2018-05-30 01:54:02'),(21,'Kappa Maki','Cucumber roll',4,'N','N','Y','VG_R','N','Y','2018-05-30 01:54:26','2018-05-30 01:54:26'),(22,'Super Yummy Roll','Spinach, shiitake, kampyo gourd, avocado, pickled plum, shiso leaf',8,'N','N','Y','VG_R','N','Y','2018-05-30 01:55:28','2018-05-30 01:55:28'),(23,'Ume Shiso Roll','Pickled plum, shiso leaf, cucumber',4,'N','N','Y','VG_R','N','Y','2018-05-30 01:55:57','2018-05-30 01:55:57');
/*!40000 ALTER TABLE `rolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sakes`
--

DROP TABLE IF EXISTS `sakes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sakes` (
  `sake_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rice` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sweetness` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sake_id`),
  KEY `sakes_product_id_foreign` (`product_id`),
  CONSTRAINT `sakes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sakes`
--

LOCK TABLES `sakes` WRITE;
/*!40000 ALTER TABLE `sakes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sakes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sbs`
--

DROP TABLE IF EXISTS `sbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sbs` (
  `sb_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eng_name` char(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jpn_name` char(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` char(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nigiri_price` decimal(4,1) DEFAULT NULL,
  `sashimi_price` decimal(4,1) DEFAULT NULL,
  `is_sustainable` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_raw` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_special` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_on_menu` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sbs`
--

LOCK TABLES `sbs` WRITE;
/*!40000 ALTER TABLE `sbs` DISABLE KEYS */;
INSERT INTO `sbs` VALUES (1,'Albacore Tuna','','Washington',5.0,10.0,'Y','Y','N','Y'),(2,'Albacore Tuna, belly','','Washington',6.0,12.0,'Y','Y','N','Y'),(3,'Black Cod Belly, grilled','','Neah Bay',5.0,10.0,'Y','N','N','Y'),(4,'Jidori Egg Omlet','Tamago','',3.0,6.0,'N','N','N','Y'),(5,'Amberjack','Kanpachi','Kona, HI',4.0,8.0,'Y','Y','N','Y'),(6,'Blue Prawns','Ebi','Gulf of Mexico',3.5,7.0,'Y','N','N','Y'),(7,'Sockey Salmon','','Washington',4.0,8.0,'Y','Y','N','Y'),(8,'Sockey Salmon, belly','','Washington',5.0,10.0,'Y','Y','N','Y'),(9,'King Salmon','','Washington',5.0,10.0,'Y','Y','N','Y'),(10,'King Salmon, belly',NULL,'Washington',6.0,12.0,'Y','N','N','Y'),(11,'Mackeral','Saba','Norway',3.0,6.0,'Y','Y','N','Y'),(12,'King Crab',NULL,'Alaska',6.0,12.0,'Y','N','N','Y'),(13,'Octopus','Tako','Spain',3.0,6.0,'Y','N','N','Y'),(14,'Sea Eel','Anago','Japan',4.5,9.0,'N','N','N','Y'),(15,'Yellowtail','Hamachi','Kagoshima, Japan',5.0,10.0,'N','Y','N','Y'),(16,'Yellowtail, belly','Hamachi, belly','',6.0,12.0,'N','Y','N','Y'),(17,'Negitoro Handroll','','',10.0,NULL,'N','Y','N','Y'),(18,'Sea Urchin','Uni','Main',7.0,14.0,'Y','Y','N','Y'),(19,'Sea Urchin','Uni','Santa Barbara',7.0,14.0,'Y','Y','N','N'),(20,'Spanish Mackerel','Aji','Japan',6.0,12.0,'Y','Y','N','Y'),(21,'Geoduck','Mirugai','Puget Sound',9.0,18.0,'Y','Y','N','Y'),(22,'GGGeoduck','Mirugai','Puget Sound',9.0,18.0,'Y','Y','N','Y'),(23,'Sea Scallops','Hotate','Hokkaido',4.0,8.0,'Y','Y','N','N'),(24,'Herring','Nishin','British Colombia',3.5,7.0,'Y','Y','N','Y'),(25,'Sea Scallops Seared w','Yuzu Gosho','',4.5,9.0,'Y','Y','N','Y'),(26,'Seabream','Madai','Japan',5.0,10.0,'Y','Y','N','Y'),(27,'Salmon Roe (chum)','Ikura','Washington',5.0,10.0,'Y','Y','N','Y'),(28,'Smelt Roe','Masago','Canada',3.0,6.0,'Y','Y','N','Y'),(29,'Spot Prawn','Amaebi','B.C.',5.0,10.0,'Y','Y','N','Y'),(30,'Squid Tentacles','Ika Geso','Japan',4.0,8.0,'Y','Y','N','Y'),(31,'Golden Eye Snapper','Kinmedai','Japan',7.0,14.0,'Y','Y','N','Y'),(32,'Sea Urchin','Uni','Hokkaido',9.0,18.0,'Y','Y','N','Y'),(33,'Tuna','Maguro','South Pacific',5.0,10.0,'N','Y','N','Y'),(34,'Squid','Surume Ika','Japan',4.0,8.0,'Y','Y','N','Y'),(35,'English Name','Japanese','Japan',2.0,NULL,'N','N','N','Y'),(36,'King Salmon, Spring','','Columbia River, WA',10.0,20.0,'Y','Y','N','Y'),(37,'Rock Fish','','Neah Bay',3.0,6.0,'Y','Y','N','Y'),(38,'Seabass','Suzuki','Japan',5.0,10.0,'Y','Y','N','Y'),(39,'Chutoro','','',6.0,12.0,'N','Y','N','Y');
/*!40000 ALTER TABLE `sbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `updates`
--

DROP TABLE IF EXISTS `updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `updates` (
  `update_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `updates`
--

LOCK TABLES `updates` WRITE;
/*!40000 ALTER TABLE `updates` DISABLE KEYS */;
/*!40000 ALTER TABLE `updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ayumi','ayumikjm@gmail.com','$2y$10$uKdk.pNW48nWFjK8OBMdjO24NFqE2tKXsf8grp7XT8kBX26FHb42W','Kieu2z2ylOusAJafbzGA0y6E7LdogKt44tUL0ERBWYdXOyajf9s34wYWt7am','2018-09-28 01:53:41','2018-09-28 01:53:41'),(2,'admin','steve@sushikappotamura.com','$2y$10$2W/0OBWmeaO7TDm001ROIO32YhvWpwjcVWdeQ2OzdCT7I8L6noTVi',NULL,'2018-09-29 01:15:03','2018-09-29 01:15:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wines`
--

DROP TABLE IF EXISTS `wines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wines` (
  `wine_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`wine_id`),
  KEY `wines_product_id_foreign` (`product_id`),
  CONSTRAINT `wines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wines`
--

LOCK TABLES `wines` WRITE;
/*!40000 ALTER TABLE `wines` DISABLE KEYS */;
/*!40000 ALTER TABLE `wines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-01 15:32:33
