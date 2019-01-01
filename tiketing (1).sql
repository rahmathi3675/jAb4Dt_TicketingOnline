-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2019 pada 10.52
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(5) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('ADM01', 'wening ambarsari', 'weningas', '25f9e79432'),
('ADM02', 'ADMIN', 'ADMINISTRATOR', '827ccb0eea'),
('ADMIN', 'Wening', 'wening', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `databus`
--

CREATE TABLE `databus` (
  `id_bus` varchar(10) NOT NULL,
  `nama_bus` varchar(40) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `asal` varchar(15) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `jml_kursi` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `databus`
--

INSERT INTO `databus` (`id_bus`, `nama_bus`, `kelas`, `asal`, `tujuan`, `jml_kursi`) VALUES
('BUS0000001', 'Surya Kencana', 'Ekonomi', 'Cibitung', 'Bandung', 79),
('BUS0000003', 'Patas Antar Kota', 'Bisnis', 'Cibitung', 'Semarang', 79),
('BUS0000004', 'Surya Kencana', 'Ekonomi', 'Cibitung', 'Solo', 79),
('BUS0000006', 'Alam Sutra', 'Eksekutif', 'Cibitung', 'Surabaya', 63),
('BUS0000007', 'Wina Kencana', 'Eksekutif', 'Cibitung', 'Tasik', 63),
('BUS0000008', 'Cinta Surya ALam', 'Ekonomi', 'Cibitung', 'Bandung', 79),
('BUS0000009', 'Kota Alam Malang', 'Bisnis', 'Cibitung', 'Malang', 79),
('BUS0000010', 'Kuda Kencana', 'Eksekutif', 'Cibitung', 'Jogjakarta', 63),
('BUS0000011', 'Sinar Jaya', 'Eksekutif', 'Cibitung', 'Solo', 63),
('BUS0000012', 'Sinar Jaya', 'Ekonomi', 'Cibitung', 'Malang', 79),
('BUS0000013', 'tes', 'Bisnis', 'Cibitung', 'Cianjur', 79);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `no_kursi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_jadwal`, `no_kursi`) VALUES
('PSN0000002', 'JD00000006', 'C2'),
('PSN0000002', 'JD00000006', 'B2'),
('PSN0000004', 'JD00000005', 'B12'),
('PSN0000004', 'JD00000005', 'D16'),
('PSN0000006', 'JD00000006', 'E6'),
('PSN0000006', 'JD00000005', 'E8'),
('PSN0000008', 'JD00000005', 'A1'),
('PSN0000008', 'JD00000005', 'C1'),
('PSN0000009', 'JD00000005', 'B7'),
('PSN0000009', 'JD00000006', 'F1'),
('PSN0000011', 'JD00000005', 'E1'),
('PSN0000011', 'JD00000005', 'E2'),
('PSN0000012', 'JD00000009', 'B1'),
('PSN0000012', 'JD00000009', 'B3'),
('PSN0000013', 'JD00000011', 'A3'),
('PSN0000013', 'JD00000011', 'B5'),
('PSN0000015', 'JD00000011', 'B8'),
('PSN0000015', 'JD00000011', 'D7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_keberangkatan`
--

CREATE TABLE `jadwal_keberangkatan` (
  `id_jadwal` varchar(10) NOT NULL,
  `id_bus` varchar(10) NOT NULL,
  `waktu_berangkat` datetime NOT NULL,
  `harga_tiket` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`id_jadwal`, `id_bus`, `waktu_berangkat`, `harga_tiket`) VALUES
('JD00000001', 'BUS0000001', '2018-08-03 07:18:00', 200000),
('JD00000002', 'BUS0000003', '2018-08-03 03:20:00', 400000),
('JD00000005', 'BUS0000003', '2018-09-20 04:32:00', 400000),
('JD00000006', 'BUS0000001', '2018-09-28 04:32:00', 400000),
('JD00000007', 'BUS0000003', '2018-09-25 03:22:00', 450000),
('JD00000008', 'BUS0000001', '2018-09-27 03:20:00', 550000),
('JD00000009', 'BUS0000010', '2018-09-05 14:45:00', 860000),
('JD00000010', 'BUS0000003', '2018-08-31 00:02:00', 770000),
('JD00000011', 'BUS0000006', '2019-01-01 03:31:00', 500000),
('JD00000012', 'BUS0000012', '2019-01-05 15:50:00', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` varchar(10) NOT NULL,
  `namapenumpang` varchar(20) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_ktp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `namapenumpang`, `telepon`, `email`, `no_ktp`) VALUES
('CST0000001', 'Wening Chaha', '089711116666', 'wening@gmail.com', '1234567890123456'),
('CST0000002', 'Anisa A', '938493849', 'sdsd@gmail.com', '12312232323'),
('CST0000003', 'Indah Dewi Pertiwi', '087761726757', 'indah@gmail.com', '1223847384872378'),
('CST0000004', 'Okki Lukman', '283928398', 'aas@gmail.com', '1298739843'),
('CST0000005', 'Wening 2', '086767676767', 'wening@gmail.com', '345645454666'),
('CST0000006', 'M. Rizardi', '078172817', 'rizardi@example.com', '129192');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_penumpang` varchar(10) NOT NULL,
  `id_admin` varchar(5) DEFAULT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_expired` datetime NOT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `status_pesanan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_penumpang`, `id_admin`, `tanggal_pesan`, `tanggal_expired`, `tanggal_bayar`, `status_pesanan`) VALUES
('PSN0000002', 'CST0000002', 'ADMIN', '2018-08-04 02:15:13', '2018-08-04 03:45:13', '2018-08-04 03:04:21', 1),
('PSN0000004', 'CST0000001', 'ADMIN', '2018-08-04 19:20:13', '2018-08-04 20:50:13', '2018-08-04 19:22:29', 1),
('PSN0000006', 'CST0000001', 'ADMIN', '2018-08-04 19:22:55', '2018-08-04 20:52:55', '2018-08-04 19:25:25', 1),
('PSN0000008', 'CST0000001', 'ADMIN', '2018-08-04 20:20:04', '2018-08-04 21:50:04', '2018-08-04 20:28:24', 1),
('PSN0000009', 'CST0000001', 'ADMIN', '2018-08-04 20:28:42', '2018-08-04 21:58:42', '2018-08-04 20:35:44', 1),
('PSN0000011', 'CST0000005', 'ADMIN', '2018-08-06 14:56:56', '2018-08-06 16:26:56', '2018-08-06 15:00:03', 1),
('PSN0000012', 'CST0000002', 'ADMIN', '2018-08-06 15:17:30', '2018-08-06 16:47:30', '2018-08-06 15:18:10', 1),
('PSN0000013', 'CST0000001', 'ADMIN', '2018-12-31 14:31:11', '2018-12-31 16:01:11', '2018-12-31 14:51:28', 1),
('PSN0000014', 'CST0000002', '', '2018-12-31 14:34:40', '2018-12-31 16:04:40', '0000-00-00 00:00:00', 0),
('PSN0000015', 'CST0000002', '', '2018-12-31 14:51:48', '2018-12-31 16:21:48', '0000-00-00 00:00:00', 0),
('PSN0000016', 'CST0000005', '', '2018-12-31 14:57:40', '2018-12-31 16:27:40', '0000-00-00 00:00:00', 0),
('PSN0000017', 'CST0000001', '', '2018-12-31 14:58:17', '2018-12-31 16:28:17', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `no_kursi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id_pesanan`, `id_jadwal`, `no_kursi`) VALUES
('PSN0000016', 'JD00000011', 'D10'),
('PSN0000016', 'JD00000011', 'B10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `databus`
--
ALTER TABLE `databus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_bus` (`id_bus`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_penumpang` (`id_penumpang`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_keberangkatan` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id_penumpang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
