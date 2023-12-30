-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 01:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `jenkel_admin` varchar(2) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `nohp_admin` varchar(20) DEFAULT NULL,
  `status_admin` int(11) DEFAULT 1,
  `foto_admin` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jenkel_admin`, `username_admin`, `password_admin`, `email_admin`, `nohp_admin`, `status_admin`, `foto_admin`) VALUES
(1, 'Yurida', 'P', 'yurida', '21232f297a57a5a743894a0e4a801fc3', 'yuridaamalina@gmail.com', '085437277211', 1, '91fb8b312589fcf755a49f87beec37a6.jpg'),
(2, 'Shofa', 'P', 'shofa', '3e951b9760b0e4a4c052c1330fd7e531', 'noorshofa@gmail.com', '085437277211', 1, '4ade9b22f281ab4b4a368c82c9eccba7.jpg'),
(3, 'Mawar', 'P', 'mawar', '21232f297a57a5a743894a0e4a801fc3', 'mawaradmin@gmail.com', '085455278827', 1, '5f916800ee254a61a96da98eea0a9f06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `tanggal_berita` timestamp NULL DEFAULT current_timestamp(),
  `gambar_berita` varchar(40) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `detail_berita` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul_galeri` varchar(60) DEFAULT NULL,
  `tanggal_galeri` date DEFAULT current_timestamp(),
  `gambar_galeri` varchar(40) DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip_guru` varchar(30) DEFAULT NULL,
  `nama_guru` varchar(70) DEFAULT NULL,
  `jenkel_guru` varchar(2) DEFAULT NULL,
  `tmp_lahir_guru` varchar(80) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `jabatan_guru` varchar(120) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `foto_guru` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip_guru`, `nama_guru`, `jenkel_guru`, `tmp_lahir_guru`, `tgl_lahir_guru`, `jabatan_guru`, `id_kelas`, `foto_guru`) VALUES
(60, '108271736167165357711123', 'Song Hye Kyo', 'P', 'Busan, Korea', '0000-00-00', 'Kepala Sekolah', 25, 'a881e3f602972dc7a82d02435ed8957c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(23, 'Kelas 1'),
(24, 'Kelas 2'),
(25, 'Kelas 3'),
(26, 'Kelas 4'),
(27, 'Kelas 5'),
(28, 'Kelas 6'),
(29, '-');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(150) DEFAULT NULL,
  `deskripsi_pengumuman` text DEFAULT NULL,
  `tanggal_pengumuman` timestamp NULL DEFAULT current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `detail_pengumuman` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `deskripsi_pengumuman`, `tanggal_pengumuman`, `id_admin`, `detail_pengumuman`) VALUES
(15, 'JADWAL PEMBELAJARAN BARU 22-28 APRIL 2023', 'xankaxnklaxnklaxnkaxnkcdcdcddccdcdcdxajixajiaxijiaxjiaxji', '2023-12-29 23:27:47', 1, 'Yurida');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(70) DEFAULT NULL,
  `jenkel_siswa` varchar(2) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `foto_siswa` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `jenkel_siswa`, `id_kelas`, `foto_siswa`) VALUES
(18, '', 'Danan', 'L', 23, 'd6baf0182a6b6cce3f73604045501a9d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(11) NOT NULL,
  `file_judul` varchar(120) DEFAULT NULL,
  `file_deskripsi` text DEFAULT NULL,
  `file_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `file_oleh` varchar(60) DEFAULT NULL,
  `file_download` int(11) DEFAULT 0,
  `file_data` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_judul`, `file_deskripsi`, `file_tanggal`, `file_oleh`, `file_download`, `file_data`) VALUES
(13, 'Bahasa Inggris 1', 'Bahasa Inggris untuk Kelas 1 ', '2023-11-30 00:19:27', 'Nurependi, S.Pd', 0, '117460de610f64b8224dd61fb958e8ef.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `keterangan_mapel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`, `keterangan_mapel`) VALUES
(2, 'IPA', 'Belajar IPA'),
(3, 'IPS', 'Belajar IPS'),
(4, 'Bahasa Inggris', 'Bahasa Inggris'),
(5, 'Matematika', 'Belajar Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id_video` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `kode_video` varchar(100) NOT NULL,
  `judul_video` varchar(150) NOT NULL,
  `deskripsi_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id_video`, `id_mapel`, `kelas_id`, `kode_video`, `judul_video`, `deskripsi_video`) VALUES
(4, 3, 4, 'lIQBbvBZcqk', 'Materi IPS  Kelas 4 SD Tema 9 Subtema 1. Manusia Dan Lingkungan', 'MATERI IPS MANUSIA DAN LINGKUNGAN, KELAS 4 TEMA 9 SUBTEMA 1\r\n'),
(5, 3, 4, 'DNoj82nGmK8', 'Materi IPS Kelas 4 SD Tema 9 Subtema 2. Pemanfaatan Sumber Daya Alam', 'Materi IPS Kelas 4 SD Tema 9 Subtema 2. Pemanfaatan Sumber Daya Alam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
