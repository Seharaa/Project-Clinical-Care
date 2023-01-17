-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2023 at 07:15 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `approval_time` time NOT NULL,
  `doctor` varchar(200) NOT NULL,
  `approval` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `staff_id` int NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `p_id`, `booking_date`, `approval_time`, `doctor`, `approval`, `reason`, `staff_id`, `status`) VALUES
(1, 1, '2023-01-03', '05:31:00', 'Dr. Densil Indika', '1', 'cough', 0, 'ok'),
(4, 1, '2023-01-03', '07:28:00', 'Dr. Ayeshmantha Peris', '1', 'Eye pain', 0, 'no'),
(12, 1, '2023-01-20', '00:00:00', 'Dr. Malathi Adhikari', '0', 'Fever', 0, ''),
(13, 1, '2023-01-26', '00:00:00', 'Dr. Sampath Hemachandra', '0', 'Headache', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

DROP TABLE IF EXISTS `checkup`;
CREATE TABLE IF NOT EXISTS `checkup` (
  `checkup_id` int NOT NULL AUTO_INCREMENT,
  `checkup_name` varchar(200) NOT NULL,
  `doctor_comment` varchar(500) NOT NULL,
  `nurse_comment` varchar(500) NOT NULL,
  `checkup_date` date NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `p_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`checkup_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`checkup_id`, `checkup_name`, `doctor_comment`, `nurse_comment`, `checkup_date`, `diagnosis`, `p_id`, `staff_id`) VALUES
(1, 'PCR Test', 'Within two weeks', 'ok', '2022-12-15', '', 1, 31),
(3, 'Scan', 'Within two days', 'checkup done', '2022-12-12', '', 2, 13),
(4, 'Blood ', 'urgent', 'Done', '2022-12-12', '', 4, 13),
(6, 'Eye checkup', 'within two weeks', 'checkup should be done', '2022-12-25', '', 6, 13),
(7, 'Blood Test', 'Within a day', 'ok', '2022-12-23', '', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosis_id` int NOT NULL AUTO_INCREMENT,
  `diagnosis` varchar(200) NOT NULL,
  `diagnosis_date` date NOT NULL,
  `p_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`diagnosis_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `diagnosis`, `diagnosis_date`, `p_id`, `staff_id`) VALUES
(1, 'Covid', '2023-01-15', 1, 31),
(3, 'Apendicits', '2023-01-15', 2, 31),
(4, 'Dengue fever', '2021-01-30', 4, 13),
(5, 'Cold', '2021-01-30', 5, 13),
(6, 'Eye pain', '2021-01-30', 6, 13),
(7, 'Migrane', '2023-01-15', 1, 31),
(9, 'Fever', '2023-01-15', 3, 31),
(11, 'Fever', '2023-01-15', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doc_id` int NOT NULL,
  `doc_fname` varchar(200) NOT NULL,
  `doc_lname` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `qualifications` varchar(200) NOT NULL,
  `doc_fees` int NOT NULL,
  `available_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(200) NOT NULL,
  `file_size` int NOT NULL,
  `p_id` int NOT NULL,
  PRIMARY KEY (`file_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `file_name`, `file_size`, `p_id`) VALUES
(13, 'IMG_20210131_0004.pdf', 430299, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int NOT NULL,
  `id_number` varchar(300) NOT NULL,
  `address_line1` varchar(500) NOT NULL,
  `address_line2` varchar(500) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `civil_status` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `discharging_patient` varchar(50) NOT NULL,
  `staff_id` int NOT NULL,
  `w_id` int NOT NULL,
  `bed_number` int NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `fname`, `lname`, `birth_date`, `age`, `id_number`, `address_line1`, `address_line2`, `contact_no`, `gender`, `civil_status`, `password`, `discharging_patient`, `staff_id`, `w_id`, `bed_number`, `date`, `time`) VALUES
(1, 'Maneesha', 'Karunanayake', '1988-02-17', 33, '881234567', 'Detagamuwa', 'Kataragama', '0707893456', 'female', 'married', '5c67279555894478a22a969cc19e40d5', 'Admit', 0, 6, 4, '2021-01-30', '10:47:00.000000'),
(2, 'Eranga', 'Weerakoon', '1991-12-22', 29, '918573267', 'Rohanapura', 'Tissamaharama', '0710407782', 'female', 'single', '09155826ed37a4a5bfcc412a547a9641', 'Admit', 0, 2, 4, '2021-04-24', '07:20:00.000000'),
(3, 'Kapila', 'Wijesinghe', '1986-11-20', 34, '867654321', 'Mayurapura', 'Hambantota', '0719435080', 'male', 'married', '439da46832b341f615bcf60d5204cba6', 'Discharge', 0, 5, 15, '2021-01-30', '11:00:00.000000'),
(7, 'Chthra ', 'Nanayakkara', '1953-07-06', 68, '531234567', 'Medawelana', 'Tissamaharama', '0709433080', 'female', 'married', 'e4dcf6688f4da800329a653b571c8b3b', 'Admit', 0, 1, 0, '2021-02-01', '05:34:00.000000'),
(10, 'Asela', 'Muhandiram', '1969-04-09', 52, '691234567', 'Kahawaththa', 'Rathnapura', '0776458906', 'male', 'married', '38f65e07431c64970ccefc9c7fe46734', '', 0, 0, 0, '2021-04-24', '09:34:00.000000'),
(13, 'Samanthi', 'Perera', '1975-05-07', 46, '759013339', 'Dikwella', 'Matara', '07767787900', 'female', 'married', '5bb2eab526642726b44b1c8b0dd325d9', '', 0, 0, 0, '2021-05-01', '07:07:00.000000'),
(18, 'kalana', 'minipuraarachchi', '1999-06-23', 23, '19996578123', '58', 'kegalle', '0756987523', 'male', 'single', 'b4cafc10b2f5be19373042d6088c122a', '', 0, 0, 0, '2023-01-15', '12:32:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_clinic`
--

DROP TABLE IF EXISTS `schedule_clinic`;
CREATE TABLE IF NOT EXISTS `schedule_clinic` (
  `clinicname` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `starttime` time(6) NOT NULL,
  `endtime` time(6) NOT NULL,
  `doctorincharge` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule_clinic`
--

INSERT INTO `schedule_clinic` (`clinicname`, `date`, `starttime`, `endtime`, `doctorincharge`) VALUES
('Dental Clinic', '2023-01-17', '22:20:52.849000', '23:50:52.937000', 'Dr. Jagath Kumara'),
('[value-1]', '0000-00-00', '00:00:00.000000', '00:00:00.000000', '[value-5]'),
('ENT Clinic', '2023-01-20', '10:24:17.135000', '13:24:17.680000', 'Dr. Perera'),
('ENT Clinic', '2023-01-20', '10:24:17.135000', '13:24:17.680000', 'Dr. Perera'),
('Eye Clinic', '2023-01-31', '08:25:30.015000', '12:25:30.737000', 'Dr. N.Silva'),
('Eye Clinic', '2023-01-31', '08:25:30.015000', '12:25:30.737000', 'Dr. N.Silva');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `lname`, `user_type`, `user_name`, `password`, `email`) VALUES
(8, '', '', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(15, 'Prabath', 'Weerasiri', 'doctor', 'doctor', '075b3fa369bcd30706dca2b8505da02e', 'prabathweerasiri12@gmail.com'),
(17, 'Sampath', 'Hemachandra', 'doctor', 'doctor', 'c19a9475b9074c31d6e071a9f4222fe6', 'sampathhemchandra@gmail.com'),
(19, 'Nipuna', 'Ranaweera', 'doctor', 'doctor', 'f2581891633ed15a6517a1bb2f3f5c28', 'nipunaranaweera@gmail.com'),
(20, 'Chinthaka ', 'Gunarathne', 'doctor', 'doctor', '2df2d2c644b3597b56eb297e24719936', 'chinthakagunarathne1@gmail.com'),
(21, 'Nishantha', 'Gamage', 'doctor', 'doctor', '81a177dc6b65a514e8af9667508c0887', 'nishanthadgamage2@gmail.com'),
(22, 'Hiran', 'Hewage', 'doctor', 'doctor', '834c9df7553233a30b3f645850037df7', 'hiranhewage@gmail.com'),
(23, 'Mihira', 'Manamperi', 'doctor', 'doctor', '1e436494ac1fccc54fa3260bc85d44b6', 'mihiramanamperi@gmail.com'),
(24, 'Malathi', 'Adhikari', 'doctor', 'doctor', 'c44ea40ef37d38bced4bab9197565080', 'malathiliyanage@gmail.com'),
(25, 'Uditha', 'Hewavitharana', 'doctor', 'doctor', '5520d0da75a8557c30962c18bdff67a4', 'udithaihewavitharana@gmail.com'),
(26, 'Pradeep', 'Siriwardhane', 'doctor', 'doctor', 'febc8f8ac083f5fc27e032c81e7b536a', 'pradepsiriwardhane@gmail.com'),
(31, 'kavindu', 'maleesha', 'doctor', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'kavindu@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
