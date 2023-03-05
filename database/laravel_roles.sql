/*
SQLyog Ultimate v8.54 
MySQL - 5.7.36 : Database - laravel_roles
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel_roles` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `laravel_roles`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_nombre_unique` (`nombre`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`nombre`,`slug`,`descripcion`,`created_at`,`updated_at`) values (1,'Bebes','bebes','listado de bebes grandes','2023-03-05 03:46:16','2023-03-05 03:46:37'),(2,'Padres','padres','listado de Padres','2023-03-05 03:47:03','2023-03-05 03:47:03'),(3,'Madres','madres','lista','2023-03-05 03:47:15','2023-03-05 03:47:15');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `images` */

insert  into `images`(`id`,`url`,`created_at`,`updated_at`,`imageable_type`,`imageable_id`) values (1,'/imagenes/1677988190_IMG-20221231-WA0002.jpg','2023-03-05 03:49:50','2023-03-05 03:49:50','App\\Product',2);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_07_02_042514_create_roles_table',1),(5,'2020_07_02_043621_create_role_user_table',1),(6,'2020_07_02_151717_create_permissions_table',1),(7,'2020_07_02_152616_create_permission_role_table',1),(8,'2020_07_25_224028_create_categories_table',1),(9,'2020_07_25_224413_create_products_table',1),(10,'2021_01_26_154703_create_images_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`slug`,`description`,`created_at`,`updated_at`) values (1,'List role','role.index','Un usuario puede listar los role','2023-03-05 03:43:25','2023-03-05 03:43:25'),(2,'Show role','role.show','Un usuario puede ver todos los role','2023-03-05 03:43:25','2023-03-05 03:43:25'),(3,'Create role','role.create','Un usuario puede create un role','2023-03-05 03:43:25','2023-03-05 03:43:25'),(4,'Edit role','role.edit','Un usuario puede edit los role','2023-03-05 03:43:25','2023-03-05 03:43:25'),(5,'Destroy role','role.destroy','Un usuario puede destroy los role','2023-03-05 03:43:25','2023-03-05 03:43:25'),(6,'List user','user.index','Un usuario puede listar los user','2023-03-05 03:43:25','2023-03-05 03:43:25'),(7,'Show user','user.show','Un usuario puede ver todos los user','2023-03-05 03:43:25','2023-03-05 03:43:25'),(8,'Edit user','user.edit','Un usuario puede edit los user','2023-03-05 03:43:25','2023-03-05 03:43:25'),(9,'Destroy user','user.destroy','Un usuario puede destroy los user','2023-03-05 03:43:25','2023-03-05 03:43:25'),(10,'Show own user','userown.show','Un usuario puede ver su propio usuario','2023-03-05 03:43:25','2023-03-05 03:43:25'),(11,'Edit own user','userown.edit','Un usuario puede edit su propio user','2023-03-05 03:43:25','2023-03-05 03:43:25');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `cantidad` bigint(20) unsigned NOT NULL DEFAULT '0',
  `precio_actual` decimal(12,2) NOT NULL DEFAULT '0.00',
  `precio_anterior` decimal(12,2) NOT NULL DEFAULT '0.00',
  `porcentaje_descuento` int(10) unsigned NOT NULL DEFAULT '0',
  `descripcion_corta` text COLLATE utf8mb4_unicode_ci,
  `descripcion_larga` text COLLATE utf8mb4_unicode_ci,
  `especificaciones` text COLLATE utf8mb4_unicode_ci,
  `datos_de_interes` text COLLATE utf8mb4_unicode_ci,
  `visitas` int(10) unsigned NOT NULL DEFAULT '0',
  `ventas` int(10) unsigned NOT NULL DEFAULT '0',
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliderprincipal` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`nombre`,`slug`,`category_id`,`cantidad`,`precio_actual`,`precio_anterior`,`porcentaje_descuento`,`descripcion_corta`,`descripcion_larga`,`especificaciones`,`datos_de_interes`,`visitas`,`ventas`,`estado`,`activo`,`sliderprincipal`,`created_at`,`updated_at`) values (1,'perros','perros',3,10,'20.00','20.00',0,'<p>fdfdfeee</p>','<p>yyyyyyyyyyyyyyy</p>','<p>eeeee</p>','<p>tttttttttttttt</p>',0,0,'Nuevo','NO','NO','2023-03-05 03:48:55','2023-03-05 03:48:55'),(2,'Gatico','gatico',3,20,'27.00','30.00',10,'<p>fgfdg</p>','<p>fgd</p>','<p>gfgdf</p>','<p>fgdf</p>',0,0,'En Oferta','NO','SI','2023-03-05 03:49:50','2023-03-05 03:52:05');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`role_id`,`user_id`,`created_at`,`updated_at`) values (1,1,1,'2023-03-05 03:43:25','2023-03-05 03:43:25');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `full-access` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`slug`,`description`,`full-access`,`created_at`,`updated_at`) values (1,'Admin','admin','Administrador','yes','2023-03-05 03:43:25','2023-03-05 03:43:25'),(2,'Registered User','registereduser','Registered User','no','2023-03-05 03:43:25','2023-03-05 03:43:25');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'administrador','admin@admin.com',NULL,'$2y$10$0U3g3YH2HJcEGw4RgDNug.Xrthnvxp6Vm1k0VfcsICQYaKoV7yvkK',NULL,'2023-03-05 03:43:25','2023-03-05 03:53:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
