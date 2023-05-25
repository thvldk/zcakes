-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 07:44 AM
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
-- Database: `zcakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `z_cake_layer`
--

CREATE TABLE `z_cake_layer` (
  `layer_size_id` int(11) NOT NULL,
  `cake_layers` varchar(11) NOT NULL,
  `cake_size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_cart`
--

CREATE TABLE `z_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` decimal(11,2) NOT NULL,
  `cart_qty` varchar(255) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_cart`
--

INSERT INTO `z_cart` (`cart_id`, `user_id`, `product_id`, `product_name`, `product_img`, `product_price`, `cart_qty`, `subtotal`) VALUES
(1, 2, 1, 'Blue Bento', 'images/bento1.png', '250.00', '1', '250.00'),
(2, 4, 5, 'Strawberry Cake', 'images/lay1.jpg', '500.00', '1', '250.00'),
(3, 4, 11, 'Candy Cupcake', 'images/cc10.png', '25.00', '12', '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_category`
--

CREATE TABLE `z_category` (
  `category_id` int(11) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `category_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_category`
--

INSERT INTO `z_category` (`category_id`, `item_category`, `category_photo`) VALUES
(1, 'cake', 'images/cake23.jpg'),
(2, 'bento', 'images/bento.jpg'),
(3, 'cupcake', 'images/cc12.png');

-- --------------------------------------------------------

--
-- Table structure for table `z_cc_filling`
--

CREATE TABLE `z_cc_filling` (
  `cc_filing_id` int(11) NOT NULL,
  `cupcake_filling` varchar(255) NOT NULL,
  `cc_filling_img` varchar(255) NOT NULL,
  `filling_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_cc_filling`
--

INSERT INTO `z_cc_filling` (`cc_filing_id`, `cupcake_filling`, `cc_filling_img`, `filling_price`) VALUES
(1, 'chocolate', 'images/choco.filled.jpg', '15.00'),
(2, 'vanilla', 'images/vanilla.filled.jpg', '10.00'),
(3, 'redvelvet', 'images/rvv.filled.jpg', '18.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_cc_size`
--

CREATE TABLE `z_cc_size` (
  `cupcake_size_id` int(11) NOT NULL,
  `cupcake_size` varchar(255) NOT NULL,
  `cc_size_img` varchar(255) NOT NULL,
  `cc_size_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_cc_size`
--

INSERT INTO `z_cc_size` (`cupcake_size_id`, `cupcake_size`, `cc_size_img`, `cc_size_price`) VALUES
(1, 'standard', 'images/cc_size_s.jpg', '30.00'),
(2, 'Mini', 'images/cc_size_mini.jpg', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_details`
--

CREATE TABLE `z_details` (
  `details_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `shape_id` int(11) DEFAULT NULL,
  `cake_size_id` int(11) DEFAULT NULL,
  `cake_layer` int(11) DEFAULT NULL,
  `layer_size_id` int(11) DEFAULT NULL,
  `flavor_id` int(11) DEFAULT NULL,
  `frosting_id` int(11) DEFAULT NULL,
  `cupcake_size_id` int(11) DEFAULT NULL,
  `cc_filling_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `design_inspo` varchar(255) DEFAULT NULL,
  `dedication` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_details`
--

INSERT INTO `z_details` (`details_id`, `user_id`, `category_id`, `shape_id`, `cake_size_id`, `cake_layer`, `layer_size_id`, `flavor_id`, `frosting_id`, `cupcake_size_id`, `cc_filling_id`, `total_price`, `design_inspo`, `dedication`, `date_added`) VALUES
(1, NULL, 2, 2, NULL, NULL, NULL, 2, 1, NULL, NULL, '0.00', 'images/bento1.png', 'Make it simple thank you, in blue color', '2023-05-20 06:43:59'),
(2, NULL, 2, 2, NULL, NULL, NULL, 2, 1, NULL, NULL, '0.00', 'images/bento2.png', 'Happy Birthday Salomer', '2023-05-20 20:07:17'),
(3, NULL, 2, 2, NULL, NULL, NULL, 4, 2, NULL, NULL, '0.00', 'images/bento3.png', 'Flower design', '2023-05-20 20:07:17'),
(4, NULL, 2, 2, NULL, NULL, NULL, 4, 1, NULL, NULL, '0.00', 'images/bento4.png', 'earthy palette cake', '2023-05-20 20:08:48'),
(5, NULL, 1, 2, 1, 1, NULL, 3, 1, NULL, NULL, '0.00', 'images/lay1.jpg', 'with strawbery', '2023-05-20 20:57:51'),
(6, NULL, 1, 2, 1, 1, NULL, 2, 2, NULL, NULL, '0.00', 'images/lay2.jpg', 'add mango toppings', '2023-05-20 20:57:51'),
(7, NULL, 1, 2, 2, 1, NULL, 1, 1, NULL, NULL, '0.00', 'images/lay3.jpg', 'add candles', '2023-05-20 20:59:07'),
(8, NULL, 1, 2, 2, 1, NULL, 4, 1, NULL, NULL, '0.00', 'images/lay5.jpg', NULL, '2023-05-20 21:00:24'),
(9, NULL, 3, NULL, NULL, NULL, NULL, 2, 1, 1, 2, '0.00', 'images/cc8.png', NULL, '2023-05-20 21:02:26'),
(10, NULL, 3, NULL, NULL, NULL, NULL, 3, 1, 1, 2, '0.00', 'images/cc9.png', NULL, '2023-05-20 21:02:26'),
(11, NULL, 3, NULL, NULL, NULL, NULL, 2, 2, 2, 2, '0.00', 'images/cc10.png', NULL, '2023-05-20 21:03:38'),
(12, NULL, 3, NULL, NULL, NULL, NULL, 2, 1, 2, 1, '0.00', 'images/cc11.png', NULL, '2023-05-20 21:03:38'),
(35, 7, 2, 1, NULL, NULL, NULL, 2, 1, NULL, NULL, '165.00', NULL, 'bento na masarrap', '2023-05-25 01:54:46'),
(37, 7, 3, NULL, NULL, NULL, NULL, 1, 1, 2, 2, '178.00', NULL, 'cup na masarap', '2023-05-25 03:08:24'),
(43, 7, 1, 1, 2, NULL, NULL, 1, 2, NULL, NULL, '1155.00', NULL, 'happy bday', '2023-05-25 13:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `z_flavor`
--

CREATE TABLE `z_flavor` (
  `flavor_id` int(11) NOT NULL,
  `cake_flavor` varchar(255) NOT NULL,
  `flavor_img` varchar(255) NOT NULL,
  `flavor_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_flavor`
--

INSERT INTO `z_flavor` (`flavor_id`, `cake_flavor`, `flavor_img`, `flavor_price`) VALUES
(1, 'choco', 'images/choco.png', '35.00'),
(2, 'vanilla', 'images/vanilla.png', '30.00'),
(3, 'red velvet', 'images/redvelvet.png', '45.00'),
(4, 'mocha', 'images/mocha.jpg', '35.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_frosting`
--

CREATE TABLE `z_frosting` (
  `frosting_id` int(11) NOT NULL,
  `cake_frosting` varchar(255) NOT NULL,
  `frosting_img` varchar(255) NOT NULL,
  `frosting_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_frosting`
--

INSERT INTO `z_frosting` (`frosting_id`, `cake_frosting`, `frosting_img`, `frosting_price`) VALUES
(1, 'whipped cream', 'images/whipped.jpg', '55.00'),
(2, 'buttercream', 'images/buttercream.jpg', '75.00'),
(3, 'fondant', 'images/fondant.jpg', '105.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_orders`
--

CREATE TABLE `z_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ref_num` varchar(16) NOT NULL,
  `product_price` decimal(11,2) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `date_ordered` datetime NOT NULL DEFAULT current_timestamp(),
  `mode_of_delivery` char(1) NOT NULL COMMENT 'P = Pickup / D = Deliver',
  `pickup_date` datetime NOT NULL,
  `order_status` char(1) NOT NULL COMMENT 'D = Delivered / P = Pending / X = Canceled '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_orders`
--

INSERT INTO `z_orders` (`order_id`, `product_id`, `user_id`, `ref_num`, `product_price`, `order_qty`, `total_price`, `date_ordered`, `mode_of_delivery`, `pickup_date`, `order_status`) VALUES
(3, 1, 2, '93D1Z7O4O1K0U6U9', '250.00', 1, '250.00', '2023-05-21 11:23:16', 'P', '2023-05-21 05:22:40', 'P'),
(4, 12, 4, '07Q8S1E7O4X1Q7X5', '25.00', 9, '225.00', '2023-05-21 11:28:13', 'P', '2023-05-21 05:26:56', 'D'),
(5, 1, 7, '28G7B9M7Y6R3I', '250.00', 5, '0.00', '2023-05-23 06:43:37', '', '2023-05-25 12:42:00', 'P'),
(6, 2, 7, '28G7B9M7Y6R3I', '250.00', 1, '0.00', '2023-05-23 06:43:37', '', '2023-05-25 12:42:00', 'P'),
(7, 5, 7, '91D0C2A7Z7H4D', '500.00', 1, '0.00', '2023-05-23 07:04:20', '', '2023-05-31 12:01:00', 'D'),
(8, 1, 7, '60A3W4K8X8X0G6Y4', '250.00', 2, '0.00', '2023-05-23 07:11:03', '', '2023-05-30 13:11:00', 'P'),
(9, 2, 7, '60A3W4K8X8X0G6Y4', '250.00', 1, '0.00', '2023-05-23 07:11:03', '', '2023-05-30 13:11:00', 'P'),
(10, 1, 7, '79C6N7H6O2S2W6V2', '250.00', 1, '0.00', '2023-05-23 08:17:31', '', '2023-05-25 17:17:00', 'P'),
(11, 1, 7, '62Z1J7N9J0A1F2R7', '250.00', 2, '0.00', '2023-05-23 08:25:45', '', '2023-05-01 14:29:00', 'P'),
(12, 1, 7, '42U1F5R4L3D4N3W8', '250.00', 2, '0.00', '2023-05-23 14:28:30', '', '2023-05-31 13:30:00', 'P'),
(13, 7, 7, '35U7U9V4G2Z0A7I4', '550.00', 1, '0.00', '2023-05-23 14:40:01', '', '2023-05-11 14:41:00', 'P'),
(14, 7, 7, '27L7E9W9J1R7R2Q1', '550.00', 1, '0.00', '2023-05-23 14:40:37', '', '2023-05-24 14:40:00', 'P'),
(15, 2, 7, '67E8R1J3J9F9E3I7', '250.00', 1, '0.00', '2023-05-23 14:41:02', '', '2023-05-29 14:40:00', 'P'),
(16, 3, 7, '67E8R1J3J9F9E3I7', '250.00', 1, '0.00', '2023-05-23 14:41:02', '', '2023-05-29 14:40:00', 'P'),
(17, 7, 7, '67E8R1J3J9F9E3I7', '550.00', 1, '0.00', '2023-05-23 14:41:02', '', '2023-05-29 14:40:00', 'P'),
(18, 1, 7, '83K1Z0I5B2A4P8M4', '250.00', 1, '0.00', '2023-05-25 09:29:06', '', '2023-05-18 09:31:00', 'P'),
(19, 2, 7, '83K1Z0I5B2A4P8M4', '250.00', 1, '0.00', '2023-05-25 09:29:06', '', '2023-05-18 09:31:00', 'P'),
(20, 31, 7, '06R5G4V2H0G6R4T3', '1155.00', 1, '0.00', '2023-05-25 12:48:00', '', '2023-05-11 12:50:00', 'P'),
(21, 31, 7, '24E3L5P0B7U8K4M7', '1155.00', 2, '0.00', '2023-05-25 12:50:39', '', '2023-05-31 12:50:00', 'P'),
(22, 31, 7, '62S0G8J3P7Z2M6V6', '1155.00', 1, '0.00', '2023-05-25 12:50:55', '', '2023-05-27 16:50:00', 'P'),
(23, 31, 7, '25O4O3B0N0H6Q8Z8', '1155.00', 1, '0.00', '2023-05-25 12:53:17', '', '2023-06-03 12:56:00', 'P'),
(24, 34, 7, '25O4O3B0N0H6Q8Z8', '165.00', 1, '0.00', '2023-05-25 12:53:17', '', '2023-06-03 12:56:00', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `z_products`
--

CREATE TABLE `z_products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `details_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(11,2) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active / I = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_products`
--

INSERT INTO `z_products` (`product_id`, `category_id`, `details_id`, `user_id`, `product_name`, `product_price`, `product_img`, `date_added`, `product_status`) VALUES
(1, 2, 0, 0, 'Blue Bento', '250.00', 'images/bento1.png', '2023-05-25 10:27:23', 'A'),
(2, 2, 0, 0, 'Bento Minimalist', '250.00', 'images/bento2.png', '2023-05-25 10:27:23', 'A'),
(3, 2, 0, 0, 'Bento Flower', '250.00', 'images/bento3.png', '2023-05-25 10:27:23', 'A'),
(4, 2, 0, 0, 'Bento Minimalist2', '250.00', 'images/bento4.png', '2023-05-25 10:27:23', 'A'),
(5, 1, 0, 0, 'Strawberry Cake', '500.00', 'images/lay1.jpg', '2023-05-25 10:27:23', 'A'),
(6, 1, 0, 0, 'Mango Cake', '500.00', 'images/lay2.jpg', '2023-05-25 10:27:23', 'A'),
(7, 1, 0, 0, 'Chocolate Cake', '550.00', 'images/lay3.jpg', '2023-05-25 10:27:23', 'A'),
(8, 1, 0, 0, 'Mocha Cake', '500.00', 'images/lay5.jpg', '2023-05-25 10:27:23', 'A'),
(9, 3, 0, 0, 'Cherry on Top', '35.00', 'images/cc8.png', '2023-05-25 10:27:23', 'A'),
(10, 3, 0, 0, 'Red velvet Cupcake', '35.00', 'images/cc9', '2023-05-25 10:27:23', 'A'),
(11, 3, 0, 0, 'Candy Cupcake', '25.00', 'images/cc10.png', '2023-05-25 10:27:23', 'A'),
(12, 3, 0, 0, 'Choco-nilla Cupcake', '25.00', 'images/cc11.png', '2023-05-25 10:27:23', 'A'),
(31, 1, 31, 7, 'New Product', '1155.00', '', '2023-05-25 09:46:47', 'A'),
(34, 2, 40, 7, 'New Product', '165.00', '', '2023-05-25 13:08:37', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `z_shape`
--

CREATE TABLE `z_shape` (
  `shape_id` int(11) NOT NULL,
  `cake_shape` varchar(255) NOT NULL,
  `shape_photo` varchar(255) NOT NULL,
  `shape_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_shape`
--

INSERT INTO `z_shape` (`shape_id`, `cake_shape`, `shape_photo`, `shape_price`) VALUES
(1, 'square', 'images/square.jpg', '25.00'),
(2, 'round', 'images/round.jpg', '20.00'),
(3, 'rectangle', 'images/rectangle.JPG', '25.00'),
(4, 'heart', 'images/heart.jpg', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_size`
--

CREATE TABLE `z_size` (
  `cake_size_id` int(11) NOT NULL,
  `cake_size` varchar(20) NOT NULL,
  `size_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_size`
--

INSERT INTO `z_size` (`cake_size_id`, `cake_size`, `size_price`) VALUES
(1, '4 inches', '190.00'),
(2, '6 inches', '200.00'),
(3, '8 inches', '400.00'),
(4, '10 inches', '670.00'),
(5, '12 inches', '990.00');

-- --------------------------------------------------------

--
-- Table structure for table `z_user`
--

CREATE TABLE `z_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'C' COMMENT 'C = Customer/A = Admin / D = Courier',
  `user_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active/I = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_user`
--

INSERT INTO `z_user` (`user_id`, `name`, `username`, `email`, `address`, `phone`, `password`, `user_type`, `user_status`) VALUES
(1, 'Suzette Buiza', 'owner', 'suzethbuizacam@gmail.com', '', '', 'zcakesince2020', 'A', 'A'),
(2, 'Sofia Mae Bibon', 'fia', 'bibon.sofia19@gmail.com', 'Ilaor Sur, Oas, Albay', '09158725246', '123456789', 'C', 'A'),
(3, 'Felipe Marshall', 'marsh', 'marsh@gmail.com', 'Iraya Norte, Oas, Albay', '09759226353', 'qwerty', 'D', 'A'),
(4, 'Mark Lee', 'maky', 'onyourmark@gmail.com', 'Ligao City', '09759226353', '123456789', 'C', 'A'),
(5, 'Clarissa Rompe', 'issa', 'rompe@gmail.com', 'Oas, Albay', '09784512235', '123456789', 'C', 'A'),
(6, 'Cheska De Lumen', 'ches', 'cheska@gmail.com', 'Legazpi City', '09654235874', '123456789', 'C', 'A'),
(7, 'Melvin Porcalla', 'melvin', 'melvin@gmail.com', 'Guinobatan, Albay', '09876543212', '123', 'C', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `z_cake_layer`
--
ALTER TABLE `z_cake_layer`
  ADD PRIMARY KEY (`layer_size_id`),
  ADD KEY `cake_size_id` (`cake_size_id`);

--
-- Indexes for table `z_cart`
--
ALTER TABLE `z_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `z_category`
--
ALTER TABLE `z_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `z_cc_filling`
--
ALTER TABLE `z_cc_filling`
  ADD PRIMARY KEY (`cc_filing_id`);

--
-- Indexes for table `z_cc_size`
--
ALTER TABLE `z_cc_size`
  ADD PRIMARY KEY (`cupcake_size_id`);

--
-- Indexes for table `z_details`
--
ALTER TABLE `z_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `user_id` (`user_id`,`category_id`,`shape_id`,`cake_size_id`,`flavor_id`,`frosting_id`,`cupcake_size_id`,`cc_filling_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `frosting_id` (`frosting_id`),
  ADD KEY `flavor_id` (`flavor_id`),
  ADD KEY `shape_id` (`shape_id`),
  ADD KEY `cake_size_id` (`cake_size_id`),
  ADD KEY `cupcake_size_id` (`cupcake_size_id`),
  ADD KEY `cc_filling_id` (`cc_filling_id`);

--
-- Indexes for table `z_flavor`
--
ALTER TABLE `z_flavor`
  ADD PRIMARY KEY (`flavor_id`);

--
-- Indexes for table `z_frosting`
--
ALTER TABLE `z_frosting`
  ADD PRIMARY KEY (`frosting_id`);

--
-- Indexes for table `z_orders`
--
ALTER TABLE `z_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `summary_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `z_products`
--
ALTER TABLE `z_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `z_shape`
--
ALTER TABLE `z_shape`
  ADD PRIMARY KEY (`shape_id`);

--
-- Indexes for table `z_size`
--
ALTER TABLE `z_size`
  ADD PRIMARY KEY (`cake_size_id`);

--
-- Indexes for table `z_user`
--
ALTER TABLE `z_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `z_cart`
--
ALTER TABLE `z_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `z_category`
--
ALTER TABLE `z_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `z_cc_filling`
--
ALTER TABLE `z_cc_filling`
  MODIFY `cc_filing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `z_cc_size`
--
ALTER TABLE `z_cc_size`
  MODIFY `cupcake_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `z_details`
--
ALTER TABLE `z_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `z_flavor`
--
ALTER TABLE `z_flavor`
  MODIFY `flavor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `z_frosting`
--
ALTER TABLE `z_frosting`
  MODIFY `frosting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `z_orders`
--
ALTER TABLE `z_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `z_products`
--
ALTER TABLE `z_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `z_shape`
--
ALTER TABLE `z_shape`
  MODIFY `shape_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `z_size`
--
ALTER TABLE `z_size`
  MODIFY `cake_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `z_user`
--
ALTER TABLE `z_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `z_cart`
--
ALTER TABLE `z_cart`
  ADD CONSTRAINT `z_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `z_user` (`user_id`),
  ADD CONSTRAINT `z_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `z_products` (`product_id`);

--
-- Constraints for table `z_orders`
--
ALTER TABLE `z_orders`
  ADD CONSTRAINT `z_orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `z_user` (`user_id`),
  ADD CONSTRAINT `z_orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `z_products` (`product_id`);

--
-- Constraints for table `z_products`
--
ALTER TABLE `z_products`
  ADD CONSTRAINT `z_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `z_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
