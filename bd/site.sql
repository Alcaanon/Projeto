drop table if exists categoria cascade;
create table if not exists categoria(
    id serial primary key,
    nome varchar(50) unique not null,
    criado_em timestamp not null default current_timestamp
);

drop table if exists servico cascade;
create table if not exists servico(
    id serial primary key,
    classe varchar(255) not null,
    titulo varchar(255) not null,
    descricao text not null,
	categoria_id int not null,
    criado_em timestamp not null default current_timestamp,
	foreign key(categoria_id) references categoria(id)
);

drop table if exists blog cascade;
create table if not exists blog(
    id serial primary key,
    classe varchar(255) not null,
    titulo varchar(255) not null,
    descricao text not null,
    nome varchar(30) not null,
    data varchar(50) not null,
    categoria_id int not null,
    criado_em timestamp not null default current_timestamp,
	foreign key(categoria_id) references categoria(id)
);

drop table if exists usuario cascade;
create table if not exists usuario(
    id serial primary key,
    nome varchar(150) not null,
    email varchar(150) not null,
    senha varchar(150) not null
);


insert into servico (classe, titulo, descricao) values
('bi-collection', 'Teste 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.'), 
('bi-building', 'Teste 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.'), 
('bi-toggles2', 'Teste 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.'), 
('bi-toggles2', 'Teste 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.');

insert into blog (classe, titulo, descricao, nome, data) values
('News', 'Blog post title', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Kelly Rowan', 'March 12, 2022 &middot; 6 min read'),
('Media', 'Another blog post title', 'This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the cards content.', 'Josiah Barclay','March 23, 2022 &middot; 4 min read'),
('News', 'The last blog post title is a little bit longer than the others', 'Some more quick example text to build on the card title and make up the bulk of the cards content.', 'Evelyn Martinez', 'April 2, 2022 &middot; 10 min read');
