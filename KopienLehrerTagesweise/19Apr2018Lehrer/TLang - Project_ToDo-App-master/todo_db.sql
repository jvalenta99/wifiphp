-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2018 at 08:22 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_tom`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_db`
--

DROP TABLE IF EXISTS `todo_db`;
CREATE TABLE IF NOT EXISTS `todo_db` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aufgabe` varchar(100) NOT NULL,
  `kategorie` varchar(50) NOT NULL,
  `prio` tinyint(4) NOT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_done` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_db`
--

INSERT INTO `todo_db` (`id`, `aufgabe`, `kategorie`, `prio`, `date_insert`, `date_done`) VALUES
(11, 'essen', 'täglich', 3, NULL, '2018-04-10 21:59:34'),
(12, 'essen', 'täglich', 3, NULL, '2018-04-10 22:11:05'),
(14, 'essen', 'täglich', 3, NULL, NULL),
(19, 'trinken', 'täglich', 3, '2018-04-10 22:11:55', '2018-04-10 22:20:21'),
(20, 'trinken', 'täglich', 3, '2018-04-10 22:11:55', '2018-04-10 22:20:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
