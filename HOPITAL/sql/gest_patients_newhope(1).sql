-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 21 Mai 2018 à 08:25
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gest_patients_newhope`
--

-- --------------------------------------------------------

--
-- Structure de la table `categoriesexamens`
--

CREATE TABLE IF NOT EXISTS `categoriesexamens` (
  `IdCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `DesignCategorie` text,
  PRIMARY KEY (`IdCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `categoriesexamens`
--


-- --------------------------------------------------------

--
-- Structure de la table `categoriesmed`
--

CREATE TABLE IF NOT EXISTS `categoriesmed` (
  `IdCategorieMed` int(11) NOT NULL AUTO_INCREMENT,
  `DesignCategorieMed` varchar(100) NOT NULL,
  PRIMARY KEY (`IdCategorieMed`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categoriesmed`
--

INSERT INTO `categoriesmed` (`IdCategorieMed`, `DesignCategorieMed`) VALUES
(1, 'COMPRIME'),
(2, 'AMPOULE');

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

CREATE TABLE IF NOT EXISTS `consultations` (
  `IdConsultation` int(11) NOT NULL AUTO_INCREMENT,
  `DateConsultation` date DEFAULT NULL,
  `PlainteMal` text,
  `HistoireMal` text,
  `Tare` text,
  `Alergie` text,
  `Vaccination` text,
  `HospitAnterieure` text,
  `CauseHospitAnt` text,
  `Heredite` text,
  `AtcdFamille` text,
  `AtcdColateraux` text,
  `CompAnamnese` text,
  `EtatGen` text,
  `Ta` varchar(10) DEFAULT NULL,
  `Fr` varchar(20) DEFAULT NULL,
  `Fc` varchar(20) DEFAULT NULL,
  `Pls` varchar(20) DEFAULT NULL,
  `Poids` varchar(10) DEFAULT NULL,
  `imc` varchar(10) DEFAULT NULL,
  `ExamenTete` text,
  `Thorax` text,
  `Abdomen` text,
  `MembreInf` text,
  `MembreSup` text,
  `ExamenGyneco` text,
  `Hypothese` text,
  `DiagnCertitude` text NOT NULL,
  `Idauto_Patient` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdConsultation`),
  KEY `Idauto_Patient` (`Idauto_Patient`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `consultations`
--

INSERT INTO `consultations` (`IdConsultation`, `DateConsultation`, `PlainteMal`, `HistoireMal`, `Tare`, `Alergie`, `Vaccination`, `HospitAnterieure`, `CauseHospitAnt`, `Heredite`, `AtcdFamille`, `AtcdColateraux`, `CompAnamnese`, `EtatGen`, `Ta`, `Fr`, `Fc`, `Pls`, `Poids`, `imc`, `ExamenTete`, `Thorax`, `Abdomen`, `MembreInf`, `MembreSup`, `ExamenGyneco`, `Hypothese`, `DiagnCertitude`, `Idauto_Patient`, `IdUtilisateur`) VALUES
(1, '2017-07-28', 'Douleurs vaginales', 'dÃ©but il y a 5 jours', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'FiÃ¨vre', 'Etat gÃ©nÃ©ral  AltÃ©rÃ© par un faciÃ¨s souffrant', 'TA: 120/80', 'FR: 20cycle/min', 'FC: 86 batt/min', 'TÂ°: 39,5Â°C', '82kg', '29kg/mÂ²', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'TUMEFACTION INTERESSANT LA GRANDE LEVRE ET PETITE VAGINALE GAUCHE', 'Bartholinite abcÃ©dÃ©e', '', 109, 1),
(2, '2017-07-06', 'cephalÃ©e ', 'dÃ©but une semaine', 'HTA de dÃ©couverte rÃ©cente non compliant le traitement', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'ConservÃ©', 'TA: 178/11', 'FR: 20cycle/min', 'FC: 110 batt/min', 'TÂ°: 36,5Â°C', '82kg', '30kg/mÂ²', 'RAS', 'Tachycarde avec Ã©clat du B2 aortique', 'RAS', 'RAS', 'RAS', 'RAS', 'HTA essentielle grade II', '', 94, 1),
(3, '2017-08-11', 'Palpitations et cÃ©phalÃ©e', 'debut il y a 48 heures', 'HTA coonue', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'Vertiges, accouphÃ¨ne, sphosphÃ¨ne', 'EGC', 'TA: 179/11', 'FR: 20cycle/min', 'FC: 110 batt/min', 'TÂ°: 36,5Â°C', '79kg', '26kg/mÂ²', 'RAS', 'Tachycarde avec bruit de galop, tachypnÃ©e', 'RAS', 'RAS', 'RAS', 'RAS', 'Trouble du rythme cardiaque sur terrain de HTA grade II', '', 103, 1),
(4, '2017-10-05', '-Vomissements \r\n-colique abdominale\r\n-cephalÃ©e', 'dÃ©but il y a 1jour', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', '-fiÃ¨vre quelques fois\r\n-diarrhÃ©e\r\n-frissons\r\n-constipations\r\n-soif intense', 'EGA par une faciÃ¨s souffrant et un affaiblissement physique; sÃ©cheresse buccale ', 'TA: 106/59', 'FR: 20cycle/min', 'FC: 78 batt/min', 'TÂ°: 39,7Â°C', '41 kg', '22kg/mÂ²', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'RAS', 'Paludisme de forme digestive et infections urinaires', '', 199, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreestocks`
--

CREATE TABLE IF NOT EXISTS `entreestocks` (
  `IdEntree` int(11) NOT NULL AUTO_INCREMENT,
  `DateEntree` date NOT NULL,
  `NumFacture` varchar(50) NOT NULL,
  `NumLot` varchar(100) NOT NULL,
  `QteEntree` double NOT NULL,
  `PrixUnit` double NOT NULL,
  `DateFabrication` date NOT NULL,
  `DateExpiration` date NOT NULL,
  `Provenance` varchar(100) NOT NULL,
  `IdMedicament` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IdEntree`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `IdMedicament` (`IdMedicament`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `entreestocks`
--

INSERT INTO `entreestocks` (`IdEntree`, `DateEntree`, `NumFacture`, `NumLot`, `QteEntree`, `PrixUnit`, `DateFabrication`, `DateExpiration`, `Provenance`, `IdMedicament`, `IdUtilisateur`) VALUES
(1, '2017-03-04', 'FACT 23/2017', '124587', 100, 150, '2002-02-08', '2018-04-15', 'NOBLESSE', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `examens`
--

CREATE TABLE IF NOT EXISTS `examens` (
  `IdExamen` int(11) NOT NULL AUTO_INCREMENT,
  `DesignExamen` text,
  `PrixPrevu` double DEFAULT NULL,
  `IdCategorie` int(11) NOT NULL,
  PRIMARY KEY (`IdExamen`),
  KEY `IdCategorie` (`IdCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `examens`
--


-- --------------------------------------------------------

--
-- Structure de la table `facturations`
--

CREATE TABLE IF NOT EXISTS `facturations` (
  `IdFacturation` int(11) NOT NULL AUTO_INCREMENT,
  `DateFacturation` date DEFAULT NULL,
  `MontantFacture` double DEFAULT NULL,
  `Idauto_Patient` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdFacturation`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `Idauto_Patient` (`Idauto_Patient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `facturations`
--


-- --------------------------------------------------------

--
-- Structure de la table `hospitalisations`
--

CREATE TABLE IF NOT EXISTS `hospitalisations` (
  `Idauto_Hosp` int(11) NOT NULL AUTO_INCREMENT,
  `CodeHosp` text,
  `DateHosp` date DEFAULT NULL,
  `SalleHosp` varchar(100) DEFAULT NULL,
  `NumLit` varchar(10) DEFAULT NULL,
  `CodeService` varchar(10) DEFAULT NULL,
  `Idauto_Patient` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Idauto_Hosp`),
  KEY `Idauto_Patient` (`Idauto_Patient`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `CodeService` (`CodeService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hospitalisations`
--


-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE IF NOT EXISTS `medicaments` (
  `IdMedicament` int(11) NOT NULL AUTO_INCREMENT,
  `DesignMedicament` varchar(100) NOT NULL,
  `Dosage` varchar(20) NOT NULL,
  `StockAlerte` double NOT NULL,
  `StockExistant` double NOT NULL,
  `ValeurUnit` double NOT NULL,
  `IdCategorieMed` int(11) NOT NULL,
  PRIMARY KEY (`IdMedicament`),
  KEY `IdCategorieMed` (`IdCategorieMed`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `medicaments`
--

INSERT INTO `medicaments` (`IdMedicament`, `DesignMedicament`, `Dosage`, `StockAlerte`, `StockExistant`, `ValeurUnit`, `IdCategorieMed`) VALUES
(1, 'TRAMADOL', '100mg', 12, 100, 500, 2);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `Idauto_Patient` int(11) NOT NULL AUTO_INCREMENT,
  `CodePatient` text,
  `IndexMal` text,
  `Noms` text,
  `Age` varchar(10) DEFAULT NULL,
  `Sexe` varchar(12) DEFAULT NULL,
  `Profession` varchar(60) DEFAULT NULL,
  `EtatCivil` varchar(15) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `NumTel` varchar(20) DEFAULT NULL,
  `DateArrive` date NOT NULL,
  `Photo` text,
  `IdUtilisateur` int(11) NOT NULL,
  `Etat` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Idauto_Patient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=864 ;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`Idauto_Patient`, `CodePatient`, `IndexMal`, `Noms`, `Age`, `Sexe`, `Profession`, `EtatCivil`, `Adresse`, `NumTel`, `DateArrive`, `Photo`, `IdUtilisateur`, `Etat`) VALUES
(1, '001/2017/NHH', '414/22817', 'LETETA SAMUELLA', '16/12/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-26', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(2, '002/2017/NHH', '414/21313', 'MUZALIWA MUTHO JOYCE', '30/05/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-08', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(3, '003/2017/NHH', '414/21223', 'MPURUTU ROSETTE', '18/08/1972', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-06-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(5, '005/2017/NHH', '414/23219', 'AMPIRE BASHIMBE', '02/10/1996', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-04', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(6, '006/2017/NHH', '414/22835', 'LUBALA NABINTU ROSETTE', '20/02/1970', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-25', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(7, '007/2017/NHH', '244/N000033891', 'MANGAZA CHRISTINE', '13/03/1972', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-26', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(8, '008/2017/NHH', '414/20911', 'KANINGINI BIJOU BORA', '23/08/1981', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-10', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(9, '009/2017/NHH', '414/22932', 'OLEGO STEPHAN', '16/06/2007', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(10, '0010/2017/NHH', '414/20861', 'MAKELELE NAMUTO LYDIE', '11/05/1999', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-21', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(12, '0012/2017/NHH', '414/22552', 'LUKEMBE PRISCA', '05/12/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(13, '0013/2017/NHH', '244/N000032130', 'TSHIMANGA KAPPY', '06/12/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-31', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(14, '0014/2017/NHH', '414/22838', 'NAMEGABE FLAVIEN', '02/02/1970', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(15, '0015/2017/NHH', '414/22838', 'NAMEGABE BALEMBA ', '17/11/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-21', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(16, '0016/2017/NHH', '414/20964', 'MBURUGU RIZIKI DORIANE', '13/01/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-10', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(17, '0017/2017/NHH', '414/22004', 'WAZOKA BRANDON', '29/11/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-29', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(18, '0018/2017/NHH', 'P00129674', 'CUBAKA DAMIEN MUHIMUZI', '07/05/1969', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-06-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(20, '0020/2017/NHH', '414/21469', 'BIHEMBE ROSELINE FAIDA', '16/12/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-08', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(21, '0021/2017/NHH', '414/20804', 'DON DE DIEU BASHIMBE', '17/11/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(23, '0023/2017/NHH', '414/23337', 'WETEBE MWIMBAFULU', '28/08/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-27', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(24, '0024/2017/NHH', '414/23219', 'AGISHA BASHIMBE', '27/05/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(25, '0025/2017/NHH', '414/20687', 'ZAGABE NSIMIRE', '19/11/1958', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-07', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(26, '0026/2017/NHH', '414/21256', 'MUTANGANAY YANNICK', '18/08/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-04', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(27, '0027/2017/NHH', '414/21295', 'MUGARUKA ANNE-GRACE NSIMIRE', '15/07/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(28, '0028/2017/NHH', '414/22106', 'GAMBISEKE LINDA', '25/10/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-27', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(29, '0029/2017/NHH', '414/21312', 'AMISI FERUZA AIMERANCE', '15/09/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-31', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(31, '0031/2017/NHH', '414/22333', 'BISIMWA NSHOBOLE', '05/03/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-13', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(33, '0033/2017/NHH', '414/21223', 'BAGULA RACHEL', '06/06/1997', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(36, '0036/2017/NHH', '414/21295', 'CHAKIRWA MUGOLI SYLVIE', '19/03/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-06-13', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(37, '0037/2017/NHH', '414/20860', 'BISIMWA MICHEL', '25/08/1961', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-30', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(38, '0038/2017/NHH', '414/22835', 'MUGISHO KAZIMOTO SALOMON', '17 ans', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(39, '0039/2017/NHH', '414/22779', 'POMBO MWEMA', '24/03/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-24', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(40, '0040/2017/NHH', 'P001028275', 'FELIX VATUA NANGANA', '12/03/2005', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2017-07-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(41, '0041/2017/NHH', '414/21312', 'MAKOKO YANN ELOGE', '06/01/2001', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-16', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(42, '0042/2017/NHH', '244/N000032246', 'SALIKE JOSEPH EMMANUEL', '31/12/2005', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(43, '0043/2017/NHH', '244/N000032324', 'WAKALILWA KOTOGA', '03/07/1962', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(44, '0044/2017/NHH', '414/20877', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-08', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(45, '0045/2017/NHH', '414/21469', 'BIHEMBE ROSELINE FAIDA', '16/12/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-06-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(46, '0046/2017/NHH', '414/22313', 'BAHATI LUNENO KETYA', '01/02/2011', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(47, '0047/2017/NHH', '414/22313', 'BAHATI SOFIA', '08/07/2011', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-10', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(48, '0048/2017/NHH', '415/590946', 'BAHAVU TATHIANA ', '18/09/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(49, '0049/2017/NHH', '414/22932', 'TAMELEGU NGOY AIME', '28/02/1992', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-30', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(50, '0050/2017/NHH', '414/22932', 'KALIABI ORTENCE', '22/11/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(51, '0051/2017/NHH', '414/20911', 'PALUKU ISSE SOMO', '13/03/1978', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', 'RECEPTVERO', '2017-05-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(52, '0052/2017/NHH', '414/23337', 'WENGE DOMINIQUE', '17/10/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-13', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(53, '0053/2017/NHH', '415/871954', 'WILONDJA BULAMBO', '20/05/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-22', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(54, '0054/2017/NHH', '414/23337', 'NAMIENGE WANGE', '11/10/1999', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-05', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(55, '0055/2017/NHH', '414/21816', 'SERGE AMANI', '26/02/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-10', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(56, '0056/2017/NHH', '414/23337', 'WETEBE MWIMBAFULU', '28/08/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-07', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(58, '0058/2017/NHH', '414/20964', 'MBURUGU BADERHAKUGUMA ABASIMINE', '13/10/1993', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(59, '0059/2017/NHH', '414/21223', 'JOSPIN BAGULA', '08/04/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(60, '0060/2017/NHH', '244/N000032129', 'LUSHOMBO GABRIEL', '09/09/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-31', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(61, '0061/2017/NHH', '414/20908', 'NTAMBWE FRANCINE ZALIA', '10/02/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-05-05', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(63, '0063/2017/NHH', '414/20877', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-28', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(64, '0064/2017/NHH', '414/20757', 'CIBALONZA BYAMUNGU', '28/09/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(66, '0066/2017/NHH', '244/N000034255', 'DJUMA EMMANUELA JESSICA', '13/12/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-29', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(67, '0067/2017/NHH', '414/20757', 'CIBALONZA CIBANGUKA', '04/03/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-29', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(68, '0068/2017/NHH', '414/21223', 'JOSPIN BAGULA', '08/04/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(69, '0069/2017/NHH', '414/22835', 'LUBALA NABINTU ROSETTE', '20/02/1970', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(70, '0070/2017/NHH', '414/20964', 'MBURUGU JOSAPHAT', '10/04/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(71, '0071/2017/NHH', '414/22333', 'BISIMWA NSHOBOLE', '05/03/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(72, '0072/2017/NHH', '414/22333', 'MAKALI DIEUDONNE', '10/10/1968', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-22', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(73, '0073/2017/NHH', '414/20877', 'NIVA FEZA ERICA JEANNE', '01/04/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-04', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(74, '0074/2017/NHH', '414/20964', 'LUMBU FATUMA', '04/08/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-11', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(75, '0075/2017/NHH', '414/21313', 'MUZALIWA BAKITA FORTUNE', '19/12/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(76, '0076/2017/NHH', '414/20964', 'MBURUGU RUHANGAZA', '10/05/2000', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-05', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(77, '0077/2017/NHH', '244/N000032246', 'ROMKEKA SALIKE DIEUDONNE', '25/04/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', 'RECEPTVERO', '2017-05-30', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(78, '0078/2017/NHH', '002/70089', 'NAMA CIRHIBUKA MAXIME', '10/11/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-07-10', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(79, '0079/2017/NHH', '414/21764', 'BALAGANE SALOMON', '28/10/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(80, '0080/2017/NHH', '414/20964', 'MBURUGU JOSAPHAT', '18/09/2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(81, '0081/2017/NHH', '414/20877', 'NABAHESE NYAMBUZA', '08/05/1985', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-05-22', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(82, '0082/2017/NHH', '414/23304', 'MURHULA NTWALI', '01/04/2015', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-10', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(85, '0085/2017/NHH', '414/20862', 'KADENDE BACHI', '14/05/1963', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-19', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(88, '0088/2017/NHH', '244/N000034255', 'BARAKA DJUMA DIVIN', '20/06/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(89, '0089/2017/NHH', '244/N000034241', 'MIRINDI ESTHER', '16/05/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-16', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(90, '0090/2017/NHH', '244/N000034241', 'MIRINDI ESTHER', '16/05/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(91, '0091/2017/NHH', '414/22917', 'SEKATERA GARHALUMIRA', '18/04/1974', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-07', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(92, '0092/2017/NHH', '414/20964', 'MBURUGU ILUNGA MULALA JOEL', '24/11/2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', 'RECEPTVERO', '2017-05-12', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(93, '0093/2017/NHH', '414/21816', 'CHIRUZA AMANI', '20/05/1995', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-12', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(94, '0094/2017/NHH', '414/21816', 'VUMILIYA MUSHAGALUSA', '17/12/1971', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(95, '0095/2017/NHH', '244/N000032130', 'DARIO KOLE TSHIMANGA', '03/03/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-20', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(96, '0096/2017/NHH', '414/21256', 'MUTANGANAY YANNICK', '18/08/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-04', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(97, '0097/2017/NHH', '414/21314', 'EDITH MOBOLE', '02/03/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-01-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(98, '0098/2017/NHH', '414/22932', 'SENGA SIMEON', '16/11/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(99, '0099/2017/NHH', '414/05433', 'KOBINALI JOSH ANSIMA', '02/12/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(100, '00100/2017/NHH', '414/05433', 'KALIMURHIMA JOANNA ANDEMA', '05/12/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(101, '00101/2017/NHH', '414/20824', 'MUNYERENKANA ADELE', '26/03/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-05-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(102, '00102/2017/NHH', '414/21312', 'AMISA FERUZI AIMERANCE', '15/09/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-31', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(103, '00103/2017/NHH', '414/20862', 'KADENDE BACHI', '14/05/1963', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-11', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(104, '00104/2017/NHH', '415/20861', 'MAKELELE CIKWANINE', '11/11/1961', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-30', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(105, '00105/2017/NHH', '414/22552', 'LUKEMBE PRISCA', '05/12/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(106, '00106/2017/NHH', '414/22106', 'KAHONGYA GUILLAUME', '11/06/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-04-08', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(107, '00107/2017/NHH', '414/21385', 'NDAYI MUKENDI BLESSING', '07/06/2004', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', 'RECEPTVERO', '2017-08-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(108, '00108/2017/NHH', '244/N000033891', 'MANGAZA CHRISTINE', '13/03/1972', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(109, '00109/2017/NHH', '414/22839', 'NYENYEZI MUSHAGALUSA', '20/02/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-28', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(110, '00110/2017/NHH', '001/70224', 'BIKOMO BELINGA ARLETTE', '08/12/1972', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-04', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(111, '00111/2017/NHH', '414/22103', 'SHABANI LOMBE', '04/08/1958', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-29', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(112, '00112/2017/NHH', '414/21764', 'BAHIGA LOLA ELIANE', '20/08/1990', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(113, '00113/2017/NHH', '414/21764', 'BALAGANE SALOMON', '28/10/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(114, '00114/2017/NHH', '....', 'AHANA SALIKE MICHEL', '28/03/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-02', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(115, '00115/2017/NHH', '244/N000032324', 'USHINDI KYALEMANINWA', '31/01/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(117, '00117/2017/NHH', '414/23304', 'IMMACULEE AWA', '06/11/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(118, '00118/2017/NHH', '414/20964', 'MBURUGU JOSEPHINE', '4 ans', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-21', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(120, '00120/2017/NHH', '244/N000032246', 'KASHAMA SANDRINE WELCOME', '31 ans', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-06-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(121, '00121/2017/NHH', '414/22835', 'LUKUNGULIKA KAZIMOTO LUCIEN', '28/08/1996', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(122, '00122/2017/NHH', '414/22932', 'OLEGO STEPHAN', '16/06/2007', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-28', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(123, '00123/2017/NHH', '414/23337', 'WETEBE MWIMBAFULU', '28/08/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-07', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(124, '00124/2017/NHH', '415/871954', 'PASCASIE WILONDJA', '04/04/1994', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(125, '00125/2017/NHH', '414/22333', 'BISIMWA LINDA', '02/02/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(126, '00126/2017/NHH', '244/N000034255', 'DJUMA MOLLA JOSUE', '27/09/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-28', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(127, '00127/2017/NHH', '244/N000034255', 'DJUMA JEMIMA', '05/05/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-29', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(128, '00128/2017/NHH', '244/N000034255', 'DJUMA JEMIMA', '05/05/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-07', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(129, '00129/2017/NHH', '244/N000033891', 'SHINDANO CHARLOTTE', '26/05/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(130, '00130/2017/NHH', '244/N000033891', 'SHINDANO CHARLOTTE', '26/05/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-07', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(131, '00131/2017/NHH', '414/21313', 'MUZALIWA ISONGA INES', '30/06/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(132, '00132/2017/NHH', '244/N000032129', 'LUSHOMBO GABRIEL', '09/09/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-10', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(133, '00133/2017/NHH', '414/21313', 'MUZALIWA BAKITA FORTUNEE', '19/12/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(134, '00134/2017/NHH', '414/21469', 'BAGUMA CARMELLE', '18/04/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-09', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(135, '00135/2017/NHH', '414/21223', 'SYLVIE BAGULA', '06/06/1995', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-31', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(136, '00136/2017/NHH', '414/21223', 'ALINE BAGULA', '11/01/1990', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-25', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(137, '00137/2017/NHH', '414/21223', 'LA DOUCE BAGULA', '05/07/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(138, '00138/2017/NHH', '414/21223', 'NADEGE BAGULA', '28/11/1993', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-29', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(139, '00139/2017/NHH', '415/590946', 'RIZIKI PALATA CONSOLATRICE', '29/05/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(140, '00140/2017/NHH', '415/590946', 'BAHAVU DIENNE', '08/01/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(141, '00141/2017/NHH', '414/21816', 'FRANCINE AMANI', '18/02/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-02', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(142, '00142/2017/NHH', '414/22917', 'SEKATERA GARHALUMIRA', '18/04/1974', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-07', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(143, '00143/2017/NHH', '244/N000032130', 'TSHIMANGA KAPPY', '06/12/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(144, '00144/2017/NHH', '414/20911', 'PALUKU ISSE SOMO', '13/03/1978', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-08', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(145, '00145/2017/NHH', '414/20911', 'PALUKU ISSE SOMO', '13/03/1978', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(146, '00146/2017/NHH', '414/23370', 'KISSINA INNONCENT', '15/11/1990', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-25', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(147, '00147/2017/NHH', '414/23370', 'MASIMANGO KISSINA PAULAIN', '04/11/1964', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-30', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(148, '00148/2017/NHH', '414/23370', 'MUJING JUSTINE', '19/05/1968', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(149, '00149/2017/NHH', '414/23370', 'KISSINA ROLANDE', '27/07/1994', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-31', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(150, '00150/2017/NHH', '244/N000049179', 'KIMANUKA PAOLA', '25/03/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(151, '00151/2017/NHH', '414/21313', 'MUZALIWA ISONGA INES', '30/06/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(152, '00152/2017/NHH', '244/N000049179', 'KIMANUKA NJUGUMYA ADRIEN', '17/12/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(153, '00153/2017/NHH', '414/22192', 'MATABARO NZIGIRE', '08/05/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(154, '00154/2017/NHH', '414/21313', 'MUZALIWA SADIKI EUGENE', '15/08/2004', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-23', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(155, '00155/2017/NHH', '414/20964', 'LUMBU FATUMA', '04/08/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-29', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(156, '00156/2017/NHH', '414/20964', 'MBURUGU LINDA', '03/03/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(157, '00157/2017/NHH', '414/22365', 'BISIMWA OLIVIER', '14/04/1977', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(158, '00158/2017/NHH', '414/22365', 'BISIMWA MUGISHO ZOE', '19/09/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-27', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(159, '00159/2017/NHH', '414/22365', 'BISIMWA LYDIE', '19/09/2006', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(160, '00160/2017/NHH', '414/21911', 'FURAHA BIRINDWA ALINE', '20/01/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-25', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(161, '00161/2017/NHH', '414/21768', 'ASSUMANI ZAITUNI', '04/04/1975', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(162, '00162/2017/NHH', '414/21911', 'RAMA MUHENDWA JORDAN', '21/05/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-08', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(163, '00163/2017/NHH', '414/21911', 'FAILA MUHENDWA PLAMEDIE', '21/05/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-27', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(164, '00164/2017/NHH', '414/22553', 'KALEMBE KISIMBA', '24/04/1966', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-09', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(165, '00165/2017/NHH', '414/22553', 'KISIMBA VICTORINE ASINA', '50/02/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-18', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(166, '00166/2017/NHH', '414/22553', 'MAUA CHAUSIKU ALPHONSINE', '28/08/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-31', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(167, '00167/2017/NHH', '414/22917', 'KANYAMUKENGE BALEZI ROMAIN', '25/07/1967', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-28', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(168, '00168/2017/NHH', '415/980472', 'KINGA SAFARI', '29/10/1970', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-27', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(169, '00169/2017/NHH', '414/22365', 'BISHIKWABO MICHELINE', '29/09/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(170, '00170/2017/NHH', '415/980472', 'FURAHA NASTRA', '30/09/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-09', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(171, '00171/2017/NHH', '414/22364', 'SAFARI RIPHIN', '05/10/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-24', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(172, '00172/2017/NHH', '414/21432', 'LULENGA FLAVIEN', '05/05/1960', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-10', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(173, '00173/2017/NHH', '414/21454', 'LUMUNA JOSEPH', '20/07/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-19', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(174, '00174/2017/NHH', '414/21751', 'MIRINDI ANDEMA', '23/03/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-27', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(176, '00176/2017/NHH', '414/22313', 'BAHATI LUNENO KETYA', '01/02/2011', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(177, '00177/2017/NHH', '414/22313', 'BAHATI SOFIA', '08/07/2011', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-05', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(178, '00178/2017/NHH', '414/22313', 'BAHATI MIRABELLE', '04/03/2017', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-07', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(179, '00179/2017/NHH', '414/22313', 'LUNENO JOYCE', '12/03/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-05', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(180, '00180/2017/NHH', '414/22313', 'LUNENO BWIRA DIEGO', '08/05/1977', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-07', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(182, '00182/2017/NHH', '414/22192', 'CUMA MATABARO', '16/04/1970', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-20', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(183, '00183/2017/NHH', '414/22192', 'MATABARO MARGUERITTE', '28/09/2003', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-31', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(184, '00184/2017/NHH', '414/21768', 'ASSOMANI ATIBU', '25/05/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-01', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(185, '00185/2017/NHH', '414/20839', 'RAMAZANI SINAOFU', '16/10/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(186, '00186/2017/NHH', '414/20911', 'KANINGINI BIJOU BORA', '29/08/1981', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-18', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(187, '00187/2017/NHH', '414/21313', 'MUZALIWA MUTHO JOYCE', '30/05/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-31', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(188, '00188/2017/NHH', '414/20964', 'MBURUGU ILUNGA MULALA JOEL', '24/11/2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(189, '00189/2017/NHH', '414/20964', 'MBURUGU NTAYONDEZANDI', '25/05/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-22', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(190, '00190/2017/NHH', '415/980472', 'SAKINA JEANNE', '29/03/2004', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(191, '00191/2017/NHH', '415/980472', 'MOZA PRISCA', '31/10/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-26', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(192, '00192/2017/NHH', '414/20964', 'MBURUGU JOSAPHAT', '10/04/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(193, '00193/2017/NHH', '414/21768', 'ASSOMANI ANNA', '16/04/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(194, '00194/2017/NHH', '414/20911', 'ISE-SOMO MERDIE SOKI', '04/08/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-29', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(195, '00195/2017/NHH', '414/21768', 'ASSOMANI ASSANI', '13/08/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-23', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(196, '00196/2017/NHH', '414/21768', 'ASSOMANI JOSEPHINE', '17/03/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-21', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(197, '00197/2017/NHH', '415/980472', 'SAKINA JEANNE', '29/03/2004', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-30', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(198, '00198/2017/NHH', '244/N000049179', 'KIMANUKA NJUGUMYA ADRIEN', '17/12/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-28', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(199, '00199/2017/NHH', '244/N000032246', 'SALIKE JOSEPH EMMANUEL', '31/12/2005', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', 'RECEPTVERO', '2017-10-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(200, '00200/2017/NHH', '414/22839', 'NTAMULENGA MUGISHO', '03/06/2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', 'RECEPTVERO', '2017-10-05', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(201, '00201/2017/NHH', '414/22192', 'MATABARO ANSWER', '11/2/1995', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(202, '00202/2017/NHH', '414/22313', 'BAHATI MIRABELLE', '04/3/2017', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(203, '00203/2017/NHH', '414/21911', 'RAMA MUHENDWA JORDAN', '21/5/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-08', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(204, '00204/2017/NHH', '414/22839', 'NTAMULENGA MUSHOSI', '11/6/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(205, '00205/2017/NHH', '414/22192', 'CUMA MATABARO', '16/4/1970', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(206, '00206/2017/NHH', '244/N000049179', 'KIMANIKA NJUNGUMYA ADRIEN', '17/12/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(208, '00208/2017/NHH', '414/21768', 'ASSOMANI ATIBU', '25/5/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(209, '00209/2017/NHH', '414/22313', 'LUNENO JOYCE', '12/3/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(213, '00213/2017/NHH', '414/22553', 'KELEMBE KISIMBA', '24/4/1966', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(216, '00216/2017/NHH', '414/21768', 'ASSOMANI ASSANI', '13/8/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(219, '00219/2017/NHH', '244/N000049179', 'KIMANIKA NJUNGUMYA ADRIEN', '17/12/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(220, '00220/2017/NHH', '414/22365', 'BISIMWA MUGISHO ZOE', '19/9/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-27', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(222, '00222/2017/NHH', '414/22365', 'BISIMWA OLIVIER', '14/4/1977', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(223, '00223/2017/NHH', '414/21313', 'MUZALIWA SADIKI EUGENE', '15/8/2004', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(224, '00224/2017/NHH', '414/21911', 'FURAHA BIRINDWA ALINE', '20/1/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(227, '00227/2017/NHH', '414/23370', 'KISSINA INNONCENT', '15/11/1990', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-25', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(228, '00228/2017/NHH', '414/20964', 'MBURUGU NTAYONDEZANDI', '25/5/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(229, '00229/2017/NHH', '414/21313', 'MUZALIWA MUTHO JOYCE', '30/5/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-31', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(230, '00230/2017/NHH', '414/22192', 'MATABARO MARGUERITTE', '28/9/2003', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-31', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(231, '00231/2017/NHH', '414/22560', 'BIRINDWA NSIMIRE RAPHAELLA', '21/3/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-24', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(232, '00232/2017/NHH', '414/22364', 'BISHIKWABO MICHELINE', '29/9/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(234, '00234/2017/NHH', '414/21911', 'FAILA MUHENDWA PLAMEDIE', '21/5/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-27', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(235, '00235/2017/NHH', '414/21768', 'ASUMANI ZAITUNI', '04/4/1975', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-18', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(236, '00236/2017/NHH', '414/22313', 'LUNENO BWIRA DIEGO', '08/5/1977', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(237, '00237/2017/NHH', '414/23370', 'MASIMANGO KISSINA PAULAIN', '04/11/1964', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-04', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(238, '00238/2017/NHH', '414/22192', 'MATABARO NZIGIRE', '08/5/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-22', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(239, '00239/2017/NHH', '244/N000049179', 'KIMANUKA PAOLA', '25/3/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(240, '00240/2017/NHH', '414/23370', 'KISSINA ROLANDE', '27/7/1994', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-31', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(241, '00241/2017/NHH', '414/22192', 'MATABARO NABINTU', '11/2/1997', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(242, '00242/2017/NHH', '414/22839', 'NTAMULENGA MUGISHO', '03/6/2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(243, '00243/2017/NHH', '414/20911', 'KANINGINI BIJOU BORA', '29/8/1981', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(244, '00244/2017/NHH', '414/23370', 'MUJING JUSTINE', '19/5/1968', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(245, '00245/2017/NHH', '414/20964', 'MBURUGU LINDA', '03/3/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(246, '00246/2017/NHH', '415/980472', 'MOZA PRISCA', '31/10/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(247, '00247/2017/NHH', '414/22365', 'BISIMWA LYDIE', '19/9/2006', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(249, '00249/2017/NHH', '414/22917', 'KANYAMUKENGE BALEZI ROMAIN', '25/9/1967', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(251, '00251/2017/NHH', '415/980472', 'SAKINA JEANNE', '29/3/2004', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-12', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(252, '00252/2017/NHH', '244/N000032324', 'USHINDI KYALEMANINWA', '31/1/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(253, '00253/2017/NHH', '414/22917', 'KANYAMUKENGE BALEZI ROMAIN', '25/7/1967', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(254, '00254/2017/NHH', '415/590946', 'BAHAVU CHERYL SILKE', '26/10/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(255, '00255/2017/NHH', '414/21768', 'ASUMANI ZAITUNI', '04/4/1975', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(256, '00256/2017/NHH', '414/21911', 'FURAHA BIRINDWA ALINE', '20/1/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(257, '00257/2017/NHH', '414/22364', 'WATOKALUSU MACHOZI', '31/12/1978', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-12', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(258, '00258/2017/NHH', '414/21469', 'BAGUMA CARMELLE', '18/4/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(259, '00259/2017/NHH', '244/N000049179', 'KIMANIKA NJUNGUMYA ADRIEN', '17/12/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(260, '00260/2017/NHH', '414/22192', 'MIRHANYO M''MIKENJI', '01/6/1974', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(261, '00261/2017/NHH', '244/N000032130', 'AMISI REHEMA', '29/5/1988', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(262, '00262/2017/NHH', '414/23304', 'NYAWANA OMBENI PASCALINE', '07/10/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(263, '00263/2017/NHH', '414/23304', 'BISIMWA CIREZI FRANCINE', '01/10/1984', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(264, '00264/2017/NHH', '414/22917', 'NSHOKANO K.TONY', '05/7/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-08', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(265, '00265/2017/NHH', '414/23111', 'RUBEN MULEMBWE NKOLE', '15/10/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(266, '00266/2017/NHH', 'P001028275', 'LORENZO VATUA', '20/12/2009', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2016-10-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(267, '00267/2017/NHH', '414/21816', 'GHYSLAIN AMANI', '04/10/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(268, '00268/2017/NHH', '414/21313', 'ANGALI ISONGA', '01/9/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(269, '00269/2017/NHH', 'P001028275', 'LAURICK VATUA', '20/12/2009', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2016-10-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(270, '00270/2017/NHH', '414/22554', 'BIRINGO BULONZE LYLIANE', '14/4/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-18', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(271, '00271/2017/NHH', '414/21312', 'AMISI FERUZI AIMERANCE', '15/9/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-22', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(272, '00272/2017/NHH', '414/', 'KABONGO DAVID', '20/3/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(273, '00273/2017/NHH', '414/20839', 'ADIDJA MBYE AURORE', '01/2/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(274, '00274/2017/NHH', '414/20971', 'NABINTU SEKANABO', '05/10/1984', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-11-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(275, '00275/2017/NHH', '414/22687', 'MAVUNGU MUKUZO LANDRYNE', '21/6/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(276, '00276/2017/NHH', '414/20839', 'LUBENGA BAHATI MAMY', '09/6/1981', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-11-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(277, '00277/2017/NHH', '414/21764', 'BYAMUNGU MUNGUAKONKWA', '19/11/2007', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(278, '00278/2017/NHH', 'P000210685', 'GEDEC KALIMUNDA', '23/10/1996', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2016-11-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(279, '00279/2017/NHH', '414/21311', 'BALIRE FURAHA NANCY', '10/10/1980', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-11-14', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(280, '00280/2017/NHH', '414/21312', 'MAKOKO YANN KEVIN', '06/1/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-16', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(281, '00281/2017/NHH', '414/21183', 'FADHILI MPARANYI', '13/11/2009', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(282, '00282/2017/NHH', '414/21816', 'VUMILIA MUSHAGALUSA', '07/12/1971', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-12-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(283, '00283/2017/NHH', '244/N000032130', 'LETETA FURAHA', '23/6/1999', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-12-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(284, '00284/2017/NHH', '414/20687', 'MALIBITA ASIFIWE', '03/3/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-12-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(285, '00285/2017/NHH', 'P001028275', 'MERVEILLE VATUA ATANANE', '28/2/2003', 'FEMININ', 'ALLIANZ', 'CELIBATAIRE', '', '', '2016-12-27', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(286, '00286/2017/NHH', '414/22561', 'TONDO ZIMAKANDA', '03/5/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(287, '00287/2017/NHH', '414/22561', 'MASILYA KITOGA', '12/4/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(288, '00288/2017/NHH', '414/22554', 'KIZUNGU NABINTU', '16/8/1987', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-01-04', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(289, '00289/2017/NHH', '08821639', 'MERDI PASCAL DIOKA DESIRE', '27/1/2011', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-01-04', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(290, '00290/2017/NHH', '414/21816', 'VUMILIA MUSHAGALUSA', '17/12/1971', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-01-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(291, '00291/2017/NHH', '08821639', 'DAN IRAGI KAGALE', '23/8/2008', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-01-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(292, '00292/2017/NHH', '0880864', 'IVON MONA KAYEMBE', '10/8/1971', 'MASCULIN', 'GMC HENNER', 'MARIE(E)', '', '', '2017-01-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(293, '00293/2017/NHH', '414/21385', 'MUKENDI CONSTANTIN', '17/2/1976', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-01-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(294, '00294/2017/NHH', 'P001209656', 'FELIX KAMWALI MASEMO', '08/9/1980', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-01-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(295, '00295/2017/NHH', '414/22467', 'KELEMBE CALEB', '12/2/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(296, '00296/2017/NHH', '414/21311', 'BOMOLO KETIA', '29/5/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-17', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(297, '00297/2017/NHH', '414/21312', 'MAKOKO VANESSA  MAGALY', '06/8/1993', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(298, '00298/2017/NHH', '414/22554', 'KIZUNGU NABINTU', '16/8/1987', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-01-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(299, '00299/2017/NHH', '244/N000033891', 'SHINDANO PHILIPPE', '12/12/1958', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-01-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(300, '00300/2017/NHH', 'P000210685', 'JOELLE KALIMUNDA', '04/11/1998', 'FEMININ', 'ALLIANZ', 'CELIBATAIRE', '', '', '2017-01-21', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(301, '00301/2017/NHH', '414/21816', 'MUSHAGALUSA AMANI', '04/10/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-25', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(302, '00302/2017/NHH', '08817739', 'ROSETTE BITONDO', '16/1/1991', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-01-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(303, '00303/2017/NHH', '414/22554', 'KIZUNGU NABINTU', '16/8/1987', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-01-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(304, '00304/2017/NHH', 'P000210685', 'BEATRICE KASHEMWA M''RUKUNDA', '18/4/1967', 'FEMININ', 'ALLIANZ', 'MARIE(E)', '', '', '2017-02-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(305, '00305/2017/NHH', '414/21816', 'NYAWANA OMBENI PASCALINE', '07/10/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-02-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(306, '00306/2017/NHH', 'P001209712', 'KULIMUSI MUGHANZA', '01/1/1972', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-02-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(307, '00307/2017/NHH', '414/21816', 'GHYSLAIN AMANI', '04/10/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(308, '00308/2017/NHH', '414/22875', 'NGOLA ASHALA JOSIANE', '05/1/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(309, '00309/2017/NHH', '08822265', 'KENAYAH NANA LWANGA', '16/8/2010', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '0000-00-00', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(310, '00310/2017/NHH', 'P0001209688', 'KELEKA FRANCK NTUMBA', '01/1/1977', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-02-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(311, '00311/2017/NHH', '414/20964', 'MBURUGU LINDA', '03/3/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(312, '00312/2017/NHH', '414/23111', 'NKOLE JOEL NGOYI', '20/12/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-14', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(313, '00313/2017/NHH', '414/20872', 'SAFARI MALIKIDOGO', '13/3/1993', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(314, '00314/2017/NHH', '414/22817', 'LETETA FURAHA', '23/6/1999', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(315, '00315/2017/NHH', '414/20687', 'BUKUBA ISSA', '20/5/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-26', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(316, '00316/2017/NHH', '414/21183', 'FADHILI NTWALI', '10/5/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(317, '00317/2017/NHH', '08804277', 'LEMARU ETSOKU', '20/5/2006', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-03-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(318, '00318/2017/NHH', '244/N000033891', 'SHINDANO PHILIPPE', '12/12/1958', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-03-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(319, '00319/2017/NHH', '08822265', 'AMAS SAFI BETOKO', '09/6/2005', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-03-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(320, '00320/2017/NHH', 'P000210685', 'GEDEC KALIMUNDA', '23/10/1996', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2017-03-08', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(321, '00321/2017/NHH', '414/21764', 'BALANGANE SALOMON', '28/10/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-03-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(322, '00322/2017/NHH', 'P001209674', 'CUBAKA DAMIEN MUHIMUZI', '07/5/1969', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-03-14', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(323, '00323/2017/NHH', '08808046', 'GRACE ETONGA MONA', '25/3/2008', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-03-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(325, '00325/2017/NHH', '414/20687', 'MASHIZI MATABARO', '13/3/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-25', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(326, '00326/2017/NHH', '08817739', 'ALOSSA PLAMEDI', '10/8/2007', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-03-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(327, '00327/2017/NHH', '08817739', 'ALICE KWIZERA', '14/1/1974', 'FEMININ', 'GMC HENNER', 'MARIE(E)', '', '', '2017-03-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(328, '00328/2017/NHH', '08822265', 'CATHY NAKYOMBO NYAMBUZA', '15/5/1983', 'FEMININ', 'GMC HENNER', 'MARIE(E)', '', '', '2017-05-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(329, '00329/2017/NHH', '415/590946', 'BAHAVU DIENNE', '08/1/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-27', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(330, '00330/2017/NHH', '414/21477', 'MURHABAZI ASIFIWE', '07/4/2001', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(331, '00331/2017/NHH', '415/871954', 'WILONDJA BULAMBO', '20/5/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-04-01', 'DefaultPatientMal.png', 16, 'ATTENTE');
INSERT INTO `patients` (`Idauto_Patient`, `CodePatient`, `IndexMal`, `Noms`, `Age`, `Sexe`, `Profession`, `EtatCivil`, `Adresse`, `NumTel`, `DateArrive`, `Photo`, `IdUtilisateur`, `Etat`) VALUES
(332, '00332/2017/NHH', 'P001209712', 'KULIMUSI MUGHANZA', '01/1/1972', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-04-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(333, '00333/2017/NHH', '414/21477', 'MURHABAZI FARAJA', '25/1/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(334, '00334/2017/NHH', '414/20824', 'MBASWA AGANZE', '27/2/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(335, '00335/2017/NHH', '08808046', 'PIERRE-LIEVIN KAYEMBE', '02/11/2010', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-04-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(336, '00336/2017/NHH', '415/590946', 'BAHAVU THIMEON', '26/5/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(337, '00337/2017/NHH', '08822265', 'JOHANA SERGE USENI BETOKO', '24/3/2008', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-04-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(339, '00339/2017/NHH', 'P000910771', 'PELE-PELE BAKUKA', '29/8/1992', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2017-04-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(340, '00340/2017/NHH', '414/21477', 'MURHABAZI FARAJA', '25/1/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(341, '00341/2017/NHH', '244/N000032246', 'SALIKE C. ARIANE WELCOM', '07/9/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(342, '00342/2017/NHH', '244/N000032246', 'AHANA SALIKE MICHEL', '18/3/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(343, '00343/2017/NHH', 'P00129694', 'JUSTIN CHIMANUKA', '20/12/1973', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-04-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(344, '00344/2017/NHH', '415/590946', 'BAHAVU TATHIANA', '19/9/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-11', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(346, '00346/2017/NHH', 'P001028275', 'LAURICK VATUA', '20/12/2009', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2017-04-24', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(348, '00348/2017/NHH', 'P001028275', 'LORENZO VATUA', '20/12/2009', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', '', '', '2017-04-24', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(353, '00349/2017/NHH', '414/05433', 'FURAHA BASEMAGE', '13/3/1984', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-05-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(354, '00354/2017/NHH', '244/N000032130', 'ALMEIDA TSHIMANGA', '13/5/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-23', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(355, '00355/2017/NHH', '244/N000032129', 'LUSHOMBO PIERROT', '27/7/1962', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-08', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(356, '00356/2017/NHH', '244/N000032130', 'TSHIMANGA KAPPY', '06/12/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-04-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(357, '00357/2017/NHH', '414/20824', 'MBASWA AGANZE', '27/2/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(358, '00358/2017/NHH', 'P001209700', 'REHEMA PARFAITINE', '28/3/1981', 'FEMININ', 'ALLIANZ', 'MARIE(E)', '', '', '2017-04-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(359, '00359/2017/NHH', '244/N000032130', 'ALMEIDA TSHIMANGA', '18/5/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(360, '00360/2017/NHH', '244/N000032130', 'TSHIMANGA KAPINGA', '25/10/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(361, '00361/2017/NHH', '244/N000032129', 'LUSHOMBO PIERROT', '27/7/1962', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-02-25', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(362, '00362/2017/NHH', '244/N000032130', 'TSHIMANGA KAPPY', '16/12/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-01-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(363, '00363/2017/NHH', '414/23304', 'MURHULA NTWALI GRATIEN', '12/1/2015', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(364, '00364/2017/NHH', '414/21256', 'MUTANGANAY YANICK', '18/8/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(365, '00365/2017/NHH', '244/N000034241', 'MIRINDI ESTHER', '16/5/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-09', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(366, '00366/2017/NHH', '414/22443', 'NGALULA ILUNGA CLAUDIA', '35', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-08-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(367, '00367/2017/NHH', '414/05433', 'KOBINALI JOSH ANSIMA', '02/12/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-02-22', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(368, '00368/2017/NHH', '244/N000032237', 'KASUMBA DORCAS', '10', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(369, '00369/2017/NHH', '244/N000032237', 'SIVIRWA JOEL', '9', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(370, '00370/2017/NHH', '244/N000032240', 'RUBONEKA JULIE', '29/09/1973', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-04-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(371, '00371/2017/NHH', '414/22089', 'LUNGELE KITUNGANO ENOCK', '17', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-13', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(372, '00372/2017/NHH', '244/N000032240', 'SAKINA VANESSA', '20', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(373, '00373/2017/NHH', '414/22089', 'ILUNGA KYUNGU JEANNE', '48', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-04-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(374, '00374/2017/NHH', '414/22917', 'REHEMA K.IMMACULEE', '16', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-14', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(375, '00375/2017/NHH', '244/N000032237', 'KAVIRA YVETTE', '23', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-14', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(376, '00376/2017/NHH', '244/N000032237', 'KANYERE LUHANO', '21', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-14', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(377, '00377/2017/NHH', '414/22089', 'LUNGELE MILENGE DAVID', '12', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(378, '00378/2017/NHH', '414/22917', 'NSIMIRE K. MARCELINE', '17', 'FEMININ', 'C', 'CELIBATAIRE', '', '', '2016-04-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(379, '00379/2017/NHH', '414/22089', 'LUNGELE MITILA SYLVIA', '25', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(380, '00380/2017/NHH', '414/21984', 'KASIMU FIDELE', '6', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-04-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(381, '00381/2017/NHH', '414/22612', 'SIMBA SIFA  MARIE PAUL', '38', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-04-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(382, '00382/2017/NHH', '414/22196', 'RAJABU ABDOUL RAHMAN', '11', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-05-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(383, '00383/2017/NHH', '414/20863', 'ANGALIKIYANA HILAIRE', '19', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-05-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(384, '00384/2017/NHH', '415/181837', 'JOSPIN EFONGO', '25', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-05-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(385, '00385/2017/NHH', '414/22647', 'IGUNDA MUKULUTAGE', '46', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-05-18', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(386, '00386/2017/NHH', '415/181837', 'BIRINDWA CHRISTINE', '18', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-05-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(387, '00387/2017/NHH', '414/20843', 'NAMEGABE MYRIAMU', '6', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-05-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(388, '00388/2017/NHH', '414/22089', 'LUNGELE MITILA SYLVIA', '25', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-05-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(389, '00389/2017/NHH', '414/22875', 'NSHOBOLE MAMBO YVETTE', '33', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-05-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(390, '00390/2017/NHH', '414/21984', 'KAHAYO STINO', '36', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-05-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(391, '00391/2017/NHH', '414/26979', 'MABAKO CLAUDE', '50', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-06-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(392, '00392/2017/NHH', '414/22917', 'MWENGO K. ROMEO', '11', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-06-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(393, '00393/2017/NHH', '414/22917', 'IRENGE K. DESTIN', '23', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-06-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(394, '00394/2017/NHH', '414/22089', 'LUNGELE MUKUNGILWA LAURENT', '56', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-06-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(395, '00395/2017/NHH', '414/21984', 'ZAWADI MULASI', '32', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-06-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(396, '00396/2017/NHH', '414/22875', 'NGOLA MOLA AIME', '45', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-06-08', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(397, '00397/2017/NHH', '414/22089', 'LUNGELE FAIDA NATHALIE', '22', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-06-09', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(398, '00398/2017/NHH', '414/22917', 'SEKATERA  GARALUMIRHA', '42', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-06-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(399, '00399/2017/NHH', '244/N000032240', 'MABAKO DORCAS', '4', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-06-09', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(400, '00400/2017/NHH', '414/22875', 'NGOLA ASHALA JOSIANE', '2', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-06-18', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(401, '00401/2017/NHH', '414/22917', 'SIFA K. BENEDICTE', '14', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-06-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(402, '00402/2017/NHH', '414/21882', 'MALOKOLA LILA', '41', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-07-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(403, '00403/2017/NHH', '414/20860', 'BISIMWA BIZIMANA', '19', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-08-13', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(404, '00404/2017/NHH', '414/22687', 'MAVUNGU MUGISHO LANDRY', '16', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-08-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(405, '00405/2017/NHH', '414/22089', 'LUNGELE KITOGA STEVE', '09/01/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-08-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(406, '00406/2017/NHH', '414/21363', 'BAHIZIRE BARAKA JOHNSON', '5', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-09-21', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(407, '00407/2017/NHH', '414/22269', 'NYAMASHALI MARIE MARTHE', '4', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-09-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(408, '00408/2017/NHH', '414/21313', 'ANGALI ISONGA', '10/9/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(409, '00409/2017/NHH', '414/23304', 'MURHULA CHIRHUZA DANIEL', '6', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(410, '00410/2017/NHH', '414/21183', 'FADHILI AHANA', '3', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(411, '00411/2017/NHH', '414/21183', 'FADHILI MULENGABO', '4', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(412, '00412/2017/NHH', '414/21984', 'KASIMU FIDELE', '6', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(413, '00413/2017/NHH', '414/22613', 'RUTAHA MWINJA PRISCA', '11', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(414, '00414/2017/NHH', '414/21984', 'KASIMU RAMAZANI ARSENE', '4', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(415, '00415/2017/NHH', '414/22609', 'WABIWA KYALONDAWA', '20', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(416, '00416/2017/NHH', '415/76350', 'SALUMU SAIDI', '12', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(417, '00417/2017/NHH', '414/21313', 'MUZALIWA SADIKI EUGENE', '12', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-17', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(418, '00418/2017/NHH', '414/20978', 'BITAKUYA RUNISI OLIVIER', '16', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-18', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(419, '00419/2017/NHH', '414/20757', 'BICIRIBINJA NAMUBAHO', '25', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-19', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(420, '00420/2017/NHH', '414/21250', 'BAHATI NDIWAMUNGU', '4', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(421, '00421/2017/NHH', '414/21363', 'BAHIZIRE BARAKA JOHNSON', '5', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(422, '00422/2017/NHH', '414/22554', 'BIRINGO AKONKWA DONALD', '4', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-26', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(423, '00423/2017/NHH', '414/22688', 'FURAHA KASAVUBU', '34', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-10-27', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(424, '00424/2017/NHH', '414/20974', 'RWAGAZA IMANI EXAUCE', '12', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-10-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(425, '00425/2017/NHH', '414/21313', 'MUZALIWA BAKITA FORTUNE', '19/12/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(426, '00426/2017/NHH', '414/21313', 'ANGALI ISONGA', '41', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2016-11-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(427, '00427/2017/NHH', '414/22779', 'MWEMA POMBO', '18', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(428, '00428/2017/NHH', '414/20839', 'MUSIMBI MUSANGANYI LANDRY', '16', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-13', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(429, '00429/2017/NHH', '414/20978', 'BITAKUYA BUUMA SERAPHIN', '11', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '0000-00-00', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(430, '00430/2017/NHH', '244/N000032137', 'GLOIRE CHIJOLI', '19', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-11-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(431, '00431/2017/NHH', '414/21471', 'BITAHA MUHINDO NEVILE', '16/5/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2016-12-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(432, '00432/2017/NHH', '414/21816', 'AMANI CHIBAMBO JOSEPH', '56', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2016-12-16', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(433, '00433/2017/NHH', '414/21385', 'NDAY MUKENDI BLESSING', '13', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-18', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(434, '00434/2017/NHH', '414/20877', 'NIVA JOHANA MBALASSA', '14/8/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-03-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(435, '00435/2017/NHH', '414/20877', 'NIVA RAPHAEL MBALASSA', '11/4/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-18', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(436, '00436/2017/NHH', '414/21256', 'MPAGA LONGANGI', '15/8/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(437, '00437/2017/NHH', '414/21223', 'LA DOUCE BAGULA', '05/7/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-01-04', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(438, '00438/2017/NHH', 'P000910685', 'BEATRICE KASHEMWA M''RUKUNDA', '18/4/1967', 'FEMININ', 'ALLIANZ', 'MARIE(E)', '', '', '2017-05-22', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(439, '00439/2017/NHH', '414/22004', 'WAZOKA BRANDON', '29/11/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(440, '00440/2017/NHH', '414/22106', 'KAHONGYA GUILLAUME', '11/6/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-04-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(441, '00441/2017/NHH', '414/22106', 'NGAMBISEKE LINDA', '25/10/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(442, '00442/2017/NHH', '414/22004', 'NSALU ONGENDA YVETTE', '10/3/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-03-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(443, '00443/2017/NHH', '414/22003', 'SEMAKUBA LEBON', '08/9/1995', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(444, '00444/2017/NHH', '414/21312', 'AMISI FERUZI AIMERANCE', '15/9/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-31', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(445, '00445/2017/NHH', '414/20964', 'MBURUGU RIZIKI DORIANE', '13/1/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(446, '00446/2017/NHH', '414/05433', 'KOBINALI JOSH ANSIMA', '02/12/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-26', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(447, '00447/2017/NHH', '414/05433', 'KALIMURHIMA JOANNA ANSIMA', '05/12/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(448, '00448/2017/NHH', '244/N000032129', 'LUSHOMBO GABRIEL', '09/9/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(449, '00449/2017/NHH', '414/21312', 'MAKOKO YANN ELOGE', '06/1/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-21', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(450, '00450/2017/NHH', '414/20824', 'MUNYERENKANA ADELE', '26/3/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-05-21', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(451, '00451/2017/NHH', '414/21313', 'MUZALIWA M''MULILWA DEDE', '05/5/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(452, '00452/2017/NHH', '244/N000034241', 'MIRINDI ESTHER', '16/5/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-23', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(453, '00453/2017/NHH', '414/22106', 'NGAMBISEKE LINDA', '25/10/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-27', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(454, '00454/2017/NHH', '414/20964', 'MBURUGU ILUNGA MULALA', '24/11/2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-17', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(455, '00455/2017/NHH', '414/21313', 'MUZALIWA M''MULILWA DEDE', '05/5/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-04-27', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(456, '00456/2017/NHH', '414/23337', 'WENGE DOMINIQUE', '17/10/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-13', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(457, '00457/2017/NHH', '415/871954', 'WILONDJA BULAMBO', '20/5/1965', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-05-22', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(458, '00458/2017/NHH', '414/21816', 'FRANCINE AMANI', '18/2/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(459, '00459/2017/NHH', '414/23337', 'NAMIENGE WANGE', '11/10/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(460, '00460/2017/NHH', '414/23337', 'WETEBE MWIBAFULA', '28/8/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(461, '00461/2017/NHH', '414/22917', 'SEKATERA  GARALUMIRHA', '18/4/1967', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-06-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(462, '00462/2017/NHH', '414/21816', 'SERGE AMANI', '26/2/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(463, '00463/2017/NHH', '415/871954', 'PASCASIE WILONDJA', '04/4/1994', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(464, '00464/2017/NHH', '414/05433', 'KOBINALI JOSH ANSIMA', '02/12/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-04-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(465, '00465/2017/NHH', '414/22004', 'WAZOKA BRANDON', '29/11/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-05-29', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(466, '00466/2017/NHH', '414/21816', 'CHIRHUZA AMANI', '20/5/1995', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(467, '00467/2017/NHH', 'P001209674', 'CUBAKA DAMIEN MUHIMUZI', '07/5/1969', 'MASCULIN', 'ALLIANZ', 'MARIE(E)', '', '', '2017-06-14', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(468, '00468/2017/NHH', '414/21816', 'MUSHAGALUSA AMANI', '16/3/1996', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(469, '00469/2017/NHH', '414/21313', 'MUZALIWA BAKITA FORTUNE', '19/12/2005', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(470, '00470/2017/NHH', '001/70224', 'BIKOMO BELINGA ESPE ARLETTE', '05/12/1972', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(471, '00471/2017/NHH', '414/20861', 'CIKWANINE MAKELELE', '11/11/1962', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-05-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(472, '00472/2017/NHH', '414/20861', 'MAKELELE PRICILE', '11/5/1999', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-06-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(473, '00473/2017/NHH', '414/22193', 'BELEZI TOUREL', '11/12/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-04', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(474, '00474/2017/NHH', '414/22137', 'PATRICK AMOSI ABEL', '24/4/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-14', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(475, '00475/2017/NHH', '414/22193', 'BALEZI MULUM''ODERHWA', '28/8/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-07-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(476, '00476/2017/NHH', '414/22838', 'NAMEGABE BALEMBA', '17/11/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(477, '00477/2017/NHH', '414/20861', 'M''KASHUNGURHI CIZA', '03/2/1963', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(478, '00478/2017/NHH', '414/20978', 'MALIBITA ASIFIWE', '23/3/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(479, '00479/2017/NHH', '414/22137', 'PATRICK RUDIA GEORGETTE', '25/1/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-22', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(480, '00480/2017/NHH', '414/22193', 'PONGA MALAMBA ESPE', '15/1/1984', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-07-23', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(481, '00481/2017/NHH', '244/N000032130', 'TSHIMANGA KAPPY', '06/12/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-07-24', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(482, '00482/2017/NHH', '414/22917', 'REHEMA K.IMMACULEE', '29/11/2001', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(483, '00483/2017/NHH', '414/22917', 'KANYAMUKENGE BALEZI ROMAIN', '25/7/1967', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(484, '00484/2017/NHH', '414/20861', 'CIKWANINE MAKELELE', '11/11/1962', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(485, '00485/2017/NHH', '414/22687.', 'MAVUNGU MUKUZO LANDRYNE', '21/6/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(486, '00486/2017/NHH', '414/22193', 'HONDI EARLY', '11/8/2007', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(487, '00487/2017/NHH', '244/N000034255', 'DJUMA MOLA JOSUE', '27/9/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(488, '00488/2017/NHH', '414/21385', 'NDAY MUKENDI BLESSING', '07/6/2004', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(489, '00489/2017/NHH', '414/21486', 'MAGANULA ZIRHALISAKUGUMA MARTIN', '02/7/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(490, '00490/2017/NHH', '414/22192', 'MATABARO MASHEKA', '22/10/2009', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(491, '00491/2017/NHH', '414/20964', 'MBURUGU BADERHAKUGUMA ABASIMANE', '13/10/1993', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(492, '00492/2017/NHH', '414/22192', 'MATABARO CIMANUKA PROSPER', '04/6/2006', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(493, '00493/2017/NHH', '414/20964', 'LUMBU FATUMA', '04/8/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(494, '00494/2017/NHH', '414/22197', 'NSHOKANO K.TONY', '05/7/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(495, '00495/2017/NHH', '414/22839', 'NTAMULENGA BISIMWA', '10/7/1969', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-08-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(496, '00496/2017/NHH', '414/22839', 'NYENYEZI MUSHAGALUSA', '20/2/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(497, '00497/2017/NHH', '414/05433', 'KALIMURHIMA JOVIANE AMPA', '02/12/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-22', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(498, '00498/2017/NHH', '414/22193', 'TELLA BILUGHE', '29/7/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(499, '00499/2017/NHH', '414/22197', 'MWENGO K. ROMEO', '15/10/2013', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(500, '00500/2017/NHH', '414/21486', 'MUNGANGA IRAGI', '24/4/1993', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(501, '00501/2017/NHH', '244/N000032246', 'SALIKE C. ARIANE WELCOM', '07/9/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(502, '00502/2017/NHH', '414/23111', 'NKOLE JOEL NGOYI', '20/12/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(503, '00503/2017/NHH', '414/21385', 'MUKEKENDI SUCCESS TSHIBANGA', '15/8/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(504, '00504/2017/NHH', '414/22917', 'KANYAMUKENGE BALEZI ROMAIN', '25/7/1967', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(505, '00505/2017/NHH', '414/22192', 'MIRHANYO M''MIKENJI', '01/6/1974', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(506, '00506/2017/NHH', '414/20911', 'ISE-SOMO MERDI SOKI', '04/8/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(507, '00507/2017/NHH', '414/20911', 'KANINGINI BIJOU BORA', '29/8/1981', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(508, '00508/2017/NHH', '414/22193', 'KINDJA MUGOLI TRACY', '15/8/2006', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(509, '00509/2017/NHH', '414/21764', 'BALANGANE SALOMON', '28/10/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(510, '00510/2017/NHH', '414/20872', 'BASHIZI MAPENDO', '12/2/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(511, '00511/2017/NHH', '414/22193', 'MUSIMWA MUDERHWA J.', '22/1/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(512, '00512/2017/NHH', '414/21312', 'AMISA FERUZI AIMERANCE', '15/9/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-04', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(513, '00513/2017/NHH', '244/N000033891', 'SHINDANO PHILIPPE', '12/12/1958', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-04', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(514, '00514/2017/NHH', '244/N000032130', 'TSHIMANGA KAPPY', '06/12/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(515, '00515/2017/NHH', '414/20964', 'MBURUGU RIZIKI DORIANE', '13/1/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(516, '00516/2017/NHH', '414/20964', 'MBURUGU LINDA', '03/3/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(517, '00517/2017/NHH', '414/22333', 'BISIMWA LINDA', '02/02/1996', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(518, '00518/2017/NHH', '414/23345', 'MBUNDA MULUVIA', '12/12/1975', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(519, '00519/2017/NHH', '244/N000032250', 'LUNGU CHITO', '26/06/2004', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-29', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(520, '00520/2017/NHH', '414/20824', 'MAGENDO MURHULA', '24/10/1995', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(521, '00521/2017/NHH', '414/23219', 'AYAGIRWA BASHIMBE', '15/01/2000', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(522, '00522/2017/NHH', '414/23219', 'AGISHA BASHIMBE', '27/05/2003', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(523, '00523/2017/NHH', '414/23219', 'AMPIRE BASHIMBE', '02/10/1996', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-17', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(524, '00524/2017/NHH', '414/23345', 'MBUNDA JOSEPH', '25/05/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(525, '00525/2017/NHH', '414/23345', 'MBUNDA HONORE', '25/05/1998', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(526, '00526/2017/NHH', '414/23345', 'MBUYU BEATRICE', '30/06/1983', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(527, '00527/2017/NHH', '414/22431', 'ILUNGA TSHALA', '23/9/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-14', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(528, '00528/2017/NHH', '414/22431', 'FAILA KIBANGA FLORENCE', '30/11/1985', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-18', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(529, '00529/2017/NHH', '414/22431', 'NKULU MULOPWE', '20/8/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-02-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(530, '00530/2017/NHH', '414/21726', 'BALAGIZI MICHEL', '29/09/1964', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(531, '00531/2017/NHH', '244/N000034255', 'DJUMA EMMANUELLA JESSICA', '13/12/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-29', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(532, '00532/2017/NHH', '244/N000034255', 'DJUMA AMANI', '01/09/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(533, '00533/2017/NHH', '414/22333', 'BISIMWA NSHOBOLE', '05/03/1998', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-29', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(534, '00534/2017/NHH', '244/N000034255', 'FARAJA DJUMA', '27/01/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(535, '00535/2017/NHH', '414/21276', 'SALVATRICE SALUFA OMARI', '24/11/1956', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-18', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(536, '00536/2017/NHH', '244/N000049179', 'MALONGE FRANCINE', '07/01/1990', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(537, '00537/2017/NHH', '244/N000032250', 'LUNGU CIZA', '02/11/2009', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(538, '00538/2017/NHH', '244/N000034255', 'DUVULI MOUSSA VAINQEUR', '28/05/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(539, '00539/2017/NHH', '414/22932', 'AYEZEMA SENGA', '06/08/1986', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(540, '00540/2017/NHH', '414/20824', 'MBASWA AGANZE', '27/2/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(541, '00541/2017/NHH', '414/20872', 'GRACIA MAPENDO MALIKIDOGO', '28/06/2006', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(542, '00542/2017/NHH', '414/22106', 'KAHONGYA GUILLAUME', '11/6/1972', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(543, '00543/2017/NHH', '414/20872', 'ASHUZA MALIKIDOGO', '14/11/2004', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(544, '00544/2017/NHH', '414/22333', 'NAKALI DIEUDONNE', '10/10/1968', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(545, '00545/2017/NHH', '244/N000049179', 'MALONGE FRANCINE', '07/01/1990', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-29', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(546, '00546/2017/NHH', '244/N000049179', 'MALONGE FRANCINE', '07/01/1990', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(547, '00547/2017/NHH', '414/21313', 'ANGALI ISONGA', '01/9/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(548, '00548/2017/NHH', '244/N000033891', 'SHINDANO CHARLOTTE', '26/05/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(549, '00549/2017/NHH', '244/N000048748', 'RUSASURA CLAUDINE', '22/04/1973', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(550, '00550/2017/NHH', '244/N000032250', 'LUNGU CIZA', '02/11/2009', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(551, '00551/2017/NHH', '414/20886', 'BUGUGU BENITHO', '14/11/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-27', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(552, '00552/2017/NHH', '08815851', 'KITITWA BANGANTUNDU JEAN MARIE', '28/06/2008', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-17', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(553, '00553/2017/NHH', '08815851', 'KITITWA MAPENDO JEANNE', '06/11/2009', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(554, '00554/2017/NHH', '08822265', 'SERGE BETOKO', '07/07/1977', 'MASCULIN', 'GMC HENNER', 'MARIE(E)', '', '', '2017-09-13', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(555, '00555/2017/NHH', '08815851', 'BYAN KOMBE MUTEBA', '27/06/2005', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(556, '00556/2017/NHH', '08808046', 'ANGELINA MWANZA MONA', '04/02/2016', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-11-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(557, '00557/2017/NHH', '08808046', 'CELINE CLAUDE KEMPE MONA', '21/08/2006', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-12', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(558, '00558/2017/NHH', '08815851', 'KITITWA BANGANTUNDU JEAN MARIE', '28/06/2008', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-09-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(559, '00559/2017/NHH', '08815851', 'KITITWA MAPENDO JEANNE', '06/11/2009', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-08-16', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(560, '00560/2017/NHH', '08815851', 'JOSEPH MWANGA', '4', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(561, '00561/2017/NHH', '08815851', 'KOMBE TULINABO CHRISTINE', '11/05/1977', 'FEMININ', 'GMC HENNER', 'MARIE(E)', '', '', '2017-09-23', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(562, '00562/2017/NHH', '08822265', 'JOHANA SERGE USENI BETOKO', '24/03/2008', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-08-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(563, '00563/2017/NHH', '08822265', 'ANAIS SAFI BETOKO', '09/06/2005', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-11-04', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(564, '00564/2017/NHH', '08822265', 'ANAIS SAFI BETOKO', '09/06/2005', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-07-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(565, '00565/2017/NHH', '08822265', 'KANAYAH NANA LWANGA BETOKO', '16/08/2010', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-21', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(566, '00566/2017/NHH', '08808046', 'ANGELINA MWANZA MONA', '04/02/2016', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', '', '', '2017-10-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(567, '00567/2017/NHH', '08817739', 'ALICE KWIZERA', '14/1/1974', 'FEMININ', 'GMC HENNER', 'MARIE(E)', '', '', '2017-11-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(568, '00568/2017/NHH', '244/N000048784', 'NTABOBA NDUSHABANDI', '23/08/2004', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(569, '00569/2017/NHH', '414/22431', 'FAILA KIBANGA FLORENCE', '30/11/1985', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(570, '00570/2017/NHH', '414/22520', 'MAVUNGU ELIELLE', '09/10/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-09', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(571, '00571/2017/NHH', '244/N000032246', 'KASHAMA SANDRINE WELCOM', '01/05/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(572, '00572/2017/NHH', '244/N000032245', 'SELEMANI ADOLPHE', '31/12/1963', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-19', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(573, '00573/2017/NHH', '414/22520', 'MAVUNGU ELIANE', '10/11/2013', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-09', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(574, '00574/2017/NHH', '244/N000032247', 'MUSHAGALUSA MICHEL', '29/01/1977', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-19', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(575, '00575/2017/NHH', '244/N000032245', 'SELEMANI ADOLPHE', '31/12/1963', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-19', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(576, '00576/2017/NHH', '414/21199', 'KISSA BARAKA ANGEL', '12/11/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(577, '00577/2017/NHH', '414/22364', 'WATOKALUSU MACHOZI', '31/12/1978', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(578, '00578/2017/NHH', '414/23219', 'BADERHA MARIELLE', '24/02/1964', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(579, '00579/2017/NHH', '414/22560', 'EMILE BIRINDWA', '01/11/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-21', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(580, '00580/2017/NHH', '414/21816', 'JULIENNE AMANI', '20/05/1995', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-28', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(581, '00581/2017/NHH', '414/21040', 'KYAMONA ANNIE', '28/12/1991', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-04', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(582, '00582/2017/NHH', '414/21601', 'MUKENGERE EXAUCE', '15/04/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(583, '00583/2017/NHH', '414/21199', 'KISSA AHADI JONAS ROGER', '12/07/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(584, '00584/2017/NHH', '415/980474', 'MOZA KAZEMBE', '04/12/1974', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-11', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(585, '00585/2017/NHH', '414/21816', 'CHIRHUZA AMANI', '20/05/1995', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(586, '00586/2017/NHH', '414/21199', 'KISSA KISHUBA JONAS', '27/03/1971', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-24', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(587, '00587/2017/NHH', '414/22196', 'ABUBAKAR DJAFAR YANN', '13/10/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(588, '00588/2017/NHH', '414/22917', 'BULONZA K. ESTHER', '07/09/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(589, '00589/2017/NHH', '414/21385', 'MUKEKENDI SUCCESS TSHIBANGA', '15/08/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(590, '00590/2017/NHH', '414/21199', 'KISSA QUEEN FARAJA', '08/09/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-29', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(591, '00591/2017/NHH', '244/N000032240', 'RUBONEKA JULIE', '29/09/1973', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(592, '00592/2017/NHH', '414/22089', 'LUNGELE KITOGA STEVE', '09/01/1997', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(593, '00593/2017/NHH', '414/21477', 'MURHABAZI IMANA', '23/05/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(594, '00594/2017/NHH', '414/21313', 'NOUVEAU NE DE ANGALI ISONGA', '30/10/2017', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-04', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(595, '00595/2017/NHH', '414/21385', 'LUBAMBA MUKENDI IRENE', '23/01/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-10-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(596, '00596/2017/NHH', '415/980472', 'BOTERO MOISE', '22/10/1999', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-21', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(597, '00597/2017/NHH', '414/21477', 'MURHABAZI ACHILE', '04/02/1974', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(598, '00598/2017/NHH', '414/22614', 'KUJIRAKWINJA AMPIRA LARISSA', '23/06/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-18', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(599, '00599/2017/NHH', '414/22614', 'BAHARANYI CIZA MARIE ROSE', '03/03/1990', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-23', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(600, '00600/2017/NHH', '415/181837', 'BANYANGA HAMULI', '19/04/1963', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(601, '00601/2017/NHH', '414/20711', 'NJIBA ELAMEJI CHRISTIVIE', '04/04/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(602, '00602/2017/NHH', '244/N000032240', 'RUBONEKA JULIE', '29/09/1973', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(603, '00603/2017/NHH', '414/04165', 'BORA HERI FRANCINE', '24/02/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-22', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(604, '00604/2017/NHH', '414/21199', 'KISSA BIRA JANE', '02/02/2017', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-26', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(605, '00605/2017/NHH', '414/21385', 'TSHIALA MUKENDI LUCKY', '30/07/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-19', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(606, '00606/2017/NHH', '414/20971', 'BWANSOLU GABRIEL MUNDYO', '21/04/2015', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-27', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(607, '00607/2017/NHH', '414/72871', 'SELEMANI MWAMINI VIRGINIE', '29/11/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(608, '00608/2017/NHH', '414/20886', 'BUGUGU MUNYIRAGI', '13/02/2009', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-01', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(609, '00609/2017/NHH', '414/22006', 'KAMESA NYANGI IVANA', '05/04/2011', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-05', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(610, '00610/2017/NHH', '414/20877', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-07', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(611, '00611/2017/NHH', '414/20877', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-10-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(612, '00612/2017/NHH', '414/20964', 'MBURUGU RIZIKI DORIANE', '13/01/2016', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-13', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(613, '00613/2017/NHH', '414/21385', 'MUKENDI SUCCES TSHIBANDA', '15/08/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(614, '00614/2017/NHH', '414/22839', 'NYENYEZI MUSHAGALUSA', '20/02/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-09-11', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(615, '00615/2017/NHH', '414/21385', 'MUKENDI WA MUKENDI JOY', '22/05/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(616, '00616/2017/NHH', '414/20964', 'MBURUGU BADERHAKUGUMA ABASIMANE', '13/10/1993', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-04', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(617, '00617/2017/NHH', '414/20964', 'MBURUGU JOSEPHINE', '4', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(618, '00618/2017/NHH', '414/20711', 'ELAMEJI NOELLA', '04/02/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-07-25', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(619, '00619/2017/NHH', '414/20711', 'MBOMBO NATHALIE', '27/12/1982', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-08-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(620, '00620/2017/NHH', '244/N000034255', 'DJUMA JEMIMA', '05/05/2002', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(621, '00621/2017/NHH', '414/20877', 'NABAHESE NYAMBUZA', '08/05/1985', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-06', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(622, '00622/2017/NHH', '022/70089', 'NAMA CIRHIBUKA MAXIME', '10/11/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(623, '00623/2017/NHH', '414/22364', 'SAFARI NENGWA JOSEPH', '22/06/2005', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(624, '00624/2017/NHH', '414/20877', 'NIVA FEZA ERICA JEANNE', '20/08/2013', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(625, '00625/2017/NHH', '244/N000033891', 'SHINDANO PHILIPPE', '12/12/1958', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-29', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(626, '00626/2017/NHH', '414/21385', 'MUKENDI CONSTANTIN', '17/2/1976', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(627, '00627/2017/NHH', '244/N000032246', 'ROMKEKA SALIKE DIEUDONNE', '25/10/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-22', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(628, '00628/2017/NHH', '244/N000032246', 'AHANA SALIKE MICHEL', '28/03/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-22', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(629, '00629/2017/NHH', '414/20964', 'LUMBU FATUMA', '04/8/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-21', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(630, '00630/2017/NHH', '244/N000032246', 'ARIEL SALIKE MIKE NFIZI', '31/05/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(631, '00631/2017/NHH', '244/N000032246', 'ARIEL SALIKE MIKE NFIZI', '31/05/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-27', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(632, '00632/2017/NHH', '414/20964', 'MBURUGU BADERHAKUGUMA ABASIMANE', '13/10/1993', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-19', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(633, '00633/2017/NHH', '414/20886', 'BUGUGU BENITHO', '14/11/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-23', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(634, '00634/2017/NHH', '414/21103', 'SHABANI BIMOZA', '04/09/1990', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-16', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(635, '00635/2017/NHH', '415/980472', 'KAVUMU GUILAIN', '17/07/2001', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-08-22', 'DefaultPatientMal.png', 16, 'ATTENTE');
INSERT INTO `patients` (`Idauto_Patient`, `CodePatient`, `IndexMal`, `Noms`, `Age`, `Sexe`, `Profession`, `EtatCivil`, `Adresse`, `NumTel`, `DateArrive`, `Photo`, `IdUtilisateur`, `Etat`) VALUES
(636, '00636/2017/NHH', '415/980472', 'MIRIAM CLEMENTINE', '21/06/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-19', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(637, '00637/2017/NHH', '414/04165', 'KAYUMBA WENDO ANDRE', '19/04/2010', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-11', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(638, '00638/2017/NHH', '414/21471', 'BITAHA MUHINDO NEVIL', '16/05/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-19', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(639, '00639/2017/NHH', '414/21199', 'KISSA KISHUBA JONAS', '27/03/1971', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-09-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(640, '00640/2017/NHH', '414/22333', 'NAKALI DIEUDONNE', '10/10/1968', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-04', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(641, '00641/2017/NHH', '414/21276', 'WA MWAMBA SALUFA', '10/03/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-01', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(642, '00642/2017/NHH', '414/21199', 'KISSA BARAKA ANGEL', '12/11/2009', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-10', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(643, '00643/2017/NHH', '414/22560', 'KETIA BIRINDWA', '11/11/2011', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-10-11', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(644, '00644/2017/NHH', '414/22365', 'BISIMWA ANNE', '13/01/2017', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(645, '00645/2017/NHH', '414/22365', 'BISIMWA PRECIEUSE ASHUZA', '06/05/2014', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-12', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(646, '00646/2017/NHH', '414/20967', 'MURHWA OLIVIER NDAELE PUNGI', '17/08/2009', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-25', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(647, '00647/2017/NHH', '414/20967', 'MURHWA ALAIN', '12/02/1974', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-08', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(648, '00648/2017/NHH', '414:22365', 'IRENGE MATHE VICTOIRE', '08/04/1987', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-12-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(649, '00649/2018/NHH', '08808046', 'GRACE ETONGA MONA', '25/03/2008', 'FEMININ', 'HENNER', 'CELIBATAIRE', '', '', '2017-11-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(650, '00650/2018/NHH', '08821639', 'EBENEZER CIZA BADESIRE', '04/10/2016', 'MASCULIN', 'HENNER', 'CELIBATAIRE', '', '', '2017-09-27', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(651, '00651/2018/NHH', '08821639', 'CITO ARMAND BADESIRE', '03/01/2013', 'MASCULIN', 'HENNER', 'CELIBATAIRE', '', '', '2017-12-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(652, '00652/2018/NHH', '08808046', 'PIERRE LIEVAIN KAYEMBE MONA', '09/11/2010', 'MASCULIN', 'HENNER', 'CELIBATAIRE', '', '', '2017-12-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(653, '00653/2018/NHH', '08808046', 'IVON MONA KAYEMBE', '10/08/1971', 'MASCULIN', 'HENNER', 'MARIE(E)', '', '', '2017-12-13', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(654, '00654/2018/NHH', '08821639', 'CIKURU HERMAN BADESIRE', '03/01/2013', 'MASCULIN', 'HENNER', 'CELIBATAIRE', '', '', '2017-10-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(655, '00655/2018/NHH', '08821639', 'DAN IRAGI KAGALE', '23/08/2008', 'MASCULIN', 'HENNER', 'CELIBATAIRE', '', '', '2017-12-21', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(656, '00656/2018/NHH', '08821639', 'MERDI PASCAL DIOKA BADESIRE', '27/01/2011', 'MASCULIN', 'HENNER', 'CELIBATAIRE', '', '', '2017-11-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(657, '00657/2018/NHH', '414/22364', 'SAFARI NARCISSE', '29/10/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(658, '00658/2018/NHH', '414/22364', 'SAFARI FORTUNAT', '03/04/2006', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-11-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(659, '00659/2018/NHH', '414/21385', 'LUBAMBA MUKENDI IRENE', '22/01/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2018-01-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(660, '00660/2018/NHH', '414/21256', 'MUTANGANAY FISTON', '02/01/1974', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-11-25', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(661, '00661/2018/NHH', '414/20877', 'NIVA RAPHAEL', '11/04/2014', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(662, '00662/2018/NHH', '414/21385', 'MUKENDI WA MUKENDI JOY', '22/05/2011', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2018-01-02', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(663, '00663/2018/NHH', '414/22364', 'SAFARI CHASEMBE', '07/04/1971', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-15', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(664, '00664/2018/NHH', '08804977', 'GASI MATURU', '15/11/1977', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-11-14', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(665, '00665/2018/NHH', '414/21385', 'MUKENDI SUCCESS TSHIBANDA', '18/05/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-24', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(666, '00666/2018/NHH', '414/20877', 'NIVA MBALASA JOHANA', '14/08/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2018-01-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(667, '00667/2018/NHH', '414/21385', 'TSHIALA MUKENDI LUCKY', '30/07/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(668, '00668/2018/NHH', '414/21385', 'NDAY MUKENDI BLESSING', '07/06/2004', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-15', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(669, '00669/2018/NHH', '414/20877', 'NIVA FEZA ERICA JEANNE', '20/08/2013', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2018-01-07', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(670, '00670/2018/NHH', '414/21726', 'BALAGIZI MICHEL', '29/09/1964', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2018-01-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(671, '00671/2018/NHH', '244/N000033891', 'SHINDANO PHILIPPE', '12/12/1958', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2018-01-06', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(672, '00672/2018/NHH', '414/20964', 'LUMBU FATUMA', '13/05/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2018-01-03', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(673, '00673/2018/NHH', '414/21313', 'ANGALI ISONGA', '01/09/1975', 'FEMININ', 'CIGNA', 'MARIE(E)', '', '', '2017-12-30', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(674, '00674/2018/NHH', '244/N000032246', 'AHANA SALIKE MICHEL', '28/03/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-30', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(675, '00675/2018/NHH', '244/N000032246', 'MOUSSA DJUMA MOISE', '25/05/1975', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-09', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(676, '00676/2018/NHH', '244/N000034255', 'AMANI DJUMA', '01/09/2003', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-14', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(677, '00677/2018/NHH', '244/N000033891', 'SHINDANO CHARLOTTE', '26/05/2010', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-02', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(678, '00678/2018/NHH', '244/N000033891', 'ESTHER SHINDANO', '23/03/2004', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-12', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(679, '00679/2018/NHH', '414/21313', 'MUZALIWA DELICE ALIMA', '16/11/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-19', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(680, '00680/2018/NHH', '244/N000032246', 'ARIEL SALIKE MIKE NFIZI', '31/05/2012', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2018-01-03', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(681, '00681/2018/NHH', '414/21385', 'MUKENDI CONSTANTIN', '17/02/1976', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-26', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(682, '00682/2018/NHH', '414/21768', 'ASSOMANI ANA', '16/04/2008', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-19', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(683, '00683/2018/NHH', '244/N000033938', 'KAYAMWE DUNIA', '20/11/1980', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2018-01-10', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(684, '00684/2018/NHH', '414/21107', 'MBUYU TWITE', '06/03/1984', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2018-01-12', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(685, '00685/2018/NHH', '414/20877', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2017-12-20', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(686, '00686/2018/NHH', '414/22364', 'SAFARI NEGWA JOSEPH', '22/06/2008', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(687, '00687/2018/NHH', '244/N000048784', 'IRAGI NDUSHABANDI', '02/01/2013', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-28', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(688, '00688/2018/NHH', '414/20860', 'MUTUMPWE KIZITO JOEL', '18/07/1993', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', '', '', '2017-12-21', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(689, '00689/2018/NHH', '414/22364', 'SAFARI CHASEMBE', '07/04/1971', 'MASCULIN', 'CIGNA', 'MARIE(E)', '', '', '2018-01-05', 'DefaultPatientMal.png', 16, 'ATTENTE'),
(690, '00690/2018/NHH', '414/21469', 'BAGUMA WINNER IRANGA', '25/03/2012', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2018-01-08', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(691, '00691/2018/NHH', '414/21313', 'MUZALIWA ISONGA INES', '30/06/2007', 'FEMININ', 'CIGNA', 'CELIBATAIRE', '', '', '2017-09-20', 'DefaultPatientFem.png', 16, 'ATTENTE'),
(692, '00692/2018/NHH', '414/20971', 'BWANSOLU GABRIEL MUNDYO', '21/04/2015', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', 'HYPPODROME', '0975579092', '2018-02-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(693, '00693/2018/NHH', '-', 'MURHULA BASIMIKE EVARISTE', '03/03/2018', 'MASCULIN', 'ITM/AFRIK', 'CELIBATAIRE', 'NGUBA', '0854440941', '2018-02-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(694, '00694/2018/NHH', '023/SK/2018', 'SAMURANGWA RUGIMBANA JUSTIN', '08/08/1978', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'NGUBA', '0824811340', '2018-02-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(695, '00695/2018/NHH', '', 'FURAHA MURHULA', '06/04/2006', 'FEMININ', 'WS/INSIGHT', 'CELIBATAIRE', '', '0998785091', '2018-02-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(696, '00696/2018/NHH', '', 'ELODIE MUSAFIRI', '1991', 'FEMININ', 'ITM/AFRIK', 'MARIE(E)', 'NGUBA', '0854440941', '2018-02-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(697, '00697/2018/NHH', '001193906', 'JULES KHALED SIBATU', '13/09/2017', 'MASCULIN', 'ALLIANZ', 'CELIBATAIRE', 'BRASSERIE0977473241', '', '2018-02-03', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(698, '00698/2018/NHH', 'P001193906', 'IKINGA NADEGE', '26/02/1994', 'FEMININ', 'ALLIANZ', 'MARIE(E)', 'BRASSERIE', '0977473241', '2018-02-03', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(699, '00699/2018/NHH', '414..........Â§ ......................0..........................1    ', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'NGUBA', '0997733401', '2018-02-01', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(700, '00700/2018/NHH', '', 'ANNIE NDAYA', '13/3/1829', 'FEMININ', 'SOFAS', 'MARIE(E)', 'NYAWERA', '0974102252', '2018-02-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(701, '00701/2018/NHH', '', 'JOYCE MAGADJU', '20/11/1994', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '', '2018-02-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(702, '00702/2018/NHH', '', 'ANNIE MWAMINI', 'ADULT', 'FEMININ', 'SESOMO', 'MARIE(E)', 'ISP', '', '2018-02-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(703, '00703/2018/NHH', '414/21726', 'BALAGIZI MICHEL', '29/09/1964', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'NGUBA', '0997765464', '2018-01-01', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(704, '00704/2018/NHH', '', 'AMANDA MALIMINGI', '11I04I2008', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0994304020', '2018-02-02', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(705, '00705/2018/NHH', '08817742', 'NADINE BISIMWA', '14I08II198', 'FEMININ', 'GMC HENNER', 'MARIE(E)', 'AVIDUPLATEAU', '0997731384', '2018-02-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(706, '00706/2018/NHH', '030/SK/2018', 'MADELEINE ELUNGU', '09/09/2017', 'FEMININ', 'INTERSOS', 'CELIBATAIRE', 'CERCLE HYPI', '0997162170', '2018-02-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(707, '00707/2018/NHH', '03/SK/018', 'MUPOLE MUKENGE', '20ans', 'FEMININ', 'INTERSOS', 'MARIE(E)', 'CERCLE HYPI', '0997162170', '2018-02-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(708, '00708/2018/NHH', '', 'MUSHAGALUZA BAHIZIRE', '05/02/1982', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'BAGIRA', '0971305488', '2018-01-01', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(709, '00709/2018/NHH', '', 'FRANCISCA BABONE', '22/12/2017', 'FEMININ', 'WS/INSIGHT', 'CELIBATAIRE', 'NGUBA', '0897238772', '2018-01-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(710, '00710/2018/NHH', '', 'VIVIANE CISHUGI', '1982', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0853713030', '2018-01-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(711, '00711/2018/NHH', '', 'CIKWANINE KULIMUSHI', '1998', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'BAGIRA', '', '2018-02-04', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(712, '00712/2018/NHH', '', 'AZIZA BASILWANGO', '12/10/1998', 'FEMININ', 'PRIVEE', 'MARIE(E)', '', '0851210445', '2018-02-04', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(713, '00713/2018/NHH', '', 'JULIENNE MITUBA KABARA', '1957', 'FEMININ', 'Famille todjo', 'MARIE(E)', 'kadutu', '', '2018-02-05', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(714, '00714/2018/NHH', '', 'NABINTU NSHANGI', '27ans', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'KAMEMBE', '0974979722', '2018-02-05', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(715, '00715/2018/NHH', '', 'ESTHER BUHENDWA', '21ans', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0976593843', '2018-02-05', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(716, '00716/2018/NHH', '', 'BAHATI CIZUNGU', '13/07/1985', 'MASCULIN', 'HDW', 'MARIE(E)', 'BRASSERIE', '0850193535', '2018-02-05', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(717, '00717/2018/NHH', '', 'BALINGO KULEMBA CHARLES', '05/05/1975', 'MASCULIN', 'SESOMO', 'MARIE(E)', 'NGUBA', '0978601419', '2018-02-06', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(718, '00718/2018/NHH', '', 'ASSOMBA PATRICIA', '28/10/2016', 'FEMININ', 'HDW', 'CELIBATAIRE', 'ISTM', '0854274612', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(719, '00719/2018/NHH', '', 'NSIMIRE MUTALIMA', '2015', 'FEMININ', 'INTERSOS', 'CELIBATAIRE', 'KADUTU', '0976823843', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(720, '00720/2018/NHH', '', 'ANTOINETTE MUNYANYA', '26/12/1973', 'FEMININ', 'INTERSOS', 'MARIE(E)', 'KADUTU', '0976823843', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(721, '00721/2018/NHH', '', 'EUPHRASIE KAPUNGA', '1985', 'FEMININ', 'INTERSOS', 'MARIE(E)', 'PAGECO', '0854182531', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(722, '00722/2018/NHH', '', 'SARAH NSULI', '04/04/1990', 'FEMININ', 'SESOMO', 'MARIE(E)', 'MUKUKWE', '0975161030', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(723, '00723/2018/NHH', '', 'ANAELLAH KASHANGE', '06/01/2017', 'FEMININ', 'SESOMO', 'CELIBATAIRE', 'MUKUKWE', '0975161030', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(724, '00724/2018/NHH', '', 'MULINDWA BAHATI DIEUDONNE', '1982', 'MASCULIN', 'HDW', 'MARIE(E)', 'Q/ NKAFU', '0852302404', '2018-02-06', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(725, '00725/2018/NHH', '08815851', 'JOSEPH MWANGA', '4ans', 'FEMININ', 'GMC HENNER', 'CELIBATAIRE', 'NGUBA', '', '2018-02-07', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(726, '00726/2018/NHH', '', 'PAYELLE AMBIKA', '11/03/2017', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0978651575', '2018-02-07', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(727, '00727/2018/NHH', 'PRIVE', 'BYAMUNGU BAHAYA FLORENTIN', '36', 'MASCULIN', 'HOTELERIE', 'CELIBATAIRE', 'BUHOLO3', '0852123921', '2018-02-07', 'DefaultPatientMal.png', 19, 'ATTENTE'),
(728, '00728/2018/NHH', 'PRIVE', 'AKSANTI CHASINGA', '35ANS', 'FEMININ', 'MENQGERE', 'MARIE(E)', 'NGUBA', '0997174152', '2018-02-07', 'DefaultPatientFem.png', 19, 'ATTENTE'),
(729, '00729/2018/NHH', 'SOFAS', 'BOLAGIZI MAKOMBO FLORIBERT', '02.02.1958', 'MASCULIN', 'SOFAS', 'MARIE(E)', 'NYAWERA', '0997339847', '2018-02-07', 'DefaultPatientMal.png', 19, 'ATTENTE'),
(730, '00730/2018/NHH', '', 'ANNIE MWAMINI', '1960', 'FEMININ', 'SESOMO', 'MARIE(E)', 'ISP', '0997743077', '2018-02-06', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(731, '00731/2018/NHH', '', 'MULINDWA BAHATI DIEUDONNE', '1982', 'MASCULIN', 'HDW', 'MARIE(E)', 'Q/ NKAFU', '0852302404', '2018-02-07', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(732, '00732/2018/NHH', '244/N000032246', 'KASHAMA SANDRINE WELCOM', '01/05/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', 'AVIDUPLATEAU', '', '2018-02-08', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(733, '00733/2018/NHH', '041/SK/2018', 'MUNGU AKONKWA MUTALIMA', '2013', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'KADUTU', '', '2018-02-08', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(734, '00734/2018/NHH', '244/N000035938', 'MWEZE APPOLINAIRE', '12/09/1970', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'NYALUKEMBA', '', '2018-02-08', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(735, '00735/2018/NHH', '', 'ANNIE NDAYA', '13/3/1982', 'FEMININ', 'SOFAS', 'MARIE(E)', 'NYAWERA', '0974102252', '2018-02-08', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(736, '00736/2018/NHH', '414/20964', 'MBURUGU JOSAPHAT', '18:09:2002', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', 'AV/P E L', '0813140432', '2018-02-08', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(737, '00737/2018/NHH', '', 'ASSOMBA PATRICIA', '28/10/2016', 'FEMININ', 'HDW', 'CELIBATAIRE', 'ISTM', '0854274612', '2018-02-08', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(738, '00738/2018/NHH', '', 'NANDUHURA AIMEE', '1981', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'SOMINKI', '0999006238', '2018-02-08', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(739, '00739/2018/NHH', '', 'ANNIE MWAMINI', '1960', 'FEMININ', 'SESOMO', 'MARIE(E)', 'ISP', '0997743077', '2018-02-08', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(740, '00740/2018/NHH', '08817742', 'NADINE BISIMWA', '14/08/1982', 'FEMININ', 'GMC HENNER', 'MARIE(E)', 'AV/ DU PLATEAU', '0997731384', '2018-02-09', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(741, '00741/2018/NHH', '', 'KONGA MULIMA CHANTAL', '11/01/1980', 'FEMININ', 'BRAVO', 'MARIE(E)', 'KADUTU', '0891480013', '2018-02-09', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(742, '00742/2018/NHH', '', 'JOSAPHATE KASILEMBO', '21/11/2012', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'AV/ DU LAC', '0997085072', '2018-02-09', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(743, '00743/2018/NHH', 'PRIVE', 'STEVE MUKULU', '26.06.2000', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'NDENDERE', '0990616973', '2018-02-10', 'DefaultPatientMal.png', 19, 'ATTENTE'),
(744, '00744/2018/NHH', 'PRIVE', 'NEZA CHANTAL', '32ANS', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'SOMENKI', '0997670546', '2018-02-10', 'DefaultPatientFem.png', 19, 'ATTENTE'),
(745, '00745/2018/NHH', '', 'NAMEGABE ANITHA', '1996', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'AV/ IKANGA', '0898345666', '2018-02-09', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(746, '00746/2018/NHH', '', 'TULINABO ODETTE', '12/05/1982', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0998916727', '2018-02-10', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(747, '00747/2018/NHH', '', 'AMPIRE KULEMBA MOISE', '15/07/2017', 'MASCULIN', 'SESOMO', 'CELIBATAIRE', 'NGUBA', '0998916727', '2018-02-10', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(748, '00748/2018/NHH', '', 'NATHALIE BURHAMA', '18/04/1988', 'FEMININ', 'PRIVEE', 'MARIE(E)', '', '0994304771', '2018-02-10', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(749, '00749/2018/NHH', '', 'AGANZE BALAGIZI', '23/01/1997', 'FEMININ', 'CIGNA', 'CELIBATAIRE', 'NGUBA', '', '2018-02-10', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(750, '00750/2018/NHH', '', 'AMULI DAVID TODJO', '21/01/1951', 'MASCULIN', 'F/ TODJO', 'MARIE(E)', 'KADUTU', '0990947069', '2018-02-11', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(751, '00751/2018/NHH', '', 'CHANTAL NANDUHURA', '1986', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '', '2018-02-11', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(752, '00752/2018/NHH', '', 'FURAHA MONGANE', '14/12/1986', 'FEMININ', 'SESOMO', 'CELIBATAIRE', 'AV/ FIZI', '0990522703', '2018-02-11', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(753, '00753/2018/NHH', '', 'NSHAGALI CIRIBUKA AUDREY', '26/06/2017', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'AV/ DERESIDENCE', '0994304771', '2018-02-20', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(754, '00754/2018/NHH', '414/20964', 'LUMBU FATUMA', '04/08/1976', 'FEMININ', 'CIGNA', 'MARIE(E)', 'AV/ P E LUMUMBA', '0813140432', '2018-01-20', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(755, '00755/2018/NHH', '', 'NABINTU KANYWESI', '13/07/1979', 'FEMININ', 'FAMILLE SHINDANO', 'MARIE(E)', 'NGUBA', '', '2018-02-20', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(756, '00756/2018/NHH', '', 'URCILE MWANGO', '04/08/2017', 'FEMININ', 'FAMILLE SHINDANO', 'CELIBATAIRE', 'NGUBA', '0844199860', '2018-02-20', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(757, '00757/2018/NHH', '', 'MBAYU CITO J PETIT', '11/05/2016', 'MASCULIN', 'SOFAS', 'MARIE(E)', 'MUKUKWE', '0975161030', '2018-02-20', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(758, '00758/2018/NHH', '', 'MATHIEU KASONGO', '22/01/1965', 'MASCULIN', 'HDW', 'MARIE(E)', 'NYAMUGO', '0853137792', '2018-02-20', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(759, '00759/2018/NHH', '', 'NTAKWINJA ANNE-MARIE ', '26ans', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'AV/FIZI', '', '2018-02-12', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(760, '00760/2018/NHH', '', 'GAETHA MAHESHE', '13/11/2017', 'MASCULIN', 'SESOMO', 'CELIBATAIRE', 'NGUBA', '0999556094', '2018-02-12', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(761, '00761/2018/NHH', '', 'RUSINGIZWA ILDEPHONSE', '07/08/1975', 'MASCULIN', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0812915109', '2018-01-12', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(762, '00762/2018/NHH', '', 'MADELEINE ELUNGU', '09/09/2017', 'FEMININ', 'INTERSOS', 'CELIBATAIRE', 'CERCLE HYPI', '0997162170', '2018-02-12', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(763, '00763/2018/NHH', '022/SK/2018', 'ELISE AMISI', '11/04/2014', 'FEMININ', 'INTERSOS', 'CELIBATAIRE', 'BUKAVU', '', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(764, '00764/2018/NHH', '', 'JIMMY NAMWANYA', '09/09/1983', 'MASCULIN', 'HDW', 'CELIBATAIRE', 'PESAGE', '0999931965', '2018-02-12', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(765, '00765/2018/NHH', '', 'TETA DARLEINE', '26/03/2010', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(766, '00766/2018/NHH', '', 'SHEMA MURETA', '30/10/2012', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '', '2018-02-12', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(767, '00767/2018/NHH', '08822265', 'KENAYAH NANA LWANGA BETOKO', '16/08/2010', 'FEMININ', 'HENNRE', 'CELIBATAIRE', 'AV/ DU LAC', '0993152319', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(768, '00768/2018/NHH', '', 'JOB LURHALI', '10/08/1987', 'MASCULIN', 'HDW', 'CELIBATAIRE', 'NGUBA0976527446', '', '2018-02-12', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(769, '00769/2018/NHH', '', 'OLAME NDAME FLORENCE', '1991', 'FEMININ', 'INTERSOS', 'MARIE(E)', 'AV/ DELA PLACE', '0974209298', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(770, '00770/2018/NHH', '', 'BINJA MUZALIA NATHAN', '09/05/2015', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'AV/ DELA PLACE', '0974209298', '2018-02-12', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(771, '00771/2018/NHH', '', 'ANNIE NDAYA', '13/03/1982', 'FEMININ', 'SOFAS', 'MARIE(E)', 'NYAWERA', '0974102252', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(772, '00772/2018/NHH', '', 'AGANZE BALAGIZI', '23/01/1997', 'FEMININ', 'CIGNA', 'CELIBATAIRE', 'NGUBA', '', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(773, '00773/2018/NHH', '', 'UWIMANA JEANNE', '1997', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '', '2018-02-12', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(774, '00774/2018/NHH', '', 'AMINA CHASINGA', '30/09/1998', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'MUHUMBA', '0997174152', '2018-02-13', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(775, '00775/2018/NHH', '', 'NANKAFU MADJAMBI DIEU-MERCI', '1993', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0973669617', '2018-02-13', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(776, '00776/2018/NHH', '', 'ANNIE MWAMINI', '1960', 'FEMININ', 'SESOMO', 'MARIE(E)', 'ISP', '0997743077', '2018-02-13', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(777, '00777/2018/NHH', '', 'JULES MUKABALERHA LWAMISOLE', '1987', 'MASCULIN', 'HDW', 'CELIBATAIRE', 'MUKUKWE', '0840046018', '2018-02-13', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(778, '00778/2018/NHH', '', 'ARTHUR NGOMA', '1987', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'AV/ KINDU', '09952054124', '2018-02-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(779, '00779/2018/NHH', '244/N000033891', 'MANGAZA CHRISTINE', '14/11/1972', 'FEMININ', 'CIGNA', 'MARIE(E)', 'NGUBA', '0990441213', '2018-02-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(780, '00780/2018/NHH', '', 'MARTINE AMISI', '2007', 'FEMININ', 'FAMILLE SHINDANO', 'CELIBATAIRE', 'NGUBA', '0990441213', '2018-02-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(781, '00781/2018/NHH', '029/SK/2018', 'BITONDO MUYENGO', '1996', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'NGUBA', '0975778099', '2018-02-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(782, '00782/2018/NHH', '', 'NIYONURU SIMEON', '30/07/2016', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0783617356', '2018-02-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(783, '00783/2018/NHH', '08817742', 'MATONDO GABRIEL BYASUMBA', '02/10/2012', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', 'AV/ DU PLATEAU', '0997731384', '2018-02-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(784, '00784/2018/NHH', '414/21385', 'LUBAMBA MUKENDI IRENE', '23/01/1986', 'FEMININ', 'CIGNA', 'MARIE(E)', 'NGUBA', '', '2018-02-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(785, '00785/2018/NHH', '414/21385', 'NTSHILA MUKENDI LUCK', '30/07/2007', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', 'NGUBA', '0994025507', '2018-02-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(786, '00786/2018/NHH', '', 'AHANA SALIKE MICHEL', '28/03/2016', 'MASCULIN', 'CIGNA', 'CELIBATAIRE', 'NGUBA', '', '2018-02-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(787, '00787/2018/NHH', '', 'MUNEREZO ANGE', '01/05/1996', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0998259311', '2018-02-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(788, '00788/2018/NHH', '', 'AGANZE GUILAIN', '1993', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'SOMINKI', '0974658040', '2018-02-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(789, '00789/2018/NHH', '414/22103', 'MOUSSADJUMA MOISE', '1982', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'FEU-ROUGE', '0992404394', '2018-02-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(790, '00790/2018/NHH', '', 'SADI MOUSSA SIMBI', '05/2017', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'AV. PANGI', '0826263043', '2018-02-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(791, '00791/2018/NHH', '08817742', 'MATONDO DANIEL', '02/11/2002', 'MASCULIN', 'HENNER', 'CELIBATAIRE', 'AV/ DU PLATEAU', '09977731384', '2018-02-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(792, '00792/2018/NHH', '', 'BEMBIDE EKUTA', '06/11/2016', 'FEMININ', 'HDW', 'CELIBATAIRE', 'FEU-VERT', '0851851735', '2018-02-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(793, '00793/2018/NHH', '', 'WATUKULUSU MACHOZI', '31/12/1978', 'FEMININ', 'CIGNA', 'MARIE(E)', 'KARHALE', '0971302133', '2018-02-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(794, '00794/2018/NHH', '', 'ABIGAEL LUBALA', '03/11/2006', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'AV. EPL', '0997671752', '2018-02-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(795, '00795/2018/NHH', '', 'ANNIE MWAMINI', '1960', 'FEMININ', 'SESOMO', 'MARIE(E)', 'ISP', '0997743077', '2018-02-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(796, '00796/2018/NHH', '414/21726', 'BALAGIZI MICHEL', '29/09/1964', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'NGUBA', '', '2018-02-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(797, '00797/2018/NHH', '', 'NAZAHABU AIMEE', '1995', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '08145601709', '2018-02-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(798, '00798/2018/NHH', '', 'FORTUNAT MAHESHE', '6ans', 'MASCULIN', 'SESOMO', 'CELIBATAIRE', 'AVIfizi', '', '2018-02-16', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(799, '00799/2018/NHH', '', 'GABRIELLA MAHESHE', '5ans', 'FEMININ', 'SESOMO', 'CELIBATAIRE', 'AVIfizi', '', '2018-02-16', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(800, '00800/2018/NHH', '', 'UWISEZERANO CIELLA', '23/02/1999', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0828888591', '2018-02-16', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(801, '00801/2018/NHH', '', 'JEFF MPINDA', '05/04/1972', 'MASCULIN', 'SESOMO', 'MARIE(E)', 'KADUTU', '0821601624', '2018-02-16', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(802, '00802/2018/NHH', '', 'MBAYU CITO J PETIT', '11/05/2016', 'MASCULIN', 'SOFAS', 'CELIBATAIRE', 'MUKUKWE', '0853335008', '2018-02-16', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(803, '00803/2018/NHH', '', 'MBAYU CIKURU J PAUL', '11/05/2016', 'MASCULIN', 'SOFAS', 'CELIBATAIRE', 'MUKUKWE', '0853335008', '2018-02-16', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(804, '00804/2018/NHH', '', 'ALINE NDOOLE', '10/10/1991', 'FEMININ', 'SESOMO', 'MARIE(E)', 'NGUBA', '0977262952', '2018-02-16', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(805, '00805/2018/NHH', '', 'GABRIEL KULEMBA', '11/04/2006', 'MASCULIN', 'SESOMO', 'CELIBATAIRE', 'NGUBA', '0978601419', '2018-02-17', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(806, '00806/2018/NHH', '', 'NOELLA ZAWADI', '23/12/1991', 'FEMININ', 'HDW', 'MARIE(E)', 'BAGIRA', '0977953996', '2018-02-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(807, '00807/2018/NHH', '', 'WINNIE MWINJA', '10/10/1996', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0977447342', '2018-02-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(808, '00808/2018/NHH', '', 'MAPENZI DUNIA', '1986', 'MASCULIN', 'HDW', 'MARIE(E)', 'NGUBA', '0853994639', '2018-02-17', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(809, '00809/2018/NHH', '', 'ANAELLAH KASHANGE', '06/01/2017', 'FEMININ', 'SESOMO', 'CELIBATAIRE', 'MUKUKWE', '0975161030', '2018-02-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(810, '00810/2018/NHH', '', 'MBAYU CITO J PETIT', '11/05/2016', 'MASCULIN', 'SOFAS', 'CELIBATAIRE', 'MUKUKWE', '0853335008', '2018-02-17', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(811, '00811/2018/NHH', '', 'SARAH GLORIA', '12/12/1999', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'AV/ IKANGA', '0976358119', '2018-02-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(812, '00812/2018/NHH', '', 'ROGER MASIRIKA', '20/09/1967', 'MASCULIN', 'SESOMO', 'MARIE(E)', 'KADUTU', '0994543264', '2018-02-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(813, '00813/2018/NHH', '', 'MBAYU CITO J PETIT', '11/05/2016', 'MASCULIN', 'SOFAS', 'CELIBATAIRE', 'MUKUKWE', '0853335008', '2018-02-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(814, '00814/2018/NHH', '414/22103', 'MOUSSADJUMA MOISE', '1982', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'SOMINKI', '0992404394', '2018-02-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(815, '00815/2018/NHH', '', 'MATHIEU KASONGO', '22/01/1965', 'MASCULIN', 'HDW', 'MARIE(E)', 'NYAMUGO', '053137792', '2018-02-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(816, '00816/2018/NHH', '08815851', 'JEAN-MARIE KITITWA BANGA TONDO', '26/06/2008', 'MASCULIN', 'GMC HENNER', 'CELIBATAIRE', 'NGUBA', '0995936080', '2018-02-19', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(817, '00817/2018/NHH', '', 'AGANZE BALAGIZI', '23/01/1997', 'FEMININ', 'CIGNA', 'CELIBATAIRE', 'NGUBA', '0990722001', '2018-02-19', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(818, '00818/2018/NHH', '', 'CHRISTIAN MUZALIA AMANI', '12/11/1983', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'AV/ DELA PLACE', '0994614382', '2018-02-19', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(819, '00819/2018/NHH', '', 'LEBON MALIAMUNGU UWEZO', '10/03/1979', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'BUSHUSHU', '0997274553', '2018-02-19', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(820, '00820/2018/NHH', '', 'NSHAGALI CIRIBUKA AUDREY', '26/06/2017', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'AV/ DE  LARESIDENCE', '0994304771', '2018-02-20', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(821, '00821/2018/NHH', '', 'MARIE-CLAIRE BUBAKA', '46ans', 'FEMININ', 'SESOMO', 'MARIE(E)', 'CHAI', '', '2018-02-23', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(822, '00822/2018/NHH', '031/SK/2018', 'RAHA YANKIZO PREFET', '28/09/1981', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'R DOUVIRA', '', '2018-02-23', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(823, '00823/2018/NHH', '', 'CLEMENTINE MULOKO', '46ans', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'BRASSERIE', '0844139627', '2018-02-23', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(824, '00824/2018/NHH', '', 'BEMBIDE EKUTA', '2ans', 'FEMININ', 'HDW', 'CELIBATAIRE', 'NGUBA', '0851851735', '2018-02-23', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(825, '00825/2018/NHH', '', 'MOMBILI MBOYO', '19/08/1986', 'FEMININ', 'HDW', 'MARIE(E)', 'NGUBA', '0851851735', '2018-02-23', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(826, '00826/2018/NHH', '414/20877', 'NIVA FEZA ERICA JEANNE', '20/08/2013', 'FEMININ', 'CIGNA', 'CELIBATAIRE', 'AV/ DU LAC', '', '2018-02-23', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(827, '00827/2018/NHH', '', 'MBAYU CIKURU J PAUL', '11/05/2016', 'MASCULIN', 'SOFAS', 'CELIBATAIRE', 'MUKUKWE', '0853335008', '2018-02-23', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(828, '00828/2018/NHH', '', 'NORBERT ZONGWA', '201983/11/', 'MASCULIN', 'ITM/AFRIK', 'MARIE(E)', 'NYAWERA', '0813675876', '2018-02-26', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(829, '00829/2018/NHH', '', 'NOELLA ZAWADI', '23/12/1991', 'FEMININ', 'HDW', 'MARIE(E)', 'BAGIRA', '0977953996', '2018-02-26', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(830, '00830/2018/NHH', '', 'MAPENZI DUNIA', '1986', 'MASCULIN', 'HDW', 'MARIE(E)', 'NGUBA', '0853994639', '2018-02-26', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(831, '00831/2018/NHH', '', 'BATAMBA  JULIE', '18/10/1972', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0998566251', '2018-03-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(832, '00832/2018/NHH', '017/SK/2018', 'RUHANGARA MUTALIMA', '6ans', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'BUHOLO3', '', '2018-03-01', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(833, '00833/2018/NHH', '', 'EUPHRASIE KAPUNGA', '06/09/1985', 'FEMININ', 'INTERSOS', 'MARIE(E)', 'KARHALE', '0854182531', '2018-03-01', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(834, '00834/2018/NHH', '', 'CIZUNGU WANGAKYUMO JEAN CLOUDE', '37ans', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'KARHALE', '0859400347', '2018-03-01', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(835, '00835/2018/NHH', '', 'GLORIA LUSAMBYA', '10/08/2013', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '', '2018-03-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(836, '00836/2018/NHH', '', 'BATAMBA  JULIE', '18/10/1972', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0998566251', '2018-03-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(837, '00837/2018/NHH', '', 'MUTALIMA CIBALONZA DESIRE', '19/02/1978', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'KADUTU0823690888', '', '2018-03-02', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(838, '00838/2018/NHH', '', 'JOSUE BAGUMA', '25/09/1981', 'MASCULIN', 'HDW', 'MARIE(E)', 'AV/ IRAMBO', '0853498767', '2018-03-02', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(839, '00839/2018/NHH', '', 'SABINA KILA', '08/09/1990', 'FEMININ', 'HDW', 'CELIBATAIRE', 'NGUBA', '0850209015', '2018-03-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(840, '00840/2018/NHH', '', 'BOANERGE RUGOYA', '1987', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'NYAWERA', '0979320322', '2018-03-02', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(841, '00841/2018/NHH', '', 'CHANCELLINE RUSANGWA', '07/07/1994', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'AV/ DU PLATEAU', '', '2018-03-02', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(842, '00842/2018/NHH', '', 'GABRIEL YUMA KASONGO', '14ans', 'MASCULIN', 'WS/INSIGHT', 'CELIBATAIRE', 'NGUBA', '0978160382', '2018-03-03', 'DefaultPatientMal.png', 15, 'ATTENTE'),
(843, '00843/2018/NHH', '', 'MARIE-CLAIRE MUREKATETE', '23/10/1959', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0994054470', '2018-03-03', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(844, '00844/2018/NHH', '', 'GRACE IRANGA MAFONDO', '18/09/2010', 'FEMININ', 'HENNER', 'CELIBATAIRE', 'NGUBA', '0997731384', '2018-03-03', 'DefaultPatientFem.png', 15, 'ATTENTE'),
(845, '00845/2018/NHH', 'N0000487784', 'CENTWALII NDUSHABANDI IVON', '28/12/2015', 'FEMININ', 'CIGNA', 'CELIBATAIRE', 'AV/DUPLATEAU', '0994054828', '2018-03-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(846, '00846/2018/NHH', '', 'GERMAINE NABIRALO', '20/10/1959', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'AV/ TANGANYIKA', '0853149121', '2018-03-14', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(847, '00847/2018/NHH', '', 'KAPUTA SELEMANI JACQUES', '17/05/1980', 'MASCULIN', 'ITEM AFRIK', 'CELIBATAIRE', 'NGUBA', '840366469', '2018-03-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(848, '00848/2018/NHH', '', 'MAHESHE NYANGWIRA ABDOUL', '1963', 'MASCULIN', 'HDW', 'MARIE(E)', 'KADUTU', '', '2018-03-14', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(849, '00849/2018/NHH', '', 'JOSUE BAGUMA', '25/09/1981', 'MASCULIN', 'HDW', 'MARIE(E)', 'AV/ IRAMBO', '0853498767', '2018-03-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(850, '00850/2018/NHH', '', 'MUZALIWA BERTIN', '1979', 'MASCULIN', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0859352361', '2018-03-15', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(851, '00851/2018/NHH', '', 'NFURAKAZI YVONNE', '16ans', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'NGUBA', '0997832245', '2018-03-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(852, '00852/2018/NHH', '', 'NAKINDJA', 'ADULT', 'FEMININ', 'WS/INSIGHT', 'CELIBATAIRE', '', '', '2018-03-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(853, '00853/2018/NHH', '', 'CHANCELLINE IRAGI', '31/01/1991', 'FEMININ', 'SOFAS', 'CELIBATAIRE', 'BAGIRA', '0853393040', '2018-03-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(854, '00854/2018/NHH', '', 'GAELLE MUKINDULA', '29/05/2011', 'FEMININ', 'WS/INSIGHT', 'CELIBATAIRE', '  H GENERAL', '0853490012', '2018-03-15', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(855, '00855/2018/NHH', '414/20877', 'NIVA JEFF', '27/02/1979', 'MASCULIN', 'CIGNA', 'MARIE(E)', 'NGUBA', '', '2018-03-17', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(856, '00856/2018/NHH', '', 'NABINTU KAMUSHERE', '23/10/1994', 'FEMININ', 'PRIVEE', 'MARIE(E)', 'NGUBA', '0974202970', '2018-03-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(857, '00857/2018/NHH', '', 'WASSO YUNGA', '22/05/2013', 'MASCULIN', 'INTERSOS', 'MARIE(E)', 'PESAGE', '', '2018-03-17', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(858, '00858/2018/NHH', '', 'KARL YUNGA MATALATALA', '22/06/2015', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'PESAGE', '', '2018-03-17', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(859, '00859/2018/NHH', '', 'DIVINE BATUMIKE', '2006', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'CERCLE HYPIC', '', '2018-03-17', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(860, '00860/2018/NHH', '', 'ESTHER MULUMEODERHWA', '06/07/2006', 'FEMININ', 'PRIVEE', 'CELIBATAIRE', 'SOMINKI', '0853713030', '2018-03-18', 'DefaultPatientFem.png', 2, 'ATTENTE'),
(861, '00861/2018/NHH', '', 'KING CIBATUMULA', '2015', 'MASCULIN', 'PRIVEE', 'CELIBATAIRE', 'SOMINKI', '0975683517', '2018-03-18', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(862, '00862/2018/NHH', '002/SK/20128', 'BARAKA MUZALIA URIEL', '2017', 'MASCULIN', 'INTERSOS', 'CELIBATAIRE', 'AV/ DELA PLACE', '0859348452', '2018-03-20', 'DefaultPatientMal.png', 2, 'ATTENTE'),
(863, '00863/2018/NHH', '244/N000032130', 'AMISI REHEMA', '20/05/1988', 'FEMININ', 'CIGNA', 'CELIBATAIRE', 'NGUBA', '0994934696', '2018-03-20', 'DefaultPatientFem.png', 2, 'ATTENTE');

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE IF NOT EXISTS `payements` (
  `IdPaie` int(11) NOT NULL AUTO_INCREMENT,
  `DatePaie` date DEFAULT NULL,
  `MontantPaie` double DEFAULT NULL,
  `Observation` text,
  `IdFacturation` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPaie`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `IdFacturation` (`IdFacturation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `payements`
--


-- --------------------------------------------------------

--
-- Structure de la table `prescexamens`
--

CREATE TABLE IF NOT EXISTS `prescexamens` (
  `IdPrescription` int(11) NOT NULL AUTO_INCREMENT,
  `DatePrescription` date DEFAULT NULL,
  `Idauto_Patient` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPrescription`),
  KEY `Idauto_Patient` (`Idauto_Patient`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `prescexamens`
--


-- --------------------------------------------------------

--
-- Structure de la table `prescexamenscompose`
--

CREATE TABLE IF NOT EXISTS `prescexamenscompose` (
  `IdPrescription` int(11) NOT NULL DEFAULT '0',
  `IdExamen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdPrescription`,`IdExamen`),
  KEY `IdExamen` (`IdExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prescexamenscompose`
--


-- --------------------------------------------------------

--
-- Structure de la table `prescmedicaments`
--

CREATE TABLE IF NOT EXISTS `prescmedicaments` (
  `IdPrescMed` int(11) NOT NULL AUTO_INCREMENT,
  `DatePrescMed` date NOT NULL,
  `Idauto_Patient` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IdPrescMed`),
  KEY `Idauto_Patient` (`Idauto_Patient`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `prescmedicaments`
--


-- --------------------------------------------------------

--
-- Structure de la table `prescmedicamentscompose`
--

CREATE TABLE IF NOT EXISTS `prescmedicamentscompose` (
  `IdPrescMed` int(11) NOT NULL,
  `IdMedicament` int(11) NOT NULL,
  `QuantiteDemande` double NOT NULL,
  `Consommation` text NOT NULL,
  PRIMARY KEY (`IdPrescMed`,`IdMedicament`),
  KEY `IdMedicament` (`IdMedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prescmedicamentscompose`
--


-- --------------------------------------------------------

--
-- Structure de la table `resultexamens`
--

CREATE TABLE IF NOT EXISTS `resultexamens` (
  `IdResultat` int(11) NOT NULL AUTO_INCREMENT,
  `DateResultat` date DEFAULT NULL,
  `IdPrescription` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdResultat`),
  KEY `IdPrescription` (`IdPrescription`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `resultexamens`
--


-- --------------------------------------------------------

--
-- Structure de la table `resultexamenscompose`
--

CREATE TABLE IF NOT EXISTS `resultexamenscompose` (
  `IdResultat` int(11) NOT NULL DEFAULT '0',
  `IdExamen` int(11) NOT NULL DEFAULT '0',
  `ResultatPropre` text,
  PRIMARY KEY (`IdResultat`,`IdExamen`),
  KEY `IdExamen` (`IdExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `resultexamenscompose`
--


-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `CodeService` varchar(10) NOT NULL,
  `DesignService` text,
  PRIMARY KEY (`CodeService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`CodeService`, `DesignService`) VALUES
('ADM', 'ADMINISTRATION'),
('CC', 'COMPTABILITE'),
('CH', 'CHIRURGIE'),
('CS', 'CAISSE'),
('GYNECO', 'GYNECO-OBSTETRIQUE'),
('IM', 'IMAGERIE MEDICALE'),
('LABO', 'LABORATOIRE'),
('MI', 'MEDECINE INTERNE'),
('PD', 'PEDIATRIE'),
('PH', 'PHARMACIE'),
('REC', 'RECEPTION'),
('SEC', 'SECRETARIAT'),
('UR', 'URGENCE');

-- --------------------------------------------------------

--
-- Structure de la table `signesvitaux`
--

CREATE TABLE IF NOT EXISTS `signesvitaux` (
  `IdSigne` int(11) NOT NULL AUTO_INCREMENT,
  `DatePrel` date DEFAULT NULL,
  `Temperature` varchar(10) DEFAULT NULL,
  `Poids` varchar(10) DEFAULT NULL,
  `Pouls` varchar(12) DEFAULT NULL,
  `imc` varchar(10) DEFAULT NULL,
  `Ta` varchar(10) DEFAULT NULL,
  `Fr` varchar(20) DEFAULT NULL,
  `Fc` varchar(20) DEFAULT NULL,
  `Idauto_Patient` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdSigne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `signesvitaux`
--


-- --------------------------------------------------------

--
-- Structure de la table `sortiemedmalades`
--

CREATE TABLE IF NOT EXISTS `sortiemedmalades` (
  `IdSortieMedMal` int(11) NOT NULL AUTO_INCREMENT,
  `DateSortieMedMal` date NOT NULL,
  `QteLivreeMedMal` double NOT NULL,
  `PrixUnitMedMal` double NOT NULL,
  `IdMedicament` int(11) NOT NULL,
  `ModePaie` varchar(10) NOT NULL,
  `IdPrescMed` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IdSortieMedMal`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `IdPrescMed` (`IdPrescMed`),
  KEY `IdMedicament` (`IdMedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sortiemedmalades`
--


-- --------------------------------------------------------

--
-- Structure de la table `sortiemedservices`
--

CREATE TABLE IF NOT EXISTS `sortiemedservices` (
  `IdSortieMedServ` int(11) NOT NULL AUTO_INCREMENT,
  `DateSortieMedServ` date NOT NULL,
  `QteStockMedServ` double NOT NULL,
  `QteDemandeMedServ` double NOT NULL,
  `QteLivreeMedServ` double NOT NULL,
  `PrixUnitMedServ` double NOT NULL,
  `IdMedicament` int(11) NOT NULL,
  `CodeService` varchar(10) NOT NULL,
  `Observation` text NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IdSortieMedServ`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `CodeService` (`CodeService`),
  KEY `IdMedicament` (`IdMedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sortiemedservices`
--


-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

CREATE TABLE IF NOT EXISTS `sorties` (
  `IdSortie` int(11) NOT NULL AUTO_INCREMENT,
  `DateSortie` date DEFAULT NULL,
  `EtatSortie` varchar(100) DEFAULT NULL,
  `Observation` text,
  `Idauto_Hosp` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdSortie`),
  KEY `Idauto_Hosp` (`Idauto_Hosp`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sorties`
--


-- --------------------------------------------------------

--
-- Structure de la table `toursalles`
--

CREATE TABLE IF NOT EXISTS `toursalles` (
  `IdTour` int(11) NOT NULL AUTO_INCREMENT,
  `DateTour` date DEFAULT NULL,
  `HeureTour` varchar(10) DEFAULT NULL,
  `Plainte` text NOT NULL,
  `Prescription` text,
  `Evolution` varchar(20) DEFAULT NULL,
  `Observation` text,
  `Ta` varchar(10) DEFAULT NULL,
  `Pouls` varchar(10) DEFAULT NULL,
  `Poids` varchar(10) DEFAULT NULL,
  `Fr` varchar(10) DEFAULT NULL,
  `Fc` varchar(10) DEFAULT NULL,
  `Idauto_Patient` int(11) DEFAULT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  `Accompagnant` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdTour`),
  KEY `Idauto_Patient` (`Idauto_Patient`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `toursalles`
--


-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `NumMatricule` text,
  `NomsUtil` varchar(60) DEFAULT NULL,
  `Sexe` varchar(12) DEFAULT NULL,
  `Etatcivil` varchar(15) DEFAULT NULL,
  `NumTel` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `Titre` varchar(50) DEFAULT NULL,
  `Fonction` varchar(20) DEFAULT NULL,
  `CodeService` varchar(10) DEFAULT NULL,
  `Login` text,
  `MotPasse` text,
  `Etat` varchar(15) NOT NULL,
  `Photo` text NOT NULL,
  PRIMARY KEY (`IdUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IdUtilisateur`, `NumMatricule`, `NomsUtil`, `Sexe`, `Etatcivil`, `NumTel`, `Adresse`, `Titre`, `Fonction`, `CodeService`, `Login`, `MotPasse`, `Etat`, `Photo`) VALUES
(1, '56537283', 'PASCAL', 'MASCULIN', 'MARIE(E)', '0998383737', 'IBANDA/ AV. E.P. LUMUMBA', 'DOCTEUR', 'MD', 'MI', 'ADMIN', 'ADMIN1234', 'AUTORISE', 'UserDefaultMal.jpg'),
(2, '32823787', 'VERONIQUE', 'FEMININ', 'CELIBATAIRE', '0997005133', 'ROUTE UVIRA', 'L2', 'RECEPTIONNISTE', 'SEC', 'VERONIQUE', '1245', 'AUTORISE', 'UserDefaultFem.png'),
(10, '005', 'Dr HERVE', 'MASCULIN', 'CELIBATAIRE', '0994131130', 'AV. EVARISTE BAGANDA NÂ°54B', 'DOCTEUR EN MEDECINE', 'MEDECIN', 'CH', 'kabntwali@gmail.com', 'jtmchrie', 'AUTORISE', 'UserDefaultMal.png'),
(11, '006', 'Dr MAVE', 'FEMININ', 'CELIBATAIRE', '0852366774', 'AV. SNEL III NÂ°62', 'DOCTEUR EN MEDECINE', 'MEDECIN', 'MI', 'MAVE', '1985', 'AUTORISE', 'UserDefaultFem.png'),
(12, '007', 'Dr ALICE', 'FEMININ', 'MARIE(E)', '0974470411', 'VAMARO', 'DOCTEUR EN MEDECINE', 'MEDECIN', 'GYNECO', 'ALICE', '12345', 'AUTORISE', 'UserDefaultFem.png'),
(13, '008', 'Dr OLIVE KALUSE', 'MASCULIN', 'CELIBATAIRE', '0850193113', 'MUHUNGU / LA VOIX', 'DOCTEUR EN MEDECINE', 'MEDECIN', 'CH', 'OLIVEKALU', '12345', 'AUTORISE', 'UserDefaultMal.png'),
(14, '009', 'GHISLAINE CITO', 'FEMININ', 'CELIBATAIRE', '', 'BRASSERIE', 'INFIRMIERE', 'PHARMACIEN', 'PH', 'CITO', '12345', 'AUTORISE', 'UserDefaultFem.png'),
(15, '0010', 'Mme JOLIE', 'FEMININ', 'CELIBATAIRE', '+250785319934', 'Av KAJANGU NGUBA', 'INFIRMIERE', 'RECEPTIONNISTE', 'REC', 'JOLIE', '1356', 'AUTORISE', 'UserDefaultFem.png'),
(16, '0011', 'JOYCE MAGADJU', 'FEMININ', 'CELIBATAIRE', '0995889171', 'AV TANGANYIKA NÂ°09', 'LICENCE', 'RECEPTIONNISTE', 'SEC', 'joycemagadju@gmail.com', '12345', 'AUTORISE', 'UserDefaultFem.png'),
(17, '0012', 'ASPIRINE', 'MASCULIN', 'MARIE(E)', '0894442168', 'CERCLE HIPPIQUE', 'LABORANTIN', 'LABORANTIN', 'LABO', 'ASPIRINE', '12345', 'AUTORISE', 'UserDefaultMal.png'),
(18, '0013', 'KINJA KETSIA1', 'FEMININ', 'CELIBATAIRE', '0991921799', 'AV. DU PLATEAU', 'LICENCE', 'COMPTABLE', 'CC', 'KETSIA', '12345', 'AUTORISE', 'UserDefaultFem.png'),
(19, '456', 'LYSE', 'FEMININ', 'CELIBATAIRE', '', '', '0', 'RECEPTIONNISTE', 'REC', 'LYSE', '2018', 'AUTORISE', 'UserDefaultFem.png');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_ibfk_1` FOREIGN KEY (`Idauto_Patient`) REFERENCES `patients` (`Idauto_Patient`),
  ADD CONSTRAINT `consultations_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);

--
-- Contraintes pour la table `entreestocks`
--
ALTER TABLE `entreestocks`
  ADD CONSTRAINT `entreestocks_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `entreestocks_ibfk_2` FOREIGN KEY (`IdMedicament`) REFERENCES `medicaments` (`IdMedicament`);

--
-- Contraintes pour la table `examens`
--
ALTER TABLE `examens`
  ADD CONSTRAINT `examens_ibfk_1` FOREIGN KEY (`IdCategorie`) REFERENCES `categoriesexamens` (`IdCategorie`);

--
-- Contraintes pour la table `facturations`
--
ALTER TABLE `facturations`
  ADD CONSTRAINT `facturations_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `facturations_ibfk_2` FOREIGN KEY (`Idauto_Patient`) REFERENCES `patients` (`Idauto_Patient`);

--
-- Contraintes pour la table `hospitalisations`
--
ALTER TABLE `hospitalisations`
  ADD CONSTRAINT `hospitalisations_ibfk_1` FOREIGN KEY (`Idauto_Patient`) REFERENCES `patients` (`Idauto_Patient`),
  ADD CONSTRAINT `hospitalisations_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `hospitalisations_ibfk_3` FOREIGN KEY (`CodeService`) REFERENCES `services` (`CodeService`);

--
-- Contraintes pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD CONSTRAINT `medicaments_ibfk_1` FOREIGN KEY (`IdCategorieMed`) REFERENCES `categoriesmed` (`IdCategorieMed`);

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `payements_ibfk_2` FOREIGN KEY (`IdFacturation`) REFERENCES `facturations` (`IdFacturation`);

--
-- Contraintes pour la table `prescexamens`
--
ALTER TABLE `prescexamens`
  ADD CONSTRAINT `prescexamens_ibfk_1` FOREIGN KEY (`Idauto_Patient`) REFERENCES `patients` (`Idauto_Patient`),
  ADD CONSTRAINT `prescexamens_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);

--
-- Contraintes pour la table `prescexamenscompose`
--
ALTER TABLE `prescexamenscompose`
  ADD CONSTRAINT `prescexamenscompose_ibfk_1` FOREIGN KEY (`IdPrescription`) REFERENCES `prescexamens` (`IdPrescription`),
  ADD CONSTRAINT `prescexamenscompose_ibfk_2` FOREIGN KEY (`IdExamen`) REFERENCES `examens` (`IdExamen`);

--
-- Contraintes pour la table `prescmedicaments`
--
ALTER TABLE `prescmedicaments`
  ADD CONSTRAINT `prescmedicaments_ibfk_1` FOREIGN KEY (`Idauto_Patient`) REFERENCES `patients` (`Idauto_Patient`),
  ADD CONSTRAINT `prescmedicaments_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);

--
-- Contraintes pour la table `prescmedicamentscompose`
--
ALTER TABLE `prescmedicamentscompose`
  ADD CONSTRAINT `prescmedicamentscompose_ibfk_1` FOREIGN KEY (`IdPrescMed`) REFERENCES `prescmedicaments` (`IdPrescMed`),
  ADD CONSTRAINT `prescmedicamentscompose_ibfk_2` FOREIGN KEY (`IdMedicament`) REFERENCES `medicaments` (`IdMedicament`);

--
-- Contraintes pour la table `resultexamens`
--
ALTER TABLE `resultexamens`
  ADD CONSTRAINT `resultexamens_ibfk_1` FOREIGN KEY (`IdPrescription`) REFERENCES `prescexamens` (`IdPrescription`),
  ADD CONSTRAINT `resultexamens_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);

--
-- Contraintes pour la table `resultexamenscompose`
--
ALTER TABLE `resultexamenscompose`
  ADD CONSTRAINT `resultexamenscompose_ibfk_1` FOREIGN KEY (`IdResultat`) REFERENCES `resultexamens` (`IdResultat`),
  ADD CONSTRAINT `resultexamenscompose_ibfk_2` FOREIGN KEY (`IdExamen`) REFERENCES `examens` (`IdExamen`);

--
-- Contraintes pour la table `sortiemedmalades`
--
ALTER TABLE `sortiemedmalades`
  ADD CONSTRAINT `sortiemedmalades_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `sortiemedmalades_ibfk_2` FOREIGN KEY (`IdPrescMed`) REFERENCES `prescmedicaments` (`IdPrescMed`),
  ADD CONSTRAINT `sortiemedmalades_ibfk_3` FOREIGN KEY (`IdMedicament`) REFERENCES `medicaments` (`IdMedicament`);

--
-- Contraintes pour la table `sortiemedservices`
--
ALTER TABLE `sortiemedservices`
  ADD CONSTRAINT `sortiemedservices_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`),
  ADD CONSTRAINT `sortiemedservices_ibfk_2` FOREIGN KEY (`CodeService`) REFERENCES `services` (`CodeService`),
  ADD CONSTRAINT `sortiemedservices_ibfk_3` FOREIGN KEY (`IdMedicament`) REFERENCES `medicaments` (`IdMedicament`);

--
-- Contraintes pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD CONSTRAINT `sorties_ibfk_1` FOREIGN KEY (`Idauto_Hosp`) REFERENCES `hospitalisations` (`Idauto_Hosp`),
  ADD CONSTRAINT `sorties_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);

--
-- Contraintes pour la table `toursalles`
--
ALTER TABLE `toursalles`
  ADD CONSTRAINT `toursalles_ibfk_1` FOREIGN KEY (`Idauto_Patient`) REFERENCES `patients` (`Idauto_Patient`),
  ADD CONSTRAINT `toursalles_ibfk_2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateurs` (`IdUtilisateur`);
