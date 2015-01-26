-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2015 at 11:28 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-service`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `department_id` int(100) NOT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `admin_id`, `status_id`, `emp_id`, `service_id`, `department_id`, `first_name`, `last_name`, `mail`, `tel`, `user_category`, `title`, `service`, `location`, `record_date`) VALUES
(8, 0, 3, 890, 1, 2, 'jopjop', 'opjpojpoj', 'chin@fds', '0977', '2', 'ophph', 'it_support', 'khkh', '0000-00-00 00:00:00'),
(9, 0, 3, 97097, 1, 2, 'ihih', 'ophpoh', 'ophpohoph@hopihpo', '09709', '1', 'hophoph', 'it_support', 'hop', '0000-00-00 00:00:00'),
(10, 0, 1, 0, 1, 1, 'phpoj', 'opjopjpo', 'jpojojp@opjpoj', '-08-08', '1', 'popjpo', 'website_develope', 'nknpo', '0000-00-00 00:00:00'),
(11, 0, 1, 97907, 1, 3, 'khoihoih', 'pihpiohoph', 'chin@fds', '790709', '1', 'jo[jopj', 'it_support', ';jp', '0000-00-00 00:00:00'),
(12, 0, 1, 98709, 1, 1, 'poop', 'opjpojopj', 'chinghaha1@hotmail.com', '97907', '1', 'j[ojo[jo', 'it_support', ';ljpkj', '0000-00-00 00:00:00'),
(13, 0, 1, 0, 1, 2, 'bjbjib', 'sdfsdfdf', 'chin@fds', '86896986', '2', 'ugiugug', 'system_and_network', 'iugiug', '0000-00-00 00:00:00'),
(14, 0, 1, 54122030, 1, 1, 'Varit', 'Asawavetvutt', 'chinghaha1@hotmail.com', '028070650', '1', 'ttt', 'it_support', 'TNI', '0000-00-00 00:00:00'),
(15, 0, 1, 54122030, 1, 1, 'Varit', 'Asawavetvutt', 'chinghaha1@hotmail.com', '028070650', '1', 'ttt', 'it_support', 'TNI', '0000-00-00 00:00:00'),
(16, 0, 1, 44, 2, 1, 'kotato', '77', 'ching@ching.com', '777', '1', 'aa', 'it_support', 'aa', '0000-00-00 00:00:00'),
(17, 0, 1, 44, 1, 1, 'kotato', '77', 'ching@ching.com', '777', '1', 'aa', 'it_support', 'aa', '0000-00-00 00:00:00'),
(18, 0, 1, 77, 1, 2, 'MM', 'MM', 'ching@MM', '777', '1', 'aaa', '0', 'aa', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
