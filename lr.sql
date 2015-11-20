-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2015 at 06:49 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lr`
--
CREATE DATABASE IF NOT EXISTS `lr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lr`;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{"admin": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `email` varchar(25) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nic` varchar(10) NOT NULL,
  `joined` datetime NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  `user_approved` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `name`, `nic`, `joined`, `gender`, `phone`, `groups`, `user_approved`) VALUES
(5, 'thusitha', '5f41b4464d99c25484dfe2de81e242b6993bd92ff8a308ed843284b586e2a8a9', 'ÝGÂdô”\ZihFrÿn|.å—Û\\àº®\\ïG°‘æ', '', 'thusitha pradeep', '', '2015-10-04 12:26:19', '', 0, 1, '1'),
(9, 'test2', 'bc8ef1e0381c7458727da6046317b090885178ff7931d0769fdac649a31fa6c8', '¥GwT+&~V''‰>ŒÌ’2²—åZ…-Ã>©5²m©—', 'test@gmail.com', 'test2', '235235', '2015-10-06 18:03:52', 'Male', 235235, 1, '1'),
(10, 'admin', '3c87fce7b9db136b22941051ddbe879b47184396564112576b15de70e02ffff1', 'F7ŸËÐpNZ™„j½ô’{Ä$†ð˜°³„áž%½n', 'admin@gmail.com', 'admin', '9211112321', '2015-10-06 18:06:22', '', 991281272, 2, '2'),
(11, 'manee', '48d173da1fa8b7fc0e46ceb2424054e1892168ce4df3edff1200d52c8db21c77', 'ÜËD&¡†Æ@P''©SÞÖ¬Çýªâ”.š*1•_#', 'manee@gmail.com', 'maneesha', '932647236', '2015-10-19 00:31:15', 'Female', 253789344, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_approved`
--

CREATE TABLE IF NOT EXISTS `user_approved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `approvedd` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_approved`
--

INSERT INTO `user_approved` (`id`, `name`, `approvedd`) VALUES
(1, 'approved user', ''),
(2, 'non-approved user', '{"approved": 1}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
