-- Created by Vertabelo (http://vertabelo.com)
-- Script type: create
-- Scope: [tables, references, sequences, views, procedures]
-- Generated at Wed Feb 18 14:53:21 UTC 2015




-- tables
-- Table advertise
CREATE TABLE advertise (
    id int    NOT NULL  AUTO_INCREMENT,
    `desc` text    NULL ,
    users_id int    NOT NULL ,
    foto1 varchar(100)    NOT NULL ,
    CONSTRAINT advertise_pk PRIMARY KEY (id)
);

-- Table sessions
CREATE TABLE sessions (
    id int    NOT NULL  AUTO_INCREMENT,
    users_id int    NOT NULL ,
    created timestamp    NOT NULL ,
    CONSTRAINT sessions_pk PRIMARY KEY (id)
);

-- Table users
CREATE TABLE users (
    id int    NOT NULL  AUTO_INCREMENT,
    name varchar(30)    NULL ,
    password varchar(64)    NULL ,
    CONSTRAINT users_pk PRIMARY KEY (id)
);





-- foreign keys
-- Reference:  advertise_users (table: advertise)


ALTER TABLE advertise ADD CONSTRAINT advertise_users FOREIGN KEY advertise_users (users_id)
    REFERENCES users (id)
    ON DELETE CASCADE;
-- Reference:  sessions_users (table: sessions)


ALTER TABLE sessions ADD CONSTRAINT sessions_users FOREIGN KEY sessions_users (users_id)
    REFERENCES users (id);



-- End of file.

/*

CREATE DATABASE IF NOT EXISTS `m7` DEFAULT CHARACTER SET latin1 ;
USE `m7` ;

-- -----------------------------------------------------
-- Table `m7`.`Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Employee` (
`Nombre` VARCHAR(30) NULL DEFAULT NULL,
`Correo` VARCHAR(30) NULL DEFAULT NULL,
`Direccion` VARCHAR(80) NULL DEFAULT NULL,
`Ciudad` VARCHAR(30) NULL DEFAULT NULL,
`Codigo_Postal` CHAR(5) NULL DEFAULT NULL,
`Pais` VARCHAR(30) NULL DEFAULT NULL,
`DNI_CIF` CHAR(9) NULL DEFAULT '',
`Cuenta_Bancaria` VARCHAR(50) NULL DEFAULT NULL,
`Telefono` CHAR(9) NULL DEFAULT NULL,
`Codigo_empleado` CHAR(5) NOT NULL,
`Numero_SS` CHAR(12) NULL,
`Departamento` VARCHAR(30) NULL,
`Rol` VARCHAR(30) NULL,
PRIMARY KEY (`Codigo_empleado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`Provider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Provider` (
`Nombre` VARCHAR(30) NULL,
`Correo` VARCHAR(45) NULL,
`Direccion` VARCHAR(45) NULL,
`Ciudad` VARCHAR(45) NULL,
`Codigo_postal` CHAR(5) NULL,
`Pais` VARCHAR(45) NULL,
`DNI_CIF` CHAR(9) NULL,
`Cuenta_Bancaria` VARCHAR(45) NULL,
`Telefono` CHAR(9) NULL,
`Nombre_proveedor` VARCHAR(30) NULL,
`CUIT` VARCHAR(20) NULL,
`Tipo_recurso` VARCHAR(30) NULL,
`Codigo_Proveedor` CHAR(5) NOT NULL,
PRIMARY KEY (`Codigo_Proveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m7`.`Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Order` (
`Codigo_Compra` CHAR(5) NOT NULL DEFAULT '',
`Estado` INT(11) NULL DEFAULT NULL,
`Precio_Total` FLOAT NULL,
`Impuestos` FLOAT NULL COMMENT ' ',
`Fecha_Pago` DATE NULL,
`Proveedor` CHAR(5) NULL,
`Empleado` CHAR(5) NULL,
INDEX `Empleado_idx` (`Empleado` ASC),
PRIMARY KEY (`Codigo_Compra`),
INDEX `Proveedor_idx` (`Proveedor` ASC),
CONSTRAINT `Empleado`
FOREIGN KEY (`Empleado`)
REFERENCES `m7`.`Employee` (`Codigo_empleado`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `Proveedor`
FOREIGN KEY (`Proveedor`)
REFERENCES `m7`.`Provider` (`Codigo_Proveedor`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`Person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Person` (
`Nombre` VARCHAR(30) NULL DEFAULT NULL,
`Correo` VARCHAR(30) NULL DEFAULT NULL,
`Direccion` VARCHAR(80) NULL DEFAULT NULL,
`Ciudad` VARCHAR(30) NULL DEFAULT NULL,
`Codigo_Postal` CHAR(5) NULL DEFAULT NULL,
`Pais` VARCHAR(30) NULL DEFAULT NULL,
`DNI_CIF` CHAR(9) NOT NULL DEFAULT '',
`Cuenta_Bancaria` VARCHAR(50) NULL DEFAULT NULL,
`Telefono` CHAR(9) NULL DEFAULT NULL,
PRIMARY KEY (`DNI_CIF`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`productos` (
`Nombre_Producto` VARCHAR(40) NULL DEFAULT NULL,
`Codigo_Producto` CHAR(5) NOT NULL DEFAULT '',
`Descripcion_Producto` TEXT NULL DEFAULT NULL,
`Categoria_Producto` VARCHAR(40) NULL DEFAULT NULL,
`Comentarios_Internos` TEXT NULL DEFAULT NULL,
`Precio_Producto` FLOAT NULL DEFAULT NULL,
`Impuestos_Producto` FLOAT NULL DEFAULT NULL,
`Marca` VARCHAR(30) NULL DEFAULT NULL,
`Contenido` VARCHAR(50) NULL DEFAULT NULL,
`Longitud` INT(11) NULL DEFAULT NULL,
`Ancho` INT(11) NULL DEFAULT NULL,
`Peso` INT(11) NULL DEFAULT NULL,
`Alto` INT(11) NULL DEFAULT NULL,
`Garantia` DATE NULL DEFAULT NULL,
`Unidades` INT NULL,
PRIMARY KEY (`Codigo_Producto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`Order_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Order_productos` (
`Codigo_Compra` CHAR(5) NULL DEFAULT NULL,
`Codigo_Producto` CHAR(5) NULL DEFAULT NULL,
`Unidades_Pedidas` INT NULL,
`Unidades_Recibidas` INT NULL,
`Precio_calculado` FLOAT NULL,
`Precio_total` FLOAT NULL,
`Nombre_producto` VARCHAR(45) NULL,
INDEX `Compra_idx` (`Codigo_Compra` ASC),
INDEX `Producto_idx` (`Codigo_Producto` ASC),
CONSTRAINT `Compra`
FOREIGN KEY (`Codigo_Compra`)
REFERENCES `m7`.`Order` (`Codigo_Compra`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `Producto`
FOREIGN KEY (`Codigo_Producto`)
REFERENCES `m7`.`productos` (`Codigo_Producto`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`Customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Customer` (
`Nombre` VARCHAR(30) NULL DEFAULT NULL,
`Correo` VARCHAR(30) NULL DEFAULT NULL,
`Direccion` VARCHAR(80) NULL DEFAULT NULL,
`Ciudad` VARCHAR(30) NULL DEFAULT NULL,
`Codigo_Postal` CHAR(5) NULL DEFAULT NULL,
`Pais` VARCHAR(30) NULL DEFAULT NULL,
`DNI_CIF` CHAR(9) NULL DEFAULT '',
`Cuenta_Bancaria` VARCHAR(50) NULL DEFAULT NULL,
`Telefono` CHAR(9) NULL DEFAULT NULL,
`Codigo_cliente` CHAR(5) NOT NULL,
`Fecha_nacimiento` DATE NULL,
PRIMARY KEY (`Codigo_cliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`Sale`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Sale` (
`Codigo_Venta` CHAR(5) NOT NULL DEFAULT '',
`Precio_Total` FLOAT NULL DEFAULT NULL,
`Impuestos` FLOAT NULL DEFAULT NULL,
`Fecha_Pago` DATE NULL DEFAULT NULL,
`Tipo_Venta` VARCHAR(30) NULL,
`Cliente` CHAR(5) NULL,
`Empleado_Venta` CHAR(5) NULL,
PRIMARY KEY (`Codigo_Venta`),
INDEX `Cliente_idx` (`Cliente` ASC),
INDEX `Empleado_idx` (`Empleado_Venta` ASC),
CONSTRAINT `Empleado`
FOREIGN KEY (`Empleado_Venta`)
REFERENCES `m7`.`Employee` (`Codigo_empleado`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `Cliente`
FOREIGN KEY (`Cliente`)
REFERENCES `m7`.`Customer` (`Codigo_cliente`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `m7`.`Sale_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m7`.`Sale_productos` (
`Codigo_Venta` CHAR(5) NULL DEFAULT NULL,
`Codigo_Producto_Sale` CHAR(5) NULL DEFAULT NULL,
`Unidades` VARCHAR(45) NULL,
`Precio_calculado` FLOAT NULL,
`Precio_total` FLOAT NULL,
`Nombre_producto` VARCHAR(45) NULL,
INDEX `Venta_idx` (`Codigo_Venta` ASC),
INDEX `Producto_idx` (`Codigo_Producto_Sale` ASC),
CONSTRAINT `Venta`
FOREIGN KEY (`Codigo_Venta`)
REFERENCES `m7`.`Sale` (`Codigo_Venta`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `Producto`
FOREIGN KEY (`Codigo_Producto_Sale`)
REFERENCES `m7`.`productos` (`Codigo_Producto`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;*/