-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 sep. 2018 à 11:42
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

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
-- Structure de la table `resto`
--

DROP TABLE IF EXISTS `resto`;
CREATE TABLE IF NOT EXISTS `resto` (
  `idR` int(11) NOT NULL AUTO_INCREMENT,
  `vegan` tinyint(1) DEFAULT NULL,
  `parking` tinyint(1) DEFAULT NULL,
  `enfant` tinyint(1) DEFAULT NULL,
  `handicap` tinyint(1) DEFAULT NULL,
  `terrasse` tinyint(1) DEFAULT NULL,
  `bio` tinyint(1) DEFAULT NULL,
  `gluten` tinyint(1) DEFAULT NULL,
  `air` tinyint(1) DEFAULT NULL,
  `Ville` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Classement` int(11) NOT NULL,
  `idC` int(11) NOT NULL,
  PRIMARY KEY (`idR`),
  KEY `idC` (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resto`
--

INSERT INTO `resto` (`idR`, `vegan`, `parking`, `enfant`, `handicap`, `terrasse`, `bio`, `gluten`, `air`, `Ville`, `Adresse`, `Classement`, `idC`) VALUES
(1, 0, 1, 0, 1, 0, 1, 0, 1, 'Nantes', '6 rue Pommier', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resto`
--
ALTER TABLE `resto`
  ADD CONSTRAINT `resto_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `categories` (`idC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
