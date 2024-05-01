-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 09:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `desc`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"col-md-6\">\r\n                    <h2>Your Comfort and Safety Are Our Top Priorities</h2>\r\n                    <p>Investing in a yacht can be a dream come true, \r\nbut it\'s essential to thoroughly research and plan to\r\n                        make\r\n                        an informed decision that aligns with your goals\r\n and financial capabilities. Consulting with experts\r\n                        in\r\n                        yacht ownership, such as yacht brokers. We \r\nprovide Rental services provided in all three counties. PALM BEACH \r\nCOUNTY, BROWARD COUNTY, DADE COUNTY</p>\r\n                </div>', '0000-00-00 00:00:00', '2024-04-21 22:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carname` varchar(255) NOT NULL,
  `cartransmission` varchar(255) NOT NULL,
  `carseat` int(11) NOT NULL,
  `carinterior` varchar(255) NOT NULL,
  `carcategory` varchar(255) NOT NULL,
  `cartype` varchar(255) NOT NULL,
  `carmake` varchar(255) NOT NULL,
  `perhour` decimal(8,2) NOT NULL,
  `perday` decimal(8,2) NOT NULL,
  `short_desc` text NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `carname`, `cartransmission`, `carseat`, `carinterior`, `carcategory`, `cartype`, `carmake`, `perhour`, `perday`, `short_desc`, `desc`, `image`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(1, 'asdfaas', 'asdfaas', 1, 'asdfaas', 'asdfaas', 'asdf', 'asdfaas', 11.00, 11.00, 'asdfaas', 'asdfaas', '1713635800.webp', '2024-04-20 00:13:37', '2024-04-20 11:56:40', 'car', 1),
(2, 'car1', 'car1', 1, 'car1', 'car1', 'car1', 'car1', 11.00, 11.00, 'car1car1', 'car1', '1713635942.jpg', '2024-04-20 00:15:17', '2024-04-20 11:59:02', 'car1car1', 1),
(3, 'Car name', 'Car name', 2, 'Car name', 'Car name', 'Car name', 'Car name', 22.00, 22.00, 'Car name', 'Car name', '1713757207.jpg', '2024-04-20 00:24:13', '2024-04-21 21:40:07', 'car-name', 1),
(4, 'Car Transmission', 'Car Transmission', 2, 'Car Transmission', 'Car Transmission', 'Car Transmission', 'Car Transmission', 22.00, 22.00, 'Car Transmission', 'Car Transmission', '1713635966.jpg', '2024-04-20 00:26:29', '2024-04-20 11:59:26', 'car-transmission', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `phone`, `facebook`, `instagram`, `address`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'cloud9luxcars@gmail.com', '786 316 1035', 'https://www.facebook.com/', 'https://www.instagram.com/cloud9luxcars/', '7444 Royal Palm blvd Coral Springs FL 34953.', 'We provide rental services in all three counties. Palm Beach County, Broward County, Dade County.', '0000-00-00 00:00:00', '2024-04-29 12:54:19');

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
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USA1', 1, '2024-04-20 02:13:57', '2024-04-20 03:17:35'),
(2, 'BD', 0, '2024-04-20 02:14:59', '2024-04-20 03:19:55'),
(3, 'Location A', 1, '2024-04-20 02:17:10', '2024-04-20 02:17:10'),
(4, 'Location B', 0, '2024-04-20 03:10:28', '2024-04-20 03:19:51');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_20_053923_create_cars_table', 1),
(6, '2024_04_20_061944_add_status_and_slug_in_cars_table', 2),
(7, '2024_04_20_080611_make_location_table', 3),
(8, '2024_04_20_081327_create_location_table', 4),
(9, '2024_04_20_104307_create_rentals_table', 5),
(10, '2024_04_20_170829_add_payment_status_in_rentals_table', 6),
(11, '2024_04_20_233937_create_contacts_table', 7),
(12, '2024_04_21_065830_create_contact_us_table', 8),
(13, '2024_04_21_071136_create_contact_table', 9),
(14, '2024_04_21_071634_create_contacts_table', 10),
(15, '2024_04_21_080848_create_abouts_table', 11),
(16, '2024_04_21_220053_add_order_id_and_total_cost_in_rentals_table', 12),
(17, '2014_10_12_100000_create_password_resets_table', 13),
(18, '2024_04_22_003601_add_role_as_to_users_table', 14);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) UNSIGNED NOT NULL,
  `carid` int(11) UNSIGNED DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `pickup_location` varchar(255) DEFAULT NULL,
  `drop_location` varchar(255) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `drop_time` time DEFAULT NULL,
  `rent_type` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `approval_status` int(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `totalCost` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `carid`, `pickup_date`, `pickup_time`, `pickup_location`, `drop_location`, `return_date`, `drop_time`, `rent_type`, `customer_name`, `contact_number`, `email`, `address`, `address2`, `country`, `approval_status`, `created_at`, `updated_at`, `payment_status`, `order_id`, `totalCost`) VALUES
