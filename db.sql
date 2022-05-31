-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour gstassurance
CREATE DATABASE IF NOT EXISTS `gstassurance` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gstassurance`;

-- Listage de la structure de la table gstassurance. accidents
CREATE TABLE IF NOT EXISTS `accidents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lieu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `cause` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.accidents : ~2 rows (environ)
/*!40000 ALTER TABLE `accidents` DISABLE KEYS */;
INSERT INTO `accidents` (`id`, `user_id`, `lieu`, `heure`, `cause`, `created_at`, `tel`, `updated_at`) VALUES
	(1, 2, 'Salle de priere', '13:39:00', 'cause', '2022-05-23 11:39:16', '0658747474', '2022-05-23 11:39:16'),
	(2, 2, 'Escalier', '11:15:00', 'cause', '2022-05-23 11:39:41', '0658747474', '2022-05-23 11:39:41');
/*!40000 ALTER TABLE `accidents` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. beneficiaires
CREATE TABLE IF NOT EXISTS `beneficiaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactif',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lien_parente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.beneficiaires : ~8 rows (environ)
/*!40000 ALTER TABLE `beneficiaires` DISABLE KEYS */;
INSERT INTO `beneficiaires` (`id`, `nom`, `date_naissance`, `statut`, `user_id`, `created_at`, `updated_at`, `lien_parente`, `document`) VALUES
	(1, 'Ralph Thornton', '2007-10-17', 'Actif', 2, '2022-05-16 15:35:52', '2022-05-23 11:38:13', 'Conjointe', 'beneficiaire\\Marouane Ettaki\\202205161535529596.png'),
	(2, 'Explicabo Dolor ear', '1986-12-11', 'Déces', 6, '2022-05-17 13:19:41', '2022-05-17 13:19:41', 'Enfant', NULL),
	(3, 'Rem laborum dolores', '1982-09-01', 'Inactif', 7, '2022-05-17 13:19:51', '2022-05-17 13:19:51', 'Enfant', NULL),
	(4, 'Alias quaerat aliqui', '1971-07-07', 'Déces', 7, '2022-05-17 13:20:01', '2022-05-17 13:20:01', 'Enfant', NULL),
	(5, 'Deserunt laborum Po', '2015-12-13', 'Déces', 5, '2022-05-17 13:20:20', '2022-05-17 13:20:20', 'Conjointe', NULL),
	(6, 'Eu qui lorem consequ', '1978-01-24', 'Déces', 2, '2022-05-17 13:21:18', '2022-05-17 13:21:18', 'Conjointe', NULL),
	(7, 'Reprehenderit ab eum', '1986-03-27', 'Déces', 6, '2022-05-17 13:22:02', '2022-05-17 13:22:02', 'Conjointe', NULL),
	(8, 'Elit beatae nostrud', '1995-12-25', 'Inactif', 7, '2022-05-17 13:38:18', '2022-05-17 13:38:18', 'Enfant', NULL),
	(9, 'Helen Buchanan', '2005-05-10', 'Inactif', 2, '2022-05-23 11:30:54', '2022-05-23 11:30:54', 'Enfant', 'beneficiaire\\Marouane Ettaki\\202205231130544815.png');
