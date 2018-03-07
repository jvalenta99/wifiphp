use wifitag2;

drop table if exists bundesland;
create table bundesland(
	bundId int unsigned not null auto_increment primary key,
    bundName varchar(100) not null,
    counShort char(2)
)engine InnoDB character set utf8 collate utf8_unicode_ci;

drop table if exists kunden;
create table kunden(
	kundId int unsigned not null auto_increment primary key,
    kundName varchar(100) not null,
    bundId int unsigned
    -- , constraint kundIdx foreign key (bundId) references bundesland (bundId)
)engine InnoDB character set utf8 collate utf8_unicode_ci;

--
alter table kunden add 
	constraint kundIdx foreign key (bundId) references bundesland (bundId)    
    ;

alter table countries ENGINE = InnoDB;

alter table bundesland add 
	constraint bundIdx foreign key (counShort) references countries (short)
    ;
    
alter table bundesland add
	constraint bundIdx foreign key (counShort) references countries (short)
    on delete set null
    on update cascade
    ;

show table status;
desc countries ;


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






