-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2014 г., 13:44
-- Версия сервера: 5.6.17-log
-- Версия PHP: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailDate` varchar(100) NOT NULL,
  `mailName` varchar(25) NOT NULL,
  `mailEmail` varchar(50) NOT NULL,
  `mailMessage` text NOT NULL,
  `mailIp` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `mail`
--

INSERT INTO `mail` (`id`, `mailDate`, `mailName`, `mailEmail`, `mailMessage`, `mailIp`) VALUES
(1, '00:00:00', 'name', 'email@mail.ro', 'aaaaaaaaa aaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaaaa a', '127.0.0.1'),
(2, '1418895412', 'namea1', 'email@mail.ro', 'aaaaaaawwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwaaaaa a', '127.0.0.1'),
(3, '1418895418', 'namea1', 'email@mail.ro', 'aaaaaaawwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwaaaaa a', '127.0.0.1'),
(4, 'Thu, December 18, 2014', 'namea1', 'email@mail.ro', 'aaaaaaawwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwaaaaa a', '127.0.0.1'),
(5, 'Thu, December 18, 2014', 'sadad', 'asas@dsadsds.sp', 'Данные запроса не должны проходить через функции вроде mysql_real_escape_string(), чтобы убедиться, что нет угрозы атаки &#34;SQL-впрыска&#34;[4] Вместо этого, клиент и сервер MySQL работают так, чтобы убедиться, что посланные данные безопасно обработаны при их комбинировании с подготовленным выражением. ', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
