
DROP TABLE IF EXISTS `gc_discount_category`;
DROP TABLE IF EXISTS `gc_order_discount`;
DROP TABLE IF EXISTS `gc_discount`;
DROP TABLE IF EXISTS `gc_discount_type`;
DROP TABLE IF EXISTS `gc_discount_lang`;
DROP TABLE IF EXISTS `gc_order_history`;
DROP TABLE IF EXISTS `gc_order_state_lang`;
DROP TABLE IF EXISTS `gc_order_state`;
DROP TABLE IF EXISTS `gc_order_detail`;
DROP TABLE IF EXISTS `gc_orders`;
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
DROP TABLE IF EXISTS `gc_hotel_image`;
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

CREATE TABLE IF NOT EXISTS `gc_code_type` (  
  `type` char(3) NOT NULL,
  `name` VARCHAR(128) NOT NULL,  
  PRIMARY KEY (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_code_type` (`type`, `name`) VALUES
('001', 'Address Type');


CREATE TABLE IF NOT EXISTS `gc_code` (
  `code` char(6) NOT NULL,
  `type` char(3) NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `position` INT(3) NOT NULL,
  PRIMARY KEY (`code`),
  FOREIGN KEY (`type`) REFERENCES `gc_code_type`(`type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_code` (`code`, `type`, `name`) VALUES
('001001', '001', 'Default'),
('001002', '001', 'Delivery'),
('001003', '001', 'Invoice');


CREATE TABLE IF NOT EXISTS `gc_service` (
  `id_service` int(10) unsigned NOT NULL AUTO_INCREMENT,  
  `name` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO `gc_code` (`code`, `type`, `name`) VALUES
('001001', '001', 'Default'),


CREATE TABLE IF NOT EXISTS `gc_zone` (
  `id_zone` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `name` varchar(64) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


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


CREATE TABLE IF NOT EXISTS `gc_group` (
  `id_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_group` (`id_group`, `name`, `level`) VALUES
(1, 'Administrator', '10'),
(2, 'Supplier', '5');

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

INSERT INTO `gc_user` (`id_user`, `id_group`, `id_lang`, `lastname`, `firstname`, `email`, `passwd`, `active`) VALUES
(1, 1, 1, 'Admin', 'Admin', 'kyhleem@gmail.com', 'bdf13fac4167a477b4d10d8685405354', 1);

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

  PRIMARY KEY (`id_supplier`),
  FOREIGN KEY (`id_supplier`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_address` (
  `id_address` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `id_country` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned DEFAULT NULL,
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
(1, 'English (English)', 1, 'en', 'en-us', 'm/j/Y', 'm/j/Y H:i:s', 0);


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
VALUES (2, 0, 1, 2, 1, 2, 1, now(), now());

INSERT INTO `gc_category` (id_category, id_parent, id_service, level_depth, nleft, nright, active, date_add, date_upd )
VALUES (3, 0, 1, 3, 1, 2, 1, now(), now());


CREATE TABLE IF NOT EXISTS `gc_category_lang` (
  `id_category` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `link_rewrite` varchar(128) NOT NULL,
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
  `id_category_default` int(10) unsigned DEFAULT NULL,
  `on_sale` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `price` decimal(20,6) NOT NULL DEFAULT '0.000000',
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

  FOREIGN KEY (`id_category_default`) REFERENCES `gc_category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_product_lang` (
  `id_product` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `description` text,
  `description_short` text,
  `link_rewrite` varchar(128) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_title` varchar(128) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id_product`,`id_lang`),
  KEY `name` (`name`),

  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
  
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

INSERT INTO `gc_attribute_item`(`id_attribute_item`, `id_attribute`, `item`) values 
('1','1', 'Balcony / courtyard'),
('2','1', 'Desk'),
('3','1', 'Opening windows'),
('4','1', 'Non-smoking only'),
('5','1', 'Non-smoking or smoking rooms on request');
INSERT INTO `gc_attribute_item`(`id_attribute_item`, `id_attribute`, `item`) values 
('6','2', 'Washing machine'),
('7','2', 'Dryer'),
('8','2', 'Iron & ironing board'),
('9','2', 'Trouser press'),
('10','2', 'Clothes line / airer');
INSERT INTO `gc_attribute_item`(`id_attribute_item`, `id_attribute`, `item`) values 
('11','3', 'Hairdryer'),
('12','3', 'Alarm clock'),
('13','3', 'Radio'),
('14','3', 'Bathrobes');
INSERT INTO `gc_attribute_item`(`id_attribute_item`, `id_attribute`, `item`) values 
('15','4', 'Dial-up'),
('16','4', 'Broadband'),
('17','4', 'Wireless / WiFi');

INSERT INTO `gc_attribute_item`(`id_attribute`, `item`) values 
('5', 'Separate shower & bath'),
('5', 'Shower over bath'),
('5', 'Shower'),
('5', 'Bath'),
('5', 'In-room spa bath / Jacuzzi'),
('5', 'Shared bathroom'),

('6', 'Air conditioning'),
('6', 'Fireplace'),
('6', 'In-room heater'),
('6', 'Under-floor heating'),
('6', 'Ceiling fans'),
('6', 'Fans'),

('7', 'Full kitchen'),
('7', 'Kitchenette (basic facilities)'),
('7', 'Tea/Coffee Making'),
('7', 'Dishwasher'),
('7', 'Mini bar'),
('7', 'Refrigerator - full size'),
('7', 'Refrigerator - bar size'),

('8', 'TV'),
('8', 'Satellite / Cable'),
('8', 'Pay-per-view movies'),
('8', 'Free in-house movies'),
('8', 'DVD player'),
('8', 'CD player'),
('8', 'Game console');


INSERT INTO `gc_attribute_item`(`id_attribute`, `item`) values 
('9', 'Gay friendly'),
('9', 'Pets allowed'),
('9', 'Not suitable for children'),
('9', 'Non-smoking property'),
('9', 'Non-smoking floors'),

('10', 'Restaurant/s'),
('10', 'Café'),
('10', 'Bar / Lounge'),
('10', 'Room service - 24hr'),
('10', 'Room service - limited service'),

('11', 'Indoor pool - heated'),
('11', 'Indoor pool - unheated'),
('11', 'Outdoor pool - heated'),
('11', 'Outdoor pool - unheated'),
('11', 'Kids pool'),
('11', 'Swim-up bar'),
('11', 'Pool bar'),

('12', 'On-site parking'),
('12', 'On-site undercover parking'),
('12', 'On-site secure undercover parking'),
('12', 'Off-site undercover parking'),
('12', 'Off-site secure undercover parking'),
('12', 'Street parking'),
('12', 'Valet parking'),

('13', 'Dry cleaning / laundry service'),
('13', 'Self service laundry facilities'),
('13', 'Tour desk'),
('13', '24 hour front desk'),
('13', 'Concierge'),
('13', 'Arrival / Departure lounge'),
('13', 'Luggage storage'),
('13', 'Porter/Bell service'),

('14', 'Sauna'),
('14', 'Spa/Hot tub/Jacuzzi'),
('14', 'Gym/Fitness room'),
('14', 'Tennis court'),
('14', 'Playground'),
('14', 'Games room'),
('14', 'Motorised water sports'),
('14', 'Non-motorised water sports'),
('14', 'Golf course'),
('14', 'BBQ facilities'),
('14', 'Direct beach access'),
('14', 'Day spa'),

('15', 'Lift/Elevator'),
('15', 'Interconnecting rooms'),
('15', 'Business centre'),
('15', 'Conference/Meeting facilities'),
('15', 'Vending machines'),
('15', 'Kids club'),
('15', 'Ice machine'),
('15', 'Wheelchair accessible'),
('15', 'Airport shuttle'),
('15', 'Wifi access');


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
  `id_hotel` int(10) unsigned NOT NULL,
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
  FOREIGN KEY (`room_code`) REFERENCES `gc_code`(`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gc_bedding` (
	`id_bedding`  int(10) unsigned NOT NULL AUTO_INCREMENT,
	
	`gest_num`  int(2) unsigned NOT NULL,
	`single_num` int(2) unsigned NOT NULL,
	`double_num` int(2) unsigned NOT NULL,
	`beddig_desc`  varchar(200),
	`additional_cost`  decimal(20,6) NOT NULL DEFAULT '0.000000',
	`cots_available`  int(2) unsigned NOT NULL,
	
	PRIMARY KEY (`id_bedding`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gc_room_bedding` (
	`id_room` int(10) unsigned NOT NULL,
	`id_bedding`  int(10) unsigned NOT NULL,

	PRIMARY KEY (`id_room`, `id_bedding`),
	FOREIGN KEY (`id_room`) REFERENCES `gc_room`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`id_bedding`) REFERENCES `gc_bedding`(`id_bedding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  `image_path` varchar(100) NOT NULL,
  `image_title` varchar(100),
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_hotel_image` (
  `id_image` int(10) unsigned NOT NULL,  
  `id_hotel` int(10) unsigned NOT NULL,  
  `position` smallint(2) unsigned NOT NULL DEFAULT '0',
  `cover` tinyint(1) unsigned NOT NULL DEFAULT '0',

  PRIMARY KEY (`id_image`),

  FOREIGN KEY (`id_image`) REFERENCES `gc_image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_hotel`) REFERENCES `gc_supplier`(`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_product_image` (
  `id_image` int(10) unsigned NOT NULL,  
  `id_product` int(10) unsigned NOT NULL,
  `position` smallint(2) unsigned NOT NULL DEFAULT '0',
  `cover` tinyint(1) unsigned NOT NULL DEFAULT '0',

  PRIMARY KEY (`id_image`),

  FOREIGN KEY (`id_image`) REFERENCES `gc_image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_image_type` (
  `id_image_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_image_type`),
  KEY `image_type_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gc_image_type` (`id_image_type`, `name`, `width`, `height`) VALUES
(1, 'small', 45, 45),
(2, 'medium', 80, 80),
(3, 'large', 300, 183),
(5, 'category', 210, 128),
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
  `id_cart` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_product_attribute` int(10) unsigned NOT NULL DEFAULT '0',

  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_cart`,`id_product`,`id_product_attribute`),
  
  FOREIGN KEY (`id_cart`) REFERENCES `gc_cart`(`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product_attribute`) REFERENCES `gc_product_attribute`(`id_product_attribute`) ON DELETE CASCADE ON UPDATE CASCADE

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
  `value` text,
  `date_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_configuration`,`id_lang`),

  FOREIGN KEY (`id_configuration`) REFERENCES `gc_configuration`(`id_configuration`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `gc_orders` (
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
  `module` varchar(255) DEFAULT NULL,
  `recyclable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_message` text,
  `shipping_number` varchar(32) DEFAULT NULL,
  `total_discounts` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_paid_real` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_products` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_products_wt` decimal(17,2) NOT NULL DEFAULT '0.00',
  `total_shipping` decimal(17,2) NOT NULL DEFAULT '0.00',
  `carrier_tax_rate` decimal(10,3) NOT NULL DEFAULT '0.000',
  `total_wrapping` decimal(17,2) NOT NULL DEFAULT '0.00',
  `invoice_number` int(10) unsigned NOT NULL DEFAULT '0',
  `delivery_number` int(10) unsigned NOT NULL DEFAULT '0',
  `invoice_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `valid` int(1) unsigned NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `invoice_number` (`invoice_number`),
  KEY `id_address_delivery` (`id_address_delivery`),
  KEY `id_address_invoice` (`id_address_invoice`),
  KEY `date_add` (`date_add`),
  
  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_cart`) REFERENCES `gc_cart`(`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_currency`) REFERENCES `gc_currency`(`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_order_detail` (
  `id_order_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  
  `id_order` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_product_attribute` int(10) unsigned DEFAULT NULL,
  
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

  FOREIGN KEY (`id_order`) REFERENCES `gc_orders`(`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product`) REFERENCES `gc_product`(`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_product_attribute`) REFERENCES `gc_product_attribute`(`id_product_attribute`) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_order_state` (
  `id_order_state` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` tinyint(1) unsigned DEFAULT '0',
  `send_email` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `color` varchar(32) DEFAULT NULL,
  `unremovable` tinyint(1) unsigned NOT NULL,
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `logable` tinyint(1) NOT NULL DEFAULT '0',
  `delivery` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `gc_order_state_lang` (
  `id_order_state` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `template` varchar(64) NOT NULL,
  PRIMARY KEY (`id_order_state`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `gc_order_history` (
  `id_order_history` int(10) unsigned NOT NULL AUTO_INCREMENT,

  `id_user` int(10) unsigned NOT NULL,
  `id_order` int(10) unsigned NOT NULL,
  `id_order_state` int(10) unsigned NOT NULL,

  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_order_history`),

  FOREIGN KEY (`id_user`) REFERENCES `gc_user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_order`) REFERENCES `gc_orders`(`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  
  FOREIGN KEY (`id_order`) REFERENCES `gc_orders`(`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_discount`) REFERENCES `gc_discount`(`id_discount`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `gc_discount_category` (
  `id_category` int(11) unsigned NOT NULL,
  `id_discount` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_category`,`id_discount`),

  FOREIGN KEY (`id_discount`) REFERENCES `gc_discount`(`id_discount`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
