-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 14 Septembre 2015 à 15:18
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tp_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` smallint(6) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) CHARACTER SET utf8 NOT NULL,
  `PASSWORD` varchar(20) CHARACTER SET utf8 NOT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `AVATAR` text,
  `ADMIN` tinyint(1) NOT NULL,
  `LANGUAGE` varchar(2) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID_USER`, `NAME`, `PASSWORD`, `EMAIL`, `AVATAR`, `ADMIN`, `LANGUAGE`) VALUES
(1, 'Guillaume', 'guillaume', 'guillaumeouellet77@h', NULL, 0, 'fr'),
(2, '', '', '', NULL, 0, ''),
(3, 'alex', 'alex', 'base_player96@hotmai', NULL, 1, 'fr'),
(4, 'alex', 'alex', 'base_player96@hotmai', NULL, 1, 'fr'),
(5, 'alex', 'alex', 'base_player96@hotmai', NULL, 1, 'fr'),
(6, 'alex', 'alex', 'base_player96@hotmai', NULL, 1, 'fr'),
(7, 'alex', 'alex', 'base_player96@hotmai', NULL, 1, 'fr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
