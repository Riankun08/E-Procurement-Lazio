-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2023 at 01:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nos`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `codeColor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `codeColor`, `colorName`, `created_at`, `updated_at`) VALUES
(1, '#cc6161', 'merah ati', '2023-01-09 07:48:09', '2023-01-09 07:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `color_products`
--

DROP TABLE IF EXISTS `color_products`;
CREATE TABLE IF NOT EXISTS `color_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `productId` int NOT NULL,
  `colorId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_products`
--

INSERT INTO `color_products` (`id`, `productId`, `colorId`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2023-01-10 23:17:17', '2023-01-10 23:17:17'),
(2, 6, 1, '2023-01-15 00:22:17', '2023-01-15 00:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_04_110835_create_products_table', 1),
(6, '2023_01_04_115311_create_orders_table', 1),
(7, '2023_01_04_183851_create_size_products_table', 1),
(8, '2023_01_04_183908_create_sizes_table', 1),
(9, '2023_01_04_192747_create_testimonials_table', 1),
(10, '2023_01_09_142608_create_color_products_table', 2),
(11, '2023_01_09_142636_create_colors_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `sizeId` int DEFAULT NULL,
  `colorId` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `totalPrice` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `payment` enum('BCA','MANDIRI','COD') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('newOrder','payOrder','paidOrder','deliveryOrder','successOrder','failedOrder') CHARACTER SET utf8mb4 COLLATE utf8mb4_vi_0900_ai_ci DEFAULT NULL,
  `type` enum('online','offline') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'productNoname',
  `price` int DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remainingQuantity` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `status` enum('hold','publish') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img-product.png',
  `categories` enum('Laki - Laki','Perempuan','Anak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `brand`, `remainingQuantity`, `quantity`, `status`, `image`, `categories`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Consina Utra Peak', 675000, 'consina', NULL, 100, 'publish', '1672922507_consina-ultra.jpeg', 'Laki - Laki', 'ULTRA PEAK\r\nDi desain khusus untuk sebuah pencapain sepatu trail yang ringan , lentur , sangat nyaman , tetapi tetap aman karena ankel support yang menjaga stabilitas kaki anda .\r\nBahan yang ringan dan juga kuat dipress langsung dengan bahan membrane waterproof technology NEODry , untuk menjaga kaki anda tetap kering/anti air dan juga bernafas/breathable .\r\n\r\nBoots/ Sepatu ini sangat tepat digunakan bagi yang memerlukan kelincahan seperti Ultra trail/ Trail run , dan juga sangat nyaman digunakan untuk Hiking/Trekking maupun travelling .\r\n\r\nMaterial :\r\n– Poly strong Mesh\r\n– PP Bumper protection\r\n– Rubber Outsole grip\r\n– Neodry technology membrane breathable / waterproof', '2023-01-05 03:53:33', '2023-01-05 05:41:47'),
(3, 'sepatu tracking Arei', 350000, 'Arey', NULL, 200, 'publish', '1672921668_sepatu-arey.jpg', 'Laki - Laki', 'Detail produk dari sepatu Gunung Arei sepatu Outdoor Rei sepatu boot Arei sepatu tracking Arei\r\nSPESIFIKASI;\r\n\r\n~ Sepatu Gunung Rei\r\n~ Model : boots\r\n~ Size : 40 41 42 43\r\n~ Warna : black\r\n~ Kualitas: Ori High Quality\r\n~ Harga sudah termasuk box\r\n~ Suede + Mesh Upper.\r\n~ Waterproof\r\n~ Polyurethane Lining.\r\n~ Grippy Rubber Outsole.\r\n~ 100% Real Picture ( Watermark ).', '2023-01-05 03:58:09', '2023-01-05 05:27:48'),
(5, 'produk1', 675000, 'Arey', 20, 10, 'publish', '1673072943_consina-ultra.jpeg', 'Laki - Laki', 'lorem ipsum', '2023-01-06 23:29:03', '2023-01-13 10:33:00'),
(6, 'SEPATU CASUAL VANS CALIFORNIA', 135000, 'Vans', 100, 38, 'publish', '1673767337_img-content.png', 'Laki - Laki', 'Kondisi: Baru\r\nBerat Satuan: 850 g\r\nKategori: Sneakers Pria\r\nEtalase: Tas Selempang\r\nMerek : Vans California\r\nTipe : California\r\nBahan : Kain Bermutu Outsol Kuat dan nyaman\r\nKualitas : Grade Original\r\nFree/Include Box\r\n\r\nMenerima Dropshoper\r\nTerima kasih', '2023-01-10 23:17:16', '2023-01-15 18:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` int NOT NULL,
  `centimeter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `centimeter`, `inch`, `created_at`, `updated_at`) VALUES
(1, 44, '28,66 cm', '10.8 inch', '2023-01-05 03:42:50', '2023-01-05 04:57:12'),
(3, 43, '26.7 cm', '10.5 inch', '2023-01-05 03:44:56', '2023-01-05 03:44:56'),
(4, 42, '26 cm', '10.3 inch', '2023-01-06 23:38:00', '2023-01-06 23:39:53'),
(5, 41, '25.7 cm', '10.1 inch', '2023-01-06 23:39:11', '2023-01-06 23:39:38'),
(6, 40, '25.4 cm', '10 inch', '2023-01-06 23:40:28', '2023-01-06 23:40:28'),
(7, 39, '25.1 cm', '9.9 inch', '2023-01-06 23:41:06', '2023-01-06 23:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `size_products`
--

DROP TABLE IF EXISTS `size_products`;
CREATE TABLE IF NOT EXISTS `size_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `productId` int NOT NULL,
  `sizeId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_products`
--

INSERT INTO `size_products` (`id`, `productId`, `sizeId`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2023-01-05 03:54:03', '2023-01-05 03:54:03'),
(2, 2, 3, '2023-01-05 03:54:03', '2023-01-05 03:54:03'),
(6, 3, 3, '2023-01-05 05:27:48', '2023-01-05 05:27:48'),
(5, 3, 1, '2023-01-05 05:27:48', '2023-01-05 05:27:48'),
(7, 1, 1, '2023-01-05 05:41:47', '2023-01-05 05:41:47'),
(8, 1, 3, '2023-01-05 05:41:47', '2023-01-05 05:41:47'),
(9, 5, 3, '2023-01-06 23:29:03', '2023-01-06 23:29:03'),
(21, 6, 1, '2023-01-15 00:22:17', '2023-01-15 00:22:17'),
(20, 6, 3, '2023-01-15 00:22:17', '2023-01-15 00:22:17'),
(19, 6, 3, '2023-01-15 00:22:17', '2023-01-15 00:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'name',
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'worker',
  `status` enum('hold','publish') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datePost` date NOT NULL DEFAULT '2023-01-05',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image-testimonial.png',
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `division`, `status`, `datePost`, `image`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Haikal April', 'programmer', 'publish', '2023-01-06', '1673022711_susu.jpg', 'pesan', '2023-01-06 09:31:51', '2023-01-06 09:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer','worker') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('hold','publish') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `status`, `gender`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'SuperAdmin@homedevs.co.id', '089516116280', 'admin', 'publish', 'Laki - Laki', '1673045203_consina-ultra.jpeg', NULL, '$2y$10$VAqYWMp7GeXkd1OtNPckT.dpA1wOb60FtJk2ynyf0OOLEBsg1mQFe', NULL, NULL, '2023-01-06 15:46:43'),
(2, 'dimasmaulana', 'customer@gmail.com', '089516116280', 'customer', 'publish', 'Laki - Laki', NULL, NULL, '$2y$10$stbtldayw4vYl.Tl2rYNBu6a7eFA7LhSCkjkZeQuo4pGVt7iqMO62', 'MYT4nj3GbuDYyqQWXSEmbWHEVCJTwQL33eObhwpFAsJxEligRsbhUwKZbPu0', '2023-01-08 08:36:31', '2023-01-08 08:36:31'),
(3, 'farhan', 'farhan@gmail.com', '089516116280', 'customer', 'publish', 'Laki - Laki', '1673833011_bukti-transfer-m-banking-bca-asli.jpg', NULL, '$2y$10$2PTN4o98vLi3tvu7rDC8FOaODizxmQsHrHCTqSXS1MHrMA4YqMo9K', 'WGgCjS0WHzVwoWiXxTvF4jtbiu41p1IMmAThLQXRNZnfbsI2hgj8V0uORV20', '2023-01-15 10:07:21', '2023-01-15 18:36:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
