create database wifitag2 character set utf8 collate utf8_unicode_ci;
use wifitag2;



drop table if exists todo;
create table todo (
	todoId int unsigned not null auto_increment primary key,
    todoTxt varchar(100),
    todoIns timestamp not null default current_timestamp,
    todoClose datetime
    
)engine InnoDB character set utf8 collate utf8_unicode_ci;

desc todo;
show table status;

insert into todo (todoTxt) values ('Bier kaufen');
insert into todo (todoTxt) values ('vodka kaufen');
insert into todo (todoTxt) values ('wasser kaufen');
insert into todo (todoTxt) values ('wein kaufen');
insert into todo (todoTxt) values ('saft kaufen');

update todo set todoClose = now() where todoId=1;
update todo set todoClose = now() where todoId=2;

drop table todo;

desc todo;
select * from todo;
select * from todo where todoClose is  null;

select todoId,todoTxt,todoIns,date_format(todoClose, '%d.%m.%Y %H:%i') as datum
 from todo 
 where todoClose is not null 
 order by todoClose desc;
 
 drop table person;
 create table person (
	persId int unsigned not null auto_increment primary key,
    persVn varchar(100),
    persGehalt int unsigned,
    geschlecht enum('m','w')
       
)engine InnoDB character set utf8 collate utf8_unicode_ci;

insert into person (persVn, geschlecht, persGehalt) values ('peter','m',3000);
insert into person (persVn, geschlecht, persGehalt) values ('Martin','m',3000);
insert into person (persVn, geschlecht, persGehalt) values ('Anton','m',2500);
insert into person (persVn, geschlecht, persGehalt) values ('Maria','w',3000);
insert into person (persVn, geschlecht, persGehalt) values ('Marta','m',2800);
insert into person (persVn, geschlecht, persGehalt) values ('Sabine','m',1800);
insert into person (persVn, geschlecht, persGehalt) values ('Rene','m',1800);
insert into person (persVn, geschlecht, persGehalt) values ('Thomas','m',2100);
insert into person (persVn, geschlecht, persGehalt) values ('Tone','m',2600);
insert into person (persVn, geschlecht, persGehalt) values ('Norbert','m',4000);

insert into person (persVn, geschlecht, persGehalt) values ('Norbert','n',4000);

select * from person 
	where geschlecht = 'm'
	order by persVn;
    
select count(*) as anzahl
	from person
    where geschlecht='w';
    
select min(persGehalt) as mindestgehalt
	from person;
    
select max(persGehalt) as maximalgehalt
	from person;
    
select format(avg(persGehalt),2,'de_DE') as maximalgehalt
	from person;
    
select geschlecht, min(persGehalt) from person group by geschlecht;

select geschlecht, avg(persGehalt) 
from person 
group by geschlecht 
having avg(persGehalt)>2700
order by geschlecht;

select * from person;





