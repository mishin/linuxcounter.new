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
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'af','Afghanistan',31412000),(2,'al','Albania',3195000),(3,'dz','Algeria',36300000),(4,'as','American Samoa',68000),(5,'ad','Andorra',84082),(6,'ao','Angola',19082000),(7,'ai','Anguilla',15236),(8,'aq','Antarctica',3000),(9,'ag','Antigua And Barbuda',89000),(10,'ar','Argentina',40091359),(11,'am','Armenia',3263600),(12,'aw','Aruba',107000),(13,'au','Australia',22688987),(14,'at','Austria',8404252),(15,'az','Azerbaijan',9165000),(16,'bs','Bahamas',353658),(17,'bh','Bahrain',1262000),(18,'bd','Bangladesh',151152000),(19,'bb','Barbados',273000),(20,'by','Belarus',9469000),(21,'be','Belgium',10918405),(22,'bz','Belize',333200),(23,'bj','Benin',8778646),(24,'bm','Bermuda',64566),(25,'bt','Bhutan',695822),(26,'bo','Bolivia',10426154),(27,'ba','Bosnia And Herzegovina',3843126),(28,'bw','Botswana',1800098),(29,'bv','Bouvet Island',0),(30,'br','Brazil',190732694),(31,'io','British Indian Ocean Territory',0),(32,'bn','Brunei Darussalam',399000),(33,'bg','Bulgaria',7364570),(34,'bf','Burkina Faso',15730977),(35,'bi','Burundi',8383000),(36,'ci','C&ocirc;te D\'ivoire',19738000),(37,'kh','Cambodia',13395682),(38,'cm','Cameroon',19406100),(39,'ca','Canada',34562000),(40,'cv','Cape Verde',491575),(41,'ky','Cayman Islands',54878),(42,'cf','Central African Republic',4401000),(43,'td','Chad',11227000),(44,'cl','Chile',17272400),(45,'cn','China',1339724852),(46,'cx','Christmas Island',1508),(47,'cc','Cocos (keeling) Islands',628),(48,'co','Colombia',46127000),(49,'km','Comoros',735000),(50,'cg','Congo',4043000),(51,'cd','Congo, The Democratic Republic Of The',65966000),(52,'ck','Cook Islands',24600),(53,'cr','Costa Rica',4563538),(54,'hr','Croatia',4290612),(55,'cu','Cuba',11241161),(56,'cy','Cyprus',804435),(57,'cz','Czech Republic',10535811),(58,'dk','Denmark',5564219),(59,'dj','Djibouti',889000),(60,'dm','Dominica',68000),(61,'do','Dominican Republic',9378818),(62,'tp','East Timor',1124000),(63,'ec','Ecuador',14306876),(64,'eg','Egypt',80721000),(65,'sv','El Salvador',6193000),(66,'gq','Equatorial Guinea',700000),(67,'er','Eritrea',5254000),(68,'ee','Estonia',1340122),(69,'et','Ethiopia',82101998),(70,'fk','Falkland Islands (malvinas)',3000),(71,'fo','Faroe Islands',48596),(72,'fj','Fiji',861000),(73,'fi','Finland',5389720),(74,'fr','France',65821885),(75,'gf','French Guiana',0),(76,'pf','French Polynesia',266952),(77,'tf','French Southern Territories',0),(78,'ga','Gabon',1505000),(79,'gm','Gambia',1728000),(80,'ge','Georgia',4436400),(81,'de','Germany',81751602),(82,'gh','Ghana',24233431),(83,'gi','Gibraltar',29441),(84,'gr','Greece',10787690),(85,'gl','Greenland',56452),(86,'gd','Grenada',104000),(87,'gp','Guadeloupe',0),(88,'gu','Guam',180000),(89,'gt','Guatemala',14361666),(90,'gn','Guinea',9982000),(91,'gw','Guinea-bissau',1515000),(92,'gy','Guyana',784894),(93,'ht','Haiti',10085214),(94,'hm','Heard Island And Mcdonald Islands',0),(95,'va','Holy See (vatican City State)',500),(96,'hn','Honduras',8215313),(97,'hk','Hong Kong',7097600),(98,'hu','Hungary',9986000),(99,'is','Iceland',318452),(100,'in','India',1210193422),(101,'id','Indonesia',237556363),(102,'ir','Iran, Islamic Republic Of',75607000),(103,'iq','Iraq',31672000),(104,'ie','Ireland',4581269),(105,'il','Israel',7759300),(106,'it','Italy',60626442),(107,'jm','Jamaica',2705827),(108,'jp','Japan',127950000),(109,'jo','Jordan',6187000),(110,'kz','Kazakstan',16518000),(111,'ke','Kenya',38610097),(112,'ki','Kiribati',100000),(113,'kp','Korea, Democratic People\'s Republic Of',24052231),(114,'kr','Korea, Republic Of',48988833),(115,'kw','Kuwait',2737000),(116,'kg','Kyrgyzstan',5418300),(117,'la','Laos',6230200),(118,'lv','Latvia',2218800),(119,'lb','Lebanon',4228000),(120,'ls','Lesotho',2171000),(121,'lr','Liberia',3994000),(122,'ly','Libyan Arab Jamahiriya',6355000),(123,'li','Liechtenstein',36157),(124,'lt','Lithuania',3221200),(125,'lu','Luxembourg',502100),(126,'mo','Macau',556800),(127,'mg','Madagascar',20714000),(128,'mw','Malawi',14901000),(129,'my','Malaysia',27565821),(130,'mv','Maldives',317280),(131,'ml','Mali',14517176),(132,'mt','Malta',417608),(133,'mh','Marshall Islands',54305),(134,'mq','Martinique',0),(135,'mr','Mauritania',3460000),(136,'mu','Mauritius',1280925),(137,'yt','Mayotte',186452),(138,'mx','Mexico',112336538),(139,'fm','Micronesia, Federated States Of',102624),(140,'md','Moldova, Republic Of',3563800),(141,'mc','Monaco',35000),(142,'mn','Mongolia',2817700),(143,'ms','Montserrat',6000),(144,'ma','Morocco',32241000),(145,'mz','Mozambique',20579265),(146,'mm','Myanmar',47963000),(147,'na','Namibia',2283000),(148,'nr','Nauru',10000),(149,'np','Nepal',28584975),(150,'nl','Netherlands',16691700),(151,'an','Netherlands Antilles',0),(152,'nc','New Caledonia',245580),(153,'nz','New Zealand',4414700),(154,'ni','Nicaragua',5788000),(155,'ne','Niger',15730754),(156,'ng','Nigeria',158423000),(157,'nu','Niue',1500),(158,'nf','Norfolk Island',0),(159,'mp','Northern Mariana Islands',61000),(160,'no','Norway',4964900),(161,'om','Oman',2694094),(162,'pk','Pakistan',177038000),(163,'pw','Palau',20000),(164,'ps','Palestinian Territory, Occupied',3935249),(165,'pa','Panama',3405813),(166,'pg','Papua New Guinea',6703000),(167,'py','Paraguay',6230000),(168,'pe','Peru',29461933),(169,'ph','Philippines',94013200),(170,'pn','Pitcairn',50),(171,'pl','Poland',38186860),(172,'pt','Portugal',10636979),(173,'pr','Puerto Rico',3725789),(174,'qa','Qatar',1696563),(175,'re','R&eacute;union',0),(176,'mk','Republic of Macedonia',2057284),(177,'ro','Romania',19042936),(178,'ru','Russian Federation',142905200),(179,'rw','Rwanda',10412820),(180,'st','S&atilde;o Tom&eacute; And Pr&iacute;ncipe',165000),(181,'sh','Saint Helena',4000),(182,'kn','Saint Kitts And Nevis',52000),(183,'lc','Saint Lucia',166526),(184,'pm','Saint Pierre And Miquelon',6072),(185,'vc','Saint Vincent And The Grenadines',109000),(186,'ws','Samoa',187032),(187,'sm','San Marino',31887),(188,'sa','Saudi Arabia',27136977),(189,'sn','Senegal',12434000),(190,'sc','Seychelles',86525),(191,'sl','Sierra Leone',5868000),(192,'sg','Singapore',5076700),(193,'sk','Slovakia',5435273),(194,'si','Slovenia',2052900),(195,'sb','Solomon Islands',530669),(196,'so','Somalia',9331000),(197,'za','South Africa',50586757),(198,'gs','South Georgia And The South Sandwich Islands',0),(199,'es','Spain',46125154),(200,'lk','Sri Lanka',20653000),(201,'sd','Sudan',30894000),(202,'sr','Suriname',525000),(203,'sj','Svalbard And Jan Mayen',2701),(204,'sz','Swaziland',1186000),(205,'se','Sweden',9440588),(206,'ch','Switzerland',7866500),(207,'sy','Syrian Arab Republic',0),(208,'tw','Taiwan',23188078),(209,'tj','Tajikistan',6879000),(210,'tz','Tanzania, United Republic Of',43187823),(211,'th','Thailand',67041000),(212,'tg','Togo',6028000),(213,'tk','Tokelau',1100),(214,'to','Tonga',104000),(215,'tt','Trinidad And Tobago',1317714),(216,'tn','Tunisia',10549100),(217,'tr','Turkey',73722988),(218,'tm','Turkmenistan',5042000),(219,'tc','Turks And Caicos Islands',40357),(220,'tv','Tuvalu',10000),(221,'ug','Uganda',31800000),(222,'ua','Ukraine',45706126),(223,'ae','United Arab Emirates',8264070),(224,'gb','United Kingdom',62435709),(225,'us','United States',312068000),(226,'um','United States Minor Outlying Islands',0),(227,'uy','Uruguay',3356584),(228,'uz','Uzbekistan',27445000),(229,'vu','Vanuatu',240000),(230,'ve','Venezuela',29341000),(231,'vn','Viet Nam',87375000),(232,'vg','Virgin Islands, British',28213),(233,'vi','Virgin Islands, U.s.',109000),(234,'wf','Wallis And Futuna',13484),(235,'eh','Western Sahara',531000),(236,'ye','Yemen',22492035),(237,'yu','Yugoslavia',0),(238,'zm','Zambia',13046508),(239,'zw','Zimbabwe',12571000);
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

-- Dump completed on 2015-03-26 12:33:49
