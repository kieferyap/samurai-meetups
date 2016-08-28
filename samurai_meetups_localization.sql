-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: samurai_meetups
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `localization`
--

DROP TABLE IF EXISTS `localization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localization` (
  `localization_id` int(11) NOT NULL AUTO_INCREMENT,
  `en` text COLLATE utf8_unicode_ci NOT NULL,
  `ja` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`localization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localization`
--

LOCK TABLES `localization` WRITE;
/*!40000 ALTER TABLE `localization` DISABLE KEYS */;
INSERT INTO `localization` VALUES (1,'Menu','メニュー'),(2,'日本語','English'),(3,'Upcoming Tours','次のツアー'),(4,'About','アバウト'),(5,'Reports','リポート'),(6,'Samurai','サムライ'),(7,'Testimonies','人証'),(8,'Facebook','Facebook'),(9,'About Us','アバウト'),(10,'Contact Us','問い合わせ'),(11,'FAQ','FAQ'),(12,'Privacy Policy','利用規約とプライバシー ポリシー'),(13,'Tour Information','ツアーの情報'),(14,'I have read and agreed to the Terms of Service and Privacy Policy','利用規約とプライバシー ポリシーに同意します'),(15,'Join Tour','ジョインツアー'),(16,'Show More','もっと'),(17,'Loading...','ローディング中...'),(18,'Samurai Meetups','サムライミートアップ'),(19,'Error 404: Page Not Found','エラー404：見つかりません'),(20,'The above error occurred while the Web server was processing your request.','指定したページは、このサーバにはありません。'),(21,'Name','名前'),(22,'Title','タイトル'),(23,'Message','メッセージ'),(24,'Send E-mail','送信'),(25,'All fields are required.','全て必須項目です。'),(26,'Coming Soon','工事中...');
/*!40000 ALTER TABLE `localization` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-28  9:49:56
