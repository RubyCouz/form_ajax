-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 août 2019 à 07:33
-- Version du serveur :  5.7.26-log
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `utilisateurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `mdp`
--

DROP TABLE IF EXISTS `mdp`;
CREATE TABLE IF NOT EXISTS `mdp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sess` varchar(255) NOT NULL,
  `userID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_ins` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_ins`) VALUES
(1, 'chuck norris', '$2y$10$h2oTvAPj7IRP/k1gFVRhUeWAYno.SRrBQkcgdjNROg7xPo63PxvUC', 'chuck_norris@gmail.com', '2019-08-23'),
(5, 'new', '$2y$10$JjPAxFif8XBzxHZTD4fxAeQ01pR2WQcq9Yig/zgjorF.gbgRgiAIa', 'truc@bidule.net', '2019-08-26'),
(6, 'lesaventuresdetotoetdesesamis', '$2y$10$uFV2LQ1fPWQRCF6ynS2FuOryrfakft0knbH3HlzZq0nd8HkNB67qO', 'toto@genie.org', '2019-08-26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
