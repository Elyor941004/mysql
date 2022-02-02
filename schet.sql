-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2022 г., 12:13
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `schet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `name` varchar(130) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `numbers` int(11) DEFAULT NULL,
  `purchase_time` timestamp NULL DEFAULT NULL,
  `batch_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `name`, `price`, `numbers`, `purchase_time`, `batch_number`) VALUES
(4, 'Pepsi', 5000, 70, '2022-02-09 22:02:00', 4),
(5, 'Hydrolife', 1000, 16, '2022-02-01 21:03:00', 2),
(6, 'Fanta', 5000, 40, '2022-02-05 03:09:00', 5),
(10, 'Icetea', 1000, 50, '2022-02-03 03:09:00', 1),
(11, 'Coca cola', 5000, 44, '2022-02-16 22:04:00', 1),
(12, 'Pepsi', 4500, 36, '2022-02-01 22:23:00', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `selling`
--

CREATE TABLE `selling` (
  `id` int(11) NOT NULL,
  `name` varchar(130) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `numbers` int(11) DEFAULT NULL,
  `selling_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `selling`
--

INSERT INTO `selling` (`id`, `name`, `price`, `numbers`, `selling_date`) VALUES
(1, 'Pepsi', 9500, 23, '2022-02-01 16:43:13'),
(2, 'Pepsi', 9500, 2, '2022-02-01 17:38:18'),
(3, 'Pepsi', 9500, 1, '2022-02-01 17:38:28'),
(4, 'Pepsi', 9500, 2, '2022-02-01 17:39:40'),
(5, 'Pepsi', 9500, 2, '2022-02-01 17:42:52'),
(6, 'Pepsi', 9500, 2, '2022-02-01 18:48:32'),
(7, 'Pepsi', 9500, 2, '2022-02-01 18:51:28'),
(8, 'Pepsi', 9500, 2, '2022-02-01 18:51:37'),
(9, 'Pepsi', 9500, 2, '2022-02-01 18:53:32'),
(10, 'Hydrolife', 2500, 5, '2022-02-02 08:53:21'),
(11, 'Hydrolife', 2500, 5, '2022-02-02 09:01:40'),
(12, 'Hydrolife', 2100, 2, '2022-02-02 09:01:52'),
(13, 'Pepsi', 9500, 2, '2022-02-02 09:02:17'),
(14, 'Hydrolife', 2100, 2, '2022-02-02 09:02:41'),
(15, 'Hydrolife', 2100, 2, '2022-02-02 09:03:30'),
(16, 'Hydrolife', 2100, 2, '2022-02-02 09:04:00'),
(17, 'Hydrolife', 2100, 2, '2022-02-02 09:04:16'),
(18, 'Hydrolife', 2100, 2, '2022-02-02 09:04:23'),
(19, 'Hydrolife', 2100, 2, '2022-02-02 09:04:32'),
(20, 'Hydrolife', 2100, 2, '2022-02-02 09:04:55'),
(21, 'Hydrolife', 2100, 2, '2022-02-02 09:05:09'),
(22, 'Hydrolife', 2100, 2, '2022-02-02 09:05:29'),
(23, 'Hydrolife', 2100, 2, '2022-02-02 09:05:36'),
(24, 'Hydrolife', 2100, 2, '2022-02-02 09:05:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `selling`
--
ALTER TABLE `selling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
