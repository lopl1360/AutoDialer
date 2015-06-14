-- MySQL dump 10.11
--
-- Host: localhost    Database: dialout
-- ------------------------------------------------------
-- Server version	5.0.95

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `black`
--

DROP TABLE IF EXISTS `black`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `black` (
  `id` int(11) NOT NULL auto_increment,
  `number` varchar(16) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `number` (`number`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cdr`
--

DROP TABLE IF EXISTS `cdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cdr` (
  `calldate` datetime NOT NULL default '0000-00-00 00:00:00',
  `clid` varchar(80) NOT NULL default '',
  `src` varchar(80) NOT NULL default '',
  `dst` varchar(80) NOT NULL default '',
  `dcontext` varchar(80) NOT NULL default '',
  `channel` varchar(80) NOT NULL default '',
  `dstchannel` varchar(80) NOT NULL default '',
  `lastapp` varchar(80) NOT NULL default '',
  `lastdata` varchar(80) NOT NULL default '',
  `duration` int(11) NOT NULL default '0',
  `billsec` int(11) NOT NULL default '0',
  `disposition` varchar(45) NOT NULL default '',
  `amaflags` int(11) NOT NULL default '0',
  `accountcode` varchar(20) NOT NULL default '',
  `uniqueid` varchar(32) NOT NULL default '',
  `userfield` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`uniqueid`),
  UNIQUE KEY `uniqueid_UNIQUE` (`uniqueid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class_list`
--

DROP TABLE IF EXISTS `class_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_list` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `enable` int(11) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1342 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fgusers`
--

DROP TABLE IF EXISTS `fgusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fgusers` (
  `id_user` int(11) NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) default NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `group_list`
--

DROP TABLE IF EXISTS `group_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_list` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `context` varchar(25) NOT NULL,
  `extension` varchar(25) default NULL,
  `priority` int(11) default '1',
  `caller_id` varchar(15) default '123456',
  `wait_time` int(11) default '60',
  `max_retry` int(11) default '3',
  `retry_time` int(11) default '300',
  `prefix` varchar(10) default NULL,
  `max_call` int(11) NOT NULL,
  `enable` int(11) default '1',
  `time_class` varchar(50) default NULL,
  `trunk` varchar(50) default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `input`
--

DROP TABLE IF EXISTS `input`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input` (
  `id` int(11) NOT NULL auto_increment,
  `number` varchar(30) NOT NULL,
  `group` varchar(30) NOT NULL,
  `class` varchar(50) NOT NULL,
  `try` int(11) default NULL,
  `last_date` datetime default '0000-00-00 00:00:00',
  `status` int(11) default '0',
  `hold` int(11) default '0',
  `edit_date` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `number` (`number`,`group`)
) ENGINE=MyISAM AUTO_INCREMENT=2528360 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master` (
  `id` int(11) NOT NULL auto_increment,
  `enable` int(11) NOT NULL,
  `days` varchar(50) default NULL,
  `hours` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `number_unique`
--

DROP TABLE IF EXISTS `number_unique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `number_unique` (
  `id` int(11) NOT NULL auto_increment,
  `number_id` int(11) NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`,`unique_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `queue_log`
--

DROP TABLE IF EXISTS `queue_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queue_log` (
  `id` int(10) NOT NULL auto_increment,
  `time` char(10) default NULL,
  `callid` varchar(32) NOT NULL default '',
  `queuename` varchar(32) NOT NULL default '',
  `agent` varchar(32) NOT NULL default '',
  `event` varchar(32) NOT NULL default '',
  `data` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2872759 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `queue_member_table`
--

DROP TABLE IF EXISTS `queue_member_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queue_member_table` (
  `uniqueid` int(10) unsigned NOT NULL auto_increment,
  `membername` varchar(40) default NULL,
  `queue_name` varchar(128) default NULL,
  `interface` varchar(128) default NULL,
  `penalty` int(11) default NULL,
  `paused` int(11) default NULL,
  PRIMARY KEY  (`uniqueid`),
  UNIQUE KEY `queue_interface` (`queue_name`,`interface`)
) ENGINE=MyISAM AUTO_INCREMENT=1318 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `queue_table`
--

DROP TABLE IF EXISTS `queue_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queue_table` (
  `name` varchar(128) NOT NULL,
  `musiconhold` varchar(128) default NULL,
  `announce` varchar(128) default NULL,
  `context` varchar(128) default NULL,
  `timeout` int(11) default NULL,
  `monitor_join` tinyint(1) default NULL,
  `monitor_format` varchar(128) default NULL,
  `queue_youarenext` varchar(128) default NULL,
  `queue_thereare` varchar(128) default NULL,
  `queue_callswaiting` varchar(128) default NULL,
  `queue_holdtime` varchar(128) default NULL,
  `queue_minutes` varchar(128) default NULL,
  `queue_seconds` varchar(128) default NULL,
  `queue_lessthan` varchar(128) default NULL,
  `queue_thankyou` varchar(128) default NULL,
  `queue_reporthold` varchar(128) default NULL,
  `announce_frequency` int(11) default NULL,
  `announce_round_seconds` int(11) default NULL,
  `announce_holdtime` varchar(128) default NULL,
  `retry` int(11) default NULL,
  `wrapuptime` int(11) default NULL,
  `maxlen` int(11) default NULL,
  `servicelevel` int(11) default NULL,
  `strategy` varchar(128) default NULL,
  `joinempty` varchar(128) default NULL,
  `leavewhenempty` varchar(128) default NULL,
  `eventmemberstatus` tinyint(1) default NULL,
  `eventwhencalled` tinyint(1) default NULL,
  `reportholdtime` tinyint(1) default NULL,
  `memberdelay` int(11) default NULL,
  `weight` int(11) default NULL,
  `timeoutrestart` tinyint(1) default NULL,
  `periodic_announce` varchar(50) default NULL,
  `periodic_announce_frequency` int(11) default NULL,
  `ringinuse` tinyint(1) default NULL,
  `setinterfacevar` tinyint(1) default NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `number` varchar(50) NOT NULL,
  PRIMARY KEY  (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `test1`
--

DROP TABLE IF EXISTS `test1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test1` (
  `number` varchar(50) NOT NULL,
  PRIMARY KEY  (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `test2`
--

DROP TABLE IF EXISTS `test2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test2` (
  `number` varchar(30) NOT NULL,
  PRIMARY KEY  (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `test3`
--

DROP TABLE IF EXISTS `test3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test3` (
  `number` varchar(50) NOT NULL,
  PRIMARY KEY  (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `time_key`
--

DROP TABLE IF EXISTS `time_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_key` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `desc` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `time_table`
--

DROP TABLE IF EXISTS `time_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_table` (
  `id` int(11) NOT NULL auto_increment,
  `FK_name` varchar(30) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `day` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  KEY `FK_name` (`FK_name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trunk`
--

DROP TABLE IF EXISTS `trunk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trunk` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `protocol` varchar(20) NOT NULL default 'SIP',
  `prefix` varchar(20) default NULL,
  `timeout` int(60) NOT NULL,
  `enable` int(1) NOT NULL,
  `priority` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `confirmcode` varchar(2) default 'y',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-14  6:28:26
