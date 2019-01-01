-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jun 2018 pada 15.04
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

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
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(4, 'wening ambarsari', 'weningas', 'd59a50a6781a5a21aca898bada9701e4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `databus`
--

CREATE TABLE `databus` (
  `id_bus` int(5) NOT NULL,
  `namabus` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `asal` varchar(15) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `waktu` time NOT NULL,
  `sisakursi` int(2) NOT NULL,
  `jml_kursi` int(2) NOT NULL,
  `format_kursi` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `databus`
--

INSERT INTO `databus` (`id_bus`, `namabus`, `kelas`, `asal`, `tujuan`, `waktu`, `sisakursi`, `jml_kursi`, `format_kursi`) VALUES
(101, 'BUS DO', '', 'Cibitung', 'Purwokerto', '07:00:00', 40, 150000, 0),
(102, 'BUS RE', '', 'Cibitung', 'Pemalang', '07:00:00', 40, 100000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `namapenumpang` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `asal` varchar(10) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `waktu` time NOT NULL,
  `nokursi` int(2) NOT NULL,
  `tglberangkat` date NOT NULL,
  `harga` int(10) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(10) NOT NULL,
  `namapenumpang` varchar(20) NOT NULL,
  `telepon` int(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `databus`
--
ALTER TABLE `databus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `databus`
--
ALTER TABLE `databus`
  MODIFY `id_bus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
