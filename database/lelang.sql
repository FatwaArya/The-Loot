-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 07:16 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_daftar` varchar(25) NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `tgl_daftar`, `harga_awal`, `deskripsi`, `img`) VALUES
(2, 'Matin frileux au Luxembourg', '01/20/2022', 400000, 'Alice Bailly\n1872 - 1938\nMatin frileux au Luxembourg\nTempera on paper\nSigned lower right\n70 x 58 cm (unframed); 89 x 77.3 cm (framed)\nExecuted circa 1921\nGalerie Catherine Niederhauser, Lausanne | Acquired from the above by the present owner in 2009', 'martin.jpg'),
(8, 'Les fardeaux', '01/22/2022', 350000, 'Ernest Biéler\r\n\r\n1863 - 1948\r\n\r\nLes fardeaux, 1909\r\n\r\n\r\n\r\nWatercolour on paper\r\n\r\nSigned and dated lower left\r\n\r\n43 x 79 cm (unframed); 49 x 87.5 cm (framed)\r\n\r\n\r\n\r\nThis work will be included in the forthcoming Catalogue Raisonné of the artist currently being prepared by Ethel Mathier. ', 'Les ferdeaux.jfif'),
(9, 'Bust of Neptune', '01/27/2022', 400000, 'test description', 'ma-84490.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `harga_akhir` int(11) NOT NULL,
  `status` enum('available','sold out') NOT NULL,
  `id_masyarakat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id`, `id_barang`, `tgl_lelang`, `harga_akhir`, `status`, `id_masyarakat`) VALUES
(123, 8, '2022-01-28 03:51:00', 480000, 'sold out', 13),
(124, 2, '2022-01-26 13:11:39', 420000, 'available', 1),
(125, 9, '2022-01-29 03:56:11', 500000, 'sold out', 13);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_lelang` int(225) NOT NULL,
  `id_barang` int(225) NOT NULL,
  `id_masyarakat` int(255) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `tlp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nama`, `email`, `username`, `password`, `tlp`) VALUES
(1, 'user', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(12, 'zeus', 'zeus@gmail.com', 'zeus', '098ef03a15eaf14dfe66a596cf0eb510', 0),
(13, 'Fatwa Arya', 'fatwaaryasatyaakbar@gmail.com', 'fatwa', '78456ce53e00434058e8df4558e1cb71', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `lelang_ibfk_3` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `log_ibfk_3` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
