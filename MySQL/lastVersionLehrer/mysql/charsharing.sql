-- erstellen der Tabellen 


use carsharing;

drop table if exists verleih;
drop table if exists vormerkung;
drop table if exists auto;
drop table if exists mieter;

create table mieter(
	mieterId int unsigned not null auto_increment primary key,
    vorname varchar(100) not null,
    nachname varchar(100) not null,
    adresse varchar(100) not null,
    ausleihanzahl int unsigned default 0,
    eintrittdatum date not null,
    austrittdatum date
)engine=innoDB character set = utf8 collate=utf8_unicode_ci;


create table auto(
	autoId int unsigned not null auto_increment primary key,
    marke varchar(100) not null,
    typ varchar(100),
    kategorie enum('p','k','t') not null, -- p = pkw k= kombi t=transporter
    verleihanzahl int unsigned default 0,
    leihdauer int unsigned default 1
)engine=innoDB character set = utf8 collate=utf8_unicode_ci;


create table vormerkung(
	mieterId int unsigned not null,
    autoId int unsigned not null,
    datum date not null,
    primary key(mieterId, autoId),
    foreign key (mieterId) references mieter (mieterId)
    on delete cascade
    on update cascade,
    foreign key (autoId) references auto (autoId)
    on delete cascade
    on update cascade
)engine innoDB;



create table verleih(
	mieterId int unsigned not null,
    autoId int unsigned not null,
    ausleihdatum timestamp not null default current_timestamp,
    leihdauer int unsigned default 1,
    primary key(mieterId, autoId),
    foreign key (mieterId) references mieter (mieterId)
    on delete cascade
    on update cascade,
    foreign key (autoId) references auto (autoId)
    on delete cascade
    on update cascade
)engine innoDB;



