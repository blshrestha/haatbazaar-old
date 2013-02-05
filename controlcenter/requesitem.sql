# phpMyAdmin SQL Dump
# version 2.5.3
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Apr 15, 2007 at 12:32 PM
# Server version: 4.0.15
# PHP Version: 4.3.3
# 
# Database : `haatbazar`
# 

# --------------------------------------------------------

#
# Table structure for table `itemrequest`
#

CREATE TABLE `itemrequest` (
  `rqid` bigint(20) NOT NULL auto_increment,
  `itemid` bigint(20) default NULL,
  `ccid` varchar(50) default NULL,
  `requesteename` varchar(250) NOT NULL default 'non',
  `requesteeaddress` varchar(250) NOT NULL default '',
  `date` date default NULL,
  PRIMARY KEY  (`rqid`)
) TYPE=MyISAM COMMENT='id: itemid' AUTO_INCREMENT=10 ;

#
# Dumping data for table `itemrequest`
#

INSERT INTO `itemrequest` VALUES (1, 1, '5', '', '', '2005-11-02');
INSERT INTO `itemrequest` VALUES (4, 54, '', '', '', '2007-04-15');
INSERT INTO `itemrequest` VALUES (5, 55, '', '', '', '2007-04-15');
INSERT INTO `itemrequest` VALUES (6, 55, '', '', '', '2007-04-15');
INSERT INTO `itemrequest` VALUES (7, 55, '', '', '', '2007-04-15');
INSERT INTO `itemrequest` VALUES (8, 42, 'admin', 'ramesh', 'r', '2007-04-15');
INSERT INTO `itemrequest` VALUES (9, 42, 'admin', 'ramesh', 'r', '2007-04-15');
