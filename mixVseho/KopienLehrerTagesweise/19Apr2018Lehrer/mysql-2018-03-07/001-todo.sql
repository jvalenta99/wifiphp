create database wifitag2 character set utf8 collate utf8_unicode_ci;

use wifitag2;

drop table if exists todo;
create table todo(
	todoId int unsigned not null auto_increment primary key,
    todoTxt varchar(100) not null,
    todoIns timestamp not null default current_timestamp,
    todoClose datetime
)engine innodb character set utf8 collate utf8_unicode_ci;

desc todo;
show table status;

insert into todo (todoTxt) values ('php Variable');
insert into todo (todoTxt) values ('php funktionen');
insert into todo (todoTxt) values ('php Globale');
insert into todo (todoTxt) values ('php Verzeigung');
insert into todo (todoTxt) values ('php Schleifen');

update todo set todoTxt = 'php Variable erledigt', todoClose = now() where todoId = 1;
update todo set todoTxt = 'php funktionen erledigt', todoClose = now() where todoId = 2;

select * from todo;

-- Zeige alle Datensätze die noch offen sind
select todoTxt 
	from todo 
    where todoClose is null;

-- Zeige alle Datensätze die geschlossen in absteigender Reihenfolge
-- und Datum close im Format dd.mm.YYYY HH:ii [date_format() ]

select todoTxt, date_format(todoClose,'%d.%m.%Y %H:%i') 
	from todo 
	where todoClose is not null 
    order by todoClose desc;

