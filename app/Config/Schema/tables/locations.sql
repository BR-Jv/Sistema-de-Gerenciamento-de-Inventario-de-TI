create table "locations" (
	id BIGINT generated always as IDENTITY PRIMARY KEY, 
	name varchar(255) not null unique
);

insert into locations (name) values 
('Administração'),
('Financeiro'),
('Contabilidade'),
('Recursos Humanos'),
('Compras'),
('Logística'),
('Comercial'),
('Vendas'),
('Marketing'),
('Atendimento ao Cliente'),
('Operações'),
('Produção'),
('Engenharia'),
('Qualidade'),
('Jurídico'),
('Diretoria'),
('Presidência');