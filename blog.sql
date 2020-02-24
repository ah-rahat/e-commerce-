-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 03:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(5) NOT NULL,
  `cat_id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `cat_id`, `title`, `content`, `photo`, `createtime`, `status`, `name`) VALUES
(40, 41, 'facebook', '<span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 15px;\">PHP 7.0 - If&nbsp;</span><em style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 15px;\">string</em><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 15px;\">&nbsp;=&nbsp;</span><em style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 15px;\">start</em><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 15px;\">&nbsp;(in characters long), it will return an empty string. Earlier versions returns FALSE.</span><br style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 15px;\"><br>', '1581783538.png', '2020-02-15 16:18:58', 1, 'ahr123'),
(41, 42, 'mobile phone', '<blockquote><p>Hello This Kaka from fazilpur . fazilpur means bangali geanipur.<span style=\"font-weight: bold; font-family: Arial;\">bal</span></p><p><span style=\"font-weight: bold; font-family: Arial;\"><br></span></p><h1><span style=\"font-weight: bold; font-family: Arial;\">asik</span></h1></blockquote>', '1581786107.png', '2020-02-15 17:01:47', 1, 'ahr123');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(2) NOT NULL,
  `catagory_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `catagory_name`, `status`, `createtime`, `updatetime`) VALUES
(41, 'faceboook', 1, '2020-02-13 15:26:47', '2020-02-13 15:26:47'),
(42, 'mobile phones', 1, '2020-02-13 15:26:52', '2020-02-15 10:45:03'),
(44, 'HTml', 1, '2020-02-15 10:12:53', '2020-02-15 10:12:53'),
(45, 'youtube', 1, '2020-02-15 10:18:06', '2020-02-15 10:18:06'),
(46, 'twitter', 1, '2020-02-15 10:18:17', '2020-02-15 10:18:17'),
(47, 'instragram1', 1, '2020-02-15 10:18:32', '2020-02-17 14:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `photo`, `createtime`, `updatetime`) VALUES
(46, 'ahr123', 'ahr123', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '2020-01-16 13:01:04', '2020-01-16 13:01:04'),
(54, 'asikul', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '2020-01-26 19:17:10', '2020-01-26 19:17:10'),
(55, 'asikul', 'muttaqi1', '*0355E136AC12118DA749495CC2B4EAAC53625CC6', 0, '', '2020-01-26 19:21:28', '2020-01-26 19:49:51'),
(56, 'hoque', 'iqbal', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '2020-01-26 19:22:42', '2020-01-26 19:22:42'),
(60, 'sharif', 'sharif', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '2020-01-26 19:29:08', '2020-01-26 19:29:08'),
(61, 'adsndkskdj', 'asdskadkasdkjsad', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '2020-01-26 19:30:11', '2020-01-26 19:30:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catagory_name` (`catagory_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
