-- --------------------------------------------------------
-- Poslužitelj:                  127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Verzija:             9.1.0.4911
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for kolekcija
CREATE DATABASE IF NOT EXISTS `kolekcija` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `kolekcija`;


-- Dumping structure for table kolekcija.filmovi
CREATE TABLE IF NOT EXISTS `filmovi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_zanr` int(11) NOT NULL,
  `godina` char(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `trajanje` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slika` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `zanr` (`id_zanr`),
  CONSTRAINT `zanr` FOREIGN KEY (`id_zanr`) REFERENCES `zanr` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kolekcija.filmovi: ~3 rows (approximately)
/*!40000 ALTER TABLE `filmovi` DISABLE KEYS */;
REPLACE INTO `filmovi` (`ID`, `naslov`, `id_zanr`, `godina`, `trajanje`, `slika`) VALUES
	(29, 'Antitrust', 5, '2001', '109', 'antitrust_2001.jpg'),
	(31, 'Firewall', 5, '2006', '105', 'firewall_2006.jpg'),
	(32, 'Hackers', 1, '1995', '107', 'hackers_1995.jpg'),
	(33, 'Operation swordfish', 4, '2001', '99', 'operation_swordfish_2001.jpg'),
	(34, 'Operation takedown', 5, '2000', '96', 'operation_takedown_2000.jpg'),
	(35, 'Pirates of silicone ', 6, '1999', '95', 'pirates_of_silicone_valley_1999.jpg'),
	(36, 'The social network', 6, '2010', '120', 'the_social_network_2010.jpg'),
	(37, 'Tron', 4, '1982', '96', 'tron_1982.jpg'),
	(38, 'Tron legacy', 4, '2010', '125', 'tron_legacy_2010.jpg'),
	(39, 'War games', 2, '1983', '114', 'war_games_1983.jpg');
/*!40000 ALTER TABLE `filmovi` ENABLE KEYS */;


-- Dumping structure for table kolekcija.zanr
CREATE TABLE IF NOT EXISTS `zanr` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `naziv` (`naziv`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kolekcija.zanr: ~8 rows (approximately)
/*!40000 ALTER TABLE `zanr` DISABLE KEYS */;
REPLACE INTO `zanr` (`ID`, `naziv`) VALUES
	(4, 'Akcija'),
	(6, 'Biografija'),
	(7, 'Drama'),
	(3, 'Horor'),
	(8, 'Ilustrirani'),
	(1, 'Komedija'),
	(5, 'Kriminalisticki'),
	(2, 'Sci-Fi');
/*!40000 ALTER TABLE `zanr` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
