-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 12:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kahuna_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesstoken`
--

CREATE TABLE `accesstoken` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `birth` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesstoken`
--

INSERT INTO `accesstoken` (`id`, `token`, `birth`, `agentId`) VALUES
(3, 'Gpq1SGVf4Air6NzeDbybdm6sNZY', '2024-05-16 22:14:08', 6),
(4, 'Nrj4GVuMHXKybj8jMzuXCxTDfgM', '2024-05-16 22:27:48', 6),
(5, 'pbUWvsZi15ON6OxEomE2x8rL5RE', '2024-05-16 22:28:42', 6),
(6, 'alI5ptQ/YvoRfQo/dWMnbwW0IMA', '2024-05-16 22:28:50', 6),
(7, '8q6jsxHNM3gXImJAW/rFpLpbQdc', '2024-05-17 20:36:53', 6),
(8, 'BZk3b11RdxYaZPraO3udBTzz2Xs', '2024-05-17 21:22:38', 6),
(9, 'sHJ0Eqt33Zcd+aADM2RZbBLhFIg', '2024-05-18 13:16:07', 6),
(10, 'to0ujrlwObU0+pSdaqcypHOX1xI', '2024-05-18 14:10:59', 6),
(11, 'yzkGb4JzHdbM576gHb63djAbj4w', '2024-05-19 16:04:23', 6),
(12, 'Yky1+IecfGsi0TGnmAe12hirKJQ', '2024-05-25 07:19:27', 6),
(13, 'F/noVwYE+aXII5kIu5xJ+J8ZquY', '2024-05-26 13:59:30', 6),
(14, '/2fIukA7sGDeHSmMQPOigAnen1E', '2024-05-26 14:26:33', 6),
(15, 'sw0NaWz/wOoaswvDPmn26X1Jlp8', '2024-05-26 14:39:11', 6),
(16, 'O1k2QnqWHxG0Ua0CG9mMm+Liy1w', '2024-05-26 14:42:51', 6),
(17, 'k99ADZyfV1Hix8wgymPVy1PAo/s', '2024-05-26 15:29:40', 6),
(18, 'kqgH/BjCQqk3/+Xnv/H/l42dI8k', '2024-05-26 17:16:42', 6),
(19, 'FjwsIqNSDjFOS0B6fmKXEm74sLk', '2024-05-26 17:31:27', 6),
(20, 'hVexqRQ8994Oo1c7hJZK0xIdGDI', '2024-05-26 18:32:39', 6),
(21, 'gDUW4bqPDxAONbz1oLJLwFS4dy4', '2024-05-27 14:26:24', 6),
(22, 'gF7OXUx/4aqgLhfFNuhkg9B4wEY', '2024-05-27 14:31:59', 13),
(23, 'dUlCOUXZgvVAel8tRt9i9KXrYKM', '2024-05-28 12:50:04', 6),
(24, 'Bgu1jZPHjl/e55SFtd9OnUwr76Q', '2024-05-28 13:51:47', 6),
(25, 'J3TbllN/q73MaynfM6KCgoEig4c', '2024-05-28 18:17:54', 6),
(26, 'ahMinGAia5LAQGOhL0qBCucHdbg', '2024-05-28 18:18:40', 6),
(27, '2nOFjDkFURxiCNFC2DzBCMGKWAU', '2024-05-28 18:22:56', 6),
(28, 'JjyXzA3gm+QZZbeKWPj9Jb6FJlU', '2024-05-28 18:58:39', 6),
(29, '0viVtfSvB4LsHNMRawDNoqnTL9w', '2024-05-28 19:20:21', 6),
(30, 'O39k8qrACcOBB9vd4fWKXK8n8s0', '2024-05-28 19:32:34', 6),
(31, 'mcPzU6JEmSmorxIM/+rCEigAef8', '2024-05-28 19:32:55', 6),
(32, 'vmonOJV/HcuQe3/TP6Vpx8rBly0', '2024-05-28 19:49:53', 6),
(33, '+vp8QOVgsmW2LX1Li46ovo+79pg', '2024-05-28 19:59:46', 6),
(34, 'ZCbYGKJgIoAB1zIE40n4M/uyi4Q', '2024-05-28 21:53:55', 6),
(35, '4spUraBwj7CzJut8plsAInbgCRE', '2024-05-28 22:03:39', 6),
(36, 'h0DOijKSlFwAlVWIhqLMuAfXtHI', '2024-05-28 22:13:30', 6),
(37, 'XHzH/hdvgFH5Jbcp3bd2HBPWf1c', '2024-05-28 22:21:09', 6),
(38, 'FJSXIPaNokQ3ewz1ojDKMDXUmQ4', '2024-05-28 22:22:02', 6),
(39, '1vnbPrjugLrRjymYGVx4YVdFfzE', '2024-05-28 22:23:14', 6),
(40, 'P7JO/dY0pThOq/FrExAd0mzvkQo', '2024-05-29 06:52:41', 6),
(41, '83FAm6vPYkpwDktiffEiRCr9o/4', '2024-05-29 06:57:58', 6),
(42, '3r83cAZG1qpUHadnTgjBTc8zSnc', '2024-05-29 07:42:07', 6);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accessLevel` varchar(20) DEFAULT 'agent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `name`, `surname`, `email`, `password`, `accessLevel`) VALUES
(1, 'Joe', 'Pulo', 'joepulo@tenants.com', 'pass', 'agent'),
(2, 'Mark', 'Fava', 'mark@scaffolding.com', 'pass', 'agent'),
(5, 'Lee', 'Xuereb', 'xuereb@mail.com', 'pass', 'agent'),
(6, 'joe', 'cole', 'joe@ymail.com', '$2y$10$vcEfTqlOdFymDVvX8YD4sucm2W/USGKqAa6UIdDbKWsyQ0HjYRA1C', 'agent'),
(13, 'gianni', 'lino', 'gianni@vibe.com', '$2y$10$hJiInOSClqj0Yxfb2rKHh.pqi8o9JyhS1mMWKqKGAU2XVUcUEut0e', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `mob_no` varchar(8) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accessLevel` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `mob_no`, `email`, `password`, `accessLevel`) VALUES
(1, 'George', 'Theo', '78542587', 'theo@live.com', 'pass', 'user'),
(2, 'George', 'Theo', '78542587', 'theoleo@live.com', 'pass', 'user'),
(3, 'Tammy', 'Robert', '99056428', 'tammy@deliveries.com', 'pass', 'user'),
(6, 'George ', 'Twain', '95874256', 'twain@books.org', 'pass', 'user'),
(8, 'Pina', 'Tanti', '77858585', 'pina@local.com', 'pass', 'user'),
(9, 'Paul', 'John', '99854152', 'john@home.com', '$2y$10$6l./ktOdmG0DeIyPcegF1OlGEy3o.lVKfIGj.gu2JxL27MwMMaz8q', 'user'),
(10, 'Olly', 'Olly', '99854152', 'olly@fun.com', '$2y$10$LGUEruxamqWHF/47n3qs7ehVgvJLoBI0u6ehKaOk3SqUIou69APZ6', 'user'),
(11, 'Pio', 'Wright', '99854152', 'wright@mail.com', '$2y$10$huiEt66eKb24kfkRWdITDun0U3zeAbtpof4PCxUCKg/MZ4WQvgyrm', 'user'),
(12, 'Philip', 'James', '99856254', 'james@rentals.com', '$2y$10$eLlNKf897vUorgW0UoLjUe/7X4YDhW6qhwBBt5YACD6kaLyeA/u7O', 'user'),
(13, 'Lee', 'Thomas', '99852458', 'thomas@work.com', '$2y$10$Bn102YF1cB/TFpv.v/trGeOykaZu65Qp1u7IeLGz.4yI9faZw6GOy', 'user'),
(14, 'Planet', 'Joe', '99856254', 'planet@fun.org', '$2y$10$7h1s5zOyxPlJrXz2iviZj.SD2yu7X5vlnr080C.hNZG3cWNOtEu/y', 'user'),
(15, 'John', 'Travolta', '99854152', 'films@cinema.com', '$2y$10$wAAMD/YF5rtBWJ.xwOUJR.MrhTron0hVu6cFd6ZNxbXpp5NsCCzVW', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `customerproduct`
--

CREATE TABLE `customerproduct` (
  `id` int(11) NOT NULL,
  `registrationDate` datetime DEFAULT current_timestamp(),
  `customerId` int(11) DEFAULT NULL,
  `productstockId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerproduct`
--

INSERT INTO `customerproduct` (`id`, `registrationDate`, `customerId`, `productstockId`) VALUES
(1, '2024-05-19 18:34:54', 3, 5),
(5, '2024-05-19 18:36:16', 1, 7),
(6, '2024-05-19 18:36:18', 1, 7),
(7, '2024-05-19 18:37:12', 2, 6),
(10, '2024-05-24 20:44:22', 2, 4),
(12, '2024-05-24 21:00:18', 9, 8),
(23, '2024-05-25 18:50:33', 10, 9),
(26, '2024-05-26 00:21:51', 11, 10),
(27, '2024-05-26 00:27:02', 11, 3),
(29, '2024-05-26 23:01:09', 11, 12),
(30, '2024-05-27 17:17:54', 9, 13),
(31, '2024-05-27 18:54:10', 9, 14),
(32, '2024-01-27 22:01:31', 9, 15),
(33, '2023-05-27 22:03:31', 9, 16),
(34, '2020-06-26 00:21:51', 9, 17),
(35, '2018-05-26 00:21:51', 9, 18),
(36, '2024-05-28 18:57:58', 9, 18),
(37, '2024-05-28 18:58:59', 9, 17),
(38, '2024-05-29 00:43:50', 11, 19);

-- --------------------------------------------------------

--
-- Table structure for table `productstock`
--

CREATE TABLE `productstock` (
  `id` int(11) NOT NULL,
  `serialId` varchar(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  `warranty` smallint(6) NOT NULL,
  `registered` tinyint(1) DEFAULT 0
) ;

--
-- Dumping data for table `productstock`
--

INSERT INTO `productstock` (`id`, `serialId`, `name`, `warranty`, `registered`) VALUES
(1, '5587', 'Fan', 3, 1),
(3, '9898', 'Monitor', 2, 1),
(4, '5895', 'mouse', 2, 1),
(5, '5895', 'speaker', 2, 1),
(6, '6915', 'tv', 1, 1),
(7, '6685', 'remote control', 1, 1),
(8, '6685', 'remote control', 1, 1),
(9, '65825', 'Smartphone', 2, 1),
(10, '8745', 'set top box', 2, 1),
(11, '2532', 'Fan', 3, 1),
(12, '4857', 'power cable', 3, 1),
(13, '4857', 'power cable', 3, 1),
(14, '8579', 'ipod', 3, 1),
(15, '8574', 'headphones', 2, 1),
(16, '5893', 'cup holder ', 2, 1),
(17, '5284', 'Smartphone', 1, 1),
(18, '9841', 'night lamp', 2, 1),
(19, '9853', 'robot cleaner', 3, 1),
(20, 'KHWM8199911', 'CompiSpin Washing Machine', 2, 0),
(21, 'KHWM8199912', 'CompiSpin + Dry Washing Machine', 2, 0),
(22, 'KHMW789991', 'CombiGrillMicrowave', 1, 0),
(23, 'KHWP890001', 'K5 Water Pump', 5, 0),
(24, 'KHWP890002', 'K5 Heated Water Pump', 5, 0),
(25, 'KHSS988881', 'Smart Switch Lite', 2, 0),
(26, 'KHSS988882', 'Smart Switch Pro', 2, 0),
(27, 'KHSS988883', 'Smart Switch Pro V2', 2, 0),
(28, 'KHHM89762', 'Smart Heated Mug', 1, 0),
(29, 'KHSB0001', 'Smart Bulb 001', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticketNo` varchar(7) NOT NULL,
  `ticketDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ticketMessage` text NOT NULL,
  `ticketReply` text DEFAULT NULL,
  `agentId` int(11) DEFAULT NULL,
  `customerproductId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticketNo`, `ticketDate`, `ticketMessage`, `ticketReply`, `agentId`, `customerproductId`) VALUES
(1, '4585', '2024-05-19 21:01:36', 'faulty battery', NULL, 5, 5),
(2, '6585', '2024-05-19 21:03:06', 'power off', NULL, 1, 7),
(14, '6654e47', '2024-05-27 19:52:26', 'crackling sound', NULL, 1, 31),
(15, '6654e4a', '2024-05-27 19:53:12', 'loose contact', NULL, 1, 30),
(16, '6654e6b', '2024-05-29 08:00:05', 'worn out ear muffs', 'just checking', 6, 32),
(18, '6654e72', '2024-05-27 20:03:53', 'light shaded', NULL, 13, 33),
(22, '', '2024-05-28 13:51:26', 'flickering lights', NULL, 6, 35),
(23, '6656072', '2024-05-28 16:32:37', 'test of remote', NULL, 1, 12),
(24, '66560d2', '2024-05-28 16:58:20', 'bulb not lightning up ', NULL, 6, 35),
(25, '66560d6', '2024-05-28 16:59:12', 'keeps restarting', NULL, 2, 34),
(26, '66565e4', '2024-05-28 22:44:20', 'noisy ans scratching', NULL, 5, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesstoken`
--
ALTER TABLE `accesstoken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agent_accesstoken` (`agentId`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerproduct`
--
ALTER TABLE `customerproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_customerproduct` (`customerId`),
  ADD KEY `fk_productstock_customerproduct` (`productstockId`);

--
-- Indexes for table `productstock`
--
ALTER TABLE `productstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_agent` (`agentId`),
  ADD KEY `fk_customerproduct_ticket` (`customerproductId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesstoken`
--
ALTER TABLE `accesstoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customerproduct`
--
ALTER TABLE `customerproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `productstock`
--
ALTER TABLE `productstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesstoken`
--
ALTER TABLE `accesstoken`
  ADD CONSTRAINT `fk_agent_accesstoken` FOREIGN KEY (`agentId`) REFERENCES `agent` (`id`);

--
-- Constraints for table `customerproduct`
--
ALTER TABLE `customerproduct`
  ADD CONSTRAINT `fk_customer_customerproduct` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_productstock_customerproduct` FOREIGN KEY (`productstockId`) REFERENCES `productstock` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_customerproduct_ticket` FOREIGN KEY (`customerproductId`) REFERENCES `customerproduct` (`id`),
  ADD CONSTRAINT `fk_ticket_agent` FOREIGN KEY (`agentId`) REFERENCES `agent` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
