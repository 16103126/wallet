-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 11:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$lAEipT9OvpFv2JU9A3D7g.rby7v2tFZCTZG/G2NNb33Cb2RCWV.ji', '1644395273lVqzUhk2.jpg', NULL, '2022-01-31 02:38:37', '2022-02-09 02:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `is_default` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `value`, `is_default`, `created_at`, `updated_at`) VALUES
(3, 'USD', '$', '100.00', '0', '2022-02-10 02:07:10', '2022-02-10 03:28:41'),
(4, 'BD', 'Tk', '200.00', '1', '2022-02-10 02:07:39', '2022-02-10 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `transaction_id`, `method`, `amount`, `details`, `charge`, `created_at`, `updated_at`) VALUES
(1, 3, 'saDvqvZkvc9S', 'stripe', '7000.00', 'First deposit.', '700.00', '2022-02-02 04:34:58', '2022-02-02 04:34:58'),
(2, 3, 'nRaSEYYrNXa9', 'stripe', '7000.00', 'First deposit.', '700.00', '2022-02-02 04:35:31', '2022-02-02 04:35:31'),
(3, 3, 'fzdjXu8ZJE6n', 'stripe', '7000.00', 'First deposit.', '700.00', '2022-02-02 04:36:15', '2022-02-02 04:36:15'),
(4, 1, 'QSNJcxb0E4LG', 'stripe', '2000.00', 'szdfgs', '200.00', '2022-02-02 05:33:50', '2022-02-02 05:33:50');

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
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deposit_max_amount` decimal(8,2) NOT NULL,
  `deposit_min_amount` decimal(8,2) NOT NULL,
  `transfer_max_amount` decimal(8,2) NOT NULL,
  `transfer_min_amount` decimal(8,2) NOT NULL,
  `withdraw_max_amount` decimal(8,2) NOT NULL,
  `withdraw_min_amount` decimal(8,2) NOT NULL,
  `deposit_charge` decimal(8,2) NOT NULL,
  `transfer_charge` decimal(8,2) NOT NULL,
  `withdraw_charge` decimal(8,2) NOT NULL,
  `request_max_amount` decimal(8,2) NOT NULL,
  `request_min_amount` decimal(8,2) NOT NULL,
  `request_fixed_charge` decimal(8,2) NOT NULL,
  `request_percentage_charge` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `deposit_max_amount`, `deposit_min_amount`, `transfer_max_amount`, `transfer_min_amount`, `withdraw_max_amount`, `withdraw_min_amount`, `deposit_charge`, `transfer_charge`, `withdraw_charge`, `request_max_amount`, `request_min_amount`, `request_fixed_charge`, `request_percentage_charge`, `created_at`, `updated_at`) VALUES
(1, '6000.00', '500.00', '100000.00', '1000.00', '10000.00', '600.00', '5.00', '0.00', '11.00', '10000.00', '1000.00', '20.00', '10.00', NULL, '2022-02-09 04:35:57');

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
(5, '2022_01_31_061705_create_admins_table', 1),
(6, '2022_02_01_034318_create_transfer_money_table', 2),
(9, '2022_02_01_113614_create_transactions_table', 4),
(11, '2022_02_01_095024_create_deposits_table', 5),
(13, '2022_02_02_112226_create_withdraws_table', 6),
(14, '2022_02_01_041830_create_general_settings_table', 7),
(15, '2022_02_06_063440_create_referrals_table', 8),
(16, '2022_02_08_090947_create_withdraw_methods_table', 9),
(17, '2022_02_09_093043_create_request_money_table', 10),
(18, '2022_02_10_053210_create_currencies_table', 11);

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
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus_for_referrer` decimal(8,2) NOT NULL,
  `bonus_for_newuser` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `bonus_for_referrer`, `bonus_for_newuser`, `created_at`, `updated_at`) VALUES
(1, '20.00', '17.00', NULL, '2022-02-07 02:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `request_money`
--

CREATE TABLE `request_money` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_money`
--

INSERT INTO `request_money` (`id`, `sender_id`, `receiver_id`, `amount`, `status`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2000.00', '1', 'sdfaf', '2022-02-09 04:57:11', '2022-02-09 22:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) NOT NULL,
  `transaction_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `transaction_id`, `amount`, `remark`, `type`, `details`, `charge`, `created_at`, `updated_at`) VALUES
