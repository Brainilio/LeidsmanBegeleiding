-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 nov 2018 om 21:13
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leidsman`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Hoi', 'student1@gmail.com', 'Hoi', 23, 5, '2018-11-04 12:59:56', '2018-11-04 12:59:56'),
(4, 'Hallo', 'student1@gmail.com', 'Hallo', 23, 5, '2018-11-04 17:22:49', '2018-11-04 17:22:49'),
(5, 'Coole post!', 'admin@admin.com', 'Coole post!', 23, 1, '2018-11-04 19:09:40', '2018-11-04 19:09:40');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `favourites`
--

INSERT INTO `favourites` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 20, 2, '2018-10-29 11:33:41', '2018-10-29 11:33:41'),
(6, 20, 1, '2018-10-31 14:55:24', '2018-10-31 14:55:24'),
(10, 18, 3, '2018-11-03 16:35:57', '2018-11-03 16:35:57'),
(11, 18, 3, '2018-11-03 16:35:57', '2018-11-03 16:35:57'),
(12, 19, 5, '2018-11-04 11:31:58', '2018-11-04 11:31:58'),
(13, 19, 5, '2018-11-04 14:58:45', '2018-11-04 14:58:45'),
(14, 17, 5, '2018-11-04 17:25:04', '2018-11-04 17:25:04'),
(15, 17, 5, '2018-11-04 17:25:35', '2018-11-04 17:25:35'),
(16, 23, 1, '2018-11-04 19:09:48', '2018-11-04 19:09:48');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2018_09_23_143435_add_user_id_to_posts', 1),
(27, '2018_09_23_175446_add_cover_image_to_posts', 1),
(29, '2018_09_26_121846_add_bought_posts_to_users', 2),
(58, '2014_10_12_000000_create_users_table', 3),
(59, '2014_10_12_100000_create_password_resets_table', 3),
(60, '2018_09_17_134235_create_posts_table', 3),
(61, '2018_10_05_120102_add_cover_image_to_posts', 3),
(62, '2018_10_05_120619_add_admin_to_users', 3),
(63, '2018_10_05_120717_add_user_id_to_posts', 3),
(64, '2018_10_05_121123_create_favourite_table', 3),
(65, '2018_10_22_142917_add_status_to_posts', 4),
(67, '2018_11_03_121140_create_comments_table', 5),
(68, '2018_11_04_131707_add_logincounter_to_users_table', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$DOAs33SEC5FMbimwvtAScuPFI0u/HqnhHi4x3zlDfQWbVwlLBKIf2', '2018-10-29 11:45:05'),
('Brainilioir@gmail.com', '$2y$10$R71z4baFthv9iEETwgtnBOsDtOcvGaSu634suLTAWNAEMPu8Y1BDq', '2018-10-29 11:46:48');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `cover_image`, `user_id`, `status`) VALUES
(14, 'Kansrekenen', 'Leer alles over kansrekenen met admin 2!', '2018-10-24 04:02:59', '2018-10-29 11:37:38', 'images_1540360979.png', 2, 1),
(15, 'Geavanceerd Rekenen', 'Leer alles over rekenen als een slimme jimbo.', '2018-10-24 04:03:28', '2018-10-24 04:03:28', '7741_cursus-training-rekenen_1540361008.png', 2, 1),
(16, 'Calculus', 'Leer alles over calculus', '2018-10-24 04:05:08', '2018-11-02 12:33:46', 'calculus_1540361108.jpg', 1, 2),
(17, 'Geometrie', 'GeometrieGeometrieGeometrieGeometrieGeometrieGeometrieGeometrieGeometrieGeometrieGeometrie', '2018-10-24 04:05:44', '2018-11-03 18:42:15', 'geometry-3146_1540361144.jpg', 1, 1),
(18, 'Algebra', 'Algebra sucks but come do it', '2018-10-24 04:05:58', '2018-11-03 18:42:14', 'depositphotos_74655611-stockillustratie-01-algebra-formule-board_1540361158.jpg', 1, 2),
(19, 'Examen Oefenen', 'Examen oefenen', '2018-10-24 04:06:37', '2018-11-04 18:17:33', 'examen-wiskunde-loesje-220x300_1540361197.jpg', 1, 2),
(20, 'VWO Wiskunde', 'VWO wiskunde', '2018-10-24 04:07:18', '2018-11-04 18:17:35', '$_84_1540361238.JPG', 1, 2),
(21, 'hi', 'hi', '2018-11-03 10:29:34', '2018-11-03 10:29:34', 'noimage.jpg', 1, 1),
(22, 'boe', 'boe', '2018-11-03 10:46:21', '2018-11-03 10:46:21', 'noimage.jpg', 1, 0),
(23, 'Rekenen', 'Rekenen is heel leuk', '2018-11-03 11:04:17', '2018-11-03 11:45:43', 'depositphotos_74655611-stockillustratie-01-algebra-formule-board_1541249143.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `logincounter` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`, `logincounter`) VALUES
(1, 'Admin1', 'admin@admin.com', '$2y$10$xNcBzSl8TtFNWIHHeiGvjubdBzOy1xWtWvh4iZT1B2hFtIzntHRLC', 'Qo0OLzvISYoyz8XqSZeIwvJ1smlrTcBwT8xaxB5Fh8IUcOpuCQhRwMo7MTpB', '2018-10-15 10:19:49', '2018-11-04 19:10:57', 1, 7),
(2, 'Admin2', 'admin2@admin.com', '$2y$10$UEH0EdZCX2x0J25ewuTMZeLH5Gi00CNl3cH6wz6AkV7lGe6owR2su', '6vXk5UcEx6QTAt59rI97pp8xKDDjgQ2EFYtUdTykt7Tc7jiaUKpIFgaXwRae', '2018-10-23 11:47:27', '2018-10-23 11:47:27', 1, 0),
(3, 'Brainilio', 'Brainilioir@gmail.com', '$2y$10$po5Z1x.8q9g0GPUEsPEzCON6LdRR9ZLfNQwcGcPJIJS/3L2RQRBqS', 'ZVnidXPXu07bg5aGKFsaZCitTJydu7y6lrtEjcFdZpVrG9ikhEkvQiMrMrLz', '2018-10-29 11:45:23', '2018-10-29 11:45:23', 0, 0),
(4, 'bal', 'admin123@admin.com', '$2y$10$nz5HRs1IzGBZPqIksFXY1.c74AIe2UdLfPssqexD.zHqxrPH0mxYG', 'GmQ1GDYLAwqeN81oSUwEh7XeTdAZzQC7vFMFv8m6yqOGgiXl7RDwfAbi1Fb3', '2018-11-03 13:51:34', '2018-11-04 12:40:01', 0, 1),
(5, 'student1', 'student1@gmail.com', '$2y$10$hrkpGR7UHMkx17td6NqN.eRCm//5AnqxPD0jETOxq7I67RZAKwJQS', 'W06fGU0hKmO376uMPE58qyDO6EMArfSqoZe4xnxY6frHTiW57xDQ43mqc0CN', '2018-11-03 13:59:13', '2018-11-04 18:54:20', 0, 10);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_post_id_foreign` (`post_id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
