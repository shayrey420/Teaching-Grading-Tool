-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseid` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `teacher_id` int(150) NOT NULL,
  `teacher_institution` varchar(150) NOT NULL,
  `teacher_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `course_name`, `teacher_id`, `teacher_institution`, `teacher_name`) VALUES
(17, 'fall_cse115_15', 2, 'NSU', 'hiyaban'),
(19, 'Spring_EEE451_8', 2, 'NSU', 'hiyaban');

-- --------------------------------------------------------

--
-- Table structure for table `fall_cse115_15`
--

CREATE TABLE `fall_cse115_15` (
  `Student_Serial` int(11) NOT NULL,
  `Student_Id` int(11) DEFAULT NULL,
  `Student_Name` varchar(150) DEFAULT NULL,
  `Quiz_1` float DEFAULT NULL,
  `Quiz_2` float DEFAULT NULL,
  `Quiz_3` float DEFAULT NULL,
  `Quiz_4` float DEFAULT NULL,
  `Quiz_5` float DEFAULT NULL,
  `Quiz_6` float DEFAULT NULL,
  `Mid_1` float DEFAULT NULL,
  `Mid_2` float DEFAULT NULL,
  `Assignment_1` float DEFAULT NULL,
  `Assignment_2` float DEFAULT NULL,
  `Assigmnment_3` float DEFAULT NULL,
  `project_1` float DEFAULT NULL,
  `project_2` float DEFAULT NULL,
  `Final` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fall_cse115_15`
--

INSERT INTO `fall_cse115_15` (`Student_Serial`, `Student_Id`, `Student_Name`, `Quiz_1`, `Quiz_2`, `Quiz_3`, `Quiz_4`, `Quiz_5`, `Quiz_6`, `Mid_1`, `Mid_2`, `Assignment_1`, `Assignment_2`, `Assigmnment_3`, `project_1`, `project_2`, `Final`, `Total`, `Grade`) VALUES
(1, 19141, 'Fahim Foysal Apurba', 10, 10.5, 13, NULL, NULL, NULL, 26, 23, 10, 8.5, NULL, 9.5, NULL, 31, 81.3333, 'B-'),
(2, 19143, 'Fahim Foysal ', 10, 15, 12, NULL, NULL, NULL, 30, 19, 10, 9.5, NULL, 10, NULL, 35, 87.5, 'B+'),
(3, 19141, 'Foysal', 15, 15, 15, NULL, NULL, NULL, 30, 25, 10, 9.5, NULL, 10, NULL, 40, 97.6667, 'A'),
(4, 19145, 'Fahim Foy', 15, 15, 15, NULL, NULL, NULL, 30, 30, 10, 10, NULL, 10, NULL, 40, 100, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `spring_eee451_8`
--

CREATE TABLE `spring_eee451_8` (
  `Student_Serial` int(11) NOT NULL,
  `Student_Id` int(11) DEFAULT NULL,
  `Student_Name` varchar(150) DEFAULT NULL,
  `Quiz_1` float DEFAULT NULL,
  `Quiz_2` float DEFAULT NULL,
  `Quiz_3` float DEFAULT NULL,
  `Quiz_4` float DEFAULT NULL,
  `Quiz_5` float DEFAULT NULL,
  `Quiz_6` float DEFAULT NULL,
  `Mid_1` float DEFAULT NULL,
  `Mid_2` float DEFAULT NULL,
  `Assignment_1` float DEFAULT NULL,
  `Assignment_2` float DEFAULT NULL,
  `Assigmnment_3` float DEFAULT NULL,
  `project_1` float DEFAULT NULL,
  `project_2` float DEFAULT NULL,
  `Final` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spring_eee451_8`
--

INSERT INTO `spring_eee451_8` (`Student_Serial`, `Student_Id`, `Student_Name`, `Quiz_1`, `Quiz_2`, `Quiz_3`, `Quiz_4`, `Quiz_5`, `Quiz_6`, `Mid_1`, `Mid_2`, `Assignment_1`, `Assignment_2`, `Assigmnment_3`, `project_1`, `project_2`, `Final`, `Total`, `Grade`) VALUES
(1, 19145, 'Fahim Foy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `institution` varchar(150) NOT NULL,
  `Institutional_id` int(100) NOT NULL,
  `cgpa` float NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `institution`, `Institutional_id`, `cgpa`, `email`, `password`, `created_at`) VALUES
(1, 'fah', 'North South University', 1444444444, 3.5, 'foysalhiyaban333gmail.com', '1345678', '2022-07-30 02:07:37'),
(2, 'apurba', 'North South University', 19144, 3.5, 'apurba333@gmail.com', '1345678', '2022-08-08 15:24:27'),
(3, 'omayik', 'North South University', 191441, 3.5, 'omayik333@gmail.com', '1345678', '2022-08-08 23:35:40'),
(4, 'O foysal', 'North South University', 1914, 3.5, 'ofoysal@gmail.com', '1345678', '2022-08-13 17:23:52'),
(5, 'foysal', 'North South University', 1911, 3.5, 'oma@gmail.com', '1345678', '2022-08-13 19:09:01'),
(6, 'o foysal h', 'North South University', 1903, 3.5, 'ofoysalhi@gmail.com', '1345678', '2022-08-13 19:28:56'),
(7, 'hiya H', 'NSU', 19145, 3.4, 'fahimapurba@gmail.com', '134567', '2022-08-21 23:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `institution` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `institution`, `email`, `password`, `created_at`) VALUES
(1, 'foysal', 'North South University', 'foysal@gmail.com', '1345678', '2022-08-13 19:24:58'),
(2, 'Fahim Foysal ', 'North South University', 'hiyaban@gmail.com', '13456789', '2022-08-13 21:38:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `fall_cse115_15`
--
ALTER TABLE `fall_cse115_15`
  ADD PRIMARY KEY (`Student_Serial`);

--
-- Indexes for table `spring_eee451_8`
--
ALTER TABLE `spring_eee451_8`
  ADD PRIMARY KEY (`Student_Serial`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fall_cse115_15`
--
ALTER TABLE `fall_cse115_15`
  MODIFY `Student_Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spring_eee451_8`
--
ALTER TABLE `spring_eee451_8`
  MODIFY `Student_Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
