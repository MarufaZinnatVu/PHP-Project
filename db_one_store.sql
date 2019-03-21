-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 03:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_one_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Tablet'),
(2, 'Laptop'),
(3, 'Desktop'),
(4, 'Audio');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `msg` varchar(1200) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_msg`
--

INSERT INTO `tbl_msg` (`id`, `name`, `email`, `subject`, `msg`, `msg_date`) VALUES
(5, 'marufa', 'marufa@gmail.com', 'service', 'hello', '2019-01-06 07:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1',
  `amount` varchar(255) NOT NULL,
  `bkash_number` varchar(255) DEFAULT NULL,
  `bkash_transection_id` varchar(255) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `token_no` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `product_ids`, `order_status`, `amount`, `bkash_number`, `bkash_transection_id`, `shipping_address`, `token_no`, `date`) VALUES
(1, 16, '2,1', 3, '90000', '09888883776', '77tywyehdb', 'rajshahi', '646', '2018-12-19 12:13:38'),
(2, 17, '15,8,11', 3, '84390', '01554332233', '1111111111', 'dhaka', '349', '2019-01-06 20:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `product_image` text NOT NULL,
  `product_featured` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_price`, `product_cat_id`, `product_details`, `product_image`, `product_featured`) VALUES
(1, 'Dell Inspiron 3277', 50000, 3, 'Model - Dell Inspiron 3277\r\nProcessor - 7th Gen Intel Core i5 7200U\r\nProcessor Clock Speed - 2.50GHz\r\nCPU Cache - 3MB\r\nRAM - 8GB\r\nHDD - 1TB HDD', 'c00b005e6b0dbbb4da8589f940be34be.jpg', 0),
(3, 'Acer Aspire', 23600, 2, 'Processor - Intel Celeron N3060\r\nProcessor Clock Speed - 1.60-2.48GHz\r\nDisplay Size - 15.6\"\r\nRAM - 4GB\r\nRAM Type - DDR3L\r\nStorage - 500GB HDD', 'c9ef64525f36814f6584af5bc3941845.jpg', 0),
(4, 'HP 15-BW535AU AMD DUAL CORE E2-9000E ', 25000, 2, 'Processor - AMD Dual Core E2-9000E\r\nProcessor Clock Speed - 1.5-2.0GHz\r\nDisplay Size - 15.6\"\r\nRAM - 4GB\r\nRAM Type - DDR4 1866MHz\r\nHDD - 500GB HDD', 'a718a09de2cc55b53d66bd5e3b6f7da0.jpg', 0),
(5, 'Asus X407MA Intel CDC N4000', 25500, 2, 'Processor - Intel CDC N4000\r\nProcessor Clock Speed - 1.1-2.6GHz\r\nDisplay Size - 14\"\r\nRAM - 4GB\r\nRAM Type - DDR4 2400MHz', 'a4aa5911865ec12da835e7634ab64778.jpg', 0),
(6, 'Dell Inspiron 15-3573', 27000, 2, 'Processor - Intel CDC N4000\r\nProcessor Clock Speed - 1.1-2.6GHz\r\nDisplay Size - 15.6\"\r\nRAM - 4GB\r\nRAM Type - DDR4\r\n', '3598fc7a5e995d0999964eb8c5f546c4.jpg', 0),
(7, 'Lenovo IP110 Intel CDC N3060 ', 24000, 2, '\r\nProcessor - Intel CDC N3060\r\nProcessor Clock Speed - 1.60-2.48GHz\r\nDisplay Size - 14\"\r\nRAM - 4GB\r\nRAM Type - DDR3\r\nStorage - 1TB HDD', '82dbb65921d8ff673f505ba6a3f83819.jpg', 0),
(8, 'Acer Aspire E5-576 37XT', 26700, 2, 'Generation - 7th Gen\r\nProcessor - Intel Core i3 7130U\r\nProcessor Clock Speed - 2.7GHz\r\nDisplay Size - 15.6\"\r\nRAM - 4GB\r\nRAM Type - DDR3 1600MHz', '3de533fc3251c9981d83e000f5267811.jpg', 0),
(9, 'HP ProOne 400 G4', 51000, 3, 'Model - HP ProOne 400 G4\r\nProcessor - 8th Gen Intel Core i3 8100T\r\nProcessor Clock Speed - 3.1GHz\r\nCPU Cache - 6MB\r\nRAM - 8GB', '6f44b15819dacfad05401cc7702db5d2.jpg', 0),
(10, 'Apple iMac 5K Retina 27 Inch', 50000, 3, 'Model - Apple iMac 5K Retina 27 Inch (2017)\r\nProcessor - Quad Core Intel Core i5\r\nProcessor Clock Speed - 3.4-3.8GHz\r\nCPU Cache - 6MB\r\nRAM - 8GB (2 x 4GB)\r\nRAM Slot - 4\r\nHDD - 1TB Fusion Drive', '75e2bdcad3f83ecb7397e1829cb43776.jpg', 0),
(11, 'HP ProOne', 48000, 3, 'Model - HP Pro One 400 G3\r\nProcessor - 7th Gen Intel Core i5 7500T\r\nProcessor Clock Speed - 2.7-3.3GHz\r\nCPU Cache - 6MB\r\nRAM - 8GB\r\nMax RAM Support - 32GB\r\nRAM Slot - 2', '8c8f3c0b8c5fb01d818f426007fb0e7c.jpg', 0),
(12, 'Dell V320 7th Gen Intel PQC J4205', 45000, 3, 'Model - dell V320\r\nProcessor - 7th Gen Intel PQC J4205\r\nProcessor Clock Speed - 1.5-2.6GHz\r\nCPU Cache - 2MB\r\nRAM - 4GB\r\nMax RAM Support - 8GB\r\nHDD - 1TB HDD', '868ff712db3b08dfe596b0ade45e4c31.jpg', 0),
(13, 'HP 280 G3 7th Gen Intel Core i3 7100 ', 35000, 3, 'Model - HP 280 G3\r\nProcessor - 7th Gen Intel Core i3 7100\r\nProcessor Clock Speed - 3.9GHz\r\nCPU Cache - 3MB\r\nRAM - 4GB\r\nMax RAM Support - 32GB\r\nRAM Slot - 2', '15e76c3e5a43c248d0e4e54d147bd273.jpg', 0),
(14, 'Amazon Fire 7 ', 9000, 1, 'Model - Amazon Fire 7\r\nProcessor Type - Quad Core\r\nRAM - 1GB\r\nProcessor Speed - 1.3GHz\r\nInternal Memory - 8GB\r\nDisplay Type - IPS LCD capacitive touchscreen\r\nDisplay Size - 7\"', '990435cb29a76c5a322d1cd77ecbf293.jpg', 0),
(15, 'HUAWEI MediaPad T3 7', 9690, 1, 'Model - HUAWEI MediaPad T3 7\r\nProcessor Type - MTK MT8127 Quad-core A7 Processor\r\nRAM - 1GB\r\nProcessor Speed - 1.3GHz\r\nInternal Memory - 8GB\r\nDisplay Type - IPS Display\r\nDisplay Size - 7\"\r\nScreen Resolution - 1024 x 600', 'f4fcb4614504bb29af49ee602ae2a243.jpg', 0),
(16, 'Samsung Galaxy Tab-3 V', 12500, 1, 'Model - Samsung Galaxy Tab-3 V (SM-T116NU)\r\nProcessor Type - Quad Core\r\nRAM - 1GB\r\nProcessor Speed - 1.30GHz\r\nInternal Memory - 8GB\r\nDisplay Type - TFT Capacitive Touchscreen Display', '5c9ccfe0c00053825056030e508771fd.jpg', 0),
(17, 'Amazon Kindle Fire HD 8', 12000, 1, 'Model - Amazon Kindle Fire HD 8\r\nProcessor Type - Quad Core\r\nRAM - 1.5GB\r\nProcessor Speed - 1.3GHz\r\nInternal Memory - 16GB\r\nDisplay Type - HD Display\r\nDisplay Size - 8\"', '01cd8fa698e6e369116302b4dada50f0.jpg', 0),
(18, 'Havit H2105D Wired Headphone', 500, 4, 'Model - Havit H2105D\r\nConnectivity - Wired\r\nCable Length (ft) - 6.5ft', '18008b65adbec1f19124e1329dbac080.jpg', 0),
(19, 'Micropack MHP-500', 450, 4, 'Quick Overview\r\nModel - Micropack MHP-500\r\nConnectivity - Wired', 'aa913665f3f3abc83b91de97bf3b55db.jpg', 0),
(21, 'REMAX RM-512 Wired Black Music Earphone', 600, 4, 'Model - REMAX RM-512\r\nType - In-ear Wired Music Earphone\r\nConnectivity - Wired\r\nFeature - Beautiful and Touching Melody, \r\nTriple Frequency equalization,\r\n3D surround bass\r\nMicrophone - Yes', '80569ec1330742c8052b39ff3e3d90b8.jpg', 0),
(22, 'Microlab B16 2.0 Multimedia Black Speaker', 680, 4, 'Quick Overview\r\nModel - Microlab B16\r\nType - Multimedia Speaker\r\nChannel - 2:0\r\nRMS/Channel (Watt) - 2.5Watt x 2', 'ad6c1f19002c373317e6f568e08d29d5.jpg', 0),
(23, 'A4 Tech HS-30 Head Phone', 600, 4, 'Quick Overview\r\nA4 Tech HS-30 Head Phone', 'e6e2f3e815babb6be39a119961621906.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `email`, `username`, `password`, `role`) VALUES
(1, 'Mr. User', 'user@gmail.com', 'user', '12345', 2),
(2, 'Mr. Admin', 'admin@gmail.com', 'admin', '12345', 1),
(16, 'marufa', 'marufa@gmail.com', 'zinnat', '12345', 2),
(17, 'israt zahan', 'zahan@gmail.com', 'zahan', 'zahan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
