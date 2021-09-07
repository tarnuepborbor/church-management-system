-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 04:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership_table`
--

CREATE TABLE `membership_table` (
  `id` int(11) NOT NULL,
  `mem_pic` varchar(225) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `home_or_city` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `matital_status` varchar(50) NOT NULL,
  `btsml_status` varchar(50) NOT NULL,
  `former_reg` varchar(100) NOT NULL,
  `prev_church` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `phy_status` varchar(100) NOT NULL,
  `member_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_table`
--

INSERT INTO `membership_table` (`id`, `mem_pic`, `fName`, `mName`, `lName`, `sex`, `dob`, `occupation`, `entity`, `country`, `county`, `province`, `home_or_city`, `nationality`, `email`, `address`, `matital_status`, `btsml_status`, `former_reg`, `prev_church`, `contact`, `department`, `phy_status`, `member_id`) VALUES
(2, '17b9d591a613825c4c308c0af402205e_195591877_189551336389911_248377396084548992_n.jpg', 'Jassa', 'K', 'Dorley', 'F', '2021-07-25', 'Student', 'AGM', 'Liberia', 'Lofa', 'montserrado', 'Monrovia', 'Liberian', 'james@gmail.com', 'new georgia', 'single', 'unbaptised', 'christainity', 'Baptist Church', '88888888', 'usher', 'physically_fit', '82159'),
(3, '4d132f623d75898b7ef32ca59dd43e1a_7_n.jpg', 'Princess ', 'K', 'Tamba', 'F', '2021-07-01', 'Student', 'JPS', 'Liberia', 'Lofa', 'montserrado', 'Zorzor', 'Liberian ', 'jamkidj@gmail.com', 'New Georgia Gulf', 'single', 'baptised', 'christainity', 'God has done it', '755777447', 'women', 'physically_fit', '74858'),
(5, '71377fff34d0988413ef35ba27059a0b_7_n.jpg', 'Hannah ', 'P', 'Forkpa', 'F', '2021-07-24', 'Student', 'JPs', 'liberia', 'Lofa', 'montserrado', 'Zorzor', 'Liberian', 'forkpa@gmail.com', 'new georgia estate', 'divorce', 'unbaptised', 'christainity', 'God is able', '7777777777', 'media', 'physically_fit', '71124');

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `id` int(225) NOT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `payment_for` varchar(100) NOT NULL,
  `paymentDate` date NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`id`, `recorded_by`, `currency`, `amount`, `payment_for`, `paymentDate`, `member_id`, `description`) VALUES
(1, 'admin', 'LRD', 200, 'tithe', '2021-07-26', '82159', ''),
(3, 'admin', 'LRD', 100, 'past_appre', '2021-07-26', '82159', ''),
(6, 'admin', 'USD', 250, 'past_appre', '2021-07-22', '71124', ''),
(9, 'admin', 'LRD', 200, 'expenditure', '2021-08-06', '1000001', 'Buying of fuel'),
(10, 'admin', 'USD', 200, 'expenditure', '2021-08-06', '1000001', 'Transportation'),
(11, 'admin', 'USD', 400, 'Income', '2021-08-01', '1000001', 'first service collection'),
(12, 'admin', 'LRD', 200, 'pledge', '2021-08-01', '71124', ''),
(13, 'admin', 'LRD', 300, 'Income', '2021-07-24', '1000001', 'Sale of water');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(225) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userType` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pic` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `userType`, `phone`, `password`, `pic`) VALUES
(1, 'Tarnue P. Borbor', 'admin@gmail.com', '', '775577736', 'america', 'a827d72b78fe632dd470fe5703def944_4.png'),
(10, 'Princess Mark', 'princess@gmail.com', 'ordinary', 'kollie', 'kollie', '062af3fd6944e667192404197b553339_hero-home-img3-2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership_table`
--
ALTER TABLE `membership_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership_table`
--
ALTER TABLE `membership_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
