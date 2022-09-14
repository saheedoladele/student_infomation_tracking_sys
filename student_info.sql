-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 03:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `accademic_tbl`
--

CREATE TABLE `accademic_tbl` (
  `id` int(11) NOT NULL,
  `matricno` varchar(20) NOT NULL,
  `gpa` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accademic_tbl`
--

INSERT INTO `accademic_tbl` (`id`, `matricno`, `gpa`, `level`) VALUES
(2, '002', '3.5', 'ND');

-- --------------------------------------------------------

--
-- Table structure for table `extra_tbl`
--

CREATE TABLE `extra_tbl` (
  `id` int(11) NOT NULL,
  `matricno` varchar(20) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `details` varchar(360) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_tbl`
--

INSERT INTO `extra_tbl` (`id`, `matricno`, `remark`, `details`, `date_created`) VALUES
(2, '002', 'Award Wining', 'Worn an award of excellent', '2020-10-20 21:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `id` int(11) NOT NULL,
  `matricno` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `parent_name` varchar(70) NOT NULL,
  `relationship` varchar(30) NOT NULL,
  `parent_address` varchar(100) NOT NULL,
  `parent_phoneno` varchar(30) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `matricno`, `surname`, `othername`, `gender`, `phoneno`, `email`, `address`, `department`, `level`, `dob`, `parent_name`, `relationship`, `parent_address`, `parent_phoneno`, `date_registered`) VALUES
(1, '001', 'Saheed', 'Adekunle', 'Male', '09088998887', 'saheedbaba@gmail.com', '', 'Computer Science', 'ND', '2020-10-22', '', 'Father', '', '', '2020-10-20 12:56:20'),
(2, '002', 'Saheed', 'Adekunle', 'Male', '09088998887', 'saheedbaba@gmail.com', '', 'Computer Science', 'ND', '2020-10-22', 'Saka', 'Father', 'aleshinloye', '09088776655', '2020-10-20 12:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accademic_tbl`
--
ALTER TABLE `accademic_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_tbl`
--
ALTER TABLE `extra_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricno` (`matricno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accademic_tbl`
--
ALTER TABLE `accademic_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extra_tbl`
--
ALTER TABLE `extra_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
