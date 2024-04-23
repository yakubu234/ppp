-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 06:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `bookign_id` varchar(200) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `date_start` varchar(20) DEFAULT NULL,
  `date_end` varchar(200) DEFAULT NULL,
  `event_type` varchar(200) DEFAULT NULL,
  `number_of_guest` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `admin_id` varchar(200) DEFAULT NULL,
  `tax` varchar(200) DEFAULT NULL,
  `total_amount` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_of_application` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `bookign_id`, `user_id`, `date_start`, `date_end`, `event_type`, `number_of_guest`, `message`, `remarks`, `status`, `admin_id`, `tax`, `total_amount`, `discount`, `created_at`, `updated_at`, `date_of_application`) VALUES
(1, '2661bf59c0a080', '2', 'Saturday, April 20, ', 'Friday, April 26, 2024', '8', '12', '', NULL, NULL, NULL, '', '1390', '', '2024-04-14 15:26:20', '2024-04-14 15:26:20', 'Sunday, April 14, 2024'),
(2, '2661bf5a1b120f', '2', 'Saturday, April 20, ', 'Friday, April 26, 2024', '8', '12', '', NULL, NULL, NULL, '', '1390', '', '2024-04-14 15:26:25', '2024-04-14 15:26:25', 'Sunday, April 14, 2024'),
(3, '2661bf5a7365e4', '2', 'Saturday, April 20, ', 'Friday, April 26, 2024', '8', '12', '', NULL, NULL, NULL, '', '1390', '', '2024-04-14 15:26:31', '2024-04-14 15:26:31', 'Sunday, April 14, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_services`
--

