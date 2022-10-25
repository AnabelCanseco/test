# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.8.3-MariaDB)
# Database: test
# Generation Time: 2022-10-25 23:04:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table auth_api
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_api`;

CREATE TABLE `auth_api` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `auth_api` WRITE;
/*!40000 ALTER TABLE `auth_api` DISABLE KEYS */;

INSERT INTO `auth_api` (`id`, `username`, `password`, `token`)
VALUES
	(1,'test','secret','bbbfabb70cdbacd334d1eaf9d0c17ce2');

/*!40000 ALTER TABLE `auth_api` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `rfc`, `pwd`, `notes`)
VALUES
	(1,'anabel','anabel@example.com','1234567898','XAXX010101000','$2y$14$S.8F8v2.5BV67TkSjMDTgOLB88rR6TIh5ntXK6zI0l.Qq6wwcyeJi','Ranita ahora es ranita'),
	(2,'patricia','paty@example.com','1234567891','XAXX010101000','$2y$14$qpBag1.t2eXca/079Ze/bek0gUh0zk6.mGvhv2dUjRy05562Ok0bq','segundo registro de usuario'),
	(3,'ranita','anabel.canseco@fff.com','1234567898','XAXX010101000','$2y$14$HKhu9ai6sGoldXYH9zLNSeA6KiMhaAeFIYoUfLtQIAEKAuKAphlI.','kfljaslkfjdsaklfj kasdflksdaj flksdjfs lkasdf lkasdf'),
	(4,'tonita','toni@example.com','1234567891','XAXX010101000','$2y$14$tH/rcCinzt/iNGbegdVRn.ZDVmZ3SmeSfljg6mtQUgIrp66BLf6a.','kljdfasdkldf lkjsdf');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
