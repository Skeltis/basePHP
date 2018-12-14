-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.0.99:3306
-- Время создания: Дек 14 2018 г., 03:13
-- Версия сервера: 5.7.23
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `funnycats`
--

CREATE TABLE `funnycats` (
  `id` int(4) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `size` double NOT NULL,
  `views` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `funnycats`
--

INSERT INTO `funnycats` (`id`, `caption`, `filename`, `size`, `views`) VALUES
(299, 'Funny Cat #1', '02-cat-training-NationalGeographic_1484324.ngsversion.1526587209178.adapt.1900.1.jpg', 134.208984375, 6),
(300, 'Funny Cat #2', '128225-aleni.jpg', 213.4033203125, 25),
(301, 'Funny Cat #3', '2644-1.jpg', 439.8115234375, 9),
(302, 'Funny Cat #4', '549585-istock-909106260.jpg', 46.5, 11),
(303, 'Funny Cat #5', 'animals-cats-24887.jpg', 1054.580078125, 0),
(304, 'Funny Cat #6', 'cat-cancer-riverside-1.jpg', 392.30078125, 73),
(305, 'Funny Cat #7', 'cat-cute-wallpaper.jpg', 492.7978515625, 4),
(306, 'Funny Cat #8', 'cat_m3_cat_outside_1.jpg', 122.662109375, 3),
(307, 'Funny Cat #9', 'koshka.jpg', 271.640625, 3),
(308, 'Funny Cat #10', 'ohotyatsya-koshki.jpg', 125.875, 2),
(309, 'Funny Cat #11', 'vyibor-imenie-dlya-koshki.jpg', 61.6708984375, 4),
(310, 'Funny Cat #2', '1234118535_68935_poster2000.jpg', 317.787109375, 1),
(311, 'Funny Cat #6', '7399953_d5f93f00.jpg', 140.50390625, 0),
(312, 'Funny Cat #7', 'Cat-Picture-Begging.jpg', 432.841796875, 2),
(313, 'Funny Cat #9', 'cat-5-63.jpg', 181.2705078125, 0),
(314, 'Funny Cat #12', 'cat-wallpaper-7.jpg', 310.4892578125, 2),
(315, 'Funny Cat #14', 'funny-cat.jpg', 53.634765625, 0),
(316, 'Funny Cat #16', 'most-popular-funny-cats-compilat.jpg', 110.482421875, 7),
(317, 'Funny Cat #18', 'picture.jpg', 115.837890625, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `funnycats`
--
ALTER TABLE `funnycats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `funnycats`
--
ALTER TABLE `funnycats`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
