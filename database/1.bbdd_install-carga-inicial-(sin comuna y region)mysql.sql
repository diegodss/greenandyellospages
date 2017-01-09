-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5107
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table laravel_auth.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(255) DEFAULT NULL,
  `id_menu_parent` int(11) DEFAULT NULL,
  `item_menu` int(1) DEFAULT '1' COMMENT 'Define si el item debea aparecer en menu',
  `order_menu` int(2) DEFAULT '1',
  `link` varchar(255) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `visualizar` int(11) DEFAULT '1',
  `agregar` int(11) DEFAULT '1',
  `editar` int(11) DEFAULT '1',
  `eliminar` int(11) DEFAULT '1',
  `fl_status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_registra` int(11) DEFAULT '1',
  `usuario_modifica` int(11) DEFAULT '1',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel_auth.menu: ~7 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id_menu`, `nombre_menu`, `id_menu_parent`, `item_menu`, `order_menu`, `link`, `slug`, `visualizar`, `agregar`, `editar`, `eliminar`, `fl_status`, `created_at`, `updated_at`, `usuario_registra`, `usuario_modifica`) VALUES
	(1, 'Mantenedores', 0, 1, 1, '#', 'mantenedores', 1, 1, 1, 1, 0, '2016-07-29 07:59:49', NULL, 0, 0),
	(2, 'Regiones', 1, 1, 1, '/region', 'region', 1, 1, 1, 1, 0, '2016-07-29 07:59:49', NULL, 0, 0),
	(3, 'Comunas', 1, 1, 2, '/comuna', 'comuna', 1, 1, 1, 1, 0, '2016-07-29 07:59:49', NULL, 0, 0),
	(4, 'Sistema', 0, 1, 3, '#', 'sistema', 1, 1, 1, 1, 0, '2016-07-29 07:59:49', NULL, 0, 0),
	(5, 'Usuario', 4, 1, 1, '/usuario', 'usuario', 1, 1, 1, 1, 0, '2016-07-29 07:59:49', NULL, 0, 0),
	(6, 'Role', 4, 1, 2, '/role', 'role', 1, 1, 1, 1, 0, '2016-07-29 07:59:49', NULL, 0, 0),
	(7, 'Menu', 4, 1, 3, '/menu', 'menu', 1, 1, 1, 1, 0, '2016-07-29 08:00:27', NULL, 0, 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table laravel_auth.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravel_auth.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel_auth.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravel_auth.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table laravel_auth.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel_auth.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', '2016-07-28 21:04:44', '2016-07-28 21:04:44'),
	(2, 'Usuario', '2016-07-28 21:05:20', '2016-07-28 21:05:20');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table laravel_auth.role_permiso
CREATE TABLE IF NOT EXISTS `role_permiso` (
  `id_role_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `visualizar` int(11) DEFAULT '1',
  `agregar` int(11) DEFAULT '1',
  `editar` int(11) DEFAULT '1',
  `eliminar` int(11) DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_role_permiso`),
  KEY `fk_Role_has_Menu_Menu1_idx` (`id_menu`),
  KEY `fk_Role_has_Menu_Role1_idx` (`id_role`),
  CONSTRAINT `fk_Role_has_Menu_Menu1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Role_has_Menu_Role1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel_auth.role_permiso: ~11 rows (approximately)
