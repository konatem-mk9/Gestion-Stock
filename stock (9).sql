-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 déc. 2020 à 23:05
-- Version du serveur :  5.7.19
-- Version de PHP :  7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `categorie_parent` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_nom_unique` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `categorie_parent`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(27, 'categorie 1', NULL, NULL, NULL, '2020-09-27 16:45:11', '2020-09-27 16:45:11'),
(28, 'categorie 2', NULL, NULL, NULL, '2020-09-27 16:45:23', '2020-09-27 16:45:23'),
(29, 'sous categorie 1', 'categorie 1', 27, NULL, '2020-09-27 16:45:44', '2020-09-27 16:45:46'),
(30, 'sous categorie 2', 'categorie 1', 27, NULL, '2020-09-27 16:45:58', '2020-09-27 16:46:03');

-- --------------------------------------------------------

--
-- Structure de la table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code_client` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `téléphone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uidx_ccode` (`code_client`),
  KEY `clients_type_id_foreign` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `code_client`, `nom`, `téléphone`, `email`, `type`, `type_id`, `adresse`, `pays`, `ville`, `created_at`, `updated_at`) VALUES
(1, 'fgkl', 'abdel', '224545847', 'client@gmail.com', 'régulier', 1, 'Rue 123d', NULL, 'knc', '2020-10-24 19:28:29', '2020-10-24 19:28:29'),
(2, 'slfs', 'Client', '002242525625', 'Gdhgd@gmail.com', 'irrégulier', 2, NULL, NULL, NULL, '2020-10-24 20:28:13', '2020-10-24 20:28:13'),
(3, 'dmflm', 'test', '54646', 'd@gmail.com', 'irrégulier', 2, NULL, NULL, NULL, '2020-11-05 20:23:22', '2020-11-05 20:23:22'),
(4, 'ddmdpr7', 'badou', '6666', 'client2@gmail.com', 'irrégulier', 2, 'rppr', NULL, 'gn', '2020-12-02 21:37:44', '2020-12-02 21:38:31'),
(5, 'first code', 'hg', '3353232', 'abdel@gmlok', 'régulier', 1, 'h', 'hf', 'hf', '2020-12-03 16:04:03', '2020-12-03 16:04:03'),
(6, 'test12', 'ahmed', '5666', 'client@gmail.com', 'régulier', 1, 'ffgd', 'ggd', 'mmm', '2020-12-03 19:30:02', '2020-12-03 19:30:21');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

DROP TABLE IF EXISTS `comptes`;
CREATE TABLE IF NOT EXISTS `comptes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulaire` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banque` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_compte` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `titulaire`, `banque`, `numero_compte`, `created_at`, `updated_at`) VALUES
(1, 'Ets', 'Bank', '74747478574', '2020-10-31 20:45:20', '2020-10-31 20:45:20'),
(2, 'ujd', 'Bank Iuj', '45632332', '2020-10-31 20:50:50', '2020-10-31 20:50:50');

-- --------------------------------------------------------

