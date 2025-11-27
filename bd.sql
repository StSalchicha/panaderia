-- hola --
-- para los tipos de pan --
create table categoria (
	id_cat serial primary key,
	nombre varchar not null unique,
	descripcion varchar
);

-- para los panes xd --
create table pan (
	id_pan serial primary key,
	nombre varchar not null,
	descripcion varchar,
	precio decimal(10,2),
	stock int default 0,

	id_cat int,
	constraint fk_cat
		foreign key (id_cat)
		references categoria(id_cat)
		-- por si quiero borrar una categoria; no se borre el pan --
		on delete set null
);

insert into categoria (nombre) values ('Pan Dulce'), ('Pan Salado'), ('Postre');

update categoria
set descripcion = 'Panes caracterizados por su sabor dulce, a menudo con cubiertas o rellenos.'
where nombre = 'Pan Dulce';

update categoria
set descripcion = 'Panes de sabor neutro o salado, ideales para acompañar comidas o hacer sándwiches.'
where nombre = 'Pan Salado';

update categoria
set descripcion = 'Opciones dulces más elaboradas como pasteles, tartas, flanes y galletas.'
where nombre = 'Postre';

