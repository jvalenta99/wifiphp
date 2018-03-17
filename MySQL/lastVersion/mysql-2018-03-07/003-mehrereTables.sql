use wifitag2;

-- drop zeuerst kinder dann die eltern
drop table if exists kunden;
drop table if exists bundesland;
drop table if exists countries;

-- import countries dann die kinder anlegen
-- create zuerst die Eltern dann die Kinder
create table bundesland(
	bundId int unsigned not null auto_increment primary key,
    bundName varchar(100) not null,
    counShort char(2)
)engine InnoDB character set utf8 collate utf8_unicode_ci;


create table kunden(
	kundId int unsigned not null auto_increment primary key,
    kundName varchar(100) not null,
    bundId int unsigned
    -- , constraint kundIdx foreign key (bundId) references bundesland (bundId)
)engine InnoDB character set utf8 collate utf8_unicode_ci;

--
alter table kunden add 
	constraint kundIdx foreign key (bundId) references bundesland (bundId) 
    on delete cascade
    on update cascade
    ;
    

alter table kunden drop  foreign key kundIdx;


insert into bundesland (bundName,counShort) values
( 'Burgenland','AT'),
( 'Kärnten', 'AT'),
( 'Niederösterreich', 'AT'),
( 'Oberösterreich', 'AT'),
( 'Salzburg', 'AT'),
( 'Steiermark', 'AT'),
( 'Tirol', 'AT'),
( 'Vorarlberg', 'At'),
( 'Wien','AT'),
( 'Zürich','CH'),
( 'St. Gallen','CH');

insert into kunden (kundName,bundId) values
( 'Peter',8),
( 'Maria', 9),
( 'Sophia', 10),
( 'Thomas', 1);

insert into kunden (kundName) values
( 'Lina'),
( 'Rene');

select kundName, bundName 
from kunden
join bundesland on (kunden.bundId = bundesland.bundId);

select b.bundId, kundName, bundName 
from kunden k
join bundesland b on (k.bundId = b.bundId);

select b.bundId, kundName, bundName 
from kunden k right join bundesland b on (k.bundId = b.bundId);

select b.bundId, kundName, bundName , de
from kunden k left join 
bundesland b on (k.bundId = b.bundId)
left join countries on (short= b.counShort)
;

insert into kunden (kundName,bundId) values('mustermann',1000);
delete from kunden where kundId = 7;

select * from bundesland;

select * from kunden;

update bundesland set bundId = 50 where bundId = 8;
delete from bundesland where bundId = 50;

alter table countries engine = innodb;

show table status;

alter table bundesland 
	drop foreign key bundesland_ibfk_1;
    
alter table bundesland 
	add constraint counfkx foreign key (counShort) references countries(short)
    on delete set null
    on update cascade;

desc bundesland;

update countries set short = 'OT' where short = 'AT';

SELECT 
  TABLE_NAME,COLUMN_NAME,CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
FROM
  INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
  REFERENCED_TABLE_SCHEMA = 'wifitag2' AND
  REFERENCED_TABLE_NAME = 'bundesland';

select * from bundesland;


