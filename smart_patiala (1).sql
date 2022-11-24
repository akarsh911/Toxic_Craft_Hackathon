-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 08:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_patiala`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_complaints`
--

CREATE TABLE `city_complaints` (
  `s_no` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `comp_id` text NOT NULL,
  `department` text NOT NULL,
  `category` text NOT NULL,
  `title` text NOT NULL,
  `x-cord` text NOT NULL,
  `y-cord` text NOT NULL,
  `descrip` text NOT NULL,
  `assigned_id` text NOT NULL,
  `supervisor_id` text NOT NULL,
  `complaint_date` text NOT NULL,
  `complaint_state` text NOT NULL,
  `reg_date` text NOT NULL,
  `resource_url` text NOT NULL,
  `remarks` text NOT NULL,
  `remark_url` text NOT NULL,
  `supervisor_remark` text NOT NULL,
  `user_feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city_officials`
--

CREATE TABLE `city_officials` (
  `s_no` int(11) NOT NULL,
  `email` text NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `ph_no` text NOT NULL,
  `emp_code` text NOT NULL,
  `emp_designation` text NOT NULL,
  `emp_department` text NOT NULL,
  `assigned_jobs` text NOT NULL,
  `emp_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city_users`
--

CREATE TABLE `city_users` (
  `s_no` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` text NOT NULL,
  `psw_hash` text NOT NULL,
  `user_state` text NOT NULL,
  `dashboard_type` text NOT NULL,
  `email_verify` text NOT NULL,
  `photo_url` text NOT NULL,
  `address` text NOT NULL,
  `reg_date` text NOT NULL,
  `emp_code` text NOT NULL,
  `ph_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_users`
--

INSERT INTO `city_users` (`s_no`, `f_name`, `l_name`, `email`, `psw_hash`, `user_state`, `dashboard_type`, `email_verify`, `photo_url`, `address`, `reg_date`, `emp_code`, `ph_no`) VALUES
(1, 'Akarsh', 'Srivastava', 'akarsh91140@gmail.com', 'Premium#119', 'user', '0', '1', '', '', '', '', '9305267844');

-- --------------------------------------------------------

--
-- Table structure for table `city_verification_email`
--

CREATE TABLE `city_verification_email` (
  `s_no` int(11) NOT NULL,
  `email` text NOT NULL,
  `code` text NOT NULL,
  `date_created` text NOT NULL,
  `status` text NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logged_in`
--

CREATE TABLE `logged_in` (
  `s_no` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `email` text NOT NULL,
  `session_key` text NOT NULL,
  `ip` text NOT NULL,
  `session_state` text NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logged_in`
--

INSERT INTO `logged_in` (`s_no`, `f_name`, `email`, `session_key`, `ip`, `session_state`, `state`) VALUES
(1, 'Akarsh', 'akarsh91140@gmail.com', '4d184e02-1af4-4443-82f9-db5a08fe2588', '::1', '', 1),
(2, 'Akarsh', 'akarsh91140@gmail.com', '00f29668-bf2b-414d-8acd-42b00b2f712b', '::1', '', 1),
(3, 'Akarsh', 'akarsh91140@gmail.com', '4b0e0abf-5fe6-4eab-87f2-40d46b3186f7', '::1', '', 1),
(4, 'Akarsh', 'akarsh91140@gmail.com', 'b271fd8e-94d6-4b5d-b0b5-86fd715aa6ca', '::1', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_complaints`
--
ALTER TABLE `city_complaints`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `city_officials`
--
ALTER TABLE `city_officials`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `city_users`
--
ALTER TABLE `city_users`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `city_verification_email`
--
ALTER TABLE `city_verification_email`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `logged_in`
--
ALTER TABLE `logged_in`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_complaints`
--
ALTER TABLE `city_complaints`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_officials`
--
ALTER TABLE `city_officials`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_users`
--
ALTER TABLE `city_users`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_verification_email`
--
ALTER TABLE `city_verification_email`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logged_in`
--
ALTER TABLE `logged_in`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
