-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2019 at 01:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `armygames2`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(5) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `name`) VALUES
(1, 'Activision'),
(2, 'EA '),
(3, 'IO Interactive'),
(4, 'Valve');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cont_id` int(5) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cont_id`, `fullname`, `email`, `text`) VALUES
(2, 'Mika Mikic', 'mika.mikic.12.15@ict.edu.rs', 'I like this games.'),
(3, 'Pera Peric', 'pera.peric.17.17@ict.edu.rs', 'This website is so good!');

-- --------------------------------------------------------

--
-- Table structure for table `func`
--

CREATE TABLE `func` (
  `function_id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `func`
--

INSERT INTO `func` (`function_id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gal_id` int(5) NOT NULL,
  `href` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gal_id`, `href`, `src`, `alt`) VALUES
(1, 'assets/images/gallery/codiwimg1link.jpg', 'assets/images/gallery/codiwimg1.jpg', 'CoD Infinite Warfare image 1'),
(2, 'assets/images/gallery/codiwimg2link.jpg', 'assets/images/gallery/codiwimg2.jpg', 'CoD Infinite Warfare image 2'),
(3, 'assets/images/gallery/codiwimg3link.jpg', 'assets/images/gallery/codiwimg3.jpg', 'CoD Infinite Warfare image 3'),
(4, 'assets/images/gallery/hitmanimg1link.jpg', 'assets/images/gallery/hitmanimg1.jpg', 'Hitman image 1'),
(5, 'assets/images/gallery/hitmanimg2link.jpg', 'assets/images/gallery/hitmanimg2.jpg', 'Hitman image 2'),
(6, 'assets/images/gallery/hitmanimg3link.jpg', 'assets/images/gallery/hitmanimg3.jpg', 'Hitman image 3'),
(7, 'assets/images/gallery/csgoimg1link.jpg', 'assets/images/gallery/csgoimg1.jpg', 'CSGO image 1'),
(8, 'assets/images/gallery/csgoimg2link.jpg', 'assets/images/gallery/csgoimg2.jpg', 'CSGO image 2'),
(9, 'assets/images/gallery/csgoimg3link.jpg', 'assets/images/gallery/csgoimg3.jpg', 'CSGO image 3'),
(10, 'assets/images/gallery/batf1img1link.jpg', 'assets/images/gallery/batf1img1.jpg', 'Battlefield 1 image 1'),
(11, 'assets/images/gallery/batf1img2link.jpg', 'assets/images/gallery/batf1img2.jpg', 'Battlefield 1 image 2'),
(12, 'assets/images/gallery/batf1img3link.jpg', 'assets/images/gallery/batf1img3.jpg', 'Battlefield 1 image 3'),
(13, 'assets/images/gallery/codmw3img1link.jpg', 'assets/images/gallery/codmw3img1.jpg', 'CoD Modern Warfare 3 image 1'),
(14, 'assets/images/gallery/codmw3img2link.jpg', 'assets/images/gallery/codmw3img2.jpg', 'CoD Modern Warfare 3 image 2'),
(15, 'assets/images/gallery/codmw3img3link.jpg', 'assets/images/gallery/codmw3img3.jpg', 'CoD Modern Warfare 3 image 3'),
(16, 'assets/images/gallery/crysisimg1link.jpg', 'assets/images/gallery/crysisimg1.jpg', 'Crysis 2 image 1'),
(17, 'assets/images/gallery/crysisimg2link.jpg', 'assets/images/gallery/crysisimg2.jpg', 'Crysis 2 image 2'),
(18, 'assets/images/gallery/crysisimg3link.jpg', 'assets/images/gallery/crysisimg3.jpg', 'Crysis 2 image 3'),
(19, 'assets/images/gallery/hitmanabsimg1link.jpg', 'assets/images/gallery/hitmanabsimg1.jpg', 'Hitman Absolution image 1'),
(20, 'assets/images/gallery/hitmanabsimg2link.jpg', 'assets/images/gallery/hitmanabsimg2.jpg', 'Hitman Absolution image 2'),
(21, 'assets/images/gallery/hitmanabsimg3link.jpg', 'assets/images/gallery/hitmanabsimg3.jpg', 'Hitman Absolution image 3'),
(22, 'assets/images/gallery/mohimg1link.jpg', 'assets/images/gallery/mohimg1.jpg', 'MoH Warfighter image 1'),
(23, 'assets/images/gallery/mohimg2link.jpg', 'assets/images/gallery/mohimg2.jpg', 'MoH Warfighter image 2'),
(24, 'assets/images/gallery/mohimg3link.jpg', 'assets/images/gallery/mohimg3.jpg', 'MoH Warfighter image 3'),
(25, 'assets/images/gallery/halflifeimg1link.jpg', 'assets/images/gallery/halflifeimg1.jpg', 'Half Life image 1'),
(26, 'assets/images/gallery/halflifeimg2link.jpg', 'assets/images/gallery/halflifeimg2.jpg', 'Half Life image 2'),
(27, 'assets/images/gallery/halflifeimg3link.jpg', 'assets/images/gallery/halflifeimg3.jpg', 'Half Life image 3'),
(37, 'assets/images/gallery/1560023827_codwwiigal1.jpg', 'assets/images/gallery/new_1560023827_codwwiigal1.jpg', 'CoD WWII image 1'),
(38, 'assets/images/gallery/1560023827_codwwiigal2.jpg', 'assets/images/gallery/new_1560023827_codwwiigal2.jpg', 'CoD WWII image 1'),
(39, 'assets/images/gallery/1560023827_codwwiigal3.jpg', 'assets/images/gallery/new_1560023827_codwwiigal3.jpg', 'CoD WWII image 1'),
(40, 'assets/images/gallery/1560026743_codbo3gal1.jpg', 'assets/images/gallery/new_1560026743_codbo3gal1.jpg', 'CoD Black Ops 3 image 1'),
(41, 'assets/images/gallery/1560026743_codbo3gal2.jpg', 'assets/images/gallery/new_1560026743_codbo3gal2.jpg', 'CoD Black Ops 3 image 1'),
(42, 'assets/images/gallery/1560026743_codbo3gal3.jpg', 'assets/images/gallery/new_1560026743_codbo3gal3.jpg', 'CoD Black Ops 3 image 1');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(5) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `comp_id` int(5) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `name`, `src`, `description`, `price`, `comp_id`, `year`) VALUES
(1, 'CoD Infinite Warfare', 'assets/images/codiw.jpg', 'Call of Duty: Infinite Warfare is a first-person shooter video game developed by Infinity Ward and published by Activision. It is the thirteenth primary installment in the Call of Duty series and was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on November 4, 2016.', '36.25', 1, 2016),
(2, 'HITMAN', 'assets/images/hmeawoa.jpg', 'Hitman is an episodic stealth video game developed by IO Interactive and published by Square Enix for Microsoft Windows, PlayStation 4, and Xbox One. A port for Linux, developed and published by Feral Interactive, was released on 16 February 2017. A version for macOS, also developed and published by Feral Interactive, was released on 20 June 2017. It is the sixth entry in the Hitman series. The game\'s prologue acts as a prequel to Hitman: Codename 47, while the main game takes place seven years after the events of Hitman: Absolution.', '23.46', 3, 2016),
(3, 'CS Global Offensive', 'assets/images/csgo.jpg', 'CS:GO features new maps, characters, and weapons and delivers updated versions of the classic Counter-Strike maps like Dust, Inferno, Nuke, Train, and more. In addition, CS:GO introduces new game modes like Arms Race, Flying Scoutsman and Wingman, and features online matchmaking and Competitive Skill Groups.', '36.75', 4, 2012),
(4, 'Battlefield 1', 'assets/images/bf1.jpg', 'Battlefield 1 is a first-person shooter video game developed by EA DICE and published by Electronic Arts. Despite its name, Battlefield 1 is the fifteenth installment in the Battlefield series, and the first main entry in the series since Battlefield 4. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on October 21, 2016.', '24.50', 2, 2016),
(5, 'CoD MW3', 'assets/images/codmw3.jpg', 'Call of Duty: Infinite Warfare is a first-person shooter video game developed by Infinity Ward and published by Activision. It is the thirteenth primary installment in the Call of Duty series and was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on November 4, 2016.', '32.33', 1, 2011),
(6, 'Crysis 2', 'assets/images/crysis2.jpg', 'Crysis 2 is a first-person shooter video game developed by Crytek, published by Electronic Arts and released in North America, Australia and Europe in March 2011 for Microsoft Windows, PlayStation 3, and Xbox 360. Officially announced on June 1, 2009, the game is the second main installment of the Crysis series, and is the sequel to the 2007 video game Crysis, and its expansion Crysis Warhead. The story was written by Richard Morgan, while Peter Watts was consulted and wrote a novel adaptation of the game. It was the first game to showcase the CryEngine 3 game engine and the first game using the engine to be released on consoles. A sequel, Crysis 3, was released in 2013.', '9.07', 2, 2013),
(7, 'HITMAN Absolution', 'assets/images/hmabs.jpg', 'Hitman: Absolution is a stealth video game developed by IO Interactive and published by Square Enix. It is the fifth installment in the Hitman series, and runs on IO Interactive\'s proprietary Glacier 2 game engine. Before release, the developers stated that Absolution would be easier to play and more accessible, while still retaining hardcore aspects of the franchise. The game was released on 20 November 2012 (which is in the 47th week of the year in reference to the protagonist, Agent 47) for Microsoft Windows, PlayStation 3, and Xbox 360. On 15 May 2014 Hitman: Absolution — Elite Edition was released for OS X by Feral Interactive; it contained all previously released downloadable content, including Hitman: Sniper Challenge, a making of documentary, and a 72-page artbook', '12.79', 3, 2012),
(8, 'MoH Warfighter', 'assets/images/mohw.jpg', 'Medal of Honor: Warfighter is a first-person shooter video game developed by Danger Close Games and published by Electronic Arts. It is a direct sequel to 2010\'s series reboot Medal of Honor and the fourteenth installment in the Medal of Honor series. The title was officially announced on February 23, 2012, and was released in North America on October 23, 2012, in Australia on October 25, 2012, in Europe on October 26, 2012 and in Japan on November 15, 2012 on Microsoft Windows, PlayStation 3, and Xbox 360.', '19.64', 2, 2012),
(9, 'HALF-LIFE', 'assets/images/hl.jpg', 'Half-Life (stylized as HλLF-LIFE) is a science fiction first-person shooter video game developed by Valve and published by Sierra Studios for Microsoft Windows in 1998. It was Valve\'s debut product and the first in the Half-Life series. Players assume the role of Dr. Gordon Freeman, who must fight his way out of a secret research facility after an experiment goes wrong, fighting enemies and solving puzzles.', '7.09', 4, 1998),
(23, 'CoD WWII', 'assets/images/new_1560023827_codwwii.jpg', 'Call of Duty returns to its roots with Call of Duty: WWII - a breathtaking experience that redefines World War II for a new gaming generation. Land in Normandy on D-Day and battle across Europe through iconic locations in history\'s most monumental war. Experience classic Call of Duty combat, the bonds of camaraderie, and the unforgiving nature of war against a global power throwing the world into tyranny.', '36.75', 1, 2017),
(24, 'CoD Black Ops 3', 'assets/images/new_1560026743_cod_black_ops3.jpg', 'Call of Duty: Black Ops 3 combines three unique game modes: Campaign, Multiplayer and Zombies, providing fans with the deepest and most ambitious Call of Duty ever. The Campaign has been designed as a co-op game that can be played with up to 4 players online or as a solo cinematic thrill-ride. Multiplayer will be the franchises deepest, most rewarding and most engaging to date, with new ways to rank up, customize, and gear up for battle.	', '34.55', 1, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `games_gallery`
--

CREATE TABLE `games_gallery` (
  `gagal_id` int(5) NOT NULL,
  `game_id` int(5) NOT NULL,
  `gal_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games_gallery`
--

INSERT INTO `games_gallery` (`gagal_id`, `game_id`, `gal_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15),
(16, 6, 16),
(17, 6, 17),
(18, 6, 18),
(19, 7, 19),
(20, 7, 20),
(21, 7, 21),
(22, 8, 22),
(23, 8, 23),
(24, 8, 24),
(25, 9, 25),
(26, 9, 26),
(27, 9, 27),
(30, 23, 37),
(31, 23, 38),
(32, 23, 39),
(33, 24, 22),
(34, 24, 23),
(35, 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `indexcontent`
--

CREATE TABLE `indexcontent` (
  `ic_id` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `indexcontent`
--

INSERT INTO `indexcontent` (`ic_id`, `name`, `src`, `alt`, `text`) VALUES
(1, 'Gamer', 'assets/images/gamer.jpg', 'Gamer', 'Be the great gamer of our games.'),
(2, 'PS4', 'assets/images/ps4.jpg', 'PS4', 'Play with friends online games on the PS4.'),
(3, 'nVidia', 'assets/images/nvidia.jpg', 'nVidia', 'This company has the best graphics processors in the world.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `href`) VALUES
(1, 'HOME', 'index'),
(2, 'STORE', 'store'),
(3, 'CONTACT', 'contact'),
(4, 'ABOUT US', 'aboutus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `verifypassword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dateregister` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(5) NOT NULL,
  `login` int(5) DEFAULT NULL,
  `function_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `verifypassword`, `dateregister`, `token`, `active`, `login`, `function_id`) VALUES
(1, 'jovan.popovic.60.16', 'jovan.popovic.60.16@ict.edu.rs', 'c2d9684a4165bd2a8784a1942062b4c8', 'c2d9684a4165bd2a8784a1942062b4c8', '2019-05-28 12:06:57', '061fe6efb5a4b8d47793466aacccb3dc', 1, 0, 1),
(2, 'pera.peric.15.15', 'pera.peric.15.15@ict.edu.rs', 'bc3bb7fb5efb840adb22870202ff3ff2', 'bc3bb7fb5efb840adb22870202ff3ff2', '2019-05-28 12:07:25', '', 0, 0, 2),
(6, 'savo.bacic.150.16', 'savo.bacic.150.16@ict.edu.rs', 'd590b320fd3d995ce808f0309dca9273', 'd590b320fd3d995ce808f0309dca9273', '2019-05-28 12:07:51', '', 0, 0, 2),
(7, 'gosn.jovanke.160.15', 'gosn.jovanke.160.15@ict.edu.rs', '10a4835f91469722dcf333b6d35a5524', '10a4835f91469722dcf333b6d35a5524', '2019-05-28 12:08:13', '', 0, 0, 2),
(9, 'pera.petrovic.15.16', 'pera.petrovic.15.16@ict.edu.rs', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', '2019-05-28 12:08:35', '', 0, 0, 2),
(10, 'nikola.jovanovic.450.16', 'nikola.jovanovic.450.16@ict.edu.rs', 'a11a820eb8f5fd16490fce44035446d6', 'a11a820eb8f5fd16490fce44035446d6', '2019-05-28 12:08:55', '16387112d4c8684ce3465ad73a97850e', 0, 0, 2),
(16, 'mita.mitic.15.16', 'mita.mitic.15.16@ict.edu.rs', '0493ecebf2a861c6b420d4f49ec319eb', '0493ecebf2a861c6b420d4f49ec319eb', '2019-05-28 13:38:51', '', 0, 0, 2),
(18, 'marko.markovic.12.15', 'marko.markovic.12.15@ict.edu.rs', '3f31e95cddd4f27674c7c7b3b1c740e5', '3f31e95cddd4f27674c7c7b3b1c740e5', '2019-05-28 13:40:00', '', 0, 0, 2),
(26, 'djuka.djukic.129.16', 'djuka.djukic.129.16@ict.edu.rs', '0b869f9fbce338f8d3178cf1bef3490c', '0b869f9fbce338f8d3178cf1bef3490c', '2019-05-28 14:03:05', '', 0, 0, 2),
(48, 'milos.krivopov.156.16', 'milos.krivopov.156.16@ict.edu.rs', 'd324e075a64b676698d58f0e14b9a766', 'd324e075a64b676698d58f0e14b9a766', '2019-06-03 13:50:18', '291818ae154fbc4bfc26b03c4df9008a', 0, 0, 2),
(53, 'pizon.pizonovic.144.16', 'pizon.pizonovic.144.16@ict.edu.rs', 'd4bf8c518745d6ee2ef715f2a64374f8', 'd4bf8c518745d6ee2ef715f2a64374f8', '2019-06-03 17:23:17', 'fa25d4e09ea5c10aa8c1f82bbbd6d118', 0, 0, 2),
(55, 'miro.siro.122.15', 'miro.siro.122.15@ict.edu.rs', '34240fb455df3bacbd8055545f5b8d9d', '34240fb455df3bacbd8055545f5b8d9d', '2019-06-07 16:10:05', '', 0, 0, 2),
(56, 'mito.rito.133.16', 'mito.rito.133.16@ict.edu.rs', '88ac545b72f6e261ec2429021b9714a4', '88ac545b72f6e261ec2429021b9714a4', '2019-06-07 16:20:11', '8c16b8fb72dca085ddf2e5b2f642b3e4', 0, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `func`
--
ALTER TABLE `func`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `comp_id_2` (`comp_id`);

--
-- Indexes for table `games_gallery`
--
ALTER TABLE `games_gallery`
  ADD PRIMARY KEY (`gagal_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `gal_id` (`gal_id`);

--
-- Indexes for table `indexcontent`
--
ALTER TABLE `indexcontent`
  ADD PRIMARY KEY (`ic_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `function_id` (`function_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cont_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `func`
--
ALTER TABLE `func`
  MODIFY `function_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gal_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `games_gallery`
--
ALTER TABLE `games_gallery`
  MODIFY `gagal_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `indexcontent`
--
ALTER TABLE `indexcontent`
  MODIFY `ic_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `games_gallery`
--
ALTER TABLE `games_gallery`
  ADD CONSTRAINT `games_gallery_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `games_gallery_ibfk_2` FOREIGN KEY (`gal_id`) REFERENCES `gallery` (`gal_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`function_id`) REFERENCES `func` (`function_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
