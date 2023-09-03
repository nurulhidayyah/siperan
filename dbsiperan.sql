-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 06:11 AM
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
(1, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(2, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(3, 5.4, 7, 2250, 0.36, 29.16, 0.1296, 1.944),
(4, 5.6, 7, 2250, 0.315, 31.36, 0.099225, 1.764),
(5, 5.5, 7, 2250, 0.3375, 30.25, 0.113906, 1.85625),
(6, 5.2, 7, 2250, 0.405, 27.04, 0.164025, 2.106),
(7, 5.3, 7, 2250, 0.3825, 28.09, 0.146306, 2.02725),
(8, 5.1, 7, 2250, 0.4275, 26.01, 0.182756, 2.18025),
(9, 5, 7, 2250, 0.45, 25, 0.2025, 2.25),
(10, 5.4, 7, 2250, 0.36, 29.16, 0.1296, 1.944);

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
(1, '25FDnN8N2hMzY6hP', 6.76, '1693646040');

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
(1, 6, 10000, 'Sawah Luhur', '1693645843'),
(2, 6, 10000, 'Sawah Luhur', '1693645888'),
(3, 6, 10000, 'Jawilan', '1693645903'),
(4, 6, 10000, 'Jawilan', '1693645918'),
(5, 6, 10000, 'Ciruas', '1693645943'),
(6, 6, 10000, 'Ciruas', '1693645949'),
(7, 6, 10000, 'Kasemen', '1693645959'),
(8, 6, 10000, 'Kasemen', '1693646003'),
(9, 6, 10000, 'pontang', '1693646028'),
(10, 6, 10000, 'pontang', '1693646099');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_result`
--

CREATE TABLE `measurement_result` (
  `id` int(11) NOT NULL,
  `measurement_id` bigint(20) NOT NULL,
  `device_id` bigint(20) NOT NULL,
  `ph` double NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement_result`
--

INSERT INTO `measurement_result` (`id`, `measurement_id`, `device_id`, `ph`, `score`, `created_at`) VALUES
(1, 1, 1, 1.84, 11610, '2023-01-02 09:10:43'),
(2, 2, 1, 3.23, 8482, '2023-02-02 09:11:28'),
(3, 3, 1, 1.77, 11767, '2023-03-02 09:11:43'),
(4, 4, 1, 6.69, 698, '2023-04-02 09:11:58'),
(5, 5, 1, 6.69, 698, '2023-05-02 09:12:23'),
(6, 6, 1, 6.69, 698, '2023-06-02 09:12:29'),
(7, 7, 1, 6.69, 698, '2023-07-02 09:12:39'),
(8, 8, 1, 0.52, 14580, '2023-08-02 09:13:23'),
(9, 9, 1, 6.76, 540, '2023-08-02 09:13:48'),
(10, 10, 1, 6.76, 540, '2023-09-02 09:14:59');

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
  `device_id` bigint(20) DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `device_id`, `date_created`) VALUES
(6, 'Nurul Hidayah', 'nurulhidayyah45@gmail.com', 'default.jpg', '$2y$10$fgN4fLu1Lw9h5.KfuVFv9.DCLzDKvLlW/390Pgzh2HAENxlLw7zAq', 1, 1, 1690909502),
(17, 'Paik Hidayah', 'paikhidayah@gmail.com', 'default.jpg', '$2y$10$Rc5XRDEV5b7bIEKhbHhjpuMQBhayxVTy2RoGSNlsoEqLfPlr63LYS', 2, 1, 1692110302);

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
(12, 2, 6),
(13, 3, 5),
(14, 3, 6),
(28, 1, 3),
(30, 1, 6);

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
(18, 1, 'Kelola Perangkat', 'admin/devices', 'fas fa-wrench', 1),
(21, 2, 'Kondisi Lahan', 'user/land', 'fas fa-thermometer', 1),
(22, 1, 'Data Latih', 'admin/learning', 'fab fa-leanpub', 1),
(23, 2, 'Penentuan', 'user/penentuan', 'fas fa-balance-scale', 1),
(24, 2, 'History', 'user/history', 'fas fa-history', 1),
(25, 2, 'Perangkat Saya', 'user/mydevice', 'fas fa-wrench', 1),
(26, 1, 'Laporan', 'admin/laporan', 'fas fa-file-pdf', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
