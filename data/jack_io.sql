-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2023 at 02:59 PM
-- Server version: 8.0.12
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jack_io`
--

-- --------------------------------------------------------

--
-- Table structure for table `jack_article`
--

CREATE TABLE `jack_article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `pics` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `other` text,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-1',
  `nav_id` int(10) NOT NULL,
  `note` varchar(255) DEFAULT NULL COMMENT 'only yourself see',
  `hits` int(10) NOT NULL,
  `hot` int(1) DEFAULT NULL COMMENT '0-1',
  `recommend` int(1) DEFAULT NULL COMMENT '0-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jack_article`
--

INSERT INTO `jack_article` (`id`, `title`, `description`, `keywords`, `detail`, `pics`, `create_time`, `update_time`, `other`, `status`, `nav_id`, `note`, `hits`, `hot`, `recommend`) VALUES
(1, 'The use of intellectual property law is suspected of extorting many enterprises', 'Mituo has launched intensive claims against domestic infringing enterprises. The mode of \"not paying legal fees first, and after the claim is successful, ', '', '<p>Mituo has launched intensive claims against domestic infringing enterprises. The mode of &quot;not paying legal fees first, and after the claim is successful, the rights defenders and lawyers will share the compensation received&quot; is adopted. The main method of making profits is to generate income through rights protection, and even &quot;easily&quot; obtain it. The actions of Mito Company have used the copyright protection system as a tool to seek personal or corporate interests. Changsha Mituo is currently operating an &quot;infringement business&quot;.</p><p>----From Chinese Auth</p>', '/upload/image/20230524/646d69d74e722.jpg', NULL, 1684892119, '', 1, 5, '', 1011, 1, 1),
(3, 'this is second article', '1', '2', '<p>this is second article</p>', '', 1684142206, 1684741034, '4', 1, 6, NULL, 0, NULL, NULL),
(4, 'this ia test 1', 'this ia test 1this ia test 1this ia test 1this ia test 1', '', '<p>this ia test 1this ia test 1</p>', '', 1684805045, 1684825911, '', 1, 3, NULL, 83, 1, 1),
(5, 'Apple, Huawei, and Xiaomi were hit hard! Look at the six \"patent hooligans\" companies around the world!', 'Recently, Apple faced another patent lawsuit, which involved Uniloc, a well-known patent scam company. The patent involved a GPS based motion monitoring system with US patent number 6736759.', '', '<p>Recently, Apple faced another patent lawsuit, which involved Uniloc, a well-known patent scam company. The patent involved a GPS based motion monitoring system with US patent number 6736759.</p>', '', 1684818824, 1684818839, '', 1, 3, NULL, 100, 1, 0),
(6, 'Shanghai Zhuozhuo Network is starting to stir up trouble', '', '', '<p>Recently, the Shanghai Zhuozhuo Network Encounter Porcelain Water Army has been crazily attacking Chinese soldiers and the Dream Weaver Rights Protection Team. Have you had enough trouble with the Shanghai Zhuozhuo Network Encounter Porcelain Water Army? In response to this behavior, the Zhimeng Rights Protection Center has uniformly replied:\r\n\r\n\r\n\r\nFirstly, why did we file a case through the procuratorial organs? Our goal is very clear. Now it is not a simple problem to deal with Zhuo Zhuo, but rather that we demobilized soldiers must, through our efforts, send Chen Yizhen, Ma Huimin, Xiao Ding and others to prison to enjoy life。。。。</p><p>-----from shanghai，China ， author</p>', '', 1684819394, 1684819394, '', 1, 3, NULL, 100, 1, 1),
(7, 'Apple, Huawei, and Xiaomi were hit hard! Look at the six \"patent hooligans\" companies around the world!', 'Recently, Apple faced another patent lawsuit, which involved Uniloc, a well-known patent scam company. The patent involved a GPS based motion monitoring system with US patent number 6736759.', '', '<p>Recently, Apple faced another patent lawsuit, which involved Uniloc, a well-known patent scam company. The patent involved a GPS based motion monitoring system with US patent number 6736759.</p>', '', 1684818824, 1684818839, '', 1, 3, NULL, 100, 1, 0),
(8, 'Apple, Huawei, and Xiaomi were hit hard! Look at the six \"patent hooligans\" companies around the world!', 'Recently, Apple faced another patent lawsuit, which involved Uniloc, a well-known patent scam company. The patent involved a GPS based motion monitoring system with US patent number 6736759.', '', '<p>Recently, Apple faced another patent lawsuit, which involved Uniloc, a well-known patent scam company. The patent involved a GPS based motion monitoring system with US patent number 6736759.</p>', '', 1684818824, 1684818839, '', 1, 3, NULL, 100, 1, 0),
(9, 'The use of intellectual property law is suspected of extorting many enterprises', 'Mituo has launched intensive claims against domestic infringing enterprises. The mode of \"not paying legal fees first, and after the claim is successful, ', '', '<p>Mituo has launched intensive claims against domestic infringing enterprises. The mode of &quot;not paying legal fees first, and after the claim is successful, the rights defenders and lawyers will share the compensation received&quot; is adopted. The main method of making profits is to generate income through rights protection, and even &quot;easily&quot; obtain it. The actions of Mito Company have used the copyright protection system as a tool to seek personal or corporate interests. Changsha Mituo is currently operating an &quot;infringement business&quot;.</p><p>----From Chinese Auth</p>', '', NULL, 1684825891, '', 1, 5, '', 1007, 1, 1),
(10, 'The use of intellectual property law is suspected of extorting many enterprises', 'Mituo has launched intensive claims against domestic infringing enterprises. The mode of \"not paying legal fees first, and after the claim is successful, ', '', '<p>Mituo has launched intensive claims against domestic infringing enterprises. The mode of &quot;not paying legal fees first, and after the claim is successful, the rights defenders and lawyers will share the compensation received&quot; is adopted. The main method of making profits is to generate income through rights protection, and even &quot;easily&quot; obtain it. The actions of Mito Company have used the copyright protection system as a tool to seek personal or corporate interests. Changsha Mituo is currently operating an &quot;infringement business&quot;.</p><p>----From Chinese Auth</p>', '', NULL, 1684825891, '', 1, 5, '', 1007, 1, 1),
(11, 'The use of intellectual property law is suspected of extorting many enterprises', 'Mituo has launched intensive claims against domestic infringing enterprises. The mode of \"not paying legal fees first, and after the claim is successful, ', '', '<p>Mituo has launched intensive claims against domestic infringing enterprises. The mode of &quot;not paying legal fees first, and after the claim is successful, the rights defenders and lawyers will share the compensation received&quot; is adopted. The main method of making profits is to generate income through rights protection, and even &quot;easily&quot; obtain it. The actions of Mito Company have used the copyright protection system as a tool to seek personal or corporate interests. Changsha Mituo is currently operating an &quot;infringement business&quot;.</p><p>----From Chinese Auth</p>', '', NULL, 1684825891, '', 1, 5, '', 1007, 1, 1),
(12, 'this is new story', '', '', '<p>this is new story</p>', '', NULL, 1684906129, '', 1, 12, NULL, 100, 1, 1),
(13, 'this is new story--from:2@mail.com', NULL, NULL, 'this is new story', NULL, 1684906164, 1684906164, NULL, 0, 12, NULL, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jack_config`
--

CREATE TABLE `jack_config` (
  `id` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `value` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lang` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jack_config`
--

INSERT INTO `jack_config` (`id`, `name`, `value`, `lang`) VALUES
(1, 'website_name', 'You website name', NULL),
(2, 'website_logo', '/upload/image/20230523/646c7f20efd0d.jpg', NULL),
(3, 'website_seo', '{\"description\":\"The software is compact, flexible, simple and practical. Can be used for exposure platforms, blogs, article management, and enterprise products, supporting secondary development. Under the GPL agreement, you can also delete the copyright of the HTML page at will without any responsibility.\",\"keywords\":\"JackEDS,Exposure Platforms,jack blogs,jack article management, jack software\"}', NULL),
(4, 'website_email', 'jackeds007@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jack_lang`
--

CREATE TABLE `jack_lang` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `mark` varchar(10) NOT NULL COMMENT 'en,cn',
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '1 index'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jack_manage_user`
--

CREATE TABLE `jack_manage_user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `other` text,
  `status` int(1) DEFAULT NULL COMMENT '0-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jack_manage_user`
--

INSERT INTO `jack_manage_user` (`id`, `name`, `password`, `other`, `status`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1),
(7, 'admin88', '21232f297a57a5a743894a0e4a801fc3', '', 1),
(8, 'admin88', 'd41d8cd98f00b204e9800998ecf8427e', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jack_nav`
--

CREATE TABLE `jack_nav` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `other` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '1-0',
  `sort` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jack_nav`
--

INSERT INTO `jack_nav` (`id`, `name`, `description`, `keywords`, `other`, `create_time`, `update_time`, `parent_id`, `level`, `status`, `sort`) VALUES
(1, 'Chinese metinfo', 'from a china auther， They reported that it was a copyright rogue company', '2', '', NULL, NULL, 0, 1, 1, 0),
(2, 'American Malibu', '1', '2', '', NULL, NULL, 0, 1, 1, 100),
(3, 'Tuo Mou 2-0', '1', '2', NULL, NULL, NULL, 1, 2, 1, NULL),
(4, 'Tuo Mou 2-1', 'from a china auther， They reported that it was a copyright rogue company', '2', '', NULL, NULL, 1, 2, 1, 0),
(5, 'Tuo Mou 2-1-0', 'Tuo Mou 2-1-0 is from a china auther， They reported that it was a copyright rogue company', '2', '', NULL, NULL, 4, 3, 1, 0),
(6, 'Tuo Mou 2-1-1', 'from a china auther， They reported that it was a copyright rogue company', '2', '', NULL, NULL, 4, 3, 1, 0),
(7, 'Visual CN', '', '', '', 1684121322, 1684121322, 0, NULL, 1, 99),
(8, 'juice not on', '', '', '', 1684121375, 1684121375, 7, 1, 1, NULL),
(9, 'bei mou ye', '', '', '', 1684121517, 1684121517, 2, 2, 1, NULL),
(10, 'Deliberately provoke', '', '', '', 1684121539, 1684121539, 0, NULL, 1, NULL),
(11, 'tianta2', '', '', '', 1684121569, 1684121569, 10, 1, 1, NULL),
(12, 'America Rockstar', '', '', '', 1684121586, 1684121586, 0, NULL, 1, NULL),
(13, 'juice not on2', '', '', '', 1684121884, 1684121884, 7, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jack_set`
--

CREATE TABLE `jack_set` (
  `id` int(10) NOT NULL,
  `what` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `other` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jack_article`
--
ALTER TABLE `jack_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jack_config`
--
ALTER TABLE `jack_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jack_lang`
--
ALTER TABLE `jack_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jack_manage_user`
--
ALTER TABLE `jack_manage_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jack_nav`
--
ALTER TABLE `jack_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jack_set`
--
ALTER TABLE `jack_set`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jack_article`
--
ALTER TABLE `jack_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jack_config`
--
ALTER TABLE `jack_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jack_lang`
--
ALTER TABLE `jack_lang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jack_manage_user`
--
ALTER TABLE `jack_manage_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jack_nav`
--
ALTER TABLE `jack_nav`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jack_set`
--
ALTER TABLE `jack_set`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
