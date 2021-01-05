/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.11-MariaDB : Database - teatar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`teatar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `teatar`;

/*Table structure for table `predstave` */

DROP TABLE IF EXISTS `predstave`;

CREATE TABLE `predstave` (
  `id_predstave` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `trajanje` int(11) NOT NULL,
  `datum_izvodjenja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_vrste` int(11) NOT NULL,
  PRIMARY KEY (`id_predstave`),
  KEY `id_vrste` (`id_vrste`),
  CONSTRAINT `predstave_ibfk_1` FOREIGN KEY (`id_vrste`) REFERENCES `vrste_predstava` (`id_vrste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `predstave` */

insert  into `predstave`(`id_predstave`,`naslov`,`cena`,`trajanje`,`datum_izvodjenja`,`id_vrste`) values 
(8,'Kakva ti je zena takav ti je zivot',250,120,'11.11.2019.',2);

/*Table structure for table `vrste_predstava` */

DROP TABLE IF EXISTS `vrste_predstava`;

CREATE TABLE `vrste_predstava` (
  `id_vrste` int(11) NOT NULL,
  `naziv_vrste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_vrste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vrste_predstava` */

insert  into `vrste_predstava`(`id_vrste`,`naziv_vrste`) values 
(1,'Tragedija'),
(2,'Komedija'),
(3,'Opera'),
(4,'Mjuzikl'),
(5,'Balet');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
