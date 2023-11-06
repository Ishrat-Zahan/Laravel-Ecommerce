-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 12:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Bedroom', 'upload/igwSgqg5xlPMBUOQ0eM0c6JeDhgmGOFNms9cnO7q.jpg', '2023-09-30 03:16:32', '2023-09-30 03:16:32'),
(9, 'Dining', 'upload/MC9fdMDLp1WYzLhLVyvbU9QvAVzO49C99j9WusZ2.jpg', '2023-09-30 03:17:17', '2023-09-30 03:17:17'),
(10, 'Kitchen', 'upload/67u8PNwme3lP2ZXGnrZb9BOjESN9koVcMo6LudPr.jpg', '2023-09-30 03:17:59', '2023-09-30 03:17:59'),
(11, 'Kids’ Room', 'upload/2CIG85vm5yEu8hYiB2fo38OxTEd7vhPQuDWSdugU.jpg', '2023-09-30 03:18:21', '2023-09-30 03:18:21');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_24_104551_create_categories_table', 2),
(7, '2023_09_25_002345_create_subcategories_table', 3),
(11, '2023_09_29_060753_create_products_table', 4),
(12, '2023_10_02_092128_create_orders_table', 5),
(13, '2023_10_02_092311_create_order_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `total` double(10,2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_address`, `shipping_address`, `total`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'dsferf', 'e54t34', 452100.00, '3weq', 'pending', '2023-10-02 07:51:42', '2023-10-02 07:51:42'),
(2, 2, 'bilisdfe', 'shippdf', 408300.00, 'erer3', 'pending', '2023-10-02 07:57:48', '2023-10-02 07:57:48'),
(3, 2, 't5t4', 'w3re435r', 408300.00, 'ertr5y', 'pending', '2023-10-02 07:59:32', '2023-10-02 07:59:32'),
(4, 2, 'bilisdfe', 'w3re435r', 459900.00, 'jhui', 'pending', '2023-10-03 06:37:20', '2023-10-03 06:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, NULL, NULL),
(2, 2, 4, 1, NULL, NULL),
(3, 3, 3, 1, NULL, NULL),
(4, 3, 4, 1, NULL, NULL),
(5, 4, 4, 1, NULL, NULL),
(6, 4, 4, 1, NULL, NULL),
(7, 4, 3, 1, NULL, NULL),
(8, 4, 4, 1, NULL, NULL);

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `details`, `price`, `image`, `quantity`, `discount`, `active`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(2, 8, 5, 'Obsession-151', 'Made from Kiln-dried imported Beech wood, veneered engineered wood and veneered MDF. High quality environment friendly Italian Ultra Violet (UV) Lacquer in antique finish Please refer to images for dimension details Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Only bed without mattress Indoor use only Weight 103.00 Kgs Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish.', 1800.00, 'uploads/umkqz7tArFa0YgfDUYvwj7QRK190G3qWkSNaVlh9.jpg', 2, 10, 1, 'in stock', 0, '2023-09-30 05:59:42', '2023-09-30 05:59:42'),
(3, 8, 5, 'walton import bd', 'Made from Kiln-dried imported Beech wood, veneered engineered wood and veneered MDF. High quality environment friendly Italian Ultra Violet (UV) Lacquer in antique finish Please refer to images for dimension details Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Only bed without mattress Indoor use only Weight 103.00 Kgs Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish.', 382500.00, 'uploads/vPvHBe5hM1k1EqAKMPJ4ixbUKas3pSqRm4n0OqYX.jpg', 2, 10, 1, 'in stock', 0, '2023-09-30 06:00:44', '2023-09-30 06:00:44'),
(4, 9, 7, 'Comet-192', 'Made from Kiln-dried imported Beech wood and veneered engineered wood. High quality environment friendly Italian Ultra Violet (UV) and Polyurethane (PU) Lacquer in antique finish Please refer to images for dimension details Imported fabric upholstery with soft and durable cushioning. Fabric can be selected from available options Fabric can dry-cleaned Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Indoor use only Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish.', 25800.00, 'uploads/8OBEXMhYFRO8XbJ6Salk4WhszRAMACEdYcbphhtJ.jpg', 2, 10, 1, 'in stock', 0, '2023-09-30 06:23:57', '2023-09-30 06:23:57'),
(5, 11, 11, 'Kids’ Study Table', 'Made from superior quality melamine faced particle board with international standard density and load bearing capacity Same color edge banding done in latest Homag line  Please refer to images for dimension details Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Indoor use only Weight 42.50 Kgs', 18000.00, 'uploads/GoqpRmnnPy3l23EQunbDPAOIIH3Ui3xjI8zOWDqP.jpg', 2, 10, 1, 'in stock', 0, '2023-09-30 06:27:50', '2023-09-30 06:27:50'),
(6, 8, 5, 'King Size Bed', 'Made from Kiln-dried imported Beech wood, veneered engineered wood and veneered MDF. High quality environment friendly Italian Ultra Violet (UV) Lacquer in antique finish Please refer to images for dimension details Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Only bed without mattress Indoor use only Weight 103.00 Kgs Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish', 3250.00, 'uploads/ytEymB3Cft7ud9Jn82NJFEsSAtKdY2aiTrPl73p3.jpg', 2, 10, 1, 'in stock', 0, '2023-10-07 04:15:32', '2023-10-07 04:15:32'),
(7, 8, 5, 'King Size Bed', 'Made from Kiln-dried imported Beech wood, veneered engineered wood and veneered MDF. High quality environment friendly Italian Ultra Violet (UV) Lacquer in antique finish Please refer to images for dimension details Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Only bed without mattress Indoor use only Weight 94.00 Kgs Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish.', 12000.00, 'uploads/X0ecy77wr5iOn3PRc94QqQpMb25dODcGgEAz0hJU.png', 2, 10, 1, 'in stock', 0, '2023-10-07 04:16:55', '2023-10-07 04:16:55'),
(9, 11, 10, 'Kids’ Bunk Bed', 'Made from Kiln-dried imported Beech wood, veneered engineered wood and veneered MDF. High quality environment friendly Italian Ultra Violet (UV) Lacquer in antique finish Please refer to images for dimension details Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items) Imported high quality hardware fittings Only bed without mattress Indoor use only Weight 144.00 Kgs Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish.', 18000.00, 'uploads/oyPtvX35wqwYmtuqB6odRZxvKMnlArJ65qVk3biq.jpg', 2, 10, 1, 'in stock', 0, '2023-10-07 04:20:20', '2023-10-07 04:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 8, 'King Size Bed', '2023-09-30 03:37:46', '2023-09-30 03:37:46'),
(6, 8, 'Queen Size Bed', '2023-09-30 03:37:58', '2023-09-30 03:37:58'),
(7, 9, '8-Seater Dining Table Set', '2023-09-30 03:38:09', '2023-09-30 03:38:09'),
(8, 9, '6-Seater Dining Table Set', '2023-09-30 03:38:22', '2023-09-30 03:38:22'),
(9, 10, 'Kitchen Cabinet', '2023-09-30 05:53:28', '2023-09-30 05:53:28'),
(10, 11, 'Kids’ Bunk Bed', '2023-09-30 05:53:47', '2023-09-30 05:53:47'),
(11, 11, 'Kids’ Study Table', '2023-09-30 05:53:57', '2023-09-30 05:53:57');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ruma', 'abc@gmail.com', NULL, '$2y$10$jQ9R...c65OSdYvxPxG7rusqF99rm2tqWL4aMnGxYyg/jpXKJKaRa', NULL, '2023-09-22 03:27:43', '2023-09-22 03:27:43'),
(2, 'ruma', 'abcd@gmail.com', NULL, '$2y$10$0Vy1BBIO7mqiTL.s7C8tf.mrNR3rybCkwos0lEu9UUts36cS7PZDq', NULL, '2023-10-02 04:10:21', '2023-10-02 04:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
