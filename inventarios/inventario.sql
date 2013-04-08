SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Materia_Prima`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Materia_Prima` (
  `idMateria` INT NOT NULL AUTO_INCREMENT ,
  `Unidad` VARCHAR(45) NULL ,
  `Nombre` VARCHAR(75) NOT NULL ,
  `Fecha_Llegada` DATE NULL ,
  `Fecha_Caducidad` DATE NULL ,
  PRIMARY KEY (`idMateria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Proveedor` (
  `RFC` VARCHAR(10) NOT NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Direccion` VARCHAR(100) NULL ,
  `Tel` VARCHAR(10) NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`RFC`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Materia_Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Materia_Proveedor` (
  `Precio_Lote` FLOAT NOT NULL ,
  `idMateria` INT NOT NULL ,
  `Proveedor_RFC` VARCHAR(10) NOT NULL ,
  INDEX `fk_Materia_Proveedor_Materia_Prima_idx` (`idMateria` ASC) ,
  INDEX `fk_Materia_Proveedor_Proveedor1_idx` (`Proveedor_RFC` ASC) ,
  CONSTRAINT `fk_Materia_Proveedor_Materia_Prima`
    FOREIGN KEY (`idMateria` )
    REFERENCES `mydb`.`Materia_Prima` (`idMateria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Materia_Proveedor_Proveedor1`
    FOREIGN KEY (`Proveedor_RFC` )
    REFERENCES `mydb`.`Proveedor` (`RFC` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
