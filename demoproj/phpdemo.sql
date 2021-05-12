-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 04:59 PM
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
-- Database: `phpdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(512) NOT NULL,
  `category_image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Milk', 'uploadscat/milk.jpg'),
(3, 'Paneer', 'uploadscat/paneer.jpg'),
(4, 'Shrikhand', 'uploadscat/shrikhand.jpg'),
(5, 'Ghee', 'uploadscat/ghee.jpg'),
(6, 'Butter', 'uploadscat/butter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `order_total` float NOT NULL,
  `order_payment_method` varchar(64) NOT NULL,
  `shipping_address` text NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `customer_id`, `order_total`, `order_payment_method`, `shipping_address`, `order_date`, `order_status`) VALUES
(28, 1, 70, 'cod', 'fxgfx', '2020-09-17 20:07:39', 'In Progress'),
(29, 1, 280, 'cod', 'vcxvx ', '2020-09-17 20:11:56', 'In Progress'),
(30, 1, 280, 'cod', 'fxfgrd', '2020-09-17 20:13:39', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_product_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_qty` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_product_id`, `order_id`, `product_id`, `product_qty`) VALUES
(29, 24, 5, 1),
(30, 25, 10, 1),
(31, 26, 18, 1),
(32, 27, 10, 1),
(33, 28, 5, 1),
(34, 28, 6, 1),
(35, 29, 10, 1),
(36, 30, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_title` varchar(512) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(512) NOT NULL,
  `product_stock` int(20) DEFAULT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_desc`, `product_price`, `product_image`, `product_stock`, `category_id`) VALUES
(5, ' COW MILK', '<ul>\r\n<li>800 Ltr Available</li>\r\n<li>30Rs/ltr</li>\r\n<li>Details 3</li>\r\n</ul>', 30, 'uploads/jmilk.jpg', 5, 1),
(6, 'Buffalow Milk', '<ul>\r\n<li>400 Ltr Available</li>\r\n<li>40Rs/ltr 2</li>\r\n<li>Details 3</li>\r\n</ul>', 40, 'uploads/bmilk.jpg', 10, 1),
(8, 'DESI MILK', '500 ltr Available', 35, 'uploads/dmilk.jpg', 500, 1),
(9, 'AMUL PANEER', '700 kg available\r\n280Rs/kg', 280, 'uploads/paneer1.jpg', 700, 3),
(10, 'GOWARDHAN PANEER', '500 kg available\r\n280RS/kg', 280, 'uploads/g.jpg', 500, 3),
(11, 'NATUARAL PANEER', '200 kg available', 290, 'uploads/natural.jpg', 200, 3),
(12, 'PLAIN SHRIKHAND', '300 kg available\r\n1000RS/kg', 1000, 'uploads/plain.jpg', 300, 4),
(13, 'MANGO SHRIKHAND', '980RS/kg', 980, 'uploads/mnago.jpg', 200, 4),
(14, 'COCONOUT SHRIKHAND', '699RS/kg', 699, 'uploads/coconutcarob.jpg', 100, 4),
(15, 'NATURAL GHEE', '500Rs/500gm', 500, 'uploads/natural1.jpg', 150, 5),
(16, 'GOWARDHAN GHEE', '450RS/pack', 450, 'uploads/ghee1.jpg', 100, 5),
(17, 'AMUL BUTTER', '250Rs/pack', 250, 'uploads/amul.png', 100, 6),
(18, 'PEANUT BUTTER', '300Rs/pack', 300, 'uploads/Peanut.jpg', 50, 6);

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `systemuser_id` int(20) NOT NULL,
  `systemuser_name` varchar(128) NOT NULL,
  `systemuser_email` varchar(128) NOT NULL,
  `systemuser_username` varchar(128) NOT NULL,
  `systemuser_password` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`systemuser_id`, `systemuser_name`, `systemuser_email`, `systemuser_username`, `systemuser_password`) VALUES
(1, 'admin', 'admin@test.com', 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_mail` varchar(128) NOT NULL,
  `user_contact` varchar(32) NOT NULL,
  `user_username` varchar(128) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `registered_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_contact`, `user_username`, `user_password`, `registered_on`) VALUES
(4, 'sheetal', 'dhawale@cumminscollege.in', '09561976180', 'test', '123', '2020-09-17 16:16:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`systemuser_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `systemuser_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
