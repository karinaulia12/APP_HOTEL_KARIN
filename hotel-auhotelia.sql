-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table hotel.fasilitas_kamar: ~4 rows (approximately)
DELETE FROM `fasilitas_kamar`;
INSERT INTO `fasilitas_kamar` (`id_fkamar`, `id_type_kamar`, `nama_fkamar`, `deskripsi`) VALUES
	(18, 12, 'Dua single bed, televisi, AC, telepon, toiletteries.', ''),
	(19, 13, 'King bed size, ruang tamu, ruang makan, dan kamar tidur terpisah.', ''),
	(20, 14, 'Berada di lantai teratas sebuah hotel dengan pemandangan terbaik. Fasilitas mewah dihadirkan dalam kamar ini mulai dari 2 ruang kamar, ruang tamu, ruang makan, area kerja, hingga kolam renang pribadi.', '');

-- Dumping data for table hotel.fasilitas_umum: ~6 rows (approximately)
DELETE FROM `fasilitas_umum`;
INSERT INTO `fasilitas_umum` (`id_fumum`, `nama_fumum`, `foto`, `deskripsi`) VALUES
	(3, 'Restoran', '1651124456_0fd24fd953ef481215af.jpg', 'Dengan pemandangan kolam renang dan laut yang indah, AuHotelia menyajikan sarapan, makan siang, makan malam dan cemilan lezat menggunakan bahan paling segar untuk pengalaman bersantap yang paling orisinil dan menyenangkan.'),
	(4, 'Gym', '1651124399_341879cbe94e7008f99f.jpg', 'Bagi anda yang suka berolahraga, Kami manajemen AuHotelia juga Menyediakan fasilitas olahraga dan gym, sehingga client juga bisa berolahraga di hotel tanpa harus pergi keluar sekedar mencari tempat GYM, dan juga berolahraga di GYM hotel kamijuga sangat menyenangkan karena sambil berolahraga juga bisa sambil menikmati sunset di Penghujung senja.'),
	(5, 'Spa', '1651124526_6d1973c5b2f43459a1c8.jpg', 'AuHotelia menyediakan fasilitas SPA bagi para perempuan yang ingin tampil lebih cantik dan memanjakan diri mereka, selain itu petugas SPA juga sangat ramah serta produk spa yang pakai di hotel kami di bawah perlindungan dokter kecantikan, jadi di jamin aman untuk kulit client.'),
	(6, 'Kolam Renang', '1651124689_d1c7777320ca275b153d.jpg', 'Bar kolam renang dengan penataan unik untuk melewatkan hari dengan secangkir teh atau kopi atau segelas koktail. Memiliki pemandangan laut dan kolam renang yang fantasitis'),
	(7, 'Ruang Meeting', '1651124555_203a3ceb339c859829e5.jpg', 'Menyediakan Ruang meeting yang sangat mewah, ruang ini berguna sebagai tampat mengadakan acara rapat bisnis yang di lakukan oleh pengusaha - pengusaha besar, dan sebagai acara lainnya juga. Sehingga tidak rugi untuk para pebisnis atau pengusaha melakukan rapat penting mereka di AuHotelia.');

-- Dumping data for table hotel.kamar: ~15 rows (approximately)
DELETE FROM `kamar`;
INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_type_kamar`, `status_kmr`, `foto`, `deskripsi`) VALUES
	(27, 'A101', 12, 'tersedia', '', ''),
	(28, 'B201', 13, 'dipesan', '', ''),
	(29, 'E501', 14, 'ditempati', '', ''),
	(30, 'A102', 12, 'tersedia', '', ''),
	(31, 'A103', 12, 'tersedia', '', ''),
	(32, 'A104', 12, 'tersedia', '', ''),
	(33, 'A105', 12, 'tersedia', '', ''),
	(34, 'B202', 13, 'tersedia', '', ''),
	(35, 'B203', 13, 'tersedia', '', ''),
	(36, 'B204', 13, 'tersedia', '', ''),
	(37, 'B205', 13, 'tersedia', '', ''),
	(38, 'E502', 14, 'ditempati', '', ''),
	(39, 'E503', 14, 'ditempati', '', ''),
	(40, 'E504', 14, 'ditempati', '', ''),
	(41, 'E505', 14, 'tersedia', '', '');

-- Dumping data for table hotel.petugas: ~2 rows (approximately)
DELETE FROM `petugas`;
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `no_hp`, `alamat`, `level`) VALUES
	(1, 'Admin AuHotelia', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08111111111', 'Jakarta', 'admin'),
	(2, 'Resepsionis AuHotelia', 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', '0822222222', 'Bandung', 'resepsionis');

-- Dumping data for table hotel.reservasi: ~3 rows (approximately)
DELETE FROM `reservasi`;
INSERT INTO `reservasi` (`id_reservasi`, `id_type_kamar`, `nik`, `nama_pemesan`, `no_telp`, `email`, `nama_tamu`, `checkin`, `checkout`, `jml_kamar`, `harga`, `total`, `status`) VALUES
	(5, 14, '2147483647', 'Karin', '083823198025', 'karinaulia495@gmail.com', 'Karin ', '2022-05-18', '2022-05-19', 2, 10000000, 10000000, 3),
	(6, 13, '32082013456', 'Aulia', '083823198025', 'tamu@gmail.com', 'Aulia', '2022-05-18', '2022-05-20', 1, 2500000, 5000000, 1),
	(7, 14, '320000000000001', 'Lala', '083823198025', 'tamu@gmail.com', 'Lala', '2022-05-19', '2022-05-20', 2, 10000000, 10000000, 2),
	(8, 14, '32082013456', 'Karin', '083823198025', 'rsp@gmail.com', 'Andini', '2022-05-20', '2022-05-21', 2, 10000000, 10000000, 1);

-- Dumping data for table hotel.reservasi_kamar: ~3 rows (approximately)
DELETE FROM `reservasi_kamar`;
INSERT INTO `reservasi_kamar` (`id_reservasi_kamar`, `id_kamar`, `id_reservasi`) VALUES
	(27, 29, 25),
	(28, 29, 26),
	(29, 29, 27);

-- Dumping data for table hotel.type_kamar: ~3 rows (approximately)
DELETE FROM `type_kamar`;
INSERT INTO `type_kamar` (`id_type_kamar`, `type_kamar`, `harga`, `foto`, `stok_kamar`) VALUES
	(12, 'Standard Room', 1000000, '1652845053_3153d65d12cbdf2a26db.jpg', 0),
	(13, 'Suite Room', 2500000, '1652425080_39ba61e077615a759959.jpg', 0),
	(14, 'Presidential Room', 5000000, '1652425156_ea7acff52415b2622c1f.jpg', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
