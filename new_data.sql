-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2017 at 02:26 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caturjayaatap`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pagar', '2017-05-08 00:00:00', '2017-05-08 15:39:34'),
(2, 'pintu', '2017-05-08 00:00:00', '2017-05-08 15:39:34'),
(3, 'kanal', '2017-05-22 10:05:12', '2017-05-22 15:43:12'),
(4, 'reng', '2017-06-03 06:47:03', '2017-06-02 23:47:03'),
(5, 'hollow', '2017-06-03 06:47:03', '2017-06-02 23:47:03'),
(6, 'wall angel', '2017-06-03 06:47:43', '2017-06-02 23:47:43'),
(7, 'atap', '2017-06-03 06:47:43', '2017-06-02 23:47:43'),
(8, 'tiang', '2017-06-03 06:47:49', '2017-06-02 23:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filename` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `alt` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `filename`, `alt`, `created_at`) VALUES
(1, 1, 'b3aa1e0f71f424b3edf968166cd24b2f.jpg', 'pagar', '2017-06-05 01:54:02'),
(2, 2, '336218615926805864f382c47ff0ab51.jpg', 'pintu', '2017-06-05 01:54:02'),
(4, 4, '4348e36f712cf192b340899cb5be68d7.jpg', 'hollow', '2017-06-05 01:58:24'),
(5, 7, 'b856a6182629cd460f771fb243a58fe4.jpg', 'atap', '2017-06-05 01:58:24'),
(6, 8, '67bdffbaa09ad2d43206e25face3e639.jpg', 'tiang', '2017-06-05 01:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `per` varchar(15) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `per`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 260000, 'lembar', 3, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(6, 305000, 'lembar', 3, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(12, 67800, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(13, 61400, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(14, 32100, 'lembar', 12, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(15, 33200, 'lembar', 12, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(16, 32000, 'lembar', 13, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(17, 27000, 'lembar', 13, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(22, 65000, 'lembar', 16, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(23, 68000, 'lembar', 16, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(27, 540000, 'lembar', 3, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(28, 325000, 'lembar', 3, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(29, 495000, 'lembar', 3, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(30, 71200, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(31, 75200, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(32, 69000, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(33, 77200, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(34, 79900, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(35, 86500, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(36, 81700, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(37, 85100, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(38, 88500, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(39, 97200, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(40, 85000, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(41, 96800, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(42, 99800, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(43, 108500, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(44, 91000, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(45, 104800, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(46, 112500, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(47, 118500, 'batang', 9, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(48, 195000, 'lembar', 19, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(49, 240000, 'lembar', 19, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(50, 270000, 'lembar', 19, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(51, 415000, 'lembar', 19, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(52, 435000, 'lembar', 19, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(53, 77500, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(54, 81900, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(55, 84800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(56, 89800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(57, 87100, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(58, 93900, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(59, 95000, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(60, 101800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(61, 95800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(62, 102600, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(63, 106500, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(64, 112500, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(65, 103800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(66, 113500, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(67, 119800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(68, 126500, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(69, 112500, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(70, 122900, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(71, 129800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(72, 137800, 'batang', 18, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(73, 72800, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(74, 78700, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(75, 80000, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(76, 89500, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(77, 81800, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(78, 89200, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(79, 99000, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(80, 103200, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(81, 89100, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(82, 97900, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(83, 105500, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(84, 114600, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(85, 99900, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(86, 110200, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(87, 114800, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(88, 128600, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(89, 108500, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(90, 119000, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(91, 128200, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51'),
(92, 139400, 'batang', 20, '2017-06-04 21:57:51', '2017-06-04 14:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(300) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `featured`, `hide`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Pagar Hotdip', '', 0, 0, 1, '2017-05-08 00:00:00', '2017-06-03 01:33:54'),
(9, 'Tiang Galvanize - 1.5in', '', 0, 0, 1, '2017-05-13 00:00:00', '2017-06-03 01:19:29'),
(12, 'Reng', '', 1, 0, 4, '2017-05-13 00:00:00', '2017-06-03 03:14:34'),
(13, 'Atap Galvalum CJA - 75', '', 1, 0, 7, '2017-05-13 00:00:00', '2017-06-03 03:17:16'),
(16, 'Kanal C-75', '', 1, 0, 3, '2017-05-17 05:05:23', '2017-06-02 23:59:45'),
(18, 'Tiang Galvanize - 2in', '', 0, 0, 8, '2017-06-03 08:22:17', '2017-06-03 01:22:17'),
(19, 'Pagar Galvanize', '', 0, 0, 1, '2017-06-03 08:34:24', '2017-06-03 01:34:24'),
(20, 'Tiang Hotdip - 1.5in', '', 0, 0, 8, '2017-06-03 10:10:48', '2017-06-03 03:10:48'),
(21, 'Tiang Hotdip - 2in', '', 0, 0, 8, '2017-06-03 10:10:48', '2017-06-03 03:16:01'),
(22, 'Pintu Swing Tunggal - Hotdip', '', 0, 0, 2, '2017-06-03 10:11:50', '2017-06-03 03:11:50'),
(23, 'Pintu Swing Ganda - Hotdip', '', 0, 0, 2, '2017-06-03 10:11:50', '2017-06-03 03:11:50'),
(24, 'Pintu Swing Ganda Lebar - Hotdip', '', 0, 0, 2, '2017-06-03 10:12:24', '2017-06-03 03:12:24'),
(25, 'Pintu Dorong - Hotdip', '', 0, 0, 2, '2017-06-03 10:12:24', '2017-06-03 03:12:24'),
(26, 'Pintu Swing Tunggal - Galvanize', '', 0, 0, 2, '2017-06-03 10:12:59', '2017-06-03 03:12:59'),
(27, 'Pintu Swing Ganda - Galvanize', '', 0, 0, 2, '2017-06-03 10:12:59', '2017-06-03 03:12:59'),
(28, 'Pintu Swing Ganda Lebar - Galvanize', '', 0, 0, 2, '2017-06-03 10:13:46', '2017-06-03 03:13:46'),
(29, 'Pintu Dorong - Galvanize', '', 0, 0, 2, '2017-06-03 10:13:46', '2017-06-03 03:13:46'),
(30, 'Hollow 2 X 4B', '', 0, 0, 5, '2017-06-03 10:15:24', '2017-06-03 03:15:24'),
(31, 'Hollow Mini', '', 0, 0, 5, '2017-06-03 10:15:24', '2017-06-03 03:15:24'),
(32, 'Hollow 4 X 4', '', 0, 0, 5, '2017-06-03 10:16:17', '2017-06-03 03:16:17'),
(33, 'Wall Angel', '', 0, 0, 6, '2017-06-03 10:16:17', '2017-06-03 03:16:17'),
(34, 'Atap Galvalum CJA - 100', '', 0, 0, 7, '2017-06-03 10:17:28', '2017-06-03 03:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `measurement` float NOT NULL,
  `unit` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `name`, `measurement`, `unit`, `price_id`, `created_at`, `updated_at`) VALUES
