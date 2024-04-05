-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 07:43 AM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `verification_id` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `company_logo` text DEFAULT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `verification_id`, `industry_id`, `name`, `company_logo`, `address`, `description`, `date_created`) VALUES
(1, 3, 1, 'wallmart', '', 'test', 'test', '2024-03-28 02:56:29'),
(2, 4, 2, 'target', '', 'test', 'test', '2024-03-28 02:56:29'),
(3, 5, 18, 'Stacktrek1', '66093268aa9ac_screencapture-localhost-primeenergyportal-dashboard-php-2024-03-19-23_29_55.png', 'Jaro Iloilo City', 'test', '2024-03-28 07:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `date_created`) VALUES
(1, 'Aerospace and Defense', '2024-03-27 08:35:24'),
(2, 'Agriculture', '2024-03-27 08:35:24'),
(3, 'Arts, Entertainment and Recreation', '2024-03-27 08:35:24'),
(4, 'Construction, Repair and Maintenance Services', '2024-03-27 08:35:24'),
(5, 'Education', '2024-03-27 08:35:24'),
(6, 'Energy, Mining and Utilities', '2024-03-27 08:35:24'),
(7, 'Financial Services', '2024-03-27 08:35:24'),
(8, 'Government and Public Administration', '2024-03-27 08:35:24'),
(9, 'Healthcare', '2024-03-27 08:35:24'),
(10, 'Hotels and Travel Accommodation', '2024-03-27 08:35:24'),
(11, 'Human Resources and Staffing', '2024-03-27 08:35:24'),
(12, 'Information Technology', '2024-03-27 08:35:24'),
(13, 'Insurance', '2024-03-27 08:35:24'),
(14, 'Legal', '2024-03-27 08:35:24'),
(15, 'Management and Consulting', '2024-03-27 08:35:24'),
(16, 'Manufacturing', '2024-03-27 08:35:24'),
(17, 'Media and Communication', '2024-03-27 08:35:24'),
(18, 'Nonprofit and NGO', '2024-03-27 08:35:24'),
(19, 'Personal Consumer Services', '2024-03-27 08:35:24'),
(20, 'Pharmaceutical and Biotechnology', '2024-03-27 08:35:24'),
(21, 'Real Estate', '2024-03-27 08:35:24'),
(22, 'Restaurants and Food Service', '2024-03-27 08:35:24'),
(23, 'Retail and Wholesale', '2024-03-27 08:35:24'),
(24, 'Telecommunications', '2024-03-27 08:35:24'),
(25, 'Transportation and Logistics', '2024-03-27 08:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` enum('applicant','employer','admin') NOT NULL,
  `avatar` text DEFAULT NULL,
  `is_password_changed` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `fname`, `mname`, `lname`, `address`, `contact`, `email`, `password`, `role`, `avatar`, `is_password_changed`, `date_created`) VALUES
(1, NULL, 'super', 'test', 'admin', '09876543', '0987654', 'admin@admin.com', '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'admin', NULL, 1, '2024-03-02'),
(5, 1, 'employer', 'test', 'test', 'test', '098765432', 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$NDJoakdGSWZGQUJVWVlSaA$ox+Oxrlnaqq7nyCqRqDYMrOMP9SfiGg2DpyAAunetlY', 'employer', NULL, 0, '2024-03-27'),
(6, 3, 'employer', 'paderan', 'tests', 'Jaro Iloilo City', '09876543', 'employer@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', '6606eda03174c_scary.png', 0, '2024-03-28'),
(7, NULL, 'employer1', 'paderan', 'montemar', 'awdawdawd', '09876543', 'montemar@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjVHc0NGTktBSlFYSk5RRA$BZ8v4OTG545pzzUQsNrmYPSWYjGuHrTY53P8Yt7b6qA', 'employer', NULL, 0, '2024-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `business_permit` varchar(250) NOT NULL,
  `status` enum('pending','denied','approved') DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `business_permit`, `status`, `message`, `date_created`, `date_updated`) VALUES
(3, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'denied', 'Denied reason: sample', '2024-03-28 07:30:35', '2024-03-31 13:03:34'),
(4, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'pending', 'Waiting for admin to validate the business permit.', '2024-03-28 07:32:11', '2024-03-31 11:14:21'),
(5, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-03-28 07:34:26', '2024-03-31 11:23:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `industry_id` (`industry_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`verification_id`) REFERENCES `verification` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
