-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 11:34 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_29_104833_create_sessions_table', 1),
(9, '2020_09_30_101559_create_oex_students_table', 4),
(16, '2020_10_01_100533_create_oex_categories_table', 5),
(18, '2020_10_05_113546_create_oex_exam_masters_table', 6),
(19, '2020_10_07_122332_create_oex_portals_table', 7),
(20, '2020_10_15_140305_create_oex_exam_question_masters_table', 8),
(22, '2020_10_19_110330_create_oex_results_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `oex_categories`
--

CREATE TABLE `oex_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_categories`
--

INSERT INTO `oex_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(33, 'WORDPRESS', '0', '2020-10-01 06:16:23', '2020-10-10 05:22:07'),
(41, 'PHP', '1', '2020-10-17 05:48:58', '2020-10-17 05:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_masters`
--

CREATE TABLE `oex_exam_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_masters`
--

INSERT INTO `oex_exam_masters` (`id`, `title`, `category`, `exam_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Wordpress', '39', '2020-12-12', '1', '2020-10-06 05:06:16', '2020-10-07 03:51:34'),
(7, 'msts', '39', '2020-12-29', '1', '2020-10-06 06:39:42', '2020-10-06 06:40:00'),
(8, 'Networks Exams', '40', '2020-10-25', '1', '2020-10-10 05:23:17', '2020-10-10 05:23:17'),
(9, 'Final Exams', '31', '2020-12-12', '1', '2020-10-11 04:21:13', '2020-10-11 04:21:13'),
(10, 'PHP EXAM', '41', '2020-10-31', '1', '2020-10-17 05:49:36', '2020-10-17 05:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_question_masters`
--

CREATE TABLE `oex_exam_question_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_question_masters`
--

INSERT INTO `oex_exam_question_masters` (`id`, `exam_id`, `question`, `ans`, `options`, `status`, `created_at`, `updated_at`) VALUES
(11, '10', 'What is PHP', 'Server Side Language', '{\"option1\":\"Client Side Script\",\"option2\":\"DataBase\",\"option3\":\"Architect Design\",\"option4\":\"Server Side Language\"}', '1', '2020-10-17 05:49:57', '2020-10-17 05:49:57'),
(12, '10', 'What is used to print in PHP?', 'Echo', '{\"option1\":\"Print\",\"option2\":\"Echo\",\"option3\":\"Print_r\",\"option4\":\"cout\"}', '1', '2020-10-17 05:50:35', '2020-10-17 05:50:35'),
(13, '10', 'Which statement is used to connect database in PHP?', 'mysqli_connect', '{\"option1\":\"mysqli_connect\",\"option2\":\"mysqli_select_db\",\"option3\":\"mysqli_select_query\",\"option4\":\"mysqli_fetch\"}', '1', '2020-10-17 05:50:57', '2020-10-17 05:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `oex_portals`
--

CREATE TABLE `oex_portals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_portals`
--

INSERT INTO `oex_portals` (`id`, `name`, `email`, `mobile_no`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shailza Rani', 'sgshailza85@gmail.com', '9870241364', 'shailza', '1', '2020-10-08 04:36:11', '2020-10-08 04:54:05'),
(3, 'Rohan', 'rohan@gmail.com', '99999999999', NULL, '1', '2020-10-08 04:49:08', '2020-10-08 05:23:58'),
(4, 'shailza Rani', 'sgshailza85@gmail.com', '9738187421', 'shailza', '1', '2020-10-08 05:59:39', '2020-10-08 05:59:39'),
(5, 'shailza Rani', 'sgshailza85@gmail.com', '99999999999', 'sasas', '1', '2020-10-08 06:00:41', '2020-10-08 06:00:41'),
(7, 'test', 'test@gmail.com', '9738187421', 'tete', NULL, '2020-10-09 05:44:44', '2020-10-09 05:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `oex_results`
--

CREATE TABLE `oex_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yes_ans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_json` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oex_students`
--

CREATE TABLE `oex_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_students`
--

INSERT INTO `oex_students` (`id`, `name`, `email`, `mobile_no`, `dob`, `exam`, `password`, `status`, `created_at`, `updated_at`) VALUES
(38, 'Rahul Kumar', 'rahulmunjal19@gmail.com', '9738187421', '2020-10-13', '6', 'rahul', '1', '2020-10-12 05:56:06', '2020-10-13 04:55:06'),
(40, 'Kunal', 'kunal@gmail.com', '9738187421', '2020-10-10', '8', 'kunal', '1', '2020-10-13 05:20:26', '2020-10-13 05:20:58'),
(41, 'shailza Rani', 'sgshailza85@gmail.com', '9870241364', '1989-07-13', '10', 'shailza', '1', '2020-10-17 05:52:06', '2020-10-17 05:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7oILAHNY8yj8tC3YrtcdUBib6Is0VwRbibKR5oXx', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXNXTmRtMmpNRHpRbDNON1RwVmkzN245WlYyOWFYQ3VuVGxaVHhUayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA5OiJodHRwOi8vbG9jYWxob3N0OjgwODAvb25saW5lX2V4YW1fc3lzdGVtL3BvcnRhbC9zdHVkZW50X2V4YW1faW5mbz9kb2I9MjAyMC0xMC0zMSZleGFtPTEwJm1vYmlsZV9ubz05ODcwMjQxMzY0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNDoicG9ydGFsX3Nlc3Npb24iO2k6MTt9', 1603449169);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'shailza Rani', 'sgshailza85@gmail.com', NULL, '$2y$10$VhDI9RABcsn256FXYCZUxOgWe6qTuvHdwJdMOwauOJu/xeRl26IIa', NULL, NULL, NULL, NULL, NULL, '2020-09-29 05:29:48', '2020-09-29 05:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_categories`
--
ALTER TABLE `oex_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_question_masters`
--
ALTER TABLE `oex_exam_question_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_portals`
--
ALTER TABLE `oex_portals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_results`
--
ALTER TABLE `oex_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_students`
--
ALTER TABLE `oex_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oex_categories`
--
ALTER TABLE `oex_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oex_exam_question_masters`
--
ALTER TABLE `oex_exam_question_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `oex_portals`
--
ALTER TABLE `oex_portals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oex_results`
--
ALTER TABLE `oex_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oex_students`
--
ALTER TABLE `oex_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
