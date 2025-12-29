create table users (
	id BIGINT generated always as IDENTITY PRIMARY KEY, 
	username varchar(50) not null,
	password varchar(255) not null, 
	role char(3) check (role in ('ADM', 'TEC')) default 'TEC', 
	created date DEFAULT NULL,
	modified date DEFAULT NULL
);