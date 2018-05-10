-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 10:15 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`dname`),
  ADD UNIQUE KEY `did` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
