-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2022 pada 08.19
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

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
(3, 19, '1668753995_3be77f94d151deb3622', 'null', 'null', '2022-11-18 00:46:35', '0000-00-00 00:00:00', '2022-11-18 00:46:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
