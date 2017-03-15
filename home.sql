-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 28 2017 г., 20:10
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `home`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL,
  `id1` int(10) unsigned NOT NULL,
  `id2` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Администраторы', NULL, NULL),
(2, 'Пользователи', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `glyph` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `link`, `glyph`, `sort`, `pid`, `created_at`, `updated_at`) VALUES
(1, 'Главная', '/', 'home', 1, NULL, NULL, NULL),
(2, 'Личный кабинет', 'personal', 'briefcase', 2, NULL, NULL, NULL),
(3, 'Сообщения', '#', 'comment', 3, NULL, NULL, NULL),
(4, 'Пользователи', 'users', 'user', 4, NULL, NULL, NULL),
(5, 'Галерея', '#', 'picture', 5, NULL, NULL, NULL),
(6, 'Города', '#', 'ok', 1, 5, NULL, NULL),
(7, 'Природа', '#', 'ok', 2, 5, NULL, NULL),
(8, 'Реферальная ссылка', '#', 'link', 6, NULL, NULL, NULL),
(9, '1111111', '#', 'ok', 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2017_02_19_135417_create_groups_table', 1),
(9, '2017_02_19_144245_create_menus_table', 1),
(10, '2017_02_19_144816_create_userdetail_table', 1),
(11, '2017_02_24_174756_change_user_detail_column', 2),
(12, '2017_02_24_191019_change_user_detail_columns', 3),
(13, '2017_02_25_151130_change_user_detail_table_columns', 4),
(14, '2017_02_25_153444_create_table_requests', 5),
(15, '2017_02_25_153458_create_table_friends', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL,
  `sender_id` int(10) unsigned NOT NULL,
  `taker_id` int(10) unsigned NOT NULL,
  `accept` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `sender_id`, `taker_id`, `accept`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 0, '2017-02-25 09:44:58', '2017-02-25 09:44:58'),
(3, 2, 8, 0, '2017-02-25 09:59:57', '2017-02-25 09:59:57'),
(4, 1, 8, 0, '2017-02-27 10:52:38', '2017-02-27 10:52:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root', 'root@yandex.ru', '$2y$10$vXNF9nkMEMgCgmr/gSJQ5u5CpM3nXhLKuSwvMXP6lJ.rzOdfXwd.u', 'PfXDSG9DV2vnZQAr0V7BuWk0w43Z6PFtfTfiUrufYl7laZoTEl7pldhxJ0BQ', '2017-02-19 08:03:35', '2017-02-19 08:03:35'),
(2, 'maxim', 'maxim@gmail.com', '$2y$10$Q7F9SAmorbYF/kltdYA.1.4VWrhgoEVMgCae1DUryUOwZvhKIQSJ.', 'm1gQyEgTNB9xbjDTQNf8BhfGpjmRHH0j86jaKNDyL0dnzCpO9n5JXynnBm22', '2017-02-19 08:03:59', '2017-02-19 08:03:59'),
(8, 'serega', 'sdverkholantsev@gmail.com', '$2y$10$SASpYQyUOGcvSZXet0tcs.iUjPa5QWNpEdA5SER2AkuJfrkvvqk6O', '55OfhpR9OLQ3OCyO8kGkQ9d8OP23PpjZilF9EHjKCvEH9x9ep1QPL5zqYf8V', '2017-02-24 10:50:09', '2017-02-24 10:50:09'),
(15, 'nata', 'nata@gmail.com', '$2y$10$/pOd8PEra0CNMoVC6SaI.u47d0kJH7crQHGMvvzz87PFNUqrr6zsa', 'vZzEXyPXn9nBztMzthVJUYGIR4QhASQODdkaTcFt3LS85It36qCCIFqxtEKO', '2017-02-25 08:24:37', '2017-02-25 08:24:37');

-- --------------------------------------------------------

--
-- Структура таблицы `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `group_id` int(10) unsigned NOT NULL DEFAULT '2',
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_avatar.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `first_name`, `last_name`, `birthday`, `group_id`, `about`, `label`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Денис', 'Щербаков', '1988-01-27', 1, '1', '', 'root.jpg', NULL, NULL),
(2, 2, 'Максим', 'Щербаков', '2014-05-10', 2, 'empty', 'empty', 'maxim.jpg', NULL, '2017-02-28 09:30:43'),
(3, 8, 'Сергей', 'Верхоланцев', '2008-05-01', 2, '1', '1', 'no_avatar.png', NULL, NULL),
(5, 15, 'Наташа', 'Щербакова', '1988-09-06', 2, '1', NULL, 'no_avatar.png', '2017-02-25 08:24:37', '2017-02-25 08:25:16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_id1_foreign` (`id1`),
  ADD KEY `friends_id2_foreign` (`id2`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_pid_foreign` (`pid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_sender_id_foreign` (`sender_id`),
  ADD KEY `requests_taker_id_foreign` (`taker_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_user_id_foreign` (`user_id`),
  ADD KEY `user_detail_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_id1_foreign` FOREIGN KEY (`id1`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_id2_foreign` FOREIGN KEY (`id2`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_taker_id_foreign` FOREIGN KEY (`taker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
