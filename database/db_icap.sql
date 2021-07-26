-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 12:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_icap`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `du_date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `no_resi` varchar(100) NOT NULL,
  `jasa_pengiriman` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `du_date`, `id_user`, `bukti_transfer`, `no_resi`, `jasa_pengiriman`, `ongkir`, `status`) VALUES
(8, '2021-05-23 05:50:57', '2021-05-24 05:50:57', 3, '', '', '', 0, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'medan'),
(2, 'purwokerto'),
(3, 'jogja');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `stok`, `gambar`, `deskripsi`, `waktu`) VALUES
(10, 'Bolu Meranti', 'medan', 50000, 98, '23-05-2021-7x5sUl9qc0.png', '<p>Tidak diragukan lagi, bolu ini menjadi andalan Kota Medan saat ini. Bolu Meranti menjadi salah satu oleh-oleh yang paling banyak diminati. Tak usah diragukan soal rasa sudah pasti mantap. Banyak varian rasa yang bisa kamu pilih sesuai selera seperti coklat, keju, mocca, cappucino, kacang, nenas, blueberry dan ada juga perpaduan dari 3 rasa. Tekstur bolu sangat lembut dan isi dari bolu sangat padat sekali. Range harga Rp.50.000-Rp.100.000 untuk lebih detail kamu bisa cek di bolumeranti.co.id . Jangan heran kalau selalu antrian panjang di toko meranti. Toko bolu meranti hanya ada 2 dan belum buka cabang lagi, tapi kadang ada yang jual di kios-kios termasuk di bandara kualanamu dengan harga yang sudah di markup</p>', '2021-05-23 05:46:59'),
(11, 'Gethuk Goreng', 'purwokerto', 30000, 500, '23-05-2021-bnDVF43nLB.png', '<p>Jenis cemilan khas Purwokerto lainnya yang hingga sekarang disukai wisatawan adalah Gethuk Goreng. Terbuat dari singkong dan gula merah yang diolah kemudian digoreng kering kecoklatan. Keunikan gethuk ini ada pada proses penumbukan singkongnya dilakukan dengan tiga orang atau lebih agar menghasilkan Gethuk lezat.</p>\r\n\r\n<p>Cita rasanya manis legit dari gula merah dengan tekstur empuk juga cocok sebagai buah tangan untuk keluarga di rumah. Kini, sudah banyak inovasi rasa Gethuk Goreng, yakni rasa coklat dan durian. Jadi, bikin bawa manis liburan di Purwokerto bersama Gethuk Goreng sebagai oleh-oleh khasnya</p>', '2021-05-23 05:47:21'),
(12, 'Bakpia Kurnia Sari', 'jogja', 42000, 400, '23-05-2021-iMUIo1J3G0.png', '<p>Bakpia Kurni Sari namanya kian meroket sejak tahun 2000 silam. Inilah salah satu pilihan produk bakpia tradisional yang bisa dijadikan oleh-oleh.</p>\r\n\r\n<p>Wajar saja jika bakpia yang memiliki ciri khas kemasannya yang berwarna hijau ini banyak diburu wisatawan. Bahkan jangan heran jika untuk varian rasa tertentu kerap&nbsp;sold out&nbsp;saat kamu datang ke toko terlalu siang. Bakpia ini memang berbeda dengan bakpia pada umumnya. Kulit luarnya terasa lembut dan lumer saat masuk ke dalam mulut, adonan yang tepat membuat citarasa bakpia ini tetap sama ketika disantap hangat ataupun dingin</p>', '2021-05-23 05:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `nama_promo` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `gambar`, `waktu`) VALUES
(6, 'Promo Tahun Baru', '20-04-2020-mtSPH1fqJc.jpg', '2019-12-31 15:43:40'),
(7, 'Promo Lebaran', '20-04-2020-QkF3bwra4x.jpg', '2020-01-02 11:28:08'),
(8, 'Tahun baru', '20-04-2020-uZRtlT3S46.jpg', '2020-01-11 10:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_id`
--

CREATE TABLE `role_id` (
  `id_rld` int(11) NOT NULL,
  `role_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_id`
--

INSERT INTO `role_id` (`id_rld`, `role_id`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_invoices` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_invoices`, `id_produk`, `jml`) VALUES
(11, 8, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `telp`, `alamat`, `role_id`) VALUES
(2, 'Monica', 'admin', 'admin@gmail.com', '$2y$10$c3D.9BfcLTJ1ChjmuGCbG.bi6Ty3DmJqiF01HyweaVC1e03AVEdYO', 0, '-', 1),
(3, 'Meliana', 'user', 'user@gmail.com', '$2y$10$D7M5OdtX3RQxX.qcZsthDu69Ewd2UFmOfhsZyv1Hp7rMFmrrqseEq', 2147483647, 'Purwokerto Selatan', 2),
(4, 'Morledia Adi Yahya', 'morledia', 'morle@gmail.com', '$2y$10$aGnehAAe7qE8MoYIf9l45OIZgcOy1sQOQ8VSrzpWEQtoZzoO8g2Wy', 813242342, 'Banten Selatan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id_rld`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id_rld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
