-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 03:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edulearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`, `gender`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'araby', 'mohamed', 'admin@mail.com', '01114226509', 'Male', '1', '$2y$10$QvMkU//5vaABU8CHoBZ2zumcALTDEl3OAmT/g2EMOJYTrQTTJizne', 'hzuBo19nt2hRkbZSoPxQzRwkm4bYD6utvlsAPxnRHBH8YJyPfDqBajuGdofs', NULL, '2020-04-17 21:40:39'),
(2, 'amr', 'amr', 'gad', 'amr@mail.com', '01007008516', 'Male', '2', '$2y$10$FGdrHsn2r9JKuraNhsUTpe6Pj1vt/qY8PFnM18lhQIaIveTFc3xIW', 'hxSV86BCpprJHnqvvq4Ej3WopG6sxrBk69Jrh6eC8l4QNM3uWoUepoWWNEWu', '2020-04-12 21:33:01', '2020-04-12 21:33:01'),
(3, 'Mohamed', 'Mohamed', 'Zaki', 'mohamed@mail.com', '011144545445', 'Male', '2', '$2y$10$yusBKCU6gojwkdRBWg.zcu8jwVCGEDRzdTJ8TABDt.2ARZWopsOtK', NULL, '2020-04-12 21:34:56', '2020-04-12 21:34:56'),
(4, 'Razan', 'Razan', 'Samy', 'razan@mail.com', '0154545454', 'Male', '3', '$2y$10$CgHcecahblfi6Mo9aw58qeYwYy.wNhmzgc0jHdAaKVCEKbWhTx46O', 'XNxbdq4Hk7m9wcodHCbP2WJv8IH6myXa2oz0Pp4o9ExDuRcpxdN9fpUwVzVK', '2020-04-12 21:36:43', '2020-04-12 21:36:43'),
(5, 'Abeer', 'Abeer', 'Ali', 'abeer@mail.com', '4554454545', 'Female', '3', '$2y$10$mJiv6t.wJJSnPuVLz/fKmOcIhbfmrEQAteqEqVUYzmXuq3YlfgiCW', 'eJtAKseTgUbDrnCKAYAz2nvz81JR9dk8hjwtc6q3FRKSlpXKOyQZjbdQRPe8', '2020-04-12 21:37:18', '2020-04-22 18:36:08'),
(6, 'admin12', 'sdasd', 'udfuaoi', 'sadassa@mail.com', '45454545454542', 'Male', '2', '$2y$10$cA0/4nWMl9jxsB8u5cW9r.Twe6oTE4COBS6zhM7FMUBtNUT78iXpy', 'TRK5wiv7xoh1PBD9MkbNrDFbFSShn4cO0DsrQ5ec7m8rCRH7u39JXF3LjCmz', '2020-04-13 21:23:02', '2020-04-22 18:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `image`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL, 1, '2020-04-26 20:53:58', '2020-04-26 20:53:58'),
(3, 'Why do we use it?', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', '200426105502493861.jpg', 1, '2020-04-26 20:55:02', '2020-04-26 20:55:02'),
(4, 'WELCOME TO OUR UNIVERSITY', 'Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.', '20042811010385091.jpg', 1, '2020-04-28 11:10:10', '2020-04-28 11:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `title`, `file`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 'Exam 2012', '200506110841695606.pdf', 36, 10, '2020-05-06 21:08:41', '2020-05-06 21:08:41'),
(2, 'Exam 2013', '20050611091445999.pdf', 36, 10, '2020-05-06 21:09:14', '2020-05-06 21:09:14'),
(3, 'Exam 2014', '200506110935999407.pdf', 36, 12, '2020-05-06 21:09:35', '2020-05-06 21:09:35'),
(4, 'Exam 2015', '20050711214837069.pdf', 36, 12, '2020-05-06 21:09:54', '2020-05-06 23:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_table`
--

CREATE TABLE `lecture_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecture_table`
--

INSERT INTO `lecture_table` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Schedules', '20041613035392300.jpg', '2020-04-15 23:12:28', '2020-04-15 23:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(10) UNSIGNED NOT NULL,
  `lecture` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `lecture`, `file`, `content`, `subject_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lecture 1', '200503123608989858.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 10, 36, '2020-05-02 22:36:08', '2020-05-02 22:36:08'),
(2, 'Lecture 2', '200503123826836320.pdf', NULL, 10, 36, '2020-05-02 22:38:26', '2020-05-02 22:38:26'),
(3, 'Lecture 1', '200503102542401657.docx', NULL, 12, 36, '2020-05-03 20:09:46', '2020-05-03 20:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_user` int(10) UNSIGNED NOT NULL,
  `to_user` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `from_user`, `to_user`, `content`, `created_at`, `updated_at`) VALUES
