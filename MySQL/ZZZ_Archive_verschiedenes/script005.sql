use wifi;

drop table if exists wetter;
create table wetter (
	id int unsigned not null auto_increment primary key,
    datum date,
    temp tinyint,
	ort varchar(80) not null
    
)engine InnoDB character set utf8 collate utf8_unicode_ci;

insert into wetter (datum, temp, ort) values ('2018-03-01', -11, 'Wien');

create table protokoll(
	id int unsigned not null auto_increment primary key,
    aktion varchar(30),
    instime timestamp not null default current_timestamp,
    uptime timestamp null on update current_timestamp
);

insert into protokoll (aktion) values ('erster test');
update protokoll set aktion='update' where id=1;

select * from protokoll;

select * from wetter;
desc wetter;