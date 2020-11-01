-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 jan. 2020 à 19:09
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
-- Base de données :  `ji_miage`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Honzka', 'jimiage');

-- --------------------------------------------------------

--
-- Structure de la table `centre_interet`
--

DROP TABLE IF EXISTS `centre_interet`;
CREATE TABLE IF NOT EXISTS `centre_interet` (
  `id_centre_interet` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `ci1` varchar(20) NOT NULL,
  `ci2` varchar(20) NOT NULL,
  `ci3` varchar(20) NOT NULL,
  `ci4` varchar(20) NOT NULL,
  `ci5` varchar(20) NOT NULL,
  PRIMARY KEY (`id_centre_interet`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `centre_interet`
--

INSERT INTO `centre_interet` (`id_centre_interet`, `id_etudiant`, `ci1`, `ci2`, `ci3`, `ci4`, `ci5`) VALUES
(1, 24, 'Programmation WEB', 'Programmation Mobile', 'Sport', 'Analyse', 'Cuisine'),
(2, 25, 'Programmation Mobile', 'Sport', 'Mode', 'Analyse', 'Chant'),
(3, 26, 'Programmation WEB', 'Programmation Mobile', 'Sport', 'Cuisine', 'Chant'),
(4, 20154873, 'on', 'on', 'on', 'on', 'on'),
(5, 31, 'on', 'on', 'on', 'on', 'on'),
(6, 20154873, '1', '2', '3', '8', '7'),
(7, 20154873, '1', '2', '3', '8', '7');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lien_photo` text NOT NULL,
  `date_register` date NOT NULL,
  `montant_a_payer` int(11) DEFAULT NULL,
  `solde` int(11) DEFAULT NULL,
  `reste_a_payer` int(11) DEFAULT NULL,
  `ci1` varchar(3) DEFAULT NULL,
  `ci2` varchar(3) DEFAULT NULL,
  `ci3` varchar(3) DEFAULT NULL,
  `ci4` varchar(3) DEFAULT NULL,
  `ci5` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `sexe`, `niveau`, `tel`, `email`, `lien_photo`, `date_register`, `montant_a_payer`, `solde`, `reste_a_payer`, `ci1`, `ci2`, `ci3`, `ci4`, `ci5`) VALUES
(43, 'Konan', 'dfj', 'homme', '', '20154873', 'wisdomandy.5@gmail.com', '../img/profil/bureau.jpg', '2020-01-07', NULL, 0, 0, '', '', '', '', ''),
(44, 'Konan', 'dfj', 'homme', '', '20154873', 'wisdomandy.5@gmail.com', '../img/profil/bureau.jpg', '2020-01-07', NULL, 0, 0, '', '', '', '', ''),
(45, 'Konan', 'Serge', 'homme', 'MASTER 1', '01 02 03 04', 'sergelandry.5.slk@gmail.com', '../img/profil/finance.png', '2020-01-07', 15000, 0, 15000, '', '', '', '', ''),
(46, 'sd', 'sd', 'femme', 'LICENCE 1', 'sd', 'wisdomandy.5@gmail.com', '../img/profil/Circle-icons-document.svg.png', '2020-01-07', 15000, 0, 15000, '', '', '', '', ''),
(47, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/Array', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(48, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/Array', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(49, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/Array', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(50, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(51, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(52, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(53, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(54, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(55, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(56, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(57, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(58, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(59, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(60, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(61, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(62, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(63, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(64, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(65, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(66, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(67, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(68, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(69, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(70, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(71, 'Alex', 'Dubois', 'homme', 'LICENCE 3', '01 02 03 04', 'wisejumi@jumi.com', '../img/profil/icone-ordinateur.png', '2020-01-08', 20000, 0, 20000, '1', '2', '3', '4', '8'),
(72, 'rzv', 'vdvdv', 'homme', 'LICENCE 2', '01 02 04 05', 'l@gmail.com', '../img/profil/facebook_icon-icons.com_53612.png', '2020-01-08', 15000, 0, 15000, '1', '2', '3', '4', '5'),
(73, 'Claude', 'vdvdv', 'homme', 'LICENCE 2', '01 02 04 05', 'l@gmail.com', '../img/profil/facebook_icon-icons.com_53612.png', '2020-01-08', 15000, 0, 15000, '1', '2', '3', '4', '5'),
(74, 'Claude', 'vdvdv', 'homme', 'LICENCE 2', '01 02 04 05', 'l@gmail.com', '../img/profil/facebook_icon-icons.com_53612.png', '2020-01-08', 15000, 0, 15000, '1', '2', '3', '4', '5'),
(75, 'Claude', 'vdvdv', 'homme', 'LICENCE 2', '01 02 04 05', 'l@gmail.com', '../img/profil/facebook_icon-icons.com_53612.png', '2020-01-08', 15000, 0, 15000, '1', '2', '3', '4', '5'),
(76, '125', '12', 'homme', 'MASTER 1', '01 01 01 01', 'm@gmail.com', '../img/profil/ji_c03e80a71d87291a66f14eb383ba626c.png', '2020-01-09', 15000, 0, 15000, '1', '6', '8', '7', '9');

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

DROP TABLE IF EXISTS `payement`;
CREATE TABLE IF NOT EXISTS `payement` (
  `id_payement` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `date_pay` date NOT NULL,
  `montant` double NOT NULL,
  `visa` varchar(50) NOT NULL,
  PRIMARY KEY (`id_payement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`id_payement`, `id_etudiant`, `date_pay`, `montant`, `visa`) VALUES
(1, 0, '2019-12-14', 3000, ''),
(2, 0, '2019-12-14', 7000, ''),
(3, 0, '2019-12-14', 1500, ''),
(4, 0, '2019-12-14', 1500, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