/*!40000 ALTER TABLE `beneficiaires` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. data_rows
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.data_rows : ~63 rows (environ)
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
	(1, 1, 'id', 'number', 'ID', 1, 1, 0, 0, 0, 0, '{}', 1),
	(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
	(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
	(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
	(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 9),
	(6, 1, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 10),
	(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
	(8, 1, 'avatar', 'image', 'Avatar', 0, 0, 1, 1, 1, 1, '{}', 12),
	(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"display_name","pivot_table":"roles","pivot":"0","taggable":"0"}', 14),
	(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 0, 0, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsToMany","column":"id","key":"id","label":"display_name","pivot_table":"user_roles","pivot":"1","taggable":"0"}', 15),
	(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 16),
	(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
	(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
	(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
	(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
	(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
	(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 13),
	(56, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(57, 10, 'nom', 'text', 'Nom', 1, 1, 1, 0, 1, 1, '{}', 2),
	(58, 10, 'date_naissance', 'date', 'Date Naissance', 1, 1, 1, 0, 1, 1, '{}', 3),
	(59, 10, 'statut', 'select_dropdown', 'Statut', 1, 1, 1, 1, 1, 1, '{"default":"Inactif","options":{"Inactif":"Inactif","Actif":"Actif","D\\u00e9ces":"D\\u00e9ces"}}', 4),
	(60, 10, 'user_id', 'text', 'User Id', 1, 1, 1, 0, 1, 1, '{}', 6),
	(61, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 1, '{}', 7),
	(62, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
	(63, 10, 'beneficiaire_belongsto_user_relationship', 'relationship', 'users', 1, 1, 1, 0, 1, 1, '{"model":"App\\\\Models\\\\User","table":"users","type":"belongsTo","column":"user_id","key":"id","label":"name","pivot_table":"beneficiaires","pivot":"0","taggable":"0"}', 9),
	(64, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(66, 11, 'date_soins', 'date', 'Date Soins', 1, 0, 1, 0, 1, 1, '{}', 3),
	(67, 11, 'beneficiaire_id', 'text', 'Beneficiaire Id', 1, 0, 1, 0, 1, 1, '{}', 4),
	(68, 11, 'date_depot', 'timestamp', 'Date Depot', 1, 1, 1, 0, 1, 1, '{}', 5),
	(70, 11, 'date_remboursement', 'date', 'Date Remboursement', 0, 0, 1, 1, 1, 1, '{}', 7),
	(71, 11, 'frais_rembourse', 'number', 'Frais Rembourse', 0, 0, 1, 1, 1, 1, '{}', 8),
	(72, 11, 'statut', 'select_dropdown', 'Statut', 1, 1, 1, 1, 1, 1, '{"default":"En cours","options":{"En Cours":"En Cours","Rembours\\u00e9":"Rembours\\u00e9","Rejet\\u00e9":"Rejet\\u00e9"}}', 6),
	(73, 11, 'user_id', 'text', 'User Id', 0, 0, 1, 0, 1, 1, '{}', 9),
	(74, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 1, '{}', 10),
	(75, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
	(76, 11, 'dossier_belongsto_user_relationship', 'relationship', 'users', 1, 1, 1, 0, 1, 1, '{"model":"App\\\\Models\\\\User","table":"users","type":"belongsTo","column":"user_id","key":"id","label":"name","pivot_table":"beneficiaires","pivot":"0","taggable":"0"}', 12),
	(77, 11, 'dossier_belongsto_beneficiaire_relationship', 'relationship', 'beneficiaires', 1, 1, 1, 0, 1, 1, '{"model":"App\\\\Models\\\\Beneficiaire","table":"beneficiaires","type":"belongsTo","column":"beneficiaire_id","key":"id","label":"nom","pivot_table":"beneficiaires","pivot":"0","taggable":"0"}', 17),
	(78, 10, 'lien_parente', 'select_dropdown', 'Lien Parente', 1, 1, 1, 0, 1, 1, '{"options":{"Conjoint":"Conjoint","Conjointe":"Conjointe","Enfant":"Enfant"}}', 5),
	(79, 11, 'num_dossier', 'text', 'Num Dossier', 1, 1, 1, 1, 1, 1, '{}', 2),
	(80, 11, 'documents', 'multiple_images', 'Documents', 0, 0, 1, 0, 1, 1, '{}', 16),
	(82, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(83, 12, 'user_id', 'text', 'User Id', 1, 1, 1, 0, 1, 1, '{}', 2),
	(84, 12, 'lieu', 'text', 'Lieu Accident', 0, 1, 1, 0, 1, 1, '{}', 3),
	(85, 12, 'heure', 'time', 'Heure Accident', 0, 1, 1, 0, 1, 1, '{}', 4),
	(86, 12, 'cause', 'text_area', 'Cause d\'Accident', 0, 1, 1, 0, 1, 1, '{}', 5),
	(87, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
	(88, 12, 'accident_belongsto_user_relationship', 'relationship', 'users', 1, 1, 1, 0, 1, 1, '{"model":"App\\\\Models\\\\User","table":"users","type":"belongsTo","column":"user_id","key":"id","label":"name","pivot_table":"accidents","pivot":"0","taggable":"0"}', 7),
	(89, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 0, 0, 1, '{}', 8),
	(90, 11, 'frais_pharmacie', 'number', 'Frais Pharmacie', 0, 0, 1, 0, 1, 1, '{}', 13),
	(91, 11, 'frais_consultation', 'number', 'Frais Consultation', 0, 0, 1, 0, 1, 1, '{}', 14),
	(92, 11, 'frais_analyse', 'number', 'Frais Analyse', 0, 0, 1, 0, 1, 1, '{}', 15),
	(93, 11, 'total', 'number', 'Total', 0, 1, 1, 0, 1, 1, '{}', 18),
	(94, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(95, 13, 'beneficiaire_id', 'text', 'Beneficiaire Id', 0, 0, 1, 0, 1, 1, '{}', 3),
	(96, 13, 'clinique', 'text', 'Clinique', 0, 1, 1, 1, 1, 1, '{}', 2),
	(97, 13, 'user_id', 'text', 'User Id', 0, 1, 1, 0, 1, 1, '{}', 4),
	(98, 13, 'document', 'multiple_images', 'Documents', 0, 1, 1, 0, 1, 1, '{}', 5),
	(99, 13, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
	(100, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
	(101, 13, 'prise_belongsto_beneficiaire_relationship', 'relationship', 'beneficiaire', 1, 1, 1, 0, 1, 1, '{"model":"App\\\\Models\\\\Beneficiaire","table":"beneficiaires","type":"belongsTo","column":"beneficiaire_id","key":"id","label":"nom","pivot_table":"accidents","pivot":"0","taggable":"0"}', 8),
	(102, 13, 'prise_belongsto_user_relationship', 'relationship', 'User', 1, 1, 1, 0, 1, 1, '{"model":"App\\\\Models\\\\User","table":"users","type":"belongsTo","column":"user_id","key":"id","label":"name","pivot_table":"accidents","pivot":"0","taggable":"0"}', 9),
	(103, 13, 'type_operation', 'text', 'Type Operation', 0, 1, 1, 1, 1, 1, '{}', 8),
	(104, 12, 'tel', 'text', 'Tel', 0, 1, 1, 1, 1, 1, '{}', 7),
	(105, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
	(106, 10, 'document', 'image', 'Document', 0, 1, 1, 0, 1, 1, '{}', 9),
	(107, 1, 'tel', 'text', 'Telephone', 1, 1, 1, 0, 1, 1, '{}', 6),
	(108, 1, 'entreprise', 'text', 'Entreprise', 1, 1, 1, 0, 0, 1, '{"default":"Orange business services"}', 7),
	(109, 1, 'date_naissance', 'date', 'Date Naissance', 0, 1, 1, 1, 1, 1, '{}', 5);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. data_types
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.data_types : ~6 rows (environ)
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
	(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}', '2022-04-29 13:59:58', '2022-05-17 11:14:26'),
	(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(10, 'beneficiaires', 'beneficiaires', 'Beneficiaire', 'Beneficiaires', 'voyager-group', 'App\\Models\\Beneficiaire', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":"statut","scope":null}', '2022-04-29 14:46:05', '2022-05-11 08:23:55'),
	(11, 'dossiers', 'dossiers', 'Dossier', 'Dossiers', 'voyager-book', 'App\\Models\\Dossier', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2022-04-29 14:54:26', '2022-05-05 14:24:32'),
	(12, 'accidents', 'accidents', 'Accident', 'Accidents', 'voyager-ticket', 'App\\Models\\Accident', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2022-04-30 16:55:37', '2022-05-05 15:57:21'),
	(13, 'prises', 'prises', 'Prise', 'Prises', 'voyager-file-text', 'App\\Models\\Prise', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2022-05-05 14:17:48', '2022-05-05 15:56:50');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. dossiers
CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `num_dossier` int(11) NOT NULL,
  `date_soins` date NOT NULL,
  `beneficiaire_id` int(11) NOT NULL,
  `date_depot` date NOT NULL,
  `date_remboursement` date DEFAULT NULL,
  `frais_rembourse` int(11) DEFAULT '0',
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En cours',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frais_pharmacie` int(11) DEFAULT '0',
  `frais_consultation` int(11) DEFAULT '0',
  `frais_analyse` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.dossiers : ~2 rows (environ)
/*!40000 ALTER TABLE `dossiers` DISABLE KEYS */;
INSERT INTO `dossiers` (`id`, `num_dossier`, `date_soins`, `beneficiaire_id`, `date_depot`, `date_remboursement`, `frais_rembourse`, `statut`, `user_id`, `created_at`, `updated_at`, `documents`, `frais_pharmacie`, `frais_consultation`, `frais_analyse`, `total`) VALUES
	(1, 4522, '2022-05-22', 1, '2022-05-23', NULL, 0, 'En Cours', 2, '2022-05-23 11:42:19', '2022-05-23 11:42:19', '["dossiers\\\\Marouane Ettaki\\\\202205231142191650.jpg","dossiers\\\\Marouane Ettaki\\\\202205231142199901.jpg","dossiers\\\\Marouane Ettaki\\\\20220523114219170.png"]', 578, 921, 329, 1828),
	(2, 8560, '2021-11-20', 1, '2022-05-23', NULL, 0, 'En Cours', 2, '2022-05-23 11:43:35', '2022-05-23 11:43:35', '["dossiers\\\\Marouane Ettaki\\\\202205231143352986.jpg","dossiers\\\\Marouane Ettaki\\\\202205231143351637.jpg","dossiers\\\\Marouane Ettaki\\\\202205231143354907.jpg","dossiers\\\\Marouane Ettaki\\\\202205231143358579.png"]', 305, 230, 640, 1175);
