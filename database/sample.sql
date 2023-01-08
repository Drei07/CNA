-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2023 at 03:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userId` int(145) NOT NULL,
  `adminFirst_Name` varchar(145) DEFAULT NULL,
  `adminMiddle_Name` varchar(145) DEFAULT NULL,
  `adminLast_Name` varchar(145) DEFAULT NULL,
  `adminEmail` varchar(145) DEFAULT NULL,
  `adminPassword` varchar(145) DEFAULT NULL,
  `adminStatus` enum('Y','N') DEFAULT 'N',
  `tokencode` varchar(145) DEFAULT NULL,
  `adminProfile` varchar(1145) NOT NULL DEFAULT 'profile.png',
  `account_status` enum('active','disabled') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `adminFirst_Name`, `adminMiddle_Name`, `adminLast_Name`, `adminEmail`, `adminPassword`, `adminStatus`, `tokencode`, `adminProfile`, `account_status`, `created_at`, `updated_at`) VALUES
(1, 'JOSE', 'DATU', 'SANTOS', 'Dhvsu.cna05@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'Y', '3067c59bc37c21de6bae68a65e2c9b72', 'profile-red.png', 'active', '2022-07-07 05:19:44', '2022-11-20 07:49:05'),
(11, 'MARIA', 'MARCOS', 'DUTERTE', 'sample@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'Y', '306rc59bc37c21d36bae68a65e2c9b72', 'profile-red.png', 'active', '2022-07-07 05:19:44', '2022-12-27 08:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answer` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Id`, `question_id`, `survey_id`, `user_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 197, '4', '2022-12-29 12:07:17', NULL),
(2, 5, 2, 197, '2', '2022-12-29 12:07:20', NULL),
(3, 6, 2, 197, '1', '2022-12-29 12:07:24', NULL),
(4, 8, 2, 197, '2', '2022-12-30 08:06:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `Id` int(145) NOT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`Id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dhvsu.cna05@gmail.com', 'awhrzohlbevkkkgb', '2022-07-08 04:41:51', '2022-10-24 14:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `google_recaptcha_api`
--

CREATE TABLE `google_recaptcha_api` (
  `Id` int(11) NOT NULL,
  `site_key` varchar(145) DEFAULT NULL,
  `site_secret_key` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `google_recaptcha_api`
--

INSERT INTO `google_recaptcha_api` (`Id`, `site_key`, `site_secret_key`, `created_at`, `updated_at`) VALUES
(1, '6LdiQZQhAAAAABpaNFtJpgzGpmQv2FwhaqNj2azh', '6LdiQZQhAAAAAByS6pnNjOs9xdYXMrrW2OeTFlrm', '2022-07-08 04:29:37', '2022-10-24 14:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `questions` longtext DEFAULT NULL,
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Id`, `survey_id`, `questions`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'The system works with the achievement of determined undertakings and objectiveness for all the customer/administrator tasks such as customer pre-registration, live tracking of the queue, viewing of the ticket, scanning QR-code, joining customers in the queue, and making reports', 'active', '2022-11-27 01:47:41', '2022-12-30 02:22:14'),
(5, 2, 'Are you good in English?', 'active', '2022-11-27 04:45:11', '2022-12-27 06:14:41'),
(6, 2, 'Are you good in math?', 'active', '2022-11-27 05:08:30', '2022-12-27 06:14:13'),
(7, 1, 'Sample Questions', 'active', '2022-11-27 05:20:15', '2022-12-31 01:08:33'),
(8, 2, 'Do you agree to have this system?', 'active', '2022-12-30 08:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scale`
--

CREATE TABLE `scale` (
  `Id` int(11) NOT NULL,
  `scale` varchar(145) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scale`
--

INSERT INTO `scale` (`Id`, `scale`, `created_at`, `updated_at`) VALUES
(1, 'STRONGLY AGREE', '2022-11-26 02:47:09', NULL),
(2, 'AGREE', '2022-11-26 02:47:09', '2022-11-26 02:47:55'),
(3, 'SLIGHTLY AGREE', '2022-11-26 02:47:09', '2022-11-26 02:48:02'),
(4, 'NEITHER AGREE NOR DISAGREE', '2022-11-26 02:47:09', '2022-11-26 02:48:28'),
(5, 'SLIGHTLY DISAGREE', '2022-11-26 02:47:09', '2022-11-26 02:48:42'),
(6, 'DISAGREE', '2022-11-26 02:47:09', '2022-11-26 02:48:52'),
(7, 'STRONGLY DISAGREE', '2022-11-26 02:47:09', '2022-11-26 02:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadminId` int(145) NOT NULL,
  `name` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `tokencode` varchar(145) DEFAULT NULL,
  `profile` varchar(1145) NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadminId`, `name`, `email`, `password`, `tokencode`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'JUAN, DATU', 'Dhvsu.cna05@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', '9e5a0cb44c4b0aa56e6bf74e3cda4d24', 'profile-red.png', '2022-07-03 00:09:13', '2022-10-24 14:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `Id` int(11) NOT NULL,
  `admin_id` int(145) NOT NULL,
  `title` varchar(1415) DEFAULT NULL,
  `description` varchar(145) DEFAULT NULL,
  `start_date` varchar(145) DEFAULT NULL,
  `end_date` varchar(145) DEFAULT NULL,
  `status` enum('active','disabled','delete') NOT NULL DEFAULT 'disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`Id`, `admin_id`, `title`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'sample', 'sample', '2022-11-26', '2022-11-27', 'active', '2022-11-26 06:38:48', '2022-12-29 11:24:09'),
(2, 1, 'How good is colleges subjects.', 'sample descriptions', '2022-11-25', '2022-11-27', 'active', '2022-11-26 06:46:31', '2022-12-30 05:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `Id` int(14) NOT NULL,
  `system_name` varchar(145) DEFAULT NULL,
  `system_number` varchar(145) DEFAULT NULL,
  `system_email` varchar(145) DEFAULT NULL,
  `copy_right` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`Id`, `system_name`, `system_number`, `system_email`, `copy_right`, `created_at`, `updated_at`) VALUES
(1, 'DHVSU CNA', '9776621929', 'Dhvsu.cna05@gmail.com', 'Copyright 2022 DHVSU CNA. All right reserved', '2022-07-08 12:38:28', '2022-11-26 02:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `system_logo`
--

CREATE TABLE `system_logo` (
  `Id` int(145) NOT NULL,
  `logo` varchar(1145) NOT NULL,
  `favicon` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_logo`
--

INSERT INTO `system_logo` (`Id`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'favicon.png', '2022-07-08 08:11:27', '2022-12-29 02:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `activityId` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(145) NOT NULL,
  `activity` varchar(145) NOT NULL,
  `date` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_logs`
--

INSERT INTO `tb_logs` (`activityId`, `user`, `email`, `activity`, `date`) VALUES
(1, 'User-sample.@gmail.com', 'sample.@gmail.com', 'Has successfully signed in', '2022-11-20 03:47:58 PM'),
(2, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-11-20 03:49:30 PM'),
(3, 'Superadmin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-11-20 03:49:52 PM'),
(4, 'Superadmin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-11-26 08:33:14 AM'),
(5, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-11-26 08:33:38 AM'),
(6, 'Superadmin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-11-26 09:33:22 AM'),
(7, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-11-26 10:09:32 AM'),
(8, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-11-27 09:16:53 AM'),
(9, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-11-27 07:15:27 PM'),
(10, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-11-27 07:39:49 PM'),
(11, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-11-27 08:44:40 PM'),
(12, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-14 10:08:43 AM'),
(13, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-14 10:10:04 AM'),
(14, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-27 09:08:02 AM'),
(15, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-27 11:55:10 AM'),
(16, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-27 02:11:40 PM'),
(17, 'Admin-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-27 04:24:21 PM'),
(18, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-27 04:24:47 PM'),
(19, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-29 10:42:28 AM'),
(20, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-29 11:04:54 AM'),
(21, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-29 03:19:30 PM'),
(22, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-29 03:20:52 PM'),
(23, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-29 03:21:42 PM'),
(24, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-29 03:21:55 PM'),
(25, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-29 08:02:09 PM'),
(26, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-30 04:31:35 PM'),
(27, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-30 04:32:30 PM'),
(28, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-30 07:06:59 PM'),
(29, 'Superadmin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-30 07:07:04 PM'),
(30, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-30 07:07:16 PM'),
(31, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-30 08:29:39 PM'),
(32, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2022-12-31 09:07:12 AM'),
(33, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2022-12-31 09:07:55 AM'),
(34, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2023-01-01 02:02:46 PM'),
(35, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2023-01-01 02:02:54 PM'),
(36, 'User-sample@gmail.com', 'sample@gmail.com', 'Has successfully signed in', '2023-01-07 01:44:24 PM'),
(37, 'Admin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2023-01-07 01:45:33 PM'),
(38, 'Superadmin-Dhvsu.cna05@gmail.com', 'Dhvsu.cna05@gmail.com', 'Has successfully signed in', '2023-01-07 01:46:15 PM'),
(39, 'User-andrei.m.viscayno@gmail.com', 'andrei.m.viscayno@gmail.com', 'Has successfully signed in', '2023-01-08 10:51:04 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(255) NOT NULL,
  `type_of_customer` varchar(145) DEFAULT NULL,
  `userFirst_Name` varchar(145) DEFAULT NULL,
  `userMiddle_Name` varchar(145) DEFAULT NULL,
  `userLast_Name` varchar(145) DEFAULT NULL,
  `Sex` varchar(145) DEFAULT NULL,
  `Birth_Date` varchar(145) DEFAULT NULL,
  `Age` varchar(145) DEFAULT NULL,
  `Civil_Status` varchar(145) DEFAULT NULL,
  `Religion` varchar(145) DEFAULT NULL,
  `Province` varchar(145) DEFAULT NULL,
  `City` varchar(145) DEFAULT NULL,
  `Barangay` varchar(145) DEFAULT NULL,
  `Street` varchar(145) DEFAULT NULL,
  `userPhone_Number` varchar(145) DEFAULT NULL,
  `userEmail` varchar(145) DEFAULT NULL,
  `userPassword` varchar(145) DEFAULT NULL,
  `userStatus` enum('Y','N') DEFAULT 'N',
  `tokencode` varchar(145) DEFAULT NULL,
  `userProfile` varchar(1145) NOT NULL DEFAULT 'profile.png',
  `uniqueID` varchar(145) DEFAULT NULL,
  `account_status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `type_of_customer`, `userFirst_Name`, `userMiddle_Name`, `userLast_Name`, `Sex`, `Birth_Date`, `Age`, `Civil_Status`, `Religion`, `Province`, `City`, `Barangay`, `Street`, `userPhone_Number`, `userEmail`, `userPassword`, `userStatus`, `tokencode`, `userProfile`, `uniqueID`, `account_status`, `created_at`, `updated_at`) VALUES
(197, '1', 'JOSE', 'DATU', 'SANTOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9776621929', 'sample@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'Y', '031c7fdda5d95db88e25b112b16e9d72', 'profile-red.png', '68414511', 'active', '2022-07-05 11:39:33', '2022-11-20 07:48:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `google_recaptcha_api`
--
ALTER TABLE `google_recaptcha_api`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `scale`
--
ALTER TABLE `scale`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadminId`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `system_logo`
--
ALTER TABLE `system_logo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`activityId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userId` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google_recaptcha_api`
--
ALTER TABLE `google_recaptcha_api`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scale`
--
ALTER TABLE `scale`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadminId` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_config`
--
ALTER TABLE `system_config`
  MODIFY `Id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_logo`
--
ALTER TABLE `system_logo`
  MODIFY `Id` int(145) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `activityId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
