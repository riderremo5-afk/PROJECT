-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2026 at 06:54 AM
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
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `from_location` varchar(100) DEFAULT NULL,
  `to_location` varchar(100) DEFAULT NULL,
  `kilometers` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `car_id`, `from_location`, `to_location`, `kilometers`, `total_price`, `status`) VALUES
(1, 1, 3, 'trichy', 'kallagam', 38, 1520.00, 'Booked'),
(2, 4, 3, 'Kallagam', 'Trichy', 36, 1440.00, 'Booked'),
(3, 4, 3, 'Kallagam', 'Trichy', 36, 1440.00, 'Booked'),
(4, 4, 3, 'Kallagam', 'Trichy', 36, 1440.00, 'Booked'),
(5, 4, 3, 'Kallagam', 'Trichy', 36, 1440.00, 'Booked'),
(6, 13, 6, 'trichy', 'kallagam', 36, 1620.00, 'Cancelled'),
(7, 13, 6, 'trichy', 'kallagam', 36, 1620.00, 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `price_per_km` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `price_per_km`, `status`, `image`) VALUES
(1, 'Swift', 15.00, 'available', 'swift.jpg'),
(2, 'Innova', 20.00, 'available', 'innova.jpg'),
(3, 'BMW', 40.00, 'available', 'bmw.jpg'),
(5, 'Audi', 30.00, 'available', 'audi.jpg'),
(6, 'BENZ', 45.00, 'available', 'benz.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`) VALUES
(1, 'jeron', 'yuvarajganesh890@gmail.com'),
(2, 'jeron', 'yuvarajganesh890@gmail.com'),
(3, 'jeron', 'yuvarajganesh890@gmail.com'),
(4, 'jeron', 'yuvarajganesh890@gmail.com'),
(5, 'jeron', 'yuvarajganesh890@gmail.com'),
(6, 'jeron', 'yuvarajganesh890@gmail.com'),
(7, 'jeron', 'yuvarajganesh890@gmail.com'),
(8, 'jeron', 'yuvarajganesh890@gmail.com'),
(9, 'jeron', 'yuvarajganesh890@gmail.com'),
(10, 'jeron', 'yuvarajganesh890@gmail.com'),
(11, 'jeron', 'yuvarajganesh890@gmail.com'),
(12, 'jeron', 'yuvarajganesh890@gmail.com'),
(13, 'jeron', 'yuvarajganesh890@gmail.com'),
(14, 'jeron', 'yuvarajganesh890@gmail.com'),
(15, 'jeron', 'yuvarajganesh890@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `message`, `rating`, `created_at`) VALUES
(1, 'jeron', '', NULL, '2026-02-19 23:02:50'),
(2, 'jeron', '', NULL, '2026-02-19 23:02:50'),
(3, 'Vasanth', 'Good', 5, '2026-02-19 23:02:50'),
(4, 'Vasanth', 'Good', 5, '2026-02-19 23:02:50'),
(5, 'marsalin', 'hi', 5, '2026-02-25 13:46:08'),
(6, 'yu', 'very good', 3, '2026-02-25 13:47:06'),
(7, 'yu', 'very good', 3, '2026-02-25 13:51:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