(5, 'lebar', 120, 'cm', 5, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(6, 'panjang', 240, 'cm', 5, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(7, 'lebar', 90, 'cm', 6, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(8, 'panjang', 240, 'cm', 6, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(44, 'tebal', 1.4, 'mm', 13, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(45, 'tinggi', 120, 'cm', 12, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(46, 'tebal', 1.2, 'mm', 12, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(47, 'tinggi', 120, 'cm', 13, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(48, 'panjang', 6, 'm', 14, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(49, 'panjang', 6, 'm', 15, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(50, 'tebal', 0.4, 'mm', 15, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(51, 'tebal', 0.35, 'mm', 14, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(52, 'lebar', 75, 'cm', 16, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(53, 'tebal', 0.25, 'cm', 16, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(54, 'tebal', 0.2, 'cm', 17, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(55, 'lebar', 75, 'cm', 17, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(64, 'tebal', 0.7, 'in', 22, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(65, 'panjang', 6, 'in', 22, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(66, 'tebal', 0.73, 'in', 23, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(67, 'panjang', 6, 'in', 23, '2017-06-04 21:57:12', '2017-06-04 15:18:23'),
(68, 'panjang', 240, 'cm', 27, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(69, 'lebar', 190, 'cm', 27, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(70, 'panjang', 240, 'cm', 28, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(71, 'lebar', 150, 'cm', 28, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(72, 'panjang', 240, 'cm', 29, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(73, 'lebar', 175, 'cm', 29, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(74, 'tinggi', 120, 'cm', 30, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(75, 'tebal', 1.6, 'mm', 30, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(76, 'tinggi', 120, 'cm', 31, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(77, 'tebal', 1.8, 'mm', 31, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(78, 'tinggi', 150, 'cm', 32, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(79, 'tebal', 1.2, 'mm', 32, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(80, 'tinggi', 150, 'cm', 33, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(81, 'tebal', 1.4, 'mm', 33, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(82, 'tinggi', 150, 'cm', 34, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(83, 'tebal', 1.6, 'mm', 34, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(84, 'tinggi', 150, 'cm', 35, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(85, 'tebal', 1.8, 'mm', 35, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(86, 'tinggi', 175, 'cm', 36, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(87, 'tebal', 1.2, 'mm', 36, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(88, 'tinggi', 175, 'cm', 37, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(89, 'tebal', 1.4, 'mm', 37, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(90, 'tinggi', 175, 'cm', 38, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(91, 'tebal', 1.6, 'mm', 38, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(92, 'tinggi', 175, 'cm', 39, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(93, 'tebal', 1.8, 'mm', 39, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(94, 'tinggi', 200, 'cm', 40, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(95, 'tebal', 1.2, 'mm', 40, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(96, 'tinggi', 200, 'cm', 41, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(97, 'tebal', 1.4, 'mm', 41, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(98, 'tinggi', 200, 'cm', 42, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(99, 'tebal', 1.6, 'mm', 42, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(100, 'tinggi', 200, 'cm', 43, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(101, 'tebal', 1.8, 'mm', 43, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(102, 'tinggi', 225, 'cm', 44, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(103, 'tinggi', 1.2, 'mm', 44, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(104, 'tinggi', 225, 'cm', 45, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(105, 'tebal', 1.4, 'mm', 45, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(106, 'tinggi', 225, 'cm', 46, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(107, 'tebal', 1.6, 'mm', 46, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(108, 'tinggi', 225, 'cm', 47, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(109, 'tebal', 1.8, 'mm', 47, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(110, 'panjang', 240, 'cm', 48, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(111, 'lebar', 90, 'cm', 48, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(112, 'panjang', 240, 'cm', 49, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(113, 'lebar', 120, 'cm', 49, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(114, 'panjang', 240, 'cm', 50, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(115, 'lebar', 150, 'cm', 50, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(116, 'panjang', 240, 'cm', 51, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(117, 'lebar', 175, 'cm', 51, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(118, 'panjang', 240, 'cm', 52, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(119, 'lebar', 190, 'cm', 52, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(120, 'tinggi', 120, 'cm', 53, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(121, 'tebal', 1.2, 'mm', 53, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(122, 'tinggi', 120, 'cm', 54, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(123, 'tebal', 1.4, 'mm', 54, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(124, 'tinggi', 120, 'cm', 55, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(125, 'tebal', 1.6, 'mm', 55, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(126, 'tinggi', 120, 'cm', 56, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(127, 'tebal', 1.8, 'mm', 56, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(128, 'tinggi', 150, 'cm', 57, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(129, 'tebal', 1.2, 'mm', 57, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(130, 'tinggi', 150, 'cm', 58, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(131, 'tebal', 1.4, 'mm', 58, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(132, 'tinggi', 150, 'cm', 59, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(133, 'tebal', 1.6, 'mm', 59, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(134, 'tinggi', 150, 'cm', 60, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(135, 'tebal', 1.8, 'mm', 60, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(136, 'panjang', 175, 'cm', 61, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(137, 'tinggi', 1.2, 'mm', 61, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(138, 'tinggi', 175, 'cm', 62, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(139, 'tebal', 1.4, 'mm', 62, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(140, 'tinggi', 175, 'cm', 63, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(141, 'tebal', 1.6, 'mm', 63, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(142, 'tinggi', 175, 'cm', 64, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(143, 'tebal', 1.8, 'mm', 64, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(144, 'tinggi', 200, 'cm', 65, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(145, 'tebal', 1.2, 'mm', 65, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(146, 'tinggi', 200, 'cm', 66, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(147, 'tebal', 1.4, 'mm', 66, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(148, 'tinggi', 200, 'cm', 67, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(149, 'tebal', 1.6, 'mm', 67, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(150, 'tinggi', 200, 'cm', 68, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(151, 'tebal', 1.8, 'mm', 68, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(152, 'tinggi', 225, 'cm', 69, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(153, 'tebal', 1.2, 'mm', 69, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(154, 'tinggi', 225, 'cm', 70, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(155, 'tebal', 1.4, 'mm', 70, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(156, 'tinggi', 225, 'cm', 71, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(157, 'tebal', 1.6, 'mm', 71, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(158, 'tinggi', 225, 'cm', 72, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(159, 'tebal', 1.8, 'mm', 72, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(160, 'tinggi', 120, 'cm', 73, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(161, 'tebal', 1.2, 'mm', 73, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(162, 'tinggi', 120, 'cm', 74, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(163, 'tebal', 1.4, 'mm', 74, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(164, 'tinggi', 120, 'cm', 75, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(165, 'tebal', 1.6, 'mm', 75, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(166, 'tinggi', 120, 'cm', 76, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(167, 'tebal', 1.8, 'mm', 76, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(168, 'tinggi', 150, 'cm', 77, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(169, 'tebal', 1.2, 'mm', 77, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(170, 'tinggi', 150, 'cm', 78, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(171, 'tebal', 1.4, 'mm', 78, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(172, 'tinggi', 150, 'cm', 79, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(173, 'tebal', 1.6, 'mm', 79, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(174, 'tinggi', 150, 'cm', 80, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(175, 'tebal', 1.8, 'mm', 80, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(176, 'tinggi', 175, 'cm', 81, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(177, 'tebal', 1.2, 'mm', 81, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(178, 'tinggi', 175, 'cm', 82, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(179, 'tebal', 1.4, 'mm', 82, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(180, 'tinggi', 175, 'cm', 83, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(181, 'tebal', 1.6, 'mm', 83, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(182, 'tinggi', 175, 'cm', 84, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(183, 'tebal', 1.8, 'mm', 84, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(184, 'tinggi', 200, 'cm', 85, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(185, 'tebal', 1.2, 'mm', 85, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(186, 'tinggi', 200, 'cm', 86, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(187, 'tebal', 1.4, 'mm', 86, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(188, 'tinggi', 200, 'cm', 87, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(189, 'tebal', 1.6, 'mm', 87, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(190, 'tinggi', 200, 'cm', 88, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(191, 'tebal', 1.8, 'mm', 88, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(192, 'tinggi', 225, 'cm', 89, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(193, 'tebal', 1.2, 'mm', 89, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(194, 'tinggi', 225, 'cm', 90, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(195, 'tebal', 1.4, 'mm', 90, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(196, 'tinggi', 225, 'cm', 91, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(197, 'tebal', 1.6, 'mm', 91, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(198, 'tinggi', 225, 'cm', 92, '2017-06-04 21:57:12', '2017-06-04 14:57:12'),
(199, 'tebal', 1.8, 'mm', 92, '2017-06-04 21:57:12', '2017-06-04 14:57:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_id` (`price_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
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
-- Constraints for table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_ibfk_1` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;