-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 04:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fita`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `E_Nilai_Core` (`c_nilai1` VARCHAR(20)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
DECLARE total varchar(20);
select c_nilai1/count(*) into total from pm_faktor where id_aspek = 11 AND type = 'core';
RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `E_Nilai_Secondary` (`s_nilai1` VARCHAR(20)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
DECLARE total varchar(20);
select s_nilai1/count(*) into total from pm_faktor where id_aspek = 11 AND type = 'secondary';
RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `NilaiBobot` (`nilai` TINYINT) RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
DECLARE hasil varchar(20);
SELECT bobot INTO hasil FROM pm_bobot WHERE selisih = nilai;
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `W_Nilai_Core` (`core_nilai1` VARCHAR(20), `core_nilai2` VARCHAR(20)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
DECLARE total varchar(20);
select (core_nilai1 + core_nilai2)/count(*) into total from pm_faktor where id_aspek = 10 AND type = 'core';
RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `W_Nilai_Secondary` (`s_nilai1` VARCHAR(20), `s_nilai2` VARCHAR(20)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
DECLARE total varchar(20);
select (s_nilai1 + s_nilai2)/count(*) into total from pm_faktor where id_aspek = 10 AND type = 'secondary';
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `deskripsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`, `deskripsi`) VALUES
(29, 'Islam', 'Agama Islam'),
(30, 'Katolik', 'Agama Katolik'),
(31, 'Protestan', 'Agama Protestan'),
(32, 'Buddha', 'Agama Buddha'),
(33, 'Hindu', 'Agama Hindu'),
(34, 'Konghuchu', 'Agama Konghuchu');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `status_kk` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `no_kk`, `kepala_keluarga`, `status_kk`) VALUES
(12, '41517210001', 'Sigit', '1'),
(13, '41517210002', 'Mardi', '2'),
(15, '41517210005', 'Munaroh', '1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_pengumuman` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(19, 'SD'),
(20, 'SMP'),
(21, 'SMA / SMK / SMU'),
(22, 'SARJANA'),
(23, 'MAGISTER'),
(24, 'DOCTOR'),
(25, 'TIDAK SEKOLAH');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_rt` int(11) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `jk` enum('Lelaki','Perempuan') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `status_perkawinan` enum('1','2','3','4') NOT NULL,
  `kewarganegaraan` enum('Indonesia','Asing') NOT NULL,
  `status_hidup` enum('Hidup','Meninggal') NOT NULL,
  `status_dalam_keluarga` enum('Ayah/Suami','Ibu/Istri','Anak') NOT NULL,
  `foto` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `id_kk`, `nik`, `nama`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `no_rt`, `no_telepon`, `jk`, `pekerjaan`, `id_pendidikan`, `id_agama`, `status_perkawinan`, `kewarganegaraan`, `status_hidup`, `status_dalam_keluarga`, `foto`, `password`) VALUES
(37, 12, '001', 'Si', 'S', '2021-12-13', 'A', 1, '5555', 'Lelaki', 'SSS', 22, 31, '1', 'Indonesia', 'Hidup', 'Anak', '', '21232f297a57a5a743894a0e4a801fc3'),
(38, 13, '002', 'S', 'S', '2021-12-13', 'S', 2, '5555', 'Lelaki', 'SSS', 19, 29, '1', 'Indonesia', 'Hidup', 'Ayah/Suami', '', '21232f297a57a5a743894a0e4a801fc3'),
(39, 12, '003', 'Sa', 'S', '2021-12-13', 'S', 1, '5555', 'Lelaki', 'SSS', 20, 30, '1', 'Indonesia', 'Hidup', 'Anak', '', '21232f297a57a5a743894a0e4a801fc3'),
(40, 12, '004', 'AA', 'S', '2021-12-13', 'A', 1, '5555', 'Lelaki', 'SSS', 20, 31, '2', 'Indonesia', 'Hidup', 'Ayah/Suami', '', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembuat` int(11) NOT NULL,
  `publish` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_berita`, `judul`, `isi`, `tanggal`, `pembuat`, `publish`) VALUES
(21, '1', '<p>1</p>', '2021-12-15 15:21:42', 38, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `pm_alternatif`
--

CREATE TABLE `pm_alternatif` (
  `id_alternatif` tinyint(3) UNSIGNED NOT NULL,
  `kd_alternatif` varchar(100) NOT NULL,
  `id_penduduk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_alternatif`
--

INSERT INTO `pm_alternatif` (`id_alternatif`, `kd_alternatif`, `id_penduduk`) VALUES
(17, 'K-001', 37),
(18, 'K-002', 39);

-- --------------------------------------------------------

--
-- Table structure for table `pm_aspek`
--

CREATE TABLE `pm_aspek` (
  `id_aspek` tinyint(3) UNSIGNED NOT NULL,
  `aspek` varchar(100) NOT NULL,
  `prosentase` float NOT NULL,
  `bobot_core` float NOT NULL,
  `bobot_secondary` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_aspek`
