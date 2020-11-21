-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 12:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catagory_Id` int(11) NOT NULL,
  `catagory_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catagory_Id`, `catagory_name`) VALUES
(1, 'Hot Drinks'),
(2, 'Cold Drinks'),
(3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_Id` int(11) NOT NULL,
  `order_action` varchar(50) DEFAULT NULL,
  `order_price` int(11) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL,
  `status_Id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_Id`, `order_action`, `order_price`, `user_Id`, `status_Id`, `date`) VALUES
(2, 'Done', 5, 4, 1, '2019-11-12 11:52:19'),
(3, 'Deliver', 50, 1, 1, '2016-11-12 12:08:13'),
(4, 'Done', 5, 1, 1, '2020-11-12 13:06:42'),
(12, 'Done', 13, 1, 1, '2020-11-12 14:21:42'),
(13, 'Done', 60, 4, 1, '2020-11-12 14:22:32'),
(14, 'Done', 13, 2, 1, '2020-11-12 14:28:20'),
(15, 'Done', 23, 2, 1, '2020-11-12 14:29:34'),
(16, 'Done', 66, 4, 1, '2020-11-12 14:30:33'),
(17, 'Done', 54, 2, 1, '2020-11-14 17:29:41'),
(18, 'Done', 5, 1, 1, '2020-11-14 18:15:53'),
(19, 'Done', 70, 2, 1, '2020-11-14 18:17:44'),
(20, 'Done', 49, 2, 1, '2020-11-15 15:59:45'),
(24, 'Done', 12, 6, 4, '2020-11-21 22:35:04'),
(25, 'Done', 32, 6, 1, '2020-11-21 22:35:13'),
(26, 'Done', 20, 6, 2, '2020-11-21 22:35:18'),
(27, 'Done', 46, 6, 4, '2020-11-21 22:35:25'),
(28, 'Done', 18, 6, 4, '2020-11-21 22:42:48'),
(29, 'Done', 22, 6, 3, '2020-11-21 23:00:28'),
(30, 'Done', 29, 6, 3, '2020-11-21 23:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_Id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_picture` varchar(200) DEFAULT NULL,
  `catagory_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_Id`, `product_name`, `product_price`, `product_picture`, `catagory_Id`) VALUES
(1, 'Tea', 5, 'images/shay.png', 1),
(2, 'Cofe', 8, 'images/cofe.jpg', 1),
(3, 'Helba', 6, 'images/7elba.jpg', 1),
(4, 'Milk', 10, 'images/milk.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_Id` int(11) NOT NULL,
  `status_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_Id`, `status_name`) VALUES
(1, 'Done'),
(2, 'Delivered'),
(3, 'Processing'),
(4, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `product_Id` int(11) NOT NULL,
  `order_Id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`product_Id`, `order_Id`, `quantity`) VALUES
(1, 14, 1),
(1, 15, 3),
(1, 16, 4),
(1, 17, 2),
(1, 18, 1),
(1, 19, 6),
(1, 20, 3),
(1, 27, 2),
(1, 30, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 17, 2),
(2, 19, 2),
(2, 20, 2),
(2, 25, 4),
(2, 27, 2),
(2, 29, 2),
(2, 30, 1),
(3, 16, 3),
(3, 17, 3),
(3, 19, 4),
(3, 20, 3),
(3, 24, 2),
(3, 28, 3),
(3, 29, 1),
(3, 30, 1),
(4, 16, 2),
(4, 17, 1),
(4, 26, 2),
(4, 27, 2),
(4, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_profile_picture` varchar(50) DEFAULT NULL,
  `user_phone` int(25) DEFAULT NULL,
  `user_type` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `user_name`, `user_email`, `user_password`, `user_profile_picture`, `user_phone`, `user_type`) VALUES
(1, 'mahmoud', 'love_egypt170@yahoo.com', '123456789', 'hjjhbhjbkkj.jpg', 1156526691, 'user'),
(2, 'Eslam', 'eslamanwer67@gmail.com', '123123', 'https://randomuser.me/api/portraits/med/men/75.jpg', 1114705952, 'user'),
(4, 'Hossam', 'Hossam@gmail.com', '123123', 'asdadsads', 111, 'user'),
(5, 'mahmoud shalma', 'love_egypt180@yahoo.com', '1234567891', 'hjjhbhjbkkj.jpg', 1156526691, 'user'),
(6, 'user', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'https://randomuser.me/api/portraits/med/men/75.jpg', 123456789, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catagory_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_Id`),
  ADD KEY `FK_order_user` (`user_Id`),
  ADD KEY `FK_order_status` (`status_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_Id`),
  ADD KEY `Product_Category` (`catagory_Id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_Id`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`product_Id`,`order_Id`),
  ADD KEY `FK_userorder_order` (`order_Id`),
  ADD KEY `FK_userorder_product` (`product_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catagory_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_order_status` FOREIGN KEY (`status_Id`) REFERENCES `status` (`status_Id`),
  ADD CONSTRAINT `FK_order_user` FOREIGN KEY (`user_Id`) REFERENCES `users` (`Id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Product_Category` FOREIGN KEY (`catagory_Id`) REFERENCES `categories` (`catagory_Id`);

--
-- Constraints for table `userorder`
--
ALTER TABLE `userorder`
  ADD CONSTRAINT `FK_userorder_order` FOREIGN KEY (`order_Id`) REFERENCES `orders` (`order_Id`),
  ADD CONSTRAINT `FK_userorder_product` FOREIGN KEY (`product_Id`) REFERENCES `products` (`product_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
