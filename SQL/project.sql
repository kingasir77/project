-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 مارس 2020 الساعة 15:36
-- إصدار الخادم: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cmp_rate`
--

CREATE TABLE `cmp_rate` (
  `comp_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cmp_rate`
--

INSERT INTO `cmp_rate` (`comp_id`, `num`, `sum`) VALUES
(140, 8, 27),
(139, 2, 9);

-- --------------------------------------------------------

--
-- بنية الجدول `company`
--

CREATE TABLE `company` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_website` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `company`
--

INSERT INTO `company` (`c_id`, `c_name`, `c_website`, `c_email`, `c_phone`, `user_id`) VALUES
(139, 'alrajhi', 'alrajhi.com', 'alrajhi@alrajhi.com', '46436', 51),
(140, 'saudi', 'saudi.com', 'saudi@saudi.com', '52345144', 51),
(142, 'UAE', 'uae.com', 'uae@gmail.com', '122222', 51),
(143, 'ma', 'ma', 'ma@ma.com', '9534534', 51);

-- --------------------------------------------------------

--
-- بنية الجدول `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `h_location` varchar(255) NOT NULL,
  `h_email` varchar(255) NOT NULL,
  `h_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `hospital`
--

INSERT INTO `hospital` (`h_id`, `h_name`, `user_id`, `h_location`, `h_email`, `h_phone`) VALUES
(21, 'alomais', 51, 'abha', 'alomais@alomais.com', '0555555');

-- --------------------------------------------------------

--
-- بنية الجدول `link`
--

CREATE TABLE `link` (
  `id_user` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `rate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `link`
--

INSERT INTO `link` (`id_user`, `id_plan`, `rate`) VALUES
(107, 38, 1),
(90, 30, 1),
(109, 39, 1),
(112, 38, 1),
(114, 39, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `nor_user`
--

CREATE TABLE `nor_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `NID` int(11) DEFAULT NULL,
  `nof` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `nor_user`
--

INSERT INTO `nor_user` (`id`, `name`, `NID`, `nof`, `h_id`) VALUES
(114, 'majed', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `o_city` varchar(255) NOT NULL,
  `office_location` varchar(255) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `office`
--

INSERT INTO `office` (`office_id`, `o_city`, `office_location`, `company_id`) VALUES
(15, 'abha', 'dkfljgsd', 139),
(16, 'khamis mushit', 'https://www.google.com.sa/maps/place/%D9%85%D8%B7%D8%A7%D8%B9%D9%85+%D9%87%D8%A7%D8%B4%D9%85%E2%80%AD/@18.2054467,42.8287888,15z/data=!4m5!3m4!1s0x15fb5f694f8bb2bd:0x7a6693202b074d29!8m2!3d18.2163275!4d42.8095552', 139),
(17, 'abh', 'http:///google.com.sa', 140),
(18, 'jeddah', 'ghfdlk', 140);

-- --------------------------------------------------------

--
-- بنية الجدول `plan`
--

CREATE TABLE `plan` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_outside` varchar(255) DEFAULT NULL,
  `p_price` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `plan`
--

INSERT INTO `plan` (`p_id`, `p_name`, `p_outside`, `p_price`, `company_id`) VALUES
(30, 'gold', 'true', '5000', 140),
(38, 'silver', 'true', '1000', 140),
(39, 'gold plain', 'true', '100', 139);

-- --------------------------------------------------------

--
-- بنية الجدول `relation_p_h`
--

CREATE TABLE `relation_p_h` (
  `r_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `relation_p_h`
--

INSERT INTO `relation_p_h` (`r_id`, `plan_id`, `hospital_id`) VALUES
(22, 30, 21),
(24, 39, 21);

-- --------------------------------------------------------

--
-- بنية الجدول `specialty`
--

CREATE TABLE `specialty` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `specialty`
--

INSERT INTO `specialty` (`s_id`, `s_name`, `hospital_id`) VALUES
(24, 'Orthopedic', 21),
(25, 'surgery', 21);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `type`) VALUES
(51, 'majed', '123', 0),
(90, 'horse', 'horse', 3),
(105, 'try', '123', 3),
(106, 'majed54', '123', 3),
(107, 'm', '123', 3),
(108, 'ttt', '123', 3),
(109, 'pp', '123', 2),
(112, '1', '1', 3),
(113, '2', '2', 3),
(114, 'nn', 'nn', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `cont` (`user_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `a` (`user_id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD KEY `cc` (`id_plan`),
  ADD KEY `ccc` (`id_user`);

--
-- Indexes for table `nor_user`
--
ALTER TABLE `nor_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const1` (`h_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `office_ibfk_1` (`company_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `plan_ibfk_1` (`company_id`);

--
-- Indexes for table `relation_p_h`
--
ALTER TABLE `relation_p_h`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `realtion_1` (`plan_id`),
  ADD KEY `relation_2` (`hospital_id`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `project_ibfk_1` (`hospital_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `relation_p_h`
--
ALTER TABLE `relation_p_h`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `cont` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `a` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `cc` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ccc` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `nor_user`
--
ALTER TABLE `nor_user`
  ADD CONSTRAINT `const` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `const1` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`);

--
-- القيود للجدول `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `office_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `relation_p_h`
--
ALTER TABLE `relation_p_h`
  ADD CONSTRAINT `realtion_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `specialty`
--
ALTER TABLE `specialty`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
