-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 11:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `unit_price` int(11) NOT NULL,
  `product_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`SI_id`, `uid`, `Simage`, `item_name`, `quantity`, `description`, `unit_price`, `product_id`) VALUES
(21, 1, 0x75706c6f6164732f6272312e6a706567, 'Arun', 5, '0', 400, '222'),
(22, 1, 0x75706c6f6164732f62722e6a7067, 'biju', 4, '0', 400, '2321'),
(25, 1, 0x75706c6f6164732f7065612e6a7067, 'amal', 2, '0', 200, '2229'),
(26, 1, 0x75706c6f6164732f6b6b6b2e6a7067, 'zeus', 5, 'good', 300, '');

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
(8, 'Elias Raju', 'abaravind78@gmail.co', 'elias17', 'elias17', 1),
(11, 'Arun Suresh', 'abcdef@gmail.com', 'Arun sure', '$2y$10$dz0AvhaC56R7W', 1),
(12, 'Arun Suresh', 'arunsuresh09876@gmai', 'Arun2', 'asdfgh', 1),
(14, 'sdfghj', 'amal@123', 'arun123', '1234', 1),
(15, 'Arun Suresh', 'abin123@gmail.com', 'abin123', '1234', 1),
(16, 'Arun Suresh', 'arunsuresh76@gmail.c', 'arun@123', 'sdfgh', 1),
(17, 'Arun Suresh', 'arunsuresh746@gmail.', 'arun@1234', 'sdfgh', 1),
(18, 'Arun Suresh', 'arunsu876@gmail.com', 'arun sureshg', 'sdfgh', 1),
(19, 'amal', 'amalbiju123@gmail.co', 'amal biju', '1234', 1),
(20, 'Arun Suresh', 'arunsures@gmail.com', 'arun sureshhh', 'nnnn', 1),
(21, 'Arun Suresh', 'arunsuresh09876@gmai', 'arunsuresh09876@gmai', 'asdfgh', 1),
(22, 'Arun Suresh', 'arunsuresh098765@gma', 'arunsdfghj', 'asdf', 1),
(23, 'Arun Suresh', 'arunsuresh09876tty@g', 'arun sureshdsa', 'jhgty', 1),
(24, 'Arun Suresh', 'arunsuresh09876ttkky', 'arun sureshdsabm', 'tgff', 1),
(25, 'Arun Suresh', 'arunvbsuresh09876@gm', 'Arun bbn', 'vv', 1),
(26, 'Gaya', 'Gaya@123', 'gayathriArun', 'Gaya123', 1);

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
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `SI_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
