-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 10:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `flower_details`
--

CREATE TABLE `flower_details` (
  `flower_id` int(11) NOT NULL,
  `flower_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `delivery_available` varchar(30) DEFAULT NULL,
  `delivery_cost` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flower_details`
--

INSERT INTO `flower_details` (`flower_id`, `flower_name`, `description`, `price`, `image`, `category`, `color`, `stock_quantity`, `delivery_available`, `delivery_cost`) VALUES
(1, 'Garberas', 'Blooming Gerberas Vase', '400', 'gerberas.webp', 'Birthday', 'Pink', 35, 'YES', '30'),
(2, 'Pink Carnation Arrangement', 'Gorgeous Lilies N Carnations Basket Delight', '500', 'lilies.webp', 'Arrangements', 'Pink & White', 90, 'YES', '60'),
(3, 'Red Rose Bouquet', 'Cheerful Bouquet of Red Roses', '450', 'red_roses.webp', 'Bouquets', 'Red', 25, 'YES', '50'),
(10, 'Yellow Tulip', 'A bright and cheerful yellow tulip', '200', 'yello_tulip.jpeg', 'Tulips', 'Yellow', 24, 'YES', '60');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `address`, `mobile_no`, `email`, `password`, `city`, `photo`) VALUES
(1, 'Archi Patel', 'Amroli,Surat', 8907654320, 'archi@gmail.com', 'archi', 'Surat', 'avatar5.jpeg'),
(2, 'Alvi Kadivar', 'Morbi', 7890654321, 'alvi@gmail.com', 'alvi', 'Vapi', 'avatar7.jpeg'),
(3, 'Rinkal Parmar', 'Mansarovar,Surat', 9087654321, 'rinkal@gmail.com', 'rinkal', 'Surat', 'avatar6.jpeg'),
(6, 'Bhavya Patel', 'Amroli', 8790654321, 'bhavy@gmail.com', 'bhavya', 'Surat', 'avatar4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flower_details`
--
ALTER TABLE `flower_details`
  ADD PRIMARY KEY (`flower_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flower_details`
--
ALTER TABLE `flower_details`
  MODIFY `flower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
