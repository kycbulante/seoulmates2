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
-- Database: `seoulmatesadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `verify_token`, `verify_status`, `created_at`) VALUES
(1, 'kaycee', 'kaycee@gmail.com', 123, '123', '0', 0, '2022-12-26 05:01:54'),
(2, 'kaycee', 'kaycee@gmail.com', 123, '123', '0', 0, '2022-12-26 05:01:58'),
(3, '', '', 0, '', '0', 0, '2022-12-26 05:18:34'),
(4, '123', '123@gmail.com', 123, '123', '0', 0, '2022-12-26 05:20:37'),
(5, '123', '1234@gmail.com', 123, '123', '0', 0, '2022-12-26 05:20:56'),
(6, '123', '1233@gmail.com', 12333, '1234', '0', 0, '2022-12-26 05:22:30'),
(7, '123', '12345@gmail.com', 12345, '1234', '0', 0, '2022-12-28 03:18:15'),
(8, '123', '1233333@gmail.com', 2147483647, '$2y$10$qUdA1paLfKgcyMrgZG73jO6.yn/EOrwEjDVI25hO4v3oUBQQWnRha', '0', 0, '2023-01-07 04:40:55'),
(9, '123', '13@gmail.com', 2147483647, '$2y$10$/5jYYcgG1IVmfv36ZEI0o.tvk/bxLI6EDizn7SWg2tT993T6qBmju', '0', 0, '2023-01-07 04:57:52'),
(10, '12', '1230444dfas4jgh@gmail.com', 9789456123, '$2y$10$Vqw.Z9YzhkRJBe7XcIdi4u2XOPTkKyDVfolVIEK1JFLYl0abZ9vAy', '0', 0, '2023-01-07 04:58:30'),
(11, 'jisoo', '12304jg@gmail.com', 9234567899, '$2y$10$ME3SyDZGPE3jeqH7A8V0K.fBh5Fn84XlMWTb09s9LAIxymGQXsiTy', '0', 0, '2023-01-07 05:09:15'),
(12, 'jisoo', '12304jgg@gmail.com', 9090909000, '$2y$10$/QtpN0FlCjE9IKQ1kpXS6.QxnPB00RMIlFGwJejUo8lmSb0XMCoqy', '0', 0, '2023-01-17 08:13:09'),
(13, 'Jamiel Sumeracruz', 'jamielsumeracruz@gmail.com', 9412345678, '$2y$10$QLF3XkZJ1/57yDEcPWzp7Ozk7HCtYy1DrtNZ/HGQr6sM9Pu.eacS6', '0', 0, '2023-01-25 11:55:15'),
(14, 'Jamiel Sumeracruz', 'jamielsumeracruz@gmail.com1', 9412345678, '$2y$10$wxQWan6JnuzH72h3dVxUVuY6oEedqNDF.WdZdurwfr9Jjs.iDNDHi', '0', 0, '2023-01-25 12:21:49'),
(22, 'kaycee bulante1', 'kaycee.bulante@tup.edu.ph', 9753977578, '$2y$10$2nXPUlCpTtNbf7HSlenot.OEmao.4YeI4QnEDykoBXSu4ofZnoYr6', 'fb68ef6ca701dfd54263a2a9d2221cc3', 1, '2023-03-24 15:30:35'),
(23, 'Kaycee Bulante', 'kbulante64@gmail.com', 9123456789, '$2y$10$/Jj2acG4dRuNpkiuxuxug.xqxqzhyT72oKlXQsuHUvfmNHweKy3aq', '2a5f78040c20a42b53036ec160a58424', 0, '2023-05-08 09:40:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
