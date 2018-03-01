use wifi;

drop table if exists mitarbeiter;
create table mitarbeiter (
	id int unsigned not null auto_increment primary key,
	name varchar(80) not null,
    gehalt int unsigned 
)engine InnoDB character set utf8 collate utf8_unicode_ci;

insert into mitarbeiter (name,gehalt) values ('Peter',1500);
insert into mitarbeiter (name,gehalt) values ('Peter',1600);
insert into mitarbeiter (name,gehalt) values ('Peter',1700);
insert into mitarbeiter (name,gehalt) values ('andrzej',null);
insert into mitarbeiter (name,gehalt) values ('Josef',null);
insert into mitarbeiter (name,gehalt) values ('John',2300);
insert into mitarbeiter (name,gehalt) values ('pepi',2400);
insert into mitarbeiter (name,gehalt) values ('ulrich',2700);
insert into mitarbeiter (name,gehalt) values ('aöfpms',2800);
insert into mitarbeiter (name,gehalt) values ('bigboss',170000);


show character set;
show collation;

desc mitarbeiter;
show table status;

select * from mitarbeiter;











