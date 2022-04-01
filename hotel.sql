-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 03:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fkamar` int(11) NOT NULL,
  `id_type_kamar` int(11) NOT NULL,
  `nama_fkamar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fkamar`, `id_type_kamar`, `nama_fkamar`) VALUES
(1, 1, '2 single bed aaa'),
(2, 3, 'Ruang Tamu\r\n1 buah Kasur'),
(4, 6, '- Dapur\r\n- RuangTV\r\n- Bathup'),
(5, 2, '- Pemandangan yang cantik <br>\r\nnbhjbhj <br>\r\nkjnkj'),
(6, 4, 'Tersedia Coffee Maker'),
(7, 5, 'Tersedia ruang tamu'),
(8, 2, 'hjvhgyy');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id_fumum` int(11) NOT NULL,
  `nama_fumum` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id_fumum`, `nama_fumum`, `foto`, `deskripsi`) VALUES
(1, 'Hotel dengan bintang 5', '1647091042_83836b2ad87f37601d18.jpg', 'Terbukti dengan rating dan ulasan yang diberikan pelanggan'),
(2, 'Letak yang strategis', '1647091444_65789696a2e362377ba0.jpeg', 'Dekat dengan TSM Bekasi, RS Bekasi, dan lain sebagainya.');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(50) NOT NULL,
  `id_type_kamar` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_type_kamar`, `foto`, `deskripsi`) VALUES
(1, 'A101', 1, '', '1 buah kasur\r\nTv\r\nAc'),
(5, 'A102', 6, '1646827836_22f69b40770478a545dc.jpg', 'cantik'),
(7, 'F601', 6, '1646966642_ef5c3a75ac02c3820ae0.jpg', 'sjdhiushdaui'),
(8, 'C301', 3, '1648621783_8d4c6f725352c145b85a.jpg', 'snjsjj'),
(9, 'B101', 5, '1648691672_28cd8925a6b53e63bf60.jpg', 'hvhju');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('resepsionis','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `no_hp`, `alamat`, `level`) VALUES
(1, 'Admin AuHotelia', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08111111111', 'Jakarta', 'admin'),
(2, 'Resepsionis AuHotelia', 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', '0822222222', 'Bandung', 'resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nik` int(25) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jml_kamar` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nik`, `checkin`, `checkout`, `jml_kamar`, `harga`, `total`, `status`) VALUES
(5, 320820, '2022-03-28', '2022-03-29', 1, 2500000, 2500000, 2),
(6, 3200002, '2022-03-28', '2022-03-30', 1, 1000000, 2000000, 2),
(7, 12345, '2022-03-29', '2022-03-30', 1, 1000000, 1000000, 3),
(8, 302802, '2022-03-30', '2022-04-01', 2, 6000000, 12000000, 2),
(9, 567879009, '2022-04-01', '2022-04-02', 1, 1000000, 1000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_kamar`
--

CREATE TABLE `reservasi_kamar` (
  `id_reservasi_kamar` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi_kamar`
--

INSERT INTO `reservasi_kamar` (`id_reservasi_kamar`, `id_kamar`, `id_reservasi`) VALUES
(2, 1, 6),
(3, 1, 7),
(4, 1, 8),
(5, 5, 8),
(6, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `nik` int(25) NOT NULL,
  `nama_tamu` varchar(200) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`nik`, `nama_tamu`, `no_telp`, `email`) VALUES
(12345, 'anja', '081234', 'tamu1@gmail.com'),
(302802, 'Daniya', '088811122233', 'tamu@gmail.com'),
(320820, 'Tiara', '08222222222', 'karinaulia22@smk.belajar.id'),
(3200002, 'Andini', '08111111111111', 'rsp@gmail.com'),
(567879009, 'kkkk', '081234', 'tamu@gmail.com'),
(2147483647, 'Karin ', '083823198025', 'karinaulia22@smk.belajar.id');

-- --------------------------------------------------------

--
-- Table structure for table `type_kamar`
--

CREATE TABLE `type_kamar` (
  `id_type_kamar` int(11) NOT NULL,
  `type_kamar` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_kamar`
--

INSERT INTO `type_kamar` (`id_type_kamar`, `type_kamar`, `harga`) VALUES
(1, 'Standard Room', 1000000),
(2, 'Superior Room', 1500000),
(3, 'Deluxe Room', 2000000),
(4, 'Junior Suite Room', 2500000),
(5, 'Suite Room', 3000000),
(6, 'Presidential Room', 5000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fkamar`),
  ADD KEY `id_type_kamar` (`id_type_kamar`);

--
-- Indexes for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id_fumum`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_type_kamar11` (`id_type_kamar`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_reservasi` (`id_reservasi`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD PRIMARY KEY (`id_reservasi_kamar`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `type_kamar`
--
ALTER TABLE `type_kamar`
  ADD PRIMARY KEY (`id_type_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fkamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id_fumum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  MODIFY `id_reservasi_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_kamar`
--
ALTER TABLE `type_kamar`
  MODIFY `id_type_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_type_kamar`) REFERENCES `type_kamar` (`id_type_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_type_kamar`) REFERENCES `type_kamar` (`id_type_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tamu` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD CONSTRAINT `reservasi_kamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_kamar_ibfk_2` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
