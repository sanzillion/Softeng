-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 02:58 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `bulletin`
--

CREATE TABLE `bulletin` (
  `id` int(11) NOT NULL,
  `imgname` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `m_id` int(11) NOT NULL,
  `description` varchar(11) NOT NULL,
  `m_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`m_id`, `description`, `m_date`) VALUES
(15, 'Meet1', '2017-02-09'),
(16, 'Meet2', '2017-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `r_id` int(2) NOT NULL,
  `name` varchar(11) NOT NULL,
  `dates` date NOT NULL,
  `time` time NOT NULL,
  `day` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`r_id`, `name`, `dates`, `time`, `day`) VALUES
(395, 'admin', '2017-02-19', '21:51:51', 'Sunday'),
(396, 'admin', '2017-02-19', '22:46:01', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `sanction`
--

CREATE TABLE `sanction` (
  `sanc_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `Meet1` varchar(11) NOT NULL,
  `Meet2` varchar(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanction`
--

INSERT INTO `sanction` (`sanc_id`, `s_name`, `Meet1`, `Meet2`, `total`) VALUES
(153, 'existsShelly Elmore', '15', '50', 65),
(154, 'Charolette Erben', '15', '20', 35),
(155, 'Shirely Defazio', '15', '50', 65),
(156, 'Xiao Heilmann', '15', 'PRESENT', 15),
(157, 'Cheryll Tardugno', '15', '20', 35),
(158, 'Silvana Grainger', '15', '15', 30),
(159, 'Kevin Florentino', '15', '15', 30),
(160, 'Salvatore Jeanlouis', '15', '15', 30),
(161, 'Donella Weidemann', '15', '15', 30),
(162, 'Brenna Bob', '15', '15', 30),
(163, 'Archie Geisel', '15', '15', 30),
(164, 'Belia Counts', '15', '15', 30),
(165, 'Mahalia Buschman', '20', '15', 35),
(166, 'Rosaria Timko', '15', '15', 30),
(167, 'Zaida Segundo', '15', '15', 30),
(168, 'Basilia Guptill', '15', '15', 30),
(169, 'Nickole Rimmer', '15', '20', 35),
(170, 'Lorriane Schultz', '20', '15', 35),
(171, 'Tyler Cipolla', '15', '20', 35),
(172, 'Kia Badon', '15', '15', 30),
(173, 'Sadye Yager', '15', '15', 30),
(174, 'Dyan Leary', '15', '15', 30),
(175, 'Tamisha Raffa', '15', 'CLEARED', 15),
(176, 'Aurora Schulman', '20', 'PRESENT', 20),
(177, 'Gloria Murtha', '15', '15', 30),
(178, 'Angila Dimuzio', '15', '15', 30),
(179, 'Annette Garraway', '15', '15', 30),
(180, 'Marylynn Romberg', '15', '15', 30),
(181, 'Rocky Shawver', '15', '15', 30),
(182, 'Yasmine Ebert', '15', '15', 30),
(183, 'Vernell Pyles', '15', 'PRESENT', 15),
(184, 'Mika Grey', '15', '20', 35),
(185, 'Ok Mulford', '20', '15', 35),
(186, 'Guadalupe Epling', '15', '15', 30),
(187, 'Alvina Friedman', '15', '15', 30),
(188, 'Cherryl Edlin', '15', '20', 35),
(189, 'Alonzo Munns', '20', '50', 70),
(190, 'Loree Kiely', '20', '15', 35),
(191, 'Sibyl Gloor', '15', 'PRESENT', 15),
(192, 'Valeria Petrin', 'PRESENT', '15', 15),
(193, 'Ludie Teal', '15', '15', 30),
(194, 'Yolando Pecor', '15', '15', 30),
(195, 'Alysia Harton', 'CLEARED', 'CLEARED', 0),
(196, 'Anjanette Brook', '15', 'PRESENT', 15),
(198, 'Laurinda Broadnax', '15', '15', 30),
(199, 'Jessie Bundick', '15', '15', 30),
(200, 'Larry Rodriques', '20', '15', 35),
(201, 'Chana Villagomez', '20', '15', 35),
(202, 'Juana Hadley', '15', '15', 30),
(203, 'Adena Shoop', '100', '15', 115);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` enum('1st','2nd','3rd','4th') NOT NULL,
  `cpnum` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `year`, `cpnum`) VALUES
(382, 'existsShelly Elmore', '1st', 639424000000),
(383, 'Charolette Erben', '1st', 639424000000),
(384, 'Shirely Defazio', '1st', 639424000000),
(385, 'Xiao Heilmann', '1st', 639424000000),
(386, 'Cheryll Tardugno', '1st', 639424000000),
(387, 'Silvana Grainger', '1st', 639424000000),
(388, 'Kevin Florentino', '1st', 639424000000),
(389, 'Salvatore Jeanlouis', '1st', 639424000000),
(390, 'Donella Weidemann', '1st', 639424000000),
(391, 'Brenna Bob', '1st', 639424000000),
(392, 'Archie Geisel', '1st', 639424000000),
(393, 'Belia Counts', '1st', 639424000000),
(394, 'Mahalia Buschman', '1st', 639424000000),
(395, 'Rosaria Timko', '1st', 639424000000),
(396, 'Zaida Segundo', '1st', 639424000000),
(397, 'Basilia Guptill', '1st', 639424000000),
(398, 'Nickole Rimmer', '1st', 639424000000),
(399, 'Lorriane Schultz', '2nd', 639424000000),
(400, 'Tyler Cipolla', '2nd', 639424000000),
(401, 'Kia Badon', '2nd', 639424000000),
(402, 'Sadye Yager', '2nd', 639424000000),
(403, 'Dyan Leary', '2nd', 639424000000),
(404, 'Tamisha Raffa', '2nd', 639424000000),
(405, 'Aurora Schulman', '2nd', 639424000000),
(406, 'Gloria Murtha', '2nd', 639424000000),
(407, 'Angila Dimuzio', '2nd', 639424000000),
(408, 'Annette Garraway', '2nd', 639424000000),
(409, 'Marylynn Romberg', '2nd', 639424000000),
(410, 'Rocky Shawver', '2nd', 639424000000),
(411, 'Yasmine Ebert', '2nd', 639424000000),
(412, 'Vernell Pyles', '2nd', 639424000000),
(413, 'Mika Grey', '2nd', 639424000000),
(414, 'Ok Mulford', '3rd', 639424000000),
(415, 'Guadalupe Epling', '3rd', 639424000000),
(416, 'Alvina Friedman', '3rd', 639424000000),
(417, 'Cherryl Edlin', '3rd', 639424000000),
(418, 'Alonzo Munns', '3rd', 639424000000),
(419, 'Loree Kiely', '3rd', 639424000000),
(420, 'Sibyl Gloor', '3rd', 639424000000),
(421, 'Valeria Petrin', '3rd', 639424000000),
(422, 'Ludie Teal', '3rd', 639424000000),
(423, 'Yolando Pecor', '3rd', 639424000000),
(424, 'Alysia Harton', '4th', 639424000000),
(425, 'Anjanette Brook', '4th', 639424000000),
(426, 'Adena Shoop', '4th', 639424000000),
(427, 'Laurinda Broadnax', '4th', 639424000000),
(428, 'Jessie Bundick', '4th', 639424000000),
(429, 'Larry Rodriques', '4th', 639424000000),
(430, 'Chana Villagomez', '4th', 639424000000),
(431, 'Juana Hadley', '4th', 639424000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sanction`
--
ALTER TABLE `sanction`
  ADD PRIMARY KEY (`sanc_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `r_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
--
-- AUTO_INCREMENT for table `sanction`
--
ALTER TABLE `sanction`
  MODIFY `sanc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
