-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 22 2016 г., 08:07
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `url_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `long_url` text NOT NULL,
  `short_url` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `urls`
--

INSERT INTO `urls` (`id`, `long_url`, `short_url`) VALUES
(1, 'https://www.google.ru', 'b'),
(2, 'https://vk.com/im?peers=c79', 'c'),
(3, 'http://erevak.ru/altai/page/2/', 'd'),
(4, 'http://yourway.nethouse.ru/nkatyn', 'e'),
(5, 'http://habrahabr.ru/post/275219/', 'f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
