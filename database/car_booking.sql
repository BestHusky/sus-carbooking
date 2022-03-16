-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 01:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_car`
--

CREATE TABLE `list_car` (
  `id_car` int(11) NOT NULL,
  `number_car` varchar(255) NOT NULL,
  `brand_car` enum('HONDA','TOYOTA') NOT NULL,
  `type_car` enum('sedan','van') NOT NULL,
  `seats_car` enum('2','4') NOT NULL,
  `status_car` enum('free','unavailable','repair') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_car`
--

INSERT INTO `list_car` (`id_car`, `number_car`, `brand_car`, `type_car`, `seats_car`, `status_car`) VALUES
(1, 'กข5236', 'HONDA', 'sedan', '4', 'free'),
(2, 'มค6969', 'TOYOTA', 'van', '4', 'repair');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_car` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `booking_start_date` datetime DEFAULT NULL,
  `booking_end_date` datetime DEFAULT NULL,
  `action` enum('accept','reject','pending') DEFAULT 'pending',
  `status` enum('accept','reject','Suspend') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id`, `id_user`, `id_car`, `purpose`, `booking_start_date`, `booking_end_date`, `action`, `status`) VALUES
(1, '1', '1', 'ยืมไปใช้นอกสถานที่', '2021-04-17 12:40:49', '2022-02-18 17:40:49', 'accept', 'accept'),
(2, '2', '2', 'ใช้ในการเดินทางไปประชุม', '2021-04-01 12:40:49', '2022-02-02 17:40:49', 'accept', NULL),
(3, '2', '1', 'ยืมออกไปกินข้าว', '2021-04-01 12:40:49', '2021-04-02 17:40:49', 'accept', NULL),
(4, '1', '2', 'ยืมกลับบ้าน', '2021-04-01 12:40:49', '2021-04-02 17:40:49', 'accept', 'accept'),
(5, '1', '1', 'ไปทำงาน', '2022-02-11 14:52:00', '2022-02-11 14:52:00', 'accept', NULL),
(6, '1', '1', 'ไปทำงาน', '2022-02-11 14:52:00', '2022-02-11 14:52:00', 'accept', NULL),
(7, '1', '2', 'ไปทำงาน', '2022-02-10 19:38:00', '2022-02-11 18:38:00', 'reject', NULL),
(8, '1', '1', 'asd', '2022-02-10 19:39:00', '2022-02-11 19:39:00', NULL, NULL),
(9, '1', '1', '00000', '2022-12-10 15:30:00', '2022-02-16 21:47:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` varchar(30) NOT NULL,
  `end` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ทดสอบปฏิทิน';

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id`, `title`, `start`, `end`) VALUES
(1, 'กิจกรรมที่ 1', '2015-09-01', '2015-09-03'),
(2, 'Event no 2', '2015-09-03T08:15:00', '2015-09-07T16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_join`
--

CREATE TABLE `test_join` (
  `id_test` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_join`
--

INSERT INTO `test_join` (`id_test`, `id_user`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_car`
--

CREATE TABLE `users_car` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `status_user` enum('ADMIN','USER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_car`
--

INSERT INTO `users_car` (`id_user`, `username`, `password`, `fname`, `lname`, `status_user`) VALUES
(1, 'admin', '1234', 'ณัฐนันท์', 'test', 'ADMIN'),
(2, 'user', '1234', 'user', 'test', 'USER'),
(31, 'ratima', '1234', '1234', '1234', 'USER'),
(47, 'ratima', '1233', '1234', '1234', 'USER'),
(48, 'ratima', '1233', '1234', '1234', 'USER'),
(49, 'ratima', '1233', '1234', '1234', 'USER'),
(50, 'ratimas', 'asd', '1234', '1234', 'USER'),
(51, 'testss', 'asd', 'asd', 'asd', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_car`
--
ALTER TABLE `list_car`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_join`
--
ALTER TABLE `test_join`
  ADD PRIMARY KEY (`id_test`);

--
-- Indexes for table `users_car`
--
ALTER TABLE `users_car`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_car`
--
ALTER TABLE `list_car`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_join`
--
ALTER TABLE `test_join`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_car`
--
ALTER TABLE `users_car`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
