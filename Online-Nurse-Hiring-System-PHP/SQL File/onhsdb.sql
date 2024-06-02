-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 07:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onhsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Admin', 'admin', 1234596321, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-04-19 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int(5) NOT NULL,
  `BookingID` int(10) DEFAULT NULL,
  `NurseID` int(5) DEFAULT NULL,
  `ContactName` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `ContactEmail` varchar(250) DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `TimeDuration` varchar(250) DEFAULT NULL,
  `PatientDescrition` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `BookingID`, `NurseID`, `ContactName`, `ContactNumber`, `ContactEmail`, `FromDate`, `ToDate`, `TimeDuration`, `PatientDescrition`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(2, 756462345, 2, 'Komal Singh', 8894561236, 'komal@gmail.com', '2023-07-01', '2023-08-31', '24 hrs', 'He is on bed rest. ', '2023-06-30 11:45:55', 'Request Accepted', 'Accepted', '2023-07-04 17:22:43'),
(3, 470264637, 1, 'Anuj kumar', 1234567890, 'ak@test.com', '2023-08-01', '2023-08-31', '10Am-6Pm', 'Diabetic patient', '2023-07-04 16:43:23', 'Request Accepted', 'Accepted', '2023-07-04 17:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblnurse`
--

CREATE TABLE `tblnurse` (
  `ID` int(5) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MobileNo` bigint(20) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `State` varchar(250) DEFAULT NULL,
  `LanguagesKnown` varchar(250) DEFAULT NULL,
  `NursingExp` varchar(250) DEFAULT NULL,
  `NursingCertificate` varchar(250) DEFAULT NULL,
  `EducationDescription` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnurse`
--

INSERT INTO `tblnurse` (`ID`, `Name`, `Gender`, `Email`, `MobileNo`, `Address`, `City`, `State`, `LanguagesKnown`, `NursingExp`, `NursingCertificate`, `EducationDescription`, `ProfilePic`, `CreationDate`) VALUES
(1, 'Radhika Mishra', 'Female', 'radhika@gmail.com', 7896541236, 'H-990, ABC Aparment', 'Gwalior', 'MP', 'Hindi, English', '5', '1. Certificate Course in Clinical Nutrition, Certificate in Maternal and Child Health Nursing (CMCHN),Certificate in Health Care Waste Management (CHCWM)', 'BSc in nursing', '3dfb1c8dbdcc05745b5fefc573a2a85f1687925651.png', '2023-06-27 13:14:53'),
(2, 'Komal Singh', 'Female', 'komal@gmail.com', 7894562589, 'J-900. Khan Bhawan', 'Allahabad', 'UP', 'Hindi, English', '6', 'ABC, GHI', 'Msc in nursing', '0e45f9c578934feee89510ae99dea77a1687925422.jpg', '2023-06-27 13:14:53'),
(3, 'Sarvan Singh', 'Male', 'sarvan@gmail.com', 9896541236, 'K-600. Kanika Bhawan', 'Gwalior', 'MP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', '900f53f4274b62426298909232c24ed61687925439.png', '2023-06-27 13:14:53'),
(4, 'Gaurav Mishra', 'Male', 'gaurav@gmail.com', 8896541236, 'L-890, Gantta Ghar, Near Firstcry shop', 'Ghaziabad', 'UP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', 'c06f792528e35a7d5d0aed3edf576d1e1687925454.jpg', '2023-06-27 13:14:53'),
(5, 'Madavi Mishra', 'Female', 'madavi@gmail.com', 6896541236, 'B-3/4 Shivala', 'Varanasi', 'UP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', '1503ad57804a945948d829c45fb03a671687925469.jpg', '2023-06-27 13:14:53'),
(6, 'Radhika Tanwar', 'Female', 'radhika1@gmail.com', 5896541236, 'J&K Block J-789', 'Mumbai', 'Maharastra', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', '96f937c80d8f66f43255576edd59538f1687925485.jpg', '2023-06-27 13:14:53'),
(7, 'Shashank Saraswat ', 'Male', 'shashank@gmail.com', 4896541236, 'H-890, KBC Apartment', 'Gwalior', 'MP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', '41b586905e6233e72b076191f8bf95121687925503.png', '2023-06-27 13:14:53'),
(8, 'Rakesh Gupta', 'Male', 'rakesh@gmail.com', 2896541232, 'G-908, Majli market', 'Kolkata', 'WB', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', 'e76de47f621d84adbab3266e3239baee1687925519.png', '2023-06-27 13:14:53'),
(9, 'Yash Ganguly', 'Male', 'yash@gmail.com', 1296541236, 'J-908, Kosi Gao', 'Kolkata', 'WB', 'Hindi, English, Bengali', '5', 'ABC, GHI', 'BSc in nursing', '103e0a87212c535a7672592229dcd9b31687925539.jpg', '2023-06-27 13:14:53'),
(10, 'Rubina Shah', 'Female', 'rubina@gmail.com', 2896541236, 'H-890, Bihari Apartment', 'Jaipur', 'Rajasthan', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', 'c825c120b1a9b63424eacfdb0e381d281687925557.jpg', '2023-06-27 13:14:53'),
(11, 'John', 'Male', 'john@gmail.com', 5896541231, 'G-908, Lodhi Raod', 'Gwalior', 'MP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', '4389d9b5e3ba297410a11afc0b8e101b1687925577.png', '2023-06-27 13:14:53'),
(12, 'Sonam Mishra', 'Female', 'sonam@gmail.com', 5896541237, 'K-908, Mahatma Gandhi Road ', 'Gwalior', 'MP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', '5a50384cae0f97de34cf8eb2c34942881687925604.jpg', '2023-06-27 13:14:53'),
(13, 'Radhika Mishra', 'Female', 'radhika3@gmail.com', 9896541237, 'L-890, Kanjipuram', 'Aligarh', 'UP', 'Hindi, English', '5', 'ABC, GHI', 'BSc in nursing', 'c8a4d4d1d6b1d60d8ebf7d8d382fb2721687925628.jpg', '2023-06-27 13:14:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnurse`
--
ALTER TABLE `tblnurse`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblnurse`
--
ALTER TABLE `tblnurse`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
