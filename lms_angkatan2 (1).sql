-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 09:53 AM
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
-- Database: `lms_angkatan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `education` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `id_role`, `name`, `gender`, `education`, `phone`, `email`, `password`, `address`, `created_at`, `updated_at`) VALUES
(7, 5, 'bejo', 0, 'Economic', '123456', 'bejo@gmail.com', '', 'jalan warakas 2\r\n', '2025-06-04 07:55:43', '2025-06-12 00:49:25'),
(8, 5, 'ronaldo', 1, 'Networkadminstration', '45678', 'ronaldo@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'jalan warakasa 3', '2025-06-04 07:56:02', '2025-06-12 00:49:28'),
(9, 5, 'reihan', 1, 'Economic', '085710590044', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Jl.Warakas II GGIIB NO5B RT005 RW02 KEL.WARAKAS KEC.TANJUNG PRIOK', '2025-06-10 03:14:42', '2025-06-12 00:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_major`
--

CREATE TABLE `instructor_major` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `instructor_major`
--

INSERT INTO `instructor_major` (`id`, `id_major`, `id_instructor`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2025-06-04 06:43:07', NULL),
(2, 11, 1, '2025-06-04 06:43:15', NULL),
(3, 12, 1, '2025-06-04 07:16:17', NULL),
(4, 12, 4, '2025-06-04 07:33:51', NULL),
(5, 13, 4, '2025-06-04 07:35:22', NULL),
(9, 0, 0, '2025-06-05 02:01:11', NULL),
(12, 10, 0, '2025-06-05 02:34:32', NULL),
(13, 13, 0, '2025-06-05 02:44:31', NULL),
(15, 12, 0, '2025-06-05 02:46:07', NULL),
(16, 13, 8, '2025-06-05 03:39:49', NULL),
(17, 10, 8, '2025-06-10 03:14:10', NULL),
(18, 10, 8, '2025-06-10 03:14:16', NULL),
(19, 10, 9, '2025-06-10 03:14:49', NULL),
(20, 13, 9, '2025-06-10 03:14:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(10, 'Tata Boga', '2025-06-04 06:44:52', '2025-06-04 06:44:52'),
(12, 'Web Programming', '2025-06-04 07:12:03', '2025-06-04 07:12:03'),
(13, 'Content Creator', '2025-06-04 07:48:28', '2025-06-04 07:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `icon`, `urutan`, `url`, `created_at`, `updated_at`) VALUES
(1, 0, 'dashboard', 'bi bi-grid', 1, 'home.php', '2025-06-12 02:11:12', NULL),
(2, 0, 'master data', 'bi bi-menu-button-wide', 2, '', '2025-06-12 02:11:56', NULL),
(3, 0, 'modul', 'bi bi-book', 3, '?page=moduls', '2025-06-12 02:12:46', NULL),
(4, 2, 'instructor', 'bi bi-circle', 1, 'instructor', '2025-06-12 02:13:40', '2025-06-12 02:17:04'),
(5, 2, 'major', 'bi bi-circle', 2, 'major', '2025-06-12 02:14:32', '2025-06-12 02:17:14'),
(6, 2, 'menu', 'bi bi-circle', 3, 'menu', '2025-06-12 02:14:52', '2025-06-12 02:17:22'),
(7, 2, 'roles', 'bi bi-circle', 4, 'roles', '2025-06-12 02:15:23', '2025-06-12 02:17:31'),
(8, 2, 'user', 'bi bi-circle', 5, 'user', '2025-06-12 02:15:43', '2025-06-12 02:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus_roles`
--

CREATE TABLE `menus_roles` (
  `id` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus_roles`
--

INSERT INTO `menus_roles` (`id`, `id_roles`, `id_menu`, `created_at`, `updated_at`) VALUES
(24, 5, 1, '2025-06-12 05:45:53', NULL),
(25, 5, 2, '2025-06-12 05:45:53', NULL),
(26, 5, 3, '2025-06-12 05:45:53', NULL),
(35, 1, 1, '2025-06-12 07:51:02', NULL),
(36, 1, 2, '2025-06-12 07:51:02', NULL),
(37, 1, 4, '2025-06-12 07:51:02', NULL),
(38, 1, 5, '2025-06-12 07:51:02', NULL),
(39, 1, 6, '2025-06-12 07:51:02', NULL),
(40, 1, 7, '2025-06-12 07:51:02', NULL),
(41, 1, 8, '2025-06-12 07:51:02', NULL),
(42, 1, 3, '2025-06-12 07:51:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moduls`
--

CREATE TABLE `moduls` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moduls`
--

INSERT INTO `moduls` (`id`, `id_major`, `id_instructor`, `name`, `created_at`, `updated_at`) VALUES
(22, 13, 9, 'OOP PHP - Pertemuan 1', '2025-06-10 03:55:04', NULL),
(23, 13, 9, 'OOP PHP - Pertemuan 1', '2025-06-10 04:06:58', NULL),
(27, 13, 9, 'OOP PHP - Pertemuan 1', '2025-06-10 06:38:57', NULL),
(28, 13, 9, 'dokumen', '2025-06-10 07:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moduls_details`
--

CREATE TABLE `moduls_details` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moduls_details`
--

INSERT INTO `moduls_details` (`id`, `id_modul`, `file`, `created_at`, `updated_at`) VALUES
(1, 21, '6847a970d3a69-WhatsApp Image 2025-05-10 at 08.27.32 (1).jpeg', '2025-06-10 03:41:36', NULL),
(2, 22, '6847ac98589e0-Cv_M. Reihan Perdana. .docx', '2025-06-10 03:55:04', NULL),
(3, 23, '6847af624070b-WhatsApp Image 2025-05-10 at 08.27.32 (1).jpeg', '2025-06-10 04:06:58', NULL),
(7, 27, '6847d301e47f8-Proposal Usaha (1).docx', '2025-06-10 06:38:57', NULL),
(8, 28, '6847dcf7d423f-FRISKA ANATASYA (1).pdf', '2025-06-10 07:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-06-04 01:52:01', '2025-06-12 00:24:36'),
(2, 'Administrator', '2025-06-04 02:26:16', '2025-06-12 00:24:54'),
(3, 'PIC', '2025-06-04 02:26:30', '2025-06-12 00:24:46'),
(4, 'Student', '2025-06-04 07:12:38', '2025-06-12 00:24:02'),
(5, 'Instructor', '2025-06-12 00:23:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `education` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_major`, `name`, `gender`, `education`, `phone`, `email`, `password`, `address`, `created_at`, `updated_at`) VALUES
(7, 12, 'Siti Nuraisyah', 2, 'Economic', '12345', 'aisyah@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'joglo', '2025-06-04 07:55:43', '2025-06-10 08:04:28'),
(8, 12, 'ronaldo', 1, 'Networkadminstration', '45678', 'ronaldo@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'jalan warakasa 3', '2025-06-04 07:56:02', '2025-06-10 07:40:44'),
(9, 12, 'reihan', 1, 'Economic', '085710590044', 'reihan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Jl.Warakas II GGIIB NO5B RT005 RW02 KEL.WARAKAS KEC.TANJUNG PRIOK', '2025-06-10 03:14:42', '2025-06-10 07:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `email`, `password`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 1, 'Reihan', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2025-06-03 02:51:31', '2025-06-12 07:48:18', 0),
(8, 0, 'Siti Nuraisyah', 'Sitinuraisyah@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-06-03 13:10:35', '2025-06-10 07:37:21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_major`
--
ALTER TABLE `instructor_major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_roles`
--
ALTER TABLE `menus_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls_details`
--
ALTER TABLE `moduls_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instructor_major`
--
ALTER TABLE `instructor_major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus_roles`
--
ALTER TABLE `menus_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `moduls_details`
--
ALTER TABLE `moduls_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
