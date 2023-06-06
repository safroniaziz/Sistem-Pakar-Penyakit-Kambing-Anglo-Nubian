-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Dumping structure for table laravel.artikels
CREATE TABLE IF NOT EXISTS `artikels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.artikels: ~2 rows (approximately)
DELETE FROM `artikels`;
INSERT INTO `artikels` (`id`, `judul`, `content`, `sumber`, `created_at`, `updated_at`) VALUES
	(1, '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://www.lipsum.com/', '2023-06-04 19:16:28', '2023-06-04 19:16:28'),
	(2, 'Where can I get some?', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'https://www.lipsum.com/', '2023-06-04 19:17:01', '2023-06-04 19:17:01'),
	(3, 'Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC', '<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>', 'https://www.lipsum.com/', '2023-06-04 19:17:21', '2023-06-04 19:17:21');

-- Dumping structure for table laravel.basic_pengetahuans
CREATE TABLE IF NOT EXISTS `basic_pengetahuans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `md` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.basic_pengetahuans: ~12 rows (approximately)
DELETE FROM `basic_pengetahuans`;
INSERT INTO `basic_pengetahuans` (`id`, `kode_penyakit`, `kode_gejala`, `mb`, `md`, `created_at`, `updated_at`) VALUES
	(1, '001', '001', '1', '0', '2023-05-29 22:46:38', '2023-06-04 22:20:49'),
	(7, '001', '002', '0.8', '0', '2023-06-04 22:25:10', '2023-06-04 22:25:10'),
	(8, '001', '003', '0.85', '0', '2023-06-04 22:25:20', '2023-06-04 22:25:20'),
	(9, '001', '004', '0.75', '0.01', '2023-06-04 22:25:33', '2023-06-04 22:25:33'),
	(10, '002', '002', '0.6', '0.01', '2023-06-04 22:25:54', '2023-06-04 22:25:54'),
	(12, '002', '005', '0.8', '0', '2023-06-04 22:26:32', '2023-06-04 22:26:32'),
	(13, '002', '006', '0.95', '0', '2023-06-04 22:26:48', '2023-06-04 22:26:48'),
	(14, '002', '007', '1', '0', '2023-06-04 22:27:05', '2023-06-04 22:27:05'),
	(15, '003', '003', '0.7', '0.03', '2023-06-04 22:28:15', '2023-06-04 22:28:15'),
	(16, '003', '004', '0.9', '0.02', '2023-06-04 22:28:27', '2023-06-04 22:28:27'),
	(17, '003', '009', '0.7', '0', '2023-06-04 22:28:40', '2023-06-04 22:28:40'),
	(18, '003', '010', '1', '0', '2023-06-04 22:28:53', '2023-06-04 22:28:53'),
	(19, '004', '009', '0.85', '0.02', '2023-06-04 23:10:09', '2023-06-04 23:10:09');

