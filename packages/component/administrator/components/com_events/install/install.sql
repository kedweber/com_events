-- ----------------------------
--  Table structure for `#__events_events`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_events` (
  `events_event_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '61',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'event',
  `ordering` bigint(20) unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`events_event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `#__events_attendees`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_attendees` (
  `events_attendee_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'attendee',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `locked_on` datetime NOT NULL,
  `locked_by` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '62',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`events_attendee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `#__events_blocks`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_blocks` (
  `events_block_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'block',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `locked_on` datetime NOT NULL,
  `locked_by` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '67',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`events_block_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `#__events_days`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_days` (
  `events_day_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'day',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `locked_on` datetime NOT NULL,
  `locked_by` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '66',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`events_day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `#__events_organisations`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_organisations` (
  `events_organisation_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'organisation',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `locked_on` datetime NOT NULL,
  `locked_by` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '65',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`events_organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `#__events_rooms`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_rooms` (
  `events_room_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'room',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `locked_on` datetime NOT NULL,
  `locked_by` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`events_room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `#__events_venues`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__events_venues` (
  `events_venue_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'venue',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `locked_on` datetime NOT NULL,
  `locked_by` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '64',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`events_venue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


-- ----------------------------
--  Records of `#__cck_fieldsets`
-- ----------------------------
BEGIN;
REPLACE INTO `#__cck_fieldsets` (`cck_fieldset_id`, `title`, `slug`, `enabled`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`)
VALUES
	(200,'Event','event',1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,'Attendee','attendee',1,'2013-12-23 09:51:13',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,'Venue','venue',1,'2013-12-23 10:16:09',823,'2013-12-23 10:16:20',823,'0000-00-00 00:00:00',0),
	(65,'Organisation','organisation',1,'2013-12-23 11:29:13',823,'2013-12-23 11:29:20',823,'0000-00-00 00:00:00',0),
	(66,'Day','day',1,'2013-12-23 11:32:24',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(67,'Block','block',1,'2013-12-23 11:34:42',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);
COMMIT;

-- ----------------------------
--  Records of `#__cck_elements`
-- ----------------------------
BEGIN;
REPLACE INTO `#__cck_elements` (`cck_element_id`, `cck_type_id`, `label`, `title`, `slug`, `placeholder`, `required`, `validator`, `default`, `enabled`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`)
VALUES
	(2,7,'Subtitle','Subtitle','subtitle','',0,'','',1,'2013-12-23 09:46:48',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(3,1,'Event Type','Event Type','event-type','',0,'','',1,'2013-12-23 09:48:45',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(4,7,'Name','Name','name','',0,'','',1,'2013-12-23 09:51:35',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(5,5,'Bio','Bio','bio','',0,'','',1,'2013-12-23 09:52:17',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(6,6,'Avatar','Avatar','avatar','',0,'','',1,'2013-12-23 09:52:51',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(7,7,'Job Title','Job Title','job-title','',0,'','',1,'2013-12-23 09:53:32',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(8,7,'URL','URL','url','',0,'','',1,'2013-12-23 09:54:03',823,'2013-12-23 09:54:18',823,'0000-00-00 00:00:00',0),
	(9,5,'Fulltext','Fulltext','fulltext','',0,'','',1,'2013-12-23 09:54:34',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(10,10,'Date of Birth','Date of Birth','date-of-birth','',0,'','',1,'2013-12-23 09:55:08',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(11,7,'Address','Address','address','',0,'','',1,'2013-12-23 09:55:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(12,7,'Zipcode','Zipcode','zipcode','',0,'','',1,'2013-12-23 09:55:57',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(13,7,'City','City','city','',0,'','',1,'2013-12-23 09:57:12',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(14,7,'Region','Region','region','',0,'','',1,'2013-12-23 09:58:03',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(15,7,'Country','Country','country','',0,'','',1,'2013-12-23 09:58:19',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(16,7,'Email','Email','email','',0,'','',1,'2013-12-23 09:58:46',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(17,7,'Phone','Phone','phone','',0,'','',1,'2013-12-23 09:59:08',823,'2013-12-23 09:59:16',823,'0000-00-00 00:00:00',0),
	(18,7,'Google','Google','google','',0,'','',1,'2013-12-23 10:05:34',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(19,7,'Twitter','Twitter','twitter','',0,'','',1,'2013-12-23 10:05:52',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(20,7,'Facebook','Facebook','facebook','',0,'','',1,'2013-12-23 10:06:17',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(21,7,'LinkedIn','LinkedIn','linkedin','',0,'','',1,'2013-12-23 10:06:35',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(22,7,'Blog','Blog','blog','',0,'','',1,'2013-12-23 10:07:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(23,7,'Vimeo','Vimeo','vimeo','',0,'','',1,'2013-12-23 10:07:24',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(24,7,'Youtube','Youtube','youtube','',0,'','',1,'2013-12-23 10:07:43',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(25,7,'Slideshare','Slideshare','slideshare','',0,'','',1,'2013-12-23 10:08:04',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(26,1,'Attendee Type','Attendee Type','attendee-type','',0,'','',1,'2013-12-23 10:08:32',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(27,7,'Latitude','Latitude','latitude','',0,'','',1,'2013-12-23 10:18:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(28,7,'Longitude','Longitude','longitude','',0,'','',1,'2013-12-23 10:18:36',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(29,1,'Organisation Type','Organisation Type','organisation-type','',0,'','',1,'2013-12-23 11:30:36',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(30,10,'Date','Date','date-1','',0,'','',1,'2013-12-23 11:32:45',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(31,10,'Start Time','Start Time','start-time','',0,'','',1,'2013-12-23 11:33:43',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(32,10,'End Time','End Time','end-time','',0,'','',1,'2013-12-23 11:34:00',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);
COMMIT;
-- ----------------------------
--  Records of `#__cck_fieldsets_elements`
-- ----------------------------
BEGIN;
REPLACE INTO `#__cck_fieldsets_elements` (`cck_fieldset_id`, `cck_element_id`, `placholder`, `default`, `validator`, `required`, `ordering`, `enabled`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`)
VALUES
	(61,2,'','','',0,1,1,'2013-12-23 09:50:12',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(61,3,'','','',0,2,1,'2013-12-23 09:50:12',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,4,'','','',0,1,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,5,'','','',0,2,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,6,'','','',0,3,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,7,'','','',0,4,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,8,'','','',0,5,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,9,'','','',0,6,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,10,'','','',0,7,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,11,'','','',0,8,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,12,'','','',0,9,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,13,'','','',0,10,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,14,'','','',0,11,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,15,'','','',0,12,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,16,'','','',0,13,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,17,'','','',0,14,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,18,'','','',0,15,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,19,'','','',0,16,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,20,'','','',0,17,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,21,'','','',0,18,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,22,'','','',0,19,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,23,'','','',0,20,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,24,'','','',0,21,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(62,25,'','','',0,22,1,'2013-12-23 10:13:33',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,15,'','','',0,8,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,29,'','','',0,1,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,8,'','','',0,2,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,9,'','','',0,3,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,11,'','','',0,4,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,12,'','','',0,5,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,13,'','','',0,6,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(65,14,'','','',0,7,1,'2013-12-23 11:31:39',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,28,'','','',0,9,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,27,'','','',0,8,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,11,'','','',0,1,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,12,'','','',0,2,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,13,'','','',0,3,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,14,'','','',0,4,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,15,'','','',0,5,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,9,'','','',0,6,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(64,17,'','','',0,7,1,'2013-12-23 10:19:06',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(67,32,'','','',0,2,1,'2013-12-23 11:34:42',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(67,31,'','','',0,1,1,'2013-12-23 11:34:42',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(66,30,'','','',0,1,1,'2013-12-23 11:33:11',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);
COMMIT;
-- ----------------------------
--  Records of `#__cck_options`
-- ----------------------------
BEGIN;
REPLACE INTO `#__cck_options` (`cck_option_id`, `cck_element_id`, `title`, `value`, `ordering`, `enabled`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`)
VALUES
	(1,26,'Keynote','keynote',1,1,'2013-12-23 12:09:10',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(2,26,'Speaker','speaker',2,1,'2013-12-23 12:09:10',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(3,26,'Moderator','moderator',3,1,'2013-12-23 12:09:10',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(4,26,'Guest','guest',4,1,'2013-12-23 12:09:10',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(5,3,'Keynote','keynote',1,1,'2013-12-23 12:10:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(6,3,'Session','session',2,1,'2013-12-23 12:10:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(7,3,'Breakout Session','breakout-session',3,1,'2013-12-23 12:10:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(8,3,'Side Event','side-event',4,1,'2013-12-23 12:10:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(9,3,'Field Trip','field-trip',5,1,'2013-12-23 12:10:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(10,3,'Main Event','main-event',6,1,'2013-12-23 12:10:21',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(11,29,'General','general',1,1,'2013-12-23 12:10:53',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(12,29,'Gover','gover',2,1,'2013-12-23 12:10:53',823,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);
COMMIT;