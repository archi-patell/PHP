-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 02:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch_databse`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `reply` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `feedback`, `reply`) VALUES
(1, 'bhavy@gmail.com', 'Hellooo,Amazing', 'Thank You For Your Best Feedback'),
(2, 'archi@gmail.com', 'Amazing Products Thankssss', 'Thank you for Your FeedBack'),
(4, 'archi@gmail.com', 'hjhefehgjhfdgehjbcajkshdgiquwhjks', 'Please give the readable feedback');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `watch_id`, `user_id`, `brand`, `quantity`, `price`) VALUES
(1, 2, 1, 'Titan ', 2, 4000),
(2, 8, 1, 'Logues', 1, 1600),
(3, 12, 6, 'Boult', 2, 1780),
(4, 13, 6, 'Noise', 1, 2079),
(5, 7, 6, 'Logues', 1, 2030),
(6, 11, 7, 'Boult', 1, 1080),
(7, 13, 7, 'Noise', 2, 4158),
(8, 3, 3, 'Titan', 2, 4200),
(9, 10, 3, 'Logues', 1, 2010),
(10, 6, 2, 'Titan ', 1, 1090),
(11, 2, 2, 'Titan ', 1, 2000),
(12, 5, 2, 'Titan', 1, 3550),
(13, 12, 2, 'Boult', 1, 890),
(14, 14, 2, 'Noise', 1, 3000),
(15, 9, 8, 'Logues', 1, 2019);

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
(6, 'Bhavya Patel', 'Amroli', 8790654321, 'bhavy@gmail.com', 'bhavya', 'Surat', 'avatar4.jpeg'),
(7, 'Vatsal Patel', 'Sweet Home', 6789054321, 'vatsu@gmail.com', 'vatsu', 'Vapi', 'avtar2.jpeg'),
(8, 'Harshdeep Parmar', 'Mansarovar', 9870654123, 'harsh@gmail.com', 'harsh', 'Bharuch', 'avatar3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `watch_details`
--

CREATE TABLE `watch_details` (
  `watch_id` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(300) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watch_details`
--

INSERT INTO `watch_details` (`watch_id`, `brand`, `model`, `quantity`, `price`, `image`, `description`) VALUES
(1, 'Titan ', 'Regalia Analog Watch', 29, 1200, 'Regalia.webp', 'Regalia Gents IV Analog Watch - For Men RG1802SL02'),
(2, 'Titan ', 'Neo Gents IV Analog Watch', 39, 2000, 'Neo.webp', 'Neo Gents IV Analog Watch - For Men 1802SL02\r\n'),
(3, 'Titan', 'Neo Gents V Analog Watch', 59, 2100, 'Neo_v.webp', 'Neo Gents V Analog Watch - For Men NQ1805NL02'),
(4, 'Titan ', 'Karishma Analog Watch', 79, 1900, 'Kt.webp', 'Karishma Analog Watch - For Women 2598SM01'),
(5, 'Titan', 'LPURP Fashion Analog Watch', 50, 3550, 'Lapurp.webp', 'LPURP Fashion Basics Analog Watch - For Women NN2480WM02'),
(6, 'Titan ', 'NEO Ladies III Analog Watch', 5, 1090, 'Neo_1.webp', 'NEO Ladies III Analog Watch - For Women NQ2590KM02'),
(7, 'Logues', 'G 1971', 39, 2030, 'G1971.jpg', 'Elevate your style with the LOGUES G 1971 Men\'s Watch.'),
(8, 'Logues', 'G 1974', 66, 1600, 'G1974.jpg', 'Elevate your style with the LOGUES G 1974 Men\'s Watch. This analog timepiece exudes modern elegance.'),
(9, 'Logues', 'L E-799', 39, 2019, 'LE799.jpg', 'Introducing the LOGUES L E-799 CM-05 Women\'s Watch, featuring a captivating brown dial set in a roun'),
(10, 'Logues', 'L E-796', 67, 2010, 'LE796.jpg', 'Introducing the LOGUES L E-796 NM-03 Women\'s Watch, featuring a sleek black dial encased in a round '),
(11, 'Boult', 'Trail', 66, 1080, 'trail.webp', 'Curved Display Smartwatch with 2.01\"(5.10cm) HD Display, Bluetooth 5.3 HD Calling, Working Crown, Bo'),
(12, 'Boult', 'Striker Pro', 88, 890, 'Strike_pro.webp', 'Premium Round Dial Smartwatch with 1.43\"(3.63cm) AMOLED Screen, BT Calling, Health Monitor, 60Hz Ref'),
(13, 'Noise', 'Noise Twist Smart Watch', 88, 2079, 'Twist.webp', 'Noise Twist Round dial Smart Watch with Bluetooth Calling, 1.38\" TFT Display, up-to 7 Days Battery, '),
(14, 'Noise', 'Twist Smartwatch', 28, 3000, 'Twists.webp', 'Noise Twist Go Round dial Smartwatch with BT Calling, 1.39\" Display, Metal Build, 100+ Watch Faces, ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watch_details`
--
ALTER TABLE `watch_details`
  ADD PRIMARY KEY (`watch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `watch_details`
--
ALTER TABLE `watch_details`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
