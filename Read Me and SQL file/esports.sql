-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 09:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaiwah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `ADMIN_ID` varchar(11) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `ADMIN_NAME` varchar(35) NOT NULL,
  `NRIC_NO` varchar(15) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `GENDER` varchar(7) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`ADMIN_ID`, `PASSWORD`, `ADMIN_NAME`, `NRIC_NO`, `BIRTHDAY`, `GENDER`, `EMAIL`, `ADDRESS`, `image_url`) VALUES
('21WMD00346', 'fungpin123', 'Soong Fung Pin', '000123-10-2031', '2000-03-30', 'MALE', 'soongfp-wm21@student.tarc.edu', 'no 5 lorongmasira 5 tbr lengzai', 'IMG-6330818e26c8f1.49808802.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `annoucement`
--

CREATE TABLE `annoucement` (
  `content` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `id` int(2) NOT NULL,
  `title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annoucement`
--

INSERT INTO `annoucement` (`content`, `date`, `admin_id`, `id`, `title`) VALUES
('However, the “super team” didn\'t live long. With the most important tournaments of the year coming up it’s time to clutch, demolish and conquer. As we', '2022-09-29', 'My Family', 1, 'R6 ROSTER UPDATE: WELCOME G2 FABIAN & BLURR'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porttitor auctor commodo. Quisque ac velit consectetur, mollis nulla quis, cursus ligu', '2022-09-25', 'Vice President', 2, 'Covid-19 SOP Guideline');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(3) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `booking_date` date NOT NULL,
  `teamName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_name` varchar(60) NOT NULL,
  `game_name` varchar(20) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` varchar(300) NOT NULL,
  `price_pool` float NOT NULL,
  `event_venue` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_name`, `game_name`, `event_date`, `event_description`, `price_pool`, `event_venue`) VALUES
('Candy Crush', 'Valorant', '2022-11-05', 'Candy Crush is for everyone to play especially auntie like lee kar xin ', 100, 'Axiata Arena'),
('League Of Legends: Hello World', 'League of Legends', '2022-10-29', 'The League of Legends Hello World Championship is the annual professional League of Legends world championship tournament hosted by Riot Games and is the culmination of each season. Teams compete for the champion title, the 70-pound Summoner\'s Cup, and an RM30,000 championship prize.', 30000, 'Spodek Arena'),
('Mobile Legends: Bang Bang Sout', 'Mobile Legends', '2022-10-08', 'The Mobile Legends: Bang Bang Southeast Asia Cup 2022 (MSC) will be held in Kuala Lumpur, Malaysia for the first time. Twelve teams will compete for the prestigious title of Southeast Asia\'s top squad and the lion\'s share of the MYR 10,000 prize pool! \r\n\r\n', 10000, 'CyberSport Arena'),
('PUBG MOBILE City Tournament 2022: Malaysia', 'PUBG', '2022-11-04', 'The tournament is divided into 3 categories; Squads, Solo & Ladies\r\n\r\nSquads and Solo categories are divided into 4 zones; Central, North, South & Borneo.\r\n', 4000, 'Jinyun Culture Stadi'),
('Selangor Cyber Games 2020', 'Valorant', '2022-11-12', 'Qualifier Finals: April 8th, 2019\r\n16 teams\r\n4 matches\r\nThe top 8 teams proceed to Grand Finals.', 15000, 'Mariynskiy Park');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `StudentID` char(10) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Gender` char(5) NOT NULL,
  `Age` int(11) NOT NULL,
  `Program` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberName`, `Email`, `StudentID`, `Password`, `Gender`, `Age`, `Program`) VALUES
('wonglengzai', 'leiahma@gmail.com', '21WMD04035', '123456', 'M', 20, 'FT');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamName` varchar(30) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `player1Name` varchar(30) NOT NULL,
  `player2Name` varchar(30) NOT NULL,
  `player3Name` varchar(30) NOT NULL,
  `player4Name` varchar(30) NOT NULL,
  `player5Name` varchar(30) NOT NULL,
  `player1IC` varchar(30) NOT NULL,
  `player2IC` varchar(30) NOT NULL,
  `player3IC` varchar(30) NOT NULL,
  `player4IC` varchar(30) NOT NULL,
  `player5IC` varchar(30) NOT NULL,
  `studentID` varchar(30) NOT NULL,
  `game_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `annoucement`
--
ALTER TABLE `annoucement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_name`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annoucement`
--
ALTER TABLE `annoucement`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
