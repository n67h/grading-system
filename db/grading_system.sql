-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 09:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `email`, `first_name`, `middle_name`, `last_name`, `password`) VALUES
(1, 'arnel123', 'arnel@gmail.com', 'Arnel', 'Pabigat', 'Mosenabre', 'arnel123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `month` varchar(255) NOT NULL,
  `days_of_classes` int(10) NOT NULL,
  `days_of_absent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grades_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `year_level_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `1st_quarter` int(11) DEFAULT 0,
  `2nd_quarter` int(11) DEFAULT 0,
  `3rd_quarter` int(11) DEFAULT 0,
  `4th_quarter` int(11) DEFAULT 0,
  `final_grade` decimal(5,2) GENERATED ALWAYS AS ((`1st_quarter` + `2nd_quarter` + `3rd_quarter` + `4th_quarter`) / 4) VIRTUAL,
  `remarks` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`grades_id`, `student_id`, `year_level_id`, `subject_id`, `1st_quarter`, `2nd_quarter`, `3rd_quarter`, `4th_quarter`, `remarks`) VALUES
(67, NULL, 2, 1, 0, 0, 0, 0, ''),
(68, NULL, 2, 2, 0, 0, 0, 0, ''),
(69, NULL, 2, 3, 0, 0, 0, 0, ''),
(70, NULL, 2, 4, 0, 0, 0, 0, ''),
(71, NULL, 2, 5, 0, 0, 0, 0, ''),
(72, NULL, 2, 6, 0, 0, 0, 0, ''),
(73, NULL, 2, 7, 0, 0, 0, 0, ''),
(74, NULL, 2, 8, 0, 0, 0, 0, ''),
(75, NULL, 3, 1, 0, 0, 0, 0, ''),
(76, NULL, 3, 2, 0, 0, 0, 0, ''),
(77, NULL, 3, 3, 0, 0, 0, 0, ''),
(78, NULL, 3, 4, 0, 0, 0, 0, ''),
(79, NULL, 3, 5, 0, 0, 0, 0, ''),
(80, NULL, 3, 6, 0, 0, 0, 0, ''),
(81, NULL, 3, 7, 0, 0, 0, 0, ''),
(82, NULL, 3, 8, 0, 0, 0, 0, ''),
(83, NULL, 4, 1, 0, 0, 0, 0, ''),
(84, NULL, 4, 2, 0, 0, 0, 0, ''),
(85, NULL, 4, 3, 0, 0, 0, 0, ''),
(86, NULL, 4, 4, 0, 0, 0, 0, ''),
(87, NULL, 4, 5, 0, 0, 0, 0, ''),
(88, NULL, 4, 6, 0, 0, 0, 0, ''),
(89, NULL, 4, 7, 0, 0, 0, 0, ''),
(90, NULL, 4, 8, 0, 0, 0, 0, ''),
(91, NULL, 1, 1, 0, 0, 0, 0, ''),
(92, NULL, 1, 1, 0, 0, 0, 0, ''),
(93, NULL, 1, 2, 0, 0, 0, 0, ''),
(94, NULL, 1, 3, 0, 0, 0, 0, ''),
(95, NULL, 1, 4, 0, 0, 0, 0, ''),
(96, NULL, 1, 5, 0, 0, 0, 0, ''),
(97, NULL, 1, 6, 0, 0, 0, 0, ''),
(98, NULL, 1, 7, 0, 0, 0, 0, ''),
(99, NULL, 1, 8, 0, 0, 0, 0, ''),
(100, NULL, 2, 1, 0, 0, 0, 0, ''),
(101, NULL, 2, 2, 0, 0, 0, 0, ''),
(102, NULL, 2, 3, 0, 0, 0, 0, ''),
(103, NULL, 2, 4, 0, 0, 0, 0, ''),
(104, NULL, 2, 5, 0, 0, 0, 0, ''),
(105, NULL, 2, 6, 0, 0, 0, 0, ''),
(106, NULL, 2, 7, 0, 0, 0, 0, ''),
(107, NULL, 2, 8, 0, 0, 0, 0, ''),
(108, NULL, 3, 1, 0, 0, 0, 0, ''),
(109, NULL, 3, 2, 0, 0, 0, 0, ''),
(110, NULL, 3, 3, 0, 0, 0, 0, ''),
(111, NULL, 3, 4, 0, 0, 0, 0, ''),
(112, NULL, 3, 5, 0, 0, 0, 0, ''),
(113, NULL, 3, 6, 0, 0, 0, 0, ''),
(114, NULL, 3, 7, 0, 0, 0, 0, ''),
(115, NULL, 3, 8, 0, 0, 0, 0, ''),
(116, NULL, 4, 1, 0, 0, 0, 0, ''),
(117, NULL, 4, 2, 0, 0, 0, 0, ''),
(118, NULL, 4, 3, 0, 0, 0, 0, ''),
(119, NULL, 4, 4, 0, 0, 0, 0, ''),
(120, NULL, 4, 5, 0, 0, 0, 0, ''),
(121, NULL, 4, 6, 0, 0, 0, 0, ''),
(122, NULL, 4, 7, 0, 0, 0, 0, ''),
(123, NULL, 4, 8, 0, 0, 0, 0, ''),
(125, 11, 1, 1, 90, 99, 99, 95, ''),
(126, 11, 1, 2, 99, 99, 99, 65, ''),
(127, 11, 1, 3, 99, 99, 99, 99, ''),
(128, 11, 1, 4, 99, 99, 99, 99, ''),
(129, 11, 1, 5, 90, 99, 90, 89, ''),
(130, 11, 1, 6, 99, 99, 99, 99, ''),
(131, 11, 1, 7, 99, 99, 99, 99, ''),
(132, 11, 1, 8, 90, 90, 90, 99, ''),
(133, 11, 2, 1, 0, 0, 0, 0, ''),
(134, 11, 2, 2, 0, 0, 0, 0, ''),
(135, 11, 2, 3, 0, 0, 0, 0, ''),
(136, 11, 2, 4, 0, 0, 0, 0, ''),
(137, 11, 2, 5, 0, 0, 0, 0, ''),
(138, 11, 2, 6, 0, 0, 0, 0, ''),
(139, 11, 2, 7, 0, 0, 0, 0, ''),
(140, 11, 2, 8, 0, 0, 0, 0, ''),
(141, 11, 3, 1, 0, 0, 0, 0, ''),
(142, 11, 3, 2, 0, 0, 0, 0, ''),
(143, 11, 3, 3, 0, 0, 0, 0, ''),
(144, 11, 3, 4, 0, 0, 0, 0, ''),
(145, 11, 3, 5, 0, 0, 0, 0, ''),
(146, 11, 3, 6, 0, 0, 0, 0, ''),
(147, 11, 3, 7, 0, 0, 0, 0, ''),
(148, 11, 3, 8, 0, 0, 0, 0, ''),
(149, 11, 4, 1, 0, 0, 0, 0, ''),
(150, 11, 4, 2, 0, 0, 0, 0, ''),
(151, 11, 4, 3, 0, 0, 0, 0, ''),
(152, 11, 4, 4, 0, 0, 0, 0, ''),
(153, 11, 4, 5, 0, 0, 0, 0, ''),
(154, 11, 4, 6, 0, 0, 0, 0, ''),
(155, 11, 4, 7, 0, 0, 0, 0, ''),
(156, 11, 4, 8, 0, 0, 0, 0, ''),
(157, 12, 1, 1, 90, 99, 99, 99, ''),
(158, 12, 1, 1, 95, 99, 99, 99, ''),
(159, 12, 1, 2, 95, 99, 99, 99, ''),
(160, 12, 1, 3, 90, 90, 90, 99, ''),
(161, 12, 1, 4, 99, 99, 99, 99, ''),
(162, 12, 1, 5, 90, 90, 90, 90, ''),
(163, 12, 1, 6, 90, 90, 99, 98, ''),
(164, 12, 1, 7, 90, 90, 90, 90, ''),
(165, 12, 1, 8, 0, 0, 0, 0, ''),
(166, 12, 2, 1, 0, 0, 0, 0, ''),
(167, 12, 2, 2, 0, 0, 0, 0, ''),
(168, 12, 2, 3, 0, 0, 0, 0, ''),
(169, 12, 2, 4, 0, 0, 0, 0, ''),
(170, 12, 2, 5, 0, 0, 0, 0, ''),
(171, 12, 2, 6, 0, 0, 0, 0, ''),
(172, 12, 2, 7, 0, 0, 0, 0, ''),
(173, 12, 2, 8, 0, 0, 0, 0, ''),
(174, 12, 3, 1, 0, 0, 0, 0, ''),
(175, 12, 3, 2, 0, 0, 0, 0, ''),
(176, 12, 3, 3, 0, 0, 0, 0, ''),
(177, 12, 3, 4, 0, 0, 0, 0, ''),
(178, 12, 3, 5, 0, 0, 0, 0, ''),
(179, 12, 3, 6, 0, 0, 0, 0, ''),
(180, 12, 3, 7, 0, 0, 0, 0, ''),
(181, 12, 3, 8, 0, 0, 0, 0, ''),
(182, 12, 4, 1, 0, 0, 0, 0, ''),
(183, 12, 4, 2, 0, 0, 0, 0, ''),
(184, 12, 4, 3, 0, 0, 0, 0, ''),
(185, 12, 4, 4, 0, 0, 0, 0, ''),
(186, 12, 4, 5, 0, 0, 0, 0, ''),
(187, 12, 4, 6, 0, 0, 0, 0, ''),
(188, 12, 4, 7, 0, 0, 0, 0, ''),
(189, 12, 4, 8, 0, 0, 0, 0, ''),
(190, 18, 1, 7, 86, 85, 86, 89, ''),
(191, 18, 1, 1, 88, 93, 92, 94, ''),
(192, 18, 1, 5, 88, 89, 94, 94, ''),
(193, 18, 1, 8, 83, 84, 85, 84, ''),
(194, 18, 1, 3, 75, 78, 77, 76, ''),
(195, 18, 1, 2, 88, 89, 94, 93, ''),
(196, 18, 1, 6, 91, 94, 97, 98, ''),
(197, 18, 2, 7, 93, 94, 93, 96, ''),
(198, 18, 2, 1, 96, 97, 97, 99, ''),
(199, 18, 2, 5, 94, 95, 94, 97, ''),
(200, 18, 2, 4, 95, 96, 98, 99, ''),
(201, 18, 2, 8, 92, 93, 94, 94, ''),
(202, 18, 2, 3, 88, 84, 85, 86, ''),
(203, 18, 2, 2, 93, 94, 92, 96, ''),
(204, 18, 2, 6, 93, 95, 95, 96, ''),
(205, 18, 1, 4, 88, 89, 91, 91, ''),
(206, 20, 1, 1, 73, 0, 0, 0, ''),
(207, 20, 1, 1, 86, 0, 0, 0, ''),
(208, 20, 1, 2, 92, 0, 0, 0, ''),
(209, 20, 1, 3, 61, 0, 0, 0, ''),
(210, 20, 1, 4, 99, 0, 0, 0, ''),
(211, 20, 1, 5, 65, 0, 0, 0, ''),
(212, 20, 1, 6, 88, 0, 0, 0, ''),
(213, 20, 1, 7, 94, 0, 0, 0, ''),
(214, 20, 1, 8, 93, 0, 0, 0, ''),
(215, 20, 2, 1, 0, 0, 0, 0, ''),
(216, 20, 2, 2, 0, 0, 0, 0, ''),
(217, 20, 2, 3, 0, 0, 0, 0, ''),
(218, 20, 2, 4, 0, 0, 0, 0, ''),
(219, 20, 2, 5, 0, 0, 0, 0, ''),
(220, 20, 2, 6, 0, 0, 0, 0, ''),
(221, 20, 2, 7, 0, 0, 0, 0, ''),
(222, 20, 2, 8, 0, 0, 0, 0, ''),
(223, 20, 3, 1, 0, 0, 0, 0, ''),
(224, 20, 3, 2, 0, 0, 0, 0, ''),
(225, 20, 3, 3, 0, 0, 0, 0, ''),
(226, 20, 3, 4, 0, 0, 0, 0, ''),
(227, 20, 3, 5, 0, 0, 0, 0, ''),
(228, 20, 3, 6, 0, 0, 0, 0, ''),
(229, 20, 3, 7, 0, 0, 0, 0, ''),
(230, 20, 3, 8, 0, 0, 0, 0, ''),
(231, 20, 4, 1, 0, 0, 0, 0, ''),
(232, 20, 4, 2, 0, 0, 0, 0, ''),
(233, 20, 4, 3, 0, 0, 0, 0, ''),
(234, 20, 4, 4, 0, 0, 0, 0, ''),
(235, 20, 4, 5, 0, 0, 0, 0, ''),
(236, 20, 4, 6, 0, 0, 0, 0, ''),
(237, 20, 4, 7, 0, 0, 0, 0, ''),
(238, 20, 4, 8, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `year_level_id` int(11) DEFAULT NULL,
  `student_lrn` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_key` varchar(255) NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `year_level_id`, `student_lrn`, `first_name`, `last_name`, `middle_name`, `gender`, `birthdate`, `email`, `password`, `verification_key`, `is_verified`) VALUES
(11, 2, '2832288', 'Bogart', 'Pedring', 'Pederico', 'Male', '2004-12-12', 'bogart.pedring123@gmail.com', '$2y$10$GSwClcNJkzlWPBk459e23e4nQy75Lq/pky4v.pQfx6qP2oRFhB6QO', 'ee575715cee3ec886184bd6bb6999056', 0),
(12, 1, '12343221', 'Jaymar', 'Roco', 'Batumbakal', 'Male', '2001-04-01', 'jaymar.roco123@gmail.com', '$2y$10$26OqDKRyMmvjWJinVV7NWuh.F/QJjKn97PYA4bNihffzhN2r8skvS', '86646c200d27deb9854f74b22db978fc', 0),
(17, 2, '123123123123', 'Arnel', 'Mosenabre', 'Sandugo', 'Male', '2001-03-23', 'arnel.mosenabre@gmail.com', '$2y$10$37cuN4Xn0sMZ.KtI676wWuL1zWaINZ/t6G4zFrhAYAL3ijpfpR/pW', 'a32f034e3fb4d1b0b433f6799134442b', 0),
(18, 1, '123123123123', 'Andre Paul', 'Sta. Clara', 'Natividad', 'Male', '2000-12-22', 'andrepaul.staclara67@gmail.com', '$2y$10$XRedLh/6M5rb7Z.qgdRon.p5bLkTzI.YV7Kjzd36SA/3l34N9dBpa', '5422b8582a11281b9bde703a1223fe69', 0),
(20, 1, '12345678901', 'John Carlo', 'Regis', 'Mahina', 'Male', '2005-06-01', 'johncarlo.regis@gmail.com', '$2y$10$0giIMw6tweb6F7W04I3wcOJyopkCVzQv0cWVgHqfb6/HNPaC5kZJe', '7feab23a6bb72bc4823d9921dd208d29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject`) VALUES
(1, 'English'),
(2, 'Science'),
(3, 'Mathematics'),
(4, 'Filipino'),
(5, 'ESP'),
(6, 'TLE'),
(7, 'Araling Panlipunan'),
(8, 'MAPEH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year_level`
--

CREATE TABLE `tbl_year_level` (
  `year_level_id` int(11) NOT NULL,
  `year_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_year_level`
--

INSERT INTO `tbl_year_level` (`year_level_id`, `year_level`) VALUES
(1, 'Grade 7'),
(2, 'Grade 8'),
(3, 'Grade 9'),
(4, 'Grade 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grades_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `year_level_id` (`year_level_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `year_level_id` (`year_level_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_year_level`
--
ALTER TABLE `tbl_year_level`
  ADD PRIMARY KEY (`year_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grades_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_year_level`
--
ALTER TABLE `tbl_year_level`
  MODIFY `year_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `tbl_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD CONSTRAINT `tbl_grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_grades_ibfk_2` FOREIGN KEY (`year_level_id`) REFERENCES `tbl_year_level` (`year_level_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_grades_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`year_level_id`) REFERENCES `tbl_year_level` (`year_level_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
