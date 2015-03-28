-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: licotest
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `country` int(11) DEFAULT NULL,
  `cpu` int(11) DEFAULT NULL,
  `distribution` int(11) DEFAULT NULL,
  `architecture` int(11) DEFAULT NULL,
  `kernel` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `purpose` int(11) DEFAULT NULL,
  `updatekey` varchar(48) DEFAULT NULL,
  `hostname` varchar(128) DEFAULT NULL,
  `cores` int(3) DEFAULT NULL,
  `flags` varchar(255) DEFAULT NULL,
  `accounts` int(5) DEFAULT NULL,
  `diskspace` bigint(20) DEFAULT NULL,
  `diskspace_free` bigint(20) DEFAULT NULL,
  `memory` bigint(20) DEFAULT NULL,
  `memory_free` bigint(20) DEFAULT NULL,
  `swap` bigint(20) DEFAULT NULL,
  `swap_free` bigint(20) DEFAULT NULL,
  `distversion` varchar(24) DEFAULT NULL,
  `mailer` varchar(24) DEFAULT NULL,
  `network` varchar(24) DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `uptime` int(11) DEFAULT NULL,
  `loadavg` varchar(48) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `country` (`country`),
  KEY `cpu` (`cpu`),
  KEY `distribution` (`distribution`),
  KEY `architecture` (`architecture`),
  KEY `kernel` (`kernel`),
  KEY `class` (`class`),
  KEY `purpose` (`purpose`),
  KEY `key` (`updatekey`),
  KEY `created_at` (`created_at`),
  KEY `online` (`online`),
  KEY `user_online` (`user`,`online`),
  KEY `user_key` (`user`,`updatekey`),
  CONSTRAINT `FK_F1CE8DED5373C966` FOREIGN KEY (`country`) REFERENCES `countries` (`id`),
  CONSTRAINT `FK_F1CE8DED5DD29AAB` FOREIGN KEY (`kernel`) REFERENCES `kernels` (`id`),
  CONSTRAINT `FK_F1CE8DED74995EFA` FOREIGN KEY (`architecture`) REFERENCES `architectures` (`id`),
  CONSTRAINT `FK_F1CE8DED8D93D649` FOREIGN KEY (`user`) REFERENCES `fos_user` (`id`),
  CONSTRAINT `FK_F1CE8DEDA4483781` FOREIGN KEY (`distribution`) REFERENCES `distributions` (`id`),
  CONSTRAINT `FK_F1CE8DEDB887B3EB` FOREIGN KEY (`purpose`) REFERENCES `purposes` (`id`),
  CONSTRAINT `FK_F1CE8DEDBA80502E` FOREIGN KEY (`cpu`) REFERENCES `cpus` (`id`),
  CONSTRAINT `FK_F1CE8DEDED4B199F` FOREIGN KEY (`class`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machines`
--

LOCK TABLES `machines` WRITE;
/*!40000 ALTER TABLE `machines` DISABLE KEYS */;
INSERT INTO `machines` VALUES (1,249600,106,5312,433,736,1694,18,NULL,'bp4c1iseU3QZMVIS1O7LocZD','alex-laptop',8,'fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc aperfmperf eagerfpu pni pclmulqdq d',2,973523,812876,7903,3368,1951,1951,'2014.2','Postfix','wireless',1,939780,'0.67, 0.39, 0.32','2012-10-19 19:10:45','2015-02-01 20:00:06'),(2,249600,81,4206,89,256,2032,29,NULL,'388020','localhost',4,'swp half thumb fastmult vfp edsp neon vfpv3 tls vfpv4 idiva idivt',1,9351,1540,1811,49,0,0,'5.0.1','none','wireless',1,9559,'4.81 4.29 4.33','2013-09-07 20:07:48','2014-12-29 08:39:32'),(3,249600,81,9749,1636,778,1336,27,NULL,'715666','linuxcounter.net',12,'fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc aperfmperf eagerfpu pni pclmulqdq d',31,221322,145081,48271,3383,3812,3068,'14.04','Postfix','ethernet',1,1555200,'2.45, 2.19, 2.17','2014-12-17 17:22:53','2015-03-09 04:00:02'),(4,249600,81,8530,1636,736,1953,27,NULL,NULL,'test.machine.local',24,NULL,11,20000000,500000,32000,1000,4000,4000,'14.04 LTS','Postfix','Ethernet',1,99999999,'0.23, 0.12, 0.09','2015-03-27 13:29:21',NULL),(5,249600,81,8530,1636,736,1953,27,NULL,'87596945','test2.machine.local',24,NULL,11,20000000,500000,32000,1000,4000,4000,'14.04 LTS','Postfix','Ethernet',1,99999999,'0.23, 0.12, 0.09','2015-03-27 13:30:44',NULL);
/*!40000 ALTER TABLE `machines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-28 21:18:26
