-- -----------------------------------------------------
-- Schema cooperativa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cooperativa` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `cooperativa` ;

-- -----------------------------------------------------
-- Table `cooperativa`.`aportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cooperativa`.`aportes` (
  `idaportes` INT(11) NOT NULL AUTO_INCREMENT,
  `monto` DECIMAL(10,0) NOT NULL,
  `fecha_aporte` TIMESTAMP NULL DEFAULT NULL,
  `proyectos_idproyectos` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idaportes`),
  UNIQUE INDEX `idaportes_UNIQUE` (`idaportes` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `cooperativa`.`proyectos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cooperativa`.`proyectos` (
  `idproyectos` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` VARCHAR(255) NOT NULL,
  `monto_necesario` DECIMAL(12,2) NULL DEFAULT NULL,
  `fecha_creacion` DATE NULL DEFAULT NULL,
  `fecha_finalizado` DATE NULL DEFAULT NULL,
  `cantidad_votos` INT(11) NULL DEFAULT NULL, 
  `detalles` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`idproyectos`),
  UNIQUE INDEX `idproyectos_UNIQUE` (`idproyectos` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `cooperativa`.`documentacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cooperativa`.`documentacion` (
  `iddocumentacion` INT(11) NOT NULL AUTO_INCREMENT,
  `idproyectos` INT(11) NOT NULL,
  `factura` BLOB NULL DEFAULT NULL,
  `monto_factura` DECIMAL(12,2) NULL DEFAULT NULL,
  `fecha_subida` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`iddocumentacion`),
  INDEX `fk_documentacion_proyectos_idx` (`idproyectos` ASC) ,
  CONSTRAINT `fk_documentacion_proyectos`
    FOREIGN KEY (`idproyectos`)
    REFERENCES `cooperativa`.`proyectos` (`idproyectos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `cooperativa`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cooperativa`.`usuarios` (
  `id_usuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT NULL,
  `last_login` TIMESTAMP NULL DEFAULT NULL,
  `tipo_usuario` VARCHAR(1) NULL DEFAULT NULL,
  `autorizado` TINYINT(4) NULL DEFAULT NULL,
  `voto` INT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE INDEX `id_usuarios_UNIQUE` (`id_usuarios` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
