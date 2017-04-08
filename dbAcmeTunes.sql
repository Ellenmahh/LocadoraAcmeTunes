CREATE DATABASE  IF NOT EXISTS `dbacmetunes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbacmetunes`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dbacmetunes
-- ------------------------------------------------------
-- Server version	5.7.14-log

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
-- Table structure for table `tblcategoria`
--

DROP TABLE IF EXISTS `tblcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcategoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_cat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategoria`
--

LOCK TABLES `tblcategoria` WRITE;
/*!40000 ALTER TABLE `tblcategoria` DISABLE KEYS */;
INSERT INTO `tblcategoria` VALUES (1,'Filmes em DVD'),(2,'Filmes em VHS');
/*!40000 ALTER TABLE `tblcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldestaque`
--

DROP TABLE IF EXISTS `tbldestaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldestaque` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `principal` varchar(45) DEFAULT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldestaque`
--

LOCK TABLES `tbldestaque` WRITE;
/*!40000 ALTER TABLE `tbldestaque` DISABLE KEYS */;
INSERT INTO `tbldestaque` VALUES (47,'chris2.jpg','  Todo mês escolheremos atores em destaque,saiba mais sobre a vida de cada um deles, mande ja seus pedidos no nosso FALE CONOSCO. Aproveite!!!! '),(49,'adam.jpg',' kkk'),(50,'chris.jpg',' sdsd'),(51,'cinza.jpg',' aaa');
/*!40000 ALTER TABLE `tbldestaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfaleconosco`
--

DROP TABLE IF EXISTS `tblfaleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfaleconosco` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `homePage` varchar(50) DEFAULT NULL,
  `linkFacebook` varchar(50) DEFAULT NULL,
  `sugestoesCriticas` text,
  `infoProdutos` text,
  `sexo` char(1) NOT NULL,
  `profissao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfaleconosco`
--

LOCK TABLES `tblfaleconosco` WRITE;
/*!40000 ALTER TABLE `tblfaleconosco` DISABLE KEYS */;
INSERT INTO `tblfaleconosco` VALUES (3,'SS','SS','SS','SS@S','SS','SS','SS',' SS\r\n						','F','SS'),(4,'teste','teste','teste','teste@teste','teste','teste','teste','teste \r\n						','M','test');
/*!40000 ALTER TABLE `tblfaleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmemes`
--

DROP TABLE IF EXISTS `tblfilmemes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmemes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dataLancamento` varchar(45) NOT NULL,
  `direcao` varchar(45) NOT NULL,
  `elenco` varchar(45) NOT NULL,
  `nacionalidade` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmemes`
--

LOCK TABLES `tblfilmemes` WRITE;
/*!40000 ALTER TABLE `tblfilmemes` DISABLE KEYS */;
INSERT INTO `tblfilmemes` VALUES (6,'111','asd','asd','aaaaaaaaab','cinza.jpg'),(14,'qwe','qwe','qwe','qwe','deadpool.jpg'),(16,'aa','k','k','kkkk','5onda.jpg');
/*!40000 ALTER TABLE `tblfilmemes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfilmes`
--

DROP TABLE IF EXISTS `tblfilmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfilmes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `preco` double NOT NULL,
  `nome_filmes` varchar(45) NOT NULL,
  `fk_cat` int(10) unsigned NOT NULL,
  `fk_sub` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tblfilmes_1` (`fk_cat`),
  KEY `FK_tblfilmes_2` (`fk_sub`),
  CONSTRAINT `FK_tblfilmes_1` FOREIGN KEY (`fk_cat`) REFERENCES `tblcategoria` (`id`),
  CONSTRAINT `FK_tblfilmes_2` FOREIGN KEY (`fk_sub`) REFERENCES `tblsub` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfilmes`
--

LOCK TABLES `tblfilmes` WRITE;
/*!40000 ALTER TABLE `tblfilmes` DISABLE KEYS */;
INSERT INTO `tblfilmes` VALUES (13,'bruxaecacador.jpg','Freya é a irmã boa da toda poderosa Rainha Ravenna. Depois de passar por um trauma,ela desperta para os poderes mágicos e se isola. Ela constrói seu próprio reinado – se torna a Rainha do Gelo',20,'O caçador e a Rainha do Gelo',1,2),(14,'5onda.jpg','teste',30,'5 onda',2,1);
/*!40000 ALTER TABLE `tblfilmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgenero`
--

DROP TABLE IF EXISTS `tblgenero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgenero` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgenero`
--

LOCK TABLES `tblgenero` WRITE;
/*!40000 ALTER TABLE `tblgenero` DISABLE KEYS */;
INSERT INTO `tblgenero` VALUES (1,'comédia'),(2,'Terror'),(3,'Romance'),(4,'Ação'),(5,'Aventura'),(6,'Animação'),(7,'Ficção Científica');
/*!40000 ALTER TABLE `tblgenero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnivel`
--

DROP TABLE IF EXISTS `tblnivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblnivel` (
  `idNivel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnivel`
--

LOCK TABLES `tblnivel` WRITE;
/*!40000 ALTER TABLE `tblnivel` DISABLE KEYS */;
INSERT INTO `tblnivel` VALUES (1,'admnistrador'),(2,'basico'),(3,'cataloguista');
/*!40000 ALTER TABLE `tblnivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpromocoes`
--

DROP TABLE IF EXISTS `tblpromocoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpromocoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `de` double NOT NULL,
  `por` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpromocoes`
--

LOCK TABLES `tblpromocoes` WRITE;
/*!40000 ALTER TABLE `tblpromocoes` DISABLE KEYS */;
INSERT INTO `tblpromocoes` VALUES (4,'angrybirds.jpg','shshhsaa',19.9,14),(5,'malvado.jpg','Meu Malvado Favorito',10,2),(6,'bruxaecacador.jpg','Bruxa e Cacador',200,100);
/*!40000 ALTER TABLE `tblpromocoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsub`
--

DROP TABLE IF EXISTS `tblsub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsub` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_sub` varchar(25) NOT NULL,
  `idCat` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCat` (`idCat`),
  CONSTRAINT `idCat` FOREIGN KEY (`idCat`) REFERENCES `tblcategoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsub`
--

LOCK TABLES `tblsub` WRITE;
/*!40000 ALTER TABLE `tblsub` DISABLE KEYS */;
INSERT INTO `tblsub` VALUES (1,'Suspense',1),(2,'Terror',1),(3,'Documentário',2);
/*!40000 ALTER TABLE `tblsub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblusuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `fk_idNivel` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tblusuarios_1` (`fk_idNivel`),
  CONSTRAINT `FK_tblusuarios_1` FOREIGN KEY (`fk_idNivel`) REFERENCES `tblnivel` (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (3,'ellen','123',1),(14,'teste','123',3),(15,'blabla','123',2);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-08 13:37:45
