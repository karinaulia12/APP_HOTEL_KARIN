-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2022 pada 03.54
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

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
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fkamar` int(11) NOT NULL,
  `nama_fkamar` varchar(255) NOT NULL,
  `id_type_kamar` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fkamar`, `nama_fkamar`, `id_type_kamar`, `deskripsi`) VALUES
(18, '0', 12, '0'),
(19, '0', 13, '0'),
(20, '0', 14, '0'),
(21, 'Dua single bed, televisi, AC, telepon, toiletteries.', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas minus officia distinctio, numquam, inventore et, itaque vero eligendi iste incidunt vel vitae! Minus adipisci dolor magni, itaque minima est fugiat.'),
(22, 'King bed size, ruang tamu, ruang makan, dan kamar tidur terpisah.', 2, ''),
(23, 'Berada di lantai teratas sebuah hotel dengan pemandangan terbaik. Fasilitas mewah dihadirkan dalam kamar ini mulai dari 2 ruang kamar, ruang tamu, ruang makan, area kerja, hingga kolam renang pribadi.', 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id_fumum` int(11) NOT NULL,
  `nama_fumum` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id_fumum`, `nama_fumum`, `foto`, `deskripsi`) VALUES
(3, 'Restoran', '1651124456_0fd24fd953ef481215af.jpg', 'Dengan pemandangan kolam renang dan laut yang indah, AuHotelia menyajikan sarapan, makan siang, makan malam dan cemilan lezat menggunakan bahan paling segar untuk pengalaman bersantap yang paling orisinil dan menyenangkan.'),
(4, 'Gym', '1651124399_341879cbe94e7008f99f.jpg', 'Bagi anda yang suka berolahraga, Kami manajemen AuHotelia juga Menyediakan fasilitas olahraga dan gym, sehingga client juga bisa berolahraga di hotel tanpa harus pergi keluar sekedar mencari tempat GYM, dan juga berolahraga di GYM hotel kamijuga sangat menyenangkan karena sambil berolahraga juga bisa sambil menikmati sunset di Penghujung senja.'),
(5, 'Spa', '1651124526_6d1973c5b2f43459a1c8.jpg', 'AuHotelia menyediakan fasilitas SPA bagi para perempuan yang ingin tampil lebih cantik dan memanjakan diri mereka, selain itu petugas SPA juga sangat ramah serta produk spa yang pakai di hotel kami di bawah perlindungan dokter kecantikan, jadi di jamin aman untuk kulit client.'),
(6, 'Kolam Renang', '1651124689_d1c7777320ca275b153d.jpg', 'Bar kolam renang dengan penataan unik untuk melewatkan hari dengan secangkir teh atau kopi atau segelas koktail. Memiliki pemandangan laut dan kolam renang yang fantasitis'),
(7, 'Ruang Meeting', '1651124555_203a3ceb339c859829e5.jpg', 'Menyediakan Ruang meeting yang sangat mewah, ruang ini berguna sebagai tampat mengadakan acara rapat bisnis yang di lakukan oleh pengusaha - pengusaha besar, dan sebagai acara lainnya juga. Sehingga tidak rugi untuk para pebisnis atau pengusaha melakukan rapat penting mereka di AuHotelia.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(255) NOT NULL,
  `id_type_kamar` int(11) NOT NULL,
  `status_kmr` tinyint(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_type_kamar`, `status_kmr`, `foto`, `deskripsi`) VALUES
(1, 'A101', 1, 0, '', ''),
(2, 'A202', 2, 0, '', ''),
(3, 'A303', 3, 1, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `no_hp`, `alamat`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Auhotelia', '083823198025', 'Desa Auhotelia', 'admin'),
(2, 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', 'Resepsionis Auhotelia', '083823198025', 'Desa Auhotelia', 'resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_type_kamar` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` char(50) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `status` enum('dipesan','tersedia','ditempati','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_type_kamar`, `nama_pemesan`, `nama_tamu`, `no_telp`, `email`, `nik`, `checkin`, `checkout`, `harga`, `jml_kamar`, `total`, `status`) VALUES
(1, 3, 'Karin', 'Karin', '083823198025', 'karinaulia1225@gmail.com', '3201010101010', '2022-11-29', '2022-12-01', 1500000, 1, 3000000, 'ditempati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_kamar`
--

CREATE TABLE `type_kamar` (
  `id_type_kamar` int(11) NOT NULL,
  `type_kamar` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `stok_kamar` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `type_kamar`
--

INSERT INTO `type_kamar` (`id_type_kamar`, `type_kamar`, `harga`, `stok_kamar`, `foto`) VALUES
(1, 'Standard Room', 500000, 0, '1669689094_db45f66af9fb7ad87805.jpg'),
(2, 'Suite Room', 1000000, 0, '1669689232_d090db5a8143d7018d8c.jpg'),
(3, 'Presidential Room', 1500000, 0, '1669689297_53985caddd83bd0433d1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fkamar`),
  ADD KEY `id_type_kamar` (`id_type_kamar`);

--
-- Indeks untuk tabel `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id_fumum`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_type_kamar` (`id_type_kamar`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_type_kamar` (`id_type_kamar`);

--
-- Indeks untuk tabel `type_kamar`
--
ALTER TABLE `type_kamar`
  ADD PRIMARY KEY (`id_type_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fkamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id_fumum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `type_kamar`
--
ALTER TABLE `type_kamar`
  MODIFY `id_type_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_type_kamar`) REFERENCES `type_kamar` (`id_type_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_type_kamar`) REFERENCES `type_kamar` (`id_type_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_type_kamar`) REFERENCES `type_kamar` (`id_type_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
