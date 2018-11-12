-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema eventos_fccr
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eventos_fccr
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eventos_fccr` DEFAULT CHARACTER SET utf8 ;
USE `eventos_fccr` ;

-- -----------------------------------------------------
-- Table `eventos_fccr`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `sobrenome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `nascimento` DATE NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `admin_site` TINYINT(1) NULL DEFAULT NULL,
  `situacao` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventos_fccr`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `inicio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fim` TIMESTAMP NULL,
  `criador` INT(11) NOT NULL,
  `situacao` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `fk_Eventos_Usuario_idx` (`criador` ASC),
  CONSTRAINT `fk_Eventos_Usuario`
    FOREIGN KEY (`criador`)
    REFERENCES `eventos_fccr`.`usuario` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventos_fccr`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`comentario` (
  `Eventos_id` INT(11) NOT NULL,
  `Usuario_id` INT(11) NOT NULL,
  `comentario` LONGTEXT NULL DEFAULT NULL,
  `contador` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`contador`),
  INDEX `fk_Eventos_has_Usuario_Usuario2_idx` (`Usuario_id` ASC),
  INDEX `fk_Eventos_has_Usuario_Eventos2_idx` (`Eventos_id` ASC),
  CONSTRAINT `fk_Eventos_has_Usuario_Eventos2`
    FOREIGN KEY (`Eventos_id`)
    REFERENCES `eventos_fccr`.`eventos` (`id`),
  CONSTRAINT `fk_Eventos_has_Usuario_Usuario2`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `eventos_fccr`.`usuario` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventos_fccr`.`fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`fotos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `conteudo` LONGBLOB NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventos_fccr`.`fotos_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`fotos_evento` (
  `fotos_id` INT(11) NOT NULL,
  `Eventos_id` INT(11) NOT NULL,
  `Usuario_id` INT(11) NOT NULL,
  INDEX `fk_fotos_has_Eventos_Eventos1_idx` (`Eventos_id` ASC),
  INDEX `fk_fotos_has_Eventos_fotos1_idx` (`fotos_id` ASC),
  INDEX `fk_fotos_evento_Usuario1_idx` (`Usuario_id` ASC),
  CONSTRAINT `fk_fotos_evento_Usuario1`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `eventos_fccr`.`usuario` (`id`),
  CONSTRAINT `fk_fotos_has_Eventos_Eventos1`
    FOREIGN KEY (`Eventos_id`)
    REFERENCES `eventos_fccr`.`eventos` (`id`),
  CONSTRAINT `fk_fotos_has_Eventos_fotos1`
    FOREIGN KEY (`fotos_id`)
    REFERENCES `eventos_fccr`.`fotos` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventos_fccr`.`participantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`participantes` (
  `Eventos_id` INT(11) NOT NULL,
  `Usuario_id` INT(11) NOT NULL,
  INDEX `fk_Eventos_has_Usuario_Usuario1_idx` (`Usuario_id` ASC),
  INDEX `fk_Eventos_has_Usuario_Eventos1_idx` (`Eventos_id` ASC),
  CONSTRAINT `fk_Eventos_has_Usuario_Eventos1`
    FOREIGN KEY (`Eventos_id`)
    REFERENCES `eventos_fccr`.`eventos` (`id`),
  CONSTRAINT `fk_Eventos_has_Usuario_Usuario1`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `eventos_fccr`.`usuario` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventos_fccr`.`permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventos_fccr`.`permissao` (
  `Eventos_id` INT(11) NOT NULL,
  `Usuario_id` INT(11) NOT NULL,
  INDEX `fk_eventos_has_usuario_usuario1_idx` (`Usuario_id` ASC),
  INDEX `fk_eventos_has_usuario_eventos1_idx` (`Eventos_id` ASC),
  CONSTRAINT `fk_eventos_has_usuario_eventos`
    FOREIGN KEY (`Eventos_id`)
    REFERENCES `eventos_fccr`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_eventos_has_usuario_usuario`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `eventos_fccr`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
