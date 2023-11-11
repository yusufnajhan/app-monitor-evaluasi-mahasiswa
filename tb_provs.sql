-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 08:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `responsi`
--

-- --------------------------------------------------------
--
-- Table structure for table `tb_provs`
--

CREATE TABLE `tb_provs` (
  `kode_prov` varchar(255) NOT NULL,
  `nama_prov` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `tb_provs`
--

INSERT INTO `tb_provs` (`kode_prov`, `nama_prov`)
VALUES ('11', 'Aceh'),
  ('12', 'Sumatera Utara'),
  ('13', 'Sumatera Barat'),
  ('14', 'Riau'),
  ('15', 'Jambi'),
  ('16', 'Sumatera Selatan'),
  ('17', 'Bengkulu'),
  ('18', 'Lampung'),
  ('19', 'Kepulauan Bangka Belitung'),
  ('21', 'Kepulauan Riau'),
  ('31', 'DKI Jakarta'),
  ('32', 'Jawa Barat'),
  ('33', 'Jawa Tengah'),
  ('34', 'Daerah Istimewa Yogyakarta'),
  ('35', 'Jawa Timur'),
  ('36', 'Banten'),
  ('51', 'Bali'),
  ('52', 'Nusa Tenggara Barat'),
  ('53', 'Nusa Tenggara Timur'),
  ('61', 'Kalimantan Barat'),
  ('62', 'Kalimantan Tengah'),
  ('63', 'Kalimantan Selatan'),
  ('64', 'Kalimantan Timur'),
  ('65', 'Kalimantan Utara'),
  ('71', 'Sulawesi Utara'),
  ('72', 'Sulawesi Tengah'),
  ('73', 'Sulawesi Selatan'),
  ('74', 'Sulawesi Tenggara'),
  ('75', 'Gorontalo'),
  ('76', 'Sulawesi Barat'),
  ('81', 'Maluku'),
  ('82', 'Maluku Utara'),
  ('91', 'Papua Barat'),
  ('94', 'Papua'),
  ('99', 'Provinsikan');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_provs`
--
ALTER TABLE `tb_provs`
ADD PRIMARY KEY (`kode_prov`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;