-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 04:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_mailbox` int(11) NOT NULL,
  `id_fromuser` int(11) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `id_touser` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_info`
--

CREATE TABLE `portfolio_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `passingyear` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `profile_picture` longblob NOT NULL,
  `qualification_school_name` varchar(255) NOT NULL,
  `certificates` varchar(255) NOT NULL,
  `extra_qualification` varchar(255) NOT NULL,
  `highschool_name` varchar(255) NOT NULL,
  `hs_starting_date` varchar(255) NOT NULL,
  `hs_fin_date` varchar(255) NOT NULL,
  `hs_qualification` varchar(255) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `uni_starting_date` varchar(255) NOT NULL,
  `uni_fin_date` varchar(255) NOT NULL,
  `uni_qualification` text NOT NULL,
  `current_job_title` varchar(255) NOT NULL,
  `current_employer_name` varchar(255) NOT NULL,
  `emp_starting_date` varchar(255) NOT NULL,
  `respo` text NOT NULL,
  `extra_emp` text NOT NULL,
  `project` text NOT NULL,
  `project_files` text NOT NULL,
  `hobbies` text NOT NULL,
  `ref` text NOT NULL,
  `createdBy` int(5) DEFAULT NULL,
  `portfolio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_info`
--

INSERT INTO `portfolio_info` (`id`, `firstname`, `lastname`, `email`, `aboutme`, `dob`, `passingyear`, `qualification`, `contactno`, `address`, `city`, `skills`, `profile_picture`, `qualification_school_name`, `certificates`, `extra_qualification`, `highschool_name`, `hs_starting_date`, `hs_fin_date`, `hs_qualification`, `uni_name`, `uni_starting_date`, `uni_fin_date`, `uni_qualification`, `current_job_title`, `current_employer_name`, `emp_starting_date`, `respo`, `extra_emp`, `project`, `project_files`, `hobbies`, `ref`, `createdBy`, `portfolio_id`) VALUES
(69, 'Adrian ', 'Kurowski', 'kur@gmail.com', 'YES YES YES', '2005-02-10', '2024-01-18', 'BSc', '1234123412', 'asdfasdfas', 'dfasdf', 'asdfasd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 187),
(70, 'ADADA', 'ADAD', 'fasd@gasdm.sd', '324123', '2008-01-02', '2024-01-26', '1234', '1234123412', '12341', '234123', '41234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 188),
(71, 'Adrian Kurowski', 'KURW', 'sdfas@fdsa.fdsa', 'asdfasdf', '2008-01-04', '2024-01-20', '1234', '1234123412', '1234', '1234', '12341234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 187),
(72, '1243', '123412', '341234@gfdas.fas', '123', '2008-01-18', '2024-01-06', '12341', '2341234123', '12341', '234', '1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(73, 'Adrian', 'Kurowksi', '45345@fds.fds', '3421341235412351235', '2008-01-06', '2024-01-26', '1234', '1234123412', '341234', '32151235', '21351235', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 192),
(74, 'Adrian', 'KKKk', 'kasdfg@gfds.sdf', '453425324523452345 2343425324523453425324523452345 2343425324523452345 2343425324523452345 2343425324523452345 2343425324523452345 2343425324523452345 2342345 234', '2008-01-03', '2024-01-23', '412341234', '1235132451', '32151235123', '51235', '12351235', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(75, 'Adrian', 'Kurowski', 'kurowskiadrian9@gamoil.com', 'YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES YES ', '2008-01-04', '2024-01-10', 'BSc Comp Science', '0889439344', '34234d fewq fwqef qwef wqe ', 'fewq f', 'qwef wqef wqef qewf w', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 212),
(76, 'Adrian', 'Kurowski', 'Kurowskiasdf@gmsdai.om', 'sadgfe3w5r', '2008-01-11', '2024-01-10', 'BSc', '4353245234', '4352345', '2345234', '523452345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 212),
(77, 'KRUUINWR', 's\\djkjkbnsdl', 'sdfgasdf@gfds.fdsa', 'asdfasdfasdfasdf', '2008-01-01', '2024-01-19', '21345123', '5412354123', '123512351235', '123512', '351235123521', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 214),
(78, 'AD', 'afsdf', 'asdfasd@fdgs.fds', 'gwetasfdgasdgf', '2008-01-01', '2024-01-24', '4353453', '4536234563', '34563456', '34563456', '345634563456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 247),
(79, 'qwaerfawe', 'fasdfas', 'dfasdfas@fdsf.fsd', 'fdgs@.fdsa', '2008-01-11', '2024-01-23', '34', '5215123512', '1235123', '51235', '12351235', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 262),
(80, 'asdf', 'asdfasdf', 'fgdfg@fds.fs', '', '2008-01-03', '2024-01-24', '543', '5432653426', '5634563456', '345634563456', '34563456345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 265),
(81, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 265),
(82, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 266),
(83, 'Test5', 'test5', 'gdsa\'Fd.df@fgde.dg', '', '2008-01-11', '', '', '5345345543', '345345', '3453453', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 267),
(84, 'asdfasdf', 'asdfasdf', '543543gds.fds@fdsf.s', '', '2008-01-17', '', '', '6543634563', '5634563456', '34563456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 268),
(85, 'asdfasdf', 'asdfasdf', '543543gds.fds@fdsf.s', '', '2008-01-17', '', '', '6543634563', '5634563456', '34563456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 268),
(86, 'asdfasdf', 'asdfasdf', 'fdasfa@fds.fs', 'fdsfasdfas', '2008-01-17', '', '', '3245632462', '23452345', '234523452345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 270),
(87, '123412345', '123512351235', '21351235@fds.fds', '2135123513425132', '2008-01-11', '2024-01-11', '45132451234512345', '1235123512', '123512351235', '1235123512351235', '12351235', '', '1251235123', '51235', '12351235', '123512351235', '2024-01-01', '2024-01-04', '21351235', '213512351235', '2024-01-18', '2024-01-09', '12351235', '1235', '1235123512', '2024-01-11', '123512', '3512351235', '12351235', '', '123512', '', 1, 275),
(88, 'Adrian', 'Kurowski', 'kur@email.com', 'Hello there! I\'m Sarah, a passionate explorer of life and a dedicated advocate for positive change. With a background in environmental science, I\'ve spent the last few years working towards sustainable solutions for a greener planet. Beyond my professional pursuits, I\'m an avid photographer capturing the beauty of the world around me and a firm believer in the power of storytelling to inspire others. Whether it\'s through my work or personal projects, I strive to make a meaningful impact and leave the world a better place. Join me on this journey of growth, curiosity, and making a difference!', '2008-01-03', '2024-05-13', 'BSc Computer Science', '0730923451', '43 High Street', 'Dumfires', 'Computing, coding, ets gsdjjkasdg jkasd jk sdajkfggfasdjkjkag sdjk asdgasdjkg asdg jk asdgjkasdg jkasdg jkasdg jk', '', 'University of the West of Scotland', 'none', 'none', 'Dumfries Academy', '2018-08-15', '2020-03-16', 'Higher Comp SCi - a, Nat 5 com sci - c', 'University of the West of Scotland', '2022-09-21', '2024-05-13', '1:1 Honours in Computing Science ', 'Cleaner', 'Turning Point', '2023-05-22', 'Cleaning etc', 'Subway - 4 years, Alpha solway - 2months, Garden Wise - 10 months', 'link to fintness website on git hub: https://github.com/adrianK2002/fitness_website', '', 'gym, cars , motorcycle', 'John Smith - 5r3556743435', 1, 276),
(89, 'kkk', 'kkk', 'kkgf.@fds.fd', 'kkkkkk', '2008-01-05', '2024-01-17', 'kkkkkkk', '6767676767', '67675657', 'kkk', 'kkkkkkkk', '', 'kkkkkk', 'kkkkkk', 'kkkkkkk', 'kkkkkkkk', '2024-01-06', '2024-01-03', 'kkkkkkkk', 'kkkkkkk', '2024-01-17', '2024-01-18', 'kkkkk', 'kkkkkkk', '', '2024-01-09', 'kkkkkkkk', 'kkkkkkkkk', 'kkkkkkkkk', '', 'kkkkk', 'kkkkkkk', 1, 277),
(90, 'asdf', 'asd', '3245@fds.fds', '32452345', '2008-01-03', '2024-01-11', '3245234', '5342523453', '52345', '234523452345', '523452345', '', '3245324', '53423425', '34253254', '32452345', '2024-01-10', '2024-01-02', '32452345', '5324523', '2024-01-09', '2024-01-26', '34253425', '32455234', '53424532', '2024-01-09', '23452345', '23452345234', '23453245', '', '32453245', '23452345', 18, 278),
(91, 'aa', 'aa', 'aa@aa.aa', 'aa', '2008-01-10', '2024-01-05', 'aa', '1111111111', 'aa', 'aa', 'aa', '', 'aa', 'aa', 'aa', 'aa', '2024-01-04', '2024-01-06', 'aa', 'aa', '2024-01-04', '2024-01-24', 'aa', 'aa', 'aa', '2024-01-10', 'aa', 'aa', 'aa', '', 'aa', 'aa', 1, 279);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_name`
--

