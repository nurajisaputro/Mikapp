-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 09.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mikapp_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `connection`
--

CREATE TABLE `connection` (
  `id` int(11) NOT NULL,
  `router` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `connection`
--

INSERT INTO `connection` (`id`, `router`, `description`, `ip`, `username`, `password`) VALUES
(1, 'ccr1036', 'Dist#1', '192.168.3.1', 'a', 'a'),
(2, 'ccr1009', 'Router Gateway', '10.10.10.1', 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin_menu`
--

CREATE TABLE `superadmin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `superadmin_menu`
--

INSERT INTO `superadmin_menu` (`id`, `menu`) VALUES
(1, 'INTERFACE'),
(2, 'PPPOE'),
(3, 'TOOLS'),
(4, 'SYSTEM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin_sub_menu`
--

CREATE TABLE `superadmin_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `data_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role_id`, `is_active`, `data_created`) VALUES
(22, 'Saputro', 'saputro', '$2y$10$iCprF48vOr6zPYJVrBAVauATw2DnUyqjEWJSwTpVGM00OZfe7k1YW', 1, 1, 280224),
(23, 'Nur Aji', 'nuraji', '$2y$10$eQJAG1Egosabf6KWUMTCLuLjIydt5RAV0O/8M0Nu8kQ9NuhJ/L/zS', 1, 1, 30324),
(25, 'Kemuning', 'kemuning', '$2y$10$1ZxVhaVW7BWr9W5ARE6QzOPd3vYvdNVsmxomLjRsHNIVJKnz.256K', 1, 1, 160524);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(30) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_log`
--

INSERT INTO `user_log` (`id`, `username`, `date`, `time`, `location`) VALUES
(25, 'nuraji', 290524, 1345, ''),
(26, 'nuraji', 290524, 2158, ''),
(27, 'nuraji', 300524, 1223, ''),
(28, 'nuraji', 300524, 2311, ''),
(29, 'nuraji', 310524, 1318, ''),
(30, 'nuraji', 40624, 912, ''),
(31, 'nuraji', 40624, 915, ''),
(32, 'nuraji', 40624, 945, ''),
(33, 'nuraji', 50624, 1256, ''),
(34, 'nuraji', 70624, 1050, ''),
(35, 'nuraji', 70624, 1138, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `superadmin_menu`
--
ALTER TABLE `superadmin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `superadmin_sub_menu`
--
ALTER TABLE `superadmin_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `superadmin_menu`
--
ALTER TABLE `superadmin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `superadmin_sub_menu`
--
ALTER TABLE `superadmin_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
