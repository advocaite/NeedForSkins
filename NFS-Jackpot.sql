-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2015 at 06:05 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `NFS`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL DEFAULT '0',
  `starttime` int(255) NOT NULL,
  `totalvalue` float DEFAULT NULL,
  `winneruserid` bigint(255) DEFAULT NULL,
  `winnername` varchar(255) NOT NULL,
  `itemsnum` int(11) NOT NULL,
  `winnerpercent` text NOT NULL,
  `winnerticket` text NOT NULL,
  `secret` text NOT NULL,
  `hash` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `starttime`, `totalvalue`, `winneruserid`, `winnername`, `itemsnum`, `winnerpercent`, `winnerticket`, `secret`, `hash`) VALUES
(1, 1450557557, 0.22, 76561198072337501, 'teejthenerd5', 3, '91.84970537', '0.202069351814', 'f57448551db44629', '66f29ed22b06a46ff53c17df0b5520ec'),
(2, 1450565770, 0.51, 76561198042996771, 'meep', 2, '93.58973879', '0.477307667829', '38e91edeae28597b', '744505d6a19f2caae5c80f8757d188ad'),
(3, 2147483647, 0, 0, '', 0, '70.2513470', '', '81d63591b6265edb', '581f69b1a3069c776d1fa42a4a0dfecc');

-- --------------------------------------------------------

--
-- Table structure for table `houseitems`
--

CREATE TABLE IF NOT EXISTS `houseitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` bigint(255) DEFAULT NULL,
  `gameid` int(11) NOT NULL,
  `price` float NOT NULL,
  `item` varchar(128) NOT NULL,
  `timestamp` int(255) NOT NULL,
  `ininventory` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `itemid` (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`name`, `value`) VALUES
('current_game', '3');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `cost` float NOT NULL,
  `lastupdate` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `cost`, `lastupdate`) VALUES
