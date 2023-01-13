-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 05:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Galib-Admin', 'rj.rafi35@gmail.com', NULL, '$2y$10$2wqQeps7Zoit8ivnodFmbODgAWiPsW9.K6gCAg78jxQdqTDqjnP6m', NULL, 'images/default.png', '2022-11-15 01:43:23', '2022-11-15 01:43:23'),
(2, 'Farhana-Admin', 'reserved@admin.com', NULL, '$2y$10$ddT4dyT5pI30GyBE6aphB.XNgP.FL.JcWQmJ7MpWOLf6NURxGozBy', NULL, 'images/default.png', '2022-11-15 02:15:54', '2022-11-15 02:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(10) NOT NULL,
  `student_id` bigint(10) NOT NULL,
  `date` date NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `date`, `attendance`, `updated_at`, `created_at`) VALUES
(28, 24, '2023-01-02', 0, '2023-01-02 06:37:58', '2023-01-02 06:36:50'),
(29, 25, '2023-01-02', 1, '2023-01-02 06:36:52', '2023-01-02 06:36:52'),
(33, 24, '2023-01-03', 1, '2023-01-03 05:22:26', '2023-01-03 05:22:26'),
(34, 24, '2023-10-25', 1, '2023-01-03 11:23:34', '2023-01-03 11:23:34'),
(35, 25, '2023-01-03', 1, '2023-01-03 05:26:40', '2023-01-03 05:26:40'),
(36, 24, '2023-01-03', 0, '2023-01-03 05:26:43', '2023-01-03 05:26:43'),
(37, 24, '2023-01-03', 0, '2023-01-03 05:26:47', '2023-01-03 05:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) NOT NULL,
  `name` varchar(2) NOT NULL,
  `score` int(5) NOT NULL,
  `comment` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `score`, `comment`, `updated_at`, `created_at`) VALUES
(1, 'A+', 80, 'Excellent', '2023-01-11 08:42:55', '2023-01-11 08:42:55'),
(2, 'A', 70, 'Very Good', '2023-01-11 08:42:55', '2023-01-11 08:42:55'),
(3, 'A-', 60, 'Good', '2023-01-11 08:42:55', '2023-01-11 08:42:55'),
(4, 'B', 50, 'Satisfactory', '2023-01-11 08:42:55', '2023-01-11 08:42:55'),
(5, 'C', 40, 'Unsatisfactory', '2023-01-11 04:18:05', '2023-01-11 08:42:55'),
(6, 'F', 0, 'Fail', '2023-01-11 08:45:45', '2023-01-11 08:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2022_11_15_044214_create_admins_table', 2),
(7, '2014_10_12_000000_create_users_table', 3),
(8, '2014_10_12_100000_create_password_resets_table', 3),
(9, '2019_08_19_000000_create_failed_jobs_table', 3),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(11, '2022_11_16_064927_create_permission_tables', 3),
(12, '2022_11_15_044214_create_students_table', 4),
(13, '2022_11_15_044214_create_teachers_table', 5),
(14, '2022_11_15_044214_create_stuffs_table', 6),
(15, '2022_11_15_044214_create_parents_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `cq` int(3) DEFAULT NULL,
  `mcq` int(3) DEFAULT NULL,
  `practical` int(3) DEFAULT NULL,
  `grand_total` tinyint(1) DEFAULT 0,
  `total` int(10) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `section_id`, `subject_id`, `year`, `type`, `cq`, `mcq`, `practical`, `grand_total`, `total`, `grade`, `updated_at`, `created_at`) VALUES
