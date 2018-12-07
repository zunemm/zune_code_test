-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 11:32 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `june_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `invoice_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_name`, `remark`, `created_date`, `modified_date`) VALUES
(1, 'Web Development', 'Web Development Remark', '2018-12-01 19:09:48', '2018-12-01 19:09:48'),
(2, 'Bug Fix of Existing', 'Bug Fix of Existing Remark', '2018-12-01 19:08:38', '2018-12-01 19:08:38'),
(3, 'New Website', 'New Website Remark', '2018-12-01 19:09:00', '2018-12-01 19:09:00'),
(4, 'Documentation', 'Documentation Remark', '2018-12-01 19:09:27', '2018-12-01 19:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_info`
--

CREATE TABLE `invoice_item_info` (
  `invoice_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_item_info`
--

INSERT INTO `invoice_item_info` (`invoice_item_id`, `invoice_id`, `item_id`, `qty`) VALUES
(1, 1, 5, 1),
(2, 1, 6, 1),
(3, 1, 7, 1),
(4, 2, 8, 1),
(5, 2, 9, 1),
(6, 2, 10, 1),
(7, 2, 11, 1),
(8, 2, 12, 1),
(9, 3, 13, 1),
(10, 3, 14, 1),
(11, 4, 15, 1),
(12, 4, 16, 1),
(13, 4, 17, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice_item_inof_view`
--
CREATE TABLE `invoice_item_inof_view` (
`invoice_item_id` int(11)
,`invoice_id` int(11)
,`inv_id` int(11)
,`invoice_name` varchar(100)
,`item_id` int(11)
,`item_name` varchar(100)
,`qty` int(11)
,`price` float
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `original_qty` int(11) NOT NULL,
  `modified_qty` int(11) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `price`, `original_qty`, `modified_qty`, `remark`, `created_date`, `modified_date`) VALUES
(5, 'Web Development Item 1', 1000, 10, 0, 'Web Development Item 1 Remark', '2018-12-01 19:11:48', '2018-12-01 19:11:48'),
(6, 'Web Development Item 2', 1000, 10, 0, 'Web Development Item 2 Remark', '2018-12-01 19:12:18', '2018-12-01 19:12:18'),
(7, 'Web Development Item 3', 1000, 10, 0, 'Web Development Item 3 Remark', '2018-12-01 19:12:38', '2018-12-01 19:12:38'),
(8, 'Bug Fix of Existing Item 1', 400, 10, 0, 'Bug Fix of Existing Item 1 Remark', '2018-12-01 19:13:30', '2018-12-01 19:13:30'),
(9, 'Bug Fix of Existing Item 2', 400, 10, 0, 'Bug Fix of Existing Item 2 Remark', '2018-12-01 19:13:55', '2018-12-01 19:13:55'),
(10, 'Bug Fix of Existing Item 3', 400, 10, 0, 'Bug Fix of Existing Item 3 Remark', '2018-12-01 19:14:21', '2018-12-01 19:14:21'),
(11, 'Bug Fix of Existing Item 4', 400, 10, 0, 'Bug Fix of Existing Item 4 Remark', '2018-12-01 19:14:43', '2018-12-01 19:14:43'),
(12, 'Bug Fix of Existing Item 5', 400, 10, 0, 'Bug Fix of Existing Item 5 Remark', '2018-12-01 19:15:06', '2018-12-01 19:15:06'),
(13, 'New Website Item 1', 500, 10, 0, 'New Website Item 1 Remark', '2018-12-01 19:16:29', '2018-12-01 19:19:34'),
(14, 'New Website Item 2', 500, 10, 0, 'New Website Item 2 Remark', '2018-12-01 19:16:49', '2018-12-01 19:19:34'),
(15, 'Documentation Item 1', 1666.67, 10, 0, 'Documentation Item 1 Remark', '2018-12-01 19:17:19', '2018-12-01 19:17:19'),
(16, 'Documentation Item 2 ', 1666.67, 10, 0, 'Documentation Item 2  Remark', '2018-12-01 19:17:47', '2018-12-01 19:17:47'),
(17, 'Documentation Item 3', 1666.67, 10, 0, 'Documentation Item 3 Remark', '2018-12-01 19:18:11', '2018-12-01 19:18:11');

-- --------------------------------------------------------

--
-- Structure for view `invoice_item_inof_view`
--
DROP TABLE IF EXISTS `invoice_item_inof_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_item_inof_view`  AS  select `itf`.`invoice_item_id` AS `invoice_item_id`,`itf`.`invoice_id` AS `invoice_id`,`itf`.`invoice_id` AS `inv_id`,`i`.`invoice_name` AS `invoice_name`,`itf`.`item_id` AS `item_id`,`items`.`item_name` AS `item_name`,`itf`.`qty` AS `qty`,`items`.`price` AS `price` from ((`invoice_item_info` `itf` left join `invoices` `i` on((`itf`.`invoice_id` = `i`.`invoice_id`))) left join `items` on((`itf`.`item_id` = `items`.`item_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD UNIQUE KEY `invoice_name` (`invoice_name`);

--
-- Indexes for table `invoice_item_info`
--
ALTER TABLE `invoice_item_info`
  ADD PRIMARY KEY (`invoice_item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_name` (`item_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoice_item_info`
--
ALTER TABLE `invoice_item_info`
  MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
