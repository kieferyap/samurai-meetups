-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2016 at 11:47 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samurai_meetups`
--

-- --------------------------------------------------------

--
-- Table structure for table `front_page_elements`
--

CREATE TABLE IF NOT EXISTS `front_page_elements` (
  `image_url` varchar(64) DEFAULT NULL,
  `clickable_url` varchar(64) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `front_page_image_type_id` int(11) DEFAULT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_page_elements`
--

INSERT INTO `front_page_elements` (`image_url`, `clickable_url`, `description`, `language_id`, `front_page_image_type_id`, `inserted_on`) VALUES
('top-001.jpg', NULL, NULL, 2, 1, '2016-08-06 15:24:40'),
('top-002.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:04'),
('top-003.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:18'),
('top-004.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:30'),
('top-005.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `front_page_image_types`
--

CREATE TABLE IF NOT EXISTS `front_page_image_types` (
  `front_page_image_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`front_page_image_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `front_page_image_types`
--

INSERT INTO `front_page_image_types` (`front_page_image_type_id`, `description`) VALUES
(1, 'Carousel'),
(2, 'Upcoming Tour'),
(3, 'About'),
(4, 'Report'),
(5, 'Samurai'),
(6, 'Participation Image'),
(7, 'Participation Person'),
(8, 'Participation Text'),
(9, 'Facebook Image'),
(10, 'Icon Image');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`language_id`, `description`) VALUES
(1, 'Japanese'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `sidebar_image_url` text,
  `worker_image_url` text,
  `set_image_url` text,
  `experience_image_url` text,
  `description` text,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` text,
  `description` mediumtext,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
