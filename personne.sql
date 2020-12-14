-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.4.13-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour croixrouge2021
CREATE DATABASE IF NOT EXISTS `croixrouge2021` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `croixrouge2021`;

-- Listage de la structure de la table croixrouge2021. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `idpersonne` int(11) NOT NULL AUTO_INCREMENT,
  `personne_immat` varchar(150) NOT NULL DEFAULT '',
  `personne_civilite` varchar(150) NOT NULL DEFAULT '',
  `personne_nom` varchar(150) NOT NULL,
  `personne_prenom` varchar(200) NOT NULL,
  `personne_date_naiss` date DEFAULT NULL,
  `personne_pays_naiss` varchar(50) DEFAULT NULL,
  `personne_pays_nationalite` varchar(50) DEFAULT NULL,
  `personne_ville_naiss` int(11) DEFAULT NULL,
  `personne_commune_naiss` int(11) DEFAULT NULL,
  `personne_ville_habitation` int(11) DEFAULT NULL,
  `lieuDeNaissance` varchar(850) DEFAULT NULL,
  `personne_situation_mat` int(11) DEFAULT NULL,
  `personne_commune_habitation` int(11) DEFAULT NULL,
  `personne_antecedent_medic` varchar(150) DEFAULT NULL,
  `personne_activite` varchar(150) DEFAULT NULL,
  `personne_qualification` varchar(150) DEFAULT NULL,
  `personne_telephone_1` varchar(150) DEFAULT NULL,
  `personne_telephone_2` varchar(150) DEFAULT NULL,
  `personne_email` varchar(150) DEFAULT NULL,
  `personne_nom_urgence` varchar(450) DEFAULT NULL,
  `personne_profil` int(11) DEFAULT 1,
  `personne_prenom_urgence` varchar(450) DEFAULT NULL,
  `personne_tel_urgence` varchar(450) DEFAULT NULL,
  `personne_nom_mere` varchar(450) DEFAULT 'NON',
  `personne_nationalite_mere` varchar(50) DEFAULT NULL,
  `personne_etat_mere` varchar(50) DEFAULT NULL,
  `personne_prenom_mere` varchar(450) DEFAULT 'NON',
  `personne_email_urgence` varchar(450) DEFAULT NULL,
  `personne_avoir_permis` varchar(450) DEFAULT 'NON',
  `personne_nom_pere` varchar(450) DEFAULT 'NON',
  `personne_prenom_pere` varchar(450) DEFAULT 'NON',
  `personne_numero_permis` varchar(450) DEFAULT 'NON',
  `personne_nationalite_pere` varchar(50) DEFAULT NULL,
  `personne_etat_pere` varchar(50) DEFAULT NULL,
  `fonctionCR_idfonctionCR` int(11) DEFAULT NULL,
  `profession_idprofession` int(11) DEFAULT NULL,
  `groupeSanguin` int(11) DEFAULT NULL,
  `comiteActuel` int(11) DEFAULT NULL,
  `TypePiece` int(11) DEFAULT NULL,
  `NumerPiece` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `personne_niveau_etude` varchar(50) DEFAULT NULL,
  `personne_ville_urgence` int(11) DEFAULT NULL,
  `personne_commune_urgence` int(11) DEFAULT NULL,
  `personne_quartier_urgence` varchar(50) DEFAULT NULL,
  `personne_top_valide` int(1) DEFAULT 1,
  PRIMARY KEY (`personne_immat`),
  KEY `fk_personne_profil1_idx` (`personne_profil`),
  KEY `fk_personne_ville1_idx` (`personne_ville_habitation`),
  KEY `fk_personne_commune1_idx` (`personne_commune_habitation`),
  KEY `fk_personne_ville2_idx` (`personne_ville_naiss`),
  KEY `fk_personne_commune2_idx` (`personne_commune_naiss`),
  KEY `fk_personne_fonctionCR1_idx` (`fonctionCR_idfonctionCR`),
  KEY `fk_personne_profession1_idx` (`profession_idprofession`),
  KEY `idpersonne` (`idpersonne`),
  KEY `personne_pays_naiss` (`personne_pays_naiss`),
  KEY `FK_personne_groupesanguin` (`groupeSanguin`),
  KEY `personne_pays_nationalite` (`personne_pays_nationalite`),
  KEY `FK_personne_comite` (`comiteActuel`),
  KEY `TypePiece` (`TypePiece`),
  KEY `personne_nationalite_mere` (`personne_nationalite_mere`),
  KEY `personne_nationalite_pere` (`personne_nationalite_pere`),
  KEY `personne_situation_mat` (`personne_situation_mat`),
  CONSTRAINT `FK_personne_comite` FOREIGN KEY (`comiteActuel`) REFERENCES `comite` (`idcomite`) ON UPDATE CASCADE,
  CONSTRAINT `FK_personne_groupesanguin` FOREIGN KEY (`groupeSanguin`) REFERENCES `groupesanguin` (`idGroupeSanguin`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_personne_pays_nationalite` FOREIGN KEY (`personne_pays_naiss`) REFERENCES `pays_nationalite` (`PAYS_CODE`) ON UPDATE NO ACTION,
  CONSTRAINT `FK_personne_situation_matrimoniale` FOREIGN KEY (`personne_situation_mat`) REFERENCES `situation_matrimoniale` (`idSitMat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_personne_typepiece` FOREIGN KEY (`TypePiece`) REFERENCES `typepiece` (`idTypePiece`) ON UPDATE CASCADE,
  CONSTRAINT `FK_personne_villes` FOREIGN KEY (`personne_pays_nationalite`) REFERENCES `pays_nationalite` (`PAYS_CODE`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_personne_commune1` FOREIGN KEY (`personne_commune_habitation`) REFERENCES `commune` (`idcommune`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_personne_commune2` FOREIGN KEY (`personne_commune_naiss`) REFERENCES `commune` (`idcommune`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_personne_fonctionCR1` FOREIGN KEY (`fonctionCR_idfonctionCR`) REFERENCES `fonctioncr` (`idfonctionCR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_personne_profession1` FOREIGN KEY (`profession_idprofession`) REFERENCES `profession` (`idprofession`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_personne_profil1` FOREIGN KEY (`personne_profil`) REFERENCES `profil` (`idprofil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_personne_ville1` FOREIGN KEY (`personne_ville_habitation`) REFERENCES `villes` (`VIL_IDENTIFIANT`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_personne_ville2` FOREIGN KEY (`personne_ville_naiss`) REFERENCES `villes` (`VIL_IDENTIFIANT`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Listage des données de la table croixrouge2021.personne : ~45 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` (`idpersonne`, `personne_immat`, `personne_civilite`, `personne_nom`, `personne_prenom`, `personne_date_naiss`, `personne_pays_naiss`, `personne_pays_nationalite`, `personne_ville_naiss`, `personne_commune_naiss`, `personne_ville_habitation`, `lieuDeNaissance`, `personne_situation_mat`, `personne_commune_habitation`, `personne_antecedent_medic`, `personne_activite`, `personne_qualification`, `personne_telephone_1`, `personne_telephone_2`, `personne_email`, `personne_nom_urgence`, `personne_profil`, `personne_prenom_urgence`, `personne_tel_urgence`, `personne_nom_mere`, `personne_nationalite_mere`, `personne_etat_mere`, `personne_prenom_mere`, `personne_email_urgence`, `personne_avoir_permis`, `personne_nom_pere`, `personne_prenom_pere`, `personne_numero_permis`, `personne_nationalite_pere`, `personne_etat_pere`, `fonctionCR_idfonctionCR`, `profession_idprofession`, `groupeSanguin`, `comiteActuel`, `TypePiece`, `NumerPiece`, `updated_at`, `created_at`, `personne_niveau_etude`, `personne_ville_urgence`, `personne_commune_urgence`, `personne_quartier_urgence`, `personne_top_valide`) VALUES
	(16, 'CRCI-2020-C1-16', 'Mr', 'Djamara', 'Edjuhe Cyrille', '1995-12-04', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'gerant de vitrine pour verre pharmaceutique', 'doctorant en mathematique', '45263626', NULL, NULL, 'Djamara', 1, 'Edjuhe Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-25 23:30:00', '2020-04-25 23:30:00', NULL, NULL, NULL, NULL, 1),
	(24, 'CRCI-2020-C1-24', 'Mr', 'Antonie', 'Jean Cedric', '1986-04-10', 'MLI', 'MLI', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'chirurgien', '45263626', NULL, 'akal@gmail.com', 'N\'Gaman', 1, 'Fabrice', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:05:00', '2020-04-26 05:05:00', NULL, NULL, NULL, NULL, 1),
	(25, 'CRCI-2020-C1-25', 'Mr', 'Assouan', 'Alfred', '1996-02-10', 'BFA', 'BFA', 1, 1, 1, NULL, NULL, 8, NULL, 'proprietaire gerant de pharmacie', 'pharmacienne', '45000054', NULL, 'mikimiki@gmail.com', 'Aka', 1, 'Houle', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:08:45', '2020-04-26 05:08:45', NULL, NULL, NULL, NULL, 1),
	(26, 'CRCI-2020-C1-26', 'Mr', 'Eboue', 'Severin', '1965-05-14', 'CIV', 'BDI', 1, 1, 1, NULL, 2, 1, NULL, 'proprietaire gerant de pharmacie', 'pharmacienne', '45263626', NULL, 'ablapokou@gmail.com', 'N\'cho', 1, 'Severin', '41256300', 'NON', 'CIV', '', 'NON', NULL, 'NON', 'NON', 'NON', '', 'CIV', '', 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:12:02', '2020-04-26 05:12:02', NULL, NULL, NULL, NULL, 1),
	(27, 'CRCI-2020-C1-27', 'Mr', 'Aka', 'Jean Marie', '1986-02-10', 'BFA', 'BFA', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'pharmacienne', '45263626', NULL, 'mikimiki@gmail.com', 'N\'goran', 1, 'Clovis', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:17:35', '2020-04-26 05:17:35', NULL, NULL, NULL, NULL, 1),
	(28, 'CRCI-2020-C1-28', 'Mr', 'Sery', 'Gaspard Jean Edgar', '1958-04-12', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, 'accident', 'vendeur de poulet au marché', 'commerçante', '57000075', NULL, 'ahou@gmail.com', 'N\'Gaman', 1, 'Augustin', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 4, 1, 1, 1, 'C 0012 3025 89', '2020-04-26 05:22:48', '2020-04-26 05:22:48', NULL, NULL, NULL, NULL, 1),
	(29, 'CRCI-2020-C1-29', 'Mr', 'Sery', 'Gaspard', '1985-10-10', 'MLI', 'MLI', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'pharmacienne', '45263626', NULL, 'akal@gmail.com', 'N\'Gaman', 1, 'Clovis', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:26:03', '2020-04-26 05:26:03', NULL, NULL, NULL, NULL, 1),
	(31, 'CRCI-2020-C1-31', 'Mr', 'Becho', 'Jean Brice', '1985-05-10', 'ARE', 'AGO', 1, 1, 1, NULL, NULL, 1, NULL, 'gerant de vitrine pour verre pharmaceutique', 'pharmacienne', '45263626', NULL, 'ahou@gmail.com', 'N\'Gaman', 1, 'Clovis', '74859001', 'NON', '0', NULL, 'NON', '74859001', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:55:35', '2020-04-26 05:55:35', NULL, NULL, NULL, NULL, 1),
	(32, 'CRCI-2020-C1-32', 'Mr', 'Sery', 'Gaspard', '1996-10-04', 'FRA', 'CIV', 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, '45263626', NULL, 'ahou@gmail.com', 'N\'choa', 1, 'Achile', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 05:58:16', '2020-04-26 05:58:16', NULL, NULL, NULL, NULL, 0),
	(33, 'CRCI-2020-C1-33', 'Mr', 'Digbeu', 'Dallo Jean claude le Roi', '1986-02-01', 'CIV', 'CIV', 788, 809, 1, 'Village situé à 45 km du campement BOIGNY', 1, 4, NULL, 'gerant de vitrine pour verre pharmaceutique de garde', 'pharmacienne', '45263626', NULL, 'digbeu1er@gmail.com', 'N\'goran', 1, 'Dallo Jean claude le Roi', '04120020', 'NON', 'CIV', '', 'NON', 'ngorandallo@yahoo.fr', 'NON', 'NON', 'NON', '', 'CIV', '', 1, 3, 1, 1, 2, 'P 0012 5435 89', '2020-04-26 06:01:20', '2020-04-26 06:01:20', NULL, NULL, NULL, NULL, 1),
	(34, 'CRCI-2020-C1-34', 'Mr', 'Aka', 'Cedric', '1986-10-04', 'ITA', 'CIV', 1, 1, 1, NULL, NULL, 6, NULL, NULL, NULL, '45263626', '03030030', 'mikimiki@gmail.com', 'N\'cho', 1, 'Achile', '74859001', 'NON', '0', NULL, 'NON', '74859001', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 06:04:29', '2020-04-26 06:04:29', NULL, NULL, NULL, NULL, 1),
	(35, 'CRCI-2020-C1-35', 'Mr', 'Enga', 'Georges Mikael', '1998-04-10', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire du maquis les VALLET', 'Entrepreneur', '57000075', '09809900', 'engageorges@gmail.com', 'Auleguer', 1, 'Patrick', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 0580 89', '2020-04-26 06:07:44', '2020-04-26 06:07:44', NULL, NULL, NULL, NULL, 1),
	(36, 'CRCI-2020-C1-36', 'Mme', 'Angaman', 'Marie Jeanne', '1998-05-02', 'CIV', 'CIV', 229, 4, 229, NULL, NULL, 250, NULL, 'proprietaire d\'un salon de couture', 'couturière', '06060006', NULL, NULL, 'N\'guetta', 1, 'Pierre Marie', '04150051', 'NON', '0', NULL, 'NON', '04150051', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 08:53:09', '2020-04-26 08:53:09', NULL, NULL, NULL, NULL, 0),
	(40, 'CRCI-2020-C1-40', 'Mr', 'DIEME', 'Aichatou', '1990-03-01', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'commerçante', 'commerçante', '87900099', NULL, NULL, 'YAO', 1, 'Rita', '09999099', 'NON', '0', NULL, 'NON', '09999099', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0985 3420 93', '2020-09-22 13:38:44', '2020-09-22 13:38:44', NULL, NULL, NULL, NULL, 0),
	(39, 'CRCI-2020-C13-39', 'Mme', 'DIEME', 'Aichatou', '1990-03-01', 'CIV', 'CIV', 208, 229, 1, 'A l\'hoptal regional', NULL, 1, NULL, 'commerçante', 'commerçante', '87900099', NULL, 'monami@gmail.com', 'YAO', 1, 'Aichatou', '47008207', 'NON', '0', NULL, 'NON', 'monami@gmail.com', NULL, 'NON', 'NON', 'NON', '0', NULL, 2, 1, 1, 22, 3, 'C 0985 3420 98', '2020-09-21 23:12:07', '2020-09-21 23:12:07', NULL, NULL, NULL, NULL, 1),
	(38, 'CRCI-2020-C2-38', 'Mr', 'AKPOUE', 'Eliasson Jean Firmin', '1987-06-09', 'CIV', 'CIV', 1, 1, 1, NULL, NULL, 8, 'accident de la circulation qui a causé un problème dans la jambe, utilisation de prothèse', 'responsable consultation à la clinique les BETERS', 'médecin généraliste', '09008999', '05253505', 'jeanf@gmail.com', 'Zamblé', 1, 'Richard', '09809000', 'NON', '0', NULL, 'NON', '09809000', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 3, 1, 2, 1, 'C 0107 0147 79', '2020-08-25 08:17:14', '2020-08-25 08:17:14', NULL, NULL, NULL, NULL, 1),
	(41, 'CRCI-2020-C2-41', 'Mr', 'GOBE', 'GUIZON Jean Antoinne', '1982-12-14', 'CIV', 'CIV', 115, 136, 1, 'A l\'hopital général, derrière la gendarmerie', NULL, 4, NULL, 'chef de chantier', 'technicien en batiment', '01989008', NULL, 'godejean@gmail.com', 'Ahou', 1, 'Josephine', '09890098', 'Niamke', 'CIV', 'decede', 'Helene', NULL, 'OUI', 'Gode', 'Jean Charles', 'XYZ-0989-2011', 'CIV', 'decede', 1, 6, 3, 2, 1, 'C 098790 786', '2020-09-29 09:58:23', '2020-09-29 09:58:23', NULL, NULL, NULL, NULL, 0),
	(42, 'CRCI-2020-C2-42', 'Mr', 'GOBE', 'GUIZON Jean Antoinne', '1982-12-14', 'CIV', 'CIV', 115, 136, 1, 'A l\'hopital général, derrière la gendarmerie', NULL, 4, NULL, 'chef de chantier', 'technicien en batiment', '01989008', NULL, 'godejean@gmail.com', 'Ahou', 1, 'Josephine', '09890098', 'Niamke', 'CIV', 'decede', 'Helene', NULL, 'OUI', 'Gode', 'Jean Charles', 'XYZ-0989-2011', 'CIV', 'decede', 1, 6, 3, 2, 1, 'C 098790 786', '2020-09-29 09:59:36', '2020-09-29 09:59:36', NULL, NULL, NULL, NULL, 1),
	(43, 'CRCI-2020-C2-43', 'Mr', 'GOBE', 'GUIZON Jean Antoinne', '1954-12-14', 'CIV', 'CIV', 115, 136, 115, 'A l\'hopital général, derrière la gendarmerie', NULL, 136, NULL, NULL, 'electricien', '45000054', NULL, 'godejean@gmail.com', 'ahou', 1, 'Helene', '74859001', 'Niamkey', 'CIV', 'decede', 'Elisabeth', NULL, 'OUI', 'GODE', 'Jean Charles', 'XYT-2012-43H', 'CIV', 'decede', 1, 6, 4, 2, 1, 'C 09 8765', '2020-09-29 10:03:57', '2020-09-29 10:03:57', NULL, NULL, NULL, NULL, 0),
	(44, 'CRCI-2020-C2-44', 'Mr', 'GODE', 'Jean Benoit', '1967-12-14', 'CIV', 'CIV', 115, 136, 1, 'A l\'hopital général', NULL, 4, NULL, 'chef maçon', 'Maçonnerie', '09809900', NULL, 'godejeanb@yahoo.fr', 'Ahou', 1, 'Helene', '04350890', 'Ezoumian', 'CIV', 'decede', 'Justine', NULL, 'OUI', 'Gode', 'Baptiste', 'SDF-2435', 'CIV', 'decede', 1, 6, 5, 2, 1, 'C 9067 4236', '2020-09-29 10:09:04', '2020-09-29 10:09:04', NULL, NULL, NULL, NULL, 0),
	(45, 'CRCI-2020-C2-45', 'Mr', 'GODE', 'BLEOU Martin', '1953-03-12', 'CIV', 'CIV', 115, 136, 1, 'A l\'hopital général', NULL, 4, NULL, 'instituteur', 'technicien en batiment', '45000054', NULL, 'godejean@yahoo.fr', 'Ahou', 1, 'Helene', '07950429', 'NIAMKEY', 'CIV', 'decede', 'Priscile', NULL, 'OUI', 'GODE', 'Baptiste', 'PERMIS-RTD-2012', 'CIV', 'decede', 1, 6, 1, 2, 1, 'C 7675 9890 09', '2020-09-29 10:22:23', '2020-09-29 10:22:23', NULL, NULL, NULL, NULL, 0),
	(46, 'CRCI-2020-C2-46', 'Mr', 'GODE', 'BLEOU Martin', '1953-03-12', 'CIV', 'CIV', 115, 136, 1, 'A l\'hopital général', NULL, 4, NULL, 'instituteur', 'technicien en batiment', '45000054', NULL, 'godejean@yahoo.fr', 'Ahou', 1, 'Helene', '07950427', 'NIAMKEY', 'CIV', 'decede', 'Priscile', NULL, 'OUI', 'GODE', 'Baptiste', 'PERMIS-RTD-2012', 'CIV', 'decede', 1, 6, 1, 2, 1, 'C 7675 9890 09', '2020-09-29 10:23:18', '2020-09-29 10:23:18', NULL, NULL, NULL, NULL, 0),
	(30, 'CRCI-2020-C4-30', 'Mr', 'Aka', 'Louis Paul', '1986-12-04', 'BDI', 'MWI', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'pharmacienne', '57000075', NULL, 'ahou@gmail.com', 'N\'goran', 1, 'Edjuhe Cyrille', '04120020', 'NON', '0', NULL, 'NON', '04120020', NULL, 'NON', 'NON', 'NON', '0', NULL, 2, 1, 1, 4, 1, 'C 0012 5435 89', '2020-04-26 05:31:03', '2020-04-26 05:31:03', NULL, NULL, NULL, NULL, 1),
	(37, 'CRCI-2020-C4-37', 'Mlle', 'Sery', 'Jeannette', '1984-12-14', 'CIV', 'CIV', 321, 342, 321, NULL, NULL, 342, 'accident de la circulation sur la chaussée', 'cuisinière', 'entrepreuneur', '04140441', NULL, NULL, 'Digbeu', 1, 'Alphonse', '05250552', 'NON', '0', NULL, 'NON', '05250552', NULL, 'NON', 'NON', 'NON', '0', NULL, 2, 1, 1, 4, 1, 'C 0012 5435 89', '2020-04-26 12:27:31', '2020-04-26 12:27:31', NULL, NULL, NULL, NULL, 1),
	(48, 'CRCI-2020-C76-48', 'Mr', 'SORI', 'Abdoulaye', '1976-08-12', 'CIV', 'CAN', 1, 6, 1, 'dallas', NULL, 3, NULL, 'LOGISTICIEN', 'LOGISTIQUE', '09889000', '58900676', 'djamara@gmail.com', 'COULIBALY', 1, 'MORI', '59 58 74 59', 'DJABATE', 'CIV', '', 'ALIMA', NULL, 'oui', 'SORO', 'YENEMA', 'COUL01-15-00113517I', 'CIV', '', 1, NULL, 1, 76, 1, 'C 9067 4236', '2020-10-01 11:10:14', '2020-10-01 11:10:14', NULL, NULL, NULL, NULL, 1),
	(47, 'CRCI-2020-C79-47', 'Mr', 'COULIBALY', 'IDRISSA', '1979-03-12', 'CIV', 'CIV', 1, 8, 1, 'A l\'hopital général de marcory', NULL, 8, NULL, 'LOGISTICIEN', 'LOGISTIQUE', '49 70 68 93', '49 70 68 93', 'idyckool@yahoo.fr', 'COULIBALY', 1, 'IDRISSA', '59 58 74 59', 'DJABATE', 'CIV', 'decede', 'ALIMA', NULL, 'OUI', 'COULIBALY', 'ZIE', 'PERMIS-RTD-2012', 'CIV', 'decede', 1, 1, 1, 79, 1, 'C 0040 1883 97', '2020-10-01 10:37:29', '2020-10-01 10:37:29', NULL, NULL, NULL, NULL, 1),
	(49, 'CRCI-2020-C79-49', 'Mr', 'Ahou', 'Jean Oscar', '1980-09-08', 'CIV', 'CIV', 1, 1, 1, 'CHR de cocody', NULL, 8, NULL, 'gerant de vitrine pour verre pharmaceutique', 'ophtamologue', '05385555', NULL, NULL, 'N\'guessan', 1, 'Alfred', '09566520', 'TOE BI', 'CIV', '', 'Yvette', NULL, 'OUI', 'AHUA', 'Raymond', 'AZERTY', 'CIV', '', 1, 1, 1, 79, 1, 'C-026399', '2020-10-01 11:20:21', '2020-10-01 11:20:21', NULL, NULL, NULL, NULL, 1),
	(50, 'CRCI-2020-C79-50', 'Mr', 'Daleba', 'Ehouan Kakou Joel', '1976-03-17', 'CIV', 'CIV', 530, 551, 1, NULL, 2, 5, 'asthmatique au bas âge , problème respiratoire survenu dans le passé', 'responsable d\'usine, tous travaux d\'électricité', 'informaticien industriel', '02130414', '47607760', 'dalebajoel@yahoo.fr', 'Mme Daleba née Djoudjo', 1, 'Srè Georgette', '78099009', 'Kakou', 'CIV', 'decede', 'Emilie', NULL, 'OUI', 'Daleba', 'Salif', '2012CDY3277211', 'CIV', 'decede', 1, 6, 6, 79, 1, 'C 9870 6573 98', '2020-10-06 15:51:46', '2020-10-06 15:51:46', NULL, NULL, NULL, NULL, 1),
	(5, 'CRCI/2020/1/4', 'Mr', 'Aka', 'Fabrice', '1985-04-11', 'CIV', NULL, 1, 5, 1, NULL, NULL, 6, 'asthme', 'proprietaire gerant de pharmacie', 'pharmacienne', '45000054', '03030030', 'akal@gmail.com', 'N\'guessan', 1, 'Augustin', '04120020', 'NON', '0', NULL, 'NON', '04120020', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 3, 1, 2, 1, 'C 0012 5435 89', '2020-04-19 08:37:59', '2020-04-19 08:37:59', NULL, NULL, NULL, NULL, 1),
	(11, 'CRCI/2020/C1/11', 'Mr', 'Ahoule', 'Aka leandre', '1996-02-01', 'FRA', NULL, 1, 1, 1, NULL, NULL, 8, 'asthme', 'responsable finance', 'pharmacienne', '45263626', NULL, 'ahou@gmail.com', 'Djamara', 1, 'Edjuhe Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-19 17:18:51', '2020-04-19 17:18:51', NULL, NULL, NULL, NULL, 1),
	(12, 'CRCI/2020/C1/12', 'Mlle', 'Sidibe', 'Salimata', '1991-04-11', 'CIV', 'CIV', 2, 5, 1, NULL, NULL, 1, NULL, 'controle de gestion', 'pharmacienne', '57000075', NULL, 'sidibesali@gmail.com', 'Kante', 1, 'Fatoumata', '01014395', 'NON', '0', NULL, 'NON', '01014395', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 3, 1, 'C 0012 5435 89', '2020-04-19 17:28:29', '2020-04-19 17:28:29', NULL, NULL, NULL, NULL, 1),
	(15, 'CRCI/2020/C1/15', 'Mr', 'N\'cho', 'Aka leandre', '1854-04-10', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'doctorant en mathematique', '45263626', NULL, 'akal@gmail.com', 'Djamara', 1, 'Edjuhe Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-25 23:11:36', '2020-04-25 23:11:36', NULL, NULL, NULL, NULL, 0),
	(17, 'CRCI/2020/C1/17', 'Mr', 'Djamara', 'Edjuhe Cyrille', '1986-04-10', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'doctorant en mathematique', '45263626', NULL, 'sienmarie@yahoo.fr', 'Djamara', 1, 'Edjuhe Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 03:45:52', '2020-04-26 03:45:52', NULL, NULL, NULL, NULL, 0),
	(18, 'CRCI/2020/C1/18', 'Mr', 'Djamara', 'Edjuhe Cyrille', '1985-02-10', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'doctorant en mathematique', '45263626', NULL, 'mikimiki@gmail.com', 'Djamara', 1, 'Edjuhe Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 03:49:19', '2020-04-26 03:49:19', NULL, NULL, NULL, NULL, 0),
	(19, 'CRCI/2020/C1/19', 'Mr', 'N\'cho', 'Aka leandre', '1985-04-10', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'gerant de vitrine pour verre pharmaceutique', 'doctorant en mathematique', '45263626', NULL, 'ahou@gmail.com', 'N\'guessan', 1, 'Jacquelline', '04120020', 'NON', '0', NULL, 'NON', '04120020', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 03:54:34', '2020-04-26 03:54:34', NULL, NULL, NULL, NULL, 1),
	(20, 'CRCI/2020/C1/20', 'Mr', 'Aka', 'Jean Marie', '2015-12-10', 'ABW', 'ABW', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'doctorant en mathematique', '45263626', '03030030', 'ahou@gmail.com', 'N\'guessan', 1, 'Augustin', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 03:57:44', '2020-04-26 03:57:44', NULL, NULL, NULL, NULL, 0),
	(21, 'CRCI/2020/C1/21', 'Mr', 'N\'cho', 'Edjuhe Cyrille', '1875-04-10', 'ALB', 'ARE', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'doctorant en mathematique', '45263626', NULL, 'ahou@gmail.com', 'N\'guessan', 1, 'Abou', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 04:09:14', '2020-04-26 04:09:14', NULL, NULL, NULL, NULL, 1),
	(22, 'CRCI/2020/C1/22', 'Mr', 'Aka', 'Fortune', '1985-12-05', 'AND', 'AGO', 1, 1, 1, NULL, NULL, 1, NULL, 'responsable finance', 'doctorant en mathematique', '45263626', NULL, 'ahou@gmail.com', 'Aloiui', 1, 'Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 04:12:24', '2020-04-26 04:12:24', NULL, NULL, NULL, NULL, 1),
	(23, 'CRCI/2020/C1/23', 'Mr', 'Antoine', 'Gaspard', '1986-02-10', 'ITA', 'MLI', 1, 1, 1, NULL, NULL, 1, NULL, 'proprietaire gerant de pharmacie', 'chirurgien', '45263626', NULL, 'akal@gmail.com', 'Djamara', 1, 'Edjuhe Cyrille', '41256300', 'NON', '0', NULL, 'NON', '41256300', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-26 04:58:43', '2020-04-26 04:58:43', NULL, NULL, NULL, NULL, 1),
	(7, 'CRCI/2020/C1/6', 'Mr', 'Sery', 'Oscar', '1986-04-11', 'FRA', NULL, 1, 1, 1, NULL, NULL, 1, NULL, 'professeur du privé', 'doctorant en mathematique', '54001221', NULL, 'oscarsery@gmail.com', 'ahou', 1, 'Gislene', '01014395', 'NON', '0', NULL, 'NON', '01014395', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 2, 1, 2, 1, 'C 0012 5435 89', '2020-04-19 08:50:19', '2020-04-19 08:50:19', NULL, NULL, NULL, NULL, 1),
	(10, 'CRCI/2020/C1/8', 'Mr', 'alexou', 'Jean leandre', '1986-04-10', 'ABW', NULL, 1, 1, 1, NULL, NULL, 1, NULL, 'gerant de vitrine pour verre pharmaceutique', 'chirurgien', '57000075', NULL, '123@gmail.com', 'N\'guessan', 1, 'Edjuhe Cyrille', '04120020', 'NON', '0', NULL, 'NON', '04120020', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 1, 1, 'C 0012 5435 89', '2020-04-19 17:14:02', '2020-04-19 17:14:02', NULL, NULL, NULL, NULL, 1),
	(13, 'CRCI/2020/C21/13', 'Mr', 'Attebi', 'Zeriga Alphonse', '1959-03-14', 'CIV', 'CIV', 229, 1, 1, NULL, NULL, 31, NULL, 'jardinier', 'jardinerie', '03781898', NULL, NULL, 'Ehouman', 1, 'Janine', '45051050', 'NON', '0', NULL, 'NON', '45051050', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 1, 1, 12, 1, 'C 0012 5435 89', '2020-04-23 21:28:29', '2020-04-23 21:28:29', NULL, NULL, NULL, NULL, 1),
	(6, 'CRCI/2020/C3/6', 'Mr', 'Kone', 'Cedric', '1986-02-19', 'MLI', NULL, 1, 1, 1, NULL, NULL, 1, NULL, 'professeur du privé', 'doctorant en mathematique', '45263626', NULL, 'konec@yahoo.fr', 'N\'guessan', 1, 'Augustin', '07950428', 'NON', '0', NULL, 'NON', '07950428', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 2, 1, 3, 1, 'C 0012 5435 89', '2020-04-19 08:44:29', '2020-04-19 08:44:29', NULL, NULL, NULL, NULL, 1),
	(14, 'CRCI/2020/C46/14', 'Mr', 'Kambire', 'Ollo Martial', '1985-07-10', 'CIV', 'BFA', 469, 473, 1, NULL, NULL, 165, NULL, 'enseignant repetiteur', 'etudiant', '07008575', NULL, NULL, 'Fransou', 1, 'Jacquelline', '41003202', 'NON', '0', NULL, 'NON', '41003202', NULL, 'NON', 'NON', 'NON', '0', NULL, 3, 2, 1, 46, 1, 'C 0012 5435 89', '2020-04-23 21:48:19', '2020-04-23 21:48:19', NULL, NULL, NULL, NULL, 1),
	(3, 'L0DER21', 'Mlle', 'Abla', 'Poukou Enriette', '1984-04-11', 'CIV', NULL, 1, 1, 1, NULL, NULL, 1, 'asthme', 'proprietaire gerant de pharmacie', 'pharmacienne', '57000075', NULL, 'ablapokou@gmail.com', 'N\'guessan', 1, 'Servais', '74859001', 'NON', '0', NULL, 'NON', '74859001', NULL, 'NON', 'NON', 'NON', '0', NULL, 1, 3, 1, 2, 1, 'C 0012 5435 89', '2020-04-18 22:19:43', '2020-04-18 22:19:43', NULL, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
