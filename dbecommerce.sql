-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productDescription` varchar(300) NOT NULL,
  `productImage` varchar(300) NOT NULL,
  `productPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productDescription`, `productImage`, `productPrice`) VALUES
(1, 'NMD_V3', 'New Arrival Shoes', 'https://assets.adidas.com/images/w_766,h_766,f_auto,q_auto,fl_lossy,c_fill,g_auto/a246dea70d46428493bfaf4800067f1a_9366/nmd_v3-shoes.jpg', 5950),
(2, 'DAZY Dress', 'Puff Sleeve Zip Back', 'https://img.ltwebstatic.com/images3_pi/2022/12/12/167083594053b1ca6ca4e31656c44a2baa61694040_thumbnail_600x.webp', 596),
(3, 'Nike SB', 'Woven Skate Long-Sleeve Button Down', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/737228a2-0013-4772-a63f-1b8c09291253/sb-woven-skate-long-sleeve-button-down-VV6rM1.png', 3895),
(4, 'LeBron', 'Hip Pack', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/faa0bf81-191e-4546-9071-336d5ac00278/lebron-hip-pack-s6HLj8.png', 2295),
(5, 'Utility Backpack', 'Training Backpack 27L', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-d236a750-a36c-408b-8f35-c36a4d53738b/utility-speed-training-backpack-mTh0wd.png', 3295),
(6, 'Dri-FIT AeroBill Legacy91', 'Camo Training Cap', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/2c59851e-8190-4603-8961-271705da1cbd/dri-fit-aerobill-legacy91-camo-training-cap-rc1zZQ.png', 1295),
(7, 'Forum Low Shoes', 'Men Originals', 'https://assets.adidas.com/images/w_766,h_766,f_auto,q_auto,fl_lossy,c_fill,g_auto/ca6eb69651d94083889cacb60018d8bb_9366/forum-low-shoes.jpg', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`userid`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'jreid22', '2cf24dba5fb0a30e26e83b2ac5b9e29e1b161e5c1fa7425e73043362938b9824', 'James', 'Reid'),
(3, 'nlustre222', 'cbab901b1f3d295966373b4f1c41edb46768f94ac38d9a01aeef91aa10a26846', 'Nadine', 'Lustre'),
(4, 'lbj222', '602fa094806c85ff520f6b29f427644034de4156a8a3d224b9b33bb6b4232ca9', 'Lebronn', 'James');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
