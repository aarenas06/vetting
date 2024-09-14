CREATE SCHEMA IF NOT EXISTS `vetconnect` DEFAULT CHARACTER SET utf8;
USE `vetconnect`;

-- -----------------------------------------------------
-- Table `TbRoles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbRoles` (
  `idTbRoles` INT NOT NULL AUTO_INCREMENT,
  `RolNom` VARCHAR(45) NOT NULL,
  `RolTipo` INT NOT NULL,
  PRIMARY KEY (`idTbRoles`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbUsuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbUsuarios` (
  `idTbUsuarios` INT NOT NULL AUTO_INCREMENT,
  `idTbRoles` INT NOT NULL,
  `UsuNom` VARCHAR(45) NOT NULL,
  `UsuUser` VARCHAR(45) NOT NULL,
  `UsuEmail` VARCHAR(45) NULL,
  `UsuCel` INT NULL,
  `UsuCC` VARCHAR(45) NOT NULL,
  `UsuDirec` VARCHAR(45) NULL,
  `UsuCla` VARCHAR(45) NOT NULL,
  `UsuPic` VARCHAR(45) NULL,
  `UsuLastLog` DATETIME NULL,
  PRIMARY KEY (`idTbUsuarios`),
  INDEX `fk_TbUsuarios_TbRoles1_idx` (`idTbRoles` ASC),
  CONSTRAINT `fk_TbUsuarios_TbRoles1`
    FOREIGN KEY (`idTbRoles`)
    REFERENCES `TbRoles` (`idTbRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbEmpresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbEmpresas` (
  `idTbEmpresas` INT NOT NULL AUTO_INCREMENT,
  `EmpreNom` VARCHAR(45) NOT NULL,
  `EmpreNit` VARCHAR(45) NOT NULL,
  `EmpreEst` INT NOT NULL,
  `EmpreRepre` VARCHAR(45) NOT NULL,
  `EmpreRepreTel` INT NOT NULL,
  `EmpreRepreCC` VARCHAR(45) NOT NULL,
  `EmpreFechCrea` DATE NOT NULL,
  `EmpreAct` INT NULL,
  `EmpreActFehUlt` DATETIME NULL,
  PRIMARY KEY (`idTbEmpresas`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbEmpleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbEmpleados` (
  `idTbEmpleados` INT NOT NULL AUTO_INCREMENT,
  `idTbEmpresas` INT NOT NULL,
  `idTbRoles` INT NOT NULL,
  `EmpNom` VARCHAR(45) NOT NULL,
  `EmpCod` VARCHAR(45) NOT NULL,
  `EmpUsu` VARCHAR(45) NOT NULL,
  `EmpCla` VARCHAR(45) NOT NULL,
  `EmpCel` VARCHAR(45) NOT NULL,
  `EmpEst` INT NOT NULL,
  `EmpEmail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTbEmpleados`),
  INDEX `fk_TbEmpleados_TbRoles1_idx` (`idTbRoles` ASC),
  INDEX `fk_TbEmpleados_TbEmpresas1_idx` (`idTbEmpresas` ASC),
  CONSTRAINT `fk_TbEmpleados_TbRoles1`
    FOREIGN KEY (`idTbRoles`)
    REFERENCES `TbRoles` (`idTbRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TbEmpleados_TbEmpresas1`
    FOREIGN KEY (`idTbEmpresas`)
    REFERENCES `TbEmpresas` (`idTbEmpresas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbPlanes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbPlanes` (
  `idTbPlanes` INT NOT NULL AUTO_INCREMENT,
  `PlanNom` VARCHAR(45) NOT NULL,
  `PlanVigenciaDia` INT NULL,
  `PlanCosto` FLOAT NOT NULL,
  `PlanEst` INT NOT NULL,
  `PlanVigenciaMes` INT NULL,
  PRIMARY KEY (`idTbPlanes`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbEspecies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbEspecies` (
  `idTbEspecies` INT NOT NULL AUTO_INCREMENT,
  `EspeNom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTbEspecies`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tbMascotas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbMascotas` (
  `idtbMascotas` INT NOT NULL AUTO_INCREMENT,
  `idTbUsuarios` INT NOT NULL,
  `idTbEspecies` INT NOT NULL,
  `MascoCod` VARCHAR(45) NOT NULL,
  `MascoFechNac` VARCHAR(45) NULL,
  `MascoYear` VARCHAR(45) NOT NULL,
  `MacoMes` VARCHAR(45) NOT NULL,
  `MascoSex` VARCHAR(45) NOT NULL,
  `MascoPelaje` VARCHAR(45) NOT NULL,
  `MascoPeso` VARCHAR(45) NOT NULL,
  `MacoComidaHab` VARCHAR(45) NULL,
  `MascoVivienda` VARCHAR(45) NULL,
  `MascoUltCelo` DATE NULL,
  `MascoChip` VARCHAR(45) NULL,
  `MascoPatologia` VARCHAR(45) NULL,
  `MascoAdop` INT NULL,
  `MascoPic` VARCHAR(45) NULL,
  `MascoAgresion` INT NULL,
  PRIMARY KEY (`idtbMascotas`),
  UNIQUE INDEX `MascoCod_UNIQUE` (`MascoCod` ASC),
  INDEX `fk_tbMascotas_TbUsuarios1_idx` (`idTbUsuarios` ASC),
  INDEX `fk_tbMascotas_TbEspecies1_idx` (`idTbEspecies` ASC),
  CONSTRAINT `fk_tbMascotas_TbUsuarios1`
    FOREIGN KEY (`idTbUsuarios`)
    REFERENCES `TbUsuarios` (`idTbUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbMascotas_TbEspecies1`
    FOREIGN KEY (`idTbEspecies`)
    REFERENCES `TbEspecies` (`idTbEspecies`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbRazas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbRazas` (
  `idTbRazas` INT NOT NULL AUTO_INCREMENT,
  `RazNom` VARCHAR(45) NOT NULL,
  `idTbEspecies` INT NOT NULL,
  PRIMARY KEY (`idTbRazas`),
  INDEX `fk_TbRazas_TbEspecies1_idx` (`idTbEspecies` ASC),
  CONSTRAINT `fk_TbRazas_TbEspecies1`
    FOREIGN KEY (`idTbEspecies`)
    REFERENCES `TbEspecies` (`idTbEspecies`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbServicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbServicios` (
  `idTbServicios` INT NOT NULL AUTO_INCREMENT,
  `idTbPlanes` INT NOT NULL,
  `ServiciosNom` VARCHAR(45) NOT NULL,
  `ServiciosEst` INT NOT NULL,
  PRIMARY KEY (`idTbServicios`),
  INDEX `fk_TbServicios_TbPlanes1_idx` (`idTbPlanes` ASC),
  CONSTRAINT `fk_TbServicios_TbPlanes1`
    FOREIGN KEY (`idTbPlanes`)
    REFERENCES `TbPlanes` (`idTbPlanes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbCitas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbCitas` (
  `idTbCitas` INT NOT NULL AUTO_INCREMENT,
  `id_EmpCrea` INT NOT NULL,
  `idTbEmAsig` INT NOT NULL,
  `idtbMascotas` INT NOT NULL,
  `idTbServicios` INT NOT NULL,
  `IdCitaPre` VARCHAR(45) NULL,
  `CitaNom` VARCHAR(45) NOT NULL,
  `CitaDate` DATETIME NOT NULL,
  `CitaEst` INT NOT NULL,
  `CitaObs` TEXT NULL,
  PRIMARY KEY (`idTbCitas`),
  INDEX `fk_TbCitas_tbMascotas1_idx` (`idtbMascotas` ASC),
  INDEX `fk_TbCitas_TbEmpleados1_idx` (`idTbEmAsig` ASC),
  INDEX `fk_TbCitas_TbEmpleados2_idx` (`id_EmpCrea` ASC),
  INDEX `fk_TbCitas_TbServicios1_idx` (`idTbServicios` ASC),
  CONSTRAINT `fk_TbCitas_tbMascotas1`
    FOREIGN KEY (`idtbMascotas`)
    REFERENCES `tbMascotas` (`idtbMascotas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TbCitas_TbEmpleados1`
    FOREIGN KEY (`idTbEmAsig`)
    REFERENCES `TbEmpleados` (`idTbEmpleados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TbCitas_TbEmpleados2`
    FOREIGN KEY (`id_EmpCrea`)
    REFERENCES `TbEmpleados` (`idTbEmpleados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TbCitas_TbServicios1`
    FOREIGN KEY (`idTbServicios`)
    REFERENCES `TbServicios` (`idTbServicios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `TbHisClinica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbHisClinica` (
  `idTbHisClinica` INT NOT NULL AUTO_INCREMENT,
  `idtbMascotas` INT NOT NULL,
  `idTbEmpleados` INT NOT NULL,
  `HisObserv` TEXT NULL,
  `HisFec` DATE NULL,
  PRIMARY KEY (`idTbHisClinica`),
  INDEX `fk_TbHisClinica_tbMascotas1_idx` (`idtbMascotas` ASC),
  INDEX `fk_TbHisClinica_TbEmpleados1_idx` (`idTbEmpleados` ASC),
  CONSTRAINT `fk_TbHisClinica_tbMascotas1`
    FOREIGN KEY (`idtbMascotas`)
    REFERENCES `tbMascotas` (`idtbMascotas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TbHisClinica_TbEmpleados1`
    FOREIGN KEY (`idTbEmpleados`)
    REFERENCES `TbEmpleados` (`idTbEmpleados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TbHistorialPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TbHistorialPago` (
  `idTbHistorialPago` INT NOT NULL AUTO_INCREMENT,
  `idTbPlanes` INT NOT NULL,
  `HistPagoFec` DATE NOT NULL,
  `HistPagoObs` TEXT NULL,
  PRIMARY KEY (`idTbHistorialPago`),
  INDEX `fk_TbHistorialPago_TbPlanes1_idx` (`idTbPlanes` ASC),
  CONSTRAINT `fk_TbHistorialPago_TbPlanes1`
    FOREIGN KEY (`idTbPlanes`)
    REFERENCES `TbPlanes` (`idTbPlanes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;
