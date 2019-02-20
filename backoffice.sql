-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `projets`;
CREATE TABLE `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `projets` (`id`, `titre`, `description`, `url`) VALUES
(3,	'projet1',	'sfdfdfsdfdsf',	'sdfsdffds'),
(4,	'Projet2',	'sdgsdfd',	'dsfds');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1,	'antonin.bailly@online.fr',	'1234'),
(2,	'a.bailly@onlineformapro.com',	'$2y$10$a4slHZSUBIAzjOTZQrHlgOcvDlpwGKP3QCZBk0PhFJWlVtC.Lb9s.');

-- 2019-02-20 09:25:56
