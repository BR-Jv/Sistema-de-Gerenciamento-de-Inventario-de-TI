create table items (
	id BIGINT generated always as IDENTITY PRIMARY KEY,
	name varchar(255) not null,
	description varchar(255),
	quantity int not null,
	category_id int 
);