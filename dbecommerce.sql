-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 04:03 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `categoryDescription` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryDescription`) VALUES
(1, 'Shoes', 'Footwear for men and women'),
(2, 'Clothes', 'Clothes'),
(3, 'Accessories', 'Any accessories like shoes, bags, etc.'),
(4, 'Gadgets', 'Devices like mobile phones and laptops');

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
(5, 'Utility Backpack', 'Training Backpack 27L', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-d236a750-a36c-408b-8f35-c36a4d53738b/utility-speed-training-backpack-mTh0wd.png', 3295),
(6, 'Dri-FIT AeroBill Legacy91', 'Camo Training Cap', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/2c59851e-8190-4603-8961-271705da1cbd/dri-fit-aerobill-legacy91-camo-training-cap-rc1zZQ.png', 1295),
(7, 'Forum Low Shoes', 'Men Originals', 'https://assets.adidas.com/images/w_766,h_766,f_auto,q_auto,fl_lossy,c_fill,g_auto/ca6eb69651d94083889cacb60018d8bb_9366/forum-low-shoes.jpg', 5000),
(8, 'Nikon Z 7II', 'FX-Format Mirrorless Camera Body Black', 'https://m.media-amazon.com/images/I/91xuGJ0NDML._AC_SX466_.jpg', 2596),
(9, 'Soundcore Anker Life Q20', 'Hybrid Active Noise Cancelling Headphones, Wireless Over Ear Bluetooth Headphones, 40H Playtime, Hi-Res Audio, Deep Bass, Memory Foam Ear Cups, for Travel, Home Office', 'https://m.media-amazon.com/images/I/61kV3qWxT-L._AC_SX466_.jpg', 3343),
(13, 'Pursuit 3 Shoes', 'Under Armour Women\'s Charged Pursuit 3 Running Shoe', 'https://m.media-amazon.com/images/I/71fr7CIquyL._AC_UX575_.jpg', 2060),
(14, 'Crestwood Hiking Shoe', 'Columbia Men\'s Crestwood Hiking Shoe', 'https://m.media-amazon.com/images/I/71zBu01ohFL._AC_UX575_.jpg', 3200),
(15, 'Razer Ornata V3', 'Gaming Keyboard: Low-Profile Keys', 'https://m.media-amazon.com/images/I/71YW8+KhOwL._AC_SX679_.jpg', 3850);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_categoryID` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) DEFAULT NULL,
  `categoryID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_categoryID`, `productID`, `categoryID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 5, 3),
(5, 6, 3),
(6, 7, 1),
(7, 8, 4),
(8, 9, 4),
(12, 13, 1),
(13, 14, 1),
(14, 15, 4);

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
(4, 'lbj222', '602fa094806c85ff520f6b29f427644034de4156a8a3d224b9b33bb6b4232ca9', 'Lebronn', 'James'),
(5, 'mbryant22', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Michael', 'Bryant'),
(7, 'kjordan22', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'kobe', 'jordan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_categoryID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_categoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
