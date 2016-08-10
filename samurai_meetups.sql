-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2016 at 01:36 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(64) DEFAULT NULL,
  `clickable_url` varchar(64) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `front_page_image_type_id` int(11) DEFAULT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `front_page_elements`
--

INSERT INTO `front_page_elements` (`id`, `image_url`, `clickable_url`, `description`, `language_id`, `front_page_image_type_id`, `inserted_on`) VALUES
(1, 'top-001.jpg', NULL, NULL, 2, 1, '2016-08-06 15:24:40'),
(2, 'top-002.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:04'),
(3, 'top-003.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:18'),
(4, 'top-004.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:30'),
(5, 'top-005.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:44'),
(6, 'tour-001.png', '1', NULL, 2, 2, '2016-08-09 03:17:48'),
(7, 'tour-002.png', '2', NULL, 2, 2, '2016-08-09 03:22:18'),
(8, 'tour-003.png', '3', NULL, 2, 2, '2016-08-09 03:22:58'),
(9, 'about.jpg', NULL, NULL, 2, 3, '2016-08-09 03:26:50'),
(10, 'report.jpg', NULL, NULL, 2, 4, '2016-08-09 03:31:34'),
(11, 'samurai.jpg', NULL, NULL, 2, 5, '2016-08-09 03:32:04'),
(12, 'rectangle-1.png', NULL, NULL, 2, 6, '2016-08-09 03:36:25'),
(13, 'rectangle-2.png', NULL, NULL, 2, 6, '2016-08-09 03:37:11'),
(14, 'round-1.png', NULL, NULL, 2, 7, '2016-08-09 03:38:02'),
(15, 'round-2.png', NULL, NULL, 2, 7, '2016-08-09 03:38:21'),
(16, NULL, NULL, 'I learned a lot of things about Japanese Culture', 2, 8, '2016-08-09 03:39:41'),
(17, NULL, NULL, 'I made a lot of friends through Samurai Meetups', 2, 8, '2016-08-09 03:40:51'),
(18, 'facebook-voice-5.png', 'https://www.facebook.com/samuraimeetups', NULL, 2, 9, '2016-08-09 03:41:59'),
(19, 'icon-voice.png', NULL, NULL, 2, 10, '2016-08-09 03:44:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`language_id`, `description`) VALUES
(1, 'Japanese'),
(2, 'English'),
(3, 'All');

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
