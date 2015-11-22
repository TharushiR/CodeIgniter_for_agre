-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2015 at 02:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agri`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `p_name` varchar(25) NOT NULL,
  `cost` int(11) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `customer_orders` (
  `username` varchar(25) NOT NULL,

  `products` varchar(25) NOT NULL,
  
  `cost` int(11) NOT NULL,
  `address` varchar(25) NOT NULL,
  `delivery_date` Date  NOT NULL,
  `method` varchar(25) NOT NULL
  
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{"admin": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `p_name` varchar(55) NOT NULL,
  `p_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `store` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_name`, `p_description`, `image`, `store`, `cost`) VALUES
(1, 'kdct-234', 'htht  abaAFDSF AS DF ASDF ASD F SDAF SA FASDFADSFAS A AS S', 'img/item1.jpg', 23, 234),
(2, 'cHEMI-23', 'AS  D DA S A FA A', 'img/item2.jpg', 2, 2524),
(3, 'TRVS-4', 'SDVSD DFS SD ', 'img/item3.jpg', 43, 765),
(4, 'WEF 6', 'WEFWV A BE  A ', 'img/item4.jpg', 54, 543),
(5, 'WEG07-D', 'sdb sf  sd ', 'img/item5.jpg', 3, 987);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nic` varchar(10) NOT NULL,
  `joined` datetime NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  `user_approved` text NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `address`, `nic`, `joined`, `gender`, `phone`, `groups`, `user_approved`, `is_admin`) VALUES
(5, 'thusitha', '5f41b4464d99c25484dfe2de81e242b6993bd92ff8a308ed843284b586e2a8a9', 'ÝGÂdô”\ZihFrÿn|.å—Û\\àº®\\ïG°‘æ', 'test@gmail.com', 'test2', '', '2015-10-04 12:26:19', '', 778545848, 1, '2', 0),
(9, 'test2', 'bc8ef1e0381c7458727da6046317b090885178ff7931d0769fdac649a31fa6c8', '¥GwT+&~V''‰>ŒÌ’2²—åZ…-Ã>©5²m©—', 'test@gmail.com', 'test2', '235235', '2015-10-06 18:03:52', 'Male', 778545848, 1, '1', 0),
(10, 'admin', '3c87fce7b9db136b22941051ddbe879b47184396564112576b15de70e02ffff1', 'F7ŸËÐpNZ™„j½ô’{Ä$†ð˜°³„áž%½n', 'admin@gmail.com', 'admin', '9211112321', '2015-10-06 18:06:22', '', 991281272, 2, '2', 1),
(12, 'dilushika', '35c057fc3007ac1a9613ca46ebc002dd6bbd651b7e3a2468a173dca4bab7d1a1', 'ÌæZ/±l×”3€,{°*í+@©Tr|(ô0“£fóÙ', 'dilu@gmail.com', 'kandy, mahakanada', '', '2015-11-22 13:55:42', '', 0, 1, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_approved`
--

CREATE TABLE IF NOT EXISTS `user_approved` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `approvedd` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_approved`
--

INSERT INTO `user_approved` (`id`, `name`, `approvedd`) VALUES
(1, 'approved user', ''),
(2, 'non-approved user', '{"approved": 1}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_approved`
--
ALTER TABLE `user_approved`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_approved`
--
ALTER TABLE `user_approved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
