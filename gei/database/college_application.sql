-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2019 at 04:01 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `college_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otpkey` varchar(20) NOT NULL,
  `sms_st` int(11) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cdate` varchar(20) NOT NULL,
  `hour` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `user`, `otp`, `otpkey`, `sms_st`, `mobile`, `email`, `cdate`, `hour`, `minute`) VALUES
('admin', 'admin', 'Admin', 'No', '', 0, 9942575354, 'kvetrivelmca1997@gmail.com', '02-05-2019', 18, 30),
('chairman', '1234', 'chairman', 'No', '', 0, 9952672308, 'mohanok6@gmail.com', '', 0, 0),
('geicertificate', '1234', 'Certificate', 'No', '', 0, 0, 'jaikrishnamoorthi@gmail.com', '', 0, 0),
('geigate', '1234', 'Gate', 'No', '', 0, 0, 'jaikrishnamoorthi@gmail.com', '', 0, 0),
('geireception', '5555', 'Reception', 'No', '', 0, 0, 'kvetrivelmca1997@gmail.com', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cutoff`
--

CREATE TABLE `cutoff` (
  `id` int(11) NOT NULL,
  `Degree` varchar(100) NOT NULL,
  `Dept` varchar(100) NOT NULL,
  `cutoff` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutoff`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `code` varchar(20) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `community` varchar(255) NOT NULL,
  `gq` double NOT NULL,
  `gqfees` double NOT NULL,
  `mq` double NOT NULL,
  `mqfees` double NOT NULL,
  `fill_mq` varchar(255) NOT NULL default '0',
  `fill_gq` varchar(255) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`) VALUES
(1, 'Trichy'),
(2, 'NAMAKKAL'),
(3, 'SALEM');

-- --------------------------------------------------------

--
-- Table structure for table `msg_cnt`
--

CREATE TABLE `msg_cnt` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `msg_cnt`
--

INSERT INTO `msg_cnt` (`id`, `name`, `header`) VALUES
(1, 'Reception', 'Welcome to Gnanamani Educational Institutions: Dear {$sname}, your Details are Registerred, Your Enquiry No is:{$eno}'),
(2, 'Report', 'Admission is on {$rdate} , {$mgg}      '),
(5, 'admin', 'Gnanamani Educational Institutions: Dear {$sname}, Admission No:{$adminno}, Total Fees: Rs. {$total}, Deduction: Rs. {$dedu}, Paid Amount: Rs. {$amount}, Balance: Rs.{$bal}'),
(6, 'pending', 'Dear {$sname}, Admission No:{$adm}, Total Fees: Rs. {$total}, Discount: Rs. {$discount}, Paid Amount: Rs. {$amount}'),
(7, 'total admission', 'Today''s total admission as on {$rdate} - {$n1}'),
(8, 'Enquires', 'Today''s Enquires  as on {$rdate}  - {$n2}'),
(9, 'cancellation', 'Total cancellation as on {$rdate} - {$ca}'),
(10, 'remaining', 'Total Seats Remaining \\n {$re}');

-- --------------------------------------------------------

--
-- Table structure for table `msg_time`
--

CREATE TABLE `msg_time` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) default NULL,
  `auto` varchar(255) NOT NULL default 'No',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `msg_time`
--

