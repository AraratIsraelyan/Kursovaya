-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2020 г., 13:20
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `company`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brigades`
--

CREATE TABLE `brigades` (
  `id_brigad` int(11) NOT NULL,
  `brigad_name` varchar(255) NOT NULL,
  `id_uprav` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `id_brigadir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brigades`
--

INSERT INTO `brigades` (`id_brigad`, `brigad_name`, `id_uprav`, `id_object`, `id_brigadir`) VALUES
(1, 'Пчёлки', 3, 3, 2),
(2, 'Тимуровцы', 2, 3, 4),
(3, 'Строй-ка', 1, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `dolzhnosti`
--

CREATE TABLE `dolzhnosti` (
  `id_dolzhnosti` int(11) NOT NULL,
  `dolzhnost_name` varchar(255) NOT NULL,
  `specialnost` varchar(255) NOT NULL,
  `atribut1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dolzhnosti`
--

INSERT INTO `dolzhnosti` (`id_dolzhnosti`, `dolzhnost_name`, `specialnost`, `atribut1`) VALUES
(1, 'Директор', 'инженер', '');

-- --------------------------------------------------------

--
-- Структура таблицы `graphic_objects`
--

CREATE TABLE `graphic_objects` (
  `id_type_job` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `date_nachalo` date NOT NULL,
  `date_end` date NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `date_cdachi` date NOT NULL,
  `id_brigad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `id_type_job` int(11) NOT NULL,
  `kolvo` int(11) NOT NULL,
  `ispolzovano` int(11) NOT NULL,
  `stoimost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE `objects` (
  `object_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id_object` int(11) NOT NULL,
  `id_uprav` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`object_name`, `address`, `id_object`, `id_uprav`) VALUES
('Школа №9', 'Кирова 129', 1, 3),
('Школа №29', 'Калинина 145', 2, 3),
('Арбитражный суд', 'Советская 91', 3, 2),
('Коттедж', 'Мечникова 12', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sotrudniki`
--

CREATE TABLE `sotrudniki` (
  `id_sotrudnika` int(11) NOT NULL,
  `id_brigad` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `date_naim` date NOT NULL,
  `passport` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `id_dolzhnosti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `stroi_uprav`
--

CREATE TABLE `stroi_uprav` (
  `id_uprav` int(11) NOT NULL,
  `uprav_name` varchar(50) NOT NULL,
  `director` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stroi_uprav`
--

INSERT INTO `stroi_uprav` (`id_uprav`, `uprav_name`, `director`) VALUES
(1, 'UrzikstanOKDA', 'Барков Роман'),
(2, 'АНКАП', 'Светов Михаил Владимирович'),
(3, 'Третий Рим', 'Воскобойников Пётр Семёнович');

-- --------------------------------------------------------

--
-- Структура таблицы `tehnika`
--

CREATE TABLE `tehnika` (
  `id_tehnika` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `tehnic_name` varchar(255) NOT NULL,
  `kolichestvo` int(11) NOT NULL,
  `id_type_job` int(11) NOT NULL,
  `id_uprav` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$HM55TmDeQz5QILWRKjhBkuWGM6liVIT4N90cuhgDIFrqZYl2mBT.e', '');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazchiki`
--

CREATE TABLE `zakazchiki` (
  `id_zakazchika` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `zak_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakazchiki`
--

INSERT INTO `zakazchiki` (`id_zakazchika`, `id_object`, `zak_name`) VALUES
(1, 3, 'Правительство РО'),
(2, 4, 'Владимиров В.В.'),
(3, 1, 'Правительство РО'),
(4, 2, 'Правительство РО');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brigades`
--
ALTER TABLE `brigades`
  ADD PRIMARY KEY (`id_brigad`),
  ADD KEY `id_object` (`id_object`);

--
-- Индексы таблицы `dolzhnosti`
--
ALTER TABLE `dolzhnosti`
  ADD PRIMARY KEY (`id_dolzhnosti`);

--
-- Индексы таблицы `graphic_objects`
--
ALTER TABLE `graphic_objects`
  ADD PRIMARY KEY (`id_type_job`),
  ADD KEY `id_object` (`id_object`),
  ADD KEY `id_brigad` (`id_brigad`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_type_job` (`id_type_job`);

--
-- Индексы таблицы `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id_object`),
  ADD KEY `id_uprav` (`id_uprav`);

--
-- Индексы таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  ADD PRIMARY KEY (`id_sotrudnika`),
  ADD KEY `id_dolzhnosti` (`id_dolzhnosti`),
  ADD KEY `id_brigad` (`id_brigad`);

--
-- Индексы таблицы `stroi_uprav`
--
ALTER TABLE `stroi_uprav`
  ADD PRIMARY KEY (`id_uprav`);

--
-- Индексы таблицы `tehnika`
--
ALTER TABLE `tehnika`
  ADD PRIMARY KEY (`id_tehnika`),
  ADD KEY `id_uprav` (`id_uprav`),
  ADD KEY `id_type_job` (`id_type_job`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakazchiki`
--
ALTER TABLE `zakazchiki`
  ADD PRIMARY KEY (`id_zakazchika`),
  ADD KEY `id_object` (`id_object`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brigades`
--
ALTER TABLE `brigades`
  MODIFY `id_brigad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `dolzhnosti`
--
ALTER TABLE `dolzhnosti`
  MODIFY `id_dolzhnosti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `graphic_objects`
--
ALTER TABLE `graphic_objects`
  MODIFY `id_type_job` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `objects`
--
ALTER TABLE `objects`
  MODIFY `id_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  MODIFY `id_sotrudnika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `stroi_uprav`
--
ALTER TABLE `stroi_uprav`
  MODIFY `id_uprav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tehnika`
--
ALTER TABLE `tehnika`
  MODIFY `id_tehnika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `zakazchiki`
--
ALTER TABLE `zakazchiki`
  MODIFY `id_zakazchika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `brigades`
--
ALTER TABLE `brigades`
  ADD CONSTRAINT `brigades_ibfk_1` FOREIGN KEY (`id_object`) REFERENCES `objects` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `graphic_objects`
--
ALTER TABLE `graphic_objects`
  ADD CONSTRAINT `graphic_objects_ibfk_1` FOREIGN KEY (`id_object`) REFERENCES `objects` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `graphic_objects_ibfk_2` FOREIGN KEY (`id_brigad`) REFERENCES `brigades` (`id_brigad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_type_job`) REFERENCES `graphic_objects` (`id_type_job`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `objects_ibfk_1` FOREIGN KEY (`id_uprav`) REFERENCES `stroi_uprav` (`id_uprav`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  ADD CONSTRAINT `sotrudniki_ibfk_1` FOREIGN KEY (`id_dolzhnosti`) REFERENCES `dolzhnosti` (`id_dolzhnosti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sotrudniki_ibfk_2` FOREIGN KEY (`id_brigad`) REFERENCES `brigades` (`id_brigad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tehnika`
--
ALTER TABLE `tehnika`
  ADD CONSTRAINT `tehnika_ibfk_1` FOREIGN KEY (`id_uprav`) REFERENCES `stroi_uprav` (`id_uprav`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tehnika_ibfk_2` FOREIGN KEY (`id_type_job`) REFERENCES `graphic_objects` (`id_type_job`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zakazchiki`
--
ALTER TABLE `zakazchiki`
  ADD CONSTRAINT `zakazchiki_ibfk_1` FOREIGN KEY (`id_object`) REFERENCES `objects` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
