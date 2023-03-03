create database Tienda;
use tienda;

create table usuario(
    idUsuario int not null primary key,
    nombre Varchar (30) not null,
    usuario Varchar (25) not null,
    contraseña password not null,
    privilegios boolean not null,
    Telefono bigint,
    direccion Varchar (50) not null
);

create table producto(
    idProducto int not null primary key,
    nombre Varchar (30) not null,
    descripcion Varchar (150) not null,
    precio float not null 
);

create table carrito(
    
)