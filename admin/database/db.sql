create database POS;

use POS;


create table admin(
	id int,
	firstname varchar(30),
	lastname varchar(30),
	username varchar(100), 
	password varchar(200),
	primary key(id, username, password)
	);
create table category(
	ID varchar(20),
	Name varchar(30),
	Public datetime,
	primary key(ID)
	);
create table products(
	ID varchar(100),
	Name varchar(100),
	Size varchar(10),
	Color varchar(20),
	Price double,
	Numbers int, 
	Public datetime,
	Type varchar(20),
	image text,
	primary key(ID),
	foreign key(Type) references category(ID)
	);
create table orders(
	ordersID int primary key auto_increment,
	ID varchar(100),
	Quality int,
	Price double
);