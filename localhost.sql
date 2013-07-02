-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2013 at 11:14 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendence`
--
CREATE DATABASE `attendence` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `attendence`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phnum` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `firstname`, `lastname`, `email`, `phnum`, `address`, `country`) VALUES
(1, 'Rojan', 'Thapa', 'psyco_rozan@yahoo.com', 2147483647, 'Kamalpokhari', 'nepal'),
(2, 'dadad', 'Thapa', 'atulkarki_2009@yahoo.com', 2147483647, 'Kamalpokhari', 'nepal'),
(18, 'cerce', 'Thapa', 'crackrozan@gmail.com', 2147483647, 'Kamalpokhari', 'nepal');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `worked` varchar(50) NOT NULL,
  `checked` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `date`, `username`, `checkin`, `checkout`, `worked`, `checked`) VALUES
(1, '2013-06-03', 'jumper', '["12:42:45","12:50:20"]', '["12:45:12","12:56:07"]', '"0:7"', 0),
(2, '2013-06-03', 'rojan', '["12:42:01","17:46:37"]', '["12:44:29","17:47:37"]', '"0:3"', 0),
(3, '2013-06-03', 'hero', '["18:05:54"]', '["18:07:37"]', '"0:1"', 0),
(4, '2013-06-03', 'manis', '["18:48:00"]', '["18:49:18"]', '"0:1"', 0),
(5, '2013-06-04', 'rojan', '["10:56:02"]', '["10:56:41"]', '"0:0"', 0),
(6, '2013-06-04', 'jumper', '["10:59:44"]', '["10:59:49"]', '"0:0"', 0),
(7, '2013-06-05', 'rajesh', '["12:25:01"]', '["12:26:20"]', '"0:1"', 0),
(8, '2013-06-05', 'jumper', '["12:28:32"]', '["12:29:43"]', '"0:1"', 0),
(9, '2013-06-11', 'Rockstar', '["14:24:24"]', '["14:24:30"]', '"0:0"', 0),
(10, '2013-06-11', 'HAri', '["14:24:39"]', '["14:24:40"]', '"0:0"', 0),
(11, '2013-06-11', 'Manohar', '["14:24:49"]', '["14:24:51"]', '"0:0"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `paid_date` date NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `id` (`pro_id`),
  KEY `id_2` (`pro_id`),
  KEY `id_3` (`pro_id`),
  KEY `id_4` (`pro_id`),
  KEY `id_5` (`pro_id`),
  KEY `id_6` (`pro_id`),
  KEY `id_7` (`pro_id`),
  KEY `id_8` (`pro_id`),
  KEY `id_9` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `amount`, `paid_date`, `pro_id`) VALUES
(172, 4463483, '2063-04-08', 1),
(187, 4463483, '2063-04-12', 6),
(189, 4463483, '2063-04-12', 6),
(190, 4463483, '2063-04-12', 6),
(191, 4463483, '2063-04-12', 6),
(192, 4463483, '2063-04-12', 6),
(193, 4463483, '2063-04-12', 6),
(194, 4463483, '2063-04-12', 6),
(195, 4463483, '2063-04-12', 6),
(196, 4463483, '2063-04-12', 6),
(197, 4463483, '2063-04-12', 6),
(198, 4463483, '2063-04-12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `priject`
--

CREATE TABLE IF NOT EXISTS `priject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `budget_amount` int(50) NOT NULL,
  `cl_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `start`, `end`, `budget_amount`, `cl_id`) VALUES
(1, 'Rmaro khalko ', '2063-02-02', '2064-02-03', 64747487, 1),
(2, 'adadwww', '2063-02-02', '2064-02-03', 64747487, 2),
(6, 'Dammi', '2063-05-05', '2063-10-08', 42424242, 1),
(38, 'aajha ko naya ', '2063-10-03', '2064-10-08', 42424242, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'rojan@admin.com', '', NULL, NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1372139675, 1, 'Rojan', 'thapa', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `client` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