(1, 'P2000 | Amber Fade (Factory New)', 0.82, '1450548330'),
(2, 'MP9 | Sand Dashed (Factory New)', 0.12, '1450557189'),
(3, 'Dual Berettas | Contractor (Field-Tested)', 0.02, '1450557551'),
(4, 'MP9 | Orange Peel (Field-Tested)', 0.04, '1450557551'),
(5, 'Sticker | Flipsid3 Tactics | Cluj-Napoca 2015', 0.4, '1450564164'),
(6, 'StatTrakâ„¢ Swap Tool', 0.09, '1450565765');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameid` int(255) NOT NULL,
  `userid` varchar(70) NOT NULL,
  `token` varchar(128) NOT NULL,
  `tradeStatus` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  `items` text NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `gameid`, `userid`, `token`, `tradeStatus`, `attempts`, `items`, `status`) VALUES
(1, 1, '76561198072337501', 'qO7gvjg9', 9, 0, 'Dual Berettas | Contractor (Field-Tested)/MP9 | Orange Peel (Field-Tested)/MP9 | Sand Dashed (Factory New)', 'sent 917500116'),
(2, 2, '76561198042996771', 'Lhf1wjg5', 9, 0, 'StatTrak™ Swap Tool/Sticker | Flipsid3 Tactics | Cluj-Napoca 2015', 'sent 917627388');

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `itemid` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gameid` int(255) NOT NULL,
  `queueid` int(255) NOT NULL,
  `userid` bigint(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `itemid` (`itemid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sentitems`
--

INSERT INTO `sentitems` (`id`, `itemid`, `name`, `gameid`, `queueid`, `userid`) VALUES
(1, 4593788846, 'Dual Berettas | Contractor (Field-Tested)', 1, 1, 76561198072337501),
(2, 4593788806, 'MP9 | Orange Peel (Field-Tested)', 1, 1, 76561198072337501),
(3, 4593740620, 'MP9 | Sand Dashed (Factory New)', 1, 1, 76561198072337501),
(4, 4594779296, 'StatTrak™ Swap Tool', 2, 2, 76561198042996771),
(5, 4594603396, 'Sticker | Flipsid3 Tactics | Cluj-Napoca 2015', 2, 2, 76561198042996771);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `steamid` bigint(255) NOT NULL,
  `tlink` varchar(255) DEFAULT NULL,
  `won` float DEFAULT '0',
  `wonp` float DEFAULT '0',
  `admin` int(11) DEFAULT '0',
  `name` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `games` int(11) NOT NULL DEFAULT '0',
  `lastseen` int(11) NOT NULL,
  `firstseen` int(11) NOT NULL,
  `c_oid` varchar(255) NOT NULL,
  `c_alid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `steamid` (`steamid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `steamid`, `tlink`, `won`, `wonp`, `admin`, `name`, `avatar`, `games`, `lastseen`, `firstseen`, `c_oid`, `c_alid`) VALUES
(1, 76561198065442521, 'https://steamcommunity.com/tradeoffer/new/?partner=105176793&token=joarhT3x', 0, 0, 0, '[A]ndrew', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/18/18b183185c94dad3ea69def04082fed7866b931b_full.jpg', 0, 1450557759, 1450540187, '', ''),
(2, 76561198042996771, 'https://steamcommunity.com/tradeoffer/new/?partner=82731043&token=Lhf1wjg5', 0.51, 0, 0, 'meep', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3ed5e79e310770924a347ebea08e0c00ad31103e_full.jpg', 1, 1450565733, 1450557099, '', ''),
(3, 76561198072337501, 'https://steamcommunity.com/tradeoffer/new/?partner=112071773&token=qO7gvjg9', 0.22, 0.13, 0, 'teejthenerd5', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/8e/8e6002c5a791380873aebc9a7d6e1e3456b39eeb_full.jpg', 1, 1450558012, 1450557503, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `z_round_1`
--

CREATE TABLE IF NOT EXISTS `z_round_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offerid` varchar(100) NOT NULL,
  `userid` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `item` text,
  `qualityclass` varchar(100) DEFAULT NULL,
  `color` text,
  `value` float DEFAULT NULL,
  `avatar` varchar(512) NOT NULL,
  `image` text NOT NULL,
  `from` float DEFAULT NULL,
  `to` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `z_round_1`
--

INSERT INTO `z_round_1` (`id`, `offerid`, `userid`, `username`, `item`, `qualityclass`, `color`, `value`, `avatar`, `image`, `from`, `to`) VALUES
(1, '917491771', '76561198042996771', 'meep', 'MP9 | Sand Dashed (Factory New)', '1consumer', 'D2D2D2', 0.13, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3ed5e79e310770924a347ebea08e0c00ad31103e_full.jpg', '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6r8FBRw7OfJYTh9_9S5hpS0hPb6N4Tdn2xZ_Isp07rFpY70i1Lk-ERpY233LNXAJAJsNFmG_FW3xOfu15-6vp_AyXU2pGB8suBC9uz5', 0, 0.13),
(2, '917498322', '76561198072337501', 'teejthenerd5', 'Dual Berettas | Contractor (Field-Tested)', '1consumer', 'D2D2D2', 0.03, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/8e/8e6002c5a791380873aebc9a7d6e1e3456b39eeb_full.jpg', '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpos7asPwJfwPz3YTBB09GzkImemrmnMuvQxTtXu5Eh2r6SpdTx3lbjrxZla2nwddWSc1Q3Y1-BrgDrwO_nm9bi60mswaUQ', 0.13, 0.16),
(3, '917498322', '76561198072337501', 'teejthenerd5', 'MP9 | Orange Peel (Field-Tested)', '2industrial', 'D2D2D2', 0.06, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/8e/8e6002c5a791380873aebc9a7d6e1e3456b39eeb_full.jpg', '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6r8FBRw7OfJYTh94863moeOqPrxN7LEmyUJ6pJ33L-Xpd_03gHlrURvN270LNORJAM2aVjW-gC3yby905K0vpmb1zI97c4iLXaH', 0.16, 0.22);

-- --------------------------------------------------------

--
-- Table structure for table `z_round_2`
--

CREATE TABLE IF NOT EXISTS `z_round_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offerid` varchar(100) NOT NULL,
  `userid` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `item` text,
  `qualityclass` varchar(100) DEFAULT NULL,
  `color` text,
  `value` float DEFAULT NULL,
  `avatar` varchar(512) NOT NULL,
  `image` text NOT NULL,
  `from` float DEFAULT NULL,
  `to` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `z_round_2`
--

INSERT INTO `z_round_2` (`id`, `offerid`, `userid`, `username`, `item`, `qualityclass`, `color`, `value`, `avatar`, `image`, `from`, `to`) VALUES
(1, '917602863', '76561198042996771', 'meep', 'Sticker | Flipsid3 Tactics | Cluj-Napoca 2015', '1consumer', 'D2D2D2', 0.4, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3ed5e79e310770924a347ebea08e0c00ad31103e_full.jpg', '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulReQFnaFbT8goDVX1Rka1JV5Oj2eQNh0vXNcGlB6IWwwtLZzvGsN7nQxj0JsMQljLzF8Ynx21D6ux07rNsvAQs', 0, 0.4),
(2, '917626035', '76561198042996771', 'meep', 'StatTrak™ Swap Tool', '1consumer', 'D2D2D2', 0.11, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3ed5e79e310770924a347ebea08e0c00ad31103e_full.jpg', '-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXX7gNTPcUhvRpJWF7RTNu-wM7DbEl7KggZs--nLV4ygaDNJztE7ozgzNGIwqTyZ-6AlGpV7Jx10uiQotym2g3k_l0sPT6xjsLSww', 0.4, 0.51);

-- --------------------------------------------------------

--
-- Table structure for table `z_round_3`
--

CREATE TABLE IF NOT EXISTS `z_round_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offerid` varchar(100) NOT NULL,
  `userid` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `item` text,
  `qualityclass` varchar(100) DEFAULT NULL,
  `color` text,
  `value` float DEFAULT NULL,
  `avatar` varchar(512) NOT NULL,
  `image` text NOT NULL,
  `from` float DEFAULT NULL,
  `to` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