CREATE TABLE `portfolio_name` (
  `name` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `createdBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_name`
--

INSERT INTO `portfolio_name` (`name`, `created_at`, `id`, `createdBy`) VALUES
('First Test Portfolio', '2024-01-24 20:51:30', 276, 1),
('Test2', '2024-01-27 15:38:06', 277, 1),
('1', '2024-01-28 11:55:53', 278, 18),
('4', '2024-01-28 12:10:38', 279, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `createdBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `createdBy`) VALUES
(1, 5, NULL),
(2, 2, NULL),
(3, 4, NULL),
(4, 5, 0),
(5, 5, 0),
(6, 5, 0),
(7, 5, 0),
(8, 3, 1),
(9, 1, 1),
(10, 2, 18),
(11, 1, 1),
(12, 5, 1),
(13, 5, 1),
(14, 1, 1),
(15, 3, 1),
(16, 2, 1),
(17, 5, 1),
(18, 5, 1),
(19, 1, 18),
(20, 1, 1),
(21, 5, 1),
(22, 5, 1),
(23, 5, 1),
(24, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_mailbox`
--

CREATE TABLE `reply_mailbox` (
  `id_reply` int(11) NOT NULL,
  `id_mailbox` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Adrian', '$2y$10$TA/6KwaG3uk4cwjUIg/91OBJJPPjHWWGTFVzmEh8CKydJy7HNtgzm', '2023-01-29 16:14:20'),
(16, 'NotAdrian', '$2y$10$LVmzD0s.Bwz7bDY2a5uWFuevSj.5SO5ijUznUd9t/dwi7Lka5hnGO', '2024-01-15 16:36:27'),
(17, 'asdf', '$2y$10$g98AE16ah40KKvKf/E2BMe8F2NSI3buJmdkDIecy4AMn6U4O1QLnq', '2024-01-15 17:07:28'),
(18, 'test', '$2y$10$7cOmkngR/BV2mMoFXRPe0erORtqjCE1bIj/ZkAiHmW0L.XuQvwwW6', '2024-01-27 16:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `language` varchar(150) DEFAULT NULL,
  `tool` varchar(150) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `createdBy` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `user_id`, `language`, `tool`, `experience`, `createdBy`, `created_at`) VALUES
(135, NULL, ' Javascript, Python , Java', ' Git, Visual Studio Code', '1-2', 1, '2024-01-28 14:24:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `portfolio_info`
--
ALTER TABLE `portfolio_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workout_id` (`portfolio_id`);

--
-- Indexes for table `portfolio_name`
--
ALTER TABLE `portfolio_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_preferences_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_info`
--
ALTER TABLE `portfolio_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `portfolio_name`
--
ALTER TABLE `portfolio_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD CONSTRAINT `fk_user_preferences_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
