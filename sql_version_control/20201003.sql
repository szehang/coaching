-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hci`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bill`
--

CREATE TABLE `bill` (
  `tranId` int(255) NOT NULL,
  `courseId` varchar(255) DEFAULT NULL,
  `teacherId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `billDateNTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `courseinfo`
--

CREATE TABLE `courseinfo` (
  `courseId` int(255) NOT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseCategory` varchar(255) DEFAULT NULL,
  `courseContent` varchar(255) DEFAULT NULL,
  `courseFee` decimal(8,5) DEFAULT NULL,
  `createdBy` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `coursematerials`
--

CREATE TABLE `coursematerials` (
  `courseId` int(255) NOT NULL,
  `materialPath` varchar(260) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `courserecord`
--

CREATE TABLE `courserecord` (
  `courseId` int(255) NOT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `billDateNTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `withdraw` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpw` varchar(255) NOT NULL,
  `usertype` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`userid`, `username`, `userpw`, `usertype`) VALUES
(1, 'teacher', '123', 1),
(2, 'student', '123', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`tranId`);

--
-- 資料表索引 `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`courseId`);

--
-- 資料表索引 `coursematerials`
--
ALTER TABLE `coursematerials`
  ADD PRIMARY KEY (`courseId`);

--
-- 資料表索引 `courserecord`
--
ALTER TABLE `courserecord`
  ADD PRIMARY KEY (`courseId`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `bill`
--
ALTER TABLE `bill`
  MODIFY `tranId` int(255) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `courseinfo`
--
ALTER TABLE `courseinfo`
  MODIFY `courseId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
