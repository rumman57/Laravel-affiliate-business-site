-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 09:04 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_05_25_152857_product_table_migration', 2),
(9, '2018_05_26_065800_create_sell_products_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyprice` int(11) NOT NULL,
  `sellprice` int(11) NOT NULL,
  `commision` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `buyprice`, `sellprice`, `commision`, `created_at`, `updated_at`) VALUES
(1, 'Mango', 'uploads/products/1527314394.jpg', 100, 200, 10.00, '2018-05-25 23:59:54', '2018-05-25 23:59:54'),
(3, 'Litchi Again', 'uploads/products/1527352963.jpg', 100, 400, 15.00, '2018-05-26 10:42:43', '2018-05-26 10:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `sell_products`
--

CREATE TABLE `sell_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_commission` double(10,2) NOT NULL,
  `bname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bemail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baddress` longtext COLLATE utf8mb4_unicode_ci,
  `bdistrict` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delveryonday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delverytime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_ins` longtext COLLATE utf8mb4_unicode_ci,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_approve` int(11) NOT NULL DEFAULT '2',
  `is_paid` int(11) NOT NULL DEFAULT '2',
  `is_complete` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_products`
--

INSERT INTO `sell_products` (`id`, `product_name`, `product_price`, `product_commission`, `bname`, `bemail`, `bphone`, `baddress`, `bdistrict`, `delveryonday`, `delverytime`, `special_ins`, `ref_id`, `user_id`, `product_id`, `is_approve`, `is_paid`, `is_complete`, `created_at`, `updated_at`) VALUES
(4, 'Litchi Again', 400, 15.00, 'Md.Raqibul Hasan Rumman', 'r@gmail.com', '1757571237', 'Jalshuka,Khulumbaria\r\nSahilkupa,Jhenaidah', 'Jhenaidah', '2018-06-07', '10:00 am', 'adsf', '0qyo70X8bo', 5, 3, 2, 2, 2, '2018-06-06 05:16:31', '2018-06-06 05:16:31'),
(5, 'Mango', 200, 10.00, 'Md.Raqibul Hasan Rumman', 'r@gmail.com', '1757571237', 'Jalshuka,Khulumbaria\r\nSahilkupa,Jhenaidah', 'Jhenaidah', '2018-06-08', '12:01pm', 'asdf', 'bjmzeccEfG', 5, 1, 1, 1, 1, '2018-06-06 05:17:09', '2018-06-06 09:50:09'),
(6, ' Litchi Again', 400, 15.00, 'Md.Raqibul Hasan Rumman', 'r@gmail.com', '1757571237', 'Jalshuka,Khulumbaria\r\nSahilkupa,Jhenaidah', 'Jhenaidah', '2018-06-08', '12:01pm', 'asdf', 'bjmzeccEfG', 5, 3, 1, 2, 2, '2018-06-06 05:17:09', '2018-06-06 09:48:17'),
(7, 'Litchi Again', 400, 15.00, 'TEst', 'r@gmail.com', '1757571237', 'Jalshuka,Khulumbaria\r\nSahilkupa,Jhenaidah', 'Jhenaidah', '2018-06-05', '10:00 am', 'asdf', 'sr5OTBr4cS', 6, 3, 1, 2, 2, '2018-06-06 09:40:57', '2018-06-06 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', '$2y$10$bnwnDePZ1FNtP3bbX0ZESuqGVbj.PAuuhqlv1Nleqd2fI/utG8gqm', NULL, 1, 'GzbSnTh4yemwZi6PJburVmORChP7pVocvkMTPf3FIa37GuJJoLCOlgcyIRvk', '2018-05-25 06:37:22', '2018-05-26 12:23:47'),
(5, 'rumman', 'rumman142228@gmail.com', '$2y$10$P8X9vMg/JTdaeNBmmRvxheu/CKof4jwiiWaG0u0mo9rwBqKNhofjq', NULL, 2, 'JVUsEFcDYaSAqwJDui38zaF3x6iIZuDiyt0ixFTYFivOG3zofM8TwOlxQ0mz', '2018-05-26 10:40:13', '2018-05-26 12:21:37'),
(6, 'Test', 'test@gmail.com', '$2y$10$v4oYzEiTbFgPw4IXnS./RukbDG2DUoJxHHLewwxXABV.tlPEDa8Pm', NULL, 2, 'ZV8pvMQ50e9jXpSAzkR2CqiHUOWHqsaAtdSkVKWRLA2goCHiTZO74yVrYVzI', '2018-05-26 10:41:18', '2018-05-26 12:22:10');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_products`
--
ALTER TABLE `sell_products`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell_products`
--
ALTER TABLE `sell_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
