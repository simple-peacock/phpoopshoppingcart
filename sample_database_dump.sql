-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `phpshoppingcart` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `phpshoppingcart`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `shipping` float NOT NULL,
  `inventory` int(11) NOT NULL,
  `imagepath` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `shipping`, `inventory`, `imagepath`) VALUES
(1,	'Apple iPhone 6',	'The long-awaited Apple iPhone 6 has finally been unveiled and, as expected, its bigger and better than ever. With a large 4.7in Retina HD display and a beautiful, slim design, the new iPhone is a pleasure to use. A new A8 chip delivers more power while an M8 motion coprocessor continuously measures data from the accelerometer, compass, gyroscope and barometer, enabling a range of new apps to track your elevation, distance and movement.',	998,	14.99,	5,	'iphone6.jpg'),
(2,	'Samsung Galaxy S5',	'The most highly anticipated smartphone of 2014 is here! Its everything that tech lovers and phone fanatics have been craving, and now its here! The brand new Samsung Galaxy S5 combines massive power and a hot new design with smart new features and technology. Bring your life into the future with the S5',	579,	14.99,	6,	'samsung_galaxy_s5.jpg'),
(3,	'Garmin Vivofit',	'Move Bar - Motivates you to be active throughout the day by displaying a red move bar after one hour of inactivity. Additional segments light up for every 15 minutes of inactivity. Just walk for a couple of minutes to reset. 24/7 Wearable - Stylish, comfortable and water resistant2 wristband that is always on and ready to go. Long battery life - Stays on for more than a year without having to change the battery. Easy-to-read display - View the time of day and your stats right on your wrist.',	99,	9.99,	9,	'garmin_vivofit.jpg'),
(4,	'Samsung UN65HU7250 Curved 65-Inch 4K Ultra HD 120H',	'Refresh Rate: 120Hz (Native); Clear Motion Rate 960 (Effective) Backlight: LED (Edge-Lit w/Local Dimming) Smart Functionality: Yes - Voice Control Dimensions (W x H x D): TV without stand: 57.1\'\' x 33.1\" x 5.3\'\', TV with stand: 57.1\'\' x 34.7\'\' x 11.8\'\' Inputs: 4 HDMI, 3 USB, 1 Component In, 1 Composite In Accessories Included: Smart Remote Control',	2199,	49.99,	10,	'samsung_smart_led_tv.jpg'),
(5,	'Sony Alpha a7S Digital Camera',	'Screen Size: 3\" Screen Features: Tiltable TFT-LCD with 921K dots Megapixels: 12.2MP Image Resolution: 4240 x 2832 Optical Zoom: Not Available',	2498,	29.99,	10,	'sony_alpha_a7s.jpg');

-- 2015-03-08 14:11:29
