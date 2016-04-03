-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-03 05:41:11
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
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Items`
--

INSERT INTO `Items` (`item_id`, `item_name`, `item_category`, `image_url`, `price`) VALUES
(1, 'Daal vada', '0', 'http://www.manjulaskitchen.com/blog/wp-content/uploads/moong_dal_vada.jpg', 6.99),
(2, 'Hot And Sour Soup', '1', 'http://hdwallpaperbackgrounds.net/wp-content/uploads/2015/12/Chinese-Hot-And-Sour-Soup-Images.jpg', 7.02),
(3, 'Sprite', '2', 'http://www.qubekonstrukt.com/files/sprite1.jpg', 1.99),
(4, 'Coke', '2', 'http://www.nationofchange.org/2015/wp-content/uploads/coke1.jpg', 1.99),
(5, 'Nicoise', '4', 'http://a.ctimg.net/b5oDeMYnQtiyCXVjmFqsnw/nicoise-salad-recipe.jpg', 4.33),
(6, 'Meatball', '3', 'http://s3.amazonaws.com/yummy_uploads2/recipes/full/84.jpg', 10.22),
(7, 'Chicken Wings', '3', 'http://leanblitzconsulting.com/wp-content/uploads/2013/01/chicken-wings.jpg', 6.45),
(8, 'Chicken Curry', '3', 'http://cookdiary.net/wp-content/uploads/images/Indian-Chicken-Curry_6895.jpg', 11.33),
(9, 'Braised Chicken', '3', 'http://shandong.kaiwind.com/zblmsy1/201303/07/W020130307357635342713.jpg', 15.2),
(10, 'Horderves', '0', 'https://www.pixoto.com/images-photography/food-and-drink/plated-food/horderves-4810328852398080.jpg', 3.87),
(11, 'Potsticker', '0', 'https://img3.doubanio.com/lpic/s9112801.jpg', 4.54),
(12, 'Iced Tea', '2', 'https://i.ytimg.com/vi/3STk-HcfHjQ/maxresdefault.jpg', 2.33),
(13, 'Chicken Salad', '4', 'http://cookdiary.net/wp-content/uploads/images/Chinese-Chicken-Salad_17174.jpg', 5.66),
(14, 'Boiled Fish', '3', 'http://www.zuocai.tv/uploads/allimg/141216/1TRA516-2.jpg', 10.33),
(15, 'Tomato Soup', '1', 'http://ksmartstatic.sify.com/cmf-1.0.0/appflow/bawarchi.com/Image/oetamtfdhbgfe_bigger.jpg', 3.45),
(16, 'Red Lentil', '1', 'http://www.reneerogers.com/wp-content/uploads/2011/12/IMG_4216.jpg', 4.78),
(17, 'Lamb Curry', '3', 'http://foodal.com/wp-content/uploads/2015/02/Easy-Indian-Lamb-Curry-2.jpg', 12.33),
(18, 'Tomato & Corn', '4', 'http://4.bp.blogspot.com/--JcCmE5XLiY/VcUVsDaubiI/AAAAAAAAPtI/-FSgFJh-Pq0/s640/indian_tomato_corn_salad_2.jpg', 4.98),
(19, 'Creamy Mushroom Soup', '1', 'http://www.italianfoodforever.com/staging/wp-content/uploads/2012/02/mushroomsoup8.jpg', 8.76),
(20, 'Peking Duck', '3', 'http://s3-media4.fl.yelpcdn.com/bphoto/xgtO1y7GOQvdBIIqzjaHaA/o.jpg', 14.77);

-- --------------------------------------------------------

--
-- 表的结构 `MenuItemRelations`
--

CREATE TABLE `MenuItemRelations` (
  `menu_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `MenuItemRelations`
--

INSERT INTO `MenuItemRelations` (`menu_id`, `item_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 8),
(1, 10),
(2, 11),
(2, 2),
(2, 9),
(2, 3),
(2, 13),
(2, 14),
(1, 15),
(1, 16),
(3, 6),
(3, 5),
(3, 4),
(3, 7),
(3, 10),
(1, 18),
(1, 17),
(2, 20),
(3, 19);

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
(3, 'Max Geng', 'gengruoxi2013@gmail.com', 'b72a2aaf406bf8480387c1a083042235', '99f25c0b', '0', 1),
(4, 'Christopher', 'christopher@gmail.com', '132da6a39a50a6690db3759fac76b786', '5ad4b9da', '0', 1);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `Menus`
--
ALTER TABLE `Menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
