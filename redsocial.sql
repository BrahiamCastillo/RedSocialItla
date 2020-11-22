-- MySQL Script generated by MySQL Workbench
-- Sun Nov 22 02:37:03 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema redsocial
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema redsocial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redsocial` DEFAULT CHARACTER SET utf8 ;
USE `redsocial` ;

-- -----------------------------------------------------
-- Table `redsocial`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`Usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NULL,
  `clave` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`Amigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`Amigos` (
  `id_usuario` INT NOT NULL,
  `id_amigo` INT NOT NULL,
  INDEX `fk_Amigos_Usuario_idx` (`id_usuario` ASC) VISIBLE,
  INDEX `fk_Amigos_Usuario1_idx` (`id_amigo` ASC) VISIBLE,
  PRIMARY KEY (`id_usuario`, `id_amigo`),
  CONSTRAINT `fk_Amigos_Usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `redsocial`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Amigos_Usuario1`
    FOREIGN KEY (`id_amigo`)
    REFERENCES `redsocial`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`Publicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`Publicacion` (
  `id_publicacion` INT NOT NULL AUTO_INCREMENT,
  `publicacion` VARCHAR(256) NULL,
  `fecha_hora` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_publicacion`),
  INDEX `fk_Publicacion_Usuario1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_Publicacion_Usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `redsocial`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`Comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`Comentarios` (
  `id_comentarios` INT NOT NULL AUTO_INCREMENT,
  `id_publicacion` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `comentario` VARCHAR(256) NULL,
  `fecha_hora` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentarios`),
  INDEX `fk_Comentarios_Publicacion1_idx` (`id_publicacion` ASC) VISIBLE,
  INDEX `fk_Comentarios_Usuario1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_Comentarios_Publicacion1`
    FOREIGN KEY (`id_publicacion`)
    REFERENCES `redsocial`.`Publicacion` (`id_publicacion`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentarios_Usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `redsocial`.`Usuario` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
