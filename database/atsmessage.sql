-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atsmessage`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_t_smessages`
--

CREATE TABLE `a_t_smessages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `filling_time` timestamp NULL DEFAULT NULL,
  `priority` varchar(255) NOT NULL,
  `free_text_ats` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `a_t_smessages`
--

INSERT INTO `a_t_smessages` (`id`, `from_user_id`, `to_user_id`, `filling_time`, `priority`, `free_text_ats`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-06-03 04:49:55', 'SS', 'SVC TEST', NULL, '2024-06-03 04:49:55', '2024-06-03 04:49:55'),
(2, 3, 1, '2024-06-03 05:29:45', 'FF', 'sct test', 'uploads/ydUHipWtcPUw1wFqj5wfER5oDCNBjTArR1XtxtPt.png', '2024-06-03 05:29:45', '2024-06-03 05:29:45'),
(3, 3, 1, '2024-06-08 01:39:33', 'SS', 'fre text test', 'uploads/H8EZpWG8RSpqPK32s5rtd6tyBC0oU6N6NLM8AuOw.jpg', '2024-06-08 01:39:33', '2024-06-08 01:39:33'),
(4, 3, 1, '2024-06-08 18:01:05', 'SS', 'free text test', NULL, '2024-06-08 18:01:05', '2024-06-08 18:01:05'),
(5, 3, 1, '2024-06-08 18:41:36', 'FF', 'Free Text ATS Test', 'uploads/i7xuTefj4WOJVPJWEZcBAx0uYJnmHyle2djZWmo2.jpg', '2024-06-08 18:41:36', '2024-06-08 18:41:36'),
(6, 3, 2, '2024-06-11 05:22:07', 'FF', 'Free text test', 'uploads/nSXhsDkrSboXRFnap6WvXbX7yeR4OSm3ZLc4Yahd.jpg', '2024-06-11 05:22:07', '2024-06-11 05:22:07'),
(7, 3, 2, '2024-06-11 05:22:08', 'FF', 'Free text test', 'uploads/orYZN1MP4x8j0Yjui8mxo6o7pb4nbirBC03Msu4z.jpg', '2024-06-11 05:22:08', '2024-06-11 05:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaPerusahaan` varchar(255) NOT NULL,
  `bidangUsaha` varchar(255) NOT NULL,
  `NIB` varchar(255) NOT NULL,
  `PJ` varchar(255) NOT NULL,
  `jabatanPJ` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kodepos` varchar(255) DEFAULT NULL,
  `noTelp` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `deskripsi` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flighr_routes`
--

CREATE TABLE `flighr_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departure_aero` varchar(255) NOT NULL,
  `destination_aero` varchar(255) NOT NULL,
  `routes` varchar(255) NOT NULL,
  `est_waktu` varchar(255) NOT NULL,
  `speed` varchar(255) NOT NULL,
  `flight_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flighr_routes`
--

