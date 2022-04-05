-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3309
-- Généré le : jeu. 24 mars 2022 à 15:41
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `email` varchar(127) NOT NULL,
  `adresse` varchar(127) NOT NULL,
  `mdp` varchar(127) NOT NULL,
  `codePostal` int(20) NOT NULL,
  `ville` varchar(127) NOT NULL,
  `statut` varchar(127) NOT NULL,
  `numTel` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `name`, `email`, `adresse`, `mdp`, `codePostal`, `ville`, `statut`, `numTel`) VALUES
(1, 'hassani bilal', 'dark.night974@laposte.net', 'qsdqsd', '88690604ab67606fdd632b0faa839c35', 31000, 'Auch', 'BTS SIO', 708050510),
(2, 'hassani bilal', 'dark.night974@laposte.net', 'qsdqsd', '23590917e2f6a40da4e3948940d70946', 31000, 'Auch', 'BTS SIO', 708050510),
(3, 'amin', 'amin@lebg.fr', 'chez moi rue du 7', '202cb962ac59075b964b07152d234b70', 31000, 'Auch', 'BTS SIO', 708050510),
(4, 'amin', 'amin@lebg.fr', 'chez moi rue du 7', '30ae43ad1aa0a416699051b73a3dfcf6', 31000, 'Auch', 'BTS MCO', 708050510);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
