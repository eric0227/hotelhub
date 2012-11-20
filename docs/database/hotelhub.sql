
DROP TABLE IF EXISTS `gc_discount_category`;
DROP TABLE IF EXISTS `gc_order_discount`;
DROP TABLE IF EXISTS `gc_discount`;
DROP TABLE IF EXISTS `gc_discount_type`;
DROP TABLE IF EXISTS `gc_discount_lang`;
DROP TABLE IF EXISTS `gc_order_history`;
DROP TABLE IF EXISTS `gc_order_state_lang`;
DROP TABLE IF EXISTS `gc_order_state`;
DROP TABLE IF EXISTS `gc_order_detail`;
DROP TABLE IF EXISTS `gc_order`;
DROP TABLE IF EXISTS `gc_configuration_lang`;
DROP TABLE IF EXISTS `gc_configuration`;
DROP TABLE IF EXISTS `gc_cms_lang`;
DROP TABLE IF EXISTS `gc_cms`;
DROP TABLE IF EXISTS `gc_cms_category_lang`;
DROP TABLE IF EXISTS `gc_cms_category`;

DROP TABLE IF EXISTS `gc_cart_product`;
DROP TABLE IF EXISTS `gc_cart`;
DROP TABLE IF EXISTS `gc_category_product`;

DROP TABLE IF EXISTS `gc_product_image`;
-- DROP TABLE IF EXISTS `gc_hotel_image`;
DROP TABLE IF EXISTS `gc_image_type`;
DROP TABLE IF EXISTS `gc_image`;
DROP TABLE IF EXISTS `gc_product_sale`;
DROP TABLE IF EXISTS `gc_product_attachment`;
DROP TABLE IF EXISTS `gc_product_lang`;
DROP TABLE IF EXISTS `gc_product`;
DROP TABLE IF EXISTS `gc_category_group`;
DROP TABLE IF EXISTS `gc_category_lang`;
DROP TABLE IF EXISTS `gc_category`;

DROP TABLE IF EXISTS `gc_attribute`;
DROP TABLE IF EXISTS `gc_attribute_group`;

DROP TABLE IF EXISTS `gc_attachment`;
DROP TABLE IF EXISTS `gc_timezone`;
DROP TABLE IF EXISTS `gc_address`;
DROP TABLE IF EXISTS `gc_state`;
DROP TABLE IF EXISTS `gc_user`;


DROP TABLE IF EXISTS `gc_user`;

DROP TABLE IF EXISTS `gc_group`;

DROP TABLE IF EXISTS `gc_supplier`;

DROP TABLE IF EXISTS `gc_state`;
DROP TABLE IF EXISTS `gc_country`;
DROP TABLE IF EXISTS `gc_currency`;
DROP TABLE IF EXISTS `gc_zone`;
DROP TABLE IF EXISTS `gc_lang`;

DROP TABLE IF EXISTS `gc_code`;
DROP TABLE IF EXISTS `gc_code_type`;


-- Added By Chris.
DROP TABLE IF EXISTS `gc_supplier_lang`;



