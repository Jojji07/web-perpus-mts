-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jan 2021 pada 04.22
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(150) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_petugas`, `nama_petugas`, `pass`) VALUES
('1234567890', 'Tegar', 'admin'),
('53647736', 'Asty', 'admin'),
('id_petugas', 'Amri', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_peminjam` varchar(10) NOT NULL,
  `nama_peminjam` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_peminjam`, `nama_peminjam`, `alamat`) VALUES
('5190411479', 'Tegar 1', 'Yogyakarta'),
('67511109', 'Ardy', 'Tegal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dettransaksi`
--

CREATE TABLE IF NOT EXISTS `dettransaksi` (
  `idDetTransaksi` int(11) NOT NULL,
  `kodepinjam` varchar(25) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dettransaksi`
--

INSERT INTO `dettransaksi` (`idDetTransaksi`, `kodepinjam`, `id`) VALUES
(1, 'PE202101060001', '313645782'),
(2, 'PE202101060007', '123456'),
(3, 'PE202101060007', '313645782'),
(4, 'PE202101060007', '324657846'),
(5, 'PE202101060008', '123456'),
(6, 'PE202101060008', '324657846');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `pengarang` varchar(150) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `jml_buku` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=324657848 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jml_buku`) VALUES
(313645782, 'Laskar Pelangi', 'Andrea Hirata', 'Yogyakarta, Bandung Pustaka', '2005', '970-3062-79-7', 9),
(324657846, '5 CM', 'Donny Dirgantoro', 'Grasindo', '2007', '979-7591-51-4', 7),
(324657847, 'Muhammad Al Fatih 1453', 'Felix Siauw', 'Al Fatih Press', '2012', '3444-9388-7890', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kodepinjam` varchar(25) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL,
  `id_peminjam` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kodepinjam`, `tglpinjam`, `tglkembali`, `id_peminjam`, `id_petugas`) VALUES
('01111', '2021-01-06', '2021-01-13', '5190411479', '1234567890'),
('PE202101060001', '2021-01-06', '2021-01-13', '5190411479', '1234567890'),
('PE202101060002', '2021-01-13', '0000-00-00', '', '1234567890'),
('PE202101060003', '2021-01-06', '2021-01-13', '5205111479', '1234567890'),
('PE202101060004', '2021-01-06', '2021-01-13', '5190411479', '1234567890'),
('PE202101060005', '2021-01-06', '2021-01-13', '5205111479', '1234567890'),
('PE202101060006', '2021-01-06', '2021-01-13', '5190411479', '1234567890'),
('PE202101060007', '2021-01-06', '2021-01-13', '5190411479', '1234567890'),
('PE202101060008', '2021-01-06', '2021-01-13', '5205111479', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `dettransaksi`
--
ALTER TABLE `dettransaksi`
  ADD PRIMARY KEY (`idDetTransaksi`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kodepinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dettransaksi`
--
ALTER TABLE `dettransaksi`
  MODIFY `idDetTransaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=324657848;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
