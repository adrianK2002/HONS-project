-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Feb 15, 2023 at 11:32 PM
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
-- Database: `fitness_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Sets` varchar(256) DEFAULT NULL,
  `Reps` varchar(256) DEFAULT NULL,
  `Weight` varchar(256) DEFAULT NULL,
  `Notes` varchar(256) DEFAULT NULL,
  `createdBy` int(5) DEFAULT NULL,
  `workout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `Date`, `Sets`, `Reps`, `Weight`, `Notes`, `createdBy`, `workout_id`) VALUES
(11, '2023-02-14', '1', '12', '24', 'asdf', 1, 121),
(14, '2023-02-25', '23', '23', '23', '123213', 1, 122);

-- --------------------------------------------------------

--
-- Table structure for table `fitness_history`
--

CREATE TABLE `fitness_history` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `workoutId` int(11) DEFAULT NULL,
  `exerciseId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Adrian', '$2y$10$TA/6KwaG3uk4cwjUIg/91OBJJPPjHWWGTFVzmEh8CKydJy7HNtgzm', '2023-01-29 16:14:20'),
(2, 'test123', '$2y$10$BQr/RgEPNDohdmghKzZdhuwivZQDVkpWPVA.Fkp4aQflJlyHf4FwG', '2023-01-30 10:26:14'),
(3, 'test', '$2y$10$Im7hAnjAEoSRlJ0TY55Hv.vFVXKJlivhI3SEyPL1n1rFxboh4uZrC', '2023-01-30 10:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `workout` varchar(256) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `createdBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`workout`, `id`, `createdBy`) VALUES
('First', 114, 1),
('Hello123', 122, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitness_history`
--
ALTER TABLE `fitness_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