CREATE TABLE SourceMessage
(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(32),
    message TEXT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
CREATE TABLE Message
(
    id INTEGER,
    language VARCHAR(16),
    translation TEXT,
    PRIMARY KEY (id, language),
    CONSTRAINT FK_Message_SourceMessage FOREIGN KEY (id)
         REFERENCES SourceMessage (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `gc_code_type` (  
  `type` char(3) NOT NULL,
  `name` VARCHAR(128) NOT NULL,  
  PRIMARY KEY (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_code_type` (`type`, `name`) VALUES
('001', 'Address Type'),
('002', 'Room Type');


CREATE TABLE IF NOT EXISTS `gc_code` (
  `code` char(6) NOT NULL,
  `type` char(3) NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `position` INT(3) NOT NULL,
  PRIMARY KEY (`code`),
  FOREIGN KEY (`type`) REFERENCES `gc_code_type`(`type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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


CREATE TABLE IF NOT EXISTS `gc_service` (
  `id_service` int(10) unsigned NOT NULL AUTO_INCREMENT,  
  `name` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO `gc_service` (`id_service`, `name`) VALUES
('1', 'Hotel'),
('2', 'Car')
;


CREATE TABLE IF NOT EXISTS `gc_zone` (
  `id_zone` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `name` varchar(64) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO `gc_zone` (`id_zone`, `name`, `active`) VALUES
(1, 'Europe', 1),
(2, 'North America', 1),
(3, 'Asia', 1),
(4, 'Africa', 1),
(5, 'Oceania', 1),
(6, 'South America', 1),
(7, 'Europe (out E.U)', 1),
(8, 'Centrale America/Antilla', 1);


CREATE TABLE IF NOT EXISTS `gc_currency` (
  `id_currency` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `name` varchar(32) NOT NULL,
  `iso_code` varchar(3) NOT NULL DEFAULT '0',
  `iso_code_num` varchar(3) NOT NULL DEFAULT '0',
  `sign` varchar(8) NOT NULL,
  `blank` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `format` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `decimals` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `conversion_rate` decimal(13,6) NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_currency` (`id_currency`, `name`, `iso_code`, `iso_code_num`, `sign`, `blank`, `format`, `decimals`, `conversion_rate`, `deleted`, `active`) VALUES
(1, 'Dollar', 'AUD', '36', '$', 0, 1, 1, 1.000000, 0, 1),
(2, 'Dollar', 'USD', '840', '$', 0, 1, 1, 1.051065, 0, 1),
(3, 'Won', 'KRW', '410', 'ï¿¦', 0, 1, 0, 120.000000, 0, 1),
(4, 'Yuan', 'CNY', '156', 'Ò°', 0, 1, 1, 6.740000, 0, 1);

CREATE TABLE IF NOT EXISTS `gc_country` (
  `id_country` int(10) unsigned NOT NULL AUTO_INCREMENT,
  
  `id_zone` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL DEFAULT '0',

  `iso_code` varchar(3) NOT NULL,
  `name` varchar(64),
  `call_prefix` int(10) NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `contains_states` tinyint(1) NOT NULL DEFAULT '0',
  `need_identification_number` tinyint(1) NOT NULL DEFAULT '0',
  `need_zip_code` tinyint(1) NOT NULL DEFAULT '1',
  `zip_code_format` varchar(12) NOT NULL DEFAULT '',
  `display_tax_label` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_country`),

  FOREIGN KEY (`id_zone`) REFERENCES `gc_zone`(`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE
  -- FOREIGN KEY (`id_currency`) REFERENCES `gc_currency`(`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `gc_state` (
  `id_state` int(10) unsigned NOT NULL AUTO_INCREMENT,
  
  `id_country` int(11) unsigned NOT NULL,
  `id_zone` int(11) unsigned NOT NULL,
  
  `name` varchar(64) NOT NULL,
  `iso_code` char(4) NOT NULL,
  `tax_behavior` smallint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_state`),
 
  FOREIGN KEY (`id_zone`) REFERENCES `gc_zone`(`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_country`) REFERENCES `gc_country`(`id_country`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_destination` (
  `id_destination` int(10) unsigned NOT NULL AUTO_INCREMENT,
  
  `id_country` int(11) unsigned NOT NULL,
  `id_state` int(11) unsigned DEFAULT NULL,
  
  `name` varchar(120) NOT NULL,
  
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_destination`),

  FOREIGN KEY (`id_country`) REFERENCES `gc_country`(`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_state`) REFERENCES `gc_state`(`id_state`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*
CREATE TABLE IF NOT EXISTS `gc_destination_lang` (
  `id_destination` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(10) unsigned NOT NULL,
  
  `name` varchar(64) NOT NULL,

  PRIMARY KEY (`id_state`),

  FOREIGN KEY (`id_destination`) REFERENCES `gc_destination`(`id_destination`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_lang`) REFERENCES `gc_lang`(`id_lang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
*/

CREATE TABLE IF NOT EXISTS `gc_group` (
  `id_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_group` (`id_group`, `name`, `level`) VALUES
(1, 'Administrator', 10),
(2, 'Supplier', 5),
(3, 'Agent', 3),
(4, 'Customer', 1);

CREATE TABLE IF NOT EXISTS `gc_user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL DEFAULT '0',

  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `passwd` varchar(32) NOT NULL,  
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `note` text,
  `birthday` date DEFAULT NULL,

  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `user_login` (`email`,`passwd`),
  KEY `id_user_passwd` (`id_user`,`passwd`),
  
  FOREIGN KEY (`id_group`) REFERENCES `gc_group`(`id_group`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_user` (`id_user`, `id_group`, `id_lang`, `lastname`, `firstname`, `email`, `passwd`, `is_guest`, `note`, `birthday`, `active`, `deleted`) VALUES
(1, 1, 1, 'Admin', 'Admin', 'kyhleem@gmail.com', 'bdf13fac4167a477b4d10d8685405354', 0, '', '0000-00-00', 1, 0),
(2, 2, 1, 'supplier', 'hotel', 'kyhleem@naver.com', 'admin123456', 0, '', '0000-00-00', 0, 0),
(3, 4, 2, 'ê·œí˜•', 'ì�´', 'test@naver.com', 'hyoung01', 0, '', '0000-00-00', 0, 0);


CREATE TABLE IF NOT EXISTS `gc_supplier` (
  `id_supplier` int(10) unsigned NOT NULL,
  
  `manager_name` varchar(64),
  `manager_email` varchar(128),

  `sales_name` varchar(64),
  `sales_email` varchar(128),

  `reservations_name` varchar(64),
  `reservations_email` varchar(128),
  `reservations_phone` varchar(64),
  `reservations_fx` varchar(64),

  `accounts_name` varchar(64),
  `accounts_email` varchar(128),
  `accounts_phone` varchar(64),
  `accounts_fx` varchar(64),

  `supplier_abn` varchar(64),
  `member_chain_group`  varchar(64),
  `room_count` int(10),
  `website` varchar(128),
  `check_in_time` char(5) DEFAULT '14:00',
  `check_out_time` char(5) DEFAULT '11:00',

  PRIMARY KEY (`id_supplier`),
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- Added By Chris.
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
  `link_rewrite` varchar(128) DEFAULT NULL,
  `meta_title` varchar(128) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`,`id_lang`),
  
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
 
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `gc_address` (
  `id_address` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `id_country` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned DEFAULT NULL,
  `id_destination` int(10) unsigned DEFAULT NULL,
  
  `id_user` int(10) unsigned NOT NULL DEFAULT '0',

  `address_code` char(6) NOT NULL DEFAULT '001001',

  `alias` varchar(32) NOT NULL,
  `company` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) DEFAULT NULL,
  `postcode` varchar(12) DEFAULT NULL,
  `city` varchar(64) NOT NULL,
  `other` text,
  `phone` varchar(16) DEFAULT NULL,
  `phone_mobile` varchar(16) DEFAULT NULL,
  `vat_number` varchar(32) DEFAULT NULL,
  `dni` varchar(16) DEFAULT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_address`),

  FOREIGN KEY (`id_country`) REFERENCES `gc_country`(`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_state`) REFERENCES `gc_state`(`id_state`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_destination`) REFERENCES `gc_destination`(`id_destination`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_lang` (
  `id_lang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `iso_code` char(2) NOT NULL,
  `language_code` char(5) NOT NULL,
  `date_format_lite` char(32) NOT NULL DEFAULT 'Y-m-d',
  `date_format_full` char(32) NOT NULL DEFAULT 'Y-m-d H:i:s',
  `is_rtl` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_lang`),
  KEY `lang_iso_code` (`iso_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_lang` (`id_lang`, `name`, `active`, `iso_code`, `language_code`, `date_format_lite`, `date_format_full`, `is_rtl`) VALUES
(1, 'English (English)', 1, 'en', 'en-us', 'm/j/Y', 'm/j/Y H:i:s', 0),
(2, 'Korean', 1, 'kr', 'ko', 'Y-m-d', 'Y-m-d H:i:s', 0),
(3, 'Chinese-Simplified', 1, 'zh', 'zh', 'Y-m-d', 'Y-m-d H:i:s', 0);


CREATE TABLE IF NOT EXISTS `gc_timezone` (
  `id_timezone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_timezone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_state` (
  `id_state` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `id_country` int(11) unsigned NOT NULL,
  `id_zone` int(11) unsigned NOT NULL,
  
  `name` varchar(64) NOT NULL,
  `iso_code` char(4) NOT NULL,
  `tax_behavior` smallint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_state`),
  FOREIGN KEY (`id_country`) REFERENCES `gc_country`(`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_zone`) REFERENCES `gc_zone`(`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_category` (
  `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(10) unsigned NOT NULL,
  `id_service` int(10) unsigned DEFAULT '1',
  
  `level_depth` tinyint(3) unsigned NOT NULL DEFAULT '1',
  
  `nleft` int(10) unsigned NOT NULL DEFAULT '0',
  `nright` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',

  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,

  `position` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`),
  FOREIGN KEY (`id_service`) REFERENCES `gc_service`(`id_service`) ON DELETE CASCADE ON UPDATE CASCADE,
  KEY `nleftright` (`nleft`,`nright`)

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;

INSERT INTO `gc_category` (id_category, id_parent, id_service, level_depth, nleft, nright, active, date_add, date_upd )
VALUES (1, 0, 1, 1, 1, 2, 1, now(), now());

INSERT INTO `gc_category` (id_category, id_parent, id_service, level_depth, nleft, nright, active, date_add, date_upd )
VALUES (2, 0, 2, 2, 1, 2, 1, now(), now());



CREATE TABLE IF NOT EXISTS `gc_category_lang` (
  `id_category` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `link_rewrite` varchar(128) DEFAULT NULL,
  `meta_title` varchar(128) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_category`,`id_lang`),
  KEY `category_name` (`name`),
  
  FOREIGN KEY (`id_category`) REFERENCES `gc_category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE IF NOT EXISTS `gc_category_service` (
  `id_service` int(10) unsigned NOT NULL,
  `id_category` int(10) unsigned NOT NULL,  
  
  PRIMARY KEY (`id_service`, `id_category`),
  FOREIGN KEY (`id_service`) REFERENCES `gc_service`(`id_service`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_category`) REFERENCES `gc_category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/


CREATE TABLE IF NOT EXISTS `gc_product` (
  `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_service` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_category_default` int(10) unsigned DEFAULT NULL,
  `on_sale` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `price` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `agent_price` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `wholesale_price` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `width` float NOT NULL DEFAULT '0',
  `height` float NOT NULL DEFAULT '0',
  `depth` float NOT NULL DEFAULT '0',
  `weight` float NOT NULL DEFAULT '0',
  `out_of_stock` int(10) unsigned NOT NULL DEFAULT '2',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `condition` enum('new','used','refurbished') NOT NULL DEFAULT 'new',
  `show_price` tinyint(1) NOT NULL DEFAULT '1',
  `indexed` tinyint(1) NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_product`),  
  KEY `date_add` (`date_add`),

  FOREIGN KEY (`id_service`) REFERENCES `gc_service`(`id_service`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_category_default`) REFERENCES `gc_category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_product_lang` (
  `id_product` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `description` text,
  `description_short` text,
  `link_rewrite` varchar(128) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_title` varchar(128) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id_product`,`id_lang`),
  KEY `name` (`name`),

  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_special` (
	`id_special` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	PRIMARY KEY (`id_special`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gc_special` (`id_special`, `name`) VALUES
(1, 'Special A'),
(2, 'Special B');

CREATE TABLE IF NOT EXISTS `gc_product_date` (
	`id_product_date` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`id_product` int(10) unsigned NOT NULL,
	`on_date` datetime NOT NULL,
	`price` decimal(20,6) NOT NULL DEFAULT '0.000000',
	`agent_price` decimal(20,6) NOT NULL DEFAULT '0.000000',
	`quantity` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id_product_date`),
	FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_special_product_date` (
	`id_special` int(10) unsigned NOT NULL,
	`id_product_date` int(10) unsigned NOT NULL,
	
	PRIMARY KEY (`id_special`, `id_product_date`),
	
	FOREIGN KEY (`id_special`) REFERENCES `gc_special`(`id_special`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`id_product_date`) REFERENCES `gc_product_date`(`id_product_date`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_attribute_group` (
  `id_attribute_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,

  PRIMARY KEY (`id_attribute_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO gc_attribute_group(`id_attribute_group`, `name`) values 
('1', 'Room Facilities'),
('2', 'Supplier Facilities');

CREATE TABLE IF NOT EXISTS `gc_attribute` (
  `id_attribute` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_attribute_group` int(10) unsigned NOT NULL,
  
  `name` varchar(128) NOT NULL,
  `attr_type` enum('textfield', 'textarea', 'checkbox', 'radiobox')  NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `position` tinyint(1) unsigned NOT NULL DEFAULT '0',
  
  PRIMARY KEY (`id_attribute`),
  FOREIGN KEY (`id_attribute_group`) REFERENCES `gc_attribute_group`(`id_attribute_group`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_attribute`(`id_attribute`, `id_attribute_group`,  `name`, `attr_type`) values
('1','1', 'Room Features', 'checkbox'),
('2','1', 'Laundry Facilities', 'checkbox'),
('3','1', 'General Amenities', 'checkbox'),
('4','1', 'Internet', 'checkbox'),
('5','1', 'Bathroom Features', 'checkbox'),
('6','1', 'Climate control', 'checkbox'),
('7','1', 'Kitchen Features', 'checkbox'),
('8','1', 'Entertainment', 'checkbox');
INSERT INTO `gc_attribute`(`id_attribute`, `id_attribute_group`,  `name`, `attr_type`) values
('9','2', 'Property Features', 'checkbox'),
('10','2', 'Inhouse dining', 'checkbox'),
('11','2', 'Swimming pools', 'checkbox'),
('12','2', 'Car parking', 'checkbox'),
('13','2', 'Guest services', 'checkbox'),
('14','2', 'Recreation facilities', 'checkbox'),
('15','2', 'Miscellaneous', 'checkbox');



CREATE TABLE IF NOT EXISTS `gc_attribute_item` (
  `id_attribute_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_attribute` int(10) unsigned NOT NULL,
  `item` varchar(300) NOT NULL,  
  `position` tinyint(1) unsigned NOT NULL DEFAULT '0',
  
  PRIMARY KEY (`id_attribute_item`),
  FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute`(`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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


CREATE TABLE IF NOT EXISTS `gc_supplier_attribute_value` (
  `id_supplier` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
  `value` varchar(300) NOT NULL,
  
  PRIMARY KEY (`id_supplier`, `id_attribute`),
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute`(`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_product_attribute` (
  `id_product` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
     
  PRIMARY KEY (`id_product`, `id_attribute`),
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute`(`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_product_attribute_value` (
  `id_product` int(10) unsigned NOT NULL,
  `id_attribute` int(10) unsigned NOT NULL,
  `value` varchar(300) NOT NULL,
  
  PRIMARY KEY (`id_product`, `id_attribute`),
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_attribute`) REFERENCES `gc_attribute`(`id_attribute`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_hotel` (
    `id_hotel` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_supplier` int(10) unsigned NOT NULL,
    
    PRIMARY KEY (`id_hotel`),    
    FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE IF NOT EXISTS `gc_room_type` (
    `id_room_type` int(10) unsigned NOT NULL,
    `name` varchar(100) NOT NULL,
    
    PRIMARY KEY (`id_room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

CREATE TABLE IF NOT EXISTS `gc_room` (
  `id_product` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_bedding_default` int(10) unsigned DEFAULT NULL,
  `room_code` char(6) NOT NULL,

  `room_type_code` varchar(64) NOT NULL,
  `lead_in_room_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `full_rate` int(10) unsigned NOT NULL DEFAULT '0',
  `min_night_stay`  int(2) unsigned,
  `max_night_stay` int(2) unsigned,
  `room_name`  varchar(64),
  `root_description` varchar(300),

  `guests_tot_room_cap` int(2) unsigned,
  `guests_included_price` int(2) unsigned,
  
  `children_maxnum` int(2) unsigned,
  `children_years` int(2) unsigned,
  `children_extra` decimal(20,6) NOT NULL DEFAULT '0.000000',
  
  `adults_maxnum` int(2) unsigned,
  `adults_extra` decimal(20,6) NOT NULL DEFAULT '0.000000',
   
  PRIMARY KEY (`id_product`),

  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_bedding_default`) REFERENCES `gc_bedding`(`id_bedding`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`room_code`) REFERENCES `gc_code`(`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gc_bedding` (
	`id_bedding`  int(10) unsigned NOT NULL AUTO_INCREMENT,
	`id_room` int(10) unsigned NOT NULL,

	`bed_index` int(2) unsigned NOT NULL,
	
	`bed_num`  int(2) unsigned NOT NULL,
	
	`single_num` int(2) unsigned NOT NULL,
	`double_num` int(2) unsigned NOT NULL,
	`beddig_desc`  varchar(200),
	`additional_cost`  decimal(20,6) NOT NULL DEFAULT '0.000000',
	`cots_available`  int(2) unsigned NOT NULL,
	
	FOREIGN KEY (`id_room`) REFERENCES `gc_room`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (`id_bedding`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `gc_room_bedding` (
	`id_room` int(10) unsigned NOT NULL,
	`id_bedding`  int(10) unsigned NOT NULL,

	PRIMARY KEY (`id_room`, `id_bedding`),
	FOREIGN KEY (`id_room`) REFERENCES `gc_room`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`id_bedding`) REFERENCES `gc_bedding`(`id_bedding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

CREATE TABLE IF NOT EXISTS `gc_attachment` (
  `id_attachment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(40) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `mime` varchar(128) NOT NULL,
  PRIMARY KEY (`id_attachment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_product_attachment` (
  `id_product` int(10) unsigned NOT NULL,
  `id_attachment` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_product`,`id_attachment`),

  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_attachment`) REFERENCES `gc_attachment`(`id_attachment`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_product_sale` (
  `id_product` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `sale_nbr` int(10) unsigned NOT NULL DEFAULT '0',
  `date_upd` date NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 
CREATE TABLE IF NOT EXISTS `gc_image` (
  `id_image` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `image_title` varchar(100),
  `position` smallint(2) unsigned NOT NULL DEFAULT '0',
  `cover` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_supplier_image` (
  `id_image` int(10) unsigned NOT NULL,  
  `id_supplier` int(10) unsigned NOT NULL,

  PRIMARY KEY (`id_image`),

  FOREIGN KEY (`id_image`) REFERENCES `gc_image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*
CREATE TABLE IF NOT EXISTS `gc_hotel_image` (
  `id_image` int(10) unsigned NOT NULL,  
  `id_hotel` int(10) unsigned NOT NULL,  

  PRIMARY KEY (`id_image`),

  FOREIGN KEY (`id_image`) REFERENCES `gc_image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_hotel`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
*/

CREATE TABLE IF NOT EXISTS `gc_product_image` (
  `id_image` int(10) unsigned NOT NULL,  
  `id_product` int(10) unsigned NOT NULL,

  PRIMARY KEY (`id_image`),

  FOREIGN KEY (`id_image`) REFERENCES `gc_image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_image_type` (
  `id_image_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `quality` int(100) unsigned default 80,
  `sharpen` int(100) unsigned default 0,
  `rotate` int(100) default 0,
  `product` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `supplier` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_image_type`),
  KEY `image_type_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_image_type` (`id_image_type`, `name`, `width`, `height`) VALUES
(1, 'small', 45, 45),
(2, 'medium', 80, 80),
(3, 'large', 300, 183),
(6, 'home', 210, 128);


CREATE TABLE IF NOT EXISTS `gc_category_product` (
  `id_category` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`,`id_product`),
  
  FOREIGN KEY (`id_category`) REFERENCES `gc_category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_cart` (
  `id_cart` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_address_delivery` int(10) unsigned NOT NULL,
  `id_address_invoice` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  
  `on_order` tinyint(1) unsigned NOT NULL DEFAULT '0',

  `secure_key` varchar(32) NOT NULL DEFAULT '-1',
  `recyclable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `gift` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_message` text,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_cart`),

  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_address_delivery`) REFERENCES `gc_address`(`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_address_invoice`) REFERENCES `gc_address`(`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_currency`) REFERENCES `gc_currency`(`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_cart_product` (
  `id_cart_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cart` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_product_date` int(10) unsigned,

  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_cart_product`),
  
  FOREIGN KEY (`id_cart`) REFERENCES `gc_cart`(`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product_date`) REFERENCES `gc_product_date`(`id_product_date`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_cms_category` (
  `id_cms_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(10) unsigned NOT NULL,
  `level_depth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cms_category`),
  
  FOREIGN KEY (`id_parent`) REFERENCES `gc_cms_category`(`id_cms_category`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_cms_category_lang` (
  `id_cms_category` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `link_rewrite` varchar(128) NOT NULL,
  `meta_title` varchar(128) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  UNIQUE KEY `category_lang_index` (`id_cms_category`,`id_lang`),
  KEY `category_name` (`name`),

  FOREIGN KEY (`id_cms_category`) REFERENCES `gc_cms_category`(`id_cms_category`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_cms` (
  `id_cms` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_category` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cms`),
  
  FOREIGN KEY (`id_cms_category`) REFERENCES `gc_cms_category`(`id_cms_category`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_cms_lang` (
  `id_cms` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` longtext,
  `meta_title` varchar(128) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `link_rewrite` varchar(128) NOT NULL,
  PRIMARY KEY (`id_cms`,`id_lang`),

  FOREIGN KEY (`id_cms`) REFERENCES `gc_cms`(`id_cms`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_configuration` (
  `id_configuration` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `value` text,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_configuration`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_configuration_lang` (
  `id_configuration` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `message` text,
  `date_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_configuration`,`id_lang`),

  FOREIGN KEY (`id_configuration`) REFERENCES `gc_configuration`(`id_configuration`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_order` (
  `id_order` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(10) unsigned NOT NULL,
  
  `id_user` int(10) unsigned NOT NULL,
  `id_cart` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL,
  `id_address_delivery` int(10) unsigned NOT NULL,
  `id_address_invoice` int(10) unsigned NOT NULL,

  `secure_key` varchar(32) NOT NULL DEFAULT '-1',
  `payment` varchar(255) NOT NULL,
  `conversion_rate` decimal(13,6) NOT NULL DEFAULT '1.000000',
  
  `gift` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_message` text,
  
  `total_price` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_agent_price` decimal(17,2) NOT NULL DEFAULT '0.00', 
 
  `total_discount` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid` decimal(17,2) NOT NULL DEFAULT '0.00',
 
  `invoice_number` int(10) unsigned NOT NULL DEFAULT '0',
  `delivery_number` int(10) unsigned NOT NULL DEFAULT '0',
  `invoice_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,

  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  
  `on_agent`  tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order`),
  KEY `invoice_number` (`invoice_number`),
  KEY `id_address_delivery` (`id_address_delivery`),
  KEY `id_address_invoice` (`id_address_invoice`),
  KEY `date_add` (`date_add`),
  
  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_cart`) REFERENCES `gc_cart`(`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_currency`) REFERENCES `gc_currency`(`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*
CREATE TABLE IF NOT EXISTS `gc_order_detail` (
  `id_order_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  
  `id_order` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_product_date` int(10) unsigned DEFAULT NULL,
  
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `product_quantity_in_stock` int(10) NOT NULL DEFAULT '0',
  `product_quantity_refunded` int(10) unsigned NOT NULL DEFAULT '0',
  `product_quantity_return` int(10) unsigned NOT NULL DEFAULT '0',
  `product_quantity_reinjected` int(10) unsigned NOT NULL DEFAULT '0',
  `product_price` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `reduction_percent` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reduction_amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `group_reduction` decimal(10,2) NOT NULL DEFAULT '0.00',
  `product_quantity_discount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `product_ean13` varchar(13) DEFAULT NULL,
  `product_upc` varchar(12) DEFAULT NULL,
  `product_reference` varchar(32) DEFAULT NULL,
  `product_supplier_reference` varchar(32) DEFAULT NULL,
  `product_weight` float NOT NULL,
  `tax_name` varchar(16) NOT NULL,
  `tax_rate` decimal(10,3) NOT NULL DEFAULT '0.000',
  `ecotax` decimal(21,6) NOT NULL DEFAULT '0.000000',
  `ecotax_tax_rate` decimal(5,3) NOT NULL DEFAULT '0.000',
  `discount_quantity_applied` tinyint(1) NOT NULL DEFAULT '0',
  `download_hash` varchar(255) DEFAULT NULL,
  `download_nb` int(10) unsigned DEFAULT '0',
  `download_deadline` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_order_detail`),

  FOREIGN KEY (`id_order`) REFERENCES `gc_order`(`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product_date`) REFERENCES `gc_product_date`(`id_product_date`) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
*/

CREATE TABLE IF NOT EXISTS `gc_order_state` (
  `id_order_state` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` tinyint(1) unsigned DEFAULT '0',
  `send_email` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `color` varchar(32) DEFAULT NULL,
  `unremovable` tinyint(1) unsigned NOT NULL,
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `logable` tinyint(1) NOT NULL DEFAULT '0',
  `delivery` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `template` varchar(64) NOT NULL,
  PRIMARY KEY (`id_order_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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

/*
CREATE TABLE IF NOT EXISTS `gc_order_state_lang` (
  `id_order_state` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `template` varchar(64) NOT NULL,
  PRIMARY KEY (`id_order_state`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

CREATE TABLE IF NOT EXISTS `gc_order_history` (
  `id_order_history` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `id_user` int(10) unsigned NOT NULL,
  `id_order` int(10) unsigned NOT NULL,
  `id_order_state` int(10) unsigned NOT NULL,
  `comment` varchar(300),

  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_order_history`),

  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_order`) REFERENCES `gc_order`(`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_order_state`) REFERENCES `gc_order_state`(`id_order_state`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `gc_discount_lang` (
  `id_discount` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `description` text,
  PRIMARY KEY (`id_discount`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_discount_type` (
  `id_discount_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id_discount_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_discount_type` (`id_discount_type`, `name`) VALUES
(1, 'Discount on order (%)'),
(2, 'Discount on order (amount)'),
(3, 'Free shipping');


CREATE TABLE IF NOT EXISTS `gc_discount` (
  `id_discount` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `id_discount_type` int(10) unsigned NOT NULL,  
  `id_user` int(10) unsigned NOT NULL,
  `id_group` int(10) unsigned NOT NULL DEFAULT '0',
  `id_currency` int(10) unsigned NOT NULL DEFAULT '0',
  
  `behavior_not_exhausted` tinyint(3) DEFAULT '1',
  `name` varchar(32) NOT NULL,
  `value` decimal(17,2) NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity_per_user` int(10) unsigned NOT NULL DEFAULT '1',
  `cumulable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cumulable_reduction` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `minimal` decimal(17,2) DEFAULT NULL,
  `include_tax` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cart_display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_discount`),
  KEY `discount_name` (`name`),
  KEY `discount_user` (`id_user`),
  KEY `id_discount_type` (`id_discount_type`),

  FOREIGN KEY (`id_discount_type`) REFERENCES `gc_discount_type`(`id_discount_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_currency`) REFERENCES `gc_currency`(`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `gc_order_discount` (
  `id_order_discount` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL,
  `id_discount` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` decimal(17,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_order_discount`),
  
  FOREIGN KEY (`id_order`) REFERENCES `gc_order`(`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_discount`) REFERENCES `gc_discount`(`id_discount`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `gc_discount_category` (
  `id_category` int(11) unsigned NOT NULL,
  `id_discount` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_category`,`id_discount`),

  FOREIGN KEY (`id_discount`) REFERENCES `gc_discount`(`id_discount`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