/*!40000 ALTER TABLE `dossiers` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.menus : ~0 rows (environ)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2022-04-29 13:59:58', '2022-04-29 13:59:58');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.menu_items : ~14 rows (environ)
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
	(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-04-29 13:59:58', '2022-04-29 13:59:58', 'voyager.dashboard', NULL),
	(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 8, '2022-04-29 13:59:58', '2022-05-05 14:21:14', 'voyager.media.index', NULL),
	(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 7, '2022-04-29 13:59:58', '2022-05-05 14:21:14', 'voyager.users.index', NULL),
	(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 6, '2022-04-29 13:59:58', '2022-05-05 14:21:14', 'voyager.roles.index', NULL),
	(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2022-04-29 13:59:58', '2022-05-05 14:21:14', NULL, NULL),
	(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 3, '2022-04-29 13:59:58', '2022-04-30 14:18:05', 'voyager.menus.index', NULL),
	(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2022-04-29 13:59:58', '2022-04-30 14:18:05', 'voyager.database.index', NULL),
	(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 4, '2022-04-29 13:59:58', '2022-04-30 14:18:03', 'voyager.compass.index', NULL),
	(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 1, '2022-04-29 13:59:58', '2022-04-30 14:18:03', 'voyager.bread.index', NULL),
	(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 10, '2022-04-29 13:59:58', '2022-05-05 14:21:14', 'voyager.settings.index', NULL),
	(14, 1, 'Beneficiaires', '', '_self', 'voyager-group', '#000000', NULL, 2, '2022-04-29 14:46:05', '2022-04-29 15:00:35', 'voyager.beneficiaires.index', 'null'),
	(15, 1, 'Dossiers Médicaux', '', '_self', 'voyager-book', '#000000', NULL, 3, '2022-04-29 14:54:26', '2022-05-16 10:09:14', 'voyager.dossiers.index', 'null'),
	(16, 1, 'Accidents Travail', '', '_self', 'voyager-ticket', '#000000', NULL, 4, '2022-04-30 16:55:37', '2022-04-30 16:57:40', 'voyager.accidents.index', 'null'),
	(17, 1, 'Prises en charges', '', '_self', 'voyager-file-text', '#000000', NULL, 5, '2022-05-05 14:17:48', '2022-05-05 14:21:42', 'voyager.prises.index', 'null');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.migrations : ~27 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_01_01_000000_add_voyager_user_fields', 1),
	(4, '2016_01_01_000000_create_data_types_table', 1),
	(5, '2016_01_01_000000_create_pages_table', 1),
	(6, '2016_01_01_000000_create_posts_table', 1),
	(7, '2016_02_15_204651_create_categories_table', 1),
	(8, '2016_05_19_173453_create_menu_table', 1),
	(9, '2016_10_21_190000_create_roles_table', 1),
	(10, '2016_10_21_190000_create_settings_table', 1),
	(11, '2016_11_30_135954_create_permission_table', 1),
	(12, '2016_11_30_141208_create_permission_role_table', 1),
	(13, '2016_12_26_201236_data_types__add__server_side', 1),
	(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
	(15, '2017_01_14_005015_create_translations_table', 1),
	(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
	(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
	(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
	(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
	(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
	(21, '2017_08_05_000000_add_group_to_settings_table', 1),
	(22, '2017_11_26_013050_add_user_role_relationship', 1),
	(23, '2017_11_26_015000_create_user_roles_table', 1),
	(24, '2018_03_11_000000_add_user_settings', 1),
	(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
	(26, '2018_03_16_000000_make_settings_value_nullable', 1),
	(27, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.permissions : ~36 rows (environ)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
	(1, 'browse_admin', NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(2, 'browse_bread', NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(3, 'browse_database', NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(4, 'browse_media', NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(5, 'browse_compass', NULL, '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(6, 'browse_menus', 'menus', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(7, 'read_menus', 'menus', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(8, 'edit_menus', 'menus', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(9, 'add_menus', 'menus', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(10, 'delete_menus', 'menus', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(11, 'browse_roles', 'roles', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(12, 'read_roles', 'roles', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(13, 'edit_roles', 'roles', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(14, 'add_roles', 'roles', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(15, 'delete_roles', 'roles', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(16, 'browse_users', 'users', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(17, 'read_users', 'users', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(18, 'edit_users', 'users', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(19, 'add_users', 'users', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(20, 'delete_users', 'users', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(21, 'browse_settings', 'settings', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(22, 'read_settings', 'settings', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(23, 'edit_settings', 'settings', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(24, 'add_settings', 'settings', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(25, 'delete_settings', 'settings', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(41, 'browse_beneficiaires', 'beneficiaires', '2022-04-29 14:46:05', '2022-04-29 14:46:05'),
	(42, 'read_beneficiaires', 'beneficiaires', '2022-04-29 14:46:05', '2022-04-29 14:46:05'),
	(43, 'edit_beneficiaires', 'beneficiaires', '2022-04-29 14:46:05', '2022-04-29 14:46:05'),
	(44, 'add_beneficiaires', 'beneficiaires', '2022-04-29 14:46:05', '2022-04-29 14:46:05'),
	(45, 'delete_beneficiaires', 'beneficiaires', '2022-04-29 14:46:05', '2022-04-29 14:46:05'),
	(46, 'browse_dossiers', 'dossiers', '2022-04-29 14:54:26', '2022-04-29 14:54:26'),
	(47, 'read_dossiers', 'dossiers', '2022-04-29 14:54:26', '2022-04-29 14:54:26'),
	(48, 'edit_dossiers', 'dossiers', '2022-04-29 14:54:26', '2022-04-29 14:54:26'),
	(49, 'add_dossiers', 'dossiers', '2022-04-29 14:54:26', '2022-04-29 14:54:26'),
	(50, 'delete_dossiers', 'dossiers', '2022-04-29 14:54:26', '2022-04-29 14:54:26'),
	(51, 'browse_accidents', 'accidents', '2022-04-30 16:55:37', '2022-04-30 16:55:37'),
	(52, 'read_accidents', 'accidents', '2022-04-30 16:55:37', '2022-04-30 16:55:37'),
	(53, 'edit_accidents', 'accidents', '2022-04-30 16:55:37', '2022-04-30 16:55:37'),
	(54, 'add_accidents', 'accidents', '2022-04-30 16:55:37', '2022-04-30 16:55:37'),
	(55, 'delete_accidents', 'accidents', '2022-04-30 16:55:37', '2022-04-30 16:55:37'),
	(56, 'browse_prises', 'prises', '2022-05-05 14:17:48', '2022-05-05 14:17:48'),
	(57, 'read_prises', 'prises', '2022-05-05 14:17:48', '2022-05-05 14:17:48'),
	(58, 'edit_prises', 'prises', '2022-05-05 14:17:48', '2022-05-05 14:17:48'),
	(59, 'add_prises', 'prises', '2022-05-05 14:17:48', '2022-05-05 14:17:48'),
	(60, 'delete_prises', 'prises', '2022-05-05 14:17:48', '2022-05-05 14:17:48');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.permission_role : ~61 rows (environ)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 3),
	(2, 1),
	(3, 1),
	(4, 1),
	(4, 3),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(16, 3),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(41, 1),
	(41, 3),
	(42, 1),
	(42, 3),
	(43, 1),
	(43, 3),
	(44, 1),
	(44, 3),
	(45, 1),
	(46, 1),
	(46, 3),
	(47, 1),
	(47, 3),
	(48, 1),
	(48, 3),
	(49, 1),
	(49, 3),
	(50, 1),
	(51, 1),
	(51, 3),
	(52, 1),
	(52, 3),
	(53, 1),
	(53, 3),
	(54, 1),
	(54, 3),
	(55, 1),
	(56, 1),
	(56, 3),
	(57, 1),
	(57, 3),
	(58, 1),
	(58, 3),
	(59, 1),
	(59, 3),
	(60, 1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. prises
CREATE TABLE IF NOT EXISTS `prises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiaire_id` int(11) DEFAULT NULL,
  `clinique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.prises : ~2 rows (environ)
/*!40000 ALTER TABLE `prises` DISABLE KEYS */;
INSERT INTO `prises` (`id`, `beneficiaire_id`, `clinique`, `user_id`, `document`, `created_at`, `updated_at`, `type_operation`) VALUES
	(1, 1, 'Narjiss', 2, 'prise_en_charge\\Marouane Ettaki\\202205231135559548.png', '2022-05-23 11:35:55', '2022-05-23 11:35:55', 'Accouchement'),
	(2, 1, 'Ipsam elit officiis', 6, '["prises\\\\May2022\\\\r2VzTirqenEpPBfYYDuv.jpg"]', '2022-05-23 13:23:36', '2022-05-23 13:23:36', 'Et quia sequi pariat');
