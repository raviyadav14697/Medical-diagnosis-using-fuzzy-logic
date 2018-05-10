-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 07:18 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diseasedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `sid` int(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `fuzzy_set` varchar(100) NOT NULL,
  `range_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`sid`, `sname`, `fuzzy_set`, `range_value`) VALUES
(1, 'AGE', '1-32,33-45,46-120', 1),
(2, 'BP', '40-138,139-152,153-172,173-190', 1),
(7, 'CHEST PAIN ', 'typical angina,atypical angina,non-angina,asymptomatic angina', 1),
(3, 'CHOLESTEROL', '130-197,198-250,251-600', 1),
(8, 'EXERCISE INDUCED ANGINA', 'No,Yes', 1),
(10, 'FASTING BLOOD SUGAR', '70-100,101-126,127-150', 1),
(6, 'GENDER', 'Male,Female', 1),
(5, 'HEART RATE', '30-140,141-180,181-220', 1),
(4, 'OLD PEAK', '0.0-1.5,1.6-3.0,3.1-5.0', 1),
(12, 'RESTING ELECTROCARDIOGRAPHY', 'normal,ST-T wave abnormality,left ventricular hypertrophy', 1),
(9, 'SLOPE OF PEAK EXERCISE', 'Unsloping,Flat,Downsloping', 1),
(11, 'THAL', 'normal,fixed defect,reversible defect', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`sname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
