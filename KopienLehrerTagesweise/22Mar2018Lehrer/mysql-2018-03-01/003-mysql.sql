use wifi;

drop table if exists mitarbeiter;
create table mitarbeiter (
	id int unsigned not null auto_increment,
    name varchar(80) not null,
    gehalt int unsigned null,
    primary key (id)
)engine InnoDB character set utf8 collate utf8_unicode_ci;

show character set;
show collation;
show table status;

desc mitarbeiter;

drop table if exists mitarbeiter2;
create table mitarbeiter2 (
	id int unsigned not null auto_increment primary key,
    name varchar(80) not null,
    gehalt int unsigned
);

desc mitarbeiter;
desc mitarbeiter2;

insert into mitarbeiter (name,gehalt) values ('Peter',2000);

insert into mitarbeiter (name,gehalt) values 
('Peter',2500),
('Judith',3000),
('Thomas',4000),
('Marion',2000),
('Barbara',3500),
('Elli',1800),
('Wolfgang',3000)
;

insert into mitarbeiter (name,gehalt) values ('Rene',null);

insert into mitarbeiter (name) values 
('Maria'),
('Anton');

select * from mitarbeiter;
