/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.25-MariaDB : Database - bd_contaazul
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bd_contaazul` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bd_contaazul`;

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `address_number` varchar(50) DEFAULT NULL,
  `address_neighb` varchar(100) DEFAULT NULL,
  `address_city` varchar(50) DEFAULT NULL,
  `address_state` varchar(50) DEFAULT NULL,
  `address_country` varchar(50) DEFAULT NULL,
  `address_zipcode` varchar(50) DEFAULT NULL,
  `stars` int(11) NOT NULL DEFAULT '3',
  `internal_obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`id_company`,`name`,`email`,`phone`,`address`,`address2`,`address_number`,`address_neighb`,`address_city`,`address_state`,`address_country`,`address_zipcode`,`stars`,`internal_obs`) values 
(1,1,'fagner sebastiao dias de avila','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(3,1,'Cliente de Teste2','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(4,1,'Cliente de Teste3','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(5,1,'Cliente de Teste4','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(6,1,'Cliente de Teste5','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(8,1,'Cliente de Teste7','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(9,1,'Cliente de Teste8','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(10,1,'Cliente de Teste9','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(12,1,'Cliente de Teste11','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(13,1,'Cliente de Teste12','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(14,1,'Cliente de Teste13','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(15,1,'Cliente de Teste14','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(16,1,'Cliente de Teste15','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(17,1,'Cliente de Teste16','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(18,1,'Cliente de Teste17','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(19,1,'Cliente de Teste18','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(20,1,'Cliente de Teste19','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(21,1,'Cliente de Teste20','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(22,1,'Cliente de Teste21','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(23,1,'Cliente de Teste22','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(24,1,'Cliente de Teste23','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(25,1,'Cliente de Teste24','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(26,1,'Cliente de Teste25','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(27,1,'Cliente de Teste26','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(28,1,'Cliente de Teste27','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(29,1,'Cliente de Teste28','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(30,1,'Cliente de Teste29','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(31,1,'Cliente de Teste30','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(32,1,'Cliente de Teste31','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(33,1,'Cliente de Teste32','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(34,1,'Cliente de Teste33','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(35,1,'Cliente de Teste34','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(36,1,'Cliente de Teste35','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(37,1,'Cliente de Teste36','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(38,1,'Cliente de Teste37','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(39,1,'Cliente de Teste38','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(40,1,'Cliente de Teste39','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(41,1,'Cliente de Teste40','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(42,1,'Cliente de Teste41','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(43,1,'Cliente de Teste42','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(44,1,'Cliente de Teste43','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(45,1,'Cliente de Teste44','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(46,1,'Cliente de Teste45','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(47,1,'Cliente de Teste46','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(48,1,'Cliente de Teste47','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(49,1,'Cliente de Teste48','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(50,1,'Cliente de Teste49','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(51,1,'Cliente de Teste50','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(52,1,'Cliente de Teste51','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste'),
(53,1,'Cliente de Teste52','fagner_avila99@hotmail.com','34582182','QR 405 Conjunto 7','44','28','Samambaia Norte (Samambaia)','BrasÃ­lia','DF','Brasil','72319207',4,'teste');

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `companies` */

insert  into `companies`(`id`,`name`) values 
(1,'avila ti');

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quant` int(11) NOT NULL,
  `min_quant` int(11) DEFAULT NULL,
  `id_company` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inventory` */

/*Table structure for table `inventory_history` */

DROP TABLE IF EXISTS `inventory_history`;

CREATE TABLE `inventory_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `action` varchar(3) NOT NULL,
  `data` datetime NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inventory_history` */

/*Table structure for table `permissions_group` */

DROP TABLE IF EXISTS `permissions_group`;

CREATE TABLE `permissions_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `params` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `permissions_group` */

insert  into `permissions_group`(`id`,`id_company`,`name`,`params`) values 
(1,1,'grupavila','2,8,9,10,11,12'),
(6,1,'tres','2,9'),
(7,1,'quatro 4','8');

/*Table structure for table `permissions_params` */

DROP TABLE IF EXISTS `permissions_params`;

CREATE TABLE `permissions_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `permissions_params` */

insert  into `permissions_params`(`id`,`id_company`,`name`) values 
(2,1,'permissions_view'),
(8,1,'permissions_edit'),
(9,1,'logout'),
(10,1,'users_view'),
(11,1,'clients_view'),
(12,1,'clients_edit');

/*Table structure for table `purcheses` */

DROP TABLE IF EXISTS `purcheses`;

CREATE TABLE `purcheses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_purchese` datetime NOT NULL,
  `total_price` float NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purcheses` */

/*Table structure for table `purcheses_products` */

DROP TABLE IF EXISTS `purcheses_products`;

CREATE TABLE `purcheses_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_purchese` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quant` int(11) DEFAULT NULL,
  `purchese_price` float DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purcheses_products` */

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_clients` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total_price` float DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sales` */

/*Table structure for table `sales_products` */

DROP TABLE IF EXISTS `sales_products`;

CREATE TABLE `sales_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sales` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sales_products` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_group` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`id_company`,`email`,`password`,`id_group`) values 
(1,1,'fagner.avila@gmail.com','202cb962ac59075b964b07152d234b70',1),
(2,1,'fagner@fagner.com','202cb962ac59075b964b07152d234b70',7);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
