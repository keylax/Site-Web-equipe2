-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 14 Septembre 2015 à 15:32
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
-- Structure de la table `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `ID_ACHIEVEMENT` smallint(6) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `OBJECTIVE` text NOT NULL,
  `POINTS` smallint(6) NOT NULL,
  `IMAGE` text NOT NULL,
  PRIMARY KEY (`ID_ACHIEVEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `arena`
--

CREATE TABLE IF NOT EXISTS `arena` (
  `ID_ARENA` smallint(6) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `IMAGE` text NOT NULL,
  PRIMARY KEY (`ID_ARENA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `ID_GAME` smallint(6) NOT NULL AUTO_INCREMENT,
  `WINNER` smallint(6) NOT NULL,
  `DATE` date NOT NULL,
  `GAME_TIME` smallint(6) NOT NULL,
  `ID_ARENA` smallint(6) NOT NULL,
  PRIMARY KEY (`ID_GAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `game_statistics`
--

CREATE TABLE IF NOT EXISTS `game_statistics` (
  `IDGAME_STATS` smallint(6) NOT NULL AUTO_INCREMENT,
  `ID_GAME` smallint(6) NOT NULL,
  `ID_USER` smallint(6) NOT NULL,
  `KILLS` smallint(6) NOT NULL,
  `GOALS` smallint(6) NOT NULL,
  `DEATHS` smallint(6) NOT NULL,
  `SHOTS_TO_GOALS` smallint(6) NOT NULL,
  `MISSILES_SHOTS` smallint(6) NOT NULL,
  `SUCCESSFUL_MISSILE_SHOTS` smallint(6) NOT NULL,
  `FUMBLES_DROPS` smallint(6) NOT NULL,
  `PROVOKED_DROPS` smallint(6) NOT NULL,
  `INTERCEPTIONS` smallint(6) NOT NULL,
  `POSSESSTION_TIME` time NOT NULL,
  PRIMARY KEY (`IDGAME_STATS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `ID_NEWS` smallint(6) NOT NULL AUTO_INCREMENT,
  `NAME` smallint(6) NOT NULL,
  `TEXT` text,
  `PUBLICATION_DATE` date NOT NULL,
  `ID_USER` smallint(6) NOT NULL,
  PRIMARY KEY (`ID_NEWS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`ID_NEWS`, `NAME`, `TEXT`, `PUBLICATION_DATE`, `ID_USER`) VALUES
(1, 0, 'Je suis first noob.', '2015-09-14', 1);

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

-- --------------------------------------------------------

--
-- Structure de la table `user_achievement`
--

CREATE TABLE IF NOT EXISTS `user_achievement` (
  `USER_ACHIEVEMENT` smallint(6) NOT NULL AUTO_INCREMENT,
  `ID_USER` smallint(6) NOT NULL,
  `ID_ACHIEVEMENT` smallint(6) NOT NULL,
  PRIMARY KEY (`USER_ACHIEVEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user_rating`
--

CREATE TABLE IF NOT EXISTS `user_rating` (
  `ID_RATING` smallint(6) NOT NULL AUTO_INCREMENT,
  `RATING` int(11) NOT NULL,
  `ID_ARENA` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_RATING`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
