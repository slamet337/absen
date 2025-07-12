-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 08:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `ruangan` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `nama`, `prodi`, `fakultas`, `nohp`, `ruangan`, `tgl`, `status`) VALUES
('D10123001', '$2y$10$29D7PrwPunJpSdW.RQvSyui3AE44iX8XNaORf6bFf2N7bNMlyuxya', 'INDAH SEPTIANI HUNOU', 'S1 Ilmu Hukum', 'HUKUM', '', 'GZHZ2', '2023-11-19', '1'),
('D10123002', '', 'PUPUT ARIANTI KAIMUDIN', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '2023-11-19', '1'),
('D10123003', '', 'NAFILA HARSYA RAMADHANI', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '0000-00-00', '0'),
('D10123005', '', 'KOMANG LENI LESTARI', 'S1 Teknik Informatika', 'TEKNIK', '', '3', '2023-11-19', '1'),
('D10123008', '', 'SAHRUL BARMAWI', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '0000-00-00', '0'),
('D10123009', '', 'MAGFIRAH NUR RAHMADHANI', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '2023-11-20', '0'),
('D10123010', '', 'TRIANY MBALOTO', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '0000-00-00', '0'),
('D10123011', '', 'GHYFARI ARDANA PUTRA TUMU', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '0000-00-00', '0'),
('F55123006', '', 'CHYNTIA MARGARETHA', 'S1 Teknik Informatika', 'TEKNIK', '', '3', '2023-11-19', '1'),
('F55123007', '', 'NILUH RISTIANI', 'S1 Ilmu Hukum', 'HUKUM', '', '3', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` char(36) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL,
  `role` varchar(1) NOT NULL,
  `created_at` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `namauser`, `status`, `role`, `created_at`) VALUES
('85fa70fa-a6b9-11ed-bc36-c01850377eb8', 'admin', 'admin', 'Agrhi', '1', '1', ''),
('db051ff2-5e3c-11f0-b92d-68f728843a5b', 'GZHZ', 'memed', ';petugas', '1', '2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
