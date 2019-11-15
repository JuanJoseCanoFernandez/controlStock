-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bdtienda
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bdtienda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdtienda` DEFAULT CHARACTER SET utf8 ;
USE `bdtienda` ;

-- -----------------------------------------------------
-- Table `bdtienda`.`tienda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdtienda`.`tienda` (
  `idTienda` INT(11) NOT NULL AUTO_INCREMENT,
  `nTienda` VARCHAR(45) NOT NULL,
  `tEmail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTienda`),
  UNIQUE INDEX `idTienda_UNIQUE` (`idTienda` ASC),
  UNIQUE INDEX `tEmail_UNIQUE` (`tEmail` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bdtienda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdtienda`.`usuarios` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nusuario` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `interes` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `nUsuario_UNIQUE` (`nusuario` ASC),
  UNIQUE INDEX `idusuarios_UNIQUE` (`idusuario` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bdtienda`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdtienda`.`compra` (
  `usuarios_idusuarios` INT(11) NOT NULL,
  `tienda_idTienda` INT(11) NOT NULL,
  PRIMARY KEY (`usuarios_idusuarios`, `tienda_idTienda`),
  INDEX `fk_usuarios_has_tienda_tienda1_idx` (`tienda_idTienda` ASC),
  INDEX `fk_usuarios_has_tienda_usuarios_idx` (`usuarios_idusuarios` ASC),
  CONSTRAINT `fk_usuarios_has_tienda_tienda1`
    FOREIGN KEY (`tienda_idTienda`)
    REFERENCES `bdtienda`.`tienda` (`idTienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_tienda_usuarios`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `bdtienda`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bdtienda`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdtienda`.`productos` (
  `idProductos` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL check (tipo IN ('Movil','Tablet','Ordenador' )),
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `precio` INT NOT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idProductos`),
  UNIQUE INDEX `modelo_UNIQUE` (`modelo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdtienda`.`vende`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdtienda`.`vende` (
  `tienda_idTienda` INT(11) NOT NULL,
  `productos_idProductos` INT(11) NOT NULL,
  PRIMARY KEY (`tienda_idTienda`, `productos_idProductos`),
  INDEX `fk_tienda_has_productos_productos1_idx` (`productos_idProductos` ASC),
  INDEX `fk_tienda_has_productos_tienda1_idx` (`tienda_idTienda` ASC),
  CONSTRAINT `fk_tienda_has_productos_productos1`
    FOREIGN KEY (`productos_idProductos`)
    REFERENCES `bdtienda`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tienda_has_productos_tienda1`
    FOREIGN KEY (`tienda_idTienda`)
    REFERENCES `bdtienda`.`tienda` (`idTienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;