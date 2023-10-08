-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 06:58 PM
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
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin');

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
(19, 'janrie', 'po@gmail.com', 23232, '123', 'janrie', '123'),
(20, 'Chaz', 'chazpascual@yahoo.com', 123, 'sdasd', 'chazz', '123'),
(21, 'jericho empleo', 'po@gmail.com', 23232, 'sadad', '123', '123'),
(23, 'Janrie Veneracion', 'janrie@gmail.com', 123, 'Calocan', 'Janrie', '123'),
(24, 'jericho empleo', 'po@gmail.com', 23232, 'sadad', 'jericho', '123'),
(25, 'Levi Taguro', 'admin@gmail.com', 123, '123', 'allen', '123'),
(26, 'Levi Taguro', 'levi@gmail.combc', 123, '123', 'allen', '123'),
(27, 'Luffy D. Monkey', 'Luffy@gmail.com', 123, 'East Blue', 'Luffy', '123'),
(28, 'Taylor Swift', 'taylorswift@gmail.com', 123, 'Manila', 'Taylor', '123'),
(29, 'Raiden Shogun', 'raidenshogun@gmail.com', 123, 'Inazuma', 'Ei', '123');

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
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`mechanic_id`, `fullname`, `skill`, `username`, `email`, `password`, `address`, `mobile_number`) VALUES
(17, 'jericho empleo', 'cleaning', '123', 'jericho@gmail.com', '123', 'sadad', 23232);

-- --------------------------------------------------------

--
-- Table structure for table `services_offer`
--

CREATE TABLE `services_offer` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_offer`
--

INSERT INTO `services_offer` (`service_id`, `service_name`, `description`, `type`, `status`) VALUES
(22, '', 'sample', 'Paint', 'Active'),
(23, '', 'sample', 'Engine Repair', 'Active'),
(24, '', '2121', 'Change Oil', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `service_cost`
--

CREATE TABLE `service_cost` (
  `cost_id` int(11) NOT NULL,
  `service_cost` decimal(10,2) NOT NULL,
  `labor_cost` decimal(10,2) NOT NULL,
  `parts_cost` decimal(10,2) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `request_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `service_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_cost`
--

INSERT INTO `service_cost` (`cost_id`, `service_cost`, `labor_cost`, `parts_cost`, `total_cost`, `comment`, `request_id`, `mechanic_id`, `service_status_id`) VALUES
(19, '1.00', '2.00', '3.00', '6.00', '16', 1142, 11, 0),
(22, '1.00', '2.00', '3.00', '100.00', '121', 1144, 11, 0),
(24, '999.00', '99.00', '99.00', '999.00', '999', 1145, 5, 3);

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
  `car_problem` varchar(100) NOT NULL,
  `request_date` datetime NOT NULL,
  `completion_date` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`request_id`, `car_model`, `car_brand`, `car_reg_num`, `service_type`, `car_problem`, `request_date`, `completion_date`, `client_id`, `service_id`, `cost_id`, `status`) VALUES
(1142, 'Jhannex', 'sample', 'sample', 'Engine Repair', '0', '2023-10-08 13:20:30', '0000-00-00 00:00:00', 21, 21, 21, 1),
(1143, 'Civic', 'Honda', 'ABC123', 'Engine Repair', '0', '2023-10-08 14:41:26', '0000-00-00 00:00:00', 21, 21, 21, 1),
(1144, 'Accord', 'Toyota', 'XYZ456', 'Paint', '0', '2023-10-08 14:42:10', '0000-00-00 00:00:00', 21, 21, 21, 1),
(1145, 'VIOS', 'Toyota', '123', 'Cleaning', '0', '2023-10-08 15:35:56', '0000-00-00 00:00:00', 21, 21, 21, 4),
(1146, 'Camry', 'Toyota', 'DEF789', 'Engine Repair', '0', '2023-10-08 22:49:45', '0000-00-00 00:00:00', 28, 0, 0, 0),
(1147, 'model', 'brand', '123', 'Paint', '0', '2023-10-08 23:41:10', '0000-00-00 00:00:00', 29, 0, 0, 0),
(1148, 'janrie', 'janrie', '123', 'Paint', 'janrie', '2023-10-08 23:59:02', '0000-00-00 00:00:00', 29, 0, 0, 0),
(1149, 'Janrie', 'aa', '123', 'Paint', '0', '2023-10-09 00:15:47', '0000-00-00 00:00:00', 29, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_status`
--

CREATE TABLE `service_status` (
  `service_status_id` int(11) NOT NULL,
  `service_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_status`
--

INSERT INTO `service_status` (`service_status_id`, `service_status_name`) VALUES
(1, 'Pending'),
(2, 'Ongoing'),
(3, 'Rejected'),
(4, 'Completed');

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
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

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
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `services_offer`
--
ALTER TABLE `services_offer`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_cost`
--
ALTER TABLE `service_cost`
  ADD PRIMARY KEY (`cost_id`);

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
-- Indexes for table `service_status`
--
ALTER TABLE `service_status`
  ADD PRIMARY KEY (`service_status_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services_offer`
--
ALTER TABLE `services_offer`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_cost`
--
ALTER TABLE `service_cost`
  MODIFY `cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_history`
--
ALTER TABLE `service_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1150;

--
-- AUTO_INCREMENT for table `service_status`
--
ALTER TABLE `service_status`
  MODIFY `service_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
