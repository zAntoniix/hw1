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

create table inEvidenza (
	id integer primary key,
	musicid varchar(255),
    img varchar(255),
    titolo varchar(255),
    artista varchar(255)
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

insert into inEvidenza values ("1","4EC028SvtlC25iHQSG2OIa", "https://i.scdn.co/image/ab67616d00001e02417f2528a3588af33775220f", "Shakerando", "Rhove");
insert into inEvidenza values ("2", "1v9ABGLSpdhPDEWyQ10NFD", "https://i.scdn.co/image/ab67616d00001e02b34574ebc559227370cf55ac", "I love you baby", "Jovanotti");
insert into inEvidenza values ("3", "1ZMGp9MTXbtAPvcKa0U3zS", "https://i.scdn.co/image/ab67616d00001e0240c172c54696d8e6028c019f", "Brividi", "Mahmood");
insert into inEvidenza values ("4", "6t0ovtgnoAq9orbnisSzZp", "https://i.scdn.co/image/ab67616d00001e02b39f1cccb454cd361da50fdb", "Propaganda", "Fabri Fibra");
insert into inEvidenza values ("5", "3yWHQ4n4ARLDfYTuT2NhnN", "https://i.scdn.co/image/ab67616d00001e025a25f715856db0ed1e5593cd", "BABY GODDAMN", "Tananai");
insert into inEvidenza values ("6", "5KkcthkQDnlhQN0WhO8DsM", "https://i.scdn.co/image/ab67616d00001e02eceb3a39122bf2fbd5893794", "Bagno a mezzanotte", "Elodie");

select * from users;
select * from contents;
select * from inEvidenza;
select * from preferiti;
