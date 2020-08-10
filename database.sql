-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.21-0ubuntu0.20.04.4 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for DB
CREATE DATABASE IF NOT EXISTS `DB` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `DB`;

-- Dumping structure for table DB.ADDRESS
CREATE TABLE IF NOT EXISTS `ADDRESS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `STREET` varchar(50) DEFAULT NULL,
  `SUITE` varchar(50) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `ZIPCODE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table DB.ADDRESS: ~10 rows (approximately)
/*!40000 ALTER TABLE `ADDRESS` DISABLE KEYS */;
INSERT INTO `ADDRESS` (`ID`, `STREET`, `SUITE`, `CITY`, `ZIPCODE`) VALUES
	(1, 'Kulas Light', 'Apt. 556', 'Gwenborough', '92998-3874'),
	(2, 'Victor Plains', 'Suite 879', 'Wisokyburgh', '90566-7771'),
	(3, 'Douglas Extension', 'Suite 847', 'McKenziehaven', '59590-4157'),
	(4, 'Hoeger Mall', 'Apt. 692', 'South Elvis', '53919-4257'),
	(5, 'Skiles Walks', 'Suite 351', 'Roscoeview', '33263'),
	(6, 'Norberto Crossing', 'Apt. 950', 'South Christy', '23505-1337'),
	(7, 'Rex Trail', 'Suite 280', 'Howemouth', '58804-1099'),
	(8, 'Ellsworth Summit', 'Suite 729', 'Aliyaview', '45169'),
	(9, 'Dayna Park', 'Suite 449', 'Bartholomebury', '76495-3109'),
	(10, 'Kattie Turnpike', 'Suite 198', 'Lebsackbury', '31428-2261');
/*!40000 ALTER TABLE `ADDRESS` ENABLE KEYS */;

-- Dumping structure for table DB.CENDANA
CREATE TABLE IF NOT EXISTS `CENDANA` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UMUR` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `KOTA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table DB.CENDANA: ~5 rows (approximately)
/*!40000 ALTER TABLE `CENDANA` DISABLE KEYS */;
INSERT INTO `CENDANA` (`ID`, `NAMA`, `UMUR`, `KOTA`) VALUES
	(3, 'FIKRI ', '22', ' TANAH MERAH'),
	(4, 'FIKRI HIDAYAT ', '34', ' TANAH MERAH'),
	(5, 'FIKRI HIDAYAT ', '23', ' KUALA ENOK'),
	(6, 'RIDHO ', '22', ' PERAWANG'),
	(7, '', '23', ' TAHUN'),
	(13, 'FIKRI HIDAYAT ', '45', ' PERAWANG');
/*!40000 ALTER TABLE `CENDANA` ENABLE KEYS */;

-- Dumping structure for table DB.JSON
CREATE TABLE IF NOT EXISTS `JSON` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(50) DEFAULT NULL,
  `WEBSITE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table DB.JSON: ~10 rows (approximately)
/*!40000 ALTER TABLE `JSON` DISABLE KEYS */;
INSERT INTO `JSON` (`ID`, `NAME`, `USERNAME`, `EMAIL`, `PHONE`, `WEBSITE`) VALUES
	(1, 'Leanne Graham', 'Bret', 'Sincere@april.biz', '1-770-736-8031 x56442', 'hildegard.org'),
	(2, 'Ervin Howell', 'Antonette', 'Shanna@melissa.tv', '010-692-6593 x09125', 'anastasia.net'),
	(3, 'Clementine Bauch', 'Samantha', 'Nathan@yesenia.net', '1-463-123-4447', 'ramiro.info'),
	(4, 'Patricia Lebsack', 'Karianne', 'Julianne.OConner@kory.org', '493-170-9623 x156', 'kale.biz'),
	(5, 'Chelsey Dietrich', 'Kamren', 'Lucio_Hettinger@annie.ca', '(254)954-1289', 'demarco.info'),
	(6, 'Mrs. Dennis Schulist', 'Leopoldo_Corkery', 'Karley_Dach@jasper.info', '1-477-935-8478 x6430', 'ola.org'),
	(7, 'Kurtis Weissnat', 'Elwyn.Skiles', 'Telly.Hoeger@billy.biz', '210.067.6132', 'elvis.io'),
	(8, 'Nicholas Runolfsdottir V', 'Maxime_Nienow', 'Sherwood@rosamond.me', '586.493.6943 x140', 'jacynthe.com'),
	(9, 'Glenna Reichert', 'Delphine', 'Chaim_McDermott@dana.io', '(775)976-6794 x41206', 'conrad.com'),
	(10, 'Clementina DuBuque', 'Moriah.Stanton', 'Rey.Padberg@karina.biz', '024-648-3804', 'ambrose.net');
/*!40000 ALTER TABLE `JSON` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
