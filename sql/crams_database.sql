CREATE DATABASE `crams_database`;

USE `crams_database`;

CREATE TABLE `EMPLOYEE` (
	`id` INT AUTO_INCREMENT,
	`idnumber` VARCHAR(20) NOT NULL,
	`pm_id` INT DEFAULT 0,
	`username` VARCHAR(35) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`firstname`  VARCHAR(30) NOT NULL,
	`middlename` VARCHAR(30) NOT NULL,
	`lastname` VARCHAR(30) NOT NULL,
	`picture` VARCHAR(50) DEFAULT 'default.png',
	`type` ENUM('super_admin', 'admin', 'regular_employee', 'project_manager', 'board_of_director') DEFAULT 'regular_employee',
	`contact` CHAR(10) NOT NULL,
	`email` VARCHAR(50) NOT NULL,
	`address` VARCHAR(50) NOT NULL,
	`code` VARCHAR(100) NOT NULL,
	`status` BOOLEAN NOT NULL,
	`date_hired` DATE NOT NULL,
	`date_resignation` DATE DEFAULT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY(`id`),
	UNIQUE `unique_idnumber`(`idnumber`)
);

CREATE TABLE `EMPLOYEE_SETTING` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`max_leave` INT DEFAULT 1,
	`min_leave` INT DEFAULT 1,
	PRIMARY KEY(`id`),
	CONSTRAINT `setting_employee_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `POSITION` (
	`id` INT AUTO_INCREMENT,
	`title` VARCHAR(35) NOT NULL,
	`code` VARCHAR(35) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `EMPLOYEE_POSITION` (
	`employee_id` INT NOT NULL,
	`position_id` INT NOT NULL,
	CONSTRAINT `emp_pos_bridge_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `pos_emp_bridge_fk` FOREIGN KEY(`position_id`) REFERENCES `position`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `SALARY` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`rate` FLOAT NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `employee_salary_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `SKILL` (
	`id` INT AUTO_INCREMENT,
	`title` VARCHAR(40) NOT NULL,
	`description` TEXT NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `EMPLOYEE_SKILL` (
	`employee_id` INT NOT NULL,
	`skill_id` INT NOT NULL,
	CONSTRAINT `employee_skill_bridge_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `skill_employee_bridge_fk` FOREIGN KEY(`skill_id`) REFERENCES `skill`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `TIMELOG` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`time_in` VARCHAR(10) NOT NULL,
	`time_out` VARCHAR(10) DEFAULT NULL,
	`timein_date` DATE NOT NULL,
	`timeout_date` DATE DEFAULT NULL,
	`total_time` INT DEFAULT NULL,
	`pay` FLOAT DEFAULT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `timelog_employee_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `REQUEST` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`approved_by` INT NOT NULL,
	`type` ENUM('leave','overtime') NOT NULL,
	`code` VARCHAR(50) NOT NULL, -- [ overtime, sick_leave, vacation_leave, paternity_leave, maternity_leave ]
	`reason` TEXT NOT NULL,
	`date_requested` DATE NOT NULL,
	`date_approved` DATE DEFAULT NULL,
	`status` BOOLEAN NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `requester_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `manager_fk` FOREIGN KEY(`approved_by`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `PROJECT` (
	`id` INT AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	`description` TEXT NOT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `PORTFOLIO` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`project_id` INT NOT NULL,
	`date_completed` DATE NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `portfolio_employee_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `portfolio_project_fk` FOREIGN KEY(`project_id`) REFERENCES `project`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `NOTIFICATION` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`status` BOOLEAN DEFAULT 0,
	`message` TEXT NOT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `notification_employee_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `LEAVE_TYPE` (
	`id` INT AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`code` VARCHAR(50) NOT NULL,
	`span` INT NOT NULL, -- in days
	PRIMARY KEY(`id`)
);


CREATE TABLE `LEAVE` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`leave_type_id` INT NOT NULL,
	`start_date` DATE NOT NULL,
	`end_date` DATE NOT NULL,
	`pay` FLOAT NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `leave_employee_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `leave_type_fk` FOREIGN KEY(`leave_type_id`) REFERENCES `leave_type`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `OVERTIME` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`start_date` DATE NOT NULL,
	`end_date` DATE NOT NULL,
	`hours` INT NOT NULL,
	`pay` FLOAT NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `overtime_employee_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `DEDUCTION` (
	`id` INT AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `EMPLOYEE_DEDUCTION` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`deduction_id` INT NOT NULL,
	`value` FLOAT NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `employee_deduction_bridge_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `deduction_employee_bridge_fk` FOREIGN KEY(`deduction_id`) REFERENCES `deduction`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `TOKEN` (
	`id` INT AUTO_INCREMENT,
	`employee_id` INT NOT NULL,
	`hash` VARCHAR(50) NOT NULL,
	PRIMARY KEY(`id`),
	CONSTRAINT `employee_token_fk` FOREIGN KEY(`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `SETTING` (
	`id` INT AUTO_INCREMENT,
	`name` VARCHAR(25) NOT NULL,
	`value` VARCHAR(20) NOT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `HOLIDAY` (
	`id` INT AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	`type` ENUM('regular', 'special') NOT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY(`id`)
);


/* Static Data */

INSERT INTO `setting` (`id`, `name`, `value`, `date`) VALUES
(1, 'static_ip', '127.0.0.1', NOW()),
(2, 'regular_hours', '8', NOW()),
(3, 'weekly_hours', '40', NOW()),
(4, 'email', 'eminence43rd@gmail.com', NOW());

INSERT INTO `leave_type` (`id`, `name`, `code`, `span`) VALUES
(1, 'Sick Leave', 'sick_leave', 3),
(2, 'Vacation Leave', 'vacation_leave', 30),
(3, 'Paternity Leave', 'paternity_leave', 15),
(4, 'Maternity Leave', 'maternity_leave', 60);