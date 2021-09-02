-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 08:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambulance_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_list`
--

CREATE TABLE `hospital_list` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_list`
--

INSERT INTO `hospital_list` (`id`, `hospital_name`) VALUES
(2, 'Dhaka Medical College'),
(3, 'Holy Family Hospital'),
(4, 'Square Hospital'),
(5, 'Bangladesh Medical College'),
(9, 'Sohrawardi Medical College');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(33) NOT NULL,
  `receiver_name` varchar(33) NOT NULL,
  `message_text` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_name`, `receiver_name`, `message_text`, `date_time`) VALUES
(5, 'Abir', 'Nasif', 'hello', '2020-09-09 08:52:02'),
(6, 'Abir', 'Nasif', 'hello', '2020-09-09 08:55:09'),
(7, 'Abir', 'Abir', 'how are you', '2020-09-09 08:55:23'),
(8, 'Abir', 'Nasif', 'what are you doing?', '2020-09-09 08:57:26'),
(9, 'Abir', 'Nasif', 'Ho Ho Ho', '2020-09-09 09:12:51'),
(10, 'Abir', 'Abir', 'Lets go to the mall', '2020-09-09 10:16:42'),
(11, 'Nasif', 'Abir', 'Yo', '2020-09-09 10:19:35'),
(12, 'Abir', 'Abir', 'Hello', '2020-09-10 04:30:09'),
(13, 'Abir', 'Abir', 'If you are free, please call!!', '2020-09-10 05:41:06'),
(14, 'Nasif', 'Abir', 'Yeah', '2020-09-10 05:54:27'),
(15, 'Abir', 'Nasif', 'Hello Nasif', '2020-09-10 06:54:52'),
(16, 'Abir', 'Nasif', 'Why aren''t you texting?\r\n', '2020-09-20 05:02:04'),
(17, 'Nasif', 'Abir', 'I am busy', '2020-09-20 05:05:37'),
(19, 'Nasif', 'Abir1', 'Hello provider', '2020-09-23 04:22:47'),
(20, 'Nasif', 'Nasif1', 'hello Nasif1', '2020-09-23 04:23:06'),
(21, 'Abir1', 'Nasif1', 'hello bro', '2020-09-23 04:55:45'),
(22, 'Nasif', 'Abir1', 'Where are you?', '2020-09-23 07:04:15'),
(23, 'Nasif', 'Nasif1', 'ki obostha nasif1\r\n', '2020-09-23 07:05:56'),
(24, 'Abir1', 'Nasif', 'I am coming', '2020-09-23 07:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `rate_system`
--

CREATE TABLE `rate_system` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_system`
--

INSERT INTO `rate_system` (`id`, `user_name`, `rate`) VALUES
(1, 'Nasif', 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `Hospital_name` varchar(100) NOT NULL,
  `ambulance_name` varchar(100) NOT NULL,
  `pickup` varchar(100) NOT NULL,
  `verification_key` varchar(45) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `create_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_name`, `Hospital_name`, `ambulance_name`, `pickup`, `verification_key`, `verified`, `create_date`) VALUES
(17, 'Nasif', 'Dhaka Medical College', 'Ac Ambulance', '559/1, South Goran, Dhaka-1219', '9995013df080fc23648af9fbb3e75191', 1, '2020-09-23 03:19:32.344003'),
(55, 'Nasif', 'Holy Family Hospital', 'Non-Ac Ambulance', '559/1, South Goran, Dhaka-1219', '15447d7d7ccbb4b41ea3df071da494c7', 2, '2020-09-23 11:23:16.472257'),
(57, 'Nasif', 'Square Hospital', 'ICU Ambulance', 'kadamtala Bridge', 'e4b5877f6632e2074352b409166d19d1', 0, '2020-09-23 16:30:40.954014'),
(58, 'Nasif', 'Holy Family Hospital', 'Cardiac Ambulance', '559/1, South Goran, Dhaka-1219', '6f4c46c9eb4dad75233f5ca04bfcce25', 2, '2020-09-23 16:37:47.256088');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `verification_key` varchar(45) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `verified_ride` varchar(45) NOT NULL DEFAULT 'Not_Occupied',
  `create_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`id`, `user_name`, `email`, `phone_number`, `password`, `verification_key`, `verified`, `verified_ride`, `create_date`) VALUES
(1, 'Abir1', '2017-1-60-084@std.ewubd.edu', '01956828809', '81dc9bdb52d04dc20036dbd8313ed0', '4bd6b25eed7fbfbcda0ad62f30045374', 1, 'Not_Occupied', '2020-09-22 15:29:51.956139'),
(2, 'Nasif1', 'hossainjubayer404@gmail.com', '01956828809', '81dc9bdb52d04dc20036dbd8313ed0', '499bf005d46e92d0f73963ca87d19a82', 1, 'Not_Occupied', '2020-09-23 00:41:47.394016');

-- --------------------------------------------------------

--
-- Table structure for table `service_recipient`
--

CREATE TABLE `service_recipient` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `verification_key` varchar(45) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `create_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `service_recipient`
--

INSERT INTO `service_recipient` (`id`, `user_name`, `email`, `phone_number`, `password`, `verification_key`, `verified`, `create_date`) VALUES
(31, 'Nasif', 'hossainjubayer404@gmail.com', '01956828809', '674f3c2c1a8a6f90461e8a66fb5550', '40f58f9f4e051c86e9a3ae9dcceef28c', 1, '2020-09-09 18:07:08.582711');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_ambulance`
--

CREATE TABLE `type_of_ambulance` (
  `id` int(11) NOT NULL,
  `ambulance_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_ambulance`
--

INSERT INTO `type_of_ambulance` (`id`, `ambulance_type`) VALUES
(1, 'Ac Ambulance'),
(2, 'Non-Ac Ambulance'),
(3, 'ICU Ambulance'),
(4, 'Cardiac Ambulance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_list`
--
ALTER TABLE `hospital_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_system`
--
ALTER TABLE `rate_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_ambulance`
--
ALTER TABLE `type_of_ambulance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hospital_list`
--
ALTER TABLE `hospital_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `rate_system`
--
ALTER TABLE `rate_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_recipient`
--
ALTER TABLE `service_recipient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_of_ambulance`
--
ALTER TABLE `type_of_ambulance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
