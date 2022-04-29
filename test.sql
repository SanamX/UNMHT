-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2022 at 09:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `suspicious_login`
--

CREATE TABLE `suspicious_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `login_date` date NOT NULL DEFAULT current_timestamp(),
  `login_time` time NOT NULL DEFAULT current_timestamp(),
  `logout_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `track_log_user`
--

CREATE TABLE `track_log_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `login_date` date NOT NULL DEFAULT current_timestamp(),
  `login_time` time NOT NULL DEFAULT current_timestamp(),
  `logout_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_log_user`
--

INSERT INTO `track_log_user` (`id`, `username`, `login_date`, `login_time`, `logout_timestamp`) VALUES
(7, 'sanam0876', '2022-04-27', '10:13:16', '2022-04-27 12:39:01'),
(8, 'sanam0876', '2022-04-27', '10:14:50', '2022-04-27 12:39:01'),
(9, 'sanam0876', '2022-04-27', '10:40:04', '2022-04-27 12:39:01'),
(10, 'sanam0876', '2022-04-27', '11:46:12', '2022-04-27 12:39:01'),
(11, 'sanam0876', '2022-04-27', '12:10:40', '2022-04-27 12:39:01'),
(12, 'sanam0876', '2022-04-27', '12:39:08', '2022-04-27 12:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(4, 'sanam0876', '$2y$10$VoB5XTCzvywui2ozd5XSn.FDXxoB2t9DvDyUikEp9HKz3U3osChxK', '2022-04-27 10:13:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `suspicious_login`
--
ALTER TABLE `suspicious_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_log_user`
--
ALTER TABLE `track_log_user`
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
-- AUTO_INCREMENT for table `suspicious_login`
--
ALTER TABLE `suspicious_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_log_user`
--
ALTER TABLE `track_log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
