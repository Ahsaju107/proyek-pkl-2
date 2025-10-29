-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2025 at 04:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_produk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(4, 'pakaian dalam'),
(8, 'obat-obatan'),
(9, 'Narkoba'),
(10, 'Racun'),
(11, 'Hewan'),
(12, 'Senjata Api'),
(13, 'Organ Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `jumlah_produk` int(15) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_user`, `id_produk`, `jumlah_produk`) VALUES
(124, '2', '135', 6),
(125, '2', '134', 5),
(134, '2', '140', 2),
(135, '21', '137', 6),
(136, '21', '134', 1),
(137, '21', '135', 1),
(138, '1', '140', 2),
(139, '1', '139', 3),
(140, '2', '137', 1),
(141, '2', '138', 1),
(142, '2', '139', 1),
(143, '2', '142', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metode_pembayaran`
--

CREATE TABLE `tb_metode_pembayaran` (
  `id_metode_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_metode_pembayaran`
--

INSERT INTO `tb_metode_pembayaran` (`id_metode_pembayaran`, `metode_pembayaran`) VALUES
(1, 'Qris'),
(2, 'BRI'),
(4, 'biji kuda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_opsi_pembayaran`
--

CREATE TABLE `tb_opsi_pembayaran` (
  `id_opsi_pembayaran` int(11) NOT NULL,
  `tempo_pembayaran` varchar(50) NOT NULL,
  `lama_waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_opsi_pembayaran`
--

INSERT INTO `tb_opsi_pembayaran` (`id_opsi_pembayaran`, `tempo_pembayaran`, `lama_waktu`) VALUES
(1, 'Net Payment 90 Hari', '90'),
(7, 'Take Away', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pajak`
--

CREATE TABLE `tb_pajak` (
  `id_pajak` int(11) NOT NULL,
  `nilai_pajak` int(11) NOT NULL,
  `nilai_pemotong` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pajak`
--

INSERT INTO `tb_pajak` (`id_pajak`, `nilai_pajak`, `nilai_pemotong`) VALUES
(1, 11, '1.11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `satuan_produk` varchar(15) NOT NULL,
  `kategori_produk` varchar(15) NOT NULL,
  `gambar_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `harga_produk`, `satuan_produk`, `kategori_produk`, `gambar_produk`) VALUES
(134, 'Sushi', 57000, 'Unit', 'Makanan', 'sushi.jpg'),
(135, 'Gurame Gosong', 34000, 'Unit', 'Makanan', 'gurame-bakar.jpg'),
(137, 'Nasi padang', 13000, 'Unit', 'Makanan', 'nasi-padang.jpeg'),
(138, 'Sate Koruptor', 5000, 'Unit', 'Makanan', 'sate.jpg'),
(139, 'Ramen Ichiraku', 44000, 'Unit', 'Makanan', 'ramen.jpg'),
(140, 'Ketoprak', 12000, 'Unit', 'Makanan', 'ketoprak.jpg'),
(141, 'Nasi Goreng', 14000, 'Unit', 'makanan', 'nasi-goreng.jpg'),
(149, 'AK-47 Mamat Gunshop', 4000000, 'unit', 'Senjata Api', 'ak47.jpg'),
(150, 'Racun Sianida', 1000000, 'kilo', 'Racun', 'ini-alasan-kenapa-sianida-bisa-membunuhmu.jpg'),
(151, 'sempak gusion', 400000, 'unit', 'pakaian dalam', 'Mobile-Legends-Bang-Bang-Gusion-Holy-Blade-Mens-Boxers-lifestyle.jpg'),
(152, 'black worker (premium)', 9800000, 'unit', 'makanan', 'black-worker.jpg'),
(153, 'Goblin Super', 55000000, 'unit', 'Hewan', 'goblin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
(16, 'unit'),
(21, 'liter'),
(31, 'kilo'),
(32, 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tags_transaksi`
--

CREATE TABLE `tb_tags_transaksi` (
  `id_tags_transaksi` int(11) NOT NULL,
  `tags_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tags_transaksi`
--

INSERT INTO `tb_tags_transaksi` (`id_tags_transaksi`, `tags_transaksi`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(6, 'pler');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `alamat_customer` varchar(100) NOT NULL,
  `biaya_transaksi` varchar(50) NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  `phone_customer` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nama_customer`, `alamat_customer`, `biaya_transaksi`, `email_customer`, `phone_customer`) VALUES
(30, 'Saddam ', 'Kekaisaran Ngawi Selatan', '528000', 'akunwuwatujuh7@gmail.com', '08890162255'),
(31, 'Saddam J', 'Kekaisaran Ngawi Utara\r\n', '528000', 'akunwuwatujuh7@gmail.com', '08890162255'),
(32, 'Rice Shower', 'kekaisaran ngawi selatan jl. pahlawan rusdi simanjuntak', '156000', 'ricecooker@itnsa.id', '088997755');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `#` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`#`, `username`, `password`, `email`) VALUES
(1, 'user1', 'user1', 'user1@gmail.com'),
(2, 'user2', 'user2', 'user2@gmail.com'),
(3, 'Admin', 'AdminP@ssw0rd', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  ADD PRIMARY KEY (`id_metode_pembayaran`);

--
-- Indexes for table `tb_opsi_pembayaran`
--
ALTER TABLE `tb_opsi_pembayaran`
  ADD PRIMARY KEY (`id_opsi_pembayaran`);

--
-- Indexes for table `tb_pajak`
--
ALTER TABLE `tb_pajak`
  ADD PRIMARY KEY (`id_pajak`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_tags_transaksi`
--
ALTER TABLE `tb_tags_transaksi`
  ADD PRIMARY KEY (`id_tags_transaksi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`#`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  MODIFY `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_opsi_pembayaran`
--
ALTER TABLE `tb_opsi_pembayaran`
  MODIFY `id_opsi_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pajak`
--
ALTER TABLE `tb_pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_tags_transaksi`
--
ALTER TABLE `tb_tags_transaksi`
  MODIFY `id_tags_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `#` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
