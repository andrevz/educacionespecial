-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.17


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema compartirdb
--

CREATE DATABASE IF NOT EXISTS compartirdb;
USE compartirdb;

--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`,`name_admin`,`password`) VALUES 
 (0,'cinthia','796bf4d6079cd26f82a7a7fd4aada89e');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Definition of table `cnf_actividad`
--

DROP TABLE IF EXISTS `cnf_actividad`;
CREATE TABLE `cnf_actividad` (
  `id` int(11) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `id_categoria` varchar(11) NOT NULL,
  `prioridad` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_creacion` timestamp NOT NULL,
  `fecha_validez` timestamp NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_actividad`
--

/*!40000 ALTER TABLE `cnf_actividad` DISABLE KEYS */;
INSERT INTO `cnf_actividad` (`id`,`actividad`,`id_categoria`,`prioridad`,`fecha_creacion`,`fecha_validez`,`estado`) VALUES 
 (1,'sefsd','dsfsdf','2014-12-18 00:00:00','2014-12-12 00:00:00','0000-00-00 00:00:00',''),
 (0,'dfghfdhgdfhd','dfgdfgd','2014-12-01 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','d'),
 (34,';dfjgvkljdgskfljkg','zdfsdfs','2014-12-13 05:58:38','2014-12-13 05:58:41','2014-12-13 05:58:44',''),
 (8,'123','234324','2014-12-24 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `cnf_actividad` ENABLE KEYS */;


--
-- Definition of table `cnf_actividad_imagen`
--

DROP TABLE IF EXISTS `cnf_actividad_imagen`;
CREATE TABLE `cnf_actividad_imagen` (
  `id_actividad` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_actividad_imagen`
--

/*!40000 ALTER TABLE `cnf_actividad_imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_actividad_imagen` ENABLE KEYS */;


--
-- Definition of table `cnf_actividad_link`
--

