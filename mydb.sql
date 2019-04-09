-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2012 at 06:30 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `forumid` int(11) NOT NULL AUTO_INCREMENT,
  `forumname` varchar(30) NOT NULL,
  PRIMARY KEY (`forumid`),
  UNIQUE KEY `forumname` (`forumname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`forumid`, `forumname`) VALUES
(1, 'Computer'),
(2, 'Information Technology'),
(3, 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE IF NOT EXISTS `mytable` (
  `Userid` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Userid`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`Userid`, `Username`, `Password`) VALUES
(1, '', 'admin'),
(2, 'akash', '123'),
(3, 'aman', '234'),
(4, 'ankita', '345'),
(5, 'dhruv', '456'),
(6, 'mohit', '567'),
(7, 'nilesh', '678'),
(8, 'tanuj', '789'),
(9, 'ujjwal', '890'),
(10, 'utkarsh', '000'),
(11, 'new', 'user'),
(12, 'tingu', 'pingu'),
(13, 'dhinka', 'chika'),
(14, 'ramesh', 'suresh');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(500) NOT NULL,
  `poster` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  PRIMARY KEY (`postid`),
  KEY `topicid` (`topicid`),
  KEY `poster` (`poster`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `post`, `poster`, `topicid`) VALUES
(1, '7 posts of lecturer are vacant!', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subforums`
--

CREATE TABLE IF NOT EXISTS `subforums` (
  `subforumid` int(11) NOT NULL AUTO_INCREMENT,
  `subforumname` varchar(30) NOT NULL,
  `forumid` int(11) NOT NULL,
  PRIMARY KEY (`subforumid`),
  KEY `forumid` (`forumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subforums`
--

INSERT INTO `subforums` (`subforumid`, `subforumname`, `forumid`) VALUES
(1, 'Faculty', 1),
(2, 'Students', 1),
(3, 'Recruiters', 1),
(4, 'Faculty', 2),
(5, 'Students', 2),
(6, 'Recruiters', 2),
(7, 'Faculty', 3),
(8, 'Recruiters', 3),
(9, 'Students', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topicid` int(11) NOT NULL AUTO_INCREMENT,
  `topicname` varchar(30) NOT NULL,
  `topicpost` varchar(500) NOT NULL,
  `poster` int(11) NOT NULL,
  `subforumid` int(11) NOT NULL,
  PRIMARY KEY (`topicid`),
  KEY `poster` (`poster`),
  KEY `subforumid` (`subforumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicid`, `topicname`, `topicpost`, `poster`, `subforumid`) VALUES
(1, 'Vacancies', 'How many vacancies are there in COE Dept?', 12, 1),
(2, 'Salary', 'What is the average salary of a lecturer? ', 12, 1),
(3, 'Admission', 'How to get admission here?', 12, 2),
(4, 'Studies', 'Which books should I refer?', 12, 2),
(5, 'Toppers', 'Who have been the toppers of their respective batches in previous semesters?', 12, 3),
(6, 'Interviews', 'When do you want to schedule your interviews?', 12, 3),
(7, 'Vacancies', 'How many posts are vacant?', 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `Username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `admin`) VALUES
(1, 'admin1', 'admin', 'admin1@forum.com', 1),
(2, 'akash', '123', 'akash@forum.com', 0),
(3, 'aman', '234', 'aman@forum.com', 0),
(4, 'ankita', '345', 'ankita@forum.com', 0),
(5, 'dhruv', '456', 'dhruv@forum.com', 1),
(6, 'mohit', '567', 'mohit@forum.com', 0),
(7, 'nilesh', '678', 'nilesh@forum.com', 0),
(8, 'tanuj', '789', 'tanuj@forum.com', 0),
(9, 'ujjwal', '890', 'ujjwal@forum.com', 0),
(10, 'utkarsh', '000', 'utkarsh@forum.com', 1),
(11, 'new', 'user', 'new@forum.com', 0),
(12, 'dummy admin', 'admin', 'dummy@forum.com', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topicid`) REFERENCES `topics` (`topicid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `users` (`Userid`) ON UPDATE CASCADE;

--
-- Constraints for table `subforums`
--
ALTER TABLE `subforums`
  ADD CONSTRAINT `subforums_ibfk_1` FOREIGN KEY (`forumid`) REFERENCES `forums` (`forumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `users` (`Userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `users` (`Userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_3` FOREIGN KEY (`subforumid`) REFERENCES `subforums` (`subforumid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
