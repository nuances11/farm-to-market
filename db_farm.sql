-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 05:03 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `prod_subcategory` varchar(256) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_sku` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `prod_minquantity` int(11) NOT NULL,
  `prod_status` int(11) NOT NULL,
  `timestamp_create` varchar(255) NOT NULL,
  `timestamp_update` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `timestamp_created` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trans_per_product`
--

CREATE TABLE `tbl_trans_per_product` (
  `id` int(11) NOT NULL,
  `trans_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_sku` varchar(255) NOT NULL,
  `prod_total_qty` int(11) NOT NULL,
  `prod_unit_price` int(11) NOT NULL,
  `prod_total_price` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `add_street` varchar(255) NOT NULL,
  `add_barangay` varchar(255) NOT NULL,
  `add_city` varchar(255) NOT NULL,
  `add_province` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `md5_hash` varchar(255) NOT NULL,
  `timestamp_created` varchar(255) NOT NULL,
  `timestamp_update` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trans_per_product`
--
ALTER TABLE `tbl_trans_per_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_trans_per_product`
--
ALTER TABLE `tbl_trans_per_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
