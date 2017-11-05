-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 03:12 PM
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

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `prod_name`, `prod_category`, `prod_subcategory`, `prod_description`, `prod_sku`, `prod_price`, `prod_quantity`, `prod_minquantity`, `prod_status`, `timestamp_create`, `timestamp_update`, `prod_image`, `farmer_id`) VALUES
(1, 'Sample Product', 'Category 1', 'Sub-category 1', 'Sample Product Description', 'SKU1', '100', 100, 10, 0, '2017-11-05 12:54:43pm', '2017-11-05 12:54:43pm', '', 3),
(2, 'dasdasdsa', 'Category 1', 'Sub-category 1', 'dasdasd', 'dasdasd', '312', 312, 10, 1, '2017-11-05 12:57:35pm', '2017-11-05 12:57:35pm', '', 3),
(3, 'wqeqwe', 'Category 1', 'Sub-category 1', 'eqweqwewq', 'eqweqw', '2132', 3123, 12312, 1, '2017-11-05 12:58:47pm', '2017-11-05 12:58:47pm', '', 3),
(4, 'eqweqw', 'Category 1', 'Sub-category 1', 'eqweqweqw', 'eddasdas', '3123', 123123, 13, 1, '2017-11-05 01:00:20pm', '2017-11-05 01:00:20pm', '', 3),
(5, 'weqweqwe', 'Category 1', 'Sub-category 1', 'qeqeqweqw', 'wqeqweqw', '12312', 123123, 112, 1, '2017-11-05 01:00:45pm', '2017-11-05 01:00:45pm', '', 3),
(6, 'qweqw', 'Category 1', 'Sub-category 1', 'eqweqwewqe', 'eqweqw', '3213123', 12312312, 112, 1, '2017-11-05 01:01:33pm', '2017-11-05 01:01:33pm', '', 3);

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
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `user_type`, `first_name`, `middle_name`, `last_name`, `birthday`, `gender`, `phone`, `picture`, `add_street`, `add_barangay`, `add_city`, `add_province`, `session_id`, `md5_hash`, `timestamp_created`, `timestamp_update`, `active`) VALUES
(1, 'sample', '123', 'sample@sample.com', 'Farmer', 'asdasd', 'dasda', 'dasdasd', '1-18-1983', 'Male', '123123', '', 'ddasd', 'asdasd', 'asdas', 'sdasd', '', '1f55097bc2e7ca2811811a8145cca3ac', '2017-11-04 02:33:49pm', '2017-11-04 02:33:49pm', 1),
(2, 'nuances11', '202cb962ac59075b964b07152d234b70', 'sample@sample.com', 'Owner', '1asdas', 'dasda', 'dasdasd', '11-18-1982', 'Male', '1231', '', 'dsdas', 'daqsda', 'dasd', 'dasdasd', '', 'e28a244c2635d79744990bfac2ac9a42', '2017-11-04 02:36:04pm', '2017-11-04 02:36:04pm', 1),
(3, 'farmer', 'c4ca4238a0b923820dcc509a6f75849b', 'farmer@farmer.com', 'Farmer', 'First', 'Middle', 'Last', '1-1-1998', 'Male', '2132113', '', 'asdad', 'dasda', 'dasdas', 'dasdasd', '', '0122bb9ab5a34cb9e6ec0aac4af0cb0e', '2017-11-05 09:27:24am', '2017-11-05 09:27:24am', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
