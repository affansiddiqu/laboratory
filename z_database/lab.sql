-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 09:40 PM
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
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Rizwan Ansari', '$2y$10$b4d5cofleYsgpNAUlW36ZOLgJHlOyDOiWq0PDmT1TGwccVUajgJBS');

-- --------------------------------------------------------

--
-- Table structure for table `alishba`
--

CREATE TABLE `alishba` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alishba`
--

INSERT INTO `alishba` (`id`, `name`, `password`) VALUES
(1, '', '$2y$10$vgDZzmNFXwogsoR1RvZua.3oWogtjqUAwGcXGEZW.iY.2W5J33EEa'),
(2, 'Alishba', '$2y$10$DzXhHGg/L0vnsW7QpPbBeefwp9mKhrXIJZcYUlxMiDiTqqhhQJh.K');

-- --------------------------------------------------------

--
-- Table structure for table `foc_data`
--

CREATE TABLE `foc_data` (
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `investigation` text NOT NULL,
  `refered_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foc_data`
--

INSERT INTO `foc_data` (`name`, `date`, `age`, `sex`, `investigation`, `refered_by`, `status`, `id`) VALUES
('uyiu', '2024-12-22', 986, 'Male', 'kjkjh', 'hjkhkjh', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `investigation` text NOT NULL,
  `refered_by` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `advance_payment` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `wealfare` varchar(255) NOT NULL,
  `balance_due` int(11) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `date`, `name`, `age`, `sex`, `investigation`, `refered_by`, `total_amount`, `advance_payment`, `discount`, `wealfare`, `balance_due`, `received_by`, `status`) VALUES
(4995, '2024-12-17', 'Mariym', 32, 'Female', 'test ha koi', 'dr affankhn', 9000, 990, 77, 'no', 3000, 'Hamza', 1),
(4999, '2024-12-26', 'Affan', 19, 'Male', 'Test uha', 'dr abdul qader ', 12000, 100, 100, '200', 111, 'Rizwan Sheikh', 1),
(5000, '2024-12-24', 'nawaz', 78, 'Male', 'bioscopy', 'dr subhan', 7890, 78, 899, 'no', 97, 'Alishba', 1),
(5001, '2024-12-19', 'alina', 89, 'Female', 'test', 'dr sufyn', 7890, 890, 8, 'no', 2390, 'Rizwan Ansari', 1),
(5002, '2025-01-01', 'omair', 8, 'Male', 'kl', 'bkbk', 8, 99, 9, '9', 99, 'Rizwan Ansari', 1),
(5004, '2025-01-02', 'nnjn', 9, 'Male', 'knkj', 'hhh', 989, 989, 89889, '787', 88, 'Rizwan Ansari', 1),
(5005, '2024-12-12', 'affan', 9, 'Male', 'k', 'dr affankhn', 8, 787, 3, '76', 66, 'Hamza', 1),
(5007, '2024-12-21', 'klkj', 898, 'Male', 'kjkj', 'huh', 8798, 787, 7, '7979', 978, 'Rizwan Ansari', 1),
(5008, '2024-12-21', 'kjjkuhgy', 987689, 'Male', 'khy98', 'uihkuhu', 9879, 798797, 89798, '7897', 87, 'Rizwan Ansari', 1),
(5009, '2024-12-22', 'gygu', 878, 'Male', 'hh', 'hhjh', 76, 76, 76, '5555', 5656, 'Hamza', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hamza`
--

CREATE TABLE `hamza` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hamza`
--

INSERT INTO `hamza` (`id`, `name`, `password`) VALUES
(1, '', '$2y$10$0ccFExCXuMmLUUtRmgLJhOPUjKsL.hVf0FB6DfHhkeHtJkkMbwnI2'),
(2, 'Hamza', '$2y$10$7vVxjrBAqWgZYLa6fDa4CeKJa3GOP5hpc4QWJkMSaJTLtdQ48iKQy'),
(3, 'Hamza', '$2y$10$r5zoa0XrquGGQ.HUU6ZDFuh/G/gWoLwNwr9FgtyEVVWzl4QkgKrX.');

-- --------------------------------------------------------

--
-- Table structure for table `rizwan`
--

CREATE TABLE `rizwan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rizwan`
--

INSERT INTO `rizwan` (`id`, `name`, `password`) VALUES
(1, 'Rizwan Shiekh', '$2y$10$gxgsrd8V7KfnK3UUaeSQUuy/gnbTbbCd/ZAPEuKMma4nwXiE.vxdq'),
(2, 'Rizwan Sheikh', '$2y$10$f9JcK/IwNliLW/mqTrk6fu9kCiNH9TiZSwKW2DVBWwsInEisAtTTO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alishba`
--
ALTER TABLE `alishba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foc_data`
--
ALTER TABLE `foc_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hamza`
--
ALTER TABLE `hamza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rizwan`
--
ALTER TABLE `rizwan`
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
-- AUTO_INCREMENT for table `alishba`
--
ALTER TABLE `alishba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foc_data`
--
ALTER TABLE `foc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5010;

--
-- AUTO_INCREMENT for table `hamza`
--
ALTER TABLE `hamza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rizwan`
--
ALTER TABLE `rizwan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
