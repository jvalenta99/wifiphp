create database sportboerse character set utf8 collate utf8_unicode_ci;
use sportboerse;
show tables;

create table benutzer(
	benutzer_PK int  not null auto_increment primary key,
    todoTxt varchar(100) not null,
    todoIns timestamp not null default current_timestamp,
    todoClose datetime
)engine innodb character set utf8 collate utf8_unicode_ci;