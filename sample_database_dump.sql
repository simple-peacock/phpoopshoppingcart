-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `phpshoppingcart` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `phpshoppingcart`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `shipping` float NOT NULL,
  `inventory` int(11) NOT NULL,
  `imagepath` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `shipping`, `inventory`, `imagepath`) VALUES
(1,	'Apple iPhone 6',	'The latest generation Apple iPhone 6.',	1199.95,	14.99,	5,	'iphone6.jpg'),
(2,	'Samsung Galaxy S5',	'The superior phone for the superior man.',	799.99,	14.99,	6,	'samsung_galaxy_s5.jpg');

-- 2015-02-20 11:22:42
