-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2021 pada 08.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(2) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nasabah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `nasabah`) VALUES
(5, 'BNI SYARIAH', '0851775810', 'ARIF NURSALIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom`
--

CREATE TABLE `custom` (
  `kode` int(10) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `kd_cus` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `model` varchar(100) NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `custom`
--

INSERT INTO `custom` (`kode`, `tanggal`, `kd_cus`, `nama`, `size`, `color`, `model`, `gambar`, `harga`, `status`) VALUES
(2, '0000-00-00 00:00:00', '000006', 'asik', 'M', 'black', 'short', 'kaos.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kd_cus` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kd_cus`, `nama`, `alamat`, `no_telp`, `username`, `password`, `gambar`) VALUES
('20180820204425', 'Nurhuda', 'bekasi', '123456', 'huda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gambar_customer/123.jpg'),
('20190711093514', 'Velin', 'pndok ungu permai', '081286868559', 'velin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', ''),
('20190715103319', 'anang', 'bekasi', '123456', 'anang', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '../admin/gambar_customer/sepatunike.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `kode` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`kode`, `harga_beli`, `harga_jual`) VALUES
('PRO003', '1000000', '2000000'),
('PRO004', '1500000', '2000000'),
('PRO005', '1500000', '2000000'),
('PRO006', '1000000', '1200000'),
('PRO007', '1200000', '1500000'),
('PRO008', '4000000', '4500000'),
('PRO009', '4500000', '4800000'),
('PRO010', '3500000', '4000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `bayar_via` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `status` enum('Bayar','Belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_kon`, `nopo`, `kd_cus`, `bayar_via`, `tanggal`, `jumlah`, `bukti_transfer`, `status`) VALUES
(14, '16102020145659', '20180820204425', 'BNI SYARIAH', '2020-10-16 14:56:59', 1000000, '../admin/bukti_transfer/image-19.jpg', 'Bayar'),
(15, '23102020095745', '20180820204425', 'BNI SYARIAH', '2020-10-23 09:57:45', 1500000, '../admin/bukti_transfer/bukti.jpg', 'Bayar'),
(16, '23102020101325', '20180820204425', 'BNI SYARIAH', '2020-10-23 00:00:00', 3000000, '../admin/bukti_transfer/image-19.jpg', 'Bayar'),
(17, '23102020111509', '20180820204425', 'BNI SYARIAH', '2020-10-23 11:15:09', 1000000, '../admin/bukti_transfer/image-19.jpg', 'Bayar'),
(18, '25102020164324', '20180820204425', 'BNI SYARIAH', '2020-10-25 16:43:24', 1000000, '../admin/bukti_transfer/image-19.jpg', 'Bayar'),
(19, '26102020134251', '20180820204425', 'BNI SYARIAH', '2020-10-26 13:42:51', 300000, '../admin/bukti_transfer/image-19.jpg', 'Bayar'),
(20, '18012021171502', '20180820204425', '0', '2021-01-18 17:15:02', 2000000, '0', 'Belum'),
(21, '18012021171900', '20180820204425', 'BNI SYARIAH', '2021-01-18 17:19:00', 2000000, '../admin/bukti_transfer/abc.jpg', 'Bayar'),
(22, '18012021190854', '20180820204425', 'BNI SYARIAH', '2021-01-18 19:08:54', 2000000, '../admin/bukti_transfer/Capture.JPG', 'Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `nopo` varchar(20) NOT NULL,
  `no_resi` varchar(225) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `bukti_kirim` varchar(225) NOT NULL,
  `status` enum('Proses','Selesai','Terkirim','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`nopo`, `no_resi`, `tanggalkirim`, `tanggal_sampai`, `bukti_kirim`, `status`) VALUES
('18012021171900', '123456', '2021-01-18', '2021-01-21', '../admin/bukti_kirim/jne.jpg', 'Selesai'),
('18012021190854', '123456', '2021-01-19', '2021-01-22', '../admin/bukti_kirim/jne.jpg', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_terima`
--

CREATE TABLE `po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po_terima`
--

INSERT INTO `po_terima` (`id`, `nopo`, `kd_cus`, `kode`, `tanggal`, `status`, `qty`, `total`) VALUES
(14, '18012021171900', '20180820204425', 'PRO003', '2021-01-18 17:18:52', '', 1, 2000000),
(15, '18012021190854', '20180820204425', 'PRO005', '2021-01-18 19:08:47', '', 1, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `jenis`, `nama_supplier`, `keterangan`, `gambar`) VALUES
('PRO003', 'Biola ', 'biola', 'Yamaha Music', 'Ready', 'gambar_produk/biola.jpg'),
('PRO004', 'Akustik YMH1', 'gitar', 'Yamaha Music', 'Akustik', 'gambar_produk/123.jpg'),
('PRO005', 'Bass 1', 'bass', 'Fender', 'Elektrik', 'gambar_produk/bass (1).jpg'),
('PRO006', 'Bass 2', 'bass', 'Fender', 'Elektrik', 'gambar_produk/bass (2).jpg'),
('PRO007', 'Bass 3 ', 'bass', 'Fender', 'Elektrik', 'gambar_produk/bass (3).jpg'),
('PRO008', 'Drum 1', 'drum', 'Yamaha Music', 'Elektrik', 'gambar_produk/drum (1).jpg'),
('PRO009', 'Drum 2', 'drum', 'Yamaha Music', 'Elektrik', 'gambar_produk/drum (2).jpg'),
('PRO010', 'Drum 3', 'drum', 'CV Bali Drum Factory', 'Elektrik', 'gambar_produk/drum (3).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `kode` varchar(255) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`kode`, `stok`) VALUES
('PRO003', 9),
('PRO004', 8),
('PRO005', 4),
('PRO006', 5),
('PRO007', 3),
('PRO008', 2),
('PRO009', 2),
('PRO010', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(255) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `no_telp`, `gambar`) VALUES
('BF001', 'CV Bali Drum Factory', 'Bali', '9812346', 'gambar_admin/cv drum.jpg'),
('FDR001', 'Fender', 'Jakarta', '982346789', 'gambar_admin/fender bass logo.jpg'),
('HN002', 'Hohner', 'Jakarta', '123456', 'gambar_admin/harmonika logo.jpg'),
('K001', 'PT KAWAI INDONESIA ', 'Karawang', '12345678', 'gambar_admin/PT KAWAI INDONESIA.jpg'),
('YMH-001', 'Yamaha Music', 'MM2100', '0218888888', 'gambar_admin/tes.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_po_terima`
--

CREATE TABLE `tmp_po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(10) NOT NULL,
  `kd_cus` varchar(10) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `style` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(11, 'Velina', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Velina Yuwono Putry', 'gambar_admin/iphone 8+ Velin 004.JPEG'),
(12, 'huda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nur Huda', 'gambar_admin/team_member.jpg'),
(13, 'arif', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Arif  Nur Salim', 'gambar_admin/a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_cus`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`nopo`);

--
-- Indeks untuk tabel `po_terima`
--
ALTER TABLE `po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `tmp_po_terima`
--
ALTER TABLE `tmp_po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `custom`
--
ALTER TABLE `custom`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `po_terima`
--
ALTER TABLE `po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tmp_po_terima`
--
ALTER TABLE `tmp_po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
