-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_layout`
-- 

CREATE TABLE `tl_layout` (
  `jqt_useJQTouch` char(1) NOT NULL default '',
  `jqt_layoutType` varchar(64) NOT NULL default '',
  `jqt_showPreview` char(1) NOT NULL default '',
  `jqt_previewImage` varchar(255) NOT NULL default '',
  `jqt_previewSize` varchar(64) NOT NULL default '',
  `jqt_homeIcon` varchar(255) NOT NULL default '',
  `jqt_moreVariables` text NULL,
  `jqt_theme` varchar(64) NOT NULL default '',
  `jqt_framework` varchar(64) NOT NULL default '',
  `jqt_extensions` text NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

-- 
-- Table `tl_article`
-- 

CREATE TABLE `tl_article` (
  `jqt_toolbar` char(1) NOT NULL default '',
  `jqt_toolbarBackBtn` char(1) NOT NULL default '',
  `jqt_toolbarTitle` char(1) NOT NULL default '',
  `jqt_toolbarRightBtn` char(1) NOT NULL default '',
  `jqt_toolbarBackBtnTarget` varchar(255) NOT NULL default '',
  `jqt_toolbarBackBtnText` varchar(255) NOT NULL default '',
  `jqt_toolbarTitleText` varchar(255) NOT NULL default '',
  `jqt_toolbarRightBtnHtml` text NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;  
  
-- --------------------------------------------------------

-- 
-- Table `tl_form_field`
-- 

CREATE TABLE `tl_form_field` (
  `jqt_locationInput` int(10) unsigned NOT NULL default '0',
  `jqt_locationInputLat` int(10) unsigned NOT NULL default '0',
  `jqt_locationInputLng` int(10) unsigned NOT NULL default '0',
  `jqt_listitem` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
  