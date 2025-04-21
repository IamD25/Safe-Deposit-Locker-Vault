-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 12:12 PM
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
-- Database: `saftylocker`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_lockers`
--

CREATE TABLE `assign_lockers` (
  `account_no` int(10) NOT NULL,
  `locker` int(10) NOT NULL,
  `key_no` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `renew_date` date NOT NULL,
  `deposite` int(6) NOT NULL,
  `rent` int(6) NOT NULL,
  `entry_fee` int(6) NOT NULL,
  `locker_size` varchar(20) NOT NULL,
  `locker_type` varchar(20) NOT NULL,
  `locker_sizex` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tsstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_lockers`
--

INSERT INTO `assign_lockers` (`account_no`, `locker`, `key_no`, `start_date`, `renew_date`, `deposite`, `rent`, `entry_fee`, `locker_size`, `locker_type`, `locker_sizex`, `user_id`, `tsstamp`) VALUES
(123, 123, 123, '2024-09-07', '2025-03-05', 3000, 500, 500, 'Large', 'FR	', '20x18x21', 21, '2024-09-14 22:53:57'),
(124, 124, 124, '2024-09-07', '2024-09-03', 4000, 500, 700, 'Medium', 'G1', '08x21x21', 22, '2024-09-14 23:38:03'),
(2024, 201025, 201025, '2024-10-03', '2025-09-30', 5000, 500, 1000, 'Large', 'FR', '20x18x21', 10, '2024-10-03 11:44:52'),
(202401, 100301, 100301, '2024-10-03', '2024-09-30', 5000, 500, 1000, 'Medium', 'G1', '08x21x21', 41, '2024-10-03 14:57:51'),
(20240905, 6082105, 6082105, '2024-09-13', '2025-09-12', 7000, 500, 500, 'Small', 'A', '05x07x21', 20, '2024-09-13 23:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `inouttransaction`
--

CREATE TABLE `inouttransaction` (
  `srno` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `locker_no` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inouttransaction`
--

INSERT INTO `inouttransaction` (`srno`, `date`, `locker_no`, `account_no`, `in_time`, `out_time`, `user_id`) VALUES
(7, '2024-09-25', 123, 123, '18:30:00', '18:40:00', 0),
(8, '2024-09-26', 123, 123, '09:20:00', '09:25:00', 0),
(9, '2024-09-28', 20182103, 2024092801, '14:40:00', '14:50:00', 0),
(10, '2024-10-02', 124, 124, '14:35:00', '14:40:00', 0),
(11, '2024-10-02', 124, 124, '18:40:00', '18:50:00', 0),
(12, '2024-10-02', 124, 124, '19:01:00', '19:11:00', 0),
(13, '2024-10-02', 124, 124, '20:15:00', '20:25:00', 22),
(14, '2024-10-03', 123, 123, '11:15:00', '11:20:00', 21),
(15, '2024-10-04', 123, 123, '09:07:00', '09:11:00', 21),
(16, '2024-10-18', 123, 123, '23:15:00', '23:16:00', 21),
(17, '2025-03-12', 201025, 2024, '10:50:00', '11:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `locker_details`
--

CREATE TABLE `locker_details` (
  `locker_id` int(10) NOT NULL,
  `locker_size` varchar(15) NOT NULL,
  `locker_price` int(10) NOT NULL,
  `avilable_lockers` int(10) NOT NULL,
  `assign_lockers` int(10) NOT NULL,
  `maintanance_lockers` int(10) NOT NULL,
  `total_lockers` int(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locker_details`
--

INSERT INTO `locker_details` (`locker_id`, `locker_size`, `locker_price`, `avilable_lockers`, `assign_lockers`, `maintanance_lockers`, `total_lockers`, `timestamp`) VALUES
(1, 'Medium', 5000, 8, 5, 1, 14, '2024-08-29 21:47:52'),
(9, 'Small', 3000, 10, 1, 0, 11, '2024-09-04 15:26:47'),
(11, 'Large', 10000, 10, 2, 0, 12, '2024-10-03 11:19:15'),
(13, 'test', 5, 1, 2, 3, 6, '2024-10-21 16:48:10'),
(14, 'Medium', 10000, 0, 0, 0, 0, '2025-03-09 11:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `account_no`, `amount`, `payment_date`, `due_date`, `payment_status`, `payment_method`, `tstamp`) VALUES
(12, 20, 20240905, 500, '2024-10-01', '2024-10-31', 'Paid', 'Cash', '2024-10-01 22:05:33'),
(13, 10, 2024092801, 800, '2024-10-01', '2024-10-31', 'Paid', 'UPI', '2024-10-01 22:06:04'),
(14, 22, 124, 11, '2024-10-01', '2024-10-31', 'Paid', 'Card', '2024-10-01 22:11:43'),
(15, 21, 123, 123, '2024-10-03', '2024-10-31', 'Due', 'Payment Method', '2024-10-03 11:14:25'),
(16, 21, 123, 500, '2024-10-19', '2024-10-31', 'Select', 'Payment Method', '2024-10-19 15:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `role` varchar(10) NOT NULL,
  `locker_size` varchar(10) NOT NULL,
  `locker_type` varchar(10) NOT NULL,
  `locker_sizex` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `username`, `fullname`, `email`, `password`, `contact`, `gender`, `dob`, `address`, `city`, `state`, `pincode`, `role`, `locker_size`, `locker_type`, `locker_sizex`, `status`, `tstamp`) VALUES
(6, 'Meghna', 'Meghna Adtia', 'meghna1313@gmail.com', '$2y$10$8Znt/bPPUhCae4glsHueqOYfvQLIMtKYiMtvQLY/POUnrPkZ8M5nu', 7990349974, 'Female', '2005-06-13 00:00:00', 'Shreeji Nagri', 'Surat', 'Gujarat', 395009, 'admin', 'Medium', 'G1', '06x08x21', 'Aproved', '2024-09-10 13:16:44'),
(8, 'Divyanshu', 'Divyanshu Morker', 'Divyanshu3950@gmail.com', '$2y$10$dizQB9/qaiaNM1UYrbgbmOUfvLyIzzvpFl6CKt9xVq59eAvY8a2aG', 9925792642, 'Male', '2024-09-24 00:00:00', '3, Anand Nagar Socity Gala-type', 'Surat', 'Gujarat', 395005, 'admin', 'Small', 'B', '06x08x21', 'Aproved', '2024-09-10 13:35:52'),
(9, 'Avinash', 'Avinash Panchal', 'avi4634@gmail.com', '$2y$10$a0XVWBpqrXKt3gOxBVsHUODB7Vh1gqCTIdZt.VHYgrNCIbljyzPYO', 8866096839, 'Male', '2024-09-09 00:00:00', '1243, Javahar Faliyu, Mor, olpad, surat', 'Surat', 'Gujarat', 394530, 'user', 'Small', 'B', '06x08x21', 'Aproved', '2024-09-13 22:15:16'),
(10, 'Meghna', 'Meghna Adatia', 'meghnaadatia8044@gmail.com', '$2y$10$KUxLvB5aRaKvJed8gyY8gOZY8NChie8eV8MkrPrMQjtpYDqR3sr9G', 7990349974, 'Female', '2005-06-13 00:00:00', '13 Shreeji nagari, Ugat, Bhesan road', 'Surat', 'Gujarat', 395009, 'admin', 'Large', 'FR', '20x18x21', 'Aproved', '2024-09-14 22:31:31'),
(11, 'Dev', 'Dev Patel', 'devp3950@gmail.com', '$2y$10$moyJAzU5tQjWLjfe5zIETe86c227YCt0ZvWkqxwQw/w/OHz642RD6', 91865, 'Male', '2003-04-28 00:00:00', 'ugat', 'Surat', 'Gujarat', 395009, 'user', 'Medium', 'G1', '08x21x21', 'Aproved', '2024-09-14 23:37:10'),
(19, 'Vishnu', 'Vishnu Kelawala', 'Bonny123@gmail.com', '$2y$10$VTvF190RFnUuEXH9vKHGy.jSebHfRh29.xKAr4m8j/45OdRu7toge', 9512100083, 'Male', '2004-08-09 00:00:00', 'PANCH PIPLA STREET 2/452', 'Surat (M Corp.) (Par', 'AMBAJI TEMPLE, RANDE', 395005, 'user', 'Medium', 'G1', '08x21x21', 'Pending', '2024-10-01 13:48:56'),
(20, 'Divyanshu', 'Divyanshu Morkar', 'devp3950@gmail.com', '$2y$10$RMlzfgqBiGVVS7oydD3PQueRynKTWCN3eyvMzs8mH42Xdb4p2cB0y', 9925792642, 'Female', '2024-10-14 00:00:00', 'Nanpura', 'Jahangirabad', 'AMBAJI TEMPLE, RANDE', 395005, 'user', 'Medium', 'G1', '08x21x21', 'Rejected', '2024-10-20 21:04:40'),
(21, 'Divyanshu', 'Divyanshu Morker', 'Divyanshu3950@gmail.com', '$2y$10$LNQ5ATiVFuX28MpqzU9RCecIdKpjPSnTYkX89eAPWpI.R4P7JFgSq', 9925792642, 'Male', '2025-03-19 00:00:00', '3, Anand Nagar Socity Gala-type', 'Surat', 'Gujarat', 395005, 'user', 'Small', 'B', '06x08x21', 'Pending', '2025-03-09 15:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(155) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `request_id` int(10) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp(),
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `password`, `contact`, `gender`, `dob`, `address`, `city`, `state`, `pincode`, `role`, `status`, `request_id`, `tstamp`, `action`) VALUES
(10, 'Divyanshu', 'Divyanshu Morker', 'divyanshu3950@gmail.com', '$2y$10$qlP1mqPEKM2IDNm1cTtmZedWJtsYzNARCepxl2ZCLHcPeJby7nEjG', 9925792642, 'Male', '2004-10-25', '3, Anand Nagar Socity Gala-type', 'Surat', 'Gujarat', 395005, 'admin', 'Active', 8, '2024-09-10 13:37:10', ''),
(20, 'Avinash', 'Avinash Panchal', 'avi4634@gmail.com', '$2y$10$RZNHoPBLMZNz.vth4ttfOuKjQQywyrB70Kjx4smfrtJTzn0Rb0lqy', 8866096839, 'Male', '2024-09-09', '1243, Javahar Faliyu, Mor, olpad, surat', 'Surat', 'Gujarat', 394530, 'user', 'Active', 9, '2024-09-13 23:32:41', ''),
(21, 'Meghna', 'Meghna Adatia', 'meghnaadatia8044@gmail.com', '$2y$10$Tb7PCrz7DQuwMbSFw6jzLOMfYYCMHOzMDgV1e/49HFhC6y0M5oEiO', 7990349974, 'Female', '2005-06-13', '13 Shreeji nagari, Ugat, Bhesan road', 'Surat', 'Gujarat', 395009, 'admin', 'Active', 10, '2024-09-14 22:53:57', ''),
(22, 'Dev', 'Dev Patel', 'devp3950@gmail.com', '$2y$10$THqXrFG4770PcxcnnmXLiu5yd.sWCX8zg1ikjbAJx1g0S1fbRM3fa', 91865, 'Male', '2003-04-28', 'ugat', 'Surat', 'Gujarat', 395009, 'user', 'Active', 11, '2024-09-14 23:38:03', ''),
(41, 'Meghna', 'Meghna Adtia', 'meghna1313@gmail.com', '$2y$10$Mql8mYxgocA6K8Gv/BG8/.QhRutSgAYzabKJwhe6ujLvC5NwLdhC2', 7990349974, 'Female', '2005-06-13', 'Shreeji Nagri', 'Surat', 'Gujarat', 395009, 'admin', 'Active', 6, '2024-10-03 14:57:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_lockers`
--
ALTER TABLE `assign_lockers`
  ADD PRIMARY KEY (`account_no`),
  ADD UNIQUE KEY `key_no` (`key_no`),
  ADD UNIQUE KEY `locker` (`locker`),
  ADD UNIQUE KEY `id` (`user_id`);

--
-- Indexes for table `inouttransaction`
--
ALTER TABLE `inouttransaction`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `locker_details`
--
ALTER TABLE `locker_details`
  ADD PRIMARY KEY (`locker_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `userID` (`user_id`),
  ADD KEY `accountNO` (`account_no`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `request_id` (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inouttransaction`
--
ALTER TABLE `inouttransaction`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `locker_details`
--
ALTER TABLE `locker_details`
  MODIFY `locker_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
