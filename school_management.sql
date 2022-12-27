-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 12:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Galib-Admin', 'rj.rafi35@gmail.com', NULL, '$2y$10$2wqQeps7Zoit8ivnodFmbODgAWiPsW9.K6gCAg78jxQdqTDqjnP6m', NULL, '2022-11-15 01:43:23', '2022-11-15 01:43:23'),
(2, 'Farhana-Admin', 'reserved@admin.com', NULL, '$2y$10$ddT4dyT5pI30GyBE6aphB.XNgP.FL.JcWQmJ7MpWOLf6NURxGozBy', NULL, '2022-11-15 02:15:54', '2022-11-15 02:15:54');

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
(13, 3, 1, 1, 'Saturday', '07:00:00.000000', '2022-12-27 04:40:54', '2022-12-27 04:40:54'),
(26, 3, 3, 3, 'Saturday', '07:04:00.000000', '2022-12-27 05:28:32', '2022-12-27 05:28:32'),
(27, 10, 13, 4, 'Saturday', '07:00:00.000000', '2022-12-27 05:31:53', '2022-12-27 05:31:53');

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
(12, 'Uranus', 8, 8, '2022-12-20 23:06:22', '2022-12-20 23:06:22'),
(13, 'Neutron', 10, 8, '2022-12-22 03:33:59', '2022-12-22 03:33:59'),
(14, 'Mango', 9, 7, '2022-12-24 02:35:59', '2022-12-24 02:35:59');

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
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
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
(23, 'Galib Jaman', 'galib_jaman0501', NULL, '54546546545468', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', '2022-02-23', 'Male', 'Islam', 'B+', 'Abu Saleh', '01717044904', NULL, '132546981356', 'Anjumanara Begum', '01712923016', NULL, '151325464681', 'Abu Saleh', '01717044904', 'student_images/tfhU2gAMmbVKdSfSCdO0Tma2JEnbgcqBaODMCC4m.jpg', 'student_images/rJiWhosQNJ4DcENKS8g1CNjV8DE9CtAJkLIPbZS3.jpg', 'student_images/1STjc1xAMPJgnisTeyadN2xVDiK4zYbbP3w86DGL.jpg', 5, 12, 'active', 1, NULL, '$2y$10$NscYa38QsaWbceN6tRZQSu29XediIZL.0ljcrKR0ctHltcKgAq1o.', 4, NULL, '2022-11-27 01:16:59', '2022-11-27 01:16:59'),
(24, 'Farhana Akter', 'farhana_akter052', NULL, '54546546545545', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', '2022-02-23', 'Female', 'Islam', 'B+', 'Dewan Lutfur Rahman', '01747371076', NULL, '132546981356', 'Salma Begum', '01747371076', NULL, '151325464681', 'Dewan Lutfur Rahman', '01747371076', 'student_images/mQ2o3gPBneBmRGoMequfLgkK7f5W1BdFsGdgxP33.png', 'student_images/nBWkRo8Y5zsZrAD2KIfXXIRl3jVpQ4oZOg3rjLiL.png', 'student_images/FP4HHbGrYEShd4K5g7JgbzVWIpfuKiMI8L7QbNn3.png', 5, 12, 'active', 2, NULL, '$2y$10$w0U3nxCyOv1jZiLxO9T1L./AfoZCbsk5X43.2WOldjXY6BkyGl0ya', 5, NULL, '2022-11-27 01:19:09', '2022-11-27 01:19:09'),
(25, 'Faaris', 'faaris106', NULL, '132546813212', 'N.H Complex, Police Lines, Barishal', 'N.H Complex, Police Lines, Barishal', '2022-12-13', 'Male', 'Islam', 'B+', 'Galib Jaman', '01766555213', NULL, '5451321321321', 'Farhana Akter', '01766555213', NULL, '3541231321321', 'Galib Jaman', '01766555213', 'student_images/T6bjTkPEIH0BqhY2C62VIR3J1r8eCXtkhag950i4.png', 'student_images/ZqZnpJ2rWWkFbo6X6LvJ6MljFEpKIT9xtSg2i1sV.png', 'student_images/XNNXVRccegUu6r23E6MPyYM20JL1MyURP4vvFYKj.png', 10, 11, 'active', 6, NULL, '$2y$10$kVQIGAM36uvWgq0P8WtuQu8ADEnXteYLbhC9aDCPydP5mHt.7QybG', 6, NULL, '2022-12-22 01:54:02', '2022-12-22 01:54:02');

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
(6, 'Galib Jaman', NULL, '01766555213', NULL, '$2y$10$Lxtj.ffTcN1LNzBFri.Zx.5Vz4sfBiE1uTp07XP6jnfQ88kx3YRN.', NULL, '2022-12-22 01:54:02', '2022-12-22 01:54:02');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `class`, `created_at`, `updated_at`) VALUES
(1, 'English', 3, '2022-12-18 02:23:47', '2022-12-18 02:51:13'),
(2, 'Bangla', 6, '2022-12-18 02:34:19', '2022-12-18 02:50:39'),
(3, 'English 2nd Paper', 3, '2022-12-18 02:53:19', '2022-12-18 02:53:19'),
(4, 'Biology', 10, '2022-12-19 03:04:39', '2022-12-19 03:04:39'),
(5, 'রসায়ন', 10, '2022-12-19 03:05:12', '2022-12-19 03:05:12'),
(6, 'পদার্থবিদ্যা', 10, '2022-12-19 03:05:32', '2022-12-19 03:05:32');

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
(2, 10, 5, 7, 10, '2022-12-19 03:05:52', '2022-12-19 03:05:52'),
(3, 10, 5, 6, 10, '2022-12-19 03:07:06', '2022-12-19 03:07:06'),
(4, 10, 6, 6, 10, '2022-12-19 03:07:34', '2022-12-19 03:07:34'),
(6, 10, 4, 6, 10, '2022-12-19 03:26:03', '2022-12-19 03:26:03'),
(7, 3, 1, 7, 4, '2022-12-20 01:52:18', '2022-12-20 01:52:18'),
(8, 10, 6, 6, 11, '2022-12-20 03:10:23', '2022-12-20 03:11:49'),
(9, 10, 5, 8, 11, '2022-12-20 23:07:05', '2022-12-20 23:07:58');

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_parents`
--
ALTER TABLE `student_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stuffs`
--
ALTER TABLE `stuffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
