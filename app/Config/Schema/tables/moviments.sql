create table movements (
	id BIGINT generated always as IDENTITY PRIMARY KEY, 
	type char(3) check (type in ('ENT', 'TRA', 'SAI')),
	quantity int not null 
	notes varchar(255) 
	created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
	item_id int, 
	user_id int,
);