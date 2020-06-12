-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 08:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `ItemName` varchar(30) NOT NULL,
  `RestroName` varchar(40) NOT NULL,
  `RestroId` varchar(20) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `id` int(100) NOT NULL,
  `Type` varchar(15) NOT NULL DEFAULT 'Veg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`ItemName`, `RestroName`, `RestroId`, `Image`, `Price`, `id`, `Type`) VALUES
('Mojito', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 300, 1, 'Veg'),
('Fries', 'WoodBox', 'Sid', 'https://images.unsplash.com/photo-1564115895597-a15f0cfb1ebc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', 200, 2, 'Veg'),
('Beach Bum', 'Xero Deegres', 'Xero', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 400, 3, 'Veg'),
('Burger', 'Xero', 'Xero', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 500, 4, 'Veg'),
('Pasta', 'Xero Deegres', 'Xero', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 400, 5, 'Veg'),
('Mojito', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 400, 6, 'Veg'),
('Burger', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 300, 7, 'Veg'),
('Brownie', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 200, 8, 'veg'),
('pastry', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 200, 9, 'nonveg'),
('Dosa', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 100, 10, 'veg'),
('pasta', 'qd', 'Siddhant', 'https://images.unsplash.com/photo-1516684036235-c9c6455d7e83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80', 200, 11, 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `RestroId` varchar(20) NOT NULL,
  `FoodItem` varchar(50) NOT NULL,
  `Price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `Username`, `Address`, `RestroId`, `FoodItem`, `Price`) VALUES
(1, 'SiddhantSharma.ss', 'Hno 134/9 ward no 6\r\nNear ice factory heerpur', 'Sid', 'Mojito', '200'),
(2, 'SiddhantSharma.ss', 'hno - 134/9', 'Siddhant', 'Pasta', '500'),
(6, 'Siddhantsharma.ss', 'Hno 134/9 ward no 6, Near ice factory heerpur', 'Xero', 'Beach Bum                        ', '1200'),
(7, 'Siddhantsharma.ss', 'Hno 134/9 ward no 6, Near ice factory heerpur', 'Siddhant', 'Mojito                        ', '300'),
(8, 'Siddhantsharma.ss', 'Hno 134/9 ward no 6, Near ice factory heerpur', 'Siddhant', 'Mojito                        ', '300'),
(9, 'Siddhantsharma.ss', 'Hno 134/9 ward no 6, Near ice factory heerpur', 'Xero', 'Beach Bum                        ', '400');

-- --------------------------------------------------------

--
-- Table structure for table `restro`
--

CREATE TABLE `restro` (
  `RestroName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restro`
--

INSERT INTO `restro` (`RestroName`, `Username`, `Email`, `PhoneNumber`, `Password`) VALUES
('Bansi Wala', 'Bansiii', 'Banshiz@gmail.com', '0988251344', 'Sidd'),
('Shake It Up', 'Shake123', 'Shake@gmail.com', '0988251344', 'Siddhant'),
('WoodBox', 'Sid', 'Sidh@gmail.com', '0988251344', 'Hello'),
('qd', 'Siddhant', 'Siddhantsharma615@gmail.com', '0988251344', 'Hello'),
('Xero Deegres', 'Xero', 'Xero@gmail.com', '9882513449', 'Xero');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `FoodPref` varchar(10) NOT NULL DEFAULT 'Veg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Firstname`, `Lastname`, `username`, `email`, `password`, `FoodPref`) VALUES
('Siddhant', 'Sharma', 'Hellllo', 'Sid@gmail.com', 'kla;ldk', 'Veg'),
('S', 's', 'Siddhantsharma.sdd', 'Siddhantsharma61sd5@gmail.com', 'Ssfd', 've'),
('Siddhant', 'Sharma', 'Siddhantsharma.ss', 'Siddhantsharma615@gmail.com', 'Siddhant', 'Veg'),
('Siddhant', 'Sharma', 'test', 'Siddhantsharm23a615@gmail.com', 'test', 'veg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Restro Id` (`RestroId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `RestroId` (`RestroId`);

--
-- Indexes for table `restro`
--
ALTER TABLE `restro`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_items`
--
ALTER TABLE `food_items`
  ADD CONSTRAINT `food_items_ibfk_1` FOREIGN KEY (`RestroId`) REFERENCES `restro` (`Username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`RestroId`) REFERENCES `restro` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
