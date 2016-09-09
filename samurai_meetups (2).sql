-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 9 月 09 日 13:51
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samurai_meetups`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `front_page_elements`
--

CREATE TABLE `front_page_elements` (
  `id` int(11) NOT NULL,
  `image_url` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `clickable_url` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `front_page_image_type_id` int(11) DEFAULT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `front_page_elements`
--

INSERT INTO `front_page_elements` (`id`, `image_url`, `clickable_url`, `description`, `language_id`, `front_page_image_type_id`, `inserted_on`) VALUES
(1, 'slideshow_04.jpg', NULL, NULL, 2, 1, '2016-08-06 15:24:40'),
(2, 'slideshow_03.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:04'),
(3, 'slideshow_02.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:18'),
(4, 'slideshow_01.jpg', NULL, NULL, 2, 1, '2016-08-06 15:25:30'),
(6, 'tour-001.png', '1', NULL, 2, 2, '2016-08-09 03:17:48'),
(7, 'tour-002.png', '2', NULL, 2, 2, '2016-08-09 03:22:18'),
(8, 'tour-003.png', '3', NULL, 2, 2, '2016-08-09 03:22:58'),
(9, 'about.jpg', NULL, NULL, 2, 3, '2016-08-09 03:26:50'),
(10, 'top_report.jpg', NULL, NULL, 2, 4, '2016-08-09 03:31:34'),
(11, 'samurai.jpg', NULL, NULL, 2, 5, '2016-08-09 03:32:04'),
(12, '', NULL, NULL, 2, 6, '2016-08-09 03:36:25'),
(13, '', NULL, NULL, 2, 6, '2016-08-09 03:37:11'),
(14, 'voice_ben.png', NULL, NULL, 2, 7, '2016-08-09 03:38:02'),
(15, 'voice_cat.png', NULL, NULL, 2, 7, '2016-08-09 03:38:21'),
(16, NULL, NULL, '', 2, 8, '2016-08-09 03:39:41'),
(17, NULL, NULL, 'Making Edo Kiriko was so much fun!<br/>I me a lot of new people and experienced a lot of things.', 2, 8, '2016-08-09 03:40:51'),
(18, 'facebook-voice-5.png', 'https://www.facebook.com/samuraimeetups', NULL, 2, 9, '2016-08-09 03:41:59'),
(19, 'clip_art.png', NULL, NULL, 2, 10, '2016-08-09 03:44:47'),
(20, 'tour_zazen.jpg', '4', NULL, NULL, 2, '2016-09-02 12:59:17'),
(21, 'tour_kamakura.jpg', '5', NULL, NULL, 11, '2016-09-02 13:05:06'),
(22, 'tour_sake.jpg', '6', NULL, NULL, 12, '2016-09-02 13:14:55');

-- --------------------------------------------------------

--
-- テーブルの構造 `front_page_image_types`
--

CREATE TABLE `front_page_image_types` (
  `front_page_image_type_id` int(11) NOT NULL,
  `description` varchar(64) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `front_page_image_types`
--

INSERT INTO `front_page_image_types` (`front_page_image_type_id`, `description`) VALUES
(1, 'Carousel'),
(2, 'Upcoming Tou 1st'),
(3, 'About'),
(4, 'Report'),
(5, 'Samurai'),
(6, 'Participation Image'),
(7, 'Participation Person'),
(8, 'Participation Text'),
(9, 'Facebook Image'),
(10, 'Icon Image'),
(11, 'tour 2nd'),
(12, 'tour 3rd');

-- --------------------------------------------------------

--
-- テーブルの構造 `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL,
  `description` varchar(16) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `languages`
--

INSERT INTO `languages` (`language_id`, `description`) VALUES
(1, 'Japanese'),
(2, 'English'),
(3, 'All');

-- --------------------------------------------------------

