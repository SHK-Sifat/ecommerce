-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 12:29 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `article_title` varchar(150) DEFAULT NULL,
  `article_subtitle` varchar(500) DEFAULT NULL,
  `article_web` varchar(20) DEFAULT NULL,
  `article_image` varchar(50) DEFAULT NULL,
  `article_order` int(11) NOT NULL,
  `article_creator` int(11) DEFAULT NULL,
  `article_editor` int(11) DEFAULT NULL,
  `article_slug` varchar(20) DEFAULT NULL,
  `article_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_subtitle`, `article_web`, `article_image`, `article_order`, `article_creator`, `article_editor`, `article_slug`, `article_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'From Clicks to Closets: Mastering the Art of Fashion E-commerce Marketing', 'dives into the world of fashion e-commerce marketing, guiding readers on how to turn online interest into sales. It likely explores strategies to attract potential customers, showcase products effectively, and create a smooth buying journey that converts clicks into clothes hanging in closets', 'WordPress', '2_1737764871.png', 1, 3, NULL, 'A467943007bcc80', '1', NULL, '2025-01-25 00:27:51', '2025-01-25 00:27:51'),
(3, 'Slay the Summer Style Game Must-Have Trends You Can Shop Online', NULL, 'WordPress', '3_1737765714.png', 2, 3, 3, 'A467943148988f8', '1', NULL, '2025-01-25 00:41:54', '2025-01-25 00:41:54'),
(4, 'Insider Tips on Finding Affordable Fashion Gems Online', NULL, 'WordPress', '4_1737765734.png', 3, 3, 3, 'A46794316c64a2e', '1', NULL, '2025-01-25 00:42:14', '2025-01-25 00:42:14'),
(5, 'Eco-Friendly Fashion E-commerce You Can Feel Good About', NULL, 'WordPress', '5_1737765845.png', 4, 3, 3, 'A4679431872b5c9', '1', NULL, '2025-01-25 00:44:05', '2025-01-25 00:44:06'),
(6, 'A Guide to Streamlining the Online Fashion Shopping Experience', NULL, 'WordPress', '6_1737765931.png', 5, 3, 3, 'A4679431a286592', '1', NULL, '2025-01-25 00:45:31', '2025-01-25 00:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(150) DEFAULT NULL,
  `blog_subtitle` varchar(500) DEFAULT NULL,
  `blog_web` varchar(20) DEFAULT NULL,
  `blog_image` varchar(50) DEFAULT NULL,
  `blog_order` int(11) DEFAULT NULL,
  `blog_creator` int(11) DEFAULT NULL,
  `blog_editor` int(11) DEFAULT NULL,
  `blog_slug` varchar(20) DEFAULT NULL,
  `blog_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_subtitle`, `blog_web`, `blog_image`, `blog_order`, `blog_creator`, `blog_editor`, `blog_slug`, `blog_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '33 unexpected hacks to unleash your hidden creativity.', 'Feeling like your well of creativity has run dry? This post dives into surprising strategies to spark your imagination, even if you consider yourself uncreative. Get ready to discover unconventional methods', 'Shopify', '1_1737771159.png', 1, 3, 3, 'B6679447ac84d34', '1', NULL, '2025-01-25 02:12:39', '2025-01-25 02:12:40'),