INSERT INTO `msg_time` (`id`, `name`, `time`, `auto`) VALUES
(1, 'Total Admission SMS', '13:03', 'No'),
(2, 'Remaining Admission Count SMS', '13:03', 'Yes'),
(3, 'Cancelation Count SMS', '04:03', 'No'),
(4, 'Enguiry count SMS', '14:22', 'Yes'),
(5, 'Send Report Mail', '13:12', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `refer1`
--

CREATE TABLE `refer1` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cellno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer1`
--

INSERT INTO `refer1` (`id`, `name`, `address`, `cellno`, `email`) VALUES
(1, 'KEERTHANA', 'CSE', '9098765421', 'kvetrivel@gmail.com'),
(2, 'SAKTHIVEL G', 'FINAL MCA', '9976424501', 'sakthivelbsc@gmail.com'),
(3, 'VETRIVEL K', 'MCA', '9942575354', 'kvetrivelmca1997@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `refer2`
--

CREATE TABLE `refer2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cellno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer2`
--

INSERT INTO `refer2` (`id`, `name`, `address`, `cellno`, `email`) VALUES
(1, 'MURUGAN P CSE', 'AP/CSE', '9942575354', 'kvetrivelmca1997@gmail.com'),
(2, 'T.GEETHA', 'HOD/MCA', '7867013076', 'hodmca@gct.org.in'),
(3, 'VETRIVEL K / ERP', 'ERP OPERATOR', '9942575354', 'kvetrivelmca1997@gmail.com'),
(4, 'SAVITHA ', 'RECEPTIONIST', '9976121725', 'savitha@gmail.com'),
(5, 'THENMOZHI', 'BURSER', '9942575354', 'kvetrivelmca1997@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `refer3`
--

CREATE TABLE `refer3` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cellno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer3`
--

INSERT INTO `refer3` (`id`, `name`, `address`, `cellno`, `email`) VALUES
(1, 'EVEREST CONSULTANCY', 'RASIPURAM', '9095511065', 'fygjhkl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `refer4`
--

CREATE TABLE `refer4` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cellno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer4`
--

INSERT INTO `refer4` (`id`, `name`, `address`, `cellno`, `email`) VALUES
(1, 'Direct - Gnanamani', 'GNANAMANI EDUCATIONAL INSTITUTIONS', '9087654321', 'info@gct.org.in');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(1, 'Tamilnadu');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL auto_increment,
  `utype` varchar(20) NOT NULL,
  `entryby` varchar(20) NOT NULL,
  `eno` varchar(20) NOT NULL,
  `adminno` varchar(30) NOT NULL,
  `gpass` varchar(30) NOT NULL,
  `adate` varchar(30) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `entry` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `pre_degree` varchar(20) NOT NULL,
  `pre_college` varchar(100) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `refer` varchar(20) NOT NULL,
  `ref_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `community` varchar(30) NOT NULL,
  `income` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `sslcmark` varchar(30) NOT NULL,
  `sslc_per` double NOT NULL,
  `pincode` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `boardplace` varchar(30) NOT NULL,
  `hqualifi` varchar(30) NOT NULL,
  `regno` varchar(30) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `medium` varchar(30) NOT NULL,
  `caddress` varchar(100) NOT NULL,
  `tot_mark` int(11) NOT NULL,
  `maths` varchar(30) NOT NULL,
  `physics` varchar(30) NOT NULL,
  `chemistry` varchar(30) NOT NULL,
  `pcm` varchar(30) NOT NULL,
  `graduate` varchar(30) NOT NULL,
  `cutoff` varchar(30) NOT NULL,
  `subj` varchar(30) NOT NULL,
  `tmark` varchar(30) NOT NULL,
  `pmark` varchar(30) NOT NULL,
  `degree1` varchar(30) NOT NULL,
  `dsubj` varchar(30) NOT NULL,
  `dtmarks` varchar(30) NOT NULL,
  `dpmarks` varchar(30) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `total` double NOT NULL,
  `fees` double NOT NULL,
  `deduction` double NOT NULL,
  `paid` double NOT NULL,
  `dyear` varchar(20) NOT NULL,
  `xerox` int(11) NOT NULL,
  `photo` int(11) NOT NULL,
  `college` varchar(20) NOT NULL,
  `merit` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `govt` varchar(20) NOT NULL,
  `camount` int(11) NOT NULL,
  `dyear1` varchar(30) NOT NULL,
  `dyear2` varchar(30) NOT NULL,
  `reduce1` double NOT NULL,
  `reduce2` double NOT NULL,
  `balance` double NOT NULL,
  `status` int(11) NOT NULL,
  `dtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `approved_by` varchar(255) default NULL,
  `reason` varchar(255) default NULL,
  `cancel_on` date default NULL,
  `certificate_issue` varchar(255) default NULL,
  `issue_reason` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


