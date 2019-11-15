-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tienda
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tienda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8 ;
USE `tienda` ;

-- -----------------------------------------------------
-- Table `tienda`.`tienda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`tienda` (
  `idTienda` INT(11) NOT NULL AUTO_INCREMENT,
  `nTienda` VARCHAR(45) NOT NULL,
  `tEmail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTienda`),
  UNIQUE INDEX `idTienda_UNIQUE` (`idTienda` ASC) VISIBLE,
  UNIQUE INDEX `tEmail_UNIQUE` (`tEmail` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`usuarios` (
  `idusuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `nUsuario` VARCHAR(45) NOT NULL,
  `passw` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `interes` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE INDEX `nUsuario_UNIQUE` (`nUsuario` ASC) VISIBLE,
  UNIQUE INDEX `idusuarios_UNIQUE` (`idusuarios` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`compra` (
  `usuarios_idusuarios` INT(11) NOT NULL,
  `tienda_idTienda` INT(11) NOT NULL,
  PRIMARY KEY (`usuarios_idusuarios`, `tienda_idTienda`),
  INDEX `fk_usuarios_has_tienda_tienda1_idx` (`tienda_idTienda` ASC) VISIBLE,
  INDEX `fk_usuarios_has_tienda_usuarios_idx` (`usuarios_idusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_usuarios_has_tienda_tienda1`
    FOREIGN KEY (`tienda_idTienda`)
    REFERENCES `tienda`.`tienda` (`idTienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_tienda_usuarios`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `tienda`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`productos` (
  `idProductos` INT(11) NOT NULL AUTO_INCREMENT,
  `precio` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProductos`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`moviles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`moviles` (
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  `productos_idProductos` INT(11) NOT NULL,
  UNIQUE INDEX `modelo_UNIQUE` (`modelo` ASC) VISIBLE,
  INDEX `fk_moviles_productos1_idx` (`productos_idProductos` ASC) VISIBLE,
  CONSTRAINT `fk_moviles_productos1`
    FOREIGN KEY (`productos_idProductos`)
    REFERENCES `tienda`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`ordenadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`ordenadores` (
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  `productos_idProductos` INT(11) NOT NULL,
  UNIQUE INDEX `modelo_UNIQUE` (`modelo` ASC) VISIBLE,
  INDEX `fk_ordenadores_productos1_idx` (`productos_idProductos` ASC) VISIBLE,
  CONSTRAINT `fk_ordenadores_productos1`
    FOREIGN KEY (`productos_idProductos`)
    REFERENCES `tienda`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`tablets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`tablets` (
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  `productos_idProductos` INT(11) NOT NULL,
  UNIQUE INDEX `modelo_UNIQUE` (`modelo` ASC) VISIBLE,
  INDEX `fk_tablets_productos1_idx` (`productos_idProductos` ASC) VISIBLE,
  CONSTRAINT `fk_tablets_productos1`
    FOREIGN KEY (`productos_idProductos`)
    REFERENCES `tienda`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda`.`vende`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda`.`vende` (
  `tienda_idTienda` INT(11) NOT NULL,
  `productos_idProductos` INT(11) NOT NULL,
  PRIMARY KEY (`tienda_idTienda`, `productos_idProductos`),
  INDEX `fk_tienda_has_productos_productos1_idx` (`productos_idProductos` ASC) VISIBLE,
  INDEX `fk_tienda_has_productos_tienda1_idx` (`tienda_idTienda` ASC) VISIBLE,
  CONSTRAINT `fk_tienda_has_productos_productos1`
    FOREIGN KEY (`productos_idProductos`)
    REFERENCES `tienda`.`productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tienda_has_productos_tienda1`
    FOREIGN KEY (`tienda_idTienda`)
    REFERENCES `tienda`.`tienda` (`idTienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
