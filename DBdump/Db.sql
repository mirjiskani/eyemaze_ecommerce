-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: eyemaze_ecommerce
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetail` (
  `idorderdetail` int NOT NULL AUTO_INCREMENT,
  `orderid` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`idorderdetail`),
  KEY `orderid_idx` (`orderid`),
  CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `orders` (`idorders`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
INSERT INTO `orderdetail` VALUES (53,35,'3 Pack Jersy',12.00,1,12.00,8),(54,35,'Footwear men and women',34.00,2,68.00,9),(55,36,'Footwear men and women',34.00,6,204.00,9),(56,36,'3 Pack Jersy',12.00,4,48.00,8),(57,37,'Iphone13',1100.00,2,2200.00,11),(58,37,'Camera Canon',150.00,2,300.00,10),(59,38,'White Glasses',5.00,2,10.00,7),(60,38,'Jeans',12.00,2,24.00,6),(61,38,'3 Pack Jersy',12.00,1,12.00,8),(62,39,'White Glasses',5.00,2,10.00,7),(63,39,'Jeans',12.00,2,24.00,6),(64,39,'3 Pack Jersy',12.00,1,12.00,8),(65,40,'3 Pack Jersy',12.00,2,24.00,8),(66,40,'Footwear men and women',34.00,1,34.00,9),(67,41,'White Glasses',5.00,2,10.00,7),(68,41,'Jeans',12.00,2,24.00,6),(69,42,'White Glasses',5.00,2,10.00,7),(70,42,'Jeans',12.00,2,24.00,6),(71,43,'White Glasses',5.00,2,10.00,7),(72,43,'Jeans',12.00,2,24.00,6),(73,44,'White Glasses',5.00,2,10.00,7),(74,44,'Jeans',12.00,2,24.00,6),(75,45,'White Glasses',5.00,2,10.00,7),(76,45,'Jeans',12.00,2,24.00,6),(77,46,'White Glasses',5.00,2,10.00,7),(78,46,'Jeans',12.00,2,24.00,6),(79,47,'White Glasses',5.00,2,10.00,7),(80,47,'Jeans',12.00,2,24.00,6),(81,48,'White Glasses',5.00,2,10.00,7),(82,48,'Jeans',12.00,2,24.00,6),(83,49,'White Glasses',5.00,2,10.00,7),(84,49,'Jeans',12.00,2,24.00,6),(85,50,'White Glasses',5.00,2,10.00,7),(86,50,'Jeans',12.00,2,24.00,6),(87,51,'White Glasses',5.00,2,10.00,7),(88,51,'Jeans',12.00,2,24.00,6),(89,52,'White Glasses',5.00,2,10.00,7),(90,52,'Jeans',12.00,2,24.00,6),(91,53,'White Glasses',5.00,2,10.00,7),(92,53,'Jeans',12.00,2,24.00,6),(93,54,'White Glasses',5.00,2,10.00,7),(94,54,'Jeans',12.00,2,24.00,6),(95,55,'White Glasses',5.00,2,10.00,7),(96,55,'Jeans',12.00,2,24.00,6),(97,56,'White Glasses',5.00,2,10.00,7),(98,56,'Jeans',12.00,2,24.00,6),(99,57,'White Glasses',5.00,2,10.00,7),(100,57,'Jeans',12.00,2,24.00,6),(101,58,'White Glasses',5.00,2,10.00,7),(102,58,'Jeans',12.00,2,24.00,6),(103,59,'White Glasses',5.00,2,10.00,7),(104,59,'Jeans',12.00,2,24.00,6),(105,60,'White Glasses',5.00,2,10.00,7),(106,60,'Jeans',12.00,2,24.00,6),(107,60,'Iphone13',1100.00,3,3300.00,11);
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `idorders` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `ispaid` varchar(100) DEFAULT NULL,
  `paymentid` int DEFAULT NULL,
  PRIMARY KEY (`idorders`),
  KEY `userid_idx` (`userid`),
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (35,1,'succeeded',5),(36,1,'succeeded',6),(37,1,'succeeded',7),(38,1,'0',0),(39,1,'0',0),(40,1,'succeeded',8),(41,1,'0',0),(42,1,'0',0),(43,1,'0',0),(44,1,'0',0),(45,1,'0',0),(46,1,'0',0),(47,1,'0',0),(48,1,'0',0),(49,1,'0',0),(50,1,'0',0),(51,1,'0',0),(52,1,'0',0),(53,1,'0',0),(54,1,'0',0),(55,1,'0',0),(56,1,'0',0),(57,1,'0',0),(58,1,'0',0),(59,1,'0',0),(60,1,'succeeded',9);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `idpayment` int NOT NULL AUTO_INCREMENT,
  `transectionid` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `cardholder` varchar(150) DEFAULT NULL,
  `cardno` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpayment`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (5,'ch_3NwC4WEIWDW8VKN71KlGMVhi',80.00,'usd','succeeded','2023-10-01 00:55:41','Mir Khan','4242424242424242'),(6,'ch_3NwCDgEIWDW8VKN70ZzrvZOi',252.00,'usd','succeeded','2023-10-01 01:05:09','Mir Khan','4242424242424242'),(7,'ch_3NwCFkEIWDW8VKN70dPPsPWv',2500.00,'usd','succeeded','2023-10-01 01:07:16','Mir Khan','4242424242424242'),(8,'ch_3NwCLDEIWDW8VKN70Xg2fH3d',58.00,'usd','succeeded','2023-10-01 01:12:55','Mir Khan','4242424242424242'),(9,'ch_3NwD1XEIWDW8VKN70pjh4qIK',3334.00,'usd','succeeded','2023-10-01 01:56:39','Mir Khan','4242424242424242');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `idproducts` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(16,0) DEFAULT NULL,
  `product_description` mediumtext,
  `status` int DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`idproducts`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (6,'Jeans',12,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',1,'http://localhost/eyemaze_ecommerce/assets/images/1696003902_jeans3.jpg'),(7,'White Glasses',5,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',1,'http://localhost/eyemaze_ecommerce/assets/images/1696004090_black-glasses-working-computer-white-isolated-background_565470-335.jpg'),(8,'3 Pack Jersy',12,'3 Pack jersy only available in 12 AED, it is limited offer.',1,'http://localhost/eyemaze_ecommerce/assets/images/1696004431_three-pack-jersy.jpg'),(9,'Footwear men and women',34,'Footwear available for men and women and we have limited stock hurry up.',1,'http://localhost/eyemaze_ecommerce/assets/images/1696004658_footwear-men-women.jpg'),(10,'Camera Canon',150,'Canon camera is available only in 150',1,'http://localhost/eyemaze_ecommerce/assets/images/1696004898_canon-camera.jpg'),(11,'Iphone13',1100,'Iphone 13',1,'http://localhost/eyemaze_ecommerce/assets/images/1696005431_iphone13.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `idusers` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `role` int DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mir','Khan','mir@mir.com','$2y$10$Eepu/SdYkXClkId6jta08efCQpx5O7FmXAvBmccbAG5P7/JbhCyZa',1,1),(2,'Zain ul ','abdin','zain@gmail.com','$2y$10$IQ9GHKPSYVrm7xPCVnl3x.0oXN.S0bM1fDu.XORvzWLJfp/vrMbD6',1,2),(3,'','','','$2y$10$EVJgNW96fxwfWnLrwuXkM.M2oGLzfSR1v2eVdRoCmHQQFj5QVzS2C',1,2),(4,'','','','$2y$10$h5v8lOOatgNpKd47Ex56detZuU31mSem/xAWUG2EEywH.KPeDszwa',1,2),(5,'rida','rida','rida@gmail.com','$2y$10$wKeHyQNkERo7ClCyNQAxi.U.xHdDLD/cs0l1.1efucZny7uuNZzA2',1,2),(6,'mirkhan@gmail.com','mir','mirkhan@gmail.com','$2y$10$1hcARub8elq5EHj3fHaBQuaNe3w23hCMiWq3t34IpsKs8IDosaDEW',1,2),(7,'Mir Khan','Khan','mir@abc.com','$2y$10$j19/uyAM2EiwG7VBeL6NXONuQRcFaVGn.GnLJHnxo3HSP31fZIz/e',1,2),(8,'Mir Khan','mmm@m.com','mm@m.com','$2y$10$xajCN7P88EbfEONnmZZ5vOCb3BIbZq1i2t91ECtSlGDNB92zkAMxe',1,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-01  6:24:02