/*!40000 ALTER TABLE `prises` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.roles : ~2 rows (environ)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Administrator', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(2, 'Adhérent', 'Adhérent', '2022-04-29 13:59:58', '2022-04-29 13:59:58'),
	(3, 'Responsable', 'Responsable Assurance', '2022-04-29 14:58:51', '2022-04-29 14:58:51');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.settings : ~10 rows (environ)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
	(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
	(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
	(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
	(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
	(5, 'admin.bg_image', 'Admin Background Image', 'settings\\May2022\\Hf9fQMY98W402aqlm9pQ.jpg', '', 'image', 5, 'Admin'),
	(6, 'admin.title', 'Admin Title', 'Assurance', '', 'text', 1, 'Admin'),
	(7, 'admin.description', 'Admin Description', 'Avec Consalti, vous bénéficiez de garanties santé, prévoyance, épargne et retraite complémentaire bien sûr, mais aussi de services sur mesure et d\'un accompagnement social personnalisé. BIENVENUE !', '', 'text', 2, 'Admin'),
	(8, 'admin.loader', 'Admin Loader', 'settings\\May2022\\MZ2AGg9VC2AIjUBpvwsg.png', '', 'image', 3, 'Admin'),
	(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\May2022\\m2bvvDYRFmW0rnzdma3a.png', '', 'image', 4, 'Admin'),
	(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. translations
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.translations : ~30 rows (environ)
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-04-29 13:59:59', '2022-04-29 13:59:59'),
	(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-04-29 13:59:59', '2022-04-29 13:59:59');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Orange business services',
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.users : ~4 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `tel`, `entreprise`, `date_naissance`) VALUES
	(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '2022-05-09 10:44:00', '$2y$10$D4fsXd/PTDshaOXV9V3TJukcVrr68bbiH4H3UVA7GE5q2u5jrdrEO', 'qQl2iQWx6cIGpREE6b7AAqhhUBJcmdhPbR0sGWlhCSdMpmYpEtrQFpHAajFs', '{"locale":"fr"}', '2022-04-29 13:59:59', '2022-05-16 10:28:24', '', '', NULL),
	(2, 2, 'Marouane Ettaki', 'ettaki909@gmail.com', 'users/default.png', '2022-05-01 15:29:06', '$2y$10$VsMLfL4mdkxnvxxXgUipsuWCAAFsJvqqmYeu39B0bk0cX54gP17iC', NULL, '{"locale":"en"}', '2022-04-29 14:00:08', '2022-05-17 11:10:21', '1123123214', 'Orange business services', '2022-05-06'),
	(5, 3, 'Taha Ettaki', 'taha@responsable.com', 'users/default.png', NULL, '$2y$10$Wztbl2CpW2R.G40z5q8OMuA0iVY4hEwzW27mKzqdrdf/bziUmYojK', NULL, '{"locale":"en"}', '2022-04-29 15:01:44', '2022-04-29 15:01:44', '', '', NULL),
	(6, 2, 'Hamid Bazer', 'yayaw2013@outlook.com', 'users/default.png', NULL, '$2y$10$.qiG5cKOXCZgX7JJiNuEtOozcuSaeyzs4KNluvqTO0mMzlOJy2MJW', NULL, '{"locale":"fr"}', '2022-05-17 09:44:45', '2022-05-17 13:21:40', '0695499275', 'Orange business services', NULL),
	(7, 2, 'Emerald Wagner', 'korac@mailinator.com', 'users/default.png', NULL, '$2y$10$Q2XuiS4ZvaEVcGZCdL1CTuxF0OEllkKm7v1BnnXpX8SS2dNPyJVfG', NULL, NULL, '2022-05-17 11:17:10', '2022-05-17 11:17:10', '0738263749', 'Orange business services', '1988-12-03'),
	(8, 2, 'Ariana Chaney', 'jilufyzub@mailinator.com', 'users/default.png', NULL, '$2y$10$IJEb7xWpoU1/uBRz0S8/Y.bEfyt6ZqTNe8GHnt0xPI91hBCGGOGDu', NULL, NULL, '2022-05-23 13:30:17', '2022-05-23 13:30:17', '0635369753', 'Orange business services', '1984-09-21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table gstassurance. user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gstassurance.user_roles : ~0 rows (environ)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