-- Dumping structure for table laravel.data_gejalas
CREATE TABLE IF NOT EXISTS `data_gejalas` (
  `kode_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_gejala`),
  UNIQUE KEY `data_gejalas_kode_gejala_unique` (`kode_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.data_gejalas: ~8 rows (approximately)
DELETE FROM `data_gejalas`;
INSERT INTO `data_gejalas` (`kode_gejala`, `nama_gejala`, `foto`, `video`, `created_at`, `updated_at`) VALUES
	('001', 'Gejala A', 'gejala-1-00164758c9eb382d.jpeg', '2134re32', '2023-05-29 22:41:50', '2023-06-04 22:15:37'),
	('002', 'Gejala B', 'gejala-2-00264758cb4e07c0.png', '7ZxrYx_7Acc', '2023-05-29 22:42:12', '2023-06-04 22:15:42'),
	('003', 'Gejala C', NULL, NULL, '2023-06-04 22:15:48', '2023-06-04 22:15:48'),
	('004', 'Gejala D', NULL, NULL, '2023-06-04 22:15:54', '2023-06-04 22:15:54'),
	('005', 'Gejala E', NULL, NULL, '2023-06-04 22:16:09', '2023-06-04 22:16:09'),
	('006', 'Gejala F', NULL, NULL, '2023-06-04 22:16:15', '2023-06-04 22:16:15'),
	('007', 'Gejala G', NULL, NULL, '2023-06-04 22:16:19', '2023-06-04 22:16:19'),
	('008', 'Gejala H', NULL, NULL, '2023-06-04 22:16:30', '2023-06-04 22:16:30'),
	('009', 'Gejala I', NULL, NULL, '2023-06-04 22:16:35', '2023-06-04 22:16:35'),
	('010', 'Gejala J', NULL, NULL, '2023-06-04 22:16:41', '2023-06-04 22:16:41');

-- Dumping structure for table laravel.data_penyakits
CREATE TABLE IF NOT EXISTS `data_penyakits` (
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_penyakit`),
  UNIQUE KEY `data_penyakits_kode_penyakit_unique` (`kode_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.data_penyakits: ~4 rows (approximately)
DELETE FROM `data_penyakits`;
INSERT INTO `data_penyakits` (`kode_penyakit`, `nama_penyakit`, `deskripsi`, `foto`, `video`, `created_at`, `updated_at`) VALUES
	('001', 'Penyakit A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'penyakit-1-00164758031749f2.jpg', '7ZxrYx_7Acc', '2023-05-29 21:48:49', '2023-06-04 22:13:32'),
	('002', 'Penyakit B', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'penyakit-2-0026475804532c8d.png', '2134re32', '2023-05-29 21:49:09', '2023-06-04 22:13:39'),
	('003', 'Penyakit C', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', NULL, NULL, '2023-06-04 22:27:35', '2023-06-04 22:27:35'),
	('004', 'Penyakit D', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', NULL, NULL, '2023-06-04 23:09:57', '2023-06-04 23:09:57');

-- Dumping structure for table laravel.data_solusis
CREATE TABLE IF NOT EXISTS `data_solusis` (
  `kode_solusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_solusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_solusi`),
  UNIQUE KEY `data_solusis_kode_solusi_unique` (`kode_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.data_solusis: ~2 rows (approximately)
DELETE FROM `data_solusis`;
INSERT INTO `data_solusis` (`kode_solusi`, `nama_solusi`, `created_at`, `updated_at`) VALUES
	('001', 'Solusi 1', '2023-05-29 21:49:14', '2023-05-29 21:49:14'),
	('002', 'Solusi 2', '2023-05-29 21:49:18', '2023-05-29 21:49:18');

-- Dumping structure for table laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table laravel.hasils
CREATE TABLE IF NOT EXISTS `hasils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `kode_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_cf` double NOT NULL,
  `persentase` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.hasils: ~1 rows (approximately)
DELETE FROM `hasils`;
INSERT INTO `hasils` (`id`, `user_id`, `kode_penyakit`, `nilai_cf`, `persentase`, `created_at`, `updated_at`) VALUES
	(1, 1, '001', 0.99, 99, '2023-06-05 19:43:14', '2023-06-05 19:43:14'),
	(2, 1, '001', 0.99, 99, '2023-06-05 19:44:51', '2023-06-05 19:44:51'),
	(3, 1, '001', 0.99, 99, '2023-06-05 19:45:23', '2023-06-05 19:45:23'),
	(4, 1, '001', 0.85, 85, '2023-06-05 19:46:09', '2023-06-05 19:46:09'),
	(5, 1, '001', 0.8, 80, '2023-06-05 19:47:01', '2023-06-05 19:47:01'),
	(6, 1, '001', 1, 100, '2023-06-05 19:50:56', '2023-06-05 19:50:56'),
	(7, 1, '001', 0.8, 80, '2023-06-05 19:52:19', '2023-06-05 19:52:19'),
	(8, 1, '001', 0.8, 80, '2023-06-05 19:52:28', '2023-06-05 19:52:28'),
	(9, 1, '001', 0.8, 80, '2023-06-05 19:53:14', '2023-06-05 19:53:14'),
	(10, 1, '001', 0.8, 80, '2023-06-05 19:53:42', '2023-06-05 19:53:42'),
	(11, 1, '001', 0.8, 80, '2023-06-05 19:53:55', '2023-06-05 19:53:55'),
	(12, 1, '001', 0.8, 80, '2023-06-05 19:54:13', '2023-06-05 19:54:13'),
	(13, 1, '001', 0.8, 80, '2023-06-05 19:54:21', '2023-06-05 19:54:21'),
	(14, 1, '001', 0.8, 80, '2023-06-05 19:54:33', '2023-06-05 19:54:33'),
	(15, 1, '001', 0.8, 80, '2023-06-05 19:54:37', '2023-06-05 19:54:37'),
	(16, 1, '001', 0.8, 80, '2023-06-05 19:54:42', '2023-06-05 19:54:42'),
	(17, 1, '001', 0.8, 80, '2023-06-05 19:54:49', '2023-06-05 19:54:49'),
	(18, 1, '001', 0.8, 80, '2023-06-05 19:54:55', '2023-06-05 19:54:55'),
	(19, 1, '001', 0.8, 80, '2023-06-05 19:55:22', '2023-06-05 19:55:22'),
	(20, 1, '001', 0.8, 80, '2023-06-05 19:55:32', '2023-06-05 19:55:32'),
	(21, 1, '001', 0.8, 80, '2023-06-05 19:55:41', '2023-06-05 19:55:41'),
	(22, 1, '001', 1, 100, '2023-06-05 19:55:45', '2023-06-05 19:55:45'),
	(23, 1, '001', 1, 100, '2023-06-05 19:56:08', '2023-06-05 19:56:08'),
	(24, 1, '001', 0.85, 85, '2023-06-05 19:56:11', '2023-06-05 19:56:11'),
	(25, 1, '001', 0.85, 85, '2023-06-05 19:56:27', '2023-06-05 19:56:27'),
	(26, 1, '001', 0.85, 85, '2023-06-05 19:57:04', '2023-06-05 19:57:04'),
	(27, 1, '001', 0.85, 85, '2023-06-05 19:57:19', '2023-06-05 19:57:19'),
	(28, 1, '001', 0.85, 85, '2023-06-05 19:57:46', '2023-06-05 19:57:46'),
	(29, 1, '001', 0.85, 85, '2023-06-05 19:58:01', '2023-06-05 19:58:01'),
	(30, 1, '001', 0.85, 85, '2023-06-05 19:58:31', '2023-06-05 19:58:31'),
	(31, 1, '001', 0.85, 85, '2023-06-05 19:59:59', '2023-06-05 19:59:59'),
	(32, 1, '001', 0.85, 85, '2023-06-05 20:00:13', '2023-06-05 20:00:13'),
	(33, 1, '001', 0.85, 85, '2023-06-05 20:01:07', '2023-06-05 20:01:07'),
	(34, 1, '001', 0.85, 85, '2023-06-05 20:01:36', '2023-06-05 20:01:36'),
	(35, 1, '001', 0.85, 85, '2023-06-05 20:01:57', '2023-06-05 20:01:57'),
	(36, 1, '001', 0.85, 85, '2023-06-05 20:02:03', '2023-06-05 20:02:03'),
	(37, 1, '001', 0.85, 85, '2023-06-05 20:03:21', '2023-06-05 20:03:21'),
	(38, 1, '001', 0.85, 85, '2023-06-05 20:04:03', '2023-06-05 20:04:03'),
	(39, 1, '001', 0.85, 85, '2023-06-05 20:04:21', '2023-06-05 20:04:21'),
	(40, 1, '001', 0.85, 85, '2023-06-05 20:05:02', '2023-06-05 20:05:02'),
	(41, 1, '001', 0.85, 85, '2023-06-05 20:05:12', '2023-06-05 20:05:12'),
	(42, 1, '001', 0.85, 85, '2023-06-05 20:08:08', '2023-06-05 20:08:08'),
	(43, 1, '001', 0.85, 85, '2023-06-05 20:08:45', '2023-06-05 20:08:45'),
	(44, 1, '001', 0.99, 99, '2023-06-06 01:09:40', '2023-06-06 01:09:40');

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~11 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_05_06_115731_create_artikels_table', 1),
	(7, '2023_05_27_120049_create_data_penyakits_table', 1),
	(8, '2023_05_29_045410_create_data_gejalas_table', 1),
	(9, '2023_05_29_064717_create_data_solusis_table', 1),
	(10, '2023_05_30_021909_create_penanganan_penyakits_table', 1),
	(11, '2023_05_30_050838_create_basic_pengetahuans_table', 2),
	(12, '2023_06_05_151352_create_hasils_table', 3);

-- Dumping structure for table laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table laravel.penanganan_penyakits
CREATE TABLE IF NOT EXISTS `penanganan_penyakits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penyakit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solusi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.penanganan_penyakits: ~4 rows (approximately)
DELETE FROM `penanganan_penyakits`;
INSERT INTO `penanganan_penyakits` (`id`, `penyakit_id`, `solusi_id`, `created_at`, `updated_at`) VALUES
	(1, '001', '001', '2023-05-29 21:49:34', '2023-05-29 21:49:34'),
	(2, '001', '002', '2023-05-29 21:50:31', '2023-05-29 21:50:31'),
	(3, '002', '001', '2023-05-29 21:50:38', '2023-05-29 21:50:44');

-- Dumping structure for table laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_kode_pengguna_unique` (`kode_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `kode_pengguna`, `nama_pengguna`, `jenis_kelamin`, `email`, `email_verified_at`, `password`, `alamat`, `pekerjaan`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, '001', 'Safroni Aziz Suprianto', 'L', 'safroni.aziz@gmail.com', NULL, '$2y$10$ThW82NF26NaAunUrhFz0OuPgeNKTt.R66oiH1q7eIDVdSDmw4XRnm', 'Bengkulu', 'Programmer', 'user', NULL, '2023-06-04 21:45:48', '2023-06-04 21:45:48'),
	(3, '002', 'Administrator', 'L', 'administrator@example.com', '2023-06-05 20:27:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'dgcXBOBxhb', '2023-06-05 20:27:17', '2023-06-05 20:27:17');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