(31, 1, '2024-04-30', '11:01:00', 'USA1', 'Location A', '2024-05-11', '11:01:00', 2, 'test-product', '0', 'test-product@gmail.com', '0', 'test-product', '0', 0, '2024-04-29 22:46:00', '2024-04-29 22:46:00', NULL, 1714452360461907, 121.00),
(32, 1, '2024-04-30', '11:01:00', 'USA1', 'Location A', '2024-05-11', '11:01:00', 2, 'test-product', '0', 'test-product@gmail.com', '0', 'test-product', '0', 0, '2024-04-29 23:31:14', '2024-04-29 23:31:14', NULL, 1714455074394564, 121.00),
(33, 4, '2024-04-30', '11:01:00', 'USA1', 'Location A', '2024-05-11', '11:01:00', 2, 'Pronay', '456345424545', 'p@mailc.om', '0', 'p@mailc.om', '0', 0, '2024-04-29 23:32:55', '2024-04-29 23:32:55', NULL, 1714455175259895, 242.00),
(34, 2, '2024-04-30', '11:01:00', 'USA1', 'USA1', '2024-05-11', '11:01:00', 1, 'pro', NULL, 'pronay@omail.edu.pl', 'd', 'dhaka', 'BD', 0, '2024-04-30 00:21:53', '2024-04-30 00:21:53', NULL, 1714458113700214, 11.00),
(35, 1, '2024-04-30', '11:01:00', 'Location A', 'Location A', '2024-05-11', '11:11:00', 1, 'asdfad', NULL, 'asdfasd', 'sadfas', 'asdfsa', 'sadfasd', 0, '2024-04-30 00:37:05', '2024-04-30 00:37:05', NULL, 1714459025886626, 11.00),
(36, 4, '2024-05-01', '11:01:00', 'USA1', 'Location A', '2024-05-10', '11:01:00', 2, 'pppp', '324234', 'p@mailc.om', 'sadfasd', 'asdfas', 'dddd', 0, '2024-04-30 00:40:21', '2024-04-30 00:40:21', NULL, 1714459221200014, 198.00),
(37, 1, '2024-04-30', '11:01:00', 'Location A', 'Location A', '2024-04-30', '11:01:00', 2, 'Pronay', '234234', 'p@mailc.om', '0', 'asdfd', '0', 0, '2024-04-30 00:41:40', '2024-04-30 00:41:40', NULL, 1714459300882773, 11.00),
(38, 1, '2024-04-30', '11:01:00', 'Location A', 'Location A', '2024-04-30', '11:01:00', 2, '11121', '12312', 'p@mailc.om', 'orderSubmit', 'orderSubmit', 'orderSubmit', 0, '2024-04-30 00:48:18', '2024-04-30 01:41:50', 0, 1714459698899940, 11.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Admin', 'admin@gamil.com', '2024-04-22 01:09:21', '$2a$12$w3Sd7LSp69CLMh.xMEcXoux6NAwPlS2xqZAFsTg328wwSQH4g97Lu', '[value-6]', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Pronay Kumar Bormon', 'pronaykumarbormon@gmail.com', NULL, '$2y$12$GQgb2rOsBcVo.8oaOCZdL.XGbGeFKJi4j6Gy6isjiwD8YaH2QROG6', NULL, '2024-04-21 19:52:30', '2024-04-21 19:52:30', 0),
(3, 'cloud9luxcars', 'cloud9luxcars@gmail.com', NULL, '$2y$12$G.3HQvN49B.R9kkLE.StUuGT9OamlpLKUoSRiBRPJXXofEZsb/ImC', 'Vawd8wcymsBDdZEDBJ0WvVRhp3Pi0DI1cXn0wVdg8DisuttzQjlcYFKQ9Bg0', '2024-04-21 20:08:22', '2024-04-21 20:08:22', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