--
-- テーブルの構造 `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `sidebar_image_url` text CHARACTER SET latin1,
  `worker_image_url` text CHARACTER SET latin1,
  `set_image_url` text CHARACTER SET latin1,
  `experience_image_url` text CHARACTER SET latin1,
  `short_description` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `language_id` int(11) DEFAULT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `reports`
--

INSERT INTO `reports` (`report_id`, `order_id`, `type_id`, `sidebar_image_url`, `worker_image_url`, `set_image_url`, `experience_image_url`, `short_description`, `description`, `language_id`, `inserted_on`) VALUES
(1, 3, 2, 'report-001-sidebar.jpg', 'report-001-worker.jpg', 'report-001-set.jpg', 'report-001-experience.jpg', '6th Discovery Tour<br/>―Mt.Oyama 大山―', '<b>【TOUR REPORT：The 6th Discovery Tour ―Mt.Oyama 大山―】</b><br/>\r\n　<br/>\r\nMount Ōyama was registered as one of the Japan Heritage(日本遺産) on April 25, 2016. The beautiful views of the mountain are legendary. There has long been regarded as a holy mountain and object of worship. "Oyama mairi(大山詣り)" is especially famous for traditional worship in Edo era. Today, we visited extremely popular pilgrimage site in Japan and climbed Mt. Oyama on "Mountain Day"!<br/>\r\n　<br/>\r\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\r\n"It was hardship for me but I am very glad that I achieved it, thanks to all of you. Beside of that, I loved the way the participants cared about each other, it was a wonderfull tour. Domo arigato gozaimashita!"<br/>\r\n　<br/>\r\n"At the very beginning I was a bit afraid because I didn''t know anyone but the samurai meet up team helped me to integrate in the group and It was interesting to speak with people from different backgrounds. The system by group was very cool because it permits me to bound faster with these person and to enjoy fully the hiking experience."<br/>\r\n　<br/>\r\n"It was very well organized hiking tour. All the volunteer guides were well-informed. I would like to thank you for all the great coordination and of course the nice restaurant treat at the end! Big Hi 5 to Samurai Meetups!!!"<br/>\r\n　<br/>\r\n<b>〓PLACE INFORMATION〓</b><br/>\r\n●Mt.Oyama(大山)<br/>\r\nhttp://www.travelinboots.com/…/first-timers-hiking-guide-t…/ <br/>\r\n　<br/>\r\n●Isehara-shi(伊勢原市)<br/>\r\nhttp://honyaku.j-server.com/…/www.city.isehara.kanagawa.jp/… <br/>\r\n<br/>', NULL, '2016-08-15 11:24:54'),
(2, 2, 2, 'report-002-sidebar.jpg', 'report-002-worker.jpg', 'report-002-set.jpg', 'report-002-experience.jpg', '5th Discovery Tour<br/>―Kawagoe 川越―', '<b>【TOUR REPORT：The 5th Discovery Tour ―Kawagoe 川越―】</b><br/>\r\n　　<br/>\r\nKawagoe, Saitama is a city in Saitama prefecture which prospered as a supplier of commodities to Tokyo (Edo) in the 17th century during the Edo period. There are old warehouses along the main street. We joined the soy sauce house tour and walked around the main street to enjoy tasty snacks and drink while walking. <br/>\r\n　<br/>\r\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\r\n"It was an amazing day! I think it was really well organized and planned. It was really great to see a particular area of Tokyo and I really like the idea of having a nice dinner all together at the end. It’s always nice to learn something new about Japanese culture.”<br/>\r\n　<br/>\r\n"It''s such a pleasure to spend a day with you guys! Warm and accommodating, I had the most wonderful time!"<br/>\r\n　<br/>\r\n<b>〓PLACE INFORMATION〓</b><br/>\r\n●Kawagoe<br/>\r\nhttp://www.japan-guide.com/e/e6500.html <br/>\r\n　<br/>\r\n●HIkawa Shrine<br/>\r\nhttp://www.japan-guide.com/e/e6529.html <br/>', NULL, '2016-08-15 11:26:03'),
(3, 1, 1, 'report-003-sidebar.jpg', 'report-003-worker.jpg', 'report-003-set.jpg', 'report-003-experience.jpg', '26th Samurai Meetups Tour<br/>―OCHA 茶―', '<b>【TOUR REPORT：The 26th Samurai Meetups Tour―OCHA 茶―】</b><br/>\n　 　<br/>\nTea came to Japan in the year 805 from China. In the beginning, tea was served like Mat-Cha. Japanese Tea Ceremony represented by Sen no Rikyū, was established at around 1600. The production process of “Sen-Cha”, the most popular type of tea in currently, was created around 1800s. After the Meiji era, tea gradually became popular.<br/>\n　<br/>\nToday, we participated in the Japanese Tea tasting class organized by Kazuhiro Koyama, the "Charistor" of UNI STAND!<br/>\n　<br/>\n<b>〓SAMURAI INTERVIEW : Kazuhiro Koyama, the Charistor(Japanese Tea sommelier) of UNI STAND 〓</b><br/>\n　<br/>\n●Let us know the type of tea.<br/>\n—Category of tea is defined by its status of fermentation by enzyme.<br/>\n- Unfermented tea: ”Mat-Cha(抹茶)”,”Sen-Cha(煎茶)”,”Kamairi-Cha(釜炒茶)”<br/>\nThe most typical type of tea in Japan. Made from tea leaves whose enzyme is deactivated as soon as picked up.<br/>\n- Half fermented: ”Oolong tea(烏龍茶)”,”Blue tea(青茶)”,”Dark tea(黒茶)”<br/>\nEnzyme is activated half way.<br/>\n- Fermented tea: “Darjeeling ”,”Assam”,”Uva”<br/>\nVery brown. Fermented completely by enzyme.<br/>\n　<br/>\n●What is Today''s "Ocha" ? 　<br/>\nーWe prepared 7 types of Ocha today.<br/>\n①Sen-Cha from Yame,Fukuoka(福岡県八女)<br/>\nProduction location is known for luxurious tea, such as Dentou Hon Gyokuro(伝統本玉露). Has less biteerness and more sweetness and Umami taste.<br/>\n②Sen-Cha from Kagoshima(鹿児島)<br/>\nThe second largest production location. Known for Deep Steamed Tea(深煎り茶),which has dark color and thick taste.<br/>\n③Goishi-Cha(碁石茶) from Kochi(高知)<br/>\nFamous for Lactobacillus fermented tea. This tea is known for its healthiness because it contains 1000 times as many lactic acid bacterias as yoghurt does.<br/>\n④Sen-Cha from Ise, Mie(三重県伊勢)<br/>\nThe third largest production location. It has Kabuse-Kou(被せ香), the good smell of seaweed. Has clear bitterness and Umami taste.<br/>\n⑤Sen-Cha from Kakegawa, Shizuoka(静岡県掛川)<br/>\nThe largest production location. Tea produced in mountain has strong smell and sharp bitterness. On the other hand, tea produced in flat land has clear bitterness and blue color of nature.<br/>\n⑥Sen-Cha from Sashima, Ibaraki(茨城県猿島)<br/>\nThe land is flat yet very cold. This climate creates a big gap of temperature, which helps to produce a good tea. Has good balance of bitterness and Umami taste.<br/>\n⑦Kyoban-Cha(京番茶) from Kyoto(京都)<br/>\nKnown for the luxury tea brand, Uzi(宇治). Since it has long history of tea culture,it has diversity. This tea is casual tea and has unique smell called, Kunseika(燻製香).<br/>\n　<br/>\n<b>〓PARTICIPANTS'' VOICE〓</b><br/>\n"The Ocha tasting event was fun which gave me the chance to taste 7 types of tea from different places in Japan at the same time, that I was never have an idea to make it. While the tasting time people talked to each other and making new friends with the fresh tea."<br/>\n　<br/>\n"The members are nice and friendly. Also the age is close so I didn''t feel any gaps between. I enjoyed the event so much and I would like to join the samurai meetups again!"<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●UNI STAND<br/>\nhttps://www.facebook.com/unistand.jp/<br/>\n　<br/>\n●Cha-One''s Life<br/>\nhttps://www.facebook.com/chaones.life/<br/>', NULL, '2016-08-15 11:38:22'),
(4, NULL, 1, 'report-004-sidebar.jpg', 'report-004-worker.jpg', 'report-004-set.jpg', 'report-004-experience.jpg', '25th Samurai Meetups Tour<br/>―AIZOME 藍染―', '<b>【TOUR REPORT：The 25th Samurai Meetups Tour―AIZOME 藍染―】</b><br/>\n　 　 <br/>\nAizome(Indigo dye) is a form of Kusakizome which uses blue pigment in the leaf as dyestuff. Today, we participated to Aizome class coordinated by Ms.Murata and Ms.Matsui, the instructors of Aizome at workshop 布礼愛(Fureai)!<br/>\n　<br/>\n<b>〓SAMURAI INTERVIEW : Ms.Murata and Ms.Matsui, the instructors of Aizome at workshop 布礼愛(Fureai)"〓</b><br/>\n●Let us know why we call Aizome blue color as "JAPAN BLUE".<br/>\n―In 1875(Meiji era), when British chemist R.W. Atkinson visited Japan, he saw many Japanese wear blue colored clothes everywhere. And then, he regarded blue color(Indigo dyeing) as a symbol of Japan-he named this “JAPAN BLUE”.<br/>\n　<br/>\n●Let us know the making process of Aizome.<br/>\n―We have various kinds of the way to make Aizome so, today we gonna try to experience "Tie dyeing".<br/>\n①Tie your cloth with a rubber band. This will define the pattern of your work.<br/>\n②Dip it in the liquid.<br/>\n③Raise your cloth and expose it to air(oxygen). It gets “coloring”, ”fixing color” and you can enjoy the fantastic change of color.<br/>\n④Repeat this several times<br/>\n⑤You’re finished!<br/>\n　<br/>\n●Let us know how to care the work which we made.<br/>\n―Your handmade item is a unique piece in the world. If you follow the following procedures your piece will stay beautiful forever.<br/>\nT-shirt, washcloth etc…<br/>\n(1)First, wash with only water.<br/>\n(2)Then keep inside a Bucket filled with 60℃ hot water and detergent for a whole night.<br/>\n(3)On the next day, wash it and dry it in the sun.<br/>\n(4)Wash it once more in 60℃ hot water to remove residue.<br/>\n(5)Finally, dry it in the shade.<br/>\n※Please use neutral detergent.<br/>\n　<br/>\n<b>〓PARTICIPANTS'' VOICE〓</b><br/>\n"I am proud of this continuous tradition. I plan on going on a vacation overseas in this summer, I will wear Aizen and promote Japanese culture!!"<br/>\n　<br/>\n"Aizome tour: Who knew I could design a shirt with a fermented plant and rubber bands... Definitely an enjoyable experience for everyone, not just for those who are into Arts & Crafts.<br/>\nThere''s a lot of history in it, and to be a part of history with our own unique design was an incredible feeling."<br/>\n　<br/>\n"The aizome tour was probably the most interesting tour I''ve been on. Not only did we come away with a good-looking souvenir but we learnt the history of the dye and the importance of maintaining its tradition. With a bit of planning it''s easy to create some beautiful patterns."<br/>\n　<br/>\n"I am glad that I found this meetup group, each activity I participated in was an amzing experience thanks to all leaders and participants."<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●WORKSHOP Fureai(工房 布礼愛）<br/>\nhttp://www.kobofureai.com/ <br/>', NULL, '2016-08-15 11:38:38'),
(5, NULL, 1, 'report-005-sidebar.jpg', 'report-005-worker.jpg', 'report-005-set.jpg', 'report-005-experience.jpg', '24th Samurai Meetups Tour<br/>―TSUKIJI 築地―', '<b>【TOUR REPORT：The 24th Samurai Meetups Tour―TSUKIJI 築地―】</b><br/>\n　 <br/>\nTsukiji fish market is the largest wholesale market for especially fish in central Tokyo. On 11th June, Hiroki Kubota who is a Edo-style Sushi Chef showed us around the Tsukiji inner market and also into the private area. Thank you for coming and great appreciation to Kubota-san for providing us such a special opportunity!<br/>\n　<br/>\n<b>〓SAMURAI INTERVIEW : Hiroki Kubota(久保田 弘毅), the Edo-style Sushi Chef of the restaurant "TAKI"(すし処 旬香 多喜)〓</b><br/>\n　<br/>\n●How long does it take to become a master of Sushi Chef?<br/>\nーIt depends on the people whether he/she is adopted or not, but basically it takes about 5-6 years.<br/>\n　<br/>\n●How many places had you been to learn about the way to make Sushi?<br/>\nーTotally about three places; Osaka, Kyushu, Tokyo. But I like Tokyo the most. Because the high quality fish gathering in this Tsukiji market and also the most of the Suchi chefs'' dream is working in Ginza. I do as well.<br/>\n　<br/>\n●It is said that the Japanese kitchen knives are the soul of the Sushi chef. Is it right?<br/>\nーYes, it is. We handling those knives as our soul. Most of them are custom-made, and it takes around one or two months to be completed.<br/>\n　<br/>\n<b>〓PARTICIPANTS'' VOICE〓</b><br/>\n"It was one of the best experience I had in Japan with guys and the best sushi ever."<br/>\n"It was the BEST sushi in my whole life! Thank you so much!"<br/>\n"I really want to come over TAKI in every weekend."<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●Sushi Restaurant TAKI(すし処多喜)<br/>\nhttp://www.taki.me/index.html <br/>\n　<br/>\n●The Tsukiji Sushi Market(築地市場)<br/>\nhttp://www.tsukiji.or.jp/english/ <br/>', NULL, '2016-08-15 11:38:56'),
(6, NULL, 1, 'report-006-sidebar.jpg', 'report-006-worker.jpg', 'report-006-set.jpg', 'report-006-experience.jpg', '23rd Samurai Meetups Tour<br/>―EDO FURIN 江戸風鈴―', '<b>【TOUR REPORT：The 23rd Samurai Meetups Tour―EDO FURIN 江戸風鈴―】</b><br/>\n　 <br/>\nName of "Edo-furin" derives from that Mr. Yoshiharu Shinohara Jr. made a factual survey on a glass wind-bell and started the name of "Edo-Furin". Today, we participated to Making Edo-Furin class coordinated by Yoshiharu Shinohara, the leading person of the Edo-Furin! <br/>\n　 <br/>\n<b>〓SAMURAI INTERVIEW : Yoshihara Shinohara(篠原儀治), the Edo-Furin Instructor〓</b><br/>\n　<br/>\n●Please tell us about history of Edo-Furin.<br/>\nーFurin had been a luxury item in the old time, but at the later Edo period, Furin became well known among general Japanese people. During the Edo period, Furin had only been used by “Daimyo”, top officials of local governments or by wealthy merchants of this era, who called furin “Fukoto”. “Fukoto” means the Japanese harp Koto automatically making beautiful sounds by natural wind. <br/>\n　<br/>\nPeople in the Edo period had been thinking how to enjoy the hot weather in the summer, and as a result, they made Edo-Furin. Edo-Furin made many people feel very comfortable, so there is a comic Tanka, or poem, called “Kyoka”. “No voices of Furin sellers, but many customers there; that is a virtue of Furin”. As beautiful sounds came from Furin, Furin sellers needed to say nothing to advertise it, an uncommon scene of this era. <br/>\n　<br/>\nFurin was originated from China. In the old time of China, people did a fortune-telling via making sounds by hitting jewels each other, while in Japan, this fortune-telling evolved into making Furin. <br/>\n　<br/>\n●How to make Edo-Furin?<br/>\nーLet you know the making process of Edo-Furin.<br/>\n① Take up the hot glass.<br/>\n② Inflate the glass like a 5oo yen coin.<br/>\n③ Take up glass again. This glass is the body of Furin.<br/>\n④ Put in a little bit air. And make a hole by using wire for threading.<br/>\n⑤ At last, inflate the body quickly.<br/>\n⑥ Cut off the portion of the 500 yen by knife. And make the jaggy portion.<br/>\n⑦ Draw whatever you want to design inside of glass.<br/>\n⑧ After dried it, insert a string between glass holes to ring it as a bell.<br/>\n　<br/>\n●What is the most important thing you would like to tell everyone?<br/>\nー"Edo-Furin" made of glass is more colourful and comfortable in sound as compared with a bell made of iron one. Various kinds of glass wind bells resonate and are in harmony and change in sound as wind blows. It is our sincere hope that you could enjoy the delightful sounds of "Edo-Furin" and the bell would be kept carefully in your home for many and many years to come.<br/>\n　<br/>\n<b>〓PARTICIPANTS'' VOICE〓</b><br/>\n"It was wonderful time for me. EDO-FURIN is the good souvenir for my travel."<br/>\n"I made a fuurin, Japanese wind chime, today! I went to a shop where they help you make your own. Need all the luck I can get so it was Mt.Fuji and dragonflies for me."<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●EDO-FURIN Shinohara maruyoshi FURIN (篠原まるよし風鈴)<br/>\nhttp://www.sam.hi-ho.ne.jp/maruyosi/ <br/>', NULL, '2016-08-15 11:39:36'),
(7, NULL, 2, 'report-007-sidebar.jpg', 'report-007-worker.jpg', 'report-007-set.jpg', 'report-007-experience.jpg', '4th Discovery Tour<br/>―Sarushima 猿島―', '<b>【TOUR REPORT：The 4th Discovery Tour ―Sarushima 猿島―】</b><br/>\n　　<br/>\nSarushima(無人島・猿島) is deceptively named ''Monkey Island'', despite its clear lack of monkeys. Apparently it gets its name from a tale where a ship in a strong storm was lead to the shores of Sarushima by a white monkey.<br/>\n　<br/>\nWe could saw a fabulous nature scenery look like places from Studio Ghibli films in this desert island. And the amount of birdsong made the island feel like a rainforest.<br/>\n　<br/>\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\n"Yesterday was the best day i''ve had all year. Cheers again for hosting it!!! "<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●Sarushima<br/>\nhttp://en.gigazine.net/news/20100101_sarushima/ <br/>', NULL, '2016-08-15 11:39:50'),
(8, NULL, 1, 'report-008-sidebar.jpg', 'report-008-worker.jpg', 'report-008-set.jpg', 'report-008-experience.jpg', '22nd Samurai Meetups Tour<br/>―PASTERIA CALLIGRAPHY<br/>パステリア書―', '<b>【TOUR REPORT：The 22nd Samurai Meetups Tour―PASTERIA CALLIGRAPHY パステリア書―】</b><br/>\n　 <br/>\n"Pasteria Calligraphy” is a great combination of Japanese calligraphy and pastel drawing. Today, we participated Pasteria Calligraphy Making workshop and taught by Akiko Ueda(上田亜希子), the Pasteria Calligraphy Instructor at Pastel Rose! <br/>\n　 <br/>\n<b>〓SAMURAI INTERVIEW : Akiko Ueda(上田亜希子), the Pasteria Calligraphy Instructor〓</b><br/>\n　<br/>\n●What made you decide to become a Pasteria Calligraphy Instructor?<br/>\nーDrawing picture and making some crafts are my best hobby since i was a child. Usually, I like staying focus on developing my crafts. And I always feel a sence of accomplishment. I''d like to share this feeling with many people trough Making Pateria Calligraphy workshop.<br/>\n　<br/>\n●What is today''s theme?<br/>\nーCherry blossoms. After painting the background using cotton, please draw cherry blossoms over it. You can draw with your own style!<br/>\n　<br/>\n●Could you tell us your tips to help us draw better?<br/>\nーWhen you paint the background by stamping the cotton on the paper, if you make some of the paper blank, you would be able to express yourself more beautifully.<br/>\n　<br/>\n<b>〓PARTICIPANTS'' VOICE〓</b><br/>\n"The tour was great. Everyone is really friendly and helpful. It was fun doing something creative in a really relaxed environment. Everyone speaks good English which made conversation and instructions really easy."<br/>\n　<br/>\n"1. Even though the activity was for 2 hours, it was very enjoyable and it was a good learning experience!<br/>\n2. It was a difficult to follow the verbal instructions since I am not good at speaking/understanding Japanese, but the printed English procedure was helpful!<br/>\n3. All the people who attended are kind and approachable!<br/>\n4. The staff in the cafe are also nice! The whole place is comfortable!"<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●Pastel Rose<br/>\nhttp://nishiya.org/pasteria/ <br/>\n　<br/>\n●Co-machi Cafe(こまちカフェ)<br/>\nhttp://comachiplus.org/cafe <br/>', NULL, '2016-08-15 11:40:04'),
(9, NULL, 1, 'report-009-sidebar.jpg', 'report-009-worker.jpg', 'report-009-set.jpg', 'report-009-experience.jpg', '21st Samurai Meetups Tour <br/>―FUROSHIKI 風呂敷―', '<b>【TOUR REPORT：The 21st Samurai Meetups Tour ―FUROSHIKI 風呂敷―】</b><br/>\n　<br/>\nThe term “Furoshiki” originated from the Muromachi era. People who went to saunas (called “Furo” in the old days) laid out a cloth that they used to wrap their change of clothes. In the Edo era, when distribution was developed, Furoshiki was convenient because they could wrap and carry lots of different things and it was easily carried when they were done using it. In this tour, we participated in the Furoshiki class coordinated by Junko Tsutsumi, the Furoshiki coordinator!<br/>\n　<br/>\n<b>〓SAMURAI INTERVIEW : Junko Tsutsumi(つつみ純子), the Furoshiki coordinator!〓</b><br/>\n　<br/>\n●Why is the way of counting Furoshiki called “Haba(巾)”?<br/>\nーA profession called weaver was the sphere of work of many women in the old days. The width of Furoshiki became the same size as the average Japanese woman’s waist! This was because it was too difficult for weavers to move their arms either too wide or too narrow for long periods of time. Since then, we count Furoshiki by using “Haba(巾).”<br/>\n　<br/>\n●What is the meaning of the Furoshiki pattern?<br/>\nーFor example...<br/>\n1. The flax ornament pattern refers to the prosperity of descendants, because they grow straight and fast.<br/>\n2. The foliage scrolls pattern is a symbol of viability. They look like ivy growing more and more. That pattern was popular in the Edo era, because people felt uncomfortable if the pattern was off-center.<br/>\n　<br/>\n●What are some good points of using Furoshiki?<br/>\nーOf course a bag is convenient for carry something regular sized.<br/>\nBut Furoshiki has various uses, for example wrapping gifts, wine or smartphones, or as a substitute for an eco-bag. They are more convenient in this way.<br/>\n　<br/>\nAnd if you know the wrapping method and the meaning of the pattern, you also know spirit of word and hospitality in good ol’ Japan!!<br/>\n　<br/>\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\n”Alex and I enjoyed learning so much about long yet very rich history woven into furoshiki! We had fun during the workshop session too, we even wished we had a longer time practicing other ways of using furoshiki. Alex seemed very grateful how he got to listen to the lecture both in Japanese and English, even for Japanese participants, I can see how bilingual lectures would be educational and interesting. We appreciate how samurai meet-ups focus on learning something new from what we''ve always seen as "old"! We would love to join upcoming events from samurai san and expand our network!”<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●Furoshikible<br/>\nhttp://www.furoshikible.com <br/>', NULL, '2016-08-15 11:40:19'),
(10, NULL, 1, 'report-010-sidebar.jpg', 'report-010-worker.jpg', 'report-010-set.jpg', 'report-010-experience.jpg', '20th Samurai Meetups Tour <br/>―AIKIDO 合気道―', '<b>【TOUR REPORT：The 20th Samurai Meetups Tour ―AIKIDO 合気道―】</b><br/>\n　<br/>\nMany martial arts have become sports as time goes on. Later being promoted to the younger generation. In 1984, Yamashita from Japan and Mohammed from Egypt fought in the final of the L.A. Olympics. Even though Yamashita had injured his leg in the previous match, Mohammed never attacked Yamashita’s injured leg. This conduct represents the spirit of Bu-do.<br/>\nToday, we participated the Aikido(合気道: one of the Bu-do) class coordinated by Katsuhiko Tanaka(田中勝比古), the professional of Aikido!<br/>\n　<br/>\n<b>〓SAMURAI INTERVIEW : Katsuhiko Tanaka(田中勝比古), the professional of Aikido and founder of Tanaka Jyuku〓</b><br/>\n　<br/>\n●What is Aikido?<br/>\nーAikido is not a fighting sport to compete with someone for the sake of strength. It aims to give you freedom (I''m assuming “自弓” was actually supposed to be 自由 not 自弓）as a human through hard work. And It aims to increase the self control you have. Also. it aims to cultivate compassion, respect, and peace in your heart. Aikido represents the spiritual culture and tradition of Japan. Aikido shares the same values as Europe culture, which is known for its fine arts and chivalry, in a point of achieving harmony and activation in heart. Achieving harmony and activation in heart means to get harmonized with Chi(気) of universe.<br/>\n　<br/>\n●How to sit in Seiza(正座)?<br/>\nーLet you know how to have Seiza, Japanese traditional sitting style.<br/>\n1. Place your toe over the other toe and Keep distance between your knees as wide as two fists<br/>\n2. Calm your mind<br/>\n3. Stretch your back straight<br/>\n4. Get your upper half relaxed<br/>\n　<br/>\n●What''s the purpose of Aikido breathing and how can we do it?<br/>\nーThe purpose of Aikido breathing is to feel as if you are a part of the sky and ground, nature and the universe. And to create an active and healthy body and mind through interaction with sky, ground and nature.<br/>\n- How:<br/>\n1.Close your eyes, open your mouth a bit, exhale gently while saying “Haa”<br/>\n2.When you exhale, think about the sensations of your head, breast, stomach, feet and toe<br/>\n3.Inhale from your nose<br/>\n4.Focus on your toe, feet, stomach, breast and head in order<br/>\n- Tips:<br/>\n・Imagine as if bad things are leaving your body<br/>\n・Imagine as if you are in middle of nature (a forest, a pasture, etc)<br/>\n・When you do it by yourself, do it in large free area<br/>\n・You can do it not only by sitting but also standing, sleeping and even walking<br/>\n・Bu-do starts and ends with a bow<br/>\n　<br/>\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\n”I enjoyed the Samurai Meetups a lot. The other guys and the instructor were so nice. We had a lot of fun and got a really interesting introduction in the history of Aikido. It was exhausting but at the end we did some really relaxed breathing exercises. When I''m back in Germany i will definitely look for lessons to learn more Aikido. Thank you for the possibility to learn this traditional japanese martialart!”<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●Tanaka Jyuku(合氣道　田中塾)! <br/>\nhttps://www.facebook.com/aikidotanakajuku<br/>\n　<br/>\n●Rikugi-en(六義園)<br/>\nhttp://www.japan-guide.com/e/e3026.html <br/>', NULL, '2016-08-15 11:40:38'),
(11, NULL, 1, 'report-011-sidebar.jpg', 'report-011-worker.jpg', 'report-011-set.jpg', 'report-011-experience.jpg', '18th Samurai Meetups Tour <br/>―EDOKIRIKO 江戸切子―', '<b>【TOUR REPORT：The 18th Samurai Meetups Tour ―EDOKIRIKO 江戸切子―】</b><br/>\n　<br/>\nThe Edo Kiriko pattern originated over 200 years ago in the later of Japan’s Edo period (1603-1867). It was developed by Kyubei Kagaya among the people’s culture in his glassshop in the Odemmacho area of Edo city (old Tokyo). The many beautiful designs and excellent techniques that evolved in the Edo Kiriko style still maintain a strong atmosphere of Edo period. Today, we participated to Making Edo Kiriko class and taught by Soichiro Sekiba, the Edo Kiriko artist and the owner of Soukichi(創吉)! <br/>\n　<br/>\n<b>〓SAMURAI INTERVIEW : Soichiro Sekiba(関場創一郎), the Edo Kiriko artist and the owner of Soukichi(創吉)〓</b><br/>\n　<br/>\n●How is the popularity of Edo Kiriko recently?<br/>\nーThanks to you, the popularity of Edo Kiriko rises. More non-Japanese people applied, too. In addition, we received media coverage. Even I haven’t yet received coverage from the overseas media.<br/>\n　 <br/>\n●Our teacher was your father the last time.<br/>\nーThe Edo Kiriko experience participants increased and were very busy this time. I have been teaching Edo Kiriko recently, and your father is in the shop sometimes. I introduce it to an overseas visitors in English.<br/>\n　<br/>\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\n""It was great!! I thought it was really cool to learn how to make the glasses and then to be able to actually do it myself. I love when I can make something and bring it home as a reminder of the experience, so it was probably my favorite meetup so far." <br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●<a href=#http://www.sokichi.co.jp >Sokukichi (創吉)</a>\n', NULL, '2016-08-15 11:40:52'),
(12, NULL, 2, 'report-012-sidebar.jpg', 'report-012-worker.jpg', 'report-012-set.jpg', 'report-012-experience.jpg', '3rd Discovery Tour<br/>―Asakusa&Hanami<br/>浅草&花見―', '<b>【TOUR REPORT：The 3rd Discovery Tour ―Asakusa&Hanami 浅草&花見―】</b><br/>\n　<br/>\nWe held a Hanami(Cherry blossum viewing) Party at Ueno Park, one of Japan''s most crowded, noisy and popular spots for cherry blossom parties. There features more than 1000 trees along the street leading towards the National Museum and around Shinobazu Pond. We walked around Asakusa town to buy some foods&drinkset''s before and had a great Hanami party :)<br/>\n　<br/>\n<b>〓PARTICIPANT'' VOICE〓</b><br/>\n"I think this initiative was great! The three of us had a good time and the company was awesome! All thumbs up! "<br/>\n　<br/>\n<b>〓PLACE INFORMATION〓</b><br/>\n●<a href="http://www.japan-guide.com/e/e3019.html">Ueno Park</a>\n', NULL, '2016-08-15 11:41:06');

-- --------------------------------------------------------

--
-- テーブルの構造 `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL,
  `image_url` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `event_summary` text COLLATE utf8_unicode_ci,
  `meeting_time_and_place` text COLLATE utf8_unicode_ci,
  `place_for_visit_and_tips` text COLLATE utf8_unicode_ci,
  `time_schedule` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `samurai_information` text COLLATE utf8_unicode_ci,
  `google_doc_url` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `tours`
