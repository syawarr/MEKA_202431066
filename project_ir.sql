-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2026 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ir`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_event` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_event` date NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `kuota` int(11) NOT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `biaya` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_user`, `id_kategori`, `nama_event`, `deskripsi`, `tanggal_event`, `lokasi`, `kuota`, `poster`, `biaya`) VALUES
(1, 1, 1, 'Seminar Artificial Intelligence', 'Pengenalan AI untuk mahasiswa', '2026-07-15', 'Aula Kampus', 100, 'seminar digital.jpeg', 50000.00),
(2, 2, 1, 'Seminar Cyber Security', 'Keamanan informasi dan jaringan', '2026-07-20', 'Gedung C', 80, 'cyber_security.jpeg', 50000.00),
(3, 3, 2, 'Workshop Laravel', 'Pelatihan framework Laravel', '2026-08-05', 'Lab Komputer 1', 40, 'seminar digital.jpeg', 75000.00),
(4, 3, 2, 'Workshop UI UX', 'Pelatihan desain antarmuka', '2026-08-10', 'Lab Multimedia', 35, 'uiux.jpeg', 75000.00),
(5, 4, 3, 'Pelatihan Public Speaking', 'Meningkatkan kemampuan berbicara', '2026-08-15', 'Ruang Seminar', 50, 'public_speaking.jpeg', 40000.00),
(6, 4, 4, 'Kompetisi Business Plan', 'Lomba perencanaan bisnis', '2026-09-01', 'Aula Utama', 60, 'business_plan.jpeg', 100000.00),
(7, 5, 4, 'Kompetisi Programming', 'Lomba pemrograman mahasiswa', '2026-09-10', 'Lab Komputer 2', 50, 'programming.jpeg', 75000.00),
(8, 1, 5, 'LDKM HIMAKA 2026', 'Kegiatan kaderisasi HIMAKA', '2026-09-20', 'Villa Leadership', 100, 'ldkm_himaka.jpeg', 150000.00),
(9, 2, 1, 'Seminar Data Science', 'Analisis data modern', '2026-10-05', 'Aula Kampus', 90, 'datascience.jpeg', 50000.00),
(10, 5, 2, 'Workshop Python SERU', 'Belajar Python dasar hingga menengah', '2026-10-15', 'Lab Komputer 3', 45, 'python.jpeg', 80000.00),
(11, 2, 1, 'Seminar Anak Sehat', 'Membantu menjaga kestabilan daya tahan tubuh anak', '2026-06-05', 'Haji Mali', 46, 'Growth 2026.jpeg', 35000.00),
(14, 3, 2, 'Workshop Python SERU', 'yahh', '2026-06-19', 'Lab Komputer 3', 60, 'python.jpeg', 59991.00);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Seminar', 'Kegiatan seminar Marapthon'),
(2, 'Workshop', 'Pelatihan keterampilan Menulis'),
(3, 'Pelatihan', 'Program pengembangan kemampuan'),
(4, 'Kompetisi', 'Lomba antar peserta'),
(5, 'LDKM', 'Latihan Dasar Kepemimpinan Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` decimal(10,2) NOT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status_verifikasi` enum('Pending','Valid','Tidak Valid') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftaran`, `tanggal_bayar`, `jumlah_bayar`, `bukti_bayar`, `status_verifikasi`) VALUES
(1, 1, '2026-06-20', 50000.00, 'Bukti TF 15.jpeg', 'Valid'),
(2, 2, '2026-06-20', 50000.00, 'Bukti TF 14.jpeg', 'Valid'),
(3, 3, '2026-06-21', 50000.00, 'Bukti TF 13.jpeg', 'Valid'),
(4, 4, '2026-06-22', 75000.00, 'Bukti TF 11.jpeg', 'Valid'),
(5, 5, '2026-06-22', 75000.00, 'Bukti TF 11.jpeg', 'Pending'),
(6, 6, '2026-06-23', 75000.00, 'Bukti TF 10.jpeg', 'Valid'),
(7, 7, '2026-06-24', 40000.00, 'Bukti TF 9.jpeg', 'Valid'),
(8, 8, '2026-06-24', 100000.00, 'Bukti TF 8.jpeg', 'Pending'),
(9, 9, '2026-06-25', 75000.00, 'Bukti TF 7.jpeg', 'Valid'),
(10, 10, '2026-06-25', 150000.00, 'Bukti TF 6.jpeg', 'Valid'),
(11, 11, '2026-06-25', 150000.00, 'Bukti TF 5.jpeg', 'Valid'),
(13, 13, '2026-06-26', 80000.00, 'Bukti TF 4.jpeg', 'Valid'),
(14, 14, '2026-06-27', 50000.00, 'Bukti TF 3.jpeg', 'Valid'),
(15, 15, '2026-06-27', 75000.00, 'Bukti TF 6.jpeg', 'Valid'),
(20, 21, '2026-06-19', 50000.00, 'Bukti TF 1.jpeg', 'Valid'),
(21, 16, '2026-06-19', 60000.00, 'kucing.jpeg', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status_pendaftaran` enum('Menunggu','Diterima','Ditolak') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_peserta`, `id_event`, `tanggal_daftar`, `status_pendaftaran`) VALUES
(1, 1, 1, '2026-06-20', 'Diterima'),
(2, 2, 1, '2026-06-20', 'Diterima'),
(3, 3, 2, '2026-06-21', 'Diterima'),
(4, 4, 3, '2026-06-22', 'Diterima'),
(5, 5, 3, '2026-06-22', 'Menunggu'),
(6, 6, 4, '2026-06-23', 'Diterima'),
(7, 7, 5, '2026-06-24', 'Diterima'),
(8, 8, 6, '2026-06-24', 'Menunggu'),
(9, 9, 7, '2026-06-25', 'Diterima'),
(10, 10, 8, '2026-06-25', 'Diterima'),
(11, 11, 8, '2026-06-25', 'Diterima'),
(12, 12, 9, '2026-06-26', 'Menunggu'),
(13, 13, 10, '2026-06-26', 'Diterima'),
(14, 14, 2, '2026-06-27', 'Diterima'),
(15, 15, 4, '2026-06-27', 'Diterima'),
(16, 16, 5, '2026-06-28', 'Menunggu'),
(17, 17, 6, '2026-06-28', 'Diterima'),
(18, 18, 7, '2026-06-29', 'Diterima'),
(19, 19, 9, '2026-06-29', 'Diterima'),
(20, 20, 10, '2026-06-30', 'Menunggu'),
(21, 22, 6, '2026-06-19', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama_peserta`, `nim`, `prodi`, `email`, `no_hp`) VALUES
(1, 'Aisyah Nur Kusuma', '202431001', 'Informatika', 'aisyah1@mail.com', '081234567890'),
(2, 'Fathir Ramadhan', '202431002', 'Informatika', 'fathir@mail.com', '081111111002'),
(3, 'Lintang Pratama', '202431003', 'Informatika', 'lintang@mail.com', '081111111003'),
(4, 'Abhilla Putri', '202431004', 'Informatika', 'abhilla@mail.com', '081111111004'),
(5, 'Gilang Saputra', '202431005', 'Informatika', 'gilang@mail.com', '081111111005'),
(6, 'Nabila Putri', '202431006', 'Sistem Informasi', 'nabila@mail.com', '081111111006'),
(7, 'Rizky Maulana', '202431007', 'Sistem Informasi', 'rizky@mail.com', '081111111007'),
(8, 'Dinda Maharani', '202431008', 'Sistem Informasi', 'dinda@mail.com', '081111111008'),
(9, 'Salsa Putri', '202431009', 'Sistem Informasi', 'salsa@mail.com', '081111111009'),
(10, 'Rahmat Hidayat', '202431010', 'Sistem Informasi', 'rahmat@mail.com', '081111111010'),
(11, 'Farhan Akbar', '202431011', 'Teknik Komputer', 'farhan@mail.com', '081111111011'),
(12, 'Nadya Putri', '202431012', 'Teknik Komputer', 'nadya@mail.com', '081111111012'),
(13, 'Dewi Lestari', '202431013', 'Teknik Komputer', 'dewi@mail.com', '081111111013'),
(14, 'Arif Nugroho', '202431014', 'Teknik Komputer', 'arif@mail.com', '081111111014'),
(15, 'Bima Prakoso', '202431015', 'Teknik Komputer', 'bima@mail.com', '081111111015'),
(16, 'Rina Kartika', '202431016', 'Informatika', 'rina@mail.com', '081111111016'),
(17, 'Yoga Pratama', '202431017', 'Informatika', 'yoga@mail.com', '081111111017'),
(18, 'Tia Amelia', '202431018', 'Sistem Informasi', 'tia@mail.com', '081111111018'),
(19, 'Fikri Hidayat', '202431019', 'Teknik Komputer', 'fikri@mail.com', '081111111019'),
(20, 'Siti Aulia', '202431020', 'Informatika', 'siti@mail.com', '081111111020'),
(21, 'Faiz Nur', '202431089', 'Informatika', 'faiz@gmail.com', '081745634522'),
(22, 'Nabila', '24315670', 'Akuntansi', 'nabila@gmail.com', '081234567062');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','panitia') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin HIMAKA', 'adminhimaka@kampus.ac.id', '123456', 'admin', '2026-06-18 00:29:25'),
(2, 'Panitia Seminar', 'seminar@kampus.ac.id', '123456', 'panitia', '2026-06-18 00:29:25'),
(3, 'Panitia Workshop', 'workshop@kampus.ac.id', '123456', 'panitia', '2026-06-18 00:29:25'),
(4, 'Admin BEM', 'bem@kampus.ac.id', '123456', 'admin', '2026-06-18 00:29:25'),
(5, 'Admin HIMA TI', 'himati@kampus.ac.id', '123456', 'admin', '2026-06-18 00:29:25'),
(6, 'Aisyah Kusuma', 'aisyah@gmail.com', '12345', 'panitia', '2026-06-18 21:53:26'),
(7, 'Nabila', 'nabila@gmail.com', '1234', 'panitia', '2026-06-19 20:32:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `fk_event_user` (`id_user`),
  ADD KEY `fk_event_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_pendaftaran_peserta` (`id_peserta`),
  ADD KEY `fk_pendaftaran_event` (`id_event`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_event` (`id_kategori`),
  ADD CONSTRAINT `fk_event_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pendaftaran` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `fk_pendaftaran_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
