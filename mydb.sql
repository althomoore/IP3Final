-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 05:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributee_access`
--

CREATE TABLE `distributee_access` (
  `Document_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distributee_access`
--

INSERT INTO `distributee_access` (`Document_id`, `User_id`) VALUES
(1, 2),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `Author_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `fileURL` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'draft',
  `initialDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains information for the user''s documents.';

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `Author_id`, `name`, `comment`, `fileURL`, `status`, `initialDate`, `activationDate`) VALUES
(1, 1, 'Testdoc.doc', 'A Comment', '', 'archived', '2017-04-13 08:56:26', '2017-04-13 09:22:00'),
(7, 1, 'Holiday Policy', 'Company holiday policy issued to all Employees', '../file directory/Holiday Policy.doc/', 'draft', '2017-04-13 09:46:58', '2017-04-13 09:59:24'),
(8, 1, 'New Start Form', 'New Start Form', '../file directory/New Start Form.doc/', 'archived', '2017-04-13 10:02:28', '2017-04-13 10:02:28'),
(9, 1, 'New Start Contract', 'Terms and conditions of Employment', '../file directory/New Start Contract.gdoc/', 'draft', '2017-04-13 10:02:59', '2017-04-13 10:02:59'),
(10, 2, 'Holiday Request Form', 'Staff Holiday Request Form', '../file directory/Holiday Request Form.xlsx/', 'draft', '2017-04-13 10:03:25', '2017-04-13 10:03:25'),
(11, 1, 'Office Induction', 'New Start Office Induction Form', '../file directory/Office Induction.doc/', 'archived', '2017-04-13 10:05:05', '2017-04-13 10:05:05'),
(12, 2, 'Desk Space Setup', 'A Quick Intro to Setting up Desk Space and using Computer for the First Time', '../file directory/Desk Space Setup.txt/', 'draft', '2017-04-13 10:06:51', '2017-04-13 10:06:51'),
(13, 2, 'index', 'A HTML Homepage Template for setting up a Web Project', '../file directory/index.html/', 'draft', '2017-04-13 10:07:48', '2017-04-13 10:07:48'),
(14, 1, 'stylesheet', 'A CSS Template for setting up a Web Project', '../file directory/stylesheet.css/', 'draft', '2017-04-13 10:08:35', '2017-04-13 10:08:35'),
(15, 1, 'connection', 'A PHP Template Connection to the Local Database when Developing a Project', '../file directory/connection.php/', 'draft', '2017-04-13 10:09:54', '2017-04-13 10:09:54'),
(16, 3, 'Five A Side', 'Five a Side Football Signup Sheet', '../file directory/Five A Side.xlsx/', 'draft', '2017-04-13 10:12:42', '2017-04-13 10:12:42'),
(17, 4, 'Fantasy Rugby Team', 'Form for the Office Fantasy Rugby Contest', '../file directory/Fantasy Rugby Team.xlsx/', 'draft', '2017-04-13 10:13:21', '2017-04-13 10:13:21'),
(18, 3, 'Staff Night Out', 'Suggestions of Dates and Locations for the Staff Night Out', '../file directory/Staff Night Out.xlsx/', 'draft', '2017-04-13 10:14:52', '2017-04-13 10:14:52'),
(19, 1, 'index.php', '', '../file directory/../file directory/index.php/', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'Holiday Policy 1', 'Holiday Policy for new starts', '../file directory/Holiday Policy 1.doc/', 'active', '2017-04-13 11:05:42', '2017-04-13 11:06:23'),
(21, 1, 's1 report 1.docx', '', '../file directory/../file directory/s1 report 1.docx/', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `userId`, `message`) VALUES
(2, 4, 'You have been added as a distributee to the document with id: 7');

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `Document_id` int(11) NOT NULL,
  `isDraft` tinyint(4) NOT NULL DEFAULT '1',
  `revision_uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filePath` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`id`, `Document_id`, `isDraft`, `revision_uploadDate`, `filePath`) VALUES
(1, 7, 1, '2017-04-13 09:47:22', ''),
(4, 7, 1, '2017-04-13 09:51:00', '../file directory/Holiday Policy.doc/Holiday '),
(5, 7, 1, '2017-04-13 09:51:10', '../file directory/Holiday Policy.doc/Holiday '),
(6, 7, 1, '2017-04-13 09:53:02', '../file directory/Holiday Policy.doc/Holiday '),
(7, 19, 1, '0000-00-00 00:00:00', '../file directory/../file directory/index.php'),
(8, 7, 1, '2017-04-13 11:22:32', '../file directory/Holiday Policy.doc/Holiday ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `forename` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password_hash` varchar(45) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `forename`, `surname`, `email`, `username`, `password_hash`, `isActive`, `isAdmin`, `registerDate`) VALUES
(1, 'Alan Thomas', 'Moore', 'amoore204@caledonian.ac.uk', 'amoore204', 'P455w0rd', 1, 1, '2017-04-13 08:51:56'),
(2, 'Will', 'Brett', 'wbrett200@caledonian.ac.uk', 'wbrett200', 'Password', 1, 1, '0000-00-00 00:00:00'),
(3, 'David', 'Burnett', 'dburn201@caledonian.ac.uk', 'dburn201', 'Password', 1, 0, '0000-00-00 00:00:00'),
(4, 'Andreas', 'Tzyrkalli', 'atzyrk200@caledonian.ac.uk', 'atzyrk200', 'Password', 1, 0, '0000-00-00 00:00:00'),
(5, 'Scott', 'Brunton', 'sbrunt200@caledonian.ac.uk', 'sbrunt200', 'Password', 1, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributee_access`
--
ALTER TABLE `distributee_access`
  ADD PRIMARY KEY (`Document_id`,`User_id`),
  ADD KEY `fk_Document_has_User_User1_idx` (`User_id`),
  ADD KEY `fk_Document_has_User_Document_idx` (`Document_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`,`Author_id`),
  ADD KEY `fk_Document_User1_idx` (`Author_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`,`Document_id`),
  ADD KEY `fk_Revision_Document1_idx` (`Document_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `distributee_access`
--
ALTER TABLE `distributee_access`
  ADD CONSTRAINT `fk_Document_has_User_Document` FOREIGN KEY (`Document_id`) REFERENCES `document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Document_has_User_User1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_Document_User1` FOREIGN KEY (`Author_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `fk_Revision_Document1` FOREIGN KEY (`Document_id`) REFERENCES `document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
