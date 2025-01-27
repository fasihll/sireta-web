-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jan 2025 pada 04.48
-- Versi server: 10.3.34-MariaDB-log
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sireta_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif_kriterias`
--

CREATE TABLE `alternatif_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latlng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif_kriterias`
--

INSERT INTO `alternatif_kriterias` (`id`, `wisata_id`, `kriteria_id`, `value`, `keterangan`, `alamat`, `latlng`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 0, NULL, 'Kejawan, Sukolilo Tim., Kec. Labang', '-7.157437,112.8019063', '2024-11-18 20:56:52', '2025-01-26 03:37:39'),
(2, 12, 2, 2, 'parkir, masjid', 'Kejawan, Sukolilo Tim., Kec. Labang', '-7.157437,112.8019063', '2024-11-18 20:56:52', '2024-11-18 21:17:26'),
(3, 12, 3, 0, NULL, 'Kejawan, Sukolilo Tim., Kec. Labang', '-7.157437,112.8019063', '2024-11-18 20:56:53', '2025-01-26 03:37:39'),
(4, 12, 4, 1, NULL, 'Kejawan, Sukolilo Tim., Kec. Labang', '-7.157437,112.8019063', '2024-11-18 20:56:53', '2025-01-26 03:37:39'),
(5, 12, 5, 1, NULL, 'Kejawan, Sukolilo Tim., Kec. Labang', '-7.157437,112.8019063', '2024-11-18 20:56:53', '2025-01-26 03:37:39'),
(6, 13, 1, 5000, '', 'Serabi Bar., Kabupaten Bangkalan', '-7.2052436,112.9931007', '2024-11-18 21:12:07', '2024-11-18 21:12:07'),
(7, 13, 2, 2, 'parkir, masjid', 'Serabi Bar., Kabupaten Bangkalan', '-7.2052436,112.9931007', '2024-11-18 21:12:07', '2024-11-18 21:17:40'),
(8, 13, 3, 0, '1', 'Serabi Bar., Kabupaten Bangkalan', '-7.2052436,112.9931007', '2024-11-18 21:12:07', '2024-11-18 21:12:07'),
(9, 13, 4, 0, '', 'Serabi Bar., Kabupaten Bangkalan', '-7.2052436,112.9931007', '2024-11-18 21:12:07', '2024-11-18 21:12:07'),
(10, 13, 5, 0, '', 'Serabi Bar., Kabupaten Bangkalan', '-7.2052436,112.9931007', '2024-11-18 21:12:07', '2024-11-18 21:12:07'),
(11, 14, 1, 0, NULL, 'Plakaran Timur,Plakaran, Kec. Arosbaya', '-6.953008, 112.846479', '2024-11-18 21:13:06', '2025-01-26 03:39:18'),
(12, 14, 2, 0, NULL, 'Plakaran Timur,Plakaran, Kec. Arosbaya', '-6.953008, 112.846479', '2024-11-18 21:13:06', '2025-01-26 03:39:18'),
(13, 14, 3, 1, NULL, 'Plakaran Timur,Plakaran, Kec. Arosbaya', '-6.953008, 112.846479', '2024-11-18 21:13:06', '2025-01-26 03:39:18'),
(14, 14, 4, 1, NULL, 'Plakaran Timur,Plakaran, Kec. Arosbaya', '-6.953008, 112.846479', '2024-11-18 21:13:06', '2025-01-26 03:39:18'),
(15, 14, 5, 1, NULL, 'Plakaran Timur,Plakaran, Kec. Arosbaya', '-6.953008, 112.846479', '2024-11-18 21:13:06', '2025-01-26 03:39:18'),
(16, 15, 1, 10000, NULL, 'BUMIANYAR WATERBOOM,Bumi Anyar, Kec. Tj. Bumi', '-6.894554, 113.106853', '2024-11-18 21:14:31', '2025-01-26 03:39:18'),
(17, 15, 2, 3, 'toilet,masjid,parkir', 'BUMIANYAR WATERBOOM,Bumi Anyar, Kec. Tj. Bumi', '-6.894554, 113.106853', '2024-11-18 21:14:31', '2025-01-26 03:39:18'),
(18, 15, 3, 1, NULL, 'BUMIANYAR WATERBOOM,Bumi Anyar, Kec. Tj. Bumi', '-6.894554, 113.106853', '2024-11-18 21:14:31', '2025-01-26 03:39:18'),
(19, 15, 4, 1, NULL, 'BUMIANYAR WATERBOOM,Bumi Anyar, Kec. Tj. Bumi', '-6.894554, 113.106853', '2024-11-18 21:14:31', '2025-01-26 03:39:18'),
(20, 15, 5, 1, NULL, 'BUMIANYAR WATERBOOM,Bumi Anyar, Kec. Tj. Bumi', '-6.894554, 113.106853', '2024-11-18 21:14:31', '2025-01-26 03:39:18'),
(1991, 410, 1, 10000, NULL, 'Temanah, Tlangoh, Kec. Tj. Bumi', '-6.883357, 113.047772', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(1992, 410, 2, 3, 'toilet,masjid,parkir', 'Temanah, Tlangoh, Kec. Tj. Bumi', '-6.883357, 113.047772', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(1993, 410, 3, 1, NULL, 'Temanah, Tlangoh, Kec. Tj. Bumi', '-6.883357, 113.047772', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(1994, 410, 4, 1, NULL, 'Temanah, Tlangoh, Kec. Tj. Bumi', '-6.883357, 113.047772', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(1995, 410, 5, 1, NULL, 'Temanah, Tlangoh, Kec. Tj. Bumi', '-6.883357, 113.047772', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(1996, 411, 1, 10000, NULL, 'Plalangan Madura, Buduran, Arosbaya, Makam Air Mata, Buduran, Kec. Arosbaya', '-6947041,1128595', '2025-01-26 03:27:11', '2025-01-26 07:17:52'),
(1997, 411, 2, 3, 'toilet,masjid,parkir', 'Plalangan Madura, Buduran, Arosbaya, Makam Air Mata, Buduran, Kec. Arosbaya', '-6947041,1128595', '2025-01-26 03:27:11', '2025-01-26 04:40:56'),
(1998, 411, 3, 0, NULL, 'Plalangan Madura, Buduran, Arosbaya, Makam Air Mata, Buduran, Kec. Arosbaya', '-6947041,1128595', '2025-01-26 03:27:11', '2025-01-26 07:17:52'),
(1999, 411, 4, 0, NULL, 'Plalangan Madura, Buduran, Arosbaya, Makam Air Mata, Buduran, Kec. Arosbaya', '-6947041,1128595', '2025-01-26 03:27:11', '2025-01-26 07:17:52'),
(2000, 411, 5, 0, NULL, 'Plalangan Madura, Buduran, Arosbaya, Makam Air Mata, Buduran, Kec. Arosbaya', '-6947041,1128595', '2025-01-26 03:27:11', '2025-01-26 07:17:52'),
(2001, 412, 1, 0, NULL, 'Jl. Raya Sepulu, Senangguh, Maneron, Kec. Sepulu', '-6.888527, 112.947311', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(2002, 412, 2, 3, 'toilet,masjid,parkir', 'Jl. Raya Sepulu, Senangguh, Maneron, Kec. Sepulu', '-6.888527, 112.947311', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(2003, 412, 3, 0, NULL, 'Jl. Raya Sepulu, Senangguh, Maneron, Kec. Sepulu', '-6.888527, 112.947311', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(2004, 412, 4, 1, NULL, 'Jl. Raya Sepulu, Senangguh, Maneron, Kec. Sepulu', '-6.888527, 112.947311', '2025-01-26 03:27:11', '2025-01-26 03:39:18'),
(2005, 412, 5, 1, NULL, 'Jl. Raya Sepulu, Senangguh, Maneron, Kec. Sepulu', '-6.888527, 112.947311', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2006, 413, 1, 15000, NULL, 'Timur Sumber, Longkek, Kec. Galis', '-7.108356, 112.966692', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2007, 413, 2, 3, 'toilet,masjid,parkir', 'Timur Sumber, Longkek, Kec. Galis', '-7.108356, 112.966692', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2008, 413, 3, 0, NULL, 'Timur Sumber, Longkek, Kec. Galis', '-7.108356, 112.966692', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2009, 413, 4, 1, NULL, 'Timur Sumber, Longkek, Kec. Galis', '-7.108356, 112.966692', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2010, 413, 5, 1, NULL, 'Timur Sumber, Longkek, Kec. Galis', '-7.108356, 112.966692', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2011, 414, 1, 10000, NULL, 'Tengginah, Daleman, Kec. Galis', '-7.115498, 112.975037', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2012, 414, 2, 3, 'toilet,masjid,parkir', 'Tengginah, Daleman, Kec. Galis', '-7.115498, 112.975037', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2013, 414, 3, 0, NULL, 'Tengginah, Daleman, Kec. Galis', '-7.115498, 112.975037', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2014, 414, 4, 1, NULL, 'Tengginah, Daleman, Kec. Galis', '-7.115498, 112.975037', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2015, 414, 5, 1, NULL, 'Tengginah, Daleman, Kec. Galis', '-7.115498, 112.975037', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2016, 415, 1, 0, NULL, 'MAKAM AGUNG ( PANGERAN MACAN PUTIH ),Makam, Blega, Kec. Blega', '-7.122035, 113.058646', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2017, 415, 2, 2, 'parkir, masjid', 'MAKAM AGUNG ( PANGERAN MACAN PUTIH ),Makam, Blega, Kec. Blega', '-7.122035, 113.058646', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2018, 415, 3, 1, NULL, 'MAKAM AGUNG ( PANGERAN MACAN PUTIH ),Makam, Blega, Kec. Blega', '-7.122035, 113.058646', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2019, 415, 4, 0, NULL, 'MAKAM AGUNG ( PANGERAN MACAN PUTIH ),Makam, Blega, Kec. Blega', '-7.122035, 113.058646', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2020, 415, 5, 0, NULL, 'MAKAM AGUNG ( PANGERAN MACAN PUTIH ),Makam, Blega, Kec. Blega', '-7.122035, 113.058646', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2021, 416, 1, 15000, NULL, 'Jl. Modung - Kwanyar, Prampong, Pesanggrahan, Kec. Kwanyar', '-7.164013, 112.875947', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2022, 416, 2, 3, 'toilet,masjid,parkir', 'Jl. Modung - Kwanyar, Prampong, Pesanggrahan, Kec. Kwanyar', '-7.164013, 112.875947', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2023, 416, 3, 1, NULL, 'Jl. Modung - Kwanyar, Prampong, Pesanggrahan, Kec. Kwanyar', '-7.164013, 112.875947', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2024, 416, 4, 1, NULL, 'Jl. Modung - Kwanyar, Prampong, Pesanggrahan, Kec. Kwanyar', '-7.164013, 112.875947', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2025, 416, 5, 1, NULL, 'Jl. Modung - Kwanyar, Prampong, Pesanggrahan, Kec. Kwanyar', '-7.164013, 112.875947', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2026, 417, 1, 0, NULL, 'Area Sawah/Kebun, Kompol, Kec. Geger', '-6.966571, 112.875382', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2027, 417, 2, 3, 'toilet,masjid,parkir', 'Area Sawah/Kebun, Kompol, Kec. Geger', '-6.966571, 112.875382', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2028, 417, 3, 0, NULL, 'Area Sawah/Kebun, Kompol, Kec. Geger', '-6.966571, 112.875382', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2029, 417, 4, 0, NULL, 'Area Sawah/Kebun, Kompol, Kec. Geger', '-6.966571, 112.875382', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2030, 417, 5, 0, NULL, 'Area Sawah/Kebun, Kompol, Kec. Geger', '-6.966571, 112.875382', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2031, 418, 1, 0, NULL, 'Runggarung, Banyubunih, Kec. Galis', '-7.098716, 112.977082', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2032, 418, 2, 1, 'parkir', 'Runggarung, Banyubunih, Kec. Galis', '-7.098716, 112.977082', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2033, 418, 3, 0, NULL, 'Runggarung, Banyubunih, Kec. Galis', '-7.098716, 112.977082', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2034, 418, 4, 0, NULL, 'Runggarung, Banyubunih, Kec. Galis', '-7.098716, 112.977082', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2035, 418, 5, 0, NULL, 'Runggarung, Banyubunih, Kec. Galis', '-7.098716, 112.977082', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2036, 419, 1, 0, NULL, 'Semuangan, Tajungan, Kec. Kamal', '-7.155320, 112.695674', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2037, 419, 2, 2, 'parkir, toilet', 'Semuangan, Tajungan, Kec. Kamal', '-7.155320, 112.695674', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2038, 419, 3, 0, NULL, 'Semuangan, Tajungan, Kec. Kamal', '-7.155320, 112.695674', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2039, 419, 4, 1, NULL, 'Semuangan, Tajungan, Kec. Kamal', '-7.155320, 112.695674', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2040, 419, 5, 1, NULL, 'Semuangan, Tajungan, Kec. Kamal', '-7.155320, 112.695674', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2041, 420, 1, 5000, NULL, 'Kamp. Du\'ur, Desa, Granggurar, Langkap, Kec. Burneh', '-7.057781, 112.777176', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2042, 420, 2, 3, 'toilet,masjid,parkir', 'Kamp. Du\'ur, Desa, Granggurar, Langkap, Kec. Burneh', '-7.057781, 112.777176', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2043, 420, 3, 1, NULL, 'Kamp. Du\'ur, Desa, Granggurar, Langkap, Kec. Burneh', '-7.057781, 112.777176', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2044, 420, 4, 1, NULL, 'Kamp. Du\'ur, Desa, Granggurar, Langkap, Kec. Burneh', '-7.057781, 112.777176', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2045, 420, 5, 1, NULL, 'Kamp. Du\'ur, Desa, Granggurar, Langkap, Kec. Burneh', '-7.057781, 112.777176', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2046, 421, 1, 10000, NULL, ' Jakan, Parseh, Socah, Bangkalan', '-7.082255, 112.759538', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2047, 421, 2, 3, 'toilet,masjid,parkir', ' Jakan, Parseh, Socah, Bangkalan', '-7.082255, 112.759538', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2048, 421, 3, 0, NULL, ' Jakan, Parseh, Socah, Bangkalan', '-7.082255, 112.759538', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2049, 421, 4, 1, NULL, ' Jakan, Parseh, Socah, Bangkalan', '-7.082255, 112.759538', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2050, 421, 5, 1, NULL, ' Jakan, Parseh, Socah, Bangkalan', '-7.082255, 112.759538', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2051, 422, 1, 10000, NULL, 'Jl. Raya Kramat, Area Sawah, Mertajasah, Kec. Bangkalan', '-7.041508, 112.711308', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2052, 422, 2, 3, 'toilet,masjid,parkir', 'Jl. Raya Kramat, Area Sawah, Mertajasah, Kec. Bangkalan', '-7.041508, 112.711308', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2053, 422, 3, 1, NULL, 'Jl. Raya Kramat, Area Sawah, Mertajasah, Kec. Bangkalan', '-7.041508, 112.711308', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2054, 422, 4, 1, NULL, 'Jl. Raya Kramat, Area Sawah, Mertajasah, Kec. Bangkalan', '-7.041508, 112.711308', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2055, 422, 5, 1, NULL, 'Jl. Raya Kramat, Area Sawah, Mertajasah, Kec. Bangkalan', '-7.041508, 112.711308', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2056, 423, 1, 0, NULL, 'MAKAM SYAIKHONA KHOLIL, Tajasah, Mertajasah, Kec. Bangkalan', '-7.0419444091534595, 112.72343949425843', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2057, 423, 2, 3, 'toilet,masjid,parkir', 'MAKAM SYAIKHONA KHOLIL, Tajasah, Mertajasah, Kec. Bangkalan', '-7.0419444091534595, 112.72343949425843', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2058, 423, 3, 1, NULL, 'MAKAM SYAIKHONA KHOLIL, Tajasah, Mertajasah, Kec. Bangkalan', '-7.0419444091534595, 112.72343949425843', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2059, 423, 4, 1, NULL, 'MAKAM SYAIKHONA KHOLIL, Tajasah, Mertajasah, Kec. Bangkalan', '-7.0419444091534595, 112.72343949425843', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2060, 423, 5, 1, NULL, 'MAKAM SYAIKHONA KHOLIL, Tajasah, Mertajasah, Kec. Bangkalan', '-7.0419444091534595, 112.72343949425843', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2061, 424, 1, 0, NULL, ' Dsn.masjid jln.bukit anjhir, Sabunter, Kamoneng, Kec. Tragah', '-7.122818, 112.813334', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2062, 424, 2, 1, 'parkir', ' Dsn.masjid jln.bukit anjhir, Sabunter, Kamoneng, Kec. Tragah', '-7.122818, 112.813334', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2063, 424, 3, 1, NULL, ' Dsn.masjid jln.bukit anjhir, Sabunter, Kamoneng, Kec. Tragah', '-7.122818, 112.813334', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2064, 424, 4, 0, NULL, ' Dsn.masjid jln.bukit anjhir, Sabunter, Kamoneng, Kec. Tragah', '-7.122818, 112.813334', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2065, 424, 5, 0, NULL, ' Dsn.masjid jln.bukit anjhir, Sabunter, Kamoneng, Kec. Tragah', '-7.122818, 112.813334', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2066, 425, 1, 0, NULL, 'Jalan raya pasar, Ketetang, Kec. Kwanyar', '-7.158252, 112.854161', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2067, 425, 2, 2, 'toilet, masjid', 'Jalan raya pasar, Ketetang, Kec. Kwanyar', '-7.158252, 112.854161', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2068, 425, 3, 0, NULL, 'Jalan raya pasar, Ketetang, Kec. Kwanyar', '-7.158252, 112.854161', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2069, 425, 4, 1, NULL, 'Jalan raya pasar, Ketetang, Kec. Kwanyar', '-7.158252, 112.854161', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2070, 425, 5, 1, NULL, 'Jalan raya pasar, Ketetang, Kec. Kwanyar', '-7.158252, 112.854161', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2071, 426, 1, 0, NULL, 'Gubugan, Genteng, Kec. Konang', '-7.047363, 113.072323', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2072, 426, 2, 0, NULL, 'Gubugan, Genteng, Kec. Konang', '-7.047363, 113.072323', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2073, 426, 3, 0, NULL, 'Gubugan, Genteng, Kec. Konang', '-7.047363, 113.072323', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2074, 426, 4, 0, NULL, 'Gubugan, Genteng, Kec. Konang', '-7.047363, 113.072323', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2075, 426, 5, 0, NULL, 'Gubugan, Genteng, Kec. Konang', '-7.047363, 113.072323', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2076, 427, 1, 0, NULL, 'Buduran, Kec. Arosbaya', '-6.947105, 112.856043', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2077, 427, 2, 3, 'toilet,masjid,parkir', 'Buduran, Kec. Arosbaya', '-6.947105, 112.856043', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2078, 427, 3, 1, NULL, 'Buduran, Kec. Arosbaya', '-6.947105, 112.856043', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2079, 427, 4, 1, NULL, 'Buduran, Kec. Arosbaya', '-6.947105, 112.856043', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2080, 427, 5, 1, NULL, 'Buduran, Kec. Arosbaya', '-6.947105, 112.856043', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2081, 428, 1, 10000, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048543439480226, 112.73544252508616', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2082, 428, 2, 3, 'toilet,masjid,parkir', 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048543439480226, 112.73544252508616', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2083, 428, 3, 1, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048543439480226, 112.73544252508616', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2084, 428, 4, 1, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048543439480226, 112.73544252508616', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2085, 428, 5, 1, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048543439480226, 112.73544252508616', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2086, 429, 1, 0, NULL, ' Demangan Barat, Demangan, Bangkala', '-7028777,1127457', '2025-01-26 03:27:12', '2025-01-26 07:17:53'),
(2087, 429, 2, 3, 'toilet,masjid,parkir', ' Demangan Barat, Demangan, Bangkala', '-7028777,1127457', '2025-01-26 03:27:12', '2025-01-26 04:40:42'),
(2088, 429, 3, 1, NULL, ' Demangan Barat, Demangan, Bangkala', '-7028777,1127457', '2025-01-26 03:27:12', '2025-01-26 07:17:53'),
(2089, 429, 4, 1, NULL, ' Demangan Barat, Demangan, Bangkala', '-7028777,1127457', '2025-01-26 03:27:12', '2025-01-26 07:17:53'),
(2090, 429, 5, 1, NULL, ' Demangan Barat, Demangan, Bangkala', '-7028777,1127457', '2025-01-26 03:27:12', '2025-01-26 07:17:53'),
(2091, 430, 1, 20000, NULL, 'Pasarkapok Timur, Demangan, Kec. Bangkalan', '-7.0354667921047955, 112.74334546643136', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2092, 430, 2, 3, 'toilet,masjid,parkir', 'Pasarkapok Timur, Demangan, Kec. Bangkalan', '-7.0354667921047955, 112.74334546643136', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2093, 430, 3, 1, NULL, 'Pasarkapok Timur, Demangan, Kec. Bangkalan', '-7.0354667921047955, 112.74334546643136', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2094, 430, 4, 1, NULL, 'Pasarkapok Timur, Demangan, Kec. Bangkalan', '-7.0354667921047955, 112.74334546643136', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2095, 430, 5, 1, NULL, 'Pasarkapok Timur, Demangan, Kec. Bangkalan', '-7.0354667921047955, 112.74334546643136', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2096, 431, 1, 27000, NULL, 'Jl. Raya Ketengan No.KM.21, Ketengan, Tunjung, Kec. Burneh', '-7.043751, 112.778156', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2097, 431, 2, 3, 'toilet,masjid,parkir', 'Jl. Raya Ketengan No.KM.21, Ketengan, Tunjung, Kec. Burneh', '-7.043751, 112.778156', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2098, 431, 3, 1, NULL, 'Jl. Raya Ketengan No.KM.21, Ketengan, Tunjung, Kec. Burneh', '-7.043751, 112.778156', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2099, 431, 4, 1, NULL, 'Jl. Raya Ketengan No.KM.21, Ketengan, Tunjung, Kec. Burneh', '-7.043751, 112.778156', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2100, 431, 5, 1, NULL, 'Jl. Raya Ketengan No.KM.21, Ketengan, Tunjung, Kec. Burneh', '-7.043751, 112.778156', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2101, 432, 1, 25000, NULL, 'Lebak, Pejagan, Kec. Bangkalan', '-7.025307844719257, 112.7499095259206', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2102, 432, 2, 2, 'toilet, parkir', 'Lebak, Pejagan, Kec. Bangkalan', '-7.025307844719257, 112.7499095259206', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2103, 432, 3, 1, NULL, 'Lebak, Pejagan, Kec. Bangkalan', '-7.025307844719257, 112.7499095259206', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2104, 432, 4, 1, NULL, 'Lebak, Pejagan, Kec. Bangkalan', '-7.025307844719257, 112.7499095259206', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2105, 432, 5, 1, NULL, 'Lebak, Pejagan, Kec. Bangkalan', '-7.025307844719257, 112.7499095259206', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2106, 433, 1, 0, NULL, 'Baipajung,Kec. Tanah Merah', '-7.103217, 112.866107', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2107, 433, 2, 1, 'toilet', 'Baipajung,Kec. Tanah Merah', '-7.103217, 112.866107', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2108, 433, 3, 1, NULL, 'Baipajung,Kec. Tanah Merah', '-7.103217, 112.866107', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2109, 433, 4, 0, NULL, 'Baipajung,Kec. Tanah Merah', '-7.103217, 112.866107', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2110, 433, 5, 1, NULL, 'Baipajung,Kec. Tanah Merah', '-7.103217, 112.866107', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2111, 434, 1, 0, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048531797448529, 112.7354411956437', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2112, 434, 2, 2, 'toilet, parkir', 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048531797448529, 112.7354411956437', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2113, 434, 3, 1, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048531797448529, 112.7354411956437', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2114, 434, 4, 1, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048531797448529, 112.7354411956437', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2115, 434, 5, 1, NULL, 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan', '-7.048531797448529, 112.7354411956437', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2116, 435, 1, 0, NULL, 'Jl. KH. Moh. Kholil Gg. IX No.42,Demangan Timur, Demangan, Kec. Bangkalan', '-7.034188283713903, 112.74223447161717', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2117, 435, 2, 2, 'toilet, parkir', 'Jl. KH. Moh. Kholil Gg. IX No.42,Demangan Timur, Demangan, Kec. Bangkalan', '-7.034188283713903, 112.74223447161717', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2118, 435, 3, 1, NULL, 'Jl. KH. Moh. Kholil Gg. IX No.42,Demangan Timur, Demangan, Kec. Bangkalan', '-7.034188283713903, 112.74223447161717', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2119, 435, 4, 1, NULL, 'Jl. KH. Moh. Kholil Gg. IX No.42,Demangan Timur, Demangan, Kec. Bangkalan', '-7.034188283713903, 112.74223447161717', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2120, 435, 5, 1, NULL, 'Jl. KH. Moh. Kholil Gg. IX No.42,Demangan Timur, Demangan, Kec. Bangkalan', '-7.034188283713903, 112.74223447161717', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2121, 436, 1, 0, NULL, 'Tokoning,Paterongan, Kec. Galis', '-7.118776, 112.972274', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2122, 436, 2, 0, NULL, 'Tokoning,Paterongan, Kec. Galis', '-7.118776, 112.972274', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2123, 436, 3, 1, NULL, 'Tokoning,Paterongan, Kec. Galis', '-7.118776, 112.972274', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2124, 436, 4, 0, NULL, 'Tokoning,Paterongan, Kec. Galis', '-7.118776, 112.972274', '2025-01-26 03:27:12', '2025-01-26 03:39:18'),
(2125, 436, 5, 0, NULL, 'Tokoning,Paterongan, Kec. Galis', '-7.118776, 112.972274', '2025-01-26 03:27:12', '2025-01-26 03:39:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Wisata Alam', 'Tempat wisata Alam.', '2024-11-18 20:22:04', '2024-11-18 20:22:04'),
(2, 'Wisata Religi', 'Tempat wisata Alam.', '2024-11-18 20:22:04', '2024-11-18 20:22:04'),
(3, 'Wisata Kuliner', 'Tempat wisata Alam.', '2024-11-18 20:22:04', '2024-11-18 20:22:04'),
(5, 'Wisata Budaya', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `wisata_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 2, 14, 'sangat bagus, fasilitas memedai', 5, '2024-12-23 05:06:50', '2024-12-23 05:06:50'),
(2, 2, 15, 'lumayan bagus', 3, '2025-01-21 19:29:53', '2025-01-21 19:29:53'),
(3, 1, 14, 'good......', 5, '2025-01-22 20:28:34', '2025-01-22 20:28:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `name`, `bobot`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Biaya', 0.11327301593454, 'cost', '2024-11-18 20:22:04', '2025-01-25 20:21:07'),
(2, 'Fasilitas', 0.16173749303828, 'benefit', '2024-11-18 20:22:04', '2025-01-25 20:21:07'),
(3, 'Kondisi Jalan', 0.14008061434098, 'benefit', '2024-11-18 20:22:04', '2025-01-25 20:21:07'),
(4, 'Keamanan', 0.36065397903458, 'benefit', '2024-11-18 20:22:04', '2025-01-25 20:21:07'),
(5, 'Kebersihan', 0.22425489765162, 'benefit', '2024-11-18 20:22:04', '2025-01-25 20:21:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_17_053539_add_two_factor_columns_to_users_table', 1),
(5, '2024_09_17_053607_create_personal_access_tokens_table', 1),
(6, '2024_09_17_062622_create_categories_table', 1),
(7, '2024_09_17_062633_create_wisatas_table', 1),
(8, '2024_09_17_132658_create_kriterias_table', 1),
(9, '2024_09_17_132711_create_feedback_table', 1),
(10, '2024_09_17_132730_create_alternatif_kriterias_table', 1),
(11, '2024_09_17_132758_create_perbandingan_berpasangans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_berpasangans`
--

CREATE TABLE `perbandingan_berpasangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matrix` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `matrix_row_sum` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `matrix_normalized` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `matrix_normalized_col_sum` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `wights` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `eigens` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `lambda_max` double NOT NULL,
  `consistency_index` double NOT NULL,
  `random_index` double NOT NULL,
  `consistency_ratio` double NOT NULL,
  `is_consistent` tinyint(1) NOT NULL,
  `consistecy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perbandingan_berpasangans`
--

INSERT INTO `perbandingan_berpasangans` (`id`, `title`, `matrix`, `matrix_row_sum`, `matrix_normalized`, `matrix_normalized_col_sum`, `wights`, `eigens`, `lambda_max`, `consistency_index`, `random_index`, `consistency_ratio`, `is_consistent`, `consistecy`, `created_at`, `updated_at`) VALUES
(1, 'Perbandingan Kriteria', '[[1,0.8600675484481766,0.5287596824005346,0.3454633910668056,0.5800976376285917],[1.1626993737925633,1,1.9229224891655046,0.37398269248422483,0.6338445178846773],[1.8912183233412672,0.5200417622833943,1,0.4727486215489395,0.4619091009011904],[2.8946627221829715,2.673920531876436,2.115289086879926,1,1.9592300935703182],[1.7238477372325578,1.5776739749004842,2.1649281169151844,0.5104045733483468,1]]', '[8.672428156549358,6.631703817508491,7.7318993753611505,2.702599278448317,4.635081349984778]', '[[0.11530796011781393,0.12969028354033174,0.06838677752138189,0.12782634622220115,0.12515371227098243],[0.1340684930222801,0.1507908114593237,0.24869988547615915,0.13837889156062566,0.1367493836730091],[0.21807252700191376,0.07841751932744974,0.12933432672270012,0.174923683773188,0.09965501487966492],[0.33377765372399676,0.40320264677939416,0.27357948987549036,0.37001415932225984,0.4226959454717559],[0.19877336613399557,0.2378987388935007,0.2799995204042684,0.18885691912172523,0.21574594370458766]]', '[0.5663650796727111,0.8086874651913978,0.7004030717049166,1.803269895172897,1.1212744882580776]', '[0.11327301593454223,0.16173749303827956,0.14008061434098332,0.3606539790345794,0.22425489765161552]', '[0.9823520927679882,1.0725951500162114,1.0830892145232551,0.9747031835083688,1.0394396937477481]', 5.1521793345636, 0.038044833640893, 1.12, 0.033968601465083, 1, 'Konsisten', '2024-11-18 20:27:18', '2025-01-25 20:21:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FejoZCEe7mfPCmors0h2GXaH31bgOhydbueZUnwQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia3ZhYzNFUE1tZGJOcDZzNGU3VnJNaWJ4aGZaT2V2eVI2VkFZNXJDMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbHRlcm5hdGlmIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRFTUM2R3NGenVyUmU2L2FuUVlkZldlandWTEVJVTU1NkprNzVHb0kwYVlUUFFYNXJrVHB0LiI7fQ==', 1737953307);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `alamat`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@sireta.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$EMC6GsFzurRe6/anQYdfWejwVLEIU556Jk75GoI0aYTPQX5rkTpt.', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-18 20:22:04', '2024-11-18 20:22:04'),
(2, 'Fasihll', 'fasihullisan091966@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$lc3rfGmeapl8Gag77gwQGe2/8EzJi5feTDUPKiLo2H6G3QnHSNldO', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-11-18 20:22:04', '2024-11-18 20:22:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisatas`
--

INSERT INTO `wisatas` (`id`, `image`, `name`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(12, 'QCZxCBz8XWcXqWhux96dxRmae4XNARVYrwQTX838.png', 'Goa Petapa', 'Pantai ini menawarkan keindahan alam yang memesona dengan hamparan pasir putih kekuningan yang membentang sepanjang 300 meter. Gugusan karang terlihat saat air laut surut dan deretan pohon bakau api-api yang tumbuh subur di atas karang.', 1, '2024-11-18 20:38:20', '2025-01-26 21:29:13'),
(13, 'qT5Xz6xCSdKj0hBC2mXMxXRh2ZMalYCcZryMh8MA.png', 'Watu Gedong', 'watu gedong adapah destinasi wisata pantai yang terletak di kec. modung desa serabi bar', 1, '2024-11-18 20:41:30', '2025-01-26 21:28:58'),
(14, 'OcSMexoQkL4yDeK9MTCmA0mK770B98wCxlHp9ZMm.png', 'Makam Ki Demang Plakaran', 'Makam Ki Demang Plakaran di Arosbaya, Bangkalan, Madura, adalah destinasi wisata religi yang sarat sejarah. Ki Demang Plakaran, keturunan Raja Majapahit Prabu Brawijaya V, merupakan pendiri Kerajaan Madura Barat dan tokoh penting penyebaran Islam di Madura.\n\nMakam ini menjadi saksi kejayaan Kerajaan Arosbaya, yang meluas hingga Bangkalan, Sampang, dan Blega, serta memiliki hubungan diplomatik dengan Kesultanan Pajang. Dengan arsitektur khas batuan candi, makam ini menyimpan nilai religius dan sejarah, menjadikannya tempat ziarah sekaligus pembelajaran budaya.', 2, '2024-11-18 20:44:13', '2025-01-26 21:28:37'),
(15, 'v94gibezZ27sBY83P6htPsLSqgGf04YGkow8LQ6j.png', 'Bumi Anyar Water Boom', 'Bumianyar Waterboom adalah sebuah objek wisata air yang terletak di Kabupaten Bangkalan, tepatnya di Desa Bumianyar, Kecamatan Tanjung Bumi. Tempat ini menjadi pilihan populer bagi masyarakat sekitar, terutama saat akhir pekan atau liburan, untuk bersenang-senang dan menyegarkan diri.', 1, '2024-11-18 20:46:34', '2025-01-26 21:28:15'),
(410, 'y8nxz0s7h0lRQZBVRWBMs2SugqyFExDo6wVxiaSy.png', 'Pantai Tlangoh', 'Pantai Tlangoh adalah destinasi wisata yang sangat menarik untuk dikunjungi. Keindahan alamnya yang masih alami, ditambah dengan berbagai aktivitas yang dapat dilakukan, membuat pantai ini menjadi pilihan yang tepat untuk melepas penat dan menikmati liburan bersama keluarga atau teman-teman.', 1, '2025-01-26 03:27:11', '2025-01-26 21:27:28'),
(411, 'TDncc5FXaRRqRT8HvuZdRi2kOv4hOSp4OJWdmZP6.png', 'Bukit Plalangan', 'Bukit Pelalangan Arosbaya adalah destinasi wisata alam yang terletak di Arosbaya, Kabupaten Bangkalan, Madura, Jawa Timur. Bukit ini merupakan kawasan bekas tambang batu kapur yang kini menjadi daya tarik wisata karena keindahan ukiran alami pada dinding batu kapurnya. Hasil pahatan para penambang secara tidak sengaja menciptakan tekstur artistik yang menyerupai karya seni, sehingga bukit ini memiliki daya tarik visual yang unik.', 1, '2025-01-26 03:27:11', '2025-01-26 21:27:13'),
(412, '42Hoxdo94KnA2ZbUdKMiwDRXYy3r37ZCbtaNRSxh.png', 'Pantai Maneron Tengket', 'Pantai Maneron Tengket adalah sebuah permata tersembunyi di Kabupaten Bangkalan, Madura. Dengan hamparan pasir putih yang lembut, deburan ombak yang menenangkan, dan pemandangan laut lepas yang memukau, pantai ini menawarkan keindahan alam yang masih sangat alami.', 1, '2025-01-26 03:27:11', '2025-01-26 21:26:52'),
(413, 'AQFHmTppl3lkVc2toeGxYMBRtnBhUc007wE1JQ13.png', 'Pemandian Betoh Jeren', 'Kolam Renang Betoh Jeren merupakan destinasi yang sempurna untuk melepas penat dan menikmati waktu bersama keluarga. Terletak di Timur, Sumber, Longkek, kolam renang ini menawarkan suasana yang asri dan menyegarkan dengan dikelilingi oleh pepohonan hijau. Fasilitas yang lengkap seperti kolam renang anak dan dewasa, serta area bermain membuat tempat ini menjadi pilihan favorit bagi pengunjung. Selain berenang, pengunjung juga bisa bersantai di gazebo sambil menikmati pemandangan sekitar. Dengan harga tiket yang terjangkau, Kolam Renang Betoh Jeren menjadi pilihan yang tepat untuk mengisi waktu luang bersama orang terkasih.', 1, '2025-01-26 03:27:12', '2025-01-26 21:26:28'),
(414, 'EQpqDJpadQNGdLZF1MxENmbUXAsLmAVBKwJkJ2AK.png', 'Bukit Lampion Beramah', 'Bukit Lampion Beramah adalah destinasi wisata unik di Modung, Bangkalan, Madura. Tempat ini menawarkan pemandangan perbukitan yang memukau, dihiasi lampion-lampion berwarna-warni yang menciptakan suasana magis, terutama saat malam tiba.\n\nPengunjung dapat menikmati udara segar, berfoto dengan latar cahaya lampion yang mempesona, dan bersantai di area yang dirancang untuk kenyamanan keluarga. Bukit ini menjadi pilihan menarik bagi wisatawan yang mencari suasana romantis sekaligus alami di Pulau Madura.', 1, '2025-01-26 03:27:12', '2025-01-26 21:26:11'),
(415, 'PkpYdcSLHDSqqtp1m79fvV4MpPnz0Lk3EBWcILYF.png', 'Makam Agung Blega', 'Makam Agung Blega di Bangkalan, Madura, adalah situs bersejarah yang menjadi tujuan wisata religi. Makam ini diyakini sebagai tempat peristirahatan tokoh penting yang berkontribusi dalam penyebaran Islam di Madura.\n\nSelain nilai religius, Makam Agung Blega juga menawarkan suasana damai dengan arsitektur tradisional khas Madura. Tempat ini sering dikunjungi oleh peziarah yang ingin mendoakan leluhur sekaligus mencari ketenangan spiritual.', 2, '2025-01-26 03:27:12', '2025-01-26 21:25:58'),
(416, 'CrjIeeYpjTXZFTl2yZYi2ngbOam3BcBMO18l9pXO.png', 'Impian Maya Water Boom', 'Impian Maya Water Boom adalah destinasi wisata keluarga di Bangkalan, Madura, yang menawarkan keseruan bermain air dengan berbagai fasilitas modern. Tempat ini dilengkapi kolam renang anak-anak, seluncuran air, dan wahana permainan lainnya yang cocok untuk segala usia.\n\nSelain wahana air, pengunjung dapat menikmati area bersantai, food court, dan fasilitas pendukung lainnya, menjadikannya tempat yang sempurna untuk liburan keluarga. Dengan suasana yang menyenangkan, Impian Maya Water Boom menjadi pilihan favorit untuk rekreasi di Madura.', 1, '2025-01-26 03:27:12', '2025-01-26 21:25:41'),
(417, 'i94yg6TkkfQ4aii7byVFBqBhXY3hkXrWyaADpyZc.png', 'Air Terjun Durbuk Durjan', 'Air Terjun Durbuk Durjan di Bangkalan, Madura, adalah destinasi alam tersembunyi yang menawarkan keindahan alami dan suasana yang menenangkan. Air terjun ini dikelilingi oleh pepohonan rindang dan bebatuan alami, menciptakan pemandangan yang memukau.\n\nDengan aliran air yang jernih dan suasana sejuk, tempat ini cocok untuk melepas penat dan menikmati keindahan alam. Pengunjung juga dapat bersantai di sekitar air terjun atau mengambil foto di spot-spot yang Instagramable. Air Terjun Durbuk Durjan adalah surga tersembunyi yang wajib dikunjungi oleh pecinta alam.', 1, '2025-01-26 03:27:12', '2025-01-26 21:25:23'),
(418, '4h6QnubWw7o6nxHQFqFbgPB3UsUjjLn4lH91yNef.png', 'Air Terjun Batoh Rajeh', 'Air Terjun Batu Raja Manitan terletak di Bangkalan, Madura, dan merupakan salah satu objek wisata alam yang menakjubkan. Dikelilingi oleh hutan hijau dan batuan besar, air terjun ini menawarkan pemandangan yang indah dan udara segar.\n\nAir terjun ini memiliki aliran air yang jernih dan deras, menciptakan suasana alami yang damai. Tempat ini cocok untuk wisatawan yang ingin menikmati keindahan alam, berfoto, atau sekadar bersantai di sekitar area air terjun yang asri. Air Terjun Batu Raja Manitan menjadi pilihan menarik bagi pecinta alam yang mencari petualangan di Madura.', 1, '2025-01-26 03:27:12', '2025-01-26 21:25:11'),
(419, '7DQQDHttGMKwHbc7c77D4oYR7WuWRxijkG6AcLTV.png', 'Mangrove Tajungan', 'Wisata Mangrove Tajungan terletak di Bangkalan, Madura, dan menawarkan pengalaman menjelajahi ekosistem mangrove yang kaya akan keanekaragaman hayati. Pengunjung dapat menikmati pemandangan alam yang indah sambil berjalan di atas jembatan kayu yang melintasi kawasan hutan mangrove.\n\nTempat ini juga cocok untuk para pecinta alam yang ingin belajar tentang konservasi mangrove serta menikmati suasana tenang dan sejuk. Selain itu, Mangrove Tajungan menjadi tempat yang ideal untuk menikmati keindahan alam sambil berfoto, menjadikannya destinasi wisata edukasi dan rekreasi yang menarik.', 1, '2025-01-26 03:27:12', '2025-01-26 21:24:55'),
(420, 'mnOVLihfjx0rBtXqarONj6x8jUcgJzWTSRBNYQVD.png', 'Kebun Bang Jani', 'Agro Edu Wisata Kebun Bang Jani adalah destinasi wisata edukasi yang menyenangkan bagi seluruh keluarga. Terletak di Granggurar,Langkap, Kec. Burneh, kebun ini mengajak pengunjung untuk belajar tentang proses pertanian secara langsung, mulai dari menanam hingga memanen. Dengan beragam jenis tanaman dan wahana edukasi yang menarik, pengunjung tidak hanya bersenang-senang, tetapi juga menambah pengetahuan tentang pentingnya pertanian bagi kehidupan.', 1, '2025-01-26 03:27:12', '2025-01-26 21:24:35'),
(421, '3a6VHRgQmwEiKjYFqBISNePCOxcKueiIpE32furj.png', 'Bukit Parseh', 'Bukit Parseh adalah destinasi wisata unik yang terletak di Kabupaten Bangkalan, Madura. Bekas tambang kapur ini telah disulap menjadi sebuah lanskap yang menakjubkan dengan formasi batuan yang unik dan danau-danau berwarna tosca yang memukau. Perpaduan antara keindahan alam dan sentuhan tangan manusia menjadikan Bukit Parseh sebagai salah satu destinasi wisata yang wajib dikunjungi di Madura.', 1, '2025-01-26 03:27:12', '2025-01-26 21:24:23'),
(422, '1Yc5HNEesGRZOZRjh7Prt2RzTqCMoYt2PqBdfaoD.png', 'Long Gladak', 'Pantai Long Gladak, atau yang juga dikenal sebagai Pantai Jembatan Panjang, adalah destinasi wisata baru yang tengah naik daun di Kabupaten Bangkalan, Madura. Dengan pesona alam yang masih alami dan suasana yang tenang, pantai ini menawarkan pengalaman liburan yang berbeda.', 1, '2025-01-26 03:27:12', '2025-01-26 21:23:49'),
(423, 'KS1le8lyiZJsyw7MiRua8xAWxrixPup7sgHNJivu.png', 'Makam Syachona Cholil', 'Makam Syaikhona Kholil bukan hanya sekadar tempat ziarah, tetapi juga menjadi pusat pembelajaran sejarah dan budaya Islam di Madura. Dengan mengunjungi tempat ini, kita dapat lebih memahami peran penting para ulama dalam perkembangan Islam di Indonesia.', 2, '2025-01-26 03:27:12', '2025-01-26 21:23:38'),
(424, 'qbfGySVOH9GRATJTQonDzNAaVQv3ZQYXQSa2bIlT.png', 'Bukit Anjhir', 'Bukit Anjir adalah salah satu destinasi wisata alam yang sedang naik daun di Kabupaten Bangkalan, Madura. Terletak di Desa Kamoneng, Kecamatan Tragah, bukit ini menawarkan keindahan alam yang masih asri dan jauh dari keramaian kota.', 1, '2025-01-26 03:27:12', '2025-01-26 21:23:24'),
(425, 'ZR1HdjRIrWqp7tNMIxYVIlbr3kxsBzlry6u0C4jL.png', 'Makam Sunan Cendana', 'Makam Sunan Cendana merupakan salah satu destinasi wisata religi yang sangat penting di Madura, khususnya bagi masyarakat Bangkalan. Beliau adalah seorang ulama besar yang memiliki peran penting dalam menyebarkan agama Islam di pulau garam ini.', 2, '2025-01-26 03:27:12', '2025-01-26 21:23:03'),
(426, 'hy3uvbNYfohk0nBKht2mLrcXj9ROvBQ9z7FtfZRU.png', 'Api Alam Konang', 'Api Alam Konang terletak di Bangkalan, Madura, dan merupakan salah satu fenomena alam yang unik dan menarik. Api ini muncul secara alami dari permukaan tanah yang mengeluarkan api kecil secara terus-menerus. Fenomena ini terjadi karena adanya kandungan gas alam yang terbakar di bawah permukaan tanah.', 1, '2025-01-26 03:27:12', '2025-01-26 21:22:32'),
(427, '3xXN5BaRmfNQsgho48deyIq5SL2eJPsYDA1EDbZj.png', 'Makam Aer Mata Ebu', 'Situs Makam Aermata Ebhu yang secara administrasi terletak di Jalan Raya Buduran No. 39 RT 01/RW 01, Desa Buduran, Kecamatan Arosbaya, Kabupaten Bangkalan. Komplek makam ini terletak di perbukitan pada ketinggian 19,35 m dari permukaan air laut, dengan luas sekitar 8.000 m². Keberadaannya tidak terlepas dari sejarah panjang Pulau Madura. Madura telah eksis dalam panggung sejarah nusantara dari masa prasejarah hingga pada masa kolonial .Pada masa klasik Madura memiliki peran dalam pembentukan kerajaan Majapahit seperti yang diceritakan dalam Pararaton diakhir pemerintahan Majapahit penguasa Madura telah mengadakan hubungan dengan pemimpin agama Islam di Gresik dan Surabaya Islam. Diceritakan dalam sumber Babat penguasa Madura pertama yang meeluk agama islam adalah Pangeran Pratanu pada tahun 1528 M .Beliau naik tahta menggantikan ayahnya yang bernama Kyai Pragalbo pada tahun 1531 M yang ditandai dengan candrasangkala Sirnoning Buto Pratano ning Negoro (1450 Ḉ). Pangeran Pratanu bergelar Panembahan Lemah Duwur yang pusat pemerintahannya dipindahkan dari Plakaran ke Arosbaya (Sartono Kartodirdjo, 1973:4). Kekuasaan Pangeran Lemah Duwur tidak hanya meliputi Arosbaya saja tetapi meluas hingga ke Blega, Sampang bahkan ke Pamekasan dan Sumenep.', 2, '2025-01-26 03:27:12', '2025-01-26 21:22:05'),
(428, 'sKpQgY0ubuKYdLRnTksN7JeOZYalfUWWVPFPBG0r.png', 'Kolan Renang Tretan', 'Kolam Renang Tretan adalah sebuah obyek wisata air yang mempunyai lokasi di Kabupaten Bangkalan, Madura. Jika anda sedang berkunjung ke pulau garam ini bersama anak-anak atau keponakan yang masihh kecil, anda bisa mengajak mereka untuk bersenang-senang bermain air di Kolam Renang Tretan.  Untuk bangunan dari kolam renangnya sendiri, di sini berbentuk bangunan tinggi yang mempunyai dua tingkat lantai. Untuk lantai pertama atau lantai dasar digunakan sebagai tempat kolam renangnya, lalu untuk lantai kedua digunakan sebagai tempat kantin-kantin yang berkonsep cafe yang menjual berbagai makanan dan minuman. Dari tempat ini anda bisa manfaatkan untuk melihat-lihat pemandangan dari atas sambil menikmati snack.', 1, '2025-01-26 03:27:12', '2025-01-26 21:21:41'),
(429, 'Kf9Kvia7z0U8myDCwEDSmmIOY8XhSNTZXlcFHsnO.png', 'Makam Sunan Abdul Kadirun', 'Komplek makam tersebut, bisa dikatakan merupakan komplek makam keluarga. Hampir seluruh kerabat Sultan disemayamkan di sini. Bahkan, istri tercinta Sultan yakni R. Ayu Masturah atau Ratu Ajunan, beserta beberapa orang putranya disemayamkan secara bersebelahan dan berada dalam satu cungkup. Komplek makam bagian dalam yang dibangun sejak 1848 tertera jelas didominasi kultur Jawa.', 2, '2025-01-26 03:27:12', '2025-01-26 21:21:31'),
(430, '9mrRseEH6DySjarJykyz2J2J5kon3Gc7ZwTLcnnX.png', 'Warung Gang Amboine', 'Warung Gang Amboina adalah rumah makan legendaris yang terletak di Jalan KH. Moh. Kholil Gang IXA No. 97A, Bangkalan, Madura. Berdiri sejak tahun 1960-an, warung ini terkenal dengan menu khas Madura, terutama nasi campur dengan berbagai pilihan lauk seperti daging, paru, usus, telur, dan mi merah yang disiram dengan kuah santan khas. \n\nSelain nasi campur, Warung Gang Amboina juga menawarkan hidangan lain seperti nasi petis, rawon, dan soto. Setiap harinya, warung ini buka mulai pukul 05.00 hingga 17.00 WIB.', 3, '2025-01-26 03:27:12', '2025-01-26 21:21:12'),
(431, 'IdBlvGlZM3hZj4RxBNd3TM5MpGuflJY3UscGcMLp.png', 'Warung Makan Sinjay', 'Warung Makan Sinjay adalah salah satu rumah makan terkenal yang berasal dari Bangkalan, Madura. Warung ini populer di kalangan pecinta kuliner, baik warga lokal maupun wisatawan, karena menyajikan hidangan khas Madura dengan rasa autentik. Hidangan andalan mereka adalah Bebek Goreng Sinjay, yang sering disebut sebagai salah satu bebek goreng terbaik di Indonesia.', 3, '2025-01-26 03:27:12', '2025-01-26 21:20:59'),
(432, 'O5pVR9KFWON1kIYqtv2xTmEmjAodnnIOJpVRmHN4.png', 'Warung Makan Nyalete', 'Warung Makan Nyalete atau Rumah Makan Budi Luhur adalah destinasi kuliner legendaris yang berdiri sejak 1967 di Bangkalan, Madura, dan terkenal dengan hidangan khasnya, terutama nasi campur. Hidangan ini terdiri dari nasi putih yang disajikan dengan lauk khas seperti dheging manes (daging sapi manis) dan kuah kental kaya rempah, yang menciptakan cita rasa autentik Madura. Selain nasi campur, menu rawon dengan kuah gurih dan potongan daging lembut juga menjadi favorit. Warung ini memiliki suasana tradisional dengan bangunan bergaya kuno yang memberikan pengalaman bersantap yang unik. Kini, Warung Makan Nyalete juga memiliki cabang di Surabaya untuk memudahkan para pecinta kuliner menikmati masakannya tanpa harus menyeberang ke Madura.', 3, '2025-01-26 03:27:12', '2025-01-26 21:20:45'),
(433, 'VoYFCnDOxEhzfOxeMeHYgHRCnWcJXJYYnZhafo8P.png', 'Pengrajin Tusuk Sate', 'Pengrajin Tusuk Sate Majungan Baipajung adalah sebuah tempat produksi tusuk sate tradisional yang terletak di Majungan, Baipajung, Tanah Merah, Kabupaten Bangkalan, Jawa Timur. Tempat ini dikenal karena menghasilkan tusuk sate berkualitas tinggi yang terbuat dari bambu pilihan, yang banyak digunakan dalam industri kuliner, khususnya untuk menyajikan sate. Produk tusuk sate yang dihasilkan memiliki daya tahan yang baik dan sering dicari oleh pengusaha kuliner. Selain itu, pengrajin ini juga melayani pengambilan langsung dan pengiriman, dengan jam operasional dari Senin hingga Sabtu, serta mendapat ulasan positif dari pelanggan.', 5, '2025-01-26 03:27:12', '2025-01-26 21:20:34'),
(434, '6EN9T69SdXxFVkOzTxnM2wKPCHzAOhVO2R4NJnzR.png', 'Museum Cakranigrat', 'Museum Cakraningrat di Bangkalan, Madura, adalah museum bersejarah yang menampilkan koleksi benda-benda penting dari masa Kesultanan Cakraningrat, seperti senjata tradisional, keris, pakaian adat, hingga dokumen sejarah. Museum ini juga menyimpan artefak budaya Madura, seperti wayang, topeng, gamelan, dan barang etnografi yang menggambarkan kehidupan masyarakat Madura tempo dulu. Dengan arsitektur khas Madura, museum ini menjadi tempat edukasi dan pelestarian warisan budaya, serta destinasi wisata bagi pengunjung yang ingin mengenal sejarah dan budaya lokal lebih dalam. Terletak di pusat kota Bangkalan, museum ini mudah diakses dan sering menjadi tujuan wisata budaya di Madura.', 5, '2025-01-26 03:27:12', '2025-01-26 21:20:19'),
(435, 'd1Xvv1PBvXSSeuOnfJITshQWXhmZOUVm5XS1fKmi.png', 'Muesum Uang Perusnia', 'Museum Uang Perusnia di Bangkalan, Madura, didirikan oleh Salman Alrosyid, seorang pemuda yang sejak usia 7 tahun telah mengoleksi mata uang dari berbagai negara. Museum ini menampilkan sekitar 1.200 mata uang dan koin, termasuk koleksi langka seperti mata uang peninggalan Kerajaan Sriwijaya yang beredar sejak abad keenam. Salman mendirikan museum ini dengan dana pribadi pada usia 19 tahun, dengan tujuan mengedukasi masyarakat tentang sejarah melalui perkembangan mata uang. Museum ini terbuka untuk umum tanpa biaya masuk, memberikan kesempatan bagi pengunjung untuk mempelajari sejarah dan budaya melalui koleksi mata uang yang beragam.', 5, '2025-01-26 03:27:12', '2025-01-26 21:19:57'),
(436, 'Lg4YrQK42n4DOF4Dtfp5obi7u4B7QgrrxX38uYSi.png', 'Pande Besi Paterongan', 'Pande Besi Paterongan adalah sebuah usaha pandai besi yang berlokasi di Paterongan, Madura, Indonesia. Mereka mengkhususkan diri dalam pembuatan dan penjualan berbagai peralatan pertanian dan perkebunan, seperti sabit rumput merek SS, cangkul, dan alat-alat lainnya yang berkualitas tinggi. Usaha ini aktif di platform media sosial untuk mempromosikan produk-produknya dan berinteraksi dengan pelanggan. ', 5, '2025-01-26 03:27:12', '2025-01-26 21:19:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif_kriterias`
--
ALTER TABLE `alternatif_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_kriterias_wisata_id_foreign` (`wisata_id`),
  ADD KEY `alternatif_kriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`),
  ADD KEY `feedback_wisata_id_foreign` (`wisata_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `perbandingan_berpasangans`
--
ALTER TABLE `perbandingan_berpasangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisatas_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif_kriterias`
--
ALTER TABLE `alternatif_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2126;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_berpasangans`
--
ALTER TABLE `perbandingan_berpasangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatif_kriterias`
--
ALTER TABLE `alternatif_kriterias`
  ADD CONSTRAINT `alternatif_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatif_kriterias_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisatas`
--
ALTER TABLE `wisatas`
  ADD CONSTRAINT `wisatas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
