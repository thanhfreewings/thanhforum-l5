-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2016 at 06:35 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `created_by`, `receiver_id`, `created_at`, `updated_at`) VALUES
(28, 'hello', 24, 10, '0000-00-00 00:00:00', NULL),
(30, 'fdhfdh', 11, 10, '0000-00-00 00:00:00', NULL),
(45, ' this automatically as it causes complica', 24, 1, '2016-04-01 09:23:03', '2016-04-01 09:23:03'),
(47, 'apply this automatically as it causes complications to other image formats', 10, 24, '2016-04-01 09:26:34', '2016-04-01 09:26:34'),
(48, 'hello! how are you?', 22, 24, '2016-04-04 03:49:04', '2016-04-04 03:49:04'),
(49, 'The query builder also includes a few functions to help you do "pessimistic locking" ', 24, 10, '2016-04-04 04:18:30', '2016-04-04 04:18:30'),
(50, ' A shared lock prevents the selected rows from being modified until your transaction commits:', 10, 24, '2016-04-04 04:19:17', '2016-04-04 04:19:17'),
(51, 'dfgfdgdfg', 24, 10, '2016-04-04 04:34:43', '2016-04-04 04:34:43'),
(52, 'I''m fine, thank!', 24, 22, '2016-04-05 15:40:41', '2016-04-05 15:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_06_025805_create_roles_table', 1),
('2016_04_06_030055_create_user_roles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_ibfk_2` (`thread_id`),
  KEY `post_ibfk_1` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `thread_id`, `content`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 12, 'Curious to know what got you started on this side project? :) And why favourite haha.', 1, 1457594333, NULL),
