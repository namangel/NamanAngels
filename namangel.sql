-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 02:00 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `namangel`
--

-- --------------------------------------------------------

--
-- Table structure for table `inv_addetails`
--

CREATE TABLE `inv_addetails` (
  `InvID` int(20) NOT NULL,
  `IOI` varchar(200) DEFAULT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `LinkedIn` varchar(200) DEFAULT NULL,
  `Instagram` varchar(200) DEFAULT NULL,
  `Role` varchar(200) DEFAULT NULL,
  `Partner` varchar(200) DEFAULT NULL,
  `InvRange` varchar(200) DEFAULT NULL,
  `Summary` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_addetails`
--

INSERT INTO `inv_addetails` (`InvID`, `IOI`, `Facebook`, `Twitter`, `LinkedIn`, `Instagram`, `Role`, `Partner`, `InvRange`, `Summary`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_details`
--

CREATE TABLE `inv_details` (
  `InvID` int(20) NOT NULL,
  `CName` varchar(200) NOT NULL,
  `FName` varchar(200) NOT NULL,
  `LName` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `State` varchar(200) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `AvgInvestment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_details`
--

INSERT INTO `inv_details` (`InvID`, `CName`, `FName`, `LName`, `Email`, `Phone`, `Website`, `City`, `State`, `Country`, `AvgInvestment`) VALUES
(1, 'Stark Enterprise', 'Tony', 'Stark', 'tony@stark.in', '9999999999', 'stark.in', 'New York City', 'Manhattan', 'United States', '100');

-- --------------------------------------------------------

--
-- Table structure for table `inv_group`
--

CREATE TABLE `inv_group` (
  `ID` int(50) NOT NULL,
  `InvID` int(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Designation` varchar(200) NOT NULL,
  `Experience` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_previnvestment`
--

CREATE TABLE `inv_previnvestment` (
  `ID` int(50) NOT NULL,
  `InvID` int(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Year` varchar(200) NOT NULL,
  `Amount` varchar(200) NOT NULL,
  `Stage` varchar(200) NOT NULL,
  `Stake` varchar(200) NOT NULL,
  `Website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_uploads`
--

CREATE TABLE `inv_uploads` (
  `InvID` int(20) NOT NULL,
  `ProfilePic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_uploads`
--

INSERT INTO `inv_uploads` (`InvID`, `ProfilePic`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `InvID` int(20) NOT NULL,
  `MemID` varchar(20) NOT NULL,
  `StDate` date NOT NULL,
  `ExpDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `ReqID` int(10) NOT NULL,
  `Inv_ID` varchar(20) NOT NULL,
  `St_ID` varchar(20) NOT NULL,
  `Deal` binary(1) NOT NULL DEFAULT '\0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_addetails`
--

CREATE TABLE `st_addetails` (
  `StpID` int(20) NOT NULL,
  `Stage` varchar(200) DEFAULT NULL,
  `DOF` varchar(200) DEFAULT NULL,
  `EmpNum` varchar(200) DEFAULT NULL,
  `IncType` varchar(200) DEFAULT NULL,
  `LinkedIn` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Instagram` varchar(200) DEFAULT NULL,
  `Youtube` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_addetails`
--

INSERT INTO `st_addetails` (`StpID`, `Stage`, `DOF`, `EmpNum`, `IncType`, `LinkedIn`, `Twitter`, `Facebook`, `Instagram`, `Youtube`) VALUES
(1, 'Prototype ready', '2014-12-12', '12', 'LLP', 'spacex/linkedin', 'spacex/twitter', 'spacex/fb', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `st_advisors`
--

CREATE TABLE `st_advisors` (
  `ID` int(50) NOT NULL,
  `StpID` int(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_advisors`
--

INSERT INTO `st_advisors` (`ID`, `StpID`, `Name`, `Email`) VALUES
(1, 1, 'Nick Fury', 'nick@shield.com');

-- --------------------------------------------------------

--
-- Table structure for table `st_description`
--

CREATE TABLE `st_description` (
  `StpID` int(20) NOT NULL,
  `Summary` varchar(500) DEFAULT NULL,
  `OLP` varchar(200) DEFAULT NULL,
  `CustomerProblem` varchar(500) DEFAULT NULL,
  `ProductService` varchar(500) DEFAULT NULL,
  `TargetMarket` varchar(500) DEFAULT NULL,
  `BusinessModel` varchar(500) DEFAULT NULL,
  `MarketSizing` varchar(500) DEFAULT NULL,
  `CustomerSegments` varchar(500) DEFAULT NULL,
  `SaleMarketStrat` varchar(500) DEFAULT NULL,
  `Competitors` varchar(500) DEFAULT NULL,
  `CompAdvantage` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_description`
--

INSERT INTO `st_description` (`StpID`, `Summary`, `OLP`, `CustomerProblem`, `ProductService`, `TargetMarket`, `BusinessModel`, `MarketSizing`, `CustomerSegments`, `SaleMarketStrat`, `Competitors`, `CompAdvantage`) VALUES
(1, 'Space X is an awesome project', 'Lets go to Mars', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `st_details`
--

CREATE TABLE `st_details` (
  `StpID` int(20) NOT NULL,
  `Stname` varchar(200) NOT NULL,
  `Ffname` varchar(200) NOT NULL,
  `Sfname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `State` varchar(200) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `Investment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_details`
--

INSERT INTO `st_details` (`StpID`, `Stname`, `Ffname`, `Sfname`, `Email`, `Phone`, `Type`, `Address`, `City`, `State`, `Country`, `Website`, `Investment`) VALUES
(1, 'Spacex', 'Elon Musk', 'Bill Gates', 'spacex@spx.com', '8169163192', 'Technology', 'Near Launch Pad', 'CC', 'Florida', 'United States', 'spacex.com', '100000000');

-- --------------------------------------------------------

--
-- Table structure for table `st_previnvestment`
--

CREATE TABLE `st_previnvestment` (
  `ID` int(50) NOT NULL,
  `StpID` int(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_previnvestment`
--

INSERT INTO `st_previnvestment` (`ID`, `StpID`, `Name`, `Email`) VALUES
(0, 1, 'ABC', 'abc12@123.com');

-- --------------------------------------------------------

--
-- Table structure for table `st_team`
--

CREATE TABLE `st_team` (
  `ID` int(50) NOT NULL,
  `StpID` int(20) NOT NULL,
  `FName` varchar(200) NOT NULL,
  `LName` varchar(200) NOT NULL,
  `Designation` varchar(200) NOT NULL,
  `Experience` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `LinkedIn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_team`
--

INSERT INTO `st_team` (`ID`, `StpID`, `FName`, `LName`, `Designation`, `Experience`, `Email`, `LinkedIn`) VALUES
(1, 1, 'Tony', 'Stark', 'Cap', '5', 'tony@stark.com', 'tony/in');

-- --------------------------------------------------------

--
-- Table structure for table `st_uploads`
--

CREATE TABLE `st_uploads` (
  `StpID` int(20) NOT NULL,
  `Logo` varchar(200) DEFAULT NULL,
  `BackImg` varchar(200) DEFAULT NULL,
  `PitchName` varchar(200) DEFAULT NULL,
  `PitchExt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_uploads`
--

INSERT INTO `st_uploads` (`StpID`, `Logo`, `BackImg`, `PitchName`, `PitchExt`) VALUES
(1, '‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0È\0\0\0È\0\0\0­X®ž\0\0\0sRGB\0®Îé\0\0\0gAMA\0\0±üa\0\0¹IDATx^íO¬ÕÇ¯]¶ÐºAI±uQc]@¬&>ãŸ‰>¶òGW”<S\ZB4Ê‚°x\r1jÔøBYñ×ey˜¸‰ÏDK \r‚&¸ ÂƒnZE·ö~î›Sî½ofîü93sþ|?	¹s_+¼{g>ç÷çœ9sÃ/}zBˆT~•¼\n!R Bä ', '‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0,\0\0,\0\0\0y}Žu\0\0\0sBIT|dˆ\0\0 \0IDATxœì½w|×u÷ý;÷ÎlÁ¢\0AØÅN±‰IQ©JJ²lKrW\'í<¶ûu\\’øIüÚñ“8‰SÞÇ=’e‘²å¸;²%YÅê¢\Z%ö\0ÑûÖ™{Þ?fw±($±À.¶à~?Zír¶]ìÌüæœsÏ=Ðh4\ZF£Ñh4\ZF£Ñh4\ZF£Ñh4\ZF£Ñ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userinv`
--

CREATE TABLE `userinv` (
  `InvID` int(20) NOT NULL,
  `MemID` varchar(20) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinv`
--

INSERT INTO `userinv` (`InvID`, `MemID`, `Username`, `Password`) VALUES
(1, '', 'xyz123', '5f2b8374d197548aa0c1bd765ffc3464605cf51c');

-- --------------------------------------------------------

--
-- Table structure for table `userstp`
--

CREATE TABLE `userstp` (
  `StpID` int(20) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstp`
--

INSERT INTO `userstp` (`StpID`, `Username`, `Password`) VALUES
(1, 'abc123', '370194ff6e0f93a7432e16cc9badd9427e8b4e13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inv_addetails`
--
ALTER TABLE `inv_addetails`
  ADD PRIMARY KEY (`InvID`);

--
-- Indexes for table `inv_details`
--
ALTER TABLE `inv_details`
  ADD PRIMARY KEY (`InvID`);

--
-- Indexes for table `inv_group`
--
ALTER TABLE `inv_group`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inv_previnvestment`
--
ALTER TABLE `inv_previnvestment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inv_uploads`
--
ALTER TABLE `inv_uploads`
  ADD PRIMARY KEY (`InvID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`InvID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ReqID`);

--
-- Indexes for table `st_addetails`
--
ALTER TABLE `st_addetails`
  ADD PRIMARY KEY (`StpID`);

--
-- Indexes for table `st_advisors`
--
ALTER TABLE `st_advisors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `st_description`
--
ALTER TABLE `st_description`
  ADD PRIMARY KEY (`StpID`);

--
-- Indexes for table `st_details`
--
ALTER TABLE `st_details`
  ADD PRIMARY KEY (`StpID`);

--
-- Indexes for table `st_previnvestment`
--
ALTER TABLE `st_previnvestment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `st_team`
--
ALTER TABLE `st_team`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `st_uploads`
--
ALTER TABLE `st_uploads`
  ADD PRIMARY KEY (`StpID`);

--
-- Indexes for table `userinv`
--
ALTER TABLE `userinv`
  ADD PRIMARY KEY (`InvID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `userstp`
--
ALTER TABLE `userstp`
  ADD PRIMARY KEY (`StpID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inv_group`
--
ALTER TABLE `inv_group`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ReqID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `st_advisors`
--
ALTER TABLE `st_advisors`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `st_team`
--
ALTER TABLE `st_team`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinv`
--
ALTER TABLE `userinv`
  MODIFY `InvID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userstp`
--
ALTER TABLE `userstp`
  MODIFY `StpID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
