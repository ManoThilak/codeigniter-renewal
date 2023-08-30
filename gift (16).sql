-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 11:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `action` enum('created','updated','deleted') COLLATE utf8_unicode_ci NOT NULL,
  `log_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `log_type_title` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `log_type_id` int(11) NOT NULL DEFAULT 0,
  `changes` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_for` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `log_for_id` int(11) NOT NULL DEFAULT 0,
  `log_for2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_for_id2` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `share_with` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `files` text COLLATE utf8_unicode_ci NOT NULL,
  `read_by` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `status` enum('incomplete','pending','approved','rejected','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'incomplete',
  `user_id` int(11) NOT NULL,
  `in_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `checked_at` datetime DEFAULT NULL,
  `reject_reason` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `status`, `user_id`, `in_time`, `out_time`, `checked_by`, `note`, `checked_at`, `reject_reason`, `deleted`) VALUES
(1, 'incomplete', 1, '2022-03-30 05:49:05', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_items`
--

CREATE TABLE `checklist_items` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `is_checked` int(11) NOT NULL DEFAULT 0,
  `task_id` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('vb6d3biuon7h50b233st1e15s52tms9k', '::1', 1683446254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638333434363235343b757365725f69647c733a313a2231223b),
('krm20j8rufo0i84ltft5229rvqbjn411', '::1', 1683446251, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323038323735333b757365725f69647c733a323a223334223b),
('iq5i3qn25i65k5le73c8kk9i6i167ndp', '::1', 1683446257, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638333434363235343b757365725f69647c733a313a2231223b),
('2mff1l4mp8u4cieefqsjgll002667lu9', '::1', 1683446641, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638333434363634313b757365725f69647c733a313a2231223b),
('mcs5cicr0a5uj2j2abrc8dofbvicvesl', '::1', 1683447553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638333434373535333b757365725f69647c733a313a2231223b),
('sip0c4vlodhvrmueoh4s5378v9dgctlf', '::1', 1683448671, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638333434383637313b757365725f69647c733a313a2231223b),
('efoosmd8fev33dd9pdso6tdukdrjjgnb', '::1', 1683451797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638333435313739373b757365725f69647c733a313a2231223b),
('j8022a8qhm53pp5q3069ca8ma7u7m7b9', '::1', 1678085674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038353637343b757365725f69647c733a313a2231223b),
('ahn62n7pjdrhtl9fjrc0r4tl43b4rvhc', '::1', 1678086735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038363733353b757365725f69647c733a313a2231223b),
('9pfqcdfohvo4m1pqs4ru10iq7jun90sr', '::1', 1678087353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038373335333b),
('g0es3sqfjs8ipve0l6jqtdsopnkr26us', '::1', 1678087353, ''),
('p824dmv2om4ega971ls4l38ncqsce4e2', '::1', 1678103584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130333538323b),
('6fjl8dsklt3a7v94opd2348ol05cd91f', '::1', 1678539915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383533393931353b757365725f69647c733a313a2231223b),
('7c9vo98pjshktmbiv946usc7l7rhhvbo', '::1', 1678539916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383533393931363b),
('vc4entnj9r5l5qg4di8kgordpvqhtthg', '::1', 1679633521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637393633333531363b),
('3mtbdbs8so1g6spvc6cegv4r5bfml0d8', '::1', 1679634229, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637393633343232393b),
('35109sev7i5uvveso81jjqfaopgo8h98', '::1', 1679634339, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637393633343333353b);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `scompany_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `salesmanager_id` int(11) DEFAULT NULL,
  `sphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `company_name`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `scompany_name`, `salesmanager_id`, `sphone`, `files`, `image`) VALUES