CREATE TABLE `bookings_services` (
  `id` int(11) NOT NULL,
  `service_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bookings_id` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_services`
--

INSERT INTO `bookings_services` (`id`, `service_id`, `name`, `bookings_id`, `amount`, `status`, `discount`, `description`, `quantity`) VALUES
(1, '1', 'Wedding DJ', '1', '800', 'active', NULL, '(we install the DJ equipment before your ceremony or after your wedding breakfast)', '1'),
(2, '2', 'Party DJ', '1', '390', 'active', NULL, '(we install the DJ equipment 1 hour before your selected event start time)', '1'),
(3, '3', 'Photo Booth Hire', '1', '200', 'active', NULL, '(early equipment setup included)', '1'),
(4, '1', 'Wedding DJ', '2', '800', 'active', NULL, '(we install the DJ equipment before your ceremony or after your wedding breakfast)', '1'),
(5, '2', 'Party DJ', '2', '390', 'active', NULL, '(we install the DJ equipment 1 hour before your selected event start time)', '1'),
(6, '3', 'Photo Booth Hire', '2', '200', 'active', NULL, '(early equipment setup included)', '1'),
(7, '1', 'Wedding DJ', '3', '800', 'active', NULL, '(we install the DJ equipment before your ceremony or after your wedding breakfast)', '1'),
(8, '2', 'Party DJ', '3', '390', 'active', NULL, '(we install the DJ equipment 1 hour before your selected event start time)', '1'),
(9, '3', 'Photo Booth Hire', '3', '200', 'active', NULL, '(early equipment setup included)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT 'enabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anniversary', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(2, 'Birthday Party', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(3, 'Charity', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(4, 'Cocktail', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(5, 'College', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(6, 'Community', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(7, 'Concert', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(8, 'Engagement', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(9, 'Get Together', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(10, 'Government', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(11, 'Night Club', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(13, 'Post Wedding', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(14, 'Pre Engagement', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(15, 'Religious', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(16, 'Sangeet', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(17, 'Social', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11'),
(18, 'Wedding', 'enabled', '2024-01-30 15:01:39', '2024-04-13 13:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unpdated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `recepient` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `reply` text DEFAULT NULL,
  `responder_id` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'active',
  `responder_name` varchar(200) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `recepient`, `name`, `email`, `user_id`, `message`, `subject`, `reply`, `responder_id`, `status`, `responder_name`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'akj@gmail.com', 2, '0', 'this is subject', NULL, NULL, 'active', NULL, NULL, '2024-04-13 21:44:14', '2024-04-13 21:44:14'),
(2, 'admin', NULL, 'akj@gmail.com', 2, 'THis description fit inn, completely', 'A new subject is here', NULL, NULL, 'active', NULL, NULL, '2024-04-13 22:03:32', '2024-04-13 22:03:32'),
(3, 'admin', NULL, 'akj@gmail.com', 2, 'This code manually multiplies each time unit (years, months, days, hours, minutes, seconds) by their corresponding conversion factors to seconds and sums them up.\r\n\r\nChoosing the Right Option:\r\n\r\nIf you\'re targeting PHP 5.2 and above, using $interval->format(\'%s\') is more concise.\r\nFor broader compatibility, the manual calculation approach ensures functionality even in older PHP versions.\r\nAdditional Considerations:\r\n\r\nRemember to update the rest of the code accordingly, replacing $delta->totalSeconds() with either $total_seconds from the chosen approach.\r\nTest your code with different timestamps to ensure it produces the expected output.\r\nBy incorporating these adjustments, you can effectively format timestamps relative to the user\'s current time while maintaining compatibility with older PHP versions.', 'a new one', NULL, NULL, 'active', NULL, NULL, '2024-04-13 22:24:07', '2024-04-13 22:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wedding DJ', '(we install the DJ equipment before your ceremony or after your wedding breakfast)', '800', 'enabled', '2024-04-13 12:57:17', '2024-04-13 12:57:17'),
(2, 'Party DJ', '(we install the DJ equipment 1 hour before your selected event start time)', '390', 'enabled', '2024-04-13 12:57:17', '2024-04-13 12:57:17'),
(3, 'Photo Booth Hire', '(early equipment setup included)', '200', 'enabled', '2024-04-13 12:57:55', '2024-04-13 12:57:55'),
(4, 'Karaoke Add-on', 'Karaoke is a great alternative to a disco. It’s perfect for staff parties and children’s parties.', '450', 'enabled\r\n', '2024-04-13 12:58:29', '2024-04-13 12:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` text NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `phone`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@gmail.com', '$2y$10$OF02JMzQ4LO1LWidSTNvqeqUGTpa7DpRDfAsC1TEYXbFDaAVCPFiG', '0308238238923', 'active', '5', '2024-04-12 12:33:16', '2024-04-12 12:33:16'),
(2, 'adebowale', 'username abiola', 'akj@gmail.com', '$2y$10$45J6dAUXhfPJzxNhEJS2N.tHYVaI6RDzc1sv9KtJNKMCSVOJ9JeXu', '303942039303', 'active', '0', '2024-04-12 12:34:59', '2024-04-12 12:34:59'),
(3, 'Johbn olusesi', NULL, 'asd@sgf.mail.com', '$2y$10$rGE0rAYM5Scdh4mZ0X7uIeahSR7o3iCuIAm/qm40FQLMh0ZzSl/eW', '023802398923', 'active', '0', '2024-04-12 14:34:09', '2024-04-12 14:34:09'),
(4, 'Johbn olusesi', NULL, 'asd@sgf.mail.com', '$2y$10$rGE0rAYM5Scdh4mZ0X7uIeahSR7o3iCuIAm/qm40FQLMh0ZzSl/eW', '023802398923', 'active', '0', '2024-04-12 14:34:09', '2024-04-12 14:34:09'),
(5, 'ade wale', NULL, 'adewale@john.com', '$2y$10$HQN01ELAvIBDod5V5Mo92eY7DKV.M6.ASQRN1fgbgxra9gMV3n3Wm', '203823987', 'active', '0', '2024-04-12 14:35:07', '2024-04-12 14:35:07'),
(6, 'ade wale', NULL, 'adewale@john.com', '$2y$10$HQN01ELAvIBDod5V5Mo92eY7DKV.M6.ASQRN1fgbgxra9gMV3n3Wm', '203823987', 'active', '0', '2024-04-12 14:35:07', '2024-04-12 14:35:07'),
(7, 'Johbn olusesi', NULL, 'akj@gmail.comqw', '$2y$10$.6p2vRoTwhf9YciySHT/K.VWG59UZhevNMkiF3x7oTstp.oBSP/XS', '30490293423', 'active', '0', '2024-04-12 14:36:16', '2024-04-12 14:36:16'),
(8, 'Johbn ejdenuje', NULL, 'akj@gmail.comqweww', '$2y$10$1gFG39Hm/v.YEJohk13WT.Vm.O7S4v81RBPE2i1BjqK2io4VaL5lu', '123452345345435', 'active', '0', '2024-04-12 14:37:16', '2024-04-12 14:37:16'),
(9, 'Johbn olusesi', NULL, 'akj@gmail.comdkdj', '$2y$10$n.Gj6v87H3M1vhLMZSRMA.8WuQr4c6.AR.kzaJ3NeVcc6nF/JqfBW', '0349059085898', 'active', '0', '2024-04-12 14:38:28', '2024-04-12 14:38:28'),
(10, 'Abiola Yaubu', NULL, 'yakubu@gmail.com', '$2y$10$YM0P6P/9L.TFGQWavl5hn.Eh12qEDLh5DXtapIAKrV8wkynynzTLa', '920493', 'active', '0', '2024-04-12 14:39:06', '2024-04-12 14:39:06'),
(11, 'Elegusi yilata', NULL, 'akj@gmail.comqdjdhd', '$2y$10$QYqPZ0lR6A.GRZKDKVsGx.hKOGCN53PnDJOaTkKgSThBdySu9Fsb6', '20320384938948', 'active', '0', '2024-04-12 14:40:14', '2024-04-12 14:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_services`
--
ALTER TABLE `bookings_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings_services`
--
ALTER TABLE `bookings_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
