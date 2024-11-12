create database sistema_login;

use sistema_login;

create table cadastros(
	id int auto_increment primary key,
    usuario varchar(255) not null,
    senha varchar(255) not null
);
