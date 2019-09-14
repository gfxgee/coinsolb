-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 02:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_details`
--

CREATE TABLE `game_details` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `score` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `points_origin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_details`
--

INSERT INTO `game_details` (`id`, `user_id`, `score`, `timestamp`, `points_origin`) VALUES
(29, 2, 9, '2019-09-08 07:09:26', 'App Game'),
(30, 2, 3, '2019-09-08 08:07:45', 'App Game'),
(31, 2, 9, '2019-09-08 09:30:06', 'App Game'),
(32, 2, 0, '2019-09-14 02:26:10', 'App Game'),
(33, 2, 1, '2019-09-14 02:29:08', 'App Game'),
(34, 6, 500, '2019-09-14 02:53:18', 'Referral Points'),
(35, 7, 500, '2019-09-14 02:53:18', 'Referral Points'),
(36, 6, 500, '2019-09-14 02:59:30', 'Referral Points'),
(37, 7, 500, '2019-09-14 02:59:30', 'Referral Points'),
(38, 6, 500, '2019-09-14 03:02:08', 'Referral Points'),
(39, 7, 500, '2019-09-14 03:02:08', 'Referral Points'),
(40, 6, 500, '2019-09-14 03:03:48', 'Referral Points'),
(41, 7, 500, '2019-09-14 03:03:48', 'Referral Points'),
(42, 7, 1, '2019-09-14 03:17:06', 'App Game'),
(43, 7, 500, '2019-09-14 03:33:50', 'Referral Points'),
(44, 7, 500, '2019-09-14 03:34:18', 'Referral Points'),
(45, 7, 500, '2019-09-14 03:34:27', 'Referral Points'),
(46, 7, 500, '2019-09-14 03:34:42', 'Referral Points'),
(47, 7, 500, '2019-09-14 03:34:47', 'Referral Points'),
(48, 2, 500, '2019-09-14 03:35:00', 'Referral Points'),
(49, 2, 500, '2019-09-14 03:39:10', 'Referral Points'),
(50, 6, 0, '2019-09-14 03:53:51', 'App Game'),
(51, 6, 0, '2019-09-14 03:54:45', 'App Game'),
(52, 6, 0, '2019-09-14 03:55:14', 'App Game'),
(53, 6, 0, '2019-09-14 03:55:38', 'App Game'),
(54, 6, 0, '2019-09-14 03:56:33', 'App Game'),
(55, 2, 500, '2019-09-14 03:57:04', 'Referral Points'),
(56, 6, 0, '2019-09-14 03:57:38', 'App Game'),
(57, 2, 0, '2019-09-14 04:06:11', 'App Game'),
(58, 2, 0, '2019-09-14 04:06:42', 'App Game'),
(59, 2, 0, '2019-09-14 04:08:03', 'App Game'),
(60, 11, 0, '2019-09-14 06:28:14', 'App Game'),
(61, 11, 0, '2019-09-14 06:28:42', 'App Game'),
(62, 11, 0, '2019-09-14 06:29:09', 'App Game'),
(63, 11, 0, '2019-09-14 06:29:40', 'App Game'),
(64, 11, 0, '2019-09-14 06:30:05', 'App Game'),
(65, 2, 500, '2019-09-14 06:30:08', 'Referral Points'),
(66, 2, 0, '2019-09-14 09:20:19', 'App Game'),
(67, 2, 0, '2019-09-14 09:20:20', 'App Game'),
(68, 2, 1, '2019-09-14 09:24:02', 'App Game'),
(69, 2, 1, '2019-09-14 09:24:02', 'App Game'),
(70, 2, 0, '2019-09-14 09:25:40', 'App Game'),
(71, 2, 0, '2019-09-14 09:25:40', 'App Game'),
(72, 2, 1, '2019-09-14 09:27:25', 'App Game'),
(73, 2, 1, '2019-09-14 09:27:25', 'App Game'),
(74, 2, 8, '2019-09-14 09:33:28', 'App Game'),
(75, 2, 8, '2019-09-14 09:33:28', 'App Game'),
(76, 2, 0, '2019-09-14 09:37:13', 'App Game'),
(77, 2, 0, '2019-09-14 09:41:00', 'App Game'),
(78, 2, 0, '2019-09-14 09:47:43', 'App Game'),
(79, 2, 7, '2019-09-14 10:01:43', 'App Game'),
(80, 2, 4, '2019-09-14 10:03:27', 'App Game'),
(81, 2, 2, '2019-09-14 10:12:45', 'App Game'),
(82, 2, 2, '2019-09-14 10:14:34', 'App Game'),
(83, 2, 2, '2019-09-14 10:20:20', 'App Game'),
(84, 2, 1, '2019-09-14 10:20:58', 'App Game'),
(85, 2, 3, '2019-09-14 10:36:04', 'App Game'),
(86, 2, 7, '2019-09-14 10:58:06', 'App Game'),
(87, 2, 8, '2019-09-14 10:58:57', 'App Game'),
(88, 2, 2, '2019-09-14 11:01:06', 'App Game'),
(89, 2, 10, '2019-09-14 11:02:00', 'App Game'),
(90, 2, 2, '2019-09-14 12:02:36', 'App Game'),
(91, 2, 32, '2019-09-14 12:20:50', 'App Game');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `code` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`code`, `user_id`) VALUES
('a54n9bxtju', 2),
('b2u26g1vt1', 7),
('bmcvqnhz7k', 10),
('g3krlrky87', 6),
('i2018ain2g', 8),
('jwm3jkahzn', 5),
('k3jksrdn7t', 3),
('p2yskwwub1', 9),
('pe0aajtjhh', 4),
('q26r2hho3r', 11);

-- --------------------------------------------------------

--
-- Table structure for table `referral_details`
--

CREATE TABLE `referral_details` (
  `id` int(11) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `referral_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_details`
--

INSERT INTO `referral_details` (`id`, `referral_code`, `from_user_id`, `referral_status`) VALUES
(1, 'a54n9bxtju', 6, 'Activated'),
(2, 'a54n9bxtju', 7, 'Activated'),
(3, 'b2u26g1vt1', 8, 'pending'),
(4, 'b2u26g1vt1', 9, 'pending'),
(5, 'a54n9bxtju', 11, 'Activated'),
(6, 'a54n9bxtju', 3, 'Activated'),
(7, 'a54n9bxtju', 4, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$sHxG11hDbT0Qi8.vFmmE8e4TthQLVRQgDQQ7oaQO4E5hvM.zx7O6K', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1567232122, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'arielburlatacha@gmail.com', '$2y$10$SV0tK7Hma0ExO1QGlfj73Of1cq/U56yFpK2zJwY9KF4ggDiXErexS', 'arielburlatacha@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566639108, 1568461858, 1, 'ariel', 'acha', 'mo', '09953552686'),
(3, '::1', 'arielburlat@gmail.com', '$2y$10$sXoyU89MfrZh1NiqN4qZYORLPe/WT/Y8f2ZBTGDQ33coWq1qyw0U2', 'arielburlat@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1567940350, NULL, 1, 'ariel', 'acha', '', ''),
(4, '::1', 'acha.roberto@yahoo.com', '$2y$10$fqoDtHQBR4VBSuK4G/1.I..BU6to70q5RVjz/WpFLJTaJzpK28N6u', 'acha.roberto@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1567940514, NULL, 1, 'ariel', 'acha', NULL, NULL),
(5, '::1', 'test@test.com', '$2y$10$90jIbrMTBv9XI2qhKP6W2edAC3wDkE/gIH0dIzPpb2kl/.Cp5bPCC', 'test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1567940658, 1567940666, 1, 'test', 'test', NULL, NULL),
(6, '::1', 'test@ariel.com', '$2y$10$NUyw/Jje.kQ7.Zer96mQKO.mvqTvEVM0wp0CSQdLfMZirr.EdZqo2', 'test@ariel.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1567942318, 1568433422, 1, 'ariel', 'test', NULL, NULL),
(7, '::1', 'asdfadf@adfadfa.com', '$2y$10$LIqGpI9jATWwPZp3uPPS3eM9WDO0QOT2AzuuRVwNW72YtETHmFQz6', 'asdfadf@adfadfa.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568115685, 1568432344, 1, 'asdfasdfk', 'asdkfjadkf', NULL, NULL),
(8, '::1', 'daniel@burlat.com', '$2y$10$nYmKoXo3ain4ic6CvWOGguYZse2nNXY8AV4MjUvqjA3YoWBdiJilK', 'daniel@burlat.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568115892, 1568115927, 1, 'daniel', 'burlat', NULL, NULL),
(9, '::1', 'test@testtest.com', '$2y$10$NLa5mhYs0MF9kAmKSLEMQOUYNeiwofQvtPBMIgDejmsEuyd46vZGq', 'test@testtest.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568115979, NULL, 1, 'testtest', 'testtest', NULL, NULL),
(10, '::1', 'adsfasdfa@asdfasdfa.com', '$2y$10$/eMV7V/HxVlVdER245xEQu1iU3jpH9Rj6XcjWqzSIzEU/lc0MLry6', 'adsfasdfa@asdfasdfa.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568116018, NULL, 1, 'asdfasdf', 'asdfasdfa', NULL, NULL),
(11, '::1', 'tset@test.com', '$2y$10$5DzQBhcyRmARyseVZNokZO1G95JFcpg1QVC0h7rndw7QXKzVOXTtO', 'tset@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442424, 1568442433, 1, 'test', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 2),
(5, 3, 2),
(6, 4, 2),
(7, 5, 2),
(8, 6, 2),
(9, 7, 2),
(10, 8, 2),
(11, 9, 2),
(12, 10, 2),
(13, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `points_withdrawed` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_details`
--
ALTER TABLE `game_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `referral_details`
--
ALTER TABLE `referral_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_details`
--
ALTER TABLE `game_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_details`
--
ALTER TABLE `referral_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