--
-- Structure de la table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '{}', 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(29, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 17),
(30, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 18),
(31, 5, 'id', 'hidden', 'Id', 1, 1, 1, 1, 1, 0, '{}', 1),
(33, 5, 'slug', 'text', 'Slug', 0, 0, 0, 0, 0, 0, '{}', 3),
(34, 5, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(35, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(75, 4, 'en_stock', 'checkbox', 'En Stock', 1, 1, 1, 1, 1, 1, '{\"on\":\"Oui\",\"off\":\"Non\"}', 16),
(77, 5, 'nom', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 2),
(78, 5, 'parent_id', 'text', 'Parent Id', 0, 0, 0, 0, 0, 0, '{}', 3),
(79, 5, 'categorie_parent', 'text', 'Categorie Parent', 0, 1, 1, 0, 0, 1, '{}', 3),
(82, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(83, 9, 'nom', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 3),
(85, 9, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 5),
(86, 9, 'type', 'text', 'Type', 0, 1, 1, 0, 0, 1, '{}', 6),
(87, 9, 'type_id', 'text', 'Type Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(88, 9, 'adresse', 'text', 'Adresse', 0, 1, 1, 1, 1, 1, '{}', 7),
(89, 9, 'pays', 'text', 'Pays', 0, 1, 1, 1, 1, 1, '{}', 8),
(90, 9, 'ville', 'text', 'Ville', 0, 1, 1, 1, 1, 1, '{}', 9),
(91, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 10),
(92, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(93, 9, 'téléphone', 'text', 'Téléphone', 0, 1, 1, 1, 1, 1, '{}', 4),
(94, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(95, 10, 'dénomination', 'text', 'Dénomination', 1, 1, 1, 1, 1, 1, '{}', 2),
(97, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(98, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(99, 4, 'code', 'text', 'Code', 0, 1, 1, 1, 1, 1, '{}', 4),
(100, 4, 'libellé', 'text', 'Libellé', 0, 1, 1, 1, 1, 1, '{}', 6),
(101, 4, 'quantité', 'number', 'Quantité', 0, 1, 1, 1, 1, 1, '{}', 7),
(102, 4, 'categorie', 'text', 'Categorie', 0, 1, 1, 0, 0, 0, '{}', 8),
(103, 4, 'categorie_id', 'text', 'Categorie Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(104, 4, 'fournisseur', 'text', 'Fournisseur', 0, 1, 1, 0, 0, 0, '{}', 9),
(105, 4, 'fournisseur_id', 'text', 'Fournisseur Id', 0, 0, 0, 0, 0, 0, '{}', 3),
(106, 4, 'prix_ht_achat', 'text', 'Prix Ht Achat', 0, 0, 0, 1, 1, 1, '{}', 10),
(107, 4, 'prix_ht_vente', 'text', 'Prix Ht Vente', 0, 1, 1, 1, 1, 1, '{}', 11),
(109, 4, 'prix_ttc_achat', 'text', 'Prix Ttc Achat', 0, 0, 0, 0, 0, 0, '{}', 13),
(110, 4, 'prix_ttc_vente', 'text', 'Prix Ttc Vente', 0, 1, 1, 0, 0, 0, '{}', 14),
(111, 4, 'date_achat', 'text', 'Date Achat', 0, 1, 1, 0, 0, 0, '{}', 15),
(113, 10, 'tva', 'checkbox', 'Tva', 1, 1, 1, 1, 1, 1, '{\"on\":\"Oui\",\"off\":\"Non\"}', 3),
(114, 4, 'tva_18', 'text', 'Tva 18', 0, 1, 1, 0, 0, 0, '{}', 12),
(115, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(116, 11, 'product_id', 'text', 'Product Id', 1, 0, 0, 0, 0, 0, '{}', 2),
(117, 11, 'code', 'text', 'Code', 1, 1, 1, 0, 0, 0, '{}', 3),
(118, 11, 'libellé', 'text', 'Libellé', 0, 1, 1, 0, 0, 0, '{}', 4),
(119, 11, 'stock_initial', 'text', 'Stock Initial', 1, 1, 1, 0, 0, 0, '{}', 5),
(120, 11, 'quantité', 'text', 'Quantité', 0, 1, 1, 0, 0, 0, '{}', 6),
(121, 11, 'stock', 'text', 'Stock', 0, 1, 1, 0, 0, 0, '{}', 7),
(122, 11, 'sortie', 'text', 'Sortie', 0, 1, 1, 0, 0, 0, '{}', 8),
(123, 11, 'difference', 'text', 'Difference', 0, 1, 1, 0, 0, 0, '{}', 9),
(124, 11, 'seuil', 'text', 'Seuil', 1, 1, 1, 1, 1, 1, '{}', 10),
(127, 11, 'profit', 'text', 'Profit', 0, 1, 1, 0, 0, 0, '{}', 13),
(128, 11, 'status', 'checkbox', 'Status', 1, 1, 1, 0, 0, 0, '{\"on\":\"Disponible\",\"off\":\"Non disponible\"}', 14),
(129, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 15),
(130, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 16),
(131, 11, 'prix_ht_achat', 'text', 'Prix Ht Achat', 0, 1, 1, 0, 0, 0, '{}', 11),
(132, 11, 'prix_ht_vente', 'text', 'Prix Ht Vente', 0, 1, 1, 0, 0, 0, '{}', 12),
(133, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(134, 12, 'nom', 'text', 'Nom', 0, 1, 1, 1, 1, 1, '{}', 4),
(135, 12, 'téléphone', 'text', 'Téléphone', 0, 1, 1, 1, 1, 1, '{}', 5),
(136, 12, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 6),
(137, 12, 'type', 'text', 'Type', 0, 1, 1, 0, 0, 0, '{}', 7),
(138, 12, 'type_id', 'text', 'Type Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(139, 12, 'adresse', 'text', 'Adresse', 0, 1, 1, 1, 1, 1, '{}', 8),
(140, 12, 'pays', 'text', 'Pays', 0, 1, 1, 1, 1, 1, '{}', 9),
(141, 12, 'ville', 'text', 'Ville', 0, 1, 1, 1, 1, 1, '{}', 10),
(142, 12, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 11),
(143, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(144, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(145, 15, 'user_id', 'text', 'User Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(146, 15, 'initiateur', 'text', 'Initiateur', 0, 1, 1, 0, 0, 0, '{}', 4),
(147, 15, 'client_id', 'text', 'Client Id', 0, 0, 0, 0, 0, 0, '{}', 3),
(148, 15, 'nom_client', 'text', 'Nom Client', 0, 1, 1, 0, 0, 0, '{}', 5),
(149, 15, 'téléphone', 'text', 'Téléphone', 0, 1, 1, 0, 0, 0, '{}', 6),
(150, 15, 'quantité', 'text', 'Quantité', 1, 1, 1, 0, 0, 0, '{}', 7),
(151, 15, 'total', 'text', 'Total', 1, 1, 1, 0, 0, 0, '{}', 8),
(152, 15, 'payé', 'text', 'Payé', 0, 1, 1, 1, 0, 0, '{}', 9),
(153, 15, 'restant', 'text', 'Restant', 1, 1, 1, 0, 0, 0, '{}', 10),
(154, 15, 'délivré', 'checkbox', 'Délivré', 1, 1, 1, 1, 0, 0, '{\"on\":\"Oui\",\"off\":\"Non\"}', 14),
(155, 15, 'error', 'text', 'Error', 0, 0, 0, 0, 0, 0, '{}', 15),
(156, 15, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 16),
(157, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 17),
(158, 20, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(159, 20, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(160, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(161, 15, 'date_vente', 'text', 'Date Vente', 0, 1, 1, 0, 0, 0, '{}', 11),
(162, 21, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(163, 21, 'client_id', 'text', 'Client Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(164, 21, 'nom_client', 'text', 'Nom Client', 0, 1, 1, 0, 0, 1, '{}', 5),
(165, 21, 'code_produit', 'text', 'Code Produit', 0, 1, 1, 0, 0, 1, '{}', 6),
(166, 21, 'libellé', 'text', 'Libellé', 0, 1, 1, 0, 0, 1, '{}', 7),
(167, 21, 'vente_id', 'text', 'Vente Id', 0, 0, 0, 0, 0, 0, '{}', 3),
(168, 21, 'product_id', 'text', 'Product Id', 0, 0, 0, 0, 0, 0, '{}', 4),
(169, 21, 'quantité', 'text', 'Quantité', 1, 1, 1, 0, 1, 1, '{}', 9),
(170, 21, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 10),
(171, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(172, 21, 'prix', 'text', 'Prix', 0, 1, 1, 0, 0, 1, '{}', 8),
(173, 21, 'total', 'text', 'Total', 0, 1, 1, 0, 0, 1, '{}', 12),
(174, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(175, 22, 'titulaire', 'text', 'Titulaire', 0, 1, 1, 1, 1, 1, '{}', 2),
(176, 22, 'banque', 'text', 'Banque', 0, 1, 1, 1, 1, 1, '{}', 3),
(177, 22, 'numero_compte', 'text', 'Numero Compte', 0, 1, 1, 1, 1, 1, '{}', 4),
(178, 22, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(179, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(180, 15, 'paiement', 'text', 'Paiement', 0, 1, 1, 0, 0, 0, '{}', 12),
(181, 15, 'compte', 'text', 'Compte', 0, 1, 1, 0, 0, 0, '{}', 13),
(182, 4, 'référence', 'text', 'Référence', 1, 1, 1, 1, 1, 1, '{}', 5),
(183, 4, 'rupture', 'text', 'Rupture', 0, 0, 0, 0, 0, 0, '{}', 19),
(184, 12, 'code_client', 'text', 'Code Client', 1, 1, 1, 1, 1, 1, '{}', 3),
(185, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(186, 23, 'product_id', 'text', 'Product Id', 1, 0, 0, 0, 0, 0, '{}', 2),
(187, 23, 'code', 'text', 'Code', 1, 1, 1, 0, 0, 1, '{}', 3),
(188, 23, 'quantité', 'number', 'Quantité', 0, 1, 1, 0, 0, 1, '{}', 5),
(189, 23, 'référence', 'text', 'Référence', 1, 1, 1, 0, 0, 1, '{}', 4),
(190, 23, 'transport', 'text', 'Transport', 0, 1, 1, 0, 0, 1, '{}', 6),
(191, 23, 'frais_t', 'text', 'Frais T', 0, 1, 1, 0, 0, 1, '{}', 7),
(192, 23, 'paiement', 'text', 'Paiement', 0, 1, 1, 0, 0, 1, '{}', 8),
(193, 23, 'frais_p', 'text', 'Frais P', 0, 1, 1, 0, 0, 1, '{}', 9),
(194, 23, 'frais_totaux', 'text', 'Frais Totaux', 0, 1, 1, 0, 0, 1, '{}', 10),
(195, 23, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 11),
(196, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12);

-- --------------------------------------------------------

--
-- Structure de la table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-04-15 22:23:52', '2020-04-15 22:23:52'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-04-15 22:23:53', '2020-04-15 22:23:53'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '\\App\\Http\\Controllers\\Voyager\\RoleController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-04-15 22:23:53', '2020-11-12 14:47:04'),
(4, 'products', 'products', 'Product', 'Products', 'voyager-bag', 'App\\Product', NULL, '\\App\\Http\\Controllers\\Voyager\\ProductsController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-16 07:32:22', '2020-12-03 16:09:29'),
(5, 'category', 'category', 'Category', 'Categories', 'voyager-categories', 'App\\Category', NULL, '\\App\\Http\\Controllers\\Voyager\\CategoryController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-16 07:56:13', '2020-09-27 16:31:41'),
(9, 'fournisseurs', 'fournisseurs', 'Fournisseur', 'Fournisseurs', NULL, 'App\\Fournisseur', NULL, '\\App\\Http\\Controllers\\Voyager\\FournisseursController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-09-30 21:42:59', '2020-10-01 17:52:55'),
(10, 'types', 'types', 'Type', 'Types', NULL, 'App\\Type', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-01 18:39:20', '2020-10-01 21:57:56'),
(11, 'stocks', 'stocks', 'Stock', 'Stocks', NULL, 'App\\Stock', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-04 16:04:41', '2020-10-22 11:05:39'),
(12, 'clients', 'clients', 'Client', 'Clients', NULL, 'App\\Client', NULL, '\\App\\Http\\Controllers\\Voyager\\ClientsController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-05 19:58:16', '2020-12-02 21:39:08'),
(15, 'ventes', 'ventes', 'Suivi', 'Suivis', NULL, 'App\\Vente', NULL, '\\App\\Http\\Controllers\\Voyager\\VentesController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-18 20:12:35', '2020-11-09 20:07:18'),
(20, 'nouvelles_ventes', 'nouvelles-ventes', 'Nouvelles Vente', 'Nouvelles Ventes', NULL, 'App\\NouvellesVente', NULL, '\\App\\Http\\Controllers\\Voyager\\NouvellesVentesController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-18 20:51:39', '2020-10-18 20:51:39'),
(21, 'vente_produits', 'vente-produits', 'Vente Produit', 'Vente Produits', NULL, 'App\\VenteProduit', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-21 16:14:48', '2020-10-23 12:48:28'),
(22, 'comptes', 'comptes', 'Compte', 'Comptes', NULL, 'App\\Compte', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-10-31 20:39:53', '2020-10-31 20:39:53'),
(23, 'depenses', 'depenses', 'Depense', 'Depenses', NULL, 'App\\Depense', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-12-02 15:33:02', '2020-12-02 15:41:18');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `quantité` int(11) DEFAULT NULL,
  `référence` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `transport` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frais_t` bigint(20) DEFAULT NULL,
  `paiement` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frais_p` bigint(20) DEFAULT NULL,
  `frais_totaux` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `depenses_code_unique` (`code`),
  KEY `depenses_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `product_id`, `code`, `quantité`, `référence`, `transport`, `frais_t`, `paiement`, `frais_p`, `frais_totaux`, `created_at`, `updated_at`) VALUES
(11, 13, '8710163075389', 3, 'ggjyi', 'ROUTIER', 10, 'TRANSFERT', 20, 30, '2020-12-03 19:22:43', '2020-12-03 19:22:43'),
(12, 14, '841204250238196', 6, 'm', 'MARITIME', 3, 'VIREMENT', 5, 8, '2020-12-03 21:02:35', '2020-12-03 21:02:35'),
(13, 15, '871016307538963', 3, '!mll', 'MARITIME', 3, 'VIREMENT', 5, 8, '2020-12-03 21:38:18', '2020-12-03 21:38:18'),
(14, 16, '8412042504', 15, 'klbkb', 'DHL', 15, 'VIREMENT', 36, 51, '2020-12-03 22:05:33', '2020-12-03 22:05:33'),
(15, 17, 'fggggg', 6, 'gggggggggggg', 'AERIEN', 20, 'VIREMENT', 36, 56, '2020-12-03 22:06:59', '2020-12-03 22:06:59'),
(16, 18, 'r9cch99', 10, 'mmmmmmmmmmm', 'MARITIME', 10, 'VIREMENT', 3, 13, '2020-12-03 22:10:39', '2020-12-03 22:10:39'),
(17, 19, '87101630754', 5, 'memr rksr', 'DHL', 11, 'TRANSFERT', 3, 14, '2020-12-03 22:14:31', '2020-12-03 22:14:31'),
(18, 20, '8710174', 6, 'mmdfl', 'DHL', 22, NULL, 11, 33, '2020-12-03 22:18:56', '2020-12-03 22:18:56'),
(19, 21, '87101585', 3, 'fff ddfdff', 'DHL', 11, 'VIREMENT', 14, 25, '2020-12-03 22:22:38', '2020-12-03 22:22:38'),
(20, 22, '87101630753897', 4, 'gg', 'DHL', 2, 'VIREMENT', 22, 24, '2020-12-03 23:00:28', '2020-12-03 23:00:28');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `téléphone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `téléphone`, `email`, `type_id`, `adresse`, `pays`, `ville`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Kamab', '625046295', 'fournisseur@gmail.com', 1, 'conakry C/Ratoma', 'guinée', 'Coankry', 'régulier', '2020-10-27 20:54:01', '2020-10-27 20:54:54'),
(2, 'pmlk', '698585', 'test@gmail.com', 2, 'fkkfkfkli kf klf', 'maljd', 'ff', 'irrégulier', '2020-12-03 22:03:19', '2020-12-03 22:03:22');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-04-15 22:25:31', '2020-04-15 22:25:31'),
(2, 'main', '2020-04-16 08:25:09', '2020-04-16 08:25:09'),
(3, 'footer', '2020-04-16 09:18:25', '2020-04-16 09:18:25');

-- --------------------------------------------------------

--
-- Structure de la table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-04-15 22:26:11', '2020-04-15 22:26:11', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 13, '2020-04-15 22:26:11', '2020-12-02 15:35:49', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 15, '2020-04-15 22:26:12', '2020-12-02 15:36:02', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 14, '2020-04-15 22:26:16', '2020-12-02 15:35:55', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 16, '2020-04-15 22:26:16', '2020-12-02 15:36:05', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2020-04-15 22:26:17', '2020-04-16 07:40:45', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2020-04-15 22:26:18', '2020-04-16 07:40:46', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2020-04-15 22:26:19', '2020-04-16 07:40:46', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2020-04-15 22:26:19', '2020-04-16 07:40:47', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 17, '2020-04-15 22:26:20', '2020-12-02 15:36:12', 'voyager.settings.index', NULL),
(11, 1, 'Products', '', '_self', 'voyager-bag', NULL, NULL, 10, '2020-04-16 07:32:36', '2020-12-02 15:36:22', 'voyager.products.index', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 11, '2020-04-16 07:56:35', '2020-12-02 15:36:29', 'voyager.category.index', NULL),
(14, 2, 'Catalogue', '', '_self', NULL, '#000000', NULL, 10, '2020-04-16 08:26:56', '2020-04-16 08:26:56', 'shop.index', NULL),
(15, 2, 'About', '#', '_self', NULL, '#000000', NULL, 11, '2020-04-16 08:27:56', '2020-04-16 08:27:56', NULL, ''),
(18, 3, 'fa-instagram', 'https://www.instagram.com/abdel_benyouss/', '_self', NULL, '#000000', NULL, 2, '2020-04-16 09:24:19', '2020-04-16 09:39:32', NULL, ''),
(19, 3, 'Follow Me:', '', '_self', NULL, '#000000', NULL, 1, '2020-04-16 09:38:31', '2020-04-16 09:39:31', NULL, ''),
(22, 1, 'Fournisseurs', '', '_self', 'voyager-truck', '#000000', NULL, 8, '2020-09-30 21:43:12', '2020-12-02 15:36:14', 'voyager.fournisseurs.index', 'null'),
(23, 1, 'Types', '', '_self', 'voyager-settings', '#000000', NULL, 7, '2020-10-01 18:39:57', '2020-12-02 15:36:12', 'voyager.types.index', 'null'),
(24, 1, 'Stocks', '', '_self', 'voyager-archive', '#000000', NULL, 12, '2020-10-04 16:04:55', '2020-12-02 15:35:47', 'voyager.stocks.index', 'null'),
(25, 1, 'Clients', '', '_self', 'voyager-group', '#000000', NULL, 9, '2020-10-05 19:58:26', '2020-12-02 15:36:19', 'voyager.clients.index', 'null'),
(26, 1, 'Suivis', '', '_self', 'voyager-list', '#000000', NULL, 5, '2020-10-18 20:12:58', '2020-12-02 15:36:00', 'voyager.ventes.index', 'null'),
(30, 1, 'Nouvelles Ventes', '', '_self', 'voyager-basket', '#000000', NULL, 4, '2020-10-18 20:51:42', '2020-12-02 15:35:55', 'voyager.nouvelles-ventes.index', 'null'),
(31, 1, 'Vente Produits', '', '_self', 'voyager-receipt', '#000000', NULL, 6, '2020-10-21 16:14:51', '2020-12-02 15:36:05', 'voyager.vente-produits.index', 'null'),
(32, 1, 'Comptes', '', '_self', 'voyager-credit-cards', '#000000', NULL, 2, '2020-10-31 20:40:02', '2020-10-31 20:42:26', 'voyager.comptes.index', 'null'),
(33, 1, 'Depenses', '', '_self', 'voyager-warning', '#000000', NULL, 3, '2020-12-02 15:33:09', '2020-12-02 15:39:36', 'voyager.depenses.index', 'null');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100001_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000001_create_failed_jobs_table', 1),
(24, '2020_04_09_133528_create_products_table', 1),
(25, '2020_04_15_145129_create_categories_table', 1),
(26, '2020_04_16_095426_add_image_to_products_table', 2),
(28, '2020_04_16_112942_add_images_to_products_table', 3),
(29, '2020_04_16_112943_add_images_to_products_table', 4),
(30, '2020_04_16_180617_create_orders_table', 5),
(31, '2020_04_15_145131_create_categories_table', 6),
(32, '2020_04_15_145132_create_categories_table', 7),
(33, '2020_09_30_184759_create_types_table', 8),
(34, '2020_10_15_000553_create_commandes_table', 9),
(35, '2020_10_16_122126_create_commande_produit_table', 10),
(36, '2020_10_16_122130_create_commande_produit_table', 11),
(37, '2020_10_16_122131_create_commande_produit_table', 12),
(38, '2020_10_18_192019_create_ventes_table', 13),
(39, '2020_10_18_194522_create_vente_produits_table', 14),
(40, '2020_10_18_204642_create_nouvelles_ventes_table', 15),
(41, '2020_10_31_200801_create_comptes_table', 16);

-- --------------------------------------------------------

--
-- Structure de la table `nouvelles_ventes`
--

DROP TABLE IF EXISTS `nouvelles_ventes`;
CREATE TABLE IF NOT EXISTS `nouvelles_ventes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantité` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantité`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '2020-09-25 00:43:04', '2020-09-25 00:43:04'),
(2, 5, 1, 1, '2020-09-25 00:45:30', '2020-09-25 00:45:30'),
(3, 1, 1, 1, '2020-09-25 00:57:32', '2020-09-25 00:57:32'),
(4, 1, 2, 1, '2020-09-25 00:57:33', '2020-09-25 00:57:33'),
(5, 2, 1, 1, '2020-09-25 01:01:09', '2020-09-25 01:01:09'),
(6, 3, 1, 1, '2020-09-25 01:06:42', '2020-09-25 01:06:42'),
(7, 4, 2, 1, '2020-09-25 01:14:08', '2020-09-25 01:14:08'),
(8, 4, 4, 1, '2020-09-25 01:14:09', '2020-09-25 01:14:09'),
(9, 5, 2, 1, '2020-09-25 01:14:46', '2020-09-25 01:14:46'),
(10, 5, 4, 1, '2020-09-25 01:14:47', '2020-09-25 01:14:47'),
(11, 6, 2, 1, '2020-09-25 01:15:10', '2020-09-25 01:15:10'),
(12, 6, 4, 1, '2020-09-25 01:15:11', '2020-09-25 01:15:11'),
(13, 7, 2, 1, '2020-09-25 01:15:41', '2020-09-25 01:15:41'),
(14, 7, 4, 1, '2020-09-25 01:15:41', '2020-09-25 01:15:41'),
(15, 8, 1, 1, '2020-09-25 01:19:52', '2020-09-25 01:19:52'),
(16, 9, 2, 1, '2020-09-25 01:20:54', '2020-09-25 01:20:54'),
(17, 10, 2, 1, '2020-09-25 01:22:30', '2020-09-25 01:22:30');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@user.com', '$2y$10$4vm.xDn207PlN355cTSYuulUVFo1wQEIfYxYPyWLxEvKBiUAvZz1u', '2020-04-17 13:17:39');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-04-15 22:27:28', '2020-04-15 22:27:28'),
(2, 'browse_bread', NULL, '2020-04-15 22:27:30', '2020-04-15 22:27:30'),
(3, 'browse_database', NULL, '2020-04-15 22:27:31', '2020-04-15 22:27:31'),
(4, 'browse_media', NULL, '2020-04-15 22:27:32', '2020-04-15 22:27:32'),
(5, 'browse_compass', NULL, '2020-04-15 22:27:33', '2020-04-15 22:27:33'),
(6, 'browse_menus', 'menus', '2020-04-15 22:27:35', '2020-04-15 22:27:35'),
(7, 'read_menus', 'menus', '2020-04-15 22:27:36', '2020-04-15 22:27:36'),
(8, 'edit_menus', 'menus', '2020-04-15 22:27:36', '2020-04-15 22:27:36'),
(9, 'add_menus', 'menus', '2020-04-15 22:27:39', '2020-04-15 22:27:39'),
(10, 'delete_menus', 'menus', '2020-04-15 22:27:40', '2020-04-15 22:27:40'),
(11, 'browse_roles', 'roles', '2020-04-15 22:27:41', '2020-04-15 22:27:41'),
(12, 'read_roles', 'roles', '2020-04-15 22:27:41', '2020-04-15 22:27:41'),
(13, 'edit_roles', 'roles', '2020-04-15 22:27:41', '2020-04-15 22:27:41'),
(14, 'add_roles', 'roles', '2020-04-15 22:27:41', '2020-04-15 22:27:41'),
(15, 'delete_roles', 'roles', '2020-04-15 22:27:41', '2020-04-15 22:27:41'),
(16, 'browse_users', 'users', '2020-04-15 22:27:43', '2020-04-15 22:27:43'),
(17, 'read_users', 'users', '2020-04-15 22:27:44', '2020-04-15 22:27:44'),
(18, 'edit_users', 'users', '2020-04-15 22:27:45', '2020-04-15 22:27:45'),
(19, 'add_users', 'users', '2020-04-15 22:27:47', '2020-04-15 22:27:47'),
(20, 'delete_users', 'users', '2020-04-15 22:27:49', '2020-04-15 22:27:49'),
(21, 'browse_settings', 'settings', '2020-04-15 22:27:51', '2020-04-15 22:27:51'),
(22, 'read_settings', 'settings', '2020-04-15 22:27:52', '2020-04-15 22:27:52'),
(23, 'edit_settings', 'settings', '2020-04-15 22:27:53', '2020-04-15 22:27:53'),
(24, 'add_settings', 'settings', '2020-04-15 22:27:53', '2020-04-15 22:27:53'),
(25, 'delete_settings', 'settings', '2020-04-15 22:27:53', '2020-04-15 22:27:53'),
(26, 'browse_products', 'products', '2020-04-16 07:32:33', '2020-04-16 07:32:33'),
(27, 'read_products', 'products', '2020-04-16 07:32:33', '2020-04-16 07:32:33'),
(28, 'edit_products', 'products', '2020-04-16 07:32:33', '2020-04-16 07:32:33'),
(29, 'add_products', 'products', '2020-04-16 07:32:33', '2020-04-16 07:32:33'),
(30, 'delete_products', 'products', '2020-04-16 07:32:33', '2020-04-16 07:32:33'),
(31, 'browse_category', 'category', '2020-04-16 07:56:21', '2020-04-16 07:56:21'),
(32, 'read_category', 'category', '2020-04-16 07:56:21', '2020-04-16 07:56:21'),
(33, 'edit_category', 'category', '2020-04-16 07:56:21', '2020-04-16 07:56:21'),
(34, 'add_category', 'category', '2020-04-16 07:56:21', '2020-04-16 07:56:21'),
(35, 'delete_category', 'category', '2020-04-16 07:56:21', '2020-04-16 07:56:21'),
(51, 'browse_fournisseurs', 'fournisseurs', '2020-09-30 21:43:08', '2020-09-30 21:43:08'),
(52, 'read_fournisseurs', 'fournisseurs', '2020-09-30 21:43:08', '2020-09-30 21:43:08'),
(53, 'edit_fournisseurs', 'fournisseurs', '2020-09-30 21:43:08', '2020-09-30 21:43:08'),
(54, 'add_fournisseurs', 'fournisseurs', '2020-09-30 21:43:08', '2020-09-30 21:43:08'),
(55, 'delete_fournisseurs', 'fournisseurs', '2020-09-30 21:43:08', '2020-09-30 21:43:08'),
(56, 'browse_types', 'types', '2020-10-01 18:39:48', '2020-10-01 18:39:48'),
(57, 'read_types', 'types', '2020-10-01 18:39:48', '2020-10-01 18:39:48'),
(58, 'edit_types', 'types', '2020-10-01 18:39:49', '2020-10-01 18:39:49'),
(59, 'add_types', 'types', '2020-10-01 18:39:49', '2020-10-01 18:39:49'),
(60, 'delete_types', 'types', '2020-10-01 18:39:49', '2020-10-01 18:39:49'),
(61, 'browse_stocks', 'stocks', '2020-10-04 16:04:45', '2020-10-04 16:04:45'),
(62, 'read_stocks', 'stocks', '2020-10-04 16:04:45', '2020-10-04 16:04:45'),
(63, 'edit_stocks', 'stocks', '2020-10-04 16:04:45', '2020-10-04 16:04:45'),
(64, 'add_stocks', 'stocks', '2020-10-04 16:04:45', '2020-10-04 16:04:45'),
(65, 'delete_stocks', 'stocks', '2020-10-04 16:04:45', '2020-10-04 16:04:45'),
(66, 'browse_clients', 'clients', '2020-10-05 19:58:21', '2020-10-05 19:58:21'),
(67, 'read_clients', 'clients', '2020-10-05 19:58:23', '2020-10-05 19:58:23'),
(68, 'edit_clients', 'clients', '2020-10-05 19:58:23', '2020-10-05 19:58:23'),
(69, 'add_clients', 'clients', '2020-10-05 19:58:23', '2020-10-05 19:58:23'),
(70, 'delete_clients', 'clients', '2020-10-05 19:58:23', '2020-10-05 19:58:23'),
(71, 'browse_ventes', 'ventes', '2020-10-18 20:12:54', '2020-10-18 20:12:54'),
(72, 'read_ventes', 'ventes', '2020-10-18 20:12:56', '2020-10-18 20:12:56'),
(73, 'edit_ventes', 'ventes', '2020-10-18 20:12:56', '2020-10-18 20:12:56'),
(74, 'add_ventes', 'ventes', '2020-10-18 20:12:56', '2020-10-18 20:12:56'),
(75, 'delete_ventes', 'ventes', '2020-10-18 20:12:56', '2020-10-18 20:12:56'),
(91, 'browse_nouvelles_ventes', 'nouvelles_ventes', '2020-10-18 20:51:41', '2020-10-18 20:51:41'),
(92, 'read_nouvelles_ventes', 'nouvelles_ventes', '2020-10-18 20:51:41', '2020-10-18 20:51:41'),
(93, 'edit_nouvelles_ventes', 'nouvelles_ventes', '2020-10-18 20:51:41', '2020-10-18 20:51:41'),
(94, 'add_nouvelles_ventes', 'nouvelles_ventes', '2020-10-18 20:51:41', '2020-10-18 20:51:41'),
(95, 'delete_nouvelles_ventes', 'nouvelles_ventes', '2020-10-18 20:51:41', '2020-10-18 20:51:41'),
(96, 'browse_vente_produits', 'vente_produits', '2020-10-21 16:14:48', '2020-10-21 16:14:48'),
(97, 'read_vente_produits', 'vente_produits', '2020-10-21 16:14:48', '2020-10-21 16:14:48'),
(98, 'edit_vente_produits', 'vente_produits', '2020-10-21 16:14:48', '2020-10-21 16:14:48'),
(99, 'add_vente_produits', 'vente_produits', '2020-10-21 16:14:48', '2020-10-21 16:14:48'),
(100, 'delete_vente_produits', 'vente_produits', '2020-10-21 16:14:48', '2020-10-21 16:14:48'),
(101, 'browse_comptes', 'comptes', '2020-10-31 20:39:54', '2020-10-31 20:39:54'),
(102, 'read_comptes', 'comptes', '2020-10-31 20:39:54', '2020-10-31 20:39:54'),
(103, 'edit_comptes', 'comptes', '2020-10-31 20:39:54', '2020-10-31 20:39:54'),
(104, 'add_comptes', 'comptes', '2020-10-31 20:39:54', '2020-10-31 20:39:54'),
(105, 'delete_comptes', 'comptes', '2020-10-31 20:39:54', '2020-10-31 20:39:54'),
(106, 'browse_depenses', 'depenses', '2020-12-02 15:33:04', '2020-12-02 15:33:04'),
(107, 'read_depenses', 'depenses', '2020-12-02 15:33:04', '2020-12-02 15:33:04'),
(108, 'edit_depenses', 'depenses', '2020-12-02 15:33:04', '2020-12-02 15:33:04'),
(109, 'add_depenses', 'depenses', '2020-12-02 15:33:04', '2020-12-02 15:33:04'),
(110, 'delete_depenses', 'depenses', '2020-12-02 15:33:04', '2020-12-02 15:33:04');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 3),
(1, 4),
(1, 10),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(26, 3),
(26, 4),
(26, 10),
(27, 3),
(27, 4),
(28, 3),
(28, 4),
(29, 3),
(29, 4),
(30, 3),
(30, 4),
(31, 3),
(31, 4),
(32, 3),
(32, 4),
(33, 3),
(33, 4),
(34, 3),
(34, 4),
(35, 3),
(35, 4),
(51, 3),
(51, 4),
(52, 3),
(52, 4),
(53, 3),
(53, 4),
(54, 3),
(54, 4),
(55, 3),
(55, 4),
(56, 3),
(56, 4),
(57, 3),
(57, 4),
(58, 3),
(58, 4),
(59, 3),
(59, 4),
(60, 3),
(60, 4),
(61, 3),
(61, 4),
(62, 3),
(62, 4),
(63, 3),
(63, 4),
(65, 3),
(65, 4),
(66, 3),
(66, 4),
(67, 3),
(67, 4),
(68, 3),
(68, 4),
(69, 3),
(69, 4),
(70, 3),
(70, 4),
(71, 3),
(71, 4),
(72, 3),
(72, 4),
(73, 3),
(73, 4),
(75, 3),
(75, 4),
(91, 3),
(91, 4),
(91, 10),
(92, 3),
(92, 4),
(92, 10),
(93, 3),
(93, 4),
(93, 10),
(94, 3),
(94, 4),
(94, 10),
(95, 3),
(95, 4),
(95, 10),
(96, 3),
(96, 4),
(97, 3),
(97, 4),
(100, 3),
(100, 4),
(101, 3),
(101, 4),
(102, 3),
(102, 4),
(103, 3),
(103, 4),
(104, 3),
(104, 4),
(105, 3),
(105, 4),
(106, 4),
(110, 4);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `référence` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `libellé` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantité` int(11) DEFAULT NULL,
  `categorie` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fournisseur` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fournisseur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prix_ht_achat` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix_ht_vente` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tva_18` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix_ttc_achat` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix_ttc_vente` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `en_stock` tinyint(1) NOT NULL DEFAULT '0',
  `rupture` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uidx_pref` (`référence`),
  UNIQUE KEY `products_code_unique` (`code`),
  KEY `products_categorie_id_foreign` (`categorie_id`),
  KEY `products_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `code`, `référence`, `libellé`, `quantité`, `categorie`, `categorie_id`, `fournisseur`, `fournisseur_id`, `prix_ht_achat`, `prix_ht_vente`, `tva_18`, `prix_ttc_achat`, `prix_ttc_vente`, `date_achat`, `en_stock`, `rupture`, `created_at`, `updated_at`) VALUES
(13, '8710163075389', 'ggjyi', 'hgjj', 3, 'sous categorie 1', 29, 'Kamab', 1, '10', '22', '2', '12', '26', '2020-12-03', 1, 1, '2020-12-03 19:22:36', '2020-12-03 19:22:45'),
(14, '841204250238196', 'm', NULL, 6, 'sous categorie 1', 29, 'Kamab', 1, '10', '33', '2', '12', '39', '2020-12-03', 0, 1, '2020-12-03 21:02:28', '2020-12-03 21:02:42'),
(15, '871016307538963', '!mll', 'uijuj jhuhyh hhhh', 3, 'sous categorie 1', 29, 'Kamab', 1, '20', NULL, '4', '24', '0', '2020-12-03', 0, 1, '2020-12-03 21:38:07', '2020-12-03 21:38:23'),
(16, '8412042504', 'klbkb', 'kblnk test prod', 15, 'sous categorie 1', 29, 'Kamab', 1, '20', '23', '4', '24', '27', '2020-12-03', 1, 0, '2020-12-03 22:05:10', '2020-12-03 22:05:27'),
(17, 'fggggg', 'gggggggggggg', 'ggggggggg hhhhhhhhhhhhhh', 6, 'sous categorie 1', 29, 'pmlk', 2, '17', NULL, '0', '17', '0', '2020-12-03', 1, 1, '2020-12-03 22:06:08', '2020-12-03 22:07:27'),
(18, 'r9cch99', 'mmmmmmmmmmm', 'pppppppppp oooooooooo', 10, 'sous categorie 1', 29, 'pmlk', 2, '15', NULL, '0', '15', '0', '2020-12-03', 1, 1, '2020-12-03 22:10:26', '2020-12-03 22:10:56'),
(19, '87101630754', 'memr rksr', 'rrrrrrrrrrrrrrrs', 5, 'sous categorie 1', 29, 'pmlk', 2, '20', '23', '0', '20', '23', '2020-12-03', 0, 1, '2020-12-03 22:14:18', '2020-12-03 22:14:35'),
(20, '8710174', 'mmdfl', 'ssmms psps', 6, 'sous categorie 1', 29, 'pmlk', 2, '10', '16', '0', '10', '16', '2020-12-03', 0, 1, '2020-12-03 22:18:38', '2020-12-03 22:19:07'),
(21, '87101585', 'fff ddfdff', 'dfddf ffdf', 3, 'sous categorie 1', 29, 'Kamab', 1, '12', '20', '2', '14', '24', '2020-12-03', 1, 1, '2020-12-03 22:22:33', '2020-12-03 22:22:41'),
(22, '87101630753897', 'gg', 'ggg', 4, 'sous categorie 1', 29, 'Kamab', 1, '1', '22', '0', '1', '26', '2020-12-03', 0, 1, '2020-12-03 23:00:12', '2020-12-03 23:00:34');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(3, 'Administrateur', 'Administrateur', '2020-09-23 22:03:24', '2020-09-23 22:07:17'),
(4, 'Super Administrateur', 'Super Administrateur', '2020-09-23 22:10:34', '2020-09-23 22:10:34'),
(10, 'comptable', 'Comptable', '2020-11-12 15:54:18', '2020-11-12 15:54:18');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `details` text COLLATE utf8_unicode_ci,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `libellé` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_initial` int(11) NOT NULL DEFAULT '0',
  `quantité` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sortie` int(11) DEFAULT '0',
  `difference` int(11) DEFAULT NULL,
  `seuil` int(11) NOT NULL DEFAULT '10',
  `prix_ht_achat` double DEFAULT NULL,
  `prix_ht_vente` double DEFAULT NULL,
  `profit` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stocks_code_unique` (`code`),
  KEY `stocks_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `code`, `libellé`, `stock_initial`, `quantité`, `stock`, `sortie`, `difference`, `seuil`, `prix_ht_achat`, `prix_ht_vente`, `profit`, `status`, `created_at`, `updated_at`) VALUES
(12, 13, '8710163075389', 'hgjj', 0, 3, 3, 13, -10, 10, 10, 22, 12, 1, '2020-12-03 19:22:43', '2020-12-03 20:49:26'),
(13, 14, '841204250238196', NULL, 0, 6, 6, 0, 6, 10, 10, 33, 23, 0, '2020-12-03 21:02:37', '2020-12-03 21:02:43'),
(14, 15, '871016307538963', 'uijuj jhuhyh hhhh', 0, 3, 3, 0, 3, 10, 20, NULL, -20, 0, '2020-12-03 21:38:20', '2020-12-03 21:38:25'),
(15, 16, '8412042504', 'kblnk test prod', 0, 15, 15, 1, 14, 10, 20, 23, 3, 1, '2020-12-03 22:05:49', '2020-12-03 23:02:16'),
(16, 17, 'fggggg', 'ggggggggg hhhhhhhhhhhhhh', 0, 6, 6, 0, 6, 10, 17, NULL, -17, 1, '2020-12-03 22:07:22', '2020-12-03 22:07:38'),
(17, 18, 'r9cch99', 'pppppppppp oooooooooo', 0, 10, 10, 0, 10, 10, 15, NULL, -15, 1, '2020-12-03 22:10:47', '2020-12-03 22:10:59'),
(18, 19, '87101630754', 'rrrrrrrrrrrrrrrs', 0, 5, 5, 0, 5, 10, 20, 23, 3, 0, '2020-12-03 22:14:32', '2020-12-03 22:14:40'),
(19, 20, '8710174', 'ssmms psps', 0, 6, 6, 0, 6, 10, 10, 16, 6, 0, '2020-12-03 22:18:59', '2020-12-03 22:19:12'),
(20, 21, '87101585', 'dfddf ffdf', 0, 3, 3, 0, 3, 10, 12, 20, 8, 1, '2020-12-03 22:22:39', '2020-12-03 22:22:41'),
(21, 22, '87101630753897', 'ggg', 0, 4, 4, 0, 4, 10, 1, 22, 21, 0, '2020-12-03 23:00:29', '2020-12-03 23:00:43');

-- --------------------------------------------------------

--
-- Structure de la table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dénomination` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `tva` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `dénomination`, `tva`, `created_at`, `updated_at`) VALUES
(1, 'régulier', 1, '2020-10-01 18:58:58', '2020-10-01 18:58:58'),
(2, 'irrégulier', 0, '2020-10-01 18:59:37', '2020-10-01 18:59:37'),
(3, 'divers', 0, '2020-10-01 19:00:18', '2020-10-05 21:16:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(8, 10, 'simple utilisateur', 'user@gmail.com', 'users/default.png', NULL, '$2y$10$8GQSSNPhAVSHd3YvWkE.YeiigWUSzB4.PMl.y2gLHPkiePhxhCnzW', NULL, '{\"locale\":\"fr\"}', '2020-09-23 21:36:41', '2020-11-12 15:55:12'),
(9, 3, 'administrateur', 'admin@gmail.com', 'users/default.png', NULL, '$2y$10$m4QFH7/Z.7suzJlfBRRzfuZCJk0gbmvNuXkW1gYtiosHKbo8dMIdG', NULL, '{\"locale\":\"fr\"}', '2020-09-23 22:08:02', '2020-09-23 22:08:02'),
(10, 4, 'super admin', 'super@gmail.com', 'users/default.png', NULL, '$2y$10$/79HeCaDPRta7nHnvBnEm.Mbc9UN9CQVPZqXkic5IgktdGL3J5BQu', NULL, '{\"locale\":\"fr\"}', '2020-09-23 22:12:33', '2020-09-23 22:12:33');

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `initiateur` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_client` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `téléphone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantité` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payé` int(11) DEFAULT '0',
  `restant` int(11) NOT NULL,
  `paiement` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `compte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_vente` date DEFAULT NULL,
  `délivré` tinyint(1) NOT NULL DEFAULT '0',
  `error` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventes_user_id_foreign` (`user_id`),
  KEY `ventes_client_id_foreign` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `user_id`, `initiateur`, `client_id`, `nom_client`, `téléphone`, `quantité`, `total`, `payé`, `restant`, `paiement`, `compte`, `date_vente`, `délivré`, `error`, `created_at`, `updated_at`) VALUES
(3, 10, 'super admin', 1, 'abdel', '224545847', 4, 330, 40, 290, '', NULL, '2020-10-27', 0, NULL, '2020-10-27 21:51:48', '2020-11-11 22:31:06'),
(4, 10, 'super admin', 2, 'Client', '002242525625', 2, 190, NULL, 190, '', NULL, '2020-10-27', 0, NULL, '2020-10-27 22:03:19', '2020-10-27 22:03:19'),
(5, 10, 'super admin', 2, 'Client', '002242525625', 3, 285, NULL, 285, '', NULL, '2020-10-27', 0, NULL, '2020-10-27 22:04:19', '2020-10-27 22:04:19'),
(6, 10, 'super admin', 2, 'Client', '002242525625', 5, 475, NULL, 475, '', NULL, '2020-10-27', 0, NULL, '2020-10-27 22:06:35', '2020-10-27 22:06:35'),
(7, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 95, NULL, 95, 'Virement', '45632332', '2020-10-31', 0, NULL, '2020-10-31 20:56:43', '2020-10-31 20:56:43'),
(8, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 95, NULL, 95, 'Chèque', NULL, '2020-10-31', 0, NULL, '2020-10-31 20:58:27', '2020-10-31 20:58:27'),
(9, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Espèces', NULL, '2020-10-31', 0, NULL, '2020-10-31 21:00:01', '2020-10-31 21:00:01'),
(10, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Virement', '45632332', '2020-10-31', 0, NULL, '2020-10-31 21:14:30', '2020-10-31 21:14:30'),
(11, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 112, NULL, 112, 'Virement', '45632332', '2020-10-31', 0, NULL, '2020-10-31 21:27:59', '2020-10-31 21:27:59'),
(12, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 95, NULL, 95, 'Virement', '45632332', '2020-10-31', 0, NULL, '2020-10-31 21:30:39', '2020-10-31 21:30:39'),
(13, NULL, 'Abdel', 1, 'abdel', '224545847', 2, 70, NULL, 70, 'Virement', '74747478574', '2020-10-31', 0, NULL, '2020-10-31 21:35:25', '2020-10-31 21:35:25'),
(14, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 112, 224, -112, 'Virement', '45632332', '2020-11-01', 1, NULL, '2020-11-01 19:32:30', '2020-11-11 22:31:56'),
(15, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Virement', '45632332', '2020-11-01', 0, NULL, '2020-11-01 19:36:02', '2020-11-01 19:36:02'),
(16, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 17, NULL, 17, 'Virement', '45632332', '2020-11-01', 0, NULL, '2020-11-01 19:38:27', '2020-11-01 19:38:27'),
(17, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 14, NULL, 14, 'Virement', '74747478574', '2020-11-01', 0, NULL, '2020-11-01 19:42:09', '2020-11-01 19:42:09'),
(18, NULL, 'Abdel', 1, 'abdel', '224545847', 2, 70, NULL, 70, 'Virement', '45632332', '2020-11-01', 0, NULL, '2020-11-01 20:27:55', '2020-11-01 20:27:55'),
(19, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 95, NULL, 95, 'Chèque', NULL, '2020-11-01', 0, NULL, '2020-11-01 20:31:58', '2020-11-01 20:31:58'),
(20, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, 3, 50, 'Espèces', NULL, '2020-11-01', 0, NULL, '2020-11-01 20:36:23', '2020-11-01 20:36:23'),
(21, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Chèque', NULL, '2020-11-01', 0, NULL, '2020-11-01 22:19:14', '2020-11-01 22:19:14'),
(22, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Espèces', NULL, '2020-11-01', 0, NULL, '2020-11-01 22:22:50', '2020-11-01 22:22:50'),
(23, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Espèces', NULL, '2020-11-01', 0, NULL, '2020-11-01 22:22:44', '2020-11-01 22:22:44'),
(24, NULL, 'Abdel', 1, 'abdel', '224545847', 2, 129, 49, 80, 'Chèque', NULL, '2020-11-01', 0, NULL, '2020-11-01 22:23:53', '2020-11-03 18:11:02'),
(25, NULL, 'Abdel', 1, 'abdel', '224545847', 1, 53, 51, 2, NULL, NULL, '2020-11-01', 0, NULL, '2020-11-01 22:24:18', '2020-11-03 18:09:51'),
(26, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 45, 45, 0, 'Chèque', NULL, '2020-11-03', 0, NULL, '2020-11-03 16:56:51', '2020-11-03 16:56:51'),
(27, NULL, 'Abdel', 2, 'Client', '002242525625', 144, 13680, 80, 13600, 'Espèces', NULL, '2020-11-03', 0, NULL, '2020-11-03 17:01:49', '2020-11-03 18:06:29'),
(28, NULL, 'Abdel', 2, 'Client', '002242525625', 1, 45, 45, 0, 'Espèces', NULL, '2020-11-03', 0, NULL, '2020-11-03 17:11:39', '2020-11-03 18:11:42'),
(30, 10, 'super admin', 2, 'Client', '002242525625', 3, 1128, 128, 1000, 'Virement', '45632332', '2020-11-05', 0, NULL, '2020-11-05 12:37:10', '2020-11-05 12:37:10'),
(31, 10, 'super admin', 1, 'abdel', '224545847', 1, 53, NULL, 53, 'Chèque', NULL, '2020-11-05', 0, NULL, '2020-11-05 14:00:53', '2020-11-05 14:00:53'),
(33, 10, 'super admin', 1, 'abdel', '224545847', 1, 53, 53, 0, 'Espèces', NULL, '2020-11-05', 0, NULL, '2020-11-05 15:46:07', '2020-11-05 15:46:07'),
(34, 10, 'super admin', 2, 'Client', '002242525625', 1, 14, NULL, 14, 'Virement', '74747478574', '2020-11-05', 0, NULL, '2020-11-05 20:08:00', '2020-11-05 20:08:00'),
(35, 10, 'super admin', 3, 'test', '54646', 1, 95, 190, -95, 'Espèces', NULL, '2020-11-05', 1, NULL, '2020-11-05 20:23:53', '2020-11-11 22:33:44'),
(36, 10, 'super admin', 2, 'Client', '002242525625', 1, 45, 5, 40, NULL, NULL, '2020-11-05', 0, NULL, '2020-11-05 20:26:34', '2020-11-05 20:26:34'),
(37, 10, 'super admin', 2, 'Client', '002242525625', 1, 33, NULL, 33, 'Espèces', NULL, '2020-11-05', 0, NULL, '2020-11-05 20:42:01', '2020-11-05 20:42:01'),
(38, 10, 'super admin', 3, 'test', '54646', 1, 95, NULL, 95, NULL, NULL, '2020-11-05', 0, NULL, '2020-11-05 20:43:00', '2020-11-05 20:43:00'),
(39, 10, 'super admin', 1, 'abdel', '224545847', 1, 53, 106, -53, 'Espèces', NULL, '2020-11-05', 1, NULL, '2020-11-05 20:45:12', '2020-11-11 22:33:28'),
(40, 10, 'super admin', 1, 'abdel', '224545847', 2, 35, NULL, 35, NULL, NULL, '2020-11-08', 0, NULL, '2020-11-08 19:23:00', '2020-11-08 19:23:00'),
(41, 10, 'super admin', 1, 'abdel', '224545847', 5, 71, NULL, 71, 'Espèces', NULL, '2020-11-08', 0, NULL, '2020-11-08 20:08:23', '2020-11-08 20:08:23'),
(42, 10, 'super admin', 3, 'test', '54646', 5, 315, 315, 0, 'Chèque', NULL, '2020-11-09', 1, NULL, '2020-11-09 18:11:14', '2020-11-11 22:32:17'),
(43, NULL, 'abdel', 1, 'abdel', '224545847', 1, 65066511, NULL, 65066511, 'Espèces', NULL, '2020-11-10', 0, NULL, '2020-11-10 18:43:48', '2020-11-10 18:43:48'),
(44, NULL, 'abdel', 3, 'test', '54646', 2, 55175112, NULL, 55175112, 'Orange Money', NULL, '2020-11-10', 0, NULL, '2020-11-10 19:03:40', '2020-11-10 19:03:40'),
(45, 10, 'super admin', 1, 'abdel', '224545847', 1, 40120, 0, 40120, 'Virement', '74747478574', '2020-11-11', 1, NULL, '2020-11-11 18:11:47', '2020-11-11 22:30:33'),
(46, 10, 'super admin', 1, 'abdel', '224545847', 1, 14, 14, 0, 'Espèces', NULL, '2020-11-11', 0, NULL, '2020-11-11 22:13:53', '2020-11-11 22:13:53'),
(48, 10, 'super admin', 3, 'test', '54646', 1, 34000, 34000, 0, NULL, NULL, '2020-11-12', 0, NULL, '2020-11-12 10:50:03', '2020-11-12 10:50:03'),
(49, 8, 'simple utilisateur', 2, 'Client', '002242525625', 1, 12, 12, 0, 'Orange Money', NULL, '2020-11-12', 0, NULL, '2020-11-12 15:56:25', '2020-11-12 15:56:25'),
(50, 10, 'super admin', 1, 'abdel', '224545847', 2, 28, NULL, 28, 'Chèque', NULL, '2020-12-01', 0, NULL, '2020-12-01 18:43:59', '2020-12-01 18:43:59'),
(51, 10, 'super admin', 1, 'abdel', '224545847', 1, 14, NULL, 14, NULL, NULL, '2020-12-01', 0, NULL, '2020-12-01 19:18:23', '2020-12-01 19:18:23'),
(52, 10, 'super admin', 1, 'abdel', '224545847', 2, 28, 10, 18, NULL, NULL, '2020-12-01', 0, NULL, '2020-12-01 19:22:04', '2020-12-01 19:22:04'),
(53, NULL, 'Abdel', 4, 'badou', '6666', 1, 22, NULL, 22, 'Chèque', NULL, '2020-12-03', 0, NULL, '2020-12-03 19:33:43', '2020-12-03 19:33:43'),
(54, NULL, 'Abdel', 6, 'ahmed', '5666', 1, 26, NULL, 26, 'Virement', '74747478574', '2020-12-03', 0, NULL, '2020-12-03 19:35:23', '2020-12-03 19:35:23'),
(55, NULL, 'Abdel', 5, 'hg', '3353232', 1, 26, NULL, 26, 'Chèque', NULL, '2020-12-03', 0, NULL, '2020-12-03 19:46:28', '2020-12-03 19:46:28'),
(56, NULL, 'Abdel', 6, 'ahmed', '5666', 1, 26, NULL, 26, 'Chèque', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:04:38', '2020-12-03 20:04:38'),
(57, NULL, 'Abdel', 5, 'hg', '3353232', 2, 52, NULL, 52, 'Espèces', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:08:10', '2020-12-03 20:08:10'),
(58, NULL, 'Abdel', 6, 'ahmed', '5666', 1, 26, NULL, 26, 'Espèces', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:17:42', '2020-12-03 20:17:42'),
(59, NULL, 'Abdel', 5, 'hg', '3353232', 1, 26, NULL, 26, 'Espèces', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:19:21', '2020-12-03 20:19:21'),
(60, NULL, 'Abdel', 5, 'hg', '3353232', 1, 26, NULL, 26, 'Virement', '45632332', '2020-12-03', 0, NULL, '2020-12-03 20:33:39', '2020-12-03 20:33:39'),
(61, NULL, 'Abdel', 5, 'hg', '3353232', 1, 26, NULL, 26, 'Chèque', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:35:34', '2020-12-03 20:35:34'),
(62, NULL, 'Abdel', 4, 'badou', '6666', 1, 22, NULL, 22, 'Espèces', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:44:37', '2020-12-03 20:44:37'),
(63, NULL, 'Abdel', 4, 'badou', '6666', 1, 22, NULL, 22, 'Espèces', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:47:03', '2020-12-03 20:47:03'),
(64, NULL, 'Abdel', 4, 'badou', '6666', 1, 22, NULL, 22, 'Chèque', NULL, '2020-12-03', 0, NULL, '2020-12-03 20:49:22', '2020-12-03 20:49:22'),
(65, 10, 'super admin', 4, 'badou', '6666', 1, 23, NULL, 23, 'Chèque', NULL, '2020-12-03', 0, NULL, '2020-12-03 23:02:00', '2020-12-03 23:02:00');

-- --------------------------------------------------------

--
-- Structure de la table `vente_produits`
--

DROP TABLE IF EXISTS `vente_produits`;
CREATE TABLE IF NOT EXISTS `vente_produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_client` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_produit` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libellé` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantité` int(10) UNSIGNED NOT NULL,
  `prix` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vente_produits_client_id_foreign` (`client_id`),
  KEY `vente_produits_vente_id_foreign` (`vente_id`),
  KEY `vente_produits_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vente_produits`
--

INSERT INTO `vente_produits` (`id`, `client_id`, `nom_client`, `code_produit`, `libellé`, `vente_id`, `product_id`, `quantité`, `prix`, `total`, `created_at`, `updated_at`) VALUES
(2, 1, 'abdel', '668787', 'Jgjvj jj', NULL, NULL, 63, '45', '2 835', '2020-10-24 20:23:18', '2020-10-24 20:23:18'),
(3, 1, 'abdel', '6952442', 'Dijoncteur', 3, NULL, 2, '95', '190', '2020-10-27 21:51:51', '2020-10-27 21:51:51'),
(4, 1, 'abdel', '668787', 'Jgjvj jj', 3, NULL, 2, '45', '90', '2020-10-27 21:52:16', '2020-10-27 21:52:16'),
(5, 2, 'Client', '6952442', 'Dijoncteur', 4, NULL, 2, '95', '190', '2020-10-27 22:03:20', '2020-10-27 22:03:20'),
(6, 2, 'Client', '6952442', 'Dijoncteur', 5, NULL, 3, '95', '285', '2020-10-27 22:04:21', '2020-10-27 22:04:21'),
(7, 2, 'Client', '6952442', 'Dijoncteur', 6, NULL, 5, '95', '475', '2020-10-27 22:06:36', '2020-10-27 22:06:36'),
(8, 2, 'Client', '6952442', 'Dijoncteur', 7, NULL, 1, '95', '95', '2020-10-31 20:57:06', '2020-10-31 20:57:06'),
(9, 2, 'Client', '6952442', 'Dijoncteur', 8, NULL, 1, '95', '95', '2020-10-31 20:58:40', '2020-10-31 20:58:40'),
(10, 1, 'abdel', '668787', 'Jgjvj jj', 9, NULL, 1, '45', '45', '2020-10-31 21:00:06', '2020-10-31 21:00:06'),
(11, 1, 'abdel', '668787', 'Jgjvj jj', 10, NULL, 1, '45', '45', '2020-10-31 21:14:31', '2020-10-31 21:14:31'),
(12, 1, 'abdel', '6952442', 'Dijoncteur', 11, NULL, 1, '95', '95', '2020-10-31 21:28:01', '2020-10-31 21:28:01'),
(13, 2, 'Client', '6952442', 'Dijoncteur', 12, NULL, 1, '95', '95', '2020-10-31 21:30:43', '2020-10-31 21:30:43'),
(14, 1, 'abdel', '668787', 'Jgjvj jj', 13, NULL, 1, '45', '45', '2020-10-31 21:35:25', '2020-10-31 21:35:25'),
(15, 1, 'abdel', 'dgfh56856+5+85', 'lllllllll', 13, NULL, 1, '14', '14', '2020-10-31 21:35:31', '2020-10-31 21:35:31'),
(16, 1, 'abdel', '6952442', 'Dijoncteur', 14, NULL, 1, '95', '95', '2020-11-01 19:32:32', '2020-11-01 19:32:32'),
(17, 1, 'abdel', '668787', 'Jgjvj jj', 15, NULL, 1, '45', '45', '2020-11-01 19:36:05', '2020-11-01 19:36:05'),
(18, 1, 'abdel', 'dgfh56856+5+85', 'lllllllll', 16, NULL, 1, '14', '14', '2020-11-01 19:38:28', '2020-11-01 19:38:28'),
(19, 2, 'Client', 'dgfh56856+5+85', 'lllllllll', 17, NULL, 1, '14', '14', '2020-11-01 19:42:17', '2020-11-01 19:42:17'),
(20, 1, 'abdel', '668787', 'Jgjvj jj', 18, NULL, 1, '45', '45', '2020-11-01 20:28:03', '2020-11-01 20:28:03'),
(21, 1, 'abdel', 'dgfh56856+5+85', 'lllllllll', 18, NULL, 1, '14', '14', '2020-11-01 20:28:05', '2020-11-01 20:28:05'),
(22, 2, 'Client', '6952442', 'Dijoncteur', 19, NULL, 1, '95', '95', '2020-11-01 20:32:02', '2020-11-01 20:32:02'),
(23, 1, 'abdel', '668787', 'Jgjvj jj', 20, NULL, 1, '45', '45', '2020-11-01 20:36:26', '2020-11-01 20:36:26'),
(24, 1, 'abdel', '668787', 'Jgjvj jj', 21, NULL, 1, '45', '45', '2020-11-01 22:19:35', '2020-11-01 22:19:35'),
(25, 1, 'abdel', '668787', 'Jgjvj jj', 22, NULL, 1, '45', '45', '2020-11-01 22:22:56', '2020-11-01 22:22:56'),
(26, 1, 'abdel', '668787', 'Jgjvj jj', 23, NULL, 1, '45', '45', '2020-11-01 22:22:56', '2020-11-01 22:22:56'),
(27, 1, 'abdel', 'dgfh56856+5+85', 'lllllllll', 24, NULL, 1, '14', '14', '2020-11-01 22:23:54', '2020-11-01 22:23:54'),
(28, 1, 'abdel', '6952442', 'Dijoncteur', 24, NULL, 1, '95', '95', '2020-11-01 22:23:55', '2020-11-01 22:23:55'),
(29, 1, 'abdel', '668787', 'Jgjvj jj', 25, NULL, 1, '45', '45', '2020-11-01 22:24:20', '2020-11-01 22:24:20'),
(30, 2, 'Client', '668787', 'Jgjvj jj', 26, NULL, 1, '45', '45', '2020-11-03 16:56:51', '2020-11-03 16:56:51'),
(31, 2, 'Client', '6952442', 'Dijoncteur', 27, NULL, 144, '95', '13 680', '2020-11-03 17:01:55', '2020-11-03 17:01:55'),
(32, 2, 'Client', '668787', 'Jgjvj jj', 28, NULL, 1, '45', '45', '2020-11-03 17:11:41', '2020-11-03 17:11:41'),
(33, 2, 'Client', '2226474575669754', 'olfokf fkfkg', NULL, NULL, 6, '1225', '7 350', '2020-11-04 21:24:06', '2020-11-04 21:24:06'),
(34, 2, 'Client', 'gfhhfh hf fhgjg', 'ololplm', 30, NULL, 1, '1100', '1 100', '2020-11-05 12:37:16', '2020-11-05 12:37:16'),
(35, 2, 'Client', 'dgfh56856+5+85', 'lllllllll', 30, NULL, 2, '14', '28', '2020-11-05 12:37:22', '2020-11-05 12:37:22'),
(36, 1, 'abdel', '668787', 'Jgjvj jj', 31, NULL, 1, '45', '45', '2020-11-05 14:00:55', '2020-11-05 14:00:55'),
(37, 1, 'abdel', 'dgfh56856+5+85', 'lllllllll', NULL, NULL, 1, '14', '14', '2020-11-05 14:08:33', '2020-11-05 14:08:33'),
(38, 1, 'abdel', '668787', 'Jgjvj jj', 33, NULL, 1, '45', '45', '2020-11-05 15:46:16', '2020-11-05 15:46:16'),
(39, 2, 'Client', 'dgfh56856+5+85', 'lllllllll', 34, NULL, 1, '14', '14', '2020-11-05 20:08:01', '2020-11-05 20:08:01'),
(40, 3, 'test', '6952442', 'Dijoncteur', 35, NULL, 1, '95', '95', '2020-11-05 20:23:55', '2020-11-05 20:23:55'),
(41, 2, 'Client', '668787', 'Jgjvj jj', 36, NULL, 1, '45', '45', '2020-11-05 20:26:34', '2020-11-05 20:26:34'),
(42, 2, 'Client', '76666666666666', 'jjjjjjjjj', 37, NULL, 1, '33', '33', '2020-11-05 20:42:10', '2020-11-05 20:42:10'),
(43, 3, 'test', '6952442', 'Dijoncteur', 38, NULL, 1, '95', '95', '2020-11-05 20:43:08', '2020-11-05 20:43:08'),
(44, 1, 'abdel', '668787', 'Jgjvj jj', 39, NULL, 1, '45', '45', '2020-11-05 20:45:14', '2020-11-05 20:45:14'),
(45, 1, 'abdel', '9782501084857', 'mfgpgoh', 40, NULL, 2, '15', '30', '2020-11-08 19:23:05', '2020-11-08 19:23:05'),
(46, 1, 'abdel', '9782501084857', 'fgh hgghg hhhh jjjjj', 41, 18, 5, '12', '60', '2020-11-08 20:08:24', '2020-11-08 20:08:24'),
(47, 3, 'test', '6181100325461', 'jkk', 42, 14, 5, '63', '315', '2020-11-09 18:11:16', '2020-11-09 18:11:16'),
(48, 1, 'abdel', '6111243090537', 'hbvb g hjh hjhhj jhjhkkj  jhjhjhj', 43, NULL, 1, '55141111', '55 141 111', '2020-11-10 18:43:50', '2020-11-10 18:43:50'),
(49, 3, 'test', '6111243090537', 'hbvb g hjh hjhhj jhjhkkj  jhjhjhj', 44, NULL, 1, '55141112', '55 141 112', '2020-11-10 19:03:43', '2020-11-10 19:03:43'),
(50, 3, 'test', '8412042502381', 'ppllo', 44, NULL, 1, '34000', '34 000', '2020-11-10 19:03:46', '2020-11-10 19:03:46'),
(51, 1, 'abdel', '8412042502381', 'ppllo', 45, NULL, 1, '34000', '34 000', '2020-11-11 18:11:48', '2020-11-11 18:11:48'),
(52, 1, 'abdel', '9782501084857', 'fgh hgghg hhhh jjjjj', 46, 18, 1, '12', '12', '2020-11-11 22:13:54', '2020-11-11 22:13:54'),
(53, 2, 'Client', '8412042502381', 'ppllo', NULL, NULL, 1, '34000', '34 000', '2020-11-12 10:43:02', '2020-11-12 10:43:02'),
(54, 3, 'test', '8412042502381', 'ppllo', 48, NULL, 1, '34000', '34 000', '2020-11-12 10:50:03', '2020-11-12 10:50:03'),
(55, 2, 'Client', '8710163075389', 'lmkm', 49, NULL, 1, '12', '12', '2020-11-12 15:56:27', '2020-11-12 15:56:27'),
(56, 1, 'abdel', '8710163075389', 'lmkm', 50, NULL, 2, '12', '24', '2020-12-01 18:44:20', '2020-12-01 18:44:20'),
(57, 1, 'abdel', '8710163075389', 'lmkm', 51, NULL, 1, '12', '12', '2020-12-01 19:18:26', '2020-12-01 19:18:26'),
(58, 1, 'abdel', '8710163075389', 'lmkm', 52, NULL, 2, '12', '24', '2020-12-01 19:22:08', '2020-12-01 19:22:08'),
(59, 4, 'badou', '8710163075389', 'hgjj', 53, 13, 1, '22', '22', '2020-12-03 19:33:44', '2020-12-03 19:33:44'),
(60, 6, 'ahmed', '8710163075389', 'hgjj', 54, 13, 1, '22', '22', '2020-12-03 19:35:30', '2020-12-03 19:35:30'),
(61, 5, 'hg', '8710163075389', 'hgjj', 55, 13, 1, '22', '22', '2020-12-03 19:46:29', '2020-12-03 19:46:29'),
(62, 6, 'ahmed', '8710163075389', 'hgjj', 56, 13, 1, '22', '22', '2020-12-03 20:04:39', '2020-12-03 20:04:39'),
(63, 5, 'hg', '8710163075389', 'hgjj', 57, 13, 2, '22', '44', '2020-12-03 20:08:15', '2020-12-03 20:08:15'),
(64, 6, 'ahmed', '8710163075389', 'hgjj', 58, 13, 1, '22', '22', '2020-12-03 20:17:44', '2020-12-03 20:17:44'),
(65, 5, 'hg', '8710163075389', 'hgjj', 59, 13, 1, '22', '22', '2020-12-03 20:19:23', '2020-12-03 20:19:23'),
(66, 5, 'hg', '8710163075389', 'hgjj', 60, 13, 1, '22', '22', '2020-12-03 20:33:43', '2020-12-03 20:33:43'),
(67, 5, 'hg', '8710163075389', 'hgjj', 61, 13, 1, '22', '22', '2020-12-03 20:35:35', '2020-12-03 20:35:35'),
(68, 4, 'badou', '8710163075389', 'hgjj', 62, 13, 1, '22', '22', '2020-12-03 20:44:42', '2020-12-03 20:44:42'),
(69, 4, 'badou', '8710163075389', 'hgjj', 63, 13, 1, '22', '22', '2020-12-03 20:47:06', '2020-12-03 20:47:06'),
(70, 4, 'badou', '8710163075389', 'hgjj', 64, 13, 1, '22', '22', '2020-12-03 20:49:24', '2020-12-03 20:49:24'),
(71, 4, 'badou', '8412042504', 'kblnk test prod', 65, 16, 1, '23', '23', '2020-12-03 23:02:07', '2020-12-03 23:02:07');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `depenses_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD CONSTRAINT `fournisseurs_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ventes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `vente_produits`
--
ALTER TABLE `vente_produits`
  ADD CONSTRAINT `vente_produits_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `vente_produits_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `vente_produits_vente_id_foreign` FOREIGN KEY (`vente_id`) REFERENCES `ventes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
