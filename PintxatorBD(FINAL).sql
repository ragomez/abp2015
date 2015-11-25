-- MySQL Script generated by MySQL Workbench
-- mié 25 nov 2015 12:49:51 CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pincho` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`pincho` (
  `idPincho` INT NOT NULL AUTO_INCREMENT,
  `nombrePincho` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `celiaco` VARCHAR(2) NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `ganadorPopular` VARCHAR(45) NULL,
  `ganadorProfesional` VARCHAR(45) NULL,
  `puntosPopular` INT NULL,
  `mediaPuntosProfesional` INT NULL,
  `precio` INT NOT NULL,
  PRIMARY KEY (`idPincho`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idPincho_UNIQUE` ON `mydb`.`pincho` (`idPincho` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`establecimiento` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`establecimiento` (
  `idEstablecimiento` INT NOT NULL AUTO_INCREMENT,
  `nombreEstablecimiento` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `cif` VARCHAR(20) NOT NULL,
  `horario` VARCHAR(30) NOT NULL,
  `paginaWeb` VARCHAR(45) NOT NULL,
  `telefono` INT NOT NULL,
  `Pincho_idPincho` INT NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstablecimiento`, `Pincho_idPincho`),
  CONSTRAINT `fk_Establecimiento_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `mydb`.`pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idEstablecimiento_UNIQUE` ON `mydb`.`establecimiento` (`idEstablecimiento` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_Establecimiento_Pincho1_idx` ON `mydb`.`establecimiento` (`Pincho_idPincho` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `login_UNIQUE` ON `mydb`.`establecimiento` (`login` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`juradoprofesional`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`juradoprofesional` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`juradoprofesional` (
  `idJuradoProfesional` INT NOT NULL AUTO_INCREMENT,
  `dni` VARCHAR(9) NOT NULL,
  `telefono` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idJuradoProfesional`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idJuradoProfesional_UNIQUE` ON `mydb`.`juradoprofesional` (`idJuradoProfesional` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `login_UNIQUE` ON `mydb`.`juradoprofesional` (`login` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`juradopopular`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`juradopopular` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`juradopopular` (
  `mail` VARCHAR(45) NOT NULL,
  `idJuradoPopular` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `dni` VARCHAR(9) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `telefono` INT NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idJuradoPopular`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idUsuario_UNIQUE` ON `mydb`.`juradopopular` (`idJuradoPopular` ASC);

SHOW WARNINGS;
CREATE UNIQUE INDEX `login_UNIQUE` ON `mydb`.`juradopopular` (`login` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`administrador` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`administrador` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `mailAdmin` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NULL,
  PRIMARY KEY (`idAdministrador`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idAdministrador_UNIQUE` ON `mydb`.`administrador` (`idAdministrador` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`folleto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`folleto` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`folleto` (
  `idFolleto` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(25) NOT NULL,
  `descripcion` TEXT(200) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `Administrador_idAdministrador` INT NOT NULL,
  PRIMARY KEY (`idFolleto`, `Administrador_idAdministrador`),
  CONSTRAINT `fk_Folleto_Administrador1`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `mydb`.`administrador` (`idAdministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idFolleto_UNIQUE` ON `mydb`.`folleto` (`idFolleto` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_Folleto_Administrador1_idx` ON `mydb`.`folleto` (`Administrador_idAdministrador` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`patrocinador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`patrocinador` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`patrocinador` (
  `idPatrocinador` INT NOT NULL AUTO_INCREMENT,
  `nombrePatrocinador` VARCHAR(45) NOT NULL,
  `telefonoPatrocinador` INT NOT NULL,
  `importe` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`idPatrocinador`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idPatrocinador_UNIQUE` ON `mydb`.`patrocinador` (`idPatrocinador` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`premio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`premio` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`premio` (
  `idPremio` INT NOT NULL AUTO_INCREMENT,
  `fechaPremio` DATE NOT NULL,
  `importePopular` DECIMAL(10,0) NOT NULL,
  `importeProfesional` DECIMAL(10,0) NOT NULL,
  `Patrocinador_idPatrocinador` INT NOT NULL,
  `nombrePremio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPremio`, `Patrocinador_idPatrocinador`),
  CONSTRAINT `fk_Premio_Patrocinador1`
    FOREIGN KEY (`Patrocinador_idPatrocinador`)
    REFERENCES `mydb`.`patrocinador` (`idPatrocinador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idPremio_UNIQUE` ON `mydb`.`premio` (`idPremio` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_Premio_Patrocinador1_idx` ON `mydb`.`premio` (`Patrocinador_idPatrocinador` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`votoprofesional`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`votoprofesional` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`votoprofesional` (
  `Pincho_idPincho` INT NOT NULL,
  `JuradoProfesional_idJuradoProfesional` INT NOT NULL,
  `puntuacionMedia` DECIMAL(10,0) NOT NULL,
  `votos5` INT NOT NULL,
  `votos4` INT NOT NULL,
  `votos3` INT NOT NULL,
  `votos2` INT NOT NULL,
  `votos1` INT NOT NULL,
  PRIMARY KEY (`Pincho_idPincho`, `JuradoProfesional_idJuradoProfesional`),
  CONSTRAINT `fk_VotoProfesinal_Pincho`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `mydb`.`pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VotoProfesinal_JuradoProfesional1`
    FOREIGN KEY (`JuradoProfesional_idJuradoProfesional`)
    REFERENCES `mydb`.`juradoprofesional` (`idJuradoProfesional`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_VotoProfesinal_Pincho_idx` ON `mydb`.`votoprofesional` (`Pincho_idPincho` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_VotoProfesinal_JuradoProfesional1_idx` ON `mydb`.`votoprofesional` (`JuradoProfesional_idJuradoProfesional` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`codigo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`codigo` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`codigo` (
  `idCodigo` INT NOT NULL AUTO_INCREMENT,
  `codigoVotacion` INT NOT NULL,
  `Pincho_idPincho` INT NOT NULL,
  `codigoEstado` TINYINT(1) NULL,
  PRIMARY KEY (`idCodigo`),
  CONSTRAINT `fk_Codigo_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `mydb`.`pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `idCodigo_UNIQUE` ON `mydb`.`codigo` (`idCodigo` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_Codigo_Pincho1_idx` ON `mydb`.`codigo` (`Pincho_idPincho` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`gastromapa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`gastromapa` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`gastromapa` (
  `idGastroMapa` INT NOT NULL,
  `coordenadas` DECIMAL(10,0) NOT NULL,
  `Establecimiento_idEstablecimiento` INT NOT NULL,
  `Establecimiento_Pincho_idPincho` INT NOT NULL,
  PRIMARY KEY (`idGastroMapa`, `Establecimiento_idEstablecimiento`, `Establecimiento_Pincho_idPincho`),
  CONSTRAINT `fk_GastroMapa_Establecimiento1`
    FOREIGN KEY (`Establecimiento_idEstablecimiento` , `Establecimiento_Pincho_idPincho`)
    REFERENCES `mydb`.`establecimiento` (`idEstablecimiento` , `Pincho_idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Las coordenadas las mete el administrador pero lo que importa es que se relacionen las coordenadas con el establecimiento\n';

SHOW WARNINGS;
CREATE UNIQUE INDEX `idGastroMapa_UNIQUE` ON `mydb`.`gastromapa` (`idGastroMapa` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_GastroMapa_Establecimiento1_idx` ON `mydb`.`gastromapa` (`Establecimiento_idEstablecimiento` ASC, `Establecimiento_Pincho_idPincho` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`premiopincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`premiopincho` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`premiopincho` (
  `Pincho_idPincho` INT NOT NULL,
  `Premio_idPremio` INT NOT NULL,
  PRIMARY KEY (`Pincho_idPincho`, `Premio_idPremio`),
  CONSTRAINT `fk_Premio_pincho_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `mydb`.`pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Premio_pincho_Premio1`
    FOREIGN KEY (`Premio_idPremio`)
    REFERENCES `mydb`.`premio` (`idPremio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Premio_pincho_Premio1_idx` ON `mydb`.`premiopincho` (`Premio_idPremio` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`votopopular`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`votopopular` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`votopopular` (
  `contadorVotosPop` INT NULL,
  `idJuradoPopular` INT NOT NULL,
  `idCodigo` INT NOT NULL,
  PRIMARY KEY (`idJuradoPopular`, `idCodigo`),
  CONSTRAINT `fk_VotoPopular_1`
    FOREIGN KEY (`idJuradoPopular`)
    REFERENCES `mydb`.`juradopopular` (`idJuradoPopular`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VotoPopular_2`
    FOREIGN KEY (`idCodigo`)
    REFERENCES `mydb`.`codigo` (`idCodigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_VotoPopular_2_idx` ON `mydb`.`votopopular` (`idCodigo` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `Login` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Login`))
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;