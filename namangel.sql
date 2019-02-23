-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 02:01 PM
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
  `ProfilePic` varchar(200) DEFAULT 'uploads/default/default.png	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `AdminName`, `AdminDesgn`, `Username`, `Password`, `ProfilePic`) VALUES
(1, 'Deepali', 'CEO', 'admin', 'admin12345', 'uploads/admin/Deepali_ProfilePic2.png');

-- --------------------------------------------------------

--
-- Table structure for table `annual_financial`
--

CREATE TABLE `annual_financial` (
  `StpID` int(20) NOT NULL,
  `revenue_rate` int(20) NOT NULL,
  `burn_rate` int(20) NOT NULL,
  `financial_annotation` varchar(200) NOT NULL,
  `revenue_driver` varchar(200) NOT NULL,
  `sales` int(30) NOT NULL,
  `revenue` int(30) NOT NULL,
  `expenditure` int(30) NOT NULL,
  `year` year(4) NOT NULL,
  `annual_fin_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annual_financial`
--

INSERT INTO `annual_financial` (`StpID`, `revenue_rate`, `burn_rate`, `financial_annotation`, `revenue_driver`, `sales`, `revenue`, `expenditure`, `year`, `annual_fin_ID`) VALUES
(1, 12, 11, 'sdda', 'ddf', 1, 21, 234, 2017, 1),
(1, 12, 11, 'sdda', 'ddf', 2, 123, 234, 2018, 2),
(1, 12, 11, 'sdda', 'ddf', 3, 123, 213, 2019, 3),
(1, 12, 11, 'sdda', 'ddf', 4, 123, 213, 2020, 4),
(1, 12, 11, 'sdda', 'ddf', 5, 123, 234, 2021, 5),
(1, 12, 11, 'sdda', 'ddf', 3, 123, 234, 2022, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cprofile`
-- (See below for the actual view)
--
CREATE TABLE `cprofile` (
`InvID` int(20)
,`CName` varchar(200)
,`FName` varchar(200)
,`WebLink` varchar(200)
,`LName` varchar(200)
,`AvgInv` varchar(200)
,`CImg` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `current_round`
--

CREATE TABLE `current_round` (
  `StpID` int(20) NOT NULL,
  `Round` varchar(30) NOT NULL,
  `Seeking` int(30) NOT NULL,
  `Security_type` varchar(30) NOT NULL,
  `Premoney_val` int(30) NOT NULL,
  `Val_cap` int(30) NOT NULL,
  `Conversion_disc` int(5) NOT NULL,
  `Interest_rate` int(5) NOT NULL,
  `Term_len` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_details`
--

CREATE TABLE `inv_details` (
  `InvID` int(20) NOT NULL,
  `CName` varchar(200) DEFAULT NULL,
  `FName` varchar(200) NOT NULL,
  `LName` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Website` varchar(200) DEFAULT NULL,
  `City` varchar(200) NOT NULL,
  `State` varchar(200) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `AvgInvestment` varchar(200) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_details`
--

INSERT INTO `inv_details` (`InvID`, `CName`, `FName`, `LName`, `Email`, `Phone`, `Website`, `City`, `State`, `Country`, `AvgInvestment`, `Type`) VALUES
(1, 'Stark Enterprise', 'Tony', 'Stark', 'tony@stark.in', '9999999999', 'stark.in', 'New York City', 'Manhattan', 'United States', '100', 'Institution'),
(4, NULL, 'Deepali', 'Panda', 'deepali4499@gmail.com', '8689922983', NULL, 'Mumbai', 'Maharashtra', 'India', '8', 'Individual');

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
  `ProfilePic` varchar(200) DEFAULT 'uploads/default/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_uploads`
--

INSERT INTO `inv_uploads` (`InvID`, `ProfilePic`) VALUES
(1, '	\r\nuploads/default/default.png'),
(2, '/NamanAngels/uploads/default/default.png'),
(3, '/NamanAngels/uploads/default/default.png'),
(4, '/NamanAngels/uploads/default/default.png');

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
  `SR` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Link` varchar(25) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Image` varchar(200) DEFAULT '/NamanAngels/uploads/default/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `namanteam`
--

INSERT INTO `namanteam` (`SR`, `Name`, `Link`, `Description`, `Image`) VALUES
(1, 'Shweta Shalini', 'link1', 'Official Spokesperson - Bhartiya Janta Party | Chief Evangelist - The Billennium Divas Thought Leade', '\\NamanAngels\\Uploads\\team\\shweta-shalini.png'),
(2, 'Miten Mehta', 'link2', 'Co-Founder of Spinta Global Accelerato', '\\NamanAngels\\Uploads\\team\\miten-mehta.png'),
(3, 'Sandeep Sehgal', 'link3', 'CEO and Co-Founder of Global ScaleUp | HQ in Singapore', '\\NamanAngels\\Uploads\\team\\sandeep-sehgal.png'),
(4, 'Nilesh Gandhi', 'link4', 'Managing Director at Unid Finance Consultancy Pvt. Ltd.', '\\NamanAngels\\Uploads\\team\\nilesh-gandhi.png'),
(5, 'Tapaswi Patel', 'link5', 'Serial Entrepreneur Startup Investor Founder: Naman Angels India Foundation, ZoomStart India', '\\NamanAngels\\Uploads\\team\\tapaswi-patel.png'),
(6, 'Dinesh Israni', 'link6', 'Co-Founder | CEO ', '\\NamanAngels\\Uploads\\team\\dinesh-israni.png'),
(7, 'Bhavesh Kothari', 'link7', 'Co-Founder | CBO ', '\\NamanAngels\\Uploads\\team\\bhavesh-kothari.png'),
(8, 'Ankit Buti', 'link8', 'Entrepreneur in Residence with NAMAN Angels India Foundation | Founder & CEO at StartupEd', '\\NamanAngels\\Uploads\\team\\ankit-buti.png'),
(9, 'Pratik Lalani', 'link', 'Principal Evangelist', '\\NamanAngels\\Uploads\\team\\pratik-lalani.png'),
(10, 'Purvang Joshi', 'link', 'Principal Evangelist', '\\NamanAngels\\Uploads\\team\\purvang-joshi.png'),
(11, 'Deep Patel', 'link11', 'Principal Evangelist', '\\NamanAngels\\Uploads\\team\\deep-patel.png'),
(12, 'Sonali Shah', 'link12', 'Design & Marketing Support', '\\NamanAngels\\Uploads\\team\\sonali-shah.png'),
(13, 'Bharti Keswani', 'link', 'Financial Analyst', '\\NamanAngels\\Uploads\\team\\bharti-keswani.png'),
(14, 'Harsha Therani', 'link13', 'Financial Analyst', '\\NamanAngels\\Uploads\\team\\harsha-therani.png'),
(15, 'Sunny Tiwari', 'link', 'Financial Analyst', '\\NamanAngels\\Uploads\\team\\sunny-tiwari.png'),
(16, 'Yash Thakkar', 'link', 'Investment Fund Manager', '\\NamanAngels\\Uploads\\team\\yash-thakkar.png'),
(17, 'Nikita Tilak', 'link', 'Investment Fund Manager', '\\NamanAngels\\Uploads\\team\\nikita-tilak.png'),
(18, 'Vidisha Dholkhedia', 'link', 'Digital Marketing', '\\NamanAngels\\Uploads\\team\\vidisha.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile`
-- (See below for the actual view)
--
CREATE TABLE `profile` (
`StpID` int(20)
,`StpName` varchar(200)
,`StpImg` varchar(200)
,`FName` varchar(200)
,`SName` varchar(200)
,`Type` varchar(200)
,`Verified` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `ReqID` int(10) NOT NULL,
  `Inv_ID` varchar(20) NOT NULL,
  `St_ID` varchar(20) NOT NULL,
  `Deal` binary(1) NOT NULL DEFAULT '\0',
  `Round` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`ReqID`, `Inv_ID`, `St_ID`, `Deal`, `Round`) VALUES
(4, '1', '1', 0x31, 'Friends and Family');

-- --------------------------------------------------------

--
-- Table structure for table `round_history`
--

CREATE TABLE `round_history` (
  `HistID` int(20) NOT NULL,
  `StpID` int(20) NOT NULL,
  `Round` varchar(30) NOT NULL,
  `Security_type` varchar(50) NOT NULL,
  `Capital_raised` int(30) NOT NULL,
  `Close_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round_history`
--

INSERT INTO `round_history` (`HistID`, `StpID`, `Round`, `Security_type`, `Capital_raised`, `Close_date`) VALUES
(1, 1, 'Founder', 'Preferred Equity', 3124, '2019-02-16'),
(2, 1, 'Friends and Family', 'Preferred Equity', 3124, '2019-02-23');

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
(1, 'Prototype ready', '2014-12-12', '12', 'LLP', 'spacex/linkedin', 'spacex/twitter', 'spacex/fb', NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 1, 'asdfghs', 'afg@gjs.com');

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
(1, 'Space X is an awesome project', 'Lets go to Mars', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'Spacex', 'Elon Musk', 'Bill Gates', 'spacex@spx.com', '8169163192', 'Technology', 'Near Launch Pad', 'CC', 'Florida', 'United States', 'spacex.com', '100000000'),
(4, 'akdbis', 'baiubai', 'bibiyv', 'qsbiab@in.in', '9090909090', 'B2B', 'vjh', 'jv', 'jv', 'Jamaica', 'vui.in', '1222');

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
(1, 1, 'ABC', 'abc12@123.com');

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
  `Expertise` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `LinkedIn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_uploads`
--

CREATE TABLE `st_uploads` (
  `StpID` int(20) NOT NULL,
  `Logo` varchar(200) DEFAULT 'uploads/default/default.png',
  `BackImg` varchar(200) DEFAULT 'uploads/default/defaultbackimg.jpg',
  `PitchName` varchar(200) DEFAULT NULL,
  `PitchExt` varchar(10) DEFAULT NULL,
  `BPlan` varchar(200) DEFAULT NULL,
  `BPlanExt` varchar(200) DEFAULT NULL,
  `FProjection` varchar(200) DEFAULT NULL,
  `FProjectionExt` varchar(200) DEFAULT NULL,
  `AdDocs` varchar(200) DEFAULT NULL,
  `AdDocsExt` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_uploads`
--

INSERT INTO `st_uploads` (`StpID`, `Logo`, `BackImg`, `PitchName`, `PitchExt`, `BPlan`, `BPlanExt`, `FProjection`, `FProjectionExt`, `AdDocs`, `AdDocsExt`) VALUES
(1, 'uploads/startup/Spacex_ProfilePic2.png', 'uploads/startup/Spacex_backimg_Spacex_backimg_Hero-5.jpg', 'uploads/startup/Spacex_pitch_VID-20181209-WA0003.mp4', 'mp4', 'uploads/startup/Spacex_bplan_naman-todo.pdf', 'pdf', 'uploads/startup/Spacex_fproj_Aayush Singh.pdf', 'pdf', NULL, NULL),
(4, '/NamanAngels/uploads/default/default.jpg', '/NamanAngels/uploads/default/defaultbackimg.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, '', 'xyz123', '5f2b8374d197548aa0c1bd765ffc3464605cf51c'),
(2, '', 'admin', '7fe54080e26dd169ccbffba947dbc5958e26ecea');

-- --------------------------------------------------------

--
-- Table structure for table `userstp`
--

CREATE TABLE `userstp` (
  `StpID` int(20) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Verified` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstp`
--

INSERT INTO `userstp` (`StpID`, `Username`, `Password`, `Verified`) VALUES
(1, 'abc123', '370194ff6e0f93a7432e16cc9badd9427e8b4e13', 1),
(4, 'vivi', 'ed42785ca24ae8fa2d9fd131401e44c3c86519ae', 1);

-- --------------------------------------------------------

--
-- Structure for view `cprofile`
--
DROP TABLE IF EXISTS `cprofile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cprofile`  AS  select `a`.`InvID` AS `InvID`,`a`.`CName` AS `CName`,`a`.`FName` AS `FName`,`a`.`Website` AS `WebLink`,`a`.`LName` AS `LName`,`a`.`AvgInvestment` AS `AvgInv`,`b`.`ProfilePic` AS `CImg` from (`inv_details` `a` join `inv_uploads` `b`) where (`a`.`InvID` = `b`.`InvID`) ;

-- --------------------------------------------------------

--
-- Structure for view `profile`
--
DROP TABLE IF EXISTS `profile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile`  AS  select `a`.`StpID` AS `StpID`,`b`.`Stname` AS `StpName`,`a`.`Logo` AS `StpImg`,`b`.`Ffname` AS `FName`,`b`.`Sfname` AS `SName`,`b`.`Type` AS `Type`,`c`.`Verified` AS `Verified` from ((`st_uploads` `a` join `st_details` `b`) join `userstp` `c`) where ((`a`.`StpID` = `c`.`StpID`) and (`b`.`StpID` = `c`.`StpID`)) ;

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
-- Indexes for table `annual_financial`
--
ALTER TABLE `annual_financial`
  ADD PRIMARY KEY (`annual_fin_ID`);

--
-- Indexes for table `current_round`
--
ALTER TABLE `current_round`
  ADD PRIMARY KEY (`StpID`);

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
  ADD PRIMARY KEY (`SR`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ReqID`);

--
-- Indexes for table `round_history`
--
ALTER TABLE `round_history`
  ADD PRIMARY KEY (`HistID`);

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
-- AUTO_INCREMENT for table `annual_financial`
--
ALTER TABLE `annual_financial`
  MODIFY `annual_fin_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inv_group`
--
ALTER TABLE `inv_group`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_previnvestment`
--
ALTER TABLE `inv_previnvestment`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `namanteam`
--
ALTER TABLE `namanteam`
  MODIFY `SR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ReqID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `round_history`
--
ALTER TABLE `round_history`
  MODIFY `HistID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `st_advisors`
--
ALTER TABLE `st_advisors`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `st_previnvestment`
--
ALTER TABLE `st_previnvestment`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `st_team`
--
ALTER TABLE `st_team`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userinv`
--
ALTER TABLE `userinv`
  MODIFY `InvID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userstp`
--
ALTER TABLE `userstp`
  MODIFY `StpID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
