-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 07:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saplingo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'Admin123', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `location` text NOT NULL,
  `phone` bigint(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `totalprice` double NOT NULL,
  `status` text NOT NULL,
  `dateOfOrder` date NOT NULL DEFAULT current_timestamp(),
  `timeOfOrder` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `item_id`, `uid`, `firstname`, `lastname`, `location`, `phone`, `email`, `totalprice`, `status`, `dateOfOrder`, `timeOfOrder`) VALUES
(49, 8, 1, 'Amal', 'Aravind', 'Destination 4', 8590424095, 'yokixo8131@cdeter.co', 2520, 'placed', '2023-11-16', '20:46:51'),
(50, 8, 5, 'Amal', 'Aravind', 'Destination 2', 9657842462, 'yokixo8131@cdeter.co', 2520, 'placed', '2023-11-16', '20:46:51'),
(51, 5, 5, 'Aravind', 'Biju', 'Destination 1', 9657842462, 'abaravind78@gmail.co', 319, 'placed', '2023-11-16', '21:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `SI_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `Simage` longblob NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`SI_id`, `uid`, `Simage`, `item_name`, `quantity`, `description`, `unit_price`) VALUES
(5, 1, 0x75706c6f6164732f636f636f6e75742e6a7067, 'Coconut', 4, 'The greatest coconut ever made', 299),
(6, 1, 0x75706c6f6164732f70372e6a706567, 'Mango', 20, 'Mango which is yellow in color', 199),
(7, 1, 0x75706c6f6164732f70372e6a706567, 'Mango', 20, 'Mango which is yellow in color', 199),
(8, 1, 0x75706c6f6164732f706c616e74312e706e67, 'Zamioculcas-zamiifolia', 4, 'Good quality', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `travel_schedule`
--

CREATE TABLE `travel_schedule` (
  `ts_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `starting_time` time NOT NULL,
  `details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_schedule_stops`
--

CREATE TABLE `travel_schedule_stops` (
  `tss_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `stop_loc` text NOT NULL,
  `eta` time NOT NULL,
  `tod` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `username`, `password`, `status`) VALUES
(1, 'Aravind Biju', 'abaravind61@gmail.co', 'Aravindan', '1234', 1),
(3, 'Arun Suru', 'abcde@gmail.com', 'Arun', '1234', 1),
(4, 'Elias Raju', 'yokixo8131@cdeter.co', 'Eliasraju1234', '1234', 1),
(5, 'Amal Aravind', 'aa416@gmail.com', 'amal123', '12345', 1),
(7, 'Jesse Pinkman', 'yokixo8131@cdeter.co', 'jesse234', '1234', 1),
(8, 'Elias Raju', 'abaravind78@gmail.co', 'elias17', 'elias17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `id` (`item_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`SI_id`),
  ADD KEY `uid-sales_item relation` (`uid`);

--
-- Indexes for table `travel_schedule`
--
ALTER TABLE `travel_schedule`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `travel_schedule_stops`
--
ALTER TABLE `travel_schedule_stops`
  ADD PRIMARY KEY (`tss_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `SI_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `travel_schedule`
--
ALTER TABLE `travel_schedule`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_schedule_stops`
--
ALTER TABLE `travel_schedule_stops`
  MODIFY `tss_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `id` FOREIGN KEY (`item_id`) REFERENCES `sales_items` (`SI_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD CONSTRAINT `uid-sales_item relation` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
