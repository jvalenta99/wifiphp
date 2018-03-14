use wifitag4;

drop table if exists demo_innodb;
create table demo_innodb(
	id int unsigned not null auto_increment primary key,
    wert enum('w','m')
)engine = innodb;

drop table if exists demo_myisam;
create table demo_myisam(
	id int unsigned not null auto_increment primary key,
    wert enum('w','m')
)engine = myisam;

show table status;

insert into demo_innodb (wert) values ('m'),('w'),('w'),('p'),('m');
insert into demo_innodb (wert) values ('m');
insert into demo_innodb (wert) values ('w');
insert into demo_innodb (wert) values ('p');

insert into demo_myisam (wert) values ('m'),('w'),('w'),('p'),('m');

select * from demo_innodb;
select * from demo_myisam;

drop table if exists person;
create table person(
	id int unsigned not null auto_increment primary key,
    vorname varchar(100) not null
)engine = innodb;

insert into person (vorname) values ('Peter'),('Maria'),('Marta');

select * from person;

start transaction;
	update person set vorname='Rene' where id = 1;
savepoint punkt1vonpeter;
	update person set vorname='Lisa' where id = 3;
rollback to punkt1vonpeter;
commit;
rollback;



