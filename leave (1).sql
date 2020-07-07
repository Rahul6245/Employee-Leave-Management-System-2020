-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 05:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `emp` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phn` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `type` varchar(120) NOT NULL,
  `start` date NOT NULL DEFAULT current_timestamp(),
  `end` date NOT NULL,
  `status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `name`, `emp`, `email`, `phn`, `username`, `type`, `start`, `end`, `status`) VALUES
(11, 'Rahul Biswas', 'id2000020', 'biswasrb2000@gmail.com', '9585464906', 'rahul', 'Official', '2020-06-23', '2020-06-24', 'Approved'),
(12, 'Rahul Biswas', 'id2000020', 'biswasrb2000@gmail.com', '9585464906', 'rahul', 'Emergency', '2020-06-26', '2020-06-28', 'Unapproved'),
(13, 'Shivam Thaparia', 'id2000024', 'shivam.taparia26@gmail.com', '01726368989', 'shivam', 'Sick', '2020-06-24', '2020-06-27', 'Approved'),
(14, 'Rahul Biswas', 'id2000020', 'biswasrb2000@gmail.com', '9585464906', 'rahul', 'Emergency', '2020-06-26', '2020-06-28', 'Approved'),
(15, 'Shaikat Das Joy', 'id2000021', 'shaikat21@gmail.com', '01853392377', 'shaikat', 'Sick', '2020-06-25', '2020-06-27', 'Approved'),
(16, 'Shivam Thaparia', 'id2000024', 'shivam.taparia26@gmail.com', '01726368989', 'shivam', 'Emergency', '2020-06-24', '2020-06-26', 'Unapproved'),
(17, 'Shivam Thaparia', 'id2000024', 'shivam.taparia26@gmail.com', '01726368989', 'shivam', 'Sick', '2020-06-24', '2020-06-25', 'Approved'),
(18, 'Rahul Biswas', 'id2000020', 'biswasrb2000@gmail.com', '9585464906', 'rahul', 'Sick', '2020-06-28', '2020-06-30', 'Approved'),
(19, 'Nisha Gupta', 'id2000023', 'nisha10000@gmail.com', '01671102108', 'nisha', 'Sick', '2020-06-26', '2020-06-28', 'Approved'),
(20, 'Puja Nath', 'id2000026', 'durjoy45@gmail.com', '01671102108', 'puja', 'Sick', '2020-06-28', '2020-06-30', 'Approved'),
(21, 'Dipta Devnath', 'id2000017', 'dipta345@gmail.com', '01671102108', 'dipta', 'Official', '2020-06-28', '2020-07-01', 'Approved'),
(22, 'Puja Nath', 'id2000026', 'durjoy45@gmail.com', '01671102108', 'puja', 'Sick', '2020-07-02', '2020-07-03', 'Unapproved'),
(24, 'Ratri Biswas', 'id2000027', 'trishita.biswas.988@gmail.com', '01554021572', 'ratri', 'Sick', '2020-07-06', '2020-07-07', 'Approved'),
(25, 'Shaikat Das Joy', 'id2000021', 'shaikat21@gmail.com', '01853392377', 'shaikat', 'Sick', '2020-07-11', '2020-07-12', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `emp` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `emp`, `username`, `subject`, `content`, `status`) VALUES
(3, 'Shaikat Das Joy', 'shaikat21@gmail.com', 'id200021', '', 'Please approve my leave', '', 'Read'),
(4, 'Rahul Biswas', 'biswasrb2000@gmail.com', 'id2000020', '', 'Pls, approve my leave. Thank You.', '', 'Further Query'),
(5, 'Rahul Biswas', 'biswasrb2000@gmail.com', 'id2000020', '', 'hello', '', 'Further Query'),
(6, 'Shaikat Das Joy', 'shaikat21@gmail.com', 'id2000021', '', 'please approve', '', 'Read'),
(7, 'Shivam Thaparia', 'shivam.taparia26@gmail.com', 'id2000024', '', 'Thank you', '', 'Read'),
(8, 'Puja Nath', 'durjoy45@gmail.com', 'id2000026', '', 'pls approve my leave\r\n', '', 'Read'),
(10, 'Shivam Thaparia', 'shivam.taparia26@gmail.com', 'id2000024', '', 'Leave', 'Sir,please approve my leave.Thank you.\r\n', 'Read'),
(11, 'Nisha Gupta', 'nisha10000@gmail.com', 'id2000023', '', 'leave ', 'please approve', 'Read'),
(12, 'Rahul Biswas', 'biswasrb2000@gmail.com', 'id2000020', 'rahul', 'Leave', 'please approve my leave\r\n', 'Read'),
(13, 'Shaikat Das Joy', 'shaikat21@gmail.com', 'id2000021', 'shaikat', 'Leave', 'Please approve my leave.\r\nThank you.\r\nshaikat das', 'Further Query');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `emp` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phn` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `dep` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `emp`, `email`, `phn`, `gender`, `dep`, `username`, `password`) VALUES
(1, 'Rahul Biswas', 'id2000020', 'biswasrb2000@gmail.com', '9585464906', 'Male', 'IT', 'rahul', 'rahul'),
(2, 'Shaikat Das Joy', 'id2000021', 'shaikat21@gmail.com', '01853392377', 'Male', 'IT', 'shaikat', 'shaikat'),
(3, 'Abhinash Kumar Roy', 'id2000022', 'abhinash56@gmail.com', '01671102107', 'Male', 'Management', 'abhinash', 'abhinash'),
(4, 'Nisha Gupta', 'id2000023', 'nisha10000@gmail.com', '01671102108', 'Female', 'Accounting', 'nisha', '1234'),
(5, 'Shivam Thaparia', 'id2000024', 'shivam.taparia26@gmail.com', '01726368989', 'Male', 'Accounting', 'shivam', 'shivam'),
(6, 'Raj Biswas', 'id2000025', 'raj3000@gmail.com', '9943568631', 'Select Gender', 'Select Department', 'raj', 'raj'),
(7, 'Puja Nath', 'id2000026', 'durjoy45@gmail.com', '01671102108', 'Female', 'IT', 'puja', 'puja'),
(8, 'Dipta Devnath', 'id2000017', 'dipta345@gmail.com', '01671102108', 'Male', 'Management', 'dipta', 'dipta'),
(9, 'Ratri Biswas', 'id2000027', 'trishita.biswas.988@gmail.com', '01554021572', 'Female', 'Accounting', 'ratri', 'ratri');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'leave', 'leave');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(120) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `subject`) VALUES
(2, 'You can apply for leave.Thank You.'),
(3, 'Hi all , welcome to Office.\r\nPlease maintain the safety as regulation.\r\nThank you.'),
(4, 'Hi everyone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
