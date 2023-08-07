-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2023 at 07:53 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankcomplaints`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `poste` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `agence` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `nom`, `prenom`, `poste`, `email`, `tel`, `password`, `agence`, `profile_pic`) VALUES
(2, 'Foulen', 'Ben Foulen', 'System Administrator', 'admin@STB.tn', '123456789', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'Tunis', 'admin-icn.png');

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `agence_id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `workers_number` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`agence_id`, `name`, `workers_number`, `phone`, `email`, `adress`) VALUES
(1, 'Tunis', '1000', '0021671234567', 'tunis@STB.tn', 'Avenue Habib Bourguiba, Tunis'),
(2, 'Bizerte', '5000', '0021675678901', 'bizerte@STB.tn', 'Rue de la Kasbah, Bizerte'),
(3, 'Ben Arous', '3000', '0021677890123', 'ben-arous@STB.tn', 'Place du Gouvernement, Ben Arous'),
(4, 'Nabeul', '2000', '0021679012345', 'nabeul@STB.tn', 'Avenue Mohamed V, Nabeul'),
(5, 'Sousse', '1500', '0021670123456', 'sousse@STB.tn', 'Rue de l Hopital, Sousse');

-- --------------------------------------------------------

--
-- Table structure for table `bank_settings`
--

DROP TABLE IF EXISTS `bank_settings`;
CREATE TABLE IF NOT EXISTS `bank_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sys_name` longtext NOT NULL,
  `sys_tagline` longtext NOT NULL,
  `sys_logo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_settings`
--