--

INSERT INTO `pm_aspek` (`id_aspek`, `aspek`, `prosentase`, `bobot_core`, `bobot_secondary`) VALUES
(11, 'Ekonomi', 50, 75, 25),
(10, 'Warga', 50, 65, 35);

-- --------------------------------------------------------

--
-- Table structure for table `pm_bobot`
--

CREATE TABLE `pm_bobot` (
  `selisih` tinyint(3) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_bobot`
--

INSERT INTO `pm_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(0, 5, 'Tidak ada selisih (kompetensi sesuai dgn yg dibutuhkan)'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(-1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(-2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(3, 2.5, 'Kompetensi individu  kelebihan 3 tingkat'),
(-3, 2, 'Kompetensi individu  kekurangan 3 tingkat'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat'),
(-4, 1, 'Kompetensi individu kekurangan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `pm_faktor`
--

CREATE TABLE `pm_faktor` (
  `id_faktor` tinyint(3) UNSIGNED NOT NULL,
  `id_aspek` tinyint(3) UNSIGNED NOT NULL,
  `faktor` varchar(30) NOT NULL,
  `target` tinyint(3) NOT NULL,
  `type` set('core','secondary') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_faktor`
--

INSERT INTO `pm_faktor` (`id_faktor`, `id_aspek`, `faktor`, `target`, `type`) VALUES
(32, 10, 'Kelengkapan Dokumen', 5, 'core'),
(30, 10, 'tanggungan', 3, 'secondary'),
(28, 10, 'penduduk', 4, 'core'),
(29, 10, 'rumah', 3, 'secondary'),
(27, 10, 'umur', 4, 'core'),
(26, 11, 'pekerjaan', 4, 'secondary'),
(25, 11, 'penghasilan', 4, 'core');

-- --------------------------------------------------------

--
-- Table structure for table `pm_hasil`
--

CREATE TABLE `pm_hasil` (
  `id_hasil` int(20) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_hasil`
--

INSERT INTO `pm_hasil` (`id_hasil`, `id_alternatif`, `hasil`) VALUES
(6203, 17, 4.46458),
(6204, 18, 4.48958);

-- --------------------------------------------------------

--
-- Table structure for table `pm_sample`
--

CREATE TABLE `pm_sample` (
  `id_sample` int(11) UNSIGNED NOT NULL,
  `id_alternatif` tinyint(3) UNSIGNED NOT NULL,
  `id_faktor` tinyint(3) UNSIGNED NOT NULL,
  `value` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_sample`
--

INSERT INTO `pm_sample` (`id_sample`, `id_alternatif`, `id_faktor`, `value`) VALUES
(166, 17, 32, 4),
(167, 17, 30, 2),
(168, 17, 28, 3),
(169, 17, 29, 4),
(170, 17, 27, 4),
(171, 17, 26, 4),
(172, 17, 25, 5),
(173, 18, 32, 4),
(174, 18, 30, 3),
(175, 18, 28, 3),
(176, 18, 29, 4),
(177, 18, 26, 5),
(178, 18, 25, 5),
(179, 18, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `rt_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `id_penduduk`, `role`, `rt_no`) VALUES
(4, 37, 'RW', 0),
(5, 39, 'RT', 1),
(6, 38, 'RT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `gambar` text NOT NULL,
  `role` enum('Admin') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `gambar`, `role`) VALUES
(1, 'admin', 'hai', '21232f297a57a5a743894a0e4a801fc3', '1635169554305.png', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `fk_warga` (`id_warga`),
  ADD KEY `fk_pengumuman` (`id_pengumuman`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kk` (`id_kk`),
  ADD KEY `fk_agama` (`id_agama`),
  ADD KEY `fk_pendidikan` (`id_pendidikan`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_warga1` (`pembuat`);

--
-- Indexes for table `pm_alternatif`
--
ALTER TABLE `pm_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `pm_bobot`
--
ALTER TABLE `pm_bobot`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `pm_hasil`
--
ALTER TABLE `pm_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `pm_sample`
--
ALTER TABLE `pm_sample`
  ADD PRIMARY KEY (`id_sample`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `fk_warga2` (`id_penduduk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pm_alternatif`
--
ALTER TABLE `pm_alternatif`
  MODIFY `id_alternatif` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  MODIFY `id_aspek` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  MODIFY `id_faktor` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pm_hasil`
--
ALTER TABLE `pm_hasil`
  MODIFY `id_hasil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6205;

--
-- AUTO_INCREMENT for table `pm_sample`
--
ALTER TABLE `pm_sample`
  MODIFY `id_sample` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_pengumuman` FOREIGN KEY (`id_pengumuman`) REFERENCES `pengumuman` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_warga` FOREIGN KEY (`id_warga`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `fk_agama` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kk` FOREIGN KEY (`id_kk`) REFERENCES `kartu_keluarga` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pendidikan` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `fk_warga1` FOREIGN KEY (`pembuat`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_warga2` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
