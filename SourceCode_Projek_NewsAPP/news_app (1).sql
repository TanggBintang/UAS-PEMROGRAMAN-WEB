-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2025 at 09:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Politik', 'politik', '2025-06-12 06:25:29', '2025-06-12 06:25:29'),
(2, 'Ekonomi', 'ekonomi', '2025-06-12 06:25:29', '2025-06-12 06:25:29'),
(3, 'Olahraga', 'olahraga', '2025-06-12 06:25:29', '2025-06-12 06:25:29'),
(4, 'Teknologi', 'teknologi', '2025-06-12 06:25:29', '2025-06-12 06:25:29'),
(5, 'Kesehatan', 'kesehatan', '2025-06-12 06:25:29', '2025-06-12 06:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_06_14_055452_add_views_column_to_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('draft','published','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `views` bigint UNSIGNED NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `image`, `category_id`, `user_id`, `status`, `views`, `published_at`, `created_at`, `updated_at`) VALUES
(5, 'Presiden Tunjuk Menteri Baru Usai Reshuffle Kabinet', 'presiden-tunjuk-menteri-baru-usai-reshuffle-kabinet', 'Presiden Indonesia melakukan reshuffle kabinet pada Senin pagi dengan menunjuk Riza Mahendra sebagai Menteri Perdagangan yang baru. Pergantian ini dilakukan untuk memperkuat kinerja pemerintah di bidang ekonomi jelang akhir masa jabatan. Presiden menegaskan bahwa keputusan ini diambil berdasarkan evaluasi kinerja dan kebutuhan strategis nasional.', '1749972506_Polisitk.jpg', 1, 1, 'draft', 0, NULL, '2025-06-15 00:28:28', '2025-06-15 00:28:28'),
(6, 'Pemerintah Resmi Naikkan Subsidi Energi untuk Rakyat', 'pemerintah-resmi-naikkan-subsidi-energi-untuk-rakyat', 'Pemerintah mengumumkan kenaikan subsidi energi sebesar 15% mulai Juli 2025. Langkah ini bertujuan menekan inflasi dan menjaga daya beli masyarakat. Menteri Keuangan menyatakan bahwa subsidi ini fokus pada sektor bahan bakar dan listrik untuk masyarakat berpenghasilan rendah.', '1749973232_ekonomi.jpg', 2, 7, 'published', 0, '2025-06-15 01:32:01', '2025-06-15 00:40:32', '2025-06-15 01:32:01'),
(7, 'Indonesia Raih Emas di Final SEA Games Cabang Sepak Bola', 'indonesia-raih-emas-di-final-sea-games-cabang-sepak-bola', 'Timnas U-23 Indonesia berhasil meraih medali emas setelah mengalahkan Vietnam 2-1 di final SEA Games 2025. Gol penentu dicetak oleh Rizky Maulana di menit ke-89. Kemenangan ini mengakhiri puasa gelar sepak bola Indonesia di ajang tersebut selama lebih dari satu dekade.', '1749973349_olahraga.jpg', 3, 3, 'published', 1, '2025-06-15 00:49:27', '2025-06-15 00:42:29', '2025-06-15 00:53:28'),
(8, 'Startup Lokal Luncurkan Aplikasi AI Penjawab Soal Sekolah', 'startup-lokal-luncurkan-aplikasi-ai-penjawab-soal-sekolah', 'Sebuah startup teknologi asal Bandung meluncurkan aplikasi berbasis AI bernama “PintarQ” yang mampu menjawab soal pelajaran sekolah secara instan. Aplikasi ini ditujukan bagi siswa SMP dan SMA, dan sudah diunduh lebih dari 100 ribu kali sejak diluncurkan dua minggu lalu.', '1749973479_teknologi.jpg', 4, 5, 'rejected', 0, NULL, '2025-06-15 00:44:39', '2025-06-15 00:49:21'),
(9, 'Kasus DBD Meningkat, Kemenkes Imbau Warga Waspada', 'kasus-dbd-meningkat-kemenkes-imbau-warga-waspada', 'Kementerian Kesehatan mencatat lonjakan kasus Demam Berdarah Dengue (DBD) di beberapa daerah sejak awal Juni 2025. Pemerintah mengimbau masyarakat untuk menjaga kebersihan lingkungan dan melakukan fogging mandiri. Vaksinasi juga mulai didorong di daerah rawan.', '1749973674_kesehatan.jpg', 5, 8, 'published', 0, '2025-06-15 00:49:16', '2025-06-15 00:47:54', '2025-06-15 00:49:16'),
(10, 'TES', 'tes', 'TES', '1749976793_vaskin.jpg', 5, 5, 'draft', 0, NULL, '2025-06-15 01:39:53', '2025-06-15 01:39:53');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ilhambintang9773@gmail.com', '$2y$12$czQXSjkjOEtQhcOi690Wp.uJtKbS5ccnOUSX.iDQE3vntZz4RhALq', '2025-06-14 23:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','editor','wartawan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wartawan',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microsoft_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `github_id`, `google_id`, `microsoft_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '1749972597_mas ironi.jpg', NULL, NULL, NULL, 'DaJly3YtJdgGFZPnd6uyKUpeB4lgJWr1WIYY89Jkg8K6fMKe8eog4MATIhhE', '2025-06-12 06:25:29', '2025-06-15 00:29:57'),
(2, 'Editor User', 'editor@editor.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'editor', '1749972956_rusdi.jpg', NULL, NULL, NULL, 'OD38CbCgwoQ2rn6JywQGYt33gZ2or07wUqHcA1nPb2dVKyHqIsIs5e8VU4st', '2025-06-12 06:25:29', '2025-06-15 00:35:56'),
(3, 'Mas Waduh', 'wartawan@wartawan.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wartawan', '1749973297_kumalala.jpg', NULL, NULL, NULL, NULL, '2025-06-12 06:25:29', '2025-06-15 00:41:47'),
(4, 'Kentang', 'memetoyee3@gmail.com', NULL, '$2y$12$4uXVtpUEjvmi91fKiwfBhu3hSJbcq9GNPjo16O7x7tF5DTsX5dT5e', 'wartawan', NULL, NULL, NULL, NULL, NULL, '2025-06-12 02:04:29', '2025-06-12 02:04:29'),
(5, 'Dennis Ipon 7', 'muhammadilham.23129@mhs.unesa.ac.id', NULL, '$2y$12$CFNijImzCLSMFdoUcbJyTeAbD39rgHuwIR698vW06V1wd2hggZ2SK', 'wartawan', '1749976882_irwi.jpg', '149054119', NULL, NULL, NULL, '2025-06-14 00:01:30', '2025-06-15 01:41:22'),
(6, 'D_134_ Ghifari Dafa Efendy', 'ghifari.23134@mhs.unesa.ac.id', NULL, '$2y$12$lvmLlzKMeqJTeTn3jha2UOrYHumBSZZqWw8bwLbe1mvZC//9cz.a.', 'wartawan', 'https://lh3.googleusercontent.com/a/ACg8ocKbiZcxxUtL0_BGbuFRIDbuttn1qQrlYuic2itsG-SGU55NGA=s96-c', NULL, '109821312987979366770', NULL, NULL, '2025-06-14 00:05:00', '2025-06-14 00:05:00'),
(7, 'MUHAMMAD ILHAM BINTANG', 'ilhambintang9773@gmail.com', NULL, '$2y$12$4Wz/o/7F.gFkiFBReX4whumNGdbtAVDShfJMTU3c5slzm/DJNeB6i', 'wartawan', '1749974524_WIN_20250405_20_14_53_Pro.jpg', NULL, '108276651667171369783', NULL, NULL, '2025-06-14 22:58:03', '2025-06-15 01:02:04'),
(8, 'Mr. Meow', 'Meow@gmail.com', NULL, '$2y$12$gvcHHJ.EYI4BWOwxGg8AwupplC0kRRGyc1.i2CLK7gJlrWoCmi77G', 'wartawan', '1749973616_cing.jpg', NULL, NULL, NULL, NULL, '2025-06-15 00:46:35', '2025-06-15 00:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_views_index` (`views`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
