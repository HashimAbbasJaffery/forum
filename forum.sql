-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 12:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Questor', NULL, NULL),
(2, 'Master', NULL, NULL),
(3, 'Guru', NULL, NULL),
(4, 'Mastermind', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tech', 'tech', NULL, NULL),
(2, 'Gardening', 'gardening', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `hearts` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `question_id`, `description`, `upvotes`, `downvotes`, `hearts`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '<p>Go at servive provider and type printf(\"lol\")</p>', 0, 0, 0, 1, '2003-03-10 10:00:00', NULL),
(2, 2, 4, '<p>Here I am again</p>', 0, 0, 1000, 1, NULL, NULL),
(3, 7, 1, 'It is weird comment.... lol', 0, 0, 0, 1, '2022-12-17 01:50:39', '2022-12-17 01:50:39'),
(4, 7, 1, 'What do you mean?', 0, 0, 0, 1, '2022-12-17 01:53:29', '2022-12-17 01:53:29'),
(5, 8, 2, 'Ohhh... that\'s the second question', 0, 0, 0, 1, '2022-12-25 18:50:47', '2022-12-25 18:50:47'),
(6, 8, 17, 'WTH ITS VERY EZ NOOOB', 0, 0, 0, 1, '2022-12-26 19:21:34', '2022-12-26 19:21:34'),
(7, 8, 20, 'No.... The slug is not mutated... Because hashim failed to do so...', 0, 0, 0, 1, '2022-12-27 15:03:27', '2022-12-27 15:03:27'),
(8, 8, 3, 'I literally don\'t know the answer :\' (', 0, 0, 0, 1, '2023-01-31 12:11:23', '2023-01-31 12:11:23'),
(9, 9, 5, 'My name is tanzu banzu', 0, 0, 0, 1, '2023-02-01 06:24:47', '2023-02-01 06:24:47'),
(10, 8, 24, 'I don\'t understand the purpose either', 0, 0, 0, 1, '2023-02-01 13:56:33', '2023-02-01 13:56:33'),
(11, 9, 5, 'Look.... I have profile picture', 0, 0, 0, 1, '2023-02-04 03:56:26', '2023-02-04 03:56:26'),
(12, 8, 5, 'The another comment', 0, 0, 0, 1, '2023-02-04 05:37:41', '2023-02-04 05:37:41'),
(13, 8, 5, 'The another comment', 0, 0, 0, 1, '2023-02-04 05:39:45', '2023-02-04 05:39:45'),
(14, 8, 5, 'The another comment', 0, 0, 0, 1, '2023-02-04 05:40:09', '2023-02-04 05:40:09'),
(15, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:41:37', '2023-02-04 05:41:37'),
(16, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:42:46', '2023-02-04 05:42:46'),
(17, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:45:00', '2023-02-04 05:45:00'),
(18, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:46:28', '2023-02-04 05:46:28'),
(19, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:47:03', '2023-02-04 05:47:03'),
(20, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:47:20', '2023-02-04 05:47:20'),
(21, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:47:50', '2023-02-04 05:47:50'),
(22, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:48:47', '2023-02-04 05:48:47'),
(23, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:51:35', '2023-02-04 05:51:35'),
(24, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:53:36', '2023-02-04 05:53:36'),
(25, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:56:08', '2023-02-04 05:56:08'),
(26, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:57:44', '2023-02-04 05:57:44'),
(27, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:57:56', '2023-02-04 05:57:56'),
(28, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 05:58:33', '2023-02-04 05:58:33'),
(29, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 06:05:29', '2023-02-04 06:05:29'),
(30, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 06:05:39', '2023-02-04 06:05:39'),
(31, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 06:06:18', '2023-02-04 06:06:18'),
(32, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 06:06:26', '2023-02-04 06:06:26'),
(33, 8, 5, 'Checking events', 0, 0, 0, 1, '2023-02-04 06:06:38', '2023-02-04 06:06:38'),
(34, 9, 17, 'Did you get notification?', 0, 0, 0, 1, '2023-02-04 06:32:56', '2023-02-04 06:32:56'),
(35, 9, 24, 'I am commenting myself', 0, 0, 0, 1, '2023-02-04 12:50:40', '2023-02-04 12:50:40'),
(36, 8, 24, 'Yes, I know', 0, 0, 0, 1, '2023-02-04 12:51:37', '2023-02-04 12:51:37'),
(37, 8, 24, 'with little tweaks', 0, 0, 0, 1, '2023-02-04 12:53:26', '2023-02-04 12:53:26'),
(38, 8, 24, 'with little tweaks', 0, 0, 0, 1, '2023-02-04 12:53:48', '2023-02-04 12:53:48'),
(39, 8, 24, 'with little tweaks', 0, 0, 0, 1, '2023-02-04 12:55:55', '2023-02-04 12:55:55'),
(40, 8, 24, 'with little tweaks', 0, 0, 0, 1, '2023-02-04 12:56:25', '2023-02-04 12:56:25'),
(41, 8, 24, 'with little tweaks', 0, 0, 0, 1, '2023-02-04 12:56:54', '2023-02-04 12:56:54'),
(42, 8, 24, 'with little tweaks', 0, 0, 0, 1, '2023-02-04 12:57:04', '2023-02-04 12:57:04'),
(43, 8, 24, 'with strong', 0, 0, 0, 1, '2023-02-04 12:58:59', '2023-02-04 12:58:59'),
(44, 8, 24, 'with minor changes', 0, 0, 0, 1, '2023-02-04 13:00:09', '2023-02-04 13:00:09'),
(45, 8, 24, 'again minor changes', 0, 0, 0, 1, '2023-02-04 13:01:26', '2023-02-04 13:01:26'),
(46, 8, 24, 'probably last change', 0, 0, 0, 1, '2023-02-04 13:03:31', '2023-02-04 13:03:31'),
(47, 8, 24, 'prolly it\'s last', 0, 0, 0, 1, '2023-02-04 13:04:16', '2023-02-04 13:04:16'),
(48, 8, 24, 'It\'s again', 0, 0, 0, 1, '2023-02-04 13:27:20', '2023-02-04 13:27:20'),
(49, 10, 112, 'It is my first ever comment', 0, 0, 0, 1, '2023-02-09 10:13:36', '2023-02-09 10:13:36'),
(50, 11, 120, 'I have found out what is the shopify :D', 0, 0, 0, 1, '2023-08-10 16:48:21', '2023-08-10 16:48:21'),
(51, 12, 120, 'Good man....', 0, 0, 0, 1, '2023-08-10 17:02:00', '2023-08-10 17:02:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_13_142021_create_categories_table', 1),
(6, '2022_12_13_142054_create_question_table', 1),
(7, '2022_12_13_143449_create_comments_table', 1),
(8, '2022_12_13_143923_create_replies_table', 1),
(9, '2022_12_13_162427_create_tags_table', 1),
(10, '2022_12_13_162523_create_question_tag_table', 1),
(11, '2023_02_02_080334_create_badges_table', 2),
(12, '2023_02_02_080509_create_user_badges_table', 3),
(13, '2023_02_03_055541_create_profile_table', 4),
(14, '2023_02_04_105433_create_notification_table', 5),
(15, '2023_02_04_110139_create_notifications_table', 6),
(16, '2023_02_04_110346_create_notifications_table', 7),
(17, '2023_08_12_094441_create_votes_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `isRead`, `message`, `created_at`, `updated_at`) VALUES
(1, 8, 0, 'goofy just commented on one of your question', '2022-12-26 19:21:34', NULL),
(2, 8, 0, 'tanzeela just commented on one of your question', '2022-12-26 19:21:34', NULL),
(3, 9, 1, 'goofy just commented on one of your question', '2022-12-26 19:21:34', NULL),
(4, 9, 1, 'goofy just commented on What is the linear algebra?', '2022-12-26 19:21:34', NULL),
(5, 9, 1, 'goofy just commented on <strong>What is the linear algebra?</strong>', '2022-12-26 19:21:34', NULL),
(6, 9, 1, 'goofy just commented on <span class=\'font-bold\'>What is the linear algebra?</span>', '2022-12-26 19:21:34', NULL),
(7, 9, 1, 'goofy just commented on <br /><span class=\'font-bold\'>What is the linear algebra?</span>', '2022-12-26 19:21:34', NULL),
(8, 9, 1, 'goofy just commented on <span class=\'font-bold\'>What is the linear algebra?</span>', '2022-12-26 19:21:34', NULL),
(9, 9, 1, 'goofy just commented on <strong>What is the linear algebra?</strong>', '2022-12-26 19:21:34', NULL),
(10, 9, 1, 'goofy just commented on <strong>What is the linear algebra?</strong>', '2022-12-26 19:21:34', NULL),
(11, 11, 1, 'You have been awarded a badge', NULL, NULL),
(12, 14, 1, 'Got got 5 more Reputation', NULL, NULL),
(13, 14, 1, 'Got got 5 more Reputation', NULL, NULL),
(14, 14, 1, 'Got 5 more Reputation', NULL, NULL),
(15, 14, 1, 'Got 5 more Reputation', NULL, NULL),
(16, 14, 1, 'Got 5 more Reputation', NULL, NULL),
(17, 11, 1, 'You lost -5 reputations :(', NULL, NULL),
(18, 11, 1, 'You lost 5 reputations :(', NULL, NULL),
(19, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(20, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(21, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(22, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(23, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(24, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(25, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(26, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(27, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(28, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(29, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(30, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(31, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(32, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(33, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(34, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(35, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(36, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(37, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(38, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(39, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(40, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(41, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(42, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(43, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(44, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(45, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(46, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(47, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(48, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(49, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(50, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(51, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(52, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(53, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(54, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(55, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(56, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(57, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(58, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(59, 14, 0, 'Got 5 more Reputation', NULL, NULL),
(60, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(61, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(62, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(63, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(64, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(65, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(66, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(67, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(68, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(69, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(70, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(71, 11, 1, 'You lost 5 reputations :(', NULL, NULL),
(72, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(73, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(74, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(75, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(76, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(77, 11, 1, 'Got 5 more Reputation', NULL, NULL),
(78, 14, 0, 'You lost 5 reputations :(', NULL, NULL),
(79, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(80, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(81, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(82, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(83, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(84, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(85, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(86, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(87, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(88, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(89, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(90, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(91, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(92, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(93, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(94, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(95, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(96, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(97, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(98, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(99, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(100, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(101, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(102, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(103, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(104, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(105, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(106, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(107, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(108, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(109, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(110, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(111, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(112, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(113, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(114, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(115, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(116, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(117, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(118, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(119, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(120, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(121, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(122, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(123, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(124, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(125, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(126, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(127, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(128, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(129, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(130, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(131, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(132, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(133, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(134, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(135, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(136, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(137, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(138, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(139, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(140, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(141, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(142, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(143, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(144, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(145, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(146, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(147, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(148, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(149, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(150, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(151, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(152, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(153, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(154, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(155, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(156, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(157, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(158, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(159, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(160, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(161, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(162, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(163, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(164, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(165, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(166, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(167, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(168, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(169, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(170, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(171, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(172, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(173, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(174, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(175, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(176, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(177, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(178, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(179, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(180, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(181, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(182, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(183, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(184, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(185, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(186, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(187, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(188, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(189, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(190, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(191, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(192, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(193, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(194, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(195, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(196, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(197, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(198, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(199, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(200, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(201, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(202, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(203, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(204, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(205, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(206, 1, 0, 'Got 5 more Reputation', NULL, NULL),
(207, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(208, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(209, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(210, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(211, 1, 0, 'You lost 5 reputations :(', NULL, NULL),
(212, 1, 0, 'You lost 5 reputations :(', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `reputation` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `profile_pic`, `description`, `is_private`, `reputation`, `created_at`, `updated_at`) VALUES
(1, 8, 'hashim.jpg', 'I am enthusiastic web developer with 2 years of experience and learning something new constantly', 0, 0, NULL, NULL),
(2, 9, 'hashim.jpg', 'I am none', 0, 5, NULL, '2023-08-11 02:18:38'),
(3, 10, 'user-307993__340.webp', 'I have just changed something...s.s', 0, 0, NULL, '2023-02-10 02:05:22'),
(4, 1, '', 'I am anonymous', 0, 210, NULL, '2023-08-12 17:48:49'),
(5, 11, 'fotis-fotopoulos-6sAl6aQ4OWI-unsplash.jpg', '', 0, 1110, NULL, '2023-08-12 16:43:26'),
(6, 14, '', '', 0, 15, NULL, '2023-08-12 16:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `hearts` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `category_id`, `user_id`, `description`, `upvotes`, `downvotes`, `slug`, `hearts`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How to achieve XYZ in Laravel', 1, 1, '<p>It is description</p><p>It is another description</p>', 1, 1, '1ff', 1, 1, '2003-03-10 10:00:00', '2023-08-10 20:06:21'),
(2, 'The second question', 1, 1, 'It is the second questiobn', 1, 1, 'eustion', 1, 1, '2003-03-10 10:00:00', '2023-08-10 22:16:32'),
(3, 'How gardening is being done?', 2, 1, 'How?', 1, 1, 'gard', 1, 1, '2003-03-10 10:00:00', '2023-08-11 02:15:42'),
(4, 'Is it unique question', 1, 1, 'bla bla', 1, 1, 'bla', 1, 1, '2003-03-10 10:00:00', NULL),
(5, 'This is the car', 1, 8, 'THis is the carTHis is the carTHis is the carTHis is the car', 0, 0, 'this-is-the-car', 0, 1, '2022-12-26 19:05:37', '2022-12-26 19:05:37'),
(6, 'This is the car', 1, 8, 'THis is the carTHis is the carTHis is the carTHis is the car', 0, 0, 'this-is-the-car', 0, 1, '2022-12-26 19:06:09', '2022-12-26 19:06:09'),
(7, 'This is the car', 1, 8, 'THis is the carTHis is the carTHis is the carTHis is the car', 0, 0, 'this-is-the-car', 0, 1, '2022-12-26 19:06:53', '2022-12-26 19:06:53'),
(8, 'This is the car', 1, 8, 'THis is the carTHis is the carTHis is the carTHis is the car', 0, 0, 'this-is-the-car', 0, 1, '2022-12-26 19:08:22', '2022-12-26 19:08:22'),
(9, 'This is the car', 1, 8, 'THis is the carTHis is the carTHis is the carTHis is the car', 0, 0, 'this-is-the-car', 0, 1, '2022-12-26 19:08:35', '2022-12-26 19:08:35'),
(10, 'It has mutliple tags', 2, 8, 'This question literally has multiple tags :- D', 0, 0, 'it-has-mutliple-tags', 0, 1, '2022-12-26 19:10:50', '2022-12-26 19:10:50'),
(11, 'It is something else', 1, 8, 'sdgdsfdfsd I t is somedfghsx fgd;fjsdfjdkcnvgjdfhfjdhdvgdfv', 0, 0, 'it-is-something-else', 0, 1, '2022-12-26 19:11:57', '2022-12-26 19:11:57'),
(12, 'It is something else', 1, 8, 'sdgdsfdfsd I t is somedfghsx fgd;fjsdfjdkcnvgjdfhfjdhdvgdfv', 0, 0, 'it-is-something-else', 0, 1, '2022-12-26 19:12:24', '2022-12-26 19:12:24'),
(13, 'For sure it has multiple tags', 2, 8, 'sdfdsfdfs edjfhsdjfhj sdjfhdjhfjkdhfjkh  sfgdhgfhdgfhb sdfhgdhfgdhfgsdh edfhdghfgdhfd', 0, 0, 'for-sure-it-has-multiple-tags', 0, 1, '2022-12-26 19:13:03', '2022-12-26 19:13:03'),
(14, 'I am unique', 2, 8, 'I am unique guy.... Don\'t underestimate me', 0, 0, 'i-am-unique', 0, 1, '2022-12-26 19:14:13', '2022-12-26 19:14:13'),
(15, 'I am unique', 2, 8, 'I am unique guy.... Don\'t underestimate me', 0, 0, 'i-am-unique', 0, 1, '2022-12-26 19:14:30', '2022-12-26 19:14:30'),
(16, 'I am not unique', 1, 8, 'I am literally not unique.... lol', 0, 0, 'i-am-not-unique', 0, 1, '2022-12-26 19:15:36', '2022-12-26 19:15:36'),
(17, 'how to make slime without activater', 1, 8, 'idk how to make a slime plz can anyone teach mne how to make i really idk', 0, 0, 'how-to-make-slime-without-activater', 0, 1, '2022-12-26 19:20:55', '2022-12-26 19:20:55'),
(18, 'Defined the mutator', 1, 8, 'I have defined the mutator in this question. Now I know How does this work :- D', 0, 0, 'defined-the-mutator', 0, 1, '2022-12-27 14:54:44', '2022-12-27 14:54:44'),
(19, 'There are some mutators', 2, 8, 'There are some mutators around us....', 0, 0, 'there-are-some-mutators', 0, 1, '2022-12-27 14:57:51', '2022-12-27 14:57:51'),
(20, 'The slug has been mutated', 1, 8, 'The slug of this question has been mutated', 0, 0, 'the-slug-has-been-mutated', 0, 1, '2022-12-27 15:02:57', '2022-12-27 15:02:57'),
(21, 'is loop needed', 2, 8, 'Is loop really needed???? huh?????', 0, 0, 'is-loop-needed', 0, 1, '2022-12-27 15:05:32', '2022-12-27 15:05:32'),
(22, '1234567891012', 1, 9, 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxys', 0, 0, '1234567891012', 0, 1, '2023-02-01 09:36:57', '2023-02-01 09:36:57'),
(23, 'Formula of Mathematics???????', 2, 9, 'I am quiet new in Maths.... I forgot the formula of (a+b)^2 I\'d be happy if someone tells me the answer.. Thanks', 0, 0, 'formula-of-mathematics', 0, 1, '2023-02-01 09:39:35', '2023-08-11 02:18:38'),
(24, 'What is the linear algebra?', 1, 9, 'What is the purpose of linear algebra in computer science?\r\nWhat are the works of Matrix? \r\n\r\nIs there anything related? \r\n\r\nThank you :)', 0, 0, 'what-is-the-linear-algebra', 0, 1, '2023-02-01 13:55:08', '2023-02-01 13:55:08'),
(25, 'dsdsdsfdfdfdf', 1, 8, 'sdsdsadsdsfsdsdsdfsfdssdsdsfsddw', 0, 0, 'dsdsdsfdfdfdf', 0, 1, '2023-02-02 06:29:57', '2023-02-02 06:29:57'),
(26, 'dsdsdsfdfdfdf', 1, 8, 'sdsdsadsdsfsdsdsdfsfdssdsdsfsddw', 0, 0, 'dsdsdsfdfdfdf', 0, 1, '2023-02-02 06:55:24', '2023-02-02 06:55:24'),
(27, 'dsdsdsfdfdfdf', 1, 8, 'sdsdsadsdsfsdsdsdfsfdssdsdsfsddw', 0, 0, 'dsdsdsfdfdfdf', 0, 1, '2023-02-02 06:56:14', '2023-02-02 06:56:14'),
(28, 'sdsdsdsdsdsdsads', 1, 8, 'sdsdsadsadsadsadsadsadsadfwdwsddfwsdw', 0, 0, 'sdsdsdsdsdsdsads', 0, 1, '2023-02-02 06:56:54', '2023-02-02 06:56:54'),
(29, 'sdfsdsdsdsadsads', 2, 8, 'sdsadsadsadsadsdsdsdsdsdsdsadsdsdsad', 0, 0, 'sdfsdsdsdsadsads', 0, 1, '2023-02-02 06:57:16', '2023-02-02 06:57:16'),
(30, 'dfsfsdsdsdsdsad', 2, 8, 'sdsdsdsdsdsdsdsdsadsdsddsdsdsadsads', 0, 0, 'dfsfsdsdsdsdsad', 0, 1, '2023-02-02 07:03:58', '2023-02-02 07:03:58'),
(31, 'In this question I will get my second badge', 2, 8, 'In this jsdfhdjhfdjhfjksdhfjdhfjdsfjsdjfjhfjk', 0, 0, 'in-this-question-i-will-get-my-second-badge', 0, 1, '2023-02-02 07:05:04', '2023-02-02 07:05:04'),
(32, 'fsdfdsfdsfdfsdfd', 1, 8, 'dfdfdsfdsfdfdsfsdfsdfsdfdsfsdfsdfsdf', 0, 0, 'fsdfdsfdsfdfsdfd', 0, 1, '2023-02-02 07:05:17', '2023-02-02 07:05:17'),
(33, 'jhdfjdhfjdhfjkdjfkhd', 2, 8, 'sdhfjdhfjdhfjkdhfjkhdsjkfhsdjkfhdjfdks', 0, 0, 'jhdfjdhfjdhfjkdjfkhd', 0, 1, '2023-02-02 07:05:50', '2023-02-02 07:05:50'),
(34, 'jhdfjdhfjdhfjkdjfkhd', 2, 8, 'sdhfjdhfjdhfjkdhfjkhdsjkfhsdjkfhdjfdks', 0, 0, 'jhdfjdhfjdhfjkdjfkhd', 0, 1, '2023-02-02 07:05:58', '2023-02-02 07:05:58'),
(35, 'sfsdfdsfdfdfdf', 1, 8, 'dfdsfsdfdfdsfdfsdfdsfsdfsdfdsfsdfsdf', 0, 0, 'sfsdfdsfdfdfdf', 0, 1, '2023-02-02 07:06:18', '2023-02-02 07:06:18'),
(36, 'sfsdfdsfdfdfdf', 1, 8, 'dfdsfsdfdfdsfdfsdfdsfsdfsdfdsfsdfsdf', 0, 0, 'sfsdfdsfdfdfdf', 0, 1, '2023-02-02 07:06:23', '2023-02-02 07:06:23'),
(37, '40fdfdfsdfsdfdsf', 2, 8, 'dfsdfsdfsdfsdfsdfdfsdfdsfdsfdsfsdfdsf', 0, 0, '40fdfdfsdfsdfdsf', 0, 1, '2023-02-02 07:07:35', '2023-02-02 07:07:35'),
(38, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(39, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(40, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(41, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(42, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(43, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(44, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(45, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(46, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(47, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(48, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(49, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(50, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(51, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(52, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(53, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(54, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(55, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(56, 'sdsdsadsadsadsad', 1, 8, 'sadsadsadsadsadsadsadsadsadsadsadsadsa', 0, 0, 'sdsdsadsadsadsad', 0, 1, '2023-02-02 07:13:44', '2023-02-02 07:13:44'),
(57, 'Guru Badge', 1, 8, 'I got my badge of guru/////////', 0, 0, 'guru-badge', 0, 1, '2023-02-02 07:14:53', '2023-02-02 07:14:53'),
(58, 'sdsdsdsdsdsdsad', 1, 8, 'sdsdsdsdsdsadsdsdsdsdsdsdsdsdsds', 0, 0, 'sdsdsdsdsdsdsad', 0, 1, '2023-02-02 07:15:14', '2023-02-02 07:15:14'),
(59, 'sdsdsdsdsdsdsad', 1, 8, 'sdsdsdsdsdsadsdsdsdsdsdsdsdsdsds', 0, 0, 'sdsdsdsdsdsdsad', 0, 1, '2023-02-02 07:15:19', '2023-02-02 07:15:19'),
(60, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(61, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(62, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(63, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(64, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(65, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(66, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(67, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(68, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(69, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(70, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(71, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(72, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(73, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(74, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(75, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(76, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(77, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(78, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(79, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(80, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(81, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(82, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(83, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(84, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(85, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(86, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(87, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(88, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(89, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(90, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(91, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(92, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(93, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(94, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(95, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(96, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(97, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(98, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(99, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(100, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(101, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(102, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(103, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(104, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(105, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(106, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(107, '1238768765754', 1, 8, 'That is quiet awkward to do that', 1, 1, 'monkey', 1, 1, NULL, NULL),
(108, 'fsfsdfsdfsfdf', 2, 8, 'sdfsdfsdfsdfdfdfdfdfdfdfdfdfdfdfdfd', 0, 0, 'fsfsdfsdfsfdf', 0, 1, '2023-02-02 07:16:25', '2023-02-02 07:16:25'),
(109, 'I need the badge', 2, 9, 'I jsut want the badge to do flexing with my friends', 0, 0, 'i-need-the-badge', 0, 1, '2023-02-02 14:17:14', '2023-02-02 14:17:14'),
(110, 'Sfhdjfhdjkfhdjhfdjkfh', 1, 9, 'fdhfjdhfjkdhfjkdshfjksdfsdhjkhd', 0, 0, 'sfhdjfhdjkfhdjhfdjkfh', 0, 1, '2023-02-02 14:35:38', '2023-02-02 14:35:38'),
(111, 'sdfsdfdfdfdfdf', 1, 9, 'dfsdfsdfdsfdsfdfdfdfdfdfdsfdsfd', 0, 0, 'sdfsdfdfdfdfdf', 0, 1, '2023-02-02 14:36:00', '2023-02-02 14:36:00'),
(112, 'Clients in fiverr', 1, 10, 'I have been using fiverr from so long. Still, I am not be able to get clients in fiverr. What is the reason?', 0, 0, 'clients-in-fiverr', 0, 1, '2023-02-06 14:34:19', '2023-02-06 14:34:19'),
(113, 'Second questions', 2, 10, 'It is definitely the second questions', 0, 0, 'second-questions', 0, 1, '2023-02-06 14:35:46', '2023-02-06 14:35:46'),
(114, 'again questions', 1, 10, 'It is the second questionsdffa', 0, 0, 'again-questions', 0, 1, '2023-02-06 14:38:03', '2023-02-06 14:38:03'),
(115, 'sfsdfdfdfdfdf', 2, 10, 'dfdfdfdfdsfdfdfdfdfsdfdsfdfdfsdfdsf', 0, 0, 'sfsdfdfdfdfdf', 0, 1, '2023-02-06 14:38:18', '2023-02-06 14:38:18'),
(116, 'the another thrwed', 1, 10, 'sfsdfsdsdsdsadsadsdsadsdsdsdsdsd', 0, 0, 'the-another-thrwed', 0, 1, '2023-02-06 14:38:40', '2023-02-06 14:38:40'),
(117, 'sample questuo', 1, 10, 'It is a sample question.........', 0, 0, 'sample-questuo', 0, 1, '2023-02-10 02:07:31', '2023-02-10 02:07:31'),
(118, 'another sample questions', 2, 10, 'it is another sample question..', 0, 0, 'another-sample-questions', 0, 1, '2023-02-10 02:08:32', '2023-02-10 02:08:32'),
(119, 'Another questions', 2, 10, 'It is anorghwer questiobn to dodf', 0, 0, 'another-questions', 0, 1, '2023-02-10 04:55:45', '2023-02-10 04:55:45'),
(120, 'Is wordpress the future?', 1, 11, 'Hi, I am Laravel developer. I awlays feel strange that is wordpress the future? because many websites can be created by the wordpress easily..\r\n\r\nWill laravel die? or core PHP die? Help me in this situation :(', 0, 0, 'is-wordpress-the-future', 0, 1, '2023-08-10 16:44:31', '2023-08-12 03:43:40'),
(121, 'Wha is shopify', 2, 11, 'shfkjdfkjhdsgfhdgfhdgfhdgfjhdgfjhdgfhdgdhsdhfjhdgfhdhfdshfdhfdfhdjbfd', 0, 0, 'wha-is-shopify', 0, 1, '2023-08-10 16:47:16', '2023-08-10 16:47:16'),
(122, 'The new thread', 2, 11, 'It is the newest thread. we\'ve seen so far', 0, 0, 'the-new-thread', 0, 1, '2023-08-11 02:31:15', '2023-08-11 02:31:15'),
(123, 'How to create question?', 1, 11, 'How Do i create question in this app?', 0, 0, 'how-to-create-question', 0, 1, '2023-08-11 02:41:35', '2023-08-11 02:41:35'),
(124, 'How to create question?', 1, 11, 'How Do i create question in this app?', 0, 0, 'how-to-create-question', 0, 1, '2023-08-11 02:41:43', '2023-08-11 02:41:43'),
(125, 'Am I awarded?', 1, 13, 'Am I awarded a badge????????????', 0, 0, 'am-i-awarded', 0, 1, '2023-08-11 02:43:53', '2023-08-11 02:43:53'),
(126, 'Am I awarded?', 1, 13, 'Am I awarded a badge????????????', 0, 0, 'am-i-awarded', 0, 1, '2023-08-11 02:44:39', '2023-08-11 02:44:39'),
(127, 'Am I awarded?', 1, 13, 'Am I awarded a badge????????????', 0, 0, 'am-i-awarded', 0, 1, '2023-08-11 02:44:42', '2023-08-11 02:44:42'),
(128, 'Am I awarded?', 1, 13, 'Am I awarded a badge????????????', 0, 0, 'am-i-awarded', 0, 1, '2023-08-11 02:44:45', '2023-08-11 02:44:45'),
(129, 'It\'s my 5th question', 2, 13, 'It is my 5th post. it is testing', 0, 0, 'its-my-5th-question', 0, 1, '2023-08-11 02:45:09', '2023-08-11 02:45:09'),
(130, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:46:20', '2023-08-12 16:43:33'),
(131, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:46:24', '2023-08-11 02:46:24'),
(132, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:46:27', '2023-08-11 02:46:27'),
(133, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:46:29', '2023-08-11 02:46:29'),
(134, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:46:32', '2023-08-11 02:46:32'),
(135, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:46:39', '2023-08-11 02:46:39'),
(136, 'sdsdsadsdsdsads', 1, 14, 'sdsdsadsdsadsadsfwedsfsdfdfsdsdsd', 0, 0, 'sdsdsadsdsdsads', 0, 1, '2023-08-11 02:49:48', '2023-08-11 02:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `question_tag`
--

CREATE TABLE `question_tag` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_tag`
--

INSERT INTO `question_tag` (`question_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(2, 1, NULL, NULL),
(3, 1, NULL, NULL),
(4, 2, NULL, NULL),
(4, 3, NULL, NULL),
(9, 1, NULL, NULL),
(12, 1, NULL, NULL),
(12, 2, NULL, NULL),
(12, 3, NULL, NULL),
(13, 1, NULL, NULL),
(13, 2, NULL, NULL),
(15, 3, NULL, NULL),
(16, 3, NULL, NULL),
(17, 1, NULL, NULL),
(17, 2, NULL, NULL),
(17, 3, NULL, NULL),
(18, 1, NULL, NULL),
(19, 1, NULL, NULL),
(19, 3, NULL, NULL),
(20, 1, NULL, NULL),
(20, 2, NULL, NULL),
(21, 1, NULL, NULL),
(21, 2, NULL, NULL),
(21, 3, NULL, NULL),
(22, 1, NULL, NULL),
(23, 1, NULL, NULL),
(24, 1, NULL, NULL),
(28, 1, NULL, NULL),
(29, 1, NULL, NULL),
(30, 1, NULL, NULL),
(31, 1, NULL, NULL),
(32, 1, NULL, NULL),
(34, 1, NULL, NULL),
(36, 1, NULL, NULL),
(37, 1, NULL, NULL),
(56, 1, NULL, NULL),
(57, 1, NULL, NULL),
(59, 1, NULL, NULL),
(108, 1, NULL, NULL),
(109, 1, NULL, NULL),
(110, 1, NULL, NULL),
(111, 1, NULL, NULL),
(112, 1, NULL, NULL),
(112, 3, NULL, NULL),
(113, 1, NULL, NULL),
(114, 1, NULL, NULL),
(115, 1, NULL, NULL),
(115, 2, NULL, NULL),
(116, 1, NULL, NULL),
(117, 1, NULL, NULL),
(118, 2, NULL, NULL),
(119, 2, NULL, NULL),
(120, 1, NULL, NULL),
(121, 1, NULL, NULL),
(122, 1, NULL, NULL),
(123, 3, NULL, NULL),
(124, 3, NULL, NULL),
(125, 2, NULL, NULL),
(126, 2, NULL, NULL),
(127, 2, NULL, NULL),
(128, 2, NULL, NULL),
(129, 1, NULL, NULL),
(130, 2, NULL, NULL),
(131, 2, NULL, NULL),
(132, 2, NULL, NULL),
(133, 2, NULL, NULL),
(134, 2, NULL, NULL),
(135, 2, NULL, NULL),
(136, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hearts` bigint(20) UNSIGNED DEFAULT NULL,
  `downvotes` bigint(20) UNSIGNED DEFAULT NULL,
  `upvotes` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `description`, `status`, `question_id`, `created_at`, `updated_at`, `user_id`, `hearts`, `downvotes`, `upvotes`) VALUES
(1, 1, 'Service Provider*', 1, 1, '2003-03-10 10:00:00', NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Personal', NULL, NULL),
(2, 'Vacation', NULL, NULL),
(3, 'I am unique', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 'anonymous', 'habbas2121@outlook.com', NULL, '$2y$10$b8Ycfffb9RW8xn72ccp1puv0oFFubbdgl7ghuduE66sefHlJtKnti', NULL, '2022-12-17 00:57:14', '2022-12-17 00:57:14', 'goofy'),
(2, 'hashim', 'adsadsd', NULL, 'sdjhsdj', NULL, NULL, NULL, 'loofy'),
(3, 'hashim', 'dk@gmail.com', NULL, '$2y$10$LmH8y9Az3uupPt8tbWC7mOpomIk4ToJgm06tbeD5uSvfE5x1ZDrKq', NULL, '2022-12-17 00:57:14', '2022-12-17 00:57:14', NULL),
(5, 'tanzeela', 'roblox@2.com', NULL, '$2y$10$alJITI6zI35noxhHXgVXHeEfNjCG957SaYbAHb/ZNIJz.W9/vrlJC', NULL, '2022-12-17 01:01:36', '2022-12-17 01:01:36', NULL),
(6, 'hashim', 'habbas21dfdf21@outlook.com', NULL, '$2y$10$Vajk7Vd/1yh8Q5Lx.sbQH.UNgMBAxws.ITxABCkWMInYPm6SlBonC', NULL, '2022-12-17 01:04:24', '2022-12-17 01:04:24', 'goofsf'),
(7, 'monkey', 'mk@gmail.com', NULL, '$2y$10$CcbSt72TelMpB8FFPsj7wuAxzNzGarE8D1IxQAMKJA3S6bXOQObOi', NULL, '2022-12-17 01:27:15', '2022-12-17 01:27:15', 'beluga'),
(8, 'goofy', 'gf@hotmail.com', NULL, '$2y$10$A9exMFRNaVXpHgZqV/5T/OZamOI5zO5KHvXcjYy8e/W5ViYTgJAjm', NULL, '2022-12-25 18:49:27', '2022-12-25 18:49:27', 'goofyguy'),
(9, 'tanzeela', 'tanzu@gmail.com', NULL, '$2y$10$b8Ycfffb9RW8xn72ccp1puv0oFFubbdgl7ghuduE66sefHlJtKnti', NULL, '2023-02-01 06:24:09', '2023-02-01 06:24:09', 'tanzubanzu'),
(10, 'hashim abbas jafferies', 'fiverr78666@gmail.com', NULL, '$2y$10$7xWw9SG064HtDephPh/ZOOs7y5ELJ1jzq8mXZKD79UE6Q/Ca7Z8Lm', NULL, '2023-02-06 14:12:53', '2023-02-10 02:05:22', 'hashim'),
(11, 'hashim', 'gamerverse14@gmail.com', NULL, '$2y$10$P5rC2DAj73QueDGIMC2rxuxJ5F/SdE7v481A63PxDFx2oVQ36yXmm', NULL, '2023-08-10 16:42:31', '2023-08-10 16:42:31', 'the_hashim'),
(12, 'danish', 'danish@gmail.com', NULL, '$2y$10$I59BF4lIKwwvwwqU2ZoHzeG2LyhQQ6dHp6HsR9KR2JTWONeFKUeHW', NULL, '2023-08-10 17:01:04', '2023-08-10 17:01:04', 'danish123'),
(13, 'adeel', 'adeel110@gmail.com', NULL, '$2y$10$tpg8Dq3I0aNu0CW59LJ0reaPgwBW0cJH57mHkBIcKlJflN8IGlaz.', NULL, '2023-08-11 02:43:13', '2023-08-11 02:43:13', 'adeel'),
(14, 'example', 'example@gmail.com', NULL, '$2y$10$HYk2I7/DMNn97.I9DPl56OIcuS6AKl0f1yjdcAK//p87kGJb0fvFa', NULL, '2023-08-11 02:46:02', '2023-08-11 02:46:02', 'example'),
(15, 'mesam', 'messam10@gmail.com', NULL, '$2y$10$CYHm0rPL5Vfu8OlR7gnF/O2VNm9hugFCm2CAPa2KK1y2JnkoUBoXK', NULL, '2023-08-12 03:18:55', '2023-08-12 03:18:55', 'messam110');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `badge_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`id`, `user_id`, `badge_id`, `created_at`, `updated_at`) VALUES
(7, 8, 1, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 8, 3, NULL, NULL),
(10, 8, 4, NULL, NULL),
(11, 9, 1, NULL, NULL),
(12, 9, 2, NULL, NULL),
(14, 10, 1, NULL, NULL),
(16, 10, 2, NULL, NULL),
(17, 11, 1, NULL, NULL),
(18, 11, 2, NULL, NULL),
(19, 13, 1, NULL, NULL),
(20, 13, 2, NULL, NULL),
(21, 14, 1, NULL, NULL),
(22, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vote_type` varchar(255) NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `vote_type`, `question_id`, `user_id`, `created_at`, `updated_at`) VALUES
(118, 'up', 1, 11, NULL, NULL),
(119, 'up', 1, 11, NULL, NULL),
(120, 'down', 1, 11, NULL, NULL),
(121, 'down', 1, 11, NULL, NULL),
(122, 'down', 1, 11, NULL, NULL),
(123, 'down', 1, 11, NULL, NULL),
(124, 'up', 1, 11, NULL, NULL),
(125, 'up', 1, 11, NULL, NULL),
(126, 'up', 1, 11, NULL, NULL),
(127, 'up', 1, 11, NULL, NULL),
(128, 'up', 1, 11, NULL, NULL),
(129, 'up', 1, 11, NULL, NULL),
(130, 'up', 1, 11, NULL, NULL),
(131, 'down', 1, 11, NULL, NULL),
(132, 'down', 1, 11, NULL, NULL),
(133, 'down', 1, 11, NULL, NULL),
(134, 'down', 1, 11, NULL, NULL),
(135, 'down', 1, 11, NULL, NULL),
(136, 'down', 1, 11, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_question_id_foreign` (`question_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_category_id_foreign` (`category_id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `question_tag`
--
ALTER TABLE `question_tag`
  ADD PRIMARY KEY (`question_id`,`tag_id`),
  ADD KEY `question_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`),
  ADD KEY `replies_question_id_foreign` (`question_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_badges_user_id_foreign` (`user_id`),
  ADD KEY `user_badges_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_question_id_foreign` (`question_id`),
  ADD KEY `votes_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_tag`
--
ALTER TABLE `question_tag`
  ADD CONSTRAINT `question_tag_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `question_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
