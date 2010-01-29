#App sql generated on: 2010-01-29 17:54:58 : 1264776898

DROP TABLE IF EXISTS `images`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE `images` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`item_id` int(11) NOT NULL,
	`name` varchar(255) NOT NULL,
	`alt` text NOT NULL,
	`type` varchar(255) NOT NULL,
	`hash` varchar(255) NOT NULL,
	`user_id` int(11) NOT NULL,
	`created` datetime DEFAULT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `items` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`desc` text NOT NULL,
	`link` text NOT NULL,
	`comment` text NOT NULL,
	`user_id` int(11) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`email` varchar(50) DEFAULT NULL,
	`passwd` varchar(40) DEFAULT NULL,
	`role` varchar(50) DEFAULT 'user' NOT NULL,
	`uuid` varchar(36) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

