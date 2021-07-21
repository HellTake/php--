-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-07-21 09:27:42
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `acger`
--

-- --------------------------------------------------------

--
-- 表的结构 `acger`
--

CREATE TABLE `acger` (
  `Ids` int(3) NOT NULL,
  `fname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ftime` datetime NOT NULL,
  `friend` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ids1` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `liuyan` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `acger`
--

INSERT INTO `acger` (`Ids`, `fname`, `ftime`, `friend`, `Ids1`, `liuyan`) VALUES
(1, 'admin', '2020-12-08 07:46:24', NULL, '0', 'This is a test'),
(2, '郑泽田', '2020-12-08 07:46:44', NULL, '0', 'This is a test'),
(3, '郑泽田', '2020-12-08 07:46:48', 'admin', '1', 'This is a test'),
(4, '姜喆方', '2020-12-08 07:57:13', NULL, '0', '喵喵？'),
(12, 'admin', '2020-12-24 10:01:51', 'admin', '11', '242424'),
(13, 'admin', '2020-12-25 10:47:40', 'admin', '12', '1'),
(11, 'admin', '2020-12-24 09:50:16', 'admin', '10', '123'),
(5, 'admin', '2020-12-11 09:35:17', NULL, '0', 'admin'),
(6, 'admin', '2020-12-15 05:09:27', 'admin', '5', '1'),
(7, 'admin', '2020-12-15 05:09:40', 'admin', '6', '2'),
(8, 'admin', '2020-12-15 09:13:35', NULL, '0', '123123'),
(9, 'admin', '2020-12-24 08:59:31', 'admin', '8', '2323'),
(10, 'admin', '2020-12-24 08:59:36', 'admin', '9', '232323'),
(14, 'admin', '2020-12-25 10:47:51', 'admin', '13', '不讲武德'),
(15, 'admin', '2020-12-25 10:47:56', 'admin', '14', '不讲武德'),
(16, 'admin', '2020-12-25 10:48:02', NULL, '14', '耗子尾汁'),
(17, 'admin', '2020-12-25 10:48:07', NULL, '14', '耗子尾汁'),
(18, 'admin', '2020-12-25 10:48:13', NULL, '14', '耗子尾汁'),
(19, 'admin', '2020-12-25 10:48:21', NULL, '14', '耗子尾汁'),
(20, 'admin', '2020-12-25 10:48:31', NULL, '14', '不讲武德'),
(21, 'admin', '2020-12-25 10:48:40', NULL, '14', '小聪明'),
(22, 'admin', '2020-12-25 10:49:13', NULL, '14', '123'),
(23, 'admin', '2020-12-25 11:37:17', NULL, '0', 'alert(\\\'hello，gaga!\\\');'),
(24, 'admin', '2020-12-25 11:40:38', NULL, '0', '123'),
(25, 'admin', '2020-12-25 11:40:48', NULL, '0', 'alert(\\hello，gaga!\\);'),
(26, 'admin', '2020-12-25 11:49:24', NULL, '0', 'alert(\\\'hello，gaga!\\\');'),
(27, 'admin', '2020-12-25 11:49:28', NULL, '0', 'alert(\\\'hello，gaga!\\\');'),
(28, 'admin', '2020-12-25 11:49:31', NULL, '0', 'alert(\\\'hello，gaga!\\\');'),
(29, 'admin', '2020-12-25 11:49:34', NULL, '0', 'alert(\\\'hello，gaga!\\\');'),
(30, 'admin', '2020-12-25 11:49:37', NULL, '0', 'alert(\\\'hello，gaga!\\\');');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `fname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `liyou` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`fname`, `liyou`) VALUES
('姜喆方', '欺负垃圾？可怜弱小又无助。喵喵？'),
('姜喆方', '给个机会');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `fname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `power` int(1) NOT NULL,
  `fpassword` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`fname`, `power`, `fpassword`) VALUES
('admin', 1, '123456'),
('archer', 1, 'archer'),
('姜喆方', 1, '666666666'),
('郑泽田', 0, 'zzt~!123.01234');

--
-- 转储表的索引
--

--
-- 表的索引 `acger`
--
ALTER TABLE `acger`
  ADD UNIQUE KEY `Ids` (`Ids`,`fname`,`ftime`);

--
-- 表的索引 `message`
--
ALTER TABLE `message`
  ADD UNIQUE KEY `fname` (`fname`,`liyou`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `fname` (`fname`,`power`,`fpassword`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
