-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 16, 2023 at 05:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seoulmates`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(33, 19, 15, 3, '2023-01-23 10:48:10'),
(34, 19, 16, 1, '2023-01-23 10:48:21'),
(37, 19, 18, 1, '2023-01-23 11:02:27'),
(38, 19, 20, 1, '2023-01-23 14:17:57'),
(39, 19, 14, 1, '2023-01-23 14:21:19'),
(40, 19, 17, 1, '2023-01-23 14:23:27'),
(49, 23, 15, 1, '2023-03-21 09:28:18'),
(50, 26, 22, 1, '2023-03-24 15:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(191) NOT NULL,
  `category_image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_image`, `created_at`) VALUES
(13, 'STRAY KIDS', '1674467061.jpg', '2023-01-23 09:44:21'),
(14, 'EXO', '1674467074.jpg', '2023-01-23 09:44:34'),
(15, 'T-ARA', '1674467097.jpg', '2023-01-23 09:44:57'),
(17, 'BLACKPINK', '1674649451.jpg', '2023-01-25 12:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_id` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_id`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `created_at`) VALUES
(1, 'seoulmates5155', 1, '123', '123@gmail.com', '123', '123', 123, 38, 'COD', '', 1, '2022-12-24 04:53:47'),
(2, 'seoulmates8004', 1, '123', '123@gmail.com', '123', '123', 123, 38, 'COD', '', 1, '2022-12-24 04:54:58'),
(3, 'seoulmates5739', 1, '123', '123@gmail.com', '23', '123', 123, 38, 'COD', '', 0, '2022-12-24 04:55:41'),
(4, 'seoulmates5243', 1, '123', '123@gmail.com', '123', '123', 123, 38, 'COD', '', 0, '2022-12-24 04:56:23'),
(5, 'seoulmates7095', 1, '123', '123@gmail.com', '123', '123', 123, 38, 'COD', '', 0, '2022-12-24 04:57:43'),
(6, 'seoulmates8574', 1, '123', '123@gmail.com', 'ws', '123', 123, 38, 'COD', '', 0, '2022-12-24 04:59:18'),
(7, 'seoulmates7048', 1, 'asfd', 'asdf@gmail.com', '123', 'asdf', 0, 38, 'COD', '', 0, '2022-12-24 05:00:46'),
(8, 'seoulmates1336', 1, 'asfd', 'asdf@gmail.com', '123', 'asdf', 0, 38, 'COD', '', 0, '2022-12-24 05:01:04'),
(9, 'seoulmates2958', 1, 'asfd', 'asdf@gmail.com', '123', 'asdf', 0, 38, 'COD', '', 0, '2022-12-24 05:01:13'),
(10, 'seoulmates4931', 1, 'asfd', 'asdf@gmail.com', '123', 'asdf', 0, 38, 'COD', '', 0, '2022-12-24 05:01:29'),
(11, 'seoulmates2474', 1, '123', '123@gmail.com', 'asdf', '123', 123, 34, 'COD', '', 0, '2022-12-24 05:04:49'),
(12, 'seoulmates8791', 1, '123', '123@gmail.com', '123', '123', 123, 4, 'COD', '', 0, '2022-12-24 05:28:07'),
(13, 'seoulmates8525', 1, '123123', 'asd@gmail.com', '123', '123', 123, 15, 'Paid by PayPal', '48V765192K593674R', 0, '2022-12-25 18:31:00'),
(14, 'seoulmates2882', 1, '123', '123@gmail.com', '123', '123', 123, 4, 'Paid by PayPal', '3KJ14963L2698383C', 0, '2022-12-25 18:34:18'),
(15, 'seoulmates4925', 5, 'Kaycee Bulante', 'kaycee123@gmail.com', '0900909', '123456', 1234, 30, 'COD', '', 1, '2022-12-28 03:42:32'),
(16, 'seoulmates4347', 5, 'Kaycee Bulante', 'kaycee123@gmail.com', '0900909', '123456', 1234, 49380, 'Paid by PayPal', '9M9694496F8264235', 0, '2022-12-28 03:48:00'),
(17, 'seoulmates5463', 19, 'Kaycee Bulante', '12@gmail.com2', '9753977578', '97 Sta Isabel, Kawit, Cavite', 4104, 1000, 'COD', '', 0, '2023-01-23 10:00:57'),
(18, 'seoulmates2812', 19, 'Kaycee Bulante', '12@gmail.com2', '9753977578', '97 Sta Isabel, Kawit, Cavite', 4104, 750, 'COD', '', 0, '2023-01-23 10:03:01'),
(19, 'seoulmates7077', 19, 'Kaycee Bulante', '12@gmail.com2', '9753977578', '97 Sta Isabel, Kawit, Cavite', 4104, 750, 'Paid by PayPal', '5NK56158X0874425X', 0, '2023-01-23 10:12:46'),
(20, 'seoulmates1777', 19, 'Kaycee Bulante', '12@gmail.com2', '9753977578', '97 Sta Isabel, Kawit, Cavite', 4104, 750, 'COD', '', 0, '2023-01-23 10:15:41'),
(21, 'seoulmates1382', 19, 'Kaycee Bulante', '12@gmail.com2', '9753977578', '97 Sta Isabel, Kawit, Cavite', 4104, 1000, 'Paid by PayPal', '3CK04486TW048324K', 0, '2023-01-23 10:16:30'),
(22, 'seoulmates7149', 20, 'Kaycee D. Bulante', 'kayceeb@gmail.com', '09123456789', 'Kawit, Cavite', 123, 750, 'COD', '', 0, '2023-01-25 11:40:46'),
(23, 'seoulmates7686', 20, 'Kaycee D. Bulante', 'kayceeb@gmail.com', '09123456789', 'Kawit, Cavite', 123, 750, 'Paid by PayPal', '918001230V381723N', 0, '2023-01-25 11:41:50'),
(24, 'seoulmates5342', 21, 'Kate Escotido', 'kateescotido@gmail.com', '09123456789', 'Marikina', 4104, 1000, 'COD', '', 0, '2023-01-25 11:49:10'),
(25, 'seoulmates4531', 21, 'Kate Escotido', 'kateescotido@gmail.com', '09123456789', 'Marikina', 4104, 1500, 'Paid by PayPal', '42L38718SM0580749', 1, '2023-01-25 11:51:32'),
(26, 'seoulmates4668', 22, 'Kate Escotido', 'kateescotido1@gmail.com', '09123456789', 'Marikina', 4104, 1500, 'COD', '', 0, '2023-01-25 12:18:03'),
(27, 'seoulmates2900', 22, 'Kate Escotido', 'kateescotido1@gmail.com', '09123456789', 'Marikina', 4104, 3040, 'Paid by PayPal', '83K32814T3629315N', 1, '2023-01-25 12:19:54'),
(28, 'seoulmates3164', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'Paid by PayPal', '5D818323WK555024R', 0, '2023-04-04 15:15:40'),
(29, 'seoulmates7532', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', '', 0, '2023-04-07 14:22:58'),
(30, 'seoulmates5381', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', '', 0, '2023-04-07 14:26:18'),
(31, 'seoulmates9744', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', '', 0, '2023-04-07 14:27:09'),
(32, 'seoulmates9517', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 0, 'COD', '', 0, '2023-04-07 14:27:38'),
(33, 'seoulmates2049', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 0, 'COD', '', 0, '2023-04-07 14:27:56'),
(34, 'seoulmates1194', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 0, 'COD', 'cod-7106', 0, '2023-04-07 14:33:42'),
(35, 'seoulmates8209', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 0, 'COD', 'cod-3394', 0, '2023-04-07 14:34:50'),
(36, 'seoulmates3233', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-8177', 0, '2023-04-07 14:38:24'),
(37, 'seoulmates7245', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-1534', 0, '2023-04-07 14:43:36'),
(38, 'seoulmates4643', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-2512', 0, '2023-04-07 14:46:25'),
(39, 'seoulmates1857', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-1119', 0, '2023-04-07 14:50:28'),
(40, 'seoulmates5479', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-5597', 0, '2023-04-07 14:50:57'),
(41, 'seoulmates9797', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-8684', 0, '2023-04-07 14:52:08'),
(42, 'seoulmates7714', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-5059', 0, '2023-04-07 14:52:25'),
(43, 'seoulmates2868', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-4568', 0, '2023-04-07 14:53:03'),
(44, 'seoulmates4706', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-2743', 0, '2023-04-07 14:59:03'),
(45, 'seoulmates5122', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-2802', 0, '2023-04-07 15:02:45'),
(46, 'seoulmates5702', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1750, 'COD', 'cod-7616', 0, '2023-04-07 15:11:40'),
(47, 'seoulmates3628', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-5493', 0, '2023-04-07 15:14:09'),
(48, 'seoulmates8533', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-8843', 0, '2023-04-07 15:24:09'),
(49, 'seoulmates7164', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-7906', 0, '2023-04-07 15:35:47'),
(50, 'seoulmates5782', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-9250', 0, '2023-04-07 15:36:13'),
(51, 'seoulmates1789', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-4816', 0, '2023-04-07 15:36:46'),
(52, 'seoulmates2413', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'Paid by PayPal', 'cod-1734', 0, '2023-04-07 15:49:11'),
(53, 'seoulmates5545', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1500, 'COD', 'cod-9144', 0, '2023-04-07 15:53:31'),
(54, 'seoulmates9602', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-7916', 0, '2023-04-18 04:26:58'),
(55, 'seoulmates9810', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-2003', 0, '2023-04-18 04:27:28'),
(56, 'seoulmates6478', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-7297', 0, '2023-04-18 04:29:24'),
(57, 'seoulmates3046', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-2549', 0, '2023-04-18 06:06:38'),
(58, 'seoulmates3651', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-3313', 0, '2023-04-18 06:07:00'),
(59, 'seoulmates9350', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-4769', 0, '2023-04-18 06:07:50'),
(60, 'seoulmates2046', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 1000, 'COD', 'cod-3902', 0, '2023-04-18 06:08:10'),
(61, 'seoulmates9469', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-9385', 0, '2023-04-18 06:09:14'),
(62, 'seoulmates1963', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-4313', 0, '2023-04-18 06:09:27'),
(63, 'seoulmates3822', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-9142', 0, '2023-04-18 06:13:05'),
(64, 'seoulmates8237', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-8701', 0, '2023-04-18 06:15:21'),
(65, 'seoulmates6205', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-8642', 0, '2023-04-18 06:16:53'),
(66, 'seoulmates6023', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-1670', 0, '2023-04-18 06:17:52'),
(67, 'seoulmates8972', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-9003', 0, '2023-04-18 06:18:59'),
(68, 'seoulmates2215', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-4742', 0, '2023-04-18 06:25:31'),
(69, 'seoulmates7598', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 750, 'COD', 'cod-8858', 0, '2023-04-18 06:29:59'),
(70, 'seoulmates4422', 27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', '+639753977578', 'HELLLO ??', 4104, 760, 'COD', 'cod-4921', 0, '2023-04-18 06:31:52'),
(71, 'seoulmates2588', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 1500, 'COD', 'cod-2460', 0, '2023-05-08 09:39:08'),
(72, 'seoulmates3917', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 750, 'COD', 'cod-5009', 0, '2023-05-13 17:07:25'),
(73, 'seoulmates7837', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 750, 'COD', 'cod-7923', 0, '2023-05-13 17:08:59'),
(74, 'seoulmates4403', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 760, 'COD', 'cod-8604', 0, '2023-05-13 17:12:09'),
(75, 'seoulmates1960', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 750, 'COD', 'cod-2628', 0, '2023-05-13 17:17:02'),
(76, 'seoulmates1232', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 750, 'COD', 'cod-7182', 0, '2023-05-13 17:17:52'),
(77, 'seoulmates1329', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 760, 'COD', 'cod-3794', 0, '2023-05-13 17:18:21'),
(78, 'seoulmates7431', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 1000, 'COD', 'cod-6456', 0, '2023-05-13 17:19:27'),
(79, 'seoulmates9111', 27, 'Kaycee Bulante', 'kbulante64@gmail.com', '09123456789', 'kawit cavite', 4104, 750, 'COD', 'cod-4282', 0, '2023-05-13 17:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 2, 9, 4, 4, '2022-12-24 04:54:58'),
(2, 2, 10, 2, 11, '2022-12-24 04:54:58'),
(3, 3, 9, 4, 4, '2022-12-24 04:55:41'),
(4, 3, 10, 2, 11, '2022-12-24 04:55:41'),
(5, 4, 9, 4, 4, '2022-12-24 04:56:23'),
(6, 4, 10, 2, 11, '2022-12-24 04:56:23'),
(7, 5, 9, 4, 4, '2022-12-24 04:57:43'),
(8, 5, 10, 2, 11, '2022-12-24 04:57:43'),
(9, 6, 9, 4, 4, '2022-12-24 04:59:18'),
(10, 6, 10, 2, 11, '2022-12-24 04:59:18'),
(11, 7, 9, 4, 4, '2022-12-24 05:00:46'),
(12, 7, 10, 2, 11, '2022-12-24 05:00:46'),
(13, 8, 9, 4, 4, '2022-12-24 05:01:04'),
(14, 8, 10, 2, 11, '2022-12-24 05:01:04'),
(15, 9, 9, 4, 4, '2022-12-24 05:01:13'),
(16, 9, 10, 2, 11, '2022-12-24 05:01:13'),
(17, 10, 9, 4, 4, '2022-12-24 05:01:29'),
(18, 10, 10, 2, 11, '2022-12-24 05:01:29'),
(19, 11, 9, 3, 4, '2022-12-24 05:04:49'),
(20, 11, 10, 2, 11, '2022-12-24 05:04:49'),
(21, 12, 9, 1, 4, '2022-12-24 05:28:07'),
(22, 13, 9, 1, 4, '2022-12-25 18:31:00'),
(23, 13, 10, 1, 11, '2022-12-25 18:31:00'),
(24, 14, 9, 1, 4, '2022-12-25 18:34:18'),
(25, 15, 10, 2, 11, '2022-12-28 03:42:32'),
(26, 15, 9, 2, 4, '2022-12-28 03:42:32'),
(27, 16, 11, 4, 12345, '2022-12-28 03:48:00'),
(28, 17, 14, 1, 1000, '2023-01-23 10:00:57'),
(29, 18, 15, 1, 750, '2023-01-23 10:03:01'),
(30, 19, 20, 1, 750, '2023-01-23 10:12:46'),
(31, 20, 15, 1, 750, '2023-01-23 10:15:41'),
(32, 21, 18, 1, 1000, '2023-01-23 10:16:30'),
(33, 22, 20, 1, 750, '2023-01-25 11:40:46'),
(34, 23, 16, 1, 750, '2023-01-25 11:41:50'),
(35, 24, 14, 1, 1000, '2023-01-25 11:49:10'),
(36, 25, 17, 2, 750, '2023-01-25 11:51:32'),
(37, 26, 23, 2, 750, '2023-01-25 12:18:03'),
(38, 27, 21, 4, 760, '2023-01-25 12:19:54'),
(39, 28, 17, 1, 750, '2023-04-04 15:15:40'),
(40, 29, 22, 1, 1000, '2023-04-07 14:22:58'),
(41, 30, 18, 1, 1000, '2023-04-07 14:26:18'),
(42, 31, 22, 1, 1000, '2023-04-07 14:27:09'),
(43, 36, 18, 1, 1000, '2023-04-07 14:38:24'),
(44, 37, 15, 1, 750, '2023-04-07 14:43:36'),
(45, 39, 19, 1, 750, '2023-04-07 14:50:28'),
(46, 40, 15, 1, 750, '2023-04-07 14:50:57'),
(47, 41, 18, 1, 1000, '2023-04-07 14:52:08'),
(48, 42, 18, 1, 1000, '2023-04-07 14:52:25'),
(49, 43, 18, 1, 1000, '2023-04-07 14:53:03'),
(50, 44, 17, 1, 750, '2023-04-07 14:59:03'),
(51, 45, 22, 1, 1000, '2023-04-07 15:02:45'),
(52, 46, 18, 1, 1000, '2023-04-07 15:11:40'),
(53, 46, 19, 1, 750, '2023-04-07 15:11:40'),
(54, 47, 18, 1, 1000, '2023-04-07 15:14:09'),
(55, 48, 18, 1, 1000, '2023-04-07 15:24:09'),
(56, 49, 18, 1, 1000, '2023-04-07 15:35:47'),
(57, 50, 20, 1, 750, '2023-04-07 15:36:13'),
(58, 51, 20, 1, 750, '2023-04-07 15:36:46'),
(59, 52, 20, 1, 750, '2023-04-07 15:49:11'),
(60, 53, 19, 1, 750, '2023-04-07 15:53:31'),
(61, 53, 20, 1, 750, '2023-04-07 15:53:31'),
(62, 54, 19, 1, 750, '2023-04-18 04:26:58'),
(63, 55, 15, 1, 750, '2023-04-18 04:27:28'),
(64, 56, 17, 1, 750, '2023-04-18 04:29:24'),
(65, 57, 19, 1, 750, '2023-04-18 06:06:38'),
(66, 58, 24, 1, 750, '2023-04-18 06:07:00'),
(67, 59, 19, 1, 750, '2023-04-18 06:07:50'),
(68, 60, 22, 1, 1000, '2023-04-18 06:08:10'),
(69, 61, 19, 1, 750, '2023-04-18 06:09:14'),
(70, 62, 19, 1, 750, '2023-04-18 06:09:27'),
(71, 63, 19, 1, 750, '2023-04-18 06:13:05'),
(72, 64, 15, 1, 750, '2023-04-18 06:15:21'),
(73, 65, 15, 1, 750, '2023-04-18 06:16:53'),
(74, 66, 17, 1, 750, '2023-04-18 06:17:52'),
(75, 67, 17, 1, 750, '2023-04-18 06:18:59'),
(76, 68, 17, 1, 750, '2023-04-18 06:25:31'),
(77, 69, 19, 1, 750, '2023-04-18 06:29:59'),
(78, 70, 21, 1, 760, '2023-04-18 06:31:52'),
(79, 71, 17, 2, 750, '2023-05-08 09:39:08'),
(80, 72, 20, 1, 750, '2023-05-13 17:07:25'),
(81, 73, 20, 1, 750, '2023-05-13 17:08:59'),
(82, 74, 21, 1, 760, '2023-05-13 17:12:09'),
(83, 75, 20, 1, 750, '2023-05-13 17:17:02'),
(84, 76, 15, 1, 750, '2023-05-13 17:17:52'),
(85, 77, 21, 1, 760, '2023-05-13 17:18:21'),
(86, 78, 22, 1, 1000, '2023-05-13 17:19:27'),
(87, 79, 20, 1, 750, '2023-05-13 17:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_title` varchar(191) NOT NULL,
  `product_description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `best` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_title`, `product_description`, `price`, `image`, `qty`, `best`, `created_at`) VALUES
