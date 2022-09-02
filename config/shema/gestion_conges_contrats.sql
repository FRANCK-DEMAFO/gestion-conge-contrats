-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 sep. 2022 à 17:45
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_conges_contrats`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id_leave` int(11) NOT NULL,
  `leave_start_date` date NOT NULL,
  `leave_end_date` date NOT NULL DEFAULT current_timestamp(),
  `leave_duration` int(11) NOT NULL,
  `leave_days` int(11) NOT NULL DEFAULT 30,
  `used_days` int(11) DEFAULT 0,
  `id_employee` int(11) NOT NULL,
  `disable` tinyint(4) DEFAULT 1,
  `statut` varchar(255) NOT NULL DEFAULT 'en conge',
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `annee` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id_leave`, `leave_start_date`, `leave_end_date`, `leave_duration`, `leave_days`, `used_days`, `id_employee`, `disable`, `statut`, `creation_date`, `annee`) VALUES
(4, '2022-08-12', '2022-08-31', 2, 30, 7, 1, 1, 'en conge', '2022-08-17 11:08:29', 2022),
(35, '2022-08-20', '2022-09-11', 1, 30, 5, 2, 1, 'en conge', '2022-08-17 11:08:29', 2022),
(39, '2022-08-13', '2022-08-27', 9, 30, 0, 3, 0, 'en conge', '2022-08-17 11:08:29', 2022),
(40, '2022-08-17', '2022-08-21', 5, 30, 9, 4, 1, 'en conge', '2022-08-17 11:08:29', 2022);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id_contract` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date DEFAULT NULL,
  `statut` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `id_contract_type` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id_contract`, `start_date`, `end_date`, `description`, `creation_date`, `modification_date`, `statut`, `deleted`, `id_contract_type`, `id_employee`) VALUES
(13, '2022-08-02', '2022-08-31', 'love', '2022-08-17', '2022-08-13', 'resilier', 1, 3, 1),
(16, '2022-08-02', '2022-08-04', ' dickson', '2022-08-22', '2022-08-20', 'resilier', 1, 3, 3),
(17, '2022-08-01', '2022-08-09', 'flore', '2022-08-09', '2022-08-12', 'resilier', 1, 2, 3),
(18, '2022-08-03', '2022-08-04', 'djopoejjjjjad', '2022-08-15', '2022-08-19', 'resilier', 1, 3, 3),
(40, '2022-08-18', '0000-00-00', '0', '2022-08-17', '2022-08-17', 'resilier', 1, 1, 2),
(41, '2022-08-18', '0000-00-00', 'love', '2022-08-17', '2022-08-17', 'resilier', 1, 3, 2),
(42, '2022-09-03', '2022-09-01', 'flore', '2022-08-17', '2022-08-17', 'active', 1, 3, 3),
(43, '2022-09-10', '2022-09-11', 'drtuiyh78ldxt5', '2022-08-17', '2022-08-17', 'active', 1, 1, 1),
(44, '2022-08-26', '2022-09-11', 'ghjkjml', '2022-08-17', '2022-08-17', 'active', 1, 2, 1),
(45, '2022-09-03', '2022-09-03', '', '2022-08-17', '2022-08-17', 'active', 1, 2, 4),
(46, '2022-08-11', '0000-00-00', 'love', '2022-08-18', '2022-08-18', 'resilier', 1, 3, 1),
(47, '2022-08-03', '2022-08-20', 'flore', '2022-08-02', '2022-08-18', '', 1, 4, 2),
(48, '2022-09-08', '2022-09-09', 'christ1', '2022-08-18', '2022-08-18', '', 1, 2, 2),
(49, '0000-00-00', '2022-08-27', 'qwertyuiop[', '2022-08-18', '2022-08-18', 'active', 1, 1, 2),
(50, '2022-08-25', '2022-08-30', 'love dickson', '2022-08-18', '2022-08-18', 'active', 1, 1, 1),
(51, '0000-00-00', '2022-08-06', 'jkloip[', '2022-08-19', '2022-08-19', 'active', 0, 2, 1),
(52, '2022-08-04', '2022-08-09', 'jour le monde', '2022-08-19', '2022-08-19', 'active', 0, 1, 2),
(53, '2022-08-04', '2022-09-02', 'flore', '2022-08-19', '2022-08-19', 'active', 1, 1, 1),
(54, '2022-08-24', '2022-08-31', 'adfgxcvb ', '2022-08-22', '2022-08-22', 'active', 0, 1, 3),
(55, '2022-09-02', '2022-09-04', 'qwertyu', '2022-09-01', '2022-09-01', 'active', 0, 23, 4),
(56, '2022-09-02', '2022-09-04', 'qwertyu', '2022-09-01', '2022-09-01', 'active', 1, 23, 4),
(57, '2022-09-03', '2022-09-05', 'qwerthnvcdx', '2022-09-01', '2022-09-01', 'active', 0, 25, 50),
(58, '2022-09-03', '2022-09-05', 'qwerthnvcdx', '2022-09-01', '2022-09-01', 'active', 1, 25, 50),
(59, '2022-09-02', '2022-09-30', 'qwerty', '2022-09-01', '2022-09-01', 'active', 1, 26, 49),
(60, '2022-09-02', '2022-09-04', 'qwerty', '2022-09-01', '2022-09-01', 'active', 1, 25, 49),
(61, '2022-09-02', '2022-09-04', 'qwerty', '2022-09-01', '2022-09-01', 'active', 1, 25, 49),
(62, '2022-09-30', '2022-09-09', 'awdf', '2022-09-01', '2022-09-01', 'active', 0, 23, 5),
(63, '2022-09-30', '2022-09-09', 'awdf', '2022-09-01', '2022-09-01', 'active', 0, 23, 5),
(64, '2022-09-15', '2022-10-06', 'efweetttwtwtedfsdg', '2022-09-01', '2022-09-01', 'active', 0, 26, 49),
(65, '2022-09-15', '2022-10-06', 'efweetttwtwtedfsdg', '2022-09-01', '2022-09-01', 'active', 1, 26, 49),
(66, '2022-09-02', '2022-09-03', 'c&#039;est sorel ', '2022-09-01', '2022-09-01', 'active', 0, 23, 49),
(67, '2022-10-01', '2022-10-08', 'ras', '2022-09-02', '2022-09-02', 'active', 1, 27, 53);

-- --------------------------------------------------------

--
-- Structure de la table `demande_permissions`
--

CREATE TABLE `demande_permissions` (
  `id_request` int(11) NOT NULL,
  `reason` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `depart_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `statut` varchar(32) NOT NULL DEFAULT 'En attente',
  `deleted` tinyint(1) NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande_permissions`
--

INSERT INTO `demande_permissions` (`id_request`, `reason`, `creation_date`, `depart_date`, `ending_date`, `statut`, `deleted`, `id_employee`) VALUES
(1, '                        malade                      ', '2022-08-31 16:08:43', '2022-08-30', '2022-09-07', 'Approuvée', 1, 41),
(2, '                        hospitalisee                      ', '2022-08-30 17:23:14', '2022-08-31', '2022-09-07', 'Approuvée', 1, 4),
(3, 'reuinion', '2022-08-30 10:51:13', '2022-08-30', '2022-08-31', 'En attente', 1, 3),
(4, 'mariage', '2022-08-30 10:51:39', '2022-09-02', '2022-09-05', 'Desapprouvée', 0, 39),
(5, 'urgence familiale', '2022-08-30 17:21:46', '2022-09-01', '2022-09-05', 'Approuvée', 0, 1),
(6, 'victime d&#039;un incident', '2022-08-31 10:31:23', '2022-08-31', '2022-09-02', 'Approuvée', 1, 5),
(7, 'où§m:l;,j n', '2022-08-31 15:24:40', '2022-09-01', '2022-09-02', 'En attente', 1, 40),
(8, '35148564864', '2022-08-31 15:27:26', '2022-08-04', '2022-08-18', 'En attente', 1, 1),
(9, '                   maladie                  ', '2022-08-31 15:42:15', '2022-09-02', '2022-09-12', 'En attente', 1, 4),
(10, '16632163', '2022-08-31 15:29:42', '2022-08-09', '2022-08-25', 'En attente', 1, 3),
(11, '                  hospotilisée                   ', '2022-08-31 15:43:29', '2022-09-05', '2022-09-07', 'En attente', 1, 3),
(12, '158484', '2022-08-31 15:34:18', '2022-07-28', '2022-08-26', 'En attente', 1, 5),
(13, '                       reuinion familiale       ', '2022-08-31 15:49:39', '2022-09-16', '2022-09-19', 'Desapprouvée', 1, 2),
(14, 'zaqwetctfuv', '2022-08-31 15:38:27', '2022-08-30', '2022-08-15', 'En attente', 1, 40),
(15, 'deuil', '2022-08-31 16:07:42', '2022-09-16', '2022-09-20', 'Approuvée', 1, 47),
(16, 'deuil', '2022-09-01 08:52:44', '2022-09-16', '2022-09-19', 'Approuvée', 0, 41),
(17, 'maladie', '2022-09-01 16:19:31', '2022-09-02', '2022-09-03', 'En attente', 1, 45),
(18, 'fuite', '2022-09-01 16:19:31', '2022-09-02', '2022-09-04', 'En attente', 1, 50),
(19, 'mariage', '2022-09-02 15:58:03', '2022-09-02', '2022-09-05', 'Approuvée', 1, 46),
(20, 'maladie', '2022-09-02 17:05:28', '2022-09-02', '2022-09-06', 'Desapprouvée', 1, 41),
(21, 'maladie', '2022-09-02 17:15:08', '2022-08-30', '2022-09-01', 'Approuvée', 0, 41);

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `surname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `age` int(2) NOT NULL,
  `sex` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `marital_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_role` int(11) NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `begin_date` date NOT NULL,
  `desactivate` tinyint(1) NOT NULL DEFAULT 1,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `photo` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id_employee`, `name`, `surname`, `age`, `sex`, `marital_status`, `id_role`, `mail`, `password`, `begin_date`, `desactivate`, `login`, `photo`) VALUES
(1, 'wizz', 'oz', 32, 'Homme', 'celibataire', 1, 'wizz@gmail.com', 'qwerty', '2022-08-17', 0, 'wizz', 'photo.png'),
(2, 'kira', 'yagami', 17, 'homme', 'celibataire', 2, 'kira@gmail.com', 'qwerty', '2022-08-17', 0, 'yagami', 'photo.png'),
(3, 'sorel', 'mck', 24, 'Homme', 'celibataire', 1, 'Sorel@gmail.com', 'ragnarock', '2022-08-17', 0, 'Mck', 'logo2.png'),
(4, 'yvan', 'yvana', 20, 'Femme', 'Marié', 2, 'yvan@gmail.com', 'qwerty', '2022-08-17', 1, 'yvana', 'logo2.png'),
(5, 'ordi', 'rochi', 0, 'femme', 'celibataire', 2, 'ragna@gmail.com', 'qwerty', '0000-00-00', 0, '', ''),
(39, 'yugi', 'yami', 22, 'femme', 'celibataire', 2, 'yami@gmail.com', 'qwerty', '2022-08-16', 1, 'yami', 'photo.png'),
(40, 'lion', 'messi', 42, 'homme', 'celibataire', 2, 'lion@gmial.com', 'lion', '2022-08-17', 0, 'lion', 'photo.png'),
(41, 'toto', 'toro', 12, '1', '1', 2, 'toto@gmail.com', 'qwerty', '2022-08-11', 0, 'toto', 'h.png'),
(43, 'sorel', 'ramses', 25, 'Homme', 'Marié', 2, 'ramses@gmial.com', 'qwerty', '2022-08-18', 1, 'ramses', 'h.png'),
(45, 'sorel', 'sare', 25, 'Homme', '1', 2, 'sore@gmail.com', 'qwerty', '2022-08-17', 1, 'sorel', 'photo.png'),
(46, 'tamo', 'luci', 24, 'Femme', 'Divorcé', 2, 'luci@gmial.com', 'qwerty', '2022-08-18', 1, 'luci', 'h.png'),
(47, 'lamda', 'yura', 36, 'Femme', 'Divorcé', 2, 'yura@gmail.com', 'qwerty', '2022-08-20', 1, 'yura', 'photo.png'),
(48, 'qwert', '234rt', 14, 'Homme', 'Marié', 2, 'qwerty@gmail.com', 'qwerty', '2022-08-20', 1, 'qwerty', 'logo3.png'),
(49, 'qwerty', 'qwerty', 14, 'Homme', 'Marié', 2, 'qwerty@gmail.com', 'qwerty', '2022-08-20', 1, 'qwerty', 'photo.png'),
(50, 'DEMAFO', 'Franck', 20, 'Homme', 'Marié', 1, 'franckdemafo@gmail.com', 'qwerty', '2022-08-23', 1, 'franck', 'qwertyuio.png'),
(51, 'azarus', 'orye', 22, 'Homme', 'Marié', 2, 'orye@gmail.com', 'qwerty', '2022-09-01', 1, 'Ninhory', 'qwertyuio.png'),
(52, 'Mckevin', 'Sorel', 20, 'Homme', 'celibataire', 1, 'Sorel@gmail.com', 'ragnarock', '2022-09-02', 1, 'Mc-k', 'logo2.png'),
(53, 'sorel', 'franck', 23, 'Homme', 'Marié', 2, 'franckdemafo@gmail.com', 'qwerty', '2022-09-02', 1, 'franck', 'logo2.png');

-- --------------------------------------------------------

--
-- Structure de la table `models_contrats`
--

CREATE TABLE `models_contrats` (
  `id_model` int(11) NOT NULL,
  `id_type_contrat` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `model` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 1,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `models_contrats`
--

INSERT INTO `models_contrats` (`id_model`, `id_type_contrat`, `model_name`, `model`, `deleted`, `date_creation`) VALUES
(1, 1, 'model1ss', '<p>il mangeur gere les modèles de contrat 123</p>', 0, '2022-08-19'),
(2, 3, 'model24', '<p>le mangeur gere les modèles de contrat 2</p>', 1, '2022-09-02'),
(3, 3, 'model3', 'le mangeur gere les modèles de contrat 3', 1, '2022-08-04'),
(4, 4, 'model4', 'le mangeur gere les modèles de contrat 4', 1, '2022-08-04'),
(9, 1, 'model25', '<p>model 25</p>', 1, '2022-09-02'),
(10, 1, 'model cdi', '<h1>Article 1</h1>\r\n<p>lorem ipsum</p>\r\n<h1>Article 2</h1>\r\n<p>lorem ipsum</p>\r\n<h1>Article 3</h1>\r\n<p>lorem ipsum</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 0, '2022-08-19'),
(11, 1, 'model 15', '<h2>Article 1</h2>\r\n<p>lorem ipsum</p>\r\n<h3>Article 2</h3>\r\n<p>lorem ipsum</p>\r\n<h4>Article 3</h4>\r\n<p>lorem ipsum</p>', 0, '2022-08-19'),
(12, 1, 'xxxxxxxx', '<p>me voici</p>', 0, '2022-08-19'),
(18, 3, 'gestion-conges-contrat', '<p>awertyui</p>', 0, '2022-09-01'),
(24, 24, 'demafo', '<p>qwertyui</p>', 0, '2022-09-02'),
(29, 1, 'jsdj', '<p>whkqe</p>', 1, '2022-09-02'),
(30, 24, 'jhjk', '<p>jkjjlk</p>', 0, '2022-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `reason` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `creation_date` datetime NOT NULL,
  `depart_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `reason`, `creation_date`, `depart_date`, `ending_date`, `deleted`, `id_employee`) VALUES
