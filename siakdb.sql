-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2015 at 05:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`nip` int(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
`nip_dosen` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status_pembimbing` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip_dosen`, `nama`, `status_pembimbing`, `id_user`) VALUES
(6, 'Yugo', 0, 9),
(7, 'Unggul', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(11) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE IF NOT EXISTS `khs` (
  `id_khs` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `nilai_akhir` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
`id_krs` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
`nim` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip_dosen` int(20) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  `jenjang` varchar(5) DEFAULT NULL,
  `status_akademis` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `status_nikah` varchar(20) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `kewarganegaraan` varchar(20) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `alamat_rumah` varchar(50) DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `tahun_ayah` int(11) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `tahun_ibu` int(11) DEFAULT NULL,
  `alamat_ortu` varchar(50) DEFAULT NULL,
  `kode_pos_ortu` varchar(5) DEFAULT NULL,
  `pddkan_ayah` varchar(25) DEFAULT NULL,
  `pddkan_ibu` varchar(25) DEFAULT NULL,
  `penghasilan` int(11) DEFAULT NULL,
  `asal_sma` varchar(25) DEFAULT NULL,
  `jurusan_sma` varchar(25) DEFAULT NULL,
  `kota_kab` varchar(25) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
`id_mk` int(11) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(25) NOT NULL,
  `sks` int(1) NOT NULL,
  `semester` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `nip_dosen` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mk`, `kode_mk`, `nama_mk`, `sks`, `semester`, `kapasitas`, `nip_dosen`) VALUES
(1, '010-001208', 'Fisika dan Biologi', 2, 1, 40, 7),
(2, '011-001102', 'Pancasila dan Kewiraan', 2, 1, 40, 7),
(3, '010-001207', 'Anatomi Fisiologi', 4, 1, 40, 7),
(4, '011-001301', 'Konsep Dasar Keperawatan', 4, 1, 40, 7),
(5, '010-001302', 'Kebutuhan Dasar Manusia I', 4, 1, 40, 7),
(6, '010-001106', 'Psikologi', 2, 1, 40, 7),
(7, '010-001110', 'Bahasa Indonesia', 2, 1, 40, 7),
(8, '010-001205', 'Ilmu Gizi', 2, 1, 40, 7),
(9, '011-001101', 'AIK I (P2KK)', 1, 1, 40, 7),
(10, '010-001115', 'Bahasa Inggris Keperawata', 0, 1, 40, 7);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `nim` int(20) NOT NULL,
  `nip_dosen` int(20) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `komponen` int(11) NOT NULL,
  `bobot` double NOT NULL,
  `maksimum` int(11) NOT NULL,
  `nilai_po` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`id_pembayaran` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perkuliahan`
--

CREATE TABLE IF NOT EXISTS `perkuliahan` (
`id_perkuliahan` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `nim` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id_role` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Admin'),
(2, 'Sekretariat'),
(3, 'Dosen'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`id_ruang` int(11) NOT NULL,
  `no_ruang` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `no_ruang`) VALUES
(1, '2301'),
(2, '2302'),
(3, '2303'),
(4, '2304'),
(5, '2305');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat`
--

CREATE TABLE IF NOT EXISTS `sekretariat` (
`nip_sekretariat` int(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saltPassword` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `saltPassword`, `id_role`) VALUES
(1, 'muhammad.zulfi', '80cda183e18fcf1a1d9328a58120e3a3', '551f89dfcbd697.37776432', 4),
(2, 'abc', 'f3c0cb9248d05f16ddb307c86056e46a', '551f9d1246a883.08010329', 3),
(3, 'blabla', '53d9fd9e0dfd80b9bc96d17ba8284ad4', '551faa0a0b8bf6.61409646', 1),
(4, 'blibli', '827ab98188c962f1bb6fd7b5d86a1993', '551faa23de99e3.85772079', 2),
(9, 'Ardi', 'd0054f4076ffd8b7bb5f69529f47b9dd', '55201dbf1050e0.18883097', 3),
(10, 'unggul', 'e8297c3db05cb6234df88798cef7d692', '5520a75b5237d0.83638675', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`nip`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`nip_dosen`), ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`), ADD KEY `fk_id_ruang` (`id_ruang`), ADD KEY `fk_id_mk` (`id_mk`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
 ADD PRIMARY KEY (`id_khs`,`nim`,`id_mk`), ADD KEY `khs_ibfk_1` (`id_mk`), ADD KEY `khs_ibfk_2` (`nim`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
 ADD PRIMARY KEY (`id_krs`,`nim`,`semester`), ADD KEY `id_mk` (`id_mk`), ADD KEY `krs_ibfk_1` (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`), ADD KEY `id_user` (`id_user`), ADD KEY `nip_dosen` (`nip_dosen`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
 ADD PRIMARY KEY (`id_mk`), ADD KEY `nip_dosen` (`nip_dosen`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_mk`,`nim`,`nip_dosen`), ADD KEY `nilai_ibfk_2` (`nip_dosen`), ADD KEY `nilai_ibfk_3` (`nim`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`), ADD KEY `nim` (`nim`);

--
-- Indexes for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
 ADD PRIMARY KEY (`id_perkuliahan`), ADD KEY `id_mk` (`id_mk`), ADD KEY `nim` (`nim`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
 ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `sekretariat`
--
ALTER TABLE `sekretariat`
 ADD PRIMARY KEY (`nip_sekretariat`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `nip` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
MODIFY `nip_dosen` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
MODIFY `nim` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
MODIFY `id_perkuliahan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sekretariat`
--
ALTER TABLE `sekretariat`
MODIFY `nip_sekretariat` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
ADD CONSTRAINT `perkuliahan_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `perkuliahan_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sekretariat`
--
ALTER TABLE `sekretariat`
ADD CONSTRAINT `sekretariat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
