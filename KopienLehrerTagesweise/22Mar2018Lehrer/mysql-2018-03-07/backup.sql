CREATE DATABASE  IF NOT EXISTS `wifitag22` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `wifitag22`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: wifitag2
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `bundesland`
--

DROP TABLE IF EXISTS `bundesland`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bundesland` (
  `bundId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bundName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `counShort` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bundId`),
  KEY `counfkx` (`counShort`),
  CONSTRAINT `bundesland_ibfk_1` FOREIGN KEY (`counShort`) REFERENCES `countries` (`short`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `counfkx` FOREIGN KEY (`counShort`) REFERENCES `countries` (`short`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bundesland`
--

LOCK TABLES `bundesland` WRITE;
/*!40000 ALTER TABLE `bundesland` DISABLE KEYS */;
INSERT INTO `bundesland` VALUES (1,'Burgenland','OT'),(2,'Kärnten','OT'),(3,'Niederösterreich','OT'),(4,'Oberösterreich','OT'),(5,'Salzburg','OT'),(6,'Steiermark','OT'),(7,'Tirol','OT'),(9,'Wien','OT'),(10,'Zürich','CH'),(11,'St. Gallen','CH'),(12,'Burgenland','OT'),(13,'Kärnten','OT'),(14,'Niederösterreich','OT'),(15,'Oberösterreich','OT'),(16,'Salzburg','OT'),(17,'Steiermark','OT'),(18,'Tirol','OT'),(19,'Vorarlberg','OT'),(20,'Wien','OT'),(21,'Zürich','CH'),(22,'St. Gallen','CH');
/*!40000 ALTER TABLE `bundesland` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `short` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `de` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`short`),
  KEY `de` (`de`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES ('AF','Afghanistan'),('EG','Ägypten'),('AX','Åland'),('AL','Albanien'),('DZ','Algerien'),('UM','Amerikanisch-Ozeanien'),('AS','Amerikanisch-Samoa'),('VI','Amerikanische Jungferninseln'),('AD','Andorra'),('AO','Angola'),('AI','Anguilla'),('AQ','Antarktis'),('AG','Antigua und Barbuda'),('GQ','Äquatorialguinea'),('AR','Argentinien'),('AM','Armenien'),('AW','Aruba'),('AZ','Aserbaidschan'),('ET','Äthiopien'),('AU','Australien'),('BS','Bahamas'),('BH','Bahrain'),('BD','Bangladesch'),('BB','Barbados'),('BY','Belarus (Weißrussland)'),('BE','Belgien'),('BZ','Belize'),('BJ','Benin'),('BM','Bermuda'),('BT','Bhutan'),('BO','Bolivien'),('BQ','Bonaire, Sint Eustatius und Saba'),('BA','Bosnien und Herzegowina'),('BW','Botswana'),('BV','Bouvetinsel'),('BR','Brasilien'),('VG','Britische Jungferninseln'),('IO','Britisches Territorium im Indischen Ozean'),('BN','Brunei Darussalam'),('BG','Bulgarien'),('BF','Burkina Faso'),('BI','Burundi'),('CL','Chile'),('CN','China, Volksrepublik'),('CK','Cookinseln'),('CR','Costa Rica'),('CW','Curaçao'),('DK','Dänemark'),('DE','Deutschland'),('DM','Dominica'),('DO','Dominikanische Republik'),('DJ','Dschibuti'),('EC','Ecuador'),('SV','El Salvador'),('CI','Elfenbeinküste'),('ER','Eritrea'),('EE','Estland (Reval)'),('FK','Falklandinseln (Malwinen)'),('FO','Färöer'),('FJ','Fidschi'),('FI','Finnland'),('FR','Frankreich'),('GF','Französisch-Guayana'),('PF','Französisch-Polynesien'),('TF','Französische Süd- und Antarktisgebiete'),('GA','Gabun'),('GM','Gambia'),('GE','Georgien'),('GH','Ghana'),('GI','Gibraltar'),('GD','Grenada'),('GR','Griechenland'),('GL','Grönland'),('GB','Großbritannien und Nordirland'),('GP','Guadeloupe'),('GU','Guam'),('GT','Guatemala'),('GG','Guernsey (Kanalinsel)'),('GN','Guinea'),('GW','Guinea-Bissau'),('GY','Guyana'),('HT','Haiti'),('HM','Heard- und McDonald-Inseln'),('HN','Honduras'),('HK','Hongkong'),('IN','Indien'),('ID','Indonesien'),('IM','Insel Man'),('IQ','Irak'),('IR','Iran'),('IE','Irland'),('IS','Island'),('IL','Israel'),('IT','Italien'),('JM','Jamaika'),('JP','Japan'),('YE','Jemen'),('JE','Jersey (Kanalinsel)'),('JO','Jordanien'),('KY','Kaimaninseln'),('KH','Kambodscha'),('CM','Kamerun'),('CA','Kanada'),('CV','Kap Verde'),('KZ','Kasachstan'),('QA','Katar'),('KE','Kenia'),('KG','Kirgisistan'),('KI','Kiribati'),('CC','Kokosinseln (Keelinginseln)'),('CO','Kolumbien'),('KM','Komoren'),('CD','Kongo'),('HR','Kroatien'),('CU','Kuba'),('KW','Kuwait'),('LA','Laos'),('LS','Lesotho'),('LV','Lettland'),('LB','Libanon'),('LR','Liberia'),('LY','Libyen'),('LI','Liechtenstein'),('LT','Litauen'),('LU','Luxemburg'),('MO','Macau'),('MG','Madagaskar'),('MW','Malawi'),('MY','Malaysia'),('MV','Malediven'),('ML','Mali'),('MT','Malta'),('MA','Marokko'),('MH','Marshallinseln'),('MQ','Martinique'),('MR','Mauretanien'),('MU','Mauritius'),('YT','Mayotte'),('MK','Mazedonien'),('MX','Mexiko'),('FM','Mikronesien'),('MD','Moldawien'),('MC','Monaco'),('MN','Mongolei'),('ME','Montenegro'),('MS','Montserrat'),('MZ','Mosambik'),('MM','Myanmar (Burma)'),('NA','Namibia'),('NR','Nauru'),('NP','Nepal'),('NC','Neukaledonien'),('NZ','Neuseeland'),('NI','Nicaragua'),('NL','Niederlande'),('AN','Niederländische Antillen'),('NE','Niger'),('NG','Nigeria'),('NU','Niue'),('KP','Nordkorea'),('MP','Nördliche Marianen'),('NF','Norfolkinsel'),('NO','Norwegen'),('OM','Oman'),('OT','Österreich'),('PK','Pakistan'),('PS','Palästina'),('PW','Palau'),('PA','Panama'),('PG','Papua-Neuguinea'),('PY','Paraguay'),('PE','Peru'),('PH','Philippinen'),('PN','Pitcairninseln'),('PL','Polen'),('PT','Portugal'),('PR','Puerto Rico'),('CG','Republik Kongo'),('RE','Réunion'),('RW','Ruanda'),('RO','Rumänien'),('RU','Russische Föderation'),('BL','Saint-Barthélemy'),('MF','Saint-Martin (franz. Teil)'),('SB','Salomonen'),('ZM','Sambia'),('WS','Samoa'),('SM','San Marino'),('ST','São Tomé und Príncipe'),('SA','Saudi-Arabien'),('SE','Schweden'),('CH','Schweiz'),('SN','Senegal'),('RS','Serbien'),('SC','Seychellen'),('SL','Sierra Leone'),('ZW','Simbabwe'),('SG','Singapur'),('SX','Sint Maarten (niederl. Teil)'),('SK','Slowakei'),('SI','Slowenien'),('SO','Somalia'),('ES','Spanien'),('LK','Sri Lanka'),('SH','St. Helena'),('KN','St. Kitts und Nevis'),('LC','St. Lucia'),('PM','St. Pierre und Miquelon'),('VC','St. Vincent und die Grenadinen'),('ZA','Südafrika'),('SD','Sudan'),('GS','Südgeorgien und die Südl. Sandwichinseln'),('KR','Südkorea'),('SS','Sudsudan!Südsudan'),('SR','Suriname'),('SJ','Svalbard und Jan Mayen'),('SZ','Swasiland'),('SY','Syrien'),('TJ','Tadschikistan'),('TW','Taiwan'),('TZ','Tansania'),('TH','Thailand'),('TL','Timor-Leste'),('TG','Togo'),('TK','Tokelau'),('TO','Tonga'),('TT','Trinidad und Tobago'),('TD','Tschad'),('CZ','Tschechische Republik'),('TN','Tunesien'),('TR','Türkei'),('TM','Turkmenistan'),('TC','Turks- und Caicosinseln'),('TV','Tuvalu'),('UG','Uganda'),('UA','Ukraine'),('HU','Ungarn'),('UY','Uruguay'),('UZ','Usbekistan'),('VU','Vanuatu'),('VA','Vatikanstadt'),('VE','Venezuela'),('AE','Vereinigte Arabische Emirate'),('US','Vereinigte Staaten von Amerika'),('VN','Vietnam'),('WF','Wallis und Futuna'),('CX','Weihnachtsinsel'),('EH','Westsahara'),('CF','Zentralafrikanische Republik'),('CY','Zypern');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kunden`
--

DROP TABLE IF EXISTS `kunden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunden` (
  `kundId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kundName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bundId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`kundId`),
  KEY `kundIdx` (`bundId`),
  CONSTRAINT `kundIdx` FOREIGN KEY (`bundId`) REFERENCES `bundesland` (`bundId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunden`
--

LOCK TABLES `kunden` WRITE;
/*!40000 ALTER TABLE `kunden` DISABLE KEYS */;
INSERT INTO `kunden` VALUES (1,'Lina',NULL),(2,'Rene',NULL),(4,'Maria',9),(5,'Sophia',10),(6,'Thomas',1);
/*!40000 ALTER TABLE `kunden` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-07 16:07:03
