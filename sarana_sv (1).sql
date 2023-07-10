-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2023 at 01:23 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarana_sv`
--

-- --------------------------------------------------------

--
-- Table structure for table `alats`
--

CREATE TABLE `alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_inventaris` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_alat_id` bigint(20) UNSIGNED NOT NULL,
  `gedung_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alats`
--

INSERT INTO `alats` (`id`, `nama_alat`, `no_inventaris`, `created_at`, `updated_at`, `foto_alat_id`, `gedung_id`) VALUES
(1, 'TV', '02716641261212', '2023-07-06 00:10:37', '2023-07-06 00:10:37', 1, 1),
(2, 'TV', '02716641261213', '2023-07-06 00:10:38', '2023-07-06 00:10:38', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_alats`
--

CREATE TABLE `foto_alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_alats`
--

INSERT INTO `foto_alats` (`id`, `nama_foto`, `created_at`, `updated_at`) VALUES
(1, '1', '2023-07-06 00:10:37', '2023-07-06 00:10:37'),
(2, '1', '2023-07-06 00:10:37', '2023-07-06 00:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `foto_ruangs`
--

CREATE TABLE `foto_ruangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_ruangs`
--

INSERT INTO `foto_ruangs` (`id`, `nama_foto`, `created_at`, `updated_at`) VALUES
(1, '1', '2023-07-06 00:10:39', '2023-07-06 00:10:39'),
(2, '1', '2023-07-06 00:10:39', '2023-07-06 00:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `gedungs`
--

CREATE TABLE `gedungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lokasi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gedungs`
--

INSERT INTO `gedungs` (`id`, `nama_gedung`, `created_at`, `updated_at`, `lokasi_id`) VALUES
(1, 'Gedung A', '2023-07-06 00:10:36', '2023-07-06 00:10:36', 1),
(2, 'Gedung B', '2023-07-06 00:10:37', '2023-07-06 00:10:37', 1),
(3, 'Gedung A', '2023-07-06 00:10:37', '2023-07-06 00:10:37', 2),
(4, 'Gedung B', '2023-07-06 00:10:37', '2023-07-06 00:10:37', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_acaras`
--

CREATE TABLE `jenis_acaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_acara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_acaras`
--

INSERT INTO `jenis_acaras` (`id`, `nama_jenis_acara`, `created_at`, `updated_at`) VALUES
(1, 'Perkuliahan', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(2, 'Non Perkuliahan', '2023-07-06 00:10:36', '2023-07-06 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraans`
--

CREATE TABLE `jenis_kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kendaraans`
--

INSERT INTO `jenis_kendaraans` (`id`, `nama_jenis_kendaraan`, `created_at`, `updated_at`) VALUES
(1, 'mobil', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(2, 'motor', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(3, 'truck', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(4, 'bus', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(5, 'ambulance', '2023-07-06 00:10:36', '2023-07-06 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_polisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gedung_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kendaraan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `no_polisi`, `kapasitas`, `created_at`, `updated_at`, `gedung_id`, `jenis_kendaraan_id`) VALUES
(1, 'AD 4538 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 1, 1),
(2, 'AD 4537 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 2, 1),
(3, 'AD 4536 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 1, 1),
(4, 'AD 4535 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 2, 1),
(5, 'AD 4534 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 1, 1),
(6, 'AD 4533 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 2, 1),
(7, 'AD 4532 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 1, 1),
(8, 'AD 4531 BA', 5, '2023-07-06 00:10:37', '2023-07-06 00:10:37', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasis`
--

INSERT INTO `lokasis` (`id`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Kampus Tirtomoyo', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(2, 'Kampus Mesen', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(3, 'Kampus Pabelan', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(4, 'Kampus Purwosari', '2023-07-06 00:10:36', '2023-07-06 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_03_07_035410_create_roles_table', 1),
(5, '2023_03_07_035410_create_units_table', 1),
(6, '2023_03_07_035411_create_users_table', 1),
(7, '2023_03_07_035439_create_periodes_table', 1),
(8, '2023_03_07_035525_create_sesis_table', 1),
(9, '2023_03_07_035708_create_jenis_acaras_table', 1),
(10, '2023_03_07_035735_create_jenis_kendaraans_table', 1),
(11, '2023_03_07_035812_create_foto_ruangs_table', 1),
(12, '2023_03_07_035831_create_lokasis_table', 1),
(13, '2023_03_07_035856_create_foto_alats_table', 1),
(14, '2023_03_07_035934_create_gedungs_table', 1),
(15, '2023_03_07_035955_create_kendaraans_table', 1),
(16, '2023_03_07_040027_create_alats_table', 1),
(17, '2023_03_07_040053_create_ruangs_table', 1),
(18, '2023_03_07_040140_create_reservasi_alats_table', 1),
(19, '2023_03_07_040206_create_reservasi_ruangs_table', 1),
(20, '2023_03_07_040245_create_reservasi_kendaraans_table', 1),
(21, '2023_03_13_042644_create_reservasi_ruang_sesi_table', 1),
(22, '2023_05_11_065851_add_soft_delete_column_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_periode` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `tahun_periode`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 2020, 'Ganjil', 'Aktif', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(2, 2020, 'Genap', 'Non Aktif', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(3, 2021, 'Ganjil', 'Non Aktif', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(4, 2021, 'Genap', 'Non Aktif', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(5, 2022, 'Ganjil', 'Non Aktif', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(6, 2022, 'Genap', 'Non Aktif', '2023-07-06 00:10:36', '2023-07-06 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_alats`
--

CREATE TABLE `reservasi_alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_reservasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `alat_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_kendaraans`
--

CREATE TABLE `reservasi_kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_reservasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `kendaraan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_ruangs`
--

CREATE TABLE `reservasi_ruangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_reservasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ruang_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_acara_id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_ruang_sesi`
--

CREATE TABLE `reservasi_ruang_sesi` (
  `reservasi_ruang_id` bigint(20) UNSIGNED NOT NULL,
  `sesi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '2023-07-06 00:10:38', '2023-07-06 00:10:38'),
(2, 'Admin', '2023-07-06 00:10:38', '2023-07-06 00:10:38'),
(3, 'Staff', '2023-07-06 00:10:38', '2023-07-06 00:10:38'),
(4, 'Mahasiswa', '2023-07-06 00:10:38', '2023-07-06 00:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `ruangs`
--

CREATE TABLE `ruangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_ruang_id` bigint(20) UNSIGNED NOT NULL,
  `gedung_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangs`
--

INSERT INTO `ruangs` (`id`, `no_ruang`, `nama_ruang`, `fasilitas`, `kapasitas`, `created_at`, `updated_at`, `foto_ruang_id`, `gedung_id`) VALUES
(1, '219753567', 'Ruangan A', 'tv,LCD,meja,kursi', 25, '2023-07-06 00:10:39', '2023-07-06 00:10:39', 1, 1),
(2, '219753568', 'Ruangan B', 'tv,LCD,meja,kursi', 25, '2023-07-06 00:10:39', '2023-07-06 00:10:39', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sesis`
--

CREATE TABLE `sesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesis`
--

INSERT INTO `sesis` (`id`, `sesi`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, '1', 'Senin', '07.30', '08.20 ', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(2, '2', 'Senin', '08.25', '09.15 ', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(3, '3', 'Senin', '09:20 ', '10:10 ', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(4, '4', 'Senin', '10:15 ', '11.05 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(5, '5', 'Senin', '11:10 ', '12:00 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(6, '6', 'Senin', '13:00', '13:50', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(7, '7', 'Senin', '13:55', '14:45', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(8, '8', 'Senin', '15:30', '16:20', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(9, '9', 'Senin', '16:25', '17:15', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(10, '10', 'Senin', '17:20', '18:10', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(11, '11', 'Senin', '18:15', '19:05 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(12, '12', 'Senin', '19:10', '20:00', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(13, '1', 'Selasa', '07.30', '08.20 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(14, '2', 'Selasa', '08.25', '09.15 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(15, '3', 'Selasa', '09:20 ', '10:10 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(16, '4', 'Selasa', '10:15 ', '11.05 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(17, '5', 'Selasa', '11:10 ', '12:00 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(18, '6', 'Selasa', '13:00', '13:50', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(19, '7', 'Selasa', '13:55', '14:45', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(20, '8', 'Selasa', '15:30', '16:20', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(21, '9', 'Selasa', '16:25', '17:15', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(22, '10', 'Selasa', '17:20', '18:10', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(23, '11', 'Selasa', '18:15', '19:05 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(24, '12', 'Selasa', '19:10', '20:00', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(25, '1', 'Rabu', '07.30', '08.20 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(26, '2', 'Rabu', '08.25', '09.15 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(27, '3', 'Rabu', '09:20 ', '10:10 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(28, '4', 'Rabu', '10:15 ', '11.05 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(29, '5', 'Rabu', '11:10 ', '12:00 ', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(30, '6', 'Rabu', '13:00', '13:50', '2023-07-06 00:10:34', '2023-07-06 00:10:34'),
(31, '7', 'Rabu', '13:55', '14:45', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(32, '8', 'Rabu', '15:30', '16:20', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(33, '9', 'Rabu', '16:25', '17:15', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(34, '10', 'Rabu', '17:20', '18:10', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(35, '11', 'Rabu', '18:15', '19:05 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(36, '12', 'Rabu', '19:10', '20:00', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(37, '1', 'Kamis', '07.30', '08.20 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(38, '2', 'Kamis', '08.25', '09.15 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(39, '3', 'Kamis', '09:20 ', '10:10 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(40, '4', 'Kamis', '10:15 ', '11.05 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(41, '5', 'Kamis', '11:10 ', '12:00 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(42, '6', 'Kamis', '13:00', '13:50', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(43, '7', 'Kamis', '13:55', '14:45', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(44, '8', 'Kamis', '15:30', '16:20', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(45, '9', 'Kamis', '16:25', '17:15', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(46, '10', 'Kamis', '17:20', '18:10', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(47, '11', 'Kamis', '18:15', '19:05 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(48, '12', 'Kamis', '19:10', '20:00', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(49, '1', 'Jumat', '07.30', '08.20 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(50, '2', 'Jumat', '08.25', '09.15 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(51, '3', 'Jumat', '09:20 ', '10:10 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(52, '4', 'Jumat', '10:15 ', '11.05 ', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(53, '5', 'Jumat', '13:00', '13:50', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(54, '6', 'Jumat', '13:55', '14:45', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(55, '7', 'Jumat', '15:30', '16:20', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(56, '8', 'umat', '16:25', '17:15', '2023-07-06 00:10:35', '2023-07-06 00:10:35'),
(57, '9', 'Jumat', '17:20', '18:10', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(58, '10', 'Jumat', '18:15', '19:05 ', '2023-07-06 00:10:36', '2023-07-06 00:10:36'),
(59, '11', 'Jumat', '19:10', '20:00', '2023-07-06 00:10:36', '2023-07-06 00:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `nama_unit`, `telepon`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Sekolah Vokasi', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(2, 'D-3 Teknik Kimia', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(3, 'D-3 Perpajakan', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(4, 'D-3 Bahasa Inggris', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(5, 'D-3 Teknik Sipil', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(6, 'D-3 Manajemen Perdagangan', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(7, 'D-3 Bahasa Mandarin', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:32', '2023-07-06 00:10:32'),
(8, 'D-3 Teknik Informatika', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(9, 'D-3 Manajemen Pemasaran', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(10, 'D-3 Desain Komunikasi Visual', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(11, 'D-3 Teknik Mesin', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(12, 'D-3 Manajemen Bisnis', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(13, 'D-3 Komunikasi Terapan', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(14, 'D-3 Budidaya Ternak', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(15, 'D-3 Keuangan Perbankan', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(16, 'D-3 Usaha Perjalanan Wisata', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(17, 'D-3 Teknologi Hasil Pertanian', '0271664126', 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(18, 'D-3 Akuntansi', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(19, 'D-3 Manajemen Administrasi', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(20, 'D-3 Agribisnis', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(21, 'D-3 Farmasi', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(22, 'D-3 Perpustakaan', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(23, 'D-3 Kebidanan', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(24, 'D-3 Teknik Informatika PSDKU', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(25, 'D-3 Akuntansi PSDKU', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(26, 'D-3 Teknologi Hasil Pertanian PSDKU', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(27, 'D-4 Keselamatan dan Kesehatan Kerja', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33'),
(28, 'D-4 Demografi dan Pencatatan Sipil', '0271664126', 'vokasi@unit.uns.ac.id', '2023-07-06 00:10:33', '2023-07-06 00:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nomor_induk`, `email`, `password`, `nama_foto`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `unit_id`, `role_id`, `deleted_at`) VALUES
(1, 'Superadmin', '001', 'superadmin@email.com', '$2y$10$.x5o4rVcpHZWgTrxSSJLAuhcdZDSOYwfh7RUm9eZVVT219LYVzR3K', NULL, '2023-07-06 00:10:38', NULL, '2023-07-06 00:10:38', '2023-07-06 00:10:38', 1, 1, NULL),
(2, 'Admin', '002', 'admin@email.com', '$2y$10$tnidvENvXb6vYUgBT17ARO55EK766ya3/AbfjI0qrFIKtb3DT5voW', NULL, '2023-07-06 00:10:38', NULL, '2023-07-06 00:10:38', '2023-07-06 00:10:38', 2, 2, NULL),
(3, 'Staff', '003', 'staff@email.com', '$2y$10$E5SNEwc6JcWpubSrb.7y7O9UM3ghH6pVZyVjEVgvDy/YpiDu2xnVW', NULL, '2023-07-06 00:10:38', NULL, '2023-07-06 00:10:38', '2023-07-06 00:10:38', 3, 3, NULL),
(4, 'Mahasiswa', '004', 'mahasiswa@email.com', '$2y$10$80w3XwhcRAEaTyzpgaAPsea/Po6cFJxrzTXbuoD1WIjtc.qMCIquK', NULL, '2023-07-06 00:10:39', NULL, '2023-07-06 00:10:39', '2023-07-06 00:10:39', 4, 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alats`
--
ALTER TABLE `alats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alats_no_inventaris_unique` (`no_inventaris`),
  ADD KEY `alats_foto_alat_id_foreign` (`foto_alat_id`),
  ADD KEY `alats_gedung_id_foreign` (`gedung_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_alats`
--
ALTER TABLE `foto_alats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_ruangs`
--
ALTER TABLE `foto_ruangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedungs`
--
ALTER TABLE `gedungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gedungs_lokasi_id_foreign` (`lokasi_id`);

--
-- Indexes for table `jenis_acaras`
--
ALTER TABLE `jenis_acaras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kendaraans`
--
ALTER TABLE `jenis_kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kendaraans_no_polisi_unique` (`no_polisi`),
  ADD KEY `kendaraans_gedung_id_foreign` (`gedung_id`),
  ADD KEY `kendaraans_jenis_kendaraan_id_foreign` (`jenis_kendaraan_id`);

--
-- Indexes for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservasi_alats`
--
ALTER TABLE `reservasi_alats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservasi_alats_no_reservasi_unique` (`no_reservasi`),
  ADD KEY `reservasi_alats_user_id_foreign` (`user_id`),
  ADD KEY `reservasi_alats_unit_id_foreign` (`unit_id`),
  ADD KEY `reservasi_alats_alat_id_foreign` (`alat_id`);

--
-- Indexes for table `reservasi_kendaraans`
--
ALTER TABLE `reservasi_kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservasi_kendaraans_no_reservasi_unique` (`no_reservasi`),
  ADD KEY `reservasi_kendaraans_user_id_foreign` (`user_id`),
  ADD KEY `reservasi_kendaraans_unit_id_foreign` (`unit_id`),
  ADD KEY `reservasi_kendaraans_kendaraan_id_foreign` (`kendaraan_id`);

--
-- Indexes for table `reservasi_ruangs`
--
ALTER TABLE `reservasi_ruangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservasi_ruangs_no_reservasi_unique` (`no_reservasi`),
  ADD KEY `reservasi_ruangs_user_id_foreign` (`user_id`),
  ADD KEY `reservasi_ruangs_ruang_id_foreign` (`ruang_id`),
  ADD KEY `reservasi_ruangs_unit_id_foreign` (`unit_id`),
  ADD KEY `reservasi_ruangs_jenis_acara_id_foreign` (`jenis_acara_id`),
  ADD KEY `reservasi_ruangs_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `reservasi_ruang_sesi`
--
ALTER TABLE `reservasi_ruang_sesi`
  ADD KEY `reservasi_ruang_sesi_reservasi_ruang_id_foreign` (`reservasi_ruang_id`),
  ADD KEY `reservasi_ruang_sesi_sesi_id_foreign` (`sesi_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangs_no_ruang_unique` (`no_ruang`),
  ADD KEY `ruangs_foto_ruang_id_foreign` (`foto_ruang_id`),
  ADD KEY `ruangs_gedung_id_foreign` (`gedung_id`);

--
-- Indexes for table `sesis`
--
ALTER TABLE `sesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_nama_unit_unique` (`nama_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nomor_induk_unique` (`nomor_induk`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_unit_id_foreign` (`unit_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alats`
--
ALTER TABLE `alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_alats`
--
ALTER TABLE `foto_alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foto_ruangs`
--
ALTER TABLE `foto_ruangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gedungs`
--
ALTER TABLE `gedungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_acaras`
--
ALTER TABLE `jenis_acaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kendaraans`
--
ALTER TABLE `jenis_kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi_alats`
--
ALTER TABLE `reservasi_alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi_kendaraans`
--
ALTER TABLE `reservasi_kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi_ruangs`
--
ALTER TABLE `reservasi_ruangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sesis`
--
ALTER TABLE `sesis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alats`
--
ALTER TABLE `alats`
  ADD CONSTRAINT `alats_foto_alat_id_foreign` FOREIGN KEY (`foto_alat_id`) REFERENCES `foto_alats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alats_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedungs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gedungs`
--
ALTER TABLE `gedungs`
  ADD CONSTRAINT `gedungs_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD CONSTRAINT `kendaraans_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedungs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kendaraans_jenis_kendaraan_id_foreign` FOREIGN KEY (`jenis_kendaraan_id`) REFERENCES `jenis_kendaraans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi_alats`
--
ALTER TABLE `reservasi_alats`
  ADD CONSTRAINT `reservasi_alats_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_alats_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_alats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi_kendaraans`
--
ALTER TABLE `reservasi_kendaraans`
  ADD CONSTRAINT `reservasi_kendaraans_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_kendaraans_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_kendaraans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi_ruangs`
--
ALTER TABLE `reservasi_ruangs`
  ADD CONSTRAINT `reservasi_ruangs_jenis_acara_id_foreign` FOREIGN KEY (`jenis_acara_id`) REFERENCES `jenis_acaras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_ruangs_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_ruangs_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_ruangs_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_ruangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi_ruang_sesi`
--
ALTER TABLE `reservasi_ruang_sesi`
  ADD CONSTRAINT `reservasi_ruang_sesi_reservasi_ruang_id_foreign` FOREIGN KEY (`reservasi_ruang_id`) REFERENCES `reservasi_ruangs` (`id`),
  ADD CONSTRAINT `reservasi_ruang_sesi_sesi_id_foreign` FOREIGN KEY (`sesi_id`) REFERENCES `sesis` (`id`);

--
-- Constraints for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD CONSTRAINT `ruangs_foto_ruang_id_foreign` FOREIGN KEY (`foto_ruang_id`) REFERENCES `foto_ruangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ruangs_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedungs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
