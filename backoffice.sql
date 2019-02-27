-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190220130033',	'2019-02-20 13:01:43'),
('20190220130235',	'2019-02-20 13:03:05'),
('20190220130551',	'2019-02-20 13:05:59'),
('20190220131208',	'2019-02-20 13:12:14'),
('20190220132017',	'2019-02-20 13:20:22');

DROP TABLE IF EXISTS `projets`;
CREATE TABLE `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B454C1DBA21214B7` (`categories_id`),
  CONSTRAINT `FK_B454C1DBA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `projets` (`id`, `titre`, `description`, `url`, `categories_id`) VALUES
(1,	'Projet1',	'dsdsdfsdff',	'dsfsdfdsdfs',	NULL),
(2,	'Projet2',	'fsdfs',	'dfsdfdsd',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expire_date` datetime DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `expire_date`, `token`, `email`, `roles`, `password`) VALUES
(8,	'2019-02-27 10:30:15',	'',	'a.bailly@onlineformapro.com',	NULL,	'$2y$10$fktKodBUiKbG6gua.XIEVebC3t6tHUbA7jucfzDvQoy3rSkH03MMy');

-- 2019-02-27 10:32:16
