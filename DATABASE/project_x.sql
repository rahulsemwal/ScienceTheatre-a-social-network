-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2014 at 02:17 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_x`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `d_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `u_id` bigint(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `link` varchar(100) NOT NULL,
  `submit_date` date NOT NULL,
  `like` bigint(111) NOT NULL DEFAULT '0',
  `update` bigint(111) NOT NULL DEFAULT '0',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`d_id`, `u_id`, `title`, `discription`, `link`, `submit_date`, `like`, `update`, `enable`) VALUES
(2, 2, 'next document', 'ha ha h a ah ah ah a this is my new document share..please clap for this', 'document/KNOWLEDGE PORTAL.pptx', '2014-05-05', 1, 1, 1),
(4, 2, '4th', 'clks ksdl klsd', 'document/1.html.ep', '2014-05-05', 0, 1, 1),
(5, 2, 'jkb', 'kh', 'document/10152547_560667760712726_1030136431254670049_n.jpg', '2014-05-05', 0, 1, 1),
(6, 2, 'hvjhv', ' hjbvb jhb', 'document/sms_datbase_design.docx', '2014-05-05', 1, 1, 1),
(7, 2, 'jbj', 'jkbjh', 'document/om shanti om.mp3', '2014-05-05', 0, 1, 1),
(9, 2, 'check clap', 'check it out first', 'document/b2.rtf', '2014-05-05', 2, 1, 1),
(10, 1, 'rahul semwal', 'checking purpose', 'document/bha4.docx', '2014-05-18', 0, 1, 1),
(11, 1, 'rahul semwal', 'checking purpose', 'document/bha8.docx', '2014-05-18', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_clap`
--

CREATE TABLE IF NOT EXISTS `document_clap` (
  `dc` bigint(11) NOT NULL AUTO_INCREMENT,
  `d_id` bigint(11) NOT NULL,
  `u_id` bigint(11) NOT NULL,
  `clap` tinyint(1) NOT NULL DEFAULT '1',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `document_clap`
--

INSERT INTO `document_clap` (`dc`, `d_id`, `u_id`, `clap`, `enable`) VALUES
(4, 9, 1, 1, 1),
(6, 9, 2, 1, 1),
(7, 2, 2, 1, 1),
(8, 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_cse`
--

CREATE TABLE IF NOT EXISTS `faculty_cse` (
  `f_id` int(2) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `f_username` varchar(30) NOT NULL,
  `f_password` varchar(30) NOT NULL,
  `f_dob` date DEFAULT NULL,
  `email_id` varchar(30) DEFAULT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `enable` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `faculty_cse`
--

INSERT INTO `faculty_cse` (`f_id`, `f_name`, `f_username`, `f_password`, `f_dob`, `email_id`, `phone_no`, `enable`) VALUES
(1, 'dr.kuwar singh vaisla', 'ksv', 'ksv', NULL, NULL, NULL, 1),
(2, 'mr.pijush k. dutta', 'pd', 'pd', NULL, NULL, NULL, 1),
(3, 'mr.narayan chandger', 'nc', 'nc', NULL, NULL, NULL, 1),
(4, 'mr.ramesh chand belwal', 'rcb', 'rcb', NULL, NULL, NULL, 1),
(5, 'mr.vishal gupta', 'vg', 'vg', NULL, NULL, NULL, 1),
(6, 'mr. ashis saklani', 'as', 'as', NULL, NULL, NULL, 1),
(7, 'mr. sachin gaur', 'sg', 'sg', NULL, NULL, NULL, 1),
(8, 'ms.bhawana parihar', 'bp', 'bp', NULL, NULL, NULL, 1),
(9, 'mrs.anindita saha', 'as', 'as', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_box`
--

CREATE TABLE IF NOT EXISTS `query_box` (
  `q_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `u_id` bigint(11) NOT NULL,
  `query` varchar(10000) NOT NULL,
  `att_name` varchar(1000) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `submit_date` date NOT NULL,
  `like` bigint(111) NOT NULL DEFAULT '0',
  `update` bigint(111) NOT NULL DEFAULT '0',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `query_box`
--

INSERT INTO `query_box` (`q_id`, `u_id`, `query`, `att_name`, `link`, `submit_date`, `like`, `update`, `enable`) VALUES
(1, 1, 'i am facing problem with PL/SQL,can any buddy suggest me a good solution for it.', NULL, NULL, '2014-05-08', 2, 0, 1),
(2, 2, 'can any body tell me that how to make search engine like google...pls hurry up', NULL, NULL, '2014-05-09', 1, 0, 1),
(3, 1, 'hello professors and my dear frds can u provide me the code of prime no in c#.pls ', NULL, NULL, '2014-05-09', 0, 0, 1),
(4, 1, 'do some thing innovative', NULL, NULL, '2014-05-10', 0, 0, 1),
(5, 2, 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', NULL, NULL, '2014-05-10', 1, 0, 1),
(6, 2, 'hi i have problem in cj dates rules..\r\n ... any one can help me..', NULL, NULL, '2014-05-10', 1, 0, 1),
(7, 2, 'hlo...sir..\r\n', NULL, NULL, '2014-05-10', 0, 0, 1),
(8, 2, 'hlo...sir..\r\n', NULL, NULL, '2014-05-10', 0, 0, 1),
(9, 2, 'hi i hav pblm about 2pass of macro anybody explain', NULL, NULL, '2014-05-10', 0, 0, 1),
(10, 1, 'good morning to all of you.please provide me guide line for embeded system programming.', NULL, NULL, '2014-05-16', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_clap`
--

CREATE TABLE IF NOT EXISTS `query_clap` (
  `qcl_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `q_id` bigint(11) NOT NULL,
  `u_id` bigint(11) NOT NULL,
  `clap` tinyint(1) NOT NULL DEFAULT '1',
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`qcl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `query_clap`
--

INSERT INTO `query_clap` (`qcl_id`, `q_id`, `u_id`, `clap`, `enable`) VALUES
(2, 1, 2, 1, 1),
(3, 2, 1, 1, 1),
(4, 5, 2, 1, 1),
(5, 6, 1, 1, 1),
(6, 10, 2, 1, 1),
(7, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_comment`
--

CREATE TABLE IF NOT EXISTS `query_comment` (
  `qc_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `u_id` bigint(11) NOT NULL,
  `q_id` bigint(11) NOT NULL,
  `comment` varchar(10000) NOT NULL,
  `submit_date` date NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`qc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `query_comment`
--

INSERT INTO `query_comment` (`qc_id`, `u_id`, `q_id`, `comment`, `submit_date`, `enable`) VALUES
(1, 1, 2, 'i can solve this problem dear', '2014-05-09', 1),
(2, 2, 3, 'yes i have a code', '2014-05-09', 1),
(3, 1, 3, 'hi', '2014-05-10', 1),
(4, 2, 3, 'bye', '2014-05-10', 1),
(5, 2, 2, 'hello', '2014-05-10', 1),
(6, 1, 3, 'first give me answer of my question', '2014-05-10', 1),
(7, 1, 2, 'nop this is not right answer my dear frd', '2014-05-10', 1),
(8, 2, 5, 'kjbkjbkjbknklnl', '2014-05-10', 1),
(9, 1, 8, 'hi....\r\n', '2014-05-10', 1),
(10, 1, 6, 'there is twelve rules of cj.. ...u can study with cj date book of data base manangement\r\n', '2014-05-10', 1),
(11, 2, 8, 'can you tell mee about sixth sense\r\n', '2014-05-10', 1),
(12, 1, 9, 'check it out dangwal video', '2014-05-15', 1),
(13, 1, 8, 'check it out dangwal video', '2014-05-15', 1),
(14, 1, 10, 'yups read research papers of embeded system. ', '2014-05-16', 1),
(15, 2, 10, 'ya thats good.', '2014-05-16', 1),
(16, 2, 10, 'o teriiii', '2014-05-16', 1),
(17, 2, 10, 'o teriiii', '2014-05-16', 1),
(18, 2, 10, 'o teriiii', '2014-05-16', 1),
(19, 2, 10, 'o teriiii', '2014-05-16', 1),
(20, 2, 10, 'good', '2014-05-16', 1),
(21, 1, 10, 'goog\r\n', '2014-05-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `prof_pic` varchar(50) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `cv_name` varchar(50) DEFAULT NULL,
  `cv_link` varchar(100) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `username`, `password`, `dob`, `prof_pic`, `gender`, `profession`, `cv_name`, `cv_link`, `enable`) VALUES
(1, 'rahulsemwal', 'rahulsemwal@bucket.com', 'rahulsemwal', '1991-01-15', 'prof_pic/rahul.jpg', NULL, NULL, NULL, NULL, 1),
(2, 'dheeraj', 'dheerajsharma@bucket.com', 'dheerajsharma', '1991-01-15', 'prof_pic/dheeraj.jpg', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `v_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `u_id` bigint(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `link` varchar(100) NOT NULL,
  `submit_date` date NOT NULL,
  `like` bigint(111) NOT NULL DEFAULT '0',
  `update` bigint(111) NOT NULL DEFAULT '0',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`v_id`, `u_id`, `title`, `discription`, `link`, `submit_date`, `like`, `update`, `enable`) VALUES
(1, 1, 'my first video', 'this about some thing different....', 'video/Garik Israelian (Spectroscopy) (2009).mp4', '2014-05-17', 0, 1, 1),
(2, 1, '2nd video', 'this is really superb research', 'video/Mark Shaw (Water) (2013).mp4', '2014-05-18', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_clap`
--

CREATE TABLE IF NOT EXISTS `video_clap` (
  `vc_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `v_id` bigint(11) NOT NULL,
  `u_id` bigint(11) NOT NULL,
  `clap` tinyint(1) NOT NULL DEFAULT '1',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
