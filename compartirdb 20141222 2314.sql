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
  `titulo_es` varchar(50) DEFAULT NULL,
  `titulo_en` varchar(50) DEFAULT NULL,
  `subtitulo_es` varchar(50) DEFAULT NULL,
  `subtitulo_en` varchar(50) DEFAULT NULL,
  `contenido_es` blob,
  `contenido_en` blob,
  `foto` varchar(200) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `link_es` varchar(255) DEFAULT NULL,
  `link_en` varchar(255) DEFAULT NULL,
  `prioridad` int(11) DEFAULT NULL,
  `periodo` int(4) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnf_subcategoria`
--

/*!40000 ALTER TABLE `cnf_subcategoria` DISABLE KEYS */;
INSERT INTO `cnf_subcategoria` (`id_subcategoria`,`id_categoria`,`titulo_es`,`titulo_en`,`subtitulo_es`,`subtitulo_en`,`contenido_es`,`contenido_en`,`foto`,`posicion`,`link_es`,`link_en`,`prioridad`,`periodo`,`fecha_creacion`,`fecha_vencimiento`) VALUES 
 (2,1,'sdfasdfdsf','asdfsdfsdf',NULL,NULL,NULL,NULL,NULL,NULL,'www.dfsdfs.werwer','www.sdfsdf.wwwww',NULL,NULL,NULL,NULL),
 (3,3,'dfgdfgdfg','dfgdfgdfgdfg','2222222222222222','2222222222222222222',NULL,NULL,NULL,NULL,'append-me-51590-img_12122014_180339.png','www.google.compras_en',NULL,2015,'0000-00-00','2014-12-31'),
 (5,2,'dfgsdfgdsfgdsf','dfgdsfgdsfg','3','3',0x33,0x33,'3',3,'dfgsgdfgdfg','sdfgdfg',1,NULL,NULL,NULL),
 (6,4,'qqqqqqqqqq','qqqqqqqqqqqqq','3','3',0x33,0x33,'3',3,'aaaaaaaaaaaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',2,NULL,NULL,NULL),
 (8,3,'actividad 1','dfgdfg',NULL,NULL,NULL,NULL,NULL,NULL,'http://localhost:8081/webcompartir/index.php/admin/data/upimages/EL_MAGO_DE_OZ.pdf','ssssssssssssss',1,2013,NULL,NULL),
 (9,3,'zzzzzzzzzzz','zzzzzz',NULL,NULL,NULL,NULL,NULL,NULL,'dsfsdfsdfs','2222222222222222222',1,2014,'0001-01-04','2014-12-31'),
 (10,3,'jjjjjjjjjjjj','jjjjjjjjjjjjjjjjjjjjjjjjjjjjj',NULL,NULL,NULL,NULL,NULL,NULL,'jjjjjjjjj','jjjjjjjjjjjjjjjjjjjjjjjjjjjjjj',4,2014,'0000-00-00','2014-12-30'),
 (12,3,'ccccccc','cccccccc',NULL,NULL,NULL,NULL,NULL,NULL,'cccccccccccccccc','ccccccccc',1,2012,'0000-00-00','2014-12-26'),
 (13,3,'actividad en espanol','actividad en ingles',NULL,NULL,NULL,NULL,NULL,NULL,'assets/uploads/files/assets/uploads/files/assets/uploads/files/5c161-listado-de-numeros-corporativos-tsb.pdf','d087a-listado-de-numeros-corporativos-tsb.pdf',1,3,'0000-00-00','2014-12-27'),
 (14,3,'actividadnueva','sdfsdfsdf',NULL,NULL,NULL,NULL,NULL,NULL,'assets/uploads/files/assets/uploads/files/837a2-1868-596841.pdf','e378c-5c161-listado-de-numeros-corporativos-tsb-6-.pdf',1,3,'0000-00-00','2014-12-31'),
 (15,3,'xsdfsdf','sdfsdf','wwwwwwwwwww','wwwwwwwwwwwww',0x3C756C3E0D0A093C6C693E0D0A09093C626C6F636B71756F74653E0D0A0909093C6831207374796C653D22636F6C6F723A207265643B20746578742D616C69676E3A2072696768743B223E0D0A090909093C7375703E3C7375623E3C737472696B653E3C753E3C656D3E3C7374726F6E673E3C7370616E207374796C653D226261636B67726F756E642D636F6C6F723A79656C6C6F773B223E63696E74686961206D617274696E657A20636C61726F733C2F7370616E3E3C2F7374726F6E673E3C2F656D3E3C2F753E3C2F737472696B653E3C2F7375623E3C2F7375703E3C2F68313E0D0A09093C2F626C6F636B71756F74653E0D0A093C2F6C693E0D0A3C2F756C3E0D0A,NULL,'asdfsdf',2147483647,'dfgdfgdfg','dfgdfgdfg',NULL,NULL,'0000-00-00',NULL),
 (16,3,'qqqqqqqqqqq','qqqqqqqqqqqqqqqqqqq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL);
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
