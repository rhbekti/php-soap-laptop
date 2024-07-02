-- Adminer 4.8.1 MySQL 8.3.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `db_soap_laptop`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `barang` (`id`, `nama`, `harga`) VALUES
(1,	'ASUS VIVOBOOK 14 A1404ZA - I5 1235 8GB 512GB 14.0 FHD WIN11 OHS',	8904055),
(2,	'HP 14S DQ5115TU Core i3 1215U 4GB SSD 512GB 14\" FHD W11+OHS',	6105000),
(3,	'MacBook Pro (14 inci, M3 Max)',	56499000),
(4,	'MacBook Pro (14 inci, M2 Pro, 2022)',	34499000),
(10,	'Lenovo IdeaPad 1 14IGL7 82V6008AID Notebook - Sand ',	4999000);

-- 2024-07-02 06:40:14