--

INSERT INTO `tours` (`tour_id`, `image_url`, `event_summary`, `meeting_time_and_place`, `place_for_visit_and_tips`, `time_schedule`, `price`, `samurai_information`, `google_doc_url`, `language_id`, `inserted_on`) VALUES
(1, 'tour-banner-001.png', NULL, NULL, NULL, NULL, NULL, NULL, 'https://docs.google.com/forms/d/1DB7C0oWaZ6c07ZBc2AiytkNb-6KR9JM3Jgt-V9WNb74/viewform', NULL, '2016-08-11 07:22:06'),
(2, 'tour-banner-002.png', NULL, NULL, NULL, NULL, NULL, NULL, 'https://docs.google.com/forms/d/1ua61HI7B8h7LEZeYTY8K3b7Wwg0SDwgxLGTWrok78GE/viewform', NULL, '2016-08-11 07:27:49'),
(3, 'tour-banner-003.png', NULL, NULL, NULL, NULL, NULL, NULL, 'https://docs.google.com/forms/d/1x_EBgpzWSVezA_wZzrOJAkgLLC-1uWlHVYc29-Xu8OE/viewform', NULL, '2016-08-11 07:30:43'),
(4, 'tour_zazen_banner.jpg', 'E1', 'M1', 'P1', 'T1', 'P1', 'S1', 'https://docs.google.com/forms/d/1kIVIfv0-OqBDdgmlmdwCpbIurQkW9yvS0JWEcqBVwS8/viewform', 2, '2016-09-02 13:00:55'),
(5, 'tour_kamakura_banner.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'http://yahoo.com', 2, '2016-09-02 13:17:15'),
(6, 'tour_sake_banner.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'https://docs.google.com/forms/d/e/1FAIpQLSd0JNNRxXwCmNH0tl46YJwskHhS4yCmQrocMGOl2aVV3Z2WpQ/viewform', 2, '2016-09-09 09:21:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `front_page_elements`
--
ALTER TABLE `front_page_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_page_image_types`
--
ALTER TABLE `front_page_image_types`
  ADD PRIMARY KEY (`front_page_image_type_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `front_page_elements`
--
ALTER TABLE `front_page_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `front_page_image_types`
--
ALTER TABLE `front_page_image_types`
  MODIFY `front_page_image_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
