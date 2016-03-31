-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-31 19:19:04
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FastEatDB`
--

-- --------------------------------------------------------

--
-- 表的结构 `Items`
--

CREATE TABLE `Items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `image_url` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `MenuItemRelations`
--

CREATE TABLE `MenuItemRelations` (
  `menu_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Menus`
--

CREATE TABLE `Menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `menu_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Menus`
--

INSERT INTO `Menus` (`menu_id`, `menu_name`, `image_url`, `menu_description`) VALUES
(1, 'Indian', 'http://www.missindia.menu/wp-content/uploads/2014/10/home-panel-11-1.jpg', 'Indian cuisine encompasses a wide variety of regional cuisines native to India. Given the range of diversity in soil type, climate, culture, ethnic group and occupations, these cuisines vary significantly from each other and use locally available spices, '),
(2, 'Chinese', 'http://www.minzulvyou.com/upload/201301/51024dd60f6387991.JPG', 'Chinese cuisine includes styles originating from the diverse regions of China, as well as from Chinese people in other parts of the world including most Asia nations. The history of Chinese cuisine in China stretches back for thousands of years and has ch'),
(3, 'Italian', 'http://www.delspizzeria.com/images/4000b.jpg', 'Italian cuisine is characterized by its simplicity, with many dishes having only four to eight ingredients. Italian cooks rely chiefly on the quality of the ingredients rather than on elaborate preparation. Ingredients and dishes vary by region. Many dish');

-- --------------------------------------------------------

--
-- 表的结构 `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `user_type` enum('0','1') NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Users`
--

INSERT INTO `Users` (`user_id`, `user_name`, `email`, `password`, `salt`, `user_type`, `enabled`) VALUES
(1, 'JiamingDong', 'jiamingd@uchicago.edu', '0727cfa7084949f25a3b145a1fca7176', '073bf74f', '0', 1),
(2, 'Weihuang', 'weihuang@gmail.com', 'be3be7067f455f8edc9cda8bff77bc88', '9c4f7dc1', '1', 1),
(3, 'Max Geng', 'gengruoxi2013@gmail.com', 'b72a2aaf406bf8480387c1a083042235', '99f25c0b', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `MenuItemRelations`
--
ALTER TABLE `MenuItemRelations`
  ADD KEY `to_menu` (`menu_id`),
  ADD KEY `to_item` (`item_id`);

--
-- Indexes for table `Menus`
--
ALTER TABLE `Menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `Items`
--
ALTER TABLE `Items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `Menus`
--
ALTER TABLE `Menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 限制导出的表
--

--
-- 限制表 `MenuItemRelations`
--
ALTER TABLE `MenuItemRelations`
  ADD CONSTRAINT `item_constraint` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`),
  ADD CONSTRAINT `menu_constraint` FOREIGN KEY (`menu_id`) REFERENCES `Menus` (`menu_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
