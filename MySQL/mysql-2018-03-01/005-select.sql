use wifi;

drop table if exists wetter;
create table wetter
(
	id int unsigned not null auto_increment primary key,
    datum date not null,
    temp tinyint not null,
    ort varchar(50) not null
);

insert into wetter (datum, temp, ort) values('2018-03-01',-11,'Wien');
insert into wetter (datum, temp, ort) values('2018-03-01',-24,'Bregenz');
insert into wetter (datum, temp, ort) values('01-03-2018',-24,'Bregenz');

select * from wetter;

drop table if exists wetter2;
create table wetter2
(
	id int unsigned not null auto_increment primary key,
    datum date not null,
    temp tinyint unsigned not null,
    ort varchar(50) not null
);
insert into wetter2 (datum, temp, ort) values('2018-03-01',-24,'Bregenz');
insert into wetter2 (datum, temp, ort) values('2018-07-01',24,'Bregenz');

select * from wetter2;

drop table if exists wetter3;
create table wetter3
(
	id int unsigned not null auto_increment primary key,
    datum date not null,
    temp tinyint unsigned,
    ort varchar(50) not null
);

insert into wetter3 (datum, temp, ort) values('2018-03-01',-24,'Bregenz');


create table protokoll(
	id int unsigned not null auto_increment primary key,
    aktion varchar(30),
    instime timestamp not null default current_timestamp,
    uptime timestamp null on update current_timestamp
);

insert into protokoll (aktion) values('erster test');

select * from protokoll;
update protokoll set aktion = 'update' where id=1;

