DROP DATABASE IF EXISTS `Etudiant`;
--creation de la base de donnee Etudiant 
CREATE DATABASE IF NOT EXISTS `Etudiant`;
use `Etudiant`;


--Creation de la table utilisateur
CREATE TABLE IF NOT EXISTS `Utilisateur`
(
    `idUtilisateur` INT AUTO_INCREMENT ,
    `login` VARCHAR(40)  ,
    `password` VARCHAR(20) ,
    PRIMARY KEY(`idUtilisateur`)
);

--Creation de la table identification
CREATE TABLE IF NOT EXISTS `Identification`
(
    `idUtilisateur` INT AUTO_INCREMENT ,
    `Nom` TEXT ,
    `Prenom` TEXT ,
    `Civilite` TEXT,
    `Date_de_naissance` Date ,
    `Lieu_de_naissance` TEXT ,
    `CNI`TEXT ,
    `INE` TEXT ,
    `numero_carte`TEXT ,
    `Pays_de_naissance` TEXT ,
    `Nationalite` TEXT ,
    CONSTRAINT fk_identif_utilisateur FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);


--Creation de la table adresse
CREATE TABLE IF NOT EXISTS `Adresse`
(
    `idUtilisateur` INT AUTO_INCREMENT ,
    `Adresse_principale` TEXT ,
    `Adresse_secondaire` TEXT ,
    `Email` TEXT ,
    `Telephone_portable` TEXT ,
    `Telephone_fixe` TEXT ,
    `Email_personnel` TEXT ,
    `Email_institutionnel` TEXT ,
    `Boite_postale` TEXT,
    CONSTRAINT `fk_adresse_utilisateur` FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);



--creation de la table situation familiale
CREATE TABLE IF NOT EXISTS `Situation_familiale`
(
    `idUtilisateur` INT AUTO_INCREMENT ,
    `Situation_matriomoniale` ENUM('Marie','Célibataire','Veuf') ,
    `Nombre_enfants` INT CHECK(`Nombre_enfants` >= 0) ,
    CONSTRAINT `fk_situation_utilisateur` FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);


--creation de la table bourse
CREATE TABLE IF NOT EXISTS `Bourses`
(
    `idUtilisateur` INT AUTO_INCREMENT ,
    `Bourse` TEXT ,
    `Nature_de_la_bourse` TEXT ,
    `Montant_de_la_bourse` INT CHECK(`Montant_de_la_bourse` >= 0) ,
    CONSTRAINT `fk_bourses_utilisateur` FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);


--creation de la table contact
CREATE TABLE IF NOT EXISTS `Contact`
(
    `idUtilisateur` INT AUTO_INCREMENT,
    `Nom` TEXT ,
    `Prenom` TEXT ,
    `Adresse` TEXT ,
    `Ville` TEXT ,
    `Telephone_portable` TEXT ,
    `Telephone_fixe` TEXT ,
    `Email_personnel` TEXT ,
    `Boite_postale` TEXT,
    `Fax` TEXT,
    `Responsable_etudiant` TEXT,
    `Personne_a_contacter` TEXT,
    CONSTRAINT `fk_contact_utilisateur` FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);


--creation de la table Inscriptions administratives
CREATE TABLE IF NOT EXISTS `Inscriptions_Administratives`
(
    `idUtilisateur` INT AUTO_INCREMENT,
    `annnee_inscription` YEAR ,
    `Etat_inscription` TEXT,
    CONSTRAINT `fk_administrative_utilisateur` FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);

--creation de la table inscriptions pedagogique
CREATE TABLE IF NOT EXISTS `Inscriptions_Pedagogique`
(
    `idUtilisateur` INT AUTO_INCREMENT,
    `annee_Inscription` YEAR,
    `cycle` ENUM('1','2','3'),
    `niveau` ENUM('1','2','3'),
    `departement` TEXT ,
    `filiere` TEXT ,
    `Etat_inscription` TEXT,
    CONSTRAINT `fk_pedagogique_utilisateur` FOREIGN KEY(`idUtilisateur`) REFERENCES `Utilisateur`(`idUtilisateur`) ON UPDATE CASCADE ON DELETE CASCADE
);
