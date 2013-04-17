CREATE DATABASE cookies;

USE cookies;

CREATE TABLE Empleado(
	CURP		varchar(18) PRIMARY KEY,
	Nombre		varchar(100),
	Area		int,
	Contrasena	varchar(20),
	Direccion 	varchar(100)
);
CREATE TABLE Producto(
	idProducto		int PRIMARY KEY AUTO_INCREMENT,
	Nombre		varchar(100),
	Precio		float,
);

CREATE TABLE Receta(
  idProducto    int NOT NULL,
  idMateriaPrima  int NOT NULL,
  Cantidad    float,
  primary key(idProducto,idMateriaPrima)
);

CREATE TABLE Area(
	id int PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(20),
	path varchar(20)
);

CREATE TABLE MateriaPrima(
	idMateriaPrima int PRIMARY KEY AUTO_INCREMENT,
	Nombre varchar(20),
	Unidad varchar(20)
);


ALTER TABLE Receta 
ADD CONSTRAINT receta_Ingrediente 
FOREIGN KEY (idMateriaPrima) 
REFERENCES MateriaPrima (idMateriaPrima) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE Receta 
ADD CONSTRAINT receta_Producto
FOREIGN KEY (idProducto) 
REFERENCES Producto (idProducto) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

INSERT INTO Area VALUES( NULL ,"Administración","administrador");
