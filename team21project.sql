-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-16 14:48:39
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `team21project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `characterinfo`
--

CREATE TABLE `characterinfo` (
  `characterId` varchar(255) NOT NULL,
  `characterName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phrase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `characterinfo`
--

INSERT INTO `characterinfo` (`characterId`, `characterName`, `gender`, `phrase`) VALUES
('', '', '', ''),
('001', 'Peter', 'boy', 'WRYYYYYYYYYYYYY'),
('002', 'Bob', 'boy', 'MUDAAAAAAAAAAAAAAA!'),
('003', 'Jack', 'boy', 'RERORERO'),
('004', 'Anna', 'girl', 'WryOOwuweda');

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `playerId` varchar(255) NOT NULL,
  `itemId` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemType` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `itembag`
--

CREATE TABLE `itembag` (
  `playerId` varchar(255) NOT NULL,
  `ItemId` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `place`
--

CREATE TABLE `place` (
  `placeId` varchar(255) NOT NULL,
  `placeName` varchar(255) NOT NULL,
  `placeType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `playerId` varchar(255) NOT NULL,
  `playerName` varchar(255) NOT NULL,
  `characterId` varchar(255) NOT NULL,
  `placeId` varchar(255) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`playerId`, `playerName`, `characterId`, `placeId`, `money`) VALUES
('002', 'Peter', '001', '01', 1000000);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `characterinfo`
--
ALTER TABLE `characterinfo`
  ADD PRIMARY KEY (`characterId`),
  ADD KEY `characterId` (`characterId`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `playerId` (`playerId`);

--
-- 資料表索引 `itembag`
--
ALTER TABLE `itembag`
  ADD PRIMARY KEY (`playerId`,`ItemId`,`number`),
  ADD KEY `playerId` (`playerId`);

--
-- 資料表索引 `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeId`),
  ADD KEY `placeId` (`placeId`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`playerId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
