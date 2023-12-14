-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 déc. 2023 à 17:14
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cashcash2`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `agence_num` int(11) NOT NULL,
  `agence_adresse` varchar(255) DEFAULT NULL,
  `agence_nom` varchar(255) DEFAULT NULL,
  `agence_telephone` varchar(50) DEFAULT NULL,
  `agence_mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`agence_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`agence_num`, `agence_adresse`, `agence_nom`, `agence_telephone`, `agence_mail`) VALUES
(1, '123 Rue de la Paix', 'Agence Paris', '+33123456789', 'contact@agenceparis.com'),
(2, '456 Avenue des Champs', 'Agence Lyon', '+33456789123', 'contact@agencelyon.com'),
(3, '789 Boulevard des Fleurs', 'Agence Marseille', '+33678901234', 'contact@agencemarseille.com'),
(4, '321 Rue de la Paix', 'Agence Nice', '+33789012345', 'contact@agencenice.com');

-- --------------------------------------------------------

--
-- Structure de la table `assistant`
--

DROP TABLE IF EXISTS `assistant`;
CREATE TABLE IF NOT EXISTS `assistant` (
  `employe_num_matricule` int(11) NOT NULL,
  PRIMARY KEY (`employe_num_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assistant`
--

INSERT INTO `assistant` (`employe_num_matricule`) VALUES
(1),
(2),
(6),
(8);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_num` int(11) NOT NULL,
  `client_raison_sociale` varchar(255) DEFAULT NULL,
  `client_num_SIREN` int(11) DEFAULT NULL,
  `client_code_APE` varchar(255) DEFAULT NULL,
  `client_adresse` varchar(255) DEFAULT NULL,
  `client_téléphone` int(11) DEFAULT NULL,
  `client_num_télécopie` int(11) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `agence_num` int(11) NOT NULL,
  PRIMARY KEY (`client_num`),
  KEY `agence_num` (`agence_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_num`, `client_raison_sociale`, `client_num_SIREN`, `client_code_APE`, `client_adresse`, `client_téléphone`, `client_num_télécopie`, `client_email`, `agence_num`) VALUES