(1, 'maladie', '2022-08-02 00:00:00', '2022-08-05', '2022-08-09', 0, 1),
(2, 'mariage', '2022-08-02 10:00:00', '2022-08-10', '2022-08-24', 0, 2),
(3, 'hospitalisée', '2022-08-02 00:00:00', '2022-08-26', '2022-09-05', 0, 3),
(4, 'reuinion urgence', '2022-08-02 00:00:00', '2022-08-22', '2022-08-23', 0, 4),
(13, 'hospitalisée', '2022-08-15 00:00:00', '2022-08-16', '2022-08-29', 1, 2),
(14, 'maladie', '2022-08-05 00:00:00', '2022-08-08', '2022-08-15', 1, 1),
(15, 'maladie', '2022-09-01 16:16:49', '2022-09-06', '2022-09-16', 0, 45),
(16, 'fuite', '2022-09-01 16:16:49', '2022-09-02', '2022-09-03', 0, 50),
(17, 'maladie', '2022-09-01 16:16:49', '2022-09-06', '2022-09-16', 1, 45),
(18, 'fuite', '2022-09-01 16:16:49', '2022-09-02', '2022-09-03', 1, 50);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `Id_role` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`Id_role`, `name`, `description`) VALUES
(1, 'Admin', 'Il a la possibilité de gere la totalité de l\'appli'),
(2, 'employé', 'l’ensemble du personnel de l\'entreprise');

