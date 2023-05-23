-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `jenis_biaya`
--

CREATE TABLE `jenis_biaya` (
  `id` int(11) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_biaya`
--

INSERT INTO `jenis_biaya` (`id`, `nama_biaya`, `deskripsi`, `nominal`) VALUES
(1, 'Pembayaran SPP', '', 20000),
(2, 'Uang Gedung', 'Deskripsi', 500000),
(5, 'Study Tour', 'Jalan-jalan', 2750000),
(6, 'Daftar Ulang', 'Kelas x -xii', 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
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
-- Table structure for table `siswa`
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
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `id_kelas`, `email`, `telp`, `tahun_masuk`, `wali_nama`, `wali_email`, `wali_telp`, `created_date`, `updated_date`) VALUES
(1, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainulrokhman7@gmail.com', '086227099929', 2023, 'Guntur Pamuji', 'ainulrokhman7@gmail.com', '085227099929', '2023-05-23 11:05:48', '2023-05-23 11:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `order_id` char(20) NOT NULL,
  `biaya_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
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
-- Dumping data for table `tb_transaction`
--

INSERT INTO `tb_transaction` (`order_id`, `biaya_id`, `siswa_id`, `gross_amount`, `payment_type`, `transaction_time`, `settlement_time`, `bank`, `va_numbers`, `status_message`, `pdf_url`, `transaction_status`, `status_code`, `transaction_id`, `finish_redirect_url`, `payment_code`) VALUES
('107923929', 6, 1, 100000000, 'bank_transfer', '2023-05-23 23:15:12', '2023-05-23 23:17:00', 'bca', '22634523807', 'Success, transaction is found', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bcb0f7c2-c146-401a-aa0d-f7fca61afd52/pdf', 'settlement', '201', NULL, '?order_id=107923929&status_code=201&transaction_status=pending', NULL),
('1175423271', 5, 1, 2750000, 'qris', '2023-05-23 22:54:21', NULL, NULL, NULL, 'Success, transaction is expired', NULL, 'expire', '201', '0360a03e-ac5a-44f8-8c9e-5fa77442db64', '?order_id=1175423271&status_code=201&transaction_status=pending', NULL),
('1821025179', 5, 1, 2750000, 'bank_transfer', '2023-05-23 22:31:02', NULL, 'bca', '22634100259', 'Success, transaction is canceled', 'https://app.sandbox.midtrans.com/snap/v1/transactions/446f5636-a087-44f3-a360-6fb942afadda/pdf', 'cancel', '201', NULL, '?order_id=1821025179&status_code=201&transaction_status=pending', NULL),
('1882735439', 5, 1, 2750000, 'bank_transfer', '2023-05-23 23:09:36', NULL, 'bca', '22634691985', 'Success, transaction is found', 'https://app.sandbox.midtrans.com/snap/v1/transactions/eb2bce29-6740-43df-9df3-0cfd92aa03c7/pdf', 'settlement', '201', NULL, '?order_id=1882735439&status_code=201&transaction_status=pending', NULL),
('321856013', 2, 1, 500000, 'bank_transfer', '2023-05-23 22:28:14', NULL, 'bca', '22634650871', 'Success, transaction is expired', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bba89637-70ea-439f-b216-7050002ae7fd/pdf', 'expire', '201', NULL, '?order_id=321856013&status_code=201&transaction_status=pending', NULL),
('538121231', 6, 1, 100000000, 'bank_transfer', '2023-05-23 22:24:22', NULL, 'bca', '22634835307', 'Success, transaction is canceled', 'https://app.sandbox.midtrans.com/snap/v1/transactions/7cbccf47-c366-495a-86f6-8fc22642c9bc/pdf', 'cancel', '201', NULL, '?order_id=538121231&status_code=201&transaction_status=pending', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kelas_siswa`
-- (See below for the actual view)
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
-- Stand-in structure for view `v_trx`
-- (See below for the actual view)
--
CREATE TABLE `v_trx` (
`order_id` char(20)
,`status_message` text
,`transaction_status` char(20)
,`transaction_id` varchar(200)
,`nama_siswa` varchar(100)
,`jenis_biaya` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_kelas_siswa`
--
DROP TABLE IF EXISTS `v_kelas_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_siswa`  AS SELECT `siswa`.`id` AS `id`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`id_kelas` AS `id_kelas`, `siswa`.`email` AS `email`, `siswa`.`telp` AS `telp`, `siswa`.`tahun_masuk` AS `tahun_masuk`, `siswa`.`wali_nama` AS `wali_nama`, `siswa`.`wali_email` AS `wali_email`, `siswa`.`wali_telp` AS `wali_telp`, `siswa`.`created_date` AS `created_date`, `siswa`.`updated_date` AS `updated_date`, `kelas`.`jurusan` AS `jurusan`, `kelas`.`tingkat` AS `tingkat` FROM (`siswa` join `kelas` on(`siswa`.`id_kelas` = `kelas`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_trx`
--
DROP TABLE IF EXISTS `v_trx`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_trx`  AS SELECT `trx`.`order_id` AS `order_id`, `trx`.`status_message` AS `status_message`, `trx`.`transaction_status` AS `transaction_status`, `trx`.`transaction_id` AS `transaction_id`, `siswa`.`nama` AS `nama_siswa`, `jenis_biaya`.`nama_biaya` AS `jenis_biaya` FROM ((`tb_transaction` `trx` join `siswa` on(`trx`.`siswa_id` = `siswa`.`id`)) join `jenis_biaya` on(`trx`.`biaya_id` = `jenis_biaya`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_biaya`
--
ALTER TABLE `jenis_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_biaya`
--
ALTER TABLE `jenis_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
