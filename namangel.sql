-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 05:11 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(20) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `AdminDesgn` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `AdminName`, `AdminDesgn`, `Username`, `Password`, `ProfilePic`) VALUES
(1, 'Deep', 'CTO', 'admin', 'admin12345', '/NamanAngels_Admin/Uploads/ProfilePic2.png');

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
-- Table structure for table `namanteam`
--

CREATE TABLE `namanteam` (
  `image` varchar(200) DEFAULT NULL,
  `member_link` varchar(25) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `sr_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `namanteam`
--

INSERT INTO `namanteam` (`image`, `member_link`, `member_name`, `description`, `sr_no`) VALUES
('\\NamanAngels\\include\\img\\team\\shweta-shalini.png', 'link1', 'Shweta Shalini', 'Official Spokesperson - Bhartiya Janta Party | Chief Evangelist - The Billennium Divas Thought Leade', 1),
('\\NamanAngels\\include\\img\\team\\miten-mehta.png', 'link2', 'Miten Mehta', 'Co-Founder of Spinta Global Accelerato', 2),
('\\NamanAngels\\include\\img\\team\\sandeep-sehgal.png', 'link3', 'Sandeep Sehgal', 'CEO and Co-Founder of Global ScaleUp | HQ in Singapore', 3),
('\\NamanAngels\\include\\img\\team\\nilesh-gandhi.png', 'link4', 'Nilesh Gandhi', 'Managing Director at Unid Finance Consultancy Pvt. Ltd.', 4),
('\\NamanAngels\\include\\img\\team\\tapaswi-patel.png', 'link5', 'Tapaswi Patel', 'Serial Entrepreneur Startup Investor Founder: Naman Angels India Foundation, ZoomStart India', 5),
('\\NamanAngels\\include\\img\\team\\dinesh-israni.png', 'link6', 'Dinesh Israni', 'Co-Founder | CEO ', 6),
('\\NamanAngels\\include\\img\\team\\bhavesh-kothari.png', 'link7', 'Bhavesh Kothari', 'Co-Founder | CBO ', 7),
('\\NamanAngels\\include\\img\\team\\ankit-buti.png', 'link8', 'Ankit Buti', 'Entrepreneur in Residence with NAMAN Angels India Foundation | Founder & CEO at StartupEd', 8),
('\\NamanAngels\\include\\img\\team\\pratik-lalani.png', 'link', 'Pratik Lalani', 'Principal Evangelist', 9),
('\\NamanAngels\\include\\img\\team\\purvang-joshi.png', 'link', 'Purvang Joshi', 'Principal Evangelist', 10),
('\\NamanAngels\\include\\img\\team\\deep-patel.png', 'link11', 'Deep Patel', 'Principal Evangelist', 11),
('\\NamanAngels\\include\\img\\team\\sonali-shah.png', 'link12', 'Sonali Shah', 'Design & Marketing Support', 12),
('\\NamanAngels\\include\\img\\team\\bharti-keswani.png', 'link', 'Bharti Keswani', 'Financial Analyst', 13),
('\\NamanAngels\\include\\img\\team\\harsha-therani.png', 'link13', 'Harsha Therani', 'Financial Analyst', 14),
('\\NamanAngels\\include\\img\\team\\sunny-tiwari.png', 'link', 'Sunny Tiwari', 'Financial Analyst', 15),
('\\NamanAngels\\include\\img\\team\\yash-thakkar.png', 'link', 'Yash Thakkar', 'Investment Fund Manager', 16),
('\\NamanAngels\\include\\img\\team\\nikita-tilak.png', 'link', 'Nikita Tilak', 'Investment Fund Manager', 17),
('\\NamanAngels\\include\\img\\team\\vidisha.png', 'link', 'Vidisha Dholkhedia', 'Digital Marketing', 18);

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile`
-- (See below for the actual view)
--
CREATE TABLE `profile` (
`StpID` int(20)
,`StpImg` varchar(200)
,`StpName` varchar(200)
,`FName` varchar(200)
,`SName` varchar(200)
,`Type` varchar(200)
);

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

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`ReqID`, `Inv_ID`, `St_ID`, `Deal`) VALUES
(1, '1', '1', 0x00),
(2, '1', '1', 0x00),
(3, '1', '1', 0x00);

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
  `PitchExt` varchar(10) DEFAULT NULL,
  `BPlan` varchar(200) DEFAULT NULL,
  `BPlanExt` varchar(200) DEFAULT NULL,
  `FProjection` varchar(200) DEFAULT NULL,
  `FProjectionExt` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_uploads`
--

INSERT INTO `st_uploads` (`StpID`, `Logo`, `BackImg`, `PitchName`, `PitchExt`, `BPlan`, `BPlanExt`, `FProjection`, `FProjectionExt`) VALUES
(1, '/NamanAngels/Uploads/ProfilePic.png', '/NamanAngels/Uploads/download.jpg', 'naman-todo.pdf', 'pdf', 'naman-todo.pdf', 'pdf', 'Aayush Singh.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tool_id` int(50) NOT NULL,
  `tl_name` varchar(200) NOT NULL,
  `tl_img` varchar(200) NOT NULL,
  `tl_cost` varchar(200) NOT NULL,
  `tl_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tl_name`, `tl_img`, `tl_cost`, `tl_desc`) VALUES
(1, 'Tool1', '/NamanAngels/Uploads/Tools.jpg', '100', 'Tool1 Description\r\n Hello World 1\r\n ABC  1\r\n'),
(2, 'Tool2', '/NamanAngels/Uploads/Tools.jpg', '200', 'Tool2 Description\r\n Hello World 2\r\n ABC  2'),
(3, 'Tool3', '/NamanAngels/Uploads/Tools.jpg', '300', 'Tool3 Description\r\n Hello World 3\r\n ABC  3'),
(4, 'Tool4', '/NamanAngels/Uploads/Tools.jpg', '400', 'Tool4 Description\r\n Hello World 4\r\n ABC  4'),
(5, 'Tool5', '/NamanAngels/Uploads/Tools.jpg', '500', 'Tool5 Description\r\n Hello World 5\r\n ABC  5'),
(6, 'Tool6', '/NamanAngels/Uploads/Tools.jpg', '600', 'Tool6 Description\r\n Hello World 6\r\n ABC  6');

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

-- --------------------------------------------------------

--
-- Structure for view `profile`
--
DROP TABLE IF EXISTS `profile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile`  AS  select `a`.`StpID` AS `StpID`,`a`.`Logo` AS `StpImg`,`b`.`Stname` AS `StpName`,`b`.`Ffname` AS `FName`,`b`.`Sfname` AS `SName`,`b`.`Type` AS `Type` from (`st_uploads` `a` join `st_details` `b`) where (`a`.`StpID` = `b`.`StpID`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `Username` (`Username`);

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
-- Indexes for table `namanteam`
--
ALTER TABLE `namanteam`
  ADD PRIMARY KEY (`sr_no`);

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
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inv_group`
--
ALTER TABLE `inv_group`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `namanteam`
--
ALTER TABLE `namanteam`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ReqID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
