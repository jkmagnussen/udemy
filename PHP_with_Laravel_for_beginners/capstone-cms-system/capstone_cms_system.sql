-- -------------------------------------------------------------
-- TablePlus 5.1.2(472)
--
-- https://tableplus.com/
--
-- Database: capstone_cms_system
-- Generation Time: 2023-05-27 14:56:16.6700
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permission_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_image` text DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_19_234859_create_posts_table', 2),
(6, '2023_01_29_150931_create_permissions_table', 3),
(7, '2023_01_29_151022_create_roles_table', 3),
(8, '2023_01_29_151803_create_users_permissions_table', 3),
(9, '2023_01_29_151938_create_users_roles_table', 3),
(10, '2023_01_29_152313_create_roles_permissions_table', 3);

INSERT INTO `permission_role` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'View Dashboard', 'view-dashboard', '2023-01-29 19:48:07', '2023-01-29 19:48:07');

INSERT INTO `posts` (`id`, `user_id`, `title`, `post_image`, `body`, `created_at`, `updated_at`) VALUES
(12, 1, 'Loz Babutini', 'images/ieDDZG6kEraJQDWTLRuHRpwSvRS8DKhGRdW7MTLF.png', 'Babutini', '2023-01-21 15:06:50', '2023-01-28 21:46:35'),
(13, 1, 'LA BEAST', 'images/MpTidhqYaO0PzVOeJdTJuP2XO080hP4RE6RxUvZs.png', 'WAFFLES', '2023-01-24 16:49:35', '2023-01-24 16:49:35'),
(14, 1, 'testingonetwo', 'images/OPgf903L9udC0HUsyK97CJl5RS0CFCDmstbeAIXA.png', 'thisisa tester', '2023-01-24 17:02:12', '2023-01-24 17:02:12'),
(15, 1, 'Joey Diaz', 'images/3e1Kd91KEmwg0cLPorGCLRJgbDXUKUT8JiREwdqM.jpg', 'Blue Cheese Yo', '2023-01-24 22:21:24', '2023-01-24 22:21:24'),
(16, 1, 'Loz Babu (Baz)', 'images/myrEv6IAqUO4H5gARUZQgsTuTJqoxcxLd04ufrOm.jpg', 'Bitchini - Babutini', '2023-01-24 22:24:11', '2023-04-12 14:38:32'),
(17, 1, 'John Malkovich', 'images/5vfbpp3SUO1xPnc9phtHmLrNNFN8tnJy36Qow8yd.webp', 'John Malkovich in John Malkovich', '2023-01-24 22:28:42', '2023-01-24 22:28:42'),
(18, 1, 'Testing Any', 'images/tn9IPQRrcCcpOElTkxKJ5sIqHsxc9mERwoiobVaB.jpg', 'Austrian Oak, testing one two', '2023-01-24 22:34:12', '2023-01-24 22:34:12'),
(19, 1, 'This is a tester 3, 4', 'images/jOqRudHnSXpqLUBVTwmrrdvhJKysa7Jlgf5nAQFq.png', 'LA BEAST TESTER', '2023-01-24 22:36:52', '2023-01-24 22:36:52'),
(20, 1, 'LAST OF US', 'images/HQ75CyuUxBfQuhMCoxhoZDq1ybJpLKwxueN3Gotm.jpg', 'THIS IS A TESTER - LAST OF US', '2023-01-24 22:42:00', '2023-01-24 22:42:00'),
(22, 1, 'Beard Meats Food', 'images/I3w2BerFamGdqUYIeYpVi9V2rIAoO7ob23NruSaC.jpg', 'Beard Meats Food  tester', '2023-01-28 22:59:11', '2023-01-28 22:59:11');

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2023-01-29 18:20:24', '2023-01-29 18:20:24'),
(3, 'Author', 'author', '2023-03-20 22:58:40', '2023-03-20 22:58:40'),
(4, 'Subscriber', 'subscriber', '2023-03-20 22:59:10', '2023-03-20 22:59:10'),
(9, 'Manager', 'manager', '2023-05-05 14:26:53', '2023-05-05 14:26:53');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `avatar`) VALUES
(1, 'joe magnussen', 'jkmagnussen@icloud.com', NULL, '$2y$10$RlwZ/RiLOreqRinoqUtGmuTAjrHwjp2WuO5W.a9kIFeHE7bxIBpYC', 'DE2Igo6P0f22mnd7MfDj50OoiOaOShkn4fbCwuKlW9wlwg1TRu1MWjBg27uZ', '2023-01-19 22:54:31', '2023-02-03 15:11:39', 'jkmagnussen', 'images/Wy1Xf4WnZOyoDJKyLG68dSyj66uZSYT4Cn2CU8HE.jpg'),
(4, 'Kyleigh Koepp Jr.', 'schuppe.amani@example.com', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'a8dKp2YaTZ', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(6, 'Freeda Pfeffer', 'kuhn.bonnie@example.org', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UfDIBJRWOj', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(7, 'Mr. Brain Moen V', 'rhand@example.net', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7pXUM3BMnp', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(8, 'Mrs. Althea Murray DVM', 'reynolds.gay@example.org', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pPr0NcQJM4', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(9, 'Prof. Florine Cormier', 'gibson.sydney@example.net', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XBYzXux6TU', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(10, 'Hulda Zboncak Jr.', 'dan28@example.org', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AMxXxoGbVl', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(11, 'Mr. Cyril Bartell DVM', 'treutel.alia@example.com', '2023-01-20 13:26:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rWy090850q', '2023-01-20 13:26:54', '2023-01-20 13:26:54', '', NULL),
(12, 'Loz', 'loz@loz.com', NULL, '$2y$10$DY5K7fbK.6pSsCct4zX1f.YQTgXANFHk9UQvgsN.NZgIhlmjdtw3m', NULL, '2023-01-31 00:00:34', '2023-01-31 00:00:34', '', NULL),
(13, 'Babu', 'jkmagnussen@outlook.com', NULL, '$2y$10$wLfE21g4V.BZqcfNQKuQu.SfBQoIBaZX/XsoqF0tFp.SWMINpSCuu', NULL, '2023-01-31 00:11:39', '2023-01-31 00:11:39', 'Loz', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;