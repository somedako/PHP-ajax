-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 28 2020 г., 11:30
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
-- База данных: `php-ajax`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `author` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `author`) VALUES
(1, 'Первая статья', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec sapien turpis. Mauris venenatis nulla augue, vitae facilisis mauris interdum sed. Sed augue sapien, scelerisque eget ex non, molestie egestas nibh.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec sapien turpis. Mauris venenatis nulla augue, vitae facilisis mauris interdum sed. Sed augue sapien, scelerisque eget ex non, molestie egestas nibh. Cras sollicitudin felis ut faucibus fringilla. Suspendisse leo arcu, molestie in ex a, rhoncus sollicitudin quam.', 1600426199, 'Gora1234'),
(2, 'Вторая статья', 'Вторая тестовая статья', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec sapien turpis. Mauris venenatis nulla augue, vitae facilisis mauris interdum sed. Sed augue sapien, scelerisque eget ex non, molestie egestas nibh. Cras sollicitudin felis ut faucibus fringilla. Suspendisse leo arcu, molestie in ex a, rhoncus sollicitudin quam.', 1600427283, 'Gora1234'),
(3, 'Третья статья', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cum dolorem ducimus enim minima, officiis rerum vel voluptates! Error, provident, totam?', 1600427793, 'ivan');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `mess` text NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(3, 'Вася', 'test test', 2),
(6, 'Иван', 'test test test', 2),
(8, 'Вася', 'test test test', 2),
(10, 'Жорик', 'test test test test', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(60) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(1, 'Вася', 'vasya@gmail.com', 'vasya-nagibator', '$2y$10$/vQpdBKLTDJa/zOIO3psUOsS/vYJJ/Er4xXI9reBdkh8.HQ2w4uGa'),
(2, 'Валера', 'valera@gmail.com', 'valera12345', '$2y$10$D57NrFmpeCVZpE9mxoQis.rMDSOrdFExxxlbmVRIIOZwvhTfMufxC'),
(3, 'Петя', 'petya$gmail.com', 'petya876', '$2y$10$8vkNNfgn1APHvnehVjI2S./TkcEa4O/kMjXwAc9NVNXUeFPHyNWyW'),
(4, 'Саша', 'sasha@gmail.com', 'sasha88', '$2y$10$KtA4QnMe5QX8YIb7cgLy2uzaj13OwommnwXnz3LlwmamYwMwo5Cje'),
(6, 'Иван', 'ivan@gmail.com', 'ivan', '$2y$10$gp1YXzG8jjrEDw6pXE9eDuf2TaWzuC8qcP0Wyd2Na967zlPDABP.e'),
(7, 'Миша', 'misha@gm.com', 'misha', '$2y$10$.3ACz5cGVI.4i9MYdrtpduDymf6ufR.HNcbYMJp6A4lSKnoV/XMxa'),
(8, 'Модаст', 'modast@gm.com', 'modast', '$2y$10$t9co0LOWupOwI.CEZAIXS.8p3Z8ZYUQ3WAC05jMmly6eJwp9PiElG'),
(9, 'Ира', 'ira@gm.com', 'ira1', '$2y$10$DbX0UIOrdrkLQMNhG/6fN.3.PZmh6Jy0XOFMxKI4HjmVbCBdvvuZW'),
(10, 'Эдгар', 'edgar@gm.com', 'edgar12', '$2y$10$o09h/W5LMLnoIoN3AkvTGuvsA5ZwZDXpt26/JfeO/ICfDyVpJ3MWi'),
(11, 'Максим', 'max@gmail.com', 'maks', '$2y$10$JXAi.Drx/H7O25lm7SezF.Zu.C/DKZ.Zl96HTHOQAy1Lr/iZv0EKO'),
(12, 'Gora1234', 'gora1234@gmail.com', 'Gora1234', '$2y$10$oxrSGT9fn2A2QmYZHuFFLuH3tSAzmlMpj2deFhclwMp579aLzFJHO');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
