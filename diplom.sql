-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2022 г., 14:28
-- Версия сервера: 10.5.11-MariaDB
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `file`, `cover`, `category_id`) VALUES
(1, 'Тест', 'ehgtjehgk hkjgherjhg kjerh khergjhejrhg kejrhgke lrjgh kehrj hgekh keljh rkeljh ', '2629894fec522e.mp4', '0629894ebc7f10.jpg', 2),
(2, 'Тест 2', 'auhfskujghdr gheril ilerhfglerjhgle kehgerhj kejh ekhgrle khkehfg', NULL, 'empty.jpg', 3),
(3, 'Тест 3', '', 'empty.jpg', 'empty.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `course_category`
--

CREATE TABLE `course_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `course_category`
--

INSERT INTO `course_category` (`id`, `name`, `description`, `image`) VALUES
(2, 'Photoshop', 'Курсы фотожаба', 'button62988cdd5989a.png'),
(3, 'Illustrator', '', 'empty.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdate` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `body`, `createdate`, `img`, `status`) VALUES
(14, 'Больше чем путешествие', '<p style=\"text-align: left;\">Клуб Большой перемены ГАПОУ КО \"КТК\"</p>', '<p style=\"text-align: left;\">Клуб <strong>Большой перемены</strong> ГАПОУ КО \"КТК\" съездил в путешесвтие в Москву. Ребята прогулялись по парку бла бла бла</p>', 1654764497, '/images/222222222.jpg', 1),
(15, 'Новости', 'аФепр', 'рырнор', 1654764626, '/images/reg.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createDate` int(11) UNSIGNED NOT NULL,
  `rank` int(11) NOT NULL,
  `activate` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `typeofeducation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurs` int(1) DEFAULT NULL,
  `academic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `email`, `password`, `role`, `photo`, `cover`, `createDate`, `rank`, `activate`, `specialty`, `typeofeducation`, `kurs`, `academic`, `year`, `birthday`, `gender`, `phone`, `about`, `skills`) VALUES
(1, 'Администрация Сайта', 'admin@ktk40.ru', '$2y$13$E2fdsCv153inevHcbs5ZneR0/RWjX4nEFkHJ18NzuDwJ9mwdq8PqO', 0, '', '0', 1654244784, 1, '1', 'Диванный эксперт', '', 0, '', 0, '0000-00-00', 0, '0', '', ''),
(2, 'ТИПО ТИП', 'admin1@ktk40.ru', '123456', 0, '', '0', 1654244836, 2, '1', 'ыва', '', 0, '', 0, '0000-00-00', 0, '0', '', ''),
(3, 'Иванов Иван', 'admin@diploma.ru', '$2y$13$QpOrTrSwQe8t2aCuyaDz/ORycAviiI9Rla0XkmrFmqpqv2gUF28N2', 0, '0', '0', 1654244861, 3, '1', 'ыва', '', 0, '', 0, '0000-00-00', 0, '0', '', ''),
(5, 'Кирилл Анатольевич', 'adasdasdmin@diploma.ru', '$2y$13$qMC4zAGQ..6PqS8Nak1TwukRvHV889qqBAVytm81H/fTFgLHDsFYa', 0, '0', '0', 1654244963, 0, '1', '23кав', '', 0, '', 0, '0000-00-00', 0, '0', '', 'Illustrator, CCS, HTML'),
(7, 'Иванов Иван', 'adasdваыавыаsdfsdfwasdmin@diploma.ru', '$2y$13$qMC4zAGQ..6PqS8Nak1TwukRvHV889qqBAVytm81H/fTFgLHDsFYa', 0, '0', '0', 1654244963, 0, '1', '', '', 0, '', 0, '0000-00-00', 0, '0', '', ''),
(10, 'Валерия Февралева', 'LERA10FEVRALEVA@gmail.com', '$2y$13$HV2OXRUlbMzbyS5GwufOF.2sRAbFdSxgmhhinOEJteGDGAHhNfuGW', 1, '1111111162a19f4c5e3a7.jpg', '0', 1654448575, 4, '1', 'Графический дизайнер', 'Среднее специальное', 3, 'ГАПОУ КО \"КТК\"', 2019, '2000-02-12', 2, '+7800055563535', '<p style=\"text-align: center;\"><em>Я конфетка :)</em></p>', 'Photoshop|primary, Illustrator|warning, InDesign|danger'),
(11, 'Калинин Даниил', 'kalina@gmail.ru', '$2y$13$4JjZgp3vLf6vNRIvX3O1q.Hxm5uwTWhAo1PzbgCceHJ1hG9CDcHhG', 0, '0', '0', 1654762926, 0, '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Шустов Кирилл', 'kirill@gmail.com', '$2y$13$2/7DOnCz3pXo4nRn7Uy3WegHeZdcXzyOEIRqME55vFUTslHKQ4wLe', 0, '062a1c743323a5.jpg', '0', 1654765862, 0, '1', 'Программист', 'Среднее специальное', 2, 'ГАПОУ КО \"КТК\"', 2020, '12.02.2001', 1, '+7800055563535', '<p>123</p>', 'C#, C++, PHP, Unity'),
(13, 'Софья Чистова', 'sofa@gmail.com', '$2y$13$WjjqaWmZlmAPlNIxzIQH3.ouwN7pxE1PNXulyVNxkqEAaYKuJCGOi', 0, '0', '0', 1654770490, 0, '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `work_type` int(1) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `works`
--

INSERT INTO `works` (`id`, `user_id`, `work_type`, `file`) VALUES
(1, 10, 1, '/uploads/works/10/1.png'),
(2, 10, 1, '/uploads/works/10/2.png'),
(3, 10, 1, '/uploads/works/10/2.png'),
(4, 10, 1, '/uploads/works/10/2.png'),
(5, 10, 0, '/uploads/works/10/2.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_works_users` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `course_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `FK_works_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
