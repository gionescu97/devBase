-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: streaming
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

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
-- Table structure for table `anbieter`
--

DROP TABLE IF EXISTS `anbieter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anbieter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anbieter`
--

LOCK TABLES `anbieter` WRITE;
/*!40000 ALTER TABLE `anbieter` DISABLE KEYS */;
INSERT INTO `anbieter` VALUES (1,'Amazon Prime','https://www.amazon.at'),(2,'Netflix','https://www.netflix.com'),(3,'Sky Ticket','https://ticket.sky.at');
/*!40000 ALTER TABLE `anbieter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anbieter_filme`
--

DROP TABLE IF EXISTS `anbieter_filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anbieter_filme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `anbieter_id` int NOT NULL,
  `film_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anbieter_filme_anbieter_id_IDX` (`anbieter_id`) USING BTREE,
  KEY `anbieter_filme_film_id_IDX` (`film_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anbieter_filme`
--

LOCK TABLES `anbieter_filme` WRITE;
/*!40000 ALTER TABLE `anbieter_filme` DISABLE KEYS */;
INSERT INTO `anbieter_filme` VALUES (1,1,1),(2,2,1),(3,3,1),(4,2,2),(5,1,3);
/*!40000 ALTER TABLE `anbieter_filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kategorie_id` int NOT NULL,
  `kurztext` varchar(256) DEFAULT NULL,
  `langtext` varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bild_url` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filme_kategorie_id_IDX` (`kategorie_id`) USING BTREE,
  CONSTRAINT `filme_FK` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorien` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme`
--

LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
INSERT INTO `filme` VALUES (1,'Assasinassion Games',1,'Brazil ist ein Auftragskiller, der jeden Job annimmt, solange der Preis stimmt.','Brazil (Jean-Claude Van Damme) und Roland Flint (Scott Adkins) sind die besten Killer der Welt, kennen sich aber nicht. Während Brazil jeden Job erledigt, solange die Bezahlung stimmt, wollte Roland Flint nach einem tragischen Vorfall, der seine Frau ins Koma brachte, das Geschäft verlassen. Als ein Kopfgeld auf jenen Drogenboss ausgesetzt wird, der Flints Frau auf dem Gewissen hat, schließen die beiden Auftragsmörder eine Allianz. Um zwilichtige DEA-Agenten und Mitglieder der Unterwelt aus dem Weg zu räumen, und schließlich ihr eigentliches Ziel auszuschalten, nützt jeder der beiden seine ganz besonderen Fähigkeiten.','http://de.web.img3.acsta.net/c_215_290/medias/nmedia/18/85/07/67/19823662.jpg'),(2,'Taxi 5',1,'Taxi 5 ist eine Actionkomödie aus dem Jahr 2018 des Produzenten Luc Besson','Unfähige Polizisten legen den bösen Buben nur deshalb das Handwerk, weil sie von einem getunten Taxi der Marke Peugeot 406, das in den engen Straßen von Marseille immer wieder neue Geschwindigkeitsrekorde aufstellt, unterstützt werden. So lässt sich der Plot jedes „Taxi“-Films in einem Satz auf den Punkt bringen. Ein simples, aber nichtsdestotrotz ungeheuer erfolgreiches Konzept: Die ersten vier Teile der Reihe spielten an den weltweiten Kinokassen immerhin 234 Millionen Dollar ein – ein gigantischer finanzieller Hit für eine französischsprachige Produktion. ','http://de.web.img3.acsta.net/c_215_290/pictures/18/09/17/12/52/4903927.jpg'),(3,'Mulan',5,'Mulan ist ein US-amerikanischer Abenteuerfilm aus dem Jahr 2020. Er basiert auf der chinesischen Volksballade Hua Mulan und ist eine Adaption des gleichnamigen Disney-Zeichentrickfilms von 1998.','Hua Mulan ist die älteste Tochter eines hoch geehrten Kriegers. Sie hat Temperament, Hingabe und ist schnell zu Fuß. Als der Kaiser befiehlt, dass ein Mann aus jeder Familie in der Armee dienen muss, als die Hunnen ins Kaiserreich einfallen, springt Mulan, als Mann getarnt, für ihren kranken Vater ein. Sie nimmt den Namen Hua Jun an und wird einer von Chinas größten Kriegern. Während des Kriegs offenbart sie ihr Geschlecht und wird verstoßen. Trotzdem kämpft sie weiter für den Kaiser und wird nach Fürsprache ihrer ehemaligen Kameraden wieder in die Armee aufgenommen. Nachdem sie von einem Hinterhalt, währenddem der Kaiser in der Kaiserstadt getötet werden soll, erfährt, führt sie eine kleine Gruppe von Kriegern an, um den Kaiser zu beschützen, was letztendlich auch gelingt. Der Kaiser bietet ihr an, Offizier in seiner Armee zu werden, doch sie beschließt, zurück in ihr Dorf zu kehren','https://www.tagesschau.de/multimedia/bilder/mulan-103~_v-videowebl.jpg');
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorien`
--

DROP TABLE IF EXISTS `kategorien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategorien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorien`
--

LOCK TABLES `kategorien` WRITE;
/*!40000 ALTER TABLE `kategorien` DISABLE KEYS */;
INSERT INTO `kategorien` VALUES (1,'Action'),(2,'Comedy'),(3,'Thriller'),(4,'Sport'),(5,'Familie');
/*!40000 ALTER TABLE `kategorien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_logs`
--

DROP TABLE IF EXISTS `search_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(16) DEFAULT NULL,
  `text` varchar(1024) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `records` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_logs`
--

LOCK TABLES `search_logs` WRITE;
/*!40000 ALTER TABLE `search_logs` DISABLE KEYS */;
INSERT INTO `search_logs` VALUES (1,'select','SELECT anbieter_filme.film_id as film_id, anbieter_filme.anbieter_id as anbieter_id, filme.title as title_film, anbieter.title as title_anbieter, anbieter.url as anbieter_url, filme.kurztext as kurztext, filme.langtext as langtext, filme.bild_url bild_url  FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id WHERE filme.title like \'%Tax%\'  AND filme.kategorie_id=1','2020-10-13 14:10:01',1),(2,'select','SELECT anbieter_filme.film_id as film_id, anbieter_filme.anbieter_id as anbieter_id, filme.title as title_film, anbieter.title as title_anbieter, anbieter.url as anbieter_url, filme.kurztext as kurztext, filme.langtext as langtext, filme.bild_url bild_url  FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id WHERE filme.title like \'%Tax%\'  AND filme.kategorie_id=1','2020-10-13 14:10:05',1),(3,'select','SELECT anbieter_filme.film_id as film_id, anbieter_filme.anbieter_id as anbieter_id, filme.title as title_film, anbieter.title as title_anbieter, anbieter.url as anbieter_url, filme.kurztext as kurztext, filme.langtext as langtext, filme.bild_url bild_url  FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id WHERE filme.title like \'%Tax%\' ','2020-10-14 08:10:18',1),(4,'select','SELECT anbieter_filme.film_id as film_id, anbieter_filme.anbieter_id as anbieter_id, filme.title as title_film, anbieter.title as title_anbieter, anbieter.url as anbieter_url, filme.kurztext as kurztext, filme.langtext as langtext, filme.bild_url bild_url  FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id WHERE filme.title like \'%a%\' ','2020-10-16 08:10:08',1),(5,'select','SELECT * FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id','2020-10-20 19:10:30',1),(6,'select','SELECT * FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id','2020-10-20 20:10:14',1),(7,'select','SELECT * FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id','2020-10-20 20:10:15',1),(8,'select','SELECT * FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id','2020-10-20 20:10:18',1),(9,'select','SELECT * FROM anbieter_filme  JOIN anbieter  ON anbieter_filme.anbieter_id=anbieter.id 	Join filme ON anbieter_filme.film_id = filme.id','2020-12-07 10:12:02',1);
/*!40000 ALTER TABLE `search_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'streaming'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-08  9:13:26
