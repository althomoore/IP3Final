SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`User` ;

CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `forename` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password_hash` VARCHAR(45) NOT NULL,
  `isActive` TINYINT NOT NULL DEFAULT 1,
  `isAdmin` TINYINT NOT NULL DEFAULT 0,
  `registerDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`Document`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Document` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Document` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Author_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `comment` VARCHAR(100) NULL DEFAULT NULL,
  `fileURL` VARCHAR(100) NOT NULL,
  `status` VARCHAR(10) NOT NULL DEFAULT "draft",
  `initialDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activationDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `Author_id`),
  INDEX `fk_Document_User1_idx` (`Author_id` ASC),
  CONSTRAINT `fk_Document_User1`
    FOREIGN KEY (`Author_id`)
    REFERENCES `mydb`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Contains information for the user\'s documents.';


-- -----------------------------------------------------
-- Table `mydb`.`Distributee_Access`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Distributee_Access` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Distributee_Access` (
  `Document_id` INT NOT NULL,
  `User_id` INT NOT NULL,
  PRIMARY KEY (`Document_id`, `User_id`),
  INDEX `fk_Document_has_User_User1_idx` (`User_id` ASC),
  INDEX `fk_Document_has_User_Document_idx` (`Document_id` ASC),
  CONSTRAINT `fk_Document_has_User_Document`
    FOREIGN KEY (`Document_id`)
    REFERENCES `mydb`.`Document` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Document_has_User_User1`
    FOREIGN KEY (`User_id`)
    REFERENCES `mydb`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Revision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Revision` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Revision` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Document_id` INT NOT NULL,
  `isDraft` TINYINT NOT NULL DEFAULT 1,
  `revision_uploadDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filePath` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `Document_id`),
  INDEX `fk_Revision_Document1_idx` (`Document_id` ASC),
  UNIQUE INDEX `filePath_UNIQUE` (`filePath` ASC),
  CONSTRAINT `fk_Revision_Document1`
    FOREIGN KEY (`Document_id`)
    REFERENCES `mydb`.`Document` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
