-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 sep. 2018 à 08:02
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshopb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `idR` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `Avis` varchar(255) DEFAULT NULL,
  `idTokken` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idTokken`),
  KEY `idR` (`idR`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `labelC` varchar(50) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idC`, `labelC`) VALUES
(1, 'Pizza'),
(2, 'Kebab');

-- --------------------------------------------------------

--
-- Structure de la table `resto`
--

DROP TABLE IF EXISTS `resto`;
CREATE TABLE IF NOT EXISTS `resto` (
  `idR` int(11) NOT NULL AUTO_INCREMENT,
  `Ville` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Classement` int(11) NOT NULL,
  `idC` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Code_Postal` int(11) NOT NULL,
  PRIMARY KEY (`idR`),
  KEY `idC` (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resto`
--

INSERT INTO `resto` (`idR`, `Ville`, `Adresse`, `Classement`, `idC`, `Nom`, `Code_Postal`) VALUES
(1, 'Nantes', '57 boulevard Victor Hugo', 1, 2, 'Zac', 44200),
(2, 'Nantes', '16 boulevard Général de Gaule', 2, 1, 'Dominos', 44200);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `LastName`, `FirstName`, `Mail`, `Mdp`) VALUES
(1, 'Fauvel', 'Baptiste', 'baptistefauvel@outlook.fr', 'test');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `resto` (`idR`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`idU`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `resto`
--
ALTER TABLE `resto`
  ADD CONSTRAINT `resto_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `categories` (`idC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
