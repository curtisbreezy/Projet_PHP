-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 juin 2018 à 12:39
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
-- Base de données :  `projet_5`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `auteurpost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titrepost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datepost` datetime NOT NULL,
  `textepost` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `auteurpost`, `titrepost`, `datepost`, `textepost`) VALUES
(12, 'Mourad', 'Modification', '2018-06-09 00:00:00', '<p>Gestion des articles fonctionnelle , merci Alexandre !</p>'),
(13, 'ALEX', 'Modification', '2018-06-11 09:51:00', '<p>Second article pour en voir le bon fonctionnement</p>');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentairedate` datetime NOT NULL,
  `commentairetexte` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `pseudo`, `commentairedate`, `commentairetexte`, `id_article`) VALUES
(3, 'MK', '2018-06-11 14:20:25', 'Hello', 13);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_utilisateur`, `email`, `pseudo`, `mdp`) VALUES
(1, 'mourad.kheloui@gmail.com', 'MK72', '7c222fb2927d828af22f592134e8932480637c0d'),
(2, 'curtis.jayden@gmail.com', 'ALEX', '7c222fb2927d828af22f592134e8932480637c0d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
