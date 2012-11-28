-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2012 at 10:28 PM
-- Server version: 5.0.95
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `gc_address`
--

CREATE TABLE IF NOT EXISTS `gc_address` (
  `id_address` int(10) unsigned NOT NULL auto_increment,
  `id_destination` int(10) unsigned default NULL,
  `id_country` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned default NULL,
  `address_code` char(6) NOT NULL default '001001',
  `alias` varchar(32) NOT NULL,
  `company` varchar(32) default NULL,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) default NULL,
  `postcode` varchar(12) default NULL,
  `city` varchar(64) NOT NULL,
  `other` text,
  `phone` varchar(16) default NULL,
  `phone_mobile` varchar(16) default NULL,
  `vat_number` varchar(32) default NULL,
  `dni` varchar(16) default NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `note` text,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '1',
  `deleted` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_address`),
  KEY `id_country` (`id_country`),
  KEY `id_state` (`id_state`),
  KEY `gc_address_ibfk_4` (`id_destination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gc_address`
--

INSERT INTO `gc_address` (`id_address`, `id_destination`, `id_country`, `id_state`, `address_code`, `alias`, `company`, `lastname`, `firstname`, `address1`, `address2`, `postcode`, `city`, `other`, `phone`, `phone_mobile`, `vat_number`, `dni`, `date_add`, `date_upd`, `active`, `deleted`) VALUES
(1, 2, 24, 316, '001001', '001001', 'gna', 'Lee', 'Eric', '432 fdfsd', 'fdsfdsa', '2072', 'sydney', '', '6123212321', '6123212321', '', '', '0000-00-00 00:00:00', '2012-11-20 00:18:21', 1, 0),
(2, NULL, 24, 316, '001002', '001002', '', 'Lee', 'Eric', '432 fdfsd', 'delivery', '2072', 'sydney', '', '6123212321', '6123212321', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, NULL, 24, 316, '001003', '001003', 'gna', 'eric', 'lee', 'fdsaf', '32', '2072', 'sydney', '', '', '', '', '', '2012-11-16 22:17:07', '2012-11-16 22:17:07', 1, 0),
(5, 2, 24, 316, '001001', '001001', 'gna', 'Lastname', 'Firstname', 'Address1', '12345', '2072', 'sydney', '', '', '', '', '', '2012-11-28 02:38:15', '2012-11-28 02:55:56', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_attachment`
--