(2, 'The ultimate guide to ecommerce in 2024: everything you need to know', 'Welcome to your one-stop shop for everything related to Ecommerce in 2024! This comprehensive guide covers the latest trends, essential knowledge, and expert tips you need to stay ahead of the curve.', 'Fashion', '2_1737770996.png', 2, 3, NULL, 'B6679447f49a081', '1', NULL, '2025-01-25 02:09:56', '2025-01-25 02:09:56'),
(3, 'Do delivery? you\'re not alone! here\'s how to fix it fast', 'You\'re definitely not the only one! This post acknowledges a widespread issue and offers quick and effective solutions to get you back on track. Stop feeling overwhelmed and learn how to tackle this common problem', 'Shopify', '3_1737771035.png', 3, 3, NULL, 'B66794481bed85d', '1', NULL, '2025-01-25 02:10:35', '2025-01-25 02:10:36'),
(4, '3 unexpected hacks to unleash your hidden creativity.', 'Feeling like your well of creativity has run dry? This post dives into surprising strategies to spark your imagination, even if you consider yourself uncreative. Get ready to discover unconventional methods', 'Shopify', '4_1737800661.jpg', 4, 5, NULL, 'B66794bbd5d0807', '1', NULL, '2025-01-25 10:24:21', '2025-01-25 10:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `comment_name` varchar(20) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_message` varchar(500) DEFAULT NULL,
  `comment_slug` varchar(20) DEFAULT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_name`, `comment_email`, `comment_message`, `comment_slug`, `comment_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zahid Hasan Milon', 'milon@gmail.com', 'Men’s Slim Fit Dress Shirt is an excellent choice for those who value modern style and impeccable tailoring. Crafted from a high-quality blend of cotton and polyester, this shirt offers a smooth, wrinkle-resistant finish that stays crisp throughout the day.', 'CMT6798d8a885558', '1', NULL, '2025-01-28 13:16:24', NULL),
(2, 'Rifat Al Rahim', 'rifat@gmail.com', 'Men’s Slim Fit Dress Shirt is an excellent choice for those who value modern style and impeccable tailoring. Crafted from a high-quality blend of cotton and polyester, this shirt offers a smooth, wrinkle-resistant finish that stays crisp throughout the day.', 'CMT6798d954cabe9', '1', NULL, '2025-01-28 13:19:16', NULL),
(3, 'shk_sifat', 'sifat@gmail.com', 'Men’s Slim Fit Dress Shirt is an excellent choice for those who value modern style and impeccable tailoring. Crafted from a high-quality blend of cotton and polyester, this shirt offers a smooth, wrinkle-resistant finish that stays crisp throughout the day.', 'CMT6798d971cba7b', '1', NULL, '2025-01-28 13:19:45', NULL),
(4, 'Shithu', 'dasm@gmail.com', 'Very nice', 'CMT6798dc05501ec', '1', NULL, '2025-01-28 13:30:45', NULL),
(5, 'Zahid Hasan', 'dasm@gmail.com', 'This shirt offers a smooth, wrinkle-resistant finish that stays crisp throughout the day.', 'CMT679a744695758', '1', NULL, '2025-01-29 18:32:38', NULL),
(6, 'Saif hasan', 'saifhasan@gmail.com', 'mhsfjhb dfjhb', 'CMT67add238bf512', '1', NULL, '2025-02-13 11:06:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `contact_address` varchar(400) DEFAULT NULL,
  `contact_phone1` varchar(20) DEFAULT NULL,
  `contact_phone2` varchar(20) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_creator` int(11) DEFAULT NULL,
  `contact_country` varchar(30) DEFAULT NULL,
  `contact_editor` int(11) DEFAULT NULL,
  `contact_slug` varchar(20) DEFAULT NULL,
  `contact_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_address`, `contact_phone1`, `contact_phone2`, `contact_email`, `contact_creator`, `contact_country`, `contact_editor`, `contact_slug`, `contact_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Apt. 695 763 Cartwright Villages, East Deanland, MI 69269, Australia', '01781705044', '01866992054', 'sifatk436@gmail.com', 5, 'Australia', 5, 'C56795eed0ad40e', '1', NULL, '2025-01-26 08:44:43', '2025-01-26 08:44:43'),
(2, '931 Carroll Squares, North Mireya, VA 48458, Ontario Canada', '01781705044', '01866992054', 'sifatk436@gmail.com', 5, 'Canada', 5, 'C56795efe8b8447', '1', NULL, '2025-01-26 08:46:45', '2025-01-26 08:46:45'),
(3, '69093 Bahringer Square, Gradytown, KY 62192 Florida, United States', '01781705044', '01866992054', 'sifatk436@gmail.com', 5, 'England', 5, 'C56795f01b62450', '1', NULL, '2025-01-26 08:50:51', '2025-01-26 08:50:51');

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
(5, '2025_01_07_185706_create_roles_table', 2),
(6, '2025_01_20_232434_create_categories_table', 3),
(7, '2025_01_24_114846_create_products_table', 4),
(8, '2025_01_24_223720_create_product_categoris_table', 5),
(9, '2025_01_24_224902_create_product_categoris_table', 6),
(10, '2025_01_25_043005_create_articles_table', 7),
(11, '2025_01_25_073109_create_blogs_table', 8),
(12, '2025_01_25_180751_create_teams_table', 9),
(13, '2025_01_25_201540_create_contacts_table', 10),
(14, '2025_01_28_143745_create_reviews_table', 11),
(15, '2025_01_28_185939_create_comments_table', 12),
(16, '2025_01_29_195808_create_product_categories_table', 13),
(17, '2025_01_30_145525_create_product_types_table', 14),
(18, '2025_01_30_145831_create_product_types_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sifat@gmail.com', '$2y$10$Dn.uyKok/5hkgz4JofsnJuBWWp7Rpi/V5MQn3qe24kt/1.a5sBthC', '2025-01-27 12:51:24'),
('sifatk436@gmail.com', '$2y$10$qQbzwcY.x7TXoLWU3Oi.uOPKrw3CyK1k5ZesGj6xpWynsvVOdEH.W', '2025-01-27 10:12:46');

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
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(100) DEFAULT NULL,
  `product_details` varchar(400) DEFAULT NULL,
  `product_discount` varchar(20) DEFAULT NULL,
  `product_available` varchar(20) DEFAULT NULL,
  `product_oldprice` varchar(20) DEFAULT NULL,
  `product_newprice` varchar(20) DEFAULT NULL,
  `product_fabric` varchar(20) DEFAULT NULL,
  `product_ctions` varchar(20) DEFAULT NULL,
  `product_sleeve` varchar(20) DEFAULT NULL,
  `product_Origin` varchar(20) DEFAULT NULL,
  `product_type` varchar(20) DEFAULT NULL,
  `product_categori` varchar(255) DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL,
  `product_creator` int(11) DEFAULT NULL,
  `product_editor` int(11) DEFAULT NULL,
  `product_slug` varchar(20) DEFAULT NULL,
  `product_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_details`, `product_discount`, `product_available`, `product_oldprice`, `product_newprice`, `product_fabric`, `product_ctions`, `product_sleeve`, `product_Origin`, `product_type`, `product_categori`, `product_image`, `product_creator`, `product_editor`, `product_slug`, `product_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cargo shorts with pockets & sundress drawstring', 'A type of casual shorts, typically for men, with multiple pockets for function. Sundress with drawstring: A loose-fitting, sleeveless dress, often for women, with a drawstring at the waist for adjustability and a relaxed silhouette.', '40% Off', '50', '110.00', '100.00', 'Georgette', 'Machine Wash', 'Long Sleeve', 'Bangladesh', '1', '1', '1_1738688027.png', 5, 5, 'P7679b5b2c52506', '1', NULL, '2025-02-04 16:53:47', '2025-02-04 16:53:50'),
(2, 'Lightweight linen summer dress with belt', 'Mercari accepts all major credit cards, Visa, PayPal, MasterCard, American Express, Discover, Venmo, Zip and Apple Pay. You can also pay for all or part of your purchase using Mercari credits or by applying your balance to your purchases.', '32% Off', '50', '80', '60', 'Georgette2', 'Machine Wash2', 'Long Sleeve2', 'Bangladesh2', '2', '3', '2_1738690500.png', 5, NULL, 'P767a24fc4ab249', '1', NULL, '2025-02-04 17:35:00', '2025-02-04 17:35:03'),
(3, 'Athletic leggings with mesh panels', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '22% off', '55', '110.00', '95.00', 'Georgette3', 'Machine Wash3', 'Long Sleeve3', 'Bangladesh3', '4', '5', '3_1738690650.png', 5, NULL, 'P767a2505abd074', '1', NULL, '2025-02-04 17:37:30', '2025-02-04 17:37:30'),
(4, 'sakib', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '40% Off', '55', '80', '68', 'Georgettekk', 'Machine Wash', 'Long Sleeve', 'Bangladesh', '2', '4', '4_1738764183.png', 5, NULL, 'P767a36f971b7a6', '1', NULL, '2025-02-05 14:03:03', '2025-02-05 14:03:03'),
(5, 'Cozy knit sweater with pockets', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer', '40% Off', '50', '110.00', '90.00', 'Georgettekk', 'Machine Wash4', 'Long Sleeve4', 'Bangladesh4', '3', '3', '5_1739101570.png', 5, NULL, 'P767a895829f41d', '1', NULL, '2025-02-09 11:46:10', '2025-02-09 11:46:15'),
(6, 'Lightweight linen summer dress with belt', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '32% Off', '55', '110.00', '95.00', 'Georgette5', 'Machine Wash5', 'Long Sleeve5', 'Bangladesh5', '3', '3', '6_1739101636.png', 5, NULL, 'P767a895c451ad6', '1', NULL, '2025-02-09 11:47:16', '2025-02-09 11:47:16'),
(7, 'Cozy knit sweater with pockets', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '40% Off', '50', '100.00', '95.00', 'Georgette6', 'Machine Wash6', 'Long Sleeve6', 'Bangladesh4', '2', '2', '7_1739266206.png', 5, 5, 'P767a8960912e03', '1', NULL, '2025-02-11 09:30:06', '2025-02-11 09:30:10'),
(8, 'Lightweight linen summer dress with belt', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '32% Off', '76', '110.00', '200.00', 'Georgette7', 'Machine Wash7', 'Long Sleeve7', 'Bangladesh7', '1', '2', '8_1739101762.png', 5, NULL, 'P767a89642ce46e', '1', NULL, '2025-02-09 11:49:22', '2025-02-09 11:49:23'),
(9, 'Cozy knit sweater with pockets', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '40% Off', '50', '100.00', '68', 'Georgette8', 'Machine Wash8', 'Long Sleeve8', 'Bangladesh8', '2', '6', '9_1739101822.jpg', 5, NULL, 'P767a8967e06286', '1', NULL, '2025-02-09 11:50:22', '2025-02-09 11:50:22'),
(10, 'Lightweight linen summer dress with belt', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '22%', '55', '110.00', '200.00', 'Georgette9', 'Machine Wash9', 'Long Sleeve9', 'Bangladesh', '2', '6', '10_1739101862.png', 5, NULL, 'P767a896a625306', '1', NULL, '2025-02-09 11:51:02', '2025-02-09 11:51:02'),
(11, 'Lightweight linen summer dress with belt', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer', '30%', '50', '100.00', '200.00', 'Georgettekk9', 'Machine Wash09', 'Long Sleeve', 'Bangladesh5', '4', '4', '11_1739101906.png', 5, NULL, 'P767a896d2dc7b0', '1', NULL, '2025-02-09 11:51:46', '2025-02-09 11:51:47'),
(12, 'Athletic leggings with mesh panels', 'A type of casual shorts, typically for men, with multiple pockets for function. Sundress with drawstring: A loose-fitting, sleeveless dress, often for women, with a drawstring at the waist for adjustability and a relaxed silhouette.', '30%', '50', '100.00', '100.00', 'Georgette3', 'Machine Wash5', 'Long Sleeve6', 'Bangladesh6', '3', '5', '12_1739101944.png', 5, NULL, 'P767a896f8532f8', '1', NULL, '2025-02-09 11:52:24', '2025-02-09 11:52:24'),
(13, 'tiger fashion', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '40% Off', '55', '110.00', '100.00', 'Georgettekk', 'Machine Wash', 'Long Sleeve', 'Bangladesh5', '3', '1', '13_1739359880.jpg', 5, NULL, 'P767ac8688df3ba', '1', NULL, '2025-02-12 11:31:20', '2025-02-12 11:31:23'),
(14, 'Sifat', 'Voluptatibus labore perspiciatis doloribus voluptate quasi nostrum provident iure in.', '32% Off', '55', '110.00', '100.00', 'Georgette6', 'Machine Wash6', 'Long Sleeve4', 'Bangladesh3', '3', '1', '14_1739439235.jpg', 5, NULL, 'P767adbc8345066', '1', NULL, '2025-02-13 09:33:55', '2025-02-13 09:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `procate_id` bigint(20) UNSIGNED NOT NULL,
  `procate_name` varchar(100) NOT NULL,
  `procate_remarks` varchar(200) DEFAULT NULL,
  `procate_image` varchar(200) DEFAULT NULL,
  `procate_icon` varchar(200) DEFAULT NULL,
  `procate_url` varchar(100) DEFAULT NULL,
  `procate_slug` varchar(100) DEFAULT NULL,
  `procate_status` int(11) NOT NULL DEFAULT 1,
  `procate_creator` int(11) DEFAULT NULL,
  `procate_editor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`procate_id`, `procate_name`, `procate_remarks`, `procate_image`, `procate_icon`, `procate_url`, `procate_slug`, `procate_status`, `procate_creator`, `procate_editor`, `created_at`, `updated_at`) VALUES
(1, 'Man Shirts', NULL, '1_1738173806.png', '1_1738173806.png', 'man-shirts', 'PC679a6d6e635b7', 1, 5, NULL, '2025-01-29 18:03:26', '2025-01-29 18:03:26'),
(2, 'Denim Jeans', NULL, '2_1738174018.jpg', '2_1738174018.png', 'denim-jeans', 'PC679a6e42dc7a7', 1, 5, NULL, '2025-01-29 18:06:58', '2025-01-29 18:06:59'),
(3, 'Casual Suit', NULL, '3_1738174075.png', '3_1738174075.png', 'casual-suit', 'PC679a6e7b6f43a', 1, 5, NULL, '2025-01-29 18:07:55', '2025-01-29 18:07:55'),
(4, 'Summer Dress', NULL, '4_1738174146.png', '4_1738174147.png', 'summer-dress', 'PC679a6ec2e376d', 1, 5, NULL, '2025-01-29 18:09:06', '2025-01-29 18:09:07'),
(5, 'Sweaters', NULL, '5_1738174203.png', '5_1738174203.png', 'sweaters', 'PC679a6efb6ff4a', 1, 5, NULL, '2025-01-29 18:10:03', '2025-01-29 18:10:03'),
(6, 'Jackets', NULL, '6_1738174332.png', '6_1738174332.png', 'jackets', 'PC679a6f7c89311', 1, 5, NULL, '2025-01-29 18:12:12', '2025-01-29 18:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `protype_id` bigint(20) UNSIGNED NOT NULL,
  `protype_name` varchar(20) DEFAULT NULL,
  `protype_slug` varchar(20) DEFAULT NULL,
  `protype_status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`protype_id`, `protype_name`, `protype_slug`, `protype_status`, `created_at`, `updated_at`) VALUES
(1, 'Best', 'B645Pdn4T007', '1', '2025-01-30 09:03:17', '2025-01-30 09:03:17'),
(2, 'New', 'B645Pen4T007', '1', '2025-01-30 09:03:17', '2025-01-30 09:03:17'),
(3, 'Tranding', 'B645Pfn4T007', '1', '2025-01-30 09:04:58', '2025-01-30 09:04:58'),
(4, 'Sale', 'B645Pg44T007', '1', '2025-01-30 09:04:58', '2025-01-30 09:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `review_name` varchar(20) DEFAULT NULL,
  `review_email` varchar(255) DEFAULT NULL,
  `review_message` varchar(500) DEFAULT NULL,
  `review_slug` varchar(20) DEFAULT NULL,
  `review_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_name`, `review_email`, `review_message`, `review_slug`, `review_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Sifat Khan', 'sifatk436@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Rev6798bfd05db65', '1', NULL, '2025-01-28 11:30:24', NULL),
(4, 'Zahid Hasan Milon', 'milon@gmail.com', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Rev6798bfff2ea64', '1', NULL, '2025-01-28 11:31:11', NULL),
(5, 'Rifat Al Rahim', 'rifat@gmail.com', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Rev6798c08007c8e', '1', NULL, '2025-01-28 11:33:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(20) DEFAULT NULL,
  `role_slug` varchar(20) DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_slug`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'R064I85D', 1, '2025-01-15 19:03:37', NULL),
(2, 'Admin', 'R064XI85D', 1, '2025-01-07 19:03:37', NULL),
(3, 'Subscriber', 'R064I85D6C', 1, '2025-01-07 19:14:39', NULL),
(4, 'Visitor', NULL, 1, '2025-01-07 19:05:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(40) DEFAULT NULL,
  `team_title` varchar(50) DEFAULT NULL,
  `team_facebook` varchar(255) DEFAULT NULL,
  `team_linkedin` varchar(255) DEFAULT NULL,
  `team_instagram` varchar(255) DEFAULT NULL,
  `team_twitter` varchar(255) DEFAULT NULL,
  `team_image` varchar(50) DEFAULT NULL,
  `team_creator` int(11) DEFAULT NULL,
  `team_editor` int(11) DEFAULT NULL,
  `team_slug` varchar(20) DEFAULT NULL,
  `team_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_title`, `team_facebook`, `team_linkedin`, `team_instagram`, `team_twitter`, `team_image`, `team_creator`, `team_editor`, `team_slug`, `team_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Davis Liam', 'Marketing Specialist', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '1_1737811840.jpg', 5, NULL, 'T6794e78093d6a', '0', NULL, '2025-01-25 13:30:40', '2025-01-25 13:32:37'),
(2, 'Davis Liam', 'Marketing Specialist', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '2_1737812010.jpg', 5, NULL, 'T6794e82aee361', '1', NULL, '2025-01-25 13:33:30', '2025-01-25 13:33:31'),
(3, 'Michael Davis', 'Digital Marketing Specialist', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '3_1737812085.jpg', 5, NULL, 'T6794e875ada9b', '1', NULL, '2025-01-25 13:34:45', '2025-01-25 13:34:45'),
(4, 'Sarah Jones', 'Product Manager', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '4_1737812133.jpg', 5, NULL, 'T6794e8a5c0077', '1', NULL, '2025-01-25 13:35:33', '2025-01-25 13:35:33'),
(5, 'Emily Garcia', 'Digital Marketing Specialist', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '5_1737812179.jpg', 5, NULL, 'T6794e8d3389d5', '1', NULL, '2025-01-25 13:36:19', '2025-01-25 13:36:19'),
(6, 'Olivia Michael', 'Service Representative', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '6_1737812233.jpg', 5, NULL, 'T6794e90960748', '1', NULL, '2025-01-25 13:37:13', '2025-01-25 13:37:13'),
(7, 'Davidthy Phillips', 'Senior Developer', 'www.Facebook.com', 'www.Linkedin.com', 'www.Instagram.com', 'www.Twitter.com', '7_1737812269.jpg', 5, NULL, 'T6794e92dcf66f', '1', NULL, '2025-01-25 13:37:49', '2025-01-25 13:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `username`, `password`, `role`, `photo`, `creator`, `editor`, `slug`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rifat Al Rahim', '333-170-8128', 'rifat@gmail.com', NULL, 'Rifat', '$2y$10$H.wAvqIfG/SjQ9YsrlI4Lefy8Z75kvoFOOZ7ntfn8UmAwSC8N0FDK', 3, '3_1736338635.png', 1, NULL, 'U3677e6ccba5f04', 1, NULL, '2025-01-08 12:17:15', '2025-01-13 12:15:48'),
(5, 'Sifat Khan', '01987762263', 'sifat@gmail.com', NULL, 'sifat', '$2y$10$eYixrxNkKtrAqVYzMYoh2eSUM4ANg9/Uw2PnrHohoV5JgIaQMqBIO', 1, '5_1736761273.jpg', 3, NULL, 'U36784dfb99d7e8', 1, NULL, '2025-01-13 09:41:13', '2025-01-13 09:41:16'),
(6, 'Naim', '01987762263', 'dasm@gmail.com', NULL, 'Nayemn', '$2y$10$en9zp2l0FvluZNGdAznvMuQWBL.lGD95aMYTs.KTlxcJ8aARGwE7G', 1, '6_1736868003.jpg', 5, NULL, 'U3678680a343dac', 1, NULL, '2025-01-14 15:20:03', '2025-01-24 22:44:17'),
(7, 'Md Saif Hasan', '01987762263', 'sifatk436@gmail.com', NULL, 'saif', '$2y$10$ezxxmDCBMRyeoqmqdkOmA.mxOn.XLnz.umv5h0DLyhsRFSMwzw.IK', 1, '7_1737898962.jpg', 5, NULL, 'U367963bd1ec06d', 1, NULL, '2025-01-26 13:42:42', '2025-01-26 13:42:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

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
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`procate_id`),
  ADD UNIQUE KEY `product_categories_procate_name_unique` (`procate_name`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`protype_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `procate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `protype_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
