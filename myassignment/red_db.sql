-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 12:13 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `red_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` varchar(50) NOT NULL,
  `msg_to` varchar(50) NOT NULL,
  `msg` varchar(220) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `msg_from`, `msg_to`, `msg`, `date_time`) VALUES
(1, '1', '2', 'eeee', '2017-04-26 11:37:40'),
(2, '1', '2', 'eeeeee', '2017-04-26 11:37:41'),
(3, '1', '2', 'test', '2017-04-26 11:34:30'),
(4, '1', '2', 'heyyyy', '2017-04-26 11:40:56'),
(5, '1', '2', 'anuuuuuuu\n', '2017-04-26 11:41:14'),
(6, '1', '2', 'hi', '2017-04-26 11:42:55'),
(7, '2', '1', 'hi test', '2017-04-26 11:43:12'),
(8, '1', '2', 'hi anu', '2017-04-26 11:51:28'),
(9, '2', '1', 'xcxc', '2017-04-26 12:07:23'),
(10, '1', '2', 'test', '2017-04-27 08:21:03'),
(11, '2', '1', 'hi test', '2017-04-27 08:34:06'),
(12, '1', '2', 'hey anu', '2017-04-27 09:17:32'),
(13, '2', '1', 'hey test', '2017-04-27 09:18:03'),
(14, '2', '3', 'hi anju', '2017-04-27 09:51:03'),
(15, '3', '2', 'hi anu', '2017-04-27 09:51:21'),
(16, '3', '2', 'hi anuuuu', '2017-04-27 11:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE IF NOT EXISTS `friend_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_from` varchar(70) NOT NULL,
  `request_to` varchar(70) NOT NULL,
  `request_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'requested',
  `block_status` varchar(50) NOT NULL DEFAULT 'unblocked',
  `blocked_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `request_from`, `request_to`, `request_datetime`, `status`, `block_status`, `blocked_by`) VALUES
