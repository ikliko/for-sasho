-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time:  2 окт 2021 в 10:19
-- Версия на сървъра: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginapp`
--

-- --------------------------------------------------------

--
-- Структура на таблица `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `tasks`
--

INSERT INTO `tasks` (`id`, `text`, `is_completed`, `created_at`) VALUES
(1, 'qwewq', 1, '2021-10-02 10:03:34'),
(2, 'qwewq', 1, '2021-10-02 10:03:56'),
(3, 'Create logout\r\n', 1, '2021-10-02 10:09:48'),
(4, 'edit profile page\r\n', 1, '2021-10-02 10:10:39'),
(5, 'edit profile page\r\n', 1, '2021-10-02 10:11:16'),
(6, 'edit profile page\r\n', 1, '2021-10-02 10:11:54'),
(7, 'edit profile page\r\n', 1, '2021-10-02 10:12:01'),
(8, 'create logic to be able to delete a task\r\n', 0, '2021-10-02 10:19:12'),
(9, 'Add some tasks to do', 0, '2021-10-02 10:19:26');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'username', '1234', '2021-10-02 08:36:56'),
(4, 'user1', 'QWbIS3w3kM1ts', '2021-10-02 08:57:02'),
(6, 'user2', '$2y$10$6O/s3aehItkx9mHQtMa.mOy.C1K4Sp1GRmg.A8bF/objvSGexa/qe', '2021-10-02 09:01:43'),
(7, 'user3', '$2y$10$UFZthSipEdq1sNAKdqwBqeT9nZWgCiXRLr3luClUw9t0U0tmvkRcq', '2021-10-02 09:02:21'),
(8, 'user4', '$2y$10$GE9JpcV16ZVGqvAXP0i4O.9raNWSbLEiZRqIgbJyCNWE6PVNKUFCK', '2021-10-02 09:02:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
