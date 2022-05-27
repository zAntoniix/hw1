CREATE TABLE users (
    id integer primary key auto_increment,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    username varchar(16) not null unique,
	email varchar(255) not null unique,
    password varchar(255) not null
) Engine = InnoDB;

create table contents (
	id int primary key auto_increment,
	titolo varchar(255),
    img varchar(255),
    descrizione varchar(255)
) Engine = InnoDB;

create table preferiti (
	prefid integer primary key auto_increment,
	userid integer,
    musicid varchar(255),
    img varchar(255),
    titolo varchar(255),
    artista varchar(255),
    index idx_userid(userid),
    foreign key(userid) references users(id),
    unique(userid, musicid)
) Engine = InnoDB;

insert into contents(titolo, img, descrizione) values ("Strumenti", "images/strumenti.png", "Disponiamo di tutti gli strumenti musicali per ogni tipo di necessità e richiesta");
insert into contents(titolo, img, descrizione) values ("Registrazione", "images/registrazione.jpg", "Usiamo la tecnologia più avanzata per registrare in modo cristallino la vostra musica");
insert into contents(titolo, img, descrizione) values ("Consulenza", "images/consulenza.jpg", "Ti aiuteremo nella scelta delle opzioni milgiori per valorizzare e migliorare il tuo prodotto");

select * from users;
select * from contents;
select * from preferiti;