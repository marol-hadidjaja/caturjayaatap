-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2017 at 07:12 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1-log
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caturjayaatap`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pagar', '2017-05-08 00:00:00', '2017-05-08 15:39:34'),
(2, 'pintu', '2017-05-08 00:00:00', '2017-05-08 15:39:34'),
(3, 'kanal', '2017-05-22 10:05:12', '2017-05-22 15:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `summary` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` varchar(3000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `title`, `summary`, `content`, `created_at`, `updated_at`) VALUES
(1, '', 'Home', 'summary home', 'content home', '2017-04-27 00:00:00', '2017-04-27 15:15:51'),
(2, 'about', 'About Us', 'summary about us', 'content about us', '2017-04-27 00:00:00', '2017-04-27 13:18:19'),
(3, 'contact', 'Contact Us', 'summary contact us', 'content contact us', '2017-04-27 00:00:00', '2017-04-27 13:19:12'),
(4, 'products', 'Product', 'summary product', 'content product', '2017-04-27 00:00:00', '2017-04-27 13:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `per` varchar(15) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `per`, `product_id`) VALUES
(5, 241000, 'lembar', 3),
(6, 196000, 'lembar', 3),
(12, 67800, 'batang', 9),
(13, 61400, 'batang', 9),
(14, 32100, 'lembar', 12),
(15, 33200, 'lembar', 12),
(16, 32000, 'lembar', 13),
(17, 27000, 'lembar', 13),
(22, 65000, 'lembar', 16),
(23, 68000, 'lembar', 16);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(300) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `featured`, `hide`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'pagar galvanize-- edit', '', 0, 0, 1, '2017-05-08 00:00:00', '2017-05-08 16:49:39'),
(9, 'tiang galvanize', '', 0, 0, 1, '2017-05-13 00:00:00', '2017-05-12 17:11:13'),
(12, 'Reng', '', 0, 0, 1, '2017-05-13 00:00:00', '2017-05-12 18:08:21'),
(13, 'atap cja - 75', 'description atap cja-75', 0, 0, 1, '2017-05-13 00:00:00', '2017-05-28 21:49:34'),
(16, 'Kanal C-75', 'description kanal', 0, 0, 3, '2017-05-17 05:05:23', '2017-05-28 21:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `filename`, `alt`, `created_at`) VALUES
(13, 13, '889d55611ac59579e61a4688534218a8.jpg', 'atap_galvalum_(1)', '2017-05-18 10:05:56'),
(14, 13, '84478ca65dd1791ee7e0c98c96d7a8ff.jpg', 'atap_galvalum_(2)', '2017-05-18 10:05:56'),
(15, 13, '35f9ae5309dc22a3f922ae17ea55dc0e.jpg', 'atap_galvalum_(3)', '2017-05-18 10:05:56'),
(19, 9, 'a90dada17e280a149c41c0f99209e6d1.jpg', 'tiang_(1)', '2017-05-18 10:05:38'),
(20, 9, '6b2fa3d8e7475546e1449edc41c3eb57.jpg', 'tiang_(2)', '2017-05-18 10:05:38'),
(21, 9, '8999723533bdab612a9193f153232a8e.jpg', 'tiang_(3)', '2017-05-18 10:05:38'),
(24, 16, '8632114b0329d16205730dddb26c1a42.jpg', 'kanal-c_(3)', '2017-05-18 11:05:56'),
(25, 16, 'd64deceab2daa156fefb89bbd984e9c6.jpg', 'kanal-c_(1)', '2017-05-18 11:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `office_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `office_phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `workshop_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `workshop_phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`office_address`, `office_phone`, `workshop_address`, `workshop_phone`, `email`) VALUES
('Kav. Industri Desa Bogem\r\nRT 03 RW 01 Desa Kebon Agung\r\nSukodono, Sidoarjo -- edit', '', 'Jl. Putra Bangsa\r\nDesa Anggaswangi RT 01 RT 01 No 1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filename` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `filename`, `description`, `created_at`, `updated_at`) VALUES
(3, 'first', 'da33602163f496739bfb067f99a40a0b.jpg', 'first descdddddd', '2017-05-26 09:05:16', '2017-05-26 15:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE IF NOT EXISTS `specifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `measurement` float NOT NULL,
  `unit` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `price_id` (`price_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `name`, `measurement`, `unit`, `price_id`) VALUES
(5, 'lebar', 120, 'cm', 5),
(6, 'panjang', 240, 'in', 5),
(7, 'lebar', 90, 'cm', 6),
(8, 'panjang', 240, 'cm', 6),
(13, 'tebal', 11, 'in', 5),
(17, 'tebal', 11, 'in', 6),
(44, 'tebal', 1.4, 'mm', 13),
(45, 'tinggi', 120, 'cm', 12),
(46, 'tebal', 1.2, 'mm', 12),
(47, 'tinggi', 120, 'cm', 13),
(48, 'panjang', 6, 'm', 14),
(49, 'panjang', 6, 'm', 15),
(50, 'tebal', 0.4, 'mm', 15),
(51, 'tebal', 0.35, 'mm', 14),
(52, 'lebar', 75, 'cm', 16),
(53, 'tebal', 0.25, 'cm', 16),
(54, 'tebal', 0.2, 'cm', 17),
(55, 'lebar', 75, 'cm', 17),
(64, 'tebal', 0.7, 'mm', 22),
(65, 'panjang', 6, 'm', 22),
(66, 'tebal', 0.73, 'mm', 23),
(67, 'panjang', 6, 'm', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$zOdvJVQE22qdKES.73XvcOvOQprBTnCSLWNNBDoMBDUkiVbRPO576', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1496066299, 1, 'Admin', 'istrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_ibfk_1` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
