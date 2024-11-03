-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 03:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `applicant_skills`
--

CREATE TABLE `applicant_skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_skills`
--

INSERT INTO `applicant_skills` (`id`, `user_id`, `skill_id`) VALUES
(38, 10, 20),
(39, 10, 14),
(40, 10, 10),
(41, 12, 19),
(42, 12, 11),
(43, 26, 6),
(44, 26, 20),
(45, 26, 14),
(46, 26, 3),
(47, 26, 11),
(48, 26, 9),
(50, 37, 21),
(53, 37, 1),
(54, 37, 26),
(55, 37, 20),
(56, 37, 3),
(57, 37, 12),
(58, 39, 8),
(59, 39, 20),
(60, 39, 1),
(61, 39, 13),
(62, 39, 26),
(63, 39, 23),
(64, 41, 24),
(65, 41, 7),
(66, 41, 23),
(67, 41, 13),
(68, 41, 6),
(242, 495, 19),
(243, 495, 11),
(244, 497, 19),
(245, 497, 11),
(246, 499, 19),
(247, 499, 11),
(248, 500, 19),
(249, 500, 11),
(250, 501, 21),
(251, 501, 1),
(252, 501, 26),
(253, 501, 20),
(254, 501, 3),
(255, 501, 12),
(256, 504, 19),
(257, 504, 11),
(258, 505, 20),
(259, 505, 14),
(260, 505, 10),
(261, 506, 24),
(262, 506, 7),
(263, 506, 23),
(264, 506, 13),
(265, 506, 6),
(266, 508, 19),
(267, 508, 11),
(268, 513, 19),
(269, 513, 11),
(270, 517, 20),
(271, 517, 14),
(272, 517, 10),
(273, 521, 6),
(274, 521, 20),
(275, 521, 14),
(276, 521, 3),
(277, 521, 11),
(278, 521, 9),
(279, 522, 19),
(280, 522, 11),
(281, 523, 24),
(282, 523, 7),
(283, 523, 23),
(284, 523, 13),
(285, 523, 6),
(286, 527, 24),
(287, 527, 7),
(288, 527, 23),
(289, 527, 13),
(290, 527, 6),
(291, 529, 19),
(292, 529, 11),
(293, 530, 6),
(294, 530, 20),
(295, 530, 14),
(296, 530, 3),
(297, 530, 11),
(298, 530, 9),
(299, 532, 19),
(300, 532, 11),
(301, 533, 24),
(302, 533, 7),
(303, 533, 23),
(304, 533, 13),
(305, 533, 6),
(306, 534, 24),
(307, 534, 7),
(308, 534, 23),
(309, 534, 13),
(310, 534, 6),
(311, 535, 19),
(312, 535, 11),
(313, 537, 19),
(314, 537, 11),
(315, 538, 19),
(316, 538, 11),
(317, 542, 19),
(318, 542, 11),
(319, 543, 8),
(320, 543, 20),
(321, 543, 1),
(322, 543, 13),
(323, 543, 26),
(324, 543, 23),
(325, 544, 19),
(326, 544, 11),
(327, 546, 24),
(328, 546, 7),
(329, 546, 23),
(330, 546, 13),
(331, 546, 6),
(332, 547, 24),
(333, 547, 7),
(334, 547, 23),
(335, 547, 13),
(336, 547, 6),
(337, 549, 21),
(338, 549, 1),
(339, 549, 26),
(340, 549, 20),
(341, 549, 3),
(342, 549, 12),
(343, 550, 24),
(344, 550, 7),
(345, 550, 23),
(346, 550, 13),
(347, 550, 6),
(348, 551, 19),
(349, 551, 11),
(350, 552, 20),
(351, 552, 14),
(352, 552, 10),
(353, 553, 19),
(354, 553, 11),
(355, 556, 19),
(356, 556, 11),
(357, 557, 19),
(358, 557, 11),
(359, 560, 24),
(360, 560, 7),
(361, 560, 23),
(362, 560, 13),
(363, 560, 6),
(364, 561, 19),
(365, 561, 11),
(366, 566, 21),
(367, 566, 1),
(368, 566, 26),
(369, 566, 20),
(370, 566, 3),
(371, 566, 12),
(372, 567, 6),
(373, 567, 20),
(374, 567, 14),
(375, 567, 3),
(376, 567, 11),
(377, 567, 9),
(378, 568, 19),
(379, 568, 11),
(380, 569, 19),
(381, 569, 11);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `status` enum('Applied','Interviewing','Not selected by employer','Hired','Withdrawn','Terminated','Resigned') NOT NULL,
  `setup` varchar(32) DEFAULT NULL,
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp(),
  `interview_date` text DEFAULT NULL,
  `interview_time` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_separated` timestamp NULL DEFAULT NULL,
  `date_hired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `job_id`, `status`, `setup`, `date_applied`, `interview_date`, `interview_time`, `date_modified`, `date_separated`, `date_hired`) VALUES
(1, NULL, 9, 'Withdrawn', NULL, '2024-04-25 08:38:33', NULL, NULL, '2024-11-01 19:46:54', '2024-05-18 07:58:38', '2024-05-18 15:51:06'),
(2, NULL, 7, 'Not selected by employer', 'Online', '2024-04-25 08:41:01', '2024-04-26', '16:40 - 17:30', '2024-11-01 19:46:31', '2024-05-18 07:58:38', '2024-05-18 15:51:06'),
(3, NULL, 9, 'Applied', NULL, '2024-04-25 19:21:48', NULL, NULL, '2024-04-25 19:21:48', '2024-05-18 07:58:38', '2024-05-18 15:51:06'),
(4, 10, 7, 'Withdrawn', 'Online', '2024-04-25 22:27:53', NULL, NULL, '2024-11-01 19:46:31', '2024-05-18 07:58:38', '2024-05-18 15:51:06'),
(5, 10, 7, 'Hired', 'Online', '2024-04-25 22:28:27', '2024-04-29', '08:30 - 09:30', '2024-11-01 19:46:31', '2024-05-18 07:58:38', '2024-05-18 15:51:06'),
(6, 11, 11, 'Resigned', 'Online', '2024-05-07 17:26:32', '2024-05-13', '02:28 - 02:28', '2024-11-01 19:46:31', '2024-06-16 09:04:56', '2024-06-16 17:04:28'),
(7, 25, 12, 'Hired', 'On site', '2024-05-18 15:44:02', '2024-11-04', '16:48 - 18:50', '2024-11-01 20:20:23', NULL, '2024-11-02 04:20:23'),
(8, 26, 7, 'Applied', NULL, '2024-05-20 08:21:26', NULL, NULL, '2024-05-20 08:21:26', NULL, NULL),
(9, 37, 31, 'Applied', NULL, '2024-05-20 16:27:35', NULL, NULL, '2024-05-20 16:27:35', NULL, NULL),
(10, 37, 30, 'Applied', NULL, '2024-05-20 16:27:51', NULL, NULL, '2024-05-20 16:27:51', NULL, NULL),
(11, 37, 34, 'Resigned', 'Online', '2024-05-20 16:47:24', '2024-05-21', '00:49 - 00:49', '2024-11-01 19:46:31', '2024-05-20 16:50:27', '2024-05-21 00:50:02'),
(12, 39, 18, 'Resigned', 'Online', '2024-05-21 05:08:33', '2024-05-22', '15:00 - 17:59', '2024-11-01 19:46:31', '2024-05-21 05:19:18', '2024-05-21 13:18:31'),
(13, 41, 35, 'Resigned', 'Online', '2024-05-21 06:51:18', '2024-05-22', '15:00 - 16:00', '2024-11-01 19:46:31', '2024-05-21 07:02:13', '2024-05-21 14:58:33'),
(14, 41, 11, 'Applied', NULL, '2024-05-21 07:01:15', NULL, NULL, '2024-05-21 07:01:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `verification_id` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `company_logo` text DEFAULT NULL,
  `district` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `verification_id`, `industry_id`, `name`, `contact`, `email`, `company_logo`, `district`, `address`, `description`, `date_created`) VALUES
