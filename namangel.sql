-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2019 at 04:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
  `ProfilePic` varchar(200) DEFAULT 'uploads/default/default.png	',
  `privilege` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `AdminName`, `AdminDesgn`, `Username`, `Password`, `ProfilePic`, `privilege`) VALUES
(1, 'Deepali', 'CEO', 'admin', 'admin12345', 'uploads/admin/Deepali_ProfilePic2.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `annual_financial`
--

CREATE TABLE `annual_financial` (
  `StpID` varchar(20) NOT NULL,
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
('NAMST0000001', 12, 11, 'sdda', 'ddf', 1, 21, 234, 2017, 1),
('NAMST0000001', 12, 11, 'sdda', 'ddf', 2, 123, 234, 2018, 2),
('NAMST0000001', 12, 11, 'sdda', 'ddf', 3, 123, 213, 2019, 3),
('NAMST0000001', 12, 11, 'sdda', 'ddf', 4, 123, 213, 2020, 4),
('NAMST0000001', 12, 11, 'sdda', 'ddf', 5, 123, 234, 2021, 5),
('NAMST0000001', 12, 11, 'sdda', 'ddf', 3, 123, 234, 2022, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `aview`
-- (See below for the actual view)
--
CREATE TABLE `aview` (
`InvID` varchar(20)
,`CName` varchar(200)
,`FName` varchar(200)
,`LName` varchar(200)
,`Type` varchar(50)
,`MemID` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bprofile`
-- (See below for the actual view)
--
CREATE TABLE `bprofile` (
`StpID` varchar(20)
,`Type` varchar(200)
,`Stage` varchar(200)
,`Round` varchar(30)
,`Seeking` int(30)
,`Verified` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cprofile`
-- (See below for the actual view)
--
CREATE TABLE `cprofile` (
`InvID` varchar(20)
,`CName` varchar(200)
,`FName` varchar(200)
,`WebLink` varchar(200)
,`LName` varchar(200)
,`AvgInv` varchar(200)
,`Email` varchar(200)
,`Phone` varchar(200)
,`InvRange` varchar(200)
,`CImg` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `current_round`
--

CREATE TABLE `current_round` (
  `StpID` varchar(20) NOT NULL,
  `Round` varchar(30) NOT NULL,
  `Seeking` int(30) NOT NULL,
  `Security_type` varchar(30) NOT NULL,
  `Premoney_val` int(30) NOT NULL,
  `Val_cap` int(30) NOT NULL,
  `Conversion_disc` int(5) NOT NULL,
  `Interest_rate` int(5) NOT NULL,
  `Term_len` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_round`
--

INSERT INTO `current_round` (`StpID`, `Round`, `Seeking`, `Security_type`, `Premoney_val`, `Val_cap`, `Conversion_disc`, `Interest_rate`, `Term_len`) VALUES
('NAMST0000001', 'Friends and Family', 12345, 'Common Equity', 123, 0, 0, 0, 0),
('NAMST0000002', 'Preseries A', 3423, 'Preferred Equity', 233, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inv_addetails`
--

CREATE TABLE `inv_addetails` (
  `InvID` varchar(20) NOT NULL,
  `IOI` varchar(200) DEFAULT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `LinkedIn` varchar(200) DEFAULT NULL,
  `Instagram` varchar(200) DEFAULT NULL,
  `Others` varchar(200) DEFAULT NULL,
  `Role` varchar(200) DEFAULT NULL,
  `Partner` varchar(200) DEFAULT NULL,
  `InvRange` varchar(200) DEFAULT NULL,
  `Summary` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_addetails`
--

INSERT INTO `inv_addetails` (`InvID`, `IOI`, `Facebook`, `Twitter`, `LinkedIn`, `Instagram`, `Others`, `Role`, `Partner`, `InvRange`, `Summary`) VALUES
('NAMIN0000001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('NAMIN0000003', NULL, NULL, 'mukeshambani.com/twitter', 'mukeshambani.com/linkedin', 'mukeshambani.com/instagram', NULL, NULL, NULL, NULL, NULL),
('NAMIN0000004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_details`
--

CREATE TABLE `inv_details` (
  `InvID` varchar(20) NOT NULL,
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
('NAMIN0000001', 'Stark Enterprise', 'Tony', 'Stark', 'tony@stark.in', '9999999999', 'stark.in', 'New York City', 'Manhattan', 'United States', '100', 'Institution'),
('NAMIN0000003', NULL, 'Mukesh', 'Ambani', 'mambani@reliance.com', '9000000000', NULL, 'Mumbai', 'Maharashtra', 'India', '150', 'Individual'),
('NAMIN0000004', NULL, 'Bruce', 'Wayne', 'batman@gmail.com', '8082189673', NULL, 'Mumbai', 'Maharashtra', 'India', '2', 'Individual');

-- --------------------------------------------------------

--
-- Table structure for table `inv_group`
--

CREATE TABLE `inv_group` (
  `ID` int(50) NOT NULL,
  `InvID` varchar(20) NOT NULL,
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
  `InvID` varchar(20) NOT NULL,
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
  `InvID` varchar(20) NOT NULL,
  `ProfilePic` varchar(200) DEFAULT 'uploads/default/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_uploads`
--

INSERT INTO `inv_uploads` (`InvID`, `ProfilePic`) VALUES
('NAMIN0000001', '	\r\nuploads/default/default.png'),
('NAMIN0000003', 'uploads/default/default.png'),
('NAMIN0000004', 'uploads/default/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `InvID` varchar(20) NOT NULL,
  `MemID` varchar(20) NOT NULL,
  `StDate` date NOT NULL,
  `ExpDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`InvID`, `MemID`, `StDate`, `ExpDate`) VALUES
('NAMBIN000001', 'MEM2AD207EC', '2019-02-26', '2019-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `namanteam`
--

CREATE TABLE `namanteam` (
  `SR` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Image` varchar(200) DEFAULT '/NamanAngels/uploads/default/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `namanteam`
--

INSERT INTO `namanteam` (`SR`, `Name`, `Link`, `Description`, `Image`) VALUES
(1, 'Shweta Shalini', 'https://www.linkedin.com/in/shweta-shalini-25b4752/', 'Official Spokesperson - Bhartiya Janta Party | Chief Evangelist - The Billennium Divas Thought Leade', 'uploads\\team\\shweta-shalini.png'),
(2, 'Miten Mehta', 'https://www.linkedin.com/in/mitenmehta/', 'Co-Founder of Spinta Global Accelerato', 'uploads\\team\\miten-mehta.png'),
(3, 'Sandeep Sehgal', 'https://www.linkedin.com/in/sandeep-sehgal-9925892/', 'CEO and Co-Founder of Global ScaleUp | HQ in Singapore', 'uploads\\team\\sandeep-sehgal.png'),
(4, 'Nilesh Gandhi', 'https://www.linkedin.com/in/nilesh-gandhi-9109ba11/', 'Managing Director at Unid Finance Consultancy Pvt. Ltd.', 'uploads\\team\\nilesh-gandhi.png'),
(5, 'Tapaswi Patel', 'https://www.linkedin.com/in/tapaswipatel/', 'Serial Entrepreneur Startup Investor Founder: Naman Angels India Foundation, ZoomStart India', 'uploads\\team\\tapaswi-patel.png'),
(6, 'Dinesh Israni', 'https://www.linkedin.com/in/dinesh-israni-89048125/', 'Co-Founder | CEO ', 'uploads\\team\\dinesh-israni.png'),
(7, 'Bhavesh Kothari', 'https://www.linkedin.com/in/bhaveshkothari1511/', 'Co-Founder | CBO ', 'uploads\\team\\bhavesh-kothari.png'),
(8, 'Ankit Buti', 'https://www.linkedin.com/in/ankitbuti/', 'Entrepreneur in Residence with NAMAN Angels India Foundation | Founder & CEO at StartupEd', 'uploads\\team\\ankit-buti.png'),
(9, 'Pratik Lalani', 'https://www.linkedin.com/in/pratik8575/', 'Principal Evangelist', 'uploads\\team\\pratik-lalani.png'),
(10, 'Purvang Joshi', 'https://www.linkedin.com/in/purvangjoshi/', 'Principal Evangelist', 'uploads\\team\\purvang-joshi.png'),
(11, 'Deep Patel', '#', 'Principal Evangelist', 'uploads\\team\\deep-patel.png'),
(12, 'Sonali Shah', 'https://www.linkedin.com/in/sonali-shah-ab5846160/', 'Design & Marketing Support', 'uploads\\team\\sonali-shah.png'),
(13, 'Bharti Keswani', 'https://www.linkedin.com/in/bharti-keswani-050b63148/', 'Financial Analyst', 'uploads\\team\\bharti-keswani.png'),
(14, 'Harsha Therani', 'https://www.linkedin.com/in/harsha-therani/', 'Financial Analyst', 'uploads\\team\\harsha-therani.png'),
(15, 'Sunny Tiwari', 'https://www.linkedin.com/in/sunny-tiwari-676890107/', 'Financial Analyst', 'uploads\\team\\sunny-tiwari.png'),
(16, 'Yash Thakkar', 'https://www.linkedin.com/in/yash-thakkar-b34412136/', 'Investment Fund Manager', 'uploads\\team\\yash-thakkar.png'),
(17, 'Nikita Tilak', 'https://www.linkedin.com/in/nikita-tilak-70112714b/', 'Investment Fund Manager', 'uploads\\team\\nikita-tilak.png'),
(18, 'Vidisha Dholkhedia', 'https://www.linkedin.com/in/vidisha-dholkhedia-6ab155167/', 'Digital Marketing', 'uploads\\team\\vidisha.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile`
-- (See below for the actual view)
--
CREATE TABLE `profile` (
`StpID` varchar(20)
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
  `Round` varchar(30) NOT NULL,
  `Amount` int(50) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Stakehold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`ReqID`, `Inv_ID`, `St_ID`, `Deal`, `Round`, `Amount`, `Date`, `Stakehold`) VALUES
(4, 'NAMIN0000001', 'NAMST0000001', 0x31, 'Friends and Family', 12345, '2019-02-23', 13);

-- --------------------------------------------------------

--
-- Table structure for table `round_history`
--

CREATE TABLE `round_history` (
  `HistID` int(20) NOT NULL,
  `StpID` varchar(20) NOT NULL,
  `Round` varchar(30) NOT NULL,
  `Security_type` varchar(50) NOT NULL,
  `Capital_raised` int(30) NOT NULL,
  `Close_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round_history`
--

INSERT INTO `round_history` (`HistID`, `StpID`, `Round`, `Security_type`, `Capital_raised`, `Close_date`) VALUES
(1, 'NAMST0000001', 'Founder', 'Preferred Equity', 3124, '2019-02-16'),
(2, 'NAMST0000001', 'Friends and Family', 'Preferred Equity', 3124, '2019-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE `siteinfo` (
  `ID` int(100) NOT NULL,
  `Counter` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`ID`, `Counter`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `st_addetails`
--

CREATE TABLE `st_addetails` (
  `StpID` varchar(20) NOT NULL,
  `Stage` varchar(200) DEFAULT NULL,
  `DOF` varchar(200) DEFAULT NULL,
  `EmpNum` varchar(200) DEFAULT NULL,
  `IncType` varchar(200) DEFAULT NULL,
  `LinkedIn` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Instagram` varchar(200) DEFAULT NULL,
  `Others` varchar(200) DEFAULT NULL,
  `Youtube` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_addetails`
--

INSERT INTO `st_addetails` (`StpID`, `Stage`, `DOF`, `EmpNum`, `IncType`, `LinkedIn`, `Twitter`, `Facebook`, `Instagram`, `Others`, `Youtube`) VALUES
('NAMST0000001', 'Prototype ready', '2014-12-12', '12', 'LLP', 'sdsdsd', 'spacex/twitter', 'shdg', 'spacex/insta', 'sxsx', NULL),
('NAMST0000002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('NAMST0000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `st_advisors`
--

CREATE TABLE `st_advisors` (
  `ID` int(50) NOT NULL,
  `StpID` varchar(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_advisors`
--

INSERT INTO `st_advisors` (`ID`, `StpID`, `Name`, `Email`) VALUES
(1, 'NAMST0000001', 'asdfghs', 'afg@gjs.com');

-- --------------------------------------------------------

--
-- Table structure for table `st_description`
--

CREATE TABLE `st_description` (
  `StpID` varchar(20) NOT NULL,
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
('NAMST0000001', 'Space X is an awesome project', 'Lets go to Mars', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('NAMST0000002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('NAMST0000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `st_details`
--

CREATE TABLE `st_details` (
  `StpID` varchar(20) NOT NULL,
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
('NAMST0000001', 'Spacex', 'Elon Musk', 'Bill Gates', 'spacex@spx.com', '8169163192', 'Technology', 'Near Launch Pad', 'CC', 'Florida', 'United States', 'spacex.com', '100000000'),
('NAMST0000002', 'akdbis', 'baiubai', 'bibiyv', 'qsbiab@in.in', '9090909090', 'B2B', 'vjh', 'jv', 'jv', 'Jamaica', 'vui.in', '1222'),
('NAMST0000003', 'BroStore', 'Aayush Singh', 'Nitish Talekar', 'admin@brostore.in', '8082189671', 'E-Commerce', 'Bandra-West', 'Mumbai', 'Maharashtra', 'India', 'brostore.in', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `st_previnvestment`
--

CREATE TABLE `st_previnvestment` (
  `ID` int(50) NOT NULL,
  `StpID` varchar(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_previnvestment`
--

INSERT INTO `st_previnvestment` (`ID`, `StpID`, `Name`, `Email`) VALUES
(1, 'NAMST0000001', 'ABC', 'abc12@123.com');

-- --------------------------------------------------------

--
-- Table structure for table `st_team`
--

CREATE TABLE `st_team` (
  `ID` int(50) NOT NULL,
  `StpID` varchar(20) NOT NULL,
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
  `StpID` varchar(20) NOT NULL,
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
('NAMST0000001', 'uploads/startup/Spacex_ProfilePic2.png', 'uploads/startup/Spacex_backimg_Spacex_backimg_Hero-5.jpg', 'uploads/startup/Spacex_pitch_VID-20181209-WA0003.mp4', 'mp4', 'uploads/startup/Spacex_bplan_naman-todo.pdf', 'pdf', 'uploads/startup/Spacex_fproj_Aayush Singh.pdf', 'pdf', NULL, NULL),
('NAMST0000002', 'uploads/default/default.png', 'uploads/default/defaultbackimg.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('NAMST0000003', 'uploads/default/default.png', 'uploads/default/defaultbackimg.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `ID` int(50) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL DEFAULT 'uploads/tools/tool.png',
  `Cost` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`ID`, `Name`, `Image`, `Cost`, `Description`) VALUES
(1, 'Tool1', 'uploads/tools/tool.png', '100', 'Tool1 Description\r\nHello World 1\r\nABC 1\r\n'),
(2, 'Tool2', 'uploads/tools/tool.png', '200', 'Tool2 Description\r\nHello World 2\r\nABC 2\r\n'),
(3, 'Tool3', 'uploads/tools/tool.png', '200', 'Tool3Description\r\nHello World 3\r\nABC 3'),
(4, 'Tool4', 'uploads/tools/tool.png', '200', 'Tool4 Description\r\nHello World 4\r\nABC 4'),
(5, 'Tool5', 'uploads/tools/tool.png', '200', 'Tool5 Description\r\nHello World 5\r\nABC 5'),
(6, 'Tool6', 'uploads/tools/tool.png', '200', 'Tool6 Description\r\nHello World 6\r\nABC 6'),
(7, 'Tool7', 'uploads/tools/tool.png', '700', 'Tool7 Description  Hello World 7  ABC  7'),
(8, 'Tool8', 'uploads/tools/tool.png', '800', 'Tool8 Description Hello World 8 ABC 8');

-- --------------------------------------------------------

--
-- Table structure for table `userbinv`
--

CREATE TABLE `userbinv` (
  `Entry` int(50) NOT NULL,
  `BinvID` varchar(20) NOT NULL,
  `Fname` varchar(200) NOT NULL,
  `Lname` varchar(200) NOT NULL,
  `Cname` varchar(200) DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `MemID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userbinv`
--

INSERT INTO `userbinv` (`Entry`, `BinvID`, `Fname`, `Lname`, `Cname`, `Email`, `Phone`, `MemID`) VALUES
(1, 'NAMBIN000000', '', '', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userinv`
--

CREATE TABLE `userinv` (
  `Entry` int(100) NOT NULL,
  `InvID` varchar(20) NOT NULL,
  `MemID` varchar(20) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinv`
--

INSERT INTO `userinv` (`Entry`, `InvID`, `MemID`, `Username`, `Password`) VALUES
(1, 'NAMIN0000001', NULL, 'xyz123', '5f2b8374d197548aa0c1bd765ffc3464605cf51c'),
(3, 'NAMIN0000003', NULL, 'ambani', '02b1f3c5352c6b4884d7bbda007e2c323e3c5fe2'),
(4, 'NAMIN0000004', NULL, 'batman123', 'b09833cec69eff1bb667940a45e311262e85a422');

-- --------------------------------------------------------

--
-- Table structure for table `userstp`
--

CREATE TABLE `userstp` (
  `Entry` int(100) NOT NULL,
  `StpID` varchar(20) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Verified` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstp`
--

INSERT INTO `userstp` (`Entry`, `StpID`, `Username`, `Password`, `Verified`) VALUES
(1, 'NAMST0000001', 'abc123', '370194ff6e0f93a7432e16cc9badd9427e8b4e13', 1),
(2, 'NAMST0000002', 'vivi', 'ed42785ca24ae8fa2d9fd131401e44c3c86519ae', 1),
(4, 'NAMST0000003', 'brostore', '614a00dc6516aa60dd7c8f12a4bc74a98210fb28', 0);

-- --------------------------------------------------------

--
-- Structure for view `aview`
--
DROP TABLE IF EXISTS `aview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aview`  AS  select `a`.`InvID` AS `InvID`,`a`.`CName` AS `CName`,`a`.`FName` AS `FName`,`a`.`LName` AS `LName`,`a`.`Type` AS `Type`,`b`.`MemID` AS `MemID` from (`inv_details` `a` join `userinv` `b`) where (`a`.`InvID` = `b`.`InvID`) ;

-- --------------------------------------------------------

--
-- Structure for view `bprofile`
--
DROP TABLE IF EXISTS `bprofile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bprofile`  AS  select `a`.`StpID` AS `StpID`,`a`.`Type` AS `Type`,`b`.`Stage` AS `Stage`,`c`.`Round` AS `Round`,`c`.`Seeking` AS `Seeking`,`d`.`Verified` AS `Verified` from (((`st_details` `a` join `st_addetails` `b`) join `current_round` `c`) join `userstp` `d`) where ((`a`.`StpID` = `b`.`StpID`) and (`a`.`StpID` = `c`.`StpID`) and (`a`.`StpID` = `d`.`StpID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `cprofile`
--
DROP TABLE IF EXISTS `cprofile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cprofile`  AS  select `a`.`InvID` AS `InvID`,`a`.`CName` AS `CName`,`a`.`FName` AS `FName`,`a`.`Website` AS `WebLink`,`a`.`LName` AS `LName`,`a`.`AvgInvestment` AS `AvgInv`,`a`.`Email` AS `Email`,`a`.`Phone` AS `Phone`,`c`.`InvRange` AS `InvRange`,`b`.`ProfilePic` AS `CImg` from ((`inv_details` `a` join `inv_uploads` `b`) join `inv_addetails` `c`) where ((`a`.`InvID` = `b`.`InvID`) and (`a`.`InvID` = `c`.`InvID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `profile`
--
DROP TABLE IF EXISTS `profile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile`  AS  select `a`.`StpID` AS `StpID`,`b`.`Stname` AS `StpName`,`a`.`Logo` AS `StpImg`,`b`.`Ffname` AS `FName`,`b`.`Sfname` AS `SName`,`b`.`Type` AS `Type`,`c`.`Verified` AS `Verified` from ((`st_uploads` `a` join `st_details` `b`) join `userstp` `c`) where ((`a`.`StpID` = `c`.`StpID`) and (`b`.`StpID` = `c`.`StpID`) and (`c`.`Verified` = 1)) ;

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
-- Indexes for table `siteinfo`
--
ALTER TABLE `siteinfo`
  ADD PRIMARY KEY (`ID`);

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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userbinv`
--
ALTER TABLE `userbinv`
  ADD PRIMARY KEY (`BinvID`),
  ADD UNIQUE KEY `Entry` (`Entry`);

--
-- Indexes for table `userinv`
--
ALTER TABLE `userinv`
  ADD PRIMARY KEY (`InvID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Entry` (`Entry`);

--
-- Indexes for table `userstp`
--
ALTER TABLE `userstp`
  ADD PRIMARY KEY (`StpID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Entry` (`Entry`);

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
-- AUTO_INCREMENT for table `siteinfo`
--
ALTER TABLE `siteinfo`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userbinv`
--
ALTER TABLE `userbinv`
  MODIFY `Entry` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userinv`
--
ALTER TABLE `userinv`
  MODIFY `Entry` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userstp`
--
ALTER TABLE `userstp`
  MODIFY `Entry` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
