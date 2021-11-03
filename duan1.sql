-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 04:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_tours`
--

CREATE TABLE `bill_tours` (
  `id_bill_tours` int(11) NOT NULL COMMENT 'mã phiếu',
  `name_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên khách hàng',
  `id_customer` int(11) NOT NULL COMMENT 'mã khách hàng',
  `name_employee` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên nhân viên',
  `id_employee` int(11) NOT NULL COMMENT 'mã nhân viên',
  `price_bill_tours` int(20) NOT NULL COMMENT 'tổng tiền',
  `id_tours` int(11) NOT NULL COMMENT 'mã tours du lịch'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cate_post`
--

CREATE TABLE `cate_post` (
  `id_cate_post` int(11) NOT NULL COMMENT 'mã loại bài',
  `name_cate_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên loại bài'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL COMMENT 'mã người dùng',
  `name_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên người dùng',
  `cmt_customer` int(20) NOT NULL COMMENT 'số cmt người dùng',
  `phone_customer` int(10) NOT NULL COMMENT 'sdt người dùng',
  `email_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email người dùng',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mật khẩu người dùng',
  `classify_customer` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'phân quyền người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

CREATE TABLE `customer_service` (
  `id_customer` int(11) NOT NULL COMMENT 'mã khách hàng',
  `id_service` int(11) NOT NULL COMMENT 'mã dịch vụ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL COMMENT 'mã nhân viên',
  `name_employee` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên nhân viên',
  `address_employee` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ nhân viên',
  `email_employee` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email nhân viên',
  `sdt_employee` int(10) NOT NULL COMMENT 'sdt nhân viên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL COMMENT 'mã điạ danh',
  `name_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên điạ danh',
  `city_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tỉnh thành',
  ` description_location` varchar(2000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả điạ danh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL COMMENT 'mã bài viết',
  `image_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh bài viết',
  `name_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên bài viết',
  `description_post` varchar(2000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả bài viết',
  `id_cate_post` int(11) NOT NULL COMMENT 'mã loại bài viết'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL COMMENT 'mã dịch vụ',
  `name_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên dịch vụ',
  ` description_service` varchar(2000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả dịch vụ',
  `price_service` int(20) NOT NULL COMMENT 'giá dịch vụ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id_tours` int(11) NOT NULL COMMENT 'mã tours du lịch',
  `image_tours` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh tours du lịch',
  `name_tours` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên tours du lịch',
  ` description_tours` varchar(2000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả tours du lịch',
  `price_tours` int(11) NOT NULL COMMENT 'giá tours du lịch',
  `time_tours` date NOT NULL COMMENT 'thời gian di chuyển'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours_location`
--

CREATE TABLE `tours_location` (
  `id_tours` int(11) NOT NULL COMMENT 'mã tours du lịch',
  `id_location` int(11) NOT NULL COMMENT 'mã điạ danh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_tours`
--
ALTER TABLE `bill_tours`
  ADD PRIMARY KEY (`id_bill_tours`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_tours` (`id_tours`);

--
-- Indexes for table `cate_post`
--
ALTER TABLE `cate_post`
  ADD PRIMARY KEY (`id_cate_post`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_cate_post` (`id_cate_post`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id_tours`);

--
-- Indexes for table `tours_location`
--
ALTER TABLE `tours_location`
  ADD KEY `id_tours` (`id_tours`),
  ADD KEY `id_location` (`id_location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_tours`
--
ALTER TABLE `bill_tours`
  MODIFY `id_bill_tours` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phiếu';

--
-- AUTO_INCREMENT for table `cate_post`
--
ALTER TABLE `cate_post`
  MODIFY `id_cate_post` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại bài';

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã người dùng';

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã nhân viên';

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã điạ danh';

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã bài viết';

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã dịch vụ';

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id_tours` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã tours du lịch';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_tours`
--
ALTER TABLE `bill_tours`
  ADD CONSTRAINT `bill_tours_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `bill_tours_ibfk_2` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `bill_tours_ibfk_3` FOREIGN KEY (`id_tours`) REFERENCES `tours` (`id_tours`);

--
-- Constraints for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD CONSTRAINT `customer_service_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`),
  ADD CONSTRAINT `customer_service_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_cate_post`) REFERENCES `cate_post` (`id_cate_post`);

--
-- Constraints for table `tours_location`
--
ALTER TABLE `tours_location`
  ADD CONSTRAINT `tours_location_ibfk_1` FOREIGN KEY (`id_tours`) REFERENCES `tours` (`id_tours`),
  ADD CONSTRAINT `tours_location_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
