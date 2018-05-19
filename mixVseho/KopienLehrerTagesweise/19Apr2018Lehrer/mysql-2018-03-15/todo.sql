create database wifitag5 character set utf8 collate utf8_unicode_ci;

use wifitag5;

drop table if exists todos;
drop table if exists users;
drop table if exists statis;

create table users(
	user_pk int unsigned not null auto_increment primary key,
    user_vn varchar(100) not null, -- vn vorname
    user_nn varchar(100) not null -- nn nachname
)engine=innodb;

create table statis(
	stat_pk int unsigned not null auto_increment primary key,
    stat_text varchar(20) not null 
)engine=innodb;

create table todos(
	todo_pk int unsigned not null auto_increment primary key,
	todo_datum timestamp not null default current_timestamp,
    todo_prio enum('1','2','3','4','5') not null default 3, -- 5 prio hoch, 1 prio niedrig 
    todo_text varchar(255) not null,
    user_fk int unsigned not null,
    stat_fk int unsigned not null,
    constraint user_fkx foreign key (user_fk) references users (user_pk)
    on delete restrict
    on update cascade,
    constraint stat_fkx foreign key (stat_fk) references statis (stat_pk)
    on delete restrict
    on update cascade
)engine=innodb;

insert into statis (stat_text) values ('offen'), ('in Bearbeitung'), ('erledigt');

select user_vn, user_nn from users where user_pk = 1;