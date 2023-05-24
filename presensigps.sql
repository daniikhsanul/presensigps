-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 06:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensigps`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `kode_dept` char(3) NOT NULL,
  `nama_dept` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`kode_dept`, `nama_dept`) VALUES
('GD', 'gudang'),
('GR', 'pengajar'),
('IT', 'Teknisi'),
('KMN', 'keamanan'),
('SRP', 'sarpras'),
('TU', 'Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` char(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `kode_dept` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_lengkap`, `jabatan`, `no_hp`, `password`, `remember_token`, `foto`, `kode_dept`) VALUES
('1', 'Hendropriyono', 'IT', '085611112257', '$2y$10$h9EM4GKXwUOHTNiGY.6WJ.wunryouHvImIMUrQ1nV2Rwt.SsHjYp6', NULL, '1.png', 'IT'),
('2', 'Dani Ikhsanul M', 'Guru', '085611112224', '$2y$10$88lh6qtGXFsSmp62yQiqtO.DpHyvJL4y/YSi0TrMMgMulxPi.RJI6', '', '1234.jpg', 'GR'),
('3', 'Ferdi Sambo', 'Karyawan TU', '085611112599', '$2y$10$N19lLqcI93PMnGrAUHGMZO6zlQoXm2yQYjajf4bjMELNcLXGcd8wq', NULL, '125.png', 'TU'),
('4', 'Ica Tri Feika Sari', 'Guru', '081517129159', '$2y$10$3d85hm/fcKRCjcJ2pKkIV.TcsRMhSnJG06D04QfslvM9Ja10lcNB2', '', '2123.png', 'GR'),
('5', 'Fera', 'sarpras', '085644445555', '$2y$10$7tfjM7JvA08c6wh9/.of0.goTTn2QkOnq3F23tu/0mGkv/4cH2yI6', NULL, '3.png', 'SRP'),
('6', 'Imayatul Aeini', 'Guru', '085611112257', '$2y$10$aDzUWj1IZX1J43cmwVmGDOillxbjPqHr7P86A6NbtmzWXe16NhMFG', NULL, '7.png', 'GR'),
('7', 'Desi Ratna', 'IT', '085617777888', '$2y$10$LfEAtcQkt5B9L7OBJf.MRe9rXuSDhjU7gveJ8TmoXfEtXyuchWMrC', NULL, '8.jpg', 'IT'),
('8', 'icaaa', 'guru', '444444444', '$2y$10$F5NY1fn14IUF3.6OMPLs..3ql4ow4z0/7stvn.aO363FSa5DtzxuG', NULL, '9.JPG', 'GR');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_lokasi`
--

CREATE TABLE `konfigurasi_lokasi` (
  `id` int(11) NOT NULL,
  `lokasi_kantor` varchar(255) DEFAULT NULL,
  `radius` smallint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi_lokasi`
--

INSERT INTO `konfigurasi_lokasi` (`id`, `lokasi_kantor`, `radius`) VALUES
(1, '-6.974206143657107,109.66751335309401', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_izin`
--

CREATE TABLE `pengajuan_izin` (
  `id` int(11) NOT NULL,
  `nik` char(5) DEFAULT NULL,
  `tgl_izin` date DEFAULT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'i= izin s=sakit',
  `keterangan` varchar(255) DEFAULT NULL,
  `status_approved` char(1) DEFAULT '0' COMMENT '0=pending 1=disetujui 2=ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_izin`
--

INSERT INTO `pengajuan_izin` (`id`, `nik`, `tgl_izin`, `status`, `keterangan`, `status_approved`) VALUES
(1, '2', '2023-04-05', 's', 'sakit', '1'),
(2, '2', '2023-04-03', 'i', 'jenguk', '2'),
(3, '2', '2023-04-13', 's', 'rr', '1'),
(4, '2', '2023-05-01', 's', 'mriyang', '2'),
(5, '2', '2023-05-01', 'i', 'dl', '0'),
(6, '1', '2023-05-06', 'i', 'meriyang', '1'),
(7, '2', '2023-05-06', 'i', 'e', '0'),
(8, '2', '2023-05-08', 'i', 'pergii luar koota', '1');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `nik` char(5) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time NOT NULL,
  `jam_out` time DEFAULT NULL,
  `foto_in` varchar(255) NOT NULL,
  `foto_out` varchar(255) DEFAULT NULL,
  `lokasi_in` text NOT NULL,
  `lokasi_out` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `nik`, `tgl_presensi`, `jam_in`, `jam_out`, `foto_in`, `foto_out`, `lokasi_in`, `lokasi_out`) VALUES
(51, '2', '2023-04-21', '08:18:26', '13:18:40', '1234-2023-04-21-in.png', '1234-2023-04-21-out.png', '-6.96916,109.666359', '-6.96916,109.666359'),
(53, '1', '2023-04-21', '15:07:36', '15:08:01', '125-2023-04-21-in.png', '125-2023-04-21-out.png', '-6.96916,109.666359', '-6.96916,109.666359'),
(54, '2', '2023-04-22', '01:54:13', NULL, '1234-2023-04-22-in.png', NULL, '-6.96916,109.6662991362911', NULL),
(56, '2', '2023-05-01', '09:57:45', '22:56:24', '2123-2023-05-01-in.png', '2123-2023-05-01-out.png', '-6.969187027467811,109.66618390901289', '-6.969187027467811,109.66618390901289'),
(65, '2', '2023-05-01', '12:55:59', '13:11:34', '1234-2023-05-01-in.png', '1234-2023-05-01-out.png', '-6.96918047395585,109.66619314516261', '-6.96918047395585,109.66619314516261'),
(67, '3', '2023-05-01', '22:53:17', NULL, '3-2023-05-01-in.png', NULL, '-6.969187027467811,109.66618390901289', NULL),
(69, '2', '2023-05-02', '15:18:11', NULL, '1234-2023-05-02-in.png', NULL, '-7.0051453,110.4381254', NULL),
(70, '2', '2023-05-05', '14:10:03', '15:21:41', '1234-2023-05-05-in.png', '1234-2023-05-05-out.png', '-6.969187027467811,109.66618390901289', '-6.9694464,109.6663436'),
(71, '1', '2023-05-05', '06:39:42', NULL, '125-2023-05-05-in.png', NULL, '-6.9694464,109.6663436', NULL),
(72, '2', '2023-05-06', '18:33:39', '18:49:15', '1234-2023-05-06-in.png', '1234-2023-05-06-out.png', '-6.969187,109.666184', '-6.969187,109.666184'),
(73, '1', '2023-05-06', '20:09:12', '20:09:22', '125-2023-05-06-in.png', '125-2023-05-06-out.png', '-6.969187,109.666184', '-6.969187,109.666184'),
(74, '2', '2023-05-07', '00:01:29', '22:57:36', '1234-2023-05-07-in.png', '1234-2023-05-07-out.png', '-6.9694962,109.666331', '-6.9691914,109.6663847'),
(75, '2', '2023-05-08', '06:32:35', '16:33:26', '1234-2023-05-08-in.png', '1234-2023-05-08-out.png', '-6.960882267086785,109.63859645820038', '-6.960882267086785,109.63859645820038'),
(76, '2', '2023-05-09', '16:46:00', NULL, '1234-2023-05-09-in.png', NULL, '-6.9695026,109.6663218', NULL),
(77, '3', '2023-05-12', '13:55:00', '14:01:28', '3-2023-05-12-in.png', '3-2023-05-12-out.png', '-6.9623255,109.643902', '-6.9623255,109.643902'),
(78, '1', '2023-05-12', '14:28:51', '14:29:03', '1-2023-05-12-in.png', '1-2023-05-12-out.png', '-6.962054313817667,109.6443573641516', '-6.962054313817667,109.6443573641516'),
(79, '1', '2023-05-23', '22:12:11', NULL, '1-2023-05-23-in.png', NULL, '-6.969281,109.666315', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin kece', 'admin@gmail.com', NULL, '$2y$10$w/SCpT.974TKFXPqDsNtzOpoWXPx9m4xAf2An.gSFEjJ7UO4KARLe', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`kode_dept`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