(14, 12, 'BORN PINK', 'BLACKPINK SOPHOMORE ALBUM', 1000, '1674467140.jpeg', 0, 0, '2023-03-24 15:42:29'),
(15, 12, 'SQUARE UP', 'BLACKPINK FIRST MINI ALBUM', 750, '1674467199.png', 2, 0, '2023-05-13 17:17:52'),
(17, 13, 'MIXTAPE', 'SKZ MIXTAPE', 750, '1674467452.jpg', 0, 0, '2023-05-08 09:39:08'),
(18, 13, 'MAXIDENT', 'skz latest album', 1000, '1674467622.jpg', 0, 1, '2023-04-07 15:35:47'),
(19, 13, 'I AM WHO?', 'SKZ MINI ALBUM', 750, '1674467668.jpg', 0, 0, '2023-04-18 06:29:59'),
(20, 16, 'THE ALBUM', 'BP ', 750, '1674648013.png', 1, 1, '2023-05-13 17:21:10'),
(21, 15, 'REMEMBER', 'T-ARA MINI ALBUM', 760, '1674467900.jpg', 5, 0, '2023-05-13 17:18:21'),
(22, 15, 'QUEEN OF POPS', 'ANTHEM SONG', 1000, '1674467952.jpg', 6, 1, '2023-05-13 17:19:27'),
(24, 17, 'KILL THIS LOVE', 'MINI ALBUM', 750, '1674649663.png', 0, 0, '2023-04-18 06:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) DEFAULT 0 COMMENT '0=no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `address`, `verify_token`, `verify_status`, `created_at`) VALUES
(1, 'asd', 'kaycee@gmail.com', 1111111, '123', '', '', 0, '2022-12-19 17:12:49'),
(2, 'kaycee', 'kaycee1@gmail.com', 1111111, '1234', '97', '', 0, '2022-12-20 03:36:13'),
(3, 'kaycee', 'kaycee@gmail.com', 1111111, '1234', '', '', 0, '2022-12-20 04:27:15'),
(4, '', '', 0, '', '', '', 0, '2022-12-26 04:37:01'),
(5, 'Kaycee Bulante', 'kaycee123@gmail.com', 9090909, '123', '123456', '', 0, '2022-12-28 03:41:15'),
(6, 'kayceeee', 'kaycee123456@gmail.com', 900909, '$2y$10$D/8YaM2GszCmouIwLSdsy.GPPcymGXN7/Miqi0k6JjXx9APsvdNXK', '123456', '', 0, '2023-01-07 03:26:39'),
(7, 'kayceeee', 'kaycee1234567@gmail.com', 900909, '$2y$10$pGSkB.WJEZw8KVKR33NIbu1x2dYyoAciCJe31F6sAIa85ycRQT8z2', '123456', '', 0, '2023-01-07 04:03:06'),
(10, 'kayceeee', 'kaycee000@gmail.com', 2147483647, '$2y$10$ZK6Va0LIRStGf9Wh4Q9cKOMRQXXeb.wzo0MvDm/.p8vuNBXtHZjti', '123456', '', 0, '2023-01-07 04:10:55'),
(11, '123', '12300@gmail.com', 2147483647, '$2y$10$ju9TqvtN3pKLUwvm/MBnH.gAMIoJviFOpgKpKyfBUCFH7196gaEQ.', '123', '', 0, '2023-01-07 04:11:57'),
(14, '123', '12304444jgh@gmail.com', 2147483647, '$2y$10$4Em6/R6RUtikh.yNMZmhVO3idarqEVmKBekFidu7lUTTOYdZfJc8O', '123', '', 0, '2023-01-07 04:27:08'),
(17, '123', '1230jgh@gmail.com', 12345678911, '$2y$10$fq50xdEkGT0AYrZS4xm67.PvGKZ7SyZMOxvAtGYZx3QhxWzTy9tG.', '123', '', 0, '2023-01-07 04:33:04'),
(18, '123', '1230444dfas4jg@gmail.com', 9123456789, '$2y$10$S7khQ9aKttf8aX6CyXrqqe2VPkWfPJThzjAwU3P4Bv00hg8KAuxyO', '123', '', 0, '2023-01-07 04:34:31'),
(19, 'Kaycee Bulante', '12@gmail.com2', 9123456789, '$2y$10$dryvUOS6YVrO6R84Ms6/1.jeTLHd4CnEOL4zxohVHoR8jd3Txkdia', '97 Sta Isabel, Kawit, Cavite', '', 0, '2023-01-23 09:21:23'),
(20, 'Kaycee D. Bulante', 'kayceeb@gmail.com', 9123456789, '$2y$10$pRjalDUuZC5dpDrpE8/S3eHs2mx5aMBeNcHeM1XHlKc/x8DJyHjU6', 'Kawit, Cavite', '', 0, '2023-01-25 11:40:07'),
(21, 'Kate Escotido', 'kateescotido@gmail.com', 9123456789, '$2y$10$1ZoVr.26SVEiOmQawpwDXOzvOi.5GmOeMU6zbMu3qt.NBLpbqKTSi', 'Marikina', '', 0, '2023-01-25 11:46:15'),
(22, 'Kate Escotido', 'kateescotido1@gmail.com', 9123456789, '$2y$10$0XEpEt1iPxXm5hd/abjUP.PHnpMrxB0ZVeOe1a.U.tKYKmAugGc3u', 'Marikina', '', 0, '2023-01-25 12:15:45'),
(23, '213', 'kayceebb@gmail.com', 9123456789, '$2y$10$iKXHDKAeDBjxgR.hziu4D.WnGUOWiDT2U3jHhQKGhr3kXJC9.5tHu', 'Kawit, Cavite', '', 0, '2023-03-21 09:28:06'),
(24, 'Kaycee Bulante', 'kayceebbb@gmail.com', 9123456787, '$2y$10$duAP4mxzkwR/BLswjRV/hu.Rx5oTdu/eCCSvVyFpiXObjKKzrUpD6', 'Kawit, Cavite', '', 0, '2023-03-21 10:07:18'),
(26, 'kaycee bulante', 'kaycee.bulante@tup.edu.ph', 9123456789, '$2y$10$wVcAM6H24LOnus4VZ7ArWOeFepsm1tNDKCIgum3LyeEd4KxnmMnPO', 'HELLLO ??', '352a12427fc8a172984e9c8f3055e9ce', 1, '2023-03-23 15:26:33'),
(27, 'kaycee dahlen bulante', 'kbulante64@gmail.com', 9753977578, '$2y$10$1279vaSN4HTwUWTy1mwY8.VF4/BNudUAAZ9fm36WbDPbowuN8/f6O', 'HELLLO ??', '25edd8b7b5122a28babee8ce2cc9dec3', 1, '2023-04-04 15:12:08'),
(28, 'Kaycee Bulante', 'kbulante19@gmail.com', 9123456789, '$2y$10$sBvcfHkAPikL8Fg/lUwwgez/wsEp1NCGjVHrjZ/PhPd1SO3Jxl/1i', 'kawit cavite', '3cbc84f3a7ba3669bb4d5368347c5c16', 0, '2023-05-08 09:33:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
