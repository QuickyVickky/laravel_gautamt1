-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 05:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gautamgb`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'required',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-active,0-deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Telecaller', 1, '2021-06-08 17:16:25', '2021-06-08 17:16:25'),
(2, 'I.T.', 1, '2021-06-08 17:16:25', '2021-06-08 17:16:25'),
(3, 'Accounting', 1, '2021-06-08 17:16:25', '2021-06-08 17:16:25'),
(4, 'Food Service', 1, '2021-06-08 17:16:26', '2021-06-08 17:16:26'),
(5, 'XYZ', 1, '2021-06-08 17:16:26', '2021-06-08 17:16:26'),
(6, 'Manager', 1, '2021-06-08 17:16:26', '2021-06-08 17:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'required',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-active,0-deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Developer', 1, '2021-06-08 17:16:22', '2021-06-08 17:16:22'),
(2, 'Web Designer', 1, '2021-06-08 17:16:22', '2021-06-08 17:16:22'),
(3, 'HR', 1, '2021-06-08 17:16:22', '2021-06-08 17:16:22'),
(4, 'Flutter Developer', 1, '2021-06-08 17:16:23', '2021-06-08 17:16:23'),
(5, 'Graphics Designer', 1, '2021-06-08 17:16:23', '2021-06-08 17:16:23'),
(6, 'Android Developer', 1, '2021-06-08 17:16:23', '2021-06-08 17:16:23');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_06_02_134823_create_departments_table', 1),
(10, '2021_06_02_135034_create_designations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('129f2a656d01204df569527a2d220912f0e0318775588e4a6122e68ce360056a99026b2e95ae0dba', 2, '93a07036-c373-4cee-91ad-0f67b3016a4a', 'AuthToken', '[]', 0, '2021-06-08 12:34:30', '2021-06-08 12:34:30', '2021-09-08 18:04:29'),
('4c4d35cde7c677327e701f6168b2875b985d8a4f8db91251cc1bb4542b52b265d842fa96a0f94723', 2, '93a07036-c373-4cee-91ad-0f67b3016a4a', 'Token Name', '[]', 0, '2021-06-08 12:29:52', '2021-06-08 12:29:52', '2021-09-08 17:59:52'),
('85d08500b1f2fe0e1055b7d3f90061ec711283bf131b6910df857ac08355b5aac74bf3e3ea2b901e', 1, '93a07036-c373-4cee-91ad-0f67b3016a4a', 'authToken', '[]', 0, '2021-06-08 11:51:13', '2021-06-08 11:51:13', '2021-09-08 17:21:13'),
('8c7c4dc78512b1d9913b6379eec20ca94474efb6c3a8aec865a07f3cdf968d5cc92fb8a679e7d6d7', 2, '93a07036-c373-4cee-91ad-0f67b3016a4a', 'AuthToken', '[]', 0, '2021-06-08 12:33:08', '2021-06-08 12:33:08', '2021-09-08 18:03:08'),
('92555cee4e4a0645bda27e1b4b3bda2cdff905f78dc4677892933e8868f8b6db2e3a5ba5e75fa39b', 2, '93a07036-c373-4cee-91ad-0f67b3016a4a', 'Token Name', '[]', 0, '2021-06-08 12:29:22', '2021-06-08 12:29:22', '2021-09-08 17:59:21'),
('96a3eaaf0ebdf4ab65b5a1985b9614c75f6d54232d2a2eb7af81724a80ea6be8bff2838d024ea7e6', 2, '93a07036-c373-4cee-91ad-0f67b3016a4a', 'AuthToken', '[]', 0, '2021-06-08 12:33:23', '2021-06-08 12:33:23', '2021-09-08 18:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('93a07036-c373-4cee-91ad-0f67b3016a4a', NULL, 'Laravel Personal Access Client', 'WJCgU0pkQ29ZlsbN0atwcOlpgSEbrOvM1po6QoXe', NULL, 'http://localhost', 1, 0, 0, '2021-06-08 11:51:07', '2021-06-08 11:51:07'),
('93a07037-e5cf-422c-8313-229d234e2fe0', NULL, 'Laravel Password Grant Client', 'OjnhzHYv4QFP8gfJDMOxX6z23cbYWc8evTANIiq9', 'users', 'http://localhost', 0, 1, 0, '2021-06-08 11:51:07', '2021-06-08 11:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '93a07036-c373-4cee-91ad-0f67b3016a4a', '2021-06-08 11:51:07', '2021-06-08 11:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'optional',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `gender` enum('M','F','O') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `salary` decimal(11,2) NOT NULL DEFAULT 0.00,
  `passport_document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `designation_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-active,0-deactive',
  `type` enum('Admin','Employee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `lastname`, `profile`, `email`, `mobile`, `email_verified_at`, `password`, `dob`, `joining_date`, `gender`, `salary`, `passport_document`, `passport_number`, `department_id`, `designation_id`, `is_active`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Admin', 'Admin', NULL, 'admin@admin.com', NULL, NULL, '$2y$10$/sf0XftEKJCyh85EEw2i.eUdkthFdnxTFs7ysHTwam0HjHZZgyQeC', NULL, NULL, 'M', '0.00', NULL, NULL, 0, 0, 1, 'Admin', NULL, '2021-06-08 11:46:20', '2021-06-08 11:46:20'),
(3, 'Gautam ', 'Gautam', 'Bajrangi', 'dp60c0ed47eb8231623256391.png', 'gautambajrangi@gmail.com', '9428271348', NULL, '$2y$10$OnnSWqxRswYVTT.JW4MwPuva.dyJfKHdo1rJ6lvoH6V8uihTVNFKO', '2021-06-08', '2021-06-03', 'M', '35000.00', 'dc60c0ed2a8a2931623256362.jpg', '1230', 3, 1, 1, 'Employee', NULL, '2021-06-09 16:22:28', '2021-06-09 16:33:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