(5, 3, 'ku3WBIH2Hqea', '1000.00', 'transfer_money', '-', 'First money transfer.', '100.00', '2022-02-01 23:42:34', '2022-02-01 23:42:34'),
(6, 1, 'ku3WBIH2Hqea', '1000.00', 'receive_money', '+', 'First money transfer.', '100.00', '2022-02-01 23:42:34', '2022-02-01 23:42:34'),
(7, 3, 'jMiiVRqyZZSN', '2000.00', 'transfer_money', '-', 'Second money transfer.', '200.00', '2022-02-01 23:43:13', '2022-02-01 23:43:13'),
(8, 2, 'jMiiVRqyZZSN', '2000.00', 'receive_money', '+', 'Second money transfer.', '200.00', '2022-02-01 23:43:13', '2022-02-01 23:43:13'),
(9, 3, 'fzdjXu8ZJE6n', '7000.00', 'deposit', '-', 'First deposit.', '700.00', '2022-02-02 04:36:15', '2022-02-02 04:36:15'),
(10, 1, 'QSNJcxb0E4LG', '2000.00', 'deposit', '-', 'szdfgs', '200.00', '2022-02-02 05:33:50', '2022-02-02 05:33:50'),
(11, 1, 'hoQIuhreNKlB', '2000.00', 'withdraw', '+', NULL, '200.00', '2022-02-02 23:04:03', '2022-02-02 23:04:03'),
(12, 1, 'ZaUn2r3w3jy7', '20000.00', 'withdraw', '+', NULL, '2000.00', '2022-02-03 02:11:10', '2022-02-03 02:11:10'),
(13, 1, 'p8TnQK4jeARR', '10000.00', 'withdraw', '+', NULL, '1000.00', '2022-02-03 02:11:17', '2022-02-03 02:11:17'),
(16, 2, '08futwfGBJo6', '2000.00', 'receive request', '-', 'sdfaf', '220.00', '2022-02-09 22:54:20', '2022-02-09 22:54:20'),
(17, 1, 'p4c22nrA8MRB', '2000.00', 'sent request', '+', 'sdfaf', '220.00', '2022-02-09 22:54:20', '2022-02-09 22:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referred_by` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referred_by`, `name`, `email`, `balance`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'User', 'user@gmail.com', 87280, NULL, '$2y$10$sjRCWHIRdPWZwr.7i9ZY4eI2KI6UDsXKa1FrzlTi0rYNBNf6P570G', '1644302539hlkxITyk.jpg', NULL, '2022-01-31 03:56:36', '2022-02-09 22:54:20'),
(2, 0, 'User2', 'user2@gmail.com', 150820, NULL, '$2y$10$8VmjjoD2cwEuB1DHanFMQOOmM6CZlHD8HGUYRw.M59tYCfq7LwV/6', 'default.png', NULL, '2022-01-31 21:37:48', '2022-02-09 22:54:20'),
(3, 0, 'user3', 'user3@gmail.com', 9120, NULL, '$2y$10$5hggoCgAKNa8YOOR2cKlqOIagEX0Cf1DJBUBZFDVPAZ3bKR3Ex4Ye', 'default.png', NULL, '2022-02-01 00:38:36', '2022-02-06 23:58:54'),
(4, 1, 'user4', 'user4@gmail.com', NULL, NULL, '$2y$10$3bN5ylUV6klPl5Fe0SIAOO1FyXrluJZQEj8MHySKInipTq48x0JoO', 'default.png', NULL, '2022-02-06 23:38:13', '2022-02-06 23:58:54'),
(5, 1, 'user5', 'user5@gmail.com', NULL, NULL, '$2y$10$5kcXPdUugPBfyaX3BUF7VusowBmb/Pqg9qEu3AO6zo8alX6tlEtMi', 'default.png', NULL, '2022-02-06 23:42:14', '2022-02-06 23:58:54'),
(6, 1, 'user6', 'user6@gmail.com', NULL, NULL, '$2y$10$MBuAz7NpIkPoR2dHN4pvOOEJLAql4mA8ffkAyroDL7p68hW2lCDMy', 'default.png', NULL, '2022-02-06 23:47:37', '2022-02-06 23:58:54'),
(7, 1, 'user7', 'user7@gmail.com', NULL, NULL, '$2y$10$c6vPUShYF2WUZNpdJlTXHeDQK38WnPa9xjvG4gWt06WRefAWbmnFe', 'default.png', NULL, '2022-02-06 23:49:54', '2022-02-06 23:58:54'),
(8, 1, 'user8', 'user8@gmail.com', NULL, NULL, '$2y$10$/cFSG7vk/OkcXXEk9j9aZOjBJPcd0Vr6tEP.SZeUegD9dfG/Xx2kO', 'default.png', NULL, '2022-02-06 23:52:28', '2022-02-06 23:58:54'),
(9, 1, 'HTMLsfsds', 'user555@gmail.com', NULL, NULL, '$2y$10$lwnZiXPj9xWTEkglzxkjS.o68jOAurh9V7uLVXy.oVskVH4hv0YAG', 'default.png', NULL, '2022-02-06 23:58:54', '2022-02-06 23:58:54'),
(10, 1, 'asdfasdf', 'userdfasdf@gmail.com', 15, NULL, '$2y$10$LzYoAzlgtQqV2IyRF/tYMu3OmwzjqzHugf.tobun1uxCsCSuWCVba', 'default.png', NULL, '2022-02-07 00:01:55', '2022-02-07 00:01:55'),
(11, 1, 'user9', 'user9@gmail.com', NULL, NULL, '$2y$10$DyFTeqgbmyg/fX1pAQvrbeTQcEnxo/k3D/xJW.Vsvy3vAgU9Pjo8u', 'default.png', NULL, '2022-02-07 00:03:59', '2022-02-07 00:03:59'),
(12, 1, 'user11', 'user11@gmail.com', 15, NULL, '$2y$10$zwo2WmZQ/q8ietTCNnp58eFKfFu88bJWbHSES/yc7xL9q4R6RcOH6', 'default.png', NULL, '2022-02-07 00:04:53', '2022-02-07 00:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `method_id` int(25) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `charge` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `user_id`, `transaction_id`, `status`, `method_id`, `amount`, `charge`, `created_at`, `updated_at`) VALUES
(1, 1, 'hoQIuhreNKlB', '1', 2, '2000.00', '200.00', '2022-02-02 23:04:03', '2022-02-03 02:12:46'),
(2, 1, 'ZaUn2r3w3jy7', '1', 2, '20000.00', '2000.00', '2022-02-03 02:11:10', '2022-02-03 02:29:36'),
(3, 1, 'p8TnQK4jeARR', '0', 2, '10000.00', '1000.00', '2022-02-03 02:11:17', '2022-02-03 02:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `method`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Stripe', 1, '2022-02-08 04:24:37', '2022-02-08 04:24:37');

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
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_money`
--
ALTER TABLE `request_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_money`
--
ALTER TABLE `request_money`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
