-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 08:39 AM
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
  `ph_min` double NOT NULL,
  `ph_max` double NOT NULL,
  `calcification` double NOT NULL,
  `total` double NOT NULL,
  `x_kuadrat` double NOT NULL,
  `y_kuadrat` double NOT NULL,
  `xy` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `determination`
--

INSERT INTO `determination` (`id`, `ph_min`, `ph_max`, `calcification`, `total`, `x_kuadrat`, `y_kuadrat`, `xy`) VALUES
(1, 5.5, 7, 2250, 0.3375, 30.25, 0.11390625, 1.85625),
(2, 5.5, 6.9, 2250, 0.315, 30.25, 0.099225, 1.7325),
(3, 5.4, 6.8, 2250, 0.315, 29.16, 0.099225, 1.701),
(19, 5.6, 6.7, 3068.1818181783, 0.33749999999961, 31.36, 0.11390624999974, 1.8899999999978),
(20, 5.5, 6.6, 2965.9090909078, 0.32624999999986, 30.25, 0.10643906249991, 1.7943749999992),
(21, 5.5, 6.5, 3262.5000000008, 0.32625000000008, 30.25, 0.10643906250005, 1.7943750000004),
(22, 5.5, 6.4, 3624.9999999933, 0.3262499999994, 30.25, 0.10643906249961, 1.7943749999967),
(23, 5.5, 6.3, 4078.1250000001, 0.32625000000001, 30.25, 0.10643906250001, 1.7943750000001),
(24, 5.5, 6.2, 4660.7142857159, 0.32625000000011, 30.25, 0.10643906250007, 1.7943750000006),
(25, 5.2, 6.1, 3250.0000000173, 0.29250000000156, 27.04, 0.085556250000913, 1.5210000000081);

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
(1, '25FDnN8N2hMzY6hP', 6.76, '1694385753');

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
(1, 6, 10000, 'Sawah Luhur', '1694333967'),
(2, 6, 10000, 'Sawah Luhur', '1694334317'),
(3, 6, 10000, 'Sawah Luhur', '1694335229'),
(4, 6, 10000, 'Sawah Luhur', '1694335400'),
(5, 6, 10000, 'Sawah Luhur', '1694335626'),
(6, 6, 10000, 'Sawah Luhur', '1694335709'),
(7, 6, 10000, 'Sawah Luhur', '1694335811'),
(8, 6, 10000, 'Sawah Luhur', '1694336023'),
(9, 6, 10000, 'Sawah Luhur', '1694367195');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_result`
--

CREATE TABLE `measurement_result` (
  `id` int(11) NOT NULL,
  `measurement_id` bigint(20) NOT NULL,
  `device_id` bigint(20) NOT NULL,
  `ph` double NOT NULL,
  `score` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement_result`
--

INSERT INTO `measurement_result` (`id`, `measurement_id`, `device_id`, `ph`, `score`, `created_at`) VALUES
(1, 1, 1, 5.6, 3374.9999999961, '2023-01-10 08:19:27'),
(2, 2, 1, 5.5, 3262.4999999986, '2023-02-10 08:25:17'),
(3, 3, 1, 5.5, 3262.5000000008, '2023-03-10 08:40:29'),
(4, 4, 1, 5.5, 3262.499999994, '2023-04-10 08:43:20'),
(5, 5, 1, 5.5, 3262.5000000001, '2023-05-10 08:47:06'),
(6, 6, 1, 5.5, 3262.5000000011, '2023-06-10 08:48:29'),
(7, 7, 1, 5.2, 2925.0000000156, '2023-07-10 08:50:11'),
(8, 8, 1, 3, 450.00000013366, '2023-08-10 08:53:44'),
(9, 9, 1, 4.41, 2036.2500000572, '2023-09-10 17:33:16');

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
(13, 3, 5),
(14, 3, 6),
(30, 1, 6),
(32, 2, 6),
(33, 1, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `measurement_result`
--
ALTER TABLE `measurement_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
