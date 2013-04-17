create table Producto(
	idProducto int not null auto_increment,
	Nombre varchar(45) not null,
	Precio int not null,
	Presentacion varchar(50),
	PRIMARY KEY(idProducto)
);

create table Lote(
	idLote int not null auto_increment,
	fecha_elaboracion date not null,
	fecha_caducidad date not null,
	PRIMARY KEY (idLote)

);


alter table Producto add foreign key idLote references Lote(idLote);


ALTER TABLE Producto
ADD FOREIGN KEY (idLote)
REFERENCES Lote(idLote);

insert into Producto (Nombre, Precio, Presentacion, idLote)
		values ("Arcoiris",126,"Familiar",1),
				("Choquies",167,"Individual",2);

insert into Lote(fecha_elaboracion, fecha_caducidad)
	values 	("2013-04-04","2013-06-04"),
			("2013-07-04","2013-09-04");

select P.idProducto, P.Nombre, L.idLote, P.Precio, L.fecha_caducidad
from Producto P, Lote L 
where P.idLote = L.idLote;
