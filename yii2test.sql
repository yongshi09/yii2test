-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-11 08:30:12
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2test`
--

-- --------------------------------------------------------

--
-- 表的结构 `yii_article`
--

CREATE TABLE IF NOT EXISTS `yii_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `description` varchar(150) NOT NULL DEFAULT '' COMMENT '简介',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '内容',
  `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `yii_article`
--

INSERT INTO `yii_article` (`id`, `title`, `description`, `content`, `count`, `status`, `update_time`) VALUES
(2, '测试22', '是的发送到', '是的发送到是的发送到', 5, 'Y', 1457594498),
(5, '科技部长谈围棋人机大战', '科技部长谈围棋人机大战：我还是喜欢人人对弈', '科技部长谈围棋人机大战：我还是喜欢人人对弈', 2, 'Y', 1457593863),
(3, '标题3', '标题3标题3标题3', '标题3', 4, 'Y', 1457588769),
(4, 'Yii介绍', 'Yii 是一个适用于开发 Web2.0 应用程序的高性能 PHP 框架', 'Yii 是一个适用于开发 Web2.0 应用程序的高性能 PHP 框架，Yii 是一个适用于开发 Web2.0 应用程序的高性能 PHP 框架', 1, 'Y', 1457588794),
(6, '人机大战人输了', '人机大战人输了', '人机大战人输了', 2, 'Y', 1457599245),
(7, '芬兰是否退出欧元区举行辩论', '芬兰议会将就是否退出欧元区举行辩论', '芬兰议会将就是否退出欧元区举行辩论', 3, 'Y', 1457662265),
(8, '业主迟迟不交物业费', ' 物业管理公司停水停电威胁', '业主迟迟不交物业费  物业管理公司停水停电威胁', 3, 'Y', 1457662435);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
