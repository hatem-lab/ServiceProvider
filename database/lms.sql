-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 11:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_line_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_commercial_register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_expiry_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `superadmin` int(11) NOT NULL DEFAULT 0,
  `mobile_confirmed` tinyint(11) NOT NULL DEFAULT 0,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `job_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_mobile_email`
--

CREATE TABLE `admin_mobile_email` (
  `id` int(11) NOT NULL,
  `admin_id` tinyint(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `confirm_code` int(11) NOT NULL,
  `is_confirmed` tinyint(11) NOT NULL DEFAULT 0,
  `type` tinyint(11) NOT NULL DEFAULT 1,
  `is_primary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country_id` tinyint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'مكتب', 1, '2021-11-22 21:46:48', '2021-11-22 21:46:48'),
(2, 'شركة', 1, '2021-07-10 21:00:00', '2021-07-10 21:00:00'),
(3, 'محل تجاري', 1, '2021-10-25 21:00:00', '2021-10-25 21:00:00'),
(4, 'مقاول', 1, '2021-07-10 21:00:00', '2021-07-10 21:00:00');

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
(3, '2017_05_29_155126144426_create_products_table', 1),
(4, '2020_08_19_204833_create_settings_table', 1),
(5, '2020_08_19_213045_create_setting_translations_table', 1),
(6, '2020_09_12_191258_create_brand_translations_table', 1),
(7, '2020_11_14_133140_add_mobile_column_to_user_table', 1),
(8, '2020_11_14_133619_drop_email_column_from_user_table', 1),
(9, '2020_11_14_141441_create_users_verfication_code_table', 1),
(10, '2021_11_09_132548_create_teashers_table', 2),
(12, '2021_11_09_132740_create_admins_table', 3);

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
-- Table structure for table `preferred_contact_media`
--

CREATE TABLE `preferred_contact_media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferred_contact_media`
--

INSERT INTO `preferred_contact_media` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'تويتر', 1, '2021-11-22 22:43:37', '2021-11-22 22:43:37'),
(2, 'انستغرام', 1, '2021-11-22 22:43:37', '2021-11-22 22:43:37'),
(3, 'سناب شات', 1, '2021-11-22 22:44:11', '2021-11-22 22:44:11'),
(4, 'فيسبوك', 1, '2021-11-22 22:44:26', '2021-11-22 22:44:26'),
(5, 'لينكيد ان', 1, '2021-11-22 22:44:43', '2021-11-22 22:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `preferred_contact_media_agent`
--

CREATE TABLE `preferred_contact_media_agent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_contact_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferred_contact_media_agent`
--

INSERT INTO `preferred_contact_media_agent` (`id`, `user_id`, `media_contact_id`, `created_at`, `updated_at`) VALUES
(23, 23, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `job_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 'مكتب عقار', 1, 1, '2021-10-25 21:00:00', '2021-10-25 21:00:00'),
(2, 'مكاتب هندسة', 1, 1, '2021-07-10 21:00:00', '2021-07-10 21:00:00'),
(3, 'شركات تأمين', 1, 2, '2021-11-22 21:50:50', '2021-11-22 21:50:50'),
(4, 'التصميم الداخي ', 1, 3, '2021-11-22 21:50:50', '2021-11-22 21:50:50'),
(5, 'مقاول عظم', 1, 4, '2021-11-22 21:52:25', '2021-11-22 21:52:25'),
(6, 'مقاول حفر وردم', 1, 4, '2021-11-22 21:52:57', '2021-11-22 21:52:57'),
(7, 'مقاولة سباكة وكهرباء', 1, 4, '2021-11-22 21:53:23', '2021-11-22 21:53:23'),
(8, 'مقاولة تكييف', 1, 4, '2021-11-22 21:53:45', '2021-11-22 21:53:45'),
(9, 'مقاولة لباسة', 1, 4, '2021-11-22 21:54:13', '2021-11-22 21:54:13'),
(10, 'مقاو بلاط', 1, 4, '2021-11-22 21:54:32', '2021-11-22 21:54:32'),
(11, 'مقاول مسابح', 1, 4, '2021-11-22 21:54:51', '2021-11-22 21:54:51'),
(12, 'مقاول جبيسات وديكورات داخلية', 1, 4, '2021-11-22 21:55:33', '2021-11-22 21:55:33'),
(13, 'مقاول تكسيات خارجية(رخام-حجر-كلادنج)', 1, 4, '2021-11-22 21:56:15', '2021-11-22 21:56:15'),
(14, 'محلات الأبواب(حديد-خشب-المنيوم)', 1, 3, '2021-11-22 21:57:26', '2021-11-22 21:57:26'),
(15, 'شركات خزان الفيبر', 1, 2, '2021-11-23 21:59:04', '2021-11-23 21:59:04'),
(16, 'شركات الحديد التسليح', 1, 2, '2021-11-23 21:59:04', '2021-11-23 21:59:04'),
(17, 'محلات المطابخ', 1, 1, '2021-11-22 22:00:43', '2021-11-22 22:00:43'),
(18, 'مصانع البلك الخزاني', 1, 2, '2021-11-22 22:01:08', '2021-11-22 22:01:08'),
(19, 'مصانع البناء الحديث', 1, 2, '2021-11-22 22:02:37', '2021-11-22 22:02:37'),
(20, 'محلات الأدوات الصحية والكهرباء', 1, 3, '2021-11-22 22:03:08', '2021-11-22 22:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `section_admin`
--

CREATE TABLE `section_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_admin`
--

INSERT INTO `section_admin` (`id`, `user_id`, `section_id`, `created_at`, `updated_at`) VALUES
(23, 23, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_profile`
--

CREATE TABLE `service_provider_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `land_line_phone` varchar(255) DEFAULT NULL,
  `image_license` varchar(255) DEFAULT NULL,
  `image_commercial_register` varchar(255) DEFAULT NULL,
  `license_expiry_date` timestamp NULL DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider_profile`
--

INSERT INTO `service_provider_profile` (`id`, `user_id`, `address`, `country_id`, `city_id`, `land_line_phone`, `image_license`, `image_commercial_register`, `license_expiry_date`, `job_id`, `description`, `created_at`, `updated_at`) VALUES
(18, 23, 'string', 0, 0, 'string', NULL, NULL, NULL, NULL, 'string', '2021-11-22 18:56:43', '2021-11-22 18:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `mobile_confirmed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `phone`, `image`, `status`, `mobile_confirmed`) VALUES
(23, 'service provider', NULL, '$2y$10$lwh1LbdIYctHLbNwFCWHieGh01g4OBy9qMuCGxdOTQnmYtc9sCzAC', '2021-11-22 18:56:43', '2021-11-22 19:09:04', '0937676881', NULL, 1, 1),
(24, 'user user', NULL, '$2y$10$d.8w/blT.iY7SqItz6AWQO/ms3bEwy7ymjoNev0CnRj.zNZvqpxoe', '2021-11-22 18:57:39', '2021-11-22 19:10:01', '0937676882', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile_email`
--

CREATE TABLE `user_mobile_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `confirm_code` int(11) DEFAULT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT 0,
  `is_primary` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_mobile_email`
--

INSERT INTO `user_mobile_email` (`id`, `user_id`, `mobile`, `confirm_code`, `is_confirmed`, `is_primary`, `type`, `created_at`, `updated_at`) VALUES
(4, 23, '0937676881', 37345, 1, 1, 1, NULL, NULL),
(5, 24, '0937676882', 19945, 1, 1, 1, NULL, NULL),
(6, NULL, '0937676881', 33465, 1, 0, 2, NULL, NULL),
(7, NULL, '0937676882', 95716, 1, 0, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_mobile_email`
--
ALTER TABLE `admin_mobile_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
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
-- Indexes for table `preferred_contact_media`
--
ALTER TABLE `preferred_contact_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferred_contact_media_agent`
--
ALTER TABLE `preferred_contact_media_agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`user_id`),
  ADD KEY `media_contact_id` (`media_contact_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `section_admin`
--
ALTER TABLE `section_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`user_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `service_provider_profile`
--
ALTER TABLE `service_provider_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `user_mobile_email`
--
ALTER TABLE `user_mobile_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admin_mobile_email`
--
ALTER TABLE `admin_mobile_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `preferred_contact_media`
--
ALTER TABLE `preferred_contact_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preferred_contact_media_agent`
--
ALTER TABLE `preferred_contact_media_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `section_admin`
--
ALTER TABLE `section_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `service_provider_profile`
--
ALTER TABLE `service_provider_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_mobile_email`
--
ALTER TABLE `user_mobile_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