(1, 3, 1, 'wallmart', NULL, NULL, '', 'Iloilo City Proper', NULL, 'test', '2024-03-28 02:56:29'),
(2, 4, 2, 'target', NULL, NULL, '', 'Jaro Iloilo City', NULL, 'test', '2024-03-28 02:56:29'),
(3, 5, 18, 'Stacktrek1', NULL, NULL, '66093268aa9ac_screencapture-localhost-primeenergyportal-dashboard-php-2024-03-19-23_29_55.png', 'Jaro Iloilo City', NULL, 'test', '2024-03-28 07:34:35'),
(4, 6, 2, 'test', NULL, NULL, '6610e4e001528_wallpapers-hd-7974-8304-hd-wallpapers.jpg', 'Molo Iloilo City', NULL, 'test', '2024-04-06 06:00:06'),
(5, NULL, NULL, 'sample', NULL, NULL, NULL, '', NULL, '', '2024-04-18 09:46:26'),
(6, NULL, NULL, 'holiday', NULL, NULL, NULL, '', NULL, '', '2024-04-18 11:29:33'),
(7, NULL, NULL, 'reklamador', NULL, NULL, NULL, '', NULL, '', '2024-04-18 11:33:07'),
(8, NULL, NULL, 'Company', NULL, NULL, NULL, '', NULL, '', '2024-04-25 22:24:09'),
(9, 10, 12, 'Company & co', '0987654', 'test3@gmail.com', '6648cb39b0cba_Screenshot 2024-05-13 160850.png', 'La Paz Iloilo City', 'test', 'tqwffasda', '2024-05-18 15:37:29'),
(10, NULL, NULL, 'GrowForward', NULL, NULL, NULL, '', NULL, '', '2024-05-20 08:10:17'),
(11, 11, 19, 'SM Company', NULL, NULL, '664b46ba7c7e1_sm.png', 'Mandurriao Iloilo City', NULL, 'SM Supermalls, also simply known as SM is a chain of shopping malls owned by Philippines-based SM Prime. As of May 2024, it has a total of 96 malls (88 in the Philippines, 8 in the People\'s Republic of China). It was also formerly known as Shoemart. You\'re always welcome here.', '2024-05-20 12:48:58'),
(12, 12, 12, 'Virtuoso master Web Design and Development Services', NULL, NULL, '664b4902dc61d_images.png', 'Molo Iloilo City', NULL, 'Our main goal focuses on Web Based Application, Web Development & Design, SEO Marketing/Internet Marketing, Web Hosting and Outsourcing Services. We always take pride in the fact that we continue to escalate in these fields of expertise: WordPress, JQuery, System Admin, and PHP-MSQL.', '2024-05-20 12:58:42'),
(13, 13, 10, 'Iloilo Skyways Travel And Tours', NULL, NULL, '664b4a5d64396_images (1).jpg', 'Jaro Iloilo City', NULL, 'A travel agency is a private retailer or public service that provides travel and tourism-related services to the general public on behalf of accommodation or travel suppliers to offer different kinds of travelling packages for each destination.', '2024-05-20 13:04:29'),
(14, 14, 9, 'Healthway QualiMed Hospital Iloilo', NULL, NULL, '664b4be8c8c1d_large_F2PLSMWE63D67SLV4PBC-575e7396.jpg', 'Mandurriao Iloilo City', NULL, 'QualiMed Hospital - Iloilo was initially envisioned as a regional center for women\'s and children\'s health in the Panay area and the Western Visayas.', '2024-05-20 13:11:04'),
(15, 15, 5, 'Hua Siong College of Iloilo ', NULL, NULL, '664b4d412917a_349ffca3-791a-4296-8bc8-14a38faa4f89.jpg', 'Iloilo City Proper', NULL, 'Hua Siong offers academic courses from basic education all the way up to tertiary levels in the programs of business and information and computing sciences. The education system of the school is based mainly in Mandarin, Filipino English languages.', '2024-05-20 13:16:49'),
(16, 16, 2, 'Pacifica Agrivet Supplies', NULL, NULL, '664b4e9656a6f_images (1).png', 'Arevalo Iloilo City', NULL, 'Agrivet supply plays a crucial role in contributing to people\'s livelihoods. It encompasses farming-related commercial activities such as production, processing, and distribution of agricultural commodities, which are essential for socioeconomic transformation and job creation in Africa', '2024-05-20 13:22:30'),
(17, 17, 4, 'Citi hardware', NULL, NULL, '664b507bb6323_images (2).jpg', 'Lapuz Iloilo City', NULL, 'CitiHardware is committed to providing its customers “Great Value Everyday” on products, made from the finest quality materials, at a price you can afford for building projects and home improvement needs.', '2024-05-20 13:30:35'),
(18, 18, 24, 'One virtual global', NULL, NULL, '664b5199a848b_images (3).jpg', 'La Paz Iloilo City', NULL, 'We are a business process outsourcing company located in Iloilo City, a fast-developing business capital in the Philippines. We are a leading provider of virtual assistant services and other business solutions for business professionals, startups, and entrepreneurs across the US, UK and Canada.', '2024-05-20 13:35:21'),
(19, 19, 19, 'Stronghold insurance company ', NULL, NULL, '664b52e957759_images (4).jpg', 'Iloilo City Proper', NULL, 'We aspire to provide non-life insurance service to corporate clients and individual including the ordinary Filipino family to have a basic insurance protection. We intend to cover the Philippine market with non-life insurance lines including Fire, Motor, Marine, Casualty and Suretyship.', '2024-05-20 13:40:57'),
(20, 20, 21, 'Filipino Homes', NULL, NULL, '664b53b439080_images (5).jpg', 'Jaro Iloilo City', NULL, 'Iloilo Filipino Homes, Iloilo City, Philippines. 63 likes. Buy/sell/Rent/Foreclosure filipinohomes.com leuterio Realty & Brokerage.', '2024-05-20 13:44:20'),
(21, 21, 12, 'Sally Company', NULL, NULL, '664b7b73d8c17_images.png', 'Arevalo Iloilo City', NULL, 'hehehehehe', '2024-05-20 16:33:55'),
(22, 22, 16, 'Honda', NULL, NULL, '664c31881c30e_honda-motorcycles-logo-11.png', 'Iloilo City Proper', NULL, 'Honda Motor Co., Ltd. is a global leader in automotive innovation, known for its commitment to quality, performance, and sustainability. With a legacy of engineering excellence spanning over seven decades, Honda continues to push the boundaries of automotive design and technology.', '2024-05-21 05:30:48'),
(23, 23, 16, 'Robinson Mall', NULL, NULL, '664c41e9bea77_honda-motorcycles-logo-11.png', 'Iloilo City Proper', NULL, 'hehehehehehe', '2024-05-21 06:40:41'),
(410, 411, 24, 'SM City Iloilo', 'awd', 'awd@awd.com', NULL, 'Arevalo Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(411, 412, 18, 'Robinson\'s Mall Iloilo', NULL, NULL, NULL, 'Iloilo City Proper', NULL, '', '2024-09-05 14:17:12'),
(412, 413, 24, 'Ayala Mall Iloilo', NULL, NULL, NULL, 'Mandurriao Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(413, 414, 12, 'Megaworld Lifestyle Mall', NULL, NULL, NULL, 'Molo Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(414, 415, 24, 'Jollibee', NULL, NULL, NULL, 'Jaro Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(415, 416, 18, 'McDonald\'s', NULL, NULL, NULL, 'Mandurriao Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(416, 417, 1, 'Chowking', NULL, NULL, NULL, 'Mandurriao Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(417, 418, 2, 'Mang Inasal', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(418, 419, 10, 'KFC', NULL, NULL, NULL, 'Arevalo Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(419, 420, 9, 'Starbucks', NULL, NULL, NULL, 'Iloilo City Proper', NULL, '', '2024-09-05 14:17:12'),
(420, 421, 4, 'Coca-Cola Philippines', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(421, 422, 10, 'San Miguel Brewery', NULL, NULL, NULL, 'Mandurriao Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(422, 423, 10, 'Philippine National Bank (PNB)', NULL, NULL, NULL, 'Jaro Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(423, 424, 9, 'Bank of the Philippine Islands (BPI)', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(424, 425, 5, 'Metropolitan Bank and Trust Company (Metrobank)', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(425, 426, 16, 'Union Bank of the Philippines', NULL, NULL, NULL, 'La Paz Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(426, 427, 9, 'Philippine Long Distance Telephone Company (PLDT)', NULL, NULL, NULL, 'Molo Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(427, 428, 10, 'Globe Telecom', NULL, NULL, NULL, 'Arevalo Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(428, 429, 21, 'Smart Communications', NULL, NULL, NULL, 'Mandurriao Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(429, 430, 2, 'Iloilo Doctors Hospital', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(430, 431, 2, 'Western Visayas Medical Center', NULL, NULL, NULL, 'Arevalo Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(431, 432, 9, 'St. Paul\'s Hospital Iloilo', NULL, NULL, NULL, 'Jaro Iloilo City', NULL, '', '2024-09-05 14:17:12'),
(432, 433, 24, 'University of the Philippines Visayas', NULL, NULL, NULL, 'Iloilo City Proper', NULL, '', '2024-09-05 14:17:12'),
(433, 434, 24, 'Central Philippine University', NULL, NULL, NULL, 'Jaro Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(434, 435, 2, 'Iloilo Science and Technology Park', NULL, NULL, NULL, 'Arevalo Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(435, 436, 2, 'Iloilo Economic Zone', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(436, 437, 24, 'Urban Planner', NULL, NULL, NULL, 'Jaro Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(437, 438, 2, 'Health Program Coordinator', NULL, NULL, NULL, 'Lapuz Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(438, 439, 24, 'Iloilo City Water Supply System (ICWSS)', NULL, NULL, NULL, 'Iloilo City Proper', NULL, '', '2024-09-05 14:17:13'),
(439, 440, 2, 'Metro Iloilo Hospital', NULL, NULL, NULL, 'Arevalo Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(440, 441, 24, 'Telus', NULL, NULL, NULL, 'Molo Iloilo City', NULL, '', '2024-09-05 14:17:13'),
(441, 442, 24, 'Iloilo Supermart', NULL, NULL, NULL, 'Iloilo City Proper', NULL, '', '2024-09-05 14:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attainment_id` int(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `school_name` text NOT NULL,
  `sy` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `attainment_id`, `course`, `school_name`, `sy`) VALUES
(4, 10, 5, 'Information Technology', 'School', '2021'),
(5, 11, 3, NULL, 'Test', '2324'),
(6, 12, 1, NULL, 'Test', '2024'),
(7, 25, 8, 'Information System', 'WVSU', '2024'),
(8, 26, 9, 'Information System', 'WVSU', '2025'),
(9, 37, 9, 'Information System', 'WVSU', '2024'),
(10, 39, 9, 'BSIS', 'WVSU', '2024'),
(11, 41, 9, 'Information System', 'WVSU', '2024'),
(14, 43, 1, NULL, 'Test', '2324'),
(15, 43, 2, NULL, 'Test', '2324'),
(99, 495, 1, NULL, 'Test', '2024'),
(100, 496, 3, NULL, 'Test', '2324'),
(101, 497, 1, NULL, 'Test', '2024'),
(102, 498, 1, NULL, 'Test', '2324'),
(103, 498, 2, NULL, 'Test', '2324'),
(104, 499, 1, NULL, 'Test', '2024'),
(105, 500, 1, NULL, 'Test', '2024'),
(106, 501, 9, 'Information System', 'WVSU', '2024'),
(107, 502, 3, NULL, 'Test', '2324'),
(108, 503, 3, NULL, 'Test', '2324'),
(109, 504, 1, NULL, 'Test', '2024'),
(110, 505, 5, 'Information Technology', 'School', '2021'),
(111, 506, 9, 'Information System', 'WVSU', '2024'),
(112, 507, 8, 'Information System', 'WVSU', '2024'),
(113, 508, 1, NULL, 'Test', '2024'),
(114, 509, 8, 'Information System', 'WVSU', '2024'),
(115, 510, 8, 'Information System', 'WVSU', '2024'),
(116, 511, 8, 'Information System', 'WVSU', '2024'),
(117, 512, 1, NULL, 'Test', '2324'),
(118, 512, 2, NULL, 'Test', '2324'),
(119, 513, 1, NULL, 'Test', '2024'),
(120, 514, 3, NULL, 'Test', '2324'),
(121, 515, 1, NULL, 'Test', '2324'),
(122, 515, 2, NULL, 'Test', '2324'),
(123, 516, 1, NULL, 'Test', '2324'),
(124, 516, 2, NULL, 'Test', '2324'),
(125, 517, 5, 'Information Technology', 'School', '2021'),
(126, 518, 1, NULL, 'Test', '2324'),
(127, 518, 2, NULL, 'Test', '2324'),
(128, 519, 8, 'Information System', 'WVSU', '2024'),
(129, 520, 8, 'Information System', 'WVSU', '2024'),
(130, 521, 9, 'Information System', 'WVSU', '2025'),
(131, 522, 1, NULL, 'Test', '2024'),
(132, 523, 9, 'Information System', 'WVSU', '2024'),
(133, 524, 8, 'Information System', 'WVSU', '2024'),
(134, 525, 8, 'Information System', 'WVSU', '2024'),
(135, 526, 3, NULL, 'Test', '2324'),
(136, 527, 9, 'Information System', 'WVSU', '2024'),
(137, 528, 8, 'Information System', 'WVSU', '2024'),
(138, 529, 1, NULL, 'Test', '2024'),
(139, 530, 9, 'Information System', 'WVSU', '2025'),
(140, 531, 3, NULL, 'Test', '2324'),
(141, 532, 1, NULL, 'Test', '2024'),
(142, 533, 9, 'Information System', 'WVSU', '2024'),
(143, 534, 9, 'Information System', 'WVSU', '2024'),
(144, 535, 1, NULL, 'Test', '2024'),
(145, 536, 8, 'Information System', 'WVSU', '2024'),
(146, 537, 1, NULL, 'Test', '2024'),
(147, 538, 1, NULL, 'Test', '2024'),
(148, 539, 8, 'Information System', 'WVSU', '2024'),
(149, 540, 3, NULL, 'Test', '2324'),
(150, 541, 3, NULL, 'Test', '2324'),
(151, 542, 1, NULL, 'Test', '2024'),
(152, 543, 9, 'BSIS', 'WVSU', '2024'),
(153, 544, 1, NULL, 'Test', '2024'),
(154, 545, 8, 'Information System', 'WVSU', '2024'),
(155, 546, 9, 'Information System', 'WVSU', '2024'),
(156, 547, 9, 'Information System', 'WVSU', '2024'),
(157, 548, 1, NULL, 'Test', '2324'),
(158, 548, 2, NULL, 'Test', '2324'),
(159, 549, 9, 'Information System', 'WVSU', '2024'),
(160, 550, 9, 'Information System', 'WVSU', '2024'),
(161, 551, 1, NULL, 'Test', '2024'),
(162, 552, 5, 'Information Technology', 'School', '2021'),
(163, 553, 1, NULL, 'Test', '2024'),
(164, 554, 8, 'Information System', 'WVSU', '2024'),
(165, 555, 3, NULL, 'Test', '2324'),
(166, 556, 1, NULL, 'Test', '2024'),
(167, 557, 1, NULL, 'Test', '2024'),
(168, 558, 3, NULL, 'Test', '2324'),
(169, 559, 8, 'Information System', 'WVSU', '2024'),
(170, 560, 9, 'Information System', 'WVSU', '2024'),
(171, 561, 1, NULL, 'Test', '2024'),
(172, 562, 3, NULL, 'Test', '2324'),
(173, 563, 8, 'Information System', 'WVSU', '2024'),
(174, 564, 3, NULL, 'Test', '2324'),
(175, 565, 3, NULL, 'Test', '2324'),
(176, 566, 9, 'Information System', 'WVSU', '2024'),
(177, 567, 9, 'Information System', 'WVSU', '2025'),
(178, 568, 1, NULL, 'Test', '2024'),
(179, 569, 1, NULL, 'Test', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `educational_attainment`
--

CREATE TABLE `educational_attainment` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_attainment`
--

INSERT INTO `educational_attainment` (`id`, `name`, `date_created`) VALUES
(1, 'Less than high school', '2024-04-17 06:53:11'),
(2, 'High school', '2024-04-17 06:53:11'),
(3, 'Graduated from high school', '2024-04-17 06:53:11'),
(4, 'Vocational Course', '2024-04-17 06:53:11'),
(5, 'Completed vocational course', '2024-04-17 06:53:11'),
(6, 'Associate\'s studies', '2024-04-17 06:53:11'),
(7, 'Completed associate\'s degree', '2024-04-17 06:53:11'),
(8, 'Bachelor\'s studies', '2024-04-17 06:53:11'),
(9, 'Bachelor\'s degree graduate', '2024-04-17 06:53:11'),
(10, 'Graduate studies (Masters)', '2024-04-17 06:53:11'),
(11, 'Master\'s degree graduate', '2024-04-17 06:53:11'),
(12, 'Post-graduate studies (Doctorate)', '2024-04-17 06:53:11'),
(13, 'Doctoral degree', '2024-04-17 06:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `experience_list`
--

CREATE TABLE `experience_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience_list`
--

INSERT INTO `experience_list` (`id`, `name`, `date_created`) VALUES
(1, 'Testing', '2024-04-25 03:33:09'),
(2, 'Sales', '2024-04-25 03:39:27'),
(3, 'Content Creation', '2024-04-25 03:39:34'),
(4, 'No Experience Needed', '2024-04-25 03:46:53'),
(5, 'SQL', '2024-04-25 22:35:16'),
(6, 'PHP', '2024-04-25 22:35:16'),
(7, 'Teaching', '2024-05-20 15:31:56'),
(8, 'Counseling', '2024-05-20 15:31:56'),
(9, 'Business', '2024-05-20 15:36:27'),
(10, 'Management', '2024-05-20 15:36:27'),
(11, 'Contact Center Operation', '2024-05-20 15:41:57'),
(12, 'Delivery Operation', '2024-05-20 15:41:57'),
(13, 'Patient Education', '2024-05-20 15:48:31'),
(14, 'Prenatal And Postpartum Care', '2024-05-20 15:48:31'),
(15, 'Childbirth', '2024-05-20 15:48:31'),
(16, 'Code', '2024-05-20 15:59:42'),
(17, 'Developer', '2024-05-20 16:01:54'),
(18, 'C++', '2024-05-20 16:43:37');

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
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `type` varchar(32) NOT NULL,
  `experience_level` varchar(32) NOT NULL,
  `location_type` varchar(32) NOT NULL,
  `schedule` text NOT NULL,
  `pay` varchar(32) DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `company_id`, `title`, `type`, `experience_level`, `location_type`, `schedule`, `pay`, `benefits`, `qualifications`, `experience`, `description`, `status`, `date_created`) VALUES
(7, 1, 'Test1', 'Full time', '2 years', 'Remote (WFH)', '[\"4 hour shift\",\"8 hour shift\",\"Monday to Friday\"]', '5,001.50 - 1,000.20 per month', '[\"Vision insurance\",\"Flexible schedule\"]', '[2,3]', NULL, 'test1', 'active', '2024-04-24 20:12:22'),
(8, 1, 'Test', 'Contract', 'Under 1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '5,001.00 - 10,001.00 per day', '[\"Health insurance\",\"Retirement plan\"]', '[1,2]', NULL, 'Test', 'active', '2024-04-25 03:39:38'),
(9, 1, 'Test 3', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"8 hour shift\",\"10 hour shift\"]', '500.00 - 1,000.00 per day', '[\"Paid time off\",\"Dental insurance\",\"Vision insurance\"]', '[6,7]', '[4]', 'test', 'active', '2024-04-25 03:46:53'),
(10, 1, 'Sample', 'Full time', '1 year', 'On Site', '[\"8 hour shift\",\"Monday to Friday\"]', '500.00 - 1,000.00 per month', '[\"Paid time off\",\"Dental insurance\",\"Vision insurance\"]', '[14,20,21]', '[4,5,6]', 'job description', 'active', '2024-04-25 22:35:16'),
(11, 3, 'Job Test', 'Full time', 'No experience needed', 'On Site', '[\"4 hour shift\",\"8 hour shift\",\"10 hour shift\"]', '25,000.00 - 50,000.00 per month', '[\"Flexible schedule\",\"Life insurance\",\"Retirement plan\"]', '[4,5,6]', '[4]', 'testawdaw', 'active', '2024-05-07 17:25:33'),
(12, 9, 'Web', 'Full time', 'Under 1 year', 'On Site', '[\"Monday to Friday\"]', '500.00 - 600.00 per hour', '[\"Flexible schedule\",\"Health saving account\"]', '[3]', '[1]', 'hehehehheh ', 'active', '2024-05-18 15:42:55'),
(13, 20, 'Director Of Sales', 'Part time', '1 year', 'Hybrid', '[\"Monday to Friday\",\"On Call\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\"]', '[22,23,24,25]', '[2]', 'Real Estate Agents should focus on showcasing their sales record, client satisfaction, and knowledge of the local market. Including a professional summary or objective statement, relevant certifications, and education can also add value to the resume.', 'active', '2024-05-20 13:55:32'),
(14, 20, 'Property Managment', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Paid time off\",\"Referral program\",\"Employee discount\"]', '[1,6,9,24]', '[2]', 'A Property Manager  looks after properties, both residential and commercial. They liaise between tenants and property owners – including making sure that each party is aware of their legal rights and obligations – and arrange for routine maintenance and inspections.', 'active', '2024-05-20 13:57:43'),
(15, 20, 'Property Renovation Coordination', 'Full time', '1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Paid time off\",\"Dental insurance\",\"Vision insurance\",\"Flexible schedule\",\"Life insurance\"]', '[1,7,25]', 'null', 'A property coordinator manages property-related tasks and facilitates the rental and sale of properties. They collaborate with accountants, bookkeepers, the sales team, and the property manager.', 'active', '2024-05-20 14:01:34'),
(16, 19, 'Insurance Broker', 'Full time', 'No experience needed', 'Remote (WFH)', '[\"8 hour shift\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\"]', '[1,6,25]', '[2]', 'Learn about the buyer\'s business operations. Evaluate the buyer\'s needs. Explore the buyer\'s risk tolerance, and. Provide options and advice on how different insurance products will address the buyer\'s needs.', 'active', '2024-05-20 14:48:17'),
(17, 19, 'Insurance Broker Admin Assistant ', 'Full time', '1 year', 'On Site', '[\"8 hour shift\"]', '500.00 - 550.00 per day', '[\"Health insurance\",\"Paid time off\",\"Dental insurance\"]', '[2,6,7]', '[2]', 'An insurance administrative assistant handles administrative responsibilities for an insurance office. Your duties can vary slightly depending on the details of your position. Most administrative assistants answer calls, schedule appointments or consultations, file documents, and perform data entry tasks.', 'active', '2024-05-20 14:51:16'),
(18, 18, ' Sales Trainer', 'Full time', '3 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Paid time off\",\"Vision insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[1,6]', '[2]', 'Conducts exercise sessions for new and current sales employees. Observes sales encounters and collects feedback, results, and performance data of trainees after sessions. Coordinates with other sales trainers and sales managers.<br />\r\n', 'active', '2024-05-20 14:56:46'),
(19, 18, 'Research Assistant', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Employee discount\",\"Health saving account\"]', '[1,6]', '[2]', 'In the research assistant role, you will assist in the research process by collecting experimental data, preparing presentations, and proofreading manuscripts. A key element in this role is adhering to procedures and protocols provided by primary researchers.<br />\r\n', 'active', '2024-05-20 15:01:05'),
(20, 17, 'Senior Accountant', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\"]', '[1,2,6]', '[2]', 'A Senior Accountant is a mid-level professional who oversees the company\'s accounting department. They take ownership for every aspect that goes into producing an organization\'s report, from cost-productivity and margins all the way down to expenditures.<br />\r\n', 'active', '2024-05-20 15:05:48'),
(21, 17, 'Project Manager', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\"]', '[2,6,7]', '[2]', 'Organization and follow-through are a big part of a project manager\'s role. From creating an accurate timeline of project completion to ensuring tasks are finished within the confines of the assignment, the project manager must remain aware of how the project is progressing.', 'active', '2024-05-20 15:08:32'),
(22, 16, 'Local Expert Researcher/ Climate Economist', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[1,5,6]', '[2]', 'We do research and develop solutions on challenging topics faced by the society and publish our results for the greater benefits of humans and society. We aim to provide new insights to the Public and International development sectors to spend their resources in a smart and meaningful way.<br />\r\n', 'active', '2024-05-20 15:13:23'),
(23, 16, 'Business Development Manager (AgriTech)', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\"]', '[5,6,22]', '[2]', 'Own the full sales cycle, from qualifying leads to closing new deals. Manage day-to-day relationships with partners including commercial, legal, financial, and marketing aspects. Advance and establish new opportunities with existing relationships and define revenue opportunities.<br />\r\n', 'active', '2024-05-20 15:19:46'),
(24, 15, 'School Councilor', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-05-20 15:31:56'),
(25, 15, 'School Registrar', 'Full time', '3 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6,24,25]', '[7,9,10]', 'A Registrar processes registration requests and manages academic records for students, such as grades and class schedules, and keeps a permanent record of grades for each student.<br />\r\n', 'active', '2024-05-20 15:36:27'),
(26, 14, 'Nurse', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\"]', '[2,6,7,12]', '[11,12]', 'Assessing, observing, and speaking to patients. Recording details and symptoms of patient medical history and current health. Preparing patients for exams and treatment. Administering medications and treatments, and then monitoring patients for side effects and reactions.', 'active', '2024-05-20 15:41:57'),
(27, 14, 'Midwife', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,7]', '[13,14,15]', 'Equipping mothers and families with information, emotional support and reassurance. Monitoring the health of patients and their children. Assisting mothers in the care of their newborn. Ordering diagnostic tests and recording patients\' vital signs, including blood pressure, temperature and pulse.<br />\r\n', 'active', '2024-05-20 15:48:31'),
(28, 13, 'Travel Agent', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-05-20 15:53:21'),
(29, 13, 'Tourist Guide', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"On Call\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Employee assistance program\"]', '[6,7]', '[2]', 'Tour guides plan and implement scheduled activities for guests at an establishment or on a tour. They curate a standard itinerary, making minor adjustments based on the group\'s demographic and preferences. Tour guides inform tourists about a location\'s common practices, history, and prohibited acts.<br />\r\n', 'active', '2024-05-20 15:56:13'),
(30, 12, 'Web Designer', 'Full time', '3 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[3,26]', '[5,6,16]', 'A Web Designer, or Web Applications Designer, is responsible for designing the overall layout and aesthetic for websites. Their duties include coding webpages or entire websites, meeting with clients to review website templates or refine their designs and running tests to preview layouts and website features. <br />\r\n', 'active', '2024-05-20 15:59:42'),
(31, 12, 'Web Developer', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[1,2,3]', '[5,6,17]', 'A web developer is a technical professional responsible for building applications and websites hosted on the internet, typically working in close collaboration with a graphic designer or product manager to translate programming logic and design ideas into web-compatible code.<br />\r\n', 'active', '2024-05-20 16:01:54'),
(32, 11, 'Cashier ', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,4,6]', '[2,9,10]', 'Handle cash and credit card transactions accurately and efficiently. Maintain a clean and organized work environment. Assist customers with any questions or concerns they may have. Count and balance cash drawer at the end of each shift.<br />\r\n', 'active', '2024-05-20 16:04:39'),
(33, 11, 'Bagger', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,5]', '[2]', ' Baggers are responsible for packaging items into paper, plastic, or reusable bags at checkout lanes in retail and grocery stores. As a bagger, your job duties include sorting and placing merchandise in bags according to the type of item and weight, and you take extra precautions for fragile items.<br />\r\n', 'active', '2024-05-20 16:06:27'),
(34, 21, 'Programmer', 'Full time', '1 year', 'Hybrid', '[\"Monday to Friday\",\"On Call\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Dental insurance\",\"Vision insurance\",\"Life insurance\"]', '[3,14,20,26]', '[5,6,18]', 'Computer programmers write, modify, and test code and scripts that allow computer software and applications to function properly. They turn the designs created by software developers and engineers into instructions that a computer can follow.', 'active', '2024-05-20 16:43:37'),
(35, 23, 'Web Developer', 'Full time', 'Under 1 year', 'Remote (WFH)', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Dental insurance\",\"Vision insurance\",\"Life insurance\"]', '[1,2,3,6]', '[5,6]', 'Job description', 'active', '2024-05-21 06:49:57'),
(806, 410, 'Mall Operations Manager', 'Full time', '3 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[3,26]', '[5,6,16]', 'A Web Designer, or Web Applications Designer, is responsible for designing the overall layout and aesthetic for websites. Their duties include coding webpages or entire websites, meeting with clients to review website templates or refine their designs and running tests to preview layouts and website features. <br />\r\n', 'active', '2024-09-05 14:17:12'),
(807, 410, 'Customer Service Assistant', 'Full time', 'No experience needed', 'On Site', '[\"4 hour shift\",\"8 hour shift\",\"10 hour shift\"]', '25,000.00 - 50,000.00 per month', '[\"Flexible schedule\",\"Life insurance\",\"Retirement plan\"]', '[4,5,6]', '[4]', 'testawdaw', 'active', '2024-09-05 14:17:12'),
(808, 411, 'Leasing Manager', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[1,2,3]', '[5,6,17]', 'A web developer is a technical professional responsible for building applications and websites hosted on the internet, typically working in close collaboration with a graphic designer or product manager to translate programming logic and design ideas into web-compatible code.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(809, 411, 'Marketing Officer ', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(810, 412, 'Events Coordinator', 'Full time', '3 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[3,26]', '[5,6,16]', 'A Web Designer, or Web Applications Designer, is responsible for designing the overall layout and aesthetic for websites. Their duties include coding webpages or entire websites, meeting with clients to review website templates or refine their designs and running tests to preview layouts and website features. <br />\r\n', 'active', '2024-09-05 14:17:12'),
(811, 412, 'Retail Leasing Assistant', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(812, 413, 'Property Manager', 'Full time', 'No experience needed', 'Remote (WFH)', '[\"8 hour shift\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\"]', '[1,6,25]', '[2]', 'Learn about the buyer\'s business operations. Evaluate the buyer\'s needs. Explore the buyer\'s risk tolerance, and. Provide options and advice on how different insurance products will address the buyer\'s needs.', 'active', '2024-09-05 14:17:12'),
(813, 413, 'Sales and Marketing Associate', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,4,6]', '[2,9,10]', 'Handle cash and credit card transactions accurately and efficiently. Maintain a clean and organized work environment. Assist customers with any questions or concerns they may have. Count and balance cash drawer at the end of each shift.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(814, 414, 'Store Manager', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\"]', '[2,6,7,12]', '[11,12]', 'Assessing, observing, and speaking to patients. Recording details and symptoms of patient medical history and current health. Preparing patients for exams and treatment. Administering medications and treatments, and then monitoring patients for side effects and reactions.', 'active', '2024-09-05 14:17:12'),
(815, 414, 'Crew Member', 'Full time', '1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Paid time off\",\"Dental insurance\",\"Vision insurance\",\"Flexible schedule\",\"Life insurance\"]', '[1,7,25]', 'null', 'A property coordinator manages property-related tasks and facilitates the rental and sale of properties. They collaborate with accountants, bookkeepers, the sales team, and the property manager.', 'active', '2024-09-05 14:17:12'),
(816, 415, 'Assistant Restaurant Manager', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(817, 415, 'Service Crew', 'Full time', '3 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Paid time off\",\"Vision insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[1,6]', '[2]', 'Conducts exercise sessions for new and current sales employees. Observes sales encounters and collects feedback, results, and performance data of trainees after sessions. Coordinates with other sales trainers and sales managers.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(818, 416, 'Shift Supervisor', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\"]', '[1,2,6]', '[2]', 'A Senior Accountant is a mid-level professional who oversees the company\'s accounting department. They take ownership for every aspect that goes into producing an organization\'s report, from cost-productivity and margins all the way down to expenditures.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(819, 416, 'Kitchen Staff', 'Full time', '1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Paid time off\",\"Dental insurance\",\"Vision insurance\",\"Flexible schedule\",\"Life insurance\"]', '[1,7,25]', 'null', 'A property coordinator manages property-related tasks and facilitates the rental and sale of properties. They collaborate with accountants, bookkeepers, the sales team, and the property manager.', 'active', '2024-09-05 14:17:12'),
(820, 417, 'Restaurant Supervisor', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(821, 417, 'Cashier', 'Full time', '3 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[3,26]', '[5,6,16]', 'A Web Designer, or Web Applications Designer, is responsible for designing the overall layout and aesthetic for websites. Their duties include coding webpages or entire websites, meeting with clients to review website templates or refine their designs and running tests to preview layouts and website features. <br />\r\n', 'active', '2024-09-05 14:17:12'),
(822, 418, 'Operations Supervisor', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"8 hour shift\",\"10 hour shift\"]', '500.00 - 1,000.00 per day', '[\"Paid time off\",\"Dental insurance\",\"Vision insurance\"]', '[6,7]', '[4]', 'test', 'active', '2024-09-05 14:17:12'),
(823, 418, 'Delivery Rider', 'Full time', '3 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Paid time off\",\"Vision insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[1,6]', '[2]', 'Conducts exercise sessions for new and current sales employees. Observes sales encounters and collects feedback, results, and performance data of trainees after sessions. Coordinates with other sales trainers and sales managers.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(824, 419, 'Barista', 'Contract', 'Under 1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '5,001.00 - 10,001.00 per day', '[\"Health insurance\",\"Retirement plan\"]', '[1,2]', NULL, 'Test', 'active', '2024-09-05 14:17:12'),
(825, 419, 'Store Supervisor', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(826, 420, 'Sales Account Executive', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,5]', '[2]', ' Baggers are responsible for packaging items into paper, plastic, or reusable bags at checkout lanes in retail and grocery stores. As a bagger, your job duties include sorting and placing merchandise in bags according to the type of item and weight, and you take extra precautions for fragile items.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(827, 420, 'Quality Assurance Analyst', 'Full time', '3 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Paid time off\",\"Vision insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[1,6]', '[2]', 'Conducts exercise sessions for new and current sales employees. Observes sales encounters and collects feedback, results, and performance data of trainees after sessions. Coordinates with other sales trainers and sales managers.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(828, 421, 'Production Supervisor', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\"]', '[1,2,6]', '[2]', 'A Senior Accountant is a mid-level professional who oversees the company\'s accounting department. They take ownership for every aspect that goes into producing an organization\'s report, from cost-productivity and margins all the way down to expenditures.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(829, 421, 'Marketing Specialist', 'Full time', '1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Paid time off\",\"Dental insurance\",\"Vision insurance\",\"Flexible schedule\",\"Life insurance\"]', '[1,7,25]', 'null', 'A property coordinator manages property-related tasks and facilitates the rental and sale of properties. They collaborate with accountants, bookkeepers, the sales team, and the property manager.', 'active', '2024-09-05 14:17:12'),
(830, 422, 'Branch Operations Officer', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\"]', '[1,2,6]', '[2]', 'A Senior Accountant is a mid-level professional who oversees the company\'s accounting department. They take ownership for every aspect that goes into producing an organization\'s report, from cost-productivity and margins all the way down to expenditures.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(831, 422, 'Credit Analyst', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"On Call\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Employee assistance program\"]', '[6,7]', '[2]', 'Tour guides plan and implement scheduled activities for guests at an establishment or on a tour. They curate a standard itinerary, making minor adjustments based on the group\'s demographic and preferences. Tour guides inform tourists about a location\'s common practices, history, and prohibited acts.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(832, 423, 'Relationship Manager', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,4,6]', '[2,9,10]', 'Handle cash and credit card transactions accurately and efficiently. Maintain a clean and organized work environment. Assist customers with any questions or concerns they may have. Count and balance cash drawer at the end of each shift.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(833, 423, 'Teller', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\"]', '[5,6,22]', '[2]', 'Own the full sales cycle, from qualifying leads to closing new deals. Manage day-to-day relationships with partners including commercial, legal, financial, and marketing aspects. Advance and establish new opportunities with existing relationships and define revenue opportunities.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(834, 424, 'Loan Officer', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,7]', '[13,14,15]', 'Equipping mothers and families with information, emotional support and reassurance. Monitoring the health of patients and their children. Assisting mothers in the care of their newborn. Ordering diagnostic tests and recording patients\' vital signs, including blood pressure, temperature and pulse.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(835, 424, 'Customer Service Representative', 'Full time', 'No experience needed', 'On Site', '[\"4 hour shift\",\"8 hour shift\",\"10 hour shift\"]', '25,000.00 - 50,000.00 per month', '[\"Flexible schedule\",\"Life insurance\",\"Retirement plan\"]', '[4,5,6]', '[4]', 'testawdaw', 'active', '2024-09-05 14:17:12'),
(836, 425, 'IT Specialist', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(837, 425, 'Financial Analyst', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"On Call\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Employee assistance program\"]', '[6,7]', '[2]', 'Tour guides plan and implement scheduled activities for guests at an establishment or on a tour. They curate a standard itinerary, making minor adjustments based on the group\'s demographic and preferences. Tour guides inform tourists about a location\'s common practices, history, and prohibited acts.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(838, 426, 'Network Engineer', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\"]', '[1,2,6]', '[2]', 'A Senior Accountant is a mid-level professional who oversees the company\'s accounting department. They take ownership for every aspect that goes into producing an organization\'s report, from cost-productivity and margins all the way down to expenditures.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(839, 426, 'Customer Service Representative', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(840, 427, 'Business Analyst', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(841, 427, 'Field Technician', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"8 hour shift\",\"10 hour shift\"]', '500.00 - 1,000.00 per day', '[\"Paid time off\",\"Dental insurance\",\"Vision insurance\"]', '[6,7]', '[4]', 'test', 'active', '2024-09-05 14:17:12'),
(842, 428, 'Sales Executive', 'Full time', '3 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Paid time off\",\"Vision insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[1,6]', '[2]', 'Conducts exercise sessions for new and current sales employees. Observes sales encounters and collects feedback, results, and performance data of trainees after sessions. Coordinates with other sales trainers and sales managers.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(843, 428, 'Technical Support Engineer', 'Part time', 'Under 1 year', 'Remote (WFH)', '[\"On Call\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Employee assistance program\"]', '[6,7]', '[2]', 'Tour guides plan and implement scheduled activities for guests at an establishment or on a tour. They curate a standard itinerary, making minor adjustments based on the group\'s demographic and preferences. Tour guides inform tourists about a location\'s common practices, history, and prohibited acts.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(844, 429, 'Registered Nurse', 'Full time', 'No experience needed', 'On Site', '[\"4 hour shift\",\"8 hour shift\",\"10 hour shift\"]', '25,000.00 - 50,000.00 per month', '[\"Flexible schedule\",\"Life insurance\",\"Retirement plan\"]', '[4,5,6]', '[4]', 'testawdaw', 'active', '2024-09-05 14:17:12'),
(845, 429, 'Laboratory Technician', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[1,2,3]', '[5,6,17]', 'A web developer is a technical professional responsible for building applications and websites hosted on the internet, typically working in close collaboration with a graphic designer or product manager to translate programming logic and design ideas into web-compatible code.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(846, 430, 'Radiologic Technologist', 'Full time', 'No experience needed', 'Remote (WFH)', '[\"8 hour shift\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\"]', '[1,6,25]', '[2]', 'Learn about the buyer\'s business operations. Evaluate the buyer\'s needs. Explore the buyer\'s risk tolerance, and. Provide options and advice on how different insurance products will address the buyer\'s needs.', 'active', '2024-09-05 14:17:12'),
(847, 430, 'Pharmacist', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[1,2,3]', '[5,6,17]', 'A web developer is a technical professional responsible for building applications and websites hosted on the internet, typically working in close collaboration with a graphic designer or product manager to translate programming logic and design ideas into web-compatible code.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(848, 431, 'Medical Technologist', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(849, 431, 'Administrative Officer', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[1,2,3]', '[5,6,17]', 'A web developer is a technical professional responsible for building applications and websites hosted on the internet, typically working in close collaboration with a graphic designer or product manager to translate programming logic and design ideas into web-compatible code.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(850, 432, 'Assistant Professor', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(851, 432, 'Research Associate', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:12'),
(852, 433, 'Academic Coordinator', 'Full time', '3 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[3,26]', '[5,6,16]', 'A Web Designer, or Web Applications Designer, is responsible for designing the overall layout and aesthetic for websites. Their duties include coding webpages or entire websites, meeting with clients to review website templates or refine their designs and running tests to preview layouts and website features. <br />\r\n', 'active', '2024-09-05 14:17:13'),
(853, 433, 'IT Support Specialist', 'Full time', '2 years', 'Remote (WFH)', '[\"4 hour shift\",\"8 hour shift\",\"Monday to Friday\"]', '5,001.50 - 1,000.20 per month', '[\"Vision insurance\",\"Flexible schedule\"]', '[2,3]', NULL, 'test1', 'active', '2024-09-05 14:17:13'),
(854, 434, 'Project Manager', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\"]', '[2,6,7,12]', '[11,12]', 'Assessing, observing, and speaking to patients. Recording details and symptoms of patient medical history and current health. Preparing patients for exams and treatment. Administering medications and treatments, and then monitoring patients for side effects and reactions.', 'active', '2024-09-05 14:17:13'),
(855, 434, 'Research and Development Specialist', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,4,6]', '[2,9,10]', 'Handle cash and credit card transactions accurately and efficiently. Maintain a clean and organized work environment. Assist customers with any questions or concerns they may have. Count and balance cash drawer at the end of each shift.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(856, 435, 'Business Development Officer', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[2,6,12]', '[7,8]', 'School counselors play a vital role in supporting students\' academic, career, and personal development. They provide individualized guidance to help students create academic plans, navigate career choices, and address personal challenges.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(857, 435, 'Economic Analyst', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(858, 436, 'Public Information Officer', 'Full time', 'No experience needed', 'On Site', '[\"4 hour shift\",\"8 hour shift\",\"10 hour shift\"]', '25,000.00 - 50,000.00 per month', '[\"Flexible schedule\",\"Life insurance\",\"Retirement plan\"]', '[4,5,6]', '[4]', 'testawdaw', 'active', '2024-09-05 14:17:13'),
(859, 436, 'Iloilo Provincial Government', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(860, 437, 'Administrative Assistant', 'Full time', '1 year', 'On Site', '[\"8 hour shift\",\"Monday to Friday\"]', '500.00 - 1,000.00 per month', '[\"Paid time off\",\"Dental insurance\",\"Vision insurance\"]', '[14,20,21]', '[4,5,6]', 'job description', 'active', '2024-09-05 14:17:13'),
(861, 437, 'Philippine Ports Authority (PPA)', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,4,6]', '[2,9,10]', 'Handle cash and credit card transactions accurately and efficiently. Maintain a clean and organized work environment. Assist customers with any questions or concerns they may have. Count and balance cash drawer at the end of each shift.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(862, 438, 'Water Treatment Operator', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Employee assistance program\"]', '[2,6]', '[2]', 'Travel agents offer advice on destinations, plan trip itineraries, and make travel arrangements for clients. Travel agents sell transportation, lodging, and admission to entertainment activities to individuals and groups planning trips.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(863, 438, 'Environmental Engineer', 'Contract', 'Under 1 year', 'Remote (WFH)', '[\"Monday to Friday\",\"On Call\"]', '5,001.00 - 10,001.00 per day', '[\"Health insurance\",\"Retirement plan\"]', '[1,2]', NULL, 'Test', 'active', '2024-09-05 14:17:13'),
(864, 439, 'Registered Nurse', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\"]', '[5,6,22]', '[2]', 'Own the full sales cycle, from qualifying leads to closing new deals. Manage day-to-day relationships with partners including commercial, legal, financial, and marketing aspects. Advance and establish new opportunities with existing relationships and define revenue opportunities.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(865, 439, 'Laboratory Technician', 'Full time', '2 years', 'On Site', '[\"Monday to Friday\"]', '600.00 - 700.00 per day', '[\"Health insurance\",\"Life insurance\",\"Health saving account\",\"Employee assistance program\"]', '[1,4,6]', '[2,9,10]', 'Handle cash and credit card transactions accurately and efficiently. Maintain a clean and organized work environment. Assist customers with any questions or concerns they may have. Count and balance cash drawer at the end of each shift.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(866, 440, 'IT Specialist', 'Full time', 'No experience needed', 'On Site', '[\"4 hour shift\",\"8 hour shift\",\"10 hour shift\"]', '25,000.00 - 50,000.00 per month', '[\"Flexible schedule\",\"Life insurance\",\"Retirement plan\"]', '[4,5,6]', '[4]', 'testawdaw', 'active', '2024-09-05 14:17:13'),
(867, 440, 'Financial Analyst', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\"]', '[5,6,22]', '[2]', 'Own the full sales cycle, from qualifying leads to closing new deals. Manage day-to-day relationships with partners including commercial, legal, financial, and marketing aspects. Advance and establish new opportunities with existing relationships and define revenue opportunities.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(868, 441, 'Branch Manager', 'Full time', '2 years', 'Remote (WFH)', '[\"Monday to Friday\"]', '500.00 - 600.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\"]', '[5,6,22]', '[2]', 'Own the full sales cycle, from qualifying leads to closing new deals. Manage day-to-day relationships with partners including commercial, legal, financial, and marketing aspects. Advance and establish new opportunities with existing relationships and define revenue opportunities.<br />\r\n', 'active', '2024-09-05 14:17:13'),
(869, 441, 'Cashier', 'Full time', '4 years', 'On Site', '[\"Monday to Friday\"]', '1,000.00 - 1,500.00 per day', '[\"Health insurance\",\"Life insurance\",\"Retirement plan\",\"Health saving account\",\"Professional development assistance\",\"Employee assistance program\"]', '[1,2,3]', '[5,6,17]', 'A web developer is a technical professional responsible for building applications and websites hosted on the internet, typically working in close collaboration with a graphic designer or product manager to translate programming logic and design ideas into web-compatible code.<br />\r\n', 'active', '2024-09-05 14:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `job_preference`
--

CREATE TABLE `job_preference` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `job_types` text DEFAULT NULL,
  `work_schedules` text DEFAULT NULL,
  `base_pay` varchar(55) DEFAULT NULL,
  `location_type` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_preference`
--

INSERT INTO `job_preference` (`id`, `user_id`, `job_title`, `job_types`, `work_schedules`, `base_pay`, `location_type`) VALUES
(4, 11, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(5, 24, '[\"web\"]', NULL, NULL, '500 per hour', NULL),
(6, 26, '[\"web\"]', '[\"Part time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\"],\"schedules\":[\"Flextime\"]}', '500 per hour', '[\"On Site\"]'),
(7, 37, '[\"Web Developer\",\"Web Designer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Day shift\"],\"schedules\":[\"Flextime\"]}', '1,000 per day', '[\"Remote (WFH)\"]'),
(8, 39, '[\"Data Analyst\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '1,000 per day', '[\"Remote (WFH)\"]'),
(9, 41, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(10, 25, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(56, 496, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(57, 501, '[\"Web Developer\",\"Web Designer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Day shift\"],\"schedules\":[\"Flextime\"]}', '1,000 per day', '[\"Remote (WFH)\"]'),
(58, 502, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(59, 503, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(60, 506, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(61, 507, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(62, 509, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(63, 510, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(64, 511, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(65, 514, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(66, 519, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(67, 520, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(68, 521, '[\"web\"]', '[\"Part time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\"],\"schedules\":[\"Flextime\"]}', '500 per hour', '[\"On Site\"]'),
(69, 523, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(70, 524, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(71, 525, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(72, 526, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(73, 527, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(74, 528, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(75, 530, '[\"web\"]', '[\"Part time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\"],\"schedules\":[\"Flextime\"]}', '500 per hour', '[\"On Site\"]'),
(76, 531, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(77, 533, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(78, 534, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(79, 536, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(80, 539, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(81, 540, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(82, 541, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(83, 543, '[\"Data Analyst\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '1,000 per day', '[\"Remote (WFH)\"]'),
(84, 545, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(85, 546, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(86, 547, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(87, 549, '[\"Web Developer\",\"Web Designer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Day shift\"],\"schedules\":[\"Flextime\"]}', '1,000 per day', '[\"Remote (WFH)\"]'),
(88, 550, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(89, 554, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(90, 555, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(91, 558, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(92, 559, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(93, 560, '[\"Web Developer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Fixed shift\"],\"schedules\":[\"Flextime\"]}', '500 per day', '[\"Remote (WFH)\"]'),
(94, 562, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(95, 563, '[\"tourist guide\",\"travel agent\"]', '[\"Full time\"]', NULL, NULL, NULL),
(96, 564, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(97, 565, '[\"test\",\"test 2\"]', '[\"Full time\",\"Part time\",\"Permanent\",\"Fixed term\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\",\"10 hour shift\"]}', '40,000 per month', '[\"Remote (WFH)\"]'),
(98, 566, '[\"Web Developer\",\"Web Designer\"]', '[\"Full time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"Day shift\"],\"schedules\":[\"Flextime\"]}', '1,000 per day', '[\"Remote (WFH)\"]'),
(99, 567, '[\"web\"]', '[\"Part time\"]', '{\"days\":[\"Monday to Friday\"],\"shifts\":[\"8 hour shift\"],\"schedules\":[\"Flextime\"]}', '500 per hour', '[\"On Site\"]');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `otp` varchar(45) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `user_id`, `otp`, `date_created`) VALUES
(11, NULL, '128021', '2024-05-18 14:06:43'),
(12, NULL, '740375', '2024-05-18 14:10:06'),
(13, NULL, '112777', '2024-05-18 14:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rated_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `soft_skills` int(11) NOT NULL,
  `communication` int(11) NOT NULL,
  `flexibility` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rated_by`, `company_id`, `soft_skills`, `communication`, `flexibility`, `feedback`, `date_created`) VALUES
(5, 11, 6, NULL, 0, 0, 0, 'test ', '2024-05-09 15:45:05'),
(6, 11, 7, NULL, 0, 0, 0, 'test 3', '2024-05-09 15:45:05'),
(7, 25, 24, NULL, 3, 2, 1, 'wwwwweee', '2024-05-18 15:45:39'),
(8, 37, 38, NULL, 0, 0, 0, 'good employee', '2024-05-20 16:50:54'),
(9, 39, 34, NULL, 0, 0, 0, 'he\'s okay but he resigned', '2024-05-21 05:20:42'),
(10, 41, 42, NULL, 0, 0, 0, 'fdfadadfafw', '2024-05-21 07:04:27'),
(12, 25, 24, NULL, 3, 2, 1, 'wwwwweee', '2024-05-18 15:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `search_keywords`
--

CREATE TABLE `search_keywords` (
  `id` int(11) NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_keywords`
--

INSERT INTO `search_keywords` (`id`, `keywords`) VALUES
(8, 'UI Designer'),
(9, 'test'),
(10, 'test'),
(11, 'test'),
(12, 'sample'),
(13, 'sample'),
(14, 'Cashier'),
(15, 'Cashier'),
(16, '');

-- --------------------------------------------------------

--
-- Table structure for table `skills_list`
--

CREATE TABLE `skills_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills_list`
--

INSERT INTO `skills_list` (`id`, `name`, `date_created`) VALUES
(1, 'Customer Service', '2024-04-18 18:50:39'),
(2, 'Organizational Skills', '2024-04-18 18:50:39'),
(3, 'Microsoft Skills', '2024-04-18 18:50:39'),
(4, 'Cashiering', '2024-04-18 18:50:39'),
(5, 'Maintenance', '2024-04-18 18:50:39'),
(6, 'Communication Skills', '2024-04-18 18:50:39'),
(7, 'Leadership', '2024-04-18 18:50:39'),
(8, 'Cash Handling', '2024-04-18 18:50:39'),
(9, 'Time Management', '2024-04-18 18:50:39'),
(10, 'Problem-solving', '2024-04-18 18:50:39'),
(11, 'Creativity', '2024-04-18 18:50:39'),
(12, 'Work Ethic', '2024-04-18 18:50:39'),
(13, 'Attention to Detail', '2024-04-18 18:50:39'),
(14, 'Frontend', '2024-04-18 19:50:29'),
(19, 'Testing', '2024-04-24 20:07:38'),
(20, 'UI Design', '2024-04-25 22:25:30'),
(21, 'Custom Qualification', '2024-04-25 22:35:16'),
(22, 'Marketing', '2024-05-20 13:55:32'),
(23, 'Finance', '2024-05-20 13:55:32'),
(24, 'Accounting', '2024-05-20 13:55:32'),
(25, 'Business', '2024-05-20 13:55:32'),
(26, 'Developer', '2024-05-20 15:59:42');

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
  `address` text NOT NULL,
  `district` text DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `position` text DEFAULT NULL,
  `password` text NOT NULL,
  `role` enum('applicant','employer','admin') NOT NULL,
  `avatar` text DEFAULT NULL,
  `is_password_changed` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `fname`, `mname`, `lname`, `address`, `district`, `contact`, `email`, `position`, `password`, `role`, `avatar`, `is_password_changed`, `date_created`) VALUES
(1, NULL, 'admin', 'test', 'admin', 'Iloilo City', 'Iloilo City Proper', '0987654', 'admin@admin.com', 'HR', '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'admin', NULL, 1, '2024-03-02'),
(5, 1, 'employer', 'test', 'test', 'Rizal', 'Iloilo City Proper', '098765432', 'test@test.com', 'test', '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-03-27'),
(6, 3, 'employer', 'paderan', 'tests', 'awdawdawd', 'Jaro Iloilo City', '09876543', 'employer@gmail.com', 'test 2', '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', '6606eda03174c_scary.png', 0, '2024-03-28'),
(7, 410, 'employer1', 'paderan', 'montemar', '', 'Arevalo Iloilo City', '09876543', 'montemar@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-03-29'),
(10, NULL, 'test', 'test', 'test', '', 'Jaro Iloilo City', '0987654', 'test1@test.test', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', '662ad877d42eb_wallpapersden.com_smiley-glitch-dark-black_1360x768.jpg', 0, '2024-04-26'),
(11, NULL, 'test', 'test', 'test', 'test 123', 'Iloilo City Proper', '09876543', 'test2@test.test', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-06'),
(12, NULL, 'test', 'test', 'test', 'test', 'Iloilo City Proper', '87652', 'test3@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-09'),
(24, 9, 'jerry', 'a', 'tom', 'CENTRO', 'La Paz Iloilo City', '1234', 'nikkidedomingo@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-18'),
(25, NULL, 'nikki ', 'a', 'de domingo', 'CENTRO', 'Jaro Iloilo City', '09090909091', 'nikkidedomingo5@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-18'),
(26, NULL, 'sally', 'Hortilano', 'Planco', 'Janiuay', 'Iloilo City Proper', '09636641647', 'sally.planco@wvsu.edu.ph', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-20'),
(27, 11, 'Regine ', 'C.', 'GAROCHE', 'san jose ', 'Jaro Iloilo City', '098754674289', 'regine@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(28, 12, 'Joshua', 'A', 'Garcia', 'San Juan', 'Molo Iloilo City', '098754674289', 'joshua@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(29, 13, 'Sally', 'B', 'Lee', 'Tabuk Suba', 'Jaro Iloilo City', '09645464536', 'sally.lee@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(30, 14, 'Nikki ', 'D', 'Camp', 'Atria Park District', 'Mandurriao Iloilo City', '098754674289', 'camp.12@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(31, 15, 'Ryan', 'M.', 'Chua', 'Balabago', 'Iloilo City Proper', '098754674289', 'ryan@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(32, 16, 'James', 'C', 'Blue', 'Osmen\'a St, Villa', 'Arevalo Iloilo City', '09645464536', 'james.123@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(33, 17, 'Elzear ', 'C', 'Dee', 'Luna', 'Lapuz Iloilo City', '09645464536', 'elzear.1@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(34, 18, 'Andrea', 'G.', 'Planco', 'Maria Bldg', 'Jaro Iloilo City', '09876543210', 'andrea.00@gmail.com', 'HR Manager ', '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(35, 19, 'Strong', 'H.', 'Green', 'burgos', 'Iloilo City Proper', '09636641647', 'strong@gmail', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(36, 20, 'Cindy', 'F', 'Merzo', 'Burgoz', 'Jaro Iloilo City', '09876543210', 'cindy@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-20'),
(37, NULL, 'Regine ', 'A.', 'KO', 'Balabago', 'Jaro Iloilo City', '098754674289', 'plancosally@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-21'),
(38, 21, 'Alice', 'W', 'Guo', 'BanBan bldg', 'Arevalo Iloilo City', '098754674289', 'alice@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-21'),
(39, NULL, 'Reynor', 'Segura', 'Merzo', 'oton', 'La Paz Iloilo City', '09098786324', 'reynor.merzo@wvsu.edu.ph', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-21'),
(40, 22, 'Emily', 'Fallarco', 'Naluis', 'Miag-ao', 'Lapuz Iloilo City', '09097654321', 'employer01@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-21'),
(41, NULL, 'Sally', 'Dias', 'Lee', 'JANIUAY', 'Jaro Iloilo City', '098754674289', 'nikki.dedomingo@wvsu.edu.ph', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'applicant', NULL, 0, '2024-05-21'),
(42, 23, 'Markie', 'Bee', 'Garotchie', 'San Juan', 'Iloilo City Proper', '09645464536', 'sally.planco@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-05-21'),
(43, NULL, 'john', 'p', 'montemar', 'san isidro', 'Jaro Iloilo City', '0987654', 'montemar1@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-06-16'),
(44, 411, 'awd', 'awd', 'awd', 'awd', 'Iloilo City Proper', '0987654', 'montemartest@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$MXpvRnZFbWM5bUJuejFXaQ$Ft4jsW7pTDtIsR+loy0E8PrmGSbwOIMfViK0lABsS3Q', 'employer', NULL, 0, '2024-07-11'),
(389, 412, 'Francisca', NULL, 'Cervantes', 'San Juan', 'Mandurriao Iloilo City', '2155554695', 'franciscacervantes@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(390, 413, 'Jesus', NULL, 'Fernandez', 'Atria Park District', 'Molo Iloilo City', '+34 913 728 555', 'jesusfernandez@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(391, 414, 'Brian', NULL, 'Chandler', 'Luna', 'Jaro Iloilo City', '2155554369', 'brianchandler@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(392, 415, 'Patricia ', NULL, 'McKenna', 'awdawdawd', 'Mandurriao Iloilo City', '2967 555', 'patricia mckenna@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(393, 416, 'Laurence ', NULL, 'Lebihan', 'Luna', 'Mandurriao Iloilo City', '91.24.4555', 'laurence lebihan@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(394, 417, 'Paul ', NULL, 'Henriot', 'San Juan', 'Lapuz Iloilo City', '26.47.1555', 'paul henriot@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(395, 418, 'Armand', NULL, 'Kuger', 'Atria Park District', 'Arevalo Iloilo City', '+27 21 550 3555', 'armandkuger@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(396, 419, 'Wales', NULL, 'MacKinlay', 'Luna', 'Iloilo City Proper', '64-9-3763555', 'walesmackinlay@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(397, 420, 'Karin', NULL, 'Josephs', 'Osmen\'a St, Villa', 'Lapuz Iloilo City', '0251-555259', 'karinjosephs@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(398, 421, 'Juri', NULL, 'Yoshido', 'Luna', 'Mandurriao Iloilo City', '6175559555', 'juriyoshido@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(399, 422, 'Dorothy', NULL, 'Young', 'San Juan', 'Jaro Iloilo City', '6035558647', 'dorothyyoung@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(400, 423, 'Lino ', NULL, 'Rodriguez', 'awdawdawd', 'Lapuz Iloilo City', '(1) 354-2555', 'lino rodriguez@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(401, 424, 'Braun', NULL, 'Urs', 'San Juan', 'Lapuz Iloilo City', '0452-076555', 'braunurs@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(402, 425, 'Allen', NULL, 'Nelson', 'Iloilo City', 'La Paz Iloilo City', '6175558555', 'allennelson@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(403, 426, 'Pascale ', NULL, 'Cartrain', 'Osmen\'a St, Villa', 'Molo Iloilo City', '(071) 23 67 2555', 'pascale cartrain@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(404, 427, 'Georg ', NULL, 'Pipps', 'awdawdawd', 'Arevalo Iloilo City', '6562-9555', 'georg pipps@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(405, 428, 'Arnold', NULL, 'Cruz', 'Osmen\'a St, Villa', 'Mandurriao Iloilo City', '+63 2 555 3587', 'arnoldcruz@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(406, 429, 'Maurizio ', NULL, 'Moroni', 'CENTRO', 'Lapuz Iloilo City', '0522-556555', 'maurizio moroni@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(407, 430, 'Akiko', NULL, 'Shimamura', 'Iloilo City', 'Arevalo Iloilo City', '+81 3 3584 0555', 'akikoshimamura@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(408, 431, 'Dominique', NULL, 'Perrier', 'Iloilo City', 'Jaro Iloilo City', '(1) 47.55.6555', 'dominiqueperrier@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(409, 432, 'Rita ', NULL, 'Müller', 'San Juan', 'Iloilo City Proper', '0711-555361', 'rita müller@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(410, 433, 'Sarah', NULL, 'McRoy', 'Iloilo City', 'Jaro Iloilo City', '04 499 9555', 'sarahmcroy@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(411, 434, 'Michael', NULL, 'Donnermeyer', 'Iloilo City', 'Arevalo Iloilo City', ' +49 89 61 08 9555', 'michaeldonnermeyer@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(412, 435, 'Maria', NULL, 'Hernandez', 'CENTRO', 'Lapuz Iloilo City', '2125558493', 'mariahernandez@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(413, 436, 'Alexander ', NULL, 'Feuer', 'CENTRO', 'Jaro Iloilo City', '0342-555176', 'alexander feuer@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(414, 437, 'Dan', NULL, 'Lewis', 'Osmen\'a St, Villa', 'Lapuz Iloilo City', '2035554407', 'danlewis@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(415, 438, 'Martha', NULL, 'Larsson', 'CENTRO', 'Iloilo City Proper', '0695-34 6555', 'marthalarsson@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(416, 439, 'Sue', NULL, 'Frick', 'awdawdawd', 'Arevalo Iloilo City', '4085553659', 'suefrick@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(417, 440, 'Roland ', NULL, 'Mendel', 'San Juan', 'Molo Iloilo City', '7675-3555', 'roland mendel@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(418, 441, 'Leslie', NULL, 'Murphy', 'Luna', 'Iloilo City Proper', '2035559545', 'lesliemurphy@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM', 'employer', NULL, 0, '2024-09-05'),
(495, NULL, 'Carine', NULL, 'Schmitt', 'test', 'Iloilo City Proper', '40.32.2555', 'carineschmitt@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(496, NULL, 'Jean', NULL, 'King', 'test 123', 'Iloilo City Proper', '7025551838', 'jeanking@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(497, NULL, 'Peter', NULL, 'Ferguson', 'test', 'Iloilo City Proper', '03 9520 4555', 'peterferguson@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(498, NULL, 'Janine', NULL, 'Labrune', 'san isidro', 'Jaro Iloilo City', '40.67.8555', 'janinelabrune@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(499, NULL, 'Jonas', NULL, 'Bergulfsen', 'test', 'Iloilo City Proper', '07-98 9555', 'jonasbergulfsen@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(500, NULL, 'Susan', NULL, 'Nelson', 'test', 'Iloilo City Proper', '4155551450', 'susannelson@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(501, NULL, 'Zbyszek', NULL, 'Piestrzeniewicz', 'Balabago', 'Jaro Iloilo City', '(26) 642-7555', 'zbyszekpiestrzeniewicz@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(502, NULL, 'Roland', NULL, 'Keitel', 'test 123', 'Iloilo City Proper', '+49 69 66 90 2555', 'rolandkeitel@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(503, NULL, 'Julie', NULL, 'Murphy', 'test 123', 'Iloilo City Proper', '6505555787', 'juliemurphy@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(504, NULL, 'Kwai', NULL, 'Lee', 'test', 'Iloilo City Proper', '2125557818', 'kwailee@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(505, NULL, 'Diego', NULL, 'Freyre', '', 'Jaro Iloilo City', '(91) 555 94 44', 'diegofreyre@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(506, NULL, 'Christina', NULL, 'Berglund', 'JANIUAY', 'Jaro Iloilo City', '0921-12 3555', 'christinaberglund@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(507, NULL, 'Jytte', NULL, 'Petersen', 'CENTRO', 'Jaro Iloilo City', '31 12 3555', 'jyttepetersen@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(508, NULL, 'Mary', NULL, 'Saveley', 'test', 'Iloilo City Proper', '78.32.5555', 'marysaveley@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(509, NULL, 'Eric', NULL, 'Natividad', 'CENTRO', 'Jaro Iloilo City', '+65 221 7555', 'ericnatividad@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(510, NULL, 'Jeff', NULL, 'Young', 'CENTRO', 'Jaro Iloilo City', '2125557413', 'jeffyoung@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(511, NULL, 'Kelvin', NULL, 'Leong', 'CENTRO', 'Jaro Iloilo City', '2155551555', 'kelvinleong@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(512, NULL, 'Juri', NULL, 'Hashimoto', 'san isidro', 'Jaro Iloilo City', '6505556809', 'jurihashimoto@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(513, NULL, 'Wendy', NULL, 'Victorino', 'test', 'Iloilo City Proper', '+65 224 1555', 'wendyvictorino@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(514, NULL, 'Veysel', NULL, 'Oeztan', 'test 123', 'Iloilo City Proper', '+47 2267 3215', 'veyseloeztan@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(515, NULL, 'Keith', NULL, 'Franco', 'san isidro', 'Jaro Iloilo City', '2035557845', 'keithfranco@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(516, NULL, 'Isabel', NULL, 'de Castro', 'san isidro', 'Jaro Iloilo City', '(1) 356-5555', 'isabelde castro@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(517, NULL, 'Martine', NULL, 'Rancé', '', 'Jaro Iloilo City', '20.16.1555', 'martinerancé@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(518, NULL, 'Marie', NULL, 'Bertrand', 'san isidro', 'Jaro Iloilo City', '(1) 42.34.2555', 'mariebertrand@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(519, NULL, 'Jerry', NULL, 'Tseng', 'CENTRO', 'Jaro Iloilo City', '6175555555', 'jerrytseng@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(520, NULL, 'Julie', NULL, 'King', 'CENTRO', 'Jaro Iloilo City', '2035552570', 'julieking@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(521, NULL, 'Mory', NULL, 'Kentary', 'Janiuay', 'Iloilo City Proper', '+81 06 6342 5555', 'morykentary@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(522, NULL, 'Michael', NULL, 'Frick', 'test', 'Iloilo City Proper', '2125551500', 'michaelfrick@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(523, NULL, 'Matti', NULL, 'Karttunen', 'JANIUAY', 'Jaro Iloilo City', '90-224 8555', 'mattikarttunen@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(524, NULL, 'Rachel', NULL, 'Ashworth', 'CENTRO', 'Jaro Iloilo City', '(171) 555-1555', 'rachelashworth@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(525, NULL, 'Dean', NULL, 'Cassidy', 'CENTRO', 'Jaro Iloilo City', '+353 1862 1555', 'deancassidy@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(526, NULL, 'Leslie', NULL, 'Taylor', 'test 123', 'Iloilo City Proper', '6175558428', 'leslietaylor@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(527, NULL, 'Elizabeth', NULL, 'Devon', 'JANIUAY', 'Jaro Iloilo City', '(171) 555-2282', 'elizabethdevon@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(528, NULL, 'Yoshi', NULL, 'Tamuri', 'CENTRO', 'Jaro Iloilo City', '(604) 555-3392', 'yoshitamuri@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(529, NULL, 'Miguel', NULL, 'Barajas', 'test', 'Iloilo City Proper', '6175557555', 'miguelbarajas@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(530, NULL, 'Julie', NULL, 'Young', 'Janiuay', 'Iloilo City Proper', '6265557265', 'julieyoung@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(531, NULL, 'Brydey', NULL, 'Walker', 'test 123', 'Iloilo City Proper', '+612 9411 1555', 'brydeywalker@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(532, NULL, 'Frédérique', NULL, 'Citeaux', 'test', 'Iloilo City Proper', '88.60.1555', 'frédériqueciteaux@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(533, NULL, 'Mike', NULL, 'Gao', 'JANIUAY', 'Jaro Iloilo City', '+852 2251 1555', 'mikegao@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(534, NULL, 'Eduardo', NULL, 'Saavedra', 'JANIUAY', 'Jaro Iloilo City', '(93) 203 4555', 'eduardosaavedra@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(535, NULL, 'Mary', NULL, 'Young', 'test', 'Iloilo City Proper', '3105552373', 'maryyoung@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(536, NULL, 'Horst', NULL, 'Kloss', 'CENTRO', 'Jaro Iloilo City', '0372-555188', 'horstkloss@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(537, NULL, 'Palle', NULL, 'Ibsen', 'test', 'Iloilo City Proper', '86 21 3555', 'palleibsen@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(538, NULL, 'Jean', NULL, 'Fresnière', 'test', 'Iloilo City Proper', '(514) 555-8054', 'jeanfresnière@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(539, NULL, 'Alejandra', NULL, 'Camino', 'CENTRO', 'Jaro Iloilo City', '(91) 745 6555', 'alejandracamino@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(540, NULL, 'Valarie', NULL, 'Thompson', 'test 123', 'Iloilo City Proper', '7605558146', 'valariethompson@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(541, NULL, 'Helen', NULL, 'Bennett', 'test 123', 'Iloilo City Proper', '(198) 555-8888', 'helenbennett@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(542, NULL, 'Annette', NULL, 'Roulet', 'test', 'Iloilo City Proper', '61.77.6555', 'annetteroulet@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(543, NULL, 'Renate', NULL, 'Messner', 'oton', 'La Paz Iloilo City', '069-0555984', 'renatemessner@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(544, NULL, 'Paolo', NULL, 'Accorti', 'test', 'Iloilo City Proper', '011-4988555', 'paoloaccorti@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(545, NULL, 'Daniel', NULL, 'Da Silva', 'CENTRO', 'Jaro Iloilo City', '+33 1 46 62 7555', 'danielda silva@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(546, NULL, 'Daniel', NULL, 'Tonini', 'JANIUAY', 'Jaro Iloilo City', '30.59.8555', 'danieltonini@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(547, NULL, 'Henriette', NULL, 'Pfalzheim', 'JANIUAY', 'Jaro Iloilo City', '0221-5554327', 'henriettepfalzheim@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(548, NULL, 'Elizabeth', NULL, 'Lincoln', 'san isidro', 'Jaro Iloilo City', '(604) 555-4555', 'elizabethlincoln@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(549, NULL, 'Peter', NULL, 'Franken', 'Balabago', 'Jaro Iloilo City', '089-0877555', 'peterfranken@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(550, NULL, 'Anna', NULL, 'O\'Hara', 'JANIUAY', 'Jaro Iloilo City', '02 9936 8555', 'annao\'hara@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(551, NULL, 'Giovanni', NULL, 'Rovelli', 'test', 'Iloilo City Proper', '035-640555', 'giovannirovelli@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(552, NULL, 'Adrian', NULL, 'Huxley', '', 'Jaro Iloilo City', '+61 2 9495 8555', 'adrianhuxley@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(553, NULL, 'Marta', NULL, 'Hernandez', 'test', 'Iloilo City Proper', '6175558555', 'martahernandez@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(554, NULL, 'Ed', NULL, 'Harrison', 'CENTRO', 'Jaro Iloilo City', '+41 26 425 50 01', 'edharrison@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(555, NULL, 'Mihael', NULL, 'Holz', 'test 123', 'Iloilo City Proper', '0897-034555', 'mihaelholz@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(556, NULL, 'Jan', NULL, 'Klaeboe', 'test', 'Iloilo City Proper', '+47 2212 1555', 'janklaeboe@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(557, NULL, 'Bradley', NULL, 'Schuyler', 'test', 'Iloilo City Proper', '+31 20 491 9555', 'bradleyschuyler@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(558, NULL, 'Mel', NULL, 'Andersen', 'test 123', 'Iloilo City Proper', '030-0074555', 'melandersen@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(559, NULL, 'Pirkko', NULL, 'Koskitalo', 'CENTRO', 'Jaro Iloilo City', '981-443655', 'pirkkokoskitalo@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(560, NULL, 'Catherine', NULL, 'Dewey', 'JANIUAY', 'Jaro Iloilo City', '(02) 5554 67', 'catherinedewey@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(561, NULL, 'Steve', NULL, 'Frick', 'test', 'Iloilo City Proper', '9145554562', 'stevefrick@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(562, NULL, 'Wing', NULL, 'Huang', 'test 123', 'Iloilo City Proper', '5085559555', 'winghuang@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(563, NULL, 'Julie', NULL, 'Brown', 'CENTRO', 'Jaro Iloilo City', '6505551386', 'juliebrown@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(564, NULL, 'Mike', NULL, 'Graham', 'test 123', 'Iloilo City Proper', '+64 9 312 5555', 'mikegraham@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(565, NULL, 'Ann', NULL, 'Brown', 'test 123', 'Iloilo City Proper', '(171) 555-0297', 'annbrown@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(566, NULL, 'William', NULL, 'Brown', 'Balabago', 'Jaro Iloilo City', '2015559350', 'williambrown@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(567, NULL, 'Ben', NULL, 'Calaghan', 'Janiuay', 'Iloilo City Proper', '61-7-3844-6555', 'bencalaghan@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(568, NULL, 'Kalle', NULL, 'Suominen', 'test', 'Iloilo City Proper', '+358 9 8045 555', 'kallesuominen@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09'),
(569, NULL, 'Philip', NULL, 'Cramer', 'test', 'Iloilo City Proper', '0555-09555', 'philipcramer@gmail.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac', 'applicant', NULL, 0, '2024-09-09');

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
(3, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-03-28 07:30:35', '2024-04-25 17:13:19'),
(4, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'denied', 'Denied reason: Deny reason', '2024-03-28 07:32:11', '2024-04-25 22:43:29'),
(5, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-03-28 07:34:26', '2024-03-31 11:23:09'),
(6, 'http://localhost/job-portal/uploads/company/6610e4e001b69_wp2760866.png', 'denied', 'Denied reason: Test', '2024-04-06 06:00:04', '2024-04-25 20:58:26'),
(7, 'http://localhost/job-portal/uploads/company/6648c7bcc6218_images.jpg', 'pending', 'Waiting for admin to validate the business permit.', '2024-05-18 15:22:36', '2024-05-18 15:22:36'),
(8, 'http://localhost/job-portal/uploads/company/6648c81105983_images.jpg', 'pending', 'Waiting for admin to validate the business permit.', '2024-05-18 15:24:01', '2024-05-18 15:24:01'),
(9, 'http://localhost/job-portal/uploads/company/6648c93785b12_images.jpg', 'pending', 'Waiting for admin to validate the business permit.', '2024-05-18 15:28:55', '2024-05-18 15:28:55'),
(10, 'http://localhost/job-portal/uploads/company/6648cb39b13b0_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-18 15:37:29', '2024-05-18 15:41:10'),
(11, 'http://localhost/job-portal/uploads/company/664b46ba7cffc_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 12:48:58', '2024-05-20 13:44:51'),
(12, 'http://localhost/job-portal/uploads/company/664b4902ddfd3_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 12:58:42', '2024-05-20 13:45:01'),
(13, 'http://localhost/job-portal/uploads/company/664b4a5d649e9_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:04:29', '2024-05-20 13:45:26'),
(14, 'http://localhost/job-portal/uploads/company/664b4be8c90fd_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:11:04', '2024-05-20 13:45:13'),
(15, 'http://localhost/job-portal/uploads/company/664b4d4129665_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:16:49', '2024-05-20 13:45:44'),
(16, 'http://localhost/job-portal/uploads/company/664b4e9656ee7_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:22:30', '2024-05-20 13:45:58'),
(17, 'http://localhost/job-portal/uploads/company/664b507bb6b3d_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:30:35', '2024-05-20 13:46:13'),
(18, 'http://localhost/job-portal/uploads/company/664b5199a8985_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:35:21', '2024-05-20 13:46:23'),
(19, 'http://localhost/job-portal/uploads/company/664b52e95841f_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:40:57', '2024-05-20 13:46:36'),
(20, 'http://localhost/job-portal/uploads/company/664b53b4394fe_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 13:44:20', '2024-05-20 13:46:49'),
(21, 'http://localhost/job-portal/uploads/company/664b7b73d8e3a_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-20 16:33:55', '2024-05-20 16:38:40'),
(22, 'http://localhost/job-portal/uploads/company/664c31881c9db_440361448_1239427144129925_5040520062403320896_n.png', 'denied', 'Denied reason: your business permit is not valid', '2024-05-21 05:30:48', '2024-05-21 05:32:54'),
(23, 'http://localhost/job-portal/uploads/company/664c41e9bf37a_images.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-05-21 06:40:41', '2024-05-21 06:46:40'),
(411, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(412, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(413, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(414, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(415, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(416, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(417, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(418, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(419, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(420, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(421, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(422, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(423, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(424, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(425, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(426, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(427, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(428, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(429, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(430, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(431, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(432, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(433, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:12', '2024-09-05 14:17:12'),
(434, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(435, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(436, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(437, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(438, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(439, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(440, 'https://rjmtravel.files.wordpress.com/2013/10/dti-busines-name-permit.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(441, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13'),
(442, 'https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg', 'approved', 'Company\'s fully verified.<br>You can start posting your job.', '2024-09-05 14:17:13', '2024-09-05 14:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `work_from` varchar(55) NOT NULL,
  `work_to` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `user_id`, `job_title`, `company_id`, `industry_id`, `work_from`, `work_to`) VALUES
(7, 10, 'Test', 8, 10, 'May 2021', 'Present'),
(9, 12, 'Test', 4, 2, 'May 2023', 'Present'),
(10, 26, 'Web Developer', 10, 12, 'February 2024', 'April 2024'),
(11, 37, 'Web Developer', 10, 12, 'September 2011', 'January 2015'),
(12, 25, 'Web', 9, 12, 'November 2024', 'Present'),
(13, 43, 'Test', 1, 2, 'January 2010', 'Present'),
(15, 11, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(79, 495, 'Test', 4, 2, 'May 2023', 'Present'),
(80, 496, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(81, 497, 'Test', 4, 2, 'May 2023', 'Present'),
(82, 498, 'Test', 1, 2, 'January 2010', 'Present'),
(83, 499, 'Test', 4, 2, 'May 2023', 'Present'),
(84, 500, 'Test', 4, 2, 'May 2023', 'Present'),
(85, 501, 'Web Developer', 10, 12, 'September 2011', 'January 2015'),
(86, 502, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(87, 503, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(88, 504, 'Test', 4, 2, 'May 2023', 'Present'),
(89, 505, 'Test', 8, 10, 'May 2021', 'Present'),
(90, 507, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(91, 508, 'Test', 4, 2, 'May 2023', 'Present'),
(92, 509, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(93, 510, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(94, 511, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(95, 512, 'Test', 1, 2, 'January 2010', 'Present'),
(96, 513, 'Test', 4, 2, 'May 2023', 'Present'),
(97, 514, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(98, 515, 'Test', 1, 2, 'January 2010', 'Present'),
(99, 516, 'Test', 1, 2, 'January 2010', 'Present'),
(100, 517, 'Test', 8, 10, 'May 2021', 'Present'),
(101, 518, 'Test', 1, 2, 'January 2010', 'Present'),
(102, 519, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(103, 520, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(104, 521, 'Web Developer', 10, 12, 'February 2024', 'April 2024'),
(105, 522, 'Test', 4, 2, 'May 2023', 'Present'),
(106, 524, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(107, 525, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(108, 526, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(109, 528, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(110, 529, 'Test', 4, 2, 'May 2023', 'Present'),
(111, 530, 'Web Developer', 10, 12, 'February 2024', 'April 2024'),
(112, 531, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(113, 532, 'Test', 4, 2, 'May 2023', 'Present'),
(114, 535, 'Test', 4, 2, 'May 2023', 'Present'),
(115, 536, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(116, 537, 'Test', 4, 2, 'May 2023', 'Present'),
(117, 538, 'Test', 4, 2, 'May 2023', 'Present'),
(118, 539, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(119, 540, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(120, 541, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(121, 542, 'Test', 4, 2, 'May 2023', 'Present'),
(122, 544, 'Test', 4, 2, 'May 2023', 'Present'),
(123, 545, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(124, 548, 'Test', 1, 2, 'January 2010', 'Present'),
(125, 549, 'Web Developer', 10, 12, 'September 2011', 'January 2015'),
(126, 551, 'Test', 4, 2, 'May 2023', 'Present'),
(127, 552, 'Test', 8, 10, 'May 2021', 'Present'),
(128, 553, 'Test', 4, 2, 'May 2023', 'Present'),
(129, 554, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(130, 555, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(131, 556, 'Test', 4, 2, 'May 2023', 'Present'),
(132, 557, 'Test', 4, 2, 'May 2023', 'Present'),
(133, 558, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(134, 559, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(135, 561, 'Test', 4, 2, 'May 2023', 'Present'),
(136, 562, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(137, 563, 'Web Developer', 9, 5, 'May 2022', 'January 2024'),
(138, 564, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(139, 565, 'Job Test', 3, 18, 'June 2024', 'June 2024'),
(140, 566, 'Web Developer', 10, 12, 'September 2011', 'January 2015'),
(141, 567, 'Web Developer', 10, 12, 'February 2024', 'April 2024'),
(142, 568, 'Test', 4, 2, 'May 2023', 'Present'),
(143, 569, 'Test', 4, 2, 'May 2023', 'Present');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skills_id` (`skill_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `industry_id` (`industry_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attainement_id` (`attainment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `educational_attainment`
--
ALTER TABLE `educational_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_list`
--
ALTER TABLE `experience_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `job_preference`
--
ALTER TABLE `job_preference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rated_by` (`rated_by`);

--
-- Indexes for table `search_keywords`
--
ALTER TABLE `search_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills_list`
--
ALTER TABLE `skills_list`
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
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `industry_id` (`industry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `educational_attainment`
--
ALTER TABLE `educational_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `experience_list`
--
ALTER TABLE `experience_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870;

--
-- AUTO_INCREMENT for table `job_preference`
--
ALTER TABLE `job_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `search_keywords`
--
ALTER TABLE `search_keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `skills_list`
--
ALTER TABLE `skills_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD CONSTRAINT `applicant_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `applicant_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills_list` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`verification_id`) REFERENCES `verification` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`attainment_id`) REFERENCES `educational_attainment` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `education_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `job_preference`
--
ALTER TABLE `job_preference`
  ADD CONSTRAINT `job_preference_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`rated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_experience_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_experience_ibfk_3` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
