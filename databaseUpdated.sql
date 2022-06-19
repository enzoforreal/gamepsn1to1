-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour game1to1
CREATE DATABASE IF NOT EXISTS `game1to1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `game1to1`;

-- Listage de la structure de la table game1to1. classement
CREATE TABLE IF NOT EXISTS `classement` (
  `idClassement` int(11) NOT NULL,
  `bestPlayerOfMonth` varchar(50) DEFAULT NULL,
  `top100Players` varchar(50) DEFAULT NULL,
  `bestPlayerOfWeek` varchar(50) DEFAULT NULL,
  `bestPlayerOfYear` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idClassement`),
  UNIQUE KEY `bestPlayerOfMonth` (`bestPlayerOfMonth`),
  UNIQUE KEY `top100Players` (`top100Players`),
  UNIQUE KEY `bestPlayerOfWeek` (`bestPlayerOfWeek`),
  UNIQUE KEY `bestPlayerOfYear` (`bestPlayerOfYear`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. classementutilisateur
CREATE TABLE IF NOT EXISTS `classementutilisateur` (
  `login` varchar(50) NOT NULL,
  `idClassement` int(11) NOT NULL,
  PRIMARY KEY (`login`,`idClassement`),
  KEY `idClassement` (`idClassement`),
  CONSTRAINT `classementutilisateur_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  CONSTRAINT `classementutilisateur_ibfk_2` FOREIGN KEY (`idClassement`) REFERENCES `classement` (`idClassement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. listenoire
CREATE TABLE IF NOT EXISTS `listenoire` (
  `idListeNoire` int(11) NOT NULL,
  PRIMARY KEY (`idListeNoire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. listenoireutilisateur
CREATE TABLE IF NOT EXISTS `listenoireutilisateur` (
  `login` varchar(50) NOT NULL,
  `idListeNoire` int(11) NOT NULL,
  PRIMARY KEY (`login`,`idListeNoire`),
  KEY `idListeNoire` (`idListeNoire`),
  CONSTRAINT `listenoireutilisateur_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  CONSTRAINT `listenoireutilisateur_ibfk_2` FOREIGN KEY (`idListeNoire`) REFERENCES `listenoire` (`idListeNoire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. logs
CREATE TABLE IF NOT EXISTS `logs` (
  `route` varchar(50) NOT NULL,
  `loggedVisits` int(11) DEFAULT '0',
  `visitorsVisits` int(11) DEFAULT '0',
  PRIMARY KEY (`route`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. logs_tmp
CREATE TABLE IF NOT EXISTS `logs_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logs_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. messageprive
CREATE TABLE IF NOT EXISTS `messageprive` (
  `login` varchar(50) NOT NULL,
  `login_1` varchar(50) NOT NULL,
  `message` text,
  `follow` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`login`,`login_1`),
  KEY `login_1` (`login_1`),
  CONSTRAINT `messageprive_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  CONSTRAINT `messageprive_ibfk_2` FOREIGN KEY (`login_1`) REFERENCES `utilisateur` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. messagepublic
CREATE TABLE IF NOT EXISTS `messagepublic` (
  `idMessage` int(11) NOT NULL,
  `message` text,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. party
CREATE TABLE IF NOT EXISTS `party` (
  `idParty` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `bet` double DEFAULT NULL,
  `login_1` varchar(50) DEFAULT 'player-waiting',
  `score` char(5) NOT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `game` varchar(50) DEFAULT NULL,
  `statut` tinyint(4) DEFAULT '0',
  `dateAtCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateAtUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idParty`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` varchar(255) NOT NULL DEFAULT '0',
  `login` varchar(50) NOT NULL,
  `from_currency` char(3) DEFAULT 'EUR',
  `enterred_amount` float NOT NULL,
  `to_currency` varchar(10) DEFAULT NULL,
  `amount` float NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. plateform
CREATE TABLE IF NOT EXISTS `plateform` (
  `idPlatforme` varchar(50) NOT NULL,
  `namePlatform` varchar(10) NOT NULL,
  `nameOfGame` varchar(20) NOT NULL,
  PRIMARY KEY (`idPlatforme`),
  UNIQUE KEY `namePlatform` (`namePlatform`),
  UNIQUE KEY `nameOfGame` (`nameOfGame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. recompense
CREATE TABLE IF NOT EXISTS `recompense` (
  `idRecompense` int(11) NOT NULL,
  `eliteBadge` varchar(50) DEFAULT NULL,
  `platinumBadge` varchar(50) DEFAULT NULL,
  `goldBadge` varchar(50) DEFAULT NULL,
  `silverBadge` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRecompense`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. recompenseutilisateur
CREATE TABLE IF NOT EXISTS `recompenseutilisateur` (
  `login` varchar(50) NOT NULL,
  `idRecompense` int(11) NOT NULL,
  PRIMARY KEY (`login`,`idRecompense`),
  KEY `idRecompense` (`idRecompense`),
  CONSTRAINT `recompenseutilisateur_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  CONSTRAINT `recompenseutilisateur_ibfk_2` FOREIGN KEY (`idRecompense`) REFERENCES `recompense` (`idRecompense`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(50) NOT NULL,
  `pseudoPlatform` varchar(50) NOT NULL,
  `balance` float NOT NULL  DEFAULT '0',
  `platform` char(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `est_valide` tinyint(1) NOT NULL,
  `clef` int(11) DEFAULT NULL,
  `numberOfBans` int(11) DEFAULT NULL,
  `numberOfConnections` int(11) DEFAULT NULL,
  `totalPoints` int(11) DEFAULT NULL,
  `numberOfWins` int(11) DEFAULT NULL,
  `numberOfDefeats` int(11) DEFAULT NULL,
  `numberOfDraws` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `nbFollowers` int(11) DEFAULT NULL,
  `isBanned` tinyint(4) NOT NULL,
  `lastIP` varchar(30) DEFAULT NULL,
  `lastSeen` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateAtCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataAtUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`login`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `pseudoPlatform` (`pseudoPlatform`),
  UNIQUE KEY `telephone` (`telephone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. utilisateurplatform
CREATE TABLE IF NOT EXISTS `utilisateurplatform` (
  `idPlatforme` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`idPlatforme`,`login`),
  KEY `login` (`login`),
  CONSTRAINT `utilisateurplatform_ibfk_1` FOREIGN KEY (`idPlatforme`) REFERENCES `plateform` (`idPlatforme`),
  CONSTRAINT `utilisateurplatform_ibfk_2` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. utimessagepublic
CREATE TABLE IF NOT EXISTS `utimessagepublic` (
  `login` varchar(50) NOT NULL,
  `idMessage` int(11) NOT NULL,
  PRIMARY KEY (`login`,`idMessage`),
  KEY `idMessage` (`idMessage`),
  CONSTRAINT `utimessagepublic_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  CONSTRAINT `utimessagepublic_ibfk_2` FOREIGN KEY (`idMessage`) REFERENCES `messagepublic` (`idMessage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table game1to1. withdrawal
CREATE TABLE IF NOT EXISTS `withdrawal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `from_currency` char(3) DEFAULT 'EUR',
  `enterred_amount` float NOT NULL,
  `address` varchar(100) NOT NULL ,
  `to_currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
