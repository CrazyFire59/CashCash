-- Agence
INSERT INTO Agence (agence_num, agence_adresse, agence_nom, agence_telephone, agence_mail)
VALUES 
(1, '123 Rue de la Paix', 'Agence Paris', '+33123456789', 'contact@agenceparis.com'),
(2, '456 Avenue des Champs', 'Agence Lyon', '+33456789123', 'contact@agencelyon.com'),
(3, '789 Boulevard des Fleurs', 'Agence Marseille', '+33678901234', 'contact@agencemarseille.com'),
(4, '321 Rue de la Paix', 'Agence Nice', '+33789012345', 'contact@agencenice.com');



-- Employe
INSERT INTO Employe (employe_num_matricule, employe_nom, employe_prenom, employe_adresse, employe_date_embauche)
VALUES 
(1, 'Dupont', 'Jean', '1 Rue Principale', '2022-01-10'),
(2, 'Martin', 'Sophie', '5 Avenue Centrale', '2022-02-15'),
(3, 'Lefebvre', 'Pierre', '10 Rue Grande', '2022-03-20'),
(4, 'Durand', 'Marie', '15 Avenue des Champs', '2022-04-25'),
(5, 'Bertrand', 'Lucie', '20 Rue des Fleurs', '2022-05-30'),
(6, 'Thomas', 'Antoine', '25 Avenue des Champs', '2022-06-05'),
(7, 'Girard', 'Emma', '30 Rue Principale', '2022-07-10'),
(8, 'Petit', 'Patrick', '35 Avenue des Champs', '2022-08-15'),
(9, 'Robert', 'Julie', '40 Rue Grande', '2022-09-20'),
(10, 'Moreau', 'Antoine', '45 Avenue des Champs', '2022-10-25');

-- materiel_type
INSERT INTO materiel_type (materiel_type_id, materiel_type_reference, materiel_type_libelle)
VALUES 
(1, 'REF001', 'Ordinateur portable'),
(2, 'REF002', 'Imprimante'),
(3, 'REF003', 'Serveur');

-- Assistant
INSERT INTO Assistant (employe_num_matricule)
VALUES 
(1),
(2),
(6),
(8);


-- Type_Contrat
INSERT INTO Type_Contrat (RefTypeContrat, DelaiIntervention, TauxApplicable)
VALUES 
(1, '2023-01-01', 10),
(2, '2023-02-01', 15),
(3, '2023-03-01', 20),
(4, '2023-04-01', 25),
(5, '2023-05-01', 30);

-- Client
INSERT INTO Client (client_num, client_raison_sociale, client_num_SIREN, client_code_APE, client_adresse, client_téléphone, client_num_télécopie, client_email, agence_num)
VALUES 
(1, 'Client A', 123456789, 'APE001', '20 Rue Client', 1234567890, 987654321, 'clientA@example.com', 1),
(2, 'Client B', 987654321, 'APE002', '30 Avenue Client', 2345678901, 876543219, 'clientB@example.com', 2),
(3, 'Client C', 456789123, 'APE003', '40 Rue Client', 3456789012, 765432198, 'clientC@example.com', 3),
(4, 'Client D', 789123456, 'APE004', '50 Avenue Client', 4567890123, 654321987, 'clientD@example.com', 4),
(5, 'Client E', 123456789, 'APE005', '60 Rue Client', 5678901234, 543219876, 'clientE@example.com', 1),
(6, 'Client F', 987654321, 'APE006', '70 Avenue Client', 6789012345, 432198765, 'clientF@example.com', 2),
(7, 'Client G', 456789123, 'APE007', '80 Rue Client', 7890123456, 321987654, 'clientG@example.com', 3);

-- ContratMaintenance
INSERT INTO ContratMaintenance (contrat_num, contrat_date_signature, contrat_date_echeance, contrat_date_renouvellement, RefTypeContrat, client_num)
VALUES 
(1, '2023-01-15', '2023-07-15', '2024-01-15', 1, 1),
(2, '2023-02-20', '2023-08-20', '2024-02-20', 2, 2),
(3, '2023-03-25', '2023-09-25', '2024-03-25', 3, 3),
(4, '2023-04-30', '2023-10-30', '2024-04-30', 4, 4),
(5, '2023-05-05', '2023-11-05', '2024-05-05', 5, 5);

-- Technicien
INSERT INTO Technicien (employe_num_matricule, technicien_telephone, technicien_nom_qualification, technicien_date_obtention_qualification, technicien_mail, agence_num)
VALUES 
(3, '+33123456789', 'Qualification A', '2022-05-01', 'technicienA@example.com', 1),
(4, '+33456789123', 'Qualification B', '2022-06-01', 'technicienB@example.com', 2),
(5, '+33567891234', 'Qualification C', '2022-07-01', 'technicienC@example.com', 3),
(7, '+33678912345', 'Qualification D', '2022-08-01', 'technicienD@example.com', 4),
(9, '+33789123456', 'Qualification E', '2022-09-01', 'technicienE@example.com', 1);
-- ... (ajouter autant d'enregistrements que nécessaire)

-- Materiel
INSERT INTO Materiel (materiel_num_serie, materiel_date_vente, materiel_date_installation, materiel_prix_vente, materiel_emplacement, client_num, contrat_num, materiel_type_id)
VALUES 
(1, '2022-01-01', '2022-01-05', 1500.00, 'Bureau A', 1, 1, 1),
(2, '2022-02-01', '2022-02-05', 500.00, 'Bureau B', 2, 2, 2),
(3, '2022-03-01', '2022-03-05', 2000.00, 'Bureau C', 3, 3, 3),
(4, '2022-04-01', '2022-04-05', 1000.00, 'Bureau D', 4, 4, 4),
(5, '2022-05-01', '2022-05-05', 3000.00, 'Bureau E', 5, 5, 5);
-- ... (ajouter autant d'enregistrements que nécessaire)

-- Intervention
INSERT INTO Intervention (intervention_id, intervention_date, intervention_heure, client_num, employe_num_matricule)
VALUES 
(1, '2023-01-20', '08:00:00', 1, 1),
(2, '2023-02-25', '09:30:00', 2, 2),
(3, '2023-03-30', '10:00:00', 3, 3),
(4, '2023-04-05', '11:30:00', 4, 4),
(5, '2023-05-10', '12:00:00', 5, 5);
-- ... (ajouter autant d'enregistrements que nécessaire)

-- InterventionMateriel
INSERT INTO InterventionMateriel (materiel_num_serie, intervention_id, tempsPasse, commentaire)
VALUES 
(1, 1, '02:00:00', 'Remplacement pièce'),
(2, 2, '01:30:00', 'Maintenance préventive'),
(3, 3, '01:00:00', 'Reparation'),
(4, 4, '00:30:00', 'Reparation'),
(5, 5, '01:00:00', 'Reparation');
-- ... (ajouter autant d'enregistrements que nécessaire)
