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
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `population` int(11) NOT NULL,
  `machinesnum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'af','Afghanistan',31412000,0),(2,'al','Albania',3195000,0),(3,'dz','Algeria',36300000,1),(4,'as','American Samoa',68000,0),(5,'ad','Andorra',84082,0),(6,'ao','Angola',19082000,0),(7,'ai','Anguilla',15236,0),(8,'aq','Antarctica',3000,0),(9,'ag','Antigua And Barbuda',89000,0),(10,'ar','Argentina',40091359,6),(11,'am','Armenia',3263600,0),(12,'aw','Aruba',107000,0),(13,'au','Australia',22688987,26),(14,'at','Austria',8404252,18),(15,'az','Azerbaijan',9165000,0),(16,'bs','Bahamas',353658,0),(17,'bh','Bahrain',1262000,0),(18,'bd','Bangladesh',151152000,0),(19,'bb','Barbados',273000,0),(20,'by','Belarus',9469000,0),(21,'be','Belgium',10918405,16),(22,'bz','Belize',333200,0),(23,'bj','Benin',8778646,0),(24,'bm','Bermuda',64566,0),(25,'bt','Bhutan',695822,0),(26,'bo','Bolivia',10426154,0),(27,'ba','Bosnia And Herzegovina',3843126,2),(28,'bw','Botswana',1800098,0),(29,'bv','Bouvet Island',0,0),(30,'br','Brazil',190732694,52),(31,'io','British Indian Ocean Territory',0,0),(32,'bn','Brunei Darussalam',399000,0),(33,'bg','Bulgaria',7364570,0),(34,'bf','Burkina Faso',15730977,0),(35,'bi','Burundi',8383000,0),(36,'ci','C&ocirc;te D\'ivoire',19738000,0),(37,'kh','Cambodia',13395682,0),(38,'cm','Cameroon',19406100,0),(39,'ca','Canada',34562000,24),(40,'cv','Cape Verde',491575,0),(41,'ky','Cayman Islands',54878,0),(42,'cf','Central African Republic',4401000,0),(43,'td','Chad',11227000,0),(44,'cl','Chile',17272400,9),(45,'cn','China',1339724852,0),(46,'cx','Christmas Island',1508,0),(47,'cc','Cocos (keeling) Islands',628,0),(48,'co','Colombia',46127000,8),(49,'km','Comoros',735000,0),(50,'cg','Congo',4043000,0),(51,'cd','Congo, The Democratic Republic Of The',65966000,0),(52,'ck','Cook Islands',24600,0),(53,'cr','Costa Rica',4563538,0),(54,'hr','Croatia',4290612,2),(55,'cu','Cuba',11241161,1),(56,'cy','Cyprus',804435,3),(57,'cz','Czech Republic',10535811,4),(58,'dk','Denmark',5564219,23),(59,'dj','Djibouti',889000,0),(60,'dm','Dominica',68000,0),(61,'do','Dominican Republic',9378818,1),(62,'tp','East Timor',1124000,0),(63,'ec','Ecuador',14306876,0),(64,'eg','Egypt',80721000,1),(65,'sv','El Salvador',6193000,0),(66,'gq','Equatorial Guinea',700000,0),(67,'er','Eritrea',5254000,0),(68,'ee','Estonia',1340122,80),(69,'et','Ethiopia',82101998,0),(70,'fk','Falkland Islands (malvinas)',3000,0),(71,'fo','Faroe Islands',48596,0),(72,'fj','Fiji',861000,0),(73,'fi','Finland',5389720,58),(74,'fr','France',65821885,27),(75,'gf','French Guiana',0,0),(76,'pf','French Polynesia',266952,0),(77,'tf','French Southern Territories',0,0),(78,'ga','Gabon',1505000,0),(79,'gm','Gambia',1728000,0),(80,'ge','Georgia',4436400,14),(81,'de','Germany',81751602,147),(82,'gh','Ghana',24233431,0),(83,'gi','Gibraltar',29441,0),(84,'gr','Greece',10787690,8),(85,'gl','Greenland',56452,0),(86,'gd','Grenada',104000,0),(87,'gp','Guadeloupe',0,0),(88,'gu','Guam',180000,0),(89,'gt','Guatemala',14361666,0),(90,'gn','Guinea',9982000,0),(91,'gw','Guinea-bissau',1515000,0),(92,'gy','Guyana',784894,0),(93,'ht','Haiti',10085214,0),(94,'hm','Heard Island And Mcdonald Islands',0,0),(95,'va','Holy See (vatican City State)',500,0),(96,'hn','Honduras',8215313,0),(97,'hk','Hong Kong',7097600,0),(98,'hu','Hungary',9986000,3),(99,'is','Iceland',318452,0),(100,'in','India',1210193422,9),(101,'id','Indonesia',237556363,2),(102,'ir','Iran, Islamic Republic Of',75607000,0),(103,'iq','Iraq',31672000,0),(104,'ie','Ireland',4581269,1),(105,'il','Israel',7759300,1),(106,'it','Italy',60626442,42),(107,'jm','Jamaica',2705827,0),(108,'jp','Japan',127950000,8),(109,'jo','Jordan',6187000,0),(110,'kz','Kazakstan',16518000,0),(111,'ke','Kenya',38610097,0),(112,'ki','Kiribati',100000,0),(113,'kp','Korea, Democratic People\'s Republic Of',24052231,0),(114,'kr','Korea, Republic Of',48988833,0),(115,'kw','Kuwait',2737000,0),(116,'kg','Kyrgyzstan',5418300,0),(117,'la','Laos',6230200,0),(118,'lv','Latvia',2218800,0),(119,'lb','Lebanon',4228000,3),(120,'ls','Lesotho',2171000,0),(121,'lr','Liberia',3994000,0),(122,'ly','Libyan Arab Jamahiriya',6355000,1),(123,'li','Liechtenstein',36157,0),(124,'lt','Lithuania',3221200,2),(125,'lu','Luxembourg',502100,0),(126,'mo','Macau',556800,0),(127,'mg','Madagascar',20714000,0),(128,'mw','Malawi',14901000,0),(129,'my','Malaysia',27565821,3),(130,'mv','Maldives',317280,0),(131,'ml','Mali',14517176,0),(132,'mt','Malta',417608,0),(133,'mh','Marshall Islands',54305,0),(134,'mq','Martinique',0,0),(135,'mr','Mauritania',3460000,0),(136,'mu','Mauritius',1280925,0),(137,'yt','Mayotte',186452,0),(138,'mx','Mexico',112336538,18),(139,'fm','Micronesia, Federated States Of',102624,0),(140,'md','Moldova, Republic Of',3563800,0),(141,'mc','Monaco',35000,0),(142,'mn','Mongolia',2817700,0),(143,'ms','Montserrat',6000,0),(144,'ma','Morocco',32241000,1),(145,'mz','Mozambique',20579265,0),(146,'mm','Myanmar',47963000,0),(147,'na','Namibia',2283000,0),(148,'nr','Nauru',10000,0),(149,'np','Nepal',28584975,0),(150,'nl','Netherlands',16691700,56),(151,'an','Netherlands Antilles',0,0),(152,'nc','New Caledonia',245580,0),(153,'nz','New Zealand',4414700,6),(154,'ni','Nicaragua',5788000,0),(155,'ne','Niger',15730754,0),(156,'ng','Nigeria',158423000,0),(157,'nu','Niue',1500,0),(158,'nf','Norfolk Island',0,0),(159,'mp','Northern Mariana Islands',61000,0),(160,'no','Norway',4964900,65),(161,'om','Oman',2694094,0),(162,'pk','Pakistan',177038000,1),(163,'pw','Palau',20000,0),(164,'ps','Palestinian Territory, Occupied',3935249,2),(165,'pa','Panama',3405813,0),(166,'pg','Papua New Guinea',6703000,0),(167,'py','Paraguay',6230000,0),(168,'pe','Peru',29461933,0),(169,'ph','Philippines',94013200,3),(170,'pn','Pitcairn',50,0),(171,'pl','Poland',38186860,16),(172,'pt','Portugal',10636979,1),(173,'pr','Puerto Rico',3725789,1),(174,'qa','Qatar',1696563,0),(175,'re','R&eacute;union',0,0),(176,'mk','Republic of Macedonia',2057284,0),(177,'ro','Romania',19042936,9),(178,'ru','Russian Federation',142905200,8),(179,'rw','Rwanda',10412820,0),(180,'st','S&atilde;o Tom&eacute; And Pr&iacute;ncipe',165000,0),(181,'sh','Saint Helena',4000,0),(182,'kn','Saint Kitts And Nevis',52000,0),(183,'lc','Saint Lucia',166526,0),(184,'pm','Saint Pierre And Miquelon',6072,0),(185,'vc','Saint Vincent And The Grenadines',109000,0),(186,'ws','Samoa',187032,0),(187,'sm','San Marino',31887,0),(188,'sa','Saudi Arabia',27136977,0),(189,'sn','Senegal',12434000,1),(190,'sc','Seychelles',86525,0),(191,'sl','Sierra Leone',5868000,0),(192,'sg','Singapore',5076700,0),(193,'sk','Slovakia',5435273,3),(194,'si','Slovenia',2052900,4),(195,'sb','Solomon Islands',530669,0),(196,'so','Somalia',9331000,0),(197,'za','South Africa',50586757,1),(198,'gs','South Georgia And The South Sandwich Islands',0,0),(199,'es','Spain',46125154,18),(200,'lk','Sri Lanka',20653000,0),(201,'sd','Sudan',30894000,0),(202,'sr','Suriname',525000,0),(203,'sj','Svalbard And Jan Mayen',2701,0),(204,'sz','Swaziland',1186000,0),(205,'se','Sweden',9440588,30),(206,'ch','Switzerland',7866500,26),(207,'sy','Syrian Arab Republic',0,0),(208,'tw','Taiwan',23188078,0),(209,'tj','Tajikistan',6879000,0),(210,'tz','Tanzania, United Republic Of',43187823,0),(211,'th','Thailand',67041000,4),(212,'tg','Togo',6028000,0),(213,'tk','Tokelau',1100,0),(214,'to','Tonga',104000,0),(215,'tt','Trinidad And Tobago',1317714,0),(216,'tn','Tunisia',10549100,5),(217,'tr','Turkey',73722988,0),(218,'tm','Turkmenistan',5042000,0),(219,'tc','Turks And Caicos Islands',40357,0),(220,'tv','Tuvalu',10000,0),(221,'ug','Uganda',31800000,0),(222,'ua','Ukraine',45706126,4),(223,'ae','United Arab Emirates',8264070,1),(224,'gb','United Kingdom',62435709,88),(225,'us','United States',312068000,266),(226,'um','United States Minor Outlying Islands',0,0),(227,'uy','Uruguay',3356584,4),(228,'uz','Uzbekistan',27445000,1),(229,'vu','Vanuatu',240000,0),(230,'ve','Venezuela',29341000,2),(231,'vn','Viet Nam',87375000,0),(232,'vg','Virgin Islands, British',28213,0),(233,'vi','Virgin Islands, U.s.',109000,0),(234,'wf','Wallis And Futuna',13484,0),(235,'eh','Western Sahara',531000,0),(236,'ye','Yemen',22492035,0),(237,'yu','Yugoslavia',0,0),(238,'zm','Zambia',13046508,0),(239,'zw','Zimbabwe',12571000,0);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-04 21:46:45