(1, 'Hyper', '1/1 South Market street,\r\nJS Nagar, \r\n\r\n\r\n', 'Tuty', 'Tamilnadu', '628002', '', '2022-03-30', '', '1234567890', '', '', '1', 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'hfhdfhf1122', '', 0, 1, 'Arul', 'hyper@gmail.com', 3, 'Velavan Hyper', 4, '1234546782', 'a:1:{i:0;a:4:{s:9:\"file_name\";s:42:\"expense_file62639bcea0f6d-header_image.jpg\";s:9:\"file_size\";s:5:\"87985\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(2, 'Uma Jewellers', '1/1  South East Car Street,\nSouth Symbol street, Gandhi nagar', 'Chennai', 'Tamilnadu', '600002', '', '2022-03-30', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '12512c1sfsfs', '', 0, 4, 'Ram', 'uma@gmail.com', 3, 'Uma Jewellers', 5, '1234546233', 'a:2:{i:0;a:4:{s:9:\"file_name\";s:50:\"expense_file6281e26edcc61-Suresh-Ias-copy-vjpg.jpg\";s:9:\"file_size\";s:6:\"289878\";s:7:\"file_id\";N;s:12:\"service_type\";N;}i:1;a:4:{s:9:\"file_name\";s:71:\"expense_file627f9b7908e63-WhatsApp-Image-2022-05-03-at-12.59.43-PM.jpeg\";s:9:\"file_size\";s:5:\"73076\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(10, 'JELLYSOFT', '222/3, Palai Road,\nMalasoodi Complex 2nd Floor,\nOpp. to AVM Hospital', 'Thoothukudi', 'Tamilnadu', '628002', '', '2022-04-23', '', '7092150100', '', '', '1', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 2, 'SAMUEL', 'jellysoftindia@gmail.com', 2, 'JELLYSOFT', 4, '7092150100', 'a:0:{}', NULL),
(11, 'First Company', 'jhgkfyjh', 'Chennai', 'Tamilnadu', '600002', '', '0000-00-00', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 1, 'SalesMan', 'first@gmail.com', 2, 'Chris', 4, '1234546233', 'a:1:{i:0;a:4:{s:9:\"file_name\";s:71:\"expense_file6288ce44db0c9-WhatsApp-Image-2022-05-03-at-12.59.43-PM.jpeg\";s:9:\"file_size\";s:5:\"73076\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(12, 'Mano', 'jkbkjcb', 'Tutty', 'Tamilnadu', '628251', '', '2022-04-27', '', '8973609501', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 4, 'Mano Thilak', 'mailtomanok@gmail.com', 2, 'Mano Thilak', 6, '8973609501', 'a:1:{i:0;a:4:{s:9:\"file_name\";s:71:\"expense_file627fa2dae0d93-WhatsApp-Image-2022-05-03-at-12.59.43-PM.jpeg\";s:9:\"file_size\";s:5:\"73076\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(13, 'Demo Client', 'dgfd', 'Tuty', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567989', '', '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 3, 'Demo', 'demo@gmail.com', 3, 'Manoi', 4, '9874564123', 'a:1:{i:0;a:4:{s:9:\"file_name\";s:35:\"expense_file627fa84048ffc-b--1-.jpg\";s:9:\"file_size\";s:6:\"185325\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(14, 'Bbb', 'hfghfd', 'Chennai', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 4, 'sAMUEL', 'ss@gmail.com', 2, 'sam', 8, '1234546230', 'a:1:{i:0;a:4:{s:9:\"file_name\";s:57:\"expense_file62820e89dabc8-Floor-Aroma-900-ml--Rs.-75.jpeg\";s:9:\"file_size\";s:5:\"87387\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(15, 'Ramachandran', 'gsdgsd', 'Chennai', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 4, 'Ram', 'adminn@gmail.com', 2, 'ramac', 4, '1234546233', 'a:1:{i:0;a:4:{s:9:\"file_name\";s:71:\"expense_file6288cfc5a22d6-WhatsApp-Image-2022-05-03-at-12.59.43-PM.jpeg\";s:9:\"file_size\";s:5:\"73076\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', NULL),
(16, 'Jeeva Market', 'dfgdfg', 'Chennai', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 0, 'Jeeva', '', 0, 'Jeeva Market', 0, '1234546233', 'a:0:{}', NULL),
(17, 'Jeeva Market', 'dfgdfg', 'Chennai', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 0, 'Jeeva', 'admin1@gmail.com', 0, 'Jeeva Market', 0, '1234546233', 'a:0:{}', NULL),
(18, 'JELLYSOFT', 'fgjg', 'Chennai', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 0, 'SalesMan', '', 0, 'Jeeva Market', 0, '0000000000', ' ', NULL),
(19, 'Ccc', 'gdsg', 'Chennai', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 0, 'Christopher', 'admin2@gmail.com', 0, 'Chris', 0, '0000000000', 'a:0:{}', NULL),
(20, 'Dddd', 'dfgdfg', 'Tuty', 'Tamilnadu', '600002', '', '2022-04-27', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 4, 'David', 'admin3@gmail.com', 3, 'David', 8, '1234546233', 'a:0:{}', NULL),
(21, 'Siva Traders', 'South Street', 'Chennai', 'Tamilnadu', '600002', '', '2022-05-03', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 1, 'Siva RAjan', 'siva@gmail.com', 2, 'Siva Rajan Company', 4, '1234546236', 'a:0:{}', NULL),
(22, 'Chinnadurai', 'North street', 'Tuty', 'Tamilnadu', '600002', '', '2022-05-03', '', '3153545451', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', NULL, 0, 3, 'SIva', 'kc@gmail.com', 3, 'K Chinnadurai', 4, '0000000000', 'a:0:{}', NULL),
(23, 'Sivaji', 'vdsgdgfd', 'Chennai', 'Tamilnadu', '628008', '', '2022-05-21', '', '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, 4, 'Sivangi', 'sivaji@gmail.com', 2, 'Sivaji', 4, '9874563212', 'a:0:{}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_groups`
--

CREATE TABLE `client_groups` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_groups`
--

INSERT INTO `client_groups` (`id`, `title`, `deleted`) VALUES
(1, 'Thoothukudi', 0),
(2, 'Tirunelveli', 0),
(3, 'Good clients', 0),
(4, 'Best clients', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complete_master`
--

CREATE TABLE `complete_master` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complete_master`
--

INSERT INTO `complete_master` (`id`, `title`, `deleted`) VALUES
(1, 'Complete', 0),
(2, 'Incomplete', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courierdatas`
--

CREATE TABLE `courierdatas` (
  `id` int(11) NOT NULL,
  `telemarketer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `teledatas_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `assign_date` date DEFAULT current_timestamp(),
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `anniversary_date` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `complete_id` int(11) NOT NULL DEFAULT 1,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `sub_religion_id` int(11) NOT NULL DEFAULT 0,
  `gift_id` int(11) NOT NULL DEFAULT 0,
  `courier_status_id` int(11) NOT NULL DEFAULT 0,
  `landmark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gift_for` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `couriersent_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courierdatas`
--

INSERT INTO `courierdatas` (`id`, `telemarketer_id`, `customer_id`, `teledatas_id`, `client_id`, `assign_date`, `customer_name`, `birth_date`, `anniversary_date`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`, `status_id`, `complete_id`, `religion_id`, `sub_religion_id`, `gift_id`, `courier_status_id`, `landmark`, `gift_for`, `couriersent_id`) VALUES
(4, 2, 3, 0, 1, NULL, 'balaa', '1994-05-02', NULL, 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Forrest Ray3', 'Birthday Gift', 1),
(5, 2, 3, 0, 1, '2022-04-16', 'balaa', NULL, '2020-05-04', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Forrest Ray3', 'Anniversary Gift', 1),
(6, 1, 5, 0, 2, '2022-04-16', 'karthi', '1994-05-04', NULL, 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '0000-00-00', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 2, 6, 10, 0, 'Forrest Ray5', 'Birthday Gift', 1),
(7, 2, 8, 0, 1, '2022-04-16', 'arul', NULL, '2020-04-27', 'Aaron Hawkins3', 'Nunc. Avenue3', 'Nunc. Avenue3', '12348', NULL, '0000-00-00', NULL, '1234567898', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Aaron Hawkins3', 'Anniversary Gift', 1),
(8, 2, 7, 0, 1, '2022-04-16', 'Sivaa', '1994-05-06', NULL, 'Forrest Ray2', 'Corona 2', 'Corona 2', '12347', NULL, '0000-00-00', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray2', 'Birthday Gift', 1),
(9, 1, 6, 0, 2, '2022-04-18', 'dani', '1994-05-03', NULL, 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '0000-00-00', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Aaron Hawkins6', 'Birthday Gift', 1),
(10, 1, 6, 0, 2, '2022-04-19', 'dani', '1994-05-05', NULL, 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '0000-00-00', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Aaron Hawkins6', 'Birthday Gift', 1),
(12, 2, 7, 0, 1, '2022-04-19', 'Sivaa', '1994-05-06', NULL, 'Forrest Ray2', 'Corona 2', 'Corona 2', '12347', NULL, '0000-00-00', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray2', 'Birthday Gift', 1),
(13, 2, 11, 0, 2, '2022-04-20', 'karthi', '1994-05-10', NULL, 'Forrest Ray6', 'Corona 6', 'Corona 6', '12351', NULL, '0000-00-00', NULL, '1234567901', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 6, 0, 'Forrest Ray6', 'Birthday Gift', 1),
(14, 2, 11, 0, 2, '2022-04-20', 'karthi', NULL, '2020-05-01', 'Forrest Ray6', 'Corona 6', 'Corona 6', '12351', NULL, '0000-00-00', NULL, '1234567901', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 6, 0, 'Forrest Ray6', 'Anniversary Gift', 1),
(15, 2, 12, 0, 2, '2022-04-21', 'dani', NULL, '2020-05-04', 'Aaron Hawkins7', 'Nunc. Avenue7', 'Nunc. Avenue7', '12352', NULL, '0000-00-00', NULL, '1234567902', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 9, 0, 'Aaron Hawkins7', 'Anniversary Gift', 0),
(16, 2, 1077, 0, 1, '2022-04-23', 'aara', NULL, '2020-05-05', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '0000-00-00', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 6, 0, 'Aaron Hawkins2', 'Anniversary Gift', 1),
(17, 2, 1084, 0, 1, '2022-04-23', '33', NULL, '2020-05-06', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray3', 'Anniversary Gift', 1),
(19, 2, 1085, 0, 1, '2022-04-23', 'siva', NULL, '2020-05-03', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray1', 'Anniversary Gift', 1),
(20, 7, 1096, 0, 1, '2022-05-03', 'janoj', '2022-05-13', NULL, 'toovipuram 9th street', 'Tuty', 'Tamilnadu', '600002', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 2, 6, 10, 0, 'L', 'Birthday Gift', 1),
(21, 7, 1097, 0, 13, '2022-05-03', 'ssss', '2022-05-13', NULL, 'nnnn ', 'Tuty', 'Tamilnadu', '600002', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'ete', 'Birthday Gift', 0),
(22, 7, 1098, 0, 2, '2022-05-03', 'Saravanan', NULL, '1999-05-15', 'hjfgjh', 'Chennai', 'Tamilnadu', '600002', NULL, '0000-00-00', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Land', 'Anniversary Gift', 0),
(23, 7, 1098, 0, 2, '2022-05-03', 'Saravanan', '1980-05-14', NULL, '12/315 9th street Toovipuram ,\nTuticorin, 628008 ', 'Thoothukudi', 'Tamilnadu', '600111', NULL, '0000-00-00', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'District Library', 'Birthday Gift', 1),
(24, 7, 1099, 0, 22, '2022-05-05', 'Chinna', '1988-05-16', NULL, 'fdhfdhd', 'Chennai', 'Tamilnadu', '628008', NULL, '0000-00-00', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Land', 'Birthday Gift', 1),
(25, 2, 1088, 0, 1, '2022-05-07', 'vicky', NULL, '2020-05-20', 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 3, 10, 12, 0, 'Aaron Hawkins4', 'Anniversary Gift', 1),
(26, 2, 1088, 0, 1, '2022-05-07', 'vicky', '1994-05-18', NULL, 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 3, 10, 12, 0, 'Aaron Hawkins4', 'Birthday Gift', 1),
(27, 2, 1095, 0, 15, '2022-05-07', 'Ram', NULL, '2022-05-20', 'ggwge', 'Chennai', 'Tamilnadu', '628008', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 2, 8, 8, 0, 'Near as zoo', 'Anniversary Gift', 1),
(28, 2, 1088, 0, 1, '2022-05-07', 'vicky', '1994-05-18', NULL, 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 3, 10, 12, 0, 'Aaron Hawkins4', 'Birthday Gift', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courierqty`
--

CREATE TABLE `courierqty` (
  `courierqty` bigint(21) NOT NULL,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `sub_religion_id` int(11) NOT NULL DEFAULT 0,
  `gift_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courierqty`
--

INSERT INTO `courierqty` (`courierqty`, `religion_id`, `sub_religion_id`, `gift_id`) VALUES
(3, 0, 0, 0),
(3, 1, 5, 6),
(7, 1, 7, 7),
(1, 2, 8, 8),
(2, 2, 6, 10),
(3, 3, 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `couriersentdatas`
--

CREATE TABLE `couriersentdatas` (
  `id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `courier_date` date DEFAULT current_timestamp(),
  `tracking_num` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `telemarketer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `teledatas_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `assign_date` date DEFAULT NULL,
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `anniversary_date` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `complete_id` int(11) NOT NULL DEFAULT 1,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `sub_religion_id` int(11) NOT NULL DEFAULT 0,
  `gift_id` int(11) NOT NULL DEFAULT 0,
  `courier_status_id` int(11) NOT NULL DEFAULT 0,
  `landmark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gift_for` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courier_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salesmanager_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `couriersentdatas`
--

INSERT INTO `couriersentdatas` (`id`, `courier_id`, `courier_date`, `tracking_num`, `telemarketer_id`, `customer_id`, `teledatas_id`, `client_id`, `assign_date`, `customer_name`, `birth_date`, `anniversary_date`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`, `status_id`, `complete_id`, `religion_id`, `sub_religion_id`, `gift_id`, `courier_status_id`, `landmark`, `gift_for`, `courier_name`, `salesmanager_id`) VALUES
(4, 7, '2022-04-18', 'A12345', 2, 7, 0, 1, NULL, 'arul', NULL, NULL, 'Aaron Hawkins3', 'Nunc. Avenue3', 'Nunc. Avenue3', '12348', NULL, '0000-00-00', NULL, '1234567898', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Aaron Hawkins3', 'Anniversary Gift', 'St Courier', 4),
(5, 5, '2022-04-18', 'B12345', 2, 5, 0, 1, NULL, 'balaa', NULL, NULL, 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Forrest Ray3', 'Anniversary Gift', 'St Courier', 4),
(6, 8, '2022-04-18', 'C12345', 2, 8, 0, 1, NULL, 'Sivaa', '1994-05-06', NULL, 'Forrest Ray2', 'Corona 2', 'Corona 2', '12347', NULL, '0000-00-00', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray2', 'Birthday Gift', 'St Courier', 4),
(7, 6, '2022-04-19', 'As642ghfjh', 1, 6, 0, 2, NULL, 'karthi', '1994-05-04', NULL, 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '0000-00-00', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 2, 6, 10, 0, 'Forrest Ray5', 'Birthday Gift', 'Professional courier', 5),
(9, 12, '2022-04-19', 'dgvsdfgddfdfdfd', 2, 7, 0, 1, NULL, 'Sivaa', '1994-05-06', NULL, 'Forrest Ray2', 'Corona 2', 'Corona 2', '12347', NULL, '0000-00-00', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray2', 'Birthday Gift', 'ST Courier', 4),
(10, 4, '2022-04-20', 'lkjhgfds42343', 2, 3, 0, 1, NULL, 'balaa', '1994-05-02', NULL, 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Forrest Ray3', 'Birthday Gift', 'ST', 4),
(11, 13, '2022-04-20', 'As1124324324', 2, 11, 0, 2, NULL, 'karthi', '1994-05-10', NULL, 'Forrest Ray6', 'Corona 6', 'Corona 6', '12351', NULL, '0000-00-00', NULL, '1234567901', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 6, 0, 'Forrest Ray6', 'Birthday Gift', 'PF COURIER', 5),
(12, 14, '2022-04-20', 'bdfgdgd688', 2, 11, 0, 2, NULL, 'karthi', NULL, NULL, 'Forrest Ray6', 'Corona 6', 'Corona 6', '12351', NULL, '0000-00-00', NULL, '1234567901', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 6, 0, 'Forrest Ray6', 'Anniversary Gift', 'PF COURIER', 5),
(13, 16, '2022-04-23', NULL, 2, 1077, 0, 1, NULL, 'aara', NULL, NULL, 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '0000-00-00', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 5, 6, 0, 'Aaron Hawkins2', 'Anniversary Gift', NULL, 4),
(14, 17, '2022-04-23', NULL, 2, 1084, 0, 1, NULL, '33', NULL, NULL, 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray3', 'Anniversary Gift', NULL, 4),
(15, 19, '2022-04-23', NULL, 2, 1085, 0, 1, NULL, 'siva', NULL, NULL, 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Forrest Ray1', 'Anniversary Gift', NULL, 4),
(16, 9, '2022-04-25', NULL, 1, 6, 0, 2, NULL, 'dani', '1994-05-03', NULL, 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '0000-00-00', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, 0, 0, 'Aaron Hawkins6', 'Birthday Gift', NULL, 5),
(17, 23, '2022-05-03', NULL, 7, 1098, 0, 2, NULL, 'Saravanan', '1980-05-14', NULL, '12/315 9th street Toovipuram ,\nTuticorin, 628008 ', 'Thoothukudi', 'Tamilnadu', '600111', NULL, '0000-00-00', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'District Library', 'Birthday Gift', NULL, 5),
(18, 24, '2022-05-05', NULL, 7, 1099, 0, 22, NULL, 'Chinna', '1988-05-16', NULL, 'fdhfdhd', 'Chennai', 'Tamilnadu', '628008', NULL, '0000-00-00', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 1, 7, 7, 0, 'Land', 'Birthday Gift', NULL, 8),
(20, 20, '2022-05-06', NULL, 7, 1096, 0, 1, NULL, 'janoj', '2022-05-13', NULL, 'toovipuram 9th street', 'Tuty', 'Tamilnadu', '600002', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 2, 6, 10, 0, 'L', 'Birthday Gift', NULL, 4),
(21, 25, '2022-05-07', '4444544', 2, 1088, 0, 1, NULL, 'vicky', NULL, NULL, 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 3, 10, 12, 0, 'Aaron Hawkins4', 'Anniversary Gift', 'ST', 4),
(22, 26, '2022-05-07', '545456', 2, 1088, 0, 1, NULL, 'vicky', '1994-05-18', NULL, 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 3, 10, 12, 0, 'Aaron Hawkins4', 'Birthday Gift', 'ST', 4),
(23, 27, '2022-05-07', '544444544', 2, 1095, 0, 15, NULL, 'Ram', NULL, NULL, 'ggwge', 'Chennai', 'Tamilnadu', '628008', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 2, 8, 8, 0, 'Near as zoo', 'Anniversary Gift', 'ST', 4),
(24, 28, '2022-05-07', '45454', 2, 1088, 0, 1, NULL, 'vicky', '1994-05-18', NULL, 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, 3, 10, 12, 0, 'Aaron Hawkins4', 'Birthday Gift', 'ST', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `anniversary_date` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 2,
  `landmark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complete_id` int(11) NOT NULL DEFAULT 2,
  `next_followupdate` date DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `telemarketer_id` int(11) NOT NULL DEFAULT 0,
  `transfer_id` int(11) NOT NULL DEFAULT 2,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `sub_religion_id` int(11) NOT NULL DEFAULT 0,
  `gift_id` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `bid` int(11) NOT NULL DEFAULT 0,
  `acouriersent_id` int(11) NOT NULL DEFAULT 0,
  `bcouriersent_id` int(11) NOT NULL DEFAULT 0,
  `giftfor_id` int(11) NOT NULL DEFAULT 0,
  `giftfora_id` int(11) NOT NULL DEFAULT 0,
  `giftforb_id` int(11) NOT NULL DEFAULT 0,
  `salesmanager_id` int(11) NOT NULL DEFAULT 0,
  `assign_date` date DEFAULT NULL,
  `completed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `client_id`, `customer_name`, `birth_date`, `anniversary_date`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`, `status_id`, `landmark`, `complete_id`, `next_followupdate`, `comments`, `telemarketer_id`, `transfer_id`, `religion_id`, `sub_religion_id`, `gift_id`, `aid`, `bid`, `acouriersent_id`, `bcouriersent_id`, `giftfor_id`, `giftfora_id`, `giftforb_id`, `salesmanager_id`, `assign_date`, `completed_date`) VALUES
(1, 1, 'siva', '1994-04-30', '2020-04-22', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '2022-04-12', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'aa@gmail.com', NULL, NULL, 1, 'Forrest Ray1', 1, '2022-04-13', 'Now', 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, '2022-04-01', NULL),
(2, 1, 'arun', '2022-04-16', NULL, 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '2022-04-12', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins2', 1, NULL, '', 2, 1, 1, 5, 9, 0, 0, 0, 0, 0, 0, 0, 4, '2022-04-05', NULL),
(3, 1, 'balaa', '1994-05-02', '2020-05-04', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '2022-04-12', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray3', 1, NULL, '', 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, NULL, NULL),
(4, 2, 'vicky', '1998-04-23', '2020-04-23', 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '2022-04-12', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins4', 1, NULL, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, '2022-04-05', NULL),
(5, 2, 'karthi', '1994-05-04', '2020-04-24', 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '2022-04-12', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray5', 1, NULL, '', 1, 1, 2, 6, 10, 0, 0, 0, 0, 0, 0, 0, 5, NULL, NULL),
(6, 2, 'dani', '1994-05-05', '2020-04-25', 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '2022-04-12', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins6', 1, NULL, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, NULL, NULL),
(7, 1, 'Sivaa', '1994-05-06', '2020-04-26', 'Forrest Ray2', 'Corona 2', 'Corona 2', '12347', NULL, '2022-04-12', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray2', 1, NULL, '', 2, 1, 1, 7, 7, 0, 0, 0, 0, 0, 0, 0, 4, NULL, NULL),
(8, 1, 'Arul', '1991-05-07', '2020-04-27', '20/45 North West city complex, south east Vandalur,', 'Chennai', 'Tamilnadu', '600002', NULL, '2022-04-12', NULL, '1234567898', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Near as zoo', 1, NULL, '', 2, 1, 1, 7, 7, 0, 0, 0, 0, 1, 0, 1, 4, NULL, NULL),
(9, 1, 'bala', '1994-05-08', '2020-04-28', 'Forrest Ray4', 'Corona 4', 'Corona 4', '12349', NULL, '2022-04-12', NULL, '1234567899', NULL, '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray4', 1, NULL, '', 2, 1, 3, 10, 12, 0, 0, 0, 0, 2, 1, 0, 4, NULL, NULL),
(10, 2, 'vicky', '1994-05-09', '2020-04-29', 'Aaron Hawkins5', 'Nunc. Avenue5', 'Nunc. Avenue5', '12350', NULL, '2022-04-12', NULL, '1234567900', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 'Aaron Hawkins5', 2, NULL, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, '2022-05-02', NULL),
(11, 2, 'karthi', '1994-05-10', '2020-05-01', 'Forrest Ray6', 'Corona 6', 'Corona 6', '12351', NULL, '2022-04-12', NULL, '1234567901', NULL, ',:1:', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray6', 1, NULL, '', 2, 1, 1, 5, 6, 0, 0, 0, 0, 3, 1, 1, 5, NULL, NULL),
(12, 2, 'dani', '1994-05-11', '2020-05-02', 'Aaron Hawkins7', 'Nunc. Avenue7', 'Nunc. Avenue7', '12352', NULL, '2022-04-12', NULL, '1234567902', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins7', 1, NULL, '', 2, 1, 1, 5, 9, 0, 0, 0, 0, 3, 1, 1, 5, '2022-04-15', NULL),
(1076, 1, 'vikk', '1996-04-30', '2020-04-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '2022-04-13', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray1', 1, NULL, '', 2, 1, 2, 6, 10, 1, 0, 0, 0, 0, 0, 0, 4, NULL, NULL),
(1077, 1, 'aara', '1994-05-01', '2020-05-05', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '2022-04-13', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins2', 1, NULL, '', 2, 1, 1, 5, 6, 0, 0, 0, 0, 2, 1, 0, 4, NULL, NULL),
(1078, 1, 'daya', '1994-05-02', '2020-04-22', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '2022-04-13', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray3', 1, NULL, '', 2, 1, 1, 7, 7, 0, 0, 0, 0, 3, 1, 1, 4, NULL, NULL),
(1079, 2, 'vik', '1994-05-17', '2020-05-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '2022-04-13', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray1', 1, NULL, '', 2, 1, 2, 8, 8, 0, 0, 0, 0, 0, 0, 0, 5, NULL, NULL),
(1080, 2, 'aara', '1994-05-01', '2020-04-21', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '2022-04-13', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins2', 1, NULL, '', 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, NULL, NULL),
(1081, 2, 'daya', '1994-05-02', '2020-04-22', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '2022-04-13', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray3', 1, NULL, '', 2, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, NULL, NULL),
(1082, 1, '1', '1994-05-02', '2020-04-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '2022-04-13', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray1', 1, NULL, '', 2, 1, 2, 6, 10, 1, 0, 0, 0, 3, 1, 1, 4, NULL, NULL),
(1083, 1, '23', '1994-05-10', '2020-04-21', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '2022-04-13', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins2', 1, NULL, '', 2, 1, 2, 6, 10, 0, 0, 0, 0, 1, 0, 1, 4, NULL, NULL),
(1084, 1, '33', '1994-05-04', '2020-05-06', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '2022-04-13', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray3', 1, NULL, '', 2, 1, 1, 7, 7, 0, 0, 0, 0, 2, 1, 0, 4, NULL, NULL),
(1085, 1, 'siva', '1994-05-03', '2020-05-03', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '2022-04-13', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Forrest Ray1', 1, NULL, '', 2, 1, 1, 7, 7, 0, 0, 0, 0, 2, 1, 0, 4, NULL, NULL),
(1086, 1, 'arul', '1994-05-01', '2020-04-21', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '2022-04-13', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins2', 1, NULL, '', 2, 1, 2, 6, 10, 0, 0, 0, 0, 1, 0, 1, 4, NULL, '2022-05-07'),
(1087, 1, 'bala', '1994-05-02', '2020-04-22', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '2022-04-13', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 'Forrest Ray3', 2, NULL, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, NULL, NULL),
(1088, 1, 'vicky', '1994-05-18', '2020-05-20', 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '2022-04-13', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Aaron Hawkins4', 1, NULL, '', 2, 1, 3, 10, 12, 0, 0, 0, 0, 3, 1, 1, 4, '0000-00-00', '2022-05-07'),
(1089, 1, 'karthi', '1994-05-04', '2020-04-24', 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '2022-04-13', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 'Forrest Ray5', 2, NULL, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, '0000-00-00', NULL),
(1090, 1, 'dani', '1994-05-05', '2020-04-25', 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '2022-04-13', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 'Aaron Hawkins6', 2, NULL, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, '0000-00-00', NULL),
(1091, 1, 'Mike', '2022-04-19', '2022-04-18', 'ss', 'tee', 'Sa', '600002', NULL, '2022-04-14', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'ete', 1, NULL, '', 2, 1, 2, 6, 10, 1, 0, 0, 0, 0, 0, 0, 4, NULL, NULL),
(1092, 1, 'Hyper Customer', '2022-05-25', '2022-05-24', 'sasasasasasas', 'Chennai', 'Tamilnadu', '600111', NULL, '2022-04-20', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Land', 2, NULL, '', 2, 2, 2, 8, 8, 0, 0, 0, 0, 1, 0, 0, 4, '0000-00-00', NULL),
(1093, 1, 'Hy Cus', NULL, '2022-05-18', 'sfdgdgdfgd', 'rtrt', 'Tamilnadu', '600111', NULL, '2022-04-20', NULL, '9874563210', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Land', 2, NULL, '', 2, 2, 1, 7, 7, 0, 0, 0, 0, 2, 0, 0, 4, '0000-00-00', NULL),
(1094, 10, 'arun', NULL, NULL, '', '', '', '', NULL, '2022-04-23', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, '', 2, NULL, NULL, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, '2022-08-25', NULL),
(1095, 15, 'Ram', '2022-05-20', '2022-05-20', 'ggwge', 'Chennai', 'Tamilnadu', '628008', NULL, '2022-04-29', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Near as zoo', 1, NULL, '', 2, 1, 2, 8, 8, 0, 0, 1, 0, 3, 1, 1, 0, NULL, '2022-05-07'),
(1096, 1, 'janoj', '2022-05-13', '2022-05-13', 'toovipuram 9th street', 'Tuty', 'Tamilnadu', '600002', NULL, '2022-05-03', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'L', 1, NULL, '', 7, 1, 2, 6, 10, 0, 0, 0, 0, 1, 0, 1, 4, '2022-05-03', NULL),
(1097, 13, 'ssss', '2022-05-13', '2022-05-13', 'nnnn ', 'Tuty', 'Tamilnadu', '600002', NULL, '2022-05-03', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'ete', 1, NULL, '', 7, 1, 1, 7, 7, 0, 0, 0, 0, 1, 0, 1, 4, '2022-05-03', NULL),
(1098, 2, 'Saravanan', '1980-05-14', '1999-05-15', '12/315 9th street Toovipuram ,\nTuticorin, 628008 ', 'Thoothukudi', 'Tamilnadu', '600111', NULL, '2022-05-03', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'District Library', 1, NULL, '', 7, 1, 1, 7, 7, 0, 0, 0, 0, 3, 1, 1, 5, '2022-05-03', NULL),
(1099, 22, 'Chinna', '1988-05-16', '2000-05-19', 'fdhfdhd', 'Chennai', 'Tamilnadu', '628008', NULL, '2022-05-05', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 'Land', 1, NULL, '', 7, 1, 1, 7, 7, 0, 0, 0, 0, 1, 0, 1, 0, '2022-05-05', '2022-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `placeholder` text COLLATE utf8_unicode_ci NOT NULL,
  `example_variable_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `field_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `related_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `show_in_table` tinyint(1) NOT NULL DEFAULT 0,
  `show_in_invoice` tinyint(1) NOT NULL DEFAULT 0,
  `show_in_estimate` tinyint(1) NOT NULL DEFAULT 0,
  `visible_to_admins_only` tinyint(1) NOT NULL DEFAULT 0,
  `hide_from_clients` tinyint(1) NOT NULL DEFAULT 0,
  `disable_editing_by_clients` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` int(11) NOT NULL,
  `related_to_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `related_to_id` int(11) NOT NULL,
  `custom_field_id` int(11) NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_widgets`
--

CREATE TABLE `custom_widgets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT 0,
  `show_border` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE `dashboards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dashboards`
--

INSERT INTO `dashboards` (`id`, `user_id`, `title`, `data`, `color`, `sort`, `deleted`) VALUES
(1, 27, 'Tit', 'a:0:{}', '#83c340', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` text COLLATE utf8_unicode_ci NOT NULL,
  `default_message` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `custom_message` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template_name`, `email_subject`, `default_message`, `custom_message`, `deleted`) VALUES
(1, 'login_info', 'Login details', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\">  <h1>Login Details</h1></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\"> Hello {USER_FIRST_NAME}, &nbsp;{USER_LAST_NAME},<br><br>An account has been created for you.</p>            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\"> Please use the following info to login your dashboard:</p>            <hr>            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\">Dashboard URL:&nbsp;<a href=\"{DASHBOARD_URL}\" target=\"_blank\">{DASHBOARD_URL}</a></p>            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\"></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Email: {USER_LOGIN_EMAIL}</span><br></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Password:&nbsp;{USER_LOGIN_PASSWORD}</span></p>            <p style=\"color: rgb(85, 85, 85);\"><br></p>            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\">{SIGNATURE}</p>        </div>    </div></div>', '', 0),
(2, 'reset_password', 'Reset password', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Reset Password</h1>\n </div>\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255); color:#555;\">                    <p style=\"font-size: 14px;\"> Hello {ACCOUNT_HOLDER_NAME},<br><br>A password reset request has been created for your account.&nbsp;</p>\n                    <p style=\"font-size: 14px;\"> To initiate the password reset process, please click on the following link:</p>\n                    <p style=\"font-size: 14px;\"><a href=\"{RESET_PASSWORD_URL}\" target=\"_blank\">Reset Password</a></p>\n                    <p style=\"font-size: 14px;\"></p>\n                    <p style=\"\"><span style=\"font-size: 14px; line-height: 20px;\"><br></span></p>\n<p style=\"\"><span style=\"font-size: 14px; line-height: 20px;\">If you\'ve received this mail in error, it\'s likely that another user entered your email address by mistake while trying to reset a password.</span><br></p>\n<p style=\"\"><span style=\"font-size: 14px; line-height: 20px;\">If you didn\'t initiate the request, you don\'t need to take any further action and can safely disregard this email.</span><br></p>\n<p style=\"font-size: 14px;\"><br></p>\n<p style=\"font-size: 14px;\">{SIGNATURE}</p>\n                </div>\n            </div>\n        </div>', '', 0),
(3, 'team_member_invitation', 'You are invited', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Account Invitation</h1>   </div>  <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Hello,</span><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><span style=\"font-weight: bold;\"><br></span></span></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><span style=\"font-weight: bold;\">{INVITATION_SENT_BY}</span> has sent you an invitation to join with a team.</span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><br></span></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{INVITATION_URL}\" target=\"_blank\">Accept this Invitation</a></span></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><br></span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">If you don\'t want to accept this invitation, simply ignore this email.</span><br><br></p>            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\">{SIGNATURE}</p>        </div>    </div></div>', '', 0),
(4, 'send_invoice', 'New invoice', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>INVOICE #{INVOICE_ID}</h1></div> <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">  <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Hello {CONTACT_FIRST_NAME},</span><br></p><p style=\"\"><span style=\"font-size: 14px; line-height: 20px;\">Thank you for your business cooperation.</span><br></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Your invoice for the project {PROJECT_TITLE} has been generated and is attached here.</span></p><p style=\"\"><br></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{INVOICE_URL}\" target=\"_blank\">Show Invoice</a></span></p><p style=\"\"><span style=\"font-size: 14px; line-height: 20px;\"><br></span></p><p style=\"\"><span style=\"font-size: 14px; line-height: 20px;\">Invoice balance due is {BALANCE_DUE}</span><br></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Please pay this invoice within {DUE_DATE}.&nbsp;</span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><br></span></p><p style=\"color: rgb(85, 85, 85); font-size: 14px;\">{SIGNATURE}</p>  </div> </div></div>', '', 0),
(5, 'signature', 'Signature', 'Powered By: <a href=\"http://fairsketch.com/\" target=\"_blank\">fairsketch </a>', '', 0),
(6, 'client_contact_invitation', 'You are invited', '<div style=\"background-color: #eeeeef; padding: 50px 0; \">    <div style=\"max-width:640px; margin:0 auto; \">  <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Account Invitation</h1> </div> <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Hello,</span><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><span style=\"font-weight: bold;\"><br></span></span></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><span style=\"font-weight: bold;\">{INVITATION_SENT_BY}</span> has sent you an invitation to a client portal.</span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><br></span></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{INVITATION_URL}\" target=\"_blank\">Accept this Invitation</a></span></p>            <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><br></span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">If you don\'t want to accept this invitation, simply ignore this email.</span><br><br></p>            <p style=\"color: rgb(85, 85, 85); font-size: 14px;\">{SIGNATURE}</p>        </div>    </div></div>', '', 0),
(7, 'ticket_created', 'Ticket  #{TICKET_ID} - {TICKET_TITLE}', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Ticket #{TICKET_ID} Opened</h1></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\"><p style=\"\"><span style=\"line-height: 18.5714px; font-weight: bold;\">Title: {TICKET_TITLE}</span><span style=\"line-height: 18.5714px;\"><br></span></p><p style=\"\"><span style=\"line-height: 18.5714px;\">{TICKET_CONTENT}</span><br></p> <p style=\"\"><br></p> <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{TICKET_URL}\" target=\"_blank\">Show Ticket</a></span></p> <p style=\"\"><br></p><p style=\"\">Regards,</p><p style=\"\"><span style=\"line-height: 18.5714px;\">{USER_NAME}</span><br></p>   </div>  </div> </div>', '', 0),
(8, 'ticket_commented', 'Ticket  #{TICKET_ID} - {TICKET_TITLE}', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Ticket #{TICKET_ID} Replies</h1></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\"><p style=\"\"><span style=\"line-height: 18.5714px; font-weight: bold;\">Title: {TICKET_TITLE}</span><span style=\"line-height: 18.5714px;\"><br></span></p><p style=\"\"><span style=\"line-height: 18.5714px;\">{TICKET_CONTENT}</span></p><p style=\"\"><span style=\"line-height: 18.5714px;\"><br></span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{TICKET_URL}\" target=\"_blank\">Show Ticket</a></span></p></div></div></div>', '', 0),
(9, 'ticket_closed', 'Ticket  #{TICKET_ID} - {TICKET_TITLE}', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Ticket #{TICKET_ID}</h1></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\"><p style=\"\"><span style=\"line-height: 18.5714px;\">The Ticket #{TICKET_ID} has been closed by&nbsp;</span><span style=\"line-height: 18.5714px;\">{USER_NAME}</span></p> <p style=\"\"><br></p> <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{TICKET_URL}\" target=\"_blank\">Show Ticket</a></span></p>   </div>  </div> </div>', '', 0),
(10, 'ticket_reopened', 'Ticket  #{TICKET_ID} - {TICKET_TITLE}', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Ticket #{TICKET_ID}</h1></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\"><p style=\"\"><span style=\"line-height: 18.5714px;\">The Ticket #{TICKET_ID} has been reopened by&nbsp;</span><span style=\"line-height: 18.5714px;\">{USER_NAME}</span></p><p style=\"\"><br></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{TICKET_URL}\" target=\"_blank\">Show Ticket</a></span></p>  </div> </div></div>', '', 0),
(11, 'general_notification', '{EVENT_TITLE}', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>{APP_TITLE}</h1></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\"><p style=\"\"><span style=\"line-height: 18.5714px;\">{EVENT_TITLE}</span></p><p style=\"\"><span style=\"line-height: 18.5714px;\">{EVENT_DETAILS}</span></p><p style=\"\"><span style=\"line-height: 18.5714px;\"><br></span></p><p style=\"\"><span style=\"line-height: 18.5714px;\"></span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><a style=\"background-color: #00b393; padding: 10px 15px; color: #ffffff;\" href=\"{NOTIFICATION_URL}\" target=\"_blank\">View Details</a></span></p>  </div> </div></div>', '', 0),
(12, 'invoice_payment_confirmation', 'Payment received', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\">\r\n <tbody><tr>\r\n <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n <tbody><tr>\r\n <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\">\r\n                                        <tbody><tr>\r\n                                                <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                        <tbody>\r\n                                                            <tr>\r\n                                                                <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                                    <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\">\r\n                                                                        <tbody><tr>\r\n                                                                                <td valign=\"top\" style=\"padding-top: 40px;padding-right: 18px;padding-bottom: 40px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\">\r\n                                                                                    <h2 style=\"display: block;margin: 0;padding: 0;font-family: Arial;font-size: 30px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: -1px;text-align: center;color: #ffffff !important;\">Payment Confirmation</h2>\r\n                                                                                </td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </td>\r\n                                                            </tr>\r\n                                                        </tbody>\r\n                                                    </table>\r\n                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                        <tbody>\r\n                                                            <tr>\r\n                                                                <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n\r\n                                                                    <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\">\r\n                                                                        <tbody><tr>\r\n                                                                                <td valign=\"top\" style=\"padding-top: 20px;padding-right: 18px;padding-bottom: 0;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\">\r\n                                                                                    Hello,<br>\r\n                                                                                    We have received your payment of {PAYMENT_AMOUNT} for {INVOICE_ID} <br>\r\n                                                                                    Thank you for your business cooperation.\r\n                                                                                </td>\r\n                                                                            </tr>\r\n                                                                            <tr>\r\n                                                                                <td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\">\r\n                                                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td style=\"padding-top: 15px;padding-right: 0x;padding-bottom: 15px;padding-left: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                                                                        <tbody>\r\n                                                                                                            <tr>\r\n                                                                                                                <td align=\"center\" valign=\"middle\" style=\"font-family: Arial;font-size: 16px;padding: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\">\r\n                                                                                                                    <a href=\"{INVOICE_URL}\" target=\"_blank\" style=\"font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;\">View Invoice</a>\r\n                                                                                                                </td>\r\n                                                                                                            </tr>\r\n                                                                                                        </tbody>\r\n                                                                                                    </table>\r\n                                                                                                </td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                </td>\r\n                                                                            </tr>\r\n                                                                            <tr>\r\n                                                                                <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> \r\n                                                                                    \r\n                                                                                </td>\r\n                                                                            </tr>\r\n                                                                            <tr>\r\n                                                                                <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> \r\n  {SIGNATURE}\r\n  </td>\r\n </tr>\r\n </tbody>\r\n  </table>\r\n  </td>\r\n  </tr>\r\n  </tbody>\r\n </table>\r\n  </td>\r\n </tr>\r\n  </tbody>\r\n  </table>\r\n  </td>\r\n </tr>\r\n </tbody>\r\n </table>\r\n </td>\r\n </tr>\r\n </tbody>\r\n  </table>', NULL, 0),
(13, 'message_received', '{SUBJECT}', '<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\"> <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\"> <style type=\"text/css\"> #message-container p {margin: 10px 0;} #message-container h1, #message-container h2, #message-container h3, #message-container h4, #message-container h5, #message-container h6 { padding:10px; margin:0; } #message-container table td {border-collapse: collapse;} #message-container table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; } #message-container a span{padding:10px 15px !important;} </style> <table id=\"message-container\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#eee; margin:0; padding:0; width:100% !important; line-height: 100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family:Helvetica,Arial,sans-serif; color: #555;\"> <tbody> <tr> <td valign=\"top\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\" width=\"600\">&nbsp;</td> </tr> <tr> <td style=\"background-color:#33333e; padding:25px 15px 30px 15px; font-weight:bold; \" width=\"600\"><h2 style=\"color:#fff; text-align:center;\">{USER_NAME} sent you a message</h2></td> </tr> <tr> <td bgcolor=\"whitesmoke\" style=\"background:#fff; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"10\" width=\"560\">&nbsp;</td> </tr> <tr> <td width=\"560\"><p><span style=\"background-color: transparent;\">{MESSAGE_CONTENT}</span></p> <p style=\"display:inline-block; padding: 10px 15px; background-color: #00b393;\"><a href=\"{MESSAGE_URL}\" style=\"text-decoration: none; color:#fff;\" target=\"_blank\">Reply Message</a></p> </td> </tr> <tr> <td height=\"10\" width=\"560\">&nbsp;</td> </tr> </tbody> </table> </td> </tr> <tr> <td height=\"60\" width=\"600\">&nbsp;</td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0),
(14, 'invoice_due_reminder_before_due_date', 'Invoice due reminder', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 40px;padding-right: 18px;padding-bottom: 40px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> <h2 style=\"display: block;margin: 0;padding: 0;font-family: Arial;font-size: 30px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: -1px;text-align: center;color: #ffffff !important;\">Invoice Due Reminder</h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 20px;padding-right: 18px;padding-bottom: 0;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><p> Hello,<br>We would like to remind you that invoice {INVOICE_ID} is due on {DUE_DATE}. Please pay the invoice within due date.&nbsp;</p><p></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><p>If you have already submitted the payment, please ignore this email.</p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px;padding-right: 0x;padding-bottom: 15px;padding-left: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-family: Arial;font-size: 16px;padding: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><a href=\"{INVOICE_URL}\" target=\"_blank\" style=\"font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;\">View Invoice</a> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0),
(15, 'invoice_overdue_reminder', 'Invoice overdue reminder', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 40px;padding-right: 18px;padding-bottom: 40px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> <h2 style=\"display: block;margin: 0;padding: 0;font-family: Arial;font-size: 30px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: -1px;text-align: center;color: #ffffff !important;\">Invoice Overdue Reminder</h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 20px;padding-right: 18px;padding-bottom: 0;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><p> Hello,<br>We would like to remind you that you have an unpaid invoice {INVOICE_ID}. We kindly request you to pay the invoice as soon as possible.&nbsp;</p><p></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><p>If you have already submitted the payment, please ignore this email.</p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px;padding-right: 0x;padding-bottom: 15px;padding-left: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-family: Arial;font-size: 16px;padding: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><a href=\"{INVOICE_URL}\" target=\"_blank\" style=\"font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;\">View Invoice</a> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0),
(16, 'recurring_invoice_creation_reminder', 'Recurring invoice creation reminder', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 40px;padding-right: 18px;padding-bottom: 40px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> <h2 style=\"display: block;margin: 0;padding: 0;font-family: Arial;font-size: 30px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: -1px;text-align: center;color: #ffffff !important;\">Invoice Cration Reminder</h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 20px;padding-right: 18px;padding-bottom: 0;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><p> Hello,<br>We would like to remind you that a recurring invoice will be created on {NEXT_RECURRING_DATE}.</p><p></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%; text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px; padding-bottom: 15px; text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-size: 16px; padding: 10px; text-size-adjust: 100%;\"><a href=\"{INVOICE_URL}\" target=\"_blank\" style=\"font-weight: bold; line-height: 100%; color: rgb(255, 255, 255); text-size-adjust: 100%; display: block;\">View Invoice</a></td></tr></tbody></table></td></tr></tbody></table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0),
(17, 'project_task_deadline_reminder', 'Project task deadline reminder', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"> <div style=\"max-width:640px; margin:0 auto; \"> <div style=\"color: #fff; text-align: center; background-color:#33333e; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>{APP_TITLE}</h1></div> <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">  <p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">Hello,</span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">This is to remind you that there are some tasks which deadline is {DEADLINE}.</span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\">{TASKS_LIST}</span></p><p style=\"\"><span style=\"color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;\"><br></span></p><p style=\"color: rgb(85, 85, 85); font-size: 14px;\">{SIGNATURE}</p>  </div> </div></div>', '', 0),
(18, 'estimate_sent', 'New estimate', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 40px 18px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"> <h2 style=\"display: block; margin: 0px; padding: 0px; line-height: 100%; text-align: center;\"><font color=\"#ffffff\" face=\"Arial\"><span style=\"letter-spacing: -1px;\"><b>ESTIMATE #{ESTIMATE_ID}</b></span></font><br></h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding-top: 20px;padding-right: 18px;padding-bottom: 0;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><p> Hello {CONTACT_FIRST_NAME},<br></p><p>Here is the estimate. Please check the attachment.</p><p></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%; text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px; padding-bottom: 15px; text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-size: 16px; padding: 10px; text-size-adjust: 100%;\"><a href=\"{ESTIMATE_URL}\" target=\"_blank\" style=\"font-weight: bold; line-height: 100%; color: rgb(255, 255, 255); text-size-adjust: 100%; display: block;\">Show Estimate</a></td></tr></tbody></table></td></tr></tbody></table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0);
INSERT INTO `email_templates` (`id`, `template_name`, `email_subject`, `default_message`, `custom_message`, `deleted`) VALUES
(19, 'estimate_request_received', 'Estimate request received', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 40px 18px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"> <h2 style=\"display: block; margin: 0px; padding: 0px; line-height: 100%; text-align: center;\"><font color=\"#ffffff\" face=\"Arial\"><span style=\"letter-spacing: -1px;\"><b>ESTIMATE REQUEST #{ESTIMATE_REQUEST_ID}</b></span></font><br></h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 20px 18px 0px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"><p style=\"color: rgb(96, 96, 96); font-family: Arial; font-size: 15px;\"><span style=\"background-color: transparent;\">A new estimate request has been received from {CONTACT_FIRST_NAME}.</span><br></p><p style=\"color: rgb(96, 96, 96); font-family: Arial; font-size: 15px;\"></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%; text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px; padding-bottom: 15px; text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-size: 16px; padding: 10px; text-size-adjust: 100%;\"><a href=\"{ESTIMATE_REQUEST_URL}\" target=\"_blank\" style=\"font-weight: bold; line-height: 100%; color: rgb(255, 255, 255); text-size-adjust: 100%; display: block;\">Show Estimate Request</a></td></tr></tbody></table></td></tr></tbody></table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0),
(20, 'estimate_rejected', 'Estimate rejected', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 40px 18px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"> <h2 style=\"display: block; margin: 0px; padding: 0px; line-height: 100%; text-align: center;\"><font color=\"#ffffff\" face=\"Arial\"><span style=\"letter-spacing: -1px;\"><b>ESTIMATE #{ESTIMATE_ID}</b></span></font><br></h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 20px 18px 0px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"><p style=\"\"><font color=\"#606060\" face=\"Arial\"><span style=\"font-size: 15px;\">The estimate #{ESTIMATE_ID} has been rejected.</span></font><br></p><p style=\"color: rgb(96, 96, 96); font-family: Arial; font-size: 15px;\"></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%; text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px; padding-bottom: 15px; text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-size: 16px; padding: 10px; text-size-adjust: 100%;\"><a href=\"{ESTIMATE_URL}\" target=\"_blank\" style=\"font-weight: bold; line-height: 100%; color: rgb(255, 255, 255); text-size-adjust: 100%; display: block;\">Show Estimate</a></td></tr></tbody></table></td></tr></tbody></table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0),
(21, 'estimate_accepted', 'Estimate accepted', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EEEEEE;border-top: 0;border-bottom: 0;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"padding-top: 30px;padding-right: 10px;padding-bottom: 30px;padding-left: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody><tr> <td align=\"center\" valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;\"> <tbody><tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #33333e; max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 40px 18px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"> <h2 style=\"display: block; margin: 0px; padding: 0px; line-height: 100%; text-align: center;\"><font color=\"#ffffff\" face=\"Arial\"><span style=\"letter-spacing: -1px;\"><b>ESTIMATE #{ESTIMATE_ID}</b></span></font><br></h2></td></tr></tbody></table></td></tr></tbody></table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <tbody> <tr> <td valign=\"top\" style=\"mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"> <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\" width=\"100%\"> <tbody><tr> <td valign=\"top\" style=\"padding: 20px 18px 0px; text-size-adjust: 100%; word-break: break-word; line-height: 150%; text-align: left;\"><p style=\"\"><font color=\"#606060\" face=\"Arial\"><span style=\"font-size: 15px;\">The estimate #{ESTIMATE_ID} has been accepted.</span></font><br></p><p style=\"color: rgb(96, 96, 96); font-family: Arial; font-size: 15px;\"></p></td></tr><tr><td valign=\"top\" style=\"padding-top: 10px;padding-right: 18px;padding-bottom: 10px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width: 100%; text-size-adjust: 100%;\"><tbody><tr><td style=\"padding-top: 15px; padding-bottom: 15px; text-size-adjust: 100%;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate !important;border-radius: 2px;background-color: #00b393;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;\"><tbody><tr><td align=\"center\" valign=\"middle\" style=\"font-size: 16px; padding: 10px; text-size-adjust: 100%;\"><a href=\"{ESTIMATE_URL}\" target=\"_blank\" style=\"font-weight: bold; line-height: 100%; color: rgb(255, 255, 255); text-size-adjust: 100%; display: block;\">Show Estimate</a></td></tr></tbody></table></td></tr></tbody></table> <p></p></td> </tr> <tr> <td valign=\"top\" style=\"padding-top: 0px;padding-right: 18px;padding-bottom: 20px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #606060;font-family: Arial;font-size: 15px;line-height: 150%;text-align: left;\"> {SIGNATURE} </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `estimate_request_id` int(11) NOT NULL DEFAULT 0,
  `estimate_date` date NOT NULL,
  `valid_until` date NOT NULL,
  `note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_email_sent_date` date DEFAULT NULL,
  `status` enum('draft','sent','accepted','declined') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `tax_id` int(11) NOT NULL DEFAULT 0,
  `tax_id2` int(11) NOT NULL DEFAULT 0,
  `discount_type` enum('before_tax','after_tax') COLLATE utf8_unicode_ci NOT NULL,
  `discount_amount` double NOT NULL,
  `discount_amount_type` enum('percentage','fixed_amount') COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_forms`
--

CREATE TABLE `estimate_forms` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  `enable_attachment` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_items`
--

CREATE TABLE `estimate_items` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` double NOT NULL,
  `unit_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `estimate_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_requests`
--

CREATE TABLE `estimate_requests` (
  `id` int(11) NOT NULL,
  `estimate_form_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `status` enum('new','processing','hold','canceled','estimated') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `files` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `location` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `labels` text COLLATE utf8_unicode_ci NOT NULL,
  `share_with` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `editable_google_event` tinyint(1) NOT NULL DEFAULT 0,
  `google_event_id` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `color` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `recurring` int(1) NOT NULL DEFAULT 0,
  `repeat_every` int(11) NOT NULL DEFAULT 0,
  `repeat_type` enum('days','weeks','months','years') COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_cycles` int(11) NOT NULL DEFAULT 0,
  `last_start_date` date DEFAULT NULL,
  `recurring_dates` longtext COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_by` text COLLATE utf8_unicode_ci NOT NULL,
  `rejected_by` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `files` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `tax_id` int(11) NOT NULL DEFAULT 0,
  `tax_id2` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_date`, `category_id`, `description`, `amount`, `files`, `title`, `project_id`, `user_id`, `tax_id`, `tax_id2`, `deleted`) VALUES
(1, '2022-04-01', 1, '', 5000, 'a:1:{i:0;a:4:{s:9:\"file_name\";s:71:\"expense_file62638c64338d1-WhatsApp-Image-2022-04-12-at-12.15.49-PM.jpeg\";s:9:\"file_size\";s:6:\"111429\";s:7:\"file_id\";N;s:12:\"service_type\";N;}}', '', 0, 0, 0, 0, 0),
(2, '2022-04-02', 2, '', 3000, 'a:0:{}', 'Clients', 0, 2, 0, 0, 1),
(3, '2022-05-07', 2, '', 3000, 'a:0:{}', '', 0, 1, 0, 0, 0),
(4, '2022-05-10', 1, '', 5000, 'a:0:{}', '', 0, 41, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `title`, `deleted`) VALUES
(1, 'Miscellaneous expense', 0),
(2, 'Salary', 0);

-- --------------------------------------------------------

--
-- Table structure for table `general_files`
--

CREATE TABLE `general_files` (
  `id` int(11) NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci NOT NULL,
  `file_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_size` double NOT NULL,
  `created_at` datetime NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `uploaded_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftdatas`
--

CREATE TABLE `giftdatas` (
  `id` int(11) NOT NULL,
  `telemarketer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `teledatas_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `completed_date` date DEFAULT current_timestamp(),
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `anniversary_date` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `complete_id` int(11) NOT NULL DEFAULT 1,
  `landmark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giftdatas`
--

INSERT INTO `giftdatas` (`id`, `telemarketer_id`, `customer_id`, `teledatas_id`, `client_id`, `completed_date`, `customer_name`, `birth_date`, `anniversary_date`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`, `status_id`, `complete_id`, `landmark`) VALUES
(10, 2, 50, 78, 1, '2022-04-07', 'Ashton', '1999-04-20', '2010-04-13', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, NULL),
(11, 2, 50, 78, 1, '2022-04-07', 'Ashton', '2022-04-19', '2010-04-21', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(12, 2, 69, 79, 1, '2022-04-07', 'Bradleyyyyy', '1999-04-21', '2022-04-28', 'Aaron Hawkins3', 'Nunc. Avenue2', 'Nunc. Avenue2', '12354', NULL, '0000-00-00', NULL, '1234567904', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, 'Land'),
(14, 2, 70, 77, 1, '2022-04-07', 'Brielleeeeee', '1999-04-15', '2011-04-23', 'Forrest Ray4', 'Corona 3', 'Corona 3', '12355', NULL, '0000-00-00', NULL, '1234567905', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 1, 1, 'L'),
(15, 1, 4, 58, 1, '2022-04-07', 'Sivaa', '2022-04-22', '2022-05-05', '1/4 North Street,Tutyy', 'SS', 'Sa', 'DS', NULL, '0000-00-00', NULL, '1234567899', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'aa@gmail.com', NULL, NULL, 1, 1, NULL),
(16, 1, 6, 59, 1, '2022-05-06', 'Arjun', '2022-05-09', '2022-04-04', 'Arjun', '', '', '', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, ''),
(17, 1, 50, 64, 1, '2022-04-08', 'Ashton', '1999-05-21', '2010-04-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(18, 1, 51, 65, 1, '2022-04-08', 'Bradley', '1999-05-22', '2010-05-20', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '0000-00-00', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, ''),
(19, 1, 52, 66, 1, '2022-04-08', 'Brielle', '1999-04-20', '2010-05-21', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 1, 1, NULL),
(20, 1, 56, 67, 1, '2022-04-08', 'Ashton', '1999-10-10', '2010-05-22', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(24, 1, 57, 68, 1, '2022-04-08', 'Bradley', '2022-04-16', '2010-12-21', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '0000-00-00', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, ''),
(25, 1, 62, 70, 1, '2022-04-08', 'Ashton', '1999-10-10', '2022-04-26', 'Forrest Ray2', 'Corona 1', 'Corona 1', '12347', NULL, '0000-00-00', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(27, 2, 63, 71, 1, '2022-04-08', 'Bradley', '1999-10-16', '2010-12-27', 'Aaron Hawkins3', 'Nunc. Avenue2', 'Nunc. Avenue2', '12348', NULL, '0000-00-00', NULL, '1234567898', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, ''),
(28, 2, 64, 72, 1, '2022-04-08', 'Brielle', '1999-10-17', '2010-12-28', 'Forrest Ray4', 'Corona 3', 'Corona 3', '12349', NULL, '0000-00-00', NULL, '1234567899', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 1, 1, ''),
(29, 2, 70, 77, 1, '2022-04-08', 'Brielle', '1999-10-17', '2011-01-03', 'Forrest Ray4', 'Corona 3', 'Corona 3', '12355', NULL, '0000-00-00', NULL, '1234567905', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 1, 1, 'L'),
(30, 2, 50, 78, 1, '2022-04-08', 'Ashton', '1999-10-10', '2010-12-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(31, 2, 69, 79, 1, '2022-04-08', 'Bradleyyyyy', '1999-10-16', '2011-01-02', 'Aaron Hawkins3', 'Nunc. Avenue2', 'Nunc. Avenue2', '12354', NULL, '0000-00-00', NULL, '1234567904', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, 'Land'),
(32, 2, 74, 80, 1, '2022-04-08', 'Ashton', '1999-10-10', '2011-01-07', 'Forrest Ray3', 'Corona 1', 'Corona 1', '12359', NULL, '0000-00-00', NULL, '1234567909', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(33, 1, 5, 84, 2, '2022-04-11', 'Jeni', '2022-02-01', '2022-02-02', '1/1 Main Road, Tuty', '', '', '', NULL, '0000-00-00', NULL, '123456', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 1, 1, ''),
(34, 1, 54, 86, 2, '2022-04-11', 'Cara', '1999-10-19', '2010-12-24', 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '0000-00-00', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client5@demo.com', NULL, NULL, 1, 1, ''),
(36, 2, 68, 73, 1, '2022-04-11', 'Ashton', '1999-10-10', '2011-01-01', 'Forrest Ray2', 'Corona 1', 'Corona 1', '12353', NULL, '0000-00-00', NULL, '1234567903', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 1, 1, ''),
(37, 1, 58, 69, 1, '2022-04-11', 'Brielle', '1999-10-17', '2010-12-22', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 1, 1, ''),
(38, 2, 75, 81, 1, '2022-04-11', 'Bradley', '1999-10-16', '2011-01-08', 'Aaron Hawkins4', 'Nunc. Avenue2', 'Nunc. Avenue2', '12360', NULL, '0000-00-00', NULL, '1234567910', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, ''),
(39, 2, 76, 82, 1, '2022-04-11', 'Brielle', '1999-10-17', '2011-01-09', 'Forrest Ray5', 'Corona 3', 'Corona 3', '12361', NULL, '0000-00-00', NULL, '1234567911', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 1, 1, ''),
(40, 2, 81, 98, 1, '2022-04-11', 'Bradley', '1999-10-16', '2011-01-14', 'Aaron Hawkins4', 'Nunc. Avenue2', 'Nunc. Avenue2', '12366', NULL, '0000-00-00', NULL, '1234567916', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `giftfor_master`
--

CREATE TABLE `giftfor_master` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giftfor_master`
--

INSERT INTO `giftfor_master` (`id`, `title`, `deleted`) VALUES
(1, 'Birthday', 0),
(2, 'Anniversary', 0),
(3, 'Both', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gift_master`
--

CREATE TABLE `gift_master` (
  `id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `sub_religion_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gift_master`
--

INSERT INTO `gift_master` (`id`, `religion_id`, `sub_religion_id`, `title`, `deleted`) VALUES
(6, 1, 5, 'Frame', 0),
(7, 1, 7, 'Photo', 0),
(8, 2, 8, 'Statue', 0),
(9, 1, 5, 'Statue', 0),
(10, 2, 6, 'Jesus', 0),
(11, 3, 10, 'Perfume', 0),
(12, 3, 10, 'Pack', 0);

-- --------------------------------------------------------

--
-- Table structure for table `help_articles`
--

CREATE TABLE `help_articles` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `files` text COLLATE utf8_unicode_ci NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_categories`
--

CREATE TABLE `help_categories` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('help','knowledge_base') COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_email_sent_date` date DEFAULT NULL,
  `status` enum('draft','not_paid','cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `tax_id` int(11) NOT NULL DEFAULT 0,
  `tax_id2` int(11) NOT NULL DEFAULT 0,
  `tax_id3` int(11) NOT NULL DEFAULT 0,
  `recurring` tinyint(4) NOT NULL DEFAULT 0,
  `recurring_invoice_id` int(11) NOT NULL DEFAULT 0,
  `repeat_every` int(11) NOT NULL DEFAULT 0,
  `repeat_type` enum('days','weeks','months','years') COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_cycles` int(11) NOT NULL DEFAULT 0,
  `next_recurring_date` date DEFAULT NULL,
  `no_of_cycles_completed` int(11) NOT NULL DEFAULT 0,
  `due_reminder_date` date DEFAULT NULL,
  `recurring_reminder_date` date DEFAULT NULL,
  `discount_amount` double NOT NULL,
  `discount_amount_type` enum('percentage','fixed_amount') COLLATE utf8_unicode_ci NOT NULL,
  `discount_type` enum('before_tax','after_tax') COLLATE utf8_unicode_ci NOT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `cancelled_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `salesmanager_id` int(11) NOT NULL DEFAULT 0,
  `entry_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `client_id`, `project_id`, `bill_date`, `due_date`, `note`, `labels`, `last_email_sent_date`, `status`, `tax_id`, `tax_id2`, `tax_id3`, `recurring`, `recurring_invoice_id`, `repeat_every`, `repeat_type`, `no_of_cycles`, `next_recurring_date`, `no_of_cycles_completed`, `due_reminder_date`, `recurring_reminder_date`, `discount_amount`, `discount_amount_type`, `discount_type`, `cancelled_at`, `cancelled_by`, `deleted`, `salesmanager_id`, `entry_id`) VALUES
(1, 1, 0, '2022-03-31', '2022-04-04', '', '', NULL, 'not_paid', 1, 1, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 4, NULL),
(18, 2, 0, '2022-04-01', '2022-04-02', '', '', NULL, 'draft', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 5, NULL),
(20, 10, 0, '2022-04-23', '2022-04-24', '', '', NULL, 'not_paid', 1, 1, 1, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 6, NULL),
(21, 11, 0, '2022-04-27', '2022-04-28', '', '', NULL, 'not_paid', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 0, NULL),
(22, 15, 0, '2022-04-27', '2022-04-28', '', '', NULL, 'not_paid', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 0, NULL),
(23, 1, 0, '2022-05-03', '2022-05-04', '', '', NULL, 'not_paid', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 4, NULL),
(24, 1, 0, '2022-05-05', '2022-05-06', '', '', NULL, 'not_paid', 1, 1, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 4, NULL),
(25, 2, 0, '2022-05-05', '2022-05-06', '', '', NULL, 'not_paid', 1, 1, 1, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 5, NULL),
(26, 22, 0, '2022-05-06', '2022-05-07', '', '', NULL, 'draft', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 8, NULL),
(28, 22, 0, '2022-05-06', '2022-05-06', '', '', NULL, 'not_paid', 1, 1, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 8, NULL),
(29, 12, 0, '2022-05-10', '2022-05-11', '', '', NULL, 'draft', 1, 1, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 0, NULL),
(30, 13, 0, '2022-05-14', '2022-05-15', '', '', NULL, 'not_paid', 0, 0, 1, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 4, '4'),
(31, 12, 0, '2022-05-14', '2022-05-14', '', '', NULL, 'draft', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 0, NULL),
(32, 18, 0, '2022-05-20', '2022-05-20', '', '', NULL, 'draft', 1, 1, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 0, NULL),
(33, 10, 0, '2022-05-20', '2022-05-20', '', '', NULL, 'not_paid', 1, 1, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 4, 'Admin'),
(34, 22, 0, '2022-05-28', '2022-05-28', '', '', NULL, 'draft', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0, 4, 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` double NOT NULL,
  `unit_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `invoice_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `title`, `description`, `quantity`, `unit_type`, `rate`, `total`, `sort`, `invoice_id`, `deleted`, `created_at`) VALUES
(1, 'Gift', '', 500, 'nos', 50, 25000, 0, 1, 0, NULL),
(2, 'Gift', '', 200, 'nos', 50, 10000, 0, 17, 0, NULL),
(3, 'Gift', '', 200, 'nos', 50, 10000, 0, 18, 0, '2022-05-06'),
(4, 'Gift', '', 500, 'nos', 50, 25000, 0, 19, 0, NULL),
(5, 'Gift', '', 10, 'nos', 500, 5000, 0, 20, 0, '2022-05-20'),
(6, 'Gift', '', 200, 'nos', 1000, 200000, 0, 21, 0, NULL),
(7, 'Gift', '', 200, 'nos', 100, 20000, 0, 22, 0, NULL),
(8, 'Gift', '', 200, 'nos', 500, 100000, 0, 23, 0, NULL),
(9, 'Gift', '', 50, 'nos', 1000, 50000, 0, 24, 0, NULL),
(10, 'Gift', '', 10, 'nos', 1000, 10000, 0, 25, 0, '2022-05-06'),
(11, 'Gift', '', 50, 'nos', 1000, 50000, 0, 26, 0, '2022-05-05'),
(12, 'Gift', '', 10, 'nos', 1000, 10000, 0, 28, 0, '2022-05-06'),
(13, 'Gift', '', 20, 'nos', 1000, 20000, 0, 29, 0, '2022-05-10'),
(14, 'Gift', '', 50, 'nos', 1000, 50000, 0, 30, 0, '2022-05-14'),
(15, 'Gift', '', 50, 'nos', 1000, 50000, 0, 31, 0, '2022-05-14'),
(16, 'Gift', '', 10, 'nos', 500, 5000, 0, 33, 0, '2022-05-20'),
(17, 'Gift', '', 5, 'nos', 1000, 5000, 0, 34, 0, '2022-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`id`, `amount`, `payment_date`, `payment_method_id`, `note`, `invoice_id`, `deleted`, `transaction_id`, `created_by`, `created_at`) VALUES
(3, 10000, '2022-04-01', 1, '', 1, 0, NULL, 1, '2022-04-01'),
(4, 5000, '2022-04-23', 1, '', 20, 0, NULL, 1, '2022-05-20'),
(5, 1000, '2022-04-27', 1, '', 21, 0, NULL, 1, '2022-04-27'),
(6, 5000, '2022-04-27', 1, '', 22, 0, NULL, 1, '2022-04-28'),
(7, 10000, '2022-05-04', 1, '', 23, 0, NULL, 1, '2022-05-03'),
(8, 5000, '2022-05-06', 1, '', 28, 0, NULL, 1, '2022-05-06'),
(9, 10000, '2022-05-10', 1, '', 24, 0, NULL, 1, '2022-05-10'),
(10, 10000, '2022-05-14', 1, '', 30, 0, NULL, 1, '2022-05-14'),
(11, 5000, '2022-05-14', 1, '', 25, 1, NULL, 1, '2022-05-14'),
(12, 6000, '2022-05-20', 1, '', 33, 0, NULL, 1, '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate` double NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `unit_type`, `rate`, `deleted`) VALUES
(1, 'Gift', '', 'nos', 50, 0),
(2, 'Gift', '', 'nos', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_source`
--

CREATE TABLE `lead_source` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lead_source`
--

INSERT INTO `lead_source` (`id`, `title`, `sort`, `deleted`) VALUES
(1, 'Google', 1, 0),
(2, 'Facebook', 2, 0),
(3, 'Twitter', 3, 0),
(4, 'Youtube', 4, 0),
(5, 'Elsewhere', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`id`, `title`, `color`, `sort`, `deleted`) VALUES
(1, 'New', '#f1c40f', 0, 0),
(2, 'Qualified', '#2d9cdb', 1, 0),
(3, 'Discussion', '#29c2c2', 2, 0),
(4, 'Negotiation', '#2d9cdb', 3, 0),
(5, 'Won', '#83c340', 4, 0),
(6, 'Lost', '#e74c3c', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_hours` decimal(7,2) NOT NULL,
  `total_days` decimal(5,2) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `reason` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected','canceled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `checked_at` datetime DEFAULT NULL,
  `checked_by` int(11) NOT NULL DEFAULT 0,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `title`, `status`, `color`, `description`, `deleted`) VALUES
(1, 'Casual Leave', 'active', '#83c340', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Untitled',
  `message` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `status` enum('unread','read') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unread',
  `message_id` int(11) NOT NULL DEFAULT 0,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `files` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted_by_users` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `notify_to` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `read_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_comment_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `ticket_comment_id` int(11) NOT NULL,
  `project_file_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `activity_log_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `invoice_payment_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `estimate_request_id` int(11) NOT NULL,
  `actual_message_id` int(11) NOT NULL,
  `parent_message_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL,
  `event` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `enable_email` int(1) NOT NULL DEFAULT 0,
  `enable_web` int(1) NOT NULL DEFAULT 0,
  `notify_to_team` text NOT NULL,
  `notify_to_team_members` text NOT NULL,
  `notify_to_terms` text NOT NULL,
  `sort` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `event`, `category`, `enable_email`, `enable_web`, `notify_to_team`, `notify_to_team_members`, `notify_to_terms`, `sort`, `deleted`) VALUES
(1, 'project_created', 'project', 0, 0, '', '', '', 1, 0),
(2, 'project_deleted', 'project', 0, 0, '', '', '', 2, 0),
(3, 'project_task_created', 'project', 0, 1, '', '', 'project_members,task_assignee', 3, 0),
(4, 'project_task_updated', 'project', 0, 1, '', '', 'task_assignee', 4, 0),
(5, 'project_task_assigned', 'project', 0, 1, '', '', 'task_assignee', 5, 0),
(7, 'project_task_started', 'project', 0, 0, '', '', '', 7, 0),
(8, 'project_task_finished', 'project', 0, 0, '', '', '', 8, 0),
(9, 'project_task_reopened', 'project', 0, 0, '', '', '', 9, 0),
(10, 'project_task_deleted', 'project', 0, 1, '', '', 'task_assignee', 10, 0),
(11, 'project_task_commented', 'project', 0, 1, '', '', 'task_assignee', 11, 0),
(12, 'project_member_added', 'project', 0, 1, '', '', 'project_members', 12, 0),
(13, 'project_member_deleted', 'project', 0, 1, '', '', 'project_members', 13, 0),
(14, 'project_file_added', 'project', 0, 1, '', '', 'project_members', 14, 0),
(15, 'project_file_deleted', 'project', 0, 1, '', '', 'project_members', 15, 0),
(16, 'project_file_commented', 'project', 0, 1, '', '', 'project_members', 16, 0),
(17, 'project_comment_added', 'project', 0, 1, '', '', 'project_members', 17, 0),
(18, 'project_comment_replied', 'project', 0, 1, '', '', 'project_members,comment_creator', 18, 0),
(19, 'project_customer_feedback_added', 'project', 0, 1, '', '', 'project_members', 19, 0),
(20, 'project_customer_feedback_replied', 'project', 0, 1, '', '', 'project_members,comment_creator', 20, 0),
(21, 'client_signup', 'client', 0, 0, '', '', '', 21, 0),
(22, 'invoice_online_payment_received', 'invoice', 0, 0, '', '', '', 22, 0),
(23, 'leave_application_submitted', 'leave', 0, 0, '', '', '', 23, 0),
(24, 'leave_approved', 'leave', 0, 1, '', '', 'leave_applicant', 24, 0),
(25, 'leave_assigned', 'leave', 0, 1, '', '', 'leave_applicant', 25, 0),
(26, 'leave_rejected', 'leave', 0, 1, '', '', 'leave_applicant', 26, 0),
(27, 'leave_canceled', 'leave', 0, 0, '', '', '', 27, 0),
(28, 'ticket_created', 'ticket', 0, 0, '', '', '', 28, 0),
(29, 'ticket_commented', 'ticket', 0, 1, '', '', 'client_primary_contact,ticket_creator', 29, 0),
(30, 'ticket_closed', 'ticket', 0, 1, '', '', 'client_primary_contact,ticket_creator', 30, 0),
(31, 'ticket_reopened', 'ticket', 0, 1, '', '', 'client_primary_contact,ticket_creator', 31, 0),
(32, 'estimate_request_received', 'estimate', 0, 0, '', '', '', 32, 0),
(33, 'estimate_sent', 'estimate', 0, 0, '', '', '', 33, 0),
(34, 'estimate_accepted', 'estimate', 0, 0, '', '', '', 34, 0),
(35, 'estimate_rejected', 'estimate', 0, 0, '', '', '', 35, 0),
(36, 'new_message_sent', 'message', 0, 0, '', '', '', 36, 0),
(37, 'message_reply_sent', 'message', 0, 0, '', '', '', 37, 0),
(38, 'invoice_payment_confirmation', 'invoice', 0, 0, '', '', '', 22, 0),
(39, 'new_event_added_in_calendar', 'event', 0, 0, '', '', '', 39, 0),
(40, 'recurring_invoice_created_vai_cron_job', 'invoice', 0, 0, '', '', '', 22, 0),
(41, 'new_announcement_created', 'announcement', 0, 0, '', '', 'recipient', 41, 0),
(42, 'invoice_due_reminder_before_due_date', 'invoice', 0, 0, '', '', '', 22, 0),
(43, 'invoice_overdue_reminder', 'invoice', 0, 0, '', '', '', 22, 0),
(44, 'recurring_invoice_creation_reminder', 'invoice', 0, 0, '', '', '', 22, 0),
(45, 'project_completed', 'project', 0, 0, '', '', '', 2, 0),
(46, 'lead_created', 'lead', 0, 0, '', '', '', 21, 0),
(47, 'client_created_from_lead', 'lead', 0, 0, '', '', '', 21, 0),
(48, 'project_task_deadline_pre_reminder', 'project', 0, 1, '', '', 'task_assignee', 20, 0),
(49, 'project_task_reminder_on_the_day_of_deadline', 'project', 0, 1, '', '', 'task_assignee', 20, 0),
(50, 'project_task_deadline_overdue_reminder', 'project', 0, 1, '', '', 'task_assignee', 20, 0),
(51, 'recurring_task_created_via_cron_job', 'project', 0, 1, '', '', 'project_members,task_assignee', 20, 0),
(52, 'calendar_event_modified', 'event', 0, 0, '', '', '', 39, 0),
(53, 'client_contact_requested_account_removal', 'client', 0, 0, '', '', '', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_groups`
--

CREATE TABLE `package_groups` (
  `id` int(11) NOT NULL,
  `package_name` text COLLATE utf8_unicode_ci NOT NULL,
  `tot_contacts` int(11) NOT NULL,
  `adv_amt` float(10,2) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_groups`
--

INSERT INTO `package_groups` (`id`, `package_name`, `tot_contacts`, `adv_amt`, `deleted`) VALUES
(1, 'Gold', 200000, 20000.00, 0),
(2, 'Silver', 100000, 10000.00, 0),
(3, 'Platinum', 300000, 30000.00, 0),
(4, 'Diamond', 400000, 40000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_types`
--

CREATE TABLE `package_types` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_types`
--

INSERT INTO `package_types` (`id`, `title`, `deleted`) VALUES
(2, 'One time', 0),
(3, 'Regular', 0),
(4, 'Dummy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'custom',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `online_payable` tinyint(1) NOT NULL DEFAULT 0,
  `available_on_invoice` tinyint(1) NOT NULL DEFAULT 0,
  `minimum_payment_amount` double NOT NULL DEFAULT 0,
  `settings` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`, `type`, `description`, `online_payable`, `available_on_invoice`, `minimum_payment_amount`, `settings`, `deleted`) VALUES
(1, 'Cash', 'custom', 'Cash payments', 0, 0, 0, '', 0),
(2, 'Stripe', 'stripe', 'Stripe online payments', 1, 0, 0, 'a:3:{s:15:\"pay_button_text\";s:6:\"Stripe\";s:10:\"secret_key\";s:7:\"sfafasf\";s:15:\"publishable_key\";s:8:\"fsfsafsf\";}', 0),
(3, 'PayPal Payments Standard', 'paypal_payments_standard', 'PayPal Payments Standard Online Payments', 1, 0, 0, 'a:4:{s:15:\"pay_button_text\";s:15:\"PayPal Standard\";s:5:\"email\";s:21:\"mailtomanok@gmail.com\";s:11:\"paypal_live\";s:1:\"0\";s:5:\"debug\";s:1:\"0\";}', 0),
(4, 'Razorpay', 'razorpay', 'Razorpay Online Payments', 1, 1, 0, 'a:3:{s:15:\"pay_button_text\";s:8:\"RazorPay\";s:9:\"razor_key\";s:23:\"rzp_test_Vxh8HMiP7QutO4\";s:12:\"razor_secret\";s:24:\"vyPH0Ti03ewGAw5AnOIOoXYh\";}', 0),
(5, 'Cheque', 'custom', '', 0, 0, 0, 'a:0:{}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_ipn`
--

CREATE TABLE `paypal_ipn` (
  `id` int(11) NOT NULL,
  `transaction_id` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipn_hash` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ipn_data` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinvoices`
--

CREATE TABLE `pinvoices` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_email_sent_date` date DEFAULT NULL,
  `status` enum('draft','not_paid','cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `tax_id` int(11) NOT NULL DEFAULT 0,
  `tax_id2` int(11) NOT NULL DEFAULT 0,
  `tax_id3` int(11) NOT NULL DEFAULT 0,
  `recurring` tinyint(4) NOT NULL DEFAULT 0,
  `recurring_invoice_id` int(11) NOT NULL DEFAULT 0,
  `repeat_every` int(11) NOT NULL DEFAULT 0,
  `repeat_type` enum('days','weeks','months','years') COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_cycles` int(11) NOT NULL DEFAULT 0,
  `next_recurring_date` date DEFAULT NULL,
  `no_of_cycles_completed` int(11) NOT NULL DEFAULT 0,
  `due_reminder_date` date DEFAULT NULL,
  `recurring_reminder_date` date DEFAULT NULL,
  `discount_amount` double NOT NULL,
  `discount_amount_type` enum('percentage','fixed_amount') COLLATE utf8_unicode_ci NOT NULL,
  `discount_type` enum('before_tax','after_tax') COLLATE utf8_unicode_ci NOT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `cancelled_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pinvoices`
--

INSERT INTO `pinvoices` (`id`, `client_id`, `project_id`, `bill_date`, `due_date`, `note`, `labels`, `last_email_sent_date`, `status`, `tax_id`, `tax_id2`, `tax_id3`, `recurring`, `recurring_invoice_id`, `repeat_every`, `repeat_type`, `no_of_cycles`, `next_recurring_date`, `no_of_cycles_completed`, `due_reminder_date`, `recurring_reminder_date`, `discount_amount`, `discount_amount_type`, `discount_type`, `cancelled_at`, `cancelled_by`, `deleted`) VALUES
(20, 5, 0, '2022-04-01', '2022-04-02', '', '', NULL, 'not_paid', 0, 0, 0, 0, 0, 1, 'months', 0, NULL, 0, NULL, NULL, 0, 'percentage', 'before_tax', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinvoice_items`
--

CREATE TABLE `pinvoice_items` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` double NOT NULL,
  `unit_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `invoice_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pinvoice_items`
--

INSERT INTO `pinvoice_items` (`id`, `title`, `description`, `quantity`, `unit_type`, `rate`, `total`, `sort`, `invoice_id`, `deleted`) VALUES
(13, 'Gift', '', 200, 'nos', 50, 10000, 0, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinvoice_payments`
--

CREATE TABLE `pinvoice_payments` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pinvoice_payments`
--

INSERT INTO `pinvoice_payments` (`id`, `amount`, `payment_date`, `payment_method_id`, `note`, `invoice_id`, `deleted`, `transaction_id`, `created_by`, `created_at`) VALUES
(13, 1000, '2022-04-01', 1, '', 20, 0, NULL, 1, '2022-04-01 09:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `pnotes`
--

CREATE TABLE `pnotes` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `type` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `share_with` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `status` enum('open','completed','hold','canceled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_comments`
--

CREATE TABLE `project_comments` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `comment_id` int(11) NOT NULL DEFAULT 0,
  `task_id` int(11) NOT NULL DEFAULT 0,
  `file_id` int(11) NOT NULL DEFAULT 0,
  `customer_feedback_id` int(11) NOT NULL DEFAULT 0,
  `files` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `id` int(11) NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci NOT NULL,
  `file_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_size` double NOT NULL,
  `created_at` datetime NOT NULL,
  `project_id` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `is_leader` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_settings`
--

CREATE TABLE `project_settings` (
  `project_id` int(11) NOT NULL,
  `setting_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_time`
--

CREATE TABLE `project_time` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` enum('open','logged','approved') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'logged',
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_id` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `title`, `deleted`) VALUES
(1, 'Hindu', 0),
(2, 'Christian', 0),
(3, 'Muslim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `display_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `permissions`, `deleted`, `display_id`) VALUES
(1, 'Client', 'a:36:{s:5:\"leave\";N;s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";N;s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";s:3:\"all\";s:8:\"estimate\";N;s:7:\"expense\";s:3:\"all\";s:6:\"client\";s:3:\"all\";s:4:\"lead\";N;s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";N;s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";s:1:\"1\";s:14:\"can_edit_tasks\";s:1:\"1\";s:16:\"can_delete_tasks\";s:1:\"1\";s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";s:0:\"\";s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";N;s:28:\"can_delete_leave_application\";N;}', 0, 1),
(2, 'Salesmanager', 'a:44:{s:5:\"leave\";s:0:\"\";s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";s:0:\"\";s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";s:3:\"all\";s:8:\"estimate\";N;s:7:\"expense\";s:0:\"\";s:6:\"client\";s:3:\"all\";s:4:\"lead\";N;s:9:\"customers\";s:0:\"\";s:12:\"salesmanager\";s:3:\"all\";s:13:\"telemarketing\";s:0:\"\";s:11:\"telecallers\";s:0:\"\";s:8:\"giftpack\";s:0:\"\";s:5:\"stock\";s:0:\"\";s:7:\"courier\";s:0:\"\";s:11:\"couriersent\";N;s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";s:3:\"all\";s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";s:1:\"1\";s:28:\"can_delete_leave_application\";N;}', 0, 1),
(3, 'Telecallers', 'a:43:{s:5:\"leave\";N;s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";N;s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";s:0:\"\";s:8:\"estimate\";N;s:7:\"expense\";s:0:\"\";s:6:\"client\";s:0:\"\";s:4:\"lead\";N;s:9:\"customers\";s:0:\"\";s:12:\"salesmanager\";s:0:\"\";s:13:\"telemarketing\";s:0:\"\";s:11:\"telecallers\";s:3:\"all\";s:8:\"giftpack\";s:0:\"\";s:5:\"stock\";s:0:\"\";s:7:\"courier\";s:0:\"\";s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";s:3:\"all\";s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";s:1:\"1\";s:28:\"can_delete_leave_application\";N;}', 0, 1),
(4, 'Telemarketing Manager', 'a:43:{s:5:\"leave\";s:0:\"\";s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";s:0:\"\";s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";s:0:\"\";s:8:\"estimate\";N;s:7:\"expense\";s:0:\"\";s:6:\"client\";s:3:\"all\";s:4:\"lead\";N;s:9:\"customers\";s:3:\"all\";s:12:\"salesmanager\";s:0:\"\";s:13:\"telemarketing\";s:3:\"all\";s:11:\"telecallers\";s:3:\"all\";s:8:\"giftpack\";s:0:\"\";s:5:\"stock\";s:0:\"\";s:7:\"courier\";s:0:\"\";s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";s:3:\"all\";s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";s:1:\"1\";s:28:\"can_delete_leave_application\";N;}', 0, 0),
(5, 'Accounts', 'a:43:{s:5:\"leave\";N;s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";N;s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";s:3:\"all\";s:8:\"estimate\";N;s:7:\"expense\";s:3:\"all\";s:6:\"client\";s:3:\"all\";s:4:\"lead\";N;s:9:\"customers\";s:3:\"all\";s:12:\"salesmanager\";s:3:\"all\";s:13:\"telemarketing\";N;s:11:\"telecallers\";N;s:8:\"giftpack\";N;s:5:\"stock\";s:3:\"all\";s:7:\"courier\";N;s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";N;s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";N;s:28:\"can_delete_leave_application\";N;}', 0, 0),
(6, 'Courier Manager', 'a:44:{s:5:\"leave\";N;s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";N;s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";N;s:8:\"estimate\";N;s:7:\"expense\";N;s:6:\"client\";N;s:4:\"lead\";N;s:9:\"customers\";N;s:12:\"salesmanager\";N;s:13:\"telemarketing\";N;s:11:\"telecallers\";N;s:8:\"giftpack\";N;s:5:\"stock\";N;s:7:\"courier\";s:3:\"all\";s:11:\"couriersent\";s:3:\"all\";s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";N;s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";s:1:\"1\";s:28:\"can_delete_leave_application\";N;}', 0, 0),
(7, 'CourierSent manager', 'a:44:{s:5:\"leave\";N;s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";N;s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";N;s:8:\"estimate\";N;s:7:\"expense\";N;s:6:\"client\";N;s:4:\"lead\";N;s:9:\"customers\";N;s:12:\"salesmanager\";N;s:13:\"telemarketing\";N;s:11:\"telecallers\";N;s:8:\"giftpack\";N;s:5:\"stock\";N;s:7:\"courier\";s:0:\"\";s:11:\"couriersent\";s:3:\"all\";s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";N;s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";s:1:\"1\";s:28:\"can_delete_leave_application\";N;}', 1, 1),
(8, 'Gift Manager', 'a:44:{s:5:\"leave\";N;s:14:\"leave_specific\";s:0:\"\";s:10:\"attendance\";N;s:19:\"attendance_specific\";s:0:\"\";s:7:\"invoice\";N;s:8:\"estimate\";N;s:7:\"expense\";N;s:6:\"client\";N;s:4:\"lead\";N;s:9:\"customers\";N;s:12:\"salesmanager\";N;s:13:\"telemarketing\";N;s:11:\"telecallers\";s:0:\"\";s:8:\"giftpack\";s:3:\"all\";s:5:\"stock\";N;s:7:\"courier\";N;s:11:\"couriersent\";N;s:6:\"ticket\";N;s:15:\"ticket_specific\";s:0:\"\";s:12:\"announcement\";N;s:23:\"help_and_knowledge_base\";N;s:23:\"can_manage_all_projects\";N;s:19:\"can_create_projects\";N;s:17:\"can_edit_projects\";N;s:19:\"can_delete_projects\";N;s:30:\"can_add_remove_project_members\";N;s:16:\"can_create_tasks\";N;s:14:\"can_edit_tasks\";N;s:16:\"can_delete_tasks\";N;s:20:\"can_comment_on_tasks\";N;s:24:\"show_assigned_tasks_only\";N;s:21:\"can_create_milestones\";N;s:19:\"can_edit_milestones\";N;s:21:\"can_delete_milestones\";N;s:16:\"can_delete_files\";N;s:34:\"can_view_team_members_contact_info\";N;s:34:\"can_view_team_members_social_links\";N;s:29:\"team_member_update_permission\";N;s:38:\"team_member_update_permission_specific\";s:0:\"\";s:27:\"timesheet_manage_permission\";N;s:36:\"timesheet_manage_permission_specific\";N;s:21:\"disable_event_sharing\";N;s:22:\"hide_team_members_list\";s:1:\"1\";s:28:\"can_delete_leave_application\";N;}', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesmanager`
--

CREATE TABLE `salesmanager` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salesmanager`
--

INSERT INTO `salesmanager` (`id`, `company_name`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`) VALUES
(4, 'Salesman', 'vdsfdfdsf', '', '', '', NULL, '2022-03-31', NULL, '1234567890', '', ',:1:', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, NULL, 'SalesMan', '', NULL, 15),
(5, 'SalesWomen', '', NULL, NULL, NULL, NULL, '2022-04-01', NULL, '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, NULL, '', '', NULL, 10),
(6, 'kannan', '', NULL, NULL, NULL, NULL, '2022-04-11', NULL, '1234567890', '', '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, NULL, NULL, '', NULL, 15),
(7, 'Mani Traders', '', NULL, NULL, NULL, NULL, '2022-04-11', NULL, '62222', '', '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, NULL, NULL, '', NULL, 15),
(8, 'Bharath', '', '', '', '', NULL, '2022-05-03', NULL, '8754514045', '', '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', '', '', 0, NULL, NULL, 'bharath@gmail.com', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `salesmancom`
--

CREATE TABLE `salesmancom` (
  `salesmanager_id` int(11) NOT NULL DEFAULT 0,
  `count` bigint(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesmancom`
--

INSERT INTO `salesmancom` (`salesmanager_id`, `count`) VALUES
(4, 5),
(5, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'app',
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_name`, `setting_value`, `type`, `deleted`) VALUES
('accepted_file_formats', 'jpg,jpeg,doc,xlsx', 'app', 0),
('allow_partial_invoice_payment_from_clients', '1', 'app', 0),
('allowed_ip_addresses', '', 'app', 0),
('app_title', 'Surprise Gift', 'app', 0),
('client_can_pay_invoice_without_login', '1', 'app', 0),
('company_address', '1A Toovipuram 9th street\nNear District Library\nTuticorin 628003.', 'app', 0),
('company_email', '', 'app', 0),
('company_name', 'Surprise Gift', 'app', 0),
('company_phone', '', 'app', 0),
('company_vat_number', '', 'app', 0),
('company_website', '', 'app', 0),
('currency_position', 'left', 'app', 0),
('currency_symbol', '₹', 'app', 0),
('date_format', 'd-m-Y', 'app', 0),
('decimal_separator', '.', 'app', 0),
('default_client_left_menu', 'a:8:{i:0;a:1:{s:4:\"name\";s:9:\"dashboard\";}i:1;a:1:{s:4:\"name\";s:6:\"events\";}i:2;a:1:{s:4:\"name\";s:8:\"invoices\";}i:3;a:1:{s:4:\"name\";s:16:\"invoice_payments\";}i:4;a:1:{s:4:\"name\";s:10:\"my_profile\";}i:5;a:1:{s:4:\"name\";s:4:\"todo\";}i:6;a:3:{s:4:\"name\";s:9:\"Customers\";s:3:\"url\";s:41:\"http://localhost/gift/index.php/customers\";s:4:\"icon\";s:8:\"bookmark\";}i:7;a:3:{s:4:\"name\";s:14:\"Courier Report\";s:3:\"url\";s:50:\"http://localhost/gift/index.php/couriersent/cindex\";s:4:\"icon\";s:8:\"bookmark\";}}', 'app', 0),
('default_currency', 'USD', 'app', 0),
('default_due_date_after_billing_date', '0', 'app', 0),
('email_protocol', '', 'app', 0),
('email_sent_from_address', 'mailtomanok@gmail.com', 'app', 0),
('email_sent_from_name', 'Mano', 'app', 0),
('email_smtp_host', '', 'app', 0),
('email_smtp_pass', '642ea436d3d5acaaa458c74b17a83ecafda2c5bd8e96c78382438a9a15132f1e3e221d9a1f7ccf5929b6108565965af8054e39e24ffa9388c278dbc855c0722cT9Y7KZBMElzBT66CSjr3BgVvQ8HbwgsWcL3YeqQCZmc~', 'app', 0),
('email_smtp_port', '', 'app', 0),
('email_smtp_security_type', 'none', 'app', 0),
('email_smtp_user', '', 'app', 0),
('enable_footer', '1', 'app', 0),
('enable_rich_text_editor', '0', 'app', 0),
('favicon', 'a:1:{s:9:\"file_name\";s:30:\"_file62b5a97edecf1-favicon.png\";}', 'app', 0),
('first_day_of_week', '0', 'app', 0),
('footer_copyright_text', 'Copyright', 'app', 0),
('footer_menus', 'a:0:{}', 'app', 0),
('initial_number_of_the_invoice', '31', 'app', 0),
('invoice_color', '', 'app', 0),
('invoice_footer', '<p><br></p>', 'app', 0),
('invoice_logo', 'a:1:{s:9:\"file_name\";s:35:\"_file627908d436856-invoice-logo.png\";}', 'app', 0),
('invoice_prefix', 'INV-', 'app', 0),
('invoice_style', 'style_1', 'app', 0),
('item_purchase_code', '1', 'app', 0),
('language', 'english', 'app', 0),
('module_announcement', '1', 'app', 0),
('module_attendance', '1', 'app', 0),
('module_chat', '', 'app', 0),
('module_estimate', '1', 'app', 0),
('module_estimate_request', '1', 'app', 0),
('module_event', '1', 'app', 0),
('module_expense', '1', 'app', 0),
('module_gantt', '1', 'app', 0),
('module_help', '1', 'app', 0),
('module_invoice', '1', 'app', 0),
('module_knowledge_base', '1', 'app', 0),
('module_lead', '1', 'app', 0),
('module_leave', '1', 'app', 0),
('module_message', '1', 'app', 0),
('module_note', '1', 'app', 0),
('module_project_timesheet', '1', 'app', 0),
('module_ticket', '1', 'app', 0),
('module_timeline', '1', 'app', 0),
('module_todo', '1', 'app', 0),
('no_of_decimals', '2', 'app', 0),
('rows_per_page', '10', 'app', 0),
('rtl', '0', 'app', 0),
('scrollbar', 'jquery', 'app', 0),
('send_bcc_to', '', 'app', 0),
('send_invoice_due_after_reminder', '5', 'app', 0),
('send_invoice_due_pre_reminder', '1', 'app', 0),
('send_recurring_invoice_reminder_before_creation', '', 'app', 0),
('show_background_image_in_signin_page', 'no', 'app', 0),
('show_logo_in_signin_page', 'yes', 'app', 0),
('show_theme_color_changer', 'yes', 'app', 0),
('signin_page_background', 'sigin-background-image.jpg', 'app', 0),
('site_logo', 'a:1:{s:9:\"file_name\";s:32:\"_file62b5a95ad6e64-site-logo.png\";}', 'app', 0),
('task_point_range', '5', 'app', 0),
('time_format', 'small', 'app', 0),
('timezone', 'UTC', 'app', 0),
('user_1_dashboard', '', 'user', 0),
('user_15_dashboard', '', 'user', 0),
('user_18_dashboard', '', 'user', 0),
('user_19_dashboard', '', 'user', 0),
('user_20_dashboard', '', 'user', 0),
('user_21_dashboard', '', 'user', 0),
('user_23_dashboard', '', 'user', 0),
('user_24_dashboard', '', 'user', 0),
('user_25_dashboard', '', 'user', 0),
('user_26_dashboard', '', 'user', 0),
('user_27_dashboard', '', 'user', 0),
('user_28_dashboard', '', 'user', 0),
('user_29_dashboard', '', 'user', 0),
('user_30_dashboard', '', 'user', 0),
('user_31_dashboard', '', 'user', 0),
('user_32_dashboard', '', 'user', 0),
('user_33_dashboard', '', 'user', 0),
('user_34_dashboard', '', 'user', 0),
('user_35_dashboard', '', 'user', 0),
('user_36_dashboard', '', 'user', 0),
('user_37_dashboard', '', 'user', 0),
('user_38_dashboard', '', 'user', 0),
('user_39_dashboard', '', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleplus` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `digg` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinterest` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tumblr` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `vine` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_master`
--

CREATE TABLE `status_master` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_master`
--

INSERT INTO `status_master` (`id`, `title`, `deleted`) VALUES
(1, 'Assigned', 0),
(2, 'UnAssigned', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `sub_religion_id` int(11) NOT NULL DEFAULT 0,
  `gift_id` int(11) NOT NULL DEFAULT 0,
  `bill_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT 0,
  `company_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT 0,
  `item` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `quantity` double NOT NULL,
  `unit_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `godown_id` int(11) NOT NULL DEFAULT 0,
  `godown` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('draft','not_paid','cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `cancelled_at` datetime DEFAULT NULL,
  `cancelled_by` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`id`, `religion_id`, `sub_religion_id`, `gift_id`, `bill_date`, `supplier_id`, `company_name`, `item_id`, `item`, `quantity`, `unit_type`, `godown_id`, `godown`, `note`, `created_at`, `labels`, `status`, `cancelled_at`, `cancelled_by`, `deleted`) VALUES
(2, 1, 5, 9, '2022-04-15', 0, '', 0, '', 10, 'nos', 0, '', NULL, '2022-04-15 10:38:09', NULL, 'draft', NULL, 0, 0),
(3, 2, 6, 10, '2022-04-15', 0, '', 0, '', 50, 'nos', 0, '', NULL, '2022-04-15 10:55:35', NULL, 'draft', NULL, 0, 0),
(4, 1, 7, 7, '2022-04-20', 0, '', 0, '', 15, 'nos', 0, '', NULL, '2022-04-19 04:54:14', NULL, 'draft', NULL, 0, 0),
(5, 1, 7, 7, '2022-04-19', 0, '', 0, '', 10, 'nos', 0, '', NULL, '2022-04-19 05:05:15', NULL, 'draft', NULL, 0, 0),
(6, 1, 5, 6, '2022-04-20', 0, '', 0, '', 8, 'nos', 0, '', NULL, '2022-04-20 10:01:41', NULL, 'draft', NULL, 0, 0),
(7, 1, 5, 9, '2022-04-23', 0, '', 0, '', 20, 'nos', 0, '', NULL, '2022-04-23 11:36:36', NULL, 'draft', NULL, 0, 0),
(8, 1, 5, 6, '2022-04-23', 0, '', 0, '', 15, 'nos', 0, '', NULL, '2022-04-23 11:37:40', NULL, 'draft', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stockqty`
--

CREATE TABLE `stockqty` (
  `stockqty` double DEFAULT NULL,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `sub_religion_id` int(11) NOT NULL DEFAULT 0,
  `gift_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockqty`
--

INSERT INTO `stockqty` (`stockqty`, `religion_id`, `sub_religion_id`, `gift_id`) VALUES
(23, 1, 5, 6),
(25, 1, 7, 7),
(30, 1, 5, 9),
(50, 2, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sub_religion`
--

CREATE TABLE `sub_religion` (
  `id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_religion`
--

INSERT INTO `sub_religion` (`id`, `religion_id`, `title`, `deleted`) VALUES
(5, 1, 'Sivan', 0),
(6, 2, 'CSI', 0),
(7, 1, 'Parvathi', 0),
(8, 2, 'RC', 0),
(9, 1, 'Amman', 0),
(10, 3, 'Khan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `milestone_id` int(11) NOT NULL DEFAULT 0,
  `assigned_to` int(11) NOT NULL,
  `deadline` date DEFAULT NULL,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `points` tinyint(4) NOT NULL DEFAULT 1,
  `status` enum('to_do','in_progress','done') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'to_do',
  `status_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `collaborators` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `recurring` tinyint(1) NOT NULL DEFAULT 0,
  `repeat_every` int(11) NOT NULL DEFAULT 0,
  `repeat_type` enum('days','weeks','months','years') COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_cycles` int(11) NOT NULL DEFAULT 0,
  `recurring_task_id` int(11) NOT NULL DEFAULT 0,
  `no_of_cycles_completed` int(11) NOT NULL DEFAULT 0,
  `created_date` date NOT NULL,
  `blocking` text COLLATE utf8_unicode_ci NOT NULL,
  `blocked_by` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_task_id` int(11) NOT NULL,
  `next_recurring_date` date DEFAULT NULL,
  `reminder_date` date NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `deleted` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `key_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `title`, `key_name`, `color`, `sort`, `deleted`) VALUES
(1, 'To Do', 'to_do', '#F9A52D', 0, 0),
(2, 'In progress', 'in_progress', '#1672B9', 1, 0),
(3, 'Done', 'done', '#00B393', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `title` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `percentage` double NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `title`, `percentage`, `deleted`) VALUES
(1, 'Tax (10%)', 10, 0),
(2, 'Tax', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `members` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_member_job_info`
--

CREATE TABLE `team_member_job_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_of_hire` date DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `salary` double NOT NULL DEFAULT 0,
  `salary_term` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_member_job_info`
--

INSERT INTO `team_member_job_info` (`id`, `user_id`, `date_of_hire`, `deleted`, `salary`, `salary_term`) VALUES
(1, 2, '0000-00-00', 0, 20000, ''),
(2, 15, '0000-00-00', 0, 200000, ''),
(3, 16, '0000-00-00', 0, 0, ''),
(4, 17, '0000-00-00', 0, 0, ''),
(5, 18, '0000-00-00', 0, 0, ''),
(6, 28, '0000-00-00', 0, 0, ''),
(7, 29, '0000-00-00', 0, 0, ''),
(8, 30, '0000-00-00', 0, 0, ''),
(9, 32, '0000-00-00', 0, 0, ''),
(10, 33, '0000-00-00', 0, 0, ''),
(11, 34, '0000-00-00', 0, 0, ''),
(12, 39, '0000-00-00', 0, 0, ''),
(13, 42, '0000-00-00', 0, 0, ''),
(14, 43, '0000-00-00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `teledatas`
--

CREATE TABLE `teledatas` (
  `id` int(11) NOT NULL,
  `telemarketer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `assign_date` date DEFAULT current_timestamp(),
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `anniversary_date` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double DEFAULT NULL,
  `status` text COLLATE utf8_unicode_ci DEFAULT 'INCOMPLETE',
  `complete_id` int(11) NOT NULL DEFAULT 2,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `landmark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `next_followupdate` date DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teledatas`
--

INSERT INTO `teledatas` (`id`, `telemarketer_id`, `customer_id`, `client_id`, `assign_date`, `customer_name`, `birth_date`, `anniversary_date`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`, `status`, `complete_id`, `status_id`, `landmark`, `next_followupdate`, `comments`) VALUES
(58, 1, 4, 1, '2022-04-06', 'Sivaa', '2022-01-02', '2022-01-03', '1/4 North Street,Tutyy', 'SS', 'Sa', 'DS', NULL, '0000-00-00', NULL, '1234567899', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'aa@gmail.com', NULL, NULL, 'INCOMPLETE', 1, 2, NULL, NULL, NULL),
(59, 1, 6, 1, '2022-04-06', 'Arjun', '2022-04-03', '2022-04-04', 'Arjun', '', '', '', NULL, '0000-00-00', NULL, '1234567890', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(61, 2, 5, 2, '2022-04-06', 'Jeni', '2022-02-01', '2022-02-02', '1/1 Main Road, Tuty', '', '', '', NULL, '0000-00-00', NULL, '123456', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(62, 2, 53, 2, '2022-04-06', 'Bruno', '1999-10-18', '2010-12-23', 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client4@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(63, 2, 54, 2, '2022-04-06', 'Cara', '1999-10-19', '2010-12-24', 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '0000-00-00', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client5@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(64, 1, 50, 1, '2022-04-06', 'Ashton', '1999-10-10', '2010-12-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(65, 1, 51, 1, '2022-04-06', 'Bradley', '1999-10-16', '2010-12-21', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '0000-00-00', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(66, 1, 52, 1, '2022-04-06', 'Brielle', '1999-10-17', '2010-12-22', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 2, 2, NULL, NULL, NULL),
(67, 1, 56, 1, '2022-04-06', 'Ashton', '1999-10-10', '2010-12-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(68, 1, 57, 1, '2022-04-06', 'Bradley', '2022-04-16', '2010-12-21', 'Aaron Hawkins2', 'Nunc. Avenue2', 'Nunc. Avenue2', '12342', NULL, '0000-00-00', NULL, '1234567892', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(69, 1, 58, 1, '2022-04-06', 'Brielle', '1999-10-17', '2010-12-22', 'Forrest Ray3', 'Corona 3', 'Corona 3', '12343', NULL, '0000-00-00', NULL, '1234567893', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(70, 1, 62, 1, '2022-04-06', 'Ashton', '1999-10-10', '2022-04-26', 'Forrest Ray2', 'Corona 1', 'Corona 1', '12347', NULL, '0000-00-00', NULL, '1234567897', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(71, 2, 63, 1, '2022-04-06', 'Bradley', '1999-10-16', '2010-12-27', 'Aaron Hawkins3', 'Nunc. Avenue2', 'Nunc. Avenue2', '12348', NULL, '0000-00-00', NULL, '1234567898', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', '2022-04-10', ''),
(72, 2, 64, 1, '2022-04-06', 'Brielle', '1999-10-17', '2010-12-28', 'Forrest Ray4', 'Corona 3', 'Corona 3', '12349', NULL, '0000-00-00', NULL, '1234567899', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(73, 2, 68, 1, '2022-04-06', 'Ashton', '1999-10-10', '2011-01-01', 'Forrest Ray2', 'Corona 1', 'Corona 1', '12353', NULL, '0000-00-00', NULL, '1234567903', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(77, 2, 70, 1, '2022-04-07', 'Brielle', '1999-10-17', '2011-01-03', 'Forrest Ray4', 'Corona 3', 'Corona 3', '12355', NULL, '0000-00-00', NULL, '1234567905', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, 'L', '2022-04-08', 'Comments'),
(78, 2, 50, 1, '2022-04-07', 'Ashton', '1999-10-10', '2010-12-20', 'Forrest Ray1', 'Corona 1', 'Corona 1', '12341', NULL, '0000-00-00', NULL, '1234567891', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(79, 2, 69, 1, '2022-04-07', 'Bradleyyyyy', '1999-10-16', '2011-01-02', 'Aaron Hawkins3', 'Nunc. Avenue2', 'Nunc. Avenue2', '12354', NULL, '0000-00-00', NULL, '1234567904', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, 'Land', NULL, ''),
(80, 2, 74, 1, '2022-04-08', 'Ashton', '1999-10-10', '2011-01-07', 'Forrest Ray3', 'Corona 1', 'Corona 1', '12359', NULL, '0000-00-00', NULL, '1234567909', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', '2022-04-14', ''),
(81, 2, 75, 1, '2022-04-08', 'Bradley', '1999-10-16', '2011-01-08', 'Aaron Hawkins4', 'Nunc. Avenue2', 'Nunc. Avenue2', '12360', NULL, '0000-00-00', NULL, '1234567910', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(82, 2, 76, 1, '2022-04-08', 'Brielle', '1999-10-17', '2011-01-09', 'Forrest Ray5', 'Corona 3', 'Corona 3', '12361', NULL, '0000-00-00', NULL, '1234567911', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(83, 2, 80, 1, '2022-04-08', 'Ashton', '1999-10-10', '2011-01-13', 'Forrest Ray3', 'Corona 1', 'Corona 1', '12365', NULL, '0000-00-00', NULL, '1234567915', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(84, 1, 5, 2, '2022-04-11', 'Jeni', '2022-02-01', '2022-02-02', '1/1 Main Road, Tuty', '', '', '', NULL, '0000-00-00', NULL, '123456', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(85, 1, 53, 2, '2022-04-11', 'Bruno', '1999-10-18', '2010-12-23', 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client4@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(86, 1, 54, 2, '2022-04-11', 'Cara', '1999-10-19', '2010-12-24', 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '0000-00-00', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client5@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(87, 1, 55, 2, '2022-04-11', 'Cedric', '1999-10-20', '2010-12-25', 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '0000-00-00', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client6@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(88, 1, 59, 2, '2022-04-11', 'Bruno', '1999-10-18', '2010-12-23', 'Aaron Hawkins4', 'Nunc. Avenue4', 'Nunc. Avenue4', '12344', NULL, '0000-00-00', NULL, '1234567894', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client4@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(89, 1, 60, 2, '2022-04-11', 'Cara', '1999-10-19', '2010-12-24', 'Forrest Ray5', 'Corona 5', 'Corona 5', '12345', NULL, '0000-00-00', NULL, '1234567895', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client5@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(91, 1, 61, 2, '2022-04-11', 'Cedric', '1999-10-20', '2010-12-25', 'Aaron Hawkins6', 'Nunc. Avenue6', 'Nunc. Avenue6', '12346', NULL, '0000-00-00', NULL, '1234567896', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client6@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(92, 1, 65, 2, '2022-04-11', 'Bruno', '1999-10-18', '2010-12-29', 'Aaron Hawkins5', 'Nunc. Avenue4', 'Nunc. Avenue4', '12350', NULL, '0000-00-00', NULL, '1234567900', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client4@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(93, 1, 66, 2, '2022-04-11', 'Cara', '1999-10-19', '2010-12-30', 'Forrest Ray6', 'Corona 5', 'Corona 5', '12351', NULL, '0000-00-00', NULL, '1234567901', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client5@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(94, 1, 67, 2, '2022-04-11', 'Cedric', '1999-10-20', '2010-12-31', 'Aaron Hawkins7', 'Nunc. Avenue6', 'Nunc. Avenue6', '12352', NULL, '0000-00-00', NULL, '1234567902', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client6@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(95, 1, 71, 2, '2022-04-11', 'Bruno', '1999-10-18', '2011-01-04', 'Aaron Hawkins5', 'Nunc. Avenue4', 'Nunc. Avenue4', '12356', NULL, '0000-00-00', NULL, '1234567906', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client4@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(98, 2, 81, 1, '2022-04-11', 'Bradley', '1999-10-16', '2011-01-14', 'Aaron Hawkins4', 'Nunc. Avenue2', 'Nunc. Avenue2', '12366', NULL, '0000-00-00', NULL, '1234567916', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 1, 2, '', NULL, ''),
(99, 2, 82, 1, '2022-04-11', 'Brielle', '1999-10-17', '2011-01-15', 'Forrest Ray5', 'Corona 3', 'Corona 3', '12367', NULL, '0000-00-00', NULL, '1234567917', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(100, 2, 86, 1, '2022-04-11', 'Ashton', '1999-10-10', '2011-01-19', 'Forrest Ray4', 'Corona 1', 'Corona 1', '12371', NULL, '0000-00-00', NULL, '1234567921', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(101, 2, 87, 1, '2022-04-11', 'Bradley', '1999-10-16', '2011-01-20', 'Aaron Hawkins5', 'Nunc. Avenue2', 'Nunc. Avenue2', '12372', NULL, '0000-00-00', NULL, '1234567922', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client2@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(102, 2, 88, 1, '2022-04-11', 'Brielle', '1999-10-17', '2011-01-21', 'Forrest Ray6', 'Corona 3', 'Corona 3', '12373', NULL, '0000-00-00', NULL, '1234567923', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client3@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL),
(103, 2, 92, 1, '2022-04-11', 'Ashton', '1999-10-10', '2011-01-25', 'Forrest Ray4', 'Corona 1', 'Corona 1', '12377', NULL, '0000-00-00', NULL, '1234567927', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'client1@demo.com', NULL, NULL, 'INCOMPLETE', 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `telemarketers`
--

CREATE TABLE `telemarketers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starred_by` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `group_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_lead` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lead_source_id` int(11) NOT NULL,
  `last_lead_status` text COLLATE utf8_unicode_ci NOT NULL,
  `client_migration_date` date NOT NULL,
  `vat_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable_online_payment` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `client_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `comm_amt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telemarketers`
--

INSERT INTO `telemarketers` (`id`, `company_name`, `address`, `city`, `state`, `zip`, `country`, `created_date`, `website`, `phone`, `currency_symbol`, `starred_by`, `group_ids`, `deleted`, `is_lead`, `lead_status_id`, `owner_id`, `sort`, `lead_source_id`, `last_lead_status`, `client_migration_date`, `vat_number`, `currency`, `disable_online_payment`, `package_id`, `client_name`, `email`, `package_type_id`, `comm_amt`) VALUES
(1, 'Vikky', '', 'Chennai', '', '', NULL, '2022-04-07', NULL, '1234567890', NULL, '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, '', NULL, NULL),
(2, 'Mano', '', 'Tuty', '', '', NULL, '2022-04-07', NULL, '5156151222', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'manotele@gmail.com', NULL, NULL),
(6, 'Vinoth', '', '', '', '', NULL, '2022-04-30', NULL, '', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'vinoth@gmail.com', NULL, NULL),
(7, 'vibin', '1 a toovipuram', 'tuti', 'Tamilnadu', '628008', NULL, '2022-05-03', NULL, '9496793837', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'vibu.mh@gmail.com', NULL, NULL),
(8, 'Babu', '', '', '', '', NULL, '2022-05-05', NULL, '8973609501', NULL, '', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'babu@gmail.com', NULL, NULL),
(9, 'JELLYSOFT', '', '', '', '', NULL, '2022-05-09', NULL, '1234567890', NULL, '', '', 1, 0, 0, 0, 0, 0, '', '0000-00-00', NULL, NULL, 0, NULL, NULL, 'jellysoftseo@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `ticket_type_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('new','client_replied','open','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `last_activity_at` datetime DEFAULT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT 0,
  `creator_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `creator_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_id` int(11) NOT NULL,
  `closed_at` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `files` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket_types`
--

INSERT INTO `ticket_types` (`id`, `title`, `deleted`) VALUES
(1, 'General Support', 0);

-- --------------------------------------------------------

--
-- Table structure for table `to_do`
--

CREATE TABLE `to_do` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `labels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('to_do','done') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'to_do',
  `start_date` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('staff','client','lead') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'client',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `message_checked_at` datetime DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `telecallers_id` int(11) NOT NULL DEFAULT 0,
  `salesmanager_id` int(11) NOT NULL DEFAULT 0,
  `notification_checked_at` datetime DEFAULT NULL,
  `is_primary_contact` tinyint(1) NOT NULL DEFAULT 0,
  `job_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Untitled',
  `disable_login` tinyint(1) NOT NULL DEFAULT 0,
  `note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternative_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternative_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ssn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male',
  `sticky_note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `enable_web_notification` tinyint(1) NOT NULL DEFAULT 1,
  `enable_email_notification` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `last_online` datetime DEFAULT NULL,
  `requested_account_removal` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `is_admin`, `role_id`, `email`, `password`, `image`, `status`, `message_checked_at`, `client_id`, `telecallers_id`, `salesmanager_id`, `notification_checked_at`, `is_primary_contact`, `job_title`, `disable_login`, `note`, `address`, `alternative_address`, `phone`, `alternative_phone`, `dob`, `ssn`, `gender`, `sticky_note`, `skype`, `enable_web_notification`, `enable_email_notification`, `created_at`, `last_online`, `requested_account_removal`, `deleted`) VALUES
(1, 'Mano', 'Thilak', 'staff', 1, 0, 'jellysoftapp@gmail.com', '$2y$10$NyLeSaymNu88bbX8gW/jPuO0Dpz2NSp5UnFh.aIp3rSbXl.i3n8JS', NULL, 'active', '2022-04-02 07:39:56', 0, 0, 0, '2022-04-02 07:39:53', 0, 'Admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-03-30 07:47:43', '2023-03-24 05:03:44', 0, 0),
(2, 'Vikky', 'S', 'staff', 0, 2, 'aa@gmail.com', '$2y$10$eMpeT6NCEbeNNa3GnO5gBeZ65l0IAxz/fdwHFnm2hNk8JETFkCPK6', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Salesmanager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-02 07:12:30', NULL, 0, 1),
(15, 'dani', 'S', 'staff', 0, 3, 'dani@gmail.com', '$2y$10$YZqeHKTQcRmw.DQ34wd/0.3gJp0ab1Gg7TOhpPdqtrPv3vBtZKZ4m', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'tele marketer', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-14 10:16:22', '2022-04-14 12:54:03', 0, 1),
(16, 'Vinoth', 'S', 'staff', 0, 2, 'vv@gmail.com', '$2y$10$vNi.0rbJGxz4oDdqZixZkusTfe4hLzaZnhm.CFD6N1WdB7o3jo8Ji', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Salesmanager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-15 05:12:13', NULL, 0, 1),
(17, 'Mano', 'S', 'staff', 0, 1, 'aaaa@gmail.com', '$2y$10$JIg7QWtNJ2ZGFOxLMeLsSuLMxgCaI5T.EpkW.xLUB/Zw56tQVVnBi', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Salesmanager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-15 07:38:38', NULL, 0, 1),
(18, 'Client', 'C', 'staff', 0, 1, 'client@gmail.com', '$2y$10$DKmjxAwrZCRrzxUeChOs0OSXPQ9a8.9jqzMTlGQK9RQrjFO.RV/1K', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Client', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-25 04:38:31', '2022-04-27 04:08:44', 0, 1),
(19, 'First', 'F', 'client', 0, 0, 'first@gmail.com', '$2y$10$WZ3ONecXoVCBqF5Y1uL7L.IvNTx7DzKRR5hx9Vk/c9exEp7tTgf/.', NULL, 'active', NULL, 11, 0, 0, NULL, 1, 'Untitled', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-27 04:27:46', '2022-04-27 04:47:04', 0, 0),
(20, 'Ram', 'a', 'client', 0, 1, 'adminn@gmail.com', '$2y$10$QLOdNvpzULwygz/.7.tFZ.kOKLWgv8fFrSxZXngxL98UYmIT79F5q', NULL, 'active', NULL, 15, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-27 06:19:13', '2022-04-29 11:58:11', 0, 0),
(21, 'Jeeva', ' ', 'client', 0, 1, 'admin1@gmail.com', '$2y$10$pr.v1lLTErMVq/9WtES76OfcUigpjRALdbbeOhMO.ac86cus80j.W', NULL, 'active', NULL, 17, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-27 06:26:45', '2022-04-29 05:46:36', 0, 1),
(22, 'Christopher', ' ', 'client', 0, 1, 'admin2@gmail.com', '$2y$10$SEKbYtALzHO47Kj3sXs3XOoxOrEyJOgEdoiEbK9h89YpCWS77oNca', NULL, 'active', NULL, 19, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-27 06:41:39', NULL, 0, 0),
(23, 'David', ' ', 'client', 0, 1, 'admin3@gmail.com', '$2y$10$U7LHbOs/dcWJsPrX7ze98OirxR2zDbWspc3d7XuLc.gpXJOLMBelm', NULL, 'active', NULL, 20, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-27 06:46:03', '2022-04-27 07:04:47', 0, 0),
(24, 'Ram', ' ', 'client', 0, 1, 'uma@gmail.com', '$2y$10$nwgMRg1rqOErzG4iqOxYxe1b9yg5iPIT8bDHKQz4BB5/wVzEkxf.u', NULL, 'active', NULL, 2, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-29 11:56:30', '2023-03-06 07:19:05', 0, 0),
(25, 'Arul', ' ', 'client', 0, 1, 'hyper@gmail.com', '$2y$10$v9jE/CaiCFdWkINhRu15f.2DOSjtkEpLu85J9yIPvTGDE8DHOvVRm', NULL, 'active', NULL, 1, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-29 11:57:06', '2022-05-11 12:51:59', 0, 0),
(26, 'Vinoth', ' ', 'staff', 0, 3, 'vinoth@gmail.com', '$2y$10$F4S4TDH7lzCR6JKiWE0.GumjxmrBLOg70f2R1Ok4TRHoWVzz0Sxve', NULL, 'active', NULL, 0, 6, 0, NULL, 0, 'Telecallers', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-30 06:10:42', '2022-05-04 10:52:45', 0, 0),
(27, 'Mano', ' ', 'staff', 0, 3, 'manotele@gmail.com', '$2y$10$.hrOByCEqTkc1tzydPuANufoXTOvyYF5/J2F.9HbzFApkUXULLMy.', NULL, 'active', NULL, 0, 2, 0, NULL, 0, 'Telecallers', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', 'jfhkg', NULL, 1, 1, '2022-04-30 06:50:39', '2022-08-25 06:10:05', 0, 0),
(28, 'Mano', 'Sales', 'staff', 0, 2, 'manosales@gmail.com', '$2y$10$JGFrfX6RZctiEi1X2RUJV.9QDeE1MiTvMfPMNh.XTj3Zvg4nDJfVK', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Salesmanager', 0, NULL, '', NULL, '1222222222', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-30 10:52:20', '2022-05-04 11:44:04', 0, 0),
(29, 'Mano', 'Cust', 'staff', 0, 4, 'manocust@gmail.com', '$2y$10$8jXhEy4zxpwn/EEuN1EF0eOQrJ9N/afvBKGH7Uzsd8eYIKR5xjbc6', NULL, 'active', '2022-04-30 11:49:15', 0, 0, 0, '2022-04-30 11:49:13', 0, 'Telemarketing Manager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-30 11:17:11', '2022-05-11 12:55:43', 0, 0),
(30, 'Vignesh', 'S', 'staff', 0, 5, 'vigneshs9719@gmail.com', '$2y$10$sM57K3q0oN/BA2t.SH7/1.uqgasruyUWAm54vKcZba65mmfOoTB.W', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Accounts', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-04-30 12:05:02', '2022-05-28 13:00:08', 0, 0),
(31, 'Salesmann', ' ', 'staff', 0, 2, 'salesman@gmail.com', '$2y$10$rRb8nPytMZnvInRhFj2sdeg3j8MyJoG6S20XBv3XYEN3ctjA7aAf2', NULL, 'active', NULL, 0, 0, 4, NULL, 0, 'Salesmanager', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-02 06:28:06', '2022-05-28 11:49:07', 0, 0),
(32, 'Courier', 'Manager', 'staff', 0, 6, 'courierman@gmail.com', '$2y$10$oVqTCA1qeAE3j8.Y55dKQOhRVqe5SVpgdZPWdJz4kZk.PhruveysC', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Courier Manager', 0, NULL, '', '', '', '', '0000-00-00', '', 'female', NULL, '', 1, 1, '2022-05-02 08:01:15', '2022-05-12 13:00:04', 0, 0),
(33, 'Courier', 'Sent', 'staff', 0, 7, 'couriersentman@gmail.com', '$2y$10$ddj75JuDLC2bZIVZMiyll.CFyy842ZYmwkwPZBnCeANHxhl4EWo4.', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Couriersent Manager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-02 08:17:43', '2022-05-02 11:41:33', 0, 0),
(34, 'Gift', 'Manager', 'staff', 0, 8, 'gift@gmail.com', '$2y$10$RUuSjQICPqu89d/E0f/vXuWcB3mAR9NntMb22VZTHskE54SuZ/uQu', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Gift Manager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-03 06:07:04', '2022-05-13 08:07:51', 0, 0),
(35, 'Siva RAjan', ' ', 'client', 0, 1, 'siva@gmail.com', '$2y$10$hxdLYOE9YeQJDymdaVxLjeKuL.aINxbTzMuPoEHxub56TFv26NlGG', NULL, 'active', NULL, 21, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-03 06:17:45', '2022-05-03 06:22:17', 0, 0),
(36, 'Bharath', ' ', 'staff', 0, 2, 'bharath@gmail.com', '$2y$10$eg5OP5sFG9OE1wyBkwixI.6SqyLpBT/UeXx0Nkh3BYuSkmLbD3lBG', NULL, 'active', NULL, 0, 0, 8, NULL, 0, 'Salesmanager', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-03 06:22:23', '2022-05-06 08:41:49', 0, 1),
(37, 'SIva', ' ', 'client', 0, 1, 'kc@gmail.com', '$2y$10$h9VCCrvo3SEVIEn9XxVyMeriRB.Fl6hpcVQ34S7ezBVyXYa0AU.2O', NULL, 'active', NULL, 22, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-03 06:25:56', '2022-05-03 06:35:39', 0, 0),
(38, 'vibin', ' ', 'staff', 0, 3, 'vibu.mh@gmail.com', '$2y$10$Xt8robSaH2s5iHyefwf72ukIcNK0DNI2ouoTNI4xZcd1d5ktei2SK', NULL, 'active', NULL, 0, 7, 0, NULL, 0, 'Telecallers', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-03 06:36:08', '2022-05-03 06:51:47', 0, 0),
(39, 'Maariappan', 'Thilak', 'staff', 0, 8, 'mari@gmail.com', '$2y$10$4vtGpGx56UpoV5A9nppF2uQMs6Iip8afroOAAk1c3Mw4Ugq0GmTTa', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Packing section', 0, NULL, '', NULL, '1234567890', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-03 06:47:51', '2022-05-03 07:45:33', 0, 0),
(40, 'Babu', ' ', 'staff', 0, 3, 'babu@gmail.com', '$2y$10$J3vL8wfW6KjNpDHKjZ9Wp.574tUFsea6YDsJd/2mAhtkgSmIfOlbm', NULL, 'active', NULL, 0, 8, 0, NULL, 0, 'Telecallers', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-05 06:56:23', NULL, 0, 0),
(41, 'JELLYSOFT', ' ', 'staff', 0, 3, 'jellysoftseo@gmail.com', '$2y$10$ruJbIF3OKTNDCJw19PB3uOTrwN3G9fcoy3kwaV/wgtXt.g2QXjkLK', NULL, 'active', NULL, 0, 9, 0, NULL, 0, 'Telecallers', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-09 13:04:58', NULL, 0, 1),
(42, 'Mano', 'Thilak', 'staff', 1, 0, 'ad@gmail.com', '$2y$10$nev3jEXtO.sLqqw3biW1h.lJulI53lvFzt03/zE2omzLNJdOr/g8S', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Admin', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-10 04:41:06', NULL, 0, 0),
(43, 'Mano', 'Thilak', 'staff', 0, 5, 'acc@gmail.com', '$2y$10$5Ds1rBGm7DAv8slNWHsVp.QhIW6JNh6u8JH.yVHy5SV2BpWY06jhS', NULL, 'active', NULL, 0, 0, 0, NULL, 0, 'Salesmanager', 0, NULL, '', NULL, '', NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-12 10:17:33', NULL, 0, 0),
(44, 'Sivangi', ' ', 'client', 0, 1, 'sivaji@gmail.com', '$2y$10$38uHpwfIar.SWU2UmyHateetYcYEJyqSStpQLd5kEDk9wGf7mLq6q', NULL, 'active', NULL, 23, 0, 0, NULL, 0, 'Client', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, NULL, 1, 1, '2022-05-21 09:59:20', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` enum('invoice_payment','reset_password') COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `created_at`, `type`, `code`, `params`, `deleted`) VALUES
(1, '2022-04-30 12:05:28', 'reset_password', 'JjOMNOqaUO', 'a:2:{s:5:\"email\";s:22:\"vigneshs9719@gmail.com\";s:11:\"expire_time\";i:1651406728;}', 0),
(2, '2022-04-30 12:07:34', 'reset_password', 'TYjZDeDUGN', 'a:2:{s:5:\"email\";s:22:\"vigneshs9719@gmail.com\";s:11:\"expire_time\";i:1651406854;}', 0),
(3, '2022-05-05 06:59:11', 'reset_password', 'paGEwTszKz', 'a:2:{s:5:\"email\";s:21:\"mailtomanok@gmail.com\";s:11:\"expire_time\";i:1651820351;}', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `checked_by` (`checked_by`);

--
-- Indexes for table `checklist_items`
--
ALTER TABLE `checklist_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_groups`
--
ALTER TABLE `client_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_master`
--
ALTER TABLE `complete_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courierdatas`
--
ALTER TABLE `courierdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriersentdatas`
--
ALTER TABLE `couriersentdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_widgets`
--
ALTER TABLE `custom_widgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_forms`
--
ALTER TABLE `estimate_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_items`
--
ALTER TABLE `estimate_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_requests`
--
ALTER TABLE `estimate_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_files`
--
ALTER TABLE `general_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftdatas`
--
ALTER TABLE `giftdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftfor_master`
--
ALTER TABLE `giftfor_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_master`
--
ALTER TABLE `gift_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_articles`
--
ALTER TABLE `help_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_categories`
--
ALTER TABLE `help_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_source`
--
ALTER TABLE `lead_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_status`
--
ALTER TABLE `lead_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_type_id` (`leave_type_id`),
  ADD KEY `user_id` (`applicant_id`),
  ADD KEY `checked_by` (`checked_by`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_from` (`from_user_id`),
  ADD KEY `message_to` (`to_user_id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification_settings`
--
ALTER TABLE `notification_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`);

--
-- Indexes for table `package_groups`
--
ALTER TABLE `package_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_types`
--
ALTER TABLE `package_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_ipn`
--
ALTER TABLE `paypal_ipn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinvoices`
--
ALTER TABLE `pinvoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinvoice_items`
--
ALTER TABLE `pinvoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinvoice_payments`
--
ALTER TABLE `pinvoice_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `pnotes`
--
ALTER TABLE `pnotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_comments`
--
ALTER TABLE `project_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_settings`
--
ALTER TABLE `project_settings`
  ADD UNIQUE KEY `unique_index` (`project_id`,`setting_name`);

--
-- Indexes for table `project_time`
--
ALTER TABLE `project_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesmanager`
--
ALTER TABLE `salesmanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_master`
--
ALTER TABLE `status_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_religion`
--
ALTER TABLE `sub_religion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a` (`religion_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member_job_info`
--
ALTER TABLE `team_member_job_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `teledatas`
--
ALTER TABLE `teledatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telemarketers`
--
ALTER TABLE `telemarketers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_types`
--
ALTER TABLE `ticket_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_do`
--
ALTER TABLE `to_do`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `email` (`email`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checklist_items`
--
ALTER TABLE `checklist_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_groups`
--
ALTER TABLE `client_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complete_master`
--
ALTER TABLE `complete_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courierdatas`
--
ALTER TABLE `courierdatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `couriersentdatas`
--
ALTER TABLE `couriersentdatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1100;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_widgets`
--
ALTER TABLE `custom_widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate_forms`
--
ALTER TABLE `estimate_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate_items`
--
ALTER TABLE `estimate_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate_requests`
--
ALTER TABLE `estimate_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_files`
--
ALTER TABLE `general_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftdatas`
--
ALTER TABLE `giftdatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `giftfor_master`
--
ALTER TABLE `giftfor_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gift_master`
--
ALTER TABLE `gift_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `help_articles`
--
ALTER TABLE `help_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_categories`
--
ALTER TABLE `help_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_source`
--
ALTER TABLE `lead_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lead_status`
--
ALTER TABLE `lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_settings`
--
ALTER TABLE `notification_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `package_groups`
--
ALTER TABLE `package_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_types`
--
ALTER TABLE `package_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paypal_ipn`
--
ALTER TABLE `paypal_ipn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinvoices`
--
ALTER TABLE `pinvoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pinvoice_items`
--
ALTER TABLE `pinvoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pinvoice_payments`
--
ALTER TABLE `pinvoice_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pnotes`
--
ALTER TABLE `pnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_comments`
--
ALTER TABLE `project_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_time`
--
ALTER TABLE `project_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salesmanager`
--
ALTER TABLE `salesmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_master`
--
ALTER TABLE `status_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_religion`
--
ALTER TABLE `sub_religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_member_job_info`
--
ALTER TABLE `team_member_job_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teledatas`
--
ALTER TABLE `teledatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `telemarketers`
--
ALTER TABLE `telemarketers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `to_do`
--
ALTER TABLE `to_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_religion`
--
ALTER TABLE `sub_religion`
  ADD CONSTRAINT `a` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
