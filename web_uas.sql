-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2023 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ramadhan@gmail.com', 2, '2023-06-04 00:54:02', 1),
(2, '::1', 'rama', NULL, '2023-06-04 01:02:36', 0),
(3, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:03:24', 1),
(4, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:09:11', 1),
(5, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:12:37', 1),
(6, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:16:08', 1),
(7, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:16:17', 1),
(8, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:16:25', 1),
(9, '::1', 'adminRama@gmail.com', 3, '2023-06-04 01:16:30', 1),
(10, '::1', 'admin', NULL, '2023-06-04 01:21:16', 0),
(11, '::1', 'ramadhanbasir33@gmail.com', 4, '2023-06-04 01:22:24', 1),
(12, '::1', 'ramadhanbasir33@gmail.com', 4, '2023-06-04 01:58:20', 1),
(13, '::1', 'ramadhanbasir33@gmail.com', 4, '2023-06-04 02:21:25', 1),
(14, '::1', 'ramadhanbasir33@gmail.com', NULL, '2023-06-04 02:21:38', 0),
(15, '::1', 'ramadhanbasir33@gmail.com', NULL, '2023-06-04 02:21:43', 0),
(16, '::1', 'ramadhanbasir33@gmail.com', NULL, '2023-06-04 02:21:49', 0),
(17, '::1', 'ramadhanbasir33@gmail.com', 4, '2023-06-04 02:21:55', 1),
(18, '::1', 'ramadhanbasir33@gmail.com', 4, '2023-06-04 02:41:08', 1),
(19, '::1', 'ramadhanbasir33@gmail.com', 4, '2023-06-04 04:04:46', 1),
(20, '::1', 'admin4', NULL, '2023-06-04 05:26:19', 0),
(21, '::1', 'admin3@gmail.com', 7, '2023-06-04 05:26:31', 1),
(22, '::1', 'admin4', NULL, '2023-06-05 09:04:08', 0),
(23, '::1', 'admin3@gmail.com', 7, '2023-06-05 09:04:16', 1),
(24, '::1', 'admin3@gmail.com', 7, '2023-06-05 09:07:01', 1),
(25, '::1', 'admin3@gmail.com', 7, '2023-06-05 09:07:56', 1),
(26, '::1', 'admin2@gmail.com', 6, '2023-06-05 09:08:32', 1),
(27, '::1', 'Company Admin', NULL, '2023-06-05 09:10:02', 0),
(28, '::1', 'admin2@gmail.com', 6, '2023-06-05 09:10:10', 1),
(29, '::1', 'admin2@gmail.com', 6, '2023-06-05 09:13:01', 1),
(30, '::1', 'admin2@gmail.com', 6, '2023-06-05 09:17:19', 1),
(31, '::1', 'admin2@gmail.com', 6, '2023-06-05 09:17:43', 1),
(32, '::1', 'Admin4@gmail.com', 9, '2023-06-06 00:19:53', 1),
(33, '::1', 'admin5', NULL, '2023-06-06 00:23:45', 0),
(34, '::1', 'Admin4@gmail.com', 9, '2023-06-06 00:24:03', 1),
(35, '::1', 'Admin4@gmail.com', 9, '2023-06-06 00:24:49', 1),
(36, '::1', 'Admin4@gmail.com', 9, '2023-06-06 00:31:51', 1),
(37, '::1', 'Admin4@gmail.com', 9, '2023-06-06 00:58:09', 1),
(38, '::1', 'Admin4@gmail.com', 9, '2023-06-06 07:25:17', 1),
(39, '::1', 'Admin4@gmail.com', 9, '2023-06-06 11:03:48', 1),
(40, '::1', 'Admin4@gmail.com', 9, '2023-06-06 11:33:53', 1),
(41, '::1', 'Admin4@gmail.com', 9, '2023-06-06 15:41:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'ramadhanbasir33@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'e5a56fdc03d6a646203356f30c1f16d3', '2023-06-04 01:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(5) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `slug_kategori`, `tanggal_input`, `tanggal_ubah`) VALUES
(1, 'Teknologi', 'teknologi', '2023-06-01 18:03:13', '2023-06-06 13:18:30'),
(3, 'Web SEO', 'web-seo', '2023-06-01 18:03:44', '2023-06-06 13:18:19'),
(4, 'Web Security', 'web-security', '2023-06-01 18:32:05', '2023-06-06 13:18:07'),
(15, 'Web Server', 'web-server', '2023-06-05 09:21:02', '2023-06-06 13:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(4, '2023-06-01-085053', 'App\\Database\\Migrations\\KategoriProduk', 'default', 'App', 1685642169, 1),
(5, '2023-06-01-174822', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1685642169, 1),
(6, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1685810453, 2),
(7, '2023-06-05-093424', 'App\\Database\\Migrations\\Slider', 'default', 'App', 1685957859, 3),
(8, '2023-06-06-075356', 'App\\Database\\Migrations\\TeamMigration', 'default', 'App', 1686038400, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) UNSIGNED NOT NULL,
  `slug_produk` varchar(100) NOT NULL,
  `kategori_slug` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `slug_produk`, `kategori_slug`, `nama_produk`, `deskripsi`, `gambar_produk`, `tanggal_input`, `tanggal_ubah`) VALUES
(8, 'sdsds-1', 'web-server', 'sdsds 1', '<p>sdsds</p>\r\n', '1685754341_50f454c129387c1dcc32.jpg', '2023-06-03 01:05:41', '2023-06-06 13:26:07'),
(10, 'channel-yt-2', 'web-security', 'channel yt 2', '<h1><strong>youtube channnel</strong></h1>\r\n\r\n<p><a href=\"https://youtube.com/@ramadhanbasir\" target=\"_blank\"><strong>link</strong></a></p>\r\n', '1685776169_dd32fc3dbb2845245095.jpg', '2023-06-03 02:48:25', '2023-06-06 13:26:00'),
(50, 'scscs', 'web-seo', 'scscs', '<p>scscsc</p>\r\n', '1685804823_3a000bb287d8637136f7.jpg', '2023-06-03 15:07:03', '2023-06-06 13:25:51'),
(71, 'xsxsxs', 'teknologi', 'xsxsxs', '<p>sxxssxs</p>\r\n', '1686053766_8d6fc20df60a6e3688d3.jpg', '2023-06-06 12:16:06', '2023-06-06 13:25:38'),
(72, 'cvvvd', 'teknologi', 'cvvvd', '<p>vdvdvd</p>\r\n', '1686058064_c699065c2e3f6f07667d.jpg', '2023-06-06 13:27:44', '2023-06-06 13:27:44'),
(73, 'ddfdfd', 'web-server', 'ddfdfd', '<p>dfdfdfd</p>\r\n', '1686058784_7d97df4dc0f014058b6b.jpg', '2023-06-06 13:39:44', '2023-06-06 13:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(5) UNSIGNED NOT NULL,
  `judul_slider` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_slider` varchar(100) NOT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `deskripsi`, `gambar_slider`, `tanggal_input`, `tanggal_ubah`) VALUES
(1, 'selamat datang 121', 'company profile web 1333', '1685978431_b7dcb0b6a8e8d2375047.png', NULL, '2023-06-05 15:20:31'),
(2, 'slider 2', 'deskripsi slider 2', 'test.jpg', NULL, NULL),
(3, 'slider 2', 'deskripsi slider 2                                                                                        ', '1685978469_3d917f9d20769d98f50a.jpg', NULL, '2023-06-05 15:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(5) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `ig` varchar(100) NOT NULL,
  `gambar_team` varchar(100) NOT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `nama`, `jabatan`, `fb`, `ig`, `gambar_team`, `tanggal_input`, `tanggal_ubah`) VALUES
(1, 'person 1', 'IT', 'https://facebook.com', 'https://instagram.com', '1686050891_9944c0727f712d576f8b.jpg', '2023-06-06 16:06:40', '2023-06-06 11:28:11'),
(2, 'person 2', 'IT', 'https://facebook.com', 'https://instagram.com', '1686050507_075636b4ed776879c821.jpg', '2023-06-06 16:06:40', '2023-06-06 11:21:47'),
(3, 'person 3', 'IT', 'https://facebook.com', 'https://instagram.com', '1686050520_929c584206504c26872b.jpg', '2023-06-06 16:06:40', '2023-06-06 11:22:00'),
(4, 'person 4', 'IT', 'https://facebook.com', 'https://instagram.com', '1686050585_96bc12930a57057359d2.png', '2023-06-06 16:06:40', '2023-06-06 11:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ramadhanbasir33@gmail.com', 'rama admin A', '$2y$10$Vo4XeOhv58FH2WYr7hlvP.4i0RjPgSyd1Ve6VsX9worRUhkMqyfmi', NULL, '2023-06-04 01:56:52', NULL, NULL, NULL, NULL, 1, 0, '2023-06-04 01:22:14', '2023-06-04 01:56:52', NULL),
(5, 'Admin1@gmail.com', 'Company Admin 1', '$2y$10$1r6i9wFY8LgHsGUM78me2eq.2zqv.NyE8/Im8KcTxNAEVqDkTvSNC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-04 04:06:36', '2023-06-04 04:06:36', NULL),
(6, 'admin2@gmail.com', 'admin2', '$2y$10$0StzUhgILWpwJhz/NvdL..cK54Iz.16kT4gAsZDb.8nKMUVzpespy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-04 04:07:34', '2023-06-04 04:07:34', NULL),
(7, 'admin3@gmail.com', 'admin3', '$2y$10$S2reMrR7H7wU6bzyyxRzsO7TuGuhJJx34tMLsH2yrFE24srbo0jEy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-04 04:14:47', '2023-06-04 04:14:47', NULL),
(9, 'Admin4@gmail.com', 'Admin4', '$2y$10$SkzmDlZ0ySWeHbQXQzHmmuxSUdkRvmfpJLS5oljYzzIriyVc31/NK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-05 09:22:07', '2023-06-05 09:22:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
