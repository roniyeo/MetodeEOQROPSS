-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2022 at 09:09 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `createdAt`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', '2022-11-01 22:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `stokbarang`
--

CREATE TABLE `stokbarang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `ongkir` varchar(255) NOT NULL,
  `demand` varchar(255) NOT NULL,
  `qty_order` varchar(255) NOT NULL,
  `holding_cost` varchar(255) NOT NULL DEFAULT '1',
  `harga_per_unit` varchar(255) NOT NULL,
  `ordering_cost` varchar(255) NOT NULL,
  `lead_time` varchar(255) NOT NULL,
  `dmax` varchar(255) NOT NULL,
  `dav` varchar(255) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stokbarang`
--

INSERT INTO `stokbarang` (`id`, `kode_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `quantity`, `ongkir`, `demand`, `qty_order`, `holding_cost`, `harga_per_unit`, `ordering_cost`, `lead_time`, `dmax`, `dav`, `kode_supplier`, `createdAt`) VALUES
(1, 'BRG001', 'Tester One', '100000', '120000', NULL, '12500', '10000', '10', '1', '1251', '2000', '15', '12000', '12500', 'SUP001', '2022-11-02 10:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `created_at`) VALUES
(1, 'SUP001', 'Tester One', '2022-11-01 23:15:25'),
(2, 'SUP002', 'Tester Two', '2022-11-02 09:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stokbarang`
--
ALTER TABLE `stokbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stokbarang`
--
ALTER TABLE `stokbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
