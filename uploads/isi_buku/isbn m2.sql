-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 02:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ID_BUKU` char(20) NOT NULL,
  `JUDUL` varchar(40) NOT NULL,
  `NAMA_PENULIS` varchar(40) NOT NULL,
  `EDISI` varchar(40) NOT NULL,
  `SERI` varchar(40) NOT NULL,
  `TAHUN_TERBIT` varchar(40) NOT NULL,
  `JUMLAH_HALAMAN` varchar(40) NOT NULL,
  `TINGGI_BUKU` varchar(40) NOT NULL,
  `KATEGORI` varchar(40) NOT NULL,
  `JENIS` varchar(40) NOT NULL,
  `MEDIA` varchar(40) NOT NULL,
  `FILE_BUKU` varchar(40) NOT NULL,
  `LAMPIRAN_PENDUKUNG` varchar(40) NOT NULL,
  `KETERANGAN` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `JUDUL`, `NAMA_PENULIS`, `EDISI`, `SERI`, `TAHUN_TERBIT`, `JUMLAH_HALAMAN`, `TINGGI_BUKU`, `KATEGORI`, `JENIS`, `MEDIA`, `FILE_BUKU`, `LAMPIRAN_PENDUKUNG`, `KETERANGAN`) VALUES
('B001', 'Learn SQL', 'John Doe', '1st', 'Programming', '2019', '200', '24', 'Edukasi', 'Novel', 'Kertas', 'learn_sql.pdf', 'Glossary', 'Dasar-dasar SQL'),
('B002', 'Advanced SQL', 'Jane Smith', '4nd', 'Programming', '2021', '400', '24', 'Edukasi', 'Biografi', 'Kertas', '668b2c10737473.43046991.pdf', '668b2c10738d71.14560084.pdf', 'Teknik lanjutan SQL'),
('B003', 'Python for Beginners', 'Alice Johnson', '1st', 'Programming', '2019', '250', '24', 'Edukasi', 'Buku', 'Kertas', 'python_beginners.pdf', 'Appendix', 'Pemrograman Python dasar'),
('B004', 'Data Science Handbook', 'Bob Lee', '3rd', 'Data Science', '2018', '500', '24', 'Edukasi', 'Buku', 'Kertas', 'data_science.pdf', 'CD-ROM', 'Panduan lengkap data science'),
('B005', 'Machine Learning Basics', 'Carol King', '1st', 'Data Science', '2022', '350', '24', 'Edukasi', 'Buku', 'Kertas', 'ml_basics.pdf', 'Online Resources', 'Dasar-dasar machine learning'),
('B006', 'Artificial Intelligence', 'David Brown', '2nd', 'Data Science', '2021', '450', '24', 'Edukasi', 'Buku', 'Kertas', 'ai_book.pdf', 'Figures', 'Konsep dasar AI'),
('B007', 'Deep Learning Guide', 'Emma Wilson', '1st', 'Data Science', '2020', '300', '24', 'Edukasi', 'Buku', 'Kertas', 'deep_learning.pdf', 'Examples', 'Panduan deep learning'),
('B008', 'Big Data Analytics', 'Frank Miller', '1st', 'Data Science', '2019', '400', '24', 'Edukasi', 'Buku', 'Kertas', 'big_data.pdf', 'Charts', 'Analisis big data'),
('B009', 'Cloud Computing', 'Grace Green', '2nd', 'Technology', '2018', '350', '24', 'Edukasi', 'Buku', 'Kertas', 'cloud_computing.pdf', 'Tables', 'Konsep dasar cloud computing'),
('B010', 'Cybersecurity Essentials', 'Henry White', '1st', 'Technology', '2022', '300', '24', 'Edukasi', 'Buku', 'Kertas', 'cybersecurity.pdf', 'Graphs', 'Esensial cybersecurity');

-- --------------------------------------------------------

--
-- Table structure for table `hist_milik`
--

CREATE TABLE `hist_milik` (
  `ID_MILIK` char(20) NOT NULL,
  `ID_BUKU` char(20) NOT NULL,
  `NOMOR_INDUK` char(20) NOT NULL,
  `TANGGAL_PENGAJUAN` date NOT NULL,
  `STATUS` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hist_milik`
