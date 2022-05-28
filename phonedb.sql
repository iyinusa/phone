-- phpMyAdmin SQL Dump\
-- version 4.2.10\
-- http://www.phpmyadmin.net\
--\
-- Host: localhost:3306\
-- Generation Time: Apr 23, 2015 at 01:38 PM\
-- Server version: 5.5.38\
-- PHP Version: 5.5.17\
\
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
--\
-- Database: `phonedb`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `phones`\
--\
\
CREATE TABLE `phones` (\
`id` int(11) NOT NULL,\
  `number` varchar(11) NOT NULL\
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;\
\
--\
-- Indexes for dumped tables\
--\
\
--\
-- Indexes for table `phones`\
--\
ALTER TABLE `phones`\
 ADD PRIMARY KEY (`id`);\
\
--\
-- AUTO_INCREMENT for dumped tables\
--\
\
--\
-- AUTO_INCREMENT for table `phones`\
--\
ALTER TABLE `phones`\
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;}