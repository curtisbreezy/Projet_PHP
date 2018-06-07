-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 juin 2018 à 09:15
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `auteurpost`, `titrepost`, `datepost`, `textepost`) VALUES
(10, 'MK72', 'Commentaire', '2018-06-06 10:40:00', '<p>Test du syst&egrave;me de commentaire</p>');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentairedate` datetime NOT NULL,
  `commentairetexte` text COLLATE utf8_unicode_ci NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `pseudo`, `commentairedate`, `commentairetexte`, `id_article`) VALUES
(1, 'MK', '2018-05-30 18:00:00', 'Hello', 0),
(2, 'mk', '2018-06-06 17:00:00', 'nonnnnnnnnnnnnnnnnn', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse_commentaire`
--

DROP TABLE IF EXISTS `reponse_commentaire`;
CREATE TABLE IF NOT EXISTS `reponse_commentaire` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `auteurreponse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datereponse` datetime NOT NULL,
  `textereponse` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reponse_commentaire`
--

INSERT INTO `reponse_commentaire` (`id_reponse`, `auteurreponse`, `datereponse`, `textereponse`, `id_commentaire`) VALUES
(1, 'mk', '2018-06-06 13:00:00', 'oui', 0),
(2, 'mk', '2018-06-06 14:00:00', 'oui', 0),
(3, 'mk', '2018-06-06 15:00:00', 'possible?', 0),
(4, 'mk', '2018-06-06 18:00:00', 'Pourquoi pas?', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_utilisateur`, `email`, `pseudo`, `mdp`) VALUES
(1, 'mourad.kheloui@gmail.com', 'MK72', '7c222fb2927d828af22f592134e8932480637c0d');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_commentaire`) REFERENCES `reponse_commentaire` (`id_reponse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
