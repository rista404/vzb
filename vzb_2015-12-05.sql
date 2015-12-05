# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.19-0ubuntu0.14.04.1)
# Database: vzb
# Generation Time: 2015-12-05 16:49:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dorms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dorms`;

CREATE TABLE `dorms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `dorms` WRITE;
/*!40000 ALTER TABLE `dorms` DISABLE KEYS */;

INSERT INTO `dorms` (`id`, `name`, `location`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Test','Test','<p>Test</p>\r\n','2015-12-05 13:31:52','2015-12-05 13:35:14');

/*!40000 ALTER TABLE `dorms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2015_12_04_201044_add_admin_user',2),
	('2015_12_04_202709_create_schools_table',3),
	('2015_12_04_203332_create_photos_table',4),
	('2015_12_04_212854_add_name_to_schools_table',5),
	('2015_12_05_122520_create_dorms_table',6),
	('2015_12_05_140422_create_organizations_table',7);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table organizations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `organizations`;

CREATE TABLE `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;

INSERT INTO `organizations` (`id`, `name`, `contact`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Test','<p>test</p>\r\n','<p>test</p>\r\n','2015-12-05 14:17:51','2015-12-05 14:21:08');

/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;

INSERT INTO `photos` (`id`, `school_id`, `location`, `created_at`, `updated_at`)
VALUES
	(1,153,'test.png','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,2,'uploads/5662a854d5843.jpg','2015-12-05 09:03:16','2015-12-05 09:03:16'),
	(6,2,'uploads/5662d5ac166b5.jpg','2015-12-05 12:16:44','2015-12-05 12:16:44'),
	(7,2,'uploads/5662d5ac17490.png','2015-12-05 12:16:44','2015-12-05 12:16:44'),
	(8,2,'uploads/5662d60de49e5.jpg','2015-12-05 12:18:21','2015-12-05 12:18:21');

/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schools
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schools`;

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;

INSERT INTO `schools` (`id`, `name`, `bus`, `created_at`, `updated_at`)
VALUES
	(12,'Филозофски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(30,'Учитељски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(16,'Пољопривредни факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(22,'Математички факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(29,'Технолошко-металуршки факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(23,'Правни факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(31,'Факултет ветеринарске медицине','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(8,'Филолошки факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(32,'Православни богословски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(13,'Грађевински факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(11,'Факултет политичких наука','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,'Електротехнички факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(24,'Рударско-геолошки факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(21,'Хемијски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(19,'Физички факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(145,'Универзитетска библиотека Светозар Марковић, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(28,'Технички факултет (Бор)','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(25,'Саобраћајни факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(15,'Машински факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(26,'Стоматолошки факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(27,'Шумарски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(14,'Медицински факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(153,'Завод за физику техничких факултета у Београду','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(6,'Фармацеутски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(7,'Факултет спорта и физичког васпитања','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,'Факултет безбедности','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(146,'Реткорат','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(20,'Географски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,'Економски факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'Факултет за специјалну едукацију и рехабилитацију','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(17,'Биолошки факултет','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(18,'Факултет за физичку хемију','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'Архитектонски факултет','25, 29','0000-00-00 00:00:00','2015-12-05 12:16:55'),
	(152,'Реткорат','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(87,'Факултет примењених уметности','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(85,'Факултет ликовних уметности','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(86,'Факултет музичке уметности','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(84,'Факултет драмских уметности','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(116,'В.ш.струк.студија за иформац.и комуникац.технологије, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(109,'Техникум таурунум-Висока инжењерска школа струковних студија у Београду','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(110,'Висока здравствена школа струковних студија Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(130,'Висока туристичка школа струковних студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(124,'Београдска пословна школа-Висока школа струковних студија','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(111,'Висока техничка школа струковних студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(105,'В.ш.електротехнике и рачунарства струковних студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(131,'Висока железничка школа струковних студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(106,'В.грађевинско-геодетска ш.струковних студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(122,'Висока хотелијерска школа струковних студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(107,'Висока ш.ликов.и примењ.уметности струк. студија, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(113,'Висока школа струковних студија-Београдсак политехника','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(120,'В.текстил. струк.ш. за дизајн, технологију и менаџмент, Београд','','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin@admin.com','$2y$10$acLoqVWdqsSqQy1WZArtOeqeKCXZrVbUmzfbbRg1.4wALh1kTJOBG','CA9GakDs2nME1cWcAKRowAW1s2ixNgm0bJJT2YW1tTUsYSPCotm0f7HUm5lN','0000-00-00 00:00:00','2015-12-04 20:23:42');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
