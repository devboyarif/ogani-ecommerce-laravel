-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 02:24 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ogani_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Hp', 1, '2020-09-20 03:57:32', '2020-09-20 03:57:32'),
(4, 'Dell', 1, '2020-09-20 03:57:38', '2020-09-20 03:57:38'),
(5, 'Samsung', 1, '2020-09-20 03:57:53', '2020-09-20 03:57:53'),
(6, 'Symphony', 1, '2020-09-20 03:58:08', '2020-09-20 03:58:08'),
(7, 'Lava', 1, '2020-09-20 03:58:31', '2020-09-20 03:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_quantity`, `product_price`, `user_id`, `user_ip`, `created_at`, `updated_at`) VALUES
(15, 6, 5, 799, 9, '127.0.0.1', '2020-09-22 09:43:46', '2020-09-22 10:07:49'),
(16, 5, 2, 500, 9, '127.0.0.1', '2020-09-22 10:10:04', '2020-09-22 11:37:03'),
(32, 8, 1, 500, 10, '127.0.0.1', '2020-09-28 09:04:31', '2020-09-28 09:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Smartphone', 1, '2020-09-20 03:55:20', '2020-09-20 03:55:20'),
(12, 'Laptop & PC', 1, '2020-09-20 03:55:36', '2020-09-20 03:55:36'),
(13, 'Men Fashion', 1, '2020-09-20 03:55:47', '2020-09-20 03:55:47'),
(14, 'Camera', 1, '2020-09-20 03:55:57', '2020-09-20 03:55:57'),
(15, 'Watch', 1, '2020-09-20 03:56:11', '2020-09-20 04:50:41'),
(16, 'Food', 1, '2020-09-27 16:47:27', '2020-09-28 11:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ariful Islam', 'arif14arif15@gmail.com', 'hgkjghk', '2020-09-28 08:29:38', '2020-09-28 08:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdfsd', 20, 1, '2020-09-20 03:44:21', '2020-09-23 10:31:41'),
(3, 'abcd', 40, 1, '2020-09-23 07:49:06', '2020-09-23 08:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_07_145007_create_admins_table', 1),
(5, '2020_09_18_140529_create_categories_table', 2),
(6, '2020_09_19_131923_create_brands_table', 3),
(10, '2020_09_19_141832_create_products_table', 4),
(12, '2020_09_20_093501_create_coupons_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`, `status`) VALUES
(12, 10, 69, 14, '1749', 'paid', '2020-09-26 06:12:17', '2020-09-26 06:12:17', 1),
(13, 10, 202, 15, '1018', 'pending', '2020-09-26 14:40:24', '2020-09-26 14:40:24', 1),
(14, 10, 203, 16, '1018', 'pending', '2020-09-27 15:30:07', '2020-09-27 15:30:07', 1),
(15, 10, 203, 17, '1018', 'pending', '2020-09-27 15:30:45', '2020-09-27 15:30:45', 1),
(16, 10, 204, 18, '1018', 'pending', '2020-09-27 15:39:32', '2020-09-27 15:39:32', 1),
(17, 10, 207, 19, '1018', 'pending', '2020-09-27 15:40:35', '2020-09-28 10:02:02', 2),
(18, 10, 208, 20, '1018', 'pending', '2020-09-27 15:55:25', '2020-09-28 10:01:59', 2),
(19, 10, 214, 21, '549.72', 'pending', '2020-09-28 09:03:21', '2020-09-28 10:22:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_sales_quantity` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `user_id`, `product_id`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(9, 12, 10, 4, '450', '1', '2020-09-26 06:12:17', '2020-09-26 06:12:17'),
(10, 12, 10, 6, '799', '1', '2020-09-26 06:12:17', '2020-09-26 06:12:17'),
(11, 12, 10, 5, '500', '1', '2020-09-26 06:12:17', '2020-09-26 06:12:17'),
(12, 13, 10, 5, '500', '2', '2020-09-26 14:40:24', '2020-09-26 14:40:24'),
(13, 14, 10, 5, '500', '2', '2020-09-27 15:30:07', '2020-09-27 15:30:07'),
(14, 15, 10, 5, '500', '2', '2020-09-27 15:30:45', '2020-09-27 15:30:45'),
(15, 16, 10, 5, '500', '2', '2020-09-27 15:39:32', '2020-09-27 15:39:32'),
(16, 17, 10, 5, '500', '2', '2020-09-27 15:40:35', '2020-09-27 15:40:35'),
(17, 18, 10, 5, '500', '2', '2020-09-27 15:55:25', '2020-09-27 15:55:25'),
(18, 19, 10, 7, '40', '1', '2020-09-28 09:03:21', '2020-09-28 09:03:21'),
(19, 19, 10, 8, '500', '1', '2020-09-28 09:03:21', '2020-09-28 09:03:21');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `transaction_no` varchar(200) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `payment_status`, `transaction_no`, `shipping_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 'Cashon', 'pending', '', 69, 10, '2020-09-26 06:12:17', '2020-09-26 06:12:17'),
(15, 'Bkash', 'pending', 'sdgdfgdfg525dfg', 202, 10, '2020-09-26 14:40:24', '2020-09-26 14:40:24'),
(16, 'Bkash', 'pending', '4asda4as4', 203, 10, '2020-09-27 15:30:07', '2020-09-27 15:30:07'),
(17, 'Bkash', 'pending', '4asda4as4', 203, 10, '2020-09-27 15:30:45', '2020-09-27 15:30:45'),
(18, 'Bkash', 'pending', 'sdgdfg', 204, 10, '2020-09-27 15:39:32', '2020-09-27 15:39:32'),
(19, 'Bkash', 'pending', 'fhgfgh', 207, 10, '2020-09-27 15:40:35', '2020-09-27 15:40:35'),
(20, 'Rocket', 'pending', 'ghghjghj', 208, 10, '2020-09-27 15:55:25', '2020-09-27 15:55:25'),
(21, 'Nagod', 'pending', 'fdgfghfgfgh', 214, 10, '2020-09-28 09:03:21', '2020-09-28 09:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_slug`, `product_code`, `product_quantity`, `product_price`, `product_image_1`, `product_image_2`, `product_image_3`, `status`, `short_description`, `long_description`, `created_at`, `updated_at`) VALUES
(4, 11, 5, 'Samsung S9', 'samsung-s9', '4dssss', 4444, 450, 'user/img/product/uploads/1678324100752454.jpg', 'user/img/product/uploads/1678324100809457.jpg', 'user/img/product/uploads/1678324100834459.jpeg', '1', '<p><u style=\"background-color: rgb(181, 214, 165);\">Awesome Phone</u></p>', '<p><b>NIce&nbsp;&nbsp;<span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span><span style=\"font-size: 0.875rem;\">NIce&nbsp;</span></b></p>', '2020-09-20 04:03:09', '2020-09-20 04:03:09'),
(5, 15, 5, 'Smart Watch', 'smart-watch', 'asd55', 1, 500, 'user/img/product/uploads/1678324247305087.jpg', 'user/img/product/uploads/1678324247348090.jpg', 'user/img/product/uploads/1678324247400093.jpg', '1', '<p><b>Awesome Watch</b></p>', '<p>Nice</p>', '2020-09-20 04:05:29', '2020-09-20 04:05:29'),
(6, 12, 5, 'Web Cam', 'web-cam', 'sadf414', 456, 799, 'user/img/product/uploads/1678324329982101.jpg', 'user/img/product/uploads/1678324330032103.jpg', 'user/img/product/uploads/1678324330086107.jpg', '1', '<p>Awesome Cam</p>', '<p>nice</p>', '2020-09-20 04:06:48', '2020-09-20 04:06:48'),
(7, 16, 7, 'Banana', 'banana', '4656', 1111, 40, 'user/img/product/uploads/1679010171004812.jpg', 'user/img/product/uploads/1679010171171822.jpg', 'user/img/product/uploads/1679010171196823.jpg', '1', '<p>Good</p>', '<ul style=\"box-sizing: border-box; margin-bottom: 1em; color: rgba(0, 0, 0, 0.65); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">Loaded with fiber, both soluble and insoluble.</span></p></li><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">Banana is a heavyweight when it comes to nutrition.</span></p></li><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">It also contains fiber, potassium, folate, and antioxidants.</span></p></li><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">It can also be a good way to get magnesium and vitamins C and B6.</span></p></li></ul>', '2020-09-27 17:47:57', '2020-09-27 17:47:57'),
(8, 16, 7, 'Burger', 'burger', '2112', 456, 500, 'user/img/product/uploads/1679010289821382.jpg', 'user/img/product/uploads/1679010289943389.jpg', 'user/img/product/uploads/1679010290041395.jpg', '1', '<p>good</p>', '<ul style=\"box-sizing: border-box; margin-bottom: 1em; color: rgba(0, 0, 0, 0.65); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">Loaded with fiber, both soluble and insoluble.</span></p></li><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">Banana is a heavyweight when it comes to nutrition.</span></p></li><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">It also contains fiber, potassium, folate, and antioxidants.</span></p></li><li dir=\"ltr\" style=\"box-sizing: border-box;\"><p dir=\"ltr\" role=\"presentation\" style=\"box-sizing: border-box; margin-bottom: 1em;\"><span style=\"box-sizing: border-box;\">It can also be a good way to get magnesium and vitamins C and B6.</span></p></li></ul>', '2020-09-27 17:49:50', '2020-09-27 17:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `shipings`
--

CREATE TABLE `shipings` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` int(10) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(110) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipings`
--

INSERT INTO `shipings` (`id`, `fname`, `lname`, `address`, `town`, `country`, `zip`, `phone`, `email`, `user_id`, `user_ip`, `created_at`, `updated_at`) VALUES
(67, 'Ariful', 'Islam', 'adabor,mohammadpur,dhaka', 'dhaka', 'dhaka', 1207, 1681729831, 'arif14arif15@gmail.com', 10, '127.0.0.1', '2020-09-26 06:12:03', '2020-09-26 06:12:03'),
(68, 'Ariful', 'Islam', 'adabor,mohammadpur,dhaka', 'dhaka', 'dhaka', 1207, 1681729831, 'arif14arif15@gmail.com', 10, '127.0.0.1', '2020-09-26 06:12:07', '2020-09-26 06:12:07'),
(69, 'Ariful', 'Islam', 'adabor,mohammadpur,dhaka', 'dhaka', 'dhaka', 1207, 1681729831, 'arif14arif15@gmail.com', 10, '127.0.0.1', '2020-09-26 06:12:11', '2020-09-26 06:12:11'),
(70, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:25:40', '2020-09-26 08:25:40'),
(71, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:32:30', '2020-09-26 08:32:30'),
(72, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:33:58', '2020-09-26 08:33:58'),
(73, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:34:20', '2020-09-26 08:34:20'),
(74, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:35:04', '2020-09-26 08:35:04'),
(75, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:36:40', '2020-09-26 08:36:40'),
(76, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:38:16', '2020-09-26 08:38:16'),
(77, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:38:41', '2020-09-26 08:38:41'),
(78, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:38:46', '2020-09-26 08:38:46'),
(79, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:42:45', '2020-09-26 08:42:45'),
(80, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:44:28', '2020-09-26 08:44:28'),
(81, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:46:09', '2020-09-26 08:46:09'),
(82, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:46:18', '2020-09-26 08:46:18'),
(83, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:58:53', '2020-09-26 08:58:53'),
(84, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:59:27', '2020-09-26 08:59:27'),
(85, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 08:59:39', '2020-09-26 08:59:39'),
(86, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:00:02', '2020-09-26 09:00:02'),
(87, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:01:26', '2020-09-26 09:01:26'),
(88, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:01:47', '2020-09-26 09:01:47'),
(89, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:02:01', '2020-09-26 09:02:01'),
(90, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:03:36', '2020-09-26 09:03:36'),
(91, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:04:29', '2020-09-26 09:04:29'),
(92, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:04:48', '2020-09-26 09:04:48'),
(93, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:05:23', '2020-09-26 09:05:23'),
(94, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:05:55', '2020-09-26 09:05:55'),
(95, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:06:13', '2020-09-26 09:06:13'),
(96, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:06:29', '2020-09-26 09:06:29'),
(97, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:07:04', '2020-09-26 09:07:04'),
(98, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:07:38', '2020-09-26 09:07:38'),
(99, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:10:28', '2020-09-26 09:10:28'),
(100, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:10:41', '2020-09-26 09:10:41'),
(101, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:11:28', '2020-09-26 09:11:28'),
(102, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:11:41', '2020-09-26 09:11:41'),
(103, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:12:10', '2020-09-26 09:12:10'),
(104, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:12:35', '2020-09-26 09:12:35'),
(105, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:12:56', '2020-09-26 09:12:56'),
(106, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:13:46', '2020-09-26 09:13:46'),
(107, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:14:12', '2020-09-26 09:14:12'),
(108, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:15:26', '2020-09-26 09:15:26'),
(109, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:16:29', '2020-09-26 09:16:29'),
(110, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:16:56', '2020-09-26 09:16:56'),
(111, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:20:26', '2020-09-26 09:20:26'),
(112, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:20:57', '2020-09-26 09:20:57'),
(113, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:22:40', '2020-09-26 09:22:40'),
(114, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:23:22', '2020-09-26 09:23:22'),
(115, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:23:52', '2020-09-26 09:23:52'),
(116, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:24:20', '2020-09-26 09:24:20'),
(117, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:26:45', '2020-09-26 09:26:45'),
(118, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:26:53', '2020-09-26 09:26:53'),
(119, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:27:15', '2020-09-26 09:27:15'),
(120, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:28:34', '2020-09-26 09:28:34'),
(121, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:29:21', '2020-09-26 09:29:21'),
(122, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:30:53', '2020-09-26 09:30:53'),
(123, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:31:16', '2020-09-26 09:31:16'),
(124, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:31:42', '2020-09-26 09:31:42'),
(125, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:31:54', '2020-09-26 09:31:54'),
(126, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:33:05', '2020-09-26 09:33:05'),
(127, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:33:20', '2020-09-26 09:33:20'),
(128, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:34:18', '2020-09-26 09:34:18'),
(129, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:34:34', '2020-09-26 09:34:34'),
(130, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:34:40', '2020-09-26 09:34:40'),
(131, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:35:37', '2020-09-26 09:35:37'),
(132, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:35:49', '2020-09-26 09:35:49'),
(133, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:36:43', '2020-09-26 09:36:43'),
(134, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:36:58', '2020-09-26 09:36:58'),
(135, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:37:24', '2020-09-26 09:37:24'),
(136, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:38:39', '2020-09-26 09:38:39'),
(137, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:39:29', '2020-09-26 09:39:29'),
(138, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:39:36', '2020-09-26 09:39:36'),
(139, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:40:04', '2020-09-26 09:40:04'),
(140, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:40:46', '2020-09-26 09:40:46'),
(141, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:41:08', '2020-09-26 09:41:08'),
(142, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:41:42', '2020-09-26 09:41:42'),
(143, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:43:24', '2020-09-26 09:43:24'),
(144, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:44:48', '2020-09-26 09:44:48'),
(145, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:45:16', '2020-09-26 09:45:16'),
(146, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:48:07', '2020-09-26 09:48:07'),
(147, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:48:25', '2020-09-26 09:48:25'),
(148, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:49:28', '2020-09-26 09:49:28'),
(149, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:50:31', '2020-09-26 09:50:31'),
(150, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:50:54', '2020-09-26 09:50:54'),
(151, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:51:09', '2020-09-26 09:51:09'),
(152, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:51:31', '2020-09-26 09:51:31'),
(153, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:51:42', '2020-09-26 09:51:42'),
(154, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:51:58', '2020-09-26 09:51:58'),
(155, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:52:54', '2020-09-26 09:52:54'),
(156, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:53:40', '2020-09-26 09:53:40'),
(157, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:54:15', '2020-09-26 09:54:15'),
(158, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:55:38', '2020-09-26 09:55:38'),
(159, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:55:47', '2020-09-26 09:55:47'),
(160, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:56:21', '2020-09-26 09:56:21'),
(161, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 09:58:21', '2020-09-26 09:58:21'),
(162, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:00:13', '2020-09-26 10:00:13'),
(163, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:18:03', '2020-09-26 10:18:03'),
(164, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:24:08', '2020-09-26 10:24:08'),
(165, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:28:27', '2020-09-26 10:28:27'),
(166, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:28:38', '2020-09-26 10:28:38'),
(167, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:28:56', '2020-09-26 10:28:56'),
(168, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:29:30', '2020-09-26 10:29:30'),
(169, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 10:29:48', '2020-09-26 10:29:48'),
(170, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 11:48:31', '2020-09-26 11:48:31'),
(171, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 11:49:35', '2020-09-26 11:49:35'),
(172, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 11:50:28', '2020-09-26 11:50:28'),
(173, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 11:50:42', '2020-09-26 11:50:42'),
(174, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 11:50:48', '2020-09-26 11:50:48'),
(175, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 11:51:41', '2020-09-26 11:51:41'),
(176, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:35:15', '2020-09-26 12:35:15'),
(177, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:41:13', '2020-09-26 12:41:13'),
(178, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:42:38', '2020-09-26 12:42:38'),
(179, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:44:38', '2020-09-26 12:44:38'),
(180, 'KaMAL', 'hOSSAIN', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 18275739909, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:46:05', '2020-09-26 12:46:05'),
(181, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:46:37', '2020-09-26 12:46:37'),
(182, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:50:24', '2020-09-26 12:50:24'),
(183, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:51:02', '2020-09-26 12:51:02'),
(184, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:51:51', '2020-09-26 12:51:51'),
(185, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 12:53:44', '2020-09-26 12:53:44'),
(186, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:01:15', '2020-09-26 14:01:15'),
(187, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:05:00', '2020-09-26 14:05:00'),
(188, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:05:26', '2020-09-26 14:05:26'),
(189, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:06:22', '2020-09-26 14:06:22'),
(190, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:06:40', '2020-09-26 14:06:40'),
(191, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:07:13', '2020-09-26 14:07:13'),
(192, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:11:51', '2020-09-26 14:11:51'),
(193, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:12:45', '2020-09-26 14:12:45'),
(194, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:17:04', '2020-09-26 14:17:04'),
(195, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:18:03', '2020-09-26 14:18:03'),
(196, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:21:05', '2020-09-26 14:21:05'),
(197, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:21:25', '2020-09-26 14:21:25'),
(198, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:22:48', '2020-09-26 14:22:48'),
(199, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:23:22', '2020-09-26 14:23:22'),
(200, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:23:33', '2020-09-26 14:23:33'),
(201, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:39:57', '2020-09-26 14:39:57'),
(202, 'Nasim Blake', 'Moore', 'Est quis perferendis', 'Error qui aliquid ip', 'Distinctio Totam ve', 91651, 8244335072, 'rahufisel@mailinator.com', 10, '127.0.0.1', '2020-09-26 14:40:15', '2020-09-26 14:40:15'),
(203, 'Simon Pope', 'Romero', 'Cillum voluptatem r', 'In excepteur vitae m', 'Magna id officia et', 71181, 2978878676, 'qekuhy@mailinator.com', 10, '127.0.0.1', '2020-09-27 15:29:43', '2020-09-27 15:29:43'),
(204, 'Simon Pope', 'Romero', 'Cillum voluptatem r', 'In excepteur vitae m', 'Magna id officia et', 71181, 2978878676, 'qekuhy@mailinator.com', 10, '127.0.0.1', '2020-09-27 15:39:25', '2020-09-27 15:39:25'),
(205, 'Simon Pope', 'Romero', 'Cillum voluptatem r', 'In excepteur vitae m', 'Magna id officia et', 71181, 2978878676, 'qekuhy@mailinator.com', 10, '127.0.0.1', '2020-09-27 15:39:54', '2020-09-27 15:39:54'),
(206, 'Simon Pope', 'Romero', 'Cillum voluptatem r', 'In excepteur vitae m', 'Magna id officia et', 71181, 2978878676, 'qekuhy@mailinator.com', 10, '127.0.0.1', '2020-09-27 15:40:26', '2020-09-27 15:40:26'),
(207, 'Simon Pope', 'Romero', 'Cillum voluptatem r', 'In excepteur vitae m', 'Magna id officia et', 71181, 2978878676, 'qekuhy@mailinator.com', 10, '127.0.0.1', '2020-09-27 15:40:29', '2020-09-27 15:40:29'),
(208, 'Simon Pope', 'Romero', 'Cillum voluptatem r', 'In excepteur vitae m', 'Magna id officia et', 71181, 2978878676, 'qekuhy@mailinator.com', 10, '127.0.0.1', '2020-09-27 15:55:17', '2020-09-27 15:55:17'),
(209, 'Kirestin Hale', 'Zorita Munoz', 'Culpa aliquip numqua', 'Voluptatem soluta m', 'Consequatur illo a', 74711, 9628982453, 'xagite@mailinator.com', 10, '127.0.0.1', '2020-09-28 08:37:52', '2020-09-28 08:37:52'),
(210, 'Kirestin Hale', 'Zorita Munoz', 'Culpa aliquip numqua', 'Voluptatem soluta m', 'Consequatur illo a', 74711, 9628982453, 'xagite@mailinator.com', 10, '127.0.0.1', '2020-09-28 08:43:31', '2020-09-28 08:43:31'),
(211, 'Kirestin Hale', 'Zorita Munoz', 'Culpa aliquip numqua', 'Voluptatem soluta m', 'Consequatur illo a', 74711, 9628982453, 'xagite@mailinator.com', 10, '127.0.0.1', '2020-09-28 08:43:50', '2020-09-28 08:43:50'),
(212, 'Kirestin Hale', 'Zorita Munoz', 'Culpa aliquip numqua', 'Voluptatem soluta m', 'Consequatur illo a', 74711, 9628982453, 'xagite@mailinator.com', 10, '127.0.0.1', '2020-09-28 08:45:04', '2020-09-28 08:45:04'),
(213, 'Kirestin Hale', 'Zorita Munoz', 'Culpa aliquip numqua', 'Voluptatem soluta m', 'Consequatur illo a', 74711, 9628982453, 'xagite@mailinator.com', 10, '127.0.0.1', '2020-09-28 08:46:27', '2020-09-28 08:46:27'),
(214, 'Aubrey Rodriguez', 'Zenaida Hogan', 'Et eiusmod pariatur', 'Deserunt repellendus', 'Quo voluptatum facil', 68372, 2816747813, 'gefi@mailinator.com', 10, '127.0.0.1', '2020-09-28 09:03:13', '2020-09-28 09:03:13'),
(215, 'Ariful', 'Islam', 'adabor,mohammadpur,dhaka', 'dhaka', 'dhaka', 1207, 1681729831, 'arif14arif15@gmail.com', 10, '127.0.0.1', '2020-09-28 09:04:49', '2020-09-28 09:04:49'),
(216, 'Ariful', 'Islam', 'adabor,mohammadpur,dhaka', 'dhaka', 'dhaka', 1207, 1681729831, 'arif14arif15@gmail.com', 10, '127.0.0.1', '2020-09-28 09:08:14', '2020-09-28 09:08:14'),
(217, 'Ariful', 'Islam', 'adabor,mohammadpur,dhaka', 'dhaka', 'dhaka', 1207, 1681729831, 'arif14arif15@gmail.com', 10, '127.0.0.1', '2020-09-28 09:08:19', '2020-09-28 09:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ariful Islam', 'arif14arif15@gmail.com', NULL, '$2y$10$TprGxlZqyrXFrysENA8aI.GE2xXt3zSBC2f5xWOj574UCjx7qZoim', NULL, '2020-09-17 14:04:51', '2020-09-17 14:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_auths`
--

CREATE TABLE `user_auths` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_auths`
--

INSERT INTO `user_auths` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `user_ip`) VALUES
(1, 'Distinctio Et aliqu', 'noroci@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:25:30', '2020-09-22 05:25:30', '127.0.0.1'),
(2, 'Officia eius placeat', 'keko@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:27:03', '2020-09-22 05:27:03', '127.0.0.1'),
(3, 'Inventore ut dolore ', 'hyworenaq@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:41:20', '2020-09-22 05:41:20', '127.0.0.1'),
(4, 'Ea culpa qui ab sit', 'quripu@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:42:35', '2020-09-22 05:42:35', '127.0.0.1'),
(5, 'Consequatur officia ', 'fyze@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:46:54', '2020-09-22 05:46:54', '127.0.0.1'),
(6, 'Sint quo saepe est s', 'bujo@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:47:42', '2020-09-22 05:47:42', '127.0.0.1'),
(7, 'Adipisicing enim sed', 'qyvynilida@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:50:23', '2020-09-22 05:50:23', '127.0.0.1'),
(8, 'Dolore est ut quas q', 'totyzod@mailinator.com', 'Pa$$w0rd!', '2020-09-22 05:52:44', '2020-09-22 05:52:44', '127.0.0.1'),
(9, 'Ariful Islam', 'arif14arif15@gmail.com', '12345678', '2020-09-22 06:48:29', '2020-09-22 06:48:29', '127.0.0.1'),
(10, 'Ariful Islam', 'arif@gmail.com', '12345678', '2020-09-22 14:11:56', '2020-09-22 14:11:56', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(110) NOT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `user_ip`, `created_at`, `updated_at`) VALUES
(7, 10, 4, '127.0.0.1', '2020-09-23 16:40:54', '2020-09-23 16:40:54'),
(8, 10, 8, '127.0.0.1', '2020-09-27 17:56:04', '2020-09-27 17:56:04');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `shipings`
--
ALTER TABLE `shipings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_auths`
--
ALTER TABLE `user_auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipings`
--
ALTER TABLE `shipings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_auths`
--
ALTER TABLE `user_auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
