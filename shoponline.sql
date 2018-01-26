-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2017 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.1.24-MariaDB
-- Phiên bản PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoponline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TV', NULL, NULL),
(2, 'Phone', NULL, NULL),
(3, 'Laptop', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`) VALUES
(1, '990c2a3a9646c9de2af65d3bff634bd8.jpg', 1),
(2, '990c2a3a9646c9de2af65d3bff634bd8.jpg', 1),
(3, '990c2a3a9646c9de2af65d3bff634bd8.jpg', 1),
(4, 'Tivi-Toshiba-32-inch.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2017_11_28_024530_create_suggest_products_table', 3),
(5, '2017_11_28_043040_add_collumn_user_id_into_orders_table', 4),
(6, '2017_11_28_070004_add_column_email_into_reviews_table', 5),
(7, '2017_11_28_071342_add_timestamp_into_reviews_table', 6),
(8, '2017_11_28_073420_add_column_user_id_into_review_table', 7),
(9, '2017_12_09_153301_add_column_timestamp_products_table', 8),
(10, '2017_12_11_011954_add_column_timstamps_into_category', 9),
(11, '2017_12_11_104357_add_column_address_into_users', 9),
(12, '2017_12_18_155647_add_column_status_into_reviews_table', 10),
(13, '2017_12_18_235539_add_column_into_orders_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_order` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `payment` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `discount` double NOT NULL,
  `description` text NOT NULL,
  `count` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount`, `description`, `count`, `category_id`, `thumbnail`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'Smart TV Sony ', 14900000.00, 0, '{\"Loại\": \"TV\", \"Độ phân giải\": \"4K\", \"Hệ điều hành\": \"Android Nougat\", \"Màn hình\": \"43 inches\", \"Xuất xứ\": \"Nhật Bản\"}', 15, 1, '990c2a3a9646c9de2af65d3bff634bd8.jpg', 1, NULL, NULL),
(2, 'Internet TV Sony', 36900000.00, 5, '{\"Loại\": \"TV\", \"Độ phân giải\": \"4K\", \"Hệ điều hành\": \"Android 7\", \"Màn hình\": \"65 inches\", \"Xuất xứ\": \"Hàn Quốc\"}', 5, 1, 'Smart Tivi LED LG 43inch 4K UHD - Model 43UH610T.jpg', 1, NULL, NULL),
(3, 'Internet TV Samsung', 6900000.00, 0, '{\"Loại\": \"TV\", \"Độ phân giải\": \"4K\", \"Hệ điều hành\": \"Android Nougot\", \"Màn hình\": \"32 inches\", \"Xuất xứ\": \"Trung Quốc\"}', 25, 1, 'Tivi LED Darling 32inch HD - Model 32HD955T2 (Đen).jpg', 2, NULL, NULL),
(4, 'Smart TV Panasonic', 8500000.00, 3, '{\"Loại\": \"TV\", \"Độ phân giải\": \"4K\", \"Hệ điều hành\": \"Android Nougot\", \"Màn hình\": \"40 inches\", \"Xuất xứ\": \"Thái Lan\"}', 20, 1, 'Tivi-Toshiba-32-inch.jpg', 3, NULL, NULL),
(5, 'iPhone7', 28800000.00, 5, '{\"Loại\": \"Phone\", \"CPU\": \"Apple A11\", \"Hệ điều hành\": \"iOS 11\", \"Màn hình\": \"5.5 inches\", \"Xuất xứ\": \"USA\"}', 40, 2, 'ca1a32f1c55fe41283a78c41b907aaeb.jpg', 2, NULL, NULL),
(6, 'Iphone 6', 28800000.00, 5, '{\"Loại\": \"Phone\", \"CPU\": \"Exynos 8895\", \"Hệ điều hành\": \"Android 7.1\", \"Màn hình\": \"6.5 inches\", \"Xuất xứ\": \"Hàn Quốc\"}', 40, 2, '117f115d348f8448298a567ed8d0326d.png', 2, NULL, NULL),
(7, 'ASUS Zenfone 4 Max Pro', 5000000.00, 0, '{\"Loại\": \"Phone\", \"CPU\": \"Qualcon Snapdragon 430\", \"Hệ điều hành\": \"Android 7.0\", \"Màn hình\": \"5.5 inches\", \"Xuất xứ\": \"Úc\"}', 30, 2, '49e7efbc427a716acfb4e7261b6601c5.jpg', 3, NULL, NULL),
(8, 'ASUS X441NA N4200', 7700000.00, 0, '{\"Loại\": \"Laptop\", \"CPU\": \"Intel Pentium 1.1GHz\", \"Ổ cứng\": \"500GB\", \"Màn hình\": \"14 inches\", \"Xuất xứ\": \"Úc\"}', 35, 3, '94163cc585d12730fa16a4c762589397.jpg', 3, NULL, NULL),
(9, 'ASUS UX510UX', 19000000.00, 10, '{\"Loại\": \"Laptop\", \"CPU\": \"Intel Core i5 2.5GHz\", \"Ổ cứng\": \"1TB\", \"Màn hình\": \"15.6 inches\", \"Xuất xứ\": \"Ấn Độ\"}', 15, 3, '5835851_sd.jpg', 3, NULL, NULL),
(10, 'Dell Inspiron 3467', 11300000.00, 6, '{\"Loại\": \"Laptop\", \"CPU\": \"Intel Core i3 2.4GHz\", \"Ổ cứng\": \"1TB\", \"Màn hình\": \"14 inches\", \"Xuất xứ\": \"Việt Nam\"}', 20, 3, 'ab809dcc622183c3c3586c09428fbdb3.jpg', 4, NULL, NULL),
(11, 'Dell Vostro 3568', 14700000.00, 6, '{\"Loại\": \"Laptop\", \"CPU\": \"Intel Core i5 2.5GHz\", \"Ổ cứng\": \"1TB\", \"Màn hình\": \"14.5 inches\", \"Xuất xứ\": \"Việt Nam\"}', 20, 3, 'b56b4d6781b3e9639372b26f93d3dcab.jpg', 4, NULL, NULL),
(12, 'Lenovo IdeaPad Y520', 25700000.00, 8, '{\"Loại\": \"Laptop\", \"CPU\": \"Intel Core i7 3.2GHz\", \"Ổ cứng\": \"1.2TB\", \"Màn hình\": \"15.6 inches\", \"Xuất xứ\": \"Anh\"}', 10, 3, 'f5cf90aa7fbc7e3942faf26f31ed4ce1.jpg', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `content`, `status`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tran Van A', 'tranvana@gmail.com', 'San pham nay rat tot', 0, 1, 4, '2017-11-28 00:15:04', '2017-12-19 01:40:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suggest_products`
--

CREATE TABLE `suggest_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `suggest_product_id` int(11) NOT NULL,
  `redirect_to_product_id` int(11) NOT NULL,
  `number_redirect` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suggest_products`
--

INSERT INTO `suggest_products` (`id`, `suggest_product_id`, `redirect_to_product_id`, `number_redirect`, `created_at`, `updated_at`) VALUES
(1, 28, 1, 1, '2017-11-27 20:07:59', '2017-11-27 20:07:59'),
(2, 1, 6, 1, '2017-11-27 20:08:28', '2017-11-27 20:08:28'),
(3, 6, 5, 1, '2017-11-27 20:15:32', '2017-11-27 20:15:32'),
(4, 5, 7, 1, '2017-11-27 20:18:31', '2017-11-27 20:18:31'),
(5, 7, 12, 1, '2017-11-27 20:19:57', '2017-11-27 20:19:57'),
(6, 12, 3, 1, '2017-11-27 20:20:25', '2017-11-27 20:20:25'),
(7, 3, 6, 1, '2017-11-27 20:34:17', '2017-11-27 20:34:17'),
(8, 6, 1, 1, '2017-11-27 20:37:35', '2017-11-27 20:37:35'),
(9, 1, 3, 1, '2017-11-27 20:37:43', '2017-11-27 20:37:43'),
(10, 3, 1, 1, '2017-11-27 20:37:47', '2017-11-27 20:37:47'),
(11, 1, 4, 1, '2017-11-27 20:37:59', '2017-11-27 20:37:59'),
(12, 4, 5, 1, '2017-11-27 20:38:11', '2017-11-27 20:38:11'),
(13, 5, 4, 1, '2017-11-27 20:38:19', '2017-11-27 20:38:19'),
(14, 4, 1, 1, '2017-11-27 21:00:15', '2017-11-27 21:00:15'),
(15, 1, 12, 1, '2017-11-27 21:03:19', '2017-11-27 21:03:19'),
(16, 12, 1, 1, '2017-11-27 21:03:23', '2017-11-27 21:03:23'),
(17, 26, 1, 1, '2017-11-27 21:04:52', '2017-11-27 21:04:52'),
(18, 1, 12, 1, '2017-11-27 21:05:04', '2017-11-27 21:05:04'),
(19, 12, 1, 1, '2017-11-27 21:05:10', '2017-11-27 21:05:10'),
(20, 28, 1, 1, '2017-11-27 21:18:12', '2017-11-27 21:18:12'),
(21, 1, 5, 1, '2017-11-27 21:25:10', '2017-11-27 21:25:10'),
(22, 5, 1, 1, '2017-11-27 21:58:39', '2017-11-27 21:58:39'),
(23, 27, 1, 1, '2017-11-29 19:50:10', '2017-11-29 19:50:10'),
(24, 28, 1, 1, '2017-11-30 00:58:21', '2017-11-30 00:58:21'),
(25, 28, 1, 1, '2017-12-03 02:22:32', '2017-12-03 02:22:32'),
(26, 1, 9, 1, '2017-12-10 09:50:25', '2017-12-10 09:50:25'),
(27, 1, 5, 1, '2017-12-11 02:37:26', '2017-12-11 02:37:26'),
(28, 5, 6, 1, '2017-12-11 02:46:48', '2017-12-11 02:46:48'),
(29, 6, 1, 1, '2017-12-11 02:58:53', '2017-12-11 02:58:53'),
(30, 1, 7, 1, '2017-12-11 06:17:39', '2017-12-11 06:17:39'),
(31, 7, 1, 1, '2017-12-11 06:30:10', '2017-12-11 06:30:10'),
(32, 28, 1, 1, '2017-12-11 06:31:46', '2017-12-11 06:31:46'),
(33, 1, 2, 1, '2017-12-11 06:32:29', '2017-12-11 06:32:29'),
(34, 2, 5, 1, '2017-12-11 06:48:25', '2017-12-11 06:48:25'),
(35, 5, 3, 1, '2017-12-11 06:48:30', '2017-12-11 06:48:30'),
(36, 3, 1, 1, '2017-12-11 06:50:07', '2017-12-11 06:50:07'),
(37, 1, 5, 1, '2017-12-11 06:50:33', '2017-12-11 06:50:33'),
(38, 5, 11, 1, '2017-12-11 06:53:09', '2017-12-11 06:53:09'),
(39, 11, 6, 1, '2017-12-11 06:54:04', '2017-12-11 06:54:04'),
(40, 6, 2, 1, '2017-12-11 06:54:23', '2017-12-11 06:54:23'),
(41, 2, 3, 1, '2017-12-11 06:57:01', '2017-12-11 06:57:01'),
(42, 3, 1, 1, '2017-12-11 07:30:47', '2017-12-11 07:30:47'),
(43, 1, 2, 1, '2017-12-11 08:13:51', '2017-12-11 08:13:51'),
(44, 2, 3, 1, '2017-12-11 08:20:12', '2017-12-11 08:20:12'),
(45, 3, 4, 1, '2017-12-11 08:27:23', '2017-12-11 08:27:23'),
(46, 4, 2, 1, '2017-12-11 08:33:55', '2017-12-11 08:33:55'),
(47, 2, 4, 1, '2017-12-11 08:42:24', '2017-12-11 08:42:24'),
(48, 1, 10, 1, '2017-12-18 07:44:01', '2017-12-18 07:44:01'),
(49, 10, 1, 1, '2017-12-18 07:56:33', '2017-12-18 07:56:33'),
(50, 1, 5, 1, '2017-12-18 09:33:20', '2017-12-18 09:33:20'),
(51, 5, 1, 1, '2017-12-18 09:34:13', '2017-12-18 09:34:13'),
(52, 1, 6, 1, '2017-12-19 01:21:38', '2017-12-19 01:21:38'),
(53, 6, 2, 1, '2017-12-19 01:21:43', '2017-12-19 01:21:43'),
(54, 2, 1, 1, '2017-12-19 01:37:40', '2017-12-19 01:37:40'),
(55, 1, 4, 1, '2017-12-19 02:02:06', '2017-12-19 02:02:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf32 NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Công ty HHP', '0123456789', 'HHP@gmail.com', 'Hà Nội'),
(2, 'Công ty MAM', '0123456789', 'MAM@gmail.com', 'Hà Nội'),
(3, 'Công ty LAP', '0123456112', 'LAP@gmail.com', 'Hà Đông'),
(4, 'Công ty PNG', '0123455789', 'PNG@gmail.com', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `phone`, `address`, `avatar`, `group_id`, `birthday`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'male', '01675460285', 'Hà Nội', 'unknow.png', 1, '1997-07-06', 'admin@gmail.com', '$2y$10$kULKR1w5kO28k2yPRMeTfe0JKUy2D2ZV2bwTVdl1z2NWJjj/ULbQ6', 'fhUhDts01VVmXCqkqN1mWnQIA8tIjXzlz702nTp28H0VvlhvDorDzscNqwan', '2017-12-09 09:59:11', '2017-12-18 08:00:00'),
(8, 'Nguyễn Minh Hoàng', 'male', '01675460285', 'Hà Nội', '6c4911a74c8189d9adce42f58682089a.jpg', 2, '2017-12-07', 'quynh4589@gmail.com', '$2y$10$8VegvCHRNmZtPyM5G/1lVektln36o9T/.IVPoNCce17ekCDIIj/le', 'BAipUKAhktFu0qjlbabaehA9yZLd57r2W3BsSL12GKeQJOqioIH7g29FIVtq', '2017-12-11 04:52:15', '2017-12-19 01:40:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suggest_products`
--
ALTER TABLE `suggest_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `suggest_products`
--
ALTER TABLE `suggest_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
