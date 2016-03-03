-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 03 2016 г., 07:18
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


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

DROP TABLE IF EXISTS `COMMENTS`;
CREATE TABLE IF NOT EXISTS `COMMENTS` (
  `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код комментария',
  `TEXT` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Содержание',
  `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
  `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
  `TIME_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата создания',
  PRIMARY KEY (`ID_COMMENT`),
  KEY `FID_TICKET` (`FID_TICKET`),
  KEY `FID_USER` (`FID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Комментарии' AUTO_INCREMENT=212 ;

--
-- Дамп данных таблицы `COMMENTS`
--

INSERT INTO `COMMENTS` (`ID_COMMENT`, `TEXT`, `FID_TICKET`, `FID_USER`, `TIME_CREATE`) VALUES
(101, 'eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu', 1, 27, '2016-03-03 00:42:32'),
(102, 'at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id', 1, 13, '2016-03-03 00:42:32'),
(103, 'at lacus. Quisque purus sapien, gravida non,', 1, 22, '2016-03-03 00:42:32'),
(104, 'molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed', 1, 12, '2016-03-03 00:42:32'),
(105, 'dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique', 1, 14, '2016-03-03 00:42:32'),
(106, 'quis, tristique ac, eleifend vitae, erat.', 1, 23, '2016-03-03 00:42:32'),
(107, 'ornare, libero at auctor ullamcorper,', 1, 18, '2016-03-03 00:42:32'),
(108, 'convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a,', 1, 13, '2016-03-03 00:42:32'),
(109, 'Integer vitae nibh. Donec est mauris, rhoncus', 1, 10, '2016-03-03 00:42:32'),
(110, 'Nunc commodo auctor velit. Aliquam nisl. Nulla eu', 1, 23, '2016-03-03 00:42:32'),
(111, 'lorem vitae odio sagittis semper. Nam tempor diam', 1, 10, '2016-03-03 00:42:32'),
(112, 'Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit', 1, 29, '2016-03-03 00:42:32'),
(113, 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla', 1, 17, '2016-03-03 00:42:32'),
(114, 'consequat, lectus', 1, 29, '2016-03-03 00:42:32'),
(115, 'et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et,', 1, 20, '2016-03-03 00:42:32'),
(116, 'Integer urna. Vivamus', 1, 10, '2016-03-03 00:42:32'),
(201, 'Добавить комментарий', 1, 1, '2016-03-03 01:31:13'),
(202, 'Добавить комментарий', 1, 1, '2016-03-03 01:31:43'),
(203, 'asdfasdf', 1, 1, '2016-03-03 01:55:55'),
(204, 'asdfasdf', 1, 1, '2016-03-03 01:56:44'),
(205, 'pjax', 1, 1, '2016-03-03 01:57:10'),
(206, 'pjax 2', 1, 1, '2016-03-03 02:00:19'),
(207, 'Просто супер комментарий', 1, 1, '2016-03-03 02:07:36'),
(208, '` more times', 1, 1, '2016-03-03 02:26:21'),
(209, 'asdfasdfasdf', 1, 1, '2016-03-03 02:28:34'),
(210, 'проверка пиджака', 1, 1, '2016-03-03 02:28:56'),
(211, 'зофч 4', 1, 1, '2016-03-03 02:30:36');

-- --------------------------------------------------------

--
-- Структура таблицы `D_CATEGORIES`
--

DROP TABLE IF EXISTS `D_CATEGORIES`;
CREATE TABLE IF NOT EXISTS `D_CATEGORIES` (
  `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код категории',
  `NAME_CATEGORY` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Категория',
  PRIMARY KEY (`ID_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `D_CATEGORIES`
--

INSERT INTO `D_CATEGORIES` (`ID_CATEGORY`, `NAME_CATEGORY`) VALUES
(1, 'Ремонт помещений'),
(2, 'Уборка помещений'),
(3, 'Техническое обслуживание помещений'),
(4, 'Уборка прилегающей территории'),
(5, 'Техническое обслуживание прилегающей территории'),
(6, 'Заказ МТР'),
(7, 'Ремонт МТР'),
(8, 'Аудит МТР');

-- --------------------------------------------------------

--
-- Структура таблицы `D_STATUSES`
--

DROP TABLE IF EXISTS `D_STATUSES`;
CREATE TABLE IF NOT EXISTS `D_STATUSES` (
  `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код статуса',
  `NAME_STATUS` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Статус',
  `IS_FINAL` int(11) NOT NULL COMMENT 'Флаг конечного статуса',
  PRIMARY KEY (`ID_STATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица статусов' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `D_STATUSES`
--

INSERT INTO `D_STATUSES` (`ID_STATUS`, `NAME_STATUS`, `IS_FINAL`) VALUES
(0, 'Закрытая', 1),
(1, 'Подтверждение закрытия', 0),
(2, 'Выполнение отложено', 0),
(3, 'В работе', 0),
(4, 'Обновлена заявителем', 0),
(5, 'Создана', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `EVENTS`
--

DROP TABLE IF EXISTS `EVENTS`;
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

DROP TABLE IF EXISTS `FILES`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Файлы' AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `FILES`
--

INSERT INTO `FILES` (`ID_FILE`, `FILENAME`, `FILEPATH`, `EXTENSION`, `UPLOAD_TIME`, `FID_TICKET`, `FID_USER`) VALUES
(10, '10.12.2015_09.01.2016_detalizaciya_9610800862', '/uploads/', 'xlsx', '2016-03-03 04:43:44', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `TICKETS`
--

DROP TABLE IF EXISTS `TICKETS`;
CREATE TABLE IF NOT EXISTS `TICKETS` (
  `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код заявки',
  `SUBJECT` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Тема',
  `DESCRIPTION` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Текст заявки',
  `FID_CATEGORY` int(11) NOT NULL COMMENT 'Код категории',
  `FID_CREATOR` int(11) NOT NULL COMMENT 'Код заявителя',
  `FID_PERFORMER` int(11) DEFAULT NULL COMMENT 'Код исполнителя',
  `FID_STATUS` int(11) NOT NULL COMMENT 'Статус',
  `TIME_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
  `TIME_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата изменения',
  PRIMARY KEY (`ID_TICKET`),
  KEY `FID_CREATOR` (`FID_CREATOR`),
  KEY `FID_CATEGORY` (`FID_CATEGORY`),
  KEY `FID_PERFORMER` (`FID_PERFORMER`),
  KEY `FID_STATUS` (`FID_STATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Заявки' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `TICKETS`
--

INSERT INTO `TICKETS` (`ID_TICKET`, `SUBJECT`, `DESCRIPTION`, `FID_CATEGORY`, `FID_CREATOR`, `FID_PERFORMER`, `FID_STATUS`, `TIME_CREATE`, `TIME_UPDATE`) VALUES
(1, 'Уборка снега', 'Уберите уже снег, в конце-то концов!!!', 5, 1, 1, 0, '2016-02-29 23:08:51', '2016-03-03 05:51:48'),
(2, 'Потолок отвалился', 'В туалете на втором этаже отвалился потолок. Прошу срочно принять меры!', 1, 1, 7, 5, '2016-03-03 05:36:18', '2016-03-03 05:57:57');

-- --------------------------------------------------------

--
-- Структура таблицы `USERS`
--

DROP TABLE IF EXISTS `USERS`;
CREATE TABLE IF NOT EXISTS `USERS` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код пользователя',
  `USERNAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя пользователя',
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Пароль',
  `FIO` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ФИО',
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Адрес электронной почты',
  `ROLE` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Роль пользователя',
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `USERS`
--

INSERT INTO `USERS` (`ID_USER`, `USERNAME`, `PASSWORD`, `FIO`, `EMAIL`, `ROLE`) VALUES
(1, 'fintroll', '202cb962ac59075b964b07152d234b70', 'Облов Юрий Алексеевич', 'fintroll66692@gmail.com', 'admin'),
(2, 'cpavlov', '202cb962ac59075b964b07152d234b70', 'Василенко Дмитрий Александрович', 'cpotapov@bragin.ru', 'aho_emp'),
(3, 'gennadij74', '202cb962ac59075b964b07152d234b70', 'Лазарьков Игорь Петрович', 'qfilatov@narod.ru', 'aho_emp'),
(4, 'ersov.egor', '202cb962ac59075b964b07152d234b70', 'Лазарьков Василий Петрович', 'kristina.nosov@inbox.ru', 'aho_emp'),
(5, 'kopylov.leonid', '202cb962ac59075b964b07152d234b70', 'Бойко Василий Михайлович', 'lavrentij.naumov@belozerov.ru', 'aho_emp'),
(6, 'kulikov.ulij', '202cb962ac59075b964b07152d234b70', 'Бойко Василий Дмитриевич', 'orehov.robert@krukov.com', 'aho_emp'),
(7, 'prohor69', '202cb962ac59075b964b07152d234b70', 'Контеенко Василий Михайлович', 'bfrolov@fomin.ru', 'aho_emp'),
(8, 'ignatij24', '202cb962ac59075b964b07152d234b70', 'Лазарьков Василий Станиславович', 'tarasov.bronislav@denisov.com', 'aho_emp'),
(9, 'obelakov', '202cb962ac59075b964b07152d234b70', 'Василенко Игорь Дмитриевич', 'rozalina.suvorov@suvorov.ru', 'aho_emp'),
(10, 'faina.udin', '202cb962ac59075b964b07152d234b70', 'Василенко Игорь Валерьевич', 'fomin.zahar@mail.ru', 'aho_emp'),
(11, 'ddementev', '202cb962ac59075b964b07152d234b70', 'Василенко Василий Александрович', 'xnaumov@belousov.ru', 'aho_emp'),
(12, 'aleksej02', '202cb962ac59075b964b07152d234b70', 'Бойко Петр Валерьевич', 'jsysoev@solovev.com', 'aho_emp'),
(13, 'stepan.maslov', '202cb962ac59075b964b07152d234b70', 'Лазарьков Петр Валерьевич', 'rada.akusev@gmail.com', 'aho_emp'),
(14, 'panov.andrej', '202cb962ac59075b964b07152d234b70', 'Лазарьков Василий Игнатович', 'grigorij.belozerov@fokin.ru', 'aho_emp'),
(15, 'mpolakov', '202cb962ac59075b964b07152d234b70', 'Василенко Дмитрий Станиславович', 'lazarev.ivan@sazonov.net', 'aho_disp'),
(16, 'lgulaev', '202cb962ac59075b964b07152d234b70', 'Бойко Дмитрий Александрович', 'renata.nesterov@gmail.com', 'aho_disp'),
(17, 'dackov.galina', '202cb962ac59075b964b07152d234b70', 'Контеенко Игорь Антонович', 'tatana.melnikov@yandex.ru', 'aho_chief'),
(18, 'stefan.gromov', '202cb962ac59075b964b07152d234b70', 'Контеенко Дмитрий Петрович', 'milan.voronov@kotov.org', 'user'),
(19, 'ovasilev', '202cb962ac59075b964b07152d234b70', 'Бойко Петр Петрович', 'sofa50@ya.ru', 'user'),
(20, 'uivanov', '202cb962ac59075b964b07152d234b70', 'Контеенко Дмитрий Игоревич', 'klementina.doronin@mail.ru', 'user'),
(21, 'komissarov.trofim', '202cb962ac59075b964b07152d234b70', 'Василенко Петр Станиславович', 'kristina89@narod.ru', 'user'),
(22, 'ivan.voroncov', '202cb962ac59075b964b07152d234b70', 'Василенко Дмитрий Михайлович', 'alina.miheev@mail.ru', 'user'),
(23, 'nikiforov.leonid', '202cb962ac59075b964b07152d234b70', 'Бойко Дмитрий Станиславович', 'anton.birukov@ya.ru', 'user'),
(24, 'albina09', '202cb962ac59075b964b07152d234b70', 'Василенко Игорь Геннадьевич', 'alina.sazonov@bk.ru', 'user'),
(25, 'kazakov.irina', '202cb962ac59075b964b07152d234b70', 'Контеенко Дмитрий Александрович', 'florentina.kalasnikov@bk.ru', 'user'),
(26, 'zinaida.mihajlov', '202cb962ac59075b964b07152d234b70', 'Лазарьков Василий Семенович', 'gennadij.denisov@yandex.ru', 'user'),
(27, 'denisov.maksim', '202cb962ac59075b964b07152d234b70', 'Контеенко Василий Семенович', 'kapitolina59@mail.ru', 'user'),
(28, 'dkuznecov', '202cb962ac59075b964b07152d234b70', 'Василенко Василий Петрович', 'bsidorov@savin.com', 'user'),
(29, 'mihail44', '202cb962ac59075b964b07152d234b70', 'Василенко Дмитрий Михайлович', 'ulia.fomicev@suvorov.ru', 'user'),
(30, 'lidia36', '202cb962ac59075b964b07152d234b70', 'Контеенко Игорь Александрович', 'kpetrov@ya.ru', 'user'),
(31, 'adrian.loginov', '202cb962ac59075b964b07152d234b70', 'Василенко Игорь Александрович', 'isamsonov@gmail.com', 'user');

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
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`FID_CATEGORY`) REFERENCES `D_CATEGORIES` (`ID_CATEGORY`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`FID_CREATOR`) REFERENCES `USERS` (`ID_USER`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`FID_PERFORMER`) REFERENCES `USERS` (`ID_USER`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`FID_STATUS`) REFERENCES `D_STATUSES` (`ID_STATUS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
