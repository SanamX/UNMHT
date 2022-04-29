-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 27, 2022 at 03:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `track_log_user`
--

CREATE TABLE `track_log_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `login_date` date NOT NULL DEFAULT current_timestamp(),
  `login_time` time NOT NULL DEFAULT current_timestamp(),
  `logout_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track_log_user`
--

INSERT INTO `track_log_user` (`id`, `username`, `login_date`, `login_time`, `logout_timestamp`) VALUES
(28, 'admin', '2022-03-18', '20:35:54', '2022-03-25 13:11:06'),
(29, 'admin', '2022-03-19', '10:36:38', '2022-03-25 13:11:06'),
(31, 'admin', '2022-03-19', '10:53:19', '2022-03-25 13:11:06'),
(32, 'admin', '2022-03-19', '18:42:52', '2022-03-25 13:11:06'),
(33, 'admin', '2022-03-22', '17:00:18', '2022-03-25 13:11:06'),
(34, 'admin', '2022-03-22', '21:26:38', '2022-03-25 13:11:06'),
(35, 'admin', '2022-03-23', '13:30:24', '2022-03-25 13:11:06'),
(36, 'admin', '2022-03-23', '13:45:15', '2022-03-25 13:11:06'),
(37, 'admin', '2022-03-23', '19:36:01', '2022-03-25 13:11:06'),
(38, 'admin', '2022-03-25', '11:22:12', '2022-03-25 13:11:06'),
(39, 'admin', '2022-03-25', '11:23:02', '2022-03-25 13:11:06'),
(40, 'admin', '2022-03-25', '11:23:26', '2022-03-25 13:11:06'),
(41, 'admin', '2022-03-25', '11:25:03', '2022-03-25 13:11:06'),
(42, 'admin', '2022-03-25', '11:57:00', '2022-03-25 13:11:06'),
(43, 'admin', '2022-03-25', '12:07:16', '2022-03-25 13:11:06'),
(44, 'admin', '2022-03-25', '12:07:58', '2022-03-25 13:11:06'),
(45, 'admin', '2022-03-25', '12:36:40', '2022-03-25 13:11:06'),
(46, 'admin', '2022-03-25', '12:38:54', '2022-03-25 13:11:06'),
(47, 'admin', '2022-03-25', '12:48:55', '2022-03-25 13:11:06'),
(49, 'admin', '2022-03-25', '12:52:21', '2022-03-25 13:11:06'),
(50, 'admin', '2022-03-25', '12:53:12', '2022-03-25 13:11:06'),
(51, 'admin', '2022-03-25', '13:09:17', '2022-03-25 13:11:06'),
(52, 'admin', '2022-03-25', '13:14:43', '2022-03-25 13:14:43'),
(53, 'admin', '2022-03-25', '13:34:41', '2022-03-25 13:34:41'),
(54, 'admin', '2022-03-25', '18:34:08', '2022-03-25 18:34:08'),
(55, 'admin', '2022-03-25', '18:41:52', '2022-03-25 18:41:52'),
(56, 'admin', '2022-03-25', '19:35:22', '2022-03-25 19:35:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `track_log_user`
--
ALTER TABLE `track_log_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `track_log_user`
--
ALTER TABLE `track_log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
