use 'adaptdata';

CREATE TABLE `users` ( 
	`userid` INT(256) UNSIGNED NOT NULL AUTO_INCREMENT , 
	`first` VARCHAR(32) NOT NULL , 
	`last` VARCHAR(32) NOT NULL , 
	`username` VARCHAR(32) NOT NULL , 
	`email` VARCHAR(256) NOT NULL , 
	`pass` VARCHAR(256) NOT NULL , 
	PRIMARY KEY (`userid`));