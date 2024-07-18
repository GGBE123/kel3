-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 12:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `pengarang` varchar(300) NOT NULL,
  `penerbit` varchar(200) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `halaman` int(11) NOT NULL,
  `editor` varchar(255) DEFAULT NULL,
  `kdt` varchar(30) DEFAULT NULL,
  `no_isbn` varchar(20) DEFAULT NULL,
  `tanggal_terbit` varchar(15) DEFAULT NULL,
  `media` enum('buku','buku digital') NOT NULL,
  `sinopsis` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `pengarang`, `penerbit`, `judul`, `halaman`, `editor`, `kdt`, `no_isbn`, `tanggal_terbit`, `media`, `sinopsis`) VALUES
(2, 'Mr Joe', NULL, 'Joe World', 150, NULL, NULL, NULL, NULL, 'buku', 'Book Of Joe World'),
(3, 'Bros', NULL, 'Bruh', 1945, NULL, NULL, NULL, NULL, 'buku digital', 'Bruh ain\'t no way'),
(4, 'Jeff,  Damar, Hitler', NULL, 'The Ideal World', 1938, NULL, NULL, NULL, NULL, 'buku', 'The Ideal World according to the greats ????'),
(7, 'juni1234', NULL, 'ibnu', 123, NULL, NULL, NULL, NULL, 'buku digital', 'nenek');

-- --------------------------------------------------------

--
-- Table structure for table `milik`
--

CREATE TABLE `milik` (
  `id_milik` int(11) NOT NULL,
  `nip_m` varchar(15) CHARACTER SET latin1 NOT NULL,
  `id_buku` int(11) NOT NULL,
  `status` enum('not reviewed','being reviewed','denied','accepted') NOT NULL DEFAULT 'not reviewed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milik`
--

INSERT INTO `milik` (`id_milik`, `nip_m`, `id_buku`, `status`) VALUES
(2, '123', 2, 'being reviewed'),
(3, '123', 3, 'accepted'),
(4, '12345678910', 4, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `nip_m` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` enum('Dosen','Mahasiswa','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`nip_m`, `nama`, `email`, `password`, `role`) VALUES
('', 'Daffa', 'daffah23@gmail.com', '$2y$10$GucOun7rLtlrdLMqT5Adhu3vS5SlRgEPHhshhwCiGxIqSUlxOnn2m', 'Mahasiswa'),
('024389274392734', 'manuk', 'manuk123@gmail.com', '$2y$10$6m/Hb2V08ns/wGOts0xFpO7lqk4NzrZEWxuJ5qTcu3cXw0TApJB0C', 'Dosen'),
('1', 'manuk', 'manuk@gmail.com', '$2y$10$8/j8CYvr7DyOXWocncOQ7u1mgUiBrndhhIE3qG9wyUlXYj1R1.su2', 'Mahasiswa'),
('123', '123', '123@gmail.com', '$2y$10$JEsEaylDXwbUYpy9rkF6eO0iEDcroFDOPvuPh0yjvxPm3RCwmgF0a', 'Mahasiswa'),
('12345678910', '12345', '12345@mahasiswa.pcr.ac.id', '$2y$10$ypXk7wJcivmAwU7QCPqp9eqYMEV7017nh.aJbMm1tOi79BYt2eubW', 'Mahasiswa'),
('1234568', 'Daffa123', 'daffa@mahasiswa.pcr.ac.id', '$2y$10$mvBFM44KxxTfPv0VPewb3.8HCQHMJbnHgGlClOyw6Oe3u/nZo2bBe', 'Mahasiswa'),
('18788', 'abi', 'abi@mahasiswa.pcr.ac.id', '$2y$10$k198ouEYSJD3paYadEOjs.IOK00wIQMM5m.FOTHlrG1V215eRlggi', 'Mahasiswa'),
('2355301035', 'Daga', 'UGABUGA@gmail.com', '$2y$10$6ZFP8Y9JoxAvwTshthwN9eYUPVCT5u.VNEfdYR8RqSEfdrF0GM/ki', 'Mahasiswa'),
('2355301099', 'M Aldi Ritonga', 'aldi23ti@mahasiswa.pcr.ac.id', '$2y$10$zowvhpB9lnP0PLDY5q7KMOeEwX8rDiiaINKK8048wm..wLhQU4CIW', 'Mahasiswa'),
('9', 'maldi', 'maldi@gmail.com', '$2y$10$KyndwwFoKIQJs3vzIyt.Qu1OQlEI74yKaWhhb3GPi4oSrgfeYA8xm', 'Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `staff_perpustakaan`
--

CREATE TABLE `staff_perpustakaan` (
  `id_staff` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('staff perpustakaan','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_perpustakaan`
--

INSERT INTO `staff_perpustakaan` (`id_staff`, `nama`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$h5xfs8eE6QWKHF/p9u/QJe66siFpmlPU48JXslJ2AHRxydtRGfkRu', 'admin'),
(2, 'baba', 'bebe@gmail.com', '$2y$10$oUmQAu4qxgUHO/UOlsoPUefwNw4bEo7y.7vXV0eCO7J5JraDFm0jy', ''),
(101, 'Staff', 'Staff@gmail.com', '$2y$10$NlSzjyhi5KRCdRKHMbovUudon6NYAeoDIxKIZYbZxmtKhpITsEaVq', 'staff perpustakaan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `no_isbn_2` (`no_isbn`),
  ADD UNIQUE KEY `no_isbn_3` (`no_isbn`),
  ADD KEY `no_isbn` (`no_isbn`);
ALTER TABLE `buku` ADD FULLTEXT KEY `no_isbn_4` (`no_isbn`);

--
-- Indexes for table `milik`
--
ALTER TABLE `milik`
  ADD PRIMARY KEY (`id_milik`),
  ADD KEY `nip_m` (`nip_m`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`nip_m`);

--
-- Indexes for table `staff_perpustakaan`
--
ALTER TABLE `staff_perpustakaan`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `milik`
--
ALTER TABLE `milik`
  MODIFY `id_milik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_perpustakaan`
--
ALTER TABLE `staff_perpustakaan`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `milik`
--
ALTER TABLE `milik`
  ADD CONSTRAINT `milik_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milik_penulis` FOREIGN KEY (`nip_m`) REFERENCES `penulis` (`nip_m`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
