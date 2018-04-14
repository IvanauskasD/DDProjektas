-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2018 at 05:08 PM
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
-- Database: `logins`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `country`, `city`, `age`) VALUES
(1, 'Dalius', 'Jacinkevicius', 'dalius@gmail.com', 'Lietuva', 'Kaunas', 20),
(2, 'Domantas', 'Ivanauskas', 'd.ivanauskas@gmail.com', 'Lietuva', 'Kaunas', 20),
(3, 'Ignas', 'Jasonas', 'i.jasonas@gmail.com', 'Lietuva', 'Kaunas', 20),
(4, 'Osvaldas', 'Zitlinskas', 'osvaldas@gmail.com', 'Lietuva', 'Kaunas', 20),
(5, 'Martyna', 'Maldyte', 'martynam@gmail.com', 'Lietuva', 'Panevezys', 17),
(6, 'Marius', 'Katinas', 'katinas@gmail.com', 'Olandija', 'Amsterdamas', 25),
(7, 'Ieva', 'Savickaite', 'ievasav@gmail.com', 'Lietuva', 'Vilnius', 18),
(8, 'Karolina', 'Lukaunaite', 'karolina.l@gmail.com', 'Italija', 'Roma', 23),
(9, 'Monika', 'Linkaite', 'linkaite@gmail.com', 'Prancuzija', 'Nica', 22),
(10, 'Jonas', 'Savickas', 'savickas@gmail.com', 'Lietuva', 'Vilnius', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

DROP TABLE IF EXISTS `users_login`;
CREATE TABLE IF NOT EXISTS `users_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `username`, `email`, `password`) VALUES
(1, 'dalius123', 'dalius@gmail.com', '$2y$10$FzPAbW0OWt92FD0vAJ.qDuj5fzBog29W/fo3In81WjAtMtEFaaogG'),
(2, 'domantasi', 'd.ivanauskas@gmail.com', 'domantas123'),
(3, 'ignasj', 'i.jasonas@gmail.com', 'ignas123'),
(4, 'osvaldas123', 'osvaldas@gmail.com', '$2y$10$Jf.G7DEOvNUGlQWdd1LrouIpgrZLg5gG1PaX8Et7OyiUs5o60BqWi'),
(5, 'martynute', 'martynam@gmail.com', 'martyna123'),
(6, 'katinas123', 'katinas@gmail.com', 'katinasmarius'),
(7, 'ievasav', 'ievasav@gmail.com', '123456789'),
(8, 'karolinaluk', 'karolina.l@gmail.com', '$2y$10$wAZnWGrzUcRI6a/rb22idOdFgCLMClyusCnDTliXPtBACTHdp2iou'),
(9, 'monikute', 'linkaite@gmail.com', '$2y$10$ybZ9rORAzE5mFH6SuC/nSOEcj9Fqwj5q8crntq3fWarCUHNL4e1Hq'),
(10, 'jonuks123', 'savickas@gmail.com', '$2y$10$mpjAobhy6IiGAf.mzdkIKO8n1iSv7rFwiY6pVhEVp2bgcSfAapF5W');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
