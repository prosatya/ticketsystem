-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2017 at 06:03 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technical', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Customer Query', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `ticket_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Test comment', '2017-02-22 05:38:29', '2017-02-22 05:38:29'),
(2, 6, 3, 'Test comment client', '2017-02-22 05:38:54', '2017-02-22 05:38:54'),
(3, 6, 3, 'Test Comment client 2', '2017-02-22 06:08:05', '2017-02-22 06:08:05'),
(4, 6, 3, 'Test Comment client 3', '2017-02-22 06:09:27', '2017-02-22 06:09:27'),
(5, 5, 3, 'Test Comment client', '2017-02-22 06:10:43', '2017-02-22 06:10:43'),
(6, 4, 3, 'Test client comment', '2017-02-22 06:11:25', '2017-02-22 06:11:25'),
(7, 6, 3, 'Test Comment client 4', '2017-02-22 06:40:52', '2017-02-22 06:40:52'),
(8, 5, 3, 'Test Comment client 2', '2017-02-22 06:42:10', '2017-02-22 06:42:10'),
(9, 4, 3, 'Test client comment 2', '2017-02-22 06:43:59', '2017-02-22 06:43:59'),
(10, 3, 3, 'Test comment client', '2017-02-22 06:46:56', '2017-02-22 06:46:56'),
(11, 2, 3, 'Test comment client', '2017-02-22 06:51:55', '2017-02-22 06:51:55'),
(12, 1, 3, 'Test comment 4', '2017-02-22 06:56:32', '2017-02-22 06:56:32'),
(13, 7, 3, 'Test comment client', '2017-02-22 06:59:22', '2017-02-22 06:59:22'),
(14, 6, 3, 'Test Comment client 5', '2017-02-22 07:01:28', '2017-02-22 07:01:28'),
(15, 5, 3, 'Test Comment client 3', '2017-02-22 07:02:07', '2017-02-22 07:02:07'),
(16, 4, 3, 'Test client comment 3', '2017-02-22 07:11:57', '2017-02-22 07:11:57'),
(17, 1, 3, 'Test comment 5', '2017-02-22 07:32:10', '2017-02-22 07:32:10'),
(18, 2, 3, 'Test comment new', '2017-02-22 07:32:50', '2017-02-22 07:32:50'),
(19, 9, 1, 'Test ticket 2', '2017-02-22 08:23:36', '2017-02-22 08:23:36'),
(20, 9, 3, 'Test Ticket 3', '2017-02-22 08:24:23', '2017-02-22 08:24:23'),
(21, 9, 1, 'Test comment', '2017-02-22 08:43:20', '2017-02-22 08:43:20'),
(22, 6, 1, 'Test Comment admin', '2017-02-22 23:31:01', '2017-02-22 23:31:01'),
(23, 1, 1, 'Test comment open', '2017-02-24 00:17:26', '2017-02-24 00:17:26'),
(24, 10, 3, 'Test comment me', '2017-02-24 00:28:05', '2017-02-24 00:28:05'),
(25, 2, 3, 'Test open', '2017-02-24 00:28:27', '2017-02-24 00:28:27'),
(26, 12, 1, 'Test comment on', '2017-02-24 02:47:34', '2017-02-24 02:47:34'),
(27, 9, 1, 'Test comment to', '2017-02-24 02:48:12', '2017-02-24 02:48:12'),
(28, 5, 1, 'Test comment 33', '2017-02-24 02:48:39', '2017-02-24 02:48:39'),
(29, 14, 21, 'testing', '2017-02-24 04:17:15', '2017-02-24 04:17:15'),
(30, 15, 2, 'Test comment', '2017-02-24 05:34:59', '2017-02-24 05:34:59'),
(31, 16, 2, 'Test ticket in process', '2017-02-24 06:23:07', '2017-02-24 06:23:07'),
(32, 15, 2, 'Test to open', '2017-02-24 06:23:30', '2017-02-24 06:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_02_08_063308_create_tickets_table', 2),
('2017_02_08_063608_create_categories_table', 2),
('2017_02_08_082125_create_comments_table', 3),
('2017_02_09_062546_create_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `developer_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `category_id`, `ticket_id`, `title`, `priority`, `message`, `developer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'TUOZNHV8YS', 'Test Ticket1', 'high', 'Test Ticket message', 20, 'Open', '2017-02-21 07:46:59', '2017-02-24 00:33:24'),
(2, 3, 1, 'CFCABH4OKC', 'Test Ticket2', 'high', 'Test Ticket3 meesage', 18, 'Open', '2017-02-21 07:49:29', '2017-02-24 00:28:29'),
(3, 3, 2, 'DGGTQCUMAG', 'Test Ticket3', 'medium', 'Hello world', 18, 'Closed', '2017-02-21 23:28:52', '2017-02-24 04:58:32'),
(4, 2, 2, '2UOOKKZUOJ', 'Test Ticket4', 'low', 'Hello world', 21, 'Closed', '2017-02-21 23:28:55', '2017-02-24 00:17:03'),
(5, 3, 1, '2UHAC1ARE8', 'Test Ticket5', 'medium', 'Test ticket5 description', 20, 'Open', '2017-02-21 23:34:03', '2017-02-24 02:48:39'),
(6, 3, 2, 'AFUDQERDEC', 'Test Ticket6', 'medium', 'Test ticket6 description', 20, 'Open', '2017-02-22 03:31:00', '2017-02-23 23:51:47'),
(7, 2, 2, 'NK0JI6GJMO', 'Test Ticket7', 'medium', 'Test message', 21, 'Closed', '2017-02-22 06:44:48', '2017-02-24 05:35:52'),
(8, 3, 1, '6WOOSKPZIM', 'Test Ticket8', 'high', 'Test comment', 18, 'Open', '2017-02-22 07:09:55', '2017-02-23 23:57:45'),
(9, 2, 2, 'GRBFPX1KWL', 'Test Ticket9', 'low', 'Test ticket', 21, 'Closed', '2017-02-22 07:59:19', '2017-02-24 05:29:50'),
(10, 3, 1, 'J0VESLQ3EI', 'Test Ticket10', 'low', 'Test comment', 21, 'Closed', '2017-02-23 01:56:05', '2017-02-24 06:22:08'),
(11, 3, 1, 'DW2KUTO0MQ', 'Test me', 'low', 'Hello', 20, 'Open', '2017-02-24 00:51:23', '2017-02-24 00:57:01'),
(12, 3, 1, 'ANRPX9MUOV', 'Test ticket11', 'low', 'Solve it', 18, 'Closed', '2017-02-24 01:25:13', '2017-02-24 06:21:46'),
(13, 2, 1, 'WSDISRMFE2', 'Test Ticket', 'low', 'test me', 18, 'Open', '2017-02-24 03:17:32', '2017-02-24 03:18:05'),
(14, 2, 1, 'LMOK7TJL8K', 'test new t', 'low', 'test new one', 21, 'Closed', '2017-02-24 04:15:27', '2017-02-24 05:21:24'),
(15, 2, 1, 'N45G0PG0WB', 'xyz issue', 'low', 'Hello world', 21, 'Open', '2017-02-24 04:46:51', '2017-02-24 06:23:31'),
(16, 2, 1, 'CD1CDFMULE', 'Tets ticket 12', 'low', 'Tets support', 21, 'Open', '2017-02-24 05:08:53', '2017-02-24 06:23:07'),
(17, 2, 1, 'Q97TQKVVYA', 'Test Ticket 14', 'medium', 'Test tckt', 23, 'Open', '2017-02-24 05:11:18', '2017-02-24 05:16:04'),
(18, 2, 2, 'LO2ZOLD2TH', 'Test Ticket 13', 'medium', 'Test Ticket mssg', 24, 'Open', '2017-02-24 05:14:55', '2017-02-24 05:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_developer` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `is_developer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$jDFaZrUXA5v.4sHXAMu3U.Gy0v1rhj8MfzjbDsai/7Dqkwc7kFsSa', 1, 0, 'MPo3hSwK9XC16GzSIrqLb3QD8znQJAPEHJAQmItezWZJ2lBHdq8NlnFiCCBm', '2017-02-08 00:59:54', '2017-02-24 06:36:02'),
(2, 'test1', 'testuser1@test.com', '$2y$10$bXshJV7Cqo52952WrbjC3OWuH5hMcOuHoUGUuPLWALkSI2UEb7TVq', 0, 0, '8GaR12Dt7xACuHg0E2qaLU44MPVeR9HsGYyXpBa6tYkyfkgaEx7RdB0ahnUj', '2017-02-16 23:51:59', '2017-02-24 03:18:37'),
(3, 'test', 'testuser@test.com', '$2y$10$tKchWgQbsxz4sZYX3hODSOddHkD6NoGRAPByX1teSTuSAYC.bMlfS', 0, 0, '3xfmanPUzu94GFPYqDsq8iLvJKqpsPx4q2A08FG6rwFYIRzVBzYRtBVYW6UC', '2017-02-17 00:04:00', '2017-02-24 04:16:07'),
(18, 'Test me', 'testme@ht.com', '$2y$10$JzDqVSpYJ5dDqqcxCgsceuKMp1mbSLHLQrs0DoCr.ZIXo3kFI2jn2', 0, 1, NULL, '2017-02-23 06:47:41', '2017-02-23 06:47:41'),
(20, 'Testme dev', 'testdevme@me.com', '$2y$10$o1daZpHJcPfRx28SPHpUKeAMSe71QenrH80HmwNdahh1eeAXRuhHe', 0, 1, NULL, '2017-02-23 06:49:51', '2017-02-23 06:49:51'),
(21, 'Teser', 'test@test.com', '$2y$10$ZojQoq6BurDafjjhg/D40e4GrVtVcdoSLjQdERvFvbBtG3jr91CyK', 0, 1, 'lIyseHoehSXXYYMgLiWKCPDqiY4wKlQphk40x38v2VgObRqXoqhskVJfxvJF', '2017-02-23 06:51:19', '2017-02-24 05:30:01'),
(22, 'Testf', 'testf@test.com', '$2y$10$Vhj/v9Mte9ivafOkrmff/.iARtACecA81zcoEIlq0CBW6vuzInCmi', 0, 1, NULL, '2017-02-24 03:59:01', '2017-02-24 03:59:01'),
(23, 'testm', 'testmdev@test.com', '$2y$10$PLEUbLRYQhEsCNA1wEDctuv/.qoWaHFuvouAlA0iHF2bh14gThk36', 0, 1, NULL, '2017-02-24 04:06:48', '2017-02-24 04:06:48'),
(24, 'dev123', 'dev123@test.com', '$2y$10$//QVL4ujAVJENsqlVpVnHukHa/.luw0fmv8.WQ7UlrfotmphBkDuy', 0, 1, NULL, '2017-02-24 04:09:02', '2017-02-24 04:09:02'),
(25, 'devltest', 'devltest@test.com', '$2y$10$xG/.at55VPOGHI0CRKjUJO9undcMJj6fX28C4IEegdihrygnP2PqK', 0, 1, NULL, '2017-02-24 04:13:43', '2017-02-24 04:13:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
