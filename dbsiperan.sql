-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 04:00 PM
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
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `token`, `ph`, `date_created`) VALUES
(1, '25FDnN8N2hMzY6hP', 6.69, '1691761777'),
(6, '9Xhqf13L76jRIRvF', 12, '1691760582');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `surfac_area` float NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `user_id`, `surfac_area`, `place_name`, `created_at`) VALUES
(1, '6', 10000, 'Sawah Luhur', '1691502220'),
(2, '6', 5000, 'Sawah Luhur', '1691502364'),
(3, '6', 10000, 'Sawah Luhur', '1691502535'),
(4, '6', 10000, 'Sawah Luhur', '1691503013'),
(5, '6', 10000, 'Sawah Luhur', '1691506645'),
(6, '6', 10000, 'Sawah Luhur', '1691507684'),
(7, '6', 10000, 'Sawah Luhur', '1691507798'),
(8, '6', 2500, 'Sawah Luhur', '1691507830'),
(9, '6', 10000, 'Sawah Luhur', '1691508769'),
(10, '6', 10000, 'Sawah Luhur', '1691508867'),
(11, '6', 20000, 'Sawah Luhur', '1691509895'),
(12, '6', 2500, 'Sawah Luhur', '1691510065'),
(13, '10', 100000, 'Pekarungan', '1691511597'),
(14, '10', 100000, 'Pekarungan', '1691511682'),
(15, '6', 10000, 'Sawah Luhur', '1691524722'),
(16, '6', 10000, 'Sawah Luhur', '1691524733'),
(17, '6', 100000, 'Sawah Luhur', '1691524781'),
(18, '6', 10000, 'Sawah Luhur', '1691544758'),
(19, '6', 10000, 'Sawah Luhur', '1691658326');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_result`
--

CREATE TABLE `measurement_result` (
  `id` int(11) NOT NULL,
  `measurement_id` bigint(20) NOT NULL,
  `device_id` bigint(20) NOT NULL,
  `score` float NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement_result`
--

INSERT INTO `measurement_result` (`id`, `measurement_id`, `device_id`, `score`, `created_at`) VALUES
(1, 1, 1, 67498800, '1691502220'),
(2, 2, 1, 33749400, '1691502364'),
(3, 3, 1, 67498800, '1691502535'),
(4, 4, 1, -16648100, '1691503013'),
(5, 5, 1, 0, '1691506645'),
(6, 6, 1, 0, '1691507684'),
(7, 7, 1, 272016000, '1691507798'),
(8, 8, 1, 13949800, '1691507830'),
(9, 9, 1, 0, '1691508769'),
(10, 10, 1, 4499.96, '1691508867'),
(11, 11, 1, 8999.92, '1691509895'),
(12, 12, 1, 0, '1691510065'),
(13, 13, 1, 0, '1691511597'),
(14, 14, 1, 44999.6, '1691511682'),
(15, 15, 1, 4499.96, '1691524722'),
(16, 16, 1, 4499.96, '1691524733'),
(17, 17, 1, 44999.6, '1691524781'),
(18, 18, 1, 697.617, '1691544758'),
(19, 19, 1, 13499.6, '1691658326');

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
(6, 'Nurul', 'nurulhidayyah45@gmail.com', 'default.jpg', '$2y$10$fgN4fLu1Lw9h5.KfuVFv9.DCLzDKvLlW/390Pgzh2HAENxlLw7zAq', 1, '1', 1690909502);

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
(24, 2, 'Histori', 'user/histori', 'fas fa-history', 1),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `measurement_result`
--
ALTER TABLE `measurement_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
