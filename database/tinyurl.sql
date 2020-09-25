-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 12:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinyurl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'amit2x16@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', '2020-09-25 15:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `tinyurls`
--

CREATE TABLE `tinyurls` (
  `id` bigint(20) NOT NULL,
  `url` varchar(500) NOT NULL,
  `shorturl` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinyurls`
--

INSERT INTO `tinyurls` (`id`, `url`, `shorturl`, `created_at`, `updated_at`) VALUES
(42, 'https://codex.wordpress.org/Links_Manager', 'V8N0cfpRKh', '2020-09-25 15:39:06', '2020-09-25 15:39:06'),
(43, 'https://wordpress.org/showcase/', 'mASBDTje7L', '2020-09-25 15:39:06', '2020-09-25 15:39:06'),
(44, 'https://wordpress.org/plugins/', '3H2XW8ZMbk', '2020-09-25 15:39:06', '2020-09-25 15:39:06'),
(45, 'https://wordpress.org/mobile/', '9KNu7Qopat', '2020-09-25 15:39:06', '2020-09-25 15:39:06'),
(46, 'https://www.facebook.com/business/small-business', 'VEj75l21Sq', '2020-09-25 15:39:06', '2020-09-25 15:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `visited_link_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `visited_link_id`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 30, '2020-09-25 15:10:24', '2020-09-25 15:10:24'),
(2, '127.0.0.1', 31, '2020-09-25 15:10:49', '2020-09-25 15:10:49'),
(3, '127.0.0.1', 42, '2020-09-25 15:39:23', '2020-09-25 15:39:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinyurls`
--
ALTER TABLE `tinyurls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`,`visited_link_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tinyurls`
--
ALTER TABLE `tinyurls`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
