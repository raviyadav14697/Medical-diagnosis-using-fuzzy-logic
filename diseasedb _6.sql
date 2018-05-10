-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 06:49 PM
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
-- Table structure for table `diag`
--

CREATE TABLE `diag` (
  `x` int(3) DEFAULT NULL,
  `yes` decimal(2,1) DEFAULT NULL,
  `no` decimal(2,1) DEFAULT NULL,
  `maybe` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diag`
--

INSERT INTO `diag` (`x`, `yes`, `no`, `maybe`) VALUES
(1, '0.0', '1.0', '0.0'),
(2, '0.0', '1.0', '0.0'),
(3, '0.0', '1.0', '0.0'),
(4, '0.0', '1.0', '0.0'),
(5, '0.0', '1.0', '0.0'),
(6, '0.0', '1.0', '0.0'),
(7, '0.0', '1.0', '0.0'),
(8, '0.0', '1.0', '0.0'),
(9, '0.0', '1.0', '0.0'),
(10, '0.0', '1.0', '0.0'),
(11, '0.0', '1.0', '0.0'),
(12, '0.0', '1.0', '0.0'),
(13, '0.0', '1.0', '0.0'),
(14, '0.0', '1.0', '0.0'),
(15, '0.0', '1.0', '0.0'),
(16, '0.0', '1.0', '0.0'),
(17, '0.0', '1.0', '0.0'),
(18, '0.0', '1.0', '0.0'),
(19, '0.0', '1.0', '0.0'),
(20, '0.0', '1.0', '0.0'),
(21, '0.0', '0.9', '0.1'),
(22, '0.0', '0.8', '0.2'),
(23, '0.0', '0.7', '0.3'),
(24, '0.0', '0.6', '0.4'),
(25, '0.0', '0.5', '0.5'),
(26, '0.0', '0.4', '0.6'),
(27, '0.0', '0.3', '0.7'),
(28, '0.0', '0.2', '0.8'),
(29, '0.0', '0.1', '0.9'),
(30, '0.0', '0.0', '1.0'),
(31, '0.0', '0.0', '1.0'),
(32, '0.0', '0.0', '1.0'),
(33, '0.0', '0.0', '1.0'),
(34, '0.0', '0.0', '1.0'),
(35, '0.0', '0.0', '1.0'),
(36, '0.0', '0.0', '1.0'),
(37, '0.0', '0.0', '1.0'),
(38, '0.0', '0.0', '1.0'),
(39, '0.0', '0.0', '1.0'),
(40, '0.0', '0.0', '1.0'),
(41, '0.0', '0.0', '1.0'),
(42, '0.0', '0.0', '1.0'),
(43, '0.0', '0.0', '1.0'),
(44, '0.0', '0.0', '1.0'),
(45, '0.0', '0.0', '1.0'),
(46, '0.0', '0.0', '1.0'),
(47, '0.0', '0.0', '1.0'),
(48, '0.0', '0.0', '1.0'),
(49, '0.0', '0.0', '1.0'),
(50, '0.0', '0.0', '1.0'),
(51, '0.0', '0.0', '1.0'),
(52, '0.0', '0.0', '1.0'),
(53, '0.0', '0.0', '1.0'),
(54, '0.0', '0.0', '1.0'),
(55, '0.0', '0.0', '1.0'),
(56, '0.0', '0.0', '1.0'),
(57, '0.0', '0.0', '1.0'),
(58, '0.0', '0.0', '1.0'),
(59, '0.0', '0.0', '1.0'),
(60, '0.0', '0.0', '1.0'),
(61, '0.0', '0.0', '1.0'),
(62, '0.0', '0.0', '1.0'),
(63, '0.0', '0.0', '1.0'),
(64, '0.0', '0.0', '1.0'),
(65, '0.0', '0.0', '1.0'),
(66, '0.0', '0.0', '1.0'),
(67, '0.0', '0.0', '1.0'),
(68, '0.0', '0.0', '1.0'),
(69, '0.0', '0.0', '1.0'),
(70, '0.0', '0.0', '1.0'),
(71, '0.1', '0.0', '0.9'),
(72, '0.2', '0.0', '0.8'),
(73, '0.3', '0.0', '0.7'),
(74, '0.4', '0.0', '0.6'),
(75, '0.5', '0.0', '0.5'),
(76, '0.6', '0.0', '0.4'),
(77, '0.7', '0.0', '0.3'),
(78, '0.8', '0.0', '0.2'),
(79, '0.9', '0.0', '0.1'),
(80, '1.0', '0.0', '0.0'),
(81, '1.0', '0.0', '0.0'),
(82, '1.0', '0.0', '0.0'),
(83, '1.0', '0.0', '0.0'),
(84, '1.0', '0.0', '0.0'),
(85, '1.0', '0.0', '0.0'),
(86, '1.0', '0.0', '0.0'),
(87, '1.0', '0.0', '0.0'),
(88, '1.0', '0.0', '0.0'),
(89, '1.0', '0.0', '0.0'),
(90, '1.0', '0.0', '0.0'),
(91, '1.0', '0.0', '0.0'),
(92, '1.0', '0.0', '0.0'),
(93, '1.0', '0.0', '0.0'),
(94, '1.0', '0.0', '0.0'),
(95, '1.0', '0.0', '0.0'),
(96, '1.0', '0.0', '0.0'),
(97, '1.0', '0.0', '0.0'),
(98, '1.0', '0.0', '0.0'),
(99, '1.0', '0.0', '0.0'),
(100, '1.0', '0.0', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `did` int(11) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `specialist` varchar(50) DEFAULT NULL,
  `precaution` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`did`, `dname`, `specialist`, `precaution`) VALUES
(2, 'Heart_Disease', 'Cardiologist', '1. Don\'t smoke or use tobacco Smoking or using tobacco of any kind is one of the most significant risk factors for developing heart disease. Chemicals in tobacco can damage your heart and blood vessels, leading to narrowing of the arteries due to plaque buildup (atherosclerosis). Atherosclerosis can ultimately lead to a heart attack.  <br><br><br> \r\n   2. Exercise for about 30 minutes on most days of the week Getting some regular, daily exercise can reduce your risk of heart disease. And when you combine physical activity with other lifestyle measures, such as maintaining a healthy weight, the payoff is even greater.  Physical activity can help you control your weight and reduce your chances of developing other conditions that may put a strain on your heart, such as high blood pressure, high cholesterol and diabetes. <br><br><br>     3. Eat a heart-healthy diet Eating a healthy diet can reduce your risk of heart disease. Two examples of heart-healthy food plans include the Dietary Approaches to Stop Hypertension (DASH) eating plan and the Mediterranean diet.  <br><br><br>     4. Maintain a healthy weight Being overweight especially if you carry excess weight around your middle increases your risk of heart disease. Excess weight can lead to conditions that increase your chances of heart disease including high blood pressure, high cholesterol and diabetes. <br><br><br>     5. Get enough quality sleep Sleep deprivation can do more than leave you yawning throughout the day; it can harm your health. People who don\'t get enough sleep have a higher risk of obesity, high blood pressure, heart attack, diabetes and depression. <br><br><br>    6. Manage stress Some people cope with stress in unhealthy ways such as overeating, drinking or smoking. Finding alternative ways to manage stress such as physical activity, relaxation exercises or meditation can help improve your health.  <br><br><br>    7. Get regular health screenings High blood pressure and high cholesterol can damage your heart and blood vessels. But without testing for them, you probably won\'t know whether you have these conditions. Regular screening can tell you what your numbers are and whether you need to take action.');

-- --------------------------------------------------------

--
-- Table structure for table `doctorlogin`
--

CREATE TABLE `doctorlogin` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorlogin`
--

INSERT INTO `doctorlogin` (`email`, `password`, `firstname`, `lastname`) VALUES
('a@b.c', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

CREATE TABLE `mapping` (
  `did` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `fv` varchar(200) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping`
--

INSERT INTO `mapping` (`did`, `sid`, `fv`, `weight`) VALUES
(2, 1, '3,2,1', 0.2),
(2, 3, '3,2,1', 0.5),
(2, 5, '3,2,1', 0.7),
(2, 6, '1,1', 0.1),
(2, 7, '1,1,1,1', 0.6),
(2, 8, '3,1', 0.5),
(2, 10, '3,1', 0.2),
(2, 11, '3,1,2', 0.8),
(2, 12, '3,2,1', 0.8),
(2, 13, '3,1,1,1', 0.9);

-- --------------------------------------------------------

--
-- Table structure for table `patientlogin`
--

CREATE TABLE `patientlogin` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientlogin`
--

INSERT INTO `patientlogin` (`email`, `password`, `firstname`, `lastname`) VALUES
('a@b.c', '123', 'a', 'b'),
('a@g.c', '123', 'a', 'g'),
('aa@b.c', '123', 'aa', 'b'),
('aaa@bb.c', '123', 'aaa', 'bb'),
('ab@cd.e', '123', 'ab', 'cd'),
('abc@cd', '123', 'abc', 'cd');

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `sid` int(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `fuzzy_set` varchar(100) NOT NULL,
  `range_value` int(11) DEFAULT '0',
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`sid`, `sname`, `fuzzy_set`, `range_value`, `Description`) VALUES
(1, 'AGE', '1-34,35-45,46-120', 1, 'Age in Years'),
(13, 'CA', '0,1,2,3', 0, 'number of major vessels colored by fluoroscopy : discrete (0,1,2,3)'),
(7, 'CHEST PAIN ', '1,2,3,4', 0, 'chest pain type : categorical, 4 values     {1: typical angina, 2: atypical angina, 3: non-angina, 4: asymptomatic angina}'),
(3, 'CHOLESTEROL', '99-177,178-217,218-600', 1, 'serum cholesterol level: continuous (mg/dl)'),
(8, 'EXERCISE INDUCED ANGINA', '0,1', 0, 'categorical, 2 values {0: no, 1: yes}'),
(10, 'FASTING BLOOD SUGAR', '0,1', 0, 'categorical, 2 values {0: <= 120 mg/dl, 1: > 120 mg/dl}'),
(6, 'GENDER', '1,0', 0, 'categorical, 2 values {0: female, 1: male}'),
(5, 'HEART RATE', '30-140,141-180,181-220', 1, 'maximum heart rate achieved : continuous'),
(12, 'RESTING ELECTROCARDIOGRAPHY', '0,1,2', 0, 'categorical, 3 values     {0: normal, 1: ST-T wave abnormality, 2: left ventricular hypertrophy}'),
(11, 'THAL', '3,6,7', 0, 'categorical, 3 values {3: normal, 6: fixed defect, 7: reversible defect}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`dname`),
  ADD UNIQUE KEY `did` (`did`);

--
-- Indexes for table `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`did`,`sid`);

--
-- Indexes for table `patientlogin`
--
ALTER TABLE `patientlogin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`sname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
