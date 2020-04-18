-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 02 2020 г., 14:33
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `size` decimal(8,3) NOT NULL,
  `descr` varchar(50) NOT NULL,
  `views` int(10) NOT NULL COMMENT 'Просмотров'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `name`, `size`, `descr`, `views`) VALUES
(1, '1.jpeg', '96.300', 'Природа', 7),
(2, '2.jpg', '242.000', 'Природа', 3),
(3, '3.jpg', '525.000', 'Природа', 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
