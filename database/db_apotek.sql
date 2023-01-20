-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 12:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `iddetailtransaksi` int(4) NOT NULL,
  `idtransaksi` int(5) NOT NULL,
  `idobat` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `hargasatuan` double NOT NULL,
  `totalharga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`iddetailtransaksi`, `idtransaksi`, `idobat`, `jumlah`, `hargasatuan`, `totalharga`) VALUES
(1912, 1512, 1614, 1, 50000, 50000),
(1913, 1513, 1615, 2, 35000, 70000),
(1914, 1514, 1619, 1, 30000, 30000),
(2104, 1517, 1615, 1, 35000, 35000),
(2105, 1519, 1619, 1, 30000, 30000),
(2106, 1519, 1614, 2, 50000, 100000),
(2107, 1526, 1615, 1, 35000, 35000),
(2108, 1526, 1615, 1, 35000, 35000),
(2109, 1527, 1619, 1, 30000, 30000),
(2110, 1532, 1613, 7, 20000, 140000),
(2111, 1544, 1614, 1, 50000, 50000),
(2112, 1545, 1614, 1, 50000, 50000),
(2113, 1545, 1613, 3, 20000, 60000),
(2114, 1545, 1613, 3, 20000, 60000),
(2115, 1545, 1613, 3, 20000, 60000),
(2116, 1545, 1613, 3, 20000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `idkaryawan` int(4) NOT NULL,
  `namakaryawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`idkaryawan`, `namakaryawan`, `alamat`, `telp`) VALUES
(1211, 'Budi ', 'Jln. Mawar No.09', '08123812783'),
(1212, 'Joko', 'Jln. Merpati No. 70', '081786712893'),
(1213, 'Putra Angga', 'Jln. Gelogor Carik No.96', '087854712611'),
(1218, 'Jono', 'Jalan DIpoegoro', '0828318391123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `leveluser` varchar(50) DEFAULT NULL,
  `idkaryawan` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `leveluser`, `idkaryawan`) VALUES
