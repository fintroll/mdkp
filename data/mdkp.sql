-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 29 2016 г., 16:40
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mdkp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `COMMENTS`
--

CREATE TABLE IF NOT EXISTS `COMMENTS` (
  `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код комментария',
  `TEXT` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Содержание',
  `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
  `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
  `TIME_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
  PRIMARY KEY (`ID_COMMENT`),
  KEY `FID_TICKET` (`FID_TICKET`),
  KEY `FID_USER` (`FID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Комментарии' AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Структура таблицы `D_CATEGORIES`
--

CREATE TABLE IF NOT EXISTS `D_CATEGORIES` (
  `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код категории',
  `NAME_CATEGORY` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Категория',
  PRIMARY KEY (`ID_CATEGORY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `D_STATUSES`
--

CREATE TABLE IF NOT EXISTS `D_STATUSES` (
  `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код статуса',
  `NAME_STATUS` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Статус',
  `IS_FINAL` int(11) NOT NULL COMMENT 'Флаг конечного статуса',
  PRIMARY KEY (`ID_STATUS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица статусов' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `EVENTS`
--

CREATE TABLE IF NOT EXISTS `EVENTS` (
  `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код события',
  `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
  `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
  `TIME_EVENT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата события',
  `DESCRIPTION` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Событие',
  `IS_SENT` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Флаг отправки',
  PRIMARY KEY (`ID_EVENT`),
  KEY `FID_USER` (`FID_USER`),
  KEY `FID_TICKET` (`FID_TICKET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='События' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `FILES`
--

CREATE TABLE IF NOT EXISTS `FILES` (
  `ID_FILE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код файла',
  `FILENAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя файла',
  `FILEPATH` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Относительный путь файла',
  `EXTENSION` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Расширение файла',
  `UPLOAD_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата загрузки',
  `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
  `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
  PRIMARY KEY (`ID_FILE`),
  KEY `FID_TICKET` (`FID_TICKET`),
  KEY `FID_USER` (`FID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Файлы' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `TICKETS`
--

CREATE TABLE IF NOT EXISTS `TICKETS` (
  `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код заявки',
  `SUBJECT` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Тема',
  `DESCRIPTION` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Текст заявки',
  `FID_CATEGORY` int(11) NOT NULL COMMENT 'Код категории',
  `FID_CREATOR` int(11) NOT NULL COMMENT 'Код заявителя',
  `FID_PERFORMER` int(11) NOT NULL COMMENT 'Код исполнителя',
  `FID_STATUS` int(11) NOT NULL COMMENT 'Статус',
  `TIME_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
  `TIME_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата изменения',
  PRIMARY KEY (`ID_TICKET`),
  KEY `FID_CREATOR` (`FID_CREATOR`),
  KEY `FID_CATEGORY` (`FID_CATEGORY`),
  KEY `FID_PERFORMER` (`FID_PERFORMER`),
  KEY `FID_STATUS` (`FID_STATUS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Заявки' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код пользователя',
  `USERNAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя пользователя',
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Пароль',
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Адрес электронной почты',
  `ROLE` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Роль пользователя',
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `EVENTS`
--
ALTER TABLE `EVENTS`
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`FID_USER`) REFERENCES `USERS` (`ID_USER`),
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`FID_TICKET`) REFERENCES `TICKETS` (`ID_TICKET`);

--
-- Ограничения внешнего ключа таблицы `FILES`
--
ALTER TABLE `FILES`
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`FID_USER`) REFERENCES `USERS` (`ID_USER`),
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`FID_TICKET`) REFERENCES `TICKETS` (`ID_TICKET`);

--
-- Ограничения внешнего ключа таблицы `TICKETS`
--
ALTER TABLE `TICKETS`
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`FID_STATUS`) REFERENCES `D_STATUSES` (`ID_STATUS`),
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`FID_CATEGORY`) REFERENCES `D_CATEGORIES` (`ID_CATEGORY`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`FID_CREATOR`) REFERENCES `USERS` (`ID_USER`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`FID_PERFORMER`) REFERENCES `USERS` (`ID_USER`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
