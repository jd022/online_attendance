-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 09:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `present` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_update` datetime NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `users_id`, `subjects_id`, `time_in`, `time_out`, `present`, `date_time_created`, `date_time_update`, `remarks`) VALUES
(1, 1, 1, '2021-10-14 19:55:22', '2021-10-14 19:55:22', 1, '2021-10-14 19:55:22', '2021-10-14 19:55:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, 'BSCS', '2021-11-06 13:25:51', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `id` int(11) NOT NULL,
  `set_name` varchar(20) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`id`, `set_name`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, 'SET - A', '2021-11-06 13:28:40', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `day` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_update` datetime NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `names`, `day`, `time`, `date_time_created`, `date_time_update`, `remarks`) VALUES
(1, 'AL 101', 'Monday', '10:00 AM - 02:00 PM ', '2021-10-13 01:12:34', '0000-00-00 00:00:00', ''),
(2, 'NC 101', 'Tuesday', '10:30 AM - 12:00 PM', '2021-10-13 01:13:14', '0000-00-00 00:00:00', ''),
(3, 'SDF 101', 'Wednesday', '10:30 AM - 12:00 PM', '2021-10-13 01:13:56', '0000-00-00 00:00:00', ''),
(4, 'CS 15', 'Thursday', '10:00 AM - 12:00 PM', '2021-10-13 01:14:27', '0000-00-00 00:00:00', ''),
(5, 'AR 101', 'Thursday', '12:00 PM - 01:30 PM', '2021-10-13 01:17:08', '0000-00-00 00:00:00', ''),
(6, 'HCI 101', 'Saturday', '10:00 AM - 02:00 PM', '2021-10-13 01:14:47', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `given_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `verified` int(11) NOT NULL,
  `user_types_id` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `last_name`, `given_name`, `middle_name`, `contact_number`, `email_address`, `password`, `verified`, `user_types_id`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(12, '0123456', 'Campus', 'Juan', 'Sumulong', '09123345261', 'no_reply@example.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2021-11-06 14:54:17', '0000-00-00 00:00:00', ''),
(13, '123123213', 'Anathema', 'Forest', 'Choker', '0926546878', 'stomach@example.com', '4297f44b13955235245b2497399d7a93', 0, 1, '2021-11-06 16:32:28', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_course`
--

CREATE TABLE `users_course` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `course_id` varchar(30) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_course`
--

INSERT INTO `users_course` (`id`, `user_id`, `course_id`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, '0123456', '1', '2021-11-06 14:54:17', '0000-00-00 00:00:00', ''),
(2, '123123213', '1', '2021-11-06 16:32:28', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_set`
--

CREATE TABLE `users_set` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `set_id` varchar(20) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_set`
--

INSERT INTO `users_set` (`id`, `user_id`, `set_id`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, '0123456', '1', '2021-11-06 14:54:17', '0000-00-00 00:00:00', ''),
(2, '123123213', '1', '2021-11-06 16:32:28', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_subjects`
--

CREATE TABLE `users_subjects` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_update` datetime NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `names` varchar(20) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_update` datetime NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `names`, `date_time_created`, `date_time_update`, `remarks`) VALUES
(1, 'student', '2021-10-13 02:23:26', '0000-00-00 00:00:00', ''),
(2, 'professor', '2021-10-13 02:23:31', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_course`
--
ALTER TABLE `users_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_set`
--
ALTER TABLE `users_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_subjects`
--
ALTER TABLE `users_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_course`
--
ALTER TABLE `users_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_set`
--
ALTER TABLE `users_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_subjects`
--
ALTER TABLE `users_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
