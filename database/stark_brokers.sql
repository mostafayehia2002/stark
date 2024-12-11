-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2024 at 09:02 PM
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
-- Database: `stark_react_scratch`
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

--
-- Dumping data for table `booking_requests`
--

INSERT INTO `booking_requests` (`id`, `booking_id`, `unit_id`, `user_id`, `booking_date`, `status`, `created_at`, `updated_at`) VALUES
(3, '5393809954', 2, 4, '2024-12-11 17:21:35', 'accepted', '2024-12-10 13:55:34', '2024-12-10 13:55:45');

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
('dashboard_data', 'a:11:{s:10:\"ownerCount\";i:1;s:11:\"renterCount\";i:1;s:10:\"adminCount\";i:2;s:10:\"totalUsers\";i:4;s:9:\"unitCount\";i:2;s:19:\"bookingRequestCount\";i:1;s:11:\"recentUsers\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:15:\"App\\Models\\User\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"users\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:4;s:9:\"full_name\";s:6:\"renter\";s:8:\"username\";s:6:\"renter\";s:5:\"phone\";s:13:\"+966550427014\";s:5:\"email\";s:16:\"renter@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";N;s:4:\"type\";s:6:\"renter\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";s:59:\"الرياض المملكه العربيه السعودية\";s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-10 15:35:07\";s:10:\"updated_at\";s:19:\"2024-12-10 15:35:40\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:4;s:9:\"full_name\";s:6:\"renter\";s:8:\"username\";s:6:\"renter\";s:5:\"phone\";s:13:\"+966550427014\";s:5:\"email\";s:16:\"renter@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";N;s:4:\"type\";s:6:\"renter\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";s:59:\"الرياض المملكه العربيه السعودية\";s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-10 15:35:07\";s:10:\"updated_at\";s:19:\"2024-12-10 15:35:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:2:{i:0;s:8:\"password\";i:1;s:14:\"remember_token\";}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:9:\"full_name\";i:1;s:8:\"username\";i:2;s:5:\"email\";i:3;s:8:\"password\";i:4;s:5:\"phone\";i:5;s:4:\"type\";i:6;s:13:\"business_name\";i:7;s:16:\"business_license\";i:8;s:7:\"address\";i:9;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:19:\"\0*\0authPasswordName\";s:8:\"password\";s:20:\"\0*\0rememberTokenName\";s:14:\"remember_token\";s:14:\"\0*\0accessToken\";N;}i:1;O:15:\"App\\Models\\User\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"users\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:3;s:9:\"full_name\";s:6:\"owner1\";s:8:\"username\";s:5:\"owner\";s:5:\"phone\";s:13:\"+966550427014\";s:5:\"email\";s:15:\"owner@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";N;s:4:\"type\";s:5:\"owner\";s:13:\"business_name\";s:17:\"my first business\";s:16:\"business_license\";s:6:\"123565\";s:7:\"address\";s:10:\"my address\";s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-10 15:13:50\";s:10:\"updated_at\";s:19:\"2024-12-10 15:16:14\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:3;s:9:\"full_name\";s:6:\"owner1\";s:8:\"username\";s:5:\"owner\";s:5:\"phone\";s:13:\"+966550427014\";s:5:\"email\";s:15:\"owner@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";N;s:4:\"type\";s:5:\"owner\";s:13:\"business_name\";s:17:\"my first business\";s:16:\"business_license\";s:6:\"123565\";s:7:\"address\";s:10:\"my address\";s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-10 15:13:50\";s:10:\"updated_at\";s:19:\"2024-12-10 15:16:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:2:{i:0;s:8:\"password\";i:1;s:14:\"remember_token\";}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:9:\"full_name\";i:1;s:8:\"username\";i:2;s:5:\"email\";i:3;s:8:\"password\";i:4;s:5:\"phone\";i:5;s:4:\"type\";i:6;s:13:\"business_name\";i:7;s:16:\"business_license\";i:8;s:7:\"address\";i:9;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:19:\"\0*\0authPasswordName\";s:8:\"password\";s:20:\"\0*\0rememberTokenName\";s:14:\"remember_token\";s:14:\"\0*\0accessToken\";N;}i:2;O:15:\"App\\Models\\User\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"users\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:2;s:9:\"full_name\";s:13:\"Kerry Goodman\";s:8:\"username\";s:7:\"rabawah\";s:5:\"phone\";s:17:\"+1 (286) 197-2139\";s:5:\"email\";s:25:\"kesuwureqe@mailinator.com\";s:17:\"email_verified_at\";N;s:8:\"password\";s:60:\"$2y$12$8Tf7R2CwH12tbIipfvlyLOCXOndPYNj2pGC6aoFqwqZMimQvQ2GjG\";s:4:\"type\";s:5:\"admin\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";N;s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-10 14:51:09\";s:10:\"updated_at\";s:19:\"2024-12-10 14:51:09\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:2;s:9:\"full_name\";s:13:\"Kerry Goodman\";s:8:\"username\";s:7:\"rabawah\";s:5:\"phone\";s:17:\"+1 (286) 197-2139\";s:5:\"email\";s:25:\"kesuwureqe@mailinator.com\";s:17:\"email_verified_at\";N;s:8:\"password\";s:60:\"$2y$12$8Tf7R2CwH12tbIipfvlyLOCXOndPYNj2pGC6aoFqwqZMimQvQ2GjG\";s:4:\"type\";s:5:\"admin\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";N;s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";N;s:10:\"created_at\";s:19:\"2024-12-10 14:51:09\";s:10:\"updated_at\";s:19:\"2024-12-10 14:51:09\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:2:{i:0;s:8:\"password\";i:1;s:14:\"remember_token\";}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:9:\"full_name\";i:1;s:8:\"username\";i:2;s:5:\"email\";i:3;s:8:\"password\";i:4;s:5:\"phone\";i:5;s:4:\"type\";i:6;s:13:\"business_name\";i:7;s:16:\"business_license\";i:8;s:7:\"address\";i:9;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:19:\"\0*\0authPasswordName\";s:8:\"password\";s:20:\"\0*\0rememberTokenName\";s:14:\"remember_token\";s:14:\"\0*\0accessToken\";N;}i:3;O:15:\"App\\Models\\User\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"users\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:1;s:9:\"full_name\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"phone\";s:13:\"+966539313803\";s:5:\"email\";s:15:\"admin@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";s:60:\"$2y$12$GiYMg713fMMblXA9dKYm.O1D.5vxQCG0sX.hz.Otuh4URhuBlSJhK\";s:4:\"type\";s:5:\"admin\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";N;s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";s:60:\"sSlrfFnCAmhn7iYJD9SG3K3Sb0n3THV0KXTNzWlVUemEMC5eeUo26feHvnRJ\";s:10:\"created_at\";s:19:\"2024-12-10 14:35:46\";s:10:\"updated_at\";s:19:\"2024-12-10 14:35:46\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:1;s:9:\"full_name\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"phone\";s:13:\"+966539313803\";s:5:\"email\";s:15:\"admin@gmail.com\";s:17:\"email_verified_at\";N;s:8:\"password\";s:60:\"$2y$12$GiYMg713fMMblXA9dKYm.O1D.5vxQCG0sX.hz.Otuh4URhuBlSJhK\";s:4:\"type\";s:5:\"admin\";s:13:\"business_name\";N;s:16:\"business_license\";N;s:7:\"address\";N;s:6:\"status\";s:6:\"active\";s:14:\"remember_token\";s:60:\"sSlrfFnCAmhn7iYJD9SG3K3Sb0n3THV0KXTNzWlVUemEMC5eeUo26feHvnRJ\";s:10:\"created_at\";s:19:\"2024-12-10 14:35:46\";s:10:\"updated_at\";s:19:\"2024-12-10 14:35:46\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:2:{i:0;s:8:\"password\";i:1;s:14:\"remember_token\";}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:9:\"full_name\";i:1;s:8:\"username\";i:2;s:5:\"email\";i:3;s:8:\"password\";i:4;s:5:\"phone\";i:5;s:4:\"type\";i:6;s:13:\"business_name\";i:7;s:16:\"business_license\";i:8;s:7:\"address\";i:9;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:19:\"\0*\0authPasswordName\";s:8:\"password\";s:20:\"\0*\0rememberTokenName\";s:14:\"remember_token\";s:14:\"\0*\0accessToken\";N;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:8:\"requests\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:25:\"App\\Models\\BookingRequest\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:16:\"booking_requests\";s:13:\"\0*\0primaryKey\";s:10:\"booking_id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:10:\"booking_id\";s:10:\"5393809954\";s:7:\"unit_id\";i:2;s:7:\"user_id\";i:4;s:12:\"booking_date\";s:19:\"2024-12-11 17:21:35\";s:6:\"status\";s:8:\"accepted\";s:10:\"created_at\";s:19:\"2024-12-10 15:55:34\";s:10:\"updated_at\";s:19:\"2024-12-10 15:55:45\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:10:\"booking_id\";s:10:\"5393809954\";s:7:\"unit_id\";i:2;s:7:\"user_id\";i:4;s:12:\"booking_date\";s:19:\"2024-12-11 17:21:35\";s:6:\"status\";s:8:\"accepted\";s:10:\"created_at\";s:19:\"2024-12-10 15:55:34\";s:10:\"updated_at\";s:19:\"2024-12-10 15:55:45\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:10:\"booking_id\";i:1;s:7:\"user_id\";i:2;s:7:\"unit_id\";i:3;s:12:\"booking_date\";i:4;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:13:\"messagesCount\";i:1;s:8:\"messages\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:20:\"App\\Models\\ContactUs\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"contact_us\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:9:\"full_name\";s:5:\"owner\";s:5:\"email\";s:15:\"owner@gmail.com\";s:7:\"message\";s:5:\"hello\";s:7:\"is_user\";i:1;s:7:\"is_read\";i:1;s:10:\"created_at\";s:19:\"2024-12-10 15:17:18\";s:10:\"updated_at\";s:19:\"2024-12-10 15:17:38\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:9:\"full_name\";s:5:\"owner\";s:5:\"email\";s:15:\"owner@gmail.com\";s:7:\"message\";s:5:\"hello\";s:7:\"is_user\";i:1;s:7:\"is_read\";i:1;s:10:\"created_at\";s:19:\"2024-12-10 15:17:18\";s:10:\"updated_at\";s:19:\"2024-12-10 15:17:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"full_name\";i:1;s:5:\"email\";i:2;s:7:\"message\";i:3;s:7:\"is_user\";i:4;s:7:\"is_read\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:12:\"bookingCount\";i:0;}', 1733947746),
('settings', 'a:2:{s:7:\"general\";a:6:{i:0;a:8:{s:2:\"id\";i:1;s:3:\"key\";s:9:\"site_name\";s:5:\"value\";s:13:\"Stark Brokers\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-11T17:13:11.000000Z\";}i:1;a:8:{s:2:\"id\";i:2;s:3:\"key\";s:9:\"site_logo\";s:5:\"value\";s:44:\"aAwhZmVFLPoVXMkXPALVSBpkat1muU09Xfx0FOJv.jpg\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"file\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:50:43.000000Z\";}i:2;a:8:{s:2:\"id\";i:3;s:3:\"key\";s:16:\"site_description\";s:5:\"value\";s:11:\"description\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:3;a:8:{s:2:\"id\";i:4;s:3:\"key\";s:13:\"support_phone\";s:5:\"value\";s:13:\"support_phone\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:4;a:8:{s:2:\"id\";i:5;s:3:\"key\";s:13:\"support_email\";s:5:\"value\";s:23:\"support_email@gmail.com\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:5:\"email\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:5;a:8:{s:2:\"id\";i:6;s:3:\"key\";s:8:\"timezone\";s:5:\"value\";s:3:\"UTC\";s:4:\"type\";s:7:\"general\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}}s:12:\"social_media\";a:5:{i:0;a:8:{s:2:\"id\";i:7;s:3:\"key\";s:8:\"FaceBook\";s:5:\"value\";s:33:\"https://www.facebook.com/FaceBook\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:1;a:8:{s:2:\"id\";i:8;s:3:\"key\";s:9:\"Instagram\";s:5:\"value\";s:34:\"https://instagram.com/starkbrokers\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:2;a:8:{s:2:\"id\";i:9;s:3:\"key\";s:8:\"WhatsApp\";s:5:\"value\";s:27:\"https://wa.me/+966539313803\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:3;a:8:{s:2:\"id\";i:10;s:3:\"key\";s:7:\"Twitter\";s:5:\"value\";s:25:\"https://x.com/starbrokers\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}i:4;a:8:{s:2:\"id\";i:11;s:3:\"key\";s:8:\"LinkedIn\";s:5:\"value\";s:46:\"https://www.linkedin.com/company/stark-brokers\";s:4:\"type\";s:12:\"social_media\";s:10:\"input_type\";s:4:\"text\";s:11:\"is_editable\";i:1;s:10:\"created_at\";s:27:\"2024-12-10T14:35:45.000000Z\";s:10:\"updated_at\";s:27:\"2024-12-10T14:35:45.000000Z\";}}}', 2049299986),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:6:\"routes\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:39:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:17:\"admin.roles.index\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:18:\"admin.roles.create\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:16:\"admin.roles.edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:19:\"admin.roles.destroy\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:10:\"admin-list\";s:1:\"c\";s:17:\"admin.show-admins\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"admin-create\";s:1:\"c\";s:18:\"admin.create-admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:10:\"admin-edit\";s:1:\"c\";s:17:\"admin.admins.edit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"admin-delete\";s:1:\"c\";s:18:\"admin.delete-admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"admin-block\";s:1:\"c\";s:17:\"admin.block-admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:16:\"admin.show-users\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:17:\"admin.delete-user\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"user-detail\";s:1:\"c\";s:18:\"admin.details-user\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"user-block\";s:1:\"c\";s:16:\"admin.block-user\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"message-list\";s:1:\"c\";s:18:\"admin.show-message\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"message-delete\";s:1:\"c\";s:20:\"admin.delete-message\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"message-read\";s:1:\"c\";s:18:\"admin.read-message\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:19:\"admin.show-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:20:\"admin.store-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"category-update\";s:1:\"c\";s:21:\"admin.update-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:21:\"admin.delete-category\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:12:\"feature-list\";s:1:\"c\";s:18:\"admin.show-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:14:\"feature-create\";s:1:\"c\";s:19:\"admin.store-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:14:\"feature-update\";s:1:\"c\";s:20:\"admin.update-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:14:\"feature-delete\";s:1:\"c\";s:20:\"admin.delete-feature\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:9:\"unit-list\";s:1:\"c\";s:15:\"admin.show-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:11:\"unit-create\";s:1:\"c\";s:17:\"admin.create-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:9:\"unit-edit\";s:1:\"c\";s:15:\"admin.edit-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:11:\"unit-delete\";s:1:\"c\";s:17:\"admin.delete-unit\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:12:\"unit-details\";s:1:\"c\";s:18:\"admin.show-details\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:18:\"unit-change-status\";s:1:\"c\";s:19:\"admin.change-status\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:20:\"booking-request-list\";s:1:\"c\";s:26:\"admin.show-booking-request\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:23:\"booking-request-details\";s:1:\"c\";s:29:\"admin.details-booking-request\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:22:\"booking-request-delete\";s:1:\"c\";s:28:\"admin.delete-booking-request\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:29:\"booking-request-change-status\";s:1:\"c\";s:27:\"admin.booking-change-status\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:12:\"booking-list\";s:1:\"c\";s:18:\"admin.show-booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:15:\"booking-details\";s:1:\"c\";s:21:\"admin.details-booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:14:\"booking-delete\";s:1:\"c\";s:20:\"admin.delete-booking\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"show-setting\";s:1:\"c\";s:18:\"admin.show-setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:38;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:14:\"update-setting\";s:1:\"c\";s:20:\"admin.update-setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"d\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"sub-admin\";s:1:\"d\";s:3:\"web\";}}}', 1734033959);

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
(1, 'Amenities', '2024-12-10 12:52:56', '2024-12-10 12:52:56'),
(2, 'Additional Features', '2024-12-10 12:57:09', '2024-12-10 12:57:09');

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

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `message`, `is_user`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'owner@gmail.com', 'hello', 1, 1, '2024-12-10 13:17:18', '2024-12-10 13:17:38');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(2, 4, 2, '2024-12-10 15:55:30', '2024-12-10 15:55:30');

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
(1, 1, 'Parking', '2024-12-10 12:53:11', '2024-12-10 12:53:11'),
(2, 1, 'Swimming Pool', '2024-12-10 12:53:32', '2024-12-10 12:53:32'),
(3, 1, 'Gym', '2024-12-10 12:53:41', '2024-12-10 12:53:41'),
(4, 1, '24/7 Security', '2024-12-10 12:53:49', '2024-12-10 12:53:49'),
(5, 1, 'Elevator', '2024-12-10 12:53:57', '2024-12-10 12:53:57'),
(6, 1, 'Garden', '2024-12-10 12:54:05', '2024-12-10 12:54:05'),
(7, 1, 'Central AC', '2024-12-10 12:54:14', '2024-12-10 12:54:14'),
(8, 1, 'Balcony', '2024-12-10 12:54:22', '2024-12-10 12:54:22'),
(9, 1, 'Maid\'s Room', '2024-12-10 12:54:41', '2024-12-10 12:54:41'),
(10, 1, 'Storage Room', '2024-12-10 12:55:03', '2024-12-10 12:55:03'),
(11, 1, 'Kitchen Appliances', '2024-12-10 12:55:19', '2024-12-10 12:55:19'),
(12, 1, 'Internet', '2024-12-10 12:55:26', '2024-12-10 12:55:26'),
(13, 1, 'Satellite/Cable TV', '2024-12-10 12:55:36', '2024-12-10 12:55:36'),
(14, 1, 'Intercom', '2024-12-10 12:55:44', '2024-12-10 12:55:44'),
(15, 1, 'Maintenance', '2024-12-10 12:55:52', '2024-12-10 12:55:52'),
(16, 1, 'Nearby Mosque', '2024-12-10 12:56:08', '2024-12-10 12:56:08'),
(17, 1, 'Shopping Centers', '2024-12-10 12:56:24', '2024-12-10 12:56:24'),
(18, 1, 'Schools Nearby', '2024-12-10 12:56:35', '2024-12-10 12:56:35'),
(19, 1, 'Pets Allowed', '2024-12-10 12:56:52', '2024-12-10 12:56:52'),
(20, 2, 'Sea View', '2024-12-10 12:57:36', '2024-12-10 12:57:36'),
(21, 2, 'City View', '2024-12-10 12:57:51', '2024-12-10 12:57:51'),
(22, 2, 'Garden View', '2024-12-10 12:58:06', '2024-12-10 12:58:06'),
(23, 2, 'Street View', '2024-12-10 12:58:20', '2024-12-10 12:58:20'),
(24, 2, 'Mall View', '2024-12-10 12:58:32', '2024-12-10 12:58:32');

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
(2, 'App\\Models\\Unit', 2, 'uploads/unit_images/T5qnpAiB2pmt6996s0Dq8pYIMQSYN7ywek3JRHkq.png', '2024-12-10 13:22:59', '2024-12-10 13:22:59'),
(3, 'App\\Models\\Unit', 2, 'uploads/unit_images/LvSgF8YIliKUmr7eHLjD05gqgb5QJkTSQyw95wAX.png', '2024-12-10 13:22:59', '2024-12-10 13:22:59'),
(4, 'App\\Models\\Unit', 2, 'uploads/unit_images/JcH5wB6QZPvnhveyFyZY6mQJKH5DxsSa9mGBEl83.png', '2024-12-10 13:22:59', '2024-12-10 13:22:59');

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
(15, '2024_12_08_125432_create_favorites_table', 1);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
(1, 'role-list', 'admin.roles.index', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(2, 'role-create', 'admin.roles.create', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(3, 'role-edit', 'admin.roles.edit', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(4, 'role-delete', 'admin.roles.destroy', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(5, 'admin-list', 'admin.show-admins', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(6, 'admin-create', 'admin.create-admin', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(7, 'admin-edit', 'admin.admins.edit', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(8, 'admin-delete', 'admin.delete-admin', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(9, 'admin-block', 'admin.block-admin', 'web', '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(10, 'user-list', 'admin.show-users', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(11, 'user-delete', 'admin.delete-user', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(12, 'user-detail', 'admin.details-user', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(13, 'user-block', 'admin.block-user', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(14, 'message-list', 'admin.show-message', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(15, 'message-delete', 'admin.delete-message', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(16, 'message-read', 'admin.read-message', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(17, 'category-list', 'admin.show-category', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(18, 'category-create', 'admin.store-category', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(19, 'category-update', 'admin.update-category', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(20, 'category-delete', 'admin.delete-category', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(21, 'feature-list', 'admin.show-feature', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(22, 'feature-create', 'admin.store-feature', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(23, 'feature-update', 'admin.update-feature', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(24, 'feature-delete', 'admin.delete-feature', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(25, 'unit-list', 'admin.show-unit', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(26, 'unit-create', 'admin.create-unit', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(27, 'unit-edit', 'admin.edit-unit', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(28, 'unit-delete', 'admin.delete-unit', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(29, 'unit-details', 'admin.show-details', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(30, 'unit-change-status', 'admin.change-status', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(31, 'booking-request-list', 'admin.show-booking-request', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(32, 'booking-request-details', 'admin.details-booking-request', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(33, 'booking-request-delete', 'admin.delete-booking-request', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(34, 'booking-request-change-status', 'admin.booking-change-status', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(35, 'booking-list', 'admin.show-booking', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(36, 'booking-details', 'admin.details-booking', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(37, 'booking-delete', 'admin.delete-booking', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(38, 'show-setting', 'admin.show-setting', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(39, 'update-setting', 'admin.update-setting', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'auth_token', '6efa2d84d5848f06b676d8bd1668631c8fcb4ba9fc55eeab23dd6b29e6adedbc', '[\"user\"]', '2024-12-10 13:33:58', NULL, '2024-12-10 13:14:53', '2024-12-10 13:33:58'),
(2, 'App\\Models\\User', 4, 'auth_token', '533205d21d80538b596449d3f6650a1dd72a4a6d45c1e4d7c76fecaf9c6089ea', '[\"user\"]', '2024-12-10 16:00:53', NULL, '2024-12-10 13:35:40', '2024-12-10 16:00:53');

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
(1, 'Admin', 'web', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(2, 'sub-admin', 'web', '2024-12-10 13:06:51', '2024-12-10 13:06:51');

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
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2);

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
('5aIGcQMyA620lknWnWlT94VuC4gsMWzK6xQkQ2wi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUVNelJjNW5yRGlvMEhNVEtJNmNsamh2ZlVjZWJlYzRPTVJmQTlaSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdG9yYWdlL3VwbG9hZHMvc2V0dGluZ3MvYUF3aFptVkZMUG9WWE1rWFBBTFZTQnBrYXQxbXVVMDlYZngwRk9Kdi5qcGciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fX0=', 1733939987),
('A6g5hxfsffe4FZ9NBW3SH0qCt5KShIb8oGJyanDz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSmd2Mk83Q25oT1dBN0pvdElXd0VxeTZjeThKYUUxUm5xRTZoc1owUCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3VuaXRzL2NyZWF0ZS11bml0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733950709),
('zyG6R4r5w7NbQHSpmUPz222lRIK0LvDxG7q5RVty', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZkR0dmtqbTRJNkVYajRRSG5xS2xWV3ducHZqZ2lkaWI1RDcyUmk0QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZW1iZXJzL2RldGFpbHMtdXNlci8zIjt9czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1733847093);

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
(1, 'site_name', 'Stark Brokers', 'general', 'text', 1, '2024-12-10 12:35:45', '2024-12-11 15:13:11'),
(2, 'site_logo', 'aAwhZmVFLPoVXMkXPALVSBpkat1muU09Xfx0FOJv.jpg', 'general', 'file', 1, '2024-12-10 12:35:45', '2024-12-10 12:50:43'),
(3, 'site_description', 'description', 'general', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(4, 'support_phone', 'support_phone', 'general', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(5, 'support_email', 'support_email@gmail.com', 'general', 'email', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(6, 'timezone', 'UTC', 'general', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(7, 'FaceBook', 'https://www.facebook.com/FaceBook', 'social_media', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(8, 'Instagram', 'https://instagram.com/starkbrokers', 'social_media', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(9, 'WhatsApp', 'https://wa.me/+966539313803', 'social_media', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(10, 'Twitter', 'https://x.com/starbrokers', 'social_media', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45'),
(11, 'LinkedIn', 'https://www.linkedin.com/company/stark-brokers', 'social_media', 'text', 1, '2024-12-10 12:35:45', '2024-12-10 12:35:45');

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

INSERT INTO `units` (`id`, `user_id`, `title`, `type`, `price`, `currency`, `description`, `address`, `area`, `number_bedroom`, `number_bathroom`, `is_booked`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'unit1', 'villa', '500000.00', 'SAR', 'new description', 'gada', '500', 5, 2, 1, 'accepted', '2024-12-10 13:22:59', '2024-12-10 13:57:17');

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
(17, 2, 3, NULL, NULL);

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
(1, 'Admin', 'admin', '+966539313803', 'admin@gmail.com', NULL, '$2y$12$GiYMg713fMMblXA9dKYm.O1D.5vxQCG0sX.hz.Otuh4URhuBlSJhK', 'admin', NULL, NULL, NULL, 'active', 'sSlrfFnCAmhn7iYJD9SG3K3Sb0n3THV0KXTNzWlVUemEMC5eeUo26feHvnRJ', '2024-12-10 12:35:46', '2024-12-10 12:35:46'),
(2, 'Kerry Goodman', 'rabawah', '+1 (286) 197-2139', 'kesuwureqe@mailinator.com', NULL, '$2y$12$8Tf7R2CwH12tbIipfvlyLOCXOndPYNj2pGC6aoFqwqZMimQvQ2GjG', 'admin', NULL, NULL, NULL, 'active', NULL, '2024-12-10 12:51:09', '2024-12-10 12:51:09'),
(3, 'owner1', 'owner', '+966550427014', 'owner@gmail.com', NULL, NULL, 'owner', 'my first business', '123565', 'my address', 'active', NULL, '2024-12-10 13:13:50', '2024-12-10 13:16:14'),
(4, 'renter', 'renter', '+966550427014', 'renter@gmail.com', NULL, NULL, 'renter', NULL, NULL, 'الرياض المملكه العربيه السعودية', 'active', NULL, '2024-12-10 13:35:07', '2024-12-10 13:35:40');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit_features`
--
ALTER TABLE `unit_features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