CREATE TABLE IF NOT EXISTS `gc_attachment` (
  `id_attachment` int(10) unsigned NOT NULL auto_increment,
  `file` varchar(40) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `mime` varchar(128) NOT NULL,
  PRIMARY KEY  (`id_attachment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gc_attachment`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_attribute`
--

CREATE TABLE IF NOT EXISTS `gc_attribute` (
  `id_attribute` int(10) unsigned NOT NULL auto_increment,
  `id_attribute_group` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `attr_type` enum('textfield','textarea','checkbox','radiobox') NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '1',
  `position` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_attribute`),
  KEY `id_attribute_group` (`id_attribute_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gc_attribute`
--

INSERT INTO `gc_attribute` (`id_attribute`, `id_attribute_group`, `name`, `attr_type`, `active`, `position`) VALUES
(1, 1, 'Room Features', 'checkbox', 1, 0),
(2, 1, 'Laundry Facilities', 'checkbox', 1, 0),
(3, 1, 'General Amenities', 'checkbox', 1, 0),
(4, 1, 'Internet', 'checkbox', 1, 0),
(5, 1, 'Bathroom Features', 'checkbox', 1, 0),
(6, 1, 'Climate control', 'checkbox', 1, 0),
(7, 1, 'Kitchen Features', 'checkbox', 1, 0),
(8, 1, 'Entertainment', 'checkbox', 1, 0),
(9, 2, 'Property Features', 'checkbox', 1, 0),
(10, 2, 'Inhouse dining', 'checkbox', 1, 0),
(11, 2, 'Swimming pools', 'checkbox', 1, 0),
(12, 2, 'Car parking', 'checkbox', 1, 0),
(13, 2, 'Guest services', 'checkbox', 1, 0),
(14, 2, 'Recreation facilities', 'checkbox', 1, 0),
(15, 2, 'Miscellaneous', 'checkbox', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_attribute_group`
--

CREATE TABLE IF NOT EXISTS `gc_attribute_group` (
  `id_attribute_group` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY  (`id_attribute_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gc_attribute_group`
--

INSERT INTO `gc_attribute_group` (`id_attribute_group`, `name`) VALUES
(1, 'Room Facilities'),
(2, 'Supplier Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `gc_attribute_item`
--

CREATE TABLE IF NOT EXISTS `gc_attribute_item` (
  `id_attribute_item` int(10) unsigned NOT NULL auto_increment,
  `id_attribute` int(10) unsigned NOT NULL,
  `item` varchar(300) NOT NULL,
  `position` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_attribute_item`),
  KEY `id_attribute` (`id_attribute`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `gc_attribute_item`
--

INSERT INTO `gc_attribute_item` (`id_attribute_item`, `id_attribute`, `item`, `position`) VALUES
(1, 1, 'Balcony / courtyard', 0),
(2, 1, 'Desk', 0),
(3, 1, 'Opening windows', 0),
(4, 1, 'Non-smoking only', 0),
(5, 1, 'Non-smoking or smoking rooms on request', 0),
(6, 2, 'Washing machine', 0),
(7, 2, 'Dryer', 0),
(8, 2, 'Iron & ironing board', 0),
(9, 2, 'Trouser press', 0),
(10, 2, 'Clothes line / airer', 0),
(11, 3, 'Hairdryer', 0),
(12, 3, 'Alarm clock', 0),
(13, 3, 'Radio', 0),
(14, 3, 'Bathrobes', 0),
(15, 4, 'Dial-up', 0),
(16, 4, 'Broadband', 0),
(17, 4, 'Wireless / WiFi', 0),
(18, 5, 'Separate shower & bath', 0),
(19, 5, 'Shower over bath', 0),
(20, 5, 'Shower', 0),
(21, 5, 'Bath', 0),
(22, 5, 'In-room spa bath / Jacuzzi', 0),
(23, 5, 'Shared bathroom', 0),
(24, 6, 'Air conditioning', 0),
(25, 6, 'Fireplace', 0),
(26, 6, 'In-room heater', 0),
(27, 6, 'Under-floor heating', 0),
(28, 6, 'Ceiling fans', 0),
(29, 6, 'Fans', 0),
(30, 7, 'Full kitchen', 0),
(31, 7, 'Kitchenette (basic facilities)', 0),
(32, 7, 'Tea/Coffee Making', 0),
(33, 7, 'Dishwasher', 0),
(34, 7, 'Mini bar', 0),
(35, 7, 'Refrigerator - full size', 0),
(36, 7, 'Refrigerator - bar size', 0),
(37, 8, 'TV', 0),
(38, 8, 'Satellite / Cable', 0),
(39, 8, 'Pay-per-view movies', 0),
(40, 8, 'Free in-house movies', 0),
(41, 8, 'DVD player', 0),
(42, 8, 'CD player', 0),
(43, 8, 'Game console', 0),
(88, 9, 'Gay friendly', 0),
(89, 9, 'Pets allowed', 0),
(90, 9, 'Not suitable for children', 0),
(91, 9, 'Non-smoking property', 0),
(92, 9, 'Non-smoking floors', 0),
(93, 11, 'Indoor pool - heated', 0),
(94, 11, 'Indoor pool - unheated', 0),
(95, 11, 'Outdoor pool - heated', 0),
(96, 11, 'Outdoor pool - unheated', 0),
(97, 11, 'Kids pool', 0),
(98, 11, 'Swim-up bar', 0),
(99, 11, 'Pool bar', 0),
(100, 12, 'On-site parking', 0),
(101, 12, 'On-site undercover parking', 0),
(102, 12, 'On-site secure undercover parking', 0),
(103, 12, 'Off-site undercover parking', 0),
(104, 12, 'Off-site secure undercover parking', 0),
(105, 12, 'Street parking', 0),
(106, 12, 'Valet parking', 0),
(107, 13, 'Dry cleaning / laundry service', 0),
(108, 13, 'Self service laundry facilities', 0),
(109, 13, 'Tour desk', 0),
(110, 13, '24 hour front desk', 0),
(111, 13, 'Concierge', 0),
(112, 13, 'Arrival / Departure lounge', 0),
(113, 13, 'Luggage storage', 0),
(114, 13, 'Porter/Bell service', 0),
(115, 14, 'Sauna', 0),
(116, 14, 'Spa/Hot tub/Jacuzzi', 0),
(117, 14, 'Gym/Fitness room', 0),
(118, 14, 'Tennis court', 0),
(119, 14, 'Playground', 0),
(120, 14, 'Games room', 0),
(121, 14, 'Motorised water sports', 0),
(122, 14, 'Non-motorised water sports', 0),
(123, 14, 'Golf course', 0),
(124, 14, 'BBQ facilities', 0),
(125, 14, 'Direct beach access', 0),
(126, 14, 'Day spa', 0),
(127, 15, 'Lift/Elevator', 0),
(128, 15, 'Interconnecting rooms', 0),
(129, 15, 'Business centre', 0),
(130, 15, 'Conference/Meeting facilities', 0),
(131, 15, 'Vending machines', 0),
(132, 15, 'Kids club', 0),
(133, 15, 'Ice machine', 0),
(134, 15, 'Wheelchair accessible', 0),
(135, 15, 'Airport shuttle', 0),
(136, 15, 'Wifi access', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_bedding`
--

CREATE TABLE IF NOT EXISTS `gc_bedding` (
  `id_bedding` int(10) unsigned NOT NULL auto_increment,
  `id_room` int(10) unsigned NOT NULL,
  `bed_index` int(2) unsigned NOT NULL,
  `bed_num` int(2) unsigned NOT NULL,
  `single_num` int(2) unsigned NOT NULL,
  `double_num` int(2) unsigned NOT NULL,
  `beddig_desc` varchar(200) default NULL,
  `additional_cost` decimal(20,6) NOT NULL default '0.000000',
  `cots_available` int(2) unsigned NOT NULL,
  `on_default` tinyint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '0',
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_bedding`),
  KEY `id_room` (`id_room`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gc_bedding`
--

INSERT INTO `gc_bedding` (`id_bedding`, `id_room`, `bed_index`, `bed_num`, `single_num`, `double_num`, `beddig_desc`, `additional_cost`, `cots_available`, `on_default`, `active`, `deleted`) VALUES
(1, 1, 1, 1, 0, 1, NULL, 10.000000, 1, 0, 0, 1),
(2, 1, 0, 1, 1, 0, NULL, 20.000000, 2, 0, 1, 0),
(3, 1, 2, 2, 2, 0, NULL, 15.000000, 3, 1, 1, 0),
(4, 2, 0, 1, 1, 0, NULL, 0.000000, 0, 0, 1, 0),
(5, 2, 1, 1, 0, 1, NULL, 0.000000, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_cart`
--

CREATE TABLE IF NOT EXISTS `gc_cart` (
  `id_cart` int(10) unsigned NOT NULL auto_increment,
  `id_address_delivery` int(10) unsigned NOT NULL,
  `id_address_invoice` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `on_order` tinyint(1) unsigned NOT NULL default '0',
  `secure_key` varchar(32) NOT NULL default '-1',
  `recyclable` tinyint(1) unsigned NOT NULL default '1',
  `gift` tinyint(1) unsigned NOT NULL default '0',
  `gift_message` text,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY  (`id_cart`),
  KEY `id_user` (`id_user`),
  KEY `id_address_delivery` (`id_address_delivery`),
  KEY `id_address_invoice` (`id_address_invoice`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gc_cart`
--

INSERT INTO `gc_cart` (`id_cart`, `id_address_delivery`, `id_address_invoice`, `id_currency`, `id_user`, `on_order`, `secure_key`, `recyclable`, `gift`, `gift_message`, `date_add`, `date_upd`) VALUES
(1, 2, 4, 1, 4, 0, '-1', 1, 0, '', '2012-11-16 22:19:01', '2012-11-16 22:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `gc_cart_product`
--

CREATE TABLE IF NOT EXISTS `gc_cart_product` (
  `id_cart_product` int(10) unsigned NOT NULL auto_increment,
  `id_cart` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_product_date` int(10) unsigned default NULL,
  `quantity` int(10) unsigned NOT NULL default '0',
  `date_add` datetime NOT NULL,
  PRIMARY KEY  (`id_cart_product`),
  KEY `id_cart` (`id_cart`),
  KEY `id_product` (`id_product`),
  KEY `id_product_date` (`id_product_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gc_cart_product`
--

INSERT INTO `gc_cart_product` (`id_cart_product`, `id_cart`, `id_product`, `id_product_date`, `quantity`, `date_add`) VALUES
(1, 1, 1, 1, 1, '2012-11-16 22:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `gc_category`
--

CREATE TABLE IF NOT EXISTS `gc_category` (
  `id_category` int(10) unsigned NOT NULL auto_increment,
  `id_parent` int(10) unsigned NOT NULL,
  `id_service` int(10) unsigned default '1',
  `level_depth` tinyint(3) unsigned NOT NULL default '1',
  `nleft` int(10) unsigned NOT NULL default '0',
  `nright` int(10) unsigned NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `position` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_category`),
  KEY `id_service` (`id_service`),
  KEY `nleftright` (`nleft`,`nright`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gc_category`
--

INSERT INTO `gc_category` (`id_category`, `id_parent`, `id_service`, `level_depth`, `nleft`, `nright`, `active`, `date_add`, `date_upd`, `position`) VALUES
(1, 0, 1, 1, 1, 2, 1, '2012-11-13 03:22:20', '0000-00-00 00:00:00', 0),
(2, 0, 2, 2, 1, 2, 1, '2012-11-13 03:22:20', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_category_lang`
--

CREATE TABLE IF NOT EXISTS `gc_category_lang` (
  `id_category` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `link_rewrite` varchar(128) default NULL,
  `meta_title` varchar(128) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `meta_description` varchar(255) default NULL,
  PRIMARY KEY  (`id_category`,`id_lang`),
  KEY `category_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_category_lang`
--

INSERT INTO `gc_category_lang` (`id_category`, `id_lang`, `name`, `description`, `link_rewrite`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 1, 'Hotel Home', 'Hotel Home..', NULL, NULL, NULL, NULL),
(1, 2, '호텔홈', '호텔홈', NULL, NULL, NULL, NULL),
(1, 3, 'Hotel Home', 'Hotel Home..', NULL, NULL, NULL, NULL),
(2, 1, 'Car Home', 'Car Home..', NULL, NULL, NULL, NULL),
(2, 2, '자동차 홈', '자동차 홈..', NULL, NULL, NULL, NULL),
(2, 3, 'Car Home', 'Car Home..', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gc_category_product`
--

CREATE TABLE IF NOT EXISTS `gc_category_product` (
  `id_category` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_category`,`id_product`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_category_product`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_cms`
--

CREATE TABLE IF NOT EXISTS `gc_cms` (
  `id_cms` int(10) unsigned NOT NULL auto_increment,
  `id_cms_category` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_cms`),
  KEY `id_cms_category` (`id_cms_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gc_cms`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_cms_category`
--

CREATE TABLE IF NOT EXISTS `gc_cms_category` (
  `id_cms_category` int(10) unsigned NOT NULL auto_increment,
  `id_parent` int(10) unsigned NOT NULL,
  `level_depth` tinyint(3) unsigned NOT NULL default '0',
  `nleft` int(10) unsigned NOT NULL default '0',
  `nright` int(10) unsigned NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `position` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_cms_category`),
  KEY `id_parent` (`id_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gc_cms_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_cms_category_lang`
--

CREATE TABLE IF NOT EXISTS `gc_cms_category_lang` (
  `id_cms_category` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `link_rewrite` varchar(128) NOT NULL,
  `meta_title` varchar(128) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `meta_description` varchar(255) default NULL,
  UNIQUE KEY `category_lang_index` (`id_cms_category`,`id_lang`),
  KEY `category_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_cms_category_lang`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_cms_lang`
--

CREATE TABLE IF NOT EXISTS `gc_cms_lang` (
  `id_cms` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` longtext,
  `meta_title` varchar(128) NOT NULL,
  `meta_description` varchar(255) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `link_rewrite` varchar(128) NOT NULL,
  PRIMARY KEY  (`id_cms`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_cms_lang`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_code`
--

CREATE TABLE IF NOT EXISTS `gc_code` (
  `code` char(6) NOT NULL,
  `type` char(3) NOT NULL,
  `name` varchar(128) NOT NULL,
  `position` int(3) NOT NULL,
  PRIMARY KEY  (`code`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_code`
--

INSERT INTO `gc_code` (`code`, `type`, `name`, `position`) VALUES
('001001', '001', 'Default', 0),
('001002', '001', 'Delivery', 0),
('001003', '001', 'Invoice', 0),
('002001', '002', 'Hotel Room', 1),
('002002', '002', 'Studio', 2),
('002003', '002', '1 bedroom', 3),
('002004', '002', '2 bedroom', 4),
('002005', '002', '3+ bedroom', 5),
('002006', '002', 'Dorm Room', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gc_code_type`
--

CREATE TABLE IF NOT EXISTS `gc_code_type` (
  `type` char(3) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY  (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_code_type`
--

INSERT INTO `gc_code_type` (`type`, `name`) VALUES
('001', 'Address Type'),
('002', 'Room Type');

-- --------------------------------------------------------

--
-- Table structure for table `gc_configuration`
--

CREATE TABLE IF NOT EXISTS `gc_configuration` (
  `id_configuration` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `value` text,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY  (`id_configuration`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gc_configuration`
--

INSERT INTO `gc_configuration` (`id_configuration`, `name`, `value`, `date_add`, `date_upd`) VALUES
(1, 'test', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gc_configuration_lang`
--

CREATE TABLE IF NOT EXISTS `gc_configuration_lang` (
  `id_configuration` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `message` text,
  `date_upd` datetime default NULL,
  PRIMARY KEY  (`id_configuration`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_configuration_lang`
--

INSERT INTO `gc_configuration_lang` (`id_configuration`, `id_lang`, `message`, `date_upd`) VALUES
(1, 1, 'en2', '0000-00-00 00:00:00'),
(1, 2, '한글', '0000-00-00 00:00:00'),
(1, 3, '한자', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gc_country`
--

CREATE TABLE IF NOT EXISTS `gc_country` (
  `id_country` int(10) unsigned NOT NULL auto_increment,
  `id_zone` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL default '0',
  `iso_code` varchar(3) NOT NULL,
  `name` varchar(64) default NULL,
  `call_prefix` int(10) NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `contains_states` tinyint(1) NOT NULL default '0',
  `need_identification_number` tinyint(1) NOT NULL default '0',
  `need_zip_code` tinyint(1) NOT NULL default '1',
  `zip_code_format` varchar(12) NOT NULL default '',
  `display_tax_label` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_country`),
  KEY `id_zone` (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `gc_country`
--

INSERT INTO `gc_country` (`id_country`, `id_zone`, `id_currency`, `iso_code`, `name`, `call_prefix`, `active`, `contains_states`, `need_identification_number`, `need_zip_code`, `zip_code_format`, `display_tax_label`) VALUES
(1, 1, 0, 'DE', 'Germany', 49, 1, 0, 0, 1, 'NNNNN', 1),
(2, 1, 0, 'AT', 'Austria', 43, 1, 0, 0, 1, 'NNNN', 1),
(3, 1, 0, 'BE', 'Belgium', 32, 1, 0, 0, 1, 'NNNN', 1),
(4, 2, 0, 'CA', 'Canada', 1, 1, 1, 0, 1, 'LNL NLN', 0),
(5, 3, 0, 'CN', 'China', 86, 1, 0, 0, 1, 'NNNNNN', 1),
(6, 1, 0, 'ES', 'Spain', 34, 1, 0, 1, 1, 'NNNNN', 1),
(7, 1, 0, 'FI', 'Finland', 358, 1, 0, 0, 1, 'NNNNN', 1),
(8, 1, 0, 'FR', 'France', 33, 1, 0, 0, 1, 'NNNNN', 1),
(9, 1, 0, 'GR', 'Greece', 30, 1, 0, 0, 1, 'NNNNN', 1),
(10, 1, 0, 'IT', 'Italy', 39, 1, 1, 0, 1, 'NNNNN', 1),
(11, 3, 0, 'JP', 'Japan', 81, 1, 1, 0, 1, 'NNN-NNNN', 1),
(12, 1, 0, 'LU', 'Luxemburg', 352, 1, 0, 0, 1, 'NNNN', 1),
(13, 1, 0, 'NL', 'Netherlands', 31, 1, 0, 0, 1, 'NNNN LL', 1),
(14, 1, 0, 'PL', 'Poland', 48, 1, 0, 0, 1, 'NN-NNN', 1),
(15, 1, 0, 'PT', 'Portugal', 351, 1, 0, 0, 1, 'NNNN NNN', 1),
(16, 1, 0, 'CZ', 'Czech Republic', 420, 1, 0, 0, 1, 'NNN NN', 1),
(17, 1, 0, 'GB', 'United Kingdom', 44, 1, 0, 0, 1, '', 1),
(18, 1, 0, 'SE', 'Sweden', 46, 1, 0, 0, 1, 'NNN NN', 1),
(19, 7, 0, 'CH', 'Switzerland', 41, 1, 0, 0, 1, 'NNNN', 1),
(20, 1, 0, 'DK', 'Denmark', 45, 1, 0, 0, 1, 'NNNN', 1),
(21, 2, 0, 'US', 'United States', 1, 1, 1, 0, 1, 'NNNNN', 0),
(22, 3, 0, 'HK', 'HongKong', 852, 1, 0, 0, 0, '', 1),
(23, 1, 0, 'NO', 'Norway', 47, 1, 0, 0, 1, 'NNNN', 1),
(24, 5, 0, 'AU', 'Australia', 61, 1, 1, 0, 1, 'NNNN', 1),
(25, 3, 0, 'SG', 'Singapore', 65, 1, 0, 0, 1, 'NNNNNN', 1),
(26, 1, 0, 'IE', 'Ireland', 353, 1, 0, 0, 1, '', 1),
(27, 5, 0, 'NZ', 'New Zealand', 64, 1, 0, 0, 1, 'NNNN', 1),
(28, 3, 0, 'KR', 'South Korea', 82, 1, 0, 0, 1, 'NNN-NNN', 1),
(29, 3, 0, 'IL', 'Israel', 972, 1, 0, 0, 1, 'NNNNN', 1),
(30, 4, 0, 'ZA', 'South Africa', 27, 1, 0, 0, 1, 'NNNN', 1),
(31, 4, 0, 'NG', 'Nigeria', 234, 1, 0, 0, 1, '', 1),
(32, 4, 0, 'CI', 'Ivory Coast', 225, 1, 0, 0, 1, '', 1),
(33, 4, 0, 'TG', 'Togo', 228, 1, 0, 0, 1, '', 1),
(34, 6, 0, 'BO', 'Bolivia', 591, 1, 0, 0, 1, '', 1),
(35, 4, 0, 'MU', 'Mauritius', 230, 1, 0, 0, 1, '', 1),
(36, 1, 0, 'RO', 'Romania', 40, 1, 0, 0, 1, 'NNNNNN', 1),
(37, 1, 0, 'SK', 'Slovakia', 421, 1, 0, 0, 1, 'NNN NN', 1),
(38, 4, 0, 'DZ', 'Algeria', 213, 1, 0, 0, 1, 'NNNNN', 1),
(39, 2, 0, 'AS', 'American Samoa', 0, 1, 0, 0, 1, '', 1),
(40, 7, 0, 'AD', 'Andorra', 376, 1, 0, 0, 1, 'CNNN', 1),
(41, 4, 0, 'AO', 'Angola', 244, 1, 0, 0, 0, '', 1),
(42, 8, 0, 'AI', 'Anguilla', 0, 1, 0, 0, 1, '', 1),
(43, 2, 0, 'AG', 'Antigua and Barbuda', 0, 1, 0, 0, 1, '', 1),
(44, 6, 0, 'AR', 'Argentina', 54, 1, 1, 0, 1, 'LNNNN', 1),
(45, 3, 0, 'AM', 'Armenia', 374, 1, 0, 0, 1, 'NNNN', 1),
(46, 8, 0, 'AW', 'Aruba', 297, 1, 0, 0, 1, '', 1),
(47, 3, 0, 'AZ', 'Azerbaijan', 994, 1, 0, 0, 1, 'CNNNN', 1),
(48, 2, 0, 'BS', 'Bahamas', 0, 1, 0, 0, 1, '', 1),
(49, 3, 0, 'BH', 'Bahrain', 973, 1, 0, 0, 1, '', 1),
(50, 3, 0, 'BD', 'Bangladesh', 880, 1, 0, 0, 1, 'NNNN', 1),
(51, 2, 0, 'BB', 'Barbados', 0, 1, 0, 0, 1, 'CNNNNN', 1),
(52, 7, 0, 'BY', 'Belarus', 0, 1, 0, 0, 1, 'NNNNNN', 1),
(53, 8, 0, 'BZ', 'Belize', 501, 1, 0, 0, 0, '', 1),
(54, 4, 0, 'BJ', 'Benin', 229, 1, 0, 0, 0, '', 1),
(55, 2, 0, 'BM', 'Bermuda', 0, 1, 0, 0, 1, '', 1),
(56, 3, 0, 'BT', 'Bhutan', 975, 1, 0, 0, 1, '', 1),
(57, 4, 0, 'BW', 'Botswana', 267, 1, 0, 0, 1, '', 1),
(58, 6, 0, 'BR', 'Brazil', 55, 1, 0, 0, 1, 'NNNNN-NNN', 1),
(59, 3, 0, 'BN', 'Brunei', 673, 1, 0, 0, 1, 'LLNNNN', 1),
(60, 4, 0, 'BF', 'Burkina Faso', 226, 1, 0, 0, 1, '', 1),
(61, 3, 0, 'MM', 'Burma (Myanmar)', 95, 1, 0, 0, 1, '', 1),
(62, 4, 0, 'BI', 'Burundi', 257, 1, 0, 0, 1, '', 1),
(63, 3, 0, 'KH', 'Cambodia', 855, 1, 0, 0, 1, 'NNNNN', 1),
(64, 4, 0, 'CM', 'Cameroon', 237, 1, 0, 0, 1, '', 1),
(65, 4, 0, 'CV', 'Cape Verde', 238, 1, 0, 0, 1, 'NNNN', 1),
(66, 4, 0, 'CF', 'Central African Republic', 236, 1, 0, 0, 1, '', 1),
(67, 4, 0, 'TD', 'Chad', 235, 1, 0, 0, 1, '', 1),
(68, 6, 0, 'CL', 'Chile', 56, 1, 0, 0, 1, 'NNN-NNNN', 1),
(69, 6, 0, 'CO', 'Colombia', 57, 1, 0, 0, 1, 'NNNNNN', 1),
(70, 4, 0, 'KM', 'Comoros', 269, 1, 0, 0, 1, '', 1),
(71, 4, 0, 'CD', 'Congo, Dem. Republic', 242, 1, 0, 0, 1, '', 1),
(72, 4, 0, 'CG', 'Congo, Republic', 243, 1, 0, 0, 1, '', 1),
(73, 8, 0, 'CR', 'Costa Rica', 506, 1, 0, 0, 1, 'NNNNN', 1),
(74, 7, 0, 'HR', 'Croatia', 385, 1, 0, 0, 1, 'NNNNN', 1),
(75, 8, 0, 'CU', 'Cuba', 53, 1, 0, 0, 1, '', 1),
(76, 1, 0, 'CY', 'Cyprus', 357, 1, 0, 0, 1, 'NNNN', 1),
(77, 4, 0, 'DJ', 'Djibouti', 253, 1, 0, 0, 1, '', 1),
(78, 8, 0, 'DM', 'Dominica', 0, 1, 0, 0, 1, '', 1),
(79, 8, 0, 'DO', 'Dominican Republic', 0, 1, 0, 0, 1, '', 1),
(80, 3, 0, 'TL', 'East Timor', 670, 1, 0, 0, 1, '', 1),
(81, 6, 0, 'EC', 'Ecuador', 593, 1, 0, 0, 1, 'CNNNNNN', 1),
(82, 4, 0, 'EG', 'Egypt', 20, 1, 0, 0, 0, '', 1),
(83, 8, 0, 'SV', 'El Salvador', 503, 1, 0, 0, 1, '', 1),
(84, 4, 0, 'GQ', 'Equatorial Guinea', 240, 1, 0, 0, 1, '', 1),
(85, 4, 0, 'ER', 'Eritrea', 291, 1, 0, 0, 1, '', 1),
(86, 1, 0, 'EE', 'Estonia', 372, 1, 0, 0, 1, 'NNNNN', 1),
(87, 4, 0, 'ET', 'Ethiopia', 251, 1, 0, 0, 1, '', 1),
(88, 8, 0, 'FK', 'Falkland Islands', 0, 1, 0, 0, 1, 'LLLL NLL', 1),
(89, 7, 0, 'FO', 'Faroe Islands', 298, 1, 0, 0, 1, '', 1),
(90, 5, 0, 'FJ', 'Fiji', 679, 1, 0, 0, 1, '', 1),
(91, 4, 0, 'GA', 'Gabon', 241, 1, 0, 0, 1, '', 1),
(92, 4, 0, 'GM', 'Gambia', 220, 1, 0, 0, 1, '', 1),
(93, 3, 0, 'GE', 'Georgia', 995, 1, 0, 0, 1, 'NNNN', 1),
(94, 4, 0, 'GH', 'Ghana', 233, 1, 0, 0, 1, '', 1),
(95, 8, 0, 'GD', 'Grenada', 0, 1, 0, 0, 1, '', 1),
(96, 7, 0, 'GL', 'Greenland', 299, 1, 0, 0, 1, '', 1),
(97, 7, 0, 'GI', 'Gibraltar', 350, 1, 0, 0, 1, '', 1),
(98, 8, 0, 'GP', 'Guadeloupe', 590, 1, 0, 0, 1, '', 1),
(99, 8, 0, 'GU', 'Guam', 0, 1, 0, 0, 1, '', 1),
(100, 8, 0, 'GT', 'Guatemala', 502, 1, 0, 0, 1, '', 1),
(101, 7, 0, 'GG', 'Guernsey', 0, 1, 0, 0, 1, 'LLN NLL', 1),
(102, 4, 0, 'GN', 'Guinea', 224, 1, 0, 0, 1, '', 1),
(103, 4, 0, 'GW', 'Guinea-Bissau', 245, 1, 0, 0, 1, '', 1),
(104, 6, 0, 'GY', 'Guyana', 592, 1, 0, 0, 1, '', 1),
(105, 8, 0, 'HT', 'Haiti', 509, 1, 0, 0, 1, '', 1),
(106, 5, 0, 'HM', 'Heard Island and McDonald Islands', 0, 1, 0, 0, 1, '', 1),
(107, 7, 0, 'VA', 'Vatican City State', 379, 1, 0, 0, 1, 'NNNNN', 1),
(108, 8, 0, 'HN', 'Honduras', 504, 1, 0, 0, 1, '', 1),
(109, 7, 0, 'IS', 'Iceland', 354, 1, 0, 0, 1, 'NNN', 1),
(110, 3, 0, 'IN', 'India', 91, 1, 0, 0, 1, 'NNN NNN', 1),
(111, 3, 0, 'ID', 'Indonesia', 62, 1, 1, 0, 1, 'NNNNN', 1),
(112, 3, 0, 'IR', 'Iran', 98, 1, 0, 0, 1, 'NNNNN-NNNNN', 1),
(113, 3, 0, 'IQ', 'Iraq', 964, 1, 0, 0, 1, 'NNNNN', 1),
(114, 7, 0, 'IM', 'Man Island', 0, 1, 0, 0, 1, 'CN NLL', 1),
(115, 8, 0, 'JM', 'Jamaica', 0, 1, 0, 0, 1, '', 1),
(116, 7, 0, 'JE', 'Jersey', 0, 1, 0, 0, 1, 'CN NLL', 1),
(117, 3, 0, 'JO', 'Jordan', 962, 1, 0, 0, 1, '', 1),
(118, 3, 0, 'KZ', 'Kazakhstan', 7, 1, 0, 0, 1, 'NNNNNN', 1),
(119, 4, 0, 'KE', 'Kenya', 254, 1, 0, 0, 1, '', 1),
(120, 5, 0, 'KI', 'Kiribati', 686, 1, 0, 0, 1, '', 1),
(121, 3, 0, 'KP', 'Korea, Dem. Republic of', 850, 1, 0, 0, 1, '', 1),
(122, 3, 0, 'KW', 'Kuwait', 965, 1, 0, 0, 1, '', 1),
(123, 3, 0, 'KG', 'Kyrgyzstan', 996, 1, 0, 0, 1, '', 1),
(124, 3, 0, 'LA', 'Laos', 856, 1, 0, 0, 1, '', 1),
(125, 1, 0, 'LV', 'Latvia', 371, 1, 0, 0, 1, 'C-NNNN', 1),
(126, 3, 0, 'LB', 'Lebanon', 961, 1, 0, 0, 1, '', 1),
(127, 4, 0, 'LS', 'Lesotho', 266, 1, 0, 0, 1, '', 1),
(128, 4, 0, 'LR', 'Liberia', 231, 1, 0, 0, 1, '', 1),
(129, 4, 0, 'LY', 'Libya', 218, 1, 0, 0, 1, '', 1),
(130, 1, 0, 'LI', 'Liechtenstein', 423, 1, 0, 0, 1, 'NNNN', 1),
(131, 1, 0, 'LT', 'Lithuania', 370, 1, 0, 0, 1, 'NNNNN', 1),
(132, 3, 0, 'MO', 'Macau', 853, 1, 0, 0, 0, '', 1),
(133, 7, 0, 'MK', 'Macedonia', 389, 1, 0, 0, 1, '', 1),
(134, 4, 0, 'MG', 'Madagascar', 261, 1, 0, 0, 1, '', 1),
(135, 4, 0, 'MW', 'Malawi', 265, 1, 0, 0, 1, '', 1),
(136, 3, 0, 'MY', 'Malaysia', 60, 1, 0, 0, 1, 'NNNNN', 1),
(137, 3, 0, 'MV', 'Maldives', 960, 1, 0, 0, 1, '', 1),
(138, 4, 0, 'ML', 'Mali', 223, 1, 0, 0, 1, '', 1),
(139, 1, 0, 'MT', 'Malta', 356, 1, 0, 0, 1, 'LLL NNNN', 1),
(140, 5, 0, 'MH', 'Marshall Islands', 692, 1, 0, 0, 1, '', 1),
(141, 8, 0, 'MQ', 'Martinique', 596, 1, 0, 0, 1, '', 1),
(142, 4, 0, 'MR', 'Mauritania', 222, 1, 0, 0, 1, '', 1),
(143, 1, 0, 'HU', 'Hungary', 36, 1, 0, 0, 1, 'NNNN', 1),
(144, 4, 0, 'YT', 'Mayotte', 262, 1, 0, 0, 1, '', 1),
(145, 2, 0, 'MX', 'Mexico', 52, 1, 1, 1, 1, 'NNNNN', 1),
(146, 5, 0, 'FM', 'Micronesia', 691, 1, 0, 0, 1, '', 1),
(147, 7, 0, 'MD', 'Moldova', 373, 1, 0, 0, 1, 'C-NNNN', 1),
(148, 7, 0, 'MC', 'Monaco', 377, 1, 0, 0, 1, '980NN', 1),
(149, 3, 0, 'MN', 'Mongolia', 976, 1, 0, 0, 1, '', 1),
(150, 7, 0, 'ME', 'Montenegro', 382, 1, 0, 0, 1, 'NNNNN', 1),
(151, 8, 0, 'MS', 'Montserrat', 0, 1, 0, 0, 1, '', 1),
(152, 4, 0, 'MA', 'Morocco', 212, 1, 0, 0, 1, 'NNNNN', 1),
(153, 4, 0, 'MZ', 'Mozambique', 258, 1, 0, 0, 1, '', 1),
(154, 4, 0, 'NA', 'Namibia', 264, 1, 0, 0, 1, '', 1),
(155, 5, 0, 'NR', 'Nauru', 674, 1, 0, 0, 1, '', 1),
(156, 3, 0, 'NP', 'Nepal', 977, 1, 0, 0, 1, '', 1),
(157, 8, 0, 'AN', 'Netherlands Antilles', 599, 1, 0, 0, 1, '', 1),
(158, 5, 0, 'NC', 'New Caledonia', 687, 1, 0, 0, 1, '', 1),
(159, 8, 0, 'NI', 'Nicaragua', 505, 1, 0, 0, 1, 'NNNNNN', 1),
(160, 4, 0, 'NE', 'Niger', 227, 1, 0, 0, 1, '', 1),
(161, 5, 0, 'NU', 'Niue', 683, 1, 0, 0, 1, '', 1),
(162, 5, 0, 'NF', 'Norfolk Island', 0, 1, 0, 0, 1, '', 1),
(163, 5, 0, 'MP', 'Northern Mariana Islands', 0, 1, 0, 0, 1, '', 1),
(164, 3, 0, 'OM', 'Oman', 968, 1, 0, 0, 1, '', 1),
(165, 3, 0, 'PK', 'Pakistan', 92, 1, 0, 0, 1, '', 1),
(166, 5, 0, 'PW', 'Palau', 680, 1, 0, 0, 1, '', 1),
(167, 3, 0, 'PS', 'Palestinian Territories', 0, 1, 0, 0, 1, '', 1),
(168, 8, 0, 'PA', 'Panama', 507, 1, 0, 0, 1, 'NNNNNN', 1),
(169, 5, 0, 'PG', 'Papua New Guinea', 675, 1, 0, 0, 1, '', 1),
(170, 6, 0, 'PY', 'Paraguay', 595, 1, 0, 0, 1, '', 1),
(171, 6, 0, 'PE', 'Peru', 51, 1, 0, 0, 1, '', 1),
(172, 3, 0, 'PH', 'Philippines', 63, 1, 0, 0, 1, 'NNNN', 1),
(173, 5, 0, 'PN', 'Pitcairn', 0, 1, 0, 0, 1, 'LLLL NLL', 1),
(174, 8, 0, 'PR', 'Puerto Rico', 0, 1, 0, 0, 1, 'NNNNN', 1),
(175, 3, 0, 'QA', 'Qatar', 974, 1, 0, 0, 1, '', 1),
(176, 4, 0, 'RE', 'Reunion Island', 262, 1, 0, 0, 1, '', 1),
(177, 7, 0, 'RU', 'Russian Federation', 7, 1, 0, 0, 1, 'NNNNNN', 1),
(178, 4, 0, 'RW', 'Rwanda', 250, 1, 0, 0, 1, '', 1),
(179, 8, 0, 'BL', 'Saint Barthelemy', 0, 1, 0, 0, 1, '', 1),
(180, 8, 0, 'KN', 'Saint Kitts and Nevis', 0, 1, 0, 0, 1, '', 1),
(181, 8, 0, 'LC', 'Saint Lucia', 0, 1, 0, 0, 1, '', 1),
(182, 8, 0, 'MF', 'Saint Martin', 0, 1, 0, 0, 1, '', 1),
(183, 8, 0, 'PM', 'Saint Pierre and Miquelon', 508, 1, 0, 0, 1, '', 1),
(184, 8, 0, 'VC', 'Saint Vincent and the Grenadines', 0, 1, 0, 0, 1, '', 1),
(185, 5, 0, 'WS', 'Samoa', 685, 1, 0, 0, 1, '', 1),
(186, 7, 0, 'SM', 'San Marino', 378, 1, 0, 0, 1, 'NNNNN', 1),
(187, 4, 0, 'ST', 'São Tomé and Príncipe', 239, 1, 0, 0, 1, '', 1),
(188, 3, 0, 'SA', 'Saudi Arabia', 966, 1, 0, 0, 1, '', 1),
(189, 4, 0, 'SN', 'Senegal', 221, 1, 0, 0, 1, '', 1),
(190, 7, 0, 'RS', 'Serbia', 381, 1, 0, 0, 1, 'NNNNN', 1),
(191, 4, 0, 'SC', 'Seychelles', 248, 1, 0, 0, 1, '', 1),
(192, 4, 0, 'SL', 'Sierra Leone', 232, 1, 0, 0, 1, '', 1),
(193, 1, 0, 'SI', 'Slovenia', 386, 1, 0, 0, 1, 'C-NNNN', 1),
(194, 5, 0, 'SB', 'Solomon Islands', 677, 1, 0, 0, 1, '', 1),
(195, 4, 0, 'SO', 'Somalia', 252, 1, 0, 0, 1, '', 1),
(196, 8, 0, 'GS', 'South Georgia and the South Sandwich Islands', 0, 1, 0, 0, 1, 'LLLL NLL', 1),
(197, 3, 0, 'LK', 'Sri Lanka', 94, 1, 0, 0, 1, 'NNNNN', 1),
(198, 4, 0, 'SD', 'Sudan', 249, 1, 0, 0, 1, '', 1),
(199, 8, 0, 'SR', 'Suriname', 597, 1, 0, 0, 1, '', 1),
(200, 7, 0, 'SJ', 'Svalbard and Jan Mayen', 0, 1, 0, 0, 1, '', 1),
(201, 4, 0, 'SZ', 'Swaziland', 268, 1, 0, 0, 1, '', 1),
(202, 3, 0, 'SY', 'Syria', 963, 1, 0, 0, 1, '', 1),
(203, 3, 0, 'TW', 'Taiwan', 886, 1, 0, 0, 1, 'NNNNN', 1),
(204, 3, 0, 'TJ', 'Tajikistan', 992, 1, 0, 0, 1, '', 1),
(205, 4, 0, 'TZ', 'Tanzania', 255, 1, 0, 0, 1, '', 1),
(206, 3, 0, 'TH', 'Thailand', 66, 1, 0, 0, 1, 'NNNNN', 1),
(207, 5, 0, 'TK', 'Tokelau', 690, 1, 0, 0, 1, '', 1),
(208, 5, 0, 'TO', 'Tonga', 676, 1, 0, 0, 1, '', 1),
(209, 6, 0, 'TT', 'Trinidad and Tobago', 0, 1, 0, 0, 1, '', 1),
(210, 4, 0, 'TN', 'Tunisia', 216, 1, 0, 0, 1, '', 1),
(211, 7, 0, 'TR', 'Turkey', 90, 1, 0, 0, 1, 'NNNNN', 1),
(212, 3, 0, 'TM', 'Turkmenistan', 993, 1, 0, 0, 1, '', 1),
(213, 8, 0, 'TC', 'Turks and Caicos Islands', 0, 1, 0, 0, 1, 'LLLL NLL', 1),
(214, 5, 0, 'TV', 'Tuvalu', 688, 1, 0, 0, 1, '', 1),
(215, 4, 0, 'UG', 'Uganda', 256, 1, 0, 0, 1, '', 1),
(216, 1, 0, 'UA', 'Ukraine', 380, 1, 0, 0, 1, 'NNNNN', 1),
(217, 3, 0, 'AE', 'United Arab Emirates', 971, 1, 0, 0, 1, '', 1),
(218, 6, 0, 'UY', 'Uruguay', 598, 1, 0, 0, 1, '', 1),
(219, 3, 0, 'UZ', 'Uzbekistan', 998, 1, 0, 0, 1, '', 1),
(220, 5, 0, 'VU', 'Vanuatu', 678, 1, 0, 0, 1, '', 1),
(221, 6, 0, 'VE', 'Venezuela', 58, 1, 0, 0, 1, '', 1),
(222, 3, 0, 'VN', 'Vietnam', 84, 1, 0, 0, 1, 'NNNNNN', 1),
(223, 2, 0, 'VG', 'Virgin Islands (British)', 0, 1, 0, 0, 1, 'CNNNN', 1),
(224, 2, 0, 'VI', 'Virgin Islands (U.S.)', 0, 1, 0, 0, 1, '', 1),
(225, 5, 0, 'WF', 'Wallis and Futuna', 681, 1, 0, 0, 1, '', 1),
(226, 4, 0, 'EH', 'Western Sahara', 0, 1, 0, 0, 1, '', 1),
(227, 3, 0, 'YE', 'Yemen', 967, 1, 0, 0, 1, '', 1),
(228, 4, 0, 'ZM', 'Zambia', 260, 1, 0, 0, 1, '', 1),
(229, 4, 0, 'ZW', 'Zimbabwe', 263, 1, 0, 0, 1, '', 1),
(230, 7, 0, 'AL', 'Albania', 355, 1, 0, 0, 1, 'NNNN', 1),
(231, 3, 0, 'AF', 'Afghanistan', 93, 1, 0, 0, 0, '', 1),
(232, 5, 0, 'AQ', 'Antarctica', 0, 1, 0, 0, 1, '', 1),
(233, 1, 0, 'BA', 'Bosnia and Herzegovina', 387, 1, 0, 0, 1, '', 1),
(234, 5, 0, 'BV', 'Bouvet Island', 0, 1, 0, 0, 1, '', 1),
(235, 5, 0, 'IO', 'British Indian Ocean Territory', 0, 1, 0, 0, 1, 'LLLL NLL', 1),
(236, 1, 0, 'BG', 'Bulgaria', 359, 1, 0, 0, 1, 'NNNN', 1),
(237, 8, 0, 'KY', 'Cayman Islands', 0, 1, 0, 0, 1, '', 1),
(238, 3, 0, 'CX', 'Christmas Island', 0, 1, 0, 0, 1, '', 1),
(239, 3, 0, 'CC', 'Cocos (Keeling) Islands', 0, 1, 0, 0, 1, '', 1),
(240, 5, 0, 'CK', 'Cook Islands', 682, 1, 0, 0, 1, '', 1),
(241, 6, 0, 'GF', 'French Guiana', 594, 1, 0, 0, 1, '', 1),
(242, 5, 0, 'PF', 'French Polynesia', 689, 1, 0, 0, 1, '', 1),
(243, 5, 0, 'TF', 'French Southern Territories', 0, 1, 0, 0, 1, '', 1),
(244, 7, 0, 'AX', 'Åland Islands', 0, 1, 0, 0, 1, 'NNNNN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_currency`
--

CREATE TABLE IF NOT EXISTS `gc_currency` (
  `id_currency` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `iso_code` varchar(3) NOT NULL default '0',
  `iso_code_num` varchar(3) NOT NULL default '0',
  `sign` varchar(8) NOT NULL,
  `blank` tinyint(1) unsigned NOT NULL default '0',
  `format` tinyint(1) unsigned NOT NULL default '0',
  `decimals` tinyint(1) unsigned NOT NULL default '1',
  `conversion_rate` decimal(13,6) NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gc_currency`
--

INSERT INTO `gc_currency` (`id_currency`, `name`, `iso_code`, `iso_code_num`, `sign`, `blank`, `format`, `decimals`, `conversion_rate`, `deleted`, `active`) VALUES
(1, 'Dollar', 'AUD', '36', '$', 0, 1, 1, 1.000000, 0, 1),
(2, 'Dollar', 'USD', '840', '$', 0, 1, 1, 1.051065, 0, 1),
(3, 'Won', 'KRW', '410', '￦', 0, 1, 0, 120.000000, 0, 1),
(4, 'Yuan', 'CNY', '156', 'Ұ', 0, 1, 1, 6.740000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_destination`
--

CREATE TABLE IF NOT EXISTS `gc_destination` (
  `id_destination` int(10) unsigned NOT NULL auto_increment,
  `id_country` int(11) unsigned NOT NULL,
  `id_state` int(11) unsigned default NULL,
  `name` varchar(120) NOT NULL,
  `position` int(10) unsigned NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_destination`),
  KEY `id_country` (`id_country`),
  KEY `id_state` (`id_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gc_destination`
--

INSERT INTO `gc_destination` (`id_destination`, `id_country`, `id_state`, `name`, `position`, `active`) VALUES
(1, 24, 316, 'Sydney', 0, 1),
(2, 24, 316, 'Sydney CBD', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_discount`
--

CREATE TABLE IF NOT EXISTS `gc_discount` (
  `id_discount` int(10) unsigned NOT NULL auto_increment,
  `id_discount_type` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `id_group` int(10) unsigned NOT NULL default '0',
  `id_currency` int(10) unsigned NOT NULL default '0',
  `behavior_not_exhausted` tinyint(3) default '1',
  `name` varchar(32) NOT NULL,
  `value` decimal(17,2) NOT NULL default '0.00',
  `quantity` int(10) unsigned NOT NULL default '0',
  `quantity_per_user` int(10) unsigned NOT NULL default '1',
  `cumulable` tinyint(1) unsigned NOT NULL default '0',
  `cumulable_reduction` tinyint(1) unsigned NOT NULL default '0',
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `minimal` decimal(17,2) default NULL,
  `include_tax` tinyint(1) NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `cart_display` tinyint(1) unsigned NOT NULL default '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY  (`id_discount`),
  KEY `discount_name` (`name`),
  KEY `discount_user` (`id_user`),
  KEY `id_discount_type` (`id_discount_type`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gc_discount`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_discount_category`
--

CREATE TABLE IF NOT EXISTS `gc_discount_category` (
  `id_category` int(11) unsigned NOT NULL,
  `id_discount` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id_category`,`id_discount`),
  KEY `id_discount` (`id_discount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_discount_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_discount_lang`
--

CREATE TABLE IF NOT EXISTS `gc_discount_lang` (
  `id_discount` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `description` text,
  PRIMARY KEY  (`id_discount`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_discount_lang`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_discount_type`
--

CREATE TABLE IF NOT EXISTS `gc_discount_type` (
  `id_discount_type` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY  (`id_discount_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gc_discount_type`
--

INSERT INTO `gc_discount_type` (`id_discount_type`, `name`) VALUES
(1, 'Discount on order (%)'),
(2, 'Discount on order (amount)'),
(3, 'Free shipping');

-- --------------------------------------------------------

--
-- Table structure for table `gc_group`
--

CREATE TABLE IF NOT EXISTS `gc_group` (
  `id_group` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  `level` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gc_group`
--

INSERT INTO `gc_group` (`id_group`, `name`, `level`) VALUES
(1, 'Administrator', 10),
(2, 'Supplier', 5),
(3, 'Agent', 3),
(4, 'Customer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_hotel`
--

CREATE TABLE IF NOT EXISTS `gc_hotel` (
  `id_hotel` int(10) unsigned NOT NULL auto_increment,
  `id_supplier` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_hotel`),
  KEY `id_supplier` (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gc_hotel`
--

INSERT INTO `gc_hotel` (`id_hotel`, `id_supplier`) VALUES
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gc_image`
--

CREATE TABLE IF NOT EXISTS `gc_image` (
  `id_image` int(10) unsigned NOT NULL auto_increment,
  `image` varchar(100) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `image_title` varchar(100) default NULL,
  `position` smallint(2) unsigned NOT NULL default '0',
  `cover` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `gc_image`
--

INSERT INTO `gc_image` (`id_image`, `image`, `image_path`, `image_title`, `position`, `cover`) VALUES
(19, 'Koala.jpg', '/images/supplier/2', 'teste', 1, 0),
(20, 'Penguins.jpg', '/images/supplier/2', 'teste', 2, 0),
(21, 'Tulips.jpg', '/images/supplier/2', '', 3, 0),
(22, 'Tulips.jpg', '/images/supplier/2', '', 5, 0),
(23, 'Tulips.jpg', '/images/supplier/2', '', 4, 0),
(24, 'Tulips.jpg', '/images/supplier/2', '', 8, 0),
(25, 'Tulips.jpg', '/images/supplier/2', '', 9, 0),
(26, 'Koala.jpg', '/images/supplier/2', '', 11, 1),
(27, 'Lighthouse.jpg', '/images/product/1', 'p1', 10, 1),
(28, 'Lighthouse.jpg', '/images/product/1', '', 7, 0),
(33, 'chat.jpg', '/images/supplier/2', 'caht', 0, 0),
(34, 'bed-d.gif', '/images/product/1', 'Room Image', 0, 0),
(35, 'image.jpg', '/images/supplier/2', 'Wonoh room', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_image_type`
--

CREATE TABLE IF NOT EXISTS `gc_image_type` (
  `id_image_type` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `quality` int(100) unsigned default '80',
  `sharpen` int(100) unsigned default '0',
  `rotate` int(100) default '0',
  `product` tinyint(1) unsigned NOT NULL default '1',
  `supplier` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id_image_type`),
  KEY `image_type_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gc_image_type`
--

INSERT INTO `gc_image_type` (`id_image_type`, `name`, `width`, `height`, `quality`, `sharpen`, `rotate`, `product`, `supplier`) VALUES
(1, 'small', 45, 45, 80, 0, 0, 1, 1),
(2, 'medium', 80, 80, 80, 0, 0, 1, 1),
(3, 'large', 300, 183, 80, 0, 0, 1, 1),
(6, 'home', 210, 128, 80, 0, 0, 1, 1),
(7, 'test', 300, 250, 85, 50, 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_lang`
--

CREATE TABLE IF NOT EXISTS `gc_lang` (
  `id_lang` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `active` tinyint(3) unsigned NOT NULL default '0',
  `iso_code` char(2) NOT NULL,
  `language_code` char(5) NOT NULL,
  `date_format_lite` char(32) NOT NULL default 'Y-m-d',
  `date_format_full` char(32) NOT NULL default 'Y-m-d H:i:s',
  `is_rtl` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_lang`),
  KEY `lang_iso_code` (`iso_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gc_lang`
--

INSERT INTO `gc_lang` (`id_lang`, `name`, `active`, `iso_code`, `language_code`, `date_format_lite`, `date_format_full`, `is_rtl`) VALUES
(1, 'English (English)', 1, 'en', 'en-us', 'm/j/Y', 'm/j/Y H:i:s', 0),
(2, 'Korean', 1, 'ko', 'ko', 'Y-m-d', 'Y-m-d H:i:s', 0),
(3, 'Chinese-Simplified', 1, 'zh', 'zh', 'Y-m-d', 'Y-m-d H:i:s', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_order`
--

CREATE TABLE IF NOT EXISTS `gc_order` (
  `id_order` int(10) unsigned NOT NULL auto_increment,
  `id_lang` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `id_cart` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL,
  `id_address_delivery` int(10) unsigned NOT NULL,
  `id_address_invoice` int(10) unsigned NOT NULL,
  `id_order_state` int(10) NOT NULL default '1',
  `secure_key` varchar(32) NOT NULL default '-1',
  `payment` varchar(255) NOT NULL,
  `conversion_rate` decimal(13,6) NOT NULL default '1.000000',
  `gift` tinyint(1) unsigned NOT NULL default '0',
  `gift_message` text,
  `total_price` decimal(17,2) NOT NULL default '0.00',
  `total_agent_price` decimal(17,2) NOT NULL default '0.00',
  `total_discount` decimal(17,2) NOT NULL default '0.00',
  `total_paid` decimal(17,2) NOT NULL default '0.00',
  `invoice_number` int(10) unsigned NOT NULL default '0',
  `delivery_number` int(10) unsigned NOT NULL default '0',
  `invoice_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `on_agent` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_order`),
  KEY `invoice_number` (`invoice_number`),
  KEY `id_address_delivery` (`id_address_delivery`),
  KEY `id_address_invoice` (`id_address_invoice`),
  KEY `date_add` (`date_add`),
  KEY `id_user` (`id_user`),
  KEY `id_cart` (`id_cart`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gc_order`
--

INSERT INTO `gc_order` (`id_order`, `id_lang`, `id_user`, `id_cart`, `id_currency`, `id_address_delivery`, `id_address_invoice`, `id_order_state`, `secure_key`, `payment`, `conversion_rate`, `gift`, `gift_message`, `total_price`, `total_agent_price`, `total_discount`, `total_paid`, `invoice_number`, `delivery_number`, `invoice_date`, `delivery_date`, `date_add`, `date_upd`, `on_agent`) VALUES
(1, 2, 4, 1, 1, 2, 4, 2, '-1', '100', 1.000000, 0, '', 100.00, 80.00, 0.00, 0.00, 0, 0, '2012-11-22 01:46:27', '2012-11-22 01:46:27', '2012-11-22 01:46:27', '2012-11-23 05:13:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_order_discount`
--

CREATE TABLE IF NOT EXISTS `gc_order_discount` (
  `id_order_discount` int(10) unsigned NOT NULL auto_increment,
  `id_order` int(10) unsigned NOT NULL,
  `id_discount` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` decimal(17,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id_order_discount`),
  KEY `id_order` (`id_order`),
  KEY `id_discount` (`id_discount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gc_order_discount`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_order_history`
--

CREATE TABLE IF NOT EXISTS `gc_order_history` (
  `id_order_history` int(10) unsigned NOT NULL auto_increment,
  `id_user` int(10) unsigned NOT NULL,
  `id_order` int(10) unsigned NOT NULL,
  `id_order_state` int(10) unsigned NOT NULL,
  `comment` varchar(300) default NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY  (`id_order_history`),
  KEY `id_user` (`id_user`),
  KEY `id_order` (`id_order`),
  KEY `id_order_state` (`id_order_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gc_order_history`
--

INSERT INTO `gc_order_history` (`id_order_history`, `id_user`, `id_order`, `id_order_state`, `comment`, `date_add`) VALUES
(6, 4, 1, 1, 'affafafsafsfdsfsfsfs', '2012-11-23 05:12:27'),
(7, 4, 1, 2, 'fsafdsafdsafdsafdasfs', '2012-11-23 05:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `gc_order_item`
--

CREATE TABLE IF NOT EXISTS `gc_order_item` (
  `id_order_item` int(10) unsigned NOT NULL auto_increment,
  `id_order` int(10) unsigned NOT NULL,
  `id_service` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_product_date` int(10) unsigned default NULL,
  `on_date` datetime default NULL,
  `order_item_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(10) unsigned NOT NULL default '0',
  `product_quantity_in_stock` int(10) NOT NULL default '0',
  `on_refunded` tinyint(1) unsigned NOT NULL default '0',
  `on_return` tinyint(1) unsigned NOT NULL default '0',
  `quantity_price` decimal(20,6) NOT NULL default '0.000000',
  `agent_quantity_price` decimal(20,6) NOT NULL default '0.000000',
  `reduction_percent` decimal(10,2) NOT NULL default '0.00',
  `reduction_amount` decimal(20,6) NOT NULL default '0.000000',
  `product_quantity_discount` decimal(20,6) NOT NULL default '0.000000',
  `total_price` decimal(20,6) NOT NULL default '0.000000',
  `agent_total_price` decimal(20,6) NOT NULL default '0.000000',
  `product_weight` float NOT NULL,
  `tax_name` varchar(16) NOT NULL,
  `tax_rate` decimal(10,3) NOT NULL default '0.000',
  `discount_quantity_applied` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_order_item`),
  KEY `id_order` (`id_order`),
  KEY `id_service` (`id_service`),
  KEY `id_supplier` (`id_supplier`),
  KEY `id_product` (`id_product`),
  KEY `id_product_date` (`id_product_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gc_order_item`
--

INSERT INTO `gc_order_item` (`id_order_item`, `id_order`, `id_service`, `id_supplier`, `id_product`, `id_product_date`, `on_date`, `order_item_name`, `product_name`, `product_quantity`, `product_quantity_in_stock`, `on_refunded`, `on_return`, `quantity_price`, `agent_quantity_price`, `reduction_percent`, `reduction_amount`, `product_quantity_discount`, `total_price`, `agent_total_price`, `product_weight`, `tax_name`, `tax_rate`, `discount_quantity_applied`) VALUES
(1, 1, 1, 2, 1, 1, '2012-11-16 00:00:00', 'Sydney Hotel,,', 'Sydney Hotel,,', 1, 0, 0, 0, 100.000000, 80.000000, 0.00, 0.000000, 0.000000, 100.000000, 80.000000, 0, 'default', 0.000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_order_state`
--

CREATE TABLE IF NOT EXISTS `gc_order_state` (
  `id_order_state` int(10) unsigned NOT NULL auto_increment,
  `invoice` tinyint(1) unsigned default '0',
  `send_email` tinyint(1) unsigned NOT NULL default '0',
  `color` varchar(32) default NULL,
  `unremovable` tinyint(1) unsigned NOT NULL,
  `hidden` tinyint(1) unsigned NOT NULL default '0',
  `logable` tinyint(1) NOT NULL default '0',
  `delivery` tinyint(1) unsigned NOT NULL default '0',
  `name` varchar(64) NOT NULL,
  `template` varchar(64) NOT NULL,
  PRIMARY KEY  (`id_order_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `gc_order_state`
--

INSERT INTO `gc_order_state` (`id_order_state`, `invoice`, `send_email`, `color`, `unremovable`, `hidden`, `logable`, `delivery`, `name`, `template`) VALUES
(1, 0, 1, 'lightblue', 1, 0, 0, 0, 'Awaiting cheque payment', 'cheque'),
(2, 1, 1, '#DDEEFF', 1, 0, 1, 0, 'Payment accepted', 'payment'),
(3, 1, 1, '#FFDD99', 1, 0, 1, 1, 'Preparation in progress', 'preparation'),
(4, 1, 1, '#EEDDFF', 1, 0, 1, 1, 'Shipped', 'shipped'),
(5, 1, 0, '#DDFFAA', 1, 0, 1, 1, 'Delivered', ''),
(6, 0, 1, '#DADADA', 1, 0, 0, 0, 'Canceled', 'order_canceled'),
(7, 1, 1, '#FFFFBB', 1, 0, 0, 0, 'Refund', 'refund'),
(8, 0, 1, '#FFDFDF', 1, 0, 0, 0, 'Payment error', 'payment_error'),
(9, 1, 1, '#FFD3D3', 1, 0, 0, 0, 'On backorder', 'outofstock'),
(10, 0, 1, 'lightblue', 1, 0, 0, 0, 'Awaiting bank wire payment', 'bankwire'),
(11, 0, 0, 'lightblue', 1, 0, 0, 0, 'Awaiting PayPal payment', ''),
(12, 1, 0, '#DDEEFF', 1, 0, 1, 0, 'Payment remotely accepted', '');

-- --------------------------------------------------------

--
-- Table structure for table `gc_product`
--

CREATE TABLE IF NOT EXISTS `gc_product` (
  `id_product` int(10) unsigned NOT NULL auto_increment,
  `id_service` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_category_default` int(10) unsigned default NULL,
  `id_address` int(10) unsigned DEFAULT NULL,
  `on_sale` tinyint(1) unsigned NOT NULL default '0',
  `quantity` int(10) NOT NULL default '0',
  `price` decimal(20,6) NOT NULL default '0.000000',
  `agent_price` decimal(20,6) NOT NULL default '0.000000',
  `wholesale_price` decimal(20,6) NOT NULL default '0.000000',
  `width` float NOT NULL default '0',
  `height` float NOT NULL default '0',
  `depth` float NOT NULL default '0',
  `weight` float NOT NULL default '0',
  `out_of_stock` int(10) unsigned NOT NULL default '2',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `condition` enum('new','used','refurbished') NOT NULL default 'new',
  `show_price` tinyint(1) NOT NULL default '1',
  `indexed` tinyint(1) NOT NULL default '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY  (`id_product`),
  KEY `date_add` (`date_add`),
  KEY `id_service` (`id_service`),
  KEY `id_category_default` (`id_category_default`),
  KEY `gc_product_ibfk_3` (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gc_product`
--

INSERT INTO `gc_product` (`id_product`, `id_service`, `id_supplier`, `id_category_default`, `on_sale`, `quantity`, `price`, `agent_price`, `wholesale_price`, `width`, `height`, `depth`, `weight`, `out_of_stock`, `active`, `condition`, `show_price`, `indexed`, `date_add`, `date_upd`) VALUES
(1, 1, 2, 1, 0, 10, 0.000000, 0.000000, 0.000000, 0, 0, 0, 0, 2, 0, 'new', 1, 0, '0000-00-00 00:00:00', '2012-11-23 00:21:44'),
(2, 1, 2, 1, 0, 0, 0.000000, 0.000000, 0.000000, 0, 0, 0, 0, 2, 0, 'new', 1, 0, '2012-11-21 11:57:20', '2012-11-21 11:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `gc_product_attachment`
--

CREATE TABLE IF NOT EXISTS `gc_product_attachment` (
  `id_product` int(10) unsigned NOT NULL,
  `id_attachment` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_product`,`id_attachment`),
  KEY `id_attachment` (`id_attachment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_product_attachment`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_product_attribute`
--

CREATE TABLE IF NOT EXISTS `gc_product_attribute` (
  `id_product` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_product`,`id_attribute`),
  KEY `id_attribute` (`id_attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_product_attribute`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_product_attribute_value`
--

CREATE TABLE IF NOT EXISTS `gc_product_attribute_value` (
  `id_product` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
  `value` varchar(300) NOT NULL,
  PRIMARY KEY  (`id_product`,`id_attribute`),
  KEY `id_attribute` (`id_attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_product_attribute_value`
--

INSERT INTO `gc_product_attribute_value` (`id_product`, `id_attribute`, `value`) VALUES
(1, 1, '2;4');

-- --------------------------------------------------------

--
-- Table structure for table `gc_product_date`
--

CREATE TABLE IF NOT EXISTS `gc_product_date` (
  `id_product_date` int(10) unsigned NOT NULL auto_increment,
  `id_product` int(10) unsigned NOT NULL,
  `on_date` datetime NOT NULL,
  `price` decimal(20,6) NOT NULL default '0.000000',
  `agent_price` decimal(20,6) NOT NULL default '0.000000',
  `quantity` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_product_date`),
  UNIQUE KEY `product_date_uk` (`id_product`,`on_date`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gc_product_date`
--

INSERT INTO `gc_product_date` (`id_product_date`, `id_product`, `on_date`, `price`, `agent_price`, `quantity`, `active`) VALUES
(1, 1, '2012-11-16 00:00:00', 100.000000, 80.000000, 100, 0),
(2, 2, '2012-11-21 00:00:00', 150.000000, 130.000000, 200, 0),
(3, 1, '2012-11-24 00:00:00', 110.000000, 110.000000, 111, 0),
(4, 1, '2012-11-18 00:00:00', 220.000000, 200.000000, 222, 0),
(6, 1, '2012-11-20 00:00:00', 55.000000, 44.000000, 33, 1),
(7, 1, '2012-12-25 00:00:00', 3333.000000, 3330.000000, 1000, 0),
(8, 1, '2012-11-27 00:00:00', 1234.000000, 1111.000000, 5111, 1),
(9, 1, '2012-12-24 00:00:00', 2222.000000, 2220.000000, 1111, 1),
(10, 1, '2012-12-26 00:00:00', 4444.000000, 4440.000000, 555, 1),
(11, 2, '2012-11-27 00:00:00', 3333.000000, 2222.000000, 1111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_product_image`
--

CREATE TABLE IF NOT EXISTS `gc_product_image` (
  `id_image` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_image`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_product_image`
--

INSERT INTO `gc_product_image` (`id_image`, `id_product`) VALUES
(34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_product_lang`
--

CREATE TABLE IF NOT EXISTS `gc_product_lang` (
  `id_product` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `description` text,
  `description_short` text,
  `link_rewrite` varchar(128) NOT NULL,
  `meta_description` varchar(255) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `meta_title` varchar(128) default NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY  (`id_product`,`id_lang`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_product_lang`
--

INSERT INTO `gc_product_lang` (`id_product`, `id_lang`, `description`, `description_short`, `link_rewrite`, `meta_description`, `meta_keywords`, `meta_title`, `name`) VALUES
(1, 1, 'Sydney Hotel Description\r\n', 'SHort', '', NULL, NULL, NULL, 'Sydney Hotel,,'),
(1, 2, '시드니 호텔...', 'SHort', '', NULL, NULL, NULL, '시드니 호텔'),
(1, 3, 'Sydney Hotel Description', 'SHort', '', NULL, NULL, NULL, 'Sydney Hotel'),
(2, 1, 'Hotel2', 'Hotel2', '', NULL, NULL, NULL, 'Hotel2'),
(2, 2, 'Hotel2', 'Hotel2', '', NULL, NULL, NULL, 'Hotel2'),
(2, 3, 'Hotel2', 'Hotel2', '', NULL, NULL, NULL, 'Hotel2');

-- --------------------------------------------------------

--
-- Table structure for table `gc_product_sale`
--

CREATE TABLE IF NOT EXISTS `gc_product_sale` (
  `id_product` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL default '0',
  `sale_nbr` int(10) unsigned NOT NULL default '0',
  `date_upd` date NOT NULL,
  PRIMARY KEY  (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_product_sale`
--


-- --------------------------------------------------------

--
-- Table structure for table `gc_room`
--

CREATE TABLE IF NOT EXISTS `gc_room` (
  `id_product` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_bedding_default` int(10) unsigned default NULL,
  `room_code` char(6) NOT NULL,
  `room_type_code` varchar(64) NOT NULL,
  `lead_in_room_type` tinyint(1) unsigned NOT NULL default '0',
  `full_rate` int(10) unsigned NOT NULL default '0',
  `min_night_stay` int(2) unsigned default NULL,
  `max_night_stay` int(2) unsigned default NULL,
  `room_name` varchar(64) default NULL,
  `root_description` varchar(300) default NULL,
  `guests_tot_room_cap` int(2) unsigned default NULL,
  `guests_included_price` int(2) unsigned default NULL,
  `children_maxnum` int(2) unsigned default NULL,
  `children_years` int(2) unsigned default NULL,
  `children_extra` decimal(20,6) NOT NULL default '0.000000',
  `adults_maxnum` int(2) unsigned default NULL,
  `adults_extra` decimal(20,6) NOT NULL default '0.000000',
  PRIMARY KEY  (`id_product`),
  KEY `room_code` (`room_code`),
  KEY `gc_room_ibfk_2` (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_room`
--

INSERT INTO `gc_room` (`id_product`, `id_supplier`, `id_bedding_default`, `room_code`, `room_type_code`, `lead_in_room_type`, `full_rate`, `min_night_stay`, `max_night_stay`, `room_name`, `root_description`, `guests_tot_room_cap`, `guests_included_price`, `children_maxnum`, `children_years`, `children_extra`, `adults_maxnum`, `adults_extra`) VALUES
(1, 2, 3, '002001', '123', 0, 0, 0, 0, 'Name 1', 'Description 1', 2, 1, 0, 0, 0.000000, 0, 0.000000),
(2, 2, 5, '002002', '123', 0, 0, 0, 0, 'Chris Room', 'Room Description by Chris', 2, 1, 0, 0, 0.000000, 0, 0.000000);

-- --------------------------------------------------------

--
-- Table structure for table `gc_service`
--

CREATE TABLE IF NOT EXISTS `gc_service` (
  `id_service` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY  (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gc_service`
--

INSERT INTO `gc_service` (`id_service`, `name`) VALUES
(1, 'Hotel'),
(2, 'Car'),
(3, 'Fights');

-- --------------------------------------------------------

--
-- Table structure for table `gc_special`
--

CREATE TABLE IF NOT EXISTS `gc_special` (
  `id_special` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY  (`id_special`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gc_special`
--

INSERT INTO `gc_special` (`id_special`, `name`) VALUES
(1, 'Special A'),
(2, 'Special B');

-- --------------------------------------------------------

--
-- Table structure for table `gc_special_product_date`
--

CREATE TABLE IF NOT EXISTS `gc_special_product_date` (
  `id_special` int(10) unsigned NOT NULL,
  `id_product_date` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_special`,`id_product_date`),
  KEY `id_product_date` (`id_product_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_special_product_date`
--

INSERT INTO `gc_special_product_date` (`id_special`, `id_product_date`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_state`
--

CREATE TABLE IF NOT EXISTS `gc_state` (
  `id_state` int(10) unsigned NOT NULL auto_increment,
  `id_country` int(11) unsigned NOT NULL,
  `id_zone` int(11) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `iso_code` char(4) NOT NULL,
  `tax_behavior` smallint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_state`),
  KEY `id_zone` (`id_zone`),
  KEY `id_country` (`id_country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=321 ;

--
-- Dumping data for table `gc_state`
--

INSERT INTO `gc_state` (`id_state`, `id_country`, `id_zone`, `name`, `iso_code`, `tax_behavior`, `active`) VALUES
(1, 21, 2, 'Alabama', 'AL', 0, 1),
(2, 21, 2, 'Alaska', 'AK', 0, 1),
(3, 21, 2, 'Arizona', 'AZ', 0, 1),
(4, 21, 2, 'Arkansas', 'AR', 0, 1),
(5, 21, 2, 'California', 'CA', 0, 1),
(6, 21, 2, 'Colorado', 'CO', 0, 1),
(7, 21, 2, 'Connecticut', 'CT', 0, 1),
(8, 21, 2, 'Delaware', 'DE', 0, 1),
(9, 21, 2, 'Florida', 'FL', 0, 1),
(10, 21, 2, 'Georgia', 'GA', 0, 1),
(11, 21, 2, 'Hawaii', 'HI', 0, 1),
(12, 21, 2, 'Idaho', 'ID', 0, 1),
(13, 21, 2, 'Illinois', 'IL', 0, 1),
(14, 21, 2, 'Indiana', 'IN', 0, 1),
(15, 21, 2, 'Iowa', 'IA', 0, 1),
(16, 21, 2, 'Kansas', 'KS', 0, 1),
(17, 21, 2, 'Kentucky', 'KY', 0, 1),
(18, 21, 2, 'Louisiana', 'LA', 0, 1),
(19, 21, 2, 'Maine', 'ME', 0, 1),
(20, 21, 2, 'Maryland', 'MD', 0, 1),
(21, 21, 2, 'Massachusetts', 'MA', 0, 1),
(22, 21, 2, 'Michigan', 'MI', 0, 1),
(23, 21, 2, 'Minnesota', 'MN', 0, 1),
(24, 21, 2, 'Mississippi', 'MS', 0, 1),
(25, 21, 2, 'Missouri', 'MO', 0, 1),
(26, 21, 2, 'Montana', 'MT', 0, 1),
(27, 21, 2, 'Nebraska', 'NE', 0, 1),
(28, 21, 2, 'Nevada', 'NV', 0, 1),
(29, 21, 2, 'New Hampshire', 'NH', 0, 1),
(30, 21, 2, 'New Jersey', 'NJ', 0, 1),
(31, 21, 2, 'New Mexico', 'NM', 0, 1),
(32, 21, 2, 'New York', 'NY', 0, 1),
(33, 21, 2, 'North Carolina', 'NC', 0, 1),
(34, 21, 2, 'North Dakota', 'ND', 0, 1),
(35, 21, 2, 'Ohio', 'OH', 0, 1),
(36, 21, 2, 'Oklahoma', 'OK', 0, 1),
(37, 21, 2, 'Oregon', 'OR', 0, 1),
(38, 21, 2, 'Pennsylvania', 'PA', 0, 1),
(39, 21, 2, 'Rhode Island', 'RI', 0, 1),
(40, 21, 2, 'South Carolina', 'SC', 0, 1),
(41, 21, 2, 'South Dakota', 'SD', 0, 1),
(42, 21, 2, 'Tennessee', 'TN', 0, 1),
(43, 21, 2, 'Texas', 'TX', 0, 1),
(44, 21, 2, 'Utah', 'UT', 0, 1),
(45, 21, 2, 'Vermont', 'VT', 0, 1),
(46, 21, 2, 'Virginia', 'VA', 0, 1),
(47, 21, 2, 'Washington', 'WA', 0, 1),
(48, 21, 2, 'West Virginia', 'WV', 0, 1),
(49, 21, 2, 'Wisconsin', 'WI', 0, 1),
(50, 21, 2, 'Wyoming', 'WY', 0, 1),
(51, 21, 2, 'Puerto Rico', 'PR', 0, 1),
(52, 21, 2, 'US Virgin Islands', 'VI', 0, 1),
(53, 21, 2, 'District of Columbia', 'DC', 0, 1),
(54, 145, 2, 'Aguascalientes', 'AGS', 0, 1),
(55, 145, 2, 'Baja California', 'BCN', 0, 1),
(56, 145, 2, 'Baja California Sur', 'BCS', 0, 1),
(57, 145, 2, 'Campeche', 'CAM', 0, 1),
(58, 145, 2, 'Chiapas', 'CHP', 0, 1),
(59, 145, 2, 'Chihuahua', 'CHH', 0, 1),
(60, 145, 2, 'Coahuila', 'COA', 0, 1),
(61, 145, 2, 'Colima', 'COL', 0, 1),
(62, 145, 2, 'Distrito Federal', 'DIF', 0, 1),
(63, 145, 2, 'Durango', 'DUR', 0, 1),
(64, 145, 2, 'Guanajuato', 'GUA', 0, 1),
(65, 145, 2, 'Guerrero', 'GRO', 0, 1),
(66, 145, 2, 'Hidalgo', 'HID', 0, 1),
(67, 145, 2, 'Jalisco', 'JAL', 0, 1),
(68, 145, 2, 'Estado de MÃ©xico', 'MEX', 0, 1),
(69, 145, 2, 'MichoacÃ¡n', 'MIC', 0, 1),
(70, 145, 2, 'Morelos', 'MOR', 0, 1),
(71, 145, 2, 'Nayarit', 'NAY', 0, 1),
(72, 145, 2, 'Nuevo LeÃ³n', 'NLE', 0, 1),
(73, 145, 2, 'Oaxaca', 'OAX', 0, 1),
(74, 145, 2, 'Puebla', 'PUE', 0, 1),
(75, 145, 2, 'QuerÃ©taro', 'QUE', 0, 1),
(76, 145, 2, 'Quintana Roo', 'ROO', 0, 1),
(77, 145, 2, 'San Luis PotosÃ­', 'SLP', 0, 1),
(78, 145, 2, 'Sinaloa', 'SIN', 0, 1),
(79, 145, 2, 'Sonora', 'SON', 0, 1),
(80, 145, 2, 'Tabasco', 'TAB', 0, 1),
(81, 145, 2, 'Tamaulipas', 'TAM', 0, 1),
(82, 145, 2, 'Tlaxcala', 'TLA', 0, 1),
(83, 145, 2, 'Veracruz', 'VER', 0, 1),
(84, 145, 2, 'YucatÃ¡n', 'YUC', 0, 1),
(85, 145, 2, 'Zacatecas', 'ZAC', 0, 1),
(86, 4, 2, 'Ontario', 'ON', 0, 1),
(87, 4, 2, 'Quebec', 'QC', 0, 1),
(88, 4, 2, 'British Columbia', 'BC', 0, 1),
(89, 4, 2, 'Alberta', 'AB', 0, 1),
(90, 4, 2, 'Manitoba', 'MB', 0, 1),
(91, 4, 2, 'Saskatchewan', 'SK', 0, 1),
(92, 4, 2, 'Nova Scotia', 'NS', 0, 1),
(93, 4, 2, 'New Brunswick', 'NB', 0, 1),
(94, 4, 2, 'Newfoundland and Labrador', 'NL', 0, 1),
(95, 4, 2, 'Prince Edward Island', 'PE', 0, 1),
(96, 4, 2, 'Northwest Territories', 'NT', 0, 1),
(97, 4, 2, 'Yukon', 'YT', 0, 1),
(98, 4, 2, 'Nunavut', 'NU', 0, 1),
(99, 44, 6, 'Buenos Aires', 'B', 0, 1),
(100, 44, 6, 'Catamarca', 'K', 0, 1),
(101, 44, 6, 'Chaco', 'H', 0, 1),
(102, 44, 6, 'Chubut', 'U', 0, 1),
(103, 44, 6, 'Ciudad de Buenos Aires', 'C', 0, 1),
(104, 44, 6, 'CÃ³rdoba', 'X', 0, 1),
(105, 44, 6, 'Corrientes', 'W', 0, 1),
(106, 44, 6, 'Entre RÃ­os', 'E', 0, 1),
(107, 44, 6, 'Formosa', 'P', 0, 1),
(108, 44, 6, 'Jujuy', 'Y', 0, 1),
(109, 44, 6, 'La Pampa', 'L', 0, 1),
(110, 44, 6, 'La Rioja', 'F', 0, 1),
(111, 44, 6, 'Mendoza', 'M', 0, 1),
(112, 44, 6, 'Misiones', 'N', 0, 1),
(113, 44, 6, 'NeuquÃ©n', 'Q', 0, 1),
(114, 44, 6, 'RÃ­o Negro', 'R', 0, 1),
(115, 44, 6, 'Salta', 'A', 0, 1),
(116, 44, 6, 'San Juan', 'J', 0, 1),
(117, 44, 6, 'San Luis', 'D', 0, 1),
(118, 44, 6, 'Santa Cruz', 'Z', 0, 1),
(119, 44, 6, 'Santa Fe', 'S', 0, 1),
(120, 44, 6, 'Santiago del Estero', 'G', 0, 1),
(121, 44, 6, 'Tierra del Fuego', 'V', 0, 1),
(122, 44, 6, 'TucumÃ¡n', 'T', 0, 1),
(123, 10, 1, 'Agrigento', 'AG', 0, 1),
(124, 10, 1, 'Alessandria', 'AL', 0, 1),
(125, 10, 1, 'Ancona', 'AN', 0, 1),
(126, 10, 1, 'Aosta', 'AO', 0, 1),
(127, 10, 1, 'Arezzo', 'AR', 0, 1),
(128, 10, 1, 'Ascoli Piceno', 'AP', 0, 1),
(129, 10, 1, 'Asti', 'AT', 0, 1),
(130, 10, 1, 'Avellino', 'AV', 0, 1),
(131, 10, 1, 'Bari', 'BA', 0, 1),
(132, 10, 1, 'Barletta-Andria-Trani', 'BT', 0, 1),
(133, 10, 1, 'Belluno', 'BL', 0, 1),
(134, 10, 1, 'Benevento', 'BN', 0, 1),
(135, 10, 1, 'Bergamo', 'BG', 0, 1),
(136, 10, 1, 'Biella', 'BI', 0, 1),
(137, 10, 1, 'Bologna', 'BO', 0, 1),
(138, 10, 1, 'Bolzano', 'BZ', 0, 1),
(139, 10, 1, 'Brescia', 'BS', 0, 1),
(140, 10, 1, 'Brindisi', 'BR', 0, 1),
(141, 10, 1, 'Cagliari', 'CA', 0, 1),
(142, 10, 1, 'Caltanissetta', 'CL', 0, 1),
(143, 10, 1, 'Campobasso', 'CB', 0, 1),
(144, 10, 1, 'Carbonia-Iglesias', 'CI', 0, 1),
(145, 10, 1, 'Caserta', 'CE', 0, 1),
(146, 10, 1, 'Catania', 'CT', 0, 1),
(147, 10, 1, 'Catanzaro', 'CZ', 0, 1),
(148, 10, 1, 'Chieti', 'CH', 0, 1),
(149, 10, 1, 'Como', 'CO', 0, 1),
(150, 10, 1, 'Cosenza', 'CS', 0, 1),
(151, 10, 1, 'Cremona', 'CR', 0, 1),
(152, 10, 1, 'Crotone', 'KR', 0, 1),
(153, 10, 1, 'Cuneo', 'CN', 0, 1),
(154, 10, 1, 'Enna', 'EN', 0, 1),
(155, 10, 1, 'Fermo', 'FM', 0, 1),
(156, 10, 1, 'Ferrara', 'FE', 0, 1),
(157, 10, 1, 'Firenze', 'FI', 0, 1),
(158, 10, 1, 'Foggia', 'FG', 0, 1),
(159, 10, 1, 'ForlÃ¬-Cesena', 'FC', 0, 1),
(160, 10, 1, 'Frosinone', 'FR', 0, 1),
(161, 10, 1, 'Genova', 'GE', 0, 1),
(162, 10, 1, 'Gorizia', 'GO', 0, 1),
(163, 10, 1, 'Grosseto', 'GR', 0, 1),
(164, 10, 1, 'Imperia', 'IM', 0, 1),
(165, 10, 1, 'Isernia', 'IS', 0, 1),
(166, 10, 1, 'L''Aquila', 'AQ', 0, 1),
(167, 10, 1, 'La Spezia', 'SP', 0, 1),
(168, 10, 1, 'Latina', 'LT', 0, 1),
(169, 10, 1, 'Lecce', 'LE', 0, 1),
(170, 10, 1, 'Lecco', 'LC', 0, 1),
(171, 10, 1, 'Livorno', 'LI', 0, 1),
(172, 10, 1, 'Lodi', 'LO', 0, 1),
(173, 10, 1, 'Lucca', 'LU', 0, 1),
(174, 10, 1, 'Macerata', 'MC', 0, 1),
(175, 10, 1, 'Mantova', 'MN', 0, 1),
(176, 10, 1, 'Massa', 'MS', 0, 1),
(177, 10, 1, 'Matera', 'MT', 0, 1),
(178, 10, 1, 'Medio Campidano', 'VS', 0, 1),
(179, 10, 1, 'Messina', 'ME', 0, 1),
(180, 10, 1, 'Milano', 'MI', 0, 1),
(181, 10, 1, 'Modena', 'MO', 0, 1),
(182, 10, 1, 'Monza e della Brianza', 'MB', 0, 1),
(183, 10, 1, 'Napoli', 'NA', 0, 1),
(184, 10, 1, 'Novara', 'NO', 0, 1),
(185, 10, 1, 'Nuoro', 'NU', 0, 1),
(186, 10, 1, 'Ogliastra', 'OG', 0, 1),
(187, 10, 1, 'Olbia-Tempio', 'OT', 0, 1),
(188, 10, 1, 'Oristano', 'OR', 0, 1),
(189, 10, 1, 'Padova', 'PD', 0, 1),
(190, 10, 1, 'Palermo', 'PA', 0, 1),
(191, 10, 1, 'Parma', 'PR', 0, 1),
(192, 10, 1, 'Pavia', 'PV', 0, 1),
(193, 10, 1, 'Perugia', 'PG', 0, 1),
(194, 10, 1, 'Pesaro-Urbino', 'PU', 0, 1),
(195, 10, 1, 'Pescara', 'PE', 0, 1),
(196, 10, 1, 'Piacenza', 'PC', 0, 1),
(197, 10, 1, 'Pisa', 'PI', 0, 1),
(198, 10, 1, 'Pistoia', 'PT', 0, 1),
(199, 10, 1, 'Pordenone', 'PN', 0, 1),
(200, 10, 1, 'Potenza', 'PZ', 0, 1),
(201, 10, 1, 'Prato', 'PO', 0, 1),
(202, 10, 1, 'Ragusa', 'RG', 0, 1),
(203, 10, 1, 'Ravenna', 'RA', 0, 1),
(204, 10, 1, 'Reggio Calabria', 'RC', 0, 1),
(205, 10, 1, 'Reggio Emilia', 'RE', 0, 1),
(206, 10, 1, 'Rieti', 'RI', 0, 1),
(207, 10, 1, 'Rimini', 'RN', 0, 1),
(208, 10, 1, 'Roma', 'RM', 0, 1),
(209, 10, 1, 'Rovigo', 'RO', 0, 1),
(210, 10, 1, 'Salerno', 'SA', 0, 1),
(211, 10, 1, 'Sassari', 'SS', 0, 1),
(212, 10, 1, 'Savona', 'SV', 0, 1),
(213, 10, 1, 'Siena', 'SI', 0, 1),
(214, 10, 1, 'Siracusa', 'SR', 0, 1),
(215, 10, 1, 'Sondrio', 'SO', 0, 1),
(216, 10, 1, 'Taranto', 'TA', 0, 1),
(217, 10, 1, 'Teramo', 'TE', 0, 1),
(218, 10, 1, 'Terni', 'TR', 0, 1),
(219, 10, 1, 'Torino', 'TO', 0, 1),
(220, 10, 1, 'Trapani', 'TP', 0, 1),
(221, 10, 1, 'Trento', 'TN', 0, 1),
(222, 10, 1, 'Treviso', 'TV', 0, 1),
(223, 10, 1, 'Trieste', 'TS', 0, 1),
(224, 10, 1, 'Udine', 'UD', 0, 1),
(225, 10, 1, 'Varese', 'VA', 0, 1),
(226, 10, 1, 'Venezia', 'VE', 0, 1),
(227, 10, 1, 'Verbano-Cusio-Ossola', 'VB', 0, 1),
(228, 10, 1, 'Vercelli', 'VC', 0, 1),
(229, 10, 1, 'Verona', 'VR', 0, 1),
(230, 10, 1, 'Vibo Valentia', 'VV', 0, 1),
(231, 10, 1, 'Vicenza', 'VI', 0, 1),
(232, 10, 1, 'Viterbo', 'VT', 0, 1),
(233, 111, 3, 'Aceh', 'AC', 0, 1),
(234, 111, 3, 'Bali', 'BA', 0, 1),
(235, 111, 3, 'Bangka', 'BB', 0, 1),
(236, 111, 3, 'Banten', 'BT', 0, 1),
(237, 111, 3, 'Bengkulu', 'BE', 0, 1),
(238, 111, 3, 'Central Java', 'JT', 0, 1),
(239, 111, 3, 'Central Kalimantan', 'KT', 0, 1),
(240, 111, 3, 'Central Sulawesi', 'ST', 0, 1),
(241, 111, 3, 'Coat of arms of East Java', 'JI', 0, 1),
(242, 111, 3, 'East kalimantan', 'KI', 0, 1),
(243, 111, 3, 'East Nusa Tenggara', 'NT', 0, 1),
(244, 111, 3, 'Lambang propinsi', 'GO', 0, 1),
(245, 111, 3, 'Jakarta', 'JK', 0, 1),
(246, 111, 3, 'Jambi', 'JA', 0, 1),
(247, 111, 3, 'Lampung', 'LA', 0, 1),
(248, 111, 3, 'Maluku', 'MA', 0, 1),
(249, 111, 3, 'North Maluku', 'MU', 0, 1),
(250, 111, 3, 'North Sulawesi', 'SA', 0, 1),
(251, 111, 3, 'North Sumatra', 'SU', 0, 1),
(252, 111, 3, 'Papua', 'PA', 0, 1),
(253, 111, 3, 'Riau', 'RI', 0, 1),
(254, 111, 3, 'Lambang Riau', 'KR', 0, 1),
(255, 111, 3, 'Southeast Sulawesi', 'SG', 0, 1),
(256, 111, 3, 'South Kalimantan', 'KS', 0, 1),
(257, 111, 3, 'South Sulawesi', 'SN', 0, 1),
(258, 111, 3, 'South Sumatra', 'SS', 0, 1),
(259, 111, 3, 'West Java', 'JB', 0, 1),
(260, 111, 3, 'West Kalimantan', 'KB', 0, 1),
(261, 111, 3, 'West Nusa Tenggara', 'NB', 0, 1),
(262, 111, 3, 'Lambang Provinsi Papua Barat', 'PB', 0, 1),
(263, 111, 3, 'West Sulawesi', 'SR', 0, 1),
(264, 111, 3, 'West Sumatra', 'SB', 0, 1),
(265, 111, 3, 'Yogyakarta', 'YO', 0, 1),
(266, 11, 3, 'Aichi', '23', 0, 1),
(267, 11, 3, 'Akita', '05', 0, 1),
(268, 11, 3, 'Aomori', '02', 0, 1),
(269, 11, 3, 'Chiba', '12', 0, 1),
(270, 11, 3, 'Ehime', '38', 0, 1),
(271, 11, 3, 'Fukui', '18', 0, 1),
(272, 11, 3, 'Fukuoka', '40', 0, 1),
(273, 11, 3, 'Fukushima', '07', 0, 1),
(274, 11, 3, 'Gifu', '21', 0, 1),
(275, 11, 3, 'Gunma', '10', 0, 1),
(276, 11, 3, 'Hiroshima', '34', 0, 1),
(277, 11, 3, 'Hokkaido', '01', 0, 1),
(278, 11, 3, 'Hyogo', '28', 0, 1),
(279, 11, 3, 'Ibaraki', '08', 0, 1),
(280, 11, 3, 'Ishikawa', '17', 0, 1),
(281, 11, 3, 'Iwate', '03', 0, 1),
(282, 11, 3, 'Kagawa', '37', 0, 1),
(283, 11, 3, 'Kagoshima', '46', 0, 1),
(284, 11, 3, 'Kanagawa', '14', 0, 1),
(285, 11, 3, 'Kochi', '39', 0, 1),
(286, 11, 3, 'Kumamoto', '43', 0, 1),
(287, 11, 3, 'Kyoto', '26', 0, 1),
(288, 11, 3, 'Mie', '24', 0, 1),
(289, 11, 3, 'Miyagi', '04', 0, 1),
(290, 11, 3, 'Miyazaki', '45', 0, 1),
(291, 11, 3, 'Nagano', '20', 0, 1),
(292, 11, 3, 'Nagasaki', '42', 0, 1),
(293, 11, 3, 'Nara', '29', 0, 1),
(294, 11, 3, 'Niigata', '15', 0, 1),
(295, 11, 3, 'Oita', '44', 0, 1),
(296, 11, 3, 'Okayama', '33', 0, 1),
(297, 11, 3, 'Okinawa', '47', 0, 1),
(298, 11, 3, 'Osaka', '27', 0, 1),
(299, 11, 3, 'Saga', '41', 0, 1),
(300, 11, 3, 'Saitama', '11', 0, 1),
(301, 11, 3, 'Shiga', '25', 0, 1),
(302, 11, 3, 'Shimane', '32', 0, 1),
(303, 11, 3, 'Shizuoka', '22', 0, 1),
(304, 11, 3, 'Tochigi', '09', 0, 1),
(305, 11, 3, 'Tokushima', '36', 0, 1),
(306, 11, 3, 'Tokyo', '13', 0, 1),
(307, 11, 3, 'Tottori', '31', 0, 1),
(308, 11, 3, 'Toyama', '16', 0, 1),
(309, 11, 3, 'Wakayama', '30', 0, 1),
(310, 11, 3, 'Yamagata', '06', 0, 1),
(311, 11, 3, 'Yamaguchi', '35', 0, 1),
(312, 11, 3, 'Yamanashi', '19', 0, 1),
(313, 24, 5, 'Australian Capital Territory', 'ACT', 0, 1),
(314, 24, 5, 'Victoria', 'VIC', 0, 1),
(315, 24, 5, 'Tasmania', 'TAS', 0, 1),
(316, 24, 5, 'New South Wales', 'NSW', 0, 1),
(317, 24, 5, 'Northern Territory', 'NT', 0, 1),
(318, 24, 5, 'Queensland', 'QLD', 0, 1),
(319, 24, 5, 'South Australia', 'SA', 0, 1),
(320, 24, 5, 'Western Australia', 'WA', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gc_supplier`
--

CREATE TABLE IF NOT EXISTS `gc_supplier` (
  `id_supplier` int(10) unsigned NOT NULL,
  `manager_name` varchar(64) default NULL,
  `manager_email` varchar(128) default NULL,
  `sales_name` varchar(64) default NULL,
  `sales_email` varchar(128) default NULL,
  `reservations_name` varchar(64) default NULL,
  `reservations_email` varchar(128) default NULL,
  `reservations_phone` varchar(64) default NULL,
  `reservations_fx` varchar(64) default NULL,
  `accounts_name` varchar(64) default NULL,
  `accounts_email` varchar(128) default NULL,
  `accounts_phone` varchar(64) default NULL,
  `accounts_fx` varchar(64) default NULL,
  `supplier_abn` varchar(64) default NULL,
  `member_chain_group` varchar(64) default NULL,
  `room_count` int(10) default NULL,
  `website` varchar(128) default NULL,
  `check_in_time` char(5) default '14:00',
  `check_out_time` char(5) default '11:00',
  PRIMARY KEY  (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_supplier`
--

INSERT INTO `gc_supplier` (`id_supplier`, `manager_name`, `manager_email`, `sales_name`, `sales_email`, `reservations_name`, `reservations_email`, `reservations_phone`, `reservations_fx`, `accounts_name`, `accounts_email`, `accounts_phone`, `accounts_fx`, `supplier_abn`, `member_chain_group`, `room_count`, `website`, `check_in_time`, `check_out_time`) VALUES
(2, '', '', 'Hotel Supplier 1', '', '', '', '', '', '', '', '', '', '123123123', '', NULL, '', '14:00', '11:30');

-- --------------------------------------------------------

--
-- Table structure for table `gc_supplier_attribute_value`
--

CREATE TABLE IF NOT EXISTS `gc_supplier_attribute_value` (
  `id_supplier` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
  `value` varchar(300) NOT NULL,
  PRIMARY KEY  (`id_supplier`,`id_attribute`),
  KEY `id_attribute` (`id_attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_supplier_attribute_value`
--

INSERT INTO `gc_supplier_attribute_value` (`id_supplier`, `id_attribute`, `value`) VALUES
(2, 9, '89'),
(2, 15, '133');

-- --------------------------------------------------------

--
-- Table structure for table `gc_supplier_image`
--

CREATE TABLE IF NOT EXISTS `gc_supplier_image` (
  `id_image` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_image`),
  KEY `id_supplier` (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_supplier_image`
--

INSERT INTO `gc_supplier_image` (`id_image`, `id_supplier`) VALUES
(19, 2),
(33, 2),
(35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gc_supplier_lang`
--

CREATE TABLE IF NOT EXISTS `gc_supplier_lang` (
  `id_supplier` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `short_promotional_blurb` text,
  `property_details` text,
  `business_facilities` text,
  `checkin_instructions` text,
  `car_parking` text,
  `getting_there` text,
  `things_to_do` text,
  `link_rewrite` varchar(128) default NULL,
  `meta_title` varchar(128) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `meta_description` varchar(255) default NULL,
  PRIMARY KEY  (`id_supplier`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gc_supplier_lang`
--

INSERT INTO `gc_supplier_lang` (`id_supplier`, `id_lang`, `short_promotional_blurb`, `property_details`, `business_facilities`, `checkin_instructions`, `car_parking`, `getting_there`, `things_to_do`, `link_rewrite`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(2, 1, 'Short Promotional Blurb', 'Property Details', 'Business Facilities', 'Checkin Instructions', 'Car Parking', 'Getting There', 'Things To Do', NULL, NULL, NULL, NULL),
(2, 2, 'Short Promotional Blurb\r\n한글', 'Property Details\r\n한글', 'Business Facilities\r\n한글', 'Checkin Instructions\r\n한글', 'Car Parking\r\n한글', 'Getting There\r\n한글', 'Things To Do\r\n한글', NULL, NULL, NULL, NULL),
(2, 3, 'Short Promotional Blurb\r\nChinese..', 'Property Details\r\nChinese..', 'Business Facilities\r\nChinese..', 'Checkin Instructions\r\nChinese..', 'Car Parking\r\nChinese..', 'Getting There\r\nChinese..', 'Things To Do\r\nChinese..', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gc_timezone`
--

CREATE TABLE IF NOT EXISTS `gc_timezone` (
  `id_timezone` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id_timezone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=561 ;

--
-- Dumping data for table `gc_timezone`
--

INSERT INTO `gc_timezone` (`id_timezone`, `name`) VALUES
(1, 'Africa/Abidjan'),
(2, 'Africa/Accra'),
(3, 'Africa/Addis_Ababa'),
(4, 'Africa/Algiers'),
(5, 'Africa/Asmara'),
(6, 'Africa/Asmera'),
(7, 'Africa/Bamako'),
(8, 'Africa/Bangui'),
(9, 'Africa/Banjul'),
(10, 'Africa/Bissau'),
(11, 'Africa/Blantyre'),
(12, 'Africa/Brazzaville'),
(13, 'Africa/Bujumbura'),
(14, 'Africa/Cairo'),
(15, 'Africa/Casablanca'),
(16, 'Africa/Ceuta'),
(17, 'Africa/Conakry'),
(18, 'Africa/Dakar'),
(19, 'Africa/Dar_es_Salaam'),
(20, 'Africa/Djibouti'),
(21, 'Africa/Douala'),
(22, 'Africa/El_Aaiun'),
(23, 'Africa/Freetown'),
(24, 'Africa/Gaborone'),
(25, 'Africa/Harare'),
(26, 'Africa/Johannesburg'),
(27, 'Africa/Kampala'),
(28, 'Africa/Khartoum'),
(29, 'Africa/Kigali'),
(30, 'Africa/Kinshasa'),
(31, 'Africa/Lagos'),
(32, 'Africa/Libreville'),
(33, 'Africa/Lome'),
(34, 'Africa/Luanda'),
(35, 'Africa/Lubumbashi'),
(36, 'Africa/Lusaka'),
(37, 'Africa/Malabo'),
(38, 'Africa/Maputo'),
(39, 'Africa/Maseru'),
(40, 'Africa/Mbabane'),
(41, 'Africa/Mogadishu'),
(42, 'Africa/Monrovia'),
(43, 'Africa/Nairobi'),
(44, 'Africa/Ndjamena'),
(45, 'Africa/Niamey'),
(46, 'Africa/Nouakchott'),
(47, 'Africa/Ouagadougou'),
(48, 'Africa/Porto-Novo'),
(49, 'Africa/Sao_Tome'),
(50, 'Africa/Timbuktu'),
(51, 'Africa/Tripoli'),
(52, 'Africa/Tunis'),
(53, 'Africa/Windhoek'),
(54, 'America/Adak'),
(55, 'America/Anchorage '),
(56, 'America/Anguilla'),
(57, 'America/Antigua'),
(58, 'America/Araguaina'),
(59, 'America/Argentina/Buenos_Aires'),
(60, 'America/Argentina/Catamarca'),
(61, 'America/Argentina/ComodRivadavia'),
(62, 'America/Argentina/Cordoba'),
(63, 'America/Argentina/Jujuy'),
(64, 'America/Argentina/La_Rioja'),
(65, 'America/Argentina/Mendoza'),
(66, 'America/Argentina/Rio_Gallegos'),
(67, 'America/Argentina/Salta'),
(68, 'America/Argentina/San_Juan'),
(69, 'America/Argentina/San_Luis'),
(70, 'America/Argentina/Tucuman'),
(71, 'America/Argentina/Ushuaia'),
(72, 'America/Aruba'),
(73, 'America/Asuncion'),
(74, 'America/Atikokan'),
(75, 'America/Atka'),
(76, 'America/Bahia'),
(77, 'America/Barbados'),
(78, 'America/Belem'),
(79, 'America/Belize'),
(80, 'America/Blanc-Sablon'),
(81, 'America/Boa_Vista'),
(82, 'America/Bogota'),
(83, 'America/Boise'),
(84, 'America/Buenos_Aires'),
(85, 'America/Cambridge_Bay'),
(86, 'America/Campo_Grande'),
(87, 'America/Cancun'),
(88, 'America/Caracas'),
(89, 'America/Catamarca'),
(90, 'America/Cayenne'),
(91, 'America/Cayman'),
(92, 'America/Chicago'),
(93, 'America/Chihuahua'),
(94, 'America/Coral_Harbour'),
(95, 'America/Cordoba'),
(96, 'America/Costa_Rica'),
(97, 'America/Cuiaba'),
(98, 'America/Curacao'),
(99, 'America/Danmarkshavn'),
(100, 'America/Dawson'),
(101, 'America/Dawson_Creek'),
(102, 'America/Denver'),
(103, 'America/Detroit'),
(104, 'America/Dominica'),
(105, 'America/Edmonton'),
(106, 'America/Eirunepe'),
(107, 'America/El_Salvador'),
(108, 'America/Ensenada'),
(109, 'America/Fort_Wayne'),
(110, 'America/Fortaleza'),
(111, 'America/Glace_Bay'),
(112, 'America/Godthab'),
(113, 'America/Goose_Bay'),
(114, 'America/Grand_Turk'),
(115, 'America/Grenada'),
(116, 'America/Guadeloupe'),
(117, 'America/Guatemala'),
(118, 'America/Guayaquil'),
(119, 'America/Guyana'),
(120, 'America/Halifax'),
(121, 'America/Havana'),
(122, 'America/Hermosillo'),
(123, 'America/Indiana/Indianapolis'),
(124, 'America/Indiana/Knox'),
(125, 'America/Indiana/Marengo'),
(126, 'America/Indiana/Petersburg'),
(127, 'America/Indiana/Tell_City'),
(128, 'America/Indiana/Vevay'),
(129, 'America/Indiana/Vincennes'),
(130, 'America/Indiana/Winamac'),
(131, 'America/Indianapolis'),
(132, 'America/Inuvik'),
(133, 'America/Iqaluit'),
(134, 'America/Jamaica'),
(135, 'America/Jujuy'),
(136, 'America/Juneau'),
(137, 'America/Kentucky/Louisville'),
(138, 'America/Kentucky/Monticello'),
(139, 'America/Knox_IN'),
(140, 'America/La_Paz'),
(141, 'America/Lima'),
(142, 'America/Los_Angeles'),
(143, 'America/Louisville'),
(144, 'America/Maceio'),
(145, 'America/Managua'),
(146, 'America/Manaus'),
(147, 'America/Marigot'),
(148, 'America/Martinique'),
(149, 'America/Mazatlan'),
(150, 'America/Mendoza'),
(151, 'America/Menominee'),
(152, 'America/Merida'),
(153, 'America/Mexico_City'),
(154, 'America/Miquelon'),
(155, 'America/Moncton'),
(156, 'America/Monterrey'),
(157, 'America/Montevideo'),
(158, 'America/Montreal'),
(159, 'America/Montserrat'),
(160, 'America/Nassau'),
(161, 'America/New_York'),
(162, 'America/Nipigon'),
(163, 'America/Nome'),
(164, 'America/Noronha'),
(165, 'America/North_Dakota/Center'),
(166, 'America/North_Dakota/New_Salem'),
(167, 'America/Panama'),
(168, 'America/Pangnirtung'),
(169, 'America/Paramaribo'),
(170, 'America/Phoenix'),
(171, 'America/Port-au-Prince'),
(172, 'America/Port_of_Spain'),
(173, 'America/Porto_Acre'),
(174, 'America/Porto_Velho'),
(175, 'America/Puerto_Rico'),
(176, 'America/Rainy_River'),
(177, 'America/Rankin_Inlet'),
(178, 'America/Recife'),
(179, 'America/Regina'),
(180, 'America/Resolute'),
(181, 'America/Rio_Branco'),
(182, 'America/Rosario'),
(183, 'America/Santarem'),
(184, 'America/Santiago'),
(185, 'America/Santo_Domingo'),
(186, 'America/Sao_Paulo'),
(187, 'America/Scoresbysund'),
(188, 'America/Shiprock'),
(189, 'America/St_Barthelemy'),
(190, 'America/St_Johns'),
(191, 'America/St_Kitts'),
(192, 'America/St_Lucia'),
(193, 'America/St_Thomas'),
(194, 'America/St_Vincent'),
(195, 'America/Swift_Current'),
(196, 'America/Tegucigalpa'),
(197, 'America/Thule'),
(198, 'America/Thunder_Bay'),
(199, 'America/Tijuana'),
(200, 'America/Toronto'),
(201, 'America/Tortola'),
(202, 'America/Vancouver'),
(203, 'America/Virgin'),
(204, 'America/Whitehorse'),
(205, 'America/Winnipeg'),
(206, 'America/Yakutat'),
(207, 'America/Yellowknife'),
(208, 'Antarctica/Casey'),
(209, 'Antarctica/Davis'),
(210, 'Antarctica/DumontDUrville'),
(211, 'Antarctica/Mawson'),
(212, 'Antarctica/McMurdo'),
(213, 'Antarctica/Palmer'),
(214, 'Antarctica/Rothera'),
(215, 'Antarctica/South_Pole'),
(216, 'Antarctica/Syowa'),
(217, 'Antarctica/Vostok'),
(218, 'Arctic/Longyearbyen'),
(219, 'Asia/Aden'),
(220, 'Asia/Almaty'),
(221, 'Asia/Amman'),
(222, 'Asia/Anadyr'),
(223, 'Asia/Aqtau'),
(224, 'Asia/Aqtobe'),
(225, 'Asia/Ashgabat'),
(226, 'Asia/Ashkhabad'),
(227, 'Asia/Baghdad'),
(228, 'Asia/Bahrain'),
(229, 'Asia/Baku'),
(230, 'Asia/Bangkok'),
(231, 'Asia/Beirut'),
(232, 'Asia/Bishkek'),
(233, 'Asia/Brunei'),
(234, 'Asia/Calcutta'),
(235, 'Asia/Choibalsan'),
(236, 'Asia/Chongqing'),
(237, 'Asia/Chungking'),
(238, 'Asia/Colombo'),
(239, 'Asia/Dacca'),
(240, 'Asia/Damascus'),
(241, 'Asia/Dhaka'),
(242, 'Asia/Dili'),
(243, 'Asia/Dubai'),
(244, 'Asia/Dushanbe'),
(245, 'Asia/Gaza'),
(246, 'Asia/Harbin'),
(247, 'Asia/Ho_Chi_Minh'),
(248, 'Asia/Hong_Kong'),
(249, 'Asia/Hovd'),
(250, 'Asia/Irkutsk'),
(251, 'Asia/Istanbul'),
(252, 'Asia/Jakarta'),
(253, 'Asia/Jayapura'),
(254, 'Asia/Jerusalem'),
(255, 'Asia/Kabul'),
(256, 'Asia/Kamchatka'),
(257, 'Asia/Karachi'),
(258, 'Asia/Kashgar'),
(259, 'Asia/Kathmandu'),
(260, 'Asia/Katmandu'),
(261, 'Asia/Kolkata'),
(262, 'Asia/Krasnoyarsk'),
(263, 'Asia/Kuala_Lumpur'),
(264, 'Asia/Kuching'),
(265, 'Asia/Kuwait'),
(266, 'Asia/Macao'),
(267, 'Asia/Macau'),
(268, 'Asia/Magadan'),
(269, 'Asia/Makassar'),
(270, 'Asia/Manila'),
(271, 'Asia/Muscat'),
(272, 'Asia/Nicosia'),
(273, 'Asia/Novosibirsk'),
(274, 'Asia/Omsk'),
(275, 'Asia/Oral'),
(276, 'Asia/Phnom_Penh'),
(277, 'Asia/Pontianak'),
(278, 'Asia/Pyongyang'),
(279, 'Asia/Qatar'),
(280, 'Asia/Qyzylorda'),
(281, 'Asia/Rangoon'),
(282, 'Asia/Riyadh'),
(283, 'Asia/Saigon'),
(284, 'Asia/Sakhalin'),
(285, 'Asia/Samarkand'),
(286, 'Asia/Seoul'),
(287, 'Asia/Shanghai'),
(288, 'Asia/Singapore'),
(289, 'Asia/Taipei'),
(290, 'Asia/Tashkent'),
(291, 'Asia/Tbilisi'),
(292, 'Asia/Tehran'),
(293, 'Asia/Tel_Aviv'),
(294, 'Asia/Thimbu'),
(295, 'Asia/Thimphu'),
(296, 'Asia/Tokyo'),
(297, 'Asia/Ujung_Pandang'),
(298, 'Asia/Ulaanbaatar'),
(299, 'Asia/Ulan_Bator'),
(300, 'Asia/Urumqi'),
(301, 'Asia/Vientiane'),
(302, 'Asia/Vladivostok'),
(303, 'Asia/Yakutsk'),
(304, 'Asia/Yekaterinburg'),
(305, 'Asia/Yerevan'),
(306, 'Atlantic/Azores'),
(307, 'Atlantic/Bermuda'),
(308, 'Atlantic/Canary'),
(309, 'Atlantic/Cape_Verde'),
(310, 'Atlantic/Faeroe'),
(311, 'Atlantic/Faroe'),
(312, 'Atlantic/Jan_Mayen'),
(313, 'Atlantic/Madeira'),
(314, 'Atlantic/Reykjavik'),
(315, 'Atlantic/South_Georgia'),
(316, 'Atlantic/St_Helena'),
(317, 'Atlantic/Stanley'),
(318, 'Australia/ACT'),
(319, 'Australia/Adelaide'),
(320, 'Australia/Brisbane'),
(321, 'Australia/Broken_Hill'),
(322, 'Australia/Canberra'),
(323, 'Australia/Currie'),
(324, 'Australia/Darwin'),
(325, 'Australia/Eucla'),
(326, 'Australia/Hobart'),
(327, 'Australia/LHI'),
(328, 'Australia/Lindeman'),
(329, 'Australia/Lord_Howe'),
(330, 'Australia/Melbourne'),
(331, 'Australia/North'),
(332, 'Australia/NSW'),
(333, 'Australia/Perth'),
(334, 'Australia/Queensland'),
(335, 'Australia/South'),
(336, 'Australia/Sydney'),
(337, 'Australia/Tasmania'),
(338, 'Australia/Victoria'),
(339, 'Australia/West'),
(340, 'Australia/Yancowinna'),
(341, 'Europe/Amsterdam'),
(342, 'Europe/Andorra'),
(343, 'Europe/Athens'),
(344, 'Europe/Belfast'),
(345, 'Europe/Belgrade'),
(346, 'Europe/Berlin'),
(347, 'Europe/Bratislava'),
(348, 'Europe/Brussels'),
(349, 'Europe/Bucharest'),
(350, 'Europe/Budapest'),
(351, 'Europe/Chisinau'),
(352, 'Europe/Copenhagen'),
(353, 'Europe/Dublin'),
(354, 'Europe/Gibraltar'),
(355, 'Europe/Guernsey'),
(356, 'Europe/Helsinki'),
(357, 'Europe/Isle_of_Man'),
(358, 'Europe/Istanbul'),
(359, 'Europe/Jersey'),
(360, 'Europe/Kaliningrad'),
(361, 'Europe/Kiev'),
(362, 'Europe/Lisbon'),
(363, 'Europe/Ljubljana'),
(364, 'Europe/London'),
(365, 'Europe/Luxembourg'),
(366, 'Europe/Madrid'),
(367, 'Europe/Malta'),
(368, 'Europe/Mariehamn'),
(369, 'Europe/Minsk'),
(370, 'Europe/Monaco'),
(371, 'Europe/Moscow'),
(372, 'Europe/Nicosia'),
(373, 'Europe/Oslo'),
(374, 'Europe/Paris'),
(375, 'Europe/Podgorica'),
(376, 'Europe/Prague'),
(377, 'Europe/Riga'),
(378, 'Europe/Rome'),
(379, 'Europe/Samara'),
(380, 'Europe/San_Marino'),
(381, 'Europe/Sarajevo'),
(382, 'Europe/Simferopol'),
(383, 'Europe/Skopje'),
(384, 'Europe/Sofia'),
(385, 'Europe/Stockholm'),
(386, 'Europe/Tallinn'),
(387, 'Europe/Tirane'),
(388, 'Europe/Tiraspol'),
(389, 'Europe/Uzhgorod'),
(390, 'Europe/Vaduz'),
(391, 'Europe/Vatican'),
(392, 'Europe/Vienna'),
(393, 'Europe/Vilnius'),
(394, 'Europe/Volgograd'),
(395, 'Europe/Warsaw'),
(396, 'Europe/Zagreb'),
(397, 'Europe/Zaporozhye'),
(398, 'Europe/Zurich'),
(399, 'Indian/Antananarivo'),
(400, 'Indian/Chagos'),
(401, 'Indian/Christmas'),
(402, 'Indian/Cocos'),
(403, 'Indian/Comoro'),
(404, 'Indian/Kerguelen'),
(405, 'Indian/Mahe'),
(406, 'Indian/Maldives'),
(407, 'Indian/Mauritius'),
(408, 'Indian/Mayotte'),
(409, 'Indian/Reunion'),
(410, 'Pacific/Apia'),
(411, 'Pacific/Auckland'),
(412, 'Pacific/Chatham'),
(413, 'Pacific/Easter'),
(414, 'Pacific/Efate'),
(415, 'Pacific/Enderbury'),
(416, 'Pacific/Fakaofo'),
(417, 'Pacific/Fiji'),
(418, 'Pacific/Funafuti'),
(419, 'Pacific/Galapagos'),
(420, 'Pacific/Gambier'),
(421, 'Pacific/Guadalcanal'),
(422, 'Pacific/Guam'),
(423, 'Pacific/Honolulu'),
(424, 'Pacific/Johnston'),
(425, 'Pacific/Kiritimati'),
(426, 'Pacific/Kosrae'),
(427, 'Pacific/Kwajalein'),
(428, 'Pacific/Majuro'),
(429, 'Pacific/Marquesas'),
(430, 'Pacific/Midway'),
(431, 'Pacific/Nauru'),
(432, 'Pacific/Niue'),
(433, 'Pacific/Norfolk'),
(434, 'Pacific/Noumea'),
(435, 'Pacific/Pago_Pago'),
(436, 'Pacific/Palau'),
(437, 'Pacific/Pitcairn'),
(438, 'Pacific/Ponape'),
(439, 'Pacific/Port_Moresby'),
(440, 'Pacific/Rarotonga'),
(441, 'Pacific/Saipan'),
(442, 'Pacific/Samoa'),
(443, 'Pacific/Tahiti'),
(444, 'Pacific/Tarawa'),
(445, 'Pacific/Tongatapu'),
(446, 'Pacific/Truk'),
(447, 'Pacific/Wake'),
(448, 'Pacific/Wallis'),
(449, 'Pacific/Yap'),
(450, 'Brazil/Acre'),
(451, 'Brazil/DeNoronha'),
(452, 'Brazil/East'),
(453, 'Brazil/West'),
(454, 'Canada/Atlantic'),
(455, 'Canada/Central'),
(456, 'Canada/East-Saskatchewan'),
(457, 'Canada/Eastern'),
(458, 'Canada/Mountain'),
(459, 'Canada/Newfoundland'),
(460, 'Canada/Pacific'),
(461, 'Canada/Saskatchewan'),
(462, 'Canada/Yukon'),
(463, 'CET'),
(464, 'Chile/Continental'),
(465, 'Chile/EasterIsland'),
(466, 'CST6CDT'),
(467, 'Cuba'),
(468, 'EET'),
(469, 'Egypt'),
(470, 'Eire'),
(471, 'EST'),
(472, 'EST5EDT'),
(473, 'Etc/GMT'),
(474, 'Etc/GMT+0'),
(475, 'Etc/GMT+1'),
(476, 'Etc/GMT+10'),
(477, 'Etc/GMT+11'),
(478, 'Etc/GMT+12'),
(479, 'Etc/GMT+2'),
(480, 'Etc/GMT+3'),
(481, 'Etc/GMT+4'),
(482, 'Etc/GMT+5'),
(483, 'Etc/GMT+6'),
(484, 'Etc/GMT+7'),
(485, 'Etc/GMT+8'),
(486, 'Etc/GMT+9'),
(487, 'Etc/GMT-0'),
(488, 'Etc/GMT-1'),
(489, 'Etc/GMT-10'),
(490, 'Etc/GMT-11'),
(491, 'Etc/GMT-12'),
(492, 'Etc/GMT-13'),
(493, 'Etc/GMT-14'),
(494, 'Etc/GMT-2'),
(495, 'Etc/GMT-3'),
(496, 'Etc/GMT-4'),
(497, 'Etc/GMT-5'),
(498, 'Etc/GMT-6'),
(499, 'Etc/GMT-7'),
(500, 'Etc/GMT-8'),
(501, 'Etc/GMT-9'),
(502, 'Etc/GMT0'),
(503, 'Etc/Greenwich'),
(504, 'Etc/UCT'),
(505, 'Etc/Universal'),
(506, 'Etc/UTC'),
(507, 'Etc/Zulu'),
(508, 'Factory'),
(509, 'GB'),
(510, 'GB-Eire'),
(511, 'GMT'),
(512, 'GMT+0'),
(513, 'GMT-0'),
(514, 'GMT0'),
(515, 'Greenwich'),
(516, 'Hongkong'),
(517, 'HST'),
(518, 'Iceland'),
(519, 'Iran'),
(520, 'Israel'),
(521, 'Jamaica'),
(522, 'Japan'),
(523, 'Kwajalein'),
(524, 'Libya'),
(525, 'MET'),
(526, 'Mexico/BajaNorte'),
(527, 'Mexico/BajaSur'),
(528, 'Mexico/General'),
(529, 'MST'),
(530, 'MST7MDT'),
(531, 'Navajo'),
(532, 'NZ'),
(533, 'NZ-CHAT'),
(534, 'Poland'),
(535, 'Portugal'),
(536, 'PRC'),
(537, 'PST8PDT'),
(538, 'ROC'),
(539, 'ROK'),
(540, 'Singapore'),
(541, 'Turkey'),
(542, 'UCT'),
(543, 'Universal'),
(544, 'US/Alaska'),
(545, 'US/Aleutian'),
(546, 'US/Arizona'),
(547, 'US/Central'),
(548, 'US/East-Indiana'),
(549, 'US/Eastern'),
(550, 'US/Hawaii'),
(551, 'US/Indiana-Starke'),
(552, 'US/Michigan'),
(553, 'US/Mountain'),
(554, 'US/Pacific'),
(555, 'US/Pacific-New'),
(556, 'US/Samoa'),
(557, 'UTC'),
(558, 'W-SU'),
(559, 'WET'),
(560, 'Zulu');

-- --------------------------------------------------------

--
-- Table structure for table `gc_user`
--

CREATE TABLE IF NOT EXISTS `gc_user` (
  `id_user` int(10) unsigned NOT NULL auto_increment,
  `id_group` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL default '0',
  `id_address_default` int(10) unsigned DEFAULT NULL,
  `id_address_delivery` int(10) unsigned DEFAULT NULL,
  `id_address_invoice` int(10) unsigned DEFAULT NULL,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `is_guest` tinyint(1) NOT NULL default '0',
  `note` text,
  `birthday` date default NULL,
  `active` tinyint(1) unsigned NOT NULL default '0',
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_user`),
  KEY `user_login` (`email`,`passwd`),
  KEY `id_user_passwd` (`id_user`,`passwd`),
  KEY `id_group` (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gc_user`
--

INSERT INTO `gc_user` (`id_user`, `id_group`, `id_lang`, `lastname`, `firstname`, `email`, `passwd`, `is_guest`, `note`, `birthday`, `active`, `deleted`) VALUES
(1, 1, 1, 'Admin', 'Admin', 'admin@holidoy.com.au', 'f09e619e3aa89309400e670d4cab9ffb', 0, '', '0000-00-00', 1, 0),
(2, 2, 1, 'supplier', 'hotel', 'supplier@holidoy.com.au', 'f09e619e3aa89309400e670d4cab9ffb', 0, '', '0000-00-00', 1, 0),
(3, 3, 2, 'Agent', '에이저트', 'agent@holidoy.com.au', 'f09e619e3aa89309400e670d4cab9ffb', 0, '', '0000-00-00', 1, 0),
(4, 4, 1, 'customer', 'c', 'customer@holidoy.com.au', 'f09e619e3aa89309400e670d4cab9ffb', 0, '', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gc_zone`
--

CREATE TABLE IF NOT EXISTS `gc_zone` (
  `id_zone` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gc_zone`
--

INSERT INTO `gc_zone` (`id_zone`, `name`, `active`) VALUES
(1, 'Europe', 1),
(2, 'North America', 1),
(3, 'Asia', 1),
(4, 'Africa', 1),
(5, 'Oceania', 1),
(6, 'South America', 1),
(7, 'Europe (out E.U)', 1),
(8, 'Centrale America/Antilla', 1),
(10, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL default '0',
  `language` varchar(16) NOT NULL default '',
  `translation` text,
  PRIMARY KEY  (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `language`, `translation`) VALUES
(1, 'en', 'test'),
(1, 'ko', '메시지 테스트'),
(1, 'zh', 'MESSAGE CH'),
(2, 'en', 'TESTee'),
(2, 'ko', '테스트..ㄹ'),
(2, 'zh', 'TEST CH'),
(3, 'en', 'TEST123'),
(3, 'en_us', 'KOR MESSAGE'),
(3, 'ko', '테스트'),
(3, 'zh', 'CH MEssage');

-- --------------------------------------------------------

--
-- Table structure for table `SourceMessage`
--

CREATE TABLE IF NOT EXISTS `SourceMessage` (
  `id` int(11) NOT NULL auto_increment,
  `category` varchar(32) default NULL,
  `message` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `SourceMessage`
--

INSERT INTO `SourceMessage` (`id`, `category`, `message`) VALUES
(1, 'test', 'Message'),
(2, 'test', '001'),
(3, 'test', 'You fdsafds');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gc_address`
--
ALTER TABLE `gc_address`
  ADD CONSTRAINT `gc_address_ibfk_4` FOREIGN KEY (`id_destination`) REFERENCES `gc_destination` (`id_destination`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_address_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `gc_country` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_address_ibfk_2` FOREIGN KEY (`id_state`) REFERENCES `gc_state` (`id_state`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_attribute`
--
ALTER TABLE `gc_attribute`
  ADD CONSTRAINT `gc_attribute_ibfk_1` FOREIGN KEY (`id_attribute_group`) REFERENCES `gc_attribute_group` (`id_attribute_group`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_attribute_item`
--
ALTER TABLE `gc_attribute_item`
  ADD CONSTRAINT `gc_attribute_item_ibfk_1` FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute` (`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_bedding`
--
ALTER TABLE `gc_bedding`
  ADD CONSTRAINT `gc_bedding_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `gc_room` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_cart`
--
ALTER TABLE `gc_cart`
  ADD CONSTRAINT `gc_cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `gc_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_cart_ibfk_2` FOREIGN KEY (`id_address_delivery`) REFERENCES `gc_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_cart_ibfk_3` FOREIGN KEY (`id_address_invoice`) REFERENCES `gc_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_cart_ibfk_4` FOREIGN KEY (`id_currency`) REFERENCES `gc_currency` (`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_cart_product`
--
ALTER TABLE `gc_cart_product`
  ADD CONSTRAINT `gc_cart_product_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `gc_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_cart_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_cart_product_ibfk_3` FOREIGN KEY (`id_product_date`) REFERENCES `gc_product_date` (`id_product_date`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_category`
--
ALTER TABLE `gc_category`
  ADD CONSTRAINT `gc_category_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `gc_service` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_category_lang`
--
ALTER TABLE `gc_category_lang`
  ADD CONSTRAINT `gc_category_lang_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `gc_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_category_product`
--
ALTER TABLE `gc_category_product`
  ADD CONSTRAINT `gc_category_product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `gc_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_category_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_cms`
--
ALTER TABLE `gc_cms`
  ADD CONSTRAINT `gc_cms_ibfk_1` FOREIGN KEY (`id_cms_category`) REFERENCES `gc_cms_category` (`id_cms_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_cms_category`
--
ALTER TABLE `gc_cms_category`
  ADD CONSTRAINT `gc_cms_category_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `gc_cms_category` (`id_cms_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_cms_category_lang`
--
ALTER TABLE `gc_cms_category_lang`
  ADD CONSTRAINT `gc_cms_category_lang_ibfk_1` FOREIGN KEY (`id_cms_category`) REFERENCES `gc_cms_category` (`id_cms_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_cms_lang`
--
ALTER TABLE `gc_cms_lang`
  ADD CONSTRAINT `gc_cms_lang_ibfk_1` FOREIGN KEY (`id_cms`) REFERENCES `gc_cms` (`id_cms`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_code`
--
ALTER TABLE `gc_code`
  ADD CONSTRAINT `gc_code_ibfk_1` FOREIGN KEY (`type`) REFERENCES `gc_code_type` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_configuration_lang`
--
ALTER TABLE `gc_configuration_lang`
  ADD CONSTRAINT `gc_configuration_lang_ibfk_1` FOREIGN KEY (`id_configuration`) REFERENCES `gc_configuration` (`id_configuration`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_country`
--
ALTER TABLE `gc_country`
  ADD CONSTRAINT `gc_country_ibfk_1` FOREIGN KEY (`id_zone`) REFERENCES `gc_zone` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_destination`
--
ALTER TABLE `gc_destination`
  ADD CONSTRAINT `gc_destination_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `gc_country` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_destination_ibfk_2` FOREIGN KEY (`id_state`) REFERENCES `gc_state` (`id_state`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_discount`
--
ALTER TABLE `gc_discount`
  ADD CONSTRAINT `gc_discount_ibfk_1` FOREIGN KEY (`id_discount_type`) REFERENCES `gc_discount_type` (`id_discount_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_discount_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `gc_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_discount_ibfk_3` FOREIGN KEY (`id_currency`) REFERENCES `gc_currency` (`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_discount_category`
--
ALTER TABLE `gc_discount_category`
  ADD CONSTRAINT `gc_discount_category_ibfk_1` FOREIGN KEY (`id_discount`) REFERENCES `gc_discount` (`id_discount`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_hotel`
--
ALTER TABLE `gc_hotel`
  ADD CONSTRAINT `gc_hotel_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_order`
--
ALTER TABLE `gc_order`
  ADD CONSTRAINT `gc_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `gc_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_order_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `gc_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_order_ibfk_3` FOREIGN KEY (`id_currency`) REFERENCES `gc_currency` (`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_order_discount`
--
ALTER TABLE `gc_order_discount`
  ADD CONSTRAINT `gc_order_discount_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `gc_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_order_discount_ibfk_2` FOREIGN KEY (`id_discount`) REFERENCES `gc_discount` (`id_discount`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_order_history`
--
ALTER TABLE `gc_order_history`
  ADD CONSTRAINT `gc_order_history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `gc_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_order_history_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `gc_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_order_history_ibfk_3` FOREIGN KEY (`id_order_state`) REFERENCES `gc_order_state` (`id_order_state`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_order_item`
--
ALTER TABLE `gc_order_item`
  ADD CONSTRAINT `gc_order_item_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `gc_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_order_item_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `gc_service` (`id_service`),
  ADD CONSTRAINT `gc_order_item_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`),
  ADD CONSTRAINT `gc_order_item_ibfk_4` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`),
  ADD CONSTRAINT `gc_order_item_ibfk_5` FOREIGN KEY (`id_product_date`) REFERENCES `gc_product_date` (`id_product_date`);

--
-- Constraints for table `gc_product`
--
ALTER TABLE `gc_product`
  ADD CONSTRAINT `gc_product_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `gc_service` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_ibfk_2` FOREIGN KEY (`id_category_default`) REFERENCES `gc_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_ibfk_4` FOREIGN KEY (`id_address`) REFERENCES `gc_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_product_attachment`
--
ALTER TABLE `gc_product_attachment`
  ADD CONSTRAINT `gc_product_attachment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_attachment_ibfk_2` FOREIGN KEY (`id_attachment`) REFERENCES `gc_attachment` (`id_attachment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_product_attribute`
--
ALTER TABLE `gc_product_attribute`
  ADD CONSTRAINT `gc_product_attribute_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_attribute_ibfk_2` FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute` (`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_product_attribute_value`
--
ALTER TABLE `gc_product_attribute_value`
  ADD CONSTRAINT `gc_product_attribute_value_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_attribute_value_ibfk_2` FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute` (`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_product_date`
--
ALTER TABLE `gc_product_date`
  ADD CONSTRAINT `gc_product_date_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_product_image`
--
ALTER TABLE `gc_product_image`
  ADD CONSTRAINT `gc_product_image_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `gc_image` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_product_image_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_product_lang`
--
ALTER TABLE `gc_product_lang`
  ADD CONSTRAINT `gc_product_lang_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_room`
--
ALTER TABLE `gc_room`
  ADD CONSTRAINT `gc_room_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `gc_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_room_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_room_ibfk_3` FOREIGN KEY (`room_code`) REFERENCES `gc_code` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_special_product_date`
--
ALTER TABLE `gc_special_product_date`
  ADD CONSTRAINT `gc_special_product_date_ibfk_1` FOREIGN KEY (`id_special`) REFERENCES `gc_special` (`id_special`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_special_product_date_ibfk_2` FOREIGN KEY (`id_product_date`) REFERENCES `gc_product_date` (`id_product_date`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_state`
--
ALTER TABLE `gc_state`
  ADD CONSTRAINT `gc_state_ibfk_1` FOREIGN KEY (`id_zone`) REFERENCES `gc_zone` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_state_ibfk_2` FOREIGN KEY (`id_country`) REFERENCES `gc_country` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_supplier`
--
ALTER TABLE `gc_supplier`
  ADD CONSTRAINT `gc_supplier_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `gc_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_supplier_attribute_value`
--
ALTER TABLE `gc_supplier_attribute_value`
  ADD CONSTRAINT `gc_supplier_attribute_value_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_supplier_attribute_value_ibfk_2` FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute` (`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_supplier_image`
--
ALTER TABLE `gc_supplier_image`
  ADD CONSTRAINT `gc_supplier_image_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `gc_image` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_supplier_image_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_supplier_lang`
--
ALTER TABLE `gc_supplier_lang`
  ADD CONSTRAINT `gc_supplier_lang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gc_user`
--
ALTER TABLE `gc_user`
  ADD CONSTRAINT `gc_user_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `gc_group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_user_ibfk_2` FOREIGN KEY (`id_address_default`) REFERENCES `gc_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_user_ibfk_3` FOREIGN KEY (`id_address_delivery`) REFERENCES `gc_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_user_ibfk_4` FOREIGN KEY (`id_address_invoice`) REFERENCES `gc_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE;
  

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `FK_Message_SourceMessage` FOREIGN KEY (`id`) REFERENCES `SourceMessage` (`id`) ON DELETE CASCADE;
