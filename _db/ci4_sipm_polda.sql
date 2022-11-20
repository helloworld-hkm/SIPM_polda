-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2022 pada 13.42
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_sipm_polda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Super Admin'),
(2, 'user', 'User basa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 3),
(1, 4),
(1, 4),
(1, 5),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Ganda', NULL, '2022-11-13 02:37:40', 0),
(2, '::1', 'Ganda', NULL, '2022-11-13 02:37:57', 0),
(3, '::1', 'Ganda', NULL, '2022-11-13 02:38:18', 0),
(4, '::1', 'Ganda', NULL, '2022-11-13 02:38:29', 0),
(5, '::1', 'a@gmail.com', NULL, '2022-11-13 02:40:21', 0),
(6, '::1', 'ganda@gmail.com', 2, '2022-11-13 02:41:33', 1),
(7, '::1', 'admin@gmail.com', 3, '2022-11-13 02:50:02', 1),
(8, '::1', 'admin@gmail.com', 3, '2022-11-13 02:53:14', 1),
(9, '::1', 'admin@gmail.com', 3, '2022-11-13 03:21:32', 1),
(10, '::1', 'Adm', NULL, '2022-11-13 03:22:17', 0),
(11, '::1', 'Adm', NULL, '2022-11-13 03:22:30', 0),
(12, '::1', 'ganda@gmail.com', 2, '2022-11-13 03:22:59', 1),
(13, '::1', 'admin@gmail.com', 3, '2022-11-13 03:27:33', 1),
(14, '::1', 'Ada', NULL, '2022-11-13 10:14:24', 0),
(15, '::1', 'Ada', NULL, '2022-11-13 10:14:41', 0),
(16, '::1', 'ganda@gmail.com', 2, '2022-11-13 10:16:38', 1),
(17, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-14 08:37:03', 1),
(18, '::1', 'asstro', NULL, '2022-11-14 08:47:06', 0),
(19, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-14 08:47:22', 1),
(20, '::1', 'Asstro', NULL, '2022-11-14 09:01:13', 0),
(21, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-14 09:01:30', 1),
(22, '::1', 'Asstro', NULL, '2022-11-14 09:05:21', 0),
(23, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-14 09:05:37', 1),
(24, '::1', 'admin@gmail.com', 3, '2022-11-14 09:11:14', 1),
(25, '::1', 'ganda@gmail.com', 2, '2022-11-14 09:12:12', 1),
(26, '::1', 'admin@gmail.com', 3, '2022-11-14 09:31:06', 1),
(27, '::1', 'ganda@gmail.com', 2, '2022-11-14 09:56:54', 1),
(28, '::1', 'hakimastina@gmail.com', 5, '2022-11-14 11:33:58', 1),
(29, '::1', 'ganda@gmail.com', 2, '2022-11-14 11:35:54', 1),
(30, '::1', 'Asstro', NULL, '2022-11-14 12:48:16', 0),
(31, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-14 12:48:25', 1),
(32, '::1', 'ganda@gmail.com', 2, '2022-11-14 12:51:33', 1),
(33, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-14 14:48:47', 1),
(34, '::1', 'ganda@gmail.com', 2, '2022-11-14 14:51:55', 1),
(35, '::1', 'ganda@gmail.com', 2, '2022-11-15 00:04:41', 1),
(36, '::1', 'ganda@gmail.com', 2, '2022-11-16 12:53:55', 1),
(37, '::1', 'ganda@gmail.com', 2, '2022-11-16 22:05:22', 1),
(38, '::1', 'ganda@gmail.com', 2, '2022-11-18 00:09:54', 1),
(39, '::1', 'ganda@gmail.com', 2, '2022-11-19 02:54:20', 1),
(40, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-19 04:22:10', 1),
(41, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-19 05:37:41', 1),
(42, '::1', 'gandagunawan36@gmail.com', 4, '2022-11-19 05:39:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-user', 'kelola-user'),
(2, 'manage-profile', 'kelola-profile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1668328309, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pengadu` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `tanggal_pengaduan` datetime NOT NULL,
  `tanggal_diproses` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `status` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `id_user`, `nama_pengadu`, `perihal`, `detail`, `tanggal_pengaduan`, `tanggal_diproses`, `tanggal_selesai`, `status`) VALUES
(4, 0, 'anonym', 'sda', 'asdad', '2022-11-14 02:59:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(15, 2, 'anonym', 'cek2', 'adfdfdsasdfsdfsadfsadfasdgfdhadfhafdgfdgdfgdfgdfgdfgfdgfd', '2022-11-18 12:34:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'diproses'),
(16, 2, 'anonym', 'cek3', 'adasdasfdsfasfgsfdgdfghafgafgfdgdfgfdfgdfgfgfgdfgdfgdfgd', '2022-11-18 12:36:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'selesai'),
(20, 2, 'Ada', 'asdasdasd', 'asdasdasdasfdfdfasdfadsfdsfdsfsdafsdfdsfsdaf', '2022-11-19 03:35:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(21, 2, 'Ada', 'sdfsdfsd', 'sdafasdfadfsafadsgsfgsfdgfsfdsafsddsdsfsadfasdfadsfdasfdsafsdafdsf', '2022-11-19 03:38:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(22, 2, 'Ada', 'cek foto', 'has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchang', '2022-11-19 03:47:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(23, 2, 'anonym', 'asdas', ' user()->id user()->id user()->id user()->id user()->id user()->id user()->id user()->id user()->id user()->id user()->id', '2022-11-19 03:51:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(24, 2, 'anonym', 'asdsadasdasdsadasdasdasdasdasd', 'asdsad>guessExtension()>guessExtension()>guessExtension()>guessExtension()>guessExtension()>guessExtension()>guessExtension()>guessExtension()', '2022-11-19 03:52:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(25, 2, 'anonym', 'asdasdsadas', 'asdasdsdfasdfsdfadsfadsfadsfadsfasfasdfasdfasdfasdfsdfsdafasdfasdf', '2022-11-19 03:55:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(26, 2, 'anonym', 'sadasdfsdfasdfasfafdfasdf', 'sadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdf', '2022-11-19 03:58:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(27, 2, 'anonym', 'sadasdadasdasdasdasdasdsadasd', 'sadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdfsadasdfsdfasdfasfafdfasdf', '2022-11-19 03:58:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses'),
(28, 2, 'anonym', 'cekfoto final', '<?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?><?=$bukti[\'img_tiga\']?>', '2022-11-19 04:00:36', '2022-11-22 17:13:41', '0000-00-00 00:00:00', 'belum diproses'),
(29, 2, 'anonym', 'sadasdasdasdas', 'sadasdasdasdasdasdasdasdasdsadasdadsasdadsadsasdasdasdasdasdasdasdasdsad', '2022-11-19 04:16:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belum diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `img_satu` varchar(30) NOT NULL,
  `img_dua` varchar(30) NOT NULL,
  `img_tiga` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id`, `pengaduan_id`, `img_satu`, `img_dua`, `img_tiga`, `updated_at`, `deleted_at`, `created_at`) VALUES
(1, 15, '1668753260_6475a4b09ade34837a2', '1668753260_888fc912cad5b1f5306', '1668753260_a2aa61790f9f7255dd2', '2022-11-18 00:34:20', '0000-00-00 00:00:00', '2022-11-18 00:34:20'),
(2, 16, '1668753411_c892cb602c6bc8d5236', '1668753411_540714c1efc6cd9dc18', '1668753411_ce7fd22fcc8b1cf37eb', '2022-11-18 00:36:51', '0000-00-00 00:00:00', '2022-11-18 00:36:51'),
(3, 19, '1668753995_3be77f94d151deb3622', 'null', 'null', '2022-11-18 00:46:35', '0000-00-00 00:00:00', '2022-11-18 00:46:35'),
(5, 21, 'repository-open-graph-template', 'null', 'null', '2022-11-19 03:38:29', '0000-00-00 00:00:00', '2022-11-19 03:38:29'),
(6, 22, 'Screenshot (1).png', 'null', 'null', '2022-11-19 03:47:57', '0000-00-00 00:00:00', '2022-11-19 03:47:57'),
(7, 23, 'img-2', 'img-2', 'img-2', '2022-11-19 03:51:26', '0000-00-00 00:00:00', '2022-11-19 03:51:26'),
(8, 24, 'img-2png', 'img-2png', 'img-2png', '2022-11-19 03:52:42', '0000-00-00 00:00:00', '2022-11-19 03:52:42'),
(9, 25, 'img-2.jpg', 'img-2.png', 'null', '2022-11-19 03:55:32', '0000-00-00 00:00:00', '2022-11-19 03:55:32'),
(10, 26, 'bukti0-2.png', 'bukti1-2.png', 'null', '2022-11-19 03:58:02', '0000-00-00 00:00:00', '2022-11-19 03:58:02'),
(11, 27, 'bukti0-2.jpg', 'bukti1-2.png', 'null', '2022-11-19 03:58:45', '0000-00-00 00:00:00', '2022-11-19 03:58:45'),
(12, 28, 'bukti0-2.png', 'bukti1-2.png', 'bukti2-2.png', '2022-11-19 04:00:36', '0000-00-00 00:00:00', '2022-11-19 04:00:36'),
(13, 29, 'bukti0-2.png', 'null', 'null', '2022-11-19 04:16:55', '0000-00-00 00:00:00', '2022-11-19 04:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'user@gmail.com', 'Ada', '$2y$10$ozBo6fAWJRuLNewK3h86o.lk1P3srbVwrhT8FV5LdIRWaPw8VRDrm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-13 02:41:20', '2022-11-13 02:41:20', NULL),
(3, 'admin@gmail.com', 'Adm', '$2y$10$OcIcHfJU/47P7VkdKRALse9xAKwlG1YiBiPb4q3Z7/k0gfAe/C.aO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-13 02:49:54', '2022-11-13 02:49:54', NULL),
(4, 'gandagunawan36@gmail.com', 'Asstro', '$2y$10$m5Bcb3lg2Xdj/ppMlX3F2uPPlGufAR5EAZi12BbMAJGQxRcregSui', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-14 08:36:52', '2022-11-14 08:36:52', NULL),
(5, 'hakimastina@gmail.com', 'firman', '$2y$10$1iqJ0czUzXbo3AbXYj41GOFAfb4vpr24naKr3EQ7XmnktuV3iedEK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-14 11:33:44', '2022-11-14 11:33:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
