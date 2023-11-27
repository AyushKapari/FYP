-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1: 3308
-- Generation Time: Oct 08, 2021 at 09:01 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system_29e`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `is_superuser` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `joined_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `email`, `user_password`, `profile_image`, `is_superuser`, `is_active`, `joined_date`) VALUES
(1, 'samuel', '', 'anand', 'sam', 'anik@gmail.com', '$2y$10$1hdnxXSZXYlVIpICuG8Zg.8uTy.3ln9xTHePmIwyBN5cMlRFDhVn6', 'image615c683cea5dc0.46829477.jpg', 1, 1, '2021-09-26 11:01:51'),
(2, 'Manuel', 'Jake', 'Bose', 'Manuel', 'man@gmail.com', '$2y$10$wQUrofLEDluiLmJUu44qnuX05qaTfIuczceDmURzPA5.KwEMum31W', NULL, 0, 1, '2021-10-01 10:39:52'),
(3, 'Jade', 'Andrew', 'Leonard', 'Jade', 'jade@gmail.com', '$2y$10$uXSt7tUR0PotxWRjKDpSXuk1EH6FlurGL62vRKA7eqMYJjVWzXg2C', NULL, 0, 1, '2021-10-01 10:50:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
