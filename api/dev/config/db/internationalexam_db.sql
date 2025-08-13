-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 05:09 PM
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
-- Database: `internationalexam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `0_alert_tab`
--

CREATE TABLE `0_alert_tab` (
  `sn` int(11) NOT NULL,
  `alertId` varchar(50) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `roleId` int(11) NOT NULL,
  `alertDetail` text NOT NULL,
  `seenStatus` int(11) NOT NULL,
  `ipAddress` varchar(50) NOT NULL,
  `systemName` varchar(50) NOT NULL,
  `createdTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `0_alert_tab`
--

INSERT INTO `0_alert_tab` (`sn`, `alertId`, `userId`, `userName`, `roleId`, `alertDetail`, `seenStatus`, `ipAddress`, `systemName`, `createdTime`) VALUES
(1, 'ALT00120250811045535', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 15:55:35'),
(2, 'ALT00220250811054619', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 16:46:19'),
(3, 'ALT00320250811054718', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 16:47:18'),
(4, 'ALT00420250811054959', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 16:49:59'),
(5, 'ALT00520250811055507', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 16:55:07'),
(6, 'ALT00620250811055624', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 16:56:24'),
(7, 'ALT00720250811060139', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 17:01:39'),
(8, 'ALT00820250811060230', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 17:02:30'),
(9, 'ALT00920250811060250', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 17:02:50'),
(10, 'ALT01020250811060257', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 17:02:57'),
(11, 'ALT01120250811060302', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-11 17:03:02'),
(12, 'ALT01220250812113738', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:37:38'),
(13, 'ALT01320250812113800', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:38:00'),
(14, 'ALT01420250812113828', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:38:28'),
(15, 'ALT01520250812113913', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:39:13'),
(16, 'ALT01620250812113941', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:39:41'),
(17, 'ALT01720250812114024', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:40:24'),
(18, 'ALT01820250812114106', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:41:06'),
(19, 'ALT01920250812114235', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:42:35'),
(20, 'ALT02020250812114315', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:43:15'),
(21, 'ALT02120250812114440', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:44:40'),
(22, 'ALT02220250812114936', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:49:36'),
(23, 'ALT02320250812115204', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:52:04'),
(24, 'ALT02420250812115303', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:53:03'),
(25, 'ALT02520250812115618', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:56:18'),
(26, 'ALT02620250812115630', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:56:30'),
(27, 'ALT02720250812115733', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:57:33'),
(28, 'ALT02820250812115856', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 10:58:56'),
(29, 'ALT02920250812120000', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 11:00:00'),
(30, 'ALT03020250812120015', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name:   , ID: STF0001', 0, '', '', '2025-08-12 11:00:15'),
(31, 'ALT03120250812120454', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name: MR EMMANUEL PAUL, ID: STF0001', 0, '', '', '2025-08-12 11:04:54'),
(32, 'ALT03220250812120526', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name: MR EMMANUEL PAUL, ID: STF0001', 0, '', '', '2025-08-12 11:05:26'),
(33, 'ALT03320250812120612', 'STAFF00120250808033535', 'SAMSON PAUL', 2, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - SAMSON PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name: MR SAMSON PAUL, ID: STAFF00120250808033535', 0, '', '', '2025-08-12 11:06:12'),
(34, 'ALT03420250812015830', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - EMMANUEL PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name: MR EMMANUEL PAUL, ID: STF0001', 0, '', '', '2025-08-12 12:58:30'),
(35, 'ALT03520250812020013', 'STAFF00120250808033535', 'SAMSON PAUL', 2, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - SAMSON PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name: MR SAMSON PAUL, ID: STAFF00120250808033535', 0, '', '', '2025-08-12 13:00:13'),
(36, 'ALT03620250812020025', 'STAFF00120250808033535', 'SAMSON PAUL', 2, 'STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - SAMSON PAUL, successfully uploaded his/her profile picture. DETAILS: - Full Name: MR SAMSON PAUL, ID: STAFF00120250808033535', 0, '', '', '2025-08-12 13:00:25'),
(37, 'ALT04220250813025843', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A user whose name is MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 01:58:43'),
(38, 'ALT04420250813030116', 'STF0001', 'MR EMMANUEL PAUL', 0, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:01:16'),
(39, 'ALT04520250813030747', 'STF0001', 'MR EMMANUEL PAUL', 0, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 was denied from logging in for account suspension', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:07:47'),
(40, 'ALT04620250813030908', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 was denied from logging in for account suspension', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:09:08'),
(41, 'ALT04720250813031032', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 was denied from logging in for account under review', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:10:32'),
(42, 'ALT04820250813031622', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:16:22'),
(43, 'ALT05620250813033544', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:35:44'),
(44, 'ALT05820250813033713', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF REGISTRATION ATTEMPT FAILED: A staff whose name -  (ID: ) attempted to register with an email address  that is already in use.', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:37:13'),
(45, 'ALT05920250813034025', 'STF0001', 'EMMANUEL PAUL', 3, 'STAFF REGISTRATION ATTEMPT FAILED: A staff whose name - EMMANUEL PAUL (ID: STF0001) attempted to register with an email address (yakubu200@gmail.com) that is already in use.', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:40:25'),
(46, 'ALT06020250813034235', 'STF0001', 'MR EMMANUEL PAUL', 3, 'STAFF REGISTRATION ATTEMPT FAILED: A staff whose name - MR EMMANUEL PAUL (ID: STF0001) attempted to register a staff with an email address (yakubu200@gmail.com) that is already in use.', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:42:35'),
(47, 'ALT06120250813034401', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name is MR EMMANUEL PAUL with ID: STF0001 was denied from logging in for account suspension', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:44:01'),
(48, 'ALT06220250813034458', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name MR EMMANUEL PAUL with ID: STF0001 was denied from logging in for account is under review', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:44:58'),
(49, 'ALT06320250813034525', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:45:25'),
(50, 'ALT06420250813035030', 'STF0001', 'MR EMMANUEL PAUL', 3, 'STAFF CREATED SUCCESSFULLY: A staff whose name - MR EMMANUEL PAUL (ID: STF0001) successfully registered a new staff with the email address (olotu200@gmail.com) - (ID: STAFF00920250813035030).', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:50:30'),
(51, 'ALT06520250813035709', 'STF0001', 'MR EMMANUEL PAUL', 3, 'STAFF UPDATE ATTEMPT FAILED: A staff whose name - MR EMMANUEL PAUL (ID: STF0001) attempted to update a staff with an email address (yakubu200@gmail.com) that is already in use.', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:57:10'),
(52, 'ALT06620250813035805', 'STF0001', 'MR EMMANUEL PAUL', 3, 'STAFF UPDATE ATTEMPT SUCCESS: A staff whose name - MR EMMANUEL PAUL (ID: STF0001) successfully updated a staff with an email address (tinubu@gmail.com) - (ID: STAFF00820250812021703).', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 02:58:05'),
(53, 'ALT06720250813125139', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 11:51:39'),
(54, 'ALT06820250813050412', 'STF0001', 'MR EMMANUEL PAUL', 3, 'LOGIN ALERT: A Staff whose name MR EMMANUEL PAUL with ID: STF0001 has successfully logged in to international exam application', 0, '::1', 'DESKTOP-MIKSSU3', '2025-08-13 16:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `pages_tab`
--

CREATE TABLE `pages_tab` (
  `sn` int(11) NOT NULL,
  `publishId` varchar(100) NOT NULL,
  `pageUrl` varchar(255) NOT NULL,
  `pageTitle` varchar(100) NOT NULL,
  `seoKeywords` longtext NOT NULL,
  `seoDescription` varchar(255) NOT NULL,
  `seoFlyer` varchar(255) NOT NULL,
  `pageContent` longtext NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `updatedBy` varchar(100) NOT NULL,
  `createdTime` datetime DEFAULT NULL,
  `updatedTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_views_tab`
--

CREATE TABLE `page_views_tab` (
  `sn` int(11) NOT NULL,
  `page_category` varchar(100) NOT NULL,
  `publish_id` varchar(100) NOT NULL,
  `page_session` varchar(255) NOT NULL,
  `system` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `page_views_tab`
--

INSERT INTO `page_views_tab` (`sn`, `page_category`, `publish_id`, `page_session`, `system`, `ip_address`, `date`) VALUES
(1, 'blog_category', 'BLOG00120241207121921', 'PS00120241210100206', 'DESKTOP-GFL284C', '::1', '2024-12-10 09:02:07'),
(2, 'blog_category', 'BLOG00120241207121921', 'PS00220241210101633', 'DESKTOP-GFL284C', '127.0.0.1', '2024-12-10 09:16:36'),
(3, 'blog_category', 'BLOG00120241207121921', 'PS00320241210015702', 'DESKTOP-GFL284C', '::1', '2024-12-10 16:22:32'),
(4, 'blog_category', 'EVENT00120241207035548', 'PS00320241210015702', 'DESKTOP-GFL284C', '::1', '2024-12-10 16:32:35'),
(5, 'event_category', 'EVENT00120241207035548', 'PS00320241210015702', 'DESKTOP-GFL284C', '::1', '2024-12-10 16:39:34'),
(6, 'blog_category', 'BLOG00120241207121921', 'PS00420241211015445', 'DESKTOP-GFL284C', '127.0.0.1', '2024-12-11 16:00:18'),
(7, 'event_category', 'EVENT00120241207035548', 'PS00520241211062337', 'DESKTOP-GFL284C', '::1', '2024-12-11 17:24:09'),
(8, 'blog_category', 'BLOG00120241207121921', 'PS00620241211063816', 'DESKTOP-GFL284C', '192.168.236.132', '2024-12-11 17:45:47'),
(9, 'event_category', 'EVENT00120241207035548', 'PS00820241211065058', 'DESKTOP-GFL284C', '192.168.236.132', '2024-12-11 17:52:56'),
(10, 'blog_category', 'BLOG00120241207121921', 'PS00820241211065058', 'DESKTOP-GFL284C', '192.168.236.132', '2024-12-11 17:54:08'),
(11, 'blog_category', 'BLOG00120241207121921', 'PS01220241211070709', 'DESKTOP-GFL284C', '192.168.236.132', '2024-12-11 18:09:10'),
(12, 'event_category', 'EVENT00120241207035548', 'PS01420241212113213', 'DESKTOP-GFL284C', '::1', '2024-12-12 10:32:40'),
(13, 'blog_category', 'BLOG00120241207121921', 'PS01420241212113213', 'DESKTOP-GFL284C', '::1', '2024-12-12 10:33:32'),
(14, 'blog_category', 'BLOG00120241207121921', 'PS01320241211111945', 'DESKTOP-GFL284C', '::1', '2024-12-12 14:34:13'),
(15, 'blog_category', 'BLOG00120241207121921', 'PS01720241212032110', '145-239-185-59.cprapid.com', '102.90.45.196', '2024-12-12 15:21:58'),
(16, 'blog_category', 'BLOG00120241207121921', 'PS02320241212051150', '145-239-185-59.cprapid.com', '105.113.112.103', '2024-12-12 17:17:41'),
(17, 'event_category', 'EVENT00120241207035548', 'PS02320241212051150', '145-239-185-59.cprapid.com', '105.113.112.103', '2024-12-12 17:18:15'),
(18, 'event_category', 'EVENT00120241207035548', 'PS04620241212081733', '145-239-185-59.cprapid.com', '102.91.92.16', '2024-12-12 20:28:09'),
(19, 'blog_category', 'BLOG00120241207121921', 'PS06720241213010816', '145-239-185-59.cprapid.com', '66.249.66.208', '2024-12-13 01:08:17'),
(20, 'blog_category', 'BLOG00120241207121921', 'PS06820241213010942', '145-239-185-59.cprapid.com', '66.249.66.208', '2024-12-13 01:09:44'),
(21, 'event_category', 'EVENT00120241207035548', 'PS06620241213124301', '145-239-185-59.cprapid.com', '66.249.66.192', '2024-12-15 19:01:42'),
(22, 'blog_category', 'BLOG00120241207121921', 'PS07320241215021639', '145-239-185-59.cprapid.com', '66.249.66.208', '2024-12-15 19:09:47'),
(23, 'event_category', 'EVENT00120241207035548', 'PS08220241219080442', '145-239-185-59.cprapid.com', '105.113.106.211', '2024-12-19 08:08:36'),
(24, 'blog_category', 'BLOG00120241207121921', 'PS08320241219010650', 'DESKTOP-GFL284C', '::1', '2024-12-19 12:07:14'),
(25, 'blog_category', 'BLOG00120241207121921', 'PS08620241220103000', '145-239-185-59.cprapid.com', '66.249.66.208', '2024-12-22 18:30:34'),
(26, 'blog_category', 'BLOG00120241207121921', 'PS09020241224081949', 'DESKTOP-GFL284C', '::1', '2024-12-24 19:20:21'),
(27, 'blog_category', 'BLOG00120241207121921', 'PS09820241224082913', '145-239-185-59.cprapid.com', '105.113.75.179', '2024-12-24 20:29:55'),
(28, 'blog_category', 'BLOG00120241207121921', 'PS10720241225062002', '145-239-185-59.cprapid.com', '66.249.66.13', '2024-12-25 20:09:38'),
(29, 'event_category', 'EVENT00120241207035548', 'PS12820241230041909', '145-239-185-59.cprapid.com', '197.211.59.169', '2024-12-30 16:19:19'),
(30, 'blog_category', 'BLOG00120241207121921', 'PS13520250102094820', '145-239-185-59.cprapid.com', '102.89.46.110', '2025-01-02 21:51:04'),
(31, 'event_category', 'EVENT00120241207035548', 'PS13620250102103856', '145-239-185-59.cprapid.com', '102.89.46.110', '2025-01-02 22:40:11'),
(32, 'blog_category', 'BLOG00120241207121921', 'PS13620250102103856', '145-239-185-59.cprapid.com', '102.89.46.110', '2025-01-02 22:40:23'),
(33, 'blog_category', 'BLOG00120241207121921', 'PS16320250120055442', '145-239-185-59.cprapid.com', '197.211.59.56', '2025-01-20 06:01:04'),
(34, 'blog_category', 'BLOG00120241207121921', 'PS17120250125075338', '145-239-185-59.cprapid.com', '105.113.112.28', '2025-01-25 07:57:20'),
(35, 'event_category', 'EVENT00220250125010330', 'PS17520250125111532', '145-239-185-59.cprapid.com', '105.113.117.47', '2025-01-25 13:18:19'),
(36, 'event_category', 'EVENT00220250125010330', 'PS18120250125011950', '145-239-185-59.cprapid.com', '105.112.193.47', '2025-01-25 13:20:07'),
(37, 'event_category', 'EVENT00220250125010330', 'PS17820250125114448', '145-239-185-59.cprapid.com', '105.113.68.110', '2025-01-25 13:21:08'),
(38, 'event_category', 'EVENT00220250125010330', 'PS18320250125012058', '145-239-185-59.cprapid.com', '102.89.33.123', '2025-01-25 13:21:13'),
(39, 'event_category', 'EVENT00220250125010330', 'PS18520250125012249', '145-239-185-59.cprapid.com', '102.89.22.89', '2025-01-25 13:23:28'),
(40, 'blog_category', 'BLOG00120241207121921', 'PS17520250125111532', '145-239-185-59.cprapid.com', '105.113.117.47', '2025-01-25 13:29:33'),
(41, 'blog_category', 'BLOG00220250125013642', 'PS17520250125111532', '145-239-185-59.cprapid.com', '105.113.117.47', '2025-01-25 13:39:50'),
(42, 'event_category', 'EVENT00220250125010330', 'PS18720250125014020', '145-239-185-59.cprapid.com', '173.252.95.16', '2025-01-25 13:40:21'),
(43, 'event_category', 'EVENT00220250125010330', 'PS19320250125035026', '145-239-185-59.cprapid.com', '102.89.34.86', '2025-01-25 15:50:27'),
(44, 'event_category', 'EVENT00220250125010330', 'PS19520250125042450', '145-239-185-59.cprapid.com', '102.89.33.123', '2025-01-25 16:24:50'),
(45, 'event_category', 'EVENT00220250125010330', 'PS19720250125045516', '145-239-185-59.cprapid.com', '102.89.34.86', '2025-01-25 16:55:16'),
(46, 'blog_category', 'BLOG00120241207121921', 'PS19820250125074140', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 19:41:51'),
(47, 'blog_category', 'BLOG00220250125013642', 'PS19820250125074140', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 19:42:04'),
(48, 'event_category', 'EVENT00220250125010330', 'PS19820250125074140', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 19:43:07'),
(49, 'event_category', 'EVENT00120241207035548', 'PS19820250125074140', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 19:43:35'),
(50, 'blog_category', 'BLOG00120241207121921', 'PS19920250125083237', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 20:34:32'),
(51, 'blog_category', 'BLOG00120241207121921', 'PS20120250125083839', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 20:38:40'),
(52, 'event_category', 'EVENT00120241207035548', 'PS20320250125084128', '145-239-185-59.cprapid.com', '105.113.75.71', '2025-01-25 20:45:13'),
(53, 'event_category', 'EVENT00120241207035548', 'PS20820250126114356', '145-239-185-59.cprapid.com', '105.113.117.168', '2025-01-26 11:43:58'),
(54, 'blog_category', 'BLOG00120241207121921', 'PS21620250126064449', '145-239-185-59.cprapid.com', '105.113.106.127', '2025-01-26 18:44:50'),
(55, 'blog_category', 'BLOG00120241207121921', 'PS21720250126064720', '145-239-185-59.cprapid.com', '105.113.106.127', '2025-01-26 18:48:31'),
(56, 'event_category', 'EVENT00220250125010330', 'PS22320250126110040', '145-239-185-59.cprapid.com', '105.113.58.193', '2025-01-26 23:06:15'),
(57, 'blog_category', 'BLOG00120241207121921', 'PS22420250127063642', '145-239-185-59.cprapid.com', '105.113.106.127', '2025-01-27 06:39:21'),
(58, 'blog_category', 'BLOG00120241207121921', 'PS22520250127075435', '145-239-185-59.cprapid.com', '105.113.57.81', '2025-01-27 07:55:02'),
(59, 'event_category', 'EVENT00120241207035548', 'PS22520250127075435', '145-239-185-59.cprapid.com', '105.113.57.81', '2025-01-27 08:12:27'),
(60, 'blog_category', 'BLOG00120241207121921', 'PS22620250127082015', '145-239-185-59.cprapid.com', '105.113.106.127', '2025-01-27 08:20:36'),
(61, 'blog_category', 'BLOG00120241207121921', 'PS22920250127082201', '145-239-185-59.cprapid.com', '105.113.106.127', '2025-01-27 08:22:01'),
(62, 'blog_category', 'BLOG00120241207121921', 'PS23120250127082358', '145-239-185-59.cprapid.com', '105.113.60.237', '2025-01-27 08:23:59'),
(63, 'event_category', 'EVENT00220250125010330', 'PS23420250127093154', '145-239-185-59.cprapid.com', '102.89.22.107', '2025-01-27 09:31:55'),
(64, 'blog_category', 'BLOG00120241207121921', 'PS23920250127074542', '145-239-185-59.cprapid.com', '105.113.70.88', '2025-01-27 19:45:42'),
(65, 'blog_category', 'BLOG00120241207121921', 'PS24620250130021428', '145-239-185-59.cprapid.com', '102.89.34.130', '2025-01-30 02:18:48'),
(66, 'blog_category', 'BLOG00120241207121921', 'PS25620250202060951', '145-239-185-59.cprapid.com', '105.113.61.57', '2025-02-02 18:09:53'),
(67, 'blog_category', 'BLOG00120241207121921', 'PS31520250313063741', '145-239-185-59.cprapid.com', '129.205.124.205', '2025-03-13 06:39:35'),
(68, 'event_category', 'EVENT00120241207035548', 'PS31520250313063741', '145-239-185-59.cprapid.com', '129.205.124.205', '2025-03-13 07:17:06'),
(69, 'event_category', 'EVENT00120241207035548', 'PS36420250323044131', '145-239-185-59.cprapid.com', '129.205.124.223', '2025-03-23 16:41:39'),
(70, 'blog_category', 'BLOG00120241207121921', 'PS59320250517102004', '145-239-185-59.cprapid.com', '102.88.108.144', '2025-05-17 10:24:38'),
(71, 'event_category', 'EVENT00120241207035548', 'PS62520250517105918', '145-239-185-59.cprapid.com', '142.68.5.31', '2025-05-17 11:05:15'),
(72, 'blog_category', 'BLOG00120241207121921', 'PS75120250529032200', '145-239-185-59.cprapid.com', '102.89.47.251', '2025-05-29 15:24:01'),
(73, 'blog_category', 'BLOG00120241207121921', 'PS79420250614085716', '145-239-185-59.cprapid.com', '102.89.23.235', '2025-06-14 08:59:33'),
(74, 'blog_category', 'BLOG00120241207121921', 'PS85220250627095730', '145-239-185-59.cprapid.com', '105.112.71.139', '2025-06-27 21:58:30'),
(75, 'event_category', 'EVENT00120241207035548', 'PS92020250709032148', '145-239-185-59.cprapid.com', '197.211.53.101', '2025-07-09 15:22:11'),
(76, 'blog_category', 'BLOG00120241207121921', 'PS92020250709032148', '145-239-185-59.cprapid.com', '197.211.53.101', '2025-07-09 15:22:33'),
(77, 'event_category', 'EVENT00120241207035548', 'PS97020250722120915', '145-239-185-59.cprapid.com', '66.249.64.169', '2025-07-22 00:09:16'),
(78, 'event_category', 'EVENT00120241207035548', 'PS111520250811031329', '145-239-185-59.cprapid.com', '5.161.251.152', '2025-08-11 15:13:30'),
(79, 'event_category', 'EVENT00120241207035548', 'PS113120250811113232', '145-239-185-59.cprapid.com', '66.249.70.105', '2025-08-12 07:29:35'),
(80, 'blog_category', 'BLOG00120241207121921', 'PS113620250812024040', '145-239-185-59.cprapid.com', '66.249.70.103', '2025-08-12 08:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `publish_tab`
--

CREATE TABLE `publish_tab` (
  `sn` int(11) NOT NULL,
  `pageCategoryId` varchar(100) NOT NULL,
  `publishId` varchar(100) NOT NULL,
  `regTitle` varchar(255) DEFAULT NULL,
  `examAbbr` varchar(100) DEFAULT NULL,
  `gallerySubTitle` varchar(225) DEFAULT NULL,
  `regPix` varchar(255) DEFAULT NULL,
  `statusId` int(11) NOT NULL DEFAULT 0,
  `createdBy` varchar(100) DEFAULT NULL,
  `updatedBy` varchar(100) DEFAULT NULL,
  `createdTme` datetime NOT NULL,
  `updatedTime` timestamp NULL DEFAULT current_timestamp(),
  `blogCatId` varchar(50) DEFAULT NULL,
  `blogView` int(11) DEFAULT 0,
  `pageView` int(11) NOT NULL DEFAULT 0,
  `faqCatId` varchar(50) DEFAULT NULL,
  `faqQuestion` varchar(225) DEFAULT NULL,
  `faqAnswer` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setup_backend_settings_tab`
--

CREATE TABLE `setup_backend_settings_tab` (
  `sn` int(11) NOT NULL,
  `backendSettingId` varchar(10) NOT NULL,
  `smtpHost` varchar(100) NOT NULL,
  `smtpUsername` varchar(100) NOT NULL,
  `smtpPassword` varchar(100) NOT NULL,
  `smtpPort` int(11) NOT NULL,
  `senderName` varchar(100) NOT NULL,
  `supportEmail` varchar(100) NOT NULL,
  `updatedTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` varchar(255) DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_backend_settings_tab`
--

INSERT INTO `setup_backend_settings_tab` (`sn`, `backendSettingId`, `smtpHost`, `smtpUsername`, `smtpPassword`, `smtpPort`, `senderName`, `supportEmail`, `updatedTime`, `updatedBy`) VALUES
(1, 'BK_ID001', 'mail.vcfministry.org', 'support@vcfministry.org', 'yKnKGtLiqcwb', 465, 'VCF Ministry', 'afootechglobal@gmail.com', '2024-12-20 20:38:24', 'STF0001');

-- --------------------------------------------------------

--
-- Table structure for table `setup_categories_tab`
--

CREATE TABLE `setup_categories_tab` (
  `sn` int(11) NOT NULL,
  `links` varchar(100) NOT NULL,
  `catId` varchar(100) NOT NULL,
  `catName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_categories_tab`
--

INSERT INTO `setup_categories_tab` (`sn`, `links`, `catId`, `catName`) VALUES
(1, 'BLOG', '001', 'GENERAL'),
(2, 'BLOG', '002', 'ANNOUNCEMENT'),
(3, 'BLOG', '003', 'NEWS AND UPDATE'),
(4, 'BLOG', '004', 'INTERNATIONAL EXAM'),
(5, 'BLOG', '005', 'STUDY ABROAD'),
(6, 'FAQ', '006', 'INTERNATIONAL EXAM'),
(7, 'FAQ', '007', 'STUDY ABROAD');

-- --------------------------------------------------------

--
-- Table structure for table `setup_counter_tab`
--

CREATE TABLE `setup_counter_tab` (
  `sn` int(11) NOT NULL,
  `counterId` varchar(100) NOT NULL,
  `counterDescription` varchar(225) NOT NULL,
  `counterValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_counter_tab`
--

INSERT INTO `setup_counter_tab` (`sn`, `counterId`, `counterDescription`, `counterValue`) VALUES
(1, 'STAFF', 'STAFF ID COUNT', 9),
(2, 'ALT', 'ALERT ID COUNT', 68),
(3, 'INTEREXAM', 'INTERNATIONAL EXAM ID COUNT', 0),
(4, 'STUDYABR', 'STUDY ABROAD ID COUNT', 0),
(5, 'BLOG', 'BLOG ID COUNT', 0),
(6, 'GALL', 'GALLERY ID COUNT', 0),
(7, 'FAQ', 'FAQ ID COUNT', 0),
(8, 'PS', 'PAGE SESSION COUNT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setup_gender_tab`
--

CREATE TABLE `setup_gender_tab` (
  `sn` int(11) NOT NULL,
  `genderId` varchar(100) NOT NULL,
  `genderName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_gender_tab`
--

INSERT INTO `setup_gender_tab` (`sn`, `genderId`, `genderName`) VALUES
(1, 'M', 'MALE'),
(2, 'F', 'FEMALE');

-- --------------------------------------------------------

--
-- Table structure for table `setup_page_categories_tab`
--

CREATE TABLE `setup_page_categories_tab` (
  `sn` int(11) NOT NULL,
  `pageCategoryId` varchar(100) NOT NULL,
  `pageCategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_page_categories_tab`
--

INSERT INTO `setup_page_categories_tab` (`sn`, `pageCategoryId`, `pageCategoryName`) VALUES
(1, 'internationalExamCategory', 'INTERNATIONAL EXAM'),
(2, 'studyAbroadCategory', 'STUDY ABROAD'),
(3, 'galleryCategory', 'GALLERY'),
(4, 'blogCategory', 'BLOG'),
(5, 'faqCategory', 'FAQ');

-- --------------------------------------------------------

--
-- Table structure for table `setup_role_tab`
--

CREATE TABLE `setup_role_tab` (
  `sn` int(11) NOT NULL,
  `roleId` varchar(50) NOT NULL,
  `roleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_role_tab`
--

INSERT INTO `setup_role_tab` (`sn`, `roleId`, `roleName`) VALUES
(1, '1', 'STAFF'),
(2, '2', 'ADMIN'),
(3, '3', 'SUPER ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `setup_states_tab`
--

CREATE TABLE `setup_states_tab` (
  `sn` int(11) NOT NULL,
  `stateId` varchar(50) NOT NULL,
  `stateName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_states_tab`
--

INSERT INTO `setup_states_tab` (`sn`, `stateId`, `stateName`) VALUES
(1, 'AB', 'Abia'),
(2, 'AD', 'Adamawa'),
(3, 'AK', 'Akwa Ibom'),
(4, 'AN', 'Anambra'),
(5, 'BA', 'Bauchi'),
(6, 'BY', 'Bayelsa'),
(7, 'BE', 'Benue'),
(8, 'BO', 'Borno'),
(9, 'CR', 'Cross River'),
(10, 'DE', 'Delta'),
(11, 'EB', 'Ebonyi'),
(12, 'ED', 'Edo'),
(13, 'EK', 'Ekiti'),
(14, 'EN', 'Enugu'),
(15, 'FC', 'FCT'),
(16, 'GO', 'Gombe'),
(17, 'IM', 'Imo'),
(18, 'JI', 'Jigawa'),
(19, 'KD', 'Kaduna'),
(20, 'KN', 'Kano'),
(21, 'KT', 'Katsina'),
(22, 'KE', 'Kebbi'),
(23, 'KO', 'Kogi'),
(24, 'KW', 'Kwara'),
(25, 'LA', 'Lagos'),
(26, 'NA', 'Nasarawa'),
(27, 'NI', 'Niger'),
(28, 'OG', 'Ogun'),
(29, 'ON', 'Ondo'),
(30, 'OS', 'Osun'),
(31, 'OY', 'Oyo'),
(32, 'PL', 'Plateau'),
(33, 'RI', 'Rivers'),
(34, 'SO', 'Sokoto'),
(35, 'TA', 'Taraba'),
(36, 'YO', 'Yobe'),
(37, 'ZA', 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `setup_state_lga_tab`
--

CREATE TABLE `setup_state_lga_tab` (
  `sn` int(11) NOT NULL,
  `stateId` varchar(100) NOT NULL,
  `lgaId` varchar(100) NOT NULL,
  `lgaName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_state_lga_tab`
--

INSERT INTO `setup_state_lga_tab` (`sn`, `stateId`, `lgaId`, `lgaName`) VALUES
(1, 'AB', 'AB-01', 'Aba North'),
(2, 'AB', 'AB-02', 'Aba South'),
(3, 'AB', 'AB-03', 'Arochukwu'),
(4, 'AB', 'AB-04', 'Bende'),
(5, 'AB', 'AB-05', 'Ikwuano'),
(6, 'AB', 'AB-06', 'Isiala Ngwa North'),
(7, 'AB', 'AB-07', 'Isiala Ngwa South'),
(8, 'AB', 'AB-08', 'Isuikwuato'),
(9, 'AB', 'AB-09', 'Obi Ngwa'),
(10, 'AB', 'AB-10', 'Ohafia'),
(11, 'AB', 'AB-11', 'Osisioma'),
(12, 'AB', 'AB-12', 'Ugwunagbo'),
(13, 'AB', 'AB-13', 'Ukwa East'),
(14, 'AB', 'AB-14', 'Ukwa West'),
(15, 'AB', 'AB-15', 'Umuahia North'),
(16, 'AB', 'AB-16', 'Umuahia South'),
(17, 'AB', 'AB-17', 'Umu Nneochi'),
(18, 'AD', 'AD-01', 'Demsa'),
(19, 'AD', 'AD-02', 'Fufore'),
(20, 'AD', 'AD-03', 'Ganye'),
(21, 'AD', 'AD-04', 'Girei'),
(22, 'AD', 'AD-05', 'Gombi'),
(23, 'AD', 'AD-06', 'Guyuk'),
(24, 'AD', 'AD-07', 'Hong'),
(25, 'AD', 'AD-08', 'Jada'),
(26, 'AD', 'AD-09', 'Lamurde'),
(27, 'AD', 'AD-10', 'Madagali'),
(28, 'AD', 'AD-11', 'Maiha'),
(29, 'AD', 'AD-12', 'Mayo-Belwa'),
(30, 'AD', 'AD-13', 'Michika'),
(31, 'AD', 'AD-14', 'Mubi North'),
(32, 'AD', 'AD-15', 'Mubi South'),
(33, 'AD', 'AD-16', 'Numan'),
(34, 'AD', 'AD-17', 'Shelleng'),
(35, 'AD', 'AD-18', 'Song'),
(36, 'AD', 'AD-19', 'Toungo'),
(37, 'AD', 'AD-20', 'Yola North'),
(38, 'AD', 'AD-21', 'Yola South'),
(39, 'AK', 'AK-01', 'Abak'),
(40, 'AK', 'AK-02', 'Eastern Obolo'),
(41, 'AK', 'AK-03', 'Eket'),
(42, 'AK', 'AK-04', 'Esit Eket'),
(43, 'AK', 'AK-05', 'Essien Udim'),
(44, 'AK', 'AK-06', 'Etim Ekpo'),
(45, 'AK', 'AK-07', 'Etinan'),
(46, 'AK', 'AK-08', 'Ibeno'),
(47, 'AK', 'AK-09', 'Ibesikpo Asutan'),
(48, 'AK', 'AK-10', 'Ibiono Ibom'),
(49, 'AK', 'AK-11', 'Ika'),
(50, 'AK', 'AK-12', 'Ikono'),
(51, 'AK', 'AK-13', 'Ikot Abasi'),
(52, 'AK', 'AK-14', 'Ikot Ekpene'),
(53, 'AK', 'AK-15', 'Ini'),
(54, 'AK', 'AK-16', 'Itu'),
(55, 'AK', 'AK-17', 'Mbo'),
(56, 'AK', 'AK-18', 'Mkpat-Enin'),
(57, 'AK', 'AK-19', 'Nsit Atai'),
(58, 'AK', 'AK-20', 'Nsit Ibom'),
(59, 'AK', 'AK-21', 'Nsit Ubium'),
(60, 'AK', 'AK-22', 'Obot Akara'),
(61, 'AK', 'AK-23', 'Okobo'),
(62, 'AK', 'AK-24', 'Onna'),
(63, 'AK', 'AK-25', 'Oron'),
(64, 'AK', 'AK-26', 'Oruk Anam'),
(65, 'AK', 'AK-27', 'Udung-Uko'),
(66, 'AK', 'AK-28', 'Ukanafun'),
(67, 'AK', 'AK-29', 'Uruan'),
(68, 'AK', 'AK-30', 'Urue Offong/Oruko'),
(69, 'AK', 'AK-31', 'Uyo'),
(70, 'AN', 'AN-01', 'Aguata'),
(71, 'AN', 'AN-02', 'Anambra East'),
(72, 'AN', 'AN-03', 'Anambra West'),
(73, 'AN', 'AN-04', 'Anaocha'),
(74, 'AN', 'AN-05', 'Awka North'),
(75, 'AN', 'AN-06', 'Awka South'),
(76, 'AN', 'AN-07', 'Ayamelum'),
(77, 'AN', 'AN-08', 'Dunukofia'),
(78, 'AN', 'AN-09', 'Ekwusigo'),
(79, 'AN', 'AN-10', 'Idemili North'),
(80, 'AN', 'AN-11', 'Idemili South'),
(81, 'AN', 'AN-12', 'Ihiala'),
(82, 'AN', 'AN-13', 'Njikoka'),
(83, 'AN', 'AN-14', 'Nnewi North'),
(84, 'AN', 'AN-15', 'Nnewi South'),
(85, 'AN', 'AN-16', 'Ogbaru'),
(86, 'AN', 'AN-17', 'Onitsha North'),
(87, 'AN', 'AN-18', 'Onitsha South'),
(88, 'AN', 'AN-19', 'Orumba North'),
(89, 'AN', 'AN-20', 'Orumba South'),
(90, 'AN', 'AN-21', 'Oyi'),
(91, 'BA', 'BA-01', 'Alkaleri'),
(92, 'BA', 'BA-02', 'Bauchi'),
(93, 'BA', 'BA-03', 'Bogoro'),
(94, 'BA', 'BA-04', 'Damban'),
(95, 'BA', 'BA-05', 'Darazo'),
(96, 'BA', 'BA-06', 'Dass'),
(97, 'BA', 'BA-07', 'Gamawa'),
(98, 'BA', 'BA-08', 'Ganjuwa'),
(99, 'BA', 'BA-09', 'Giade'),
(100, 'BA', 'BA-10', 'Itas/Gadau'),
(101, 'BA', 'BA-11', 'Jama’are'),
(102, 'BA', 'BA-12', 'Katagum'),
(103, 'BA', 'BA-13', 'Kirfi'),
(104, 'BA', 'BA-14', 'Misau'),
(105, 'BA', 'BA-15', 'Ningi'),
(106, 'BA', 'BA-16', 'Shira'),
(107, 'BA', 'BA-17', 'Tafawa Balewa'),
(108, 'BA', 'BA-18', 'Toro'),
(109, 'BA', 'BA-19', 'Warji'),
(110, 'BA', 'BA-20', 'Zaki'),
(111, 'BY', 'BY-01', 'Brass'),
(112, 'BY', 'BY-02', 'Ekeremor'),
(113, 'BY', 'BY-03', 'Kolokuma/Opokuma'),
(114, 'BY', 'BY-04', 'Nembe'),
(115, 'BY', 'BY-05', 'Ogbia'),
(116, 'BY', 'BY-06', 'Sagbama'),
(117, 'BY', 'BY-07', 'Southern Ijaw'),
(118, 'BY', 'BY-08', 'Yenagoa'),
(119, 'BE', 'BE-01', 'Ado'),
(120, 'BE', 'BE-02', 'Agatu'),
(121, 'BE', 'BE-03', 'Apa'),
(122, 'BE', 'BE-04', 'Buruku'),
(123, 'BE', 'BE-05', 'Gboko'),
(124, 'BE', 'BE-06', 'Guma'),
(125, 'BE', 'BE-07', 'Gwer East'),
(126, 'BE', 'BE-08', 'Gwer West'),
(127, 'BE', 'BE-09', 'Katsina-Ala'),
(128, 'BE', 'BE-10', 'Konshisha'),
(129, 'BE', 'BE-11', 'Kwande'),
(130, 'BE', 'BE-12', 'Logo'),
(131, 'BE', 'BE-13', 'Makurdi'),
(132, 'BE', 'BE-14', 'Obi'),
(133, 'BE', 'BE-15', 'Ogbadibo'),
(134, 'BE', 'BE-16', 'Ohimini'),
(135, 'BE', 'BE-17', 'Oju'),
(136, 'BE', 'BE-18', 'Okpokwu'),
(137, 'BE', 'BE-19', 'Otukpo'),
(138, 'BE', 'BE-20', 'Tarka'),
(139, 'BE', 'BE-21', 'Ukum'),
(140, 'BE', 'BE-22', 'Ushongo'),
(141, 'BE', 'BE-23', 'Vandeikya'),
(142, 'BO', 'BO-01', 'Abadam'),
(143, 'BO', 'BO-02', 'Askira/Uba'),
(144, 'BO', 'BO-03', 'Bama'),
(145, 'BO', 'BO-04', 'Bayo'),
(146, 'BO', 'BO-05', 'Biu'),
(147, 'BO', 'BO-06', 'Chibok'),
(148, 'BO', 'BO-07', 'Damboa'),
(149, 'BO', 'BO-08', 'Dikwa'),
(150, 'BO', 'BO-09', 'Gubio'),
(151, 'BO', 'BO-10', 'Guzamala'),
(152, 'BO', 'BO-11', 'Gwoza'),
(153, 'BO', 'BO-12', 'Hawul'),
(154, 'BO', 'BO-13', 'Jere'),
(155, 'BO', 'BO-14', 'Kaga'),
(156, 'BO', 'BO-15', 'Kala/Balge'),
(157, 'BO', 'BO-16', 'Konduga'),
(158, 'BO', 'BO-17', 'Kukawa'),
(159, 'BO', 'BO-18', 'Kwaya Kusar'),
(160, 'BO', 'BO-19', 'Mafa'),
(161, 'BO', 'BO-20', 'Magumeri'),
(162, 'BO', 'BO-21', 'Maiduguri'),
(163, 'BO', 'BO-22', 'Marte'),
(164, 'BO', 'BO-23', 'Mobbar'),
(165, 'BO', 'BO-24', 'Monguno'),
(166, 'BO', 'BO-25', 'Ngala'),
(167, 'BO', 'BO-26', 'Nganzai'),
(168, 'BO', 'BO-27', 'Shani'),
(169, 'CR', 'CR-01', 'Abi'),
(170, 'CR', 'CR-02', 'Akamkpa'),
(171, 'CR', 'CR-03', 'Akpabuyo'),
(172, 'CR', 'CR-04', 'Bakassi'),
(173, 'CR', 'CR-05', 'Bekwarra'),
(174, 'CR', 'CR-06', 'Biase'),
(175, 'CR', 'CR-07', 'Boki'),
(176, 'CR', 'CR-08', 'Calabar Municipal'),
(177, 'CR', 'CR-09', 'Calabar South'),
(178, 'CR', 'CR-10', 'Etung'),
(179, 'CR', 'CR-11', 'Ikom'),
(180, 'CR', 'CR-12', 'Obanliku'),
(181, 'CR', 'CR-13', 'Obubra'),
(182, 'CR', 'CR-14', 'Obudu'),
(183, 'CR', 'CR-15', 'Odukpani'),
(184, 'CR', 'CR-16', 'Ogoja'),
(185, 'CR', 'CR-17', 'Yakurr'),
(186, 'CR', 'CR-18', 'Yala'),
(187, 'DE', 'DE-01', 'Aniocha North'),
(188, 'DE', 'DE-02', 'Aniocha South'),
(189, 'DE', 'DE-03', 'Bomadi'),
(190, 'DE', 'DE-04', 'Burutu'),
(191, 'DE', 'DE-05', 'Ethiope East'),
(192, 'DE', 'DE-06', 'Ethiope West'),
(193, 'DE', 'DE-07', 'Ika North East'),
(194, 'DE', 'DE-08', 'Ika South'),
(195, 'DE', 'DE-09', 'Isoko North'),
(196, 'DE', 'DE-10', 'Isoko South'),
(197, 'DE', 'DE-11', 'Ndokwa East'),
(198, 'DE', 'DE-12', 'Ndokwa West'),
(199, 'DE', 'DE-13', 'Okpe'),
(200, 'DE', 'DE-14', 'Oshimili North'),
(201, 'DE', 'DE-15', 'Oshimili South'),
(202, 'DE', 'DE-16', 'Patani'),
(203, 'DE', 'DE-17', 'Sapele'),
(204, 'DE', 'DE-18', 'Udu'),
(205, 'DE', 'DE-19', 'Ughelli North'),
(206, 'DE', 'DE-20', 'Ughelli South'),
(207, 'DE', 'DE-21', 'Ukwuani'),
(208, 'DE', 'DE-22', 'Uvwie'),
(209, 'DE', 'DE-23', 'Warri North'),
(210, 'DE', 'DE-24', 'Warri South'),
(211, 'DE', 'DE-25', 'Warri South West'),
(212, 'EB', 'EB-01', 'Abakaliki'),
(213, 'EB', 'EB-02', 'Afikpo North'),
(214, 'EB', 'EB-03', 'Afikpo South'),
(215, 'EB', 'EB-04', 'Ebonyi'),
(216, 'EB', 'EB-05', 'Ezza North'),
(217, 'EB', 'EB-06', 'Ezza South'),
(218, 'EB', 'EB-07', 'Ikwo'),
(219, 'EB', 'EB-08', 'Ishielu'),
(220, 'EB', 'EB-09', 'Ivo'),
(221, 'EB', 'EB-10', 'Izzi'),
(222, 'EB', 'EB-11', 'Ohaozara'),
(223, 'EB', 'EB-12', 'Ohaukwu'),
(224, 'EB', 'EB-13', 'Onicha'),
(225, 'ED', 'ED-01', 'Akoko-Edo'),
(226, 'ED', 'ED-02', 'Egor'),
(227, 'ED', 'ED-03', 'Esan Central'),
(228, 'ED', 'ED-04', 'Esan North-East'),
(229, 'ED', 'ED-05', 'Esan South-East'),
(230, 'ED', 'ED-06', 'Esan West'),
(231, 'ED', 'ED-07', 'Etsako Central'),
(232, 'ED', 'ED-08', 'Etsako East'),
(233, 'ED', 'ED-09', 'Etsako West'),
(234, 'ED', 'ED-10', 'Igueben'),
(235, 'ED', 'ED-11', 'Ikpoba-Okha'),
(236, 'ED', 'ED-12', 'Oredo'),
(237, 'ED', 'ED-13', 'Orhionmwon'),
(238, 'ED', 'ED-14', 'Ovia North-East'),
(239, 'ED', 'ED-15', 'Ovia South-West'),
(240, 'ED', 'ED-16', 'Owan East'),
(241, 'ED', 'ED-17', 'Owan West'),
(242, 'ED', 'ED-18', 'Uhunmwonde'),
(243, 'EK', 'EK-01', 'Ado Ekiti'),
(244, 'EK', 'EK-02', 'Efon'),
(245, 'EK', 'EK-03', 'Ekiti East'),
(246, 'EK', 'EK-04', 'Ekiti South-West'),
(247, 'EK', 'EK-05', 'Ekiti West'),
(248, 'EK', 'EK-06', 'Emure'),
(249, 'EK', 'EK-07', 'Gbonyin'),
(250, 'EK', 'EK-08', 'Ido Osi'),
(251, 'EK', 'EK-09', 'Ijero'),
(252, 'EK', 'EK-10', 'Ikere'),
(253, 'EK', 'EK-11', 'Ikole'),
(254, 'EK', 'EK-12', 'Ilejemeje'),
(255, 'EK', 'EK-13', 'Irepodun/Ifelodun'),
(256, 'EK', 'EK-14', 'Ise/Orun'),
(257, 'EK', 'EK-15', 'Moba'),
(258, 'EK', 'EK-16', 'Oye'),
(259, 'EN', 'EN-01', 'Aninri'),
(260, 'EN', 'EN-02', 'Awgu'),
(261, 'EN', 'EN-03', 'Enugu East'),
(262, 'EN', 'EN-04', 'Enugu North'),
(263, 'EN', 'EN-05', 'Enugu South'),
(264, 'EN', 'EN-06', 'Ezeagu'),
(265, 'EN', 'EN-07', 'Igbo Etiti'),
(266, 'EN', 'EN-08', 'Igbo Eze North'),
(267, 'EN', 'EN-09', 'Igbo Eze South'),
(268, 'EN', 'EN-10', 'Isi Uzo'),
(269, 'EN', 'EN-11', 'Nkanu East'),
(270, 'EN', 'EN-12', 'Nkanu West'),
(271, 'EN', 'EN-13', 'Nsukka'),
(272, 'EN', 'EN-14', 'Oji River'),
(273, 'EN', 'EN-15', 'Udenu'),
(274, 'EN', 'EN-16', 'Udi'),
(275, 'EN', 'EN-17', 'Uzo Uwani'),
(276, 'FC', 'FC-01', 'Abaji'),
(277, 'FC', 'FC-02', 'Bwari'),
(278, 'FC', 'FC-03', 'Gwagwalada'),
(279, 'FC', 'FC-04', 'Kuje'),
(280, 'FC', 'FC-05', 'Kwali'),
(281, 'FC', 'FC-06', 'Municipal Area Council'),
(282, 'GO', 'GO-01', 'Akko'),
(283, 'GO', 'GO-02', 'Balanga'),
(284, 'GO', 'GO-03', 'Billiri'),
(285, 'GO', 'GO-04', 'Dukku'),
(286, 'GO', 'GO-05', 'Funakaye'),
(287, 'GO', 'GO-06', 'Gombe'),
(288, 'GO', 'GO-07', 'Kaltungo'),
(289, 'GO', 'GO-08', 'Kwami'),
(290, 'GO', 'GO-09', 'Nafada'),
(291, 'GO', 'GO-10', 'Shongom'),
(292, 'GO', 'GO-11', 'Yamaltu/Deba'),
(293, 'IM', 'IM-01', 'Aboh Mbaise'),
(294, 'IM', 'IM-02', 'Ahiazu Mbaise'),
(295, 'IM', 'IM-03', 'Ehime Mbano'),
(296, 'IM', 'IM-04', 'Ezinihitte'),
(297, 'IM', 'IM-05', 'Ideato North'),
(298, 'IM', 'IM-06', 'Ideato South'),
(299, 'IM', 'IM-07', 'Ihitte/Uboma'),
(300, 'IM', 'IM-08', 'Ikeduru'),
(301, 'IM', 'IM-09', 'Isiala Mbano'),
(302, 'IM', 'IM-10', 'Isu'),
(303, 'IM', 'IM-11', 'Mbaitoli'),
(304, 'IM', 'IM-12', 'Ngor Okpala'),
(305, 'IM', 'IM-13', 'Njaba'),
(306, 'IM', 'IM-14', 'Nkwerre'),
(307, 'IM', 'IM-15', 'Nwangele'),
(308, 'IM', 'IM-16', 'Obowo'),
(309, 'IM', 'IM-17', 'Oguta'),
(310, 'IM', 'IM-18', 'Ohaji/Egbema'),
(311, 'IM', 'IM-19', 'Okigwe'),
(312, 'IM', 'IM-20', 'Orlu'),
(313, 'IM', 'IM-21', 'Orsu'),
(314, 'IM', 'IM-22', 'Oru East'),
(315, 'IM', 'IM-23', 'Oru West'),
(316, 'IM', 'IM-24', 'Owerri Municipal'),
(317, 'IM', 'IM-25', 'Owerri North'),
(318, 'IM', 'IM-26', 'Owerri West'),
(319, 'JI', 'JI-01', 'Auyo'),
(320, 'JI', 'JI-02', 'Babura'),
(321, 'JI', 'JI-03', 'Biriniwa'),
(322, 'JI', 'JI-04', 'Birnin Kudu'),
(323, 'JI', 'JI-05', 'Buji'),
(324, 'JI', 'JI-06', 'Dutse'),
(325, 'JI', 'JI-07', 'Gagarawa'),
(326, 'JI', 'JI-08', 'Garki'),
(327, 'JI', 'JI-09', 'Gumel'),
(328, 'JI', 'JI-10', 'Guri'),
(329, 'JI', 'JI-11', 'Gwaram'),
(330, 'JI', 'JI-12', 'Gwiwa'),
(331, 'JI', 'JI-13', 'Hadejia'),
(332, 'JI', 'JI-14', 'Jahun'),
(333, 'JI', 'JI-15', 'Kafin Hausa'),
(334, 'JI', 'JI-16', 'Kaugama'),
(335, 'JI', 'JI-17', 'Kazaure'),
(336, 'JI', 'JI-18', 'Kiri Kasama'),
(337, 'JI', 'JI-19', 'Kiyawa'),
(338, 'JI', 'JI-20', 'Maigatari'),
(339, 'JI', 'JI-21', 'Malam Madori'),
(340, 'JI', 'JI-22', 'Miga'),
(341, 'JI', 'JI-23', 'Ringim'),
(342, 'JI', 'JI-24', 'Roni'),
(343, 'JI', 'JI-25', 'Sule Tankarkar'),
(344, 'JI', 'JI-26', 'Taura'),
(345, 'JI', 'JI-27', 'Yankwashi'),
(346, 'KD', 'KD-01', 'Birnin Gwari'),
(347, 'KD', 'KD-02', 'Chikun'),
(348, 'KD', 'KD-03', 'Giwa'),
(349, 'KD', 'KD-04', 'Igabi'),
(350, 'KD', 'KD-05', 'Ikara'),
(351, 'KD', 'KD-06', 'Jaba'),
(352, 'KD', 'KD-07', 'Jema\'a'),
(353, 'KD', 'KD-08', 'Kachia'),
(354, 'KD', 'KD-09', 'Kaduna North'),
(355, 'KD', 'KD-10', 'Kaduna South'),
(356, 'KD', 'KD-11', 'Kagarko'),
(357, 'KD', 'KD-12', 'Kajuru'),
(358, 'KD', 'KD-13', 'Kaura'),
(359, 'KD', 'KD-14', 'Kauru'),
(360, 'KD', 'KD-15', 'Kubau'),
(361, 'KD', 'KD-16', 'Kudan'),
(362, 'KD', 'KD-17', 'Lere'),
(363, 'KD', 'KD-18', 'Makarfi'),
(364, 'KD', 'KD-19', 'Sabon Gari'),
(365, 'KD', 'KD-20', 'Sanga'),
(366, 'KD', 'KD-21', 'Soba'),
(367, 'KD', 'KD-22', 'Zangon Kataf'),
(368, 'KD', 'KD-23', 'Zaria'),
(369, 'KN', 'KN-01', 'Ajingi'),
(370, 'KN', 'KN-02', 'Albasu'),
(371, 'KN', 'KN-03', 'Bagwai'),
(372, 'KN', 'KN-04', 'Bebeji'),
(373, 'KN', 'KN-05', 'Bichi'),
(374, 'KN', 'KN-06', 'Bunkure'),
(375, 'KN', 'KN-07', 'Dala'),
(376, 'KN', 'KN-08', 'Dambatta'),
(377, 'KN', 'KN-09', 'Dawakin Kudu'),
(378, 'KN', 'KN-10', 'Dawakin Tofa'),
(379, 'KN', 'KN-11', 'Doguwa'),
(380, 'KN', 'KN-12', 'Fagge'),
(381, 'KN', 'KN-13', 'Gabasawa'),
(382, 'KN', 'KN-14', 'Garko'),
(383, 'KN', 'KN-15', 'Garun Mallam'),
(384, 'KN', 'KN-16', 'Gaya'),
(385, 'KN', 'KN-17', 'Gezawa'),
(386, 'KN', 'KN-18', 'Gwale'),
(387, 'KN', 'KN-19', 'Gwarzo'),
(388, 'KN', 'KN-20', 'Kabo'),
(389, 'KN', 'KN-21', 'Kano Municipal'),
(390, 'KN', 'KN-22', 'Karaye'),
(391, 'KN', 'KN-23', 'Kibiya'),
(392, 'KN', 'KN-24', 'Kiru'),
(393, 'KN', 'KN-25', 'Kumbotso'),
(394, 'KN', 'KN-26', 'Kunchi'),
(395, 'KN', 'KN-27', 'Kura'),
(396, 'KN', 'KN-28', 'Madobi'),
(397, 'KN', 'KN-29', 'Makoda'),
(398, 'KN', 'KN-30', 'Minjibir'),
(399, 'KN', 'KN-31', 'Nasarawa'),
(400, 'KN', 'KN-32', 'Rano'),
(401, 'KN', 'KN-33', 'Rimin Gado'),
(402, 'KN', 'KN-34', 'Rogo'),
(403, 'KN', 'KN-35', 'Shanono'),
(404, 'KN', 'KN-36', 'Sumaila'),
(405, 'KN', 'KN-37', 'Takai'),
(406, 'KN', 'KN-38', 'Tarauni'),
(407, 'KN', 'KN-39', 'Tofa'),
(408, 'KN', 'KN-40', 'Tsanyawa'),
(409, 'KN', 'KN-41', 'Tudun Wada'),
(410, 'KN', 'KN-42', 'Ungogo'),
(411, 'KN', 'KN-43', 'Warawa'),
(412, 'KN', 'KN-44', 'Wudil'),
(413, 'KT', 'KT-01', 'Bakori'),
(414, 'KT', 'KT-02', 'Batagarawa'),
(415, 'KT', 'KT-03', 'Batsari'),
(416, 'KT', 'KT-04', 'Baure'),
(417, 'KT', 'KT-05', 'Bindawa'),
(418, 'KT', 'KT-06', 'Charanchi'),
(419, 'KT', 'KT-07', 'Dandume'),
(420, 'KT', 'KT-08', 'Danja'),
(421, 'KT', 'KT-09', 'Dan Musa'),
(422, 'KT', 'KT-10', 'Daura'),
(423, 'KT', 'KT-11', 'Dutsi'),
(424, 'KT', 'KT-12', 'Dutsin Ma'),
(425, 'KT', 'KT-13', 'Faskari'),
(426, 'KT', 'KT-14', 'Funtua'),
(427, 'KT', 'KT-15', 'Ingawa'),
(428, 'KT', 'KT-16', 'Jibia'),
(429, 'KT', 'KT-17', 'Kafur'),
(430, 'KT', 'KT-18', 'Kaita'),
(431, 'KT', 'KT-19', 'Kankara'),
(432, 'KT', 'KT-20', 'Kankia'),
(433, 'KT', 'KT-21', 'Katsina'),
(434, 'KT', 'KT-22', 'Kurfi'),
(435, 'KT', 'KT-23', 'Kusada'),
(436, 'KT', 'KT-24', 'Mai\'Adua'),
(437, 'KT', 'KT-25', 'Malumfashi'),
(438, 'KT', 'KT-26', 'Mani'),
(439, 'KT', 'KT-27', 'Mashi'),
(440, 'KT', 'KT-28', 'Matazu'),
(441, 'KT', 'KT-29', 'Musawa'),
(442, 'KT', 'KT-30', 'Rimi'),
(443, 'KT', 'KT-31', 'Sabuwa'),
(444, 'KT', 'KT-32', 'Safana'),
(445, 'KT', 'KT-33', 'Sandamu'),
(446, 'KT', 'KT-34', 'Zango'),
(447, 'KE', 'KE-01', 'Aleiro'),
(448, 'KE', 'KE-02', 'Arewa Dandi'),
(449, 'KE', 'KE-03', 'Argungu'),
(450, 'KE', 'KE-04', 'Augie'),
(451, 'KE', 'KE-05', 'Bagudo'),
(452, 'KE', 'KE-06', 'Birnin Kebbi'),
(453, 'KE', 'KE-07', 'Bunza'),
(454, 'KE', 'KE-08', 'Dandi'),
(455, 'KE', 'KE-09', 'Fakai'),
(456, 'KE', 'KE-10', 'Gwandu'),
(457, 'KE', 'KE-11', 'Jega'),
(458, 'KE', 'KE-12', 'Kalgo'),
(459, 'KE', 'KE-13', 'Koko/Besse'),
(460, 'KE', 'KE-14', 'Maiyama'),
(461, 'KE', 'KE-15', 'Ngaski'),
(462, 'KE', 'KE-16', 'Sakaba'),
(463, 'KE', 'KE-17', 'Shanga'),
(464, 'KE', 'KE-18', 'Suru'),
(465, 'KE', 'KE-19', 'Wasagu/Danko'),
(466, 'KE', 'KE-20', 'Yauri'),
(467, 'KE', 'KE-21', 'Zuru'),
(468, 'KO', 'KO-01', 'Adavi'),
(469, 'KO', 'KO-02', 'Ajaokuta'),
(470, 'KO', 'KO-03', 'Ankpa'),
(471, 'KO', 'KO-04', 'Bassa'),
(472, 'KO', 'KO-05', 'Dekina'),
(473, 'KO', 'KO-06', 'Ibaji'),
(474, 'KO', 'KO-07', 'Idah'),
(475, 'KO', 'KO-08', 'Igalamela Odolu'),
(476, 'KO', 'KO-09', 'Ijumu'),
(477, 'KO', 'KO-10', 'Kabba/Bunu'),
(478, 'KO', 'KO-11', 'Kogi'),
(479, 'KO', 'KO-12', 'Lokoja'),
(480, 'KO', 'KO-13', 'Mopa Muro'),
(481, 'KO', 'KO-14', 'Ofu'),
(482, 'KO', 'KO-15', 'Ogori/Magongo'),
(483, 'KO', 'KO-16', 'Okehi'),
(484, 'KO', 'KO-17', 'Okene'),
(485, 'KO', 'KO-18', 'Olamaboro'),
(486, 'KO', 'KO-19', 'Omala'),
(487, 'KO', 'KO-20', 'Yagba East'),
(488, 'KO', 'KO-21', 'Yagba West'),
(489, 'KW', 'KW-01', 'Asa'),
(490, 'KW', 'KW-02', 'Baruten'),
(491, 'KW', 'KW-03', 'Edu'),
(492, 'KW', 'KW-04', 'Ekiti'),
(493, 'KW', 'KW-05', 'Ifelodun'),
(494, 'KW', 'KW-06', 'Ilorin East'),
(495, 'KW', 'KW-07', 'Ilorin South'),
(496, 'KW', 'KW-08', 'Ilorin West'),
(497, 'KW', 'KW-09', 'Irepodun'),
(498, 'KW', 'KW-10', 'Isin'),
(499, 'KW', 'KW-11', 'Kaiama'),
(500, 'KW', 'KW-12', 'Moro'),
(501, 'KW', 'KW-13', 'Offa'),
(502, 'KW', 'KW-14', 'Oke Ero'),
(503, 'KW', 'KW-15', 'Oyun'),
(504, 'KW', 'KW-16', 'Pategi'),
(505, 'LA', 'LA-01', 'Agege'),
(506, 'LA', 'LA-02', 'Ajeromi-Ifelodun'),
(507, 'LA', 'LA-03', 'Alimosho'),
(508, 'LA', 'LA-04', 'Amuwo-Odofin'),
(509, 'LA', 'LA-05', 'Apapa'),
(510, 'LA', 'LA-06', 'Badagry'),
(511, 'LA', 'LA-07', 'Epe'),
(512, 'LA', 'LA-08', 'Eti-Osa'),
(513, 'LA', 'LA-09', 'Ibeju-Lekki'),
(514, 'LA', 'LA-10', 'Ifako-Ijaiye'),
(515, 'LA', 'LA-11', 'Ikeja'),
(516, 'LA', 'LA-12', 'Ikorodu'),
(517, 'LA', 'LA-13', 'Kosofe'),
(518, 'LA', 'LA-14', 'Lagos Island'),
(519, 'LA', 'LA-15', 'Lagos Mainland'),
(520, 'LA', 'LA-16', 'Mushin'),
(521, 'LA', 'LA-17', 'Ojo'),
(522, 'LA', 'LA-18', 'Oshodi-Isolo'),
(523, 'LA', 'LA-19', 'Shomolu'),
(524, 'LA', 'LA-20', 'Surulere'),
(525, 'NA', 'NA-01', 'Akwanga'),
(526, 'NA', 'NA-02', 'Awe'),
(527, 'NA', 'NA-03', 'Doma'),
(528, 'NA', 'NA-04', 'Karu'),
(529, 'NA', 'NA-05', 'Keana'),
(530, 'NA', 'NA-06', 'Keffi'),
(531, 'NA', 'NA-07', 'Kokona'),
(532, 'NA', 'NA-08', 'Lafia'),
(533, 'NA', 'NA-09', 'Nasarawa'),
(534, 'NA', 'NA-10', 'Nasarawa Egon'),
(535, 'NA', 'NA-11', 'Obi'),
(536, 'NA', 'NA-12', 'Toto'),
(537, 'NA', 'NA-13', 'Wamba'),
(538, 'NI', 'NI-01', 'Agaie'),
(539, 'NI', 'NI-02', 'Agwara'),
(540, 'NI', 'NI-03', 'Bida'),
(541, 'NI', 'NI-04', 'Borgu'),
(542, 'NI', 'NI-05', 'Bosso'),
(543, 'NI', 'NI-06', 'Chanchaga'),
(544, 'NI', 'NI-07', 'Edati'),
(545, 'NI', 'NI-08', 'Gbako'),
(546, 'NI', 'NI-09', 'Gurara'),
(547, 'NI', 'NI-10', 'Katcha'),
(548, 'NI', 'NI-11', 'Kontagora'),
(549, 'NI', 'NI-12', 'Lapai'),
(550, 'NI', 'NI-13', 'Lavun'),
(551, 'NI', 'NI-14', 'Magama'),
(552, 'NI', 'NI-15', 'Mariga'),
(553, 'NI', 'NI-16', 'Mashegu'),
(554, 'NI', 'NI-17', 'Mokwa'),
(555, 'NI', 'NI-18', 'Muya'),
(556, 'NI', 'NI-19', 'Paikoro'),
(557, 'NI', 'NI-20', 'Rafi'),
(558, 'NI', 'NI-21', 'Rijau'),
(559, 'NI', 'NI-22', 'Shiroro'),
(560, 'NI', 'NI-23', 'Suleja'),
(561, 'NI', 'NI-24', 'Tafa'),
(562, 'NI', 'NI-25', 'Wushishi'),
(563, 'OG', 'OG-01', 'Abeokuta North'),
(564, 'OG', 'OG-02', 'Abeokuta South'),
(565, 'OG', 'OG-03', 'Ado-Odo/Ota'),
(566, 'OG', 'OG-04', 'Egbado North'),
(567, 'OG', 'OG-05', 'Egbado South'),
(568, 'OG', 'OG-06', 'Ewekoro'),
(569, 'OG', 'OG-07', 'Ifo'),
(570, 'OG', 'OG-08', 'Ijebu East'),
(571, 'OG', 'OG-09', 'Ijebu North'),
(572, 'OG', 'OG-10', 'Ijebu North East'),
(573, 'OG', 'OG-11', 'Ijebu Ode'),
(574, 'OG', 'OG-12', 'Ikenne'),
(575, 'OG', 'OG-13', 'Imeko Afon'),
(576, 'OG', 'OG-14', 'Ipokia'),
(577, 'OG', 'OG-15', 'Obafemi Owode'),
(578, 'OG', 'OG-16', 'Odeda'),
(579, 'OG', 'OG-17', 'Odogbolu'),
(580, 'OG', 'OG-18', 'Ogun Waterside'),
(581, 'OG', 'OG-19', 'Remo North'),
(582, 'OG', 'OG-20', 'Shagamu'),
(583, 'ON', 'ON-01', 'Akoko North-East'),
(584, 'ON', 'ON-02', 'Akoko North-West'),
(585, 'ON', 'ON-03', 'Akoko South-East'),
(586, 'ON', 'ON-04', 'Akoko South-West'),
(587, 'ON', 'ON-05', 'Akure North'),
(588, 'ON', 'ON-06', 'Akure South'),
(589, 'ON', 'ON-07', 'Ese Odo'),
(590, 'ON', 'ON-08', 'Idanre'),
(591, 'ON', 'ON-09', 'Ifedore'),
(592, 'ON', 'ON-10', 'Ilaje'),
(593, 'ON', 'ON-11', 'Ile Oluji/Okeigbo'),
(594, 'ON', 'ON-12', 'Irele'),
(595, 'ON', 'ON-13', 'Odigbo'),
(596, 'ON', 'ON-14', 'Okitipupa'),
(597, 'ON', 'ON-15', 'Ondo East'),
(598, 'ON', 'ON-16', 'Ondo West'),
(599, 'ON', 'ON-17', 'Ose'),
(600, 'ON', 'ON-18', 'Owo'),
(601, 'OS', 'OS-01', 'Atakunmosa East'),
(602, 'OS', 'OS-02', 'Atakunmosa West'),
(603, 'OS', 'OS-03', 'Aiyedaade'),
(604, 'OS', 'OS-04', 'Aiyedire'),
(605, 'OS', 'OS-05', 'Boluwaduro'),
(606, 'OS', 'OS-06', 'Boripe'),
(607, 'OS', 'OS-07', 'Ede North'),
(608, 'OS', 'OS-08', 'Ede South'),
(609, 'OS', 'OS-09', 'Egbedore'),
(610, 'OS', 'OS-10', 'Ejigbo'),
(611, 'OS', 'OS-11', 'Ife Central'),
(612, 'OS', 'OS-12', 'Ife East'),
(613, 'OS', 'OS-13', 'Ife North'),
(614, 'OS', 'OS-14', 'Ife South'),
(615, 'OS', 'OS-15', 'Ifedayo'),
(616, 'OS', 'OS-16', 'Ifelodun'),
(617, 'OS', 'OS-17', 'Ila'),
(618, 'OS', 'OS-18', 'Ilesa East'),
(619, 'OS', 'OS-19', 'Ilesa West'),
(620, 'OS', 'OS-20', 'Irepodun'),
(621, 'OS', 'OS-21', 'Irewole'),
(622, 'OS', 'OS-22', 'Isokan'),
(623, 'OS', 'OS-23', 'Iwo'),
(624, 'OS', 'OS-24', 'Obokun'),
(625, 'OS', 'OS-25', 'Odo Otin'),
(626, 'OS', 'OS-26', 'Ola Oluwa'),
(627, 'OS', 'OS-27', 'Olorunda'),
(628, 'OS', 'OS-28', 'Oriade'),
(629, 'OS', 'OS-29', 'Orolu'),
(630, 'OS', 'OS-30', 'Osogbo'),
(631, 'OY', 'OY-01', 'Afijio'),
(632, 'OY', 'OY-02', 'Akinyele'),
(633, 'OY', 'OY-03', 'Atiba'),
(634, 'OY', 'OY-04', 'Atisbo'),
(635, 'OY', 'OY-05', 'Egbeda'),
(636, 'OY', 'OY-06', 'Ibadan North'),
(637, 'OY', 'OY-07', 'Ibadan North-East'),
(638, 'OY', 'OY-08', 'Ibadan North-West'),
(639, 'OY', 'OY-09', 'Ibadan South-East'),
(640, 'OY', 'OY-10', 'Ibadan South-West'),
(641, 'OY', 'OY-11', 'Ibarapa Central'),
(642, 'OY', 'OY-12', 'Ibarapa East'),
(643, 'OY', 'OY-13', 'Ibarapa North'),
(644, 'OY', 'OY-14', 'Ido'),
(645, 'OY', 'OY-15', 'Irepo'),
(646, 'OY', 'OY-16', 'Iseyin'),
(647, 'OY', 'OY-17', 'Itesiwaju'),
(648, 'OY', 'OY-18', 'Iwajowa'),
(649, 'OY', 'OY-19', 'Kajola'),
(650, 'OY', 'OY-20', 'Lagelu'),
(651, 'OY', 'OY-21', 'Ogbomosho North'),
(652, 'OY', 'OY-22', 'Ogbomosho South'),
(653, 'OY', 'OY-23', 'Ogo Oluwa'),
(654, 'OY', 'OY-24', 'Olorunsogo'),
(655, 'OY', 'OY-25', 'Oluyole'),
(656, 'OY', 'OY-26', 'Ona Ara'),
(657, 'OY', 'OY-27', 'Orelope'),
(658, 'OY', 'OY-28', 'Ori Ire'),
(659, 'OY', 'OY-29', 'Oyo East'),
(660, 'OY', 'OY-30', 'Oyo West'),
(661, 'OY', 'OY-31', 'Saki East'),
(662, 'OY', 'OY-32', 'Saki West'),
(663, 'OY', 'OY-33', 'Surulere'),
(664, 'PL', 'PL-01', 'Barkin Ladi'),
(665, 'PL', 'PL-02', 'Bassa'),
(666, 'PL', 'PL-03', 'Bokkos'),
(667, 'PL', 'PL-04', 'Jos East'),
(668, 'PL', 'PL-05', 'Jos North'),
(669, 'PL', 'PL-06', 'Jos South'),
(670, 'PL', 'PL-07', 'Kanam'),
(671, 'PL', 'PL-08', 'Kanke'),
(672, 'PL', 'PL-09', 'Langtang North'),
(673, 'PL', 'PL-10', 'Langtang South'),
(674, 'PL', 'PL-11', 'Mangu'),
(675, 'PL', 'PL-12', 'Mikang'),
(676, 'PL', 'PL-13', 'Pankshin'),
(677, 'PL', 'PL-14', 'Qua’an Pan'),
(678, 'PL', 'PL-15', 'Riyom'),
(679, 'PL', 'PL-16', 'Shendam'),
(680, 'PL', 'PL-17', 'Wase'),
(681, 'RI', 'RI-01', 'Abua/Odual'),
(682, 'RI', 'RI-02', 'Ahoada East'),
(683, 'RI', 'RI-03', 'Ahoada West'),
(684, 'RI', 'RI-04', 'Akuku-Toru'),
(685, 'RI', 'RI-05', 'Andoni'),
(686, 'RI', 'RI-06', 'Asari-Toru'),
(687, 'RI', 'RI-07', 'Bonny'),
(688, 'RI', 'RI-08', 'Degema'),
(689, 'RI', 'RI-09', 'Eleme'),
(690, 'RI', 'RI-10', 'Emuoha'),
(691, 'RI', 'RI-11', 'Etche'),
(692, 'RI', 'RI-12', 'Gokana'),
(693, 'RI', 'RI-13', 'Ikwerre'),
(694, 'RI', 'RI-14', 'Khana'),
(695, 'RI', 'RI-15', 'Obio/Akpor'),
(696, 'RI', 'RI-16', 'Ogba/Egbema/Ndoni'),
(697, 'RI', 'RI-17', 'Ogu/Bolo'),
(698, 'RI', 'RI-18', 'Okrika'),
(699, 'RI', 'RI-19', 'Omuma'),
(700, 'RI', 'RI-20', 'Opobo/Nkoro'),
(701, 'RI', 'RI-21', 'Oyigbo'),
(702, 'RI', 'RI-22', 'Port Harcourt'),
(703, 'RI', 'RI-23', 'Tai'),
(704, 'SO', 'SO-01', 'Binji'),
(705, 'SO', 'SO-02', 'Bodinga'),
(706, 'SO', 'SO-03', 'Dange Shuni'),
(707, 'SO', 'SO-04', 'Gada'),
(708, 'SO', 'SO-05', 'Goronyo'),
(709, 'SO', 'SO-06', 'Gudu'),
(710, 'SO', 'SO-07', 'Gwadabawa'),
(711, 'SO', 'SO-08', 'Illela'),
(712, 'SO', 'SO-09', 'Isa'),
(713, 'SO', 'SO-10', 'Kebbe'),
(714, 'SO', 'SO-11', 'Kware'),
(715, 'SO', 'SO-12', 'Rabah'),
(716, 'SO', 'SO-13', 'Sabon Birni'),
(717, 'SO', 'SO-14', 'Shagari'),
(718, 'SO', 'SO-15', 'Silame'),
(719, 'SO', 'SO-16', 'Sokoto North'),
(720, 'SO', 'SO-17', 'Sokoto South'),
(721, 'SO', 'SO-18', 'Tambuwal'),
(722, 'SO', 'SO-19', 'Tangaza'),
(723, 'SO', 'SO-20', 'Tureta'),
(724, 'SO', 'SO-21', 'Wamako'),
(725, 'SO', 'SO-22', 'Wurno'),
(726, 'SO', 'SO-23', 'Yabo'),
(727, 'TA', 'TA-01', 'Ardo Kola'),
(728, 'TA', 'TA-02', 'Bali'),
(729, 'TA', 'TA-03', 'Donga'),
(730, 'TA', 'TA-04', 'Gashaka'),
(731, 'TA', 'TA-05', 'Gassol'),
(732, 'TA', 'TA-06', 'Ibi'),
(733, 'TA', 'TA-07', 'Jalingo'),
(734, 'TA', 'TA-08', 'Karim Lamido'),
(735, 'TA', 'TA-09', 'Kumi'),
(736, 'TA', 'TA-10', 'Lau'),
(737, 'TA', 'TA-11', 'Sardauna'),
(738, 'TA', 'TA-12', 'Takum'),
(739, 'TA', 'TA-13', 'Ussa'),
(740, 'TA', 'TA-14', 'Wukari'),
(741, 'TA', 'TA-15', 'Yorro'),
(742, 'TA', 'TA-16', 'Zing'),
(743, 'YO', 'YO-01', 'Bade'),
(744, 'YO', 'YO-02', 'Bursari'),
(745, 'YO', 'YO-03', 'Damaturu'),
(746, 'YO', 'YO-04', 'Fika'),
(747, 'YO', 'YO-05', 'Fune'),
(748, 'YO', 'YO-06', 'Geidam'),
(749, 'YO', 'YO-07', 'Gujba'),
(750, 'YO', 'YO-08', 'Gulani'),
(751, 'YO', 'YO-09', 'Jakusko'),
(752, 'YO', 'YO-10', 'Karasuwa'),
(753, 'YO', 'YO-11', 'Machina'),
(754, 'YO', 'YO-12', 'Nangere'),
(755, 'YO', 'YO-13', 'Nguru'),
(756, 'YO', 'YO-14', 'Potiskum'),
(757, 'YO', 'YO-15', 'Tarmuwa'),
(758, 'YO', 'YO-16', 'Yunusari'),
(759, 'YO', 'YO-17', 'Yusufari'),
(760, 'ZA', 'ZA-01', 'Anka'),
(761, 'ZA', 'ZA-02', 'Bakura'),
(762, 'ZA', 'ZA-03', 'Birnin Magaji/Kiyaw'),
(763, 'ZA', 'ZA-04', 'Bukkuyum'),
(764, 'ZA', 'ZA-05', 'Bungudu'),
(765, 'ZA', 'ZA-06', 'Gummi'),
(766, 'ZA', 'ZA-07', 'Gusau'),
(767, 'ZA', 'ZA-08', 'Kaura Namoda'),
(768, 'ZA', 'ZA-09', 'Maradun'),
(769, 'ZA', 'ZA-10', 'Maru'),
(770, 'ZA', 'ZA-11', 'Shinkafi'),
(771, 'ZA', 'ZA-12', 'Talata Mafara'),
(772, 'ZA', 'ZA-13', 'Chafe'),
(773, 'ZA', 'ZA-14', 'Zurmi'),
(774, 'FC', 'FC-01', 'Abaji'),
(775, 'FC', 'FC-02', 'Bwari'),
(776, 'FC', 'FC-03', 'Gwagwalada'),
(777, 'FC', 'FC-04', 'Kuje'),
(778, 'FC', 'FC-05', 'Kwali'),
(779, 'FC', 'FC-06', 'Municipal Area Council');

-- --------------------------------------------------------

--
-- Table structure for table `setup_status_tab`
--

CREATE TABLE `setup_status_tab` (
  `sn` int(10) UNSIGNED NOT NULL,
  `statusId` varchar(100) NOT NULL,
  `statusName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_status_tab`
--

INSERT INTO `setup_status_tab` (`sn`, `statusId`, `statusName`) VALUES
(1, '1', 'ACTIVE'),
(2, '2', 'SUSPENDED'),
(3, '3', 'PENDING'),
(4, '4', 'SUCCESS'),
(5, '5', 'CANCELLED'),
(6, '6', 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `setup_title_tab`
--

CREATE TABLE `setup_title_tab` (
  `sn` int(11) NOT NULL,
  `titleId` varchar(50) NOT NULL,
  `titleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_title_tab`
--

INSERT INTO `setup_title_tab` (`sn`, `titleId`, `titleName`) VALUES
(1, 'MR', 'MR'),
(2, 'MISS', 'MISS'),
(3, 'MRS', 'MRS'),
(4, 'DR', 'DR'),
(5, 'ENGR', 'ENGR'),
(6, 'PROF', 'PROF');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tab`
--

CREATE TABLE `staff_tab` (
  `sn` int(11) NOT NULL,
  `accessKey` varchar(255) DEFAULT NULL,
  `staffId` varchar(100) NOT NULL,
  `titleId` varchar(50) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `genderId` varchar(50) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `stateId` varchar(100) NOT NULL,
  `lgaId` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profilePix` varchar(100) DEFAULT NULL,
  `statusId` varchar(50) NOT NULL,
  `roleId` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `updatedBy` varchar(100) DEFAULT NULL,
  `createdTime` datetime NOT NULL,
  `updatedTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastLoginTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_tab`
--

INSERT INTO `staff_tab` (`sn`, `accessKey`, `staffId`, `titleId`, `firstName`, `middleName`, `lastName`, `emailAddress`, `phoneNumber`, `genderId`, `dateOfBirth`, `stateId`, `lgaId`, `address`, `profilePix`, `statusId`, `roleId`, `password`, `createdBy`, `updatedBy`, `createdTime`, `updatedTime`, `lastLoginTime`) VALUES
(1, '4fd6521b2c984704c28f4c790ffcd430', 'STF0001', 'MR', 'EMMANUEL', 'GODWILL', 'PAUL', 'seunemmanuel107@gmail.com', '09029159943', 'M', '2000-06-04', 'BE', 'BE-14', '121, KOTCO ROAD, ODE REMO, OGUN STATE', 'STF0001_202508120158_1373628-best-robot-wallpapers-1920x1080-for-android-50.jpg', '1', 3, 'c50f061085d695dde5773039032267f6', '', 'STF0001', '2025-08-07 23:03:16', '2025-08-12 10:00:37', '2025-08-13 16:04:11'),
(9, '84c1ef05ba5125677259b9c6057b3e69', 'STAFF00120250808033535', 'MR', 'SAMSON', 'GODWIN', 'PAUL', 'godwin10@gmail.com', '09050903886', 'M', '1991-06-04', 'BE', 'BE-14', '121, KOTCO ROAD, ODE REMO, OGUN STATE', 'STAFF00120250808033535_202508120200_1743089260471.png', '1', 2, 'c50f061085d695dde5773039032267f6', 'STF0001', 'STF0001', '2025-08-08 02:35:35', '2025-08-09 23:51:35', '2025-08-12 12:59:54'),
(10, NULL, 'STAFF00220250809020010', 'MISS', 'FAITH', 'ABOSEDE', 'IKONG', 'mary200@gmail.com', '07050903886', 'F', '2000-05-20', 'BE', 'BE-14', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 1, 'd37cd18d739671d199189441413d3991', 'STF0001', 'STF0001', '2025-08-09 01:00:10', '2025-08-11 09:20:43', NULL),
(11, NULL, 'STAFF00320250809075355', 'MR', 'EZEKEIEL', 'ISREAL', 'YAKUBU', 'yakubu200@gmail.com', '07050903886', 'M', '1995-10-05', 'KO', 'KO-09', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 2, 'ad7dee8785e03bc133c2581b9a00bcbe', 'STF0001', 'STF0001', '2025-08-09 18:53:55', '2025-08-09 23:51:15', NULL),
(12, NULL, 'STAFF00420250809080400', 'MRS', 'KEMISOLA', 'KAFAYAT', 'AKUNWUNMI', 'kafayat30@gmail.com', '08160701918', 'F', '0000-00-00', 'LA', 'LA-06', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 2, 'f65d98c14721ca624de712fc170f42e4', 'STF0001', NULL, '2025-08-09 19:04:00', '2025-08-09 18:04:00', NULL),
(13, NULL, 'STAFF00520250809081022', 'ENGR', 'PRECIOUS', 'IBUKUNOLUWA', 'MIKE', 'precious20@gmail.com', '07050903886', 'F', '2021-08-06', 'OG', 'OG-19', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '2', 2, '200ed36429ccb037b0b243c97e10571d', 'STF0001', 'STF0001', '2025-08-09 19:10:22', '2025-08-12 12:22:17', NULL),
(14, NULL, 'STAFF00620250809081532', 'MISS', 'MARIA', 'KAFAYAT', 'IKONG', 'kafayat100@gmail.com', '08160701918', 'M', '2000-10-10', 'AB', 'AB-02', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 1, 'd3c4e0f54a9d97119923e3fc9f02d4c7', 'STF0001', 'STF0001', '2025-08-09 19:15:32', '2025-08-09 23:40:15', NULL),
(15, NULL, 'STAFF00720250810015616', 'PROF', 'MIKE', 'OLUWAGBENGA', 'AFOLABI', 'sunaf4real@gmail.com', '08131252996', 'M', '1990-05-20', 'OG', 'OG-19', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 3, 'c50f061085d695dde5773039032267f6', 'STF0001', 'STF0001', '2025-08-10 00:56:16', '2025-08-10 00:01:40', NULL),
(16, NULL, 'STAFF00820250812021703', 'MRS', 'BOLA', 'TINUBU', 'AHMED', 'tinubu@gmail.com', '07050903886', 'M', '1989-05-05', 'LA', 'LA-11', '120, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 1, '15934e0d3a3bb81ca5c8495e14e6915e', 'STAFF00120250808033535', 'STF0001', '2025-08-12 13:17:03', '2025-08-13 01:58:05', NULL),
(17, NULL, 'STAFF00920250813035030', 'PROF', 'KOLAWOLE', 'AJAO', 'OLOTU', 'olotu200@gmail.com', '08160701918', 'M', '1980-03-05', 'OG', 'OG-09', '121, KOTCO ROAD,ODE REMO, OGUN STATE', 'default.jpg', '1', 2, 'a25943ab98b4b074e39d8a7ddef93f0c', 'STF0001', NULL, '2025-08-13 02:50:30', '2025-08-13 01:50:30', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `staff_view`
-- (See below for the actual view)
--
CREATE TABLE `staff_view` (
`sn` int(11)
,`accessKey` varchar(255)
,`staffId` varchar(100)
,`titleId` varchar(50)
,`firstName` varchar(255)
,`middleName` varchar(255)
,`lastName` varchar(255)
,`emailAddress` varchar(255)
,`phoneNumber` varchar(20)
,`genderId` varchar(50)
,`dateOfBirth` date
,`stateId` varchar(100)
,`lgaId` varchar(100)
,`address` varchar(255)
,`profilePix` varchar(100)
,`statusId` varchar(50)
,`roleId` int(11)
,`password` varchar(255)
,`createdBy` varchar(100)
,`updatedBy` varchar(100)
,`createdTime` datetime
,`updatedTime` timestamp
,`lastLoginTime` datetime
,`titleName` varchar(50)
,`genderName` varchar(100)
,`roleName` varchar(50)
,`statusName` varchar(100)
,`stateName` varchar(100)
,`lgaName` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `staff_view`
--
DROP TABLE IF EXISTS `staff_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `staff_view`  AS SELECT `a`.`sn` AS `sn`, `a`.`accessKey` AS `accessKey`, `a`.`staffId` AS `staffId`, `a`.`titleId` AS `titleId`, `a`.`firstName` AS `firstName`, `a`.`middleName` AS `middleName`, `a`.`lastName` AS `lastName`, `a`.`emailAddress` AS `emailAddress`, `a`.`phoneNumber` AS `phoneNumber`, `a`.`genderId` AS `genderId`, `a`.`dateOfBirth` AS `dateOfBirth`, `a`.`stateId` AS `stateId`, `a`.`lgaId` AS `lgaId`, `a`.`address` AS `address`, `a`.`profilePix` AS `profilePix`, `a`.`statusId` AS `statusId`, `a`.`roleId` AS `roleId`, `a`.`password` AS `password`, `a`.`createdBy` AS `createdBy`, `a`.`updatedBy` AS `updatedBy`, `a`.`createdTime` AS `createdTime`, `a`.`updatedTime` AS `updatedTime`, `a`.`lastLoginTime` AS `lastLoginTime`, `b`.`titleName` AS `titleName`, `c`.`genderName` AS `genderName`, `d`.`roleName` AS `roleName`, `e`.`statusName` AS `statusName`, `f`.`stateName` AS `stateName`, `g`.`lgaName` AS `lgaName` FROM ((((((`staff_tab` `a` join `setup_title_tab` `b`) join `setup_gender_tab` `c`) join `setup_role_tab` `d`) join `setup_status_tab` `e`) join `setup_states_tab` `f`) join `setup_state_lga_tab` `g`) WHERE `a`.`titleId` = `b`.`titleId` AND `a`.`genderId` = `c`.`genderId` AND `a`.`roleId` = `d`.`roleId` AND `a`.`statusId` = `e`.`statusId` AND `a`.`stateId` = `f`.`stateId` AND `a`.`lgaId` = `g`.`lgaId` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_alert_tab`
--
ALTER TABLE `0_alert_tab`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `alert_id` (`alertId`);

--
-- Indexes for table `pages_tab`
--
ALTER TABLE `pages_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `page_views_tab`
--
ALTER TABLE `page_views_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `publish_tab`
--
ALTER TABLE `publish_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_counter_tab`
--
ALTER TABLE `setup_counter_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_gender_tab`
--
ALTER TABLE `setup_gender_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_page_categories_tab`
--
ALTER TABLE `setup_page_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_states_tab`
--
ALTER TABLE `setup_states_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_state_lga_tab`
--
ALTER TABLE `setup_state_lga_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_title_tab`
--
ALTER TABLE `setup_title_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_tab`
--
ALTER TABLE `staff_tab`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_alert_tab`
--
ALTER TABLE `0_alert_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pages_tab`
--
ALTER TABLE `pages_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_views_tab`
--
ALTER TABLE `page_views_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `publish_tab`
--
ALTER TABLE `publish_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setup_counter_tab`
--
ALTER TABLE `setup_counter_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setup_gender_tab`
--
ALTER TABLE `setup_gender_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_page_categories_tab`
--
ALTER TABLE `setup_page_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_states_tab`
--
ALTER TABLE `setup_states_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `setup_state_lga_tab`
--
ALTER TABLE `setup_state_lga_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

--
-- AUTO_INCREMENT for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_title_tab`
--
ALTER TABLE `setup_title_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
