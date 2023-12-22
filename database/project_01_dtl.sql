-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 03:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_01_dtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(15) NOT NULL,
  `name_admin` varchar(120) NOT NULL,
  `password` char(120) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(120) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`, `trangthai`) VALUES
(1, 'Nam', 1),
(2, 'Nữ', 1),
(3, 'Bé trai', 1),
(4, 'Bé gái', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` char(10) NOT NULL,
  `ten_khachhang` varchar(120) NOT NULL,
  `tuoi_khachhang` int(3) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `sodienthoai` int(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `tendangnhap` char(50) NOT NULL,
  `matkhau` char(50) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` char(16) NOT NULL,
  `anh_sanpham` varchar(200) NOT NULL,
  `mau_sanpham` varchar(200) NOT NULL,
  `ten_sanpham` varchar(120) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` int(11) NOT NULL,
  `tinhtrang_sanpham` tinyint(1) NOT NULL,
  `noidung_sanpham` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `anh_sanpham`, `mau_sanpham`, `ten_sanpham`, `id_danhmuc`, `soluong`, `gia_sanpham`, `tinhtrang_sanpham`, `noidung_sanpham`) VALUES
('1', '1700878213_singledayProduct1.jpg', '1700878213_sp257.png', 'áo nữ', 2, 12, 500000, 1, ''),
('10', '1700882459_suggest2.jpg', '1700882459_service1.png', 'áo nữ', 2, 1, 500000, 1, ''),
('11', '1700882485_newproductNu.jpg', '1700882485_service1.png', 'áo nữ', 2, 1, 500000, 1, ''),
('12', '1700882518_suggest3.jpg', '1700882518_service3.png', 'áo nữ', 2, 1, 500000, 1, ''),
('13', '1700882557_singledayProduct3.jpg', '1700882557_service2.png', 'áo bé trai', 3, 1, 500000, 1, ''),
('14', '1700882599_newProductBeTrai.jpg', '1700882599_service1.png', 'áo bé trai', 3, 1, 500000, 1, ''),
('15', '1700882628_newProductBeTrai.jpg', '1700882628_service3.png', 'áo bé trai', 3, 1, 500000, 1, ''),
('16', '1700882653_newProductBeGai.jpg', '1700882653_service3.png', 'áo bé gái', 4, 1, 500000, 1, ''),
('18', '1700882712_newProductBeGai.jpg', '1700882712_service2.png', 'áo bé gái', 4, 1, 500000, 1, ''),
('20', '1700974979_newproductNam.jpg', '1700974979_service2.png', 'áo nam', 1, 1, 500000, 1, ''),
('21', '1701052199_singledayProduct1.jpg', '1701052389_sp257.png', 'áo bé gái', 4, 1, 500000, 1, 'vcvx'),
('3', '1700881572_newproductNam.jpg', '1700881572_service2.png', 'áo nam', 1, 1, 500000, 1, 'sdadadadada'),
('5', '1700881672_singledayProduct3.jpg', '1700881672_service3.png', 'áo bé Trai', 3, 2, 500000, 1, 'đâ'),
('6', '1700881716_newProductBeGai.jpg', '1700881716_service1.png', 'áo bé gái', 4, 2, 500000, 1, 'áda'),
('7', '1700882370_singledayProduct4.jpg', '1700882370_service1.png', 'áo nam', 1, 2, 500000, 1, ''),
('8', '1700882386_suggest1.jpg', '1700882386_service2.png', 'áo nam', 1, 2, 500000, 1, ''),
('9', '1700882431_singledayProduct2.jpg', '1700882431_service3.png', 'áo nam', 1, 2, 500000, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