DROP TABLE IF EXISTS `cnf_actividad_link`;
CREATE TABLE `cnf_actividad_link` (
  `id_actividad` int(11) NOT NULL,
  `id_link` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_actividad_link`
--

/*!40000 ALTER TABLE `cnf_actividad_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_actividad_link` ENABLE KEYS */;


--
-- Definition of table `cnf_articulo`
--

DROP TABLE IF EXISTS `cnf_articulo`;
CREATE TABLE `cnf_articulo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referencia` varchar(20) DEFAULT NULL,
  `texto` varchar(255) NOT NULL DEFAULT '',
  `precio` varchar(10) DEFAULT NULL,
  `idseccion` int(10) unsigned DEFAULT NULL,
  `idimagen` int(11) DEFAULT NULL,
  `idimagengrande` int(10) unsigned DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_articulo`
--

/*!40000 ALTER TABLE `cnf_articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_articulo` ENABLE KEYS */;


--
-- Definition of table `cnf_categoria`
--

DROP TABLE IF EXISTS `cnf_categoria`;
CREATE TABLE `cnf_categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria_es` varchar(50) NOT NULL,
  `categoria_en` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_categoria`
--

/*!40000 ALTER TABLE `cnf_categoria` DISABLE KEYS */;
INSERT INTO `cnf_categoria` (`id_categoria`,`categoria_es`,`categoria_en`) VALUES 
 (2,'Servicios','Services'),
 (1,'Inicio','Home');
/*!40000 ALTER TABLE `cnf_categoria` ENABLE KEYS */;


--
-- Definition of table `cnf_config_global`
--

DROP TABLE IF EXISTS `cnf_config_global`;
CREATE TABLE `cnf_config_global` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parametro` varchar(35) NOT NULL DEFAULT '',
  `valor` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_config_global`
--

/*!40000 ALTER TABLE `cnf_config_global` DISABLE KEYS */;
INSERT INTO `cnf_config_global` (`id`,`parametro`,`valor`) VALUES 
 (1,'ruta_imagen','http://www.xxx.com/imagenes/productos/'),
 (2,'numero_maximo_noticias','10'),
 (3,'numero_maximo_destacados','10'),
 (4,'ruta_imagen_ftp','www/magen/productos'),
 (5,'ruta_descarga','http://www.xxx.com/descargas'),
 (6,'ruta_descarga_ftp','www/descargas');
/*!40000 ALTER TABLE `cnf_config_global` ENABLE KEYS */;


--
-- Definition of table `cnf_descarga`
--

DROP TABLE IF EXISTS `cnf_descarga`;
CREATE TABLE `cnf_descarga` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  `tamano` float DEFAULT NULL,
  `idcliente` int(10) unsigned DEFAULT NULL,
  `fechaalta` datetime DEFAULT NULL,
  `rutalocal` varchar(255) DEFAULT NULL,
  `fichero` varchar(100) NOT NULL DEFAULT '',
  `publica` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_descarga`
--

/*!40000 ALTER TABLE `cnf_descarga` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_descarga` ENABLE KEYS */;


--
-- Definition of table `cnf_imagen`
--

DROP TABLE IF EXISTS `cnf_imagen`;
CREATE TABLE `cnf_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL DEFAULT '',
  `imagenlocal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_imagen`
--

/*!40000 ALTER TABLE `cnf_imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_imagen` ENABLE KEYS */;


--
-- Definition of table `cnf_link`
--

DROP TABLE IF EXISTS `cnf_link`;
CREATE TABLE `cnf_link` (
  `id_link` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idimagen` int(10) unsigned DEFAULT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `fecha` datetime DEFAULT NULL,
  `descripcion` text NOT NULL,
  `enlacemostrar` varchar(100) DEFAULT NULL,
  `fechacaducidad` datetime DEFAULT NULL,
  `activa` char(1) DEFAULT NULL,
  `enlaceurl` varchar(200) DEFAULT NULL,
  `enlaceblank` char(1) DEFAULT NULL,
  `enlacehit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_link`
--

/*!40000 ALTER TABLE `cnf_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_link` ENABLE KEYS */;


--
-- Definition of table `cnf_menu`
--

DROP TABLE IF EXISTS `cnf_menu`;
CREATE TABLE `cnf_menu` (
  `id_menu` int(11) DEFAULT NULL,
  `nombre_menu` varchar(20) DEFAULT NULL,
  `pagina` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_menu`
--

/*!40000 ALTER TABLE `cnf_menu` DISABLE KEYS */;
INSERT INTO `cnf_menu` (`id_menu`,`nombre_menu`,`pagina`) VALUES 
 (1,'Inicio','index.php'),
 (2,'Servicios','servicios.php'),
 (3,'Actividades','actividades.php'),
 (4,'Cooperacion','cooperacion.php'),
 (5,'Convenios','convenios.php'),
 (6,'Contacto','info.php'),
 (8,'Amigos Compartir','formulario.php'),
 (7,'Articulos','temasdeinteres.php');
/*!40000 ALTER TABLE `cnf_menu` ENABLE KEYS */;


--
-- Definition of table `cnf_noticia`
--

DROP TABLE IF EXISTS `cnf_noticia`;
CREATE TABLE `cnf_noticia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idimagen` int(10) unsigned DEFAULT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `fecha` datetime DEFAULT NULL,
  `descripcion` text NOT NULL,
  `enlacemostrar` varchar(100) DEFAULT NULL,
  `fechacaducidad` datetime DEFAULT NULL,
  `activa` char(1) DEFAULT NULL,
  `enlaceurl` varchar(200) DEFAULT NULL,
  `enlaceblank` char(1) DEFAULT NULL,
  `enlacehit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_noticia`
--

/*!40000 ALTER TABLE `cnf_noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_noticia` ENABLE KEYS */;


--
-- Definition of table `cnf_seccion`
--

DROP TABLE IF EXISTS `cnf_seccion`;
CREATE TABLE `cnf_seccion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `descripcion` text,
  `idimagen` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnf_seccion`
--

/*!40000 ALTER TABLE `cnf_seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnf_seccion` ENABLE KEYS */;


--
-- Definition of table `cnf_subcategoria`
--

DROP TABLE IF EXISTS `cnf_subcategoria`;
CREATE TABLE `cnf_subcategoria` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `titulo_es` varchar(100) DEFAULT NULL,
  `titulo_en` varchar(100) DEFAULT NULL,
  `subtitulo_es` varchar(255) DEFAULT NULL,
  `subtitulo_en` varchar(255) DEFAULT NULL,
  `contenido_es` blob,
  `contenido_en` blob,
  `foto` varchar(255) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `link_es` varchar(255) DEFAULT NULL,
  `link_en` varchar(255) DEFAULT NULL,
  `prioridad` int(11) DEFAULT NULL,
  `periodo` int(4) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_subcategoria`
--

/*!40000 ALTER TABLE `cnf_subcategoria` DISABLE KEYS */;
INSERT INTO `cnf_subcategoria` (`id_subcategoria`,`id_categoria`,`titulo_es`,`titulo_en`,`subtitulo_es`,`subtitulo_en`,`contenido_es`,`contenido_en`,`foto`,`posicion`,`link_es`,`link_en`,`prioridad`,`periodo`,`fecha_creacion`,`fecha_vencimiento`,`estado`) VALUES 
 (2,1,'sdfasdfdsf','asdfsdfsdf',NULL,NULL,NULL,NULL,NULL,NULL,'www.dfsdfs.werwer','www.sdfsdf.wwwww',NULL,NULL,NULL,NULL,'ACTIVO'),
 (5,2,'dfgsdfgdsfgdsf','dfgdsfgdsfg','3','3',0x33,0x33,'3',3,'dfgsgdfgdfg','sdfgdfg',1,NULL,NULL,NULL,'ACTIVO'),
 (6,4,'qqqqqqqqqq','qqqqqqqqqqqqq','3','3',0x33,0x33,'3',3,'aaaaaaaaaaaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',2,NULL,NULL,NULL,'ACTIVO'),
 (25,3,'El Mago de Oz',' The Wizard of Oz','3','3',0x33,0x33,'3',3,'assets/uploads/files/08ece-el_mago_de_oz.pdf','assets/uploads/files/cf4a6-el_mago_de_oz.pdf',3,2014,'0000-00-00','0000-00-00','ACTIVO'),
 (26,3,'Cumpleaños enero - julio 2014','Birthday January-July 2014','3','3',0x33,0x33,'3',3,'assets/uploads/files/15a98-cumpleanosenerojulio2014.pdf','assets/uploads/files/c12ba-cumpleanosenerojulio2014.pdf',3,2014,'0000-00-00','0000-00-00','ACTIVO'),
 (27,3,'Día de la Madre en COMPARTIR','Mom\'s Day in COMPARTIR',NULL,NULL,NULL,NULL,NULL,NULL,'assets/uploads/files/3aec0-sidiadelamadre.pdf','assets/uploads/files/db6a4-sidiadelamadre.pdf',0,2014,'0001-01-01','2016-01-30','ACTIVO'),
 (28,3,'Cumpleaños julio - diciembre',' Birthday July to December',NULL,NULL,NULL,NULL,NULL,NULL,'assets/uploads/files/5c1f1-cumpleanos_juliodiciembre.pdf','assets/uploads/files/770ff-cumpleanos_juliodiciembre.pdf',0,2013,'0001-01-01','2016-01-28','ACTIVO'),
 (29,3,'Halloween y Todos Santos','Halloween and All Saints',NULL,NULL,NULL,NULL,NULL,NULL,'assets/uploads/files/2f3f2-encuentropsicomotricidadceoli.pdf','assets/uploads/files/3e77d-encuentropsicomotricidadceoli.pdf',0,2013,'0001-01-01','2016-01-29','ACTIVO'),
 (31,3,'Halloween 2012','Halloween 2012 en',NULL,NULL,NULL,NULL,NULL,NULL,'cbf6a-10_sindrome_de_west.pdf','2c192-11_discapacidad_visual.pdf',NULL,2012,'0000-00-00','2016-01-31','ACTIVO'),
 (32,3,'Felicidades cumpleañeros (septiembre - diciembre)','Felicidades cumpleañeros (septiembre - diciembre)e',NULL,NULL,NULL,NULL,NULL,NULL,'725e0-9_la_hidrocefalia.pdf','assets/uploads/files/31b55-13_retraso_psicomotor.pdf',NULL,2011,'0000-00-00','2015-01-28','ACTIVO'),
 (33,3,'Mast´aku Halloween 2011','Mast´aku Halloween 2011 en','3','3',0x33,0x33,'3',3,'assets/uploads/files/bdc7d-7_microcefalia.pdf','assets/uploads/files/assets/uploads/files/assets/uploads/files/0caef-9_la_hidrocefalia.pdf',3,2011,'0000-00-00','2015-12-31','ACTIVO'),
 (38,3,'titt','titu eng','3','3',0x33,0x33,'3',3,'assets/uploads/files/c2258-13_retraso_psicomotor.pdf','assets/uploads/files/bd435-9_la_hidrocefalia.pdf',3,2015,'0000-00-00','0000-00-00','INACTIVO'),
 (41,3,'Día de la madre','Día de la madre','3','3',0x33,0x33,'3',3,'assets/uploads/files/ab190-9_la_hidrocefalia.pdf','assets/uploads/files/5dbcb-16_trastorno_generalizado_del_desarrollo.pdf',3,2008,'0000-00-00','0000-00-00','ACTIVO'),
 (42,3,'Convivencia familiar','Convivencia familiar','3','3',0x33,0x33,'3',3,'assets/uploads/files/20f19-11_discapacidad_visual.pdf','assets/uploads/files/d75ae-11_discapacidad_visual.pdf',3,2008,'0000-00-00','2015-01-28','ACTIVO'),
 (43,3,'aaaaa','aaaa','3','3',0x33,0x33,'3',3,'assets/uploads/files/a4ea6-7_microcefalia.pdf','assets/uploads/files/4fbf5-11_discapacidad_visual.pdf',3,2014,'0000-00-00','0000-00-00','INACTIVO'),
 (44,3,'Mast`aku – Halloween','Mast`aku – Halloween','3','3',0x33,0x33,'3',3,'assets/uploads/files/4c412-16_trastorno_generalizado_del_desarrollo.pdf','assets/uploads/files/7d9d9-10_sindrome_de_west.pdf',3,2008,'0000-00-00','2015-01-31','ACTIVO'),
 (45,3,'Nuevos compañeros','Nuevos compañeros','3','3',0x33,0x33,'3',3,'assets/uploads/files/d5afc-2010_dia_madre.pdf','assets/uploads/files/abbbe-16_trastorno_generalizado_del_desarrollo.pdf',3,2008,'0000-00-00','2015-01-31','ACTIVO');
/*!40000 ALTER TABLE `cnf_subcategoria` ENABLE KEYS */;


--
-- Definition of table `cnf_usuario`
--

DROP TABLE IF EXISTS `cnf_usuario`;
CREATE TABLE `cnf_usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'a-activo, i-inactivo',
  `fecha_registro` datetime NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_usuario`
--

/*!40000 ALTER TABLE `cnf_usuario` DISABLE KEYS */;
INSERT INTO `cnf_usuario` (`ID`,`FName`,`LName`,`Age`,`Gender`,`Username`,`Password`,`status`,`fecha_registro`,`email`) VALUES 
 (11,'cinthia','martinez',13,'','','','','0000-00-00 00:00:00',NULL),
 (13,'gualy','riguera',21,'','','','','0000-00-00 00:00:00',NULL),
 (14,'roberto','bolanos',32,'','','','','0000-00-00 00:00:00',NULL),
 (16,'jose','luchito',13,'','','','','0000-00-00 00:00:00',NULL),
 (21,'karla','ojalvo',24,'','','','','0000-00-00 00:00:00',NULL),
 (22,'saul alberto','riguera reynalds',45,'','','','','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `cnf_usuario` ENABLE KEYS */;


--
-- Definition of table `promociones`
--

DROP TABLE IF EXISTS `promociones`;
CREATE TABLE `promociones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_promocion` varchar(120) NOT NULL,
  `mensaje_promocion` varchar(250) NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_vencimiento` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promociones`
--

/*!40000 ALTER TABLE `promociones` DISABLE KEYS */;
INSERT INTO `promociones` (`id`,`nombre_promocion`,`mensaje_promocion`,`fecha_inicio`,`fecha_vencimiento`) VALUES 
 (1,'MI PROMOCION','ESTE ES EL MENSJe de mi promocion','2014-12-12 05:26:24','2014-12-25 07:18:00'),
 (4,'promocion 2','klsdjfklsdjfklsdjfklsdjfldsjfkl sdklfjlskdfjklsdf sdflksdjlf sdfljklsdfkjsdlf sdfsdlfkjsdfjksdlfjskldf lsdfskldfksldfjksadk fin  otro fin   sldjklfjsdlfjlsdf sdlfjslkdfjlsdflsdfjkl fin2','2014-12-03 05:56:41','2014-12-09 05:56:50');
/*!40000 ALTER TABLE `promociones` ENABLE KEYS */;


--
-- Definition of table `trx_sesion`
--

DROP TABLE IF EXISTS `trx_sesion`;
CREATE TABLE `trx_sesion` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(14) NOT NULL DEFAULT '',
  `ip` varchar(48) DEFAULT NULL,
  `guest` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trx_sesion`
--

/*!40000 ALTER TABLE `trx_sesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_sesion` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
