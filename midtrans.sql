-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2023 at 03:16 PM
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
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class`, `created_date`, `updated_date`) VALUES
(1, 'IPS', 'X', '2023-04-26 17:13:02', '2023-04-26 17:13:02'),
(2, 'IPS', 'XI', '2023-04-26 20:04:46', '2023-04-26 20:04:46'),
(3, 'IPS', 'XII', '2023-04-26 20:04:46', '2023-04-26 20:04:46'),
(4, 'IPA', 'X', '2023-04-26 17:13:02', '2023-04-26 17:13:02'),
(5, 'IPA', 'XI', '2023-04-26 20:04:46', '2023-04-26 20:04:46'),
(6, 'IPA', 'XII', '2023-04-26 20:04:46', '2023-04-26 20:04:46');

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

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tahun_masuk` year(4) NOT NULL DEFAULT current_timestamp(),
  `wali_nama` varchar(255) NOT NULL,
  `wali_email` varchar(255) NOT NULL,
  `wali_telp` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `id_kelas`, `email`, `telp`, `tahun_masuk`, `wali_nama`, `wali_email`, `wali_telp`, `created_date`, `updated_date`) VALUES
(1, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(2, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(3, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(4, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(5, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(6, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(7, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(8, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(9, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(10, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(11, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
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
(24, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(25, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(26, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(27, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(28, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(29, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(30, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(31, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07'),
(32, '42418047', 'Muchamad Ainul Rokhman', 1, 'ainul@email.com', '085227099929', 2023, 'Guntur Pamuji', 'guntur@gmail.com', '085727554104', '2023-04-26 11:36:07', '2023-04-26 11:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
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
-- Dumping data for table `tb_transaction`
--

INSERT INTO `tb_transaction` (`order_id`, `customer_name`, `customer_email`, `gross_amount`, `payment_type`, `transaction_time`, `settlement_time`, `bank`, `va_numbers`, `status_message`, `pdf_url`, `transaction_status`, `status_code`, `transaction_id`, `finish_redirect_url`, `payment_code`) VALUES
('1635134350', 'Guest', 'guest@mail.com', 300000, 'bank_transfer', '2023-04-08 13:50:50', NULL, 'bca', '66796886228', 'Transaksi sedang diproses', 'https://app.sandbox.midtrans.com/snap/v1/transactions/13179a2d-0c3d-4424-871b-476f5add80d3/pdf', 'pending', '201', NULL, 'https://denatureindonesia.me/?order_id=1635134350&status_code=201&transaction_status=pending&wc-api=WC_Gateway_Midtrans', NULL);

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
,`class_name` varchar(50)
,`class` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_kelas_siswa`
--
DROP TABLE IF EXISTS `v_kelas_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_siswa`  AS SELECT `siswa`.`id` AS `id`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`id_kelas` AS `id_kelas`, `siswa`.`email` AS `email`, `siswa`.`telp` AS `telp`, `siswa`.`tahun_masuk` AS `tahun_masuk`, `siswa`.`wali_nama` AS `wali_nama`, `siswa`.`wali_email` AS `wali_email`, `siswa`.`wali_telp` AS `wali_telp`, `siswa`.`created_date` AS `created_date`, `siswa`.`updated_date` AS `updated_date`, `class`.`class_name` AS `class_name`, `class`.`class` AS `class` FROM (`siswa` join `class` on(`siswa`.`id_kelas` = `class`.`class_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `jenis_biaya`
--
ALTER TABLE `jenis_biaya`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_biaya`
--
ALTER TABLE `jenis_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