(1, '1', '2', '2017-04-23 11:17:46', 'accepted', 'unblocked', 0),
(2, '3', '1', '2017-05-03 20:15:44', 'accepted', 'unblocked', 0),
(3, '3', '2', '2017-04-23 12:58:28', 'accepted', 'unblocked', 0),
(4, '4', '2', '2017-05-03 20:41:20', 'accepted', 'unblocked', 0),
(5, '4', '5', '2017-05-03 20:09:08', 'accepted', 'unblocked', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_link` varchar(220) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `photo_link`, `date_time`) VALUES
(1, 1, 'gallery/10-04-2017 18-34-14-1.jpg', '2017-04-10 13:04:14'),
(2, 1, 'gallery/10-04-2017 18-34-21-4.jpg', '2017-04-10 13:04:21'),
(3, 1, 'gallery/10-04-2017 18-34-29-10.jpg', '2017-04-10 13:04:29'),
(4, 1, 'gallery/21-04-2017 11-12-41-9.jpg', '2017-04-21 05:42:41'),
(5, 1, 'gallery/10-04-2017 18-34-21-4.jpg', '2017-04-21 05:48:40'),
(6, 1, 'gallery/21-04-2017 11-17-57-6.jpg', '2017-04-21 05:47:57'),
(7, 1, 'gallery/21-04-2017 11-19-33-6.jpg', '2017-04-21 05:49:33'),
(8, 1, 'gallery/21-04-2017 12-07-45-6.jpg', '2017-04-21 06:37:45'),
(9, 1, 'gallery/21-04-2017 12-08-22-6.jpg', '2017-04-21 06:38:22'),
(11, 1, 'gallery/21-04-2017 12-09-45-6.jpg', '2017-04-21 06:39:45'),
(12, 1, 'gallery/21-04-2017 18-33-22-15.jpg', '2017-04-21 13:03:22'),
(14, 2, 'gallery/22-04-2017 15-40-59-9.jpg', '2017-04-22 10:10:59'),
(15, 2, 'gallery/22-04-2017 15-41-24-12.jpg', '2017-04-22 10:11:24'),
(16, 2, 'gallery/22-04-2017 15-41-42-8.jpg', '2017-04-22 10:11:42'),
(17, 2, 'gallery/22-04-2017 15-41-50-10.jpg', '2017-04-22 10:11:50'),
(18, 3, 'gallery/23-04-2017 17-11-25-16.jpg', '2017-04-23 11:41:25'),
(20, 4, 'gallery/04-05-2017 12-59-38-8.jpg', '2017-05-04 07:29:38'),
(21, 4, 'gallery/04-05-2017 12-59-46-6.jpg', '2017-05-04 07:29:46'),
(22, 4, 'gallery/04-05-2017 12-59-53-10.jpg', '2017-05-04 07:29:53'),
(23, 5, 'gallery/04-05-2017 15-15-10-1.jpg', '2017-05-04 09:45:10'),
(24, 5, 'gallery/04-05-2017 15-15-27-3.jpg', '2017-05-04 09:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `shared_photos`
--

CREATE TABLE IF NOT EXISTS `shared_photos` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `friends_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `photo_link` varchar(220) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'shared',
  PRIMARY KEY (`share_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `shared_photos`
--

INSERT INTO `shared_photos` (`share_id`, `owner_id`, `friends_id`, `photo_id`, `photo_link`, `date_time`, `status`) VALUES
(1, 2, 1, 14, 'gallery/10-04-2017 18-34-14-1.jpg', '2017-04-26 10:18:23', 'shared'),
(2, 1, 3, 1, 'gallery/10-04-2017 18-34-14-1.jpg', '2017-04-26 10:08:04', 'shared'),
(3, 1, 2, 2, 'gallery/10-04-2017 18-34-21-4.jpg', '2017-04-26 10:08:33', 'shared'),
(4, 1, 3, 2, 'gallery/10-04-2017 18-34-21-4.jpg', '2017-04-26 10:08:33', 'shared'),
(5, 1, 3, 3, 'gallery/10-04-2017 18-34-29-10.jpg', '2017-04-26 12:16:35', 'shared'),
(6, 2, 3, 14, 'gallery/22-04-2017 15-40-59-9.jpg', '2017-05-03 20:56:19', 'shared'),
(7, 2, 3, 15, 'gallery/22-04-2017 15-41-24-12.jpg', '2017-05-03 20:57:16', 'shared'),
(8, 4, 2, 19, 'gallery/04-05-2017 09-06-53-6.jpg', '2017-05-04 07:07:54', 'shared'),
(9, 4, 5, 19, 'gallery/04-05-2017 09-06-53-6.jpg', '2017-05-04 07:16:03', 'shared'),
(10, 5, 4, 23, 'gallery/04-05-2017 15-15-10-1.jpg', '2017-05-04 09:59:33', 'shared');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lives_at` varchar(50) NOT NULL,
  `studied_at` varchar(60) NOT NULL,
  `working_at` varchar(30) NOT NULL,
  `marital_status` varchar(40) NOT NULL,
  `native_place` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `lives_at`, `studied_at`, `working_at`, `marital_status`, `native_place`) VALUES
(1, 1, 'test1', 'test1', 'test1', 'single', 'test1'),
(2, 2, 'Ernakulam', 'Rajagiri', 'Infopark', 'single', 'Pathanamthitta'),
(3, 3, 'test', 'test', 'test', 'single', 'Kottayam');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `photo` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `fname`, `mname`, `lname`, `phone_no`, `email_id`, `password`, `dob`, `photo`) VALUES
(1, 'test', 'test', 'test', 9856453423, 'test@gmail.com', '1234', '1989/04/04', 'profile/10-04-2017 17-37-51-2.jpg'),
(2, 'Anu', 'Cherian', 'Varghese', 7768453467, 'anu@gmail.com', '1234', '1990/04/19', 'profile/22-04-2017 15-24-33-13.jpg'),
(3, 'Anju', 'Cherian', 'Varghese', 7768453467, 'anju@gmail.com', '1234', '1993/04/09', 'profile/23-04-2017 17-09-46-19.jpg'),
(4, 'Ramesh', 'K', 'P', 9878675757, 'ramesh@gmail.com', '1234', '1986/05/01', 'profile/03-05-2017 19-32-24-7.jpg'),
(5, 'Sudheesh', 'S', 'R', 7768878767, 'sudheesh@gmail.com', '1234', '1993/04/09', 'profile/03-05-2017 19-33-05-12.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
