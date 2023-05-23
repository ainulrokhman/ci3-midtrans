-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2023 pada 02.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midtrans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_biaya`
--

CREATE TABLE `jenis_biaya` (
  `id` int(11) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_biaya`
--

INSERT INTO `jenis_biaya` (`id`, `nama_biaya`, `deskripsi`, `nominal`) VALUES
(1, 'Pembayaran SPP', '', 20000),
(2, 'Uang Gedung', '', 500000),
(4, 'Study Tour', 'Biaya jalan-jalan', 1200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `jurusan`, `tingkat`, `created_date`, `updated_date`) VALUES
(1, 'IPS', 'X', '2023-04-26 17:13:02', '2023-04-26 17:13:02'),
(2, 'IPS', 'XI', '2023-04-26 20:04:46', '2023-04-26 20:04:46'),
(3, 'IPS', 'XII', '2023-04-26 20:04:46', '2023-04-26 20:04:46'),
(4, 'IPA', 'X', '2023-04-26 17:13:02', '2023-04-26 17:13:02'),
(5, 'IPA', 'XI', '2023-04-26 20:04:46', '2023-04-26 20:04:46'),
(11, 'IPA', 'XII', '2023-05-20 09:16:55', '2023-05-20 09:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `tahun_masuk` year(4) NOT NULL DEFAULT current_timestamp(),
  `wali_nama` varchar(255) NOT NULL,
  `wali_email` varchar(255) DEFAULT NULL,
  `wali_telp` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `id_kelas`, `email`, `telp`, `tahun_masuk`, `wali_nama`, `wali_email`, `wali_telp`, `created_date`, `updated_date`) VALUES
(1, '42418047', 'Guntur Pamuji', 6, 'ainul@email.com', '085227099929', 2025, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(3, '42418047', 'Muchamad Ainul Rokhman', 5, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(4, '42418047', 'Muchamad Ainul Rokhman', 4, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(5, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(6, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(7, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(8, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(9, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(10, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(11, '42418047', 'Muchamad Ainul Rokhman', 3, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(12, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(13, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(14, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(15, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(16, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(17, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(18, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(19, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(20, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(21, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(22, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(23, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(25, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(26, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(27, '42418047', 'Ridwan Kamil', 5, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(28, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(29, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(30, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(31, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(32, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(33, '1651651', 'Guntur Pamuji', 6, '-', '-', 2011, 'xxxx', '-', '-', '2023-05-19 08:17:43', '2023-05-19 08:17:43'),
(35, '12345', 'Guntur Pamuji', 1, '-', '123456789', 2023, 'noname', '-', '-', '2023-05-20 09:03:10', '2023-05-20 09:03:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `order_id` char(20) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(20) DEFAULT NULL,
  `gross_amount` int(20) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `settlement_time` datetime DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `va_numbers` varchar(50) DEFAULT NULL,
  `status_message` text DEFAULT NULL,
  `pdf_url` text DEFAULT NULL,
  `transaction_status` char(20) DEFAULT NULL,
  `status_code` char(3) DEFAULT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `finish_redirect_url` text DEFAULT NULL,
  `payment_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaction`
--

INSERT INTO `tb_transaction` (`order_id`, `customer_name`, `customer_email`, `gross_amount`, `payment_type`, `transaction_time`, `settlement_time`, `bank`, `va_numbers`, `status_message`, `pdf_url`, `transaction_status`, `status_code`, `transaction_id`, `finish_redirect_url`, `payment_code`) VALUES
('1635134350', 'Guest', 'guest@mail.com', 300000, 'bank_transfer', '2023-04-08 13:50:50', NULL, 'bca', '66796886228', 'Transaksi sedang diproses', 'https://app.sandbox.midtrans.com/snap/v1/transactions/13179a2d-0c3d-4424-871b-476f5add80d3/pdf', 'pending', '201', NULL, 'https://denatureindonesia.me/?order_id=1635134350&status_code=201&transaction_status=pending&wc-api=WC_Gateway_Midtrans', NULL),
('72048098', 'Guest', 'guest@mail.com', 50000, 'bank_transfer', '2023-05-20 09:36:46', NULL, 'bca', '66796933559', 'Transaksi sedang diproses', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d0a3c258-1a44-4ec9-acd0-b99e358473dc/pdf', 'pending', '201', NULL, '?order_id=72048098&status_code=201&transaction_status=pending', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_kelas_siswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_kelas_siswa` (
`id` int(11)
,`nis` varchar(30)
,`nama` varchar(100)
,`id_kelas` int(11)
,`email` varchar(100)
,`telp` varchar(15)
,`tahun_masuk` year(4)
,`wali_nama` varchar(255)
,`wali_email` varchar(255)
,`wali_telp` varchar(255)
,`created_date` datetime
,`updated_date` datetime
,`jurusan` varchar(50)
,`tingkat` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_kelas_siswa`
--
DROP TABLE IF EXISTS `v_kelas_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_siswa`  AS  select `siswa`.`id` AS `id`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`siswa`.`id_kelas` AS `id_kelas`,`siswa`.`email` AS `email`,`siswa`.`telp` AS `telp`,`siswa`.`tahun_masuk` AS `tahun_masuk`,`siswa`.`wali_nama` AS `wali_nama`,`siswa`.`wali_email` AS `wali_email`,`siswa`.`wali_telp` AS `wali_telp`,`siswa`.`created_date` AS `created_date`,`siswa`.`updated_date` AS `updated_date`,`kelas`.`jurusan` AS `jurusan`,`kelas`.`tingkat` AS `tingkat` from (`siswa` join `kelas` on(`siswa`.`id_kelas` = `kelas`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_biaya`
--
ALTER TABLE `jenis_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_biaya`
--
ALTER TABLE `jenis_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
