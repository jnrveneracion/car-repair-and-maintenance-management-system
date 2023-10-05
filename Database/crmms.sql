-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 07:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fullname`, `email`, `mobile_number`, `address`, `username`, `password`) VALUES
(19, 'janrie', 'po@gmail.com', 23232, '123', 'janrie', '123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_assignment`
--

CREATE TABLE `job_assignment` (
  `job_assignment_id` int(11) NOT NULL,
  `job_name` text NOT NULL,
  `description` text NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `completion_date` datetime NOT NULL,
  `job_status` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `mechanic_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services_offer`
--

CREATE TABLE `services_offer` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_cost`
--

CREATE TABLE `service_cost` (
  `cost_id` int(11) NOT NULL,
  `service_type` varchar(30) NOT NULL,
  `labor_cost` decimal(10,2) NOT NULL,
  `parts_cost` decimal(10,2) NOT NULL,
  `comment` text NOT NULL,
  `service_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_history`
--

CREATE TABLE `service_history` (
  `history_id` int(11) NOT NULL,
  `service_date` datetime NOT NULL,
  `request_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `request_id` int(11) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `car_brand` varchar(20) NOT NULL,
  `car_reg_num` varchar(20) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `car_problem` text NOT NULL,
  `request_date` datetime NOT NULL,
  `completion_date` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`request_id`, `car_model`, `car_brand`, `car_reg_num`, `service_type`, `car_problem`, `request_date`, `completion_date`, `client_id`, `service_id`, `cost_id`) VALUES
(1129, 'sads', 'asa', 'asa', 'asa', '0', '2023-10-05 22:00:05', '0000-00-00 00:00:00', 1, 1, 1),
(1130, 'dsa', 'sads', 'asds', 'asd', '0', '2023-10-05 22:00:28', '0000-00-00 00:00:00', 1, 1, 1),
(1132, 'jer', 'jer', 'jer', 'jer', '0', '2023-10-05 22:00:57', '0000-00-00 00:00:00', 1, 1, 1),
(1133, 'as', 'sa', 'as', 'asdas', '0', '2023-10-05 22:02:33', '0000-00-00 00:00:00', 1, 1, 1),
(1134, 'janrie', 'jer', '12122', 'dsaas', '0', '2023-10-05 22:05:33', '0000-00-00 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `notif_id` int(11) NOT NULL,
  `mobile_num` int(11) NOT NULL,
  `message` text NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `job_assignment`
--
ALTER TABLE `job_assignment`
  ADD PRIMARY KEY (`job_assignment_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`mechanic_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `services_offer`
--
ALTER TABLE `services_offer`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_cost`
--
ALTER TABLE `service_cost`
  ADD PRIMARY KEY (`cost_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- Indexes for table `service_history`
--
ALTER TABLE `service_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `mechanic_id` (`mechanic_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `cost_id` (`cost_id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `cost_id` (`cost_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_assignment`
--
ALTER TABLE `job_assignment`
  MODIFY `job_assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_offer`
--
ALTER TABLE `services_offer`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_cost`
--
ALTER TABLE `service_cost`
  MODIFY `cost_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_history`
--
ALTER TABLE `service_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1135;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
