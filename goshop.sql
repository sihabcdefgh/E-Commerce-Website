-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 08:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_seller`
--

CREATE TABLE `admin_seller` (
  `id` int(11) NOT NULL,
  `username_admin_seller` varchar(255) NOT NULL,
  `email_admin_seller` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(5, 'Baju Pria'),
(6, 'Celana Pria'),
(7, 'Sepatu Pria'),
(8, 'Baju Wanita'),
(9, 'Celana Wanita'),
(10, 'Sepatu Wanita'),
(11, 'Aksesoris dan Fashion'),
(12, 'Elektronik'),
(13, 'Kecantikan dan Kesehatan'),
(15, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Yogyakarta', 8000),
(2, 'Bandung', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `username_pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `nomor_telepon` int(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, 1, '2023-07-18', 150000),
(2, 1, 1, '2023-07-19', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `stok`) VALUES
(7, 5, 'Polo T-Shirt Green', 150000, 'LkPxvuO8AUbZ249zkBYo.jpg', 'Baju Polo warna hijau ', 'tersedia'),
(8, 5, 'Fruta de la Tierra T-Shirt', 160000, 'UShskeJuewwxFwQ0eDMm.png', 'Baju Fruta, gw gatau apaan itu baju', 'tersedia'),
(9, 5, 'Kemeja Love French Is Better', 140000, 'ulVPHgZQNGPB3O0qmlx0.jpg', 'Kemeja Love French Is Better\r\ncocok untuk pria tampan kaya saya', 'tersedia'),
(10, 5, 'Kemeja Warna', 145000, 'oUb01xu2XYZODmBovbJc.jpg', 'Kemeja ini cocok untuk kamu yang suka berpenampilan clasic\r\nsertakan video unboxing', 'tersedia'),
(11, 5, 'Jeans Pria', 100000, '3YK3xYfQeKTch8ma0PXS.jpg', 'Jeans Pria terbaik\r\nsertakan video unboxing', 'tersedia'),
(13, 6, 'Jeans Pria 3', 80000, 'betWNELArU2bfrSCwR2B.jpg', 'Jeans Pria terbaik\r\nsertakan video unboxing', 'tersedia'),
(14, 11, 'Jam tangan Pria / Wanita', 250000, 'MmxF3Zj5VE0YRzDikTIA.jpg', 'Jam tangan Pria / Wanita keren bgt', 'tersedia'),
(15, 11, 'Jam tangan Pria / Wanita 2', 245000, '8N8OJoLomEvdIGLE2C5g.jpg', 'Jam tangan Pria / Wanita keren bgt', 'tersedia'),
(16, 11, 'Jam tangan Pria / Wanita murah', 176000, 'mjDW46WaGqhVOVU3dMVr.jpg', 'Jam tangan Pria / Wanita keren coy', 'tersedia'),
(17, 11, 'Jam tangan Pria / Wanita murah 2', 160000, 'qLSYy4PwG6Jjy7nfwp4P.jpg', 'Jam tangan Pria / Wanita keren sepanjang sejarah', 'tersedia'),
(18, 8, 'Pakaian Wanita Lucu', 155000, 'xhduBitOshTfmbEMHs9b.jpg', 'Pakaian Wanita lucu bgt', 'tersedia'),
(19, 9, 'Celana Wanita Sexy', 99000, 'CSfggWpZWpESrybJBRMC.jpg', 'Celana Wanita bagus', 'tersedia'),
(20, 8, 'Jacket Jeans Bunga-Bunga', 300000, '3lsY2WIZI0kN3CvWqztl.jpg', 'Jacket jeans untuk wanita keren', 'tersedia'),
(21, 8, 'Baju Wanita lucu abis', 140000, 'wGm71DpZuNVfQ6Idq60R.jpg', 'Baju Wanita lucuuu', 'tersedia'),
(22, 8, 'Pakaian Wanita keren', 143000, 'BXt7XEdwBootXT4jpatI.png', 'Baju Wanita kerennn', 'tersedia'),
(23, 13, 'Serum Wajah', 130000, 'sDfscMGkYRZxRL3VZDPE.jpg', 'serum nomor 1 cocok untuk wajah kamu yang burik', 'tersedia'),
(24, 13, 'Skin Care Essence', 90000, 'LaPeZBlhAck4Vyq4wvkH.jpg', 'selalu rawat wajahmu dengan skin care agar tampak cantik setiap hari', 'tersedia'),
(25, 13, 'Serum Wajah 2', 130000, 'L3TbuwsJnI1e06wqFU0E.jpg', 'Serum wajah cocok untuk kulit kusam', 'tersedia'),
(26, 13, 'Skin care wajah', 110500, 'VDpcs3KfjIQoOEMKuLvM.jpg', 'skin care wajah cocok untuk kulit berminyak', 'tersedia'),
(27, 7, 'Sepatu Nike', 450000, 'tpwX6omUneuYDgGbzSbE.jpg', 'nike original', 'tersedia'),
(28, 7, 'Vans Authentic', 400000, 'hIwfdzVGoeCHljbOCQQJ.jpg', 'vans authentic keren', 'tersedia'),
(29, 7, 'Sepatu Converse Army', 550000, 'hq2AchrvuoCQcJj458ZU.jpg', 'Converse all star terbaru', 'tersedia'),
(30, 7, 'New Balance White All Size', 400000, 'W3CYHzmabFU4ApvyEH1q.png', 'new balance shoes', 'tersedia'),
(31, 7, 'Adidas Blue Strip White', 350000, 'Dwrc8iSTUAjpcuHJtg0N.jpg', 'adidas original zimbabwe', 'tersedia'),
(32, 10, 'Sepatu Wanita Pink', 250000, '5y52tNa03TpvYmXefVau.jpg', 'sepatu wanita keren pink ', 'tersedia'),
(33, 10, 'Puma for Women', 450000, 'fOXr3K8d7cVgQDjplBPC.png', 'puma original zimbabwe', 'tersedia'),
(34, 10, 'Sepatu Cinderella original dari asgard', 700000, 's7fxswhh1trKzA9AdJju.jpg', 'cinderella pun tiba dengan kereta kencana', 'tersedia'),
(35, 10, 'Sepatu Wanita White and Cream', 250000, 'l0TWB64VpQjrTvo2UlxB.jpg', 'sepatu wanita', 'tersedia'),
(36, 10, 'Sepatu Wanita Sorel ALL Size', 455000, '4qW0nWPWccnBhtcmRjXQ.jpg', 'Sepatu wanita bisa pesan semua ukuran', 'tersedia'),
(38, 15, 'Nasi', 5000, 'xkjNhvVMXTlyJX0VUiwz.jpg', 'Nasi enak', 'tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_seller`
--
ALTER TABLE `admin_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkir` (`id_ongkir`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_seller`
--
ALTER TABLE `admin_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`);

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
