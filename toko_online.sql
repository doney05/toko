-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 09:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `product_lists_id` bigint(20) UNSIGNED NOT NULL,
  `product_items_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `users_id`, `product_lists_id`, `product_items_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 6, 5, '2023-04-06 20:04:29', '2023-04-06 20:04:29'),
(2, 1, 4, 15, 5, '2023-04-06 20:04:39', '2023-04-06 20:04:39'),
(3, 1, 11, 22, 5, '2023-04-06 20:05:00', '2023-04-06 20:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` bigint(12) NOT NULL,
  `users_id` bigint(12) UNSIGNED NOT NULL,
  `product_items_id` bigint(12) UNSIGNED NOT NULL,
  `carts_id` bigint(12) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_30_003334_create_products_table', 1),
(7, '2023_04_04_004808_create_product_lists_table', 1),
(8, '2023_04_05_021716_create_product_items_table', 1),
(9, '2023_04_06_050803_create_carts_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `banner`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/brand/tSSg9ydO8CTaVltRK7iaxUNUaUtpwqW900aJPmpu.png', 'Yogobata Toys', '2023-04-06 19:29:12', '2023-04-06 19:29:51'),
(2, 'public/backend/brand/DFGnF2ugJc3H0n5pHPaG1rrb2KsZHND3trVZOGHP.png', 'Ali Toys', '2023-04-06 19:29:29', '2023-04-06 19:29:29'),
(3, 'public/backend/brand/pXLE3KJUOMSUGKGnQ9gu7ny5H7czSxCdONom0reA.png', 'Star Toys', '2023-04-06 19:30:08', '2023-04-06 19:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `product_lists_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `isi` int(11) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `products_id`, `product_lists_id`, `thumbnail`, `name`, `description`, `price`, `stock`, `weight`, `qty`, `isi`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'public/backend/brand/produk/JrRc4bxiO1rIJzXdkppbKgDkVDPoQcS9eKOQgS2n.png', 'YE 6A', 'Ukuran 30x10, harga picisan', 25000, 50, '1.5g', NULL, 1, 'pcs', '2023-04-06 19:32:34', '2023-04-06 19:32:34'),
(2, 1, 1, 'public/backend/brand/produk/2wkhGRV7DHicyC7yVKPK2olqzZztYGlT1wtj5fPN.png', 'YE 8C', 'Ukuran 40x10, harga kartonan isi 6', 150000, 50, '1kg', NULL, 6, 'karton', '2023-04-06 19:34:01', '2023-04-06 19:34:01'),
(3, 1, 1, 'public/backend/brand/produk/Tg8ZXu6mDydSpd9I8mXllZG06emXAM1oNq7c94ZI.png', 'YE 9B', 'Ukuran 20x20, harga kartonan isi 5', 130000, 50, '1.9g', NULL, 5, 'karton', '2023-04-06 19:34:59', '2023-04-06 19:34:59'),
(4, 1, 1, 'public/backend/brand/produk/DrnpcadVQNMcg6cw4JGf7DjOcAsNGt2nCp867JgS.png', 'YE 19B', 'Ukuran 30x30, harga picisan', 30000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:35:40', '2023-04-06 19:35:40'),
(5, 1, 1, 'public/backend/brand/produk/DTmatSsVl0L1O7lQcvn7q5vKLyrhiN09gEAmpUkQ.png', 'YE 26A', 'Ukuran 50x40, harga picisan', 50000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:36:28', '2023-04-06 19:36:28'),
(6, 1, 2, 'public/backend/brand/produk/tDz2UKP1ulnIYX3TYrVvD5riusFQDERA4an7TnJ7.png', 'YI 2C', 'Ukuran 30x30, Harga picisan', 30000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:38:41', '2023-04-06 19:38:41'),
(7, 1, 2, 'public/backend/brand/produk/HEx6iUg5XuuGYRJas1NQICoazhGoE72R7bSNTqaQ.png', 'YI 1C', 'Ukuran 30x20, harga kartonan isi 3', 100000, 50, '1g', NULL, 3, 'karton', '2023-04-06 19:39:40', '2023-04-06 19:39:40'),
(8, 1, 2, 'public/backend/brand/produk/RZ3DZxpFI7wzHNT942OQPI6M0xeoHC9cQeWQ1Vj8.png', 'YI 33C', 'Ukuran 50x40, harga kartonan isi 3', 150000, 50, '1g', NULL, 3, 'karton', '2023-04-06 19:40:43', '2023-04-06 19:40:43'),
(9, 1, 3, 'public/backend/brand/produk/karj5cxWKA1SHDr1mCuBM24D9LRfjgNX942h58RD.png', 'YG 6A', 'Ukuran 20x20, harga picisan', 30000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:42:36', '2023-04-06 19:42:36'),
(11, 2, 4, 'public/backend/brand/produk/lUobksAOsFAtXOrJkl1teLuRIP5y1ltfbVHD8QUW.png', 'AK 08B', 'Ukuran 40x10, harga picisan', 50000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:47:00', '2023-04-06 19:47:00'),
(12, 2, 4, 'public/backend/brand/produk/wiQvPfOCiDusZpxbjpY7yK1Lf10mny5yNdOtlbkS.png', 'AK 36B', 'Ukuran 30x30, harga picisan', 40000, 50, '1kg', NULL, 1, 'pcs', '2023-04-06 19:47:56', '2023-04-06 19:47:56'),
(13, 2, 4, 'public/backend/brand/produk/j6JvI9bUWniRcjgkO9agu0LLcnRJdKJ3ZUkDef4j.png', 'AK 61A', 'Ukuran 40x40, harga picisan', 60000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:48:54', '2023-04-06 19:48:54'),
(14, 2, 4, 'public/backend/brand/produk/NHPodtVLSiokxjfGPm3wRZsCvrUfs4HL1AFDon3C.png', 'AK 89B', 'Ukuran 50x40, harga picisan', 65000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:49:40', '2023-04-06 19:49:40'),
(15, 2, 4, 'public/backend/brand/produk/7t7ivEX1za5RcSi7HWt8sxNDhWtMZb7KTONk9ajg.png', 'Motor keruk', 'Ukuran 50x40, harga picisan', 70000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:50:27', '2023-04-06 19:50:27'),
(16, 2, 5, 'public/backend/brand/produk/E7I4aDGNkczpmXBtC6q6yL7kzeTUdOASMt4TLo9F.png', 'AP 01A', 'Ukuran 60x30, harga picisan', 40000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:51:10', '2023-04-06 19:51:10'),
(17, 2, 5, 'public/backend/brand/produk/P8PHUefEBXeFWewo3Q82PFYwXHSg5vvnPhgBAMbX.png', 'AP 02A', 'Ukuran 30x40, harga picisan', 35000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:52:00', '2023-04-06 19:52:00'),
(18, 2, 5, 'public/backend/brand/produk/bL15Exk2dXfmYX0fVhtEN3JoWeZIY9fjCdpxBHj4.png', 'AP 03B', 'Ukuran 40x50, harga picisan', 50000, 50, '1kg', NULL, 1, 'pcs', '2023-04-06 19:53:12', '2023-04-06 19:53:12'),
(19, 3, 8, 'public/backend/brand/produk/Beua8BxDRimEvAmTJ7Er98jI8Ql2gl57tNLAPOPI.png', 'ST2', 'Ukuran 40x40, harga picisam', 40000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:57:05', '2023-04-06 19:57:05'),
(20, 3, 9, 'public/backend/brand/produk/YMeIfge2AZJHuZlWe3GmkcOsbx3YyyY7mUajVXJp.jpg', 'ST2047-2', 'Ukuran 50x50, harga picisan', 70000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 19:58:16', '2023-04-06 19:58:16'),
(21, 3, 10, 'public/backend/brand/produk/aHKrlIumvoZG9gW1goYg3CzsCtqun2uZOJeJP7Os.jpg', 'ST2028-1', 'Ukuran 60x60, harga picisan', 60000, 50, '1kg', NULL, 1, 'pcs', '2023-04-06 19:59:42', '2023-04-06 19:59:42'),
(22, 3, 11, 'public/backend/brand/produk/mNm99K8EHmMbTv9hcg31BsyIuXnN1dsqGzQTVrlc.jpg', 'ST2025-1', 'Ukuran 50x30, harga picisan', 50000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 20:01:00', '2023-04-06 20:01:00'),
(23, 3, 12, 'public/backend/brand/produk/KBVCHW0YcetCMOtVCS69pbpCn0lCYNcvgEZiYSYl.png', 'ST2336-1', 'Ukuran 50x50, harga picisan', 60000, 50, '1g', NULL, 1, 'pcs', '2023-04-06 20:02:22', '2023-04-06 20:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_lists`
--

CREATE TABLE `product_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_lists`
--

INSERT INTO `product_lists` (`id`, `products_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'YE', NULL, NULL),
(2, 1, 'YI', NULL, NULL),
(3, 1, 'YG', NULL, '2023-04-06 19:41:46'),
(4, 2, 'AK', NULL, NULL),
(5, 2, 'AP', NULL, NULL),
(8, 3, 'ST 2019', NULL, NULL),
(9, 3, 'ST 2047', NULL, '2023-04-06 19:56:11'),
(10, 3, 'ST 2028', NULL, NULL),
(11, 3, 'ST 2025', NULL, NULL),
(12, 3, 'ST 2336', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin1', 1, '$2y$10$KyHu48p9rBTEMyHWCCfdF.sPAR7Z7p1lrpl8zU0CgNrgDJijwu6t2', NULL, '2023-04-06 19:27:11', '2023-04-06 19:27:11'),
(2, 'admin2', 'admin2', 1, '$2y$10$1q/KkPBjtUhMGqpm8LDhB.PP0bqOuGdBC/aQh5Sz2AXnlUkTEJW1e', NULL, '2023-04-06 19:27:11', '2023-04-06 19:27:11'),
(3, 'customer1', 'customer1', 0, '$2y$10$VQ3BmfTb5/7w3zgKv9Bomulv75mF1IQcGpyibXvAuLlUIbHv3sSQm', NULL, '2023-04-06 19:27:11', '2023-04-06 19:27:11'),
(4, 'customer2', 'customer2', 0, '$2y$10$niVJyIHlMubNrfIyKolf1OgJ6N0Ac8T5YD3Z.xvFnpHRkxYruPE3u', NULL, '2023-04-06 19:27:12', '2023-04-06 19:27:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_users_id_foreign` (`users_id`),
  ADD KEY `carts_product_lists_id_foreign` (`product_lists_id`),
  ADD KEY `carts_product_items_id_foreign` (`product_items_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `product_items_id` (`product_items_id`),
  ADD KEY `carts_id` (`carts_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_items_products_id_foreign` (`products_id`),
  ADD KEY `product_items_product_lists_id_foreign` (`product_lists_id`);

--
-- Indexes for table `product_lists`
--
ALTER TABLE `product_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_lists_products_id_foreign` (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_lists`
--
ALTER TABLE `product_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_items_id_foreign` FOREIGN KEY (`product_items_id`) REFERENCES `product_items` (`id`),
  ADD CONSTRAINT `carts_product_lists_id_foreign` FOREIGN KEY (`product_lists_id`) REFERENCES `product_lists` (`id`),
  ADD CONSTRAINT `carts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_items_id`) REFERENCES `product_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_3` FOREIGN KEY (`carts_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_items`
--
ALTER TABLE `product_items`
  ADD CONSTRAINT `product_items_product_lists_id_foreign` FOREIGN KEY (`product_lists_id`) REFERENCES `product_lists` (`id`),
  ADD CONSTRAINT `product_items_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_lists`
--
ALTER TABLE `product_lists`
  ADD CONSTRAINT `product_lists_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
