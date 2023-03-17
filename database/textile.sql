-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 07:52 AM
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
(1, 45, 'Divyesh', '1', '29'),
(2, 45, 'Motor', '1', '29'),
(5, 45, 'sas', '3', '29'),
(6, 45, 'ssss', '1', '29'),
(7, 45, 'sasassss', '4', '29');

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
(29, 'ks', '123', 'sub_admin', 0),
(38, 'vatsal', 'vatsal', 'sub_admin', 0),
(45, 'ar', '123', 'admin', 1),
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
(1, 45, ' water'),
(2, 45, ' motor'),
(3, 45, ' sasa'),
(4, 45, ' sasaas');

-- --------------------------------------------------------

--
-- Table structure for table `upload_image`
--

CREATE TABLE `upload_image` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img_nme` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_image`
--

INSERT INTO `upload_image` (`id`, `admin_id`, `category_id`, `img_nme`, `img_path`) VALUES
(1, 29, 4, 'IMG-63e397469215d7.83465545.jpg', 'upload_images/IMG-63e397469215d7.83465545.jpg'),
(2, 29, 1, 'IMG-63f7611a875673.88449882.jpg', 'upload_images/IMG-63f7611a875673.88449882.jpg'),
(3, 38, 1, 'IMG-6400ab6f306667.96811508.jpg', 'upload_images/IMG-6400ab6f306667.96811508.jpg'),
(4, 29, 1, 'IMG-6401ecaa7b4840.24457111.jpg', 'upload_images/IMG-6401ecaa7b4840.24457111.jpg'),
(5, 29, 1, 'IMG-6401ecbc7b9ec8.61683651.jpg', 'upload_images/IMG-6401ecbc7b9ec8.61683651.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
