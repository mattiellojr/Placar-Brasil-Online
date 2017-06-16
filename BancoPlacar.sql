create database placarBrasilBD;

use placarbrasilbd;

create table organizador(
	nomecompleto	varchar(60),
    email			varchar(60),
    datanascimento	varchar(10),
    funcao			varchar(20),
    primary key(nomecompleto)
);

create table time(
	nome		varchar(20),
    tecnico		varchar(20),
    primary key(nome)
);

create table jogador(
	numero		integer,
    apelido		varchar(20),
    nomecompleto	varchar(60),
    datanascimento	varchar(10),
    posicao			varchar(20),
    time		varchar(20),
    primary key(numero,time),
    foreign key(time) references time(nome)
);

create table jogo(
	numero		integer not null auto_increment,
    data		varchar(10),
    local		varchar(30),
    juiz		varchar(30),
    timeCasa	varchar(20),
    timeFora	varchar(20),
    golsCasa	int,
    golsFora	int,
    primary key(numero),
    foreign key(timeCasa) references Time(nome),
    foreign key(timeFora) references Time(nome)
);