-- --------------------------------------------------------

--
-- Structure de la table `type_contrats`
--

CREATE TABLE `type_contrats` (
  `id_contract_type` int(11) NOT NULL,
  `contract_type_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `creation_date` date NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `suppression` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_contrats`
--

INSERT INTO `type_contrats` (`id_contract_type`, `contract_type_name`, `description`, `creation_date`, `modification_date`, `suppression`) VALUES
(1, 'merveillecontrat255', 'description de merveille contrat 2', '2022-08-10', '2022-08-15 00:00:00', 0),
(2, 'merveillecontrat56', 'description de merveille contrat 10', '2022-08-02', '2022-08-15 00:00:00', 0),
(3, 'merveillecontrat2', 'description de merveille contrat 2', '2022-08-10', '2022-08-15 00:00:00', 0),
(4, 'merveillecontrat 3', 'description de merveille contrat 3', '2020-08-13', '2022-08-27 00:00:00', 0),
(5, 'merveillecontrat255', 'description de merveille contrat 2', '2022-08-10', '2022-08-15 00:00:00', 0),
(6, 'merveillecontrat255', 'description de merveille contrat 2', '2022-08-10', '2022-08-15 00:00:00', 0),
(7, 'merveillecontrat255', 'description de merveille contrat 2', '2022-08-10', '2022-08-15 00:00:00', 0),
(8, 'merveillecontrat 5', 'description de merveille contrat 5', '2022-08-10', '2021-08-15 00:00:00', 1),
(23, 'CDD', 'contrat a durée determinée d\'usage', '2022-08-17', '0000-00-00 00:00:00', 1),
(24, 'CDI', 'contrat a duree indeterminee', '2022-08-19', '0000-00-00 00:00:00', 1),
(25, 'cdi', 'contrat a durée determinée d\'usage', '2022-08-19', '0000-00-00 00:00:00', 1),
(26, 'qwert', 'wertyuioplmnsdyuil,mnvtyukmnbcxcvbnkyfkjl', '0000-00-00', NULL, 0),
(27, 'CDD', 'contrat a duree ', '0000-00-00', '2022-09-02 17:00:04', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id_leave`),
  ADD KEY `id_employe` (`id_employee`) USING BTREE;

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id_contract`),
  ADD KEY `id _typecontrat` (`id_contract_type`),
  ADD KEY `id_employe` (`id_employee`);

--
-- Index pour la table `demande_permissions`
--
ALTER TABLE `demande_permissions`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_employee` (`id_employee`) USING BTREE;

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `FOREIGN KEY` (`id_role`),
  ADD KEY `mail` (`mail`);

--
-- Index pour la table `models_contrats`
--
ALTER TABLE `models_contrats`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `id_type_contrat` (`id_type_contrat`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`),
  ADD KEY `id_employe` (`id_employee`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_role`);

--
-- Index pour la table `type_contrats`
--
ALTER TABLE `type_contrats`
  ADD PRIMARY KEY (`id_contract_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id_leave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id_contract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `demande_permissions`
--
ALTER TABLE `demande_permissions`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `models_contrats`
--
ALTER TABLE `models_contrats`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_contrats`
--
ALTER TABLE `type_contrats`
  MODIFY `id_contract_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande_permissions`
--
ALTER TABLE `demande_permissions`
  ADD CONSTRAINT `fk_to_id_employee` FOREIGN KEY (`id_employee`) REFERENCES `employes` (`id_employee`);

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`Id_role`);

--
-- Contraintes pour la table `models_contrats`
--
ALTER TABLE `models_contrats`
  ADD CONSTRAINT `id_type_contrat_ibfk_1` FOREIGN KEY (`id_type_contrat`) REFERENCES `models_contrats` (`id_model`);

--
-- Contraintes pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employes` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
