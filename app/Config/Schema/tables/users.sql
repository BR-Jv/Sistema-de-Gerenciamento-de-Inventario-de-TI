create table users (
	id BIGINT generated always as IDENTITY PRIMARY KEY, 
	user_name varchar(255) not null,
	password varchar(255) not null, 
	role char(3) check (role in ('ADM', 'TEC')), 
	created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
	modified TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);