(87, 36, 28, 'Hi', '2020-05-04 22:00:00', '2020-05-04 22:00:00'),
(88, 36, 28, 'How are You?', '2020-05-04 22:00:00', '2020-05-04 22:00:00'),
(89, 28, 36, 'I\'m fine', '2020-05-05 22:00:00', '2020-05-04 22:00:00'),
(90, 28, 36, 'And you?', '2020-05-05 22:00:00', '2020-05-04 22:00:00'),
(91, 36, 29, 'hi', '2020-05-01 22:00:00', '2020-05-05 22:00:00'),
(123, 36, 28, 'i\'m fine', '2020-05-11 23:12:11', '2020-05-11 23:12:11'),
(124, 28, 36, 'where\'s task', '2020-05-11 23:12:11', '2020-05-11 23:12:11'),
(125, 36, 33, 'Hi', '2020-05-11 23:15:24', '2020-05-11 23:15:24'),
(145, 29, 37, 'hi', '2020-05-16 18:51:25', '2020-05-16 18:51:25'),
(146, 36, 29, 'test', '2020-05-16 18:53:31', '2020-05-16 18:53:31'),
(147, 29, 37, 'How are you ?', '2020-05-16 19:08:53', '2020-05-16 19:08:53'),
(148, 29, 36, 'How are you ?', '2020-05-16 19:10:05', '2020-05-16 19:10:05'),
(149, 29, 36, 'doctor ?', '2020-05-18 16:47:35', '2020-05-18 16:47:35'),
(150, 36, 28, 'hi', '2020-05-22 18:46:36', '2020-05-22 18:46:36'),
(151, 36, 51, 'Hi How are you ?', '2020-05-22 18:46:56', '2020-05-22 18:46:56'),
(152, 28, 36, 'hi', '2020-05-22 18:56:56', '2020-05-22 18:56:56');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_11_27_211611_create_admins_table', 1),
(3, '2020_04_06_225831_create_users_table', 1),
(4, '2020_04_07_132349_create_student_table', 1),
(5, '2020_04_07_140434_create_table_professor', 1),
(6, '2020_04_07_141326_create_table_subject', 1),
(8, '2020_04_07_151923_create_table_task', 1),
(11, '2020_04_07_155541_create_table_score', 1),
(14, '2020_04_12_231522_create_lecture_table_table', 1),
(15, '2020_04_07_154212_create_table_exam', 2),
(16, '2020_04_12_231347_create_events_table', 3),
(17, '2020_04_28_121544_create_slider_table', 4),
(18, '2020_04_07_150234_create_table_material', 5),
(19, '2020_04_07_155902_create_table_question_bank', 6),
(20, '2020_05_08_001105_create_message_table', 7),
(21, '2020_04_07_152655_create_table_studen_task', 8);

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
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_degree` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `pro_degree`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', 36, '2020-04-13 22:58:53', '2020-04-13 22:58:53'),
(2, 'Mastr', 37, '2020-04-13 23:04:54', '2020-04-13 23:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`id`, `title`, `answer`, `subject_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 10, 36, '2020-05-05 21:10:09', '2020-05-05 21:10:09'),
(2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 10, 36, '2020-05-05 21:10:34', '2020-05-05 21:10:34'),
(3, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 12, 36, '2020-05-05 21:10:53', '2020-05-05 21:10:53'),
(4, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 12, 36, '2020-05-05 21:11:07', '2020-05-05 21:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `score`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(6, 40, 28, 10, '2020-04-30 22:00:00', '2020-05-14 21:26:01'),
(7, 0, 28, 11, '2020-04-30 22:00:00', NULL),
(8, 0, 28, 12, '2020-04-30 22:00:00', NULL),
(9, 0, 28, 14, '2020-04-30 22:00:00', NULL),
(10, 35, 29, 10, '2020-04-30 22:00:00', '2020-05-13 23:48:52'),
(11, 40, 33, 10, '2020-04-30 22:00:00', '2020-05-14 19:58:06'),
(12, 0, 29, 11, '2020-04-30 22:00:00', NULL),
(13, 0, 33, 11, '2020-04-30 22:00:00', NULL),
(14, 0, 29, 12, '2020-04-30 22:00:00', NULL),
(15, 0, 33, 12, '2020-04-30 22:00:00', NULL),
(16, 0, 29, 14, '2020-04-30 22:00:00', NULL),
(17, 0, 33, 14, '2020-04-30 22:00:00', NULL),
(18, 30, 46, 10, NULL, '2020-05-22 18:48:37'),
(19, 0, 46, 11, NULL, NULL),
(20, 0, 46, 12, NULL, NULL),
(21, 0, 46, 14, NULL, NULL),
(22, 60, 47, 10, NULL, '2020-05-22 18:48:54'),
(23, 0, 47, 11, NULL, NULL),
(24, 0, 47, 12, NULL, NULL),
(25, 0, 48, 10, NULL, NULL),
(26, 0, 48, 11, NULL, NULL),
(27, 0, 48, 12, NULL, NULL),
(28, 0, 48, 14, NULL, NULL),
(29, 0, 49, 10, NULL, NULL),
(30, 0, 49, 11, NULL, NULL),
(31, 0, 49, 12, NULL, NULL),
(32, 0, 49, 14, NULL, NULL),
(33, 0, 50, 10, NULL, NULL),
(34, 0, 50, 11, NULL, NULL),
(35, 0, 50, 12, NULL, NULL),
(36, 0, 50, 14, NULL, NULL),
(37, 60, 51, 10, NULL, '2020-05-22 18:49:04'),
(38, 0, 51, 11, NULL, NULL),
(39, 0, 51, 12, NULL, NULL),
(40, 0, 51, 14, NULL, NULL),
(41, 0, 47, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_title_1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_title_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `content`, `button_title_1`, `button_url_1`, `button_title_2`, `button_url_2`, `image`, `created_at`, `updated_at`) VALUES
(1, 'WELCOME TO OUR UNIVERSITY', 'Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.', 'READ MORE', 'http://localhost/edulearn/public/', 'GET STARTED NOW', 'http://localhost/edulearn/public/', '20042812029687743.jpg', '2020-04-28 11:20:29', '2020-04-28 11:20:29'),
(2, 'ARE YOU READY TO APPLY?', 'Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.', 'READ MORE', 'http://localhost/edulearn/public/', 'GET STARTED NOW', 'http://localhost/edulearn/public/', '20042812423658999.jpg', '2020-04-28 11:24:23', '2020-04-28 11:24:23'),
(3, 'ARE YOU READY TO APPLY?', 'Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.', 'READ MORE', 'http://localhost/edulearn/public/', 'GET STARTED NOW', 'http://localhost/edulearn/public/', '2004281252425819.jpg', '2020-04-28 11:25:24', '2020-04-28 11:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `stdNumber` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stdNumber`, `age`, `user_id`, `created_at`, `updated_at`) VALUES
(11, '202000001', 25, 28, '2020-04-13 13:17:37', '2020-04-13 21:55:56'),
(12, '202000002', 22, 29, '2020-04-13 13:22:40', '2020-04-13 13:22:40'),
(14, '202000004', 22, 33, '2020-04-13 21:05:45', '2020-04-13 21:05:45'),
(22, '202000005', 22, 46, '2020-05-22 17:56:02', '2020-05-22 17:56:02'),
(23, '202000006', 22, 47, '2020-05-22 17:57:47', '2020-05-22 17:57:47'),
(24, '202000007', 22, 48, '2020-05-22 17:58:54', '2020-05-22 17:58:54'),
(25, '202000008', 22, 49, '2020-05-22 18:00:28', '2020-05-22 18:00:28'),
(26, '202000009', 22, 50, '2020-05-22 18:02:04', '2020-05-22 18:02:04'),
(27, '202000010', 22, 51, '2020-05-22 18:04:04', '2020-05-22 18:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_task`
--

CREATE TABLE `student_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_task`
--

INSERT INTO `student_task` (`id`, `file`, `task_id`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(2, '20051640950580094.pdf', 6, 29, 12, '2020-05-16 14:09:50', '2020-05-16 14:09:50'),
(3, '20051641812709967.pdf', 2, 29, 10, '2020-05-16 14:18:12', '2020-05-16 14:18:12'),
(4, '20052285119865589.pdf', 2, 28, 10, '2020-05-22 18:51:19', '2020-05-22 18:51:19'),
(5, '200522851526278.pdf', 4, 28, 12, '2020-05-22 18:51:52', '2020-05-22 18:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `name`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 'SE001', 'Data Base 1', '20051651807645633.jpg', 36, '2020-04-15 21:42:16', '2020-05-16 15:18:07'),
(11, 'SE002', 'Data Base2', '20051651749155260.jpg', 37, '2020-04-15 21:42:38', '2020-05-16 15:17:49'),
(12, 'SE003', 'Java cs', '20051643738312482.jpg', 36, '2020-04-15 21:43:07', '2020-05-16 14:37:38'),
(14, 'SE004', 'UML', '20051643826398434.jpg', 37, '2020-04-22 18:47:37', '2020-05-16 14:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `file`, `content`, `end_date`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(2, 'assignment 1', '20050411149790814.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '01-06-2020', 36, 10, '2020-05-03 23:18:37', '2020-05-03 23:18:37'),
(3, 'assignment 2', '20050514607495600.pdf', NULL, '04-05-2020', 36, 12, '2020-05-04 20:47:07', '2020-05-04 20:47:07'),
(4, 'assignment 3', '20050515022451864.pdf', NULL, '04-05-2030', 36, 12, '2020-05-04 21:55:20', '2020-05-04 21:55:20'),
(5, 'assignment 1', '20050515059627326.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '01-06-2020', 36, 10, '2020-05-03 23:18:37', '2020-05-03 23:18:37'),
(6, 'assignment 3', '20050515113210770.pdf', NULL, '04-05-2030', 36, 12, '2020-05-04 21:55:20', '2020-05-04 21:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ssn` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ssn`, `first_name`, `last_name`, `email`, `phone`, `password`, `birthDate`, `address`, `gender`, `image`, `level`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, '29503220101933', 'Araby', 'Mohamed', 'araby@mail.com', '01114226509', '$2y$10$q/i.dnWMg/Fe3qlBIsCU0.zSWHKzwNGP8/AA2Zo7EmM.iWLvDPfdu', '1995-03-22', '12121212121', 'Male', '200414121300667765.jpg', '1', '5994a57122a870a5fed5fdfcccf1e49f50d5fd62', '7mjE6Xp6j4zuBYleIsYXq6OrcDboqfl0u9bVkvo13UYhTJGPDsvxv2pVmAig', '2020-04-13 13:17:37', '2020-05-22 18:59:28'),
(29, '29503220101931', 'Amr', 'Ahmed', 'amr@mail.com', '01026800286', '$2y$10$cQCI1AcrZOBY9FZNPsSaM.ByliLPpuLHuW5A7S.to1bLiAkdT1SkG', '1997-09-09', '11/3 elmaadi cairo', 'Female', '20052275232729430.jpg', '1', NULL, '4jjrHaayBLo9V5JlrJKJEMFaWsjF09Us4cjcH0jIWdoUgxesm4PSPHgboypo', '2020-04-13 13:22:40', '2020-05-22 17:52:32'),
(33, '29503220101935', 'Ahmed', 'Majid', 'ahmed_majid@amil.com', '01007008545', '123456', '1998-04-05', 'cairo - embaba', 'Male', '20052275427644039.jpg', '1', NULL, NULL, '2020-04-13 21:05:45', '2020-05-22 17:54:27'),
(36, '25003220101933', 'Mohamed', 'Zaki', 'mohamed_ahmed221@mailna.biz', '01114787878787', '$2y$10$a5GJYcDXRuP2mwKGs97a8.HbOUigSiBx4Hb7mp411js1nAUZtq/IO', '1970-07-22', 'Elmarg Cairo', 'Male', '20041412715344793.jpg', '2', 'a2aee97de9e8b2c859a9064b69ece9f0c3b89be7', 'rt2eGryzDD8BZYzqoCmhnqT9elgsrgRWbwE9xUPljAvXbj9wXtAqud0iDk5f', '2020-04-13 22:58:53', '2020-05-22 18:59:03'),
(37, '29575220101931', 'Ahmed', 'AbdElmonaem', 'ahmedabd@mail.com', '01114245484787', '$2y$10$AGf1ilWrsjpyilikgJm62O4hN/.Ld2NqdeNr8z/bGNd8BiWkOKPEi', '1997-05-01', 'Elmahla Elkobra', 'Male', '20041410454713687.PNG', '2', NULL, 'x1UAj8tZ6m2ohaNr1hO2ZzUzhIq4R3vbqCNBhAsF2cVMKpoHmz4q58Ft44Rd', '2020-04-13 23:04:54', '2020-04-13 23:04:54'),
(46, '29503220101212', 'Ahmed', 'Abdelmonem', 'ahmed94mohm@mozej.com', '01012121212121', '$2y$10$yyGO6WaL/2srkM3h7POM3emirdMrAvHVYYLa/nVgdOoIRppEYydHu', '1998-05-12', 'cairo - egypt', 'Male', '20052275602868899.jpg', '1', NULL, NULL, '2020-05-22 17:56:02', '2020-05-22 17:56:02'),
(47, '29503220120133', 'Abeer', 'Ali', 'abeer@mail.com', '01545457785754', '$2y$10$hW5o9lnt2b18g7Lab2df1OX0MpNqdqZgQIHObr68ZPLNG0p2gvLee', '1998-05-20', 'cairo - egypt', 'Male', '20052275747635752.jpg', '1', NULL, NULL, '2020-05-22 17:57:47', '2020-05-22 17:57:47'),
(48, '29503220102220', 'Razan', 'Mohsen', 'razan@mail.com', '01454578452454', '$2y$10$XC9plEHVbJZzG9e/jP5zWOnCYxJvAw9CBpNwKcUVobStvDJd08QNe', '1998-05-20', 'cairo - egypt', 'Male', '20052275854727127.jpg', '1', NULL, NULL, '2020-05-22 17:58:54', '2020-05-22 17:58:54'),
(49, '29503304101933', 'Mohamed', 'Rashad', 'm-Rashad@mail.com', '45471475475484', '$2y$10$BoOyC0xlK1Zsk862N5KNOOjBFhrh7ng9bwgTigR5bA0XW2YbI3EKm', '1998-05-05', 'cairo - egypt', 'Male', '20052280028248860.jpg', '1', NULL, NULL, '2020-05-22 18:00:28', '2020-05-22 18:00:28'),
(50, '29503220410933', 'Mostafa', 'Abdallah', 'mostaf@mail.com', '14548541587451', '$2y$10$CtlP0U6aeQgy34JKyrAC3OdFybx8UgQEgaP59E7OZXNmqzFdd1ZqK', '1998-05-20', 'cairo - egypt', 'Male', '20052280204790568.jpg', '1', NULL, NULL, '2020-05-22 18:02:04', '2020-05-22 18:02:04'),
(51, '29043220101933', 'Lobna', 'Nabil', 'lobna@mail.com', '05654857487887', '$2y$10$J3jyXZTHhtl0Y7thikeS0eMQrHYca8T.0uLaPOsiiwKCRns6XBj9q', '1998-05-18', 'cairo - egypt', 'Male', '20052280403579145.jpg', '1', NULL, NULL, '2020-05-22 18:04:03', '2020-05-22 18:04:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_user_id_foreign` (`user_id`),
  ADD KEY `exam_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `lecture_table`
--
ALTER TABLE `lecture_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_subject_id_foreign` (`subject_id`),
  ADD KEY `material_user_id_foreign` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_from_user_foreign` (`from_user`),
  ADD KEY `message_to_user_foreign` (`to_user`);

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
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_user_id_foreign` (`user_id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_bank_subject_id_foreign` (`subject_id`),
  ADD KEY `question_bank_user_id_foreign` (`user_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score_user_id_foreign` (`user_id`),
  ADD KEY `score_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_stdnumber_unique` (`stdNumber`),
  ADD KEY `student_user_id_foreign` (`user_id`),
  ADD KEY `stdNumber` (`stdNumber`);

--
-- Indexes for table `student_task`
--
ALTER TABLE `student_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_task_task_id_foreign` (`task_id`),
  ADD KEY `student_task_user_id_foreign` (`user_id`),
  ADD KEY `student_task_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_code_unique` (`code`),
  ADD KEY `subject_user_id_foreign` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_id_foreign` (`user_id`),
  ADD KEY `task_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ssn_unique` (`ssn`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lecture_table`
--
ALTER TABLE `lecture_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_task`
--
ALTER TABLE `student_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_to_user_foreign` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD CONSTRAINT `question_bank_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_bank_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_task`
--
ALTER TABLE `student_task`
  ADD CONSTRAINT `student_task_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_task_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_task_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
