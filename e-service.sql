-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2015 at 01:40 PM
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) NOT NULL,
  `comment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `log_id`, `comment`, `comment_date`) VALUES
(1, 8, 'Test Comment', '2014-12-26 04:38:55'),
(2, 8, 'ok', '2014-12-26 04:39:40'),
(3, 8, 'check ok', '2014-12-26 04:40:17'),
(4, 8, 'OK', '2014-12-26 04:47:15'),
(5, 9, 'ok', '2014-12-26 04:49:48'),
(6, 10, 'ok', '2014-12-26 04:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'ผู้บริหาร'),
(2, 'สำนักงานอธิการบดี'),
(3, 'ฝ่ายวิจัยและบริการวิชาการ'),
(4, 'ศูนย์สารสนเทศและการสื่อสาร'),
(5, 'ศูนย์สหกิจศึกษาและจัดหางาน'),
(6, 'งานทะเบียนและประมวลผล'),
(7, 'งานการเรียนการสอน'),
(8, 'งานประกันคุณภาพการศึกษา'),
(9, 'ฝ่ายกิจการนักศึกษา'),
(10, 'งานประชาสัมพันธ์'),
(11, 'ศูนย์รับสมัครนักศึกษา'),
(12, 'ศูนย์วิทยบริการ'),
(13, 'ฝ่ายบริหาร'),
(14, 'คณะวิศวกรรมศาสตร์'),
(15, 'คณะเทคโนโลยีสารสนเทศ'),
(16, 'คณะบริหารธุรกิจ'),
(17, 'สำนักวิชาพื้นฐานและภาษา');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `emp_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
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
(8, 0, 3, '890', 1, 2, 'jopjop', 'opjpojpoj', 'chin@fds', '0977', '2', 'ophph', 'it_support', 'khkh', '0000-00-00 00:00:00'),
(9, 0, 3, '97097', 1, 2, 'ihih', 'ophpoh', 'ophpohoph@hopihpo', '09709', '1', 'hophoph', 'it_support', 'hop', '0000-00-00 00:00:00'),
(10, 0, 1, '0', 1, 1, 'phpoj', 'opjopjpo', 'jpojojp@opjpoj', '-08-08', '1', 'popjpo', 'website_develope', 'nknpo', '0000-00-00 00:00:00'),
(11, 0, 1, '97907', 1, 3, 'khoihoih', 'pihpiohoph', 'chin@fds', '790709', '1', 'jo[jopj', 'it_support', ';jp', '0000-00-00 00:00:00'),
(12, 0, 1, '98709', 1, 1, 'poop', 'opjpojopj', 'chinghaha1@hotmail.com', '97907', '1', 'j[ojo[jo', 'it_support', ';ljpkj', '0000-00-00 00:00:00'),
(13, 0, 1, '0', 1, 2, 'bjbjib', 'sdfsdfdf', 'chin@fds', '86896986', '2', 'ugiugug', 'system_and_network', 'iugiug', '0000-00-00 00:00:00'),
(14, 0, 1, '555', 1, 1, 'Varit', 'Asawavetvutt', 'chinghaha1@hotmail.com', '028070650', '1', 'ttt', 'it_support', 'TNI', '0000-00-00 00:00:00'),
(15, 0, 1, '54122030', 1, 1, 'Varit', 'Asawavetvutt', 'chinghaha1@hotmail.com', '028070650', '1', 'ttt', 'it_support', 'TNI', '0000-00-00 00:00:00'),
(16, 0, 1, '44', 2, 1, 'kotato', '77', 'ching@ching.com', '777', '1', 'aa', 'it_support', 'aa', '0000-00-00 00:00:00'),
(17, 0, 1, '44', 1, 1, 'kotato', '77', 'ching@ching.com', '777', '1', 'aa', 'it_support', 'aa', '0000-00-00 00:00:00'),
(18, 0, 1, '77', 1, 2, 'MM', 'MM', 'ching@MM', '777', '1', 'aaa', '0', 'aa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(1, 'IT Support'),
(2, 'System and Network'),
(3, 'Website Develope'),
(4, 'Design');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'รอรับดำเนินการ'),
(2, 'กำลังดำเนินการ'),
(3, 'ดำเนินการเสร็จแล้ว'),
(4, 'ไม่สามารถแก้ไขเคสนี้ได้'),
(5, 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE IF NOT EXISTS `user_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`category_id`, `category_name`) VALUES
(1, 'Officer'),
(2, 'Student'),
(3, 'Teacher');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
