-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 01:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsiperan`
--

-- --------------------------------------------------------

--
-- Table structure for table `determination`
--

CREATE TABLE `determination` (
  `id` int(11) NOT NULL,
  `ph_min` float NOT NULL,
  `ph_max` float NOT NULL,
  `calcification` float NOT NULL,
  `total` float NOT NULL,
  `x_kuadrat` float NOT NULL,
  `y_kuadrat` float NOT NULL,
  `xy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `determination`
--

INSERT INTO `determination` (`id`, `ph_min`, `ph_max`, `calcification`, `total`, `x_kuadrat`, `y_kuadrat`, `xy`) VALUES
(2, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(3, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(4, 5.4, 7, 2250, 0.36, 29.16, 0.1296, 1.944),
(5, 5.6, 7, 2250, 0.315, 31.36, 0.099225, 1.764),
(6, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(7, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(8, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(9, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(10, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(11, 5.2, 7, 2250, 0.405, 27.04, 0.164025, 2.106),
(15, 5.2, 7, 2250, 0.405, 27.04, 0.164025, 2.106);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ph` float DEFAULT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `token`, `ph`, `date`) VALUES
(1, '25FDnN8N2hMzY6hP', 5, '1692120874'),
(6, '9Xhqf13L76jRIRvF', 5.5, '1693368037');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `surfac_area` double NOT NULL,
  `place_name` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `user_id`, `surfac_area`, `place_name`, `created_at`) VALUES
(1, 6, 10000, 'Sawah Luhur', '1693463570'),
(2, 6, 20000, 'Sawah Luhur', '1693463593'),
(3, 6, 80000, 'Sawah Luhur', '1693463603'),
(4, 6, 10000, 'Jawilan', '1693463613'),
(5, 6, 80000, 'Jawilan', '1693463621'),
(6, 6, 20000, 'Ciruas', '1693463627'),
(7, 6, 100000, 'Ciruas', '1693463633'),
(8, 6, 80000, 'pontang', '1693463640'),
(9, 6, 400000, 'pontang', '1693463667'),
(10, 6, 100000, 'Kasemen', '1693502496');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_result`
--

CREATE TABLE `measurement_result` (
  `id` int(11) NOT NULL,
  `measurement_id` bigint(20) NOT NULL,
  `device_id` bigint(20) NOT NULL,
  `ph` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement_result`
--

INSERT INTO `measurement_result` (`id`, `measurement_id`, `device_id`, `ph`, `score`, `created_at`) VALUES
(1, 1, 1, 1, 4500, '2023-05-01 06:43:15'),
(2, 2, 1, 3, 9000, '2023-05-06 17:00:00'),
(3, 3, 1, 4, 36000, '2023-05-20 06:43:28'),
(4, 4, 1, 4, 4500, '2023-06-02 06:44:10'),
(5, 5, 1, 5, 36000, '2023-06-20 06:33:41'),
(6, 6, 1, 2, 9000, '2023-07-01 06:48:41'),
(7, 7, 1, 4, 45000, '2023-07-27 06:48:48'),
(8, 8, 1, 7, 36000, '2023-08-11 06:44:47'),
(9, 9, 1, 7, 179998, '2023-08-31 06:44:53'),
(10, 10, 1, 5, 45000, '2023-08-31 17:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `device_id`, `date_created`) VALUES
(6, 'Nurul', 'nurulhidayyah45@gmail.com', 'default.jpg', '$2y$10$fgN4fLu1Lw9h5.KfuVFv9.DCLzDKvLlW/390Pgzh2HAENxlLw7zAq', 1, '1', 1690909502),
(17, 'Paik Hidayah', 'paikhidayah@gmail.com', 'default.jpg', '$2y$10$Rc5XRDEV5b7bIEKhbHhjpuMQBhayxVTy2RoGSNlsoEqLfPlr63LYS', 2, '', 1692110302);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 2, 2),
(11, 1, 6),
(12, 2, 6),
(13, 3, 5),
(14, 3, 6),
(16, 1, 3),
(20, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(6, 'setting');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(3, 1, 'Users', 'admin/users', 'fas fa-users', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 6, 'My Profile', 'setting', 'fas fa-fw fa-user', 1),
(7, 6, 'Edit Profile', 'setting/edit', 'fas fa-fw fa-user-edit', 1),
(8, 6, 'Change Password', 'setting/changePassword', 'fas fa-fw fa-key', 1),
(9, 2, 'Dashboard User', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(18, 1, 'Laporan', 'admin/laporan', 'fas fa-file-pdf', 1),
(21, 2, 'Kondisi Lahan', 'user/land', 'fas fa-thermometer', 1),
(22, 1, 'Data Latih', 'admin/learning', 'fab fa-leanpub', 1),
(23, 2, 'Penentuan', 'user/penentuan', 'fas fa-balance-scale', 1),
(24, 2, 'History', 'user/history', 'fas fa-history', 1),
(25, 2, 'Perangkat Saya', 'user/mydevice', 'fas fa-wrench', 1),
(26, 1, 'Kelola Perangkat', 'admin/devices', 'fas fa-wrench', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `determination`
--
ALTER TABLE `determination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement_result`
--
ALTER TABLE `measurement_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `determination`
--
ALTER TABLE `determination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `measurement_result`
--
ALTER TABLE `measurement_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