/*!40000 ALTER TABLE `role_permiso` DISABLE KEYS */;
INSERT INTO `role_permiso` (`id_role_permiso`, `id_role`, `id_menu`, `visualizar`, `agregar`, `editar`, `eliminar`, `updated_at`, `created_at`) VALUES
	(1, 1, 1, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(2, 1, 2, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(3, 1, 3, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(4, 1, 4, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(5, 1, 5, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(6, 1, 6, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(7, 1, 7, 1, 1, 1, 1, '2016-09-07 18:03:42', '2016-09-07 18:03:42'),
	(8, 2, 1, 1, 1, 1, 1, '2016-09-07 18:04:05', '2016-09-07 18:04:05'),
	(9, 2, 2, 1, 1, 1, 1, '2016-09-07 18:04:05', '2016-09-07 18:04:05'),
	(10, 2, 3, 1, 1, 1, 1, '2016-09-07 18:04:05', '2016-09-07 18:04:05'),
	(11, 2, 5, NULL, NULL, 1, NULL, '2016-09-07 18:04:05', '2016-09-07 18:04:05');
/*!40000 ALTER TABLE `role_permiso` ENABLE KEYS */;

-- Dumping structure for table laravel_auth.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_role` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active_directory` int(1) NOT NULL DEFAULT '0',
  `active_directory_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_registra` int(11) DEFAULT NULL,
  `usuario_modifica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravel_auth.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `id_role`, `name`, `email`, `password`, `active_directory`, `active_directory_user`, `remember_token`, `created_at`, `updated_at`, `usuario_registra`, `usuario_modifica`) VALUES
	(1, '1', 'Admin', 'admin@minsal.cl', '$2y$10$EfAZLj3G2V5TraQweUNu8.j81I2OMkqAcUOWB3138iy2rPigxxzUq', 0, '1', 'R5tu2DZdir35pqhad7PVqmgEUNdThvrMUrDKPV1UMFQ4qM9piJ5AmkdTQoXI', '2016-07-28 14:46:40', '2016-09-07 18:15:06', 1, 1),
	(2, '1', 'Diego da Silva', 'diego.dasilva@minsal.cl', '$2y$10$EfAZLj3G2V5TraQweUNu8.j81I2OMkqAcUOWB3138iy2rPigxxzUq', 0, '1', 'qk4i9SZv623KYPzVJ8jtApo7CfPhPcgExuKL2H4kmWLJrSlpfh7jxktuqVsg', '2016-07-28 14:46:40', '2016-09-07 18:18:38', 1, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table laravel_auth.usuario_permiso
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `visualizar` int(11) DEFAULT '1',
  `agregar` int(11) DEFAULT '1',
  `editar` int(11) DEFAULT '1',
  `eliminar` int(11) DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_permiso`),
  KEY `fk_Menu_has_Usuario_Usuario1_idx` (`id_usuario`),
  KEY `fk_Menu_has_Usuario_Menu1_idx` (`id_menu`),
  CONSTRAINT `fk_Menu_has_Usuario_Menu1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel_auth.usuario_permiso: ~14 rows (approximately)
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` (`id_usuario_permiso`, `id_usuario`, `id_menu`, `visualizar`, `agregar`, `editar`, `eliminar`, `updated_at`, `created_at`) VALUES
	(1, 2, 1, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(2, 2, 2, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(3, 2, 3, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(4, 2, 4, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(5, 2, 5, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(6, 2, 6, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(7, 2, 7, 1, 1, 1, 1, '2016-09-07 18:18:38', '2016-09-07 18:18:38'),
	(8, 1, 1, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06'),
	(9, 1, 2, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06'),
	(10, 1, 3, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06'),
	(11, 1, 4, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06'),
	(12, 1, 5, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06'),
	(13, 1, 6, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06'),
	(14, 1, 7, 1, 1, 1, 1, '2016-09-07 18:15:06', '2016-09-07 18:15:06');
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;

-- Dumping structure for view laravel_auth.vw_usuario_permiso
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_usuario_permiso` (
	`slug` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_usuario` INT(11) NULL,
	`visualizar` INT(11) NULL,
	`agregar` INT(11) NULL,
	`editar` INT(11) NULL,
	`eliminar` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view laravel_auth.vw_usuario_permiso
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_usuario_permiso`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_usuario_permiso` AS (

	SELECT
		m.slug
		, up.id_usuario
		, up.visualizar
		, up.agregar
		, up.editar
		, up.eliminar
	FROM 
		usuario_permiso up
	INNER JOIN menu m ON (m.id_menu=up.id_menu)

) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
