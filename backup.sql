-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: transpro
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `camiones`
--

DROP TABLE IF EXISTS `camiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `camiones` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `placa` varchar(20) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `capacidad` decimal(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `camiones`
--

LOCK TABLES `camiones` WRITE;
/*!40000 ALTER TABLE `camiones` DISABLE KEYS */;
INSERT INTO `camiones` VALUES (1,'K123','NIG123',2000.00,'disponible','2026-05-06 07:38:45','2026-05-06 07:38:45'),(2,'M190','GHR-312',1500.00,'disponible','2026-05-06 07:39:07','2026-05-06 07:39:07'),(3,'ZXC1234','XTZ5000',2500.00,'disponible','2026-05-06 07:39:24','2026-05-06 07:39:24'),(4,'F1233','SMASHER123',10000.00,'disponible','2026-05-22 10:38:58','2026-05-22 10:38:58');
/*!40000 ALTER TABLE `camiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (10,'Cris','cris@gmail.com','5456012','16 calle 6a. Avenida','2026-04-28 10:29:47','2026-05-01 06:00:30'),(13,'Cristal','cristal@gmail.com','5456012','20 calle','2026-05-14 05:09:08','2026-05-14 05:09:08'),(14,'Jose','jose@gmail.com','123123','20 calle','2026-05-14 05:09:29','2026-05-14 05:09:29'),(15,'Yuni','yuni@gmail.com','123123','20 calle','2026-05-14 05:09:55','2026-05-14 05:09:55'),(16,'Austin','austin@gmail.com','123123','20 calle','2026-05-14 05:12:12','2026-05-14 05:12:12'),(17,'Linton','linton@gmail.com','123123','20 calle','2026-05-14 05:12:31','2026-05-14 05:12:31');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entregas`
--

DROP TABLE IF EXISTS `entregas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entregas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `viaje_id` bigint DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'pendiente',
  `firma_digital` text,
  `fecha_entrega` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `viaje_id` (`viaje_id`),
  CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`viaje_id`) REFERENCES `viajes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregas`
--

