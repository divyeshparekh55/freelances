-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 04:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textile`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ctgy_name` varchar(255) NOT NULL,
  `sub_ctgy_type` varchar(255) NOT NULL,
  `user_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `admin_id`, `ctgy_name`, `sub_ctgy_type`, `user_id`) VALUES
(1, 45, '300x600MM', '1', '29'),
(2, 45, '600x600MM', '2', '29'),
(3, 45, '600x1200MM', '1', '29'),
(4, 45, '800x800MM', '1', '29'),
(5, 45, '1200X1200MM', '1', '29'),
(6, 45, 'dd', '1', '29'),
(7, 45, '6X6MM', '1', '29'),
(8, 45, '8X8MM', '1', '29');

-- --------------------------------------------------------

--
-- Table structure for table `postfix_images`
--

CREATE TABLE `postfix_images` (
  `id` int(11) NOT NULL,
  `img_nme` varchar(255) NOT NULL,
  `img_location` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postfix_images`
--

INSERT INTO `postfix_images` (`id`, `img_nme`, `img_location`, `user_id`) VALUES
(2, 'IMG-64106b6593e6e4.02149264.jpg', 'upload_images/IMG-64106b6593e6e4.02149264.jpg', '29'),
(3, 'IMG-64106b733aed23.43312743.png', 'upload_images/IMG-64106b733aed23.43312743.png', '29');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_images`
--

CREATE TABLE `prefix_images` (
  `id` int(11) NOT NULL,
  `img_nme` varchar(255) NOT NULL,
  `img_location` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prefix_images`
--

INSERT INTO `prefix_images` (`id`, `img_nme`, `img_location`, `user_id`) VALUES
(5, 'IMG-64106b57cd7594.59245670.jpg', 'upload_images/IMG-64106b57cd7594.59245670.jpg', '29');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` enum('admin','sub_admin') NOT NULL DEFAULT 'sub_admin',
  `is_loggedin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `password`, `user_type`, `is_loggedin`) VALUES
(29, 'ks', '123', 'sub_admin', 1),
(38, 'vatsal', 'vatsal', 'sub_admin', 0),
(45, 'ar', '123', 'admin', 0),
(53, 'divyesh', '12345', 'sub_admin', 0),
(54, 'divysh', '123', 'sub_admin', 0),
(56, 'divyessh', '1465', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_ctgy`
--

CREATE TABLE `sub_ctgy` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ctgy_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_ctgy`
--

INSERT INTO `sub_ctgy` (`id`, `admin_id`, `ctgy_name`) VALUES
(1, 45, ' MatteGlossy'),
(2, 45, ' Satin Matt'),
(3, 45, ' Sugar Surface'),
(4, 45, ' High Glossy');

-- --------------------------------------------------------

--
-- Table structure for table `upload_image`
--

CREATE TABLE `upload_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img_nme` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_image`
--

INSERT INTO `upload_image` (`id`, `user_id`, `category_id`, `img_nme`, `img_path`) VALUES
(4, 29, 1, 'IMG-6401ecaa7b4840.24457111.jpg', 'upload_images/IMG-6401ecaa7b4840.24457111.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postfix_images`
--
ALTER TABLE `postfix_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_images`
--
ALTER TABLE `prefix_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_ctgy`
--
ALTER TABLE `sub_ctgy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_image`
--
ALTER TABLE `upload_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postfix_images`
--
ALTER TABLE `postfix_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prefix_images`
--
ALTER TABLE `prefix_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sub_ctgy`
--
ALTER TABLE `sub_ctgy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upload_image`
--
ALTER TABLE `upload_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
