create table movements (
	id BIGINT generated always as IDENTITY PRIMARY KEY, 
	item_id int, 
	user_id int,
	location_id int,
	type char(3) check (type in ('ENT', 'SAI')),
	quantity int not null, 
	notes varchar(255), 
	created TIMESTAMP DEFAULT NULL
);