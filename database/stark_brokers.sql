-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2024 at 09:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stark_brokers`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_request_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_requests`
--

CREATE TABLE `booking_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Amenities\",\"ar\":\"المرافق\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(2, '{\"en\":\"Additional Features\",\"ar\":\"المميزات الإضافية\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_user` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"How do I schedule a property viewing?\",\"ar\":\"كيف يمكنني جدولة معاينة العقار؟\"}', '{\"en\":\"You can schedule a viewing by clicking the \\\"Book a Tour\\\" button on any property listing\",\"ar\":\"يمكنك جدولة معاينة بالنقر على زر \\\"حجز جولة\\\" في أي قائمة عقارية.\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(2, '{\"en\":\"What documents do I need for renting?\",\"ar\":\"ما المستندات المطلوبة للإيجار؟\"}', '{\"en\":\"Typically, you\'ll need valid ID, proof of income, and employment verification.\",\"ar\":\"عادةً، ستحتاج إلى هوية سارية، وإثبات دخل، وتحقق من التوظيف.\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"en\":\"Parking\",\"ar\":\"موقف سيارات\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(2, 1, '{\"en\":\"Swimming Pool\",\"ar\":\"حمام سباحة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(3, 1, '{\"en\":\"Gym\",\"ar\":\"صالة رياضية\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(4, 1, '{\"en\":\"24/7 Security\",\"ar\":\"أمن على مدار الساعة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(5, 1, '{\"en\":\"Elevator\",\"ar\":\"مصعد\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(6, 1, '{\"en\":\"Garden\",\"ar\":\"حديقة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(7, 1, '{\"en\":\"Central AC\",\"ar\":\"تكييف مركزي\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(8, 1, '{\"en\":\"Balcony\",\"ar\":\"شرفة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(9, 1, '{\"en\":\"Maid\'s Room\",\"ar\":\"غرفة خادمة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(10, 1, '{\"en\":\"Storage Room\",\"ar\":\"غرفة تخزين\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(11, 1, '{\"en\":\"Kitchen Appliances\",\"ar\":\"أجهزة مطبخ\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(12, 1, '{\"en\":\"Internet\",\"ar\":\"إنترنت\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(13, 1, '{\"en\":\"Satellite/Cable TV\",\"ar\":\"تلفزيون فضائي/كابل\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(14, 1, '{\"en\":\"Intercom\",\"ar\":\"انتركوم\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(15, 1, '{\"en\":\"Maintenance\",\"ar\":\"صيانة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(16, 1, '{\"en\":\"Nearby Mosque\",\"ar\":\"مسجد قريب\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(17, 1, '{\"en\":\"Shopping Centers\",\"ar\":\"مراكز تسوق\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(18, 1, '{\"en\":\"Schools Nearby\",\"ar\":\"مدارس قريبة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(19, 1, '{\"en\":\"Pets Allowed\",\"ar\":\"يسمح بالحيوانات الأليفة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(20, 2, '{\"en\":\"Sea View\",\"ar\":\"إطلالة على البحر\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(21, 2, '{\"en\":\"City View\",\"ar\":\"إطلالة على المدينة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(22, 2, '{\"en\":\"Garden View\",\"ar\":\"إطلالة على الحديقة\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(23, 2, '{\"en\":\"Street View\",\"ar\":\"إطلالة على الشارع\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36'),
(24, 2, '{\"en\":\"Mall View\",\"ar\":\"إطلالة على المركز التجاري\"}', '2024-12-27 19:15:36', '2024-12-27 19:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `mediable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_15_142055_create_personal_access_tokens_table', 1),
(5, '2024_11_27_214754_create_permission_tables', 1),
(6, '2024_12_01_143740_create_categories_table', 1),
(7, '2024_12_01_143958_create_features_table', 1),
(8, '2024_12_01_144316_create_units_table', 1),
(9, '2024_12_01_145742_create_unit_features_table', 1),
(10, '2024_12_01_145946_create_booking_requests_table', 1),
(11, '2024_12_01_154041_create_bookings_table', 1),
(12, '2024_12_01_154042_create_contact_us_table', 1),
(13, '2024_12_01_154051_create_settings_table', 1),
(14, '2024_12_01_154102_create_media_table', 1),
(15, '2024_12_08_125432_create_favorites_table', 1),
(16, '2024_12_25_135845_create_faqs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `routes`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'admin.roles.index', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(2, 'role-create', 'admin.roles.create', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(3, 'role-edit', 'admin.roles.edit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(4, 'role-delete', 'admin.roles.destroy', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(5, 'admin-list', 'admin.show-admins', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(6, 'admin-create', 'admin.create-admin', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(7, 'admin-edit', 'admin.admins.edit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(8, 'admin-delete', 'admin.delete-admin', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(9, 'admin-block', 'admin.block-admin', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(10, 'user-list', 'admin.show-users', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(11, 'user-delete', 'admin.delete-user', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(12, 'user-detail', 'admin.details-user', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(13, 'user-block', 'admin.block-user', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(14, 'message-list', 'admin.show-message', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(15, 'message-delete', 'admin.delete-message', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(16, 'message-read', 'admin.read-message', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(17, 'category-list', 'admin.show-category', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(18, 'category-create', 'admin.store-category', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(19, 'category-update', 'admin.update-category', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(20, 'category-delete', 'admin.delete-category', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(21, 'feature-list', 'admin.show-feature', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(22, 'feature-create', 'admin.store-feature', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(23, 'feature-update', 'admin.update-feature', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(24, 'feature-delete', 'admin.delete-feature', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(25, 'unit-list', 'admin.show-unit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(26, 'unit-create', 'admin.create-unit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(27, 'unit-edit', 'admin.edit-unit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(28, 'unit-delete', 'admin.delete-unit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(29, 'unit-details', 'admin.show-details', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(30, 'unit-change-status', 'admin.change-status', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(31, 'booking-request-list', 'admin.show-booking-request', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(32, 'booking-request-details', 'admin.details-booking-request', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(33, 'booking-request-delete', 'admin.delete-booking-request', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(34, 'booking-request-change-status', 'admin.booking-change-status', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(35, 'booking-list', 'admin.show-booking', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(36, 'booking-details', 'admin.details-booking', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(37, 'booking-delete', 'admin.delete-booking', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(38, 'show-setting', 'admin.show-setting', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(39, 'update-setting', 'admin.update-setting', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(40, 'faq-list', 'admin.FAQ-list', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(41, 'faq-create', 'admin.FAQ-create', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(42, 'faq-edit', 'admin.FAQ-edit', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(43, 'faq-delete', 'admin.FAQ-delete', 'web', '2024-12-27 19:15:35', '2024-12-27 19:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-12-27 19:15:36', '2024-12-27 19:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `is_editable` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `input_type`, `is_editable`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Stark Brokers', 'general', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(2, 'site_logo', 'logo.jpg', 'general', 'file', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(3, 'site_description', 'description', 'general', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(4, 'support_phone', 'support_phone', 'general', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(5, 'support_email', 'support_email@gmail.com', 'general', 'email', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(6, 'timezone', 'UTC', 'general', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(7, 'facebook', 'https://www.facebook.com/FaceBook', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(8, 'instagram', 'https://instagram.com/starkbrokers', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(9, 'whatsApp', 'https://wa.me/+966539313803', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(10, 'twitter', 'https://x.com/starbrokers', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(11, 'linkedin', 'https://www.linkedin.com/company/stark-brokers', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'apartment',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SAR',
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,2) NOT NULL DEFAULT '0.00',
  `longitude` decimal(10,2) NOT NULL DEFAULT '0.00',
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `number_bedroom` tinyint DEFAULT NULL,
  `number_bathroom` tinyint DEFAULT NULL,
  `is_booked` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_features`
--

CREATE TABLE `unit_features` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `feature_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'renter',
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `phone`, `email`, `email_verified_at`, `password`, `type`, `business_name`, `business_license`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '+966539313803', 'admin@gmail.com', NULL, '$2y$12$vMT9yiF5ZyawNGIq.OD/8OMRRwHnynn7mqLJYpahP7zAeLgBr6zX6', 'admin', NULL, NULL, NULL, 'active', NULL, '2024-12-27 19:15:36', '2024-12-27 19:15:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_booking_request_id_foreign` (`booking_request_id`);

--
-- Indexes for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_requests_booking_id_unique` (`booking_id`),
  ADD KEY `booking_requests_unit_id_foreign` (`unit_id`),
  ADD KEY `booking_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_unit_id_user_id_unique` (`unit_id`,`user_id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_category_id_foreign` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_mediable_type_mediable_id_index` (`mediable_type`,`mediable_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_user_id_foreign` (`user_id`);

--
-- Indexes for table `unit_features`
--
ALTER TABLE `unit_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_features_unit_id_foreign` (`unit_id`),
  ADD KEY `unit_features_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_type_unique` (`email`,`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_features`
--
ALTER TABLE `unit_features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_booking_request_id_foreign` FOREIGN KEY (`booking_request_id`) REFERENCES `booking_requests` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD CONSTRAINT `booking_requests_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_features`
--
ALTER TABLE `unit_features`
  ADD CONSTRAINT `unit_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_features_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
