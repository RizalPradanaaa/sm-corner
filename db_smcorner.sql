-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 09:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smcorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_user`
--

CREATE TABLE `alamat_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `transfer` varchar(225) NOT NULL,
  `tanggal` int(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat_user`
--

INSERT INTO `alamat_user` (`id`, `id_user`, `nama_user`, `alamat`, `transfer`, `tanggal`, `status`) VALUES
(2, 8, 'nuhron', 'blora', 'b1111.png', 1677593663, 0),
(3, 8, 'nuhron', 'rembang', 'cobaaa.png', 1677657933, 0),
(4, 7, 'Ichwan', 'jepara', 'buku_ahmad_dahlan_.jpeg', 1677658833, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `stok` int(128) NOT NULL,
  `harga` int(128) NOT NULL,
  `diskon` int(128) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `kategori`, `stok`, `harga`, `diskon`, `gambar`, `deskripsi`) VALUES
(16, 'B001', 'Baju Batik Muhammadiyah', 'pakaian', 10, 145000, 0, 'batik_muh.jpeg', 'Batik Muhammadiyah Nasional Bahan Katun / Katun Ekslusif\r\n\r\nWelcome to Suara Muhammadiyah Corner\r\nMohon membaca deskripsi produk kami dengan teliti, karena kami tidak ingin mengecewakan anda sebagai pelanggan kami.\r\n> Langsung di order aja ya atau untuk memastikan stok produk silahkan chat CS kami, CS kami dengan senang hati akan membalas chat custumer..\r\n> Produk Ready Stock\r\n\r\n* Kain Muhammadiyah Nasional bahan Katun / Katun Ekslusif\r\n* Kemeja Muhammadiyah lengan panjang\r\n\r\n- Lebar kain 115cm,'),
(17, 'B002', 'Baju Batik Nasyiatul Aisyiyah ', 'Pakaian', 10, 145000, 0, 'baju_na_.jpeg', 'Telah hadir Blouse / Tunik Batik NASYIATUL AISYIYAH (NA) NASIONAL untuk para Yunda Nasyiah di tingkat ranting, cabang, daerah, dan wilayah Muhammadiyah se-Indonesia\r\n\r\ntersedia ukuran M, L, XL, XXL (ada furing)\r\n\r\nbahan : sanwos, dengan kerapatan sedang cenderung tipis\r\ntekstur : halus, kuat, tidak menyerap keringat,\r\nTersedia 1 saku di sebelah kanan\r\n\r\nPanjang Baju : 91 cm\r\n\r\nLD : M / 90 cm\r\nL / 96 cm\r\nXL / 104 cm\r\nXXL / 108 cm\r\n\r\n1 kg muat sekitar 4 baju ..\r\n\r\nSelamat Berbelanja'),
(18, 'K001', 'Kain Batik Muhammadiyah', 'kain', 10, 145000, 0, 'kain_batik_muh.jpeg', 'Bahan katun \r\nPembelian minimal 2meter\r\n\r\nSuara Muhammadiyah Corner'),
(19, 'T001', 'Topi Kokam', 'atribut', 10, 50000, 0, 'topi_kokam.jpeg', 'Welcome To Suara Muhamadiyah Corner \r\n Topi Kokam All Size \r\nBahan Bagus Nyaman\r\n\r\nSelamat Berbelanjaaaa'),
(20, 'b001', 'Buku Biografi K.H Ahmad Dahlan', 'buku', 10, 50000, 0, 'buku_ahmad_dahlan_.jpeg', 'K.H. Ahmad Dahlan termasuk salah satu ulama besar yang menjadi pelopor pembaharuan Islam di Indonesia pada masa pra kemerdekaan. Selain itu, ia juga bergerak untuk melepaskan umat Islam dari kebodohan, kemiskinan, dan penderitaan akibat kolonialisme Belanda.\r\nBuku ini merangkum segala kiprah K.H. Ahmad Dahlan bersama Muhammadiyah, termasuk pemikiran, gerakan, dan biografinya. ????\r\n\r\nPenulis: Abdul Wali Kusno\r\nPenerbit: C-Klik Media\r\nSoft cover, BW, 195 halaman\r\nP X L X T =  19 X 13 X 1 cm\r\nJeni');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id` int(11) NOT NULL,
  `total_semua` int(128) NOT NULL,
  `bayar` int(128) NOT NULL,
  `diskon_rupiah` int(128) NOT NULL,
  `diskon_persen` int(128) NOT NULL,
  `kembali` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `total_semua`, `bayar`, `diskon_rupiah`, `diskon_persen`, `kembali`) VALUES
(18, 235000, 300000, 10000, 0, 65000);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(128) NOT NULL,
  `total` int(128) NOT NULL,
  `stok` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id`, `id_barang`, `kode`, `nama`, `jumlah`, `harga`, `total`, `stok`) VALUES
(23, 19, 'T001', 'Topi Kokam', 1, 50000, 50000, 10),
(24, 16, 'B001', 'Baju Batik Muhammadiyah', 1, 145000, 145000, 10),
(25, 20, 'b001', 'Buku Biografi K.H Ahmad Dahlan', 1, 50000, 50000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(128) NOT NULL,
  `diskon` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_user`, `username`, `kode`, `nama`, `gambar`, `stok`, `harga`, `diskon`, `jumlah`, `total`, `date_created`) VALUES
(3, 7, 'Ichwan', 'b001', 'Buku Biografi K.H Ahmad Dahlan', 'buku_ahmad_dahlan_.jpeg', 10, 50000, 0, 1, 50000, 1677233476),
(4, 7, 'Ichwan', 'T001', 'Topi Kokam', 'topi_kokam.jpeg', 10, 50000, 0, 1, 50000, 1677233493),
(5, 8, 'nuhron', 'B001', 'Baju Batik Muhammadiyah', 'batik_muh.jpeg', 10, 145000, 0, 1, 145000, 1677306563),
(6, 8, 'nuhron', 'b001', 'Buku Biografi K.H Ahmad Dahlan', 'buku_ahmad_dahlan_.jpeg', 10, 50000, 0, 1, 50000, 1677306577);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `total` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `total`) VALUES
(1, 1545000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Rizal Pradana', 'rizalnawang1@gmail.com', 'Clash_Royale.png', '$2y$10$QKw8BjFPSJZTkgu.An8Wceks1cEDgJhIiwegDm9aY.TnGX7GZOKWO', 1, 1, 1675824914),
(3, 'Mahen', 'mahen1@gmail.com', 'default.jpg', '$2y$10$/WIfyYhrvvQ3PNER8gbOouSqjlSolY/B57iS5xUZ8UqGaFthgY1tG', 2, 1, 1675825565),
(7, 'Ichwan', 'iwan1@gmail.com', 'default.jpg', '$2y$10$TBk9XtXUhiiNgPrmNoAC4Oqn.2XME.Wkk2ZWizqFIno/lUwbnF.sS', 3, 1, 1677054104),
(8, 'nuhron', 'nuhron1@gmail.com', 'default.jpg', '$2y$10$OU5ZRXhBzlRizEOuofwOL.8gGinj2bJnX5bP/I7ueDZ5/rEF.TxMW', 3, 1, 1677306534);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_user`
--
ALTER TABLE `alamat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_user`
--
ALTER TABLE `alamat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
