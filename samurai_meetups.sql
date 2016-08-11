-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2016 at 06:20 PM
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
  `image_url` varchar(64) DEFAULT NULL,
  `description` mediumtext,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `image_url`, `description`, `inserted_on`) VALUES
(1, 'tour-001.png', '???????????????????????????\n\n? ?The 27th Samurai Meetups Tour ?TATE ???\n\n???????????????????????????\nCome and experiense TATE(??, stage combat) with Masatsugu Takase(????) who is a movie director & master of Takase Dojyo(???? ??? ????) to become a SAMURAI!\n?\nHave you ever felt:\n?Pictures of that beautifully presented cuisine, that perfectly sculptured garden, that sacred shrine emitting a divine radiance, taken during your visit in Japan could be even further enriched with knowledge of their story that lay in the background?\n?Baffled about why things are done or presented a certain way at a certain time but do not possess the articulacy in the local language to express it?\n?You’ve always wanted to experience first-hand the true Japanese culture as felt by the locals but have never gotten the chance to? \n??\nJoin us! At Samurai Meetups and see desire satisfied and thirst for knowledge quenched!\n?\n? EVENT SUMMARY ?\n?We can experience samurai sword fight workshop at Takase Dojyo Lessons! The master instructor teach us how to do it kindly. \n?Let''s go to the local IZAKAYA for dinner if you haven''t got any plans after !\n?\n? MEETING TIME & PLACE ?\n?Tokyo Metro Nishi-Sinjuku(???) station in front of the ticket gate at 14:00?\n?Access: Tokyo Metro Marunouchi line(????)\n?If you''re going to be late or oversleep or whenever you want/need to contact us, message Keisuke Shibuya on Facebook.\n?DO NOT CANCEL ON THE DAY. We have to pay cancellation charge.\n?\n? PLACE FOR VISIT ?\n?Geino Kaden-sha (?????)\nhttp://www.geidankyo.or.jp/12kaden/ \n?5000 yen for lesson (including rental swords & equipments, facility rental fee), on-site payment\n?\n?What''s "statge combat (??)"?\nhttp://samurai-action.com/ \n?\n?Tokyo racetrack\nhttp://japanracing.jp/en/go-racing/jra-racecourses/j01.html \n?\n? TIME SCHEDULE ?\n14:00 Meet @Nishi-Shinjuku station(????)\n?????????\n14:30 Change your clothes\n?we can rent a sword & relative equipments \n?please bring confortable clothes and a towel.\n(You can change your clothes at the locker room)\n?????????\n15:20 Start TATE class\n?????????\n17:30 Change your clothes again and Dinner(optional)\n\n?????????GROUP INFORMATION????????\n?\n? SAMURAI MEETUPS ?\n“SAMURAI MEETUPS” was launched with the strong desire to serve people who have always loved the Japanese culture but has never had the chance to experience it. We offer tours that will allow you to journey across the vast ocean that is Japanese culture as it is experienced by the locals through activities like Calligraphy, Tea Ceremonies, Japanese Cuisine, and others, taught by professionals from each field. \n?\nInstead of just imagining what it would be like, come, and experience first-hand the true Japanese spirit as no foreigner has ever experienced before!\n?\n? FIRST TIME? ?\nFor more information, visit our Facebook page! We''ve uploaded some photos and articles.\nhttps://www.facebook.com/samuraimeetups\n?\n? NOTICE ?\n? We have booked so please DON''T BE LATE for the meeting.\n? If you will be late, you have to pay cancellation charge.\n? Please do keep your respect for SAMURAIs.\n? Follow the staff''s instructions without fail.\n? Do not invite any type of business, other events, or religion without permission of staffs.\n? We can not guarantee any damage, loss, or trouble in those events.\n? We reserve the right to refuse any participants in our related events who do not keep to the rules, morals and manners.\n? We will not disclose Personal Information to third parties without the consent of our customers.\n? Only 20 guests will be able to participate. Registration is on first come first served basis. We beg your kindness!\n?\n? Creative Commons ?\nThis wall picture photed by ratamahatta\nhttp://free.gatag.net/2010/05/17/150000.html \n?\n? PARTICIPATION FORM ?\nhttps://docs.google.com/forms/d/1DB7C0oWaZ6c07ZBc2AiytkNb-6KR9JM3Jgt-V9WNb74/viewform\n', '2016-08-11 07:22:06'),
(2, 'tour-002.png', '???????????????????????????\r\n?\r\n???The 6th Discovery Tour ?Mt. Oyama ????\r\n?\r\n???????????????????????????\r\nMount Oyama was registered as one of the Japan Heritage(????) on April 25, 2016. The beautiful views of the mountain are legendary. There has long been regarded as a holy mountain and object of worship. "Oyama mairi(????)" is especially famous for traditional worship in Edo era. Why don''t you come and join us to visit extremely popular pilgrimage site in Japan! \r\n??\r\nHave you ever felt:\r\n?Pictures of that beautifully presented cuisine, that perfectly sculptured garden, that sacred shrine emitting a divine radiance, taken during your visit in Japan could be even further enriched with knowledge of their story that lay in the background?\r\n?Baffled about why things are done or presented a certain way at a certain time but do not possess the articulacy in the local language to express it?\r\n?You’ve always wanted to experience first-hand the true Japanese culture as felt by the locals but have never gotten the chance to? \r\n?\r\nJoin us! At Samurai Meetups and see desire satisfied and thirst for knowledge quenched! ?\r\n?\r\n? EVENT SUMMARY ?\r\n?We will crimb Mt. Oyama(4,108 ft) to experience "Oyama mairi", the traditional worship in Edo era.\r\n?You can enjoy a great views, temples, shrines, waterfalls, foods, and several hiking courses.\r\n?We will guide you in English to the best places to enjoy the fascinating history and charm of this long-sacred mountain.\r\n?\r\n? MEETING TIME & PLACE ?\r\n?Isehara station (????), North Exit at 9:00?\r\n?Access: Odakyu Odawara Line(???????): From Shinjuku(??), approximately 60 mins by express train on the Odakyu Odawara Line.\r\n?If you''re going to be late or oversleep or whenever you want/need to contact us, message Kana Yamazoe on Facebook.\r\n?\r\n? PRICE?\r\n?2000 yen per person(including cable car ticket in Oyama, and donations to the shrine and temple). \r\n?On-site payment\r\n?In case of rain, the tour will be canceled.\r\n?\r\n? PLACE FOR VISIT&TIPS?\r\n?What to bring mountain hiking.\r\n- Clothes : Avoid cotton clothes, especially jeans. Sports clothing is the best.\r\n- Socks : Well-padded hiking socks will protect your feet from blisters and rubbing.\r\n- Shoes : Wear strong-soled boots with good ankle support.\r\n- Food & Water : Be sure to have foods high in calories to keep you powered and for summer foods high in salt and sugar. Also, be sure to drink plenty of water. A lack of water will help you on the road to heat stroke and other bad things.\r\n?\r\n?Where is Mt.Oyama?\r\nhttp://en.japantravel.com/kanagawa/mt-oyama-great-day-hike/1997 \r\n?\r\n?Where is Afuri Shrine?\r\nhttp://en.japantravel.com/kanagawa/afuri-shrine-on-mt-oyama/4043 \r\n?\r\n? TIME SCHEDULE ?\r\n?9:00 Meetup@Isehara station, North Exit \r\n????????\r\n?9:15 Get on the bus @Isehara station\r\n????????\r\n?9:30~14:30 Enjoy Hiking & Climbing up the mountain \r\n????????\r\n?14:30-15:00 Have a luch break @Top of Mt. Oyama\r\n????????\r\n?15:00-17:00 Go down a Mt. Oyama\r\n????????\r\n?17:00-18:00 Get on the cablr car&bus to Isehara station\r\n????????\r\n?18:00 The tour end @Isehara station \r\n????????\r\n?18:00~ Have dinner at Izakaya(Optional) @Isehara \r\nhttps://gurunavi.com/en/a127646/rst/  \r\n?\r\n?????????GROUP INFORMATION????????\r\n?\r\n? WHAT IS SAMURAI MEETUPS ? ? \r\n“SAMURAI MEETUPS” was launched with the strong desire to serve people who have always loved the Japanese culture but has never had the chance to experience it. We offer tours that will allow you to journey across the vast ocean that is Japanese culture as it is experienced by the locals through activities like Calligraphy, Tea Ceremonies, Japanese Cuisine, and others, taught by professionals from each field. \r\n\r\nInstead of just imagining what it would be like, come, and experience first-hand the true Japanese spirit as no foreigner has ever experienced before!\r\n?\r\n? FIRST TIME? ?\r\nFor more information, visit our Facebook page! We''ve uploaded some photos and articles.\r\nhttps://www.facebook.com/samuraimeetups\r\n?\r\n? HOW TO JOIN ?\r\nWe would like to know how many people will be able to join us. So please read the below-mentioned important notice. And if you agree to it, please fill&submit the following form in order to let us know that you will be participating on our tour!\r\n?\r\n? NOTICE ?\r\n? We have booked so please DON''T BE LATE for the meeting.\r\n? Follow the staff''s instructions without fail.\r\n? Do not invite any type of business, other events, or religion without permission of staffs.\r\n? We can not guarantee any damage, loss, or trouble in those events.\r\n? We reserve the right to refuse any participants in our related events who do not keep to the rules, morals and manners.\r\n? We will not disclose Personal Information to third parties without the consent of our customers.\r\n? Only 35 guests will be able to participate. Registration is on first come first served basis. We beg your kindness!\r\n?\r\n? PARTICIPATION FORM ? \r\nhttps://docs.google.com/forms/d/1ua61HI7B8h7LEZeYTY8K3b7Wwg0SDwgxLGTWrok78GE/viewform', '2016-08-11 07:27:49'),
(3, 'tour-003.png', '???????????????????????????\r\n?\r\n???The 5th Discovery Tour ?Kawagoe ????\r\n?\r\n???????????????????????????\r\nKawagoe used to prosper as a castle town in the Edo period and it''s also called as "Small Edo" because of remaining historic buildings. Just walking the main street may let you have a taste of slipping through time. Why don''t you come and join us to visit one of elegant towns in Japan?\r\n?\r\nHave you ever felt:\r\n?Pictures of that beautifully presented cuisine, that perfectly sculptured garden, that sacred shrine emitting a divine radiance, taken during your visit in Japan could be even further enriched with knowledge of their story that lay in the background?\r\n?Baffled about why things are done or presented a certain way at a certain time but do not possess the articulacy in the local language to express it?\r\n?You’ve always wanted to experience first-hand the true Japanese culture as felt by the locals but have never gotten the chance to? \r\n?\r\nJoin us! At Samurai Meetups and see desire satisfied and thirst for knowledge quenched! ?\r\n?\r\n? EVENT SUMMARY ?\r\n?We will join a tour to see how organic say sauce is produced through the traditional method in a storehouse for say sauce.\r\n?We will explore the main street in Kawagoe where you can enjoy temples, shrines and unique foods.\r\n?We will go to a limited time event held at "Hikawa shrine" which is considered as a matchmaker deity that brings about marriage with someone in general. You can enjoy beautiful scenery of lots of wind chimes.\r\n?We will join a summer festival called "?????????".You can enjoy dancing performances on the street.\r\n?\r\n? MEETING TIME & PLACE ?\r\n?Kawagoe station??????East gate at PM1?\r\n?Access?JR Saikyo Line?JR???? or Tobu Tojo Line??????? from Ikebukuro???), approximately 50 mins. \r\nIf you are going to be late or oversleep or whenever you want/need to contact us, please message on Emiri Takeda Facebook.\r\n?\r\n?PRICE?\r\n?1,000 yen per person \r\n?On-site payment\r\n\r\n? TIPS?\r\n?more info about Kawagoe\r\nhttp://www.koedo.or.jp/foreign/english/ \r\n\r\n?\r\n? TIME SCHEDULE ?\r\n?13:00 Meetup@Kawagoe station, East Exit\r\n?14:30?15:00 The tour of soy sauce storehouse@Kamon-rakuza ???????\r\n?15:00?16:00 Stroll the main street in Kawagoe\r\n?16:00?17:00 Enjoy wind chimes @ ????\r\n?17:00?18:00 Join the summer festival\r\n?18:00?The tour end @Kawagoe Station \r\n?18:00?Have dinner at Izakaya (Optional) @Kawagoe \r\n\r\n?????????GROUP INFORMATION????????\r\n?\r\n? WHAT IS SAMURAI MEETUPS ? ? \r\n“SAMURAI MEETUPS” was launched with the strong desire to serve people who have always loved the Japanese culture but has never had the chance to experience it. We offer tours that will allow you to journey across the vast ocean that is Japanese culture as it is experienced by the locals through activities like Calligraphy, Tea Ceremonies, Japanese Cuisine, and others, taught by professionals from each field. \r\n\r\nInstead of just imagining what it would be like, come, and experience first-hand the true Japanese spirit as no foreigner has ever experienced before!\r\n?\r\n? FIRST TIME? ?\r\nFor more information, visit our Facebook page! We''ve uploaded some photos and articles.\r\nhttps://www.facebook.com/samuraimeetups\r\n?\r\n? NOTICE ?\r\n? We have booked so please DON''T BE LATE for the meeting.\r\n? Follow the staff''s instructions without fail.\r\n? Do not invite any type of business, other events, or religion without permission of staffs.\r\n? We can not guarantee any damage, loss, or trouble in those events.\r\n? We reserve the right to refuse any participants in our related events who do not keep to the rules, morals and manners.\r\n? We will not disclose Personal Information to third parties without the consent of our customers.\r\n? Only 40 guests will be able to participate. Registration is on first come first served basis. We beg your kindness!\r\n?\r\n? PARTICIPATION FORM ? \r\nhttps://docs.google.com/forms/d/1x_EBgpzWSVezA_wZzrOJAkgLLC-1uWlHVYc29-Xu8OE/viewform', '2016-08-11 07:30:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