LOCK TABLES `entregas` WRITE;
/*!40000 ALTER TABLE `entregas` DISABLE KEYS */;
/*!40000 ALTER TABLE `entregas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evidencias`
--

DROP TABLE IF EXISTS `evidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evidencias` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `entrega_id` bigint DEFAULT NULL,
  `foto_url` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entrega_id` (`entrega_id`),
  CONSTRAINT `evidencias_ibfk_1` FOREIGN KEY (`entrega_id`) REFERENCES `entregas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evidencias`
--

LOCK TABLES `evidencias` WRITE;
/*!40000 ALTER TABLE `evidencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `evidencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_28_033359_add_role_to_users_table',2),(5,'2026_05_14_000922_create_viaje_historials_table',3),(6,'2026_05_17_222312_add_firma_to_viajes_table',4),(7,'2026_05_18_000411_add_codigo_guia_to_viajes_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pilotos`
--

DROP TABLE IF EXISTS `pilotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pilotos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `licencia` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilotos`
--

LOCK TABLES `pilotos` WRITE;
/*!40000 ALTER TABLE `pilotos` DISABLE KEYS */;
INSERT INTO `pilotos` VALUES (1,'Yerma','1A','123123123','activo','2026-05-06 07:40:01','2026-05-06 07:40:01'),(2,'Pedro','2A','123123','activo','2026-05-14 05:10:38','2026-05-14 05:10:38'),(3,'Kendrick','1B','123123','activo','2026-05-14 05:10:59','2026-05-14 05:10:59'),(4,'Lenny','1A','123123','activo','2026-05-22 10:12:51','2026-05-22 10:12:51'),(5,'Scott','2A','123123','activo','2026-05-22 10:13:06','2026-05-22 10:13:06'),(6,'Benny','1A','123123','activo','2026-05-22 10:13:27','2026-05-22 10:13:27');
/*!40000 ALTER TABLE `pilotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('UwUOiVo8835eL9heBKoBidi1lTTwv1PjgzHpgZzy',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJQbTVCVDZ4bjRjczJENEVzYW9RUzllMTllOU1abjAwYmU5a1B1UE9SIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvdHJhbnNwcm8udGVzdFwvc2VndWltaWVudG9cL1RSWC05OTU0NTMiLCJyb3V0ZSI6bnVsbH19',1779067873);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2026-04-28 07:35:12','$2y$12$hIOKJKlQmEmuNZlnk1DNX.pNYAI.qRL8eDUQ50/sGZr3VP0dWNQhi','i2ZST2fABX','2026-04-28 07:35:13','2026-04-28 07:35:13','admin'),(2,'Cris','cristophercast70@gmail.com',NULL,'$2y$12$1cARc0srHTzxvgaYHgUBD./y0.Mcut.eTEWKhoU5A3jPaUDijg0tO',NULL,'2026-04-28 09:07:40','2026-04-28 09:07:40','admin'),(3,'Cris123','cris@gmail.com',NULL,'$2y$12$5pAnfY6ZyX0ja.pPh0j.sOK4bmuemCHQKrOVMm25BHHmYP3MSck4K',NULL,'2026-04-28 09:49:25','2026-04-28 09:49:25','cliente'),(9,'cristal','cristi@gmail.com',NULL,'$2y$12$LWTW1yWwlWc.0yISy/0/qeaR6fByeoD1Wbhk5vWiTePjfIQRQpWJ2',NULL,'2026-05-16 22:46:24','2026-05-16 22:46:24','operador');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viaje_historials`
--

DROP TABLE IF EXISTS `viaje_historials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viaje_historials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `viaje_id` bigint NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `viaje_historials_viaje_id_foreign` (`viaje_id`),
  CONSTRAINT `viaje_historials_viaje_id_foreign` FOREIGN KEY (`viaje_id`) REFERENCES `viajes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viaje_historials`
--

LOCK TABLES `viaje_historials` WRITE;
/*!40000 ALTER TABLE `viaje_historials` DISABLE KEYS */;
INSERT INTO `viaje_historials` VALUES (142,84,'en_ruta','? Viaje creado en el sistema','2026-05-21 07:41:06','2026-05-21 07:41:06'),(143,84,'en_ruta','?‍✈️ Piloto asignado: Yerma','2026-05-21 07:41:06','2026-05-21 07:41:06'),(144,84,'en_ruta','? Camión asignado: K123','2026-05-21 07:41:06','2026-05-21 07:41:06'),(145,85,'pendiente','? Viaje creado en el sistema','2026-05-21 07:41:28','2026-05-21 07:41:28'),(146,85,'pendiente','?‍✈️ Piloto asignado: Yerma','2026-05-21 07:41:28','2026-05-21 07:41:28'),(147,85,'pendiente','? Camión asignado: M190','2026-05-21 07:41:28','2026-05-21 07:41:28'),(148,85,'aprobado','✅ Operador aprobó el viaje','2026-05-21 08:54:53','2026-05-21 08:54:53'),(149,85,'en_ruta','? Viaje puesto en tránsito','2026-05-21 09:00:17','2026-05-21 09:00:17'),(150,85,'en_ruta','?‍✈️ Piloto asignado: Yerma','2026-05-21 09:00:17','2026-05-21 09:00:17'),(151,85,'en_ruta','? Camión asignado: M190','2026-05-21 09:00:17','2026-05-21 09:00:17'),(152,86,'en_ruta','? Viaje creado en el sistema','2026-05-21 09:18:20','2026-05-21 09:18:20'),(153,87,'pendiente','? Viaje creado en el sistema','2026-05-21 09:24:33','2026-05-21 09:24:33'),(154,87,'rechazado','❌ Operador rechazó el viaje','2026-05-21 09:24:42','2026-05-21 09:24:42'),(155,84,'pendiente','? Estado actualizado de \"completado\" a \"pendiente\"','2026-05-21 09:49:01','2026-05-21 09:49:01'),(156,84,'cancelado','? Viaje cancelado por operador','2026-05-21 09:49:10','2026-05-21 09:49:10'),(157,88,'pendiente','? Viaje creado en el sistema','2026-05-22 09:46:07','2026-05-22 09:46:07'),(158,88,'pendiente','?‍✈️ Piloto asignado: Yerma','2026-05-22 09:46:07','2026-05-22 09:46:07'),(159,88,'pendiente','? Camión asignado: K123','2026-05-22 09:46:07','2026-05-22 09:46:07'),(160,84,'pendiente','? Estado actualizado de \"cancelado\" a \"pendiente\"','2026-05-22 09:46:22','2026-05-22 09:46:22'),(161,84,'pendiente','✏️ Información del viaje actualizada','2026-05-22 09:46:26','2026-05-22 09:46:26'),(162,89,'pendiente','? Viaje creado en el sistema','2026-05-22 09:53:52','2026-05-22 09:53:52'),(163,90,'pendiente','? Viaje creado en el sistema','2026-05-22 11:45:49','2026-05-22 11:45:49'),(164,90,'pendiente','✏️ Información del viaje actualizada','2026-05-22 11:46:05','2026-05-22 11:46:05'),(165,90,'rechazado','❌ Operador rechazó el viaje','2026-05-22 11:56:51','2026-05-22 11:56:51');
/*!40000 ALTER TABLE `viaje_historials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viajes`
--

DROP TABLE IF EXISTS `viajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viajes` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `codigo_guia` varchar(255) DEFAULT NULL,
  `cliente_id` bigint DEFAULT NULL,
  `piloto_id` bigint DEFAULT NULL,
  `camion_id` bigint DEFAULT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `fecha_llegada` datetime DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `lat_origen` decimal(10,8) DEFAULT NULL,
  `lng_origen` decimal(11,8) DEFAULT NULL,
  `lat_destino` decimal(10,8) DEFAULT NULL,
  `lng_destino` decimal(11,8) DEFAULT NULL,
  `firma_cliente` varchar(255) DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `recibido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `viajes_codigo_guia_unique` (`codigo_guia`),
  KEY `cliente_id` (`cliente_id`),
  KEY `piloto_id` (`piloto_id`),
  KEY `camion_id` (`camion_id`),
  CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`piloto_id`) REFERENCES `pilotos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`camion_id`) REFERENCES `camiones` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viajes`
--

LOCK TABLES `viajes` WRITE;
/*!40000 ALTER TABLE `viajes` DISABLE KEYS */;
INSERT INTO `viajes` VALUES (84,'TRX-289FA7',10,NULL,NULL,'Cobán, Alta Verapaz, Guatemala','Puerto Barrios, Izabal, Guatemala',NULL,NULL,'pendiente','2026-05-21 07:41:06','2026-05-22 09:46:26',NULL,NULL,15.47020010,-90.37350650,15.72751540,-88.59525060,'firmas/firma_1779327761.png','2026-05-21 07:42:41',1),(85,'TRX-83F781',10,1,2,'Cobán, Alta Verapaz, Guatemala','Ciudad de Guatemala, Departamento de Guatemala, Guatemala',NULL,NULL,'completado','2026-05-21 07:41:28','2026-05-21 09:13:18',NULL,NULL,15.47020010,-90.37350650,14.64161420,-90.51328360,'firmas/firma_1779333198.png','2026-05-21 09:13:18',1),(86,'TRX-C43085',10,NULL,NULL,'Petén, Guatemala','Barrio Santa Cruz, Melchor de Mencos, Petén, Guatemala',NULL,NULL,'en_ruta','2026-05-21 09:18:20','2026-05-21 09:18:20',NULL,NULL,16.83179060,-90.04506370,17.05028670,-89.17005480,NULL,NULL,0),(87,'TRX-195B9A',10,NULL,NULL,'Petén, Guatemala','Finca El Paraiso -Custodios de la Selva-, Puente de Cuerda, Melchor de Mencos, Petén, Guatemala',NULL,NULL,'completado','2026-05-21 09:24:33','2026-05-21 09:48:08',NULL,NULL,16.83179060,-90.04506370,17.00260120,-89.17843420,'firmas/firma_1779335288.png','2026-05-21 09:48:08',1),(88,'TRX-F2BAB7',10,1,1,'Petén, Guatemala','Puerto, Santa Catalina-Canteras, Las Palmas de Gran Canaria, Las Palmas, Canarias, 35007, España',NULL,NULL,'pendiente','2026-05-22 09:46:07','2026-05-22 09:46:07',NULL,NULL,16.83179060,-90.04506370,28.14169420,-15.43181720,NULL,NULL,0),(89,'TRX-0193D3',10,NULL,NULL,'Guatemala','Puerto Barrios, Izabal, Guatemala',NULL,NULL,'pendiente','2026-05-22 09:53:52','2026-05-22 09:53:52',NULL,NULL,15.58555450,-90.34575900,15.72751540,-88.59525060,NULL,NULL,0),(90,'TRX-D67FB8',10,NULL,NULL,'Ciudad de Guatemala, Departamento de Guatemala, Guatemala','Zona 11, Ciudad de Guatemala, Departamento de Guatemala, 01011, Guatemala',NULL,NULL,'rechazado','2026-05-22 11:45:49','2026-05-22 11:56:51',NULL,NULL,14.64161420,-90.51328360,14.61005680,-90.55111140,NULL,NULL,0);
/*!40000 ALTER TABLE `viajes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-22  0:06:42
