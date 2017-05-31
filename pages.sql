-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2017 at 06:05 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
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
(2, 'about', 'About Us', '"Semangat dan kerja keras adalah motto kami"', 'Kami CV Catur Jaya Atap sadar benar tidak mungkin kesuksesan dapat di capai tanpa kerja keras oleh sebab itu kami akan selalu berusaha untuk meningkatkan kualitas produk dan pelayanan pada customer kami, karena kami sadar bahwa tanpa pelayanan yang baik kepada customer perusahaan kami tidak akan tumbuh menjadi lebih besar.', '2017-04-27 00:00:00', '2017-05-31 10:39:17'),
(3, 'contact', 'Contact Us', 'summary contact us', 'content contact us', '2017-04-27 00:00:00', '2017-04-27 13:19:12'),
(4, 'products', 'Product', 'summary product', 'content product', '2017-04-27 00:00:00', '2017-04-27 13:19:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