INSERT INTO `bank_settings` (`id`, `sys_name`, `sys_tagline`, `sys_logo`) VALUES
(1, 'STB', 'Bienvenue à la Société Tunisienne de Banque', 'Logo_STB.png');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `national_id` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `client_number` varchar(200) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `Nom`, `Prenom`, `national_id`, `phone`, `address`, `email`, `password`, `profile_pic`, `client_number`) VALUES
(3, 'John', 'Doe', '36756481', '9897890089', '127007 Localhost', 'johndoe@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '', 'STB-CLIENT-8127'),
(4, 'Christine', 'Moore', '478545445812', '7785452210', '445 Bleck Street', 'christine@STB.tn', '55c3b5386c486feb662a0785f340938f518d547f', 'defaultimg.jpg', 'STB-CLIENT-9501'),
(5, 'Harry', 'Den', '100014001000', '7412560000', '114 Allace Avenue', 'harryden@STB.tn', '55c3b5386c486feb662a0785f340938f518d547f', '', 'STB-CLIENT-7014'),
(6, 'Johnnie', 'Reyes', '147455554', '7412545454', '23 Hinkle Deegan Lake Road', 'reyes@STB.tn', 'fe703d258c7ef5f50b71e06565a65aa07194907f', 'user-profile-min.png', 'STB-CLIENT-1698'),
(8, 'Amanda', 'Stiefel', '478000001', '7850000014', '92 Maple Street', 'amanda@STB.tn', '55c3b5386c486feb662a0785f340938f518d547f', 'user-profile-min.png', 'STB-CLIENT-0423'),
(9, 'Lia', 'Moore', '170014695', '7014569696', '46 Timberbrook Lane', 'liamoore@STB.tn', '55c3b5386c486feb662a0785f340938f518d547f', '', 'STB-CLIENT-4716'),
(10, 'benamor', 'bob', '474646', '47544141', 'boîte postale 175, Hammam-Lif', 'benamoraziz0220@gmail.com', '73d4219784f1085813ddd07659ad862557c04abcdffa61', '', 'STB-CLIENT-0672'),
(11, 'ilyliy', 'dfeaea', '4646116', '7154551', 'jyrjyrjyjyr', 'ezghrh@tuktk.geh', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d', '', 'STB-CLIENT-6843'),
(12, 'ilyliy', 'dfeaea', '4646116', '7154551', 'jyrjyrjyjyr', 'ezghrh@tuktk.geh', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d', '', 'STB-CLIENT-3489'),
(13, 'ehjt', 'eghrtr', '15111313', '511515615', 'boîte postale 175, Hammam-Lif', 'admin@STB.tn', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d', '', 'STB-CLIENT-1608'),
(14, 'grfz', 'gzrhzh', '498494', 'gerzh', '4494949848', 'faekfg@gzki.ce', '98b64272dc32a9a213e3bf065bf01661c20a3dee', '', 'iBank-CLIENT-6873'),
(15, 'grfz', 'gzrhzh', '498494', 'gerzh', '4494949848', 'faekfg@gzki.ce', '98b64272dc32a9a213e3bf065bf01661c20a3dee', '', 'iBank-CLIENT-6873'),
(16, 'grfz', 'gzrhzh', '498494', 'gerzh', '4494949848', 'faekfg@gzki.ce', '98b64272dc32a9a213e3bf065bf01661c20a3dee', '', 'iBank-CLIENT-6873'),
(17, 'grfz', 'gzrhzh', '498494', 'gerzh', '4494949848', 'faekfg@gzki.ce', '98b64272dc32a9a213e3bf065bf01661c20a3dee', '', 'iBank-CLIENT-4392'),
(18, 'feazzg', 'gzrhzh', '498494', 'gerzh', '264166', 'fzr@hte', '51feac4095230c71b5b4df996748bec17c9e6769', '', 'STB-CLIENT-3924'),
(19, 'ezrg', '745th', 'jytk411', 'fzgh4984', 'faege41', 'g4rze94@htej', '3dc360378988c21a7b465db2bb98c44abb248b11', '', 'STB-CLIENT-3465'),
(20, 'jtejt', 'kyrk', 'jytk411', 'fzgh4984', '561461', 'faekfg@gzjykki.ce', 'b74cb779ce72ab9bbdc2229d25b8b80be212a1ba', '', 'STB-CLIENT-5926'),
(21, 'jyk', 'yjrk', '498494', 'grz', 'tj', '49r4h@htekhkl', 'bcdb36f8fec5e1680085147fad7d2cad7028ab94', '', 'STB-CLIENT-4820'),
(22, 'jrjky', 'kytk', 'aegeg', 'rhjejte', 'gezgzh', '49r4h@htekhkgr', '71b54b0fe76ef0177520351f3d0fa6b1fe242935', '', 'STB-CLIENT-6570'),
(23, 'feazzg', 'kyrk', '4rg78zeh', 'grz', '47rg4zh', 'fzr@hte.ff', '9128a96faa70bfe0d376f414e378aff3fab61b94', '', 'STB-CLIENT-0478'),
(24, 'grzhy', 'jyk', 'iylmi:i', 'erthgej', 'moùouùyoil', 'kutytl@feg.cd', 'bc7e01234cbb3a48ee33a7a94e89924e45b92dd7', '', 'STB-CLIENT-3674'),
(25, 'grfz', 'gzrhzh', '498494', 'gerzh', '4494949848', 'fegzhr451@gr', '9bab270ebfa19bca6111a555366c15cb91c6568a', '', 'STB-CLIENT-5281'),
(26, 'jtejt', 'grhhe41', 'aegeg', '4he4t9', '47rg4zh', 'fth2156@kfpezgkj', 'bc7e01234cbb3a48ee33a7a94e89924e45b92dd7', '', 'STB-CLIENT-5697'),
(27, 'aziz', 'fj', 'jfgei', 'hezo', 'ughrz', 'aaa@ggg', '3b3690fba8bd08059eae130425396eb05ded1b7d', '', 'STB-CLIENT-0275');

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE IF NOT EXISTS `reclamations` (
  `rec_id` int NOT NULL AUTO_INCREMENT,
  `rec_title` varchar(200) NOT NULL,
  `rec_number` varchar(200) NOT NULL,
  `rec_type` varchar(200) NOT NULL,
  `rec_rating` varchar(10) NOT NULL,
  `rec_status` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_national_id` varchar(200) NOT NULL,
  `client_phone` varchar(200) NOT NULL,
  `client_number` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_adr` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `treated_at` timestamp(6) NULL DEFAULT NULL,
  `send_to_boss` bit(1) DEFAULT b'0',
  `Treat_message` varchar(200) DEFAULT 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.',
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`rec_id`, `rec_title`, `rec_number`, `rec_type`, `rec_rating`, `rec_status`, `Description`, `client_id`, `client_name`, `client_national_id`, `client_phone`, `client_number`, `client_email`, `client_adr`, `created_at`, `treated_at`, `send_to_boss`, `Treat_message`) VALUES
  (1, 'Credit Card Chargeback', '123456', 'Credit', 'High', 'Open', 'I was charged for a purchase that I did not make.', '1234567890', 'John Doe', '1234567890123', '+1 212 555 1212', '123-456-7890', 'john.doe@STB.tn', '123 Main Street, New York, NY 10001', '2023-07-26 15:30:53.591023', '2023-07-26 15:30:53.591023', b'1', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (3, 'Loan Application Declined', '321098', 'Logiciel Informatique', 'Low', 'Closed', 'I was declined for a loan that I applied for.', '1234567890', 'John Smith', '1234567890123', '+1 212 555 3434', '123-456-7890', 'john.smith@STB.tn', '789 Main Street, New York, NY 10003', '2023-07-26 15:30:53.585402', '2023-07-26 15:30:53.585402', b'1', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (22, 'fyjjyr', '64a7036bef46c', 'Logiciel Informatique', 'High', 'Open', 'kryyyyyyyyyyjrrrrrrrrrrr', '13', 'ehjt eghrtr', '15111313', '511515615', 'STB-CLIENT-1608', 'admin@STB.tn', 'boîte postale 175, Hammam-Lif', '2023-07-26 15:30:53.553126', '2023-07-26 15:30:53.553126', b'1', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (23, 'efzgeh', '64a74a6b8a2b3', 'Helpdesk', 'High', 'Open', 'rhgzjrt', '13', 'ehjt eghrtr', '15111313', '511515615', 'STB-CLIENT-1608', 'admin@STB.tn', 'boîte postale 175, Hammam-Lif', '2023-07-27 15:05:07.760547', '2023-07-27 14:02:47.000000', b'1', 'Votre réclamation a été redirigée vers la direction : Helpdesk.'),
  (24, 'dhhhhhhhhb', '64a74dfa1ba9d', 'Contrat Compte', 'hgdf', 'Open', 'jhettjtjjk', '13', 'ehjt eghrtr', '15111313', '511515615', 'STB-CLIENT-1608', 'admin@STB.tn', 'boîte postale 175, Hammam-Lif', '2023-07-27 15:05:45.631775', '2023-07-27 14:05:45.000000', b'1', 'Votre réclamation a été redirigée vers la direction : Contrat Compte.'),
  (25, 'grrhhrj', '64b046226e70e', 'Monétique', 'Low', 'Open', 'etayzh zr etj ertj rj yjrkyk', '10', 'benamor bob', '474646', '47544141', 'STB-CLIENT-0672', 'benamoraziz0220@STB.tn', 'boîte postale 175, Hammam-Lif', '2023-07-26 15:30:53.581155', '2023-07-26 15:30:53.581155', b'0', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (26, 'eaga', '64bf1f30b341d', 'SBE', 'Low', 'Open', 'tjjtgjg', '14', 'grfz gzrhzh', '498494', 'gerzh', 'STB-CLIENT-6873', 'faekfg@STB.tn', '4494949848', '2023-07-27 13:45:01.880963', '2023-07-27 13:45:01.880963', b'0', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (27, 'rhzehj', '64bf1f7e2c782', 'Monétique', 'Low', 'Open', 'ykrkhj', '14', 'grfz gzrhzh', '498494', 'gerzh', 'STB-CLIENT-6873', 'faekfg@STB.tn', '4494949848', '2023-07-27 13:45:01.907459', '2023-07-27 13:45:01.907459', b'0', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (28, 'grfzshz', '64c029d1b762c', 'Operations sur Comptes', 'Medium', 'Open', 'lutk,ujk', '23', 'feazzg kyrk', '4rg78zeh', 'grz', 'STB-CLIENT-0478', 'fzr@hte.ff', '47rg4zh', '2023-07-26 15:30:53.564734', '2023-07-26 15:30:53.564734', b'0', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (29, 'eaga', '64c0f4a014d12', 'Juridique', 'Medium', 'Closed', 'ktultu48974jy', '26', 'jtejt grhhe41', 'aegeg', '4he4t9', 'STB-CLIENT-5697', 'fth2156@kfpezgkj', '47rg4zh', '2023-07-26 15:30:53.570146', '2023-07-27 17:56:01.000000', b'1', 'Votre Reclamation a été rejetée.'),
  (30, 'ggjn', '64c1b84f2862d', 'Operations sur Comptes', 'Low', 'Open', 'geazhrzhrhfb eg gea', '26', 'jtejt grhhe41', 'aegeg', '4he4t9', 'STB-CLIENT-5697', 'fth2156@kfpezgkj', '47rg4zh', '2023-07-27 13:45:01.918391', '2023-07-27 13:45:01.918391', b'0', 'Votre réclamation est en cours de traitement. Nous prendrons contact avec vous dès que possible.'),
  (31, 'grzh', '64c2895b598db', 'Matériel Informatique', 'Medium', 'Open', 'ethj', '27', 'aziz fj', 'jfgei', 'hezo', 'STB-CLIENT-0275', 'aaa@ggg', 'ughrz', '2023-07-27 15:12:27.367457', '2023-07-27 14:25:30.000000', b'0', 'Votre réclamation a été redirigée vers la direction : Matériel Informatique.');


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `agence` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `direction` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `staff_number`, `phone`, `email`, `password`, `agence`, `profile_pic`, `direction`) VALUES
(3, 'feavs', 'STB-STAFF-6785', '07049161', 'staff@STB.tn', 'a9522e54c81a2b6058365dac919d1fa18dd54d9d', 'Tunis', '', 'Juridique'),
(1, 'Mohamed Ali', 'STB-MOHAMED-1234', '0021621234567', 'mohamed.ali@STB.tn', '123456789', 'Tunis', 'profile-mohamed.png', 'SBE'),
(2, 'Salma Ben Jemaa', 'STB-SALMA-5678', '0021625678901', 'salma.ben.jemaa@STB.tn', '987654321', 'Bizerte', 'profile-salma.png', 'Monétique'),
(3, 'feavs', 'STB-AHMED-9012', '07049161', 'staff@STB.tn', 'a9522e54c81a2b6058365dac919d1fa18dd54d9d', 'Tunis', '', 'Juridique'),
(4, 'Amira Boussetta', 'STB-AMINA-3456', '0021629012345', 'amina.boussetta@STB.tn', '654321098', 'Tunis', '', 'Helpdesk'),
(5, 'Yasmine Ben Salem', 'STB-YASMINE-7890', '0021620123456', 'yasmine.ben.salem@STB.tn', '098765432', 'Sousse', 'profile-yasmine.png', 'Credit'),
(3, 'feavs', 'STB-STAFF-6785', '07049161', 'staff@STB.tn', 'a9522e54c81a2b6058365dac919d1fa18dd54d9d', 'Tunis', '', 'Juridique'),
(1, 'Mohamed Ali', 'STB-MOHAMED-1234', '0021621234567', 'mohamed.ali@STB.tn', '123456789', 'Tunis', 'profile-mohamed.png', 'SBE'),
(2, 'Salma Ben Jemaa', 'STB-SALMA-5678', '0021625678901', 'salma.ben.jemaa@STB.tn', '987654321', 'Bizerte', 'profile-salma.png', 'Monétique'),
(3, 'feavs', 'STB-AHMED-9012', '07049161', 'staff@STB.tn', 'a9522e54c81a2b6058365dac919d1fa18dd54d9d', 'Tunis', '', 'Juridique'),
(4, 'Amira Boussetta', 'STB-AMINA-3456', '0021629012345', 'amina.boussetta@STB.tn', '654321098', 'Tunis', '', 'Helpdesk'),
(5, 'Yasmine Ben Salem', 'STB-YASMINE-7890', '0021620123456', 'yasmine.ben.salem@STB.tn', '098765432', 'Sousse', 'profile-yasmine.png', 'Credit'),
(0, 'gdgh', 'STB-STAFF-7029', '0704975742', 'staff@STB.tn', '31eedb9d5fd446c3c5361a811884c09b62ae9448', 'Tunis', '', 'Matériel Informatiqu'),
(0, 'gdgh', 'STB-STAFF-7029', '0704975742', 'staff@STB.tn', '31eedb9d5fd446c3c5361a811884c09b62ae9448', 'Tunis', '', 'Matériel Informatiqu');

-- --------------------------------------------------------

--
-- Table structure for table `types_reclamation`
--

DROP TABLE IF EXISTS `types_reclamation`;
CREATE TABLE IF NOT EXISTS `types_reclamation` (
  `rectype_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `rate` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`rectype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types_reclamation`
--

INSERT INTO `types_reclamation` (`rectype_id`, `name`, `description`, `rate`, `code`) VALUES
(1, 'Credit', 'Reclamations related to credit products', '10%', 'CR'),
(2, 'Reclamations Diverses', 'Reclamations that do not fall into any other category', '15%', 'RD'),
(3, 'Operations sur Comptes', 'Reclamations related to account operations', '20%', 'OC'),
(4, 'Contrat Compte', 'Reclamations related to account contracts', '25%', 'CC'),
(5, 'Monétique', 'Reclamations related to electronic payments', '30%', 'MO'),
(6, 'SBE', 'Reclamations related to the Small Business Exporter (SBE) program', '35%', 'SB'),
(7, 'Logiciel Informatique', 'Reclamations related to the bank s software', '40%', 'LI'),
(8, 'Juridique', 'Reclamations related to legal matters', '45%', 'JU'),
(9, 'Matériel Informatique', 'Reclamations related to the bank s hardware', '50%', 'MI'),
(10, 'Helpdesk', 'Reclamations related to the bank s helpdesk', '55%', 'HD');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
