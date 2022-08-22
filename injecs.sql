-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 25 2022 г., 10:11
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `injecs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `boooking`
--

CREATE TABLE `boooking` (
  `id_book` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `book` varchar(150) NOT NULL,
  `amount` int(11) NOT NULL,
  `deliv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boooking`
--

INSERT INTO `boooking` (`id_book`, `author`, `cost`, `status`, `book`, `amount`, `deliv`) VALUES
(94, 'user@mail.ru', 143400, 3, ' Быстросъем (квик-каплер) New Holland E215(3шт);', 0, 'г. Иваново, ул. Демидова, д.1'),
(96, 'test@t.ru', 90000, 3, ' Турбина 3536321 Holset(2шт);', 0, 'Самовывоз из магазина'),
(99, 'test@t.ru', 124500, 3, ' Насос 708-1S-11212(2шт);Клапан 195-15-00023 Komatsu D-355(1шт);', 0, 'Самовывоз из магазина'),
(109, 'user@mail.ru', 48379, 3, ' Турбина 1144004380 на Hitachi(1шт);ТНВД 2644H013 Delphi(2шт);', 0, 'г. Иваново, ул. Демидова, д.1'),
(112, 'user@mail.ru', 37000, 2, ' Бортовой редуктор 31Q6-40030(1шт);Звездочка 332-J0022(1шт);', 0, 'г. Иваново, ул. Демидова, д.1'),
(113, 'user@mail.ru', 500000, 1, 'Бетонолом Hitachi ZX-200', 1, ''),
(114, 'user@mail.ru', 13500, 1, 'Звездочка 332-J0022', 3, '');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_prod` int(11) NOT NULL,
  `name_prod` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `img` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_prod`, `name_prod`, `cost`, `img`, `amount`, `type`) VALUES
(1, 'Насос 9520A005G DELPHI', 12999, '/injecs/img/nas1.jpg', 0, 'насосы'),
(2, 'Насос 708-1S-11212', 1250, '/injecs/img/nas2.jpg', 174, 'насосы'),
(3, 'Турбина 1144004380 на Hitachi', 12999, '/injecs/img/turb1.jpg', 1234, 'турбины'),
(4, 'Турбина 3536321 Holset', 45000, '/injecs/img/turb2.jpg', 10, 'турбины'),
(5, 'Турбина 6505-52-5410 KOMATSU', 45000, '/injecs/img/turb3.jpg', 2, 'турбины'),
(6, 'ТНВД 2644H013 Delphi', 17690, '/injecs/img/nas4.jpg', 14, 'насосы'),
(7, 'Бетонолом Hitachi ZX-200', 500000, '/injecs/img/naves2.jpg', 5, 'навесное'),
(8, 'Быстросъем (квик-каплер) New Holland E215', 47800, '/injecs/img/naves1.jpg', 14, 'навесное'),
(9, 'Винт для быстросъема Komatsu PC200-7', 7400, '/injecs/img/naves3.jpg', 65, 'навесное'),
(10, 'Клапан 195-15-00023 Komatsu D-355', 122000, '/injecs/img/zap1.jpg', 3, 'запас'),
(11, 'Бортовой редуктор 31Q6-40030', 23500, '/injecs/img/another1.jpg', 2, 'другое'),
(12, 'Звездочка 332-J0022', 13500, '/injecs/img/hod1.jpg', 45, 'ходовая часть');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `name`, `password`, `role`) VALUES
('', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 2),
('admin', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('test2@t.ru', 'Иван', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
('test@t.ru', 'Михаил', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
('user@mail.ru', 'Вениамин', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `boooking`
--
ALTER TABLE `boooking`
  ADD PRIMARY KEY (`id_book`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prod`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `boooking`
--
ALTER TABLE `boooking`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
