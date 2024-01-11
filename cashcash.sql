-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 jan. 2024 à 09:27
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cashcash`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `agence_num` int(11) NOT NULL,
  `agence_adresse` varchar(255) DEFAULT NULL,
  `agence_nom` varchar(255) DEFAULT NULL,
  `agence_telephone` varchar(50) DEFAULT NULL,
  `agence_mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `assistant` (
  `employe_num_matricule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `client` (
  `client_num` int(11) NOT NULL,
  `client_raison_sociale` varchar(255) DEFAULT NULL,
  `client_num_SIREN` int(11) DEFAULT NULL,
  `client_code_APE` varchar(255) DEFAULT NULL,
  `client_adresse` varchar(255) DEFAULT NULL,
  `client_téléphone` int(11) DEFAULT NULL,
  `client_num_télécopie` int(11) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `agence_num` int(11) NOT NULL,
  `nbkm_agence_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_num`, `client_raison_sociale`, `client_num_SIREN`, `client_code_APE`, `client_adresse`, `client_téléphone`, `client_num_télécopie`, `client_email`, `agence_num`, `nbkm_agence_client`) VALUES
(1, 'Client A', 123456789, 'APE001', '20 Rue Client', 1234567890, 987654321, 'clientA@example.com', 1, 20),
(2, 'Client B', 987654321, 'APE002', '30 Avenue Client', 2147483647, 876543219, 'clientB@example.com', 2, 34),
(3, 'Client C', 456789123, 'APE003', '40 Rue Client', 2147483647, 765432198, 'clientC@example.com', 3, 12),
(4, 'Client D', 789123456, 'APE004', '50 Avenue Client', 2147483647, 654321987, 'clientD@example.com', 4, 4),
(5, 'Client E', 123456789, 'APE005', '60 Rue Client', 2147483647, 543219876, 'clientE@example.com', 1, 31),
(6, 'Client F', 987654321, 'APE006', '70 Avenue Client', 2147483647, 432198765, 'clientF@example.com', 2, 17),
(7, 'Client G', 456789123, 'APE007', '80 Rue Client', 2147483647, 321987654, 'clientG@example.com', 3, 23);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

CREATE TABLE `contratmaintenance` (
  `contrat_num` int(11) NOT NULL,
  `contrat_date_signature` datetime DEFAULT NULL,
  `contrat_date_echeance` datetime DEFAULT NULL,
  `contrat_date_renouvellement` datetime DEFAULT NULL,
  `RefTypeContrat` int(11) NOT NULL,
  `client_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `employe` (
  `employe_num_matricule` int(11) NOT NULL,
  `employe_nom` varchar(255) DEFAULT NULL,
  `employe_prenom` varchar(255) DEFAULT NULL,
  `employe_adresse` varchar(255) DEFAULT NULL,
  `employe_date_embauche` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`employe_num_matricule`, `employe_nom`, `employe_prenom`, `employe_adresse`, `employe_date_embauche`) VALUES
(1, 'Bocquet', 'Louis', '1 Rue Principale', '2022-01-10 00:00:00'),
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

CREATE TABLE `intervention` (
  `intervention_id` int(11) NOT NULL,
  `intervention_date` date DEFAULT NULL,
  `intervention_heure` time DEFAULT NULL,
  `client_num` int(11) NOT NULL,
  `employe_num_matricule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`intervention_id`, `intervention_date`, `intervention_heure`, `client_num`, `employe_num_matricule`) VALUES
(1, '2024-01-20', '08:00:00', 1, 3),
(2, '2024-01-25', '09:30:00', 2, 4),
(3, '2024-01-08', '10:00:00', 3, 3),
(4, '2024-04-05', '11:30:00', 4, 4),
(5, '2024-05-10', '12:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `interventionmateriel`
--

CREATE TABLE `interventionmateriel` (
  `materiel_num_serie` int(11) NOT NULL,
  `intervention_id` int(11) NOT NULL,
  `tempsPasse` time DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `materiel` (
  `materiel_num_serie` int(11) NOT NULL,
  `materiel_date_vente` datetime DEFAULT NULL,
  `materiel_date_installation` datetime DEFAULT NULL,
  `materiel_prix_vente` decimal(15,2) DEFAULT NULL,
  `materiel_emplacement` varchar(255) DEFAULT NULL,
  `client_num` int(11) NOT NULL,
  `contrat_num` int(11) DEFAULT NULL,
  `materiel_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`materiel_num_serie`, `materiel_date_vente`, `materiel_date_installation`, `materiel_prix_vente`, `materiel_emplacement`, `client_num`, `contrat_num`, `materiel_type_id`) VALUES
(1, '2022-01-01 00:00:00', '2022-01-05 00:00:00', 1500.00, 'Bureau A', 1, 1, 1),
(2, '2022-02-01 00:00:00', '2022-02-05 00:00:00', 500.00, 'Bureau B', 2, 2, 2),
(3, '2022-03-01 00:00:00', '2022-03-05 00:00:00', 2000.00, 'Bureau C', 3, 3, 3),
(4, '2022-04-01 00:00:00', '2022-04-05 00:00:00', 1000.00, 'Bureau D', 4, 4, 4),
(5, '2022-05-01 00:00:00', '2022-05-05 00:00:00', 3000.00, 'Bureau E', 5, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `materiel_type`
--

CREATE TABLE `materiel_type` (
  `materiel_type_id` int(11) NOT NULL,
  `materiel_type_reference` varchar(255) DEFAULT NULL,
  `materiel_type_libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `materiel_type`
--

INSERT INTO `materiel_type` (`materiel_type_id`, `materiel_type_reference`, `materiel_type_libelle`) VALUES
(1, 'REF001', 'Ordinateur portable'),
(2, 'REF002', 'Imprimante'),
(3, 'REF003', 'Serveur'),
(4, 'REF004', 'Casque'),
(5, 'REF005', 'Sourie'),
(6, 'REF006', 'Clavier');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `outilstat`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `outilstat` (
`annee` int(4)
,`mois` int(2)
,`employe_num_matricule` int(11)
,`nb_intervention` bigint(21)
,`nb_km_parcourue` decimal(32,0)
,`durée_passée_sur_matériel` time
);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `employe_num_matricule` int(11) NOT NULL,
  `technicien_telephone` varchar(50) DEFAULT NULL,
  `technicien_nom_qualification` varchar(255) DEFAULT NULL,
  `technicien_date_obtention_qualification` datetime DEFAULT NULL,
  `technicien_mail` varchar(255) DEFAULT NULL,
  `agence_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `type_contrat` (
  `RefTypeContrat` int(11) NOT NULL,
  `DelaiIntervention` date DEFAULT NULL,
  `TauxApplicable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`RefTypeContrat`, `DelaiIntervention`, `TauxApplicable`) VALUES
(1, '2023-01-01', 10),
(2, '2023-02-01', 15),
(3, '2023-03-01', 20),
(4, '2023-04-01', 25),
(5, '2023-05-01', 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employe_num_matricule` int(11) NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`username`, `password`, `employe_num_matricule`, `roleID`) VALUES
('louis', 'azerty', 1, 3),
('test', 'test', 2, 2),
('test1', 'test', 3, 1),
('test2', 'test', 4, 2),
('test3', 'test', 5, 3),
('test4', 'test', 6, 4);

-- --------------------------------------------------------

--
-- Structure de la vue `outilstat`
--
DROP TABLE IF EXISTS `outilstat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outilstat`  AS SELECT year(`intervention`.`intervention_date`) AS `annee`, month(`intervention`.`intervention_date`) AS `mois`, `technicien`.`employe_num_matricule` AS `employe_num_matricule`, count(`intervention`.`intervention_id`) AS `nb_intervention`, sum(`client`.`nbkm_agence_client`) AS `nb_km_parcourue`, sec_to_time(sum(time_to_sec(`interventionmateriel`.`tempsPasse`))) AS `durée_passée_sur_matériel` FROM (((`technicien` join `intervention`) join `interventionmateriel`) join `client`) WHERE `technicien`.`employe_num_matricule` = `intervention`.`employe_num_matricule` AND `intervention`.`intervention_id` = `interventionmateriel`.`intervention_id` AND `client`.`client_num` = `intervention`.`client_num` GROUP BY year(`intervention`.`intervention_date`), month(`intervention`.`intervention_date`), `technicien`.`employe_num_matricule` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`agence_num`);

--
-- Index pour la table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`employe_num_matricule`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_num`),
  ADD KEY `agence_num` (`agence_num`);

--
-- Index pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD PRIMARY KEY (`contrat_num`),
  ADD UNIQUE KEY `client_num` (`client_num`),
  ADD KEY `RefTypeContrat` (`RefTypeContrat`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`employe_num_matricule`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`intervention_id`),
  ADD KEY `client_num` (`client_num`),
  ADD KEY `employe_num_matricule` (`employe_num_matricule`);

--
-- Index pour la table `interventionmateriel`
--
ALTER TABLE `interventionmateriel`
  ADD PRIMARY KEY (`materiel_num_serie`,`intervention_id`),
  ADD KEY `intervention_id` (`intervention_id`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`materiel_num_serie`),
  ADD KEY `client_num` (`client_num`),
  ADD KEY `contrat_num` (`contrat_num`),
  ADD KEY `materiel_type_id` (`materiel_type_id`);

--
-- Index pour la table `materiel_type`
--
ALTER TABLE `materiel_type`
  ADD PRIMARY KEY (`materiel_type_id`);

--
-- Index pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD PRIMARY KEY (`employe_num_matricule`),
  ADD KEY `agence_num` (`agence_num`);

--
-- Index pour la table `type_contrat`
--
ALTER TABLE `type_contrat`
  ADD PRIMARY KEY (`RefTypeContrat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`username`),
  ADD KEY `employe_num_matricule` (`employe_num_matricule`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assistant`
--
ALTER TABLE `assistant`
  ADD CONSTRAINT `assistant_ibfk_1` FOREIGN KEY (`employe_num_matricule`) REFERENCES `employe` (`employe_num_matricule`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`agence_num`) REFERENCES `agence` (`agence_num`);

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `contratmaintenance_ibfk_1` FOREIGN KEY (`RefTypeContrat`) REFERENCES `type_contrat` (`RefTypeContrat`),
  ADD CONSTRAINT `contratmaintenance_ibfk_2` FOREIGN KEY (`client_num`) REFERENCES `client` (`client_num`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `intervention_ibfk_1` FOREIGN KEY (`employe_num_matricule`) REFERENCES `employe` (`employe_num_matricule`),
  ADD CONSTRAINT `intervention_ibfk_2` FOREIGN KEY (`client_num`) REFERENCES `client` (`client_num`);

--
-- Contraintes pour la table `interventionmateriel`
--
ALTER TABLE `interventionmateriel`
  ADD CONSTRAINT `interventionmateriel_ibfk_1` FOREIGN KEY (`materiel_num_serie`) REFERENCES `materiel` (`materiel_num_serie`),
  ADD CONSTRAINT `interventionmateriel_ibfk_2` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`intervention_id`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`contrat_num`) REFERENCES `contratmaintenance` (`contrat_num`),
  ADD CONSTRAINT `materiel_ibfk_2` FOREIGN KEY (`client_num`) REFERENCES `client` (`client_num`),
  ADD CONSTRAINT `materiel_ibfk_3` FOREIGN KEY (`materiel_type_id`) REFERENCES `materiel_type` (`materiel_type_id`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`employe_num_matricule`) REFERENCES `employe` (`employe_num_matricule`),
  ADD CONSTRAINT `technicien_ibfk_2` FOREIGN KEY (`agence_num`) REFERENCES `agence` (`agence_num`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`employe_num_matricule`) REFERENCES `employe` (`employe_num_matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
