-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2023 pada 18.00
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_05_14_074519_create_t_barang_table', 2),
(16, '2023_05_25_095003_create_t_transaksi_out_table', 3),
(18, '2023_06_11_130802_create_t_kategori_barang_table', 4),
(23, '2023_06_18_221144_create_t_tipe_akun_table', 5),
(24, '2023_05_13_143550_create_t_user_table', 6),
(25, '2023_06_29_141647_create_t_setting_site_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang`
--

CREATE TABLE `t_barang` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_brg` bigint(20) NOT NULL,
  `nm_brg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) NOT NULL,
  `ktg_brg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrg_brg` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_brg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`id`, `kd_brg`, `nm_brg`, `stok`, `ktg_brg`, `hrg_brg`, `foto_brg`, `created_at`, `updated_at`) VALUES
('234343-2873834jskad', 2387438743789, 'Mie bihun', 10, '999', '4500', NULL, '2023-06-10 16:59:16', '2023-06-11 09:46:14'),
('83953de3-3ae6-412f-83c7-a27f4033e377', 23874387437, 'indomie goreng mantapi', 100, '999', '3200', NULL, '2023-05-22 15:13:12', '2023-06-11 09:43:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori_barang`
--

CREATE TABLE `t_kategori_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_kategori` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_kategori_barang`
--

INSERT INTO `t_kategori_barang` (`id`, `jenis_kategori`, `ket_kategori`, `created_at`, `updated_at`) VALUES
(4, 'Makanan Instan', 'Makanan Instan Mie, Super Bubur', '2023-06-16 12:30:24', '2023-06-16 12:30:24'),
(5, 'makanan kering', 'makanan  kering, snack , pudding', '2023-06-16 12:34:09', '2023-06-16 12:34:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_setting_site`
--

CREATE TABLE `t_setting_site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_site` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_setting_site`
--

INSERT INTO `t_setting_site` (`id`, `nama_site`, `created_at`, `updated_at`) VALUES
(1, 'Raja Market', '2023-06-29 13:06:01', '2023-06-29 16:16:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tipe_akun`
--

CREATE TABLE `t_tipe_akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe_akun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_super_admin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `m_admin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `m_pegawai` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_tipe_akun`
--

INSERT INTO `t_tipe_akun` (`id`, `tipe_akun`, `m_super_admin`, `m_admin`, `m_pegawai`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '1', '1', '0', '2023-06-25 10:59:15', '2023-06-29 13:19:25'),
(6, 'Kasier', '0', '0', '1', '2023-06-28 07:58:38', '2023-06-28 08:04:13'),
(7, 'Admin Toko', '0', '1', '0', '2023-07-03 14:38:05', '2023-07-03 14:38:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi_out`
--

CREATE TABLE `t_transaksi_out` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_brg` bigint(20) NOT NULL,
  `jml_brg` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_transaksi_out`
--

INSERT INTO `t_transaksi_out` (`id`, `kd_brg`, `jml_brg`, `user`, `created_at`, `updated_at`) VALUES
(1, 23874387437, 1, 'admin', '2023-05-25 12:19:58', '2023-05-25 12:19:58'),
(2, 21234384, 1, 'admin', '2023-05-25 12:19:58', '2023-05-25 12:19:58'),
(3, 21234384, 2, 'admin', '2023-05-25 12:20:59', '2023-05-25 12:20:59'),
(4, 23874387437, 2, 'admin', '2023-05-25 12:34:40', '2023-05-25 12:34:40'),
(5, 21234384, 1, 'admin', '2023-05-25 12:34:40', '2023-05-25 12:34:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ft_user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `nm_user`, `email_user`, `gender`, `tgl_lahir`, `password`, `ft_user`, `role`, `created_at`, `updated_at`) VALUES
('40f1746c-890c-410b-bb1d-7bc767e07330', 'rizki ratih purwasih', 'admin123@gmail.com', 'P', NULL, '$2y$10$466iA6si1we3rqqc7xSQnu72wPlVcARWeb/vCCbz0FUmDODAPy1eG', NULL, '7', '2023-07-03 14:39:03', '2023-07-03 14:39:03'),
('f0e4de9c-eb83-486c-9143-578bbc6df0df', 'admin', 'admin@admin', 'L', NULL, '$2y$10$fpxhWrQNOWyyy5Rnsr3K.uKe33dDffdzjDDwozbDmc8Wdv5XbKHIu', 'admin.jpg', '1', '2023-06-28 07:29:02', '2023-06-28 07:30:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_barang_kd_brg_unique` (`kd_brg`);

--
-- Indeks untuk tabel `t_kategori_barang`
--
ALTER TABLE `t_kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_setting_site`
--
ALTER TABLE `t_setting_site`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_tipe_akun`
--
ALTER TABLE `t_tipe_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_transaksi_out`
--
ALTER TABLE `t_transaksi_out`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_kategori_barang`
--
ALTER TABLE `t_kategori_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `t_setting_site`
--
ALTER TABLE `t_setting_site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_tipe_akun`
--
ALTER TABLE `t_tipe_akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_transaksi_out`
--
ALTER TABLE `t_transaksi_out`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
