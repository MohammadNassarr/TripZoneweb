-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 04:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `help` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `thesubject` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`help`, `fullname`, `email`, `thesubject`, `details`) VALUES
('aaa', 'aaa', 'aaa@gmail.com', 'aa', 'aaa'),
('css', 'cra', 'acaacaacd@gmail.com', 'cadcadxw', 'cwwcwdaedweffrwefr'),
('problem', 'user', 'user1@gmail.com', 'problem', 'bgnftbfhmjkimnhbgy');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating`) VALUES
(2),
(10),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply`) VALUES
('hi there ok  i will .'),
('aaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signupp`
--

CREATE TABLE `signupp` (
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(3) NOT NULL,
  `adminn` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signupp`
--

INSERT INTO `signupp` (`fullname`, `email`, `username`, `pass`, `adminn`) VALUES
('admin', 'admin12345@gmail.com', 'admin', 'Nas', 'yes'),
('user', 'hussein@gmail.com', 'mnassar', '0ca', 'no'),
('user', 'jffjts@gmail.com', 'adb', '0ca', 'no'),
('log', 'log@gmail.com', 'log', '0ca', 'no'),
('user', 'mmmm@gmail.com', 'mnassar', 'f16', 'no'),
('user', 'nsr@gmail.com', 'mnassar', '0ca', 'no'),
('user', 'user1@gmail.com', 'mnassar', '9bb', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `latitude`, `longitude`) VALUES
(0, '::1', ''),
(0, '', ''),
(0, '33.3769', '35.4971'),
(0, '33.9017728', '35.5008512'),
(0, '::1', ''),
(0, '33.9017728', '35.5008512'),
(0, '33.3769', '35.4971'),
(0, '::1', ''),
(0, '33.3769', '35.4971'),
(0, '33.3769', '35.4971'),
(0, '::1', ''),
(0, '33.9017728', '35.5008512'),
(0, '33.3769', '35.4971'),
(0, '::1', ''),
(0, '33.8919424', '35.487744'),
(0, '::1', ''),
(0, '::1', ''),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8919424', '35.487744'),
(0, '33.8937913', '35.5017767');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `signupp`
--
ALTER TABLE `signupp`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
