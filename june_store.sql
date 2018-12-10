-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 06:48 AM
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
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_name`, `created_date`, `modified_date`) VALUES
(1, 'Web Development', '2018-12-07 16:26:17', '2018-12-07 16:26:17'),
(2, 'Bug Fix of Existing', '2018-12-07 16:58:17', '2018-12-07 16:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_info`
--

CREATE TABLE `invoice_item_info` (
  `invoice_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_item_info`
--

INSERT INTO `invoice_item_info` (`invoice_item_id`, `invoice_id`, `item_id`, `qty`, `price`) VALUES
(1, 1, 1, 10, 500),
(2, 1, 2, 5, 1000),
(3, 1, 3, 8, 2000),
(4, 2, 4, 10, 400),
(5, 2, 5, 1, 400),
(6, 2, 6, 1, 400),
(7, 2, 7, 1, 400),
(8, 2, 8, 1, 400);

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
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `price`, `original_qty`, `modified_qty`, `created_date`, `modified_date`) VALUES
(1, 'web development item 1', 500, 10, 0, '2018-12-07 16:26:17', '2018-12-07 16:26:17'),
(2, 'web development item 2', 1000, 5, 0, '2018-12-07 16:26:17', '2018-12-07 16:26:17'),
(3, 'web development item 3', 2000, 8, 0, '2018-12-07 16:26:17', '2018-12-07 16:26:17'),
(4, 'Bug Fix of Existing item 1', 400, 10, 0, '2018-12-07 16:58:17', '2018-12-07 16:58:17'),
(5, 'Bug Fix of Existing item 2', 400, 1, 0, '2018-12-07 16:58:18', '2018-12-07 16:58:18'),
(6, 'Bug Fix of Existing item 3', 400, 1, 0, '2018-12-07 16:58:18', '2018-12-07 16:58:18'),
(7, 'Bug Fix of Existing item 4', 400, 1, 0, '2018-12-07 16:58:18', '2018-12-07 16:58:18'),
(8, 'Bug Fix of Existing item 5', 400, 1, 0, '2018-12-07 16:58:19', '2018-12-07 16:58:19');

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
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice_item_info`
--
ALTER TABLE `invoice_item_info`
  MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