(9, 12, 'Basically the project is a challenge for myself, and I enjoyed the whole long process of trying to overcome that, which eventually made it my most favourite project', 1, 1457594366, NULL),
(10, 12, 'On the other side of the world, Supercell just posted their Y2015 financial results â€“ $924M in profits with just 3 games.', 13, 1457598096, NULL),
(11, 12, 'His first startup role was that of a â€œdata collectorâ€. Advitiya recalls:', 11, 1457598412, NULL),
(12, 1, 'like :)', 11, 1457598907, NULL),
(13, 15, 'Housing wants to bring transparency into this sector. Several real estate portals were already active by then. â€œBut none of them answered the basic needs of a house hunter. The portals used to run on paid listings', 11, 1457600134, NULL),
(14, 15, 'We wanted something better, so we built it ourselves.â€ His first startup role was that of a â€œdata collectorâ€. Advitiya recalls:', 1, 1457674423, NULL),
(15, 15, 'Several real estate portals were already active by then. â€œBut none of them answered the basic needs of a house hunter', 14, 1458016398, NULL),
(16, 15, 'hgughugyuyuyuyu', 15, 1458118968, NULL),
(17, 15, 'The portals used to run on paid listings', 1, 1458187651, NULL),
(19, 15, 'â€œWe wanted something better, so we built it ourselves.â€', 1, 1458190864, NULL),
(20, 14, 'but an impressive one at a time when Chinaâ€™s internet penetration was barely five percent. ', 1, 1458192266, NULL),
(24, 16, 'new users of your application. ', 24, 2016, 2016),
(25, 1, ' but tech-based portals like Housing are helping to change that.', 24, 2016, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', '2016-04-06 01:36:08', '2016-04-06 01:36:08'),
(7, 'Moderator', '2016-04-06 01:50:55', '2016-04-06 01:50:55'),
(8, 'Member', '2016-04-06 01:51:04', '2016-04-06 01:51:04'),
(9, 'User', '2016-04-06 04:19:19', '2016-04-06 04:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `title`, `content`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Backstory of the boy from Jammu & Kashmir who star', 'A picturesque old town with rivers, orchards, and flowers nestled against the mighty Himalayas. Thatâ€™s Jammu in Indiaâ€™s northernmost state of Jammu and Kashmir. Itâ€™s stunningly beautiful but the area is in the news almost always for the wrong reasons.\r\n\r\nPlagued by communal politics, you often hear about bomb blasts, refugee camps, and thoughtless slaughter. You read about youngsters â€“ torn between beauty and the beastly â€“ straying into terrorism, picking up AK-47 rifles, ready to kill. But the hero of this story strayed into something else altogether.\r\n\r\nMeet Advitiya Sharma, co-founder of Housing â€“ the Mumbai-based real estate portal on which Japanâ€™s SoftBank bet US$90 million. Yesterday, Advitiya left the startup he founded after a series of controversies. This is the backstory of the meteoric rise of this young entrepreneur before his denouement.\r\n\r\nHousing began as a rental search platform in Mumbai. It now offers everything from youth hostels and paying guest accommodation to new housing projects, plots of land, legal agreements online, and even home loans across 50 Indian cities. Most of all, it pioneered the use of mobile map-based technology to locate and verify the listings on its site.\r\n\r\nReal estate is often a mugâ€™s game in India, but tech-based portals like Housing are helping to change that.', NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'The real world outside college walls  Advitiya Sha', 'Teenager Advitiya stepped out of Jammu to a different world in Mumbai when he joined Indian Institute of Technology (IIT) Bombay to study engineering. The hustle and bustle of Indiaâ€™s financial capital, brimming with migrants, was a novel experience for him. The IIT campus with brilliant techies from all over the country became a sanctuary where he connected with several like-minded friends.\r\n\r\nIt was in the final semester at college that he got a real dose of Mumbai. He knew he would have to move out of the college hostel soon, and decided to find an apartment for rent.\r\n\r\nAlmost immediately he found an ad for a three-bedroom apartment in the Bandra area for just INR 15,000 (US$237) per month. â€œI couldnâ€™t believe my luck. Imagine, living on the same street as Bollywood movie stars. I fell for it,â€ Advitiya recalls.\r\n\r\nBandra is one of the most expensive localities in Mumbai. One-bedroom flats cost over INR 100,000 (US$1,600) per month in rent. But Advitiya had never house-hunted before, and so naively believed the real estate broker who had advertised. â€œI called up the broker. He said he had found a tenant for the apartment that very morning, but had several more such properties for rent. â€˜Come on over,â€™ he told me, and I set out to find that dream home. But, what he promised and what I saw were completely different,â€ Advitiya recalls.\r\n\r\nRun-down flats in cramped streets, musty rooms with no natural light, all atrociously expensive â€“ that was all he found after tiring days of house-hunting. And that experience turned out to be life-altering.', NULL, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Our startup journey: why we didnâ€™t raise funding', 'Everyone loves to ask this question. People at startup events, college buddies on whatsapp groups and even your co-passengers on flights. And sure, I get it. In the world littered with umpteen startups, funding reflects a certain external validation and seriousness of your venture. So nothing wrong with this question, really. But what gets on my nerves is the way the conversation goes next:\r\n\r\nI say: No, we are bootstrapped.\r\n\r\nThe guy: Uh oh. Yeah, funding is a big problem these days.\r\n\r\nWait a minute. I only said we are bootstrapped. Did it automatically imply that we failed at raising funds? Is raising funds the only way to build a startup?\r\n\r\nOf course not. There are many successful startups that bootstrapped to success including the likes of Mailchimp and GitHub. But these are heady startup days and most people equate â€œfundingâ€ with â€œsuccessâ€. In an emotional post recently, Sumanth Ragahvendra put it this way:\r\n\r\n    We no longer care about what a startup has achieved or aims to do, the problems it solves, the benefits it provides or the impact it has had. We only care about one thingâ€Šâ€”â€Šhow much funding has a startup raised. And that amount determines where you are slotted in the startup caste systemâ€¦\r\n\r\nAt SocialHelpouts, we decided to skip raising funds early on. Our product idea could be applied to many markets and we were not sure which one would work out better. And even after choosing one market i.e. startup hiring, our biggest task was to figure out what problems to solve for which segment of that market.\r\n\r\nAt an early stage, our biggest task was to choose a market, test it and find our sweet spot. Funding was not going to do it for us â€“ we had to do it ourselves.\r\n\r\nSo in last 10 months, we evaluated different markets problems and experimented with different solutions to tackle them. We played with different types of positioning and tried different ways of acquiring our users. Along the way, we launched several creative initiatives such as making event networking effortless, helping laid off employees and doing high impact hiring events such as JoinTheRocketship. These things not only helped us test different customer problems but also helped us identify our own strengths and weaknesses as a team. ', NULL, 1, '0000-00-00 00:00:00', NULL),
(13, 'This mobile game is earning $100 million every mon', 'On Wednesday, Shanda Games vice-chair Zhu Xiaojing announced some pretty stunning data about Shandaâ€™s highest-earning game, The Legend of Mir Mobile. The game, Zhu says, is earning between US$92 million and US$107 million each month through Tencentâ€™s mobile game platform. On its best day, The Legend of Mir Mobile brought in more than US$7 million in just 24 hours.\n\nNot bad for a game thatâ€™s 15 years old.', NULL, 1, '0000-00-00 00:00:00', NULL),
(14, 'What is The Legend of Mir?', 'To understand why this game is making so much money, you have to understand what it is and where it comes from. The Legend of Mir Mobile is a mobile version of a PC game called The Legend of Mir 2. Mir 2 is a Korean massively-multiplayer online role-playing game (MMORPG) developed by WeMade Entertainment and first published way back in 2001.\r\n\r\nMir 2 was localized and published all over the world, but it made an especially big splash in China, where it was published for the PC by Shanda Games. In 2002 and 2003 it reportedly racked up 250,000 simultaneous players in China â€“ a modest accomplishment by modern standards, but an impressive one at a time when Chinaâ€™s internet penetration was barely five percent.', NULL, 13, '0000-00-00 00:00:00', NULL),
(15, 'Feet on the street with a DSLR camera', 'Globally, India is among the top 20 real estate investment markets. In 2012, when Advitiya and his 11 friends kicked off Housing, the recorded investment volume was over INR 190 billion (US$3 billion).\r\n\r\nThatâ€™s just the tip of the iceberg. Most of the real estate dealings are done under the table. The industry in India, projected to reach US$180 billion by 2020, is murky to say the least. There is much corruption, lack of clear property title deals, and even mafia involved. Many hapless buyers often find themselves forced to play along with the wheeling-and-dealing real estate agents, who demand huge brokerage commissions.\r\n\r\nHousing wants to bring transparency into this sector. Several real estate portals were already active by then. â€œBut none of them answered the basic needs of a house hunter. The portals used to run on paid listings, and had no verified information. If there had been a portal that gave me credible information and helped me find a good apartment when I was looking for one, then I would have never started up Housing,â€ Advitiya tells Tech in Asia. â€œWe wanted something better, so we built it ourselves.â€\r\n\r\nHis first startup role was that of a â€œdata collectorâ€. Advitiya recalls:', NULL, 11, '0000-00-00 00:00:00', NULL),
(16, 'Retrieving The Authenticated User!', 'To modify the form fields that are required when a new user registers with your application, or to customize how new user records are inserted into your database, you may modify the AuthController class. This class is responsible for validating and creating new users of your application.', NULL, 24, '0000-00-00 00:00:00', '2016-04-01 01:53:40'),
(36, 'Announcing our $38m Tech in Asia Fund', 'Tech in Asia is announcing Tech in Asia Fund, a US$38 million fund aimed at early stage and Series A startups. The fund will be\r\nled by Terence Lee (our managing editor) and Andrew Wang (our COO). I’ll remain as the company’s CEO overseeing all of our\r\nbusiness units including the fund.\r\n\r\nTech in Asia’s mission is to serve the tech and startup ecosystem in Asia. We have worked towards the mission by uncovering\r\npromising startups, reporting about news in the tech scene, and connecting people at our events. And as we continue to\r\nconnect with more founders, it became clear to us that we are missing out on a lot of good opportunities.', 'uploads/1459488486_profile-bg.jpg', 24, '2016-04-01 04:47:43', '2016-04-01 06:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(100) DEFAULT 'uploads/user.png',
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'uploads/1458117266_user-9.jpg', '123456', NULL, '0000-00-00 00:00:00', '2016-04-06 07:11:54'),
(10, 'Max', 'max@example.com', 'uploads/1457932327_user-7.jpg', '123456', NULL, '0000-00-00 00:00:00', '2016-04-06 07:18:48'),
(11, 'min', 'min@gmail.com', 'uploads/1457932185_user-2.jpg', '123456', NULL, '0000-00-00 00:00:00', '2016-04-06 07:19:09'),
(13, 'Min', 'min@example.com', 'uploads/1457932441_user-14.jpg', '123456', NULL, '0000-00-00 00:00:00', '2016-04-06 07:19:33'),
(14, 'Cat', 'cat@gmail.com', 'uploads/user.png', '123456', NULL, '0000-00-00 00:00:00', '2016-04-06 07:19:41'),
(15, 'Hot', 'hot@example.com', 'uploads/user.png', '123456', NULL, '0000-00-00 00:00:00', '2016-04-06 07:20:28'),
(22, 'Test5', '5test@gmail.com', 'uploads/1459136447_user-3.jpg', '123456', 'x1D3obJZpn51d7N3oURhnnbUuxkX391oIR9Ws5sgUzAR035V0uX6p3MFSSgB', '2016-03-24 03:23:27', '2016-03-28 04:18:29'),
(24, '6Test', '6test@example.com', 'uploads/1459303863_user-5.jpg', '$2y$10$DfmibWdkoaokLceYpIpOqeQWPdSVD4dpImjsJqyhSGj2S6piTkd9W', 'hFwdk291FC44dqQxAGSh9TRfsiniZEOARpviTH2jm0GQE0GgkmBzuZlaAIR8', '2016-03-30 02:01:03', '2016-04-06 05:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2016-04-06 02:55:56', '2016-04-06 02:55:56'),
(3, 1, 2, '2016-04-06 04:11:56', '2016-04-06 04:11:56'),
(4, 24, 7, '2016-04-06 04:12:06', '2016-04-06 04:12:06'),
(5, 10, 8, '2016-04-06 04:12:16', '2016-04-06 04:12:16'),
(6, 11, 8, '2016-04-06 04:12:32', '2016-04-06 04:12:32'),
(7, 13, 8, '2016-04-06 04:12:47', '2016-04-06 04:12:47'),
(8, 22, 8, '2016-04-06 04:12:57', '2016-04-06 04:12:57'),
(9, 14, 9, '2016-04-06 04:19:41', '2016-04-06 04:19:41');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
