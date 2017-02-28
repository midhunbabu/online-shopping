-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2017 at 02:21 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `pk_category_id` int(11) NOT NULL,
  `vchr_category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`pk_category_id`, `vchr_category_name`) VALUES
(1, 'MEN'),
(2, 'WOMEN'),
(3, 'KIDS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `pk_int_customer_id` int(11) NOT NULL,
  `vchr_name` varchar(30) NOT NULL,
  `vchr_gender` varchar(10) NOT NULL,
  `vchr_email` varchar(50) NOT NULL,
  `vchr_mobile_no` varchar(10) NOT NULL,
  `text_address` text NOT NULL,
  `vchr_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `pk_int_order_id` int(11) NOT NULL,
  `fk_int_customer_id` int(11) NOT NULL,
  `date_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `pk_int_order_detail_id` int(11) NOT NULL,
  `fk_int_order_id` int(11) NOT NULL,
  `fk_int_product_id` int(11) NOT NULL,
  `int_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail_status`
--

CREATE TABLE `tbl_order_detail_status` (
  `pk_int_order_status_id` int(11) NOT NULL,
  `fk_int_order_id` int(11) NOT NULL,
  `fk_int_order_detail_id` int(11) NOT NULL,
  `fk_int_status_id` int(11) NOT NULL,
  `date_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pk_product_id` int(11) NOT NULL,
  `fk_category_int_id` int(11) NOT NULL,
  `fk_int_sub_category_id` int(11) NOT NULL,
  `vchr_product_name` varchar(50) NOT NULL,
  `int_price` int(11) NOT NULL,
  `blob_product_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pk_product_id`, `fk_category_int_id`, `fk_int_sub_category_id`, `vchr_product_name`, `int_price`, `blob_product_image`) VALUES
(1, 1, 1, 'P1', 999, ''),
(2, 1, 1, 'P2', 345, ''),
(3, 1, 2, 'P3', 3445, ''),
(4, 1, 2, 'P4', 566, ''),
(5, 2, 3, 'P5', 999, ''),
(6, 2, 3, 'P6', 366, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_size`
--

CREATE TABLE `tbl_product_size` (
  `pk_size_id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL,
  `vchr_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `pk_int_status_id` int(11) NOT NULL,
  `vchr_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `pk_sub_category_id` int(11) NOT NULL,
  `fk_int_category_id` int(11) NOT NULL,
  `vchr_sub_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`pk_sub_category_id`, `fk_int_category_id`, `vchr_sub_category_name`) VALUES
(1, 1, 'SHIRTS'),
(2, 1, 'JEANS'),
(3, 2, 'SAREE'),
(4, 2, 'JEANS'),
(5, 3, 'SHIRTS'),
(6, 3, 'JEANS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`pk_category_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`pk_int_customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`pk_int_order_id`),
  ADD KEY `fk_int_customer_id` (`fk_int_customer_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`pk_int_order_detail_id`),
  ADD KEY `fk_int_order_id` (`fk_int_order_id`),
  ADD KEY `fk_int_product_id` (`fk_int_product_id`);

--
-- Indexes for table `tbl_order_detail_status`
--
ALTER TABLE `tbl_order_detail_status`
  ADD PRIMARY KEY (`pk_int_order_status_id`),
  ADD UNIQUE KEY `fk_int_order_detail_id` (`fk_int_order_detail_id`),
  ADD UNIQUE KEY `fk_int_status_id` (`fk_int_status_id`),
  ADD KEY `fk_int_order_id` (`fk_int_order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pk_product_id`),
  ADD KEY `fk_category_id` (`fk_category_int_id`),
  ADD KEY `fk_int_sub_category_id` (`fk_int_sub_category_id`);

--
-- Indexes for table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  ADD PRIMARY KEY (`pk_size_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`pk_int_status_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`pk_sub_category_id`),
  ADD KEY `fk_int_category_id` (`fk_int_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order_detail_status`
--
ALTER TABLE `tbl_order_detail_status`
  MODIFY `pk_int_order_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  MODIFY `pk_size_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `pk_int_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`fk_int_customer_id`) REFERENCES `tbl_customers` (`pk_int_customer_id`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`fk_int_order_id`) REFERENCES `tbl_order` (`pk_int_order_id`),
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`fk_int_product_id`) REFERENCES `tbl_product` (`pk_product_id`);

--
-- Constraints for table `tbl_order_detail_status`
--
ALTER TABLE `tbl_order_detail_status`
  ADD CONSTRAINT `tbl_order_detail_status_ibfk_1` FOREIGN KEY (`fk_int_order_id`) REFERENCES `tbl_order` (`pk_int_order_id`),
  ADD CONSTRAINT `tbl_order_detail_status_ibfk_2` FOREIGN KEY (`fk_int_order_detail_id`) REFERENCES `tbl_order_detail` (`pk_int_order_detail_id`),
  ADD CONSTRAINT `tbl_order_detail_status_ibfk_3` FOREIGN KEY (`fk_int_status_id`) REFERENCES `tbl_status` (`pk_int_status_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`fk_category_int_id`) REFERENCES `tbl_category` (`pk_category_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`fk_int_sub_category_id`) REFERENCES `tbl_sub_category` (`pk_sub_category_id`);

--
-- Constraints for table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  ADD CONSTRAINT `tbl_product_size_ibfk_1` FOREIGN KEY (`pk_size_id`) REFERENCES `tbl_product` (`pk_product_id`);

--
-- Constraints for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD CONSTRAINT `tbl_sub_category_ibfk_1` FOREIGN KEY (`fk_int_category_id`) REFERENCES `tbl_category` (`pk_category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
