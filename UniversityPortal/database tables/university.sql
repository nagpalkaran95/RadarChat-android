-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 03:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `domain` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(13) CHARACTER SET utf8 NOT NULL,
  `campus_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `stu_id` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `attendance_r` char(1) CHARACTER SET utf8 NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`stu_id`,`campus_id`,`date`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`stu_id`, `campus_id`, `date`, `time`, `attendance_r`, `teacher_id`, `course_id`) VALUES
(3093, 2, '2015-11-30', '09:00:00', 'P', 9999, '188'),
(9914103, 2, '2015-11-11', '09:00:00', 'P', 9999, '188'),
(9914103, 2, '2015-11-30', '09:00:00', 'A', 9999, '188'),
(9914103, 2, '2015-11-30', '10:00:00', 'A', 9999, '189');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `u_id` bigint(12) NOT NULL,
  `u_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `c_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`u_id`, `u_name`, `c_name`) VALUES
(3094, 'Ani', 'Amazon'),
(9914103065, 'kshitij jaiswal', 'microsoft'),
(9914103085, 'karan', 'google'),
(9914103091, 'karan', 'google');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(10) CHARACTER SET utf8 NOT NULL,
  `course_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `credit` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `credit`, `dept_id`, `teacher_id`) VALUES
('188', 'DBMS', 4, 1, 9999),
('189', 'DBMS lab', 1, 1, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `hod` varchar(25) CHARACTER SET utf8 NOT NULL,
  `campus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `course_id` varchar(10) CHARACTER SET utf8 NOT NULL,
  `stu_id` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `exam_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `marks` float NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`stu_id`,`campus_id`,`exam_code`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`course_id`, `stu_id`, `campus_id`, `exam_code`, `marks`, `teacher_id`) VALUES
('188', 3093, 2, 'T1', 18, 9999),
('188', 3093, 2, 'T3', 18, 9999),
('188', 9914103, 1, 'EXAM', 14, 9999),
('188', 9914103, 2, 'T1', 19, 9999),
('188', 9914103, 2, 'T3', 20, 9999),
('189', 9914103, 2, 'T1', 20, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `non_teaching_faculty`
--

CREATE TABLE IF NOT EXISTS `non_teaching_faculty` (
  `id` bigint(12) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(16) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `desgination` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_teaching_faculty`
--

INSERT INTO `non_teaching_faculty` (`id`, `name`, `password`, `campus_id`, `desgination`) VALUES
(3094, 'Animesh', 'animesh', 2, 'qdw');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `programme` text CHARACTER SET utf8 NOT NULL,
  `batch` varchar(3) CHARACTER SET utf8 NOT NULL,
  `year` int(11) NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 NOT NULL,
  `ques` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ans` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `dob`, `address`, `phone_no`, `campus_id`, `programme`, `batch`, `year`, `password`, `ques`, `ans`) VALUES
(3093, 'Rishabh Srivastava', '1996-05-18', 'Andrews GAnj', 8447196947, 2, 'CSE', 'f3', 2, 'rishabh123', 'who is your favourite actor? ', 'RDJ'),
(9914103, 'karan nagpal', '2015-11-10', 'f-48,old double storey', 8862228584, 2, 'CSE', 'f3', 2, '298085AR', 'who is your favourite actor? ', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 NOT NULL,
  `dept_id` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `ans` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `password`, `dept_id`, `campus_id`, `ans`) VALUES
(9999, 'Udbhav', 'karan', 1, 2, 'alloo');

-- --------------------------------------------------------

--
-- Table structure for table `teaches_batch`
--

CREATE TABLE IF NOT EXISTS `teaches_batch` (
  `teacher_id` int(11) NOT NULL,
  `teaches_year` int(4) NOT NULL,
  `batches` varchar(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches_batch`
--

INSERT INTO `teaches_batch` (`teacher_id`, `teaches_year`, `batches`) VALUES
(9999, 2, 'F3'),
(9999, 2, 'F4');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `campus_id` int(11) NOT NULL,
  `location` varchar(25) CHARACTER SET utf8 NOT NULL,
  `prog_offered` int(11) NOT NULL,
  PRIMARY KEY (`campus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
