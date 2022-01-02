-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 06:49 PM
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
-- Database: `bolt`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'BOLT1', 'Gaming/sim station', '	AMD Ryzen 9 5900X 3.7 GHz 12-Core Processor, 	EK EK-AIO 360 D-RGB 66.04 CFM Liquid CPU Cooler, 	Asus ROG STRIX B550-A GAMING ATX AM4 Motherboard, 	Asus ROG STRIX B550-A GAMING ATX AM4 Motherboard...', 'uploads/product-01.jpg', 4, '5558.00'),
(2, 'BOLT2', 'Corsair build with the 4000D', '	AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor, 	Corsair iCUE H100i ELITE CAPELLIX 75 CFM Liquid CPU Cooler, 	Asus PRIME X570-PRO ATX AM4 Motherboard, 	Corsair Vengeance RGB Pro SL 32 GB (4 x 8 GB) DDR4-3200 CL16 Memory...', 'uploads/product-02.jpg', 6, '3119.00'),
(3, 'BOLT3', 'PCMR 2K20 Corsair Build', '	Intel Core i9-9900KF 3.6 GHz 8-Core Processor, 	Corsair H150i PRO 47.3 CFM Liquid CPU Cooler, 	Corsair Vengeance RGB 16 GB (2 x 8 GB) DDR4-3000 CL15 Memory...', 'uploads/product-03.jpg', 9, '2319.00'),
(4, 'BOLT4', 'JASP', '	Intel Core i9-9900K 3.6 GHz 8-Core Processor, 	Asus ROG MAXIMUS XI GENE Micro ATX LGA1151 Motherboard, 	G.Skill Trident Z Royal 16 GB (2 x 8 GB) DDR4-4000 CL18 Memory, 	Sabrent Rocket 1 TB M.2-2280 NVME Solid State Drive...', 'uploads/product-04.jpg', 7, '2123.00'),
(5, 'BOLT5', '21 Vision', '	AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor, 	NZXT Kraken X73 73.11 CFM Liquid CPU Cooler, 	Gigabyte X570 AORUS PRO WIFI ATX AM4 Motherboard, 	G.Skill Trident Z Neo 16 GB (2 x 8 GB) DDR4-3600 CL16 Memory...', 'uploads/product-05.jpg', 8, '2234.00'),
(6, 'BOLT6', 'Lian Li Mesh 2', '	AMD Ryzen 5 3600 3.6 GHz 6-Core Processor, 	Cooler Master MasterAir MA410M 53.38 CFM CPU Cooler, 	Asus ROG STRIX B550-F GAMING ATX AM4 Motherboard, 	Kingston HyperX Fury RGB 32 GB (4 x 8 GB) DDR4-3200 CL16 Memory...', 'uploads/product-06.jpg', 1, '4784.00'),
(7, 'BOLT7', 'EK Quantum Lian Li Dynamic XL', '	Intel Core i9-12900K 3.2 GHz 16-Core Processor, 	MSI MPG Z690 EDGE WIFI DDR4 ATX LGA1700 Motherboard, 	G.Skill Trident Z RGB 32 GB (2 x 16 GB) DDR4-3200 CL14 Memory...', 'uploads/product-07.jpg', 0, '6749.00'),
(8, 'BOLT8', 'Zee’s Toaster', '	Intel Core i9-12900K 3.2 GHz 16-Core Processor, 	Corsair iCUE H150i ELITE LCD 58.1 CFM Liquid CPU Cooler, 	Asus ROG MAXIMUS Z690 EXTREME EATX LGA1700 Motherboard, 	Corsair Dominator Platinum RGB 32 GB (2 x 16 GB) DDR5-5200 CL38 Memory...', 'uploads/product-08.jpg', 0, '9508.00'),
(9, 'BOLT9', 'Acid', '	AMD Ryzen 9 5900X 3.7 GHz 12-Core Processor, 	Gigabyte B550 VISION D-P ATX AM4 Motherboard, 	G.Skill Trident Z Royal 32 GB (2 x 16 GB) DDR4-4000 CL16 Memory...', 'uploads/product-09.jpg', 10, '3910.00'),
(10, 'BOLT10', 'Orion', '	AMD Ryzen 9 5900X 3.7 GHz 12-Core Processor, 	Corsair H100i RGB PLATINUM SE 63 CFM Liquid CPU Cooler, Asus ROG Crosshair VIII Dark Hero ATX AM4 Motherboard, 	Corsair Vengeance RGB Pro 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory...', 'uploads/product-10.jpg', 0, '3523.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'tran', 'duc khanh', 'dddddd', 'dddddddd', 11111, 'tranduckhanh@gmail.com', 'tranduckhanh', 'admin'),
(2, 'TRAN', 'Khanh', '15 avenue du Maréchal Foch', 'Blois', 41000, 'tranduckhanh23@gmail.com', 'tranduckhanh', 'user'),
(3, 'TRAN', 'Khanh', '15 avenue du Maréchal Foch', 'Blois', 41000, 'tranduckhanh34@gmail.com', 'tranduckhanh', 'user'),
(4, 'TRAN', 'Khanh', '15 avenue du Maréchal Foch', 'Blois', 41000, 'tranduckhanh45@gmail.com', 'tranduckhanh', 'user'),
(5, 'haha', 'hihi', '15 avenue du Maréchal Foch', 'Blois', 41000, '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