('admin', '$2y$10$voaQ9lEpRL5da7S/ckfCGuWDIPIAYLTJ1Hp/WVbGphEKnTQZQVSz.', 'admin', 1211),
('karyawan', '$2y$10$w6uYam03/MF3/dgFgv73vuODR8tEgMys.3sFCuxr7zhQaTPuBCYEm', 'karyawan', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `idobat` int(4) NOT NULL,
  `idsupplier` int(4) NOT NULL,
  `namaobat` varchar(100) NOT NULL,
  `kategoriobat` varchar(50) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stok_obat` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`idobat`, `idsupplier`, `namaobat`, `kategoriobat`, `hargajual`, `hargabeli`, `stok_obat`, `keterangan`) VALUES
(1613, 1411, 'Paracetamol', 'Umum', 20000, 15000, 0, ''),
(1614, 1411, 'Paramex', 'Obat Sakit Kepala', 50000, 40000, 70, ''),
(1615, 1411, 'Betadine', 'Obat Luka', 35000, 30000, 30, ''),
(1619, 1411, 'Sangobion', 'Umum', 30000, 25000, 50, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(4) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `usia` int(3) NOT NULL,
  `buktifotoresep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namalengkap`, `alamat`, `telp`, `usia`, `buktifotoresep`) VALUES
(1811, 'Detektif Aldo', 'Ds. Suryo No. 368, Bandar Lampung 40023, Bengkulu', 1332936741, 29, '20130904_083542eeee.jpg'),
(1812, 'Eva Farida', 'Kpg. Astana Anyar No. 523, Magelang 16948, DKI', 1212029912, 24, '20130904_085522aaaa.jpg'),
(1813, 'Marcus Perez', 'Dk. Juanda No. 262, Sukabumi 56844, KalTeng', 1972843411, 22, 'Old_prescription_in_exposition_History_of_pharmacies_in_Kuks_Hospital_in_Kuks,_Trutnov_District.jpg'),
(1817, 'Marcus Perez', 'Jalan Raya', 2147483647, 35, 'MV5BMTk5Mzk1MDI4MF5BMl5BanBnXkFtZTgwNTUyNTU3MTE@._V1_UY317_CR19,0,214,317_AL_.jpg'),
(1818, 'ada', 'Jalan DIpoegoro', 2147483647, 21, 'Angel.jpg'),
(1820, 'Belum Pelanggan', '-', 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `idsupplier` int(4) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`idsupplier`, `perusahaan`, `keterangan`) VALUES
(1411, 'PT Abbot Indonesia', 'Wisma Pondok Indah 2, Suite 1000. Jl. Sultan Iskandar Muda Kav.V – TA Pondok Indah, Jakarta 12310.'),
(1412, 'PT Aditama Raya Farmindo', 'Alamat: Jl. Rungkut Industri, Kali Rungkut, Rungkut, Kota SBY, Jawa Timur 60293, Indonesia'),
(1413, 'PT Afiat', 'Alamat: Jl. Mahar Martanegara No. 138, Cimindi, Jawa Barat 40522, Indonesia, Telepon: +62226613339'),
(1414, 'PT. Anugerah Pharmindo Lestari', 'Jl. Cargo Permai No.88, Ubung Kaja, Kec. Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `idtransaksi` int(5) NOT NULL,
  `idpelanggan` int(4) DEFAULT NULL,
  `idkaryawan` int(4) DEFAULT NULL,
  `tgltransaksi` date DEFAULT NULL,
  `kategoripelanggan` varchar(20) DEFAULT NULL,
  `totalbayar` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `kembali` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`idtransaksi`, `idpelanggan`, `idkaryawan`, `tgltransaksi`, `kategoripelanggan`, `totalbayar`, `bayar`, `kembali`) VALUES
(1512, 1812, 1212, '2020-09-16', 'Umum', 50000, 100000, 50000),
(1513, 1817, 1218, '2021-05-06', 'Umum', 70000, 100000, 30000),
(1514, 1812, 1212, '2018-12-25', 'Umum', 30000, 50000, 20000),
(1517, 1811, 1211, '2022-11-14', 'langganan', 35000, 0, -35000),
(1518, 1812, 1211, '2022-11-14', 'langganan', 0, 0, 0),
(1519, 1813, 1211, '2022-11-14', 'langganan', 130000, 100000, -30000),
(1522, 1811, 1211, '2022-11-16', 'langganan', 0, 0, 0),
(1523, 1812, 1211, '2022-11-16', 'langganan', 0, 0, 0),
(1525, 1811, 1211, '2022-11-17', 'langganan', 0, 0, 0),
(1526, 1812, 1211, '2022-11-18', 'langganan', 0, 0, 0),
(1527, 1811, 1211, '2022-11-19', 'langganan', 0, 0, 0),
(1528, 1812, 1211, '2022-11-19', 'langganan', 0, 0, 0),
(1529, 1820, 1211, '2022-11-19', 'umum', 0, 0, 0),
(1531, 1813, 1211, '2022-11-19', 'langganan', 0, 0, 0),
(1532, 1811, 1211, '2022-11-21', 'langganan', 0, 0, 0),
(1533, 1811, 1211, '2022-11-21', 'langganan', 0, 0, 0),
(1534, 1820, 1211, '2022-11-21', 'umum', 0, 0, 0),
(1535, 1811, 1211, '2022-11-21', 'langganan', 0, 0, 0),
(1536, 1820, 1211, '2022-11-21', 'umum', 0, 0, 0),
(1537, 1811, 1211, '2022-11-21', 'langganan', 0, 0, 0),
(1540, 1811, 1211, '2022-11-21', 'langganan', 0, 0, 0),
(1541, 1820, 1211, '2022-11-21', 'umum', 0, 0, 0),
(1543, 1820, 1211, '2022-11-21', 'umum', 0, 0, 0),
(1544, 1812, 1211, '2022-11-22', 'langganan', 50000, 100000, 50000),
(1545, 1811, 1211, '2022-11-22', 'langganan', 0, 0, 0),
(1546, 1812, 1212, '2022-11-22', 'langganan', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`),
  ADD KEY `tb_idobat` (`idobat`),
  ADD KEY `fk_transaksi` (`idtransaksi`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_idkaryawan_tbobat` (`idkaryawan`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`idobat`),
  ADD KEY `fk_idsupplier` (`idsupplier`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `fk_idkaryawan` (`idkaryawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `iddetailtransaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2117;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `idkaryawan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1220;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `idobat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1621;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `idpelanggan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1821;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `idsupplier` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1424;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `idtransaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1547;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`idtransaksi`) REFERENCES `tb_transaksi` (`idtransaksi`),
  ADD CONSTRAINT `tb_idobat` FOREIGN KEY (`idobat`) REFERENCES `tb_obat` (`idobat`);

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `fk_idkaryawan_tbobat` FOREIGN KEY (`idkaryawan`) REFERENCES `tb_karyawan` (`idkaryawan`);

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `fk_idsupplier` FOREIGN KEY (`idsupplier`) REFERENCES `tb_supplier` (`idsupplier`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_idkaryawan` FOREIGN KEY (`idkaryawan`) REFERENCES `tb_karyawan` (`idkaryawan`),
  ADD CONSTRAINT `fk_idpelanggan` FOREIGN KEY (`idpelanggan`) REFERENCES `tb_pelanggan` (`idpelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
