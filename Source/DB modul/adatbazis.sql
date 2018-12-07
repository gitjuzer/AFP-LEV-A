-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema afpleva_test
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema afpleva_test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `afpleva_test` DEFAULT CHARACTER SET utf8 ;
USE `afpleva_test` ;

-- -----------------------------------------------------
-- Table `afpleva_test`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`User` (
  `U_ID` INT NOT NULL AUTO_INCREMENT,
  `U_LoginName` VARCHAR(45) NULL,
  `U_Name` VARCHAR(50) NOT NULL,
  `U_Email` VARCHAR(50) NOT NULL,
  `U_Pass` VARCHAR(255) NOT NULL,
  `U_Type` ENUM('Tanár','Diák','Admin') NOT NULL,
  PRIMARY KEY (`U_ID`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `U_LoginName_UNIQUE` ON `afpleva_test`.`User` (`U_LoginName` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`Topic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`Topic` (
  `T_ID` INT NOT NULL AUTO_INCREMENT,
  `T_Name` VARCHAR(45) NULL,
  `T_Desc` TEXT NULL,
  PRIMARY KEY (`T_ID`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `T_Name_UNIQUE` ON `afpleva_test`.`Topic` (`T_Name` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`Curriculum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`Curriculum` (
  `C_ID` INT NOT NULL AUTO_INCREMENT,
  `C_Title` VARCHAR(99) NOT NULL,
  `C_Content` TEXT NOT NULL,
  `C_T_ID` INT NOT NULL,
  PRIMARY KEY (`C_ID`),
  CONSTRAINT `fk_Curiculum_Topic1`
    FOREIGN KEY (`C_T_ID`)
    REFERENCES `afpleva_test`.`Topic` (`T_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Curiculum_Topic1_idx` ON `afpleva_test`.`Curriculum` (`C_T_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`Exercise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`Exercise` (
  `E_ID` INT NOT NULL AUTO_INCREMENT,
  `E_T_ID` INT NOT NULL,
  PRIMARY KEY (`E_ID`),
  CONSTRAINT `fk_Excersise_Topic1`
    FOREIGN KEY (`E_T_ID`)
    REFERENCES `afpleva_test`.`Topic` (`T_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Excersise_Topic1_idx` ON `afpleva_test`.`Exercise` (`E_T_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`ExerciseDilemma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`ExerciseDilemma` (
  `ED_ID` INT NOT NULL AUTO_INCREMENT,
  `ED_Question` VARCHAR(255) NOT NULL,
  `ED_YesNo` TINYINT NOT NULL,
  `ED_E_ID` INT NOT NULL,
  PRIMARY KEY (`ED_ID`),
  CONSTRAINT `fk_ExcersiseDilemma_Excersise1`
    FOREIGN KEY (`ED_E_ID`)
    REFERENCES `afpleva_test`.`Exercise` (`E_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ExcersiseDilemma_Excersise1_idx` ON `afpleva_test`.`ExerciseDilemma` (`ED_E_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`ExerciceMultipleChoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`ExerciceMultipleChoice` (
  `EMC_ID` INT NOT NULL AUTO_INCREMENT,
  `EMC_Question` VARCHAR(255) NOT NULL,
  `EMC_E_ID` INT NOT NULL,
  PRIMARY KEY (`EMC_ID`),
  CONSTRAINT `fk_ExcersiceMultipleChoise_Excersise1`
    FOREIGN KEY (`EMC_E_ID`)
    REFERENCES `afpleva_test`.`Exercise` (`E_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ExcersiceMultipleChoise_Excersise1_idx` ON `afpleva_test`.`ExerciceMultipleChoice` (`EMC_E_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`EMCAnswer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`EMCAnswer` (
  `EMCA_ID` INT NOT NULL AUTO_INCREMENT,
  `EMCA_Answer` VARCHAR(255) NOT NULL,
  `EMCA_IsCorrect` TINYINT NOT NULL,
  `EMCA_EMC_ID` INT NOT NULL,
  PRIMARY KEY (`EMCA_ID`),
  CONSTRAINT `fk_EMCAnswer_ExcersiceMultipleChoise1`
    FOREIGN KEY (`EMCA_EMC_ID`)
    REFERENCES `afpleva_test`.`ExerciceMultipleChoice` (`EMC_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_EMCAnswer_ExcersiceMultipleChoise1_idx` ON `afpleva_test`.`EMCAnswer` (`EMCA_EMC_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`TestList`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`TestList` (
  `TL_ID` INT NOT NULL AUTO_INCREMENT,
  `TL_Title` VARCHAR(45) NOT NULL,
  `TL_U_ID` INT NOT NULL,
  PRIMARY KEY (`TL_ID`),
  CONSTRAINT `fk_TestList_User1`
    FOREIGN KEY (`TL_U_ID`)
    REFERENCES `afpleva_test`.`User` (`U_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_TestList_User1_idx` ON `afpleva_test`.`TestList` (`TL_U_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`Test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`Test` (
  `TE_ID` INT NOT NULL AUTO_INCREMENT,
  `TE_Score` INT NOT NULL,
  `TE_TL_ID` INT NOT NULL,
  PRIMARY KEY (`TE_ID`),
  CONSTRAINT `fk_Test_TestList1`
    FOREIGN KEY (`TE_TL_ID`)
    REFERENCES `afpleva_test`.`TestList` (`TL_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Test_TestList1_idx` ON `afpleva_test`.`Test` (`TE_TL_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`EDTestList`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`EDTestList` (
  `EDTL_ED_ID` INT NOT NULL,
  `EDTL_TL_ID` INT NOT NULL,
  PRIMARY KEY (`EDTL_ED_ID`, `EDTL_TL_ID`),
  CONSTRAINT `fk_ExcersiseDilemma_has_TestList_ExcersiseDilemma1`
    FOREIGN KEY (`EDTL_ED_ID`)
    REFERENCES `afpleva_test`.`ExerciseDilemma` (`ED_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ExcersiseDilemma_has_TestList_TestList1`
    FOREIGN KEY (`EDTL_TL_ID`)
    REFERENCES `afpleva_test`.`TestList` (`TL_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ExcersiseDilemma_has_TestList_TestList1_idx` ON `afpleva_test`.`EDTestList` (`EDTL_TL_ID` ASC);

CREATE INDEX `fk_ExcersiseDilemma_has_TestList_ExcersiseDilemma1_idx` ON `afpleva_test`.`EDTestList` (`EDTL_ED_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`EMCTestList`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`EMCTestList` (
  `EMCTL_TL_ID` INT NOT NULL,
  `EMCTL_EMC_ID` INT NOT NULL,
  PRIMARY KEY (`EMCTL_TL_ID`, `EMCTL_EMC_ID`),
  CONSTRAINT `fk_TestList_has_ExcersiceMultipleChoise_TestList1`
    FOREIGN KEY (`EMCTL_TL_ID`)
    REFERENCES `afpleva_test`.`TestList` (`TL_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TestList_has_ExcersiceMultipleChoise_ExcersiceMultipleChoi1`
    FOREIGN KEY (`EMCTL_EMC_ID`)
    REFERENCES `afpleva_test`.`ExerciceMultipleChoice` (`EMC_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_TestList_has_ExcersiceMultipleChoise_ExcersiceMultipleCh_idx` ON `afpleva_test`.`EMCTestList` (`EMCTL_EMC_ID` ASC);

CREATE INDEX `fk_TestList_has_ExcersiceMultipleChoise_TestList1_idx` ON `afpleva_test`.`EMCTestList` (`EMCTL_TL_ID` ASC);


-- -----------------------------------------------------
-- Table `afpleva_test`.`TUSer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `afpleva_test`.`TUSer` (
  `TU_U_ID` INT NOT NULL,
  `TU_TE_ID` INT NOT NULL,
  PRIMARY KEY (`TU_U_ID`, `TU_TE_ID`),
  CONSTRAINT `fk_User_has_Test_User1`
    FOREIGN KEY (`TU_U_ID`)
    REFERENCES `afpleva_test`.`User` (`U_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Test_Test1`
    FOREIGN KEY (`TU_TE_ID`)
    REFERENCES `afpleva_test`.`Test` (`TE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_User_has_Test_Test1_idx` ON `afpleva_test`.`TUSer` (`TU_TE_ID` ASC);

CREATE INDEX `fk_User_has_Test_User1_idx` ON `afpleva_test`.`TUSer` (`TU_U_ID` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
