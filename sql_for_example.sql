
-- 
-- Table structure for table `properties`
-- 

CREATE TABLE `properties` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `address` varchar(100) collate latin1_german2_ci NOT NULL,
  `city` varchar(50) collate latin1_german2_ci NOT NULL,
  `state` char(2) collate latin1_german2_ci NOT NULL,
  `zip` char(5) collate latin1_german2_ci NOT NULL,
  `latitude` float(8,6) default NULL,
  `longitude` float(8,6) default NULL,
  `description` varchar(250) collate latin1_german2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `properties`
-- 

INSERT INTO `properties` VALUES (1, '3229 Derby Lane', 'Williamsburg', 'VA', '23185', 37.237194, -76.794449, 'this is a wonderfull place');
INSERT INTO `properties` VALUES (2, '1313 Jamestown Rd', 'Willimasburg', 'VA', '23185', 37.251236, -76.737198, 'wdtp is here, and so is <b>html</b>');
INSERT INTO `properties` VALUES (3, '4487 Pleasant Avenue', 'Norfolk', 'VA', '23518', 36.928055, -76.188629, '<img src="http://www.eastbeachnorfolk.com/images/listings/4725%20Pleasant%20Avenue_thumb.jpg"><br/> yadda yadda <br/> <a href="http://wdtp.com">wdtp.com</a>');
INSERT INTO `properties` VALUES (4, 'an invalid address', 'nowhere', 'NA', '12345', NULL, NULL, 'this is an invalid property');