--

INSERT INTO `hist_milik` (`ID_MILIK`, `ID_BUKU`, `NOMOR_INDUK`, `TANGGAL_PENGAJUAN`, `STATUS`) VALUES
('MLK001', 'B001', '20230001', '2024-06-19', 'DIAJUKAN'),
('MLK010', 'B010', '20230010', '2024-05-14', 'DITOLAK');

-- --------------------------------------------------------

--
-- Table structure for table `hist_review`
--

CREATE TABLE `hist_review` (
  `ID_REVIEW` char(20) NOT NULL,
  `NIP` char(20) NOT NULL,
  `ID_BUKU` char(20) NOT NULL,
  `STATUS` char(20) NOT NULL,
  `HASIL_REVIEW` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hist_review`
--

INSERT INTO `hist_review` (`ID_REVIEW`, `NIP`, `ID_BUKU`, `STATUS`, `HASIL_REVIEW`) VALUES
('R020', '20230002', 'B006', 'Dalam Progress', ''),
('R021', '20230002', 'B009', 'Dalam Progress', ''),
('R022', '20230002', 'B006', 'Dalam Progress', ''),
('R023', '20230002', 'B006', 'Dalam Progress', ''),
('R024', '20230002', 'B008', 'Dalam Progress', ''),
('R020', '20230010', 'B006', 'Dalam Progress', ''),
('R021', '20230002', 'B006', 'Dalam Progress', ''),
('R001', '20230002', 'B001', 'Dalam Progress', ''),
('R002', '20230004', 'B002', 'Mencari Editor', 'MASIH DALAM ANTRIAN REVIEW'),
('R003', '20230006', 'B003', 'Mencari Editor', 'MASIH DALAM ANTRIAN REVIEW'),
('R004', '20230008', 'B004', 'Mencari Editor', 'MASIH DALAM ANTRIAN REVIEW'),
('R005', '20230010', 'B005', 'Mencari Editor', 'MASIH DALAM ANTRIAN REVIEW'),
('R006', '20230002', 'B006', 'Dalam Progress', 'MASIH DIANALISA'),
('R007', '20230004', 'B007', 'Mencari Editor', 'MASIH DIANALISA'),
('R008', '20230004', 'B008', 'Mencari Editor', 'MASIH DIANALISA'),
('R009', '20230008', 'B009', 'Mencari Editor', 'BUKU TIDAK SESUAI KETENTUAN'),
('R010', '20230008', 'B002', 'Mencari Editor', ''),
('R011', '20230006', 'B002', 'Mencari Editor', ''),
('R012', '20230006', 'B003', 'Mencari Editor', ''),
('R013', '20230006', 'B004', 'Mencari Editor', ''),
('R014', '20230002', 'B003', 'Ditolak', ''),
('R015', '20230002', 'B002', 'Ditolak', ''),
('R016', '20230002', 'B005', 'Dalam Progress', 'Mantap'),
('R017', '20230010', 'B002', 'Mencari Editor', ''),
('R018', '20230004', 'B009', 'Mencari Editor', ''),
('R019', '20230002', 'B002', 'Dalam Progress', ''),
('R020', '20230002', 'B006', 'Dalam Progress', ''),
('R021', '20230002', 'B008', 'Dalam Progress', ''),
('R022', '20230002', 'B009', 'Dalam Progress', ''),
('R023', '20230002', 'B002', 'Dalam Progress', ''),
('R002', '20230002', 'B002', 'Dalam Progress', '');

-- --------------------------------------------------------

--
-- Table structure for table `milik`
--

CREATE TABLE `milik` (
  `ID_MILIK` char(20) NOT NULL,
  `ID_BUKU` char(20) NOT NULL,
  `NOMOR_INDUK` char(20) NOT NULL,
  `TANGGAL_PENGAJUAN` date NOT NULL,
  `STATUS` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `milik`
--

INSERT INTO `milik` (`ID_MILIK`, `ID_BUKU`, `NOMOR_INDUK`, `TANGGAL_PENGAJUAN`, `STATUS`) VALUES
('MLK002', 'B002', '20230002', '2024-06-11', 'Sedang Direview'),
('MLK003', 'B003', '20230003', '2024-06-12', 'Selesai'),
('MLK004', 'B004', '20230004', '2024-06-20', 'Selesai'),
('MLK005', 'B005', '20230005', '2024-06-17', 'Sedang Direview'),
('MLK006', 'B006', '20230006', '2024-06-17', 'Selesai'),
('MLK007', 'B007', '20230007', '2024-06-05', 'Sedang Direview'),
('MLK008', 'B008', '20230008', '2024-06-05', 'Mencari Editor'),
('MLK009', 'B009', '20230009', '2024-05-21', 'Mencari Editor');

--
-- Triggers `milik`
--
DELIMITER $$
CREATE TRIGGER `DATA_LAMA_MILIK` BEFORE DELETE ON `milik` FOR EACH ROW INSERT INTO hist_milik VALUES (
    OLD.ID_MILIK,
    OLD.ID_BUKU,
    OLD.NOMOR_INDUK,
    OLD.TANGGAL_PENGAJUAN,
    OLD.STATUS)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_perpustakaan`
--

CREATE TABLE `pegawai_perpustakaan` (
  `NIP` int(20) NOT NULL,
  `NAMA` varchar(40) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai_perpustakaan`
--

INSERT INTO `pegawai_perpustakaan` (`NIP`, `NAMA`, `EMAIL`, `PASSWORD`) VALUES
(101, 'John Doe', 'johndoe@example.com', 'password123'),
(102, 'Jane Smith', 'janesmith@example.com', 'securepass'),
(103, 'Alice Johnson', 'alicejohnson@example.com', 'alicepass'),
(104, 'Bob Lee', 'boblee@example.com', 'bobspassword'),
(105, 'Carol King', 'carolking@example.com', 'carolpass'),
(106, 'David Brown', 'davidbrown@example.com', 'david1234'),
(107, 'Emma Wilson', 'emmawilson@example.com', 'emmapass'),
(108, 'Frank Miller', 'frankmiller@example.com', 'frankpass'),
(109, 'Grace Green', 'gracegreen@example.com', 'grace123'),
(110, 'Henry White', 'henrywhite@example.com', 'henrypass');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `NAMA` varchar(40) NOT NULL,
  `NOMOR_INDUK` char(20) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `ROLE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`NAMA`, `NOMOR_INDUK`, `PASSWORD`, `EMAIL`, `ROLE`) VALUES
('John Doe', '20230001', 'password123', 'johndoe@example.com', 'Penulis'),
('Jane Smith', '20230002', 'securepass', 'janesmith@example.com', 'Editor'),
('Alice Johnson', '20230003', 'alicepass', 'alicejohnson@example.com', 'Penulis'),
('Bob Lee', '20230004', 'bobspassword', 'boblee@example.com', 'Editor'),
('Carol King', '20230005', 'carolpass', 'carolking@example.com', 'Penulis'),
('David Brown', '20230006', 'david1234', 'davidbrown@example.com', 'Editor'),
('Emma Wilson', '20230007', 'emmapass', 'emmawilson@example.com', 'Penulis'),
('Frank Miller', '20230008', 'frankpass', 'frankmiller@example.com', 'Editor'),
('Grace Green', '20230009', 'grace123', 'gracegreen@example.com', 'Penulis'),
('Henry White', '20230010', 'henrypass', 'henrywhite@example.com', 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID_REVIEW` char(20) NOT NULL,
  `NIP` char(20) NOT NULL,
  `ID_BUKU` char(20) NOT NULL,
  `STATUS` char(20) NOT NULL,
  `DEADLINE` date NOT NULL,
  `FEEDBACK` varchar(300) NOT NULL,
  `HASIL_REVIEW` varchar(100) NOT NULL,
  `KOMISI` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID_REVIEW`, `NIP`, `ID_BUKU`, `STATUS`, `DEADLINE`, `FEEDBACK`, `HASIL_REVIEW`, `KOMISI`) VALUES
('R001', '20230002', 'B003', 'Sudah Oke', '2024-07-21', 'gas pol', 'Mantap', 0),
('R002', '20230002', 'B002', 'Dalam Progress', '2024-07-31', '', '', 10000),
('R003', '20230002', 'B004', 'Sudah Oke', '2024-07-21', 'gas pol', '668a6099037f39.68675140.pdf', 0),
('R004', '20230002', 'B005', 'Revisi', '2024-07-21', 'gas pol', '668b2cf09d27d4.79171919.pdf', 0),
('R005', '20230002', 'B006', 'Sudah Oke', '2024-07-18', 'gg', '668a69c1ca2ae2.16938936.pdf', 10000),
('R006', '20230002', 'B007', 'Dalam Progress', '2024-07-22', '', '', 0);

--
-- Triggers `review`
--
DELIMITER $$
CREATE TRIGGER `DATA_LAMA_REVIEW` BEFORE DELETE ON `review` FOR EACH ROW INSERT INTO hist_review VALUES (
    OLD.ID_REVIEW,
    OLD.NIP,
    OLD.ID_BUKU,
    OLD.STATUS,
    OLD.HASIL_REVIEW)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_miliki_status` AFTER INSERT ON `review` FOR EACH ROW BEGIN
    IF NEW.STATUS = 'Dalam Progress' THEN
        UPDATE milik
        SET STATUS = 'Sedang Direview'
        WHERE ID_BUKU = NEW.ID_BUKU
        AND TANGGAL_PENGAJUAN = (
            SELECT MAX(TANGGAL_PENGAJUAN)
            FROM milik
            WHERE ID_BUKU = NEW.ID_BUKU
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_miliki_status_selesai` AFTER UPDATE ON `review` FOR EACH ROW BEGIN
    IF NEW.STATUS = 'Sudah Oke' THEN
        UPDATE milik
        SET STATUS = 'Selesai'
        WHERE ID_BUKU = NEW.ID_BUKU
        AND TANGGAL_PENGAJUAN = (
            SELECT MAX(TANGGAL_PENGAJUAN)
            FROM milik
            WHERE ID_BUKU = NEW.ID_BUKU
        );
        ELSEIF NEW.STATUS = 'Dalam Progress' THEN
        UPDATE milik
        SET STATUS = 'Sedang Direview'
        WHERE ID_BUKU = NEW.ID_BUKU
        AND TANGGAL_PENGAJUAN = (
            SELECT MAX(TANGGAL_PENGAJUAN)
            FROM milik
            WHERE ID_BUKU = NEW.ID_BUKU
        );
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`);

--
-- Indexes for table `hist_milik`
--
ALTER TABLE `hist_milik`
  ADD PRIMARY KEY (`ID_MILIK`);

--
-- Indexes for table `milik`
--
ALTER TABLE `milik`
  ADD PRIMARY KEY (`ID_MILIK`),
  ADD KEY `BUKU_MILIK` (`ID_BUKU`),
  ADD KEY `PENULIS_MILIK` (`NOMOR_INDUK`);

--
-- Indexes for table `pegawai_perpustakaan`
--
ALTER TABLE `pegawai_perpustakaan`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`NOMOR_INDUK`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID_REVIEW`),
  ADD KEY `FK_BUKU` (`ID_BUKU`),
  ADD KEY `FK_EDITOR` (`NIP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `milik`
--
ALTER TABLE `milik`
  ADD CONSTRAINT `BUKU_MILIK` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`),
  ADD CONSTRAINT `PENULIS_MILIK` FOREIGN KEY (`NOMOR_INDUK`) REFERENCES `penulis` (`NOMOR_INDUK`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_BUKU` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`),
  ADD CONSTRAINT `FK_EDITOR` FOREIGN KEY (`NIP`) REFERENCES `penulis` (`NOMOR_INDUK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
