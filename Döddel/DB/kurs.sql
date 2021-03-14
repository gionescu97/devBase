-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema hotel
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `hotel` ;

-- -----------------------------------------------------
-- Schema hotel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hotel` DEFAULT CHARACTER SET utf8 ;
USE `hotel` ;

-- -----------------------------------------------------
-- Table `hotel`.`titles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hotel`.`titles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel`.`genders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hotel`.`genders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `gender` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel`.`roomrequests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hotel`.`roomrequests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `special_request` VARCHAR(45) NULL,
  `arrival` DATETIME NOT NULL,
  `nights_stayed` INT NOT NULL,
  `title_id` INT NOT NULL,
  `gender_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_roomrequests_titles_idx` (`title_id` ASC),
  INDEX `fk_roomrequests_genders1_idx` (`gender_id` ASC),
  CONSTRAINT `fk_roomrequests_titles`
    FOREIGN KEY (`title_id`)
    REFERENCES `hotel`.`titles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roomrequests_genders1`
    FOREIGN KEY (`gender_id`)
    REFERENCES `hotel`.`genders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `hotel`.`titles`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel`;
INSERT INTO `hotel`.`titles` (`id`, `title`) VALUES (1, DEFAULT);
INSERT INTO `hotel`.`titles` (`id`, `title`) VALUES (2, 'Dr.');
INSERT INTO `hotel`.`titles` (`id`, `title`) VALUES (3, 'Mag.');

COMMIT;


-- -----------------------------------------------------
-- Data for table `hotel`.`genders`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel`;
INSERT INTO `hotel`.`genders` (`id`, `gender`) VALUES (1, 'Herr');
INSERT INTO `hotel`.`genders` (`id`, `gender`) VALUES (2, 'Frau');
INSERT INTO `hotel`.`genders` (`id`, `gender`) VALUES (3, 'Sonstiges');

COMMIT;