(11, 25, 12, 7, 2023, 'final', 46, NULL, NULL, 0, 46, NULL, '2023-01-13 07:23:42', '2023-01-13 07:23:42'),
(13, 25, 12, 11, 2023, 'final', 54, 25, NULL, 0, 79, NULL, '2023-01-13 07:24:22', '2023-01-13 07:24:22'),
(20, 24, 12, NULL, 2023, 'final', NULL, NULL, NULL, 1, 308, NULL, '2023-01-13 10:13:53', '2023-01-13 08:21:58'),
(21, 25, 12, 12, 2023, 'final', 67, 21, NULL, 0, 88, NULL, '2023-01-13 08:22:42', '2023-01-13 08:22:42'),
(22, 25, 12, NULL, 2023, 'final', NULL, NULL, NULL, 1, 299, NULL, '2023-01-13 08:28:27', '2023-01-13 08:22:42'),
(23, 24, 12, 13, 2023, 'final', 98, NULL, NULL, 0, 98, NULL, '2023-01-13 08:25:56', '2023-01-13 08:25:56'),
(24, 25, 12, 13, 2023, 'final', 86, NULL, NULL, 0, 86, NULL, '2023-01-13 08:28:27', '2023-01-13 08:28:27'),
(25, 24, 12, 7, 2023, 'final', 42, NULL, NULL, 0, 42, NULL, '2023-01-13 08:28:48', '2023-01-13 08:28:48'),
(26, 24, 12, 11, 2023, 'final', 61, 23, NULL, 0, 84, NULL, '2023-01-13 08:29:19', '2023-01-13 08:29:19'),
(27, 24, 12, 12, 2023, 'final', 61, 23, NULL, 0, 84, 'A+', '2023-01-13 10:13:53', '2023-01-13 10:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) NOT NULL,
  `class` int(10) NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start_time` time(6) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `class`, `section_id`, `subject_id`, `day`, `start_time`, `updated_at`, `created_at`) VALUES
(29, 3, 3, 1, 'Sunday', '14:00:00.000000', '2022-12-27 05:49:51', '2022-12-27 05:49:51'),
(30, 3, 3, 3, 'Thursday', '14:00:00.000000', '2022-12-27 05:49:57', '2022-12-27 05:49:57'),
(31, 3, 1, 1, 'Thursday', '07:00:00.000000', '2022-12-27 23:15:17', '2022-12-27 23:15:17'),
(32, 3, 1, 1, 'Wednesday', '07:00:00.000000', '2022-12-27 23:17:48', '2022-12-27 23:17:48'),
(33, 3, 1, 3, 'Tuesday', '11:00:00.000000', '2022-12-27 23:19:51', '2022-12-27 23:19:51'),
(34, 3, 1, 1, 'Friday', '07:00:00.000000', '2022-12-27 23:26:25', '2022-12-27 23:26:25'),
(35, 3, 4, 3, 'Tuesday', '07:00:00.000000', '2022-12-27 23:36:05', '2022-12-27 23:36:05'),
(36, 3, 4, 1, 'Tuesday', '08:00:00.000000', '2022-12-27 23:37:24', '2022-12-27 23:37:24'),
(37, 3, 3, 3, 'Sunday', '07:00:00.000000', '2022-12-28 00:29:37', '2022-12-28 00:29:37'),
(38, 10, 13, 4, 'Monday', '07:00:00.000000', '2022-12-28 00:32:31', '2022-12-28 00:32:31'),
(39, 10, 13, 4, 'Wednesday', '07:00:00.000000', '2022-12-28 00:32:42', '2022-12-28 00:32:42'),
(41, 8, 12, 7, 'Saturday', '07:30:00.000000', '2022-12-29 02:57:03', '2022-12-29 02:57:03'),
(42, 8, 12, 8, 'Saturday', '08:15:00.000000', '2022-12-29 02:57:28', '2022-12-29 02:57:28'),
(43, 8, 12, 9, 'Saturday', '09:00:00.000000', '2022-12-29 02:57:52', '2022-12-29 02:57:52'),
(44, 8, 12, 10, 'Saturday', '09:45:00.000000', '2022-12-29 02:58:21', '2022-12-29 02:58:21'),
(45, 8, 12, 11, 'Saturday', '10:45:00.000000', '2022-12-29 02:58:35', '2022-12-29 02:58:35'),
(46, 8, 12, 12, 'Saturday', '11:30:00.000000', '2022-12-29 02:59:06', '2022-12-29 02:59:06'),
(47, 8, 12, 13, 'Saturday', '12:15:00.000000', '2022-12-29 02:59:31', '2022-12-29 02:59:31'),
(48, 8, 12, 14, 'Sunday', '13:15:00.000000', '2022-12-29 02:59:51', '2022-12-29 02:59:51'),
(49, 8, 12, 7, 'Sunday', '07:00:00.000000', '2022-12-29 03:00:19', '2022-12-29 03:00:19'),
(50, 3, 1, 1, 'Sunday', '10:00:00.000000', '2022-12-31 02:46:32', '2022-12-31 02:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` bigint(10) NOT NULL,
  `teacher_id` bigint(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `class`, `teacher_id`, `updated_at`, `created_at`) VALUES
(1, 'Saturn', 3, 7, '2022-12-18 01:05:26', '2022-12-04 03:37:24'),
(2, 'Lili', 4, 6, '2022-12-18 01:05:31', '2022-12-04 03:51:12'),
(3, 'Earth', 3, 6, '2022-12-18 01:05:35', '2022-12-04 03:51:41'),
(4, 'Mars', 3, 7, '2022-12-18 01:05:50', '2022-12-04 04:29:17'),
(9, 'Banana', 6, 6, '2022-12-18 01:05:18', '2022-12-07 03:03:28'),
(10, 'Proton', 10, 6, '2022-12-18 01:08:03', '2022-12-18 01:07:51'),
(11, 'Electron', 10, 8, '2022-12-22 01:01:59', '2022-12-20 03:09:59'),
(12, 'Uranus', 8, 6, '2023-01-03 03:02:48', '2022-12-20 23:06:22'),
(13, 'Neutron', 10, 8, '2022-12-22 03:33:59', '2022-12-22 03:33:59'),
(14, 'Mango', 9, 7, '2022-12-24 02:35:59', '2022-12-24 02:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `year`, `status`, `updated_at`, `created_at`) VALUES
(1, 'mid_result_uploading_permission', 2023, 0, '2023-01-07 02:27:01', '2023-01-04 08:18:58'),
(2, 'final_result_uploading_permission', 2023, 1, '2023-01-07 02:26:59', '2023-01-04 08:55:42'),
(3, 'test_result_uploading_permission', 2022, 0, '2023-01-05 02:14:24', '2023-01-04 08:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_profession` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_nid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_nid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_guardian_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_guardian_contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` int(10) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `class_roll` int(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `username`, `email`, `birth_certificate_number`, `present_address`, `permanent_address`, `birth_date`, `gender`, `religion`, `blood_group`, `father_name`, `father_contact`, `father_profession`, `father_nid`, `mother_name`, `mother_contact`, `mother_profession`, `mother_nid`, `local_guardian_name`, `local_guardian_contact`, `father_image`, `mother_image`, `student_image`, `class`, `section_id`, `status`, `class_roll`, `email_verified_at`, `password`, `parent_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'Farhana Akter', 'farhana_akter052', NULL, '54546546545545', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', '2022-02-23', 'Female', 'Islam', 'B+', 'Dewan Lutfur Rahman', '01747371076', NULL, '132546981356', 'Salma Begum', '01747371076', NULL, '151325464681', 'Dewan Lutfur Rahman', '01747371076', 'student_images/mQ2o3gPBneBmRGoMequfLgkK7f5W1BdFsGdgxP33.png', 'student_images/nBWkRo8Y5zsZrAD2KIfXXIRl3jVpQ4oZOg3rjLiL.png', 'student_images/FP4HHbGrYEShd4K5g7JgbzVWIpfuKiMI8L7QbNn3.png', 8, 12, 1, 2, NULL, '$2y$10$w0U3nxCyOv1jZiLxO9T1L./AfoZCbsk5X43.2WOldjXY6BkyGl0ya', 5, NULL, '2022-11-27 01:19:09', '2022-11-27 01:19:09'),
(25, 'Faaris', 'faaris106', NULL, '132546813212', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', '2022-12-13', 'Male', 'Islam', 'B+', 'Galib Jaman', '01766555213', NULL, '5451321321321', 'Farhana Akter', '01766555213', NULL, '3541231321321', 'Galib Jaman', '01766555213', 'student_images/T6bjTkPEIH0BqhY2C62VIR3J1r8eCXtkhag950i4.png', 'student_images/ZqZnpJ2rWWkFbo6X6LvJ6MljFEpKIT9xtSg2i1sV.png', 'student_images/XNNXVRccegUu6r23E6MPyYM20JL1MyURP4vvFYKj.png', 8, 12, 1, 6, NULL, '$2y$10$kVQIGAM36uvWgq0P8WtuQu8ADEnXteYLbhC9aDCPydP5mHt.7QybG', 6, NULL, '2022-12-22 01:54:02', '2022-12-22 01:54:02'),
(26, 'Shawal Rahman', 'shawal_rahman37', NULL, '111321321325', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', '2008-01-08', 'Male', 'Islam', 'B+', 'Goku', '01766635213', NULL, '54654654654546', 'Shakura', '01766635213', NULL, '54685465465464', 'Goku', '01766635213', 'student_images/dPkuVL6i3kLRC0lAogA5DamCOE0AMqymeNvlauUB.png', 'student_images/GXB23BrAw6laqD78cbwMbtX2djdt4NUG71ONLOFf.png', 'student_images/OHD9TiszKXwjWsXCxdjbQbibnhGtKcOo61ARnawA.png', 3, 1, 1, 7, NULL, '$2y$10$ogq75jODSAqObxCS96WQieFCDmCaEDuNc.5N3heCdrG9sauqwOeq.', 7, NULL, '2023-01-07 02:47:34', '2023-01-07 02:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_parents`
--

CREATE TABLE `student_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_parents`
--

INSERT INTO `student_parents` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Abu Saleh', NULL, '01717044904', NULL, '$2y$10$iyaGT7az9wrjMeNHhyc5fewI3Eor0koBu2l/z.t9M8P26kDelqnUO', NULL, '2022-11-26 03:37:08', '2022-11-26 03:37:08'),
(5, 'Dewan Lutfur Rahman', NULL, '01747371076', NULL, '$2y$10$y7pLfAnscBJSkMllc4mX7uLOF15tQh/8QFmnfb7OT43o2Qn08biSu', NULL, '2022-11-27 01:19:09', '2022-11-27 01:19:09'),
(6, 'Galib Jaman', NULL, '01766555213', NULL, '$2y$10$Lxtj.ffTcN1LNzBFri.Zx.5Vz4sfBiE1uTp07XP6jnfQ88kx3YRN.', NULL, '2022-12-22 01:54:02', '2022-12-22 01:54:02'),
(7, 'Goku', NULL, '01766635213', NULL, '$2y$10$I6.M7hoErV62.bm4jX8qzO/X70GM53LZWWRDkWUgecDbCr57WEh6u', NULL, '2023-01-07 02:47:34', '2023-01-07 02:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `stuffs`
--

CREATE TABLE `stuffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stuffs`
--

INSERT INTO `stuffs` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Galib stuff', 'gj.emon35@gmail.com', NULL, '$2y$10$bHx.fmHGq8Jx5agPMkWGuejlzzfULnCVNXcLV6.z.jap9omgwQtKO', NULL, '2022-11-17 02:59:01', '2022-11-17 02:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `cq` int(11) DEFAULT NULL,
  `mcq` int(11) DEFAULT NULL,
  `practical` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `class`, `total_marks`, `cq`, `mcq`, `practical`, `created_at`, `updated_at`) VALUES
(1, 'English', 3, 100, 100, 0, 0, '2022-12-18 02:23:47', '2023-01-03 23:49:06'),
(2, 'Bangla', 6, 100, 70, 30, 0, '2022-12-18 02:34:19', '2023-01-04 01:29:49'),
(3, 'English 2nd Paper', 3, 100, 100, 0, 0, '2022-12-18 02:53:19', '2023-01-04 01:31:13'),
(4, 'Biology', 10, 0, 1, NULL, NULL, '2022-12-19 03:04:39', '2022-12-19 03:04:39'),
(5, 'রসায়ন', 10, 0, 1, NULL, NULL, '2022-12-19 03:05:12', '2022-12-19 03:05:12'),
(6, 'পদার্থবিদ্যা', 10, 0, 1, NULL, NULL, '2022-12-19 03:05:32', '2022-12-19 03:05:32'),
(7, 'আনন্দ পাঠ', 8, 50, 50, 0, 0, '2022-12-29 02:54:01', '2023-01-07 02:36:53'),
(8, 'বাংলা ব্যকরণ ও নির্মিতি', 8, 0, 1, NULL, NULL, '2022-12-29 02:54:13', '2022-12-29 02:54:13'),
(9, 'কৃষি শিক্ষা', 8, 0, 1, NULL, NULL, '2022-12-29 02:54:27', '2022-12-29 02:54:27'),
(10, 'শারীরিক শিক্ষা ও স্বাস্থ্য', 8, 0, 1, NULL, NULL, '2022-12-29 02:54:38', '2022-12-29 02:54:38'),
(11, 'ইসলাম ও নৈতিক শিক্ষা', 8, 100, 70, 30, 0, '2022-12-29 02:54:52', '2023-01-03 23:53:29'),
(12, 'বিজ্ঞান', 8, 100, 70, 30, 0, '2022-12-29 02:55:06', '2023-01-13 08:11:11'),
(13, 'English Grammer', 8, 100, 100, 0, 0, '2022-12-29 02:56:06', '2023-01-13 08:10:53'),
(14, 'English for Today', 8, 0, 1, NULL, NULL, '2022-12-29 02:56:19', '2022-12-29 02:56:19'),
(15, 'তথ্য ও যোগাযোগ প্রযুক্তি', 8, 0, 1, NULL, NULL, '2022-12-29 02:56:32', '2022-12-29 02:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` bigint(20) NOT NULL,
  `class` int(10) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_teachers`
--

INSERT INTO `subject_teachers` (`id`, `class`, `subject_id`, `teacher_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 6, 1, '2022-12-19 03:04:10', '2022-12-19 03:04:10'),
(2, 10, 5, 8, 10, '2022-12-19 03:05:52', '2022-12-31 02:07:48'),
(4, 10, 6, 6, 10, '2022-12-19 03:07:34', '2022-12-19 03:07:34'),
(6, 10, 4, 6, 10, '2022-12-19 03:26:03', '2022-12-19 03:26:03'),
(7, 3, 1, 7, 4, '2022-12-20 01:52:18', '2022-12-20 01:52:18'),
(8, 10, 6, 6, 11, '2022-12-20 03:10:23', '2022-12-20 03:11:49'),
(9, 10, 5, 8, 11, '2022-12-20 23:07:05', '2022-12-20 23:07:58'),
(10, 8, 7, 6, 12, '2022-12-29 03:23:04', '2022-12-29 03:23:04'),
(11, 3, 3, 6, 1, '2022-12-29 03:51:09', '2022-12-29 03:51:09'),
(12, 8, 11, 6, 12, '2023-01-06 23:00:15', '2023-01-06 23:00:15'),
(13, 8, 12, 6, 12, '2023-01-13 08:11:26', '2023-01-13 08:11:26'),
(14, 8, 13, 6, 12, '2023-01-13 08:11:35', '2023-01-13 08:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nid_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `nid_number`, `phone_number`, `birth_date`, `religion`, `gender`, `blood_group`, `present_address`, `permanent_address`, `major`, `education`, `name`, `email`, `email_verified_at`, `password`, `teacher_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, '5461256254', '01766555213', '1996-08-28', 'Islam', 'Male', 'B+', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', 'science', 'M.Sc', 'Galib Jaman', NULL, NULL, '$2y$10$ZrwA1r5qrLOur4PYP2ZhWubiPdg0CK9obaOF6Uu44XNbe2tFFnyp.', 'teacher_image/EBrk3XDXzWH5Y03jOvc2QavWIsmYR2HuB27qY0Tz.jpg', NULL, '2022-12-04 02:52:53', '2022-12-04 02:52:53'),
(7, '829232233232', '01766555212', '1993-10-19', 'Islam', 'Male', 'A+', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', 'arts', 'MA', 'Muhammad', NULL, NULL, '$2y$10$MEHUjVVMG8u5aoU2N1qqOeRiaCzm2sK8NgnZCUn8zXKw7nI2yHCdK', 'teacher_image/JHf5HPjQY994NI5leHpxZj7YNNZNhu1Tnd5yQH7W.jpg', NULL, '2022-12-18 00:42:29', '2022-12-18 00:42:29'),
(8, '81154612124512', '01747371076', '2016-04-15', 'Islam', 'Female', 'B+', 'Aliqua Ea qui asper', 'Aliqua Ea qui asper', 'science', 'M.Sc', 'Farhana Akter', NULL, NULL, '$2y$10$u1Ld8xC2n4vZ8m6o4tL1zepRJmnem/C6lS4IxHC7cqGqZguPFwm46', 'teacher_image/c21uuUuTNXezjHlO1voztqisQdz5AVZMSG4D3X9f.png', NULL, '2022-12-20 23:06:03', '2022-12-20 23:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student_parents`
--
ALTER TABLE `student_parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_email_unique` (`email`);

--
-- Indexes for table `stuffs`
--
ALTER TABLE `stuffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stuffs_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_parents`
--
ALTER TABLE `student_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stuffs`
--
ALTER TABLE `stuffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
