-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 08:04 PM
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
-- Database: `tihcollegespace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `midname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email_id`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ditipriyasen84@gmail.com', 'ditipriya34', 'student', '2022-10-18 17:06:37', '2022-10-18 17:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_class`
--

CREATE TABLE `schedule_class` (
  `id` int(250) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(255) NOT NULL,
  `classlink` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_class`
--

INSERT INTO `schedule_class` (`id`, `faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `time`, `classlink`) VALUES
(1, 'Subrate Saha', 'BCA', 'SEM1', 'Alpha', 'C Programm', 'Introduction to Programming', '21-10-2022', '10:00', '00:00:00', ''),
(2, 'Subrate Saha', 'BCA', 'SEM1', 'Alpha', 'C Programm', 'Introduction to Programming', '21-10-2022', '10:00', '00:00:00', NULL),
(3, 'Subrate Saha', 'BCA', 'SEM1', 'Alpha', 'C Programm', 'Introduction to Programming', '21-10-2022', '10:00', '  ', NULL),
(5, 'Subrate Saha', 'BCA', 'SEM1', 'Alpha', 'C Programm', 'Introduction to Programming', '21-10-2022', '10:00', '  ', ''),
(6, '1', 'Subrate Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Introduction to Programming', '21-10-2022', '10:00', '  '),
(7, '2', 'subhendu Saha', 'bca', 'sem5', 'alpha', 'networking', 'encoding technique', '21-10-2022', '10.00', ''),
(8, '2', 'subhendu Saha', 'bca', 'sem5', 'alpha', 'networking', 'encoding technique', '21-10-2022', '10.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `streams_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `sem`, `streams_id`) VALUES
(1, 'SEM1', 1),
(2, 'SEM2', 1),
(3, 'SEM3', 1),
(4, 'SEM4', 1),
(5, 'SEM5', 1),
(6, 'SEM6', 1),
(7, 'SEM1', 2),
(8, 'SEM2', 2),
(9, 'SEM3', 2),
(10, 'SEM4', 2),
(11, 'SEM5', 2),
(12, 'SEM6', 2),
(13, 'SEM1', 3),
(14, 'SEM2', 3),
(15, 'SEM3', 3),
(16, 'SEM4', 3),
(17, 'SEM1', 4),
(18, 'SEM2', 4),
(19, 'SEM3', 4),
(20, 'SEM4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `stream` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream`) VALUES
(1, 'BCA'),
(2, 'BBA'),
(3, 'MCA'),
(4, 'MSC');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_number` varchar(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll_number`, `email_id`, `mobile_number`, `dob`, `stream`, `semester`, `section`, `password`, `batch`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'User1', '15201219026', 'user1@gmail.com', NULL, '03-08-2001', 'bca', 'semester1', 'alpha', '12345', '2022', '2022-10-14 16:24:20', '2022-10-14 16:24:20', NULL),
(2, 'Ditipriya Sen', '34', 'ditipriyasen84@gmail.com', '7980655884', '01-10-2002', 'bca', 'semester1', 'alpha', 'ditipriya34', '2022', '2022-10-18 17:19:59', '2022-10-18 17:19:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `semesters_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `semesters_id`) VALUES
(2, 'BCAN-102 Environment Studies', 1),
(3, 'BCAN-103 C Programming', 1),
(4, 'BMN-101 Basic Mathematical Computation', 1),
(5, 'BCAN-193 Programming Lab with C', 1),
(6, 'BCAN-181 PC Software Lab', 1),
(7, 'BCAN-201 Computer Architecture', 2),
(8, 'BCAN-202 Software Engineering', 2),
(9, 'BCAN-203 Data Structure with C', 2),
(10, 'BMN-201 Advanced Mathematical Computation', 2),
(11, 'HUN-201 English Language and Comminucation', 2),
(12, 'BCAN-293 Data Structure Lab with C', 2),
(13, 'HUN-291 Business Presentation and Language Lab', 2),
(14, 'BCAN-301 Operating System', 3),
(15, 'BCAN-E302A Object Oriented Programming with C++', 3),
(16, 'BCAN-E302B GUI Programming with .NET', 3),
(17, 'BCAN-303 Computer Graphics', 3),
(18, 'BMN-301 Mathematics for Computing', 3),
(19, 'BCAN-E392A Programming Lab with C++', 3),
(20, 'BCAN-E392B Programming Lab with .NET', 3),
(21, 'BCAN-381 Web Technology Lab', 3),
(22, 'BCAN-401 Database Management System', 4),
(23, 'BCAN-402 Programming with Java', 4),
(24, 'BCAN-403 Computer Networking', 4),
(25, 'BMN-401 Numerical Analysis', 4),
(26, 'BCAN-491 Database Lab', 4),
(27, 'BCAN-492 Programming Lab with Java', 4),
(28, 'BCAN-481 Soft Skill Development', 4),
(29, 'BCAN-501 Cyber Security', 5),
(30, 'BCAN-502 Unix and Shell Programming', 5),
(31, 'BCA(BBA)N-501 Management and Accounting', 5),
(32, 'BCAN-591 Minor Project', 5),
(33, 'BCAN-592 Linux Lab', 5),
(34, 'BCAN-583 Industrial Training', 5),
(35, 'BCAN-E601A Python Programming', 6),
(36, 'BCAN-E601B Artificial Intelligence', 6),
(37, 'BCAN-E601C E-Commerce', 6),
(38, 'BCAN-E602A Web Technology with PHP', 6),
(39, 'BCAN-E602B MySQL Advanced DBMS', 6),
(40, 'BCAN-E603C PLSQL Digital Marketing', 6),
(41, 'HUN-601 Values and Ethics of Profession', 6),
(42, 'BCAN-691 Major Project with Viva-Voce', 6),
(43, 'BBAN-101 English', 7),
(44, 'BBAN-102 Basics of Mathematics', 7),
(45, 'BBAN-103 Fundamentals of Statistics', 7),
(46, 'BBAN-104 Economics(Micro)', 7),
(47, 'BBAN-105 Computer Application', 7),
(48, 'BBAN-201 Business Communication', 8),
(49, 'BBAN-202 Advanced Mathematics and Statistics', 8),
(50, 'BBAN-203 Organizational Behaviour', 8),
(51, 'BBAN-204 Economics(Macro)', 8),
(52, 'BBAN-205 Indian Social Structure and Values & Ethics', 8),
(53, 'BBAN-301 Principles of Management', 9),
(54, 'BBAN-302 Managerial Economics', 9),
(55, 'BBAN-303 Business Laws', 9),
(56, 'BBAN-304 Financial Accounting', 9),
(57, 'BBAN-305 Environmental Sciences', 9),
(58, 'BBAN-401 Production & Materials Managemt', 10),
(59, 'BBAN-402 Management Information System', 10),
(60, 'BBAN-403 Cost Accounting', 10),
(61, 'BBAN-404 Marketing Management', 10),
(62, 'BBAN-405 Human Resource Management', 10),
(63, 'BBAN-501 Financial Management', 11),
(64, 'BBAN-502 Sales & Distribution Management', 11),
(65, 'BBAN-503 Human Resource Development', 11),
(66, 'BBAN-504 Entrepreneurship Development', 11),
(67, 'BBAN-505 Research Methodology', 11),
(68, 'BBAN-601 Management Accounting', 12),
(69, 'BBAN-602 Advertising & Sales Promotion', 12),
(70, 'BBAN-603 Industrial Relations', 12),
(71, 'BBAN-604 Public Service Management', 12),
(72, 'BBAN-605 Project and Viva', 12),
(73, 'MCA-101 Computer Organisation & Architecture', 13),
(74, 'MCA-102 Business System and Application', 13),
(75, 'MCA-103 Computer Programming with C', 13),
(76, 'MM-101 Discrete Mathematical Structure', 13),
(77, 'HU-101 Business English and Communication', 13),
(78, 'MCA-191 Micro Programming & Architecture Lab', 13),
(79, 'MCA-193 Programming Lab (C)', 13),
(80, 'HU-191 Business Presentation and Language Lab', 13),
(81, 'MCA-201 Data Communication & Computer Networks', 14),
(82, 'MCA-202 Information System Analysis & Design', 14),
(83, 'MCA-203 Data Structure with C', 14),
(84, 'MCA-204 Database Management System 1', 14),
(85, 'MCA-205 Object-Oriented Programming with C++', 14),
(86, 'MCA-293 Data Structure Lab', 14),
(87, 'MCA-294 Database Lab', 14),
(88, 'MCA-295 Object-Oriented Programming Lab', 14),
(89, 'MCA-301 Operating Systems & Systems Software', 15),
(90, 'MCA-302 Unix and Shell Programming', 15),
(91, 'MCA-303 Intelligent Systems', 15),
(92, 'MM-301 Statistics and Numerical Techniques', 15),
(93, 'MBA-301 Business Management', 15),
(94, 'MBA-302 Management Accounting', 15),
(95, 'MCA-392 Unix Lab', 15),
(96, 'MM-391 Statistics and Numerical Analysis', 15),
(97, 'MBA-392 Accounting Systems Lab', 15),
(98, 'MCA-401 Software Engineering & TQM', 16),
(99, 'MCA-402 Graphics & Multimedia', 16),
(100, 'MCA-403 Database Management System II', 16),
(101, 'MM-401 Operation Research & Optimisation Techniques', 16),
(102, 'HU-401 Environment & Ecology', 16),
(103, 'MCA-491 Software Project Management Lab', 16),
(104, 'MCA-492 Graphics & Multimedia Lab', 16),
(105, 'MCA-493 Advanced Database Lab', 16),
(106, 'MICS-101 Discrete Mathematics', 17),
(107, 'MICS-102 Linear Algebra', 17),
(108, 'MICS-103 Computer Networks', 17),
(109, 'MICS-104 Design and Analysis of Algorithms', 17),
(110, 'MICS-191 Python Programming Lab', 17),
(111, 'MICS-192 Design and Analysis of Algorithms Lab', 17),
(112, 'MICS-201 Cryptography', 18),
(113, 'MICS-202 Operating System', 18),
(114, 'MICS-203 Bayesian Networks', 18),
(115, 'MICS-204 Pattern Recognition and Machine Learning', 18),
(116, 'MICS-205 Network Security Firewalls and Virtual Private Networks', 18),
(117, 'MICS-291 Machine Learning Lab', 18),
(118, 'MICS-292 Operating System Lab', 18),
(119, 'MICS-301 Information Security Risk Management', 19),
(120, 'MICS-302 Biometric Security', 19),
(121, 'MICS-303 Data Privacy', 19),
(122, 'MICS-304 Intrusion Detection and Prevention System', 19),
(123, 'MICS-305 Wireless and Mobile Device Security', 19),
(124, 'MICS-391 Linux Systems Security Lab', 19),
(125, 'MICS-392 Wireless Security Lab', 19),
(126, 'MICS-481 Major Project', 20),
(127, 'MICS-482 Grand Viva', 20),
(128, 'MICS-E401A Security in Internet of Things', 20),
(129, 'MICS-E401B Security in Cloud Computing', 20),
(130, 'MICS-E401C Legal Issues in Cyber Security', 20),
(131, 'MICS-E402A Computer Forensics', 20),
(132, 'MICS-E402B Information Warfare', 20),
(133, 'MICS-E402C Social Network Analysis', 20);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `midname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bca` int(10) NOT NULL,
  `bba` int(11) NOT NULL,
  `mca` int(11) NOT NULL,
  `msc` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_notes`
--

CREATE TABLE `upload_notes` (
  `id` int(250) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `file` varchar(250) NOT NULL,
  `recordinglink` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_notes`
--

INSERT INTO `upload_notes` (`id`, `faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `file`, `recordinglink`) VALUES
(1, '2', 'subhendu Saha', 'bca', 'sem5', 'alpha', 'networking', 'encoding technique', '21-10-2022', '/api/notes/10_even _no.c', ''),
(2, '2', 'subhendu Saha', 'bca', 'sem5', 'alpha', 'networking', 'encoding technique', '21-10-2022', '/api/notes/10_even _no.c', ''),
(3, '2', 'subhendu Saha', 'bca', 'sem5', 'alpha', 'networking', 'encoding technique', '21-10-2022', '/api/notes/10_even _no.c', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `schedule_class`
--
ALTER TABLE `schedule_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_notes`
--
ALTER TABLE `upload_notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_class`
--
ALTER TABLE `schedule_class`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upload_notes`
--
ALTER TABLE `upload_notes`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
