-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 10:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmswd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclientinfo`
--

CREATE TABLE `tblclientinfo` (
  `id` int(11) NOT NULL,
  `clientsID` varchar(255) NOT NULL,
  `image_name` text NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `householdnum` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclientinfo`
--

INSERT INTO `tblclientinfo` (`id`, `clientsID`, `image_name`, `lastname`, `firstname`, `middlename`, `age`, `birthdate`, `householdnum`, `street`, `barangay`, `contactno`, `gender`, `category`, `stat`) VALUES
(1, 'MSWD000001', 'bani_logo.png', 'RAMIREZ', 'JASON', 'ORILLA', 28, '1994-05-08', 23, 'BARADI', 'Poblacion', '09563528453', 'Male', '4Ps, PWD', 'Single'),
(2, 'MSWD000002', 'pexels-pixabay-35888.jpg', 'Steff ', 'Parker', 'Brown', 30, '1992-02-19', 3, 'Burgos', 'Poblacion', '0910213421', 'Male', 'Senior Citizen, Solo Parent', 'Single'),
(3, 'MSWD000003', 'default.png', 'Aidan', 'Wilkinson', 'Chesterfield', 30, '1992-01-19', 5, 'Oboza', 'Dacap Norte', '09123141', 'Male', '4Ps, PWD, Solo Parent', 'Single'),
(4, 'MSWD000004', 'default.png', 'aesf', 'af', 'asd', 30, '1992-01-19', 23, 'sdfdsf', 'Ambabaay', '234345234231', 'Male', '4Ps', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `tblclientotherinfo`
--

CREATE TABLE `tblclientotherinfo` (
  `id` int(11) NOT NULL,
  `clients_ID` varchar(255) NOT NULL,
  `clientsID` varchar(255) NOT NULL,
  `SpouseLastname` varchar(255) NOT NULL,
  `SpouseFirstname` varchar(255) NOT NULL,
  `SpouseMiddlename` varchar(255) NOT NULL,
  `SpouseBirthdate` date NOT NULL,
  `fatherLastname` varchar(255) NOT NULL,
  `fatherFirstname` varchar(255) NOT NULL,
  `fatherMiddlename` varchar(255) NOT NULL,
  `fatherBirthdate` date NOT NULL,
  `MotherLastname` varchar(255) NOT NULL,
  `MotherFirstname` varchar(255) NOT NULL,
  `MotherMiddlename` varchar(255) NOT NULL,
  `MotherBirthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclientotherinfo`
--

INSERT INTO `tblclientotherinfo` (`id`, `clients_ID`, `clientsID`, `SpouseLastname`, `SpouseFirstname`, `SpouseMiddlename`, `SpouseBirthdate`, `fatherLastname`, `fatherFirstname`, `fatherMiddlename`, `fatherBirthdate`, `MotherLastname`, `MotherFirstname`, `MotherMiddlename`, `MotherBirthdate`) VALUES
(54, 'MSWD000001', 'MSWD000001', 'RAMIREZ', 'JASON', 'ORILLA', '1994-05-08', 'asdasd', 'dsfdsf', 'ORILLA', '1984-01-11', '345245', 'sdfdsf', 'asdasd', '1111-11-11'),
(55, 'MSWD000002', 'MSWD000002', 'Steff ', 'Parker', 'Brown', '1992-02-19', 'Parker', 'Steff ', 'Brown', '1934-01-19', 'Steff ', 'Parker', 'Brown', '1992-02-19'),
(56, 'MSWD000003', 'MSWD000003', 'Wilkinson', 'Chesterfield', 'Aidan', '1992-01-19', 'Chesterfield', 'Wilkinson', 'Aidan', '1992-02-19', 'Wilkinson', 'Chesterfield', 'Aidan', '1992-02-19'),
(57, 'MSWD000004', 'MSWD000004', 'dsf', 'dsfa', 'sdasd', '1992-01-19', 'asd', 'dsfgds', 'sdasd', '1992-02-19', 'asfda', 'dsafadsw', 'asdasd', '1992-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tblcredentials`
--

CREATE TABLE `tblcredentials` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcredentials`
--

INSERT INTO `tblcredentials` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `id` int(11) NOT NULL,
  `clientsID` varchar(255) NOT NULL,
  `trans_des` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `transacdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`id`, `clientsID`, `trans_des`, `lastname`, `firstname`, `middlename`, `category`, `street`, `barangay`, `birthdate`, `transacdate`) VALUES
(1, 'MSWD000001', 'Educational Assistance', 'RAMIREZ', 'JASON', 'ORILLA', '4Ps, Senior Citizen, Solo Parent', 'BARADI', 'Poblacion', '1994-05-08', '2022-08-03'),
(2, 'MSWD000001', 'Burial Assistance', 'RAMIREZ', 'JASON', 'ORILLA', '4Ps, Senior Citizen, Solo Parent', 'BARADI', 'Poblacion', '1994-05-08', '2022-08-03'),
(3, 'MSWD000001', 'Emergency Shelter', 'RAMIREZ', 'JASON', 'ORILLA', '4Ps, Senior Citizen, Solo Parent', 'BARADI', 'Poblacion', '1994-05-08', '2022-08-03'),
(4, 'MSWD000001', 'Educational Assistance', 'RAMIREZ', 'JASON', 'ORILLA', '4Ps, Senior Citizen, Solo Parent', 'BARADI', 'Poblacion', '1994-05-08', '2022-08-03'),
(5, 'MSWD000002', 'Burial Assistance', 'Steff ', 'Parker', 'Brown', 'Senior Citizen, PWD', 'Burgos', 'Poblacion', '1992-02-19', '2022-08-03'),
(6, 'MSWD000002', 'Burial Assistance', 'Steff ', 'Parker', 'Brown', 'Senior Citizen, PWD', 'Burgos', 'Poblacion', '1992-02-19', '2022-08-03'),
(7, 'MSWD000001', 'Medical Assistance', 'RAMIREZ', 'JASON', 'ORILLA', '4Ps, Senior Citizen, Solo Parent', 'BARADI', 'Poblacion', '1994-05-08', '2022-08-03'),
(8, 'MSWD000003', 'Burial Assistance', 'Aidan', 'Wilkinson', 'Chesterfield', 'Senior Citizen, PWD', 'Oboza', 'Dacap Norte', '1992-01-19', '2022-08-03'),
(9, 'MSWD000003', 'Burial Assistance', 'Aidan', 'Wilkinson', 'Chesterfield', 'Senior Citizen, PWD', 'Oboza', 'Dacap Norte', '1992-01-19', '2022-08-03'),
(10, 'MSWD000002', 'Burial Assistance', 'Steff ', 'Parker', 'Brown', '4Ps, Senior Citizen, PWD', 'Burgos', 'Poblacion', '1992-02-19', '2022-08-03'),
(11, 'MSWD000003', 'Emergency Shelter', 'Aidan', 'Wilkinson', 'Chesterfield', '4Ps, Senior Citizen, PWD', 'Oboza', 'Dacap Norte', '1992-01-19', '2022-08-03'),
(12, 'MSWD000001', 'Educational Assistance', 'RAMIREZ', 'JASON', 'ORILLA', '4Ps, Senior Citizen, Solo Parent', 'BARADI', 'Poblacion', '1994-05-08', '2022-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `category`) VALUES
(1, '4Ps, Senior Citizen'),
(2, '4Ps, Senior Citizen, PWD, Solo Parent'),
(3, 'Senior Citizen, Solo Parent'),
(4, 'Senior Citizen, PWD, Solo Parent'),
(5, '4Ps, Solo Parent'),
(6, '4Ps, Senior Citizen, PWD, Solo Parent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclientinfo`
--
ALTER TABLE `tblclientinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclientotherinfo`
--
ALTER TABLE `tblclientotherinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcredentials`
--
ALTER TABLE `tblcredentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclientinfo`
--
ALTER TABLE `tblclientinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblclientotherinfo`
--
ALTER TABLE `tblclientotherinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tblcredentials`
--
ALTER TABLE `tblcredentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
