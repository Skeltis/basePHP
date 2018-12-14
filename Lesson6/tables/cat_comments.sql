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
-- Структура таблицы `cat_comments`
--

CREATE TABLE `cat_comments` (
  `id` int(5) NOT NULL,
  `linked_id` int(5) NOT NULL,
  `author` varchar(32) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cat_comments`
--

INSERT INTO `cat_comments` (`id`, `linked_id`, `author`, `text`, `date`) VALUES
(1, 304, 'Alex', 'Милый Котик', '2018-12-14'),
(2, 304, 'Qerre', 'Funny Cat!', '2018-12-14'),
(4, 304, 'Skeltis', 'Hello,cat!', '2018-12-14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cat_comments`
--
ALTER TABLE `cat_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cat_comments`
--
ALTER TABLE `cat_comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
