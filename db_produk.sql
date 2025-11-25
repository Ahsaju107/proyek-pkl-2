-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2025 at 10:02 AM
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
-- Table structure for table `jur_main_biaya`
--

CREATE TABLE `jur_main_biaya` (
  `jurbi_code` varchar(50) NOT NULL,
  `jurbi_code_type` enum('M','A') NOT NULL DEFAULT 'A',
  `jurbi_akun_pay` varchar(10) NOT NULL,
  `jurbi_penerima` varchar(10) NOT NULL,
  `jurbi_date_transaksi` date NOT NULL,
  `jurbi_metode_bayar` varchar(50) NOT NULL,
  `jurbi_tags` varchar(50) NOT NULL,
  `jurbi_alamat` text NOT NULL,
  `jurbi_note` text NOT NULL,
  `jurbi_lampiran` text NOT NULL,
  `jurbi_subtotal` double NOT NULL,
  `jurbi_ppn_type` enum('I','E') NOT NULL DEFAULT 'E',
  `jurbi_ppn` double NOT NULL,
  `jurbi_sementara` double NOT NULL,
  `jurbi_pot_type` enum('A','B') NOT NULL DEFAULT 'A',
  `jurbi_pot_akun` varchar(10) NOT NULL,
  `jurbi_pot_pemotong` double NOT NULL,
  `jurbi_potongan` double NOT NULL,
  `jurbi_grandtotal` double NOT NULL,
  `jurbi_type` enum('B','W','D','T') NOT NULL DEFAULT 'B',
  `jurbi_status` enum('A','P','C') NOT NULL DEFAULT 'P',
  `jurbi_owner` varchar(25) NOT NULL,
  `jurbi_record` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jur_main_biaya_adds`
--

CREATE TABLE `jur_main_biaya_adds` (
  `jurbi_det_id` int(11) NOT NULL,
  `jurbi_det_master` varchar(25) NOT NULL,
  `jurbi_det_akun` varchar(10) NOT NULL,
  `jurbi_det_detail` text NOT NULL,
  `jurbi_det_pajak` varchar(10) NOT NULL,
  `jurbi_det_nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jur_main_payment`
--

CREATE TABLE `jur_main_payment` (
  `payment_code` varchar(50) NOT NULL,
  `payment_auto` enum('M','A') NOT NULL DEFAULT 'A',
  `payment_type_trx` enum('pen','pem') NOT NULL,
  `payment_invoice` text NOT NULL,
  `payment_datauser` varchar(50) NOT NULL,
  `payment_email` varchar(150) NOT NULL,
  `payment_datauser_hutang` varchar(20) NOT NULL,
  `payment_datauser_piutang` varchar(20) NOT NULL,
  `payment_paymentaccount` varchar(20) NOT NULL,
  `payment_metode_bayar` varchar(150) NOT NULL,
  `payment_tanggal` date NOT NULL,
  `payment_tags` varchar(50) NOT NULL,
  `payment_note` text NOT NULL,
  `payment_file` text NOT NULL,
  `payment_sub_total` double NOT NULL,
  `payment_potongan_akun` varchar(20) NOT NULL,
  `payment_potongan_value` varchar(11) NOT NULL,
  `payment_potongan` double NOT NULL,
  `payment_total` double NOT NULL,
  `payment_status` enum('A','P','R') NOT NULL DEFAULT 'P',
  `payment_owner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jur_main_payment`
--

INSERT INTO `jur_main_payment` (`payment_code`, `payment_auto`, `payment_type_trx`, `payment_invoice`, `payment_datauser`, `payment_email`, `payment_datauser_hutang`, `payment_datauser_piutang`, `payment_paymentaccount`, `payment_metode_bayar`, `payment_tanggal`, `payment_tags`, `payment_note`, `payment_file`, `payment_sub_total`, `payment_potongan_akun`, `payment_potongan_value`, `payment_potongan`, `payment_total`, `payment_status`, `payment_owner`) VALUES
('100.00000000001', 'A', 'pen', '001/BUS/INV/08/2025', 'ID00000000088', 'UDI@PALINDO.ID', '211-000', '112-000', '111-002', 'Pembayaran Tunai', '2025-08-25', '', '', '', 2506452, '', '0', 0, 2506452, 'P', 'ID00000000001'),
('100.00000000002', 'A', 'pen', '10000000000001', 'ID00000000046', 'aisyahkumaladewi420@gmail.com', '211-000', '112-000', '111-002', 'Transfer - Bank BRI', '2025-10-24', '', '', '', 500000, '', '0', 0, 500000, 'A', 'ID00000000001'),
('100.00000000003', 'A', 'pen', '10000000000002', 'ID00000000084', '-', '211-000', '112-002', '111-001', 'Pembayaran Tunai', '2025-10-24', '', '', '', 100000, '', '0', 0, 100000, 'A', 'ID00000000001'),
('200.00000000001', 'A', 'pem', '20000000000002', 'ID00000000084', '-', '212-000', '112-002', '111-001', 'Pembayaran Tunai', '2025-10-24', '', '', '', 100000, '', '0', 0, 100000, 'A', 'ID00000000001');

-- --------------------------------------------------------

--
-- Table structure for table `jur_main_payment_adds`
--

CREATE TABLE `jur_main_payment_adds` (
  `tgh_id` int(11) NOT NULL,
  `tgh_paycode` varchar(50) NOT NULL,
  `tgh_code` varchar(50) NOT NULL,
  `tgh_desc` text NOT NULL,
  `tgh_date` date NOT NULL,
  `tgh_temp` date NOT NULL,
  `tgh_tagihan` double NOT NULL,
  `tgh_sistagi` double NOT NULL,
  `tgh_payment` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jur_main_payment_adds`
--

INSERT INTO `jur_main_payment_adds` (`tgh_id`, `tgh_paycode`, `tgh_code`, `tgh_desc`, `tgh_date`, `tgh_temp`, `tgh_tagihan`, `tgh_sistagi`, `tgh_payment`) VALUES
(1, '100.00000000001', '001/BUS/INV/08/2025', '', '2025-08-25', '2025-09-24', 2506452, 2506452, 2506452),
(2, '100.00000000002', '10000000000001', '', '2025-10-24', '2025-10-27', 500000, 500000, 500000),
(3, '100.00000000003', '10000000000002', '', '2025-10-24', '2025-10-27', 100000, 100000, 100000),
(4, '200.00000000001', '20000000000002', '', '2025-10-24', '2025-10-27', 100000, 100000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `jur_main_pempen`
--

CREATE TABLE `jur_main_pempen` (
  `fact_code` varchar(50) NOT NULL,
  `fact_auto` enum('M','A','B') NOT NULL DEFAULT 'A',
  `fact_type_trx` enum('pen','pem') NOT NULL DEFAULT 'pen',
  `fact_datauser` varchar(50) NOT NULL,
  `fact_datauser_hutang` varchar(20) NOT NULL,
  `fact_datauser_piutang` varchar(20) NOT NULL,
  `fact_alamat` text NOT NULL,
  `fact_email` varchar(100) NOT NULL,
  `fact_syarat` varchar(50) NOT NULL,
  `fact_tanggal` date NOT NULL,
  `fact_tempo` date NOT NULL,
  `fact_ppn_type` enum('E','I') NOT NULL DEFAULT 'E',
  `fact_sub_total` double NOT NULL,
  `fact_pajak` double NOT NULL,
  `fact_pot_type` enum('A','B') NOT NULL DEFAULT 'A',
  `fact_potongan_akun` varchar(20) NOT NULL,
  `fact_potongan_value` varchar(11) NOT NULL,
  `fact_potongan` double NOT NULL,
  `fact_sementara` double NOT NULL,
  `fact_total` double NOT NULL,
  `fact_pembayaran` double NOT NULL DEFAULT 0,
  `fact_tagihan` double NOT NULL,
  `fact_note` text NOT NULL,
  `fact_file` text NOT NULL,
  `fact_status` enum('A','P','R') NOT NULL DEFAULT 'P',
  `fact_tags` varchar(50) NOT NULL,
  `fact_akun_bayar` varchar(20) NOT NULL,
  `fact_owner` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jur_main_pempen`
--

INSERT INTO `jur_main_pempen` (`fact_code`, `fact_auto`, `fact_type_trx`, `fact_datauser`, `fact_datauser_hutang`, `fact_datauser_piutang`, `fact_alamat`, `fact_email`, `fact_syarat`, `fact_tanggal`, `fact_tempo`, `fact_ppn_type`, `fact_sub_total`, `fact_pajak`, `fact_pot_type`, `fact_potongan_akun`, `fact_potongan_value`, `fact_potongan`, `fact_sementara`, `fact_total`, `fact_pembayaran`, `fact_tagihan`, `fact_note`, `fact_file`, `fact_status`, `fact_tags`, `fact_akun_bayar`, `fact_owner`) VALUES
('001/BUS/INV/08/2025', 'B', 'pen', 'ID00000000088', '211-000', '112-000', '', 'UDI@PALINDO.ID', '30', '2025-08-25', '2025-09-24', 'E', 2258065, 248387, 'B', '', '0', 0, 2506452, 2506452, 2506452, 0, '', '', 'A', '', '412-003', 'ID00000000001'),
('002/BUS/INV/10/2025', 'B', 'pen', 'ID00000000088', '211-000', '112-000', '', 'UDI@PALINDO.ID', '30', '2025-10-28', '2025-11-27', 'E', 1290323, 141936, 'B', '', '0', 0, 1432259, 1432259, 0, 1432259, '', '', 'P', '', '412-003', 'ID00000000001'),
('003/BUS/INV/11/2025', 'B', 'pen', 'ID00000000088', '211-000', '112-000', '', 'UDI@PALINDO.ID', '30', '2025-11-01', '2025-12-01', 'E', 10000000, 1100000, 'B', '', '0', 0, 11100000, 11100000, 0, 11100000, '', '', 'P', '', '412-003', 'ID00000000001'),
('10000000000001', 'A', 'pen', 'ID00000000046', '211-000', '112-000', 'Dusun Talep, RT 001 RW 001, Desa Rawadalem, Kec. Balongan, Kab. Indramayu', 'aisyahkumaladewi420@gmail.com', '3', '2025-10-24', '2025-10-27', 'E', 500000, 0, 'B', '', '0', 0, 500000, 500000, 500000, 0, '', '', 'A', '', '412-003', 'ID00000000001'),
('10000000000002', 'A', 'pen', 'ID00000000084', '211-000', '112-002', '-', '-', '3', '2025-10-24', '2025-10-27', 'E', 100000, 0, 'B', '', '0', 0, 100000, 100000, 100000, 0, '', '', 'A', '', '411-002', 'ID00000000001'),
('10000000000003', 'A', 'pen', 'ID00000000084', '212-000', '112-002', '-', '-', '3', '2025-10-24', '2025-10-27', 'E', 500000, 0, 'B', '', '', 0, 500000, 500000, 0, 500000, '', '', 'P', '', '411-002', 'ID00000000001'),
('10000000000004', 'A', 'pen', 'ID00000000072', '211-000', '112-000', '-', '-', '3', '2025-10-28', '2025-10-31', 'E', 150000, 16500, 'B', '', '0', 0, 166500, 166500, 0, 166500, '', '', 'P', '', '412-003', 'ID00000000001'),
('20000000000001', 'A', 'pem', 'ID00000000086', '211-000', '112-000', 'Blok Soga RT 08 RW 02, Desa Cipaat, Kec. Bongas, Kab. Indramayu', 'abilrizki16@gmail.com', '7', '2025-10-14', '2025-10-21', 'E', 15000, 1650, 'B', '', '0', 0, 16650, 16650, 0, 16650, '', '', 'P', '', '511-000', 'ID00000000001'),
('20000000000002', 'A', 'pem', 'ID00000000084', '212-000', '112-002', '-', '-', '3', '2025-10-24', '2025-10-27', 'E', 100000, 0, 'B', '', '0', 0, 100000, 100000, 100000, 0, '', '', 'A', '', '511-000', 'ID00000000001'),
('20000000000003', 'A', 'pem', 'ID00000000084', '212-000', '112-002', '-', '-', '3', '2025-10-24', '2025-10-27', 'E', 100000, 0, 'B', '', '', 0, 100000, 100000, 0, 100000, '', '', 'P', '', '511-000', 'ID00000000001');

-- --------------------------------------------------------

--
-- Table structure for table `jur_main_pempen_adds`
--

CREATE TABLE `jur_main_pempen_adds` (
  `pm_id` int(11) NOT NULL,
  `pm_nomor` varchar(50) NOT NULL,
  `pm_item` varchar(30) NOT NULL,
  `pm_uraian` text NOT NULL,
  `pm_qty` int(11) NOT NULL,
  `pm_satuan` varchar(30) NOT NULL,
  `pm_harga` double NOT NULL,
  `pm_pajak` varchar(10) NOT NULL,
  `pm_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jur_main_pempen_adds`
--

INSERT INTO `jur_main_pempen_adds` (`pm_id`, `pm_nomor`, `pm_item`, `pm_uraian`, `pm_qty`, `pm_satuan`, `pm_harga`, `pm_pajak`, `pm_subtotal`) VALUES
(1, '001/BUS/INV/08/2025', 'ITM0000001', '', 1, 'Set', 2258065, 'PPN', 2258065),
(2, '20000000000001', 'ITM0000001', '', 1, 'Set', 15000, 'PPN', 15000),
(3, '10000000000001', 'ITM0000001', '', 1, 'Set', 500000, '', 500000),
(4, '10000000000002', 'ITM0000001', '', 1, 'Set', 100000, '', 100000),
(5, '20000000000002', 'ITM0000001', '', 1, 'Set', 100000, '', 100000),
(8, '10000000000003', 'ITM0000001', '', 1, 'Set', 500000, '', 500000),
(10, '20000000000003', 'ITM0000001', '', 1, 'Set', 100000, '', 100000),
(11, '002/BUS/INV/10/2025', 'ITM0000001', '', 1, 'Set', 1290323, 'PPN', 1290323),
(12, '10000000000004', 'ITM0000001', '', 1, 'Set', 150000, 'PPN', 150000),
(13, '003/BUS/INV/11/2025', 'ITM0000001', '', 1, 'Set', 10000000, 'PPN', 10000000);

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
(143, '2', '142', 2),
(156, '3', '153', 1),
(157, '3', '140', 1);

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
(5, 'Dana'),
(6, 'PayPall'),
(8, 'ShopeePay');

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
(134, 'Sushi', 57000, 'porsi', 'makanan', 'sushi.jpg'),
(135, 'Gurame', 34000, 'unit', 'makanan', 'gurame-bakar.jpg'),
(137, 'Nasi padang', 13000, 'porsi', 'makanan', 'nasi-padang.jpeg'),
(138, 'Sate Koruptor', 5000, 'porsi', 'makanan', 'sate.jpg'),
(139, 'Ramen Ichiraku', 44000, 'porsi', 'makanan', 'ramen.jpg'),
(140, 'Ketoprak', 12000, 'porsi', 'makanan', 'ketoprak.jpg'),
(141, 'Nasi Goreng', 14000, 'porsi', 'makanan', 'nasi-goreng.jpg'),
(149, 'AK-47 Mamat Gunshop', 4000000, 'unit', 'Senjata Api', 'ak47.jpg'),
(150, 'Racun Sianida', 1000000, 'kilo', 'Racun', 'ini-alasan-kenapa-sianida-bisa-membunuhmu.jpg'),
(152, 'black worker', 9800000, 'unit', 'Hewan', 'black-worker.jpg'),
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
(32, 'pack'),
(33, 'porsi');

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
(2, 'Minuman');

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
-- Indexes for table `jur_main_biaya`
--
ALTER TABLE `jur_main_biaya`
  ADD PRIMARY KEY (`jurbi_code`);

--
-- Indexes for table `jur_main_biaya_adds`
--
ALTER TABLE `jur_main_biaya_adds`
  ADD PRIMARY KEY (`jurbi_det_id`);

--
-- Indexes for table `jur_main_payment`
--
ALTER TABLE `jur_main_payment`
  ADD PRIMARY KEY (`payment_code`);

--
-- Indexes for table `jur_main_payment_adds`
--
ALTER TABLE `jur_main_payment_adds`
  ADD PRIMARY KEY (`tgh_id`);

--
-- Indexes for table `jur_main_pempen`
--
ALTER TABLE `jur_main_pempen`
  ADD PRIMARY KEY (`fact_code`);

--
-- Indexes for table `jur_main_pempen_adds`
--
ALTER TABLE `jur_main_pempen_adds`
  ADD PRIMARY KEY (`pm_id`);

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
-- AUTO_INCREMENT for table `jur_main_biaya_adds`
--
ALTER TABLE `jur_main_biaya_adds`
  MODIFY `jurbi_det_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jur_main_payment_adds`
--
ALTER TABLE `jur_main_payment_adds`
  MODIFY `tgh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jur_main_pempen_adds`
--
ALTER TABLE `jur_main_pempen_adds`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  MODIFY `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
