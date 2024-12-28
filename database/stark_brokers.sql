-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2024 at 04:22 PM
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

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_request_id`, `confirmed_date`, `created_at`, `updated_at`) VALUES
(1, '126456789321', '2024-12-28', '2024-12-28 14:14:21', '2024-12-28 14:14:21');

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

--
-- Dumping data for table `booking_requests`
--

INSERT INTO `booking_requests` (`id`, `booking_id`, `unit_id`, `user_id`, `booking_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '126456789321', 1, 1, '2024-12-28 16:01:21', 'rejected', '2023-12-25 15:54:13', '2024-12-28 14:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('dashboard_data', 'a:11:{s:10:\"ownerCount\";i:0;s:11:\"renterCount\";i:0;s:10:\"adminCount\";i:1;s:10:\"totalUsers\";i:1;s:9:\"unitCount\";i:1;s:19:\"bookingRequestCount\";i:0;s:11:\"recentUsers\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:15:\"App\\Models\\User\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"users\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:1;s:9:\"full_name\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"phone\";s:13:\"+966539313803\";s:5:\"email\";s:15:\"admin@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";s:60:\"$2y$12$vMT9yiF5ZyawNGIq.OD/8OMRRwHnynn7mqLJYpahP7zAeLgBr6zX6\";s:4:\"type\";s:5:\"admin\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";N;s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-27 21:15:36\";s:10:\"updated_at\";s:19:\"2024-12-27 21:15:36\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:1;s:9:\"full_name\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"phone\";s:13:\"+966539313803\";s:5:\"email\";s:15:\"admin@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";s:60:\"$2y$12$vMT9yiF5ZyawNGIq.OD/8OMRRwHnynn7mqLJYpahP7zAeLgBr6zX6\";s:4:\"type\";s:5:\"admin\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";N;s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-27 21:15:36\";s:10:\"updated_at\";s:19:\"2024-12-27 21:15:36\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:2:{i:0;s:8:\"password\";i:1;s:14:\"remember_token\";}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:9:\"full_name\";i:1;s:8:\"username\";i:2;s:5:\"email\";i:3;s:8:\"password\";i:4;s:5:\"phone\";i:5;s:4:\"type\";i:6;s:13:\"business_name\";i:7;s:16:\"business_license\";i:8;s:7:\"address\";i:9;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:19:\"\0*\0authPasswordName\";s:8:\"password\";s:20:\"\0*\0rememberTokenName\";s:14:\"remember_token\";s:14:\"\0*\0accessToken\";N;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:8:\"requests\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:13:\"messagesCount\";i:0;s:8:\"messages\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:12:\"bookingCount\";i:0;}', 1735401678),
('settings', 'a:3:{s:7:\"general\";a:6:{i:0;a:8:{s:2:\"id\";i:1;s:3:\"key\";s:9:\"site_name\";s:5:\"value\";s:13:\"Stark Brokers\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:1;a:8:{s:2:\"id\";i:2;s:3:\"key\";s:9:\"site_logo\";s:5:\"value\";s:8:\"logo.jpg\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"file\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:2;a:8:{s:2:\"id\";i:3;s:3:\"key\";s:16:\"site_description\";s:5:\"value\";s:11:\"description\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:3;a:8:{s:2:\"id\";i:4;s:3:\"key\";s:13:\"support_phone\";s:5:\"value\";s:13:\"966539313803+\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-28T16:13:27.000000Z\";}i:4;a:8:{s:2:\"id\";i:5;s:3:\"key\";s:13:\"support_email\";s:5:\"value\";s:16:\"support@stark.sa\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:5:\"email\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-28T16:13:27.000000Z\";}i:5;a:8:{s:2:\"id\";i:6;s:3:\"key\";s:8:\"timezone\";s:5:\"value\";s:3:\"UTC\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}}s:12:\"social_media\";a:5:{i:0;a:8:{s:2:\"id\";i:7;s:3:\"key\";s:8:\"facebook\";s:5:\"value\";s:33:\"https://www.facebook.com/FaceBook\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:1;a:8:{s:2:\"id\";i:8;s:3:\"key\";s:9:\"instagram\";s:5:\"value\";s:34:\"https://instagram.com/starkbrokers\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:2;a:8:{s:2:\"id\";i:9;s:3:\"key\";s:8:\"whatsApp\";s:5:\"value\";s:27:\"https://wa.me/+966539313803\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:3;a:8:{s:2:\"id\";i:10;s:3:\"key\";s:7:\"twitter\";s:5:\"value\";s:25:\"https://x.com/starbrokers\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}i:4;a:8:{s:2:\"id\";i:11;s:3:\"key\";s:8:\"linkedin\";s:5:\"value\";s:46:\"https://www.linkedin.com/company/stark-brokers\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-27T21:15:35.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-27T21:15:35.000000Z\";}}s:13:\"email_setting\";a:1:{i:0;a:8:{s:2:\"id\";i:12;s:3:\"key\";s:10:\"send_email\";s:5:\"value\";s:4:\"true\";s:4:\"type\";s:13:\"email_setting\";s:10:\"input_type\";s:5:\"radio\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-13T14:39:30.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-28T16:13:38.000000Z\";}}}', 2050762418),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:6:\"routes\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:43:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:17:\"admin.roles.index\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:18:\"admin.roles.create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:16:\"admin.roles.edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:19:\"admin.roles.destroy\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:10:\"admin-list\";s:1:\"c\";s:17:\"admin.show-admins\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"admin-create\";s:1:\"c\";s:18:\"admin.create-admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:10:\"admin-edit\";s:1:\"c\";s:17:\"admin.admins.edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"admin-delete\";s:1:\"c\";s:18:\"admin.delete-admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"admin-block\";s:1:\"c\";s:17:\"admin.block-admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:16:\"admin.show-users\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:17:\"admin.delete-user\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"user-detail\";s:1:\"c\";s:18:\"admin.details-user\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"user-block\";s:1:\"c\";s:16:\"admin.block-user\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"message-list\";s:1:\"c\";s:18:\"admin.show-message\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"message-delete\";s:1:\"c\";s:20:\"admin.delete-message\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"message-read\";s:1:\"c\";s:18:\"admin.read-message\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:19:\"admin.show-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:20:\"admin.store-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"category-update\";s:1:\"c\";s:21:\"admin.update-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:21:\"admin.delete-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:12:\"feature-list\";s:1:\"c\";s:18:\"admin.show-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:14:\"feature-create\";s:1:\"c\";s:19:\"admin.store-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:14:\"feature-update\";s:1:\"c\";s:20:\"admin.update-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:14:\"feature-delete\";s:1:\"c\";s:20:\"admin.delete-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:9:\"unit-list\";s:1:\"c\";s:15:\"admin.show-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:11:\"unit-create\";s:1:\"c\";s:17:\"admin.create-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:9:\"unit-edit\";s:1:\"c\";s:15:\"admin.edit-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:11:\"unit-delete\";s:1:\"c\";s:17:\"admin.delete-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:12:\"unit-details\";s:1:\"c\";s:18:\"admin.show-details\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:18:\"unit-change-status\";s:1:\"c\";s:19:\"admin.change-status\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:20:\"booking-request-list\";s:1:\"c\";s:26:\"admin.show-booking-request\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:23:\"booking-request-details\";s:1:\"c\";s:29:\"admin.details-booking-request\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:22:\"booking-request-delete\";s:1:\"c\";s:28:\"admin.delete-booking-request\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:29:\"booking-request-change-status\";s:1:\"c\";s:27:\"admin.booking-change-status\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:12:\"booking-list\";s:1:\"c\";s:18:\"admin.show-booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:15:\"booking-details\";s:1:\"c\";s:21:\"admin.details-booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:14:\"booking-delete\";s:1:\"c\";s:20:\"admin.delete-booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"show-setting\";s:1:\"c\";s:18:\"admin.show-setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:14:\"update-setting\";s:1:\"c\";s:20:\"admin.update-setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:8:\"faq-list\";s:1:\"c\";s:14:\"admin.FAQ-list\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:10:\"faq-create\";s:1:\"c\";s:16:\"admin.FAQ-create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:8:\"faq-edit\";s:1:\"c\";s:14:\"admin.FAQ-edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:10:\"faq-delete\";s:1:\"c\";s:16:\"admin.FAQ-delete\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"d\";s:3:\"web\";}}}', 1735478054);

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

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `mediable_type`, `mediable_id`, `url`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Unit', 1, 'uploads/unit_images/5gNBNBojTz3yHpBfYRSvBNroa6Gu7REUzDm5iWXL.png', '2024-12-28 11:44:22', '2024-12-28 11:44:22'),
(3, 'App\\Models\\Unit', 1, 'uploads/unit_images/0SSilskmXQJRMrF5FunTnX1qDaoF6jfa4c197QPS.png', '2024-12-28 11:44:22', '2024-12-28 11:44:22');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kqSy386i48bKbKVsmmJQnrr5DblOqgndQCANjcrT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieVhFS1F4RWg5MjBsWmsydnVXVFZXemhPc1JMeGJSQ0pQRjhYeE1INyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2NzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FyL2FkbWluL2Jvb2tpbmctcmVxdWVzdC9zaG93LWJvb2tpbmctcmVxdWVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoibG9jYWxlIjtzOjI6ImFyIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1735402586);

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
(4, 'support_phone', '966539313803+', 'general', 'text', 1, '2024-12-27 19:15:35', '2024-12-28 14:13:27'),
(5, 'support_email', 'support@stark.sa', 'general', 'email', 1, '2024-12-27 19:15:35', '2024-12-28 14:13:27'),
(6, 'timezone', 'UTC', 'general', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(7, 'facebook', 'https://www.facebook.com/FaceBook', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(8, 'instagram', 'https://instagram.com/starkbrokers', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(9, 'whatsApp', 'https://wa.me/+966539313803', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(10, 'twitter', 'https://x.com/starbrokers', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(11, 'linkedin', 'https://www.linkedin.com/company/stark-brokers', 'social_media', 'text', 1, '2024-12-27 19:15:35', '2024-12-27 19:15:35'),
(12, 'send_email', 'true', 'email_setting', 'radio', 1, '2024-12-13 12:39:30', '2024-12-28 14:13:38');

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

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `title`, `type`, `price`, `currency`, `description`, `address`, `latitude`, `longitude`, `area`, `number_bedroom`, `number_bathroom`, `is_booked`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Facilis molestiae fa', 'villa', '83.00', 'SAR', 'Officiis dolor repre', 'برج الفيصلية، العليا، الرياض 12212، السعودية', '24.69', '46.68', '80', 2, 1, 1, 'accepted', '2024-12-28 11:14:54', '2024-12-28 14:14:21');

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

--
-- Dumping data for table `unit_features`
--

INSERT INTO `unit_features` (`id`, `unit_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 6, NULL, NULL),
(5, 1, 9, NULL, NULL),
(6, 1, 10, NULL, NULL),
(7, 1, 11, NULL, NULL),
(8, 1, 13, NULL, NULL),
(9, 1, 16, NULL, NULL),
(10, 1, 17, NULL, NULL),
(11, 1, 18, NULL, NULL),
(12, 1, 21, NULL, NULL);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_features`
--
ALTER TABLE `unit_features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
