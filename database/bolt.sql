-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 12:29 AM
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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`) VALUES
(12, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 4, 800, '2021-11-10 11:00:50', 'tranduckhanh23@gmail.com'),
(13, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 1000, 3, 3000, '2021-11-10 11:01:21', 'tranduckhanh23@gmail.com'),
(14, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 3, 15000, '2021-11-10 13:32:32', 'sjobs@apple.com'),
(15, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 4, 800, '2021-11-10 22:00:05', 'tranduckhanh23@gmail.com'),
(16, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 1000, 4, 4000, '2021-11-10 22:00:05', 'tranduckhanh23@gmail.com'),
(17, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 1000, 1, 1000, '2021-11-30 13:47:05', 'tranduckhanh23@gmail.com'),
(18, 'BOLT3', 'Sports Band', 'sngdzn', 1000, 4, 4000, '2021-12-08 17:02:02', 'tranduckhanh23@gmail.com'),
(19, 'BOLT2', 'Cap', 'gdsnzg', 200, 4, 800, '2021-12-13 08:19:32', 'tranduckhanh23@gmail.com'),
(20, 'BOLT2', 'Cap', 'gdsnzg', 200, 2, 400, '2021-12-19 17:16:16', 'tranduckhanh23@gmail.com'),
(21, 'BOL6', 'fdgbs', 'dnszg', 50, 3, 150, '2021-12-19 17:16:16', 'tranduckhanh23@gmail.com'),
(22, 'BOL6', 'fdgbs', 'dnszg', 50, 1, 50, '2021-12-19 18:28:44', 'tranduckhanh23@gmail.com'),
(23, 'BOL6', 'fdgbs', 'dnszg', 50, 6, 300, '2021-12-19 19:36:40', 'tranduckhanh23@gmail.com'),
(24, 'BOLT7', 'fdgbs', ' dgnsf\r\n', 20, 5, 100, '2021-12-19 19:45:14', 'tranduckhanh23@gmail.com'),
(25, 'BOL4', 'jhbhh', 'jgkvug', 20, 7, 140, '2021-12-19 19:45:14', 'tranduckhanh23@gmail.com');

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
(2, 'BOLT2', 'Cap', 'gdsnzg', 'uploads/product-01.jpg', 8, '200.00'),
(47, 'BOL6', 'fdgbs', 'dnszg', 'uploads/product-02.jpg', 0, '50.00'),
(49, 'BOLT7', 'fdgbs', ' dgnsf\r\n', 'uploads/product-03.jpg', 15, '20.00'),
(51, 'BOL4', 'jhbhh', 'jgkvug', 'uploads/product-04.jpg', 23, '20.00'),
(52, 'BOLT5', 'mnbm ,g', 'jh hg', 'uploads/product-05.jpg', 20, '30.00'),
(53, 'BOLT1', 'vov', 'hgyk', 'uploads/product-06.jpg', 30, '52.00');

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
(3, 'TRAN', 'Khanh', '15 avenue du Maréchal Foch', 'Blois', 41000, 'tranduckhanh23@gmail.com', 'tranduckhanh', 'user'),
(4, 'TRAN', 'Khanh', '15 avenue du Maréchal Foch', 'Blois', 41000, 'tranduckhanh34@gmail.com', 'tranduckhanh', 'user'),
(5, 'TRAN', 'Khanh', '15 avenue du Maréchal Foch', 'Blois', 41000, 'tranduckhanh45@gmail.com', 'tranduckhanh', 'user');

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
