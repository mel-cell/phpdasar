CREATE DATABASE IF NOT EXISTS `school_system`;
USE `school_system`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `classes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `subjects` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `students` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `class_id` INT,
    FOREIGN KEY (`class_id`) REFERENCES `classes`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- SEED DATA --

INSERT INTO `users` (`username`, `password`) VALUES 
('admin', '$2y$12$DdAuZBfggayB4q2kAEZWCuiDbkW7AtxapPo.nQyo9agTZJWTtn0LS')
ON DUPLICATE KEY UPDATE `username`=`username`;

INSERT INTO `classes` (`id`, `name`) VALUES 
(1, '10-IPA-1'),
(2, '10-IPA-2'),
(3, '11-IPS-1'),
(4, '12-IPA-Rekayasa')
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);

INSERT INTO `subjects` (`name`) VALUES 
('Matematika'),
('Bahasa Inggris'),
('Fisika'),
('Sejarah')
ON DUPLICATE KEY UPDATE `name`=`name`;

INSERT INTO `students` (`name`, `class_id`) VALUES 
('Budi Santoso', 1)
ON DUPLICATE KEY UPDATE `name`=`name`;
