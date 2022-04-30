-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 04:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `cookie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `user_name`, `pass_word`, `cookie`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'H%^X$;BLaycdLL54^K2JJYMRCFZ&#T9FD%DOqK;2Jw9#XtFZ9o1pTgl51VMwMfnVi5RTaz2lzmocUz;mGq%gjB8kSAn8fl%JjmmCOk23ziyqUU%Q3iUj8BYKG5SaR8K3vw#gz9XdLz&nEWo^qbDEyS3QRl%U^N1@Kui$sHgOIz5BWMW;%v@ZTD9piWoyJNR2fPapaSut');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `create_at`, `update_at`, `status_delete`) VALUES
(142, 'Shirt', 'Shirt', 'Avalabile', '2022-04-27 20:57:35', '0000-00-00 00:00:00', 1),
(143, 'Jean', 'Jean', 'Avalabile', '2022-04-27 20:57:39', '0000-00-00 00:00:00', 1),
(144, 'Jacket', 'Jacket', 'Avalabile', '2022-04-27 20:57:44', '0000-00-00 00:00:00', 1),
(156, 'Shirt', 'Shirt', 'Hien Thi', '2022-04-27 21:06:26', '0000-00-00 00:00:00', 0),
(157, 'Jean', 'Jean', 'Hien Thi', '2022-04-27 21:06:30', '0000-00-00 00:00:00', 0),
(158, 'Jacket', 'Jacket', 'Hien Thi', '2022-04-27 21:06:34', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name_user` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `name_product`, `product_id`, `quantity`, `unit_price`) VALUES
(92, 'Jean', 122, 2, 2328000);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_mony` double DEFAULT NULL,
  `status_recieve` varchar(20) NOT NULL,
  `cancel_order` int(11) NOT NULL,
  `delete_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `user_id`, `create_at`, `name`, `address`, `phone_number`, `status`, `total_mony`, `status_recieve`, `cancel_order`, `delete_order`) VALUES
(92, 29, '2022-01-22 14:42:04', 'Le Giang Khanh', 'HCM', '123456789', 'Arrive', 1734991.5, 'true', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` double DEFAULT NULL,
  `img_product` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `descrip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `production_company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_category` varchar(255) NOT NULL,
  `pay` int(11) NOT NULL,
  `sale_product` int(10) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img_product`, `quantity`, `descrip`, `production_company`, `create_at`, `update_at`, `category_id`, `name_category`, `pay`, `sale_product`, `status_delete`) VALUES
(119, 'shop_online', 10000, 'login.png', 150, 'shop_online', 'shop_online', '2022-01-22 14:44:45', '0000-00-00 00:00:00', 132, 'shop_online', 0, 10, 1),
(120, 'Shirt', 1000000, 'z1 (1).jpg', 21, 'Just Do It', 'Nike', '2022-04-27 20:46:09', '0000-00-00 00:00:00', 137, 'Shirt', 0, 5, 1),
(121, 'Shirt2', 800000, 'z1 (5).jpg', 32, 'Just Do It', 'Nike', '2022-04-27 20:46:36', '0000-00-00 00:00:00', 137, 'Shirt', 0, 4, 1),
(122, 'Jean1', 2000000, 'z1 (3).jpg', 11, 'Just Do It', 'Nike', '2022-04-27 20:47:02', '0000-00-00 00:00:00', 138, 'Jean', 0, 3, 1),
(123, 'Shirt3', 600000, 'z1(6).jpg', 123, 'Just Do It', 'Nike', '2022-04-27 20:47:31', '0000-00-00 00:00:00', 137, 'Shirt', 0, 2, 1),
(124, 'Jean2', 2000000, 'z1(4).jpg', 32, 'Just Do It', 'Nike', '2022-04-27 20:48:05', '0000-00-00 00:00:00', 138, 'Jean', 0, 5, 1),
(125, 'Jacket', 3000000, 'z1 (2).jpg', 4, 'Just Do It', 'Nike', '2022-04-27 20:48:33', '0000-00-00 00:00:00', 139, 'Jacket', 0, 2, 1),
(128, 'Shirt', 800000, 'z1 (1).jpg', 23, 'Just Do It', 'Nike', '2022-04-27 21:09:01', '0000-00-00 00:00:00', 156, 'Shirt', 0, 2, 0),
(129, 'Shirt1', 700000, 'z1 (5).jpg', 12, 'Just Do It', 'Nike', '2022-04-27 21:09:30', '0000-00-00 00:00:00', 156, 'Shirt', 0, 2, 0),
(130, 'Jean', 1200000, 'z1 (3).jpg', 34, 'Just Do It', 'Nike', '2022-04-27 21:10:33', '0000-00-00 00:00:00', 157, 'Jean', 0, 3, 0),
(131, 'Shirt2', 500000, 'z1(6).jpg', 12, 'Just Do it', 'Nike', '2022-04-27 21:11:44', '0000-00-00 00:00:00', 156, 'Shirt', 0, 2, 0),
(132, 'Jean2', 1300000, 'z1(4).jpg', 25, 'Just Do It', 'Nike', '2022-04-27 21:12:09', '0000-00-00 00:00:00', 157, 'Jean', 0, 4, 0),
(133, 'Jacket', 1200000, 'z1 (2).jpg', 34, 'Just Do It', 'Nike', '2022-04-27 21:12:42', '0000-00-00 00:00:00', 158, 'Jacket', 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name_slider` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `slider_img` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name_slider`, `slider_img`, `create_at`, `update_at`, `status`) VALUES
(12, '1', '1.jpg', '2021-12-29 15:33:22', '0000-00-00 00:00:00', 'Hiển Thị'),
(13, '2', '2.jpg', '2021-12-29 15:33:33', '0000-00-00 00:00:00', 'Hiển Thị');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email_account` varchar(255) DEFAULT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address_user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `active_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `email_account`, `pass_word`, `phone_number`, `address_user`, `create_at`, `update_at`, `active_status`) VALUES
(28, 'Le Giang Khanh', 'khanh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '123', 'HCM', '2022-01-22 14:40:08', '0000-00-00 00:00:00', 'Active'),
(29, 'Le Giang Khanh', 'khanh11@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '123', '123', '2022-01-22 14:41:00', '0000-00-00 00:00:00', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_product_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
