-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 mai 2020 à 13:44
-- Version du serveur :  5.5.62
-- Version de PHP : 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `drivncooktrucks_test_last_version`
--
CREATE DATABASE IF NOT EXISTS `drivncooktrucks_test_last_version` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `drivncooktrucks_test_last_version`;

-- --------------------------------------------------------

--
-- Structure de la table `ADVANTAGE`
--

DROP TABLE IF EXISTS `ADVANTAGE`;
CREATE TABLE IF NOT EXISTS `ADVANTAGE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=531 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ADVANTAGE`
--

INSERT INTO `ADVANTAGE` (`id`, `type`, `description`, `begin_date`, `end_date`, `promo_code`) VALUES
(512, '1', 'description bla bla', '2020-04-19', '2020-04-19', '544654'),
(514, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(515, '1', '123test', '2020-04-19', '2020-04-19', '196848+'),
(516, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(517, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(518, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(519, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(520, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(521, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(522, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(523, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(524, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(525, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(526, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(527, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(528, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(529, '1', 'description here man !', '2020-04-19', '2020-04-19', '544654'),
(530, '1', 'description here man !', '2020-05-02', '2020-05-02', '544654');

-- --------------------------------------------------------

--
-- Structure de la table `BENEFICIARY`
--

DROP TABLE IF EXISTS `BENEFICIARY`;
CREATE TABLE IF NOT EXISTS `BENEFICIARY` (
  `id_advantage` int(11) NOT NULL,
  `id_loyalty_card` int(11) NOT NULL,
  PRIMARY KEY (`id_advantage`,`id_loyalty_card`),
  KEY `id_loyalty_card` (`id_loyalty_card`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CUSTOMER`
--

DROP TABLE IF EXISTS `CUSTOMER`;
CREATE TABLE IF NOT EXISTS `CUSTOMER` (
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday_date` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `DRINK`
--

DROP TABLE IF EXISTS `DRINK`;
CREATE TABLE IF NOT EXISTS `DRINK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `recipe` text,
  `expiration_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `tva` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `EMPLOYEE`
--

DROP TABLE IF EXISTS `EMPLOYEE`;
CREATE TABLE IF NOT EXISTS `EMPLOYEE` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_franchisee` int(11) DEFAULT NULL,
  `id_headquarter` int(11) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `hiring_date` date NOT NULL,
  `description` text,
  `admin` tinyint(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` mediumint(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `id_franchisee` (`id_franchisee`),
  KEY `id_headquarter` (`id_headquarter`),
  KEY `fk_gender_employee` (`gender`),
  KEY `fk_role_employee` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`id`, `id_franchisee`, `id_headquarter`, `email`, `password`, `first_name`, `last_name`, `birthday_date`, `address`, `gender`, `picture`, `hiring_date`, `description`, `admin`, `phone`, `role`) VALUES
(1, NULL, 1, 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin', 'admin', '2020-04-26', '25 Avenue des Champs', 2, '', '2020-04-26', '', 1, '0612345678', 1),
(2, 10, NULL, 'franchisee@email.com', '0d18195e2979d40ba15afe162b5ff7b114c4a98b160c4e98c6f15aa7b1d07daa', 'dodoFranchisee', 'cocoFranchisee', '1977-06-09', '30 avenue de la République', 1, NULL, '1994-07-24', 'ma description', 0, '0325147895', 2),
(3, 22, NULL, 'gravida@ac.org', 'EZS27VYZ3XD', 'Stacey', 'Campbell', '2062-12-22', 'P.O. Box 260, 8055 In Street', 2, NULL, '2012-09-25', NULL, 2, NULL, 1),
(4, 86, NULL, 'vitae.aliquam@volutpatornarefacilisis.ca', 'BJX58VEN4DO', 'Kamal', 'Whitley', '2064-06-10', '961-6028 Enim. Av.', 2, NULL, '1993-03-02', NULL, 1, NULL, 1),
(5, 67, NULL, 'et@ante.ca', 'VCR39CUE3NG', 'Jeremy', 'Hull', '1982-12-29', '478-5620 Egestas, Av.', 1, NULL, '2002-02-04', NULL, 1, NULL, 1),
(6, 32, NULL, 'rutrum.magna.Cras@eget.edu', 'GFI59LRL0OV', 'Alyssa', 'Wiggins', '2068-02-06', '3184 Lorem, St.', 1, NULL, '2001-07-31', NULL, 1, NULL, 1),
(7, 99, NULL, 'Donec@iderat.org', 'QIL09BMS0KB', 'Howard', 'Larson', '2060-09-17', '6779 Augue St.', 2, NULL, '2015-08-05', NULL, 1, NULL, 1),
(8, 81, NULL, 'mauris@neque.org', 'HQK15NZJ8PL', 'Benjamin', 'Frank', '1984-11-15', '7933 Nisi Street', 1, NULL, '1991-02-20', NULL, 1, NULL, 1),
(9, 22, NULL, 'enim@lectusjustoeu.co.uk', 'NBJ15MQQ5PV', 'Graham', 'Mclean', '1972-12-18', 'Ap #621-3544 Nec St.', 1, NULL, '1984-07-13', NULL, 2, NULL, 1),
(10, 41, NULL, 'ridiculus@elitelitfermentum.co.uk', 'GLS82UVJ7MN', 'Jescie', 'Hull', '1988-01-20', '553-2053 Risus Rd.', 2, NULL, '2012-11-23', NULL, 1, NULL, 1),
(11, 21, NULL, 'vel.quam.dignissim@ullamcorpereueuismod.edu', 'EBK02VBD1YB', 'Thane', 'Landry', '1976-02-18', '304 Egestas. Av.', 2, NULL, '2002-02-03', NULL, 2, NULL, 1),
(12, 77, NULL, 'enim@pretiumnequeMorbi.com', 'ADG55KKT9DG', 'Inez', 'Mercado', '1972-07-22', 'P.O. Box 438, 7354 Imperdiet Avenue', 1, NULL, '2003-11-02', NULL, 1, NULL, 1),
(13, 40, NULL, 'Ut.tincidunt@quisturpis.edu', 'SBM10RPH1TY', 'Stephanie', 'Matthews', '1986-02-14', '3349 Tellus. Street', 2, NULL, '1994-09-29', NULL, 1, NULL, 1),
(14, 20, NULL, 'primis.in@habitantmorbitristique.co.uk', 'LMN87AVJ4BC', 'Griffith', 'Fletcher', '2061-02-27', 'P.O. Box 141, 8270 Suspendisse Rd.', 2, NULL, '1995-07-24', NULL, 1, NULL, 1),
(15, 3, NULL, 'porttitor@blanditatnisi.org', 'IKB71KWC3PI', 'Velma', 'Allison', '2068-09-15', '7229 Vitae Av.', 1, NULL, '1998-12-11', NULL, 2, NULL, 1),
(16, 37, NULL, 'ultrices.Vivamus@nonarcu.co.uk', 'RWA20ELH2ND', 'Brielle', 'Sargent', '1975-09-06', 'P.O. Box 975, 5372 Suspendisse St.', 1, NULL, '1997-01-02', NULL, 2, NULL, 1),
(17, 67, NULL, 'pede.Nunc.sed@dui.com', 'DYK52WKK6CN', 'Blaine', 'Dixon', '1988-01-11', '147-8083 Donec Rd.', 1, NULL, '1999-06-02', NULL, 1, NULL, 1),
(18, 6, NULL, 'sed.consequat.auctor@orciluctuset.net', 'LZC38OEI0AU', 'Winifred', 'Mullins', '1970-07-10', 'Ap #338-5365 Vel, Rd.', 1, NULL, '1981-11-21', NULL, 2, NULL, 1),
(19, 10, NULL, 'Nulla.interdum.Curabitur@Quisque.org', 'QUX04KPI4XL', 'Dean', 'Riley', '1978-08-16', '9817 Pretium Rd.', 2, NULL, '1997-04-26', NULL, 2, NULL, 1),
(20, 81, NULL, 'vestibulum.nec.euismod@convallisligula.edu', 'XQA06WWI7SO', 'Shad', 'Hewitt', '1988-03-03', 'Ap #963-8519 Felis, Ave', 2, NULL, '2019-08-06', NULL, 1, NULL, 1),
(21, 15, NULL, 'posuere.cubilia.Curae@elitEtiamlaoreet.org', 'NLU53AWS4QI', 'Autumn', 'Summers', '1980-03-04', 'Ap #796-7929 Tortor, St.', 1, NULL, '2017-10-01', NULL, 1, NULL, 1),
(22, 24, NULL, 'facilisis.non@dolorFuscefeugiat.ca', 'BJQ01HIE1WW', 'Tashya', 'Kennedy', '1974-05-23', '939-757 Ac, Rd.', 1, NULL, '2003-02-24', NULL, 1, NULL, 2),
(23, 35, NULL, 'lobortis.tellus.justo@Proinvel.edu', 'ZZN97AZG1JJ', 'Cade', 'Avila', '1982-06-09', '7326 Neque. Avenue', 1, NULL, '2018-07-21', NULL, 2, NULL, 1),
(24, 32, NULL, 'a.arcu@diamluctuslobortis.co.uk', 'QLC77PBJ5JU', 'Eric', 'Orr', '2069-02-05', '803-7722 Eu, St.', 1, NULL, '1993-11-08', NULL, 2, NULL, 1),
(25, 98, NULL, 'Nullam.scelerisque.neque@Nullamscelerisqueneque.ca', 'IBJ26DSV1BH', 'Justine', 'Rowland', '1986-03-09', 'P.O. Box 795, 1943 Felis St.', 2, NULL, '2002-01-27', NULL, 1, NULL, 1),
(26, 87, NULL, 'Proin@velitjustonec.co.uk', 'RNE44MMR1YA', 'Clarke', 'Owen', '2063-05-01', '589-4359 Rutrum. Av.', 1, NULL, '2013-10-06', NULL, 2, NULL, 1),
(27, 14, NULL, 'vitae.erat@maurisaliquameu.net', 'KPV96YWI0JL', 'Quinn', 'Dotson', '1990-04-19', '149-3861 Vulputate Street', 1, NULL, '2017-05-29', NULL, 1, NULL, 1),
(28, 71, NULL, 'vitae.aliquam.eros@posuerevulputate.com', 'NAC74FEA5MS', 'Uriah', 'Vinson', '1988-03-06', 'P.O. Box 608, 633 Sollicitudin Ave', 1, NULL, '1993-04-22', NULL, 1, NULL, 1),
(29, 62, NULL, 'et@etcommodoat.ca', 'UWE69QKW4HO', 'Blake', 'Williamson', '2059-07-23', 'Ap #835-6467 Ullamcorper St.', 1, NULL, '2012-03-15', NULL, 2, NULL, 1),
(30, 96, NULL, 'cursus@orciDonec.edu', 'URU80IWN1EI', 'Damian', 'Humphrey', '1982-06-21', 'Ap #743-9694 A, Rd.', 1, NULL, '2000-06-27', NULL, 1, NULL, 1),
(31, 55, NULL, 'lobortis.augue@temporbibendumDonec.org', 'DET99IQT1JC', 'Jamalia', 'Hicks', '2059-09-03', 'Ap #791-3587 Non Ave', 2, NULL, '2002-11-02', NULL, 2, NULL, 1),
(32, 79, NULL, 'ornare@nibhPhasellusnulla.net', 'XOC56EQR7NX', 'Myles', 'Lee', '1979-04-27', '7449 Velit St.', 2, NULL, '1998-05-03', NULL, 1, NULL, 1),
(33, 54, NULL, 'Curabitur.ut@Nullamnisl.edu', 'OSZ02MET6DQ', 'Martin', 'Bates', '2063-10-08', 'Ap #330-7878 Proin Street', 2, NULL, '2000-07-23', NULL, 1, NULL, 1),
(34, 79, NULL, 'libero@ametconsectetueradipiscing.ca', 'SRA49HDQ6HO', 'Camille', 'Lamb', '1976-11-02', 'P.O. Box 626, 6501 Pellentesque Rd.', 1, NULL, '2009-07-30', NULL, 2, NULL, 1),
(35, 43, NULL, 'Curabitur.egestas.nunc@idblanditat.co.uk', 'PVS68VSC2RG', 'Jayme', 'Coleman', '1985-02-22', '8781 Consectetuer Street', 1, NULL, '2005-07-20', NULL, 2, NULL, 1),
(36, 61, NULL, 'enim@tellusjustosit.co.uk', 'NMB15UPW5IT', 'Kameko', 'Mcknight', '2068-11-03', 'Ap #860-8781 Mauris, St.', 2, NULL, '2006-01-24', NULL, 1, NULL, 1),
(37, 72, NULL, 'tincidunt.orci@Etiamlaoreetlibero.net', 'ZEV93EPU9QB', 'Roth', 'Benton', '2067-06-10', 'P.O. Box 574, 4335 Aliquet St.', 2, NULL, '2003-11-11', NULL, 1, NULL, 1),
(38, 39, NULL, 'in.tempus.eu@primisinfaucibus.edu', 'VRZ00CEQ6DY', 'Ulla', 'Leonard', '2058-04-16', '8937 Nullam Street', 2, NULL, '2012-04-12', NULL, 1, NULL, 1),
(39, 42, NULL, 'Mauris.non@vulputate.org', 'DAR51FDJ7MX', 'Meghan', 'Beasley', '2069-12-10', 'Ap #156-1134 Cum St.', 2, NULL, '2018-12-25', NULL, 1, NULL, 1),
(40, 25, NULL, 'risus.quis@odioapurus.org', 'PDY94MKW7KB', 'Lyle', 'Carpenter', '1973-05-25', 'Ap #226-8005 Semper St.', 1, NULL, '2009-01-20', NULL, 2, NULL, 1),
(41, 3, NULL, 'sed@duiquis.org', 'FUB78MQC6LX', 'Alana', 'Franks', '1990-01-20', '4035 Nec, Rd.', 2, NULL, '2019-01-04', NULL, 2, NULL, 1),
(42, 63, NULL, 'Donec@Namnulla.co.uk', 'HAO46FXA4DM', 'Tad', 'Christian', '1980-09-21', 'P.O. Box 273, 9774 Pede Ave', 2, NULL, '2000-12-16', NULL, 2, NULL, 1),
(43, 61, NULL, 'Praesent.eu.nulla@cubiliaCuraeDonec.com', 'WIS62VYN3IN', 'Mollie', 'Taylor', '2069-10-20', 'Ap #176-3029 Praesent Avenue', 1, NULL, '2005-06-30', NULL, 1, NULL, 1),
(44, 39, NULL, 'nisi.dictum@cursus.edu', 'UAB47PEV2YN', 'Summer', 'Baker', '1984-04-08', 'Ap #798-4318 Tellus. Rd.', 1, NULL, '2014-09-16', NULL, 1, NULL, 1),
(45, 53, NULL, 'quis@etlibero.co.uk', 'OAU82UPD8JF', 'Nicholas', 'Contreras', '1988-10-07', 'Ap #175-6182 Dolor Rd.', 2, NULL, '2020-02-07', NULL, 1, NULL, 1),
(46, 93, NULL, 'euismod.ac@nuncestmollis.org', 'FKX04AQC2KW', 'Austin', 'Pollard', '2066-03-24', '3818 Adipiscing Ave', 2, NULL, '1995-03-23', NULL, 2, NULL, 1),
(47, 3, NULL, 'lorem.tristique@Aliquam.ca', 'GST33PZN6YC', 'Minerva', 'Bates', '2069-03-11', '758-8082 Nec Avenue', 2, NULL, '2000-08-13', NULL, 1, NULL, 1),
(48, 86, NULL, 'lectus.Nullam@eliteratvitae.net', 'RZB49NOP7KJ', 'Ross', 'Clark', '2065-09-24', 'Ap #921-3748 Eget Rd.', 2, NULL, '2006-05-31', NULL, 1, NULL, 1),
(49, 83, NULL, 'rhoncus.Nullam@montes.com', 'YQQ23QEQ6SU', 'Jesse', 'Keller', '2065-10-26', '6781 Ullamcorper Road', 1, NULL, '1989-06-02', NULL, 2, NULL, 1),
(50, 45, NULL, 'elementum@Sedetlibero.com', 'VZA69SWH6WN', 'Shaine', 'Rivers', '1986-07-07', '1665 Consequat St.', 1, NULL, '1989-02-15', NULL, 1, NULL, 1),
(51, 92, NULL, 'et.risus.Quisque@eteuismodet.edu', 'KEZ23EOC9NN', 'Lenore', 'Hayes', '2068-02-14', '296-3850 Est St.', 2, NULL, '2003-07-13', NULL, 2, NULL, 1),
(52, 48, NULL, 'Duis@lorem.com', 'VCP95WVB5GD', 'Quinn', 'Collier', '1973-05-21', '147-3232 Sem Street', 1, NULL, '1993-07-13', NULL, 2, NULL, 1),
(53, 24, NULL, 'sem.magna.nec@diamdictumsapien.edu', 'UXX84PKW3SR', 'Catherine', 'Guthrie', '1970-10-06', '1256 Tincidunt Rd.', 1, NULL, '1996-09-18', NULL, 1, NULL, 1),
(54, 58, NULL, 'risus.quis.diam@risusIn.org', 'HBZ25BYO6QA', 'Yasir', 'Hughes', '1981-06-10', 'Ap #210-5846 Ut Street', 2, NULL, '2000-02-06', NULL, 2, NULL, 1),
(55, 10, NULL, 'enim.gravida.sit@elit.edu', 'XFN62WVC0AP', 'Melissa', 'Richardson', '1976-07-11', 'P.O. Box 401, 2272 Risus St.', 1, NULL, '1987-11-18', NULL, 2, NULL, 1),
(56, 52, NULL, 'enim@consectetuercursuset.org', 'QON65SVV1ZG', 'MacKensie', 'Valdez', '2065-11-21', 'P.O. Box 822, 3816 Aliquam Rd.', 1, NULL, '2019-08-24', NULL, 1, NULL, 1),
(57, 79, NULL, 'felis.Donec.tempor@Utsemperpretium.com', 'JDE79QQR8RD', 'Roary', 'Mayo', '2068-02-07', '486-7507 Et, Road', 1, NULL, '1994-11-20', NULL, 2, NULL, 1),
(58, 57, NULL, 'tristique@scelerisqueneque.net', 'EYU99TPH7GD', 'Steven', 'Howe', '1970-11-22', '7372 Et, Avenue', 1, NULL, '1992-03-29', NULL, 2, NULL, 1),
(59, 12, NULL, 'sed.dui@ornaresagittis.co.uk', 'SLC42NTW4HQ', 'Kasimir', 'Keith', '2067-05-27', '2546 Sem Rd.', 1, NULL, '2013-12-17', NULL, 2, NULL, 1),
(60, 49, NULL, 'ac@lectusNullam.net', 'SID08OJE5MR', 'Lacota', 'Mcleod', '1983-03-16', 'Ap #892-4454 Magna St.', 2, NULL, '1991-07-03', NULL, 1, NULL, 1),
(61, 54, NULL, 'Pellentesque@ipsum.co.uk', 'MWB86AIB9GB', 'Faith', 'Landry', '1972-03-09', 'Ap #990-5276 Ac, Road', 1, NULL, '1996-04-26', NULL, 1, NULL, 1),
(62, 21, NULL, 'nec.enim.Nunc@libero.net', 'BUA14TJP3EU', 'Caldwell', 'Juarez', '1987-06-18', 'Ap #143-3281 Sodales Street', 1, NULL, '1993-03-26', NULL, 2, NULL, 1),
(63, 33, NULL, 'eget.ipsum.Donec@anteNunc.ca', 'AIJ58ZFP9QN', 'Lana', 'Oconnor', '2067-09-08', '766-4241 Sodales Street', 2, NULL, '1987-04-02', NULL, 2, NULL, 1),
(64, 65, NULL, 'eget.laoreet.posuere@Mauris.org', 'GBU58IBP7UV', 'Demetrius', 'Wilcox', '2067-12-09', '825-7321 Cursus Rd.', 1, NULL, '1987-07-17', NULL, 1, NULL, 1),
(65, 65, NULL, 'nulla.ante@magna.edu', 'SJU06DUH8SB', 'Dexter', 'Conner', '1984-06-03', 'P.O. Box 973, 1672 Parturient Rd.', 1, NULL, '1998-07-26', NULL, 2, NULL, 1),
(66, 42, NULL, 'odio.a@Pellentesquetincidunttempus.net', 'NTP37XGB0UP', 'Jamalia', 'Knox', '1976-01-21', 'Ap #483-8096 Tincidunt Rd.', 1, NULL, '2015-12-11', NULL, 2, NULL, 1),
(67, 40, NULL, 'ornare.facilisis@turpisegestasFusce.org', 'ZCE41YCT1ZF', 'Jamalia', 'Sharp', '2059-10-03', 'P.O. Box 332, 1140 Nulla. Av.', 1, NULL, '1992-06-02', NULL, 2, NULL, 1),
(68, 84, NULL, 'molestie@dolor.org', 'MUY21NUL6MA', 'Lacota', 'Best', '2062-10-24', '9791 Natoque Ave', 2, NULL, '2003-10-01', NULL, 2, NULL, 1),
(69, 28, NULL, 'arcu.Vestibulum@ametorci.co.uk', 'PFZ56WGS2BT', 'Otto', 'Daniel', '1984-03-09', 'P.O. Box 564, 1356 Nascetur Rd.', 1, NULL, '2003-09-18', NULL, 1, NULL, 1),
(70, 58, NULL, 'interdum@nequevenenatis.com', 'YZQ92ERW6WR', 'Kieran', 'Simon', '1974-07-22', '5665 Cursus Street', 1, NULL, '1995-12-23', NULL, 1, NULL, 1),
(71, 3, NULL, 'Nulla.tincidunt.neque@Cras.com', 'EBK43JKI0OC', 'Rose', 'Pate', '1972-03-11', '422-8958 Aliquet Rd.', 2, NULL, '1995-02-26', NULL, 1, NULL, 1),
(72, 75, NULL, 'turpis.In@augue.edu', 'BBR14TOG3QM', 'Uriel', 'Ramsey', '1972-02-20', '320-685 Euismod Rd.', 2, NULL, '1991-03-11', NULL, 2, NULL, 1),
(73, 24, NULL, 'neque.In@hymenaeosMaurisut.org', 'WFC59UWX8ZI', 'Ori', 'Norman', '1980-12-17', 'P.O. Box 441, 1257 Porttitor Ave', 1, NULL, '2001-11-09', NULL, 1, NULL, 1),
(74, 24, NULL, 'Donec.tempor.est@eratsemperrutrum.edu', 'SQW18PFJ3JL', 'Tate', 'Palmer', '1974-06-25', '816-6469 Risus Street', 2, NULL, '1989-05-07', NULL, 1, NULL, 1),
(75, 94, NULL, 'ridiculus.mus@sodalespurusin.com', 'BKF00CES8QS', 'Fulton', 'Monroe', '2061-08-03', '725-1836 Tristique Road', 1, NULL, '1983-12-03', NULL, 2, NULL, 1),
(76, 41, NULL, 'Donec.est@volutpatnunc.com', 'KBS63JDX9LZ', 'Zena', 'White', '1972-09-18', 'Ap #195-6477 Nullam Rd.', 1, NULL, '1988-04-11', NULL, 2, NULL, 1),
(77, 28, NULL, 'neque@cursusaenim.ca', 'SLA34ZFJ5IN', 'Cathleen', 'Stewart', '1971-11-27', 'P.O. Box 529, 3589 Praesent St.', 1, NULL, '1985-09-24', NULL, 2, NULL, 1),
(78, 75, NULL, 'congue.a.aliquet@ut.co.uk', 'AHA53BVO4OK', 'Thor', 'Hoffman', '2065-11-21', 'P.O. Box 577, 410 Aliquam Avenue', 2, NULL, '2007-01-13', NULL, 2, NULL, 1),
(79, 77, NULL, 'Sed.congue@molestieorcitincidunt.net', 'NWM84SOK2CT', 'Clark', 'Neal', '2058-06-03', 'P.O. Box 622, 9454 Id St.', 1, NULL, '1992-09-23', NULL, 2, NULL, 1),
(80, 100, NULL, 'egestas.blandit@Suspendissealiquetsem.com', 'IDJ22JRU0DR', 'Mark', 'Mcconnell', '2064-05-20', '665-2904 Orci. Ave', 2, NULL, '2000-11-19', NULL, 2, NULL, 1),
(81, 35, NULL, 'lacus.Quisque.imperdiet@Donecest.co.uk', 'BUE73TUO8YY', 'Haley', 'Espinoza', '2069-08-11', '507-731 Felis Rd.', 2, NULL, '2012-01-17', NULL, 2, NULL, 1),
(82, 14, NULL, 'tempus.mauris.erat@liberonec.org', 'WUS40PMD2FQ', 'Allegra', 'Fitzpatrick', '1981-05-21', 'Ap #368-4243 Venenatis Rd.', 2, NULL, '1986-10-24', NULL, 2, NULL, 1),
(83, 74, NULL, 'ornare.facilisis@ametlorem.edu', 'PUE51GMZ9QL', 'Baker', 'Barnett', '2057-08-28', 'Ap #123-6063 Lectus Rd.', 2, NULL, '2017-01-06', NULL, 1, NULL, 1),
(84, 55, NULL, 'commodo.tincidunt@eleifendCras.net', 'LRS83XOM2CT', 'Vance', 'Cobb', '2057-12-19', 'Ap #746-9816 Risus. Road', 1, NULL, '1985-11-05', NULL, 1, NULL, 1),
(85, 36, NULL, 'metus.sit@Morbivehicula.co.uk', 'KLQ01MGT9OG', 'Aristotle', 'Massey', '2063-08-26', '1360 Tellus Rd.', 1, NULL, '2001-07-02', NULL, 1, NULL, 1),
(86, 5, NULL, 'egestas.urna.justo@aduiCras.org', 'QCF57YME2MM', 'Breanna', 'Woods', '2061-10-23', '1206 Nunc Street', 1, NULL, '1995-06-13', NULL, 2, NULL, 1),
(87, 79, NULL, 'eu@ante.net', 'BUI56VIL3OH', 'Roanna', 'Guerrero', '2059-11-30', 'Ap #265-5001 A St.', 2, NULL, '2008-04-15', NULL, 2, NULL, 1),
(88, 67, NULL, 'vulputate@ipsum.org', 'SNU98EEH0BJ', 'Benjamin', 'Rocha', '2064-07-28', '591-7420 Ipsum St.', 1, NULL, '1982-09-24', NULL, 1, NULL, 1),
(89, 97, NULL, 'eu@volutpat.ca', 'PKQ35KBA3AV', 'Quintessa', 'Curtis', '2065-07-18', 'P.O. Box 511, 1979 In Rd.', 1, NULL, '2019-05-19', NULL, 1, NULL, 1),
(90, 11, NULL, 'ante.Vivamus.non@eros.co.uk', 'GTG08JHJ8BH', 'Laith', 'Lee', '1973-02-15', '491-190 Quisque Road', 1, NULL, '1994-12-05', NULL, 1, NULL, 1),
(91, 61, NULL, 'lobortis.risus.In@dignissimmagnaa.co.uk', 'OOX43LPQ4GP', 'Sebastian', 'Munoz', '1974-01-27', '5213 Porttitor Av.', 2, NULL, '1996-09-13', NULL, 2, NULL, 1),
(92, 34, NULL, 'ante.ipsum.primis@tempusmauris.net', 'UUF35CWN7ZV', 'Mechelle', 'Harrington', '1984-04-03', 'P.O. Box 310, 8129 Diam. Street', 2, NULL, '1991-06-01', NULL, 1, NULL, 1),
(93, 28, NULL, 'mauris@aptent.ca', 'LGP59HHT4KV', 'Akeem', 'Hinton', '1981-09-17', 'P.O. Box 507, 1793 Arcu Rd.', 1, NULL, '1988-02-25', NULL, 2, NULL, 1),
(94, 37, NULL, 'magna@Donecfeugiatmetus.net', 'TWQ36PUA8QI', 'Daryl', 'Bauer', '1983-02-10', 'Ap #259-6351 Eget St.', 1, NULL, '2017-05-09', NULL, 2, NULL, 1),
(95, 2, NULL, 'risus.Donec.egestas@penatibus.com', 'QBD30EWD7NX', 'Kay', 'Mckay', '1983-12-14', '290-1677 Ullamcorper. Rd.', 1, NULL, '2009-04-04', NULL, 2, NULL, 1),
(96, 32, NULL, 'Nunc.sollicitudin@velitQuisque.org', 'QAO71GGH4HL', 'Cynthia', 'Copeland', '1979-04-09', 'Ap #674-9548 Interdum. Road', 2, NULL, '2018-07-24', NULL, 2, NULL, 1),
(97, 68, NULL, 'lorem.ipsum@vulputaterisus.ca', 'IKG90EAP0HL', 'Rosalyn', 'Burke', '2059-04-21', 'Ap #872-5909 At Ave', 1, NULL, '2004-05-05', NULL, 1, NULL, 1),
(98, 56, NULL, 'metus.In@consequatauctornunc.edu', 'YFQ17RCK0FM', 'Nasim', 'Butler', '2067-05-08', 'P.O. Box 255, 5148 Odio. St.', 2, NULL, '2006-03-15', NULL, 1, NULL, 1),
(99, 61, NULL, 'rhoncus@dis.edu', 'ZKQ48ADC9NP', 'Ciaran', 'Morgan', '1978-03-28', 'Ap #754-6968 Et Ave', 1, NULL, '1992-01-18', NULL, 1, NULL, 1),
(100, 54, NULL, 'morbi.tristique@eu.ca', 'ODX37OQS6IN', 'Rama', 'Suarez', '1975-08-12', '6178 Commodo Av.', 1, NULL, '2011-02-13', NULL, 2, NULL, 1),
(101, 40, NULL, 'purus.Maecenas@facilisis.net', 'OOY60UMR4OH', 'Iris', 'Carney', '1987-03-28', 'P.O. Box 252, 4263 Ipsum Rd.', 1, NULL, '1993-04-26', NULL, 2, NULL, 1),
(102, NULL, 1, 'urna.justo.faucibus@egestaslaciniaSed.net', 'AWZ85QXP6MH', 'Harriet', 'Mason', '2058-02-17', '310-987 Sed Av.', 1, NULL, '1985-01-22', NULL, 1, NULL, 1),
(103, NULL, 1, 'sed.sapien@variuseteuismod.edu', 'MAE38IUR0AD', 'Jemima', 'Navarro', '2060-12-25', 'Ap #818-6807 Pretium Rd.', 2, NULL, '2013-06-05', NULL, 2, NULL, 1),
(104, NULL, 1, 'amet@eu.edu', 'FKW30DZW4NW', 'Kennan', 'Arnold', '1970-04-09', 'P.O. Box 602, 4515 Id Street', 1, NULL, '1999-08-23', NULL, 2, NULL, 1),
(105, NULL, 1, 'orci.lacus.vestibulum@aliquamiaculislacus.net', 'FUJ25ALM7EW', 'Vance', 'Morrison', '2059-12-24', 'P.O. Box 654, 9515 Ut Avenue', 2, NULL, '2009-01-08', NULL, 1, NULL, 1),
(106, NULL, 1, 'velit.Quisque@nuncsit.ca', 'BQJ44AFE2UF', 'Catherine', 'Valenzuela', '1973-03-01', 'Ap #246-2370 Varius Rd.', 2, NULL, '2007-02-19', NULL, 1, NULL, 1),
(107, NULL, 1, 'vel.lectus@Vivamusnibh.ca', 'SSW52RNZ5FT', 'Nayda', 'Mcknight', '1983-04-06', '503-999 Proin Av.', 2, NULL, '2002-07-21', NULL, 1, NULL, 1),
(108, NULL, 1, 'neque@vulputateullamcorper.co.uk', 'NKN81CIP9JM', 'Macey', 'Davis', '1988-01-06', 'P.O. Box 139, 9556 Semper St.', 2, NULL, '2020-01-26', NULL, 2, NULL, 1),
(109, NULL, 1, 'Morbi.accumsan@aliquetdiamSed.edu', 'CNQ18YVT0DV', 'Quentin', 'Ray', '1985-04-30', '2090 Convallis Rd.', 1, NULL, '1996-03-23', NULL, 2, NULL, 1),
(110, NULL, 1, 'ut@fermentumvelmauris.ca', 'DAJ84HRR4SQ', 'Gretchen', 'Oliver', '2068-05-28', '121-9497 Dui. St.', 1, NULL, '2019-09-30', NULL, 2, NULL, 1),
(111, NULL, 1, 'enim.mi.tempor@acarcu.org', 'BCK14ITI5KO', 'Teagan', 'Greene', '1976-11-29', 'P.O. Box 651, 924 Mauris Avenue', 2, NULL, '1987-08-06', NULL, 2, NULL, 1),
(112, NULL, 1, 'Etiam.vestibulum@sit.edu', 'XEO32DLN3LQ', 'Cassandra', 'Michael', '1971-06-16', '825-9824 Nulla Street', 1, NULL, '1987-05-24', NULL, 2, NULL, 1),
(113, NULL, 1, 'pharetra.sed@feugiat.edu', 'HCX03VHF1JP', 'Joseph', 'Phillips', '2065-08-26', '726-8863 Nec Road', 2, NULL, '2015-01-13', NULL, 2, NULL, 1),
(114, NULL, 1, 'sed@dapibusid.edu', 'GXH75XKY9EP', 'Ishmael', 'Park', '2065-03-17', 'Ap #182-5612 Et, St.', 2, NULL, '1986-09-01', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `EVENT`
--

DROP TABLE IF EXISTS `EVENT`;
CREATE TABLE IF NOT EXISTS `EVENT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `begin_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `celebrity` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `EVENT`
--

INSERT INTO `EVENT` (`id`, `name`, `location`, `begin_date`, `end_date`, `number_of_guests`, `celebrity`, `active`, `description`, `picture`) VALUES
(1, 'zsd', 'azd', '2020-12-07 12:12:00', '5555-04-05 12:11:00', 5645, 'zadzad', 1, 'zad', ''),
(2, 'lalala', 'ici', '2020-12-07 12:12:00', '5555-04-05 12:11:00', 10, 'mo', 1, 'tro b1', ''),
(3, 'dcd', 'cdcd', '2020-12-25 12:32:00', '2021-05-12 06:06:00', 10, 'dc', 1, 'dc', ''),
(4, 'kj', 'oij', '1212-02-12 06:06:00', '2020-12-22 06:59:00', 10, 'ij', 1, 'poj', ''),
(5, 'pokpùok', 'kl,olk', '1202-02-12 12:21:00', '6666-06-05 12:12:00', 10, '10', 1, 'mlsdkclos', ''),
(6, 'pokpùok', 'kl,olk', '2020-02-12 12:21:00', '2021-06-05 12:12:00', 10, '10', 1, 'mlsdkclos', ''),
(7, 'pokpùok', 'kl,olk', '2020-02-12 12:21:00', '2021-06-05 12:12:00', 10, '10', 1, 'mlsdkclos', ''),
(8, 'pokpùok', 'kl,olk', '2020-02-12 12:21:00', '2021-06-05 12:12:00', 10, '10', 1, 'mlsdkclos', ''),
(9, 'oi', 'j', '2020-12-12 06:06:00', '2021-02-12 06:06:00', 10, 'ij', 1, ',', ''),
(10, 'k', 'l', '2020-12-12 04:04:00', '2021-05-05 03:03:00', 10, 'mùl', 1, '^r', ''),
(11, 'k', 'l', '2020-12-12 04:04:00', '2021-05-05 03:03:00', 10, 'mùl', 1, '^r', 'C:\\fakepath\\Homer_Simpson.png'),
(12, 'k', 'l', '2020-12-12 04:04:00', '2021-05-05 03:03:00', 10, 'mùl', 1, '^r', 'C:\\fakepath\\Homer_Simpson.png'),
(13, 'k', 'l', '2020-12-12 04:04:00', '2021-05-05 03:03:00', 10, 'mùl', 1, '^r', 'C:\\fakepath\\Homer_Simpson.png'),
(14, 'qeg', 'zrg', '2020-12-12 06:03:00', '2021-12-12 05:05:00', 52, 're', 1, 'erg', ''),
(15, 'titre', '654 avenue', '2020-05-20 16:33:07', '2020-05-20 16:33:07', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(16, 'titre', '654 avenue', '2020-05-20 16:38:55', '2020-05-20 16:38:55', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(17, 'titre', '654 avenue', '2020-05-20 16:38:55', '2020-05-20 16:38:55', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(18, 'titre', '654 avenue', '2020-05-20 16:38:55', '2020-05-20 16:38:55', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(19, 'titre', '654 avenue', '2020-05-20 16:38:55', '2020-05-20 16:38:55', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(20, 'titre', '654 avenue', '2020-05-20 16:48:15', '2020-05-20 16:48:15', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(21, 'titre', '654 avenue', '2020-05-20 16:48:15', '2020-05-20 16:48:15', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(22, 'titre', '654 avenue', '2020-05-20 16:49:13', '2020-05-20 16:49:13', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(23, 'titre', '654 avenue', '2020-05-20 16:49:49', '2020-05-20 16:49:49', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(24, 'titre', '654 avenue', '2020-05-20 16:53:20', '2020-05-20 16:53:20', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(25, 'titre', '654 avenue', '2020-05-20 16:53:41', '2020-05-20 16:53:41', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(26, 'titre', '654 avenue', '2020-05-20 16:54:25', '2020-05-20 16:54:25', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(27, 'titre', '654 avenue', '2020-05-20 16:54:37', '2020-05-20 16:54:37', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(28, 'titre', '654 avenue', '2020-05-20 17:01:29', '2020-05-20 17:01:29', 50, 'Cyril Lignac', 1, 'Lorem ispum', 'here'),
(29, 'titre', '654 avenue', '2020-05-20 17:01:52', '2020-05-20 17:01:52', 50, 'Cyril Lignac', 1, 'Lorem ispum', NULL),
(30, 'titre num 5', '654 avenue', '2020-05-20 17:02:37', '2020-05-20 17:02:37', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(31, 'titre num 5', '654 avenue', '2020-05-20 17:07:31', '2020-05-20 17:07:31', 50, 'Cyril Lignac', 1, 'Lorem ispum', NULL),
(32, 'titre num 5', '654 avenue', '2020-05-20 17:09:26', '2020-05-20 17:09:26', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(33, 'titre num 5', '654 avenue', '2020-05-20 17:10:06', '2020-05-20 17:10:06', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(34, 'titre num 5', '654 avenue', '2020-05-20 17:10:55', '2020-05-20 17:10:55', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(35, 'titre num 5', '654 avenue', '2020-05-20 17:11:33', '2020-05-20 17:11:33', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(36, 'titre num 5', '654 avenue', '2020-05-20 17:13:08', '2020-05-20 17:13:08', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(37, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(38, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(39, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(40, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(41, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(42, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(43, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(44, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(45, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(46, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(47, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(48, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(49, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(50, 'titre num 5', '654 avenue', '2020-05-20 18:57:28', '2020-05-20 18:57:28', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(51, 'titre num 5', '654 avenue', '2020-05-21 13:04:47', '2020-05-21 13:04:47', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(52, 'titre num 5', '654 avenue', '2020-05-21 13:04:47', '2020-05-21 13:04:47', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(53, 'titre num 5', '654 avenue', '2020-05-21 13:04:47', '2020-05-21 13:04:47', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(54, 'titre num 5', '654 avenue', '2020-05-21 13:05:33', '2020-05-21 13:05:33', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(55, 'titre num 5', '654 avenue', '2020-05-21 13:05:33', '2020-05-21 13:05:33', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(56, 'titre num 5', '654 avenue', '2020-05-21 13:05:33', '2020-05-21 13:05:33', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(57, 'titre num 5', '654 avenue', '2020-05-21 13:06:14', '2020-05-21 13:06:14', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(58, 'titre num 5', '654 avenue', '2020-05-21 13:07:32', '2020-05-21 13:07:32', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(59, 'titre num 5', '654 avenue', '2020-05-21 13:10:57', '2020-05-21 13:10:57', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(60, 'titre num 5', '654 avenue', '2020-05-21 13:10:57', '2020-05-21 13:10:57', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(61, 'titre num 5', '654 avenue', '2020-05-21 13:11:35', '2020-05-21 13:11:35', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(62, 'titre num 5', '654 avenue', '2020-05-21 13:13:04', '2020-05-21 13:13:04', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(63, 'titre num 5', '654 avenue', '2020-05-21 13:13:32', '2020-05-21 13:13:32', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(64, 'titre num 5', '654 avenue', '2020-05-21 13:15:13', '2020-05-21 13:15:13', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(65, 'titre num 5', '654 avenue', '2020-05-21 13:17:31', '2020-05-21 13:17:31', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(66, 'titre num 5', '654 avenue', '2020-05-21 13:24:49', '2020-05-21 13:24:49', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(67, 'titre num 5', '654 avenue', '2020-05-21 13:26:21', '2020-05-21 13:26:21', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(68, 'titre num 5', '654 avenue', '2020-05-21 13:49:05', '2020-05-21 13:49:05', 50, 'Cyril Lignac', 1, 'Lorem ispum', ''),
(69, '94', 'zeg', '0005-05-05 05:59:00', '1212-05-09 09:59:00', 98, 'EZGzrgfb', 1, 'ZEGzrezreg', ''),
(70, '94', 'zeg', '0005-05-05 05:59:00', '0088-05-09 07:09:00', 98, 'EZGzrgfb', 1, 'ZEGzrezreg', ''),
(71, '94', 'zeg', '0005-05-05 05:59:00', '0111-05-09 07:09:00', 500, 'EZGzrgfb', 1, 'ZEGzrezreg', ''),
(72, '94', 'zeg', '0005-05-05 05:59:00', '0111-05-09 07:09:00', 500, 'EZGzrgfb', 1, 'ZEGzrezreg', '');

-- --------------------------------------------------------

--
-- Structure de la table `FRANCHISEE`
--

DROP TABLE IF EXISTS `FRANCHISEE`;
CREATE TABLE IF NOT EXISTS `FRANCHISEE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_truck` int(11) NOT NULL,
  `id_headquarter` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `driver_license` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_truck_2` (`id_truck`),
  KEY `id_truck` (`id_truck`),
  KEY `id_headquarter` (`id_headquarter`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FRANCHISEE`
--

INSERT INTO `FRANCHISEE` (`id`, `id_truck`, `id_headquarter`, `creation_date`, `driver_license`, `picture`, `qrcode`) VALUES
(1, 1, 1, '2020-03-30', 'driver license', NULL, 'qrr code'),
(2, 2, 1, '2019-10-18', 'eu neque pellentesque massa lobortis', 'nunc risus varius orci, in', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(3, 3, 1, '2020-02-03', 'et, rutrum non, hendrerit id,', 'cursus in, hendrerit consectetuer, cursus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(4, 4, 1, '2021-04-28', 'sit amet nulla. Donec non', 'imperdiet dictum magna. Ut tincidunt', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(5, 5, 1, '2020-05-16', 'Fusce mi lorem, vehicula et,', 'in, hendrerit consectetuer, cursus et,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin'),
(6, 6, 1, '2019-12-14', 'imperdiet ullamcorper. Duis at lacus.', 'est, vitae sodales nisi magna', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(7, 7, 1, '2020-08-28', 'egestas. Aliquam fringilla cursus purus.', 'a, malesuada id, erat. Etiam', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(8, 8, 1, '2019-10-12', 'natoque penatibus et magnis dis', 'accumsan laoreet ipsum. Curabitur consequat,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.'),
(9, 9, 1, '2020-02-18', 'vel, convallis in, cursus et,', 'porttitor scelerisque neque. Nullam nisl.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et'),
(10, 10, 1, '2020-01-09', 'molestie pharetra nibh. Aliquam ornare,', 'Nunc ullamcorper, velit in aliquet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(11, 37, 1, '2020-09-02', 'orci. Phasellus dapibus quam quis', 'elementum sem, vitae aliquam eros', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(12, 12, 1, '2019-07-11', 'Nullam feugiat placerat velit. Quisque', 'lectus convallis est, vitae sodales', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(13, 13, 1, '2020-02-06', 'nisi. Aenean eget metus. In', 'morbi tristique senectus et netus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu'),
(14, 14, 1, '2021-03-05', 'magna. Duis dignissim tempor arcu.', 'risus quis diam luctus lobortis.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(15, 15, 1, '2019-05-12', 'Sed dictum. Proin eget odio.', 'Duis risus odio, auctor vitae,', 'Lorem ipsum dolor sit amet, consectetuer'),
(16, 16, 1, '2020-07-03', 'sit amet ultricies sem magna', 'nec enim. Nunc ut erat.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna'),
(17, 17, 1, '2021-03-03', 'dignissim lacus. Aliquam rutrum lorem', 'justo nec ante. Maecenas mi', 'Lorem ipsum dolor'),
(18, 18, 1, '2019-10-26', 'Mauris vestibulum, neque sed dictum', 'lobortis quis, pede. Suspendisse dui.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(19, 19, 1, '2021-03-31', 'ornare, libero at auctor ullamcorper,', 'hendrerit consectetuer, cursus et, magna.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(20, 20, 1, '2019-08-26', 'tortor nibh sit amet orci.', 'enim nec tempus scelerisque, lorem', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(21, 21, 1, '2020-09-15', 'ante dictum cursus. Nunc mauris', 'adipiscing non, luctus sit amet,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(22, 22, 1, '2020-03-17', 'venenatis lacus. Etiam bibendum fermentum', 'tellus lorem eu metus. In', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(23, 23, 1, '2019-09-03', 'porttitor eros nec tellus. Nunc', 'euismod enim. Etiam gravida molestie', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(24, 24, 1, '2019-12-10', 'eleifend. Cras sed leo. Cras', 'pede, nonummy ut, molestie in,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(25, 25, 1, '2019-09-27', 'Nulla dignissim. Maecenas ornare egestas', 'Sed eget lacus. Mauris non', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(26, 26, 1, '2019-10-05', 'euismod urna. Nullam lobortis quam', 'in lobortis tellus justo sit', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(27, 27, 1, '2019-07-09', 'pretium neque. Morbi quis urna.', 'ac turpis egestas. Aliquam fringilla', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec'),
(28, 28, 1, '2019-07-25', 'Vestibulum accumsan neque et nunc.', 'rhoncus. Nullam velit dui, semper', 'Lorem ipsum dolor sit amet, consectetuer'),
(29, 29, 1, '2020-06-06', 'Donec luctus aliquet odio. Etiam', 'diam at pretium aliquet, metus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(30, 30, 1, '2019-11-24', 'vitae, sodales at, velit. Pellentesque', 'magna. Praesent interdum ligula eu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(31, 31, 1, '2021-01-24', 'eget ipsum. Suspendisse sagittis. Nullam', 'lacinia orci, consectetuer euismod est', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(32, 32, 1, '2019-12-01', 'porttitor vulputate, posuere vulputate, lacus.', 'Sed id risus quis diam', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin'),
(33, 33, 1, '2019-10-13', 'Maecenas iaculis aliquet diam. Sed', 'vel arcu. Curabitur ut odio', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.'),
(34, 34, 1, '2020-04-26', 'tristique senectus et netus et', 'mus. Proin vel arcu eu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(35, 35, 1, '2020-11-17', 'Aliquam fringilla cursus purus. Nullam', 'lorem vitae odio sagittis semper.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat.'),
(36, 36, 1, '2019-05-30', 'amet, faucibus ut, nulla. Cras', 'semper pretium neque. Morbi quis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(37, 11, 1, '2020-06-22', 'Duis a mi fringilla mi', 'augue, eu tempor erat neque', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(38, 38, 1, '2020-09-08', 'Praesent luctus. Curabitur egestas nunc', 'justo faucibus lectus, a sollicitudin', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(39, 39, 1, '2020-05-17', 'non nisi. Aenean eget metus.', 'scelerisque, lorem ipsum sodales purus,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(40, 40, 1, '2021-01-05', 'mauris blandit mattis. Cras eget', 'facilisis, magna tellus faucibus leo,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut'),
(41, 41, 1, '2019-06-16', 'nisi dictum augue malesuada malesuada.', 'sollicitudin commodo ipsum. Suspendisse non', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(42, 42, 1, '2020-05-06', 'purus gravida sagittis. Duis gravida.', 'tellus lorem eu metus. In', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(43, 43, 1, '2021-04-29', 'nunc interdum feugiat. Sed nec', 'vulputate, lacus. Cras interdum. Nunc', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(44, 44, 1, '2019-11-21', 'dolor sit amet, consectetuer adipiscing', 'primis in faucibus orci luctus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada'),
(45, 45, 1, '2020-12-07', 'aliquet odio. Etiam ligula tortor,', 'Maecenas iaculis aliquet diam. Sed', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(46, 46, 1, '2019-11-26', 'imperdiet ullamcorper. Duis at lacus.', 'eget nisi dictum augue malesuada', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(47, 47, 1, '2019-07-24', 'Nam nulla magna, malesuada vel,', 'commodo hendrerit. Donec porttitor tellus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(48, 48, 1, '2020-12-20', 'Quisque varius. Nam porttitor scelerisque', 'Nunc mauris elit, dictum eu,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,'),
(49, 49, 1, '2020-11-30', 'sem, consequat nec, mollis vitae,', 'convallis dolor. Quisque tincidunt pede', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(50, 50, 1, '2021-03-02', 'nec enim. Nunc ut erat.', 'nunc sed pede. Cum sociis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(51, 51, 1, '2020-12-11', 'tristique pellentesque, tellus sem mollis', 'risus. Nulla eget metus eu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(52, 52, 1, '2019-12-09', 'Integer urna. Vivamus molestie dapibus', 'accumsan laoreet ipsum. Curabitur consequat,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at'),
(53, 53, 1, '2020-01-11', 'faucibus leo, in lobortis tellus', 'purus gravida sagittis. Duis gravida.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada'),
(54, 54, 1, '2021-04-12', 'aliquet diam. Sed diam lorem,', 'purus. Maecenas libero est, congue', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(55, 55, 1, '2020-09-15', 'lacus. Quisque purus sapien, gravida', 'Aenean sed pede nec ante', 'Lorem ipsum dolor sit amet, consectetuer'),
(56, 56, 1, '2020-06-30', 'accumsan convallis, ante lectus convallis', 'augue ut lacus. Nulla tincidunt,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(57, 57, 1, '2020-07-31', 'sit amet risus. Donec egestas.', 'vehicula aliquet libero. Integer in', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id,'),
(58, 58, 1, '2019-08-24', 'hendrerit a, arcu. Sed et', 'at, velit. Pellentesque ultricies dignissim', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,'),
(59, 59, 1, '2019-10-11', 'sodales nisi magna sed dui.', 'nec, cursus a, enim. Suspendisse', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(60, 60, 1, '2020-10-12', 'placerat. Cras dictum ultricies ligula.', 'in aliquet lobortis, nisi nibh', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(61, 61, 1, '2020-05-08', 'sit amet, risus. Donec nibh', 'sem, vitae aliquam eros turpis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(62, 62, 1, '2019-09-26', 'pharetra. Quisque ac libero nec', 'augue, eu tempor erat neque', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.'),
(63, 63, 1, '2020-11-03', 'tristique neque venenatis lacus. Etiam', 'dictum. Proin eget odio. Aliquam', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(64, 64, 1, '2020-06-04', 'quam. Curabitur vel lectus. Cum', 'ligula tortor, dictum eu, placerat', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(65, 65, 1, '2020-06-06', 'a nunc. In at pede.', 'Ut tincidunt orci quis lectus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(66, 66, 1, '2021-05-02', 'mi lorem, vehicula et, rutrum', 'non, luctus sit amet, faucibus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(67, 67, 1, '2019-10-28', 'porttitor interdum. Sed auctor odio', 'ultrices iaculis odio. Nam interdum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(68, 68, 1, '2021-03-25', 'neque. In ornare sagittis felis.', 'scelerisque mollis. Phasellus libero mauris,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(69, 69, 1, '2019-08-20', 'In faucibus. Morbi vehicula. Pellentesque', 'Donec vitae erat vel pede', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(70, 70, 1, '2019-10-14', 'tempus mauris erat eget ipsum.', 'velit. Pellentesque ultricies dignissim lacus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet'),
(71, 71, 1, '2020-01-22', 'non, bibendum sed, est. Nunc', 'nunc. In at pede. Cras', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(72, 72, 1, '2019-12-14', 'Nunc quis arcu vel quam', 'consequat purus. Maecenas libero est,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(73, 73, 1, '2019-12-26', 'arcu. Curabitur ut odio vel', 'Suspendisse aliquet, sem ut cursus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(74, 74, 1, '2020-10-09', 'tincidunt congue turpis. In condimentum.', 'egestas. Fusce aliquet magna a', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(75, 75, 1, '2020-09-23', 'et ipsum cursus vestibulum. Mauris', 'magna. Duis dignissim tempor arcu.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(76, 76, 1, '2019-05-06', 'dui nec urna suscipit nonummy.', 'lacus pede sagittis augue, eu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(77, 77, 1, '2019-11-07', 'enim. Mauris quis turpis vitae', 'dolor. Fusce mi lorem, vehicula', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(78, 78, 1, '2019-08-30', 'orci lobortis augue scelerisque mollis.', 'magnis dis parturient montes, nascetur', 'Lorem ipsum dolor sit amet, consectetuer'),
(79, 79, 1, '2020-05-12', 'sed pede. Cum sociis natoque', 'velit eu sem. Pellentesque ut', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(80, 80, 1, '2019-06-02', 'dolor. Quisque tincidunt pede ac', 'a feugiat tellus lorem eu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(81, 81, 1, '2019-05-21', 'tempus eu, ligula. Aenean euismod', 'aliquet nec, imperdiet nec, leo.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(82, 82, 1, '2020-01-01', 'orci tincidunt adipiscing. Mauris molestie', 'neque tellus, imperdiet non, vestibulum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(83, 83, 1, '2021-02-02', 'metus. Vivamus euismod urna. Nullam', 'tortor, dictum eu, placerat eget,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(84, 84, 1, '2021-01-21', 'arcu ac orci. Ut semper', 'amet ultricies sem magna nec', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(85, 85, 1, '2020-06-05', 'et magnis dis parturient montes,', 'Morbi accumsan laoreet ipsum. Curabitur', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(86, 86, 1, '2020-08-03', 'sed sem egestas blandit. Nam', 'Duis ac arcu. Nunc mauris.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(87, 87, 1, '2019-11-05', 'Morbi metus. Vivamus euismod urna.', 'nibh. Quisque nonummy ipsum non', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus'),
(88, 88, 1, '2019-06-02', 'ut lacus. Nulla tincidunt, neque', 'eu erat semper rutrum. Fusce', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(89, 89, 1, '2020-11-17', 'aliquam, enim nec tempus scelerisque,', 'sit amet, dapibus id, blandit', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(90, 90, 1, '2019-10-28', 'ipsum primis in faucibus orci', 'molestie sodales. Mauris blandit enim', 'Lorem ipsum'),
(91, 91, 1, '2020-06-11', 'orci, in consequat enim diam', 'adipiscing elit. Etiam laoreet, libero', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis'),
(92, 92, 1, '2021-01-09', 'ridiculus mus. Aenean eget magna.', 'Phasellus dapibus quam quis diam.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(93, 93, 1, '2021-02-07', 'euismod et, commodo at, libero.', 'sed, sapien. Nunc pulvinar arcu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(94, 94, 1, '2021-04-03', 'ullamcorper viverra. Maecenas iaculis aliquet', 'ipsum ac mi eleifend egestas.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque'),
(95, 95, 1, '2019-09-23', 'sapien. Aenean massa. Integer vitae', 'venenatis vel, faucibus id, libero.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(96, 96, 1, '2019-06-29', 'faucibus lectus, a sollicitudin orci', 'Nullam ut nisi a odio', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.'),
(97, 97, 1, '2020-06-27', 'enim mi tempor lorem, eget', 'gravida. Praesent eu nulla at', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(98, 98, 1, '2020-06-13', 'erat, eget tincidunt dui augue', 'consequat purus. Maecenas libero est,', 'Lorem ipsum dolor sit amet,'),
(99, 99, 1, '2019-08-13', 'facilisis lorem tristique aliquet. Phasellus', 'sagittis. Duis gravida. Praesent eu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(100, 100, 1, '2020-04-06', 'dui lectus rutrum urna, nec', 'a, scelerisque sed, sapien. Nunc', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib'),
(101, 101, 1, '0000-00-00', 'convallis dolor. Quisque tincidunt pede', 'Suspendisse eleifend. Cras sed leo.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestib');

-- --------------------------------------------------------

--
-- Structure de la table `GENDER`
--

DROP TABLE IF EXISTS `GENDER`;
CREATE TABLE IF NOT EXISTS `GENDER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `GENDER`
--

INSERT INTO `GENDER` (`id`, `name`) VALUES
(1, 'Femme'),
(2, 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `HEADQUARTER`
--

DROP TABLE IF EXISTS `HEADQUARTER`;
CREATE TABLE IF NOT EXISTS `HEADQUARTER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) NOT NULL,
  `turnover` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `HEADQUARTER`
--

INSERT INTO `HEADQUARTER` (`id`, `brand`, `icon`, `logo`, `picture`, `slogan`, `turnover`) VALUES
(1, 'DrivncookTrucks', 'icon.png', 'logo.png', NULL, 'Vous allez vous régaler ! Miam !', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `INGREDIENT`
--

DROP TABLE IF EXISTS `INGREDIENT`;
CREATE TABLE IF NOT EXISTS `INGREDIENT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `expiration_date` date NOT NULL,
  `tva` float NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `INVOICE`
--

DROP TABLE IF EXISTS `INVOICE`;
CREATE TABLE IF NOT EXISTS `INVOICE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_headquarter` int(11) DEFAULT NULL,
  `id_franchisee` int(11) DEFAULT NULL,
  `email_customer` varchar(80) DEFAULT NULL,
  `id_warehouse` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `type` smallint(6) NOT NULL,
  `price` int(11) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `number` varchar(255) NOT NULL,
  `expenses` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_franchisee` (`id_franchisee`),
  KEY `id_headquarter` (`id_headquarter`),
  KEY `id_warehouse` (`id_warehouse`),
  KEY `email_customer` (`email_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `LOYALTY_CARD`
--

DROP TABLE IF EXISTS `LOYALTY_CARD`;
CREATE TABLE IF NOT EXISTS `LOYALTY_CARD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_customer` varchar(80) NOT NULL,
  `activation_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `number` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer` (`email_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MEAL`
--

DROP TABLE IF EXISTS `MEAL`;
CREATE TABLE IF NOT EXISTS `MEAL` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `recipe` text NOT NULL,
  `price` int(11) NOT NULL,
  `tva` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MENU`
--

DROP TABLE IF EXISTS `MENU`;
CREATE TABLE IF NOT EXISTS `MENU` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `tva` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MENU_DRINK`
--

DROP TABLE IF EXISTS `MENU_DRINK`;
CREATE TABLE IF NOT EXISTS `MENU_DRINK` (
  `id_menu` int(11) NOT NULL,
  `id_drink` int(11) NOT NULL,
  `quantity_drink` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`,`id_drink`),
  KEY `id_drink` (`id_drink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MENU_MEAL`
--

DROP TABLE IF EXISTS `MENU_MEAL`;
CREATE TABLE IF NOT EXISTS `MENU_MEAL` (
  `id_menu` int(11) NOT NULL,
  `id_meal` int(11) NOT NULL,
  `quantity_meal` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`,`id_meal`),
  KEY `id_meal` (`id_meal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ORDER_DRINK`
--

DROP TABLE IF EXISTS `ORDER_DRINK`;
CREATE TABLE IF NOT EXISTS `ORDER_DRINK` (
  `id_invoice` int(11) NOT NULL,
  `id_drink` int(11) NOT NULL,
  `quantity_drink` int(11) NOT NULL,
  PRIMARY KEY (`id_invoice`,`id_drink`),
  KEY `id_drink` (`id_drink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ORDER_INGREDIENT`
--

DROP TABLE IF EXISTS `ORDER_INGREDIENT`;
CREATE TABLE IF NOT EXISTS `ORDER_INGREDIENT` (
  `id_invoice` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `quantity_ingredient` int(11) NOT NULL,
  PRIMARY KEY (`id_invoice`,`id_ingredient`),
  KEY `id_ingredient` (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ORDER_MEAL`
--

DROP TABLE IF EXISTS `ORDER_MEAL`;
CREATE TABLE IF NOT EXISTS `ORDER_MEAL` (
  `id_invoice` int(11) NOT NULL,
  `id_meal` int(11) NOT NULL,
  `quantity_meal` int(11) NOT NULL,
  PRIMARY KEY (`id_invoice`,`id_meal`),
  KEY `id_meal` (`id_meal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ORDER_MENU`
--

DROP TABLE IF EXISTS `ORDER_MENU`;
CREATE TABLE IF NOT EXISTS `ORDER_MENU` (
  `id_invoice` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `quantity_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_invoice`,`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ORGANIZATION`
--

DROP TABLE IF EXISTS `ORGANIZATION`;
CREATE TABLE IF NOT EXISTS `ORGANIZATION` (
  `id_event` int(11) NOT NULL,
  `id_truck` int(11) NOT NULL,
  PRIMARY KEY (`id_event`,`id_truck`),
  KEY `fk_truck` (`id_truck`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ORGANIZATION`
--

INSERT INTO `ORGANIZATION` (`id_event`, `id_truck`) VALUES
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1);

-- --------------------------------------------------------

--
-- Structure de la table `PARTICIPATION`
--

DROP TABLE IF EXISTS `PARTICIPATION`;
CREATE TABLE IF NOT EXISTS `PARTICIPATION` (
  `email_customer` varchar(80) NOT NULL,
  `id_event` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`email_customer`,`id_event`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ROLE`
--

DROP TABLE IF EXISTS `ROLE`;
CREATE TABLE IF NOT EXISTS `ROLE` (
  `id` mediumint(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ROLE`
--

INSERT INTO `ROLE` (`id`, `name`, `description`) VALUES
(1, 'Directeur générale', 'Directeur générale de la maison mère'),
(2, 'Directeur', 'Directeur d\'une franchise'),
(3, 'Directeur adjoint', ''),
(4, 'Employee', '');

-- --------------------------------------------------------

--
-- Structure de la table `STOCK_DRINK`
--

DROP TABLE IF EXISTS `STOCK_DRINK`;
CREATE TABLE IF NOT EXISTS `STOCK_DRINK` (
  `id_warehouse` int(11) NOT NULL,
  `id_drink` int(11) NOT NULL,
  `quantity_drink` int(11) NOT NULL,
  PRIMARY KEY (`id_warehouse`,`id_drink`),
  KEY `id_drink` (`id_drink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `STOCK_INGREDIENT`
--

DROP TABLE IF EXISTS `STOCK_INGREDIENT`;
CREATE TABLE IF NOT EXISTS `STOCK_INGREDIENT` (
  `id_warehouse` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `quantity_ingredient` int(11) NOT NULL,
  PRIMARY KEY (`id_warehouse`,`id_ingredient`),
  KEY `id_ingredient` (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `STOCK_MEAL`
--

DROP TABLE IF EXISTS `STOCK_MEAL`;
CREATE TABLE IF NOT EXISTS `STOCK_MEAL` (
  `id_warehouse` int(11) NOT NULL,
  `id_meal` int(11) NOT NULL,
  `quantity_meal` int(11) NOT NULL,
  PRIMARY KEY (`id_meal`,`id_warehouse`),
  KEY `id_warehouse` (`id_warehouse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TRUCK`
--

DROP TABLE IF EXISTS `TRUCK`;
CREATE TABLE IF NOT EXISTS `TRUCK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_headquarter` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `litres_of_gasoline` smallint(6) NOT NULL,
  `empty_weight` int(6) NOT NULL,
  `charge_capacity` int(6) NOT NULL,
  `content` text,
  `guarantee` date NOT NULL,
  `the_certificate_of_sanitary_and_technical_approval` varchar(255) NOT NULL,
  `registration_document` varchar(255) NOT NULL,
  `immatriculation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `immatriculation` (`immatriculation`),
  KEY `id_headquarter` (`id_headquarter`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TRUCK`
--

INSERT INTO `TRUCK` (`id`, `id_headquarter`, `name`, `location`, `creation_date`, `litres_of_gasoline`, `empty_weight`, `charge_capacity`, `content`, `guarantee`, `the_certificate_of_sanitary_and_technical_approval`, `registration_document`, `immatriculation`) VALUES
(1, 1, 'drivencook1', '8 reu de la foire', '2020-04-26', 3, 500, 600, NULL, '2020-04-26', '5', '8', 'Nullam feugiat'),
(2, 1, 'Cote', 'P.O. Box 959, 5325 A Street', '0000-00-00', 47, 992, 269, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor.', '2015-02-21', 'et, euismod et, commodo at,', 'neque. Nullam nisl. Maecenas malesuada', 'lorem semper'),
(3, 1, 'Huber', 'P.O. Box 194, 7718 Mi St.', '0000-00-00', 25, 326, 432, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,', '2021-05-20', 'cursus. Nunc mauris elit, dictum', 'taciti sociosqu ad litora torquent', 'ullamcorper magna.'),
(4, 1, 'Berg', 'Ap #456-6390 Urna Street', '0000-00-00', 41, 708, 1071, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum', '2021-01-21', 'placerat eget, venenatis a, magna.', 'fames ac turpis egestas. Aliquam', 'non, lacinia'),
(5, 1, 'Crawford', 'Ap #120-9807 Quisque Ave', '0000-00-00', 35, 433, 1511, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras', '2016-03-21', 'mauris a nunc. In at', 'dis parturient montes, nascetur ridiculus', 'et magnis'),
(6, 1, 'Farley', 'Ap #553-8092 Non, Street', '0000-00-00', 21, 310, 158, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis', '2024-03-20', 'sociis natoque penatibus et magnis', 'tellus. Aenean egestas hendrerit neque.', 'sociis natoque'),
(7, 1, 'Underwood', 'Ap #722-8319 Ipsum. St.', '0000-00-00', 45, 684, 103, 'Lorem ipsum dolor', '2009-11-20', 'ac orci. Ut semper pretium', 'erat volutpat. Nulla facilisis. Suspendisse', 'tellus. Phasellus'),
(8, 1, 'Chen', 'P.O. Box 124, 9964 Eu Av.', '0000-00-00', 11, 390, 1587, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', '2016-05-19', 'Etiam imperdiet dictum magna. Ut', 'Vestibulum accumsan neque et nunc.', 'gravida non,'),
(9, 1, 'Chandler', '370-2055 Feugiat. Avenue', '0000-00-00', 29, 736, 1769, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', '2007-01-20', 'commodo ipsum. Suspendisse non leo.', 'ornare tortor at risus. Nunc', 'ac tellus.'),
(10, 1, 'Jacobs', '2991 Feugiat Rd.', '0000-00-00', 41, 114, 1914, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at,', '2004-05-20', 'pede et risus. Quisque libero', 'dis parturient montes, nascetur ridiculus', 'mi lacinia'),
(11, 1, 'Foster', '634-1865 Eget Rd.', '0000-00-00', 37, 432, 423, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', '2027-11-20', 'Curabitur consequat, lectus sit amet', 'facilisis vitae, orci. Phasellus dapibus', 'parturient montes,'),
(12, 1, 'Wright', '6319 Et Ave', '0000-00-00', 26, 422, 771, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi', '2017-06-20', 'a, aliquet vel, vulputate eu,', 'commodo hendrerit. Donec porttitor tellus', 'dignissim tempor'),
(13, 1, 'Vazquez', 'P.O. Box 173, 171 Vitae Street', '0000-00-00', 33, 559, 1919, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum', '2022-10-20', 'tincidunt vehicula risus. Nulla eget', 'in molestie tortor nibh sit', 'dolor. Quisque'),
(14, 1, 'Chandler', '4061 Sem Rd.', '0000-00-00', 13, 424, 1204, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam', '2026-11-20', 'pellentesque massa lobortis ultrices. Vivamus', 'est, mollis non, cursus non,', 'nunc sed'),
(15, 1, 'Rosario', '4776 Commodo Rd.', '0000-00-00', 11, 270, 984, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum.', '2011-07-20', 'hendrerit consectetuer, cursus et, magna.', 'id risus quis diam luctus', 'sem elit,'),
(16, 1, 'Rios', '137-5244 Etiam Ave', '0000-00-00', 30, 641, 1462, 'Lorem ipsum dolor sit amet,', '2021-02-20', 'hendrerit. Donec porttitor tellus non', 'semper erat, in consectetuer ipsum', 'magna. Sed'),
(17, 1, 'Noble', '8789 Ligula. St.', '0000-00-00', 36, 719, 1498, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras', '2016-07-20', 'eu metus. In lorem. Donec', 'vel, faucibus id, libero. Donec', 'amet, consectetuer'),
(18, 1, 'Brennan', 'Ap #513-6011 Netus Avenue', '0000-00-00', 42, 777, 551, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam', '2001-12-19', 'amet, consectetuer adipiscing elit. Curabitur', 'nascetur ridiculus mus. Donec dignissim', 'habitant morbi'),
(19, 1, 'Lane', '9589 Ornare, Rd.', '0000-00-00', 38, 798, 1917, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', '2029-10-20', 'consectetuer rhoncus. Nullam velit dui,', 'felis orci, adipiscing non, luctus', 'Fusce mi'),
(20, 1, 'Noble', '670-9270 Nec Avenue', '0000-00-00', 19, 1000, 1168, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a,', '2003-10-20', 'justo. Praesent luctus. Curabitur egestas', 'Donec egestas. Aliquam nec enim.', 'enim commodo'),
(21, 1, 'Velazquez', 'Ap #580-3815 Neque Avenue', '0000-00-00', 25, 407, 792, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', '2001-05-21', 'dictum mi, ac mattis velit', 'montes, nascetur ridiculus mus. Proin', 'Maecenas libero'),
(22, 1, 'Baird', '895-5172 Ac Av.', '0000-00-00', 46, 956, 573, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien.', '2021-10-20', 'consequat enim diam vel arcu.', 'Cras sed leo. Cras vehicula', 'dapibus ligula.'),
(23, 1, 'Hansen', '318-6912 Aliquam Road', '0000-00-00', 12, 768, 446, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '2020-12-19', 'odio sagittis semper. Nam tempor', 'nunc sed pede. Cum sociis', 'ante. Vivamus'),
(24, 1, 'Marsh', '8574 Duis Av.', '0000-00-00', 16, 349, 1037, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam,', '2011-07-19', 'Ut nec urna et arcu', 'convallis est, vitae sodales nisi', 'facilisis vitae,'),
(25, 1, 'Pollard', '8639 Nisi Road', '0000-00-00', 43, 336, 812, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci', '2008-04-21', 'Integer eu lacus. Quisque imperdiet,', 'In tincidunt congue turpis. In', NULL),
(26, 1, 'Rowe', 'Ap #656-9955 Ac Street', '0000-00-00', 13, 555, 112, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa', '2023-10-20', 'Sed nec metus facilisis lorem', 'ultricies sem magna nec quam.', 'nec, leo.'),
(27, 1, 'Elliott', '9082 Placerat. Avenue', '0000-00-00', 12, 295, 656, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper', '2028-09-19', 'tincidunt congue turpis. In condimentum.', 'varius ultrices, mauris ipsum porta', 'turpis. Nulla'),
(28, 1, 'Norris', '935-4892 Id Ave', '0000-00-00', 14, 790, 1186, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '2003-08-20', 'ultrices sit amet, risus. Donec', 'nisi dictum augue malesuada malesuada.', 'Curabitur massa.'),
(29, 1, 'Acevedo', '263 Eros. Av.', '0000-00-00', 31, 762, 1877, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', '2015-05-20', 'in faucibus orci luctus et', 'Nullam vitae diam. Proin dolor.', 'Integer tincidunt'),
(30, 1, 'Cole', '496-479 Nunc Avenue', '0000-00-00', 15, 119, 880, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis', '2026-05-19', 'faucibus id, libero. Donec consectetuer', 'Donec luctus aliquet odio. Etiam', 'imperdiet dictum'),
(31, 1, 'Robinson', 'Ap #841-6722 Nunc Road', '0000-00-00', 37, 583, 146, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede', '2012-01-21', 'non, lobortis quis, pede. Suspendisse', 'ultrices. Duis volutpat nunc sit', 'Aliquam fringilla'),
(32, 1, 'Rojas', 'P.O. Box 987, 8929 Maecenas Ave', '0000-00-00', 31, 301, 586, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor.', '2006-12-20', 'dolor. Fusce mi lorem, vehicula', 'quis lectus. Nullam suscipit, est', 'nonummy ac,'),
(33, 1, 'Francis', 'Ap #138-7820 Vulputate, Road', '0000-00-00', 48, 602, 717, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '2007-01-20', 'Etiam laoreet, libero et tristique', 'nisl. Quisque fringilla euismod enim.', 'eleifend nec,'),
(34, 1, 'Gates', 'P.O. Box 552, 3520 Lacinia. St.', '0000-00-00', 39, 629, 353, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa', '2023-03-21', 'facilisis. Suspendisse commodo tincidunt nibh.', 'vulputate ullamcorper magna. Sed eu', 'massa. Integer'),
(35, 1, 'Frank', 'Ap #701-9078 Nec Rd.', '0000-00-00', 47, 185, 1564, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed,', '2011-08-20', 'quam. Pellentesque habitant morbi tristique', 'lobortis, nisi nibh lacinia orci,', 'in, cursus'),
(36, 1, 'Carter', 'Ap #166-4494 In St.', '0000-00-00', 35, 356, 480, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', '2017-02-20', 'imperdiet, erat nonummy ultricies ornare,', 'eu, ligula. Aenean euismod mauris', 'Fusce aliquet'),
(37, 1, 'Delgado', 'Ap #807-6675 Vitae, Rd.', '0000-00-00', 38, 386, 1948, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et', '2001-04-21', 'non, dapibus rutrum, justo. Praesent', 'amet luctus vulputate, nisi sem', 'mollis. Duis'),
(38, 1, 'Guthrie', '1836 Tellus Avenue', '0000-00-00', 38, 620, 147, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', '2027-01-20', 'nec, diam. Duis mi enim,', 'convallis dolor. Quisque tincidunt pede', 'nonummy. Fusce'),
(39, 1, 'Rosales', 'P.O. Box 806, 7805 Vitae St.', '0000-00-00', 14, 594, 1413, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2015-12-20', 'risus. In mi pede, nonummy', 'gravida non, sollicitudin a, malesuada', 'lectus convallis'),
(40, 1, 'Eaton', 'Ap #222-4350 Nec, Rd.', '0000-00-00', 35, 265, 1975, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '2020-04-20', 'gravida sagittis. Duis gravida. Praesent', 'ante. Maecenas mi felis, adipiscing', 'aliquam adipiscing'),
(41, 1, 'Humphrey', '4079 Ipsum Avenue', '0000-00-00', 37, 884, 846, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a,', '2014-12-20', 'vel, vulputate eu, odio. Phasellus', 'mi enim, condimentum eget, volutpat', 'eu nibh'),
(42, 1, 'Reynolds', '784-1616 Sollicitudin St.', '0000-00-00', 43, 613, 1246, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna.', '2018-12-19', 'ornare, elit elit fermentum risus,', 'ut, molestie in, tempus eu,', 'nunc nulla'),
(43, 1, 'Burke', '8394 Tempor Avenue', '0000-00-00', 35, 294, 1672, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor', '2020-10-20', 'parturient montes, nascetur ridiculus mus.', 'ut, molestie in, tempus eu,', 'Fusce diam'),
(44, 1, 'Cannon', 'P.O. Box 797, 3061 Dui Road', '0000-00-00', 19, 214, 1185, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', '2025-12-20', 'ante dictum cursus. Nunc mauris', 'aliquet nec, imperdiet nec, leo.', 'dolor, nonummy'),
(45, 1, 'Blackwell', '3449 Egestas Road', '0000-00-00', 24, 114, 632, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt', '2017-07-19', 'arcu. Aliquam ultrices iaculis odio.', 'Vivamus sit amet risus. Donec', 'bibendum. Donec'),
(46, 1, 'Hansen', 'Ap #623-1316 Fusce St.', '0000-00-00', 16, 887, 1967, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna.', '2028-01-20', 'orci. Phasellus dapibus quam quis', 'pulvinar arcu et pede. Nunc', 'convallis erat,'),
(47, 1, 'Welch', 'Ap #509-710 Sem. Rd.', '0000-00-00', 45, 748, 764, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac', '2030-08-20', 'sem mollis dui, in sodales', 'volutpat ornare, facilisis eget, ipsum.', 'nulla. Integer'),
(48, 1, 'Gardner', 'Ap #768-7555 Dolor. Rd.', '0000-00-00', 28, 265, 311, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan', '2007-07-20', 'ipsum dolor sit amet, consectetuer', 'enim. Mauris quis turpis vitae', 'laoreet, libero'),
(49, 1, 'Joseph', '175-1899 Fusce Avenue', '0000-00-00', 46, 132, 1315, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a,', '2006-09-19', 'in magna. Phasellus dolor elit,', 'Aliquam rutrum lorem ac risus.', 'at arcu.'),
(50, 1, 'Ward', 'Ap #148-1589 Nullam Ave', '0000-00-00', 18, 576, 1680, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis', '2005-01-20', 'sollicitudin commodo ipsum. Suspendisse non', 'sem. Pellentesque ut ipsum ac', 'purus, in'),
(51, 1, 'Holcomb', 'Ap #165-4192 Tincidunt Street', '0000-00-00', 16, 834, 1218, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt', '2011-11-19', 'lobortis quam a felis ullamcorper', 'conubia nostra, per inceptos hymenaeos.', 'eleifend vitae,'),
(52, 1, 'Miller', 'Ap #573-9712 Lectus Road', '0000-00-00', 25, 653, 1008, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt', '2016-06-20', 'malesuada malesuada. Integer id magna', 'libero mauris, aliquam eu, accumsan', 'neque et'),
(53, 1, 'Le', 'Ap #625-3369 Vulputate, Rd.', '0000-00-00', 28, 509, 1242, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '2012-01-21', 'nonummy ut, molestie in, tempus', 'Curabitur ut odio vel est', 'Donec nibh'),
(54, 1, 'Steele', 'Ap #627-6243 Accumsan Ave', '0000-00-00', 41, 280, 1059, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor', '2014-06-20', 'Nam tempor diam dictum sapien.', 'purus. Maecenas libero est, congue', NULL),
(55, 1, 'Merrill', '463-1686 Mollis. Rd.', '0000-00-00', 21, 636, 776, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', '2011-03-20', 'a neque. Nullam ut nisi', 'fringilla ornare placerat, orci lacus', 'non, egestas'),
(56, 1, 'Leblanc', 'Ap #951-9448 Rhoncus. Av.', '0000-00-00', 17, 291, 123, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', '2014-08-20', 'auctor, velit eget laoreet posuere,', 'dolor. Quisque tincidunt pede ac', 'vel arcu'),
(57, 1, 'Luna', '229-6811 Neque St.', '0000-00-00', 31, 219, 1915, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', '2002-11-20', 'interdum. Nunc sollicitudin commodo ipsum.', 'a, auctor non, feugiat nec,', 'a, enim.'),
(58, 1, 'Fuentes', 'P.O. Box 631, 1007 Placerat Rd.', '0000-00-00', 15, 675, 575, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras', '2011-01-20', 'et magnis dis parturient montes,', 'Donec egestas. Duis ac arcu.', 'dolor. Nulla'),
(59, 1, 'Mitchell', 'P.O. Box 141, 5690 Consequat, Avenue', '0000-00-00', 18, 645, 1453, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer', '2020-05-20', 'Suspendisse eleifend. Cras sed leo.', 'dignissim tempor arcu. Vestibulum ut', 'quis diam.'),
(60, 1, 'Key', '5218 Tellus Rd.', '0000-00-00', 30, 223, 673, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', '2029-11-19', 'elit erat vitae risus. Duis', 'risus, at fringilla purus mauris', 'lorem ipsum'),
(61, 1, 'Molina', '757-6915 Et St.', '0000-00-00', 13, 703, 1288, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2009-02-20', 'luctus et ultrices posuere cubilia', 'dignissim magna a tortor. Nunc', 'molestie arcu.'),
(62, 1, 'Lee', '7612 Et Rd.', '0000-00-00', 12, 180, 325, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam', '2006-03-20', 'turpis vitae purus gravida sagittis.', 'eu eros. Nam consequat dolor', 'Fusce mollis.'),
(63, 1, 'Bray', '230-2493 Augue Av.', '0000-00-00', 10, 376, 71, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat', '2020-10-19', 'vel turpis. Aliquam adipiscing lobortis', 'mi eleifend egestas. Sed pharetra,', 'Nulla facilisi.'),
(64, 1, 'Blankenship', 'P.O. Box 137, 1409 Eleifend Avenue', '0000-00-00', 40, 810, 1316, 'Lorem ipsum dolor', '2016-02-21', 'elit, pharetra ut, pharetra sed,', 'augue malesuada malesuada. Integer id', 'velit. Quisque'),
(65, 1, 'Montoya', 'P.O. Box 462, 6935 Aliquet Rd.', '0000-00-00', 44, 274, 1618, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor.', '2013-09-20', 'nunc sit amet metus. Aliquam', 'tincidunt vehicula risus. Nulla eget', 'ultrices posuere'),
(66, 1, 'Garcia', 'P.O. Box 651, 6043 Faucibus Street', '0000-00-00', 16, 971, 1952, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '2009-04-21', 'adipiscing elit. Etiam laoreet, libero', 'est, vitae sodales nisi magna', 'ligula elit,'),
(67, 1, 'Osborne', 'P.O. Box 216, 3697 Aliquet Road', '0000-00-00', 29, 318, 243, 'Lorem ipsum', '2027-03-20', 'tempus mauris erat eget ipsum.', 'dignissim magna a tortor. Nunc', 'Duis volutpat'),
(68, 1, 'Bauer', 'P.O. Box 157, 971 Non, St.', '0000-00-00', 44, 424, 331, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam.', '2004-11-19', 'consectetuer mauris id sapien. Cras', 'amet, dapibus id, blandit at,', 'molestie orci'),
(69, 1, 'Key', 'Ap #849-2818 Vitae St.', '0000-00-00', 10, 907, 98, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '2023-06-19', 'eu turpis. Nulla aliquet. Proin', 'sem, vitae aliquam eros turpis', 'Aenean gravida'),
(70, 1, 'Burt', '460-633 Mauris St.', '0000-00-00', 27, 960, 791, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', '2004-06-20', 'Integer id magna et ipsum', 'sed leo. Cras vehicula aliquet', 'mi enim,'),
(71, 1, 'Simon', 'P.O. Box 903, 4363 Sed Av.', '0000-00-00', 39, 121, 1844, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam', '2028-04-20', 'non massa non ante bibendum', 'Aliquam ultrices iaculis odio. Nam', 'amet, risus.'),
(72, 1, 'Gonzalez', '844-8656 Nunc Rd.', '0000-00-00', 21, 928, 1545, 'Lorem ipsum dolor', '2003-09-19', 'tellus faucibus leo, in lobortis', 'dolor dapibus gravida. Aliquam tincidunt,', 'eros turpis'),
(73, 1, 'Sparks', '146-5364 Eget, Avenue', '0000-00-00', 32, 587, 1858, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', '2001-12-19', 'et, lacinia vitae, sodales at,', 'dolor. Donec fringilla. Donec feugiat', 'lacus. Ut'),
(74, 1, 'Mclean', 'P.O. Box 512, 4338 Ornare. St.', '0000-00-00', 15, 449, 297, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '2026-11-20', 'mattis semper, dui lectus rutrum', 'libero. Proin sed turpis nec', 'sit amet'),
(75, 1, 'Holden', '263-5175 Egestas Ave', '0000-00-00', 31, 821, 631, 'Lorem', '2004-08-19', 'at, iaculis quis, pede. Praesent', 'sed, est. Nunc laoreet lectus', 'elit. Curabitur'),
(76, 1, 'Langley', 'P.O. Box 610, 9900 Egestas Road', '0000-00-00', 10, 854, 513, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', '2025-06-19', 'sagittis. Nullam vitae diam. Proin', 'volutpat. Nulla dignissim. Maecenas ornare', 'cursus non,'),
(77, 1, 'Pacheco', '6504 Proin Road', '0000-00-00', 50, 385, 996, 'Lorem ipsum dolor sit', '2017-07-19', 'Fusce diam nunc, ullamcorper eu,', 'morbi tristique senectus et netus', 'neque. Sed'),
(78, 1, 'Humphrey', 'Ap #260-3497 A Ave', '0000-00-00', 22, 524, 1566, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,', '2013-12-19', 'Aliquam fringilla cursus purus. Nullam', 'nisi nibh lacinia orci, consectetuer', 'nec ante.'),
(79, 1, 'Mccormick', 'Ap #519-4488 Donec Avenue', '0000-00-00', 23, 346, 1721, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor.', '2003-01-20', 'vulputate dui, nec tempus mauris', 'ornare, facilisis eget, ipsum. Donec', 'eu dolor'),
(80, 1, 'Hill', '358-7485 Fermentum Road', '0000-00-00', 24, 713, 1084, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a,', '2022-02-21', 'quis lectus. Nullam suscipit, est', 'sodales at, velit. Pellentesque ultricies', 'magna. Phasellus'),
(81, 1, 'Barron', 'Ap #476-9798 Ligula Street', '0000-00-00', 28, 248, 1384, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc', '2015-12-20', 'purus gravida sagittis. Duis gravida.', 'arcu. Sed eu nibh vulputate', 'dui, nec'),
(82, 1, 'Fuller', 'Ap #714-1151 Nec Ave', '0000-00-00', 20, 806, 297, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,', '2014-11-20', 'eu, ultrices sit amet, risus.', 'ullamcorper magna. Sed eu eros.', 'non nisi.'),
(83, 1, 'White', 'Ap #672-5852 Eget Rd.', '0000-00-00', 33, 597, 986, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt', '2022-11-20', 'Nullam vitae diam. Proin dolor.', 'amet, consectetuer adipiscing elit. Etiam', 'lacus. Mauris'),
(84, 1, 'Leach', 'P.O. Box 693, 5648 Diam. Ave', '0000-00-00', 11, 111, 1761, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', '2026-05-20', 'Vivamus euismod urna. Nullam lobortis', 'interdum enim non nisi. Aenean', 'vitae, sodales'),
(85, 1, 'Short', '493-1946 Sit Rd.', '0000-00-00', 15, 319, 1184, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis', '2018-02-20', 'lacinia. Sed congue, elit sed', 'convallis est, vitae sodales nisi', 'Duis ac'),
(86, 1, 'Ballard', 'Ap #531-6064 Pede, Av.', '0000-00-00', 25, 536, 1702, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed', '2021-11-19', 'sed, facilisis vitae, orci. Phasellus', 'Fusce mi lorem, vehicula et,', 'dui lectus'),
(87, 1, 'Cross', '9560 Tincidunt. Rd.', '0000-00-00', 33, 763, 1056, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et', '2022-11-20', 'lobortis quam a felis ullamcorper', 'neque. Nullam ut nisi a', 'enim diam'),
(88, 1, 'Carr', 'P.O. Box 898, 3144 Sit Ave', '0000-00-00', 24, 609, 187, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', '2015-12-19', 'fames ac turpis egestas. Fusce', 'faucibus id, libero. Donec consectetuer', 'at risus.'),
(89, 1, 'Fox', '390-9296 Vestibulum Road', '0000-00-00', 40, 214, 1362, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi', '2005-12-19', 'felis. Donec tempor, est ac', 'tristique ac, eleifend vitae, erat.', NULL),
(90, 1, 'Lamb', 'P.O. Box 753, 7095 Sapien St.', '0000-00-00', 26, 193, 541, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam', '2015-05-20', 'quam. Pellentesque habitant morbi tristique', 'augue ut lacus. Nulla tincidunt,', 'cubilia Curae;'),
(91, 1, 'Orr', '8295 Risus. Rd.', '0000-00-00', 22, 600, 279, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', '2015-01-20', 'eleifend egestas. Sed pharetra, felis', 'sit amet nulla. Donec non', 'sed turpis'),
(92, 1, 'Matthews', 'P.O. Box 715, 7560 Et Rd.', '0000-00-00', 35, 524, 1397, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci.', '2028-06-20', 'mollis dui, in sodales elit', 'viverra. Donec tempus, lorem fringilla', 'montes, nascetur'),
(93, 1, 'Floyd', '421-7863 Volutpat Avenue', '0000-00-00', 29, 112, 839, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna.', '2004-01-20', 'laoreet, libero et tristique pellentesque,', 'ullamcorper. Duis at lacus. Quisque', 'quis accumsan'),
(94, 1, 'Galloway', 'Ap #960-4177 Lacus. St.', '0000-00-00', 50, 268, 1970, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '2021-07-20', 'eget magna. Suspendisse tristique neque', 'tempus non, lacinia at, iaculis', 'Mauris ut'),
(95, 1, 'Ewing', 'P.O. Box 851, 4705 Rutrum Avenue', '0000-00-00', 16, 407, 1949, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin', '2007-02-21', 'penatibus et magnis dis parturient', 'et risus. Quisque libero lacus,', 'lacus, varius');
INSERT INTO `TRUCK` (`id`, `id_headquarter`, `name`, `location`, `creation_date`, `litres_of_gasoline`, `empty_weight`, `charge_capacity`, `content`, `guarantee`, `the_certificate_of_sanitary_and_technical_approval`, `registration_document`, `immatriculation`) VALUES
(96, 1, 'Reyes', '2386 Magna St.', '0000-00-00', 23, 590, 80, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna.', '2030-10-19', 'erat vel pede blandit congue.', 'Aliquam adipiscing lobortis risus. In', 'tincidunt dui'),
(97, 1, 'Gilliam', '2014 Tincidunt Avenue', '0000-00-00', 14, 387, 52, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', '2019-02-20', 'nonummy ac, feugiat non, lobortis', 'id, ante. Nunc mauris sapien,', 'ac mattis'),
(98, 1, 'Bates', '197-5515 Quisque Rd.', '0000-00-00', 50, 352, 827, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt', '2025-03-20', 'eget metus eu erat semper', 'nec, imperdiet nec, leo. Morbi', 'a, arcu.'),
(99, 1, 'Moreno', '7207 Sit Road', '0000-00-00', 38, 910, 393, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et', '2003-07-19', 'posuere cubilia Curae; Donec tincidunt.', 'eget nisi dictum augue malesuada', 'erat vel'),
(100, 1, 'Potts', '9644 Scelerisque Rd.', '0000-00-00', 25, 426, 1268, 'Lorem ipsum dolor', '2023-08-20', 'Sed malesuada augue ut lacus.', 'dolor, nonummy ac, feugiat non,', 'cursus a,'),
(101, 1, 'Richard', '819 Lobortis Ave', '0000-00-00', 49, 436, 261, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut', '2003-03-21', 'metus vitae velit egestas lacinia.', 'eu tempor erat neque non', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `TRUCK_MAINTENANCE`
--

DROP TABLE IF EXISTS `TRUCK_MAINTENANCE`;
CREATE TABLE IF NOT EXISTS `TRUCK_MAINTENANCE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_truck` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tva` float DEFAULT NULL,
  `revision_date` date NOT NULL,
  `state_cleaning` smallint(6) NOT NULL,
  `type_of_breakdown` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_truck` (`id_truck`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `WAREHOUSE`
--

DROP TABLE IF EXISTS `WAREHOUSE`;
CREATE TABLE IF NOT EXISTS `WAREHOUSE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `BENEFICIARY`
--
ALTER TABLE `BENEFICIARY`
  ADD CONSTRAINT `beneficiary_ibfk_1` FOREIGN KEY (`id_advantage`) REFERENCES `ADVANTAGE` (`id`),
  ADD CONSTRAINT `beneficiary_ibfk_2` FOREIGN KEY (`id_loyalty_card`) REFERENCES `LOYALTY_CARD` (`id`);

--
-- Contraintes pour la table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD CONSTRAINT `fk_gender_employee` FOREIGN KEY (`gender`) REFERENCES `GENDER` (`id`),
  ADD CONSTRAINT `fk_role_employee` FOREIGN KEY (`role`) REFERENCES `ROLE` (`id`);

--
-- Contraintes pour la table `FRANCHISEE`
--
ALTER TABLE `FRANCHISEE`
  ADD CONSTRAINT `franchisee_ibfk_1` FOREIGN KEY (`id_truck`) REFERENCES `TRUCK` (`id`),
  ADD CONSTRAINT `franchisee_ibfk_2` FOREIGN KEY (`id_headquarter`) REFERENCES `HEADQUARTER` (`id`);

--
-- Contraintes pour la table `INVOICE`
--
ALTER TABLE `INVOICE`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_franchisee`) REFERENCES `FRANCHISEE` (`id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_headquarter`) REFERENCES `HEADQUARTER` (`id`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`id_warehouse`) REFERENCES `WAREHOUSE` (`id`),
  ADD CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`email_customer`) REFERENCES `CUSTOMER` (`email`);

--
-- Contraintes pour la table `LOYALTY_CARD`
--
ALTER TABLE `LOYALTY_CARD`
  ADD CONSTRAINT `loyalty_card_ibfk_1` FOREIGN KEY (`email_customer`) REFERENCES `CUSTOMER` (`email`);

--
-- Contraintes pour la table `MENU_DRINK`
--
ALTER TABLE `MENU_DRINK`
  ADD CONSTRAINT `menu_drink_ibfk_1` FOREIGN KEY (`id_drink`) REFERENCES `DRINK` (`id`),
  ADD CONSTRAINT `menu_drink_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `MENU` (`id`);

--
-- Contraintes pour la table `MENU_MEAL`
--
ALTER TABLE `MENU_MEAL`
  ADD CONSTRAINT `menu_meal_ibfk_1` FOREIGN KEY (`id_meal`) REFERENCES `MEAL` (`id`),
  ADD CONSTRAINT `menu_meal_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `MENU` (`id`);

--
-- Contraintes pour la table `ORDER_DRINK`
--
ALTER TABLE `ORDER_DRINK`
  ADD CONSTRAINT `order_drink_ibfk_1` FOREIGN KEY (`id_drink`) REFERENCES `DRINK` (`id`),
  ADD CONSTRAINT `order_drink_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `INVOICE` (`id`);

--
-- Contraintes pour la table `ORDER_INGREDIENT`
--
ALTER TABLE `ORDER_INGREDIENT`
  ADD CONSTRAINT `order_ingredient_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `INGREDIENT` (`id`),
  ADD CONSTRAINT `order_ingredient_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `INVOICE` (`id`);

--
-- Contraintes pour la table `ORDER_MEAL`
--
ALTER TABLE `ORDER_MEAL`
  ADD CONSTRAINT `order_meal_ibfk_1` FOREIGN KEY (`id_meal`) REFERENCES `MEAL` (`id`),
  ADD CONSTRAINT `order_meal_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `INVOICE` (`id`);

--
-- Contraintes pour la table `ORDER_MENU`
--
ALTER TABLE `ORDER_MENU`
  ADD CONSTRAINT `order_menu_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `INVOICE` (`id`),
  ADD CONSTRAINT `order_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `MENU` (`id`);

--
-- Contraintes pour la table `ORGANIZATION`
--
ALTER TABLE `ORGANIZATION`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`id_event`) REFERENCES `EVENT` (`id`),
  ADD CONSTRAINT `fk_truck` FOREIGN KEY (`id_truck`) REFERENCES `TRUCK` (`id`);

--
-- Contraintes pour la table `PARTICIPATION`
--
ALTER TABLE `PARTICIPATION`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`email_customer`) REFERENCES `CUSTOMER` (`email`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `EVENT` (`id`);

--
-- Contraintes pour la table `STOCK_DRINK`
--
ALTER TABLE `STOCK_DRINK`
  ADD CONSTRAINT `stock_drink_ibfk_1` FOREIGN KEY (`id_drink`) REFERENCES `DRINK` (`id`),
  ADD CONSTRAINT `stock_drink_ibfk_2` FOREIGN KEY (`id_warehouse`) REFERENCES `WAREHOUSE` (`id`);

--
-- Contraintes pour la table `STOCK_INGREDIENT`
--
ALTER TABLE `STOCK_INGREDIENT`
  ADD CONSTRAINT `stock_ingredient_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `INGREDIENT` (`id`),
  ADD CONSTRAINT `stock_ingredient_ibfk_2` FOREIGN KEY (`id_warehouse`) REFERENCES `WAREHOUSE` (`id`);

--
-- Contraintes pour la table `STOCK_MEAL`
--
ALTER TABLE `STOCK_MEAL`
  ADD CONSTRAINT `stock_meal_ibfk_1` FOREIGN KEY (`id_meal`) REFERENCES `MEAL` (`id`),
  ADD CONSTRAINT `stock_meal_ibfk_2` FOREIGN KEY (`id_warehouse`) REFERENCES `WAREHOUSE` (`id`);

--
-- Contraintes pour la table `TRUCK`
--
ALTER TABLE `TRUCK`
  ADD CONSTRAINT `truck_ibfk_1` FOREIGN KEY (`id_headquarter`) REFERENCES `HEADQUARTER` (`id`);

--
-- Contraintes pour la table `TRUCK_MAINTENANCE`
--
ALTER TABLE `TRUCK_MAINTENANCE`
  ADD CONSTRAINT `truck_maintenance_ibfk_1` FOREIGN KEY (`id_truck`) REFERENCES `TRUCK` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
