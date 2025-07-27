-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 12:01 PM
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
-- Database: `sinhvien_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(15) NOT NULL,
  `TenSV` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GioiTinh` bit(1) NOT NULL,
  `NgaySinh` date NOT NULL,
  `QueQuan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaLop` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `TenSV`, `GioiTinh`, `NgaySinh`, `QueQuan`, `MaLop`) VALUES
('SV001', 'Nguyễn Thành Phú ', b'1', '2000-01-01', 'Đồng Nai', 'CNTT'),
('SV002', 'Nguyễn Minh Tú', b'1', '2000-02-01', 'Hồ Chí Minh', 'OTO'),
('SV003', 'Phan Lê Minh Thư', b'0', '2000-03-01', 'Cần Thơ', 'NNGA'),
('SV004', 'Nguyễn Thanh Sơn', b'1', '2000-04-01', 'Vĩnh Long', 'KETOA'),
('SV005', 'Võ Hoàng Tuấn', b'1', '2000-05-11', 'An Giang', 'MKT'),
('SV006', 'Hồ Thị Dàng', b'0', '2000-06-01', 'Dak Lak', 'TKDH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