INSERT INTO `flighr_routes` (`id`, `departure_aero`, `destination_aero`, `routes`, `est_waktu`, `speed`, `flight_level`, `created_at`, `updated_at`) VALUES
(1, 'UPG', 'MDC', 'MKS W32 MNO', '1 HOUR 45 MIN', '', 'FL600 -10.000', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(2, 'UPG', 'SUB', 'MKS W32 SBR', '1 HOUR 35 MIN', '', 'FL600 - 8.000', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(3, 'UPG', 'CGK', 'MKS W52 CKG', '2 HOURS 25 MIN', '', 'FL600-6.500', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(4, 'UPG', 'CGK', 'MKS W52 CKG', 'TRANSIT (2H 25M)', '', 'FL600-6.500', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(5, 'CGK', 'KNO', ' CKG T5 KNO', 'TRANSIT', '', 'FL 600-290', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(6, 'MDC', 'UPG', 'MNO W32 MKS', '1HOUR 45 MIN', '', 'FL600 -10.000', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(7, 'MDC', 'CGK', 'MNO W15 CKG', '3HOURS 10 MIN', '', 'FL 600-12.000', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(8, 'MDC', 'SUB', 'MNO W15 CKG W45 SBR', 'OVERFLYING (TIDAK TRANSIT)', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(9, 'MDC ', 'CGK', 'MNO W15 CGK ', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(10, 'CGK', 'KNO', ' CKG T5 KNO', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(11, 'CGK', 'UPG', 'CKG W52 MKS', '2 HOURS 25 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(12, 'CGK', 'SUB', 'CKG W45 SBR', '1 HOUR 30 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(13, 'CGK', 'MDC', 'CKG W15 MNO', '3HOURS 10 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(14, 'CGK', 'KNO', 'CKG T5 KNO', '2HOURS 15 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(15, 'SUB', 'CGK', 'SBR W45 CKG', '1 HOUR 30 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(16, 'SUB', 'UPG', 'SBR W32 MKS', '1 HOUR 35 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(17, 'SUB', 'MDC', 'SBR W32 MKS W32 MDC', '2 HOURS 40 MIN (OVERFLYING)', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(18, 'SUB', 'CGK', 'SBR W45 CKG ', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(19, 'CGK', 'KNO', 'CKG T5 KNO', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(20, 'KNO', 'CGK', 'KNO T5 CKG ', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(21, 'CGK', 'UPG', 'CKG W52 MKS ', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(22, 'KNO', 'CGK', 'KNO T5 CKG', '2HOURS 15 MIN', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(23, 'KNO', 'CGK', 'KNO T5 CKG ', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(24, 'CGK', 'MDC', 'CKG W15 MNO', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(25, 'KNO', 'CGK', 'KNO T5 CKG ', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27'),
(26, 'CGK', 'SUB', ' CKG W45 SBR', 'TRANSIT', '', '', '2024-06-02 21:55:27', '2024-06-02 21:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `f_p_l_s`
--

CREATE TABLE `f_p_l_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `filling_time` datetime NOT NULL,
  `priority` varchar(255) NOT NULL,
  `message_type` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `reference_data` varchar(255) NOT NULL,
  `aircraft_id` varchar(255) NOT NULL,
  `ssr_mode` varchar(255) NOT NULL,
  `ssr_code` varchar(255) NOT NULL,
  `flight_rules` int(11) NOT NULL,
  `type_of_flight` int(11) NOT NULL,
  `number_aircraft` int(11) NOT NULL,
  `type_of_aircraft` varchar(255) NOT NULL,
  `wake_turb_cat` int(11) NOT NULL,
  `equipment_1` varchar(255) NOT NULL,
  `equipment_2` varchar(255) NOT NULL,
  `depad` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `cruising_speed` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `route` text NOT NULL,
  `dest_ad` varchar(255) NOT NULL,
  `total_set_hh_min` varchar(255) NOT NULL,
  `altn_ad` varchar(255) NOT NULL,
  `second_altn_ad` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_p_l_s`
--

INSERT INTO `f_p_l_s` (`id`, `from_user_id`, `to_user_id`, `filling_time`, `priority`, `message_type`, `number`, `reference_data`, `aircraft_id`, `ssr_mode`, `ssr_code`, `flight_rules`, `type_of_flight`, `number_aircraft`, `type_of_aircraft`, `wake_turb_cat`, `equipment_1`, `equipment_2`, `depad`, `time`, `cruising_speed`, `level`, `route`, `dest_ad`, `total_set_hh_min`, `altn_ad`, `second_altn_ad`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-06-06 09:26:16', 'SS', '11', 11, '11', '111', '11', '11', 1, 11, 11, '111', 11, '11', '11', 'upg', '2024-06-06 09:25:36', NULL, 'FL600-6.500', 'MKS W52 CKG', 'cgk', 'qq', 'qq', 'qq', '2024-06-06 01:26:16', '2024-06-06 01:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `persyaratan` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `hasil` enum('Disetujui','Tidak disetujui') NOT NULL DEFAULT 'Tidak disetujui',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meteos`
--

CREATE TABLE `meteos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `filling_time` datetime NOT NULL,
  `priority` varchar(255) NOT NULL,
  `message_id_part1` varchar(255) NOT NULL,
  `message_id_part2` varchar(255) NOT NULL,
  `message_id_part3` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `issued` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `observed` datetime NOT NULL,
  `free_text_metar` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meteos`
--

INSERT INTO `meteos` (`id`, `from_user_id`, `to_user_id`, `filling_time`, `priority`, `message_id_part1`, `message_id_part2`, `message_id_part3`, `origin`, `issued`, `type`, `location`, `observed`, `free_text_metar`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2024-06-04 04:09:56', 'SS', 'SA', '01', '1', 'WAAAYFUA', '2024-06-04 12:08:00', 'METAR', 'WAAA', '2024-06-04 12:09:00', 'STC010 Q101', NULL, '2024-06-03 20:09:56', '2024-06-03 20:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_01_27_020533_add_role_to_users', 1),
(6, '2023_01_29_110829_create_companies_table', 1),
(7, '2023_01_30_025909_create_informasis_table', 1),
(8, '2023_01_30_030728_add_hasil_to_informasi', 1),
(9, '2024_04_28_091924_create_a_t_smessages_table', 1),
(10, '2024_04_28_094503_create_n_o_t_a_m_s_table', 1),
(11, '2024_04_28_102202_create_meteos_table', 1),
(12, '2024_04_28_104903_create_inboxes_table', 1),
(13, '2024_04_28_104940_create_search_messages_table', 1),
(14, '2024_04_28_105105_create_maintenances_table', 1),
(15, '2024_04_30_020220_create_f_p_l_s_table', 1),
(16, '2024_05_31_073236_create_flighr_routes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notams`
--

CREATE TABLE `notams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `filling_time` datetime NOT NULL,
  `priority` varchar(255) NOT NULL,
  `message_series_0` varchar(255) NOT NULL,
  `message_series_1` varchar(255) NOT NULL,
  `number_0` varchar(255) NOT NULL,
  `number_1` int(11) NOT NULL,
  `number_2` varchar(255) NOT NULL,
  `number_3` varchar(255) NOT NULL,
  `identified` varchar(255) NOT NULL,
  `fir` varchar(255) NOT NULL,
  `notam_code_0` varchar(255) NOT NULL,
  `notam_code_1` varchar(255) NOT NULL,
  `traffic` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `lower_limit` varchar(255) NOT NULL,
  `upper_limit` varchar(255) NOT NULL,
  `coordinates` varchar(255) NOT NULL,
  `location_0` varchar(255) NOT NULL,
  `location_1` varchar(255) NOT NULL,
  `location_2` varchar(255) NOT NULL,
  `location_3` varchar(255) NOT NULL,
  `fYYMMDDhhmm` varchar(255) NOT NULL,
  `estperm` int(11) NOT NULL,
  `time_schedule` varchar(255) NOT NULL,
  `text_of_notam` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_messages`
--

CREATE TABLE `search_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `address`, `city`, `country`, `postal`, `about`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'CN-WAAAYFUA/OU-WAAA/0-WAAA/PRMD-WA/ADMD-ICAO/C-XX/', 'UPG (WAAA)', 'UJUNG PANDANG', 'upg@gmail.com', NULL, '$2y$10$RYUDNHjriTGMZOhfqyueFe5gt5huqUt7hbwIo.dKJsVA1LWU7dWeO', NULL, NULL, NULL, NULL, 'Kepala Bandara', NULL, 'admin', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(2, 'CN-WIIIYFUA/OU-WIII/0-WIII/PRMD-WI/ADMD-ICAO/C-XX/', 'CGK (WIII)', 'CENGKARENG', 'cgk@gmail.com', NULL, '$2y$10$4exk0sTuBtmBLMDOQhXS8OL0XvvlsdBGCGmZAqWV25884vRF3i06O', NULL, NULL, NULL, NULL, 'Kepala Bandara', NULL, 'admin', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(3, 'CN-WARRYFUA/OU-WARR/0-WARR/PRMD-WA/ADMD-ICAO/C-XX/', 'SBY (WARR)', 'SURABAYA', 'sby@gmail.com', NULL, '$2y$10$st9UvHg4dFE6m8uufT7p1O09q6.RUyi0fx.z52lJDOY97B.Uy6HcK', NULL, NULL, NULL, NULL, 'Kepala Bandara', NULL, 'admin', '2024-06-02 21:55:26', '2024-06-02 21:55:26'),
(4, 'CN-WIMMYFUA/OU-WIMM/0-WIMM/PRMD-WI/ADMD-ICAO/C-XX/', 'KNO (WIMM)', 'MEDAN', 'kno@gmail.com', NULL, '$2y$10$vZMXQQTiRJHL.aU3Ui44aeDCtXtXe04WIWNUiaiv8TVk0pfXH/Im2', NULL, NULL, NULL, NULL, 'Kepala Bandara', NULL, 'admin', '2024-06-02 21:55:26', '2024-06-02 21:55:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_t_smessages`
--
ALTER TABLE `a_t_smessages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_t_smessages_from_user_id_foreign` (`from_user_id`),
  ADD KEY `a_t_smessages_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_nib_unique` (`NIB`),
  ADD UNIQUE KEY `companies_email_unique` (`email`) USING HASH;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flighr_routes`
--
ALTER TABLE `flighr_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_p_l_s`
--
ALTER TABLE `f_p_l_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_p_l_s_from_user_id_foreign` (`from_user_id`),
  ADD KEY `f_p_l_s_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `informasis_file_unique` (`file`),
  ADD KEY `informasis_company_id_foreign` (`company_id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meteos`
--
ALTER TABLE `meteos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meteos_from_user_id_foreign` (`from_user_id`),
  ADD KEY `meteos_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notams`
--
ALTER TABLE `notams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notams_from_user_id_foreign` (`from_user_id`),
  ADD KEY `notams_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `search_messages`
--
ALTER TABLE `search_messages`
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
-- AUTO_INCREMENT for table `a_t_smessages`
--
ALTER TABLE `a_t_smessages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flighr_routes`
--
ALTER TABLE `flighr_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `f_p_l_s`
--
ALTER TABLE `f_p_l_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meteos`
--
ALTER TABLE `meteos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notams`
--
ALTER TABLE `notams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_messages`
--
ALTER TABLE `search_messages`
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
-- Constraints for table `a_t_smessages`
--
ALTER TABLE `a_t_smessages`
  ADD CONSTRAINT `a_t_smessages_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `a_t_smessages_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `f_p_l_s`
--
ALTER TABLE `f_p_l_s`
  ADD CONSTRAINT `f_p_l_s_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `f_p_l_s_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `informasis`
--
ALTER TABLE `informasis`
  ADD CONSTRAINT `informasis_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meteos`
--
ALTER TABLE `meteos`
  ADD CONSTRAINT `meteos_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meteos_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notams`
--
ALTER TABLE `notams`
  ADD CONSTRAINT `notams_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notams_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
