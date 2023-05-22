-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 06:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisisurats`
--

CREATE TABLE `disposisisurats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disposisi_oleh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_ditolak` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disposisi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisisurats`
--

INSERT INTO `disposisisurats` (`id`, `created_at`, `updated_at`, `no_disposisi`, `disposisi_oleh`, `isi_ditolak`, `disposisi_id`) VALUES
(1, '2023-03-20 00:26:26', '2023-03-20 00:26:26', 'SR01/03/23/', 'Admin', 'Sudah di Ajukan !!!', 2),
(2, '2023-03-20 00:32:30', '2023-03-20 00:32:30', 'SR01/03/23/23', 'Admin', NULL, 4),
(3, '2023-03-21 05:29:44', '2023-03-21 05:29:44', 'SR01/03/23/', 'Admin', 'terlalu panjang', 3);

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
-- Table structure for table `jenissurats`
--

CREATE TABLE `jenissurats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodesurat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namejenis` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenissurats`
--

INSERT INTO `jenissurats` (`id`, `kodesurat`, `namejenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'SR01', 'SuratResmi', NULL, '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(2, 'SP01', 'SuratPermohonan', NULL, '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(3, 'SK01', 'SuratKuasa', NULL, '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(4, 'SP02', 'SuratPerintah', NULL, '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(5, 'SP03', 'SuratPengantar', NULL, '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(6, 'SE01', 'SuratEdaran', NULL, '2023-03-14 08:07:01', '2023-03-14 08:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriarsips`
--

CREATE TABLE `kategoriarsips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `arsip_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_arsip` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoriarsips`
--

INSERT INTO `kategoriarsips` (`id`, `created_at`, `updated_at`, `arsip_kategori`, `kode_arsip`) VALUES
(1, '2023-03-14 08:07:01', '2023-03-14 08:07:01', 'Arsip Berguna', 'AB01'),
(2, '2023-03-14 08:07:01', '2023-03-14 08:07:01', 'Arsip Penting', 'AP01'),
(3, '2023-03-14 08:07:01', '2023-03-14 08:07:01', 'Arsip Vital', 'AV01'),
(4, '2023-03-14 08:07:01', '2023-03-14 08:07:01', 'Arsip Dinamis', 'AD01');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_01_103249_create_jenissurats_table', 1),
(6, '2022_06_02_055929_create_sifatsurats_table', 1),
(7, '2022_07_01_102640_create_suratkeluars_table', 1),
(8, '2022_07_07_081248_create_suratmasuks_table', 1),
(9, '2022_07_08_131740_create_disposisisurats_table', 1),
(10, '2022_10_03_070647_create_kategoriarsips_table', 1),
(11, '2022_10_04_072851_create_pengarsipans_table', 1);

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
-- Table structure for table `pengarsipans`
--

CREATE TABLE `pengarsipans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_arsip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodearsip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_arsip_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengarsipans`
--

INSERT INTO `pengarsipans` (`id`, `created_at`, `updated_at`, `file_arsip`, `author`, `judul`, `kodearsip`, `kategori_arsip_id`) VALUES
(1, '2023-03-22 23:44:42', '2023-03-22 23:44:42', 'dokument/Jxq0ZUKwX3SSZ0xMjsKEmHb3ibwD3pyNAZ2Li4YW.pdf', 'Admin', 'Arsip keuangan', '1', 1),
(2, '2023-03-27 08:48:16', '2023-03-27 08:48:16', 'dokument/Z2zJ7b72kXu85pIG4HRMcyy9r9BTu6DhJcpxcXJQ.pdf', 'Admin', 'Arsip Penting', '1', 2);

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
-- Table structure for table `sifatsurats`
--

CREATE TABLE `sifatsurats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namesifat` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sifatsurats`
--

INSERT INTO `sifatsurats` (`id`, `namesifat`, `created_at`, `updated_at`) VALUES
(1, 'Biasa', '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(2, 'Rahasia', '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(3, 'Penting', '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(4, 'Segera', '2023-03-14 08:07:01', '2023-03-14 08:07:01'),
(5, 'Rutin', '2023-03-14 08:07:01', '2023-03-14 08:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluars`
--

CREATE TABLE `suratkeluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_surat_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat_keluar` date NOT NULL,
  `lampiran` int(11) DEFAULT NULL,
  `perihal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Diterima','Proses','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `disposisi_isi` tinyint(1) NOT NULL DEFAULT 0,
  `print_surat` tinyint(1) NOT NULL DEFAULT 0,
  `sifat_id` bigint(20) UNSIGNED NOT NULL,
  `jenissurat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suratkeluars`
--

INSERT INTO `suratkeluars` (`id`, `created_at`, `updated_at`, `no_surat_keluar`, `tgl_surat_keluar`, `lampiran`, `perihal`, `penerima_surat`, `status`, `disposisi_isi`, `print_surat`, `sifat_id`, `jenissurat_id`, `user_id`) VALUES
(1, '2023-03-15 08:45:29', '2023-03-15 08:48:14', '1', '2023-03-15', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat obcaecati doloribus iure illo similique, enim explicabo dignissimos quam beatae molestiae, itaque nostrum perferendis, esse soluta qui odit maxime unde excepturi aspernatur voluptates corporis dolor reprehenderit? Temporibus itaque perspiciatis odit alias dolorum earum minus molestias libero voluptatem quae dolor vitae quis praesentium, reiciendis dicta sapiente iure nemo sit reprehenderit cumque! Optio doloribus laudantium at quod distinctio maiores, illo tempora eius ea animi ducimus perferendis cum nemo nostrum omnis voluptates aperiam facilis minima enim consequatur id? In, impedit et, veniam quasi aliquam cumque, facilis ea quo ducimus voluptatem dignissimos incidunt quas expedita eius quam vero ab cum laborum. Quas laudantium similique assumenda quo ratione sunt impedit necessitatibus earum doloremque vel labore, eos libero laborum consequuntur iusto dolorem maiores incidunt, suscipit voluptatibus esse omnis minima quisquam. Esse officiis, fuga necessitatibus laudantium ipsa quidem recusandae rerum repellat hic numquam quibusdam cum dolorem temporibus maxime error impedit optio distinctio nihil ullam. Illum veniam tempora explicabo? Quidem, aut doloribus a facilis laborum similique tempore repudiandae fugiat ipsam esse id, ut sint vel obcaecati dolores. Atque quos neque fugiat assumenda. Tempora hic eos libero quasi eaque laboriosam obcaecati aspernatur officiis, delectus recusandae quos repudiandae veniam reiciendis maiores cupiditate iusto. Exercitationem error in nam voluptates porro libero? Harum officiis repudiandae odio, nisi est ea sunt, sapiente aspernatur asperiores ipsa, quo dolorem laborum? Officiis vel, temporibus distinctio sed voluptates fuga. Dignissimos repellat, sapiente omnis inventore laudantium odio ipsa, quo dolorem eum fugit officia suscipit minus. Temporibus quae sed hic in architecto unde facere doloribus deleniti quo beatae accusamus voluptate debitis libero, maxime ea dignissimos rem eius nihil modi, voluptates impedit? Officia veniam quisquam quod placeat, beatae dicta assumenda autem consequatur aspernatur incidunt qui totam explicabo pariatur eius quae? Ipsum iure accusamus commodi at sit omnis ipsam ipsa, aperiam totam.', 'dadang', 'Proses', 0, 0, 3, 1, 1),
(2, '2023-03-20 00:25:12', '2023-03-20 00:26:26', '2', '2023-03-20', NULL, 'loremsahdjashjdashjsadhjahsdhjashdlas', 'dadang', 'Ditolak', 1, 1, 1, 1, 1),
(3, '2023-03-20 00:27:54', '2023-03-21 05:29:44', '3', '2023-03-20', NULL, 'lasdasjdkasjlaskdjalskjdksajdlkas', 'dadang', 'Ditolak', 1, 0, 1, 1, 1),
(4, '2023-03-20 00:31:29', '2023-03-20 00:32:30', '4', '2023-03-20', NULL, 'jsadjksajdlksaskjadjklasjdjkdasjld', 'dadang', 'Diterima', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuks`
--

CREATE TABLE `suratmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_surat_keluar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_surat_keluar` date DEFAULT NULL,
  `lampiran` int(11) DEFAULT NULL,
  `perihal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Diterima','Proses','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `sifat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenissurat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `name`, `username`, `email`, `password`, `jabatan`, `alamat`, `gambar`, `telepon`, `tgl_lahir`, `is_admin`, `remember_token`) VALUES
(1, '2023-03-14 08:07:02', '2023-03-14 08:07:02', 'Ares', 'ares', 'ares@gmail.com', '$2y$10$9SXh0Df/vb0AxOEClDaV5uU5T9v.5m36vUfVdmUotxJk4dKUeTO5K', NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, '2023-03-14 08:07:02', '2023-03-14 08:07:02', 'Emul', 'emul', 'emul@gmail.com', '$2y$10$1w5ZW0EDX09JDAN9r2mxp.GgurADmt5ABQ0rLucKtitc4CUn.1P.S', NULL, NULL, NULL, NULL, NULL, 0, NULL),
(3, '2023-03-14 08:07:02', '2023-03-23 01:30:24', 'Admin', 'admin', 'admin@gmail.com', '$2y$10$zz6UQP7POZkOtJc/DPvN8.mcRb3MvORtxp2ZQV/Fv01BqeTQ8oFaC', 'Admin', 'jln.kopo', NULL, '08909232', '2023-03-23', 1, NULL),
(4, '2023-03-15 08:53:49', '2023-03-15 08:53:49', 'dadang', 'dadang aja', 'dadang@gmail.com', '$2y$10$RUEhiYIbI3ZwYGi5gMWo2uySR/.y98lSdmDv84D8H/tIC38zyOrHC', NULL, NULL, NULL, NULL, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisisurats`
--
ALTER TABLE `disposisisurats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenissurats`
--
ALTER TABLE `jenissurats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoriarsips`
--
ALTER TABLE `kategoriarsips`
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
-- Indexes for table `pengarsipans`
--
ALTER TABLE `pengarsipans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sifatsurats`
--
ALTER TABLE `sifatsurats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratkeluars`
--
ALTER TABLE `suratkeluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suratkeluars_sifat_id_foreign` (`sifat_id`),
  ADD KEY `suratkeluars_jenissurat_id_foreign` (`jenissurat_id`),
  ADD KEY `suratkeluars_user_id_foreign` (`user_id`);

--
-- Indexes for table `suratmasuks`
--
ALTER TABLE `suratmasuks`
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
-- AUTO_INCREMENT for table `disposisisurats`
--
ALTER TABLE `disposisisurats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenissurats`
--
ALTER TABLE `jenissurats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategoriarsips`
--
ALTER TABLE `kategoriarsips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengarsipans`
--
ALTER TABLE `pengarsipans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sifatsurats`
--
ALTER TABLE `sifatsurats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suratkeluars`
--
ALTER TABLE `suratkeluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suratmasuks`
--
ALTER TABLE `suratmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suratkeluars`
--
ALTER TABLE `suratkeluars`
  ADD CONSTRAINT `suratkeluars_jenissurat_id_foreign` FOREIGN KEY (`jenissurat_id`) REFERENCES `jenissurats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `suratkeluars_sifat_id_foreign` FOREIGN KEY (`sifat_id`) REFERENCES `sifatsurats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `suratkeluars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
