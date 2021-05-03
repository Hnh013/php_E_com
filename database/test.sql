-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `image`) VALUES
(2, 'Apple MacBook Pro', 1799, './upload/product1.png'),
(3, 'Sony E7 Headphones', 499, './upload/product2.png'),
(4, 'Sony Experia Z4', 2499, './upload/product3.png'),
(5, 'Samsung Galaxy A90', 6399, './upload/product4.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `placed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `contactno`, `email`, `price`, `description`, `address`, `placed_at`) VALUES
(1, 'janenu', '9889988998', 'jan@enu.com', 2345, 'some items', 'jankinagar enclave , Delhi', '2021-04-21 03:45:14'),
(2, 'eve hot', '3243345355', 'eve@hot.com', 1799, 'sample items', 'ssample address', '2021-04-21 03:47:09'),
(3, 'Harshit Negi', '9889988998', 'najay357@gmail.com', 2298, 'Product Name : - Apple MacBook Pro\r\n Product Price : - 1799,\r\nProduct Name : - Sony E7 Headphones\r\n Product Price : - 499,\r\n', 'Degree College Road , Jaunpur', '2021-04-21 04:08:41'),
(4, 'Harshit Negi', '9889988998', 'najay357@gmail.com', 1799, 'Product Name : - Apple MacBook Pro\r\n Product Price : - 1799,\r\n', 'Degree College Road , Jaunpur', '2021-04-21 04:23:56'),
(5, 'sdasdawf', '98989898', 'asd@faef.com', 499, 'Product Name : - Sony E7 Headphones\r\n Product Price : - 499,\r\n', 'wdqwedeqeqwewe', '2021-04-23 14:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `type`, `image`, `description`, `price`, `stock`) VALUES
(4, 'Pixel5', 'Google', 'Smartphone', 'https://images.unsplash.com/photo-1595514377985-fc9fe1d44f93?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cGhvbmV8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60', 'Best smartphone', 322344, 3141),
(5, 'Electronics', 'Google', 'Tablet', 'https://images.unsplash.com/photo-1595514377985-fc9fe1d44f93?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cGhvbmV8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60', 'p[k[pmwgtwmtpowmgopemg[ogmg[omeqg[pkqmg[e', 322344, 3141),
(6, 'Electronics', 'Google', 'Tablet', 'https://images.unsplash.com/photo-1595514377985-fc9fe1d44f93?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cGhvbmV8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60', 'p[k[pmwgtwmtpowmgopemg[ogmg[omeqg[pkqmg[e', 322344, 3141);

-- --------------------------------------------------------

--
-- Table structure for table `rcb`
--

CREATE TABLE `rcb` (
  `id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'mhamill', '$2y$10$/J1UObjJxk5gwgHsmYj2yOIwOVVB1whROib9r9k4XVOuA8PoSW7my'),
(2, 'admin', '$2y$10$6/hVb8E0TUXY19y0OSWwVOn3wvjgHBeMGTebkTr2ab2tFT1fgTbxW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_11` (`user_id`),
  ADD KEY `test_12` (`product_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `test_11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_12` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
