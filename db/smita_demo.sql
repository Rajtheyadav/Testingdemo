-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 08:35 AM
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
-- Database: `smita_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `uid`, `otp`, `created_on`) VALUES
(1, 2, 2543, '2022-07-17 04:48:45'),
(2, 3, 8625, '2022-07-17 05:31:27'),
(3, 4, 9329, '2022-07-17 06:22:48'),
(4, 5, 7836, '2022-07-17 06:28:53'),
(5, 6, 8323, '2022-07-17 06:40:18'),
(6, 7, 2451, '2022-07-18 03:06:43'),
(7, 8, 7521, '2022-07-18 03:11:14'),
(8, 9, 3187, '2022-07-18 03:17:16'),
(9, 10, 3779, '2022-07-18 03:18:51'),
(10, 11, 2691, '2022-07-18 03:22:14'),
(11, 12, 3566, '2022-07-18 03:23:12'),
(12, 13, 6647, '2022-07-18 03:24:26'),
(13, 14, 1887, '2022-07-18 03:28:31'),
(14, 15, 9281, '2022-07-18 03:33:45'),
(15, 16, 7270, '2022-07-18 03:36:36'),
(16, 17, 8322, '2022-07-18 04:03:33'),
(17, 18, 9092, '2022-07-18 04:05:06'),
(18, 19, 4673, '2022-07-18 04:13:57'),
(19, 20, 611, '2022-07-18 04:15:12'),
(20, 21, 7525, '2022-07-18 04:16:05'),
(21, 22, 6728, '2022-07-18 05:13:16'),
(22, 23, 8904, '2022-07-18 05:14:44'),
(23, 24, 5262, '2022-07-18 05:16:04'),
(24, 25, 848, '2022-07-18 05:18:39'),
(25, 26, 61, '2022-07-18 06:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobileno` int(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `city` varchar(50) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobileno`, `state`, `status`, `city`, `created_on`) VALUES
(1, 'Rajesh yadav', 'raj199104@gmal.com', '8429', 2147483647, '2', 0, '1', '2022-07-17 04:32:06'),
(2, 'Anil yadav', 'testing@gmail.com', '2543', 2147483647, '2', 0, '1', '2022-07-17 04:48:45'),
(3, 'Rajesh yadav', 'raj199104@gmal.com', '8625', 2147483647, '2', 0, '1', '2022-07-17 05:31:27'),
(4, 'Rajesh yadav', 'raj199104@gmal.com', '9329', 2147483647, '2', 0, '1', '2022-07-17 06:22:48'),
(5, 'Rajesh yadav', 'raj199104@gmal.com', '7836', 2147483647, '2', 0, '1', '2022-07-17 06:28:53'),
(6, 'Rajesh yadav', 'raj199104@gmal.com', '8323', 2147483647, '2', 0, '1', '2022-07-17 06:40:18'),
(7, 'Rajesh Yadav', 'raj199104@gmail.com', '2451', 2147483647, '2', 0, '1', '2022-07-18 03:06:43'),
(8, 'Rajesh Yadav', 'raj199104@gmail.com', '7521', 2147483647, '2', 0, '1', '2022-07-18 03:11:14'),
(9, 'Anil yadav', 'anil@gmail.com', '3187', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 03:17:16'),
(10, 'Anil yadav', 'raj19912204@gmail.com', '3779', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 03:18:51'),
(11, 'Rajesh Yadav', 'raj199133204@gmail.com', '2691', 2147483647, 'Up', 0, 'Lucknow', '2022-07-18 03:22:14'),
(12, 'Rajesh Yadav', 'raj192s9104@gmail.com', '3566', 2147483647, 'Delhi', 0, 'Delhi', '2022-07-18 03:23:12'),
(13, 'Rajesh Yadav', 'raj19910sdd4@gmail.com', '6647', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 03:24:26'),
(14, 'Rajesh Yadav', 'raj1991ter04@gmail.com', '1887', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 03:28:31'),
(15, 'Rajesh Yadav', 'raj199104@gmail.com', '9281', 213232222, 'Maharashtra', 0, 'Mumbai', '2022-07-18 03:33:45'),
(16, 'Rajesh Yadav', 'raj199104@gmail.com', '7270', 422333333, 'Maharashtra', 0, 'Mumbai', '2022-07-18 03:36:36'),
(17, 'Rajesh Yadav', 'raj199104@gmail.com', '8322', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 04:03:33'),
(18, 'Rajesh Yadav', 'raj199104@gmail.com', '9092', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 04:05:06'),
(19, 'Rajesh Yadav', 'raj199104@gmail.com', '4673', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 04:13:57'),
(20, 'Rajesh Yadav', 'raj199104@gmail.com', '611', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 04:15:12'),
(21, 'Rajesh Yadav', 'raj199104@gmail.com', '7525', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 04:16:05'),
(22, 'Rajesh yadav', 'raj199104@gmal.com', '6728', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 05:13:16'),
(23, 'Rajesh yadav', 'raj199104@gmal.com', '8904', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 05:14:44'),
(24, 'Rajesh yadav', 'raj199104@gmal.com', '5262', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 05:16:04'),
(25, 'Rajesh yadav', 'raj199104@gmal.com', '848', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 05:18:39'),
(26, 'Rajesh yadav', 'raj199104@gmal.com', '61', 2147483647, 'Maharashtra', 0, 'Mumbai', '2022-07-18 06:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
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
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
