-- MySQL Script generated by MySQL Workbench
-- Sat Mar  5 09:07:36 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema PeluqueriaF
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PeluqueriaF
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PeluqueriaF` DEFAULT CHARACTER SET utf8 ;
USE `PeluqueriaF` ;

-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Cliente` (
  `idCliente` INT NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `Fecha_N` DATE NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`dias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`dias` (
  `iddias` INT NOT NULL,
  `dia` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`iddias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`cargo` (
  `idcargo` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Empleado` (
  `cedula` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `Dirección` VARCHAR(45) NOT NULL,
  `dias_iddias` INT NOT NULL,
  `cargo_idcargo` INT NOT NULL,
  PRIMARY KEY (`cedula`),
    FOREIGN KEY (`dias_iddias`)
    REFERENCES `PeluqueriaF`.`dias` (`iddias`)
   ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`cargo_idcargo`)
    REFERENCES `PeluqueriaF`.`cargo` (`idcargo`)
    ON DELETE cascade ON UPDATE cascade)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Horas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Horas` (
  `idHoras` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idHoras`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Telefonos_C`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Telefonos_C` (
  `idCliente_fk` INT NOT NULL,
  `numero` INT NOT NULL,
    FOREIGN KEY (`idCliente_fk`)
    REFERENCES `PeluqueriaF`.`Cliente` (`idCliente`)
    ON DELETE cascade ON UPDATE cascade)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Servicio` (
  `idServicio` INT NOT NULL,
  `descripición` VARCHAR(45) NOT NULL,
  `precio` INT NOT NULL,
  `cargo_idcargo` INT NOT NULL,
  PRIMARY KEY (`idServicio`),
    FOREIGN KEY (`cargo_idcargo`)
    REFERENCES `PeluqueriaF`.`cargo` (`idcargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Estado_cita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Estado_cita` (
  `idEstado_cita` INT NOT NULL,
  `descripciòn` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado_cita`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Citas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Citas` (
  `Servicio_idServicio` INT NOT NULL,
  `Cliente_idCliente` INT NOT NULL,
  `Empleado_idEmpleado` INT NOT NULL,
  `Horas_idHoras` INT NOT NULL,
  `Fecha_cita` DATE NOT NULL,
  `Estado_cita_idEstado_cita` INT NOT NULL,
  PRIMARY KEY (`Servicio_idServicio`, `Cliente_idCliente`, `Empleado_idEmpleado`, `Horas_idHoras`),
    FOREIGN KEY (`Servicio_idServicio`)
    REFERENCES `PeluqueriaF`.`Servicio` (`idServicio`)
    ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `PeluqueriaF`.`Cliente` (`idCliente`)
    ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`Empleado_idEmpleado`)
    REFERENCES `PeluqueriaF`.`Empleado` (`cedula`)
    ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`Horas_idHoras`)
    REFERENCES `PeluqueriaF`.`Horas` (`idHoras`)
    ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`Estado_cita_idEstado_cita`)
    REFERENCES `PeluqueriaF`.`Estado_cita` (`idEstado_cita`)
    ON DELETE cascade ON UPDATE cascade)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Telefonos_e`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Telefonos_e` (
  `Empleado_cedula` INT NOT NULL,
  `numero` INT NOT NULL,
    FOREIGN KEY (`Empleado_cedula`)
    REFERENCES `PeluqueriaF`.`Empleado` (`cedula`)
    ON DELETE cascade ON UPDATE cascade)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Roles` (
  `idRoles` INT NOT NULL,
  `Rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRoles`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeluqueriaF`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PeluqueriaF`.`Usuario` (
  `idUsuario` INT NOT NULL auto_increment,
  `Usuario` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  `Cliente_idCliente` INT NULL,
  `Empleado_cedula` INT NULL,
  PRIMARY KEY (`idUsuario`),
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `PeluqueriaF`.`Roles` (`idRoles`)
    ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `PeluqueriaF`.`Cliente` (`idCliente`)
    ON DELETE cascade ON UPDATE cascade,
    FOREIGN KEY (`Empleado_cedula`)
    REFERENCES `PeluqueriaF`.`Empleado` (`cedula`)
    ON DELETE cascade ON UPDATE cascade)
ENGINE = InnoDB;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