(1, 'Client A', 123456789, 'APE001', '20 Rue Client', 1234567890, 987654321, 'clientA@example.com', 1),
(2, 'Client B', 987654321, 'APE002', '30 Avenue Client', 2147483647, 876543219, 'clientB@example.com', 2),
(3, 'Client C', 456789123, 'APE003', '40 Rue Client', 2147483647, 765432198, 'clientC@example.com', 3),
(4, 'Client D', 789123456, 'APE004', '50 Avenue Client', 2147483647, 654321987, 'clientD@example.com', 4),
(5, 'Client E', 123456789, 'APE005', '60 Rue Client', 2147483647, 543219876, 'clientE@example.com', 1),
(6, 'Client F', 987654321, 'APE006', '70 Avenue Client', 2147483647, 432198765, 'clientF@example.com', 2),
(7, 'Client G', 456789123, 'APE007', '80 Rue Client', 2147483647, 321987654, 'clientG@example.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `contrat_num` int(11) NOT NULL,
  `contrat_date_signature` datetime DEFAULT NULL,
  `contrat_date_echeance` datetime DEFAULT NULL,
  `contrat_date_renouvellement` datetime DEFAULT NULL,
  `RefTypeContrat` int(11) NOT NULL,
  `client_num` int(11) NOT NULL,
  PRIMARY KEY (`contrat_num`),
  UNIQUE KEY `client_num` (`client_num`),
  KEY `RefTypeContrat` (`RefTypeContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contratmaintenance`
--

INSERT INTO `contratmaintenance` (`contrat_num`, `contrat_date_signature`, `contrat_date_echeance`, `contrat_date_renouvellement`, `RefTypeContrat`, `client_num`) VALUES
(1, '2023-01-15 00:00:00', '2023-07-15 00:00:00', '2024-01-15 00:00:00', 1, 1),
(2, '2023-02-20 00:00:00', '2023-08-20 00:00:00', '2024-02-20 00:00:00', 2, 2),
(3, '2023-03-25 00:00:00', '2023-09-25 00:00:00', '2024-03-25 00:00:00', 3, 3),
(4, '2023-04-30 00:00:00', '2023-10-30 00:00:00', '2024-04-30 00:00:00', 4, 4),
(5, '2023-05-05 00:00:00', '2023-11-05 00:00:00', '2024-05-05 00:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `employe_num_matricule` int(11) NOT NULL,
  `employe_nom` varchar(255) DEFAULT NULL,
  `employe_prenom` varchar(255) DEFAULT NULL,
  `employe_adresse` varchar(255) DEFAULT NULL,
  `employe_date_embauche` datetime DEFAULT NULL,
  PRIMARY KEY (`employe_num_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`employe_num_matricule`, `employe_nom`, `employe_prenom`, `employe_adresse`, `employe_date_embauche`) VALUES
(1, 'Dupont', 'Jean', '1 Rue Principale', '2022-01-10 00:00:00'),
(2, 'Martin', 'Sophie', '5 Avenue Centrale', '2022-02-15 00:00:00'),
(3, 'Lefebvre', 'Pierre', '10 Rue Grande', '2022-03-20 00:00:00'),
(4, 'Durand', 'Marie', '15 Avenue des Champs', '2022-04-25 00:00:00'),
(5, 'Bertrand', 'Lucie', '20 Rue des Fleurs', '2022-05-30 00:00:00'),
(6, 'Thomas', 'Antoine', '25 Avenue des Champs', '2022-06-05 00:00:00'),
(7, 'Girard', 'Emma', '30 Rue Principale', '2022-07-10 00:00:00'),
(8, 'Petit', 'Patrick', '35 Avenue des Champs', '2022-08-15 00:00:00'),
(9, 'Robert', 'Julie', '40 Rue Grande', '2022-09-20 00:00:00'),
(10, 'Moreau', 'Antoine', '45 Avenue des Champs', '2022-10-25 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `intervention_id` int(11) NOT NULL,
  `intervention_date` date DEFAULT NULL,
  `intervention_heure` time DEFAULT NULL,
  `client_num` int(11) NOT NULL,
  `employe_num_matricule` int(11) NOT NULL,
  PRIMARY KEY (`intervention_id`),
  KEY `client_num` (`client_num`),
  KEY `employe_num_matricule` (`employe_num_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`intervention_id`, `intervention_date`, `intervention_heure`, `client_num`, `employe_num_matricule`) VALUES
(1, '2023-01-20', '08:00:00', 1, 1),
(2, '2023-02-25', '09:30:00', 2, 2),
(3, '2023-03-30', '10:00:00', 3, 3),
(4, '2023-04-05', '11:30:00', 4, 4),
(5, '2023-05-10', '12:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `interventionmateriel`
--

DROP TABLE IF EXISTS `interventionmateriel`;
CREATE TABLE IF NOT EXISTS `interventionmateriel` (
  `materiel_num_serie` int(11) NOT NULL,
  `intervention_id` int(11) NOT NULL,
  `tempsPasse` time DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`materiel_num_serie`,`intervention_id`),
  KEY `intervention_id` (`intervention_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interventionmateriel`
--

INSERT INTO `interventionmateriel` (`materiel_num_serie`, `intervention_id`, `tempsPasse`, `commentaire`) VALUES
(1, 1, '02:00:00', 'Remplacement pièce'),
(2, 2, '01:30:00', 'Maintenance préventive'),
(3, 3, '01:00:00', 'Reparation'),
(4, 4, '00:30:00', 'Reparation'),
(5, 5, '01:00:00', 'Reparation');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `materiel_num_serie` int(11) NOT NULL,
  `materiel_date_vente` datetime DEFAULT NULL,
  `materiel_date_installation` datetime DEFAULT NULL,
  `materiel_prix_vente` decimal(15,2) DEFAULT NULL,
  `materiel_emplacement` varchar(255) DEFAULT NULL,
  `client_num` int(11) NOT NULL,
  `contrat_num` int(11) DEFAULT NULL,
  `materiel_type_id` int(11) NOT NULL,
  PRIMARY KEY (`materiel_num_serie`),
  KEY `client_num` (`client_num`),
  KEY `contrat_num` (`contrat_num`),
  KEY `materiel_type_id` (`materiel_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`materiel_num_serie`, `materiel_date_vente`, `materiel_date_installation`, `materiel_prix_vente`, `materiel_emplacement`, `client_num`, `contrat_num`, `materiel_type_id`) VALUES
(1, '2022-01-01 00:00:00', '2022-01-05 00:00:00', '1500.00', 'Bureau A', 1, 1, 1),
(2, '2022-02-01 00:00:00', '2022-02-05 00:00:00', '500.00', 'Bureau B', 2, 2, 2),
(3, '2022-03-01 00:00:00', '2022-03-05 00:00:00', '2000.00', 'Bureau C', 3, 3, 3),
(4, '2022-04-01 00:00:00', '2022-04-05 00:00:00', '1000.00', 'Bureau D', 4, 4, 4),
(5, '2022-05-01 00:00:00', '2022-05-05 00:00:00', '3000.00', 'Bureau E', 5, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `materiel_type`
--

DROP TABLE IF EXISTS `materiel_type`;
CREATE TABLE IF NOT EXISTS `materiel_type` (
  `materiel_type_id` int(11) NOT NULL,
  `materiel_type_reference` varchar(255) DEFAULT NULL,
  `materiel_type_libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`materiel_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel_type`
--

INSERT INTO `materiel_type` (`materiel_type_id`, `materiel_type_reference`, `materiel_type_libelle`) VALUES
(1, 'REF001', 'Ordinateur portable'),
(2, 'REF002', 'Imprimante'),
(3, 'REF003', 'Serveur');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `employe_num_matricule` int(11) NOT NULL,
  `technicien_telephone` varchar(50) DEFAULT NULL,
  `technicien_nom_qualification` varchar(255) DEFAULT NULL,
  `technicien_date_obtention_qualification` datetime DEFAULT NULL,
  `technicien_mail` varchar(255) DEFAULT NULL,
  `agence_num` int(11) NOT NULL,
  PRIMARY KEY (`employe_num_matricule`),
  KEY `agence_num` (`agence_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`employe_num_matricule`, `technicien_telephone`, `technicien_nom_qualification`, `technicien_date_obtention_qualification`, `technicien_mail`, `agence_num`) VALUES
(3, '+33123456789', 'Qualification A', '2022-05-01 00:00:00', 'technicienA@example.com', 1),
(4, '+33456789123', 'Qualification B', '2022-06-01 00:00:00', 'technicienB@example.com', 2),
(5, '+33567891234', 'Qualification C', '2022-07-01 00:00:00', 'technicienC@example.com', 3),
(7, '+33678912345', 'Qualification D', '2022-08-01 00:00:00', 'technicienD@example.com', 4),
(9, '+33789123456', 'Qualification E', '2022-09-01 00:00:00', 'technicienE@example.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

DROP TABLE IF EXISTS `type_contrat`;
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `RefTypeContrat` int(11) NOT NULL,
  `DelaiIntervention` date DEFAULT NULL,
  `TauxApplicable` int(11) DEFAULT NULL,
  PRIMARY KEY (`RefTypeContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`RefTypeContrat`, `DelaiIntervention`, `TauxApplicable`) VALUES
(1, '2023-01-01', 10),
(2, '2023-02-01', 15),
(3, '2023-03-01', 20),
(4, '2023-04-01', 25),
(5, '2023-05-01', 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
