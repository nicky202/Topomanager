-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 juin 2021 à 18:09
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `topomanager`
--

-- --------------------------------------------------------


--
-- Structure de la table `circonscription`
--

DROP TABLE IF EXISTS `circonscription`;
CREATE TABLE IF NOT EXISTS `circonscription` (
  `id_circonscription` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_circonscription` varchar(128) NOT NULL,
  `acronyme_circonscription` varchar(64) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_direction` int(11) NOT NULL,
  PRIMARY KEY (`id_circonscription`),
  KEY `fk_circonscription_service` (`id_service`),
  KEY `fk_circonscription_direction` (`id_direction`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `circonscription`
--

INSERT INTO `circonscription` (`id_circonscription`, `libelle_circonscription`, `acronyme_circonscription`, `id_service`, `id_direction`) VALUES
(1, 'CIRTOPO Antananarivo Renivohitra', 'C1', 3, 0),
(2, 'CIRTOPO Ambohidratrimo', 'C2', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

DROP TABLE IF EXISTS `direction`;
CREATE TABLE IF NOT EXISTS `direction` (
  `id_direction` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_direction` varchar(128) NOT NULL,
  `acronyme_direction` varchar(64) NOT NULL,
  PRIMARY KEY (`id_direction`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`id_direction`, `libelle_direction`, `acronyme_direction`) VALUES
(1, 'Direction des Etudes et Travaux Topographiques', 'DETT');

-- --------------------------------------------------------

--
-- Structure de la table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id_division` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_division` varchar(128) NOT NULL,
  `acronyme_division` varchar(64) NOT NULL,
  `rattachement` varchar(32) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_direction` int(11) NOT NULL,
  PRIMARY KEY (`id_division`),
  KEY `fk_division_service` (`id_service`),
  KEY `fk_division_direction` (`id_direction`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `division`
--

INSERT INTO `division` (`id_division`, `libelle_division`, `acronyme_division`, `rattachement`, `id_service`, `id_direction`) VALUES
(2, 'Division Etudes et Système d\'Informations', 'Div ESI', 'service', 1, 0),
(3, 'Division Suivie', 'DS', 'direction', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_service` varchar(128) NOT NULL,
  `acronyme_service` varchar(64) NOT NULL,
  `id_direction` int(11) NOT NULL,
  PRIMARY KEY (`id_service`),
  KEY `fk_service_direction` (`id_direction`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `libelle_service`, `acronyme_service`, `id_direction`) VALUES
(1, 'Service des Etudes et Méthodes', 'SEM', 1),
(2, 'Service des Travaux Spéciaux', 'STS', 1),
(3, 'Service Régional Topographique Analamanga', 'SRT Analamanga', 1),
(4, 'Service Régional Topographique Vakinankaratra', 'SRT Vakinankaratra', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `idtype_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_utilisateur` varchar(45) NOT NULL,
  PRIMARY KEY (`idtype_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`idtype_utilisateur`, `libelle_type_utilisateur`) VALUES
(5, 'Archivistes'),
(7, 'Responsable de la logistique'),
(10, 'superutilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `prenom` varchar(128) NOT NULL,
  `e_mail` varchar(128) NOT NULL,
  `login` varchar(64) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `id_type_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `idx_login` (`login`),
  KEY `fk_utilisateur_type_utilisateur` (`id_type_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `e_mail`, `login`, `mdp`, `valide`, `id_type_utilisateur`) VALUES
(1, 'ANDRIANTSARA', 'Salim Henri', 'salim.henri@gmail.com', 'salimhenri', '12345', 1, 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_type_utilisateur` FOREIGN KEY (`id_type_utilisateur`) REFERENCES `type_utilisateur` (`idtype_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
