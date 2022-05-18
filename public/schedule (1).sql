-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 08:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_start_time` datetime NOT NULL,
  `event_end_time` datetime NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_type_id`, `created_by`, `event_name`, `event_start_time`, `event_end_time`, `event_description`, `batch_id`, `modul_id`) VALUES
(1, 3, 'habib', 'PHP', '2022-05-11 05:40:06', '2022-05-11 05:40:06', 'belajar phpmyadmin', 1, 1),
(2, 2, 'tailwindcss', 'css', '2022-05-11 05:40:06', '2022-05-11 05:40:06', 'belajar tailwindcss ', 1, 1),
(3, 3, 'puput', 'PHP', '2022-05-11 06:54:44', '2022-05-11 06:54:44', 'belajar PHP', 1, 1),
(4, 1, 'habib', 'css', '2022-05-11 06:57:46', '2022-05-11 06:57:46', 'belajar css', 1, 1),
(5, 2, 'zahro', 'java', '2022-05-11 06:59:05', '2022-05-11 06:59:05', 'belajar javascrip', 1, 1),
(6, 3, 'faza', 'task1IntroductionBigData', '2022-05-11 06:59:05', '2022-05-11 06:59:05', 'test', 1, 1),
(7, 1, 'puput', 'Fix Gool Class', '2022-05-11 07:00:54', '2022-05-11 07:00:54', 'kelas Fix Gool Ronaldo', 1, 1),
(8, 1, 'zahro', 'PHP', '2022-05-11 06:54:44', '2022-05-11 06:54:44', 'belajar PHP', 1, 1),
(9, 2, 'puput', 'css', '2022-05-11 05:40:06', '2022-05-11 05:40:06', 'belajar tailwindcss ', 1, 1),
(10, 2, 'puput', 'css', '2022-05-11 05:40:06', '2022-05-11 05:40:06', 'belajar tailwindcss ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(11) NOT NULL,
  `event_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type_name`) VALUES
(1, 'class'),
(2, 'dateline'),
(3, 'courses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_type_id` (`event_type_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
