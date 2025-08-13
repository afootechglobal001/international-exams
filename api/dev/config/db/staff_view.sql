-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 05:50 PM
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
-- Structure for view `staff_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `staff_view`  AS SELECT `a`.`sn` AS `sn`, `a`.`accessKey` AS `accessKey`, `a`.`staffId` AS `staffId`, `a`.`titleId` AS `titleId`, `a`.`firstName` AS `firstName`, `a`.`middleName` AS `middleName`, `a`.`lastName` AS `lastName`, `a`.`emailAddress` AS `emailAddress`, `a`.`phoneNumber` AS `phoneNumber`, `a`.`genderId` AS `genderId`, `a`.`dateOfBirth` AS `dateOfBirth`, `a`.`stateId` AS `stateId`, `a`.`lgaId` AS `lgaId`, `a`.`address` AS `address`, `a`.`profilePix` AS `profilePix`, `a`.`statusId` AS `statusId`, `a`.`roleId` AS `roleId`, `a`.`password` AS `password`, `a`.`createdBy` AS `createdBy`, `a`.`updatedBy` AS `updatedBy`, `a`.`createdTime` AS `createdTime`, `a`.`updatedTime` AS `updatedTime`, `a`.`lastLoginTime` AS `lastLoginTime`, `b`.`titleName` AS `titleName`, `c`.`genderName` AS `genderName`, `d`.`roleName` AS `roleName`, `e`.`statusName` AS `statusName`, `f`.`stateName` AS `stateName`, `g`.`lgaName` AS `lgaName` FROM ((((((`staff_tab` `a` join `setup_title_tab` `b`) join `setup_gender_tab` `c`) join `setup_role_tab` `d`) join `setup_status_tab` `e`) join `setup_states_tab` `f`) join `setup_state_lga_tab` `g`) WHERE `a`.`titleId` = `b`.`titleId` AND `a`.`genderId` = `c`.`genderId` AND `a`.`roleId` = `d`.`roleId` AND `a`.`statusId` = `e`.`statusId` AND `a`.`stateId` = `f`.`stateId` AND `a`.`lgaId` = `g`.`lgaId` ;

--
-- VIEW `staff_view`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
