
-- BASICS DATABASE CREATE TABLE CREATE  DELETE ++++++++++++++++
show databases;

create database wifi;
drop database if exists wifi;

show character set;
show collation;

drop database if exists wifi;
create database wifi character set latin1 collate latin1_german2_ci;

use wifi;

create table teilnehmer( 
	vn varchar(80) 
);
-- zeige alle Tabellen
show tables;
-- zeige definition der tabelle
desc teilnehmer;

-- ENDE TEIL 1 **************************************************************

-- auswahl der DB
use wifi;

-- tabelle teilnehmer soll verändert werden
alter table teilnehmer change vn vn varchar(80) not null;

-- tabelle teilnehmer löschen
drop table if exists teilnehmer;
create table teilnehmer(
	id int unsigned not null auto_increment primary key,
    vn varchar(80) not null
);

desc teilnehmer;

-- daten in tabelle speichern
insert into teilnehmer (id,vn) values(10,'Peter');
insert into teilnehmer (vn) values( 'Maria');
insert into teilnehmer (id,vn) values( 11,'Anton');
insert into teilnehmer (vn) values('');
insert into teilnehmer values();

-- daten aus der tabelle teilnehmer lesen
select * from teilnehmer;
SELECT * FROM teilnehmer;

-- löschen der datensätze
delete from teilnehmer where id=11;

-- ENDE 2. TEIL *********************************************************

use wifi;

drop table if exists mitarbeiter;
create table mitarbeiter (
	id int unsigned not null auto_increment,
    name varchar(80) not null,
    gehalt int unsigned null,
    primary key (id)
)engine InnoDB character set utf8 collate utf8_unicode_ci;

show character set;
show collation;
show table status;

desc mitarbeiter;

drop table if exists mitarbeiter2;
create table mitarbeiter2 (
	id int unsigned not null auto_increment primary key,
    name varchar(80) not null,
    gehalt int unsigned
);

desc mitarbeiter;
desc mitarbeiter2;

insert into mitarbeiter (name,gehalt) values ('Peter',2000);

insert into mitarbeiter (name,gehalt) values 
('Peter',2500),
('Judith',3000),
('Thomas',4000),
('Marion',2000),
('Barbara',3500),
('Elli',1800),
('Wolfgang',3000)
;

insert into mitarbeiter (name,gehalt) values ('Rene',null);

insert into mitarbeiter (name) values 
('Maria'),
('Anton');

select * from mitarbeiter;

-- ENDE 3. TEIL ****************************************************

use wifi;

-- Vergleichsoperatoren

select name, gehalt from mitarbeiter where gehalt = 2000;
select name, gehalt from mitarbeiter where gehalt <= 2000;
select name, gehalt from mitarbeiter where gehalt >= 2000;
select name, gehalt from mitarbeiter where gehalt <> 2000;

select name, gehalt from mitarbeiter where gehalt is null;
select name, gehalt from mitarbeiter where gehalt is not null;

/*
WHERE CustomerName LIKE 'a%'	Finds any values that starts with "a"
WHERE CustomerName LIKE '%a'	Finds any values that ends with "a"
WHERE CustomerName LIKE '%or%'	Finds any values that have "or" in any position
WHERE CustomerName LIKE '_r%'	Finds any values that have "r" in the second position
WHERE CustomerName LIKE 'a_%_%'	Finds any values that starts with "a" and are at least 3 characters in length
WHERE ContactName LIKE 'a%o'	Finds any values that starts with "a" and ends with "o"
*/

select name, gehalt from mitarbeiter where name > 'P';

select name, gehalt from mitarbeiter where name like 'p%';

select name, gehalt from mitarbeiter where name like '%p%';

select name, gehalt from mitarbeiter where name like '_e%';

select name, gehalt from mitarbeiter where gehalt between 2000 and 3000;

select name, gehalt from mitarbeiter where name in ('peter','wolfgang','maria');

select name, gehalt from mitarbeiter where 
name = 'peter' or gehalt >= 2000 and gehalt <=3000;

select name, gehalt from mitarbeiter where 
name = 'peter' or ( gehalt >= 2000 and gehalt <=3000 );

select name, gehalt from mitarbeiter where 
( name = 'peter' or gehalt >= 2000 ) and gehalt <=3000;

update mitarbeiter set gehalt = 4000 where id=2;
delete from mitarbeiter where id=12;
update mitarbeiter set gehalt = 4500, name='Hans' where id=14;
update mitarbeiter set gehalt = gehalt+500 where id = 15;

select * from mitarbeiter order by gehalt;

select * from mitarbeiter where gehalt>2500 order by name desc;
select * from mitarbeiter order by gehalt, name desc;

select * from mitarbeiter order by gehalt, name limit 3;

select * from mitarbeiter order by gehalt, name limit 4,2;

-- ENDE TEIL 4 ******************************************************************

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

-- wetter2 hat temp mit unsigned!
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
	--instime wird bei neueintrag auf gesetzt
    instime timestamp not null default current_timestamp,
	--uptime wird bei neueintrag auf neuen timestamp gesetzt, kann null sein
    uptime timestamp null on update current_timestamp
);

insert into protokoll (aktion) values('erster test');

select * from protokoll;
update protokoll set aktion = 'update' where id=1;

-- ENDE TEIL 5, ENDE TAG 1 **********************************************************

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

-- ENDE TEIL 1 (tag2)***************************************************************

use wifitag2;

-- löscht die Tabelle person falls vorhanden
drop table if exists person;
-- erzeugt die Tabelle person
create table person(
	persId int unsigned not null auto_increment primary key,
    persVn varchar(100),
    persGehalt int unsigned,
    geschlecht enum('w','m')
);


-- 10 DS
insert into person (persVn,geschlecht,persGehalt) values ('Peter','m','3000');
insert into person (persVn,geschlecht,persGehalt) values ('Martin','m','3000');
insert into person (persVn,geschlecht,persGehalt) values ('Anton','m','2500');
insert into person (persVn,geschlecht,persGehalt) values ('Maria','w','3000');
insert into person (persVn,geschlecht,persGehalt) values ('Marta','w','2800');
insert into person (persVn,geschlecht,persGehalt) values ('Sabine','w','1800');
insert into person (persVn,geschlecht,persGehalt) values ('Rene','m','1800');
insert into person (persVn,geschlecht,persGehalt) values ('Thomas','m','2100');
insert into person (persVn,geschlecht,persGehalt) values ('Tone','m','2600');
insert into person (persVn,geschlecht,persGehalt) values ('Norbert','m','4000');

-- Versuche einen DS mit geschlecht enspricht N zu speichern
insert into person (persVn,geschlecht) values ('Peter','N');

-- Zeige alle DS geschlecht m sortiert nach vorname
select * from person where geschlecht = 'm' order by persVn;

-- Wie viel Frauen gibt es in der Tabelle person
select count(*) anzahl
	from person
    where geschlecht = 'm';
    
-- Zeige den höchste „gehalt“
select max(persGehalt) 
	from person;
    
-- Zeige den niedrigsten „gehalt“
select min(persGehalt) 
	from person;
    
-- durchschnittlichen von „gehalt“ gehlat -> fromatiert
select format(avg(persGehalt),2,'de_DE') 
	from person;
    
-- Summe von „gehalt“ gehlat -> fromatiert
select format(sum(persGehalt),2,'de_DE') 
	from person;
    
select persVn, geschlecht, avg(persGehalt) 
from person 
group by persVn, geschlecht
order by geschlecht;

select geschlecht, avg(persGehalt) 
from person 
group by geschlecht 
having avg(persGehalt) > 2600
order by geschlecht;



select * from person;


-- ENDE TEIL 2 (tag2)***************************************************************

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


-- ENDE TEIL 3 (tag2)***************************************************************

use wifitag2;

show tables;

desc zufallszahlen;

select  count(*) from zufallszahlen where zahl = 10000;

drop index rndvalue on zufallszahlen;

create index zahlidx on zufallszahlen(zahl);

-- ENDE TEIL 4 (tag2)***************************************************************

-- Thema foreign keys
create database wifitag3 charset utf8 collate utf8_unicode_ci;
use wifitag3;

drop table if exists Kunden;
drop table if exists Ort;

create table Ort ( 
	ortId INT unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ortName varchar(100) not null
) engine InnoDB character set utf8 collate utf8_unicode_ci;
                                
                                
insert into Ort (ortName) values ('Wien'),('St.Pölten');
select *from Ort;

create table Kunden(
	kundId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	kundName varchar(100) not null ,
	ortId int unsigned,
    constraint orfkx foreign key (ortId) references Ort (ortId)
    on delete cascade -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
) engine InnoDB character set utf8 collate utf8_unicode_ci;
                        
                        
	   insert into Kunden (kundName, ortId) values ('Peter',1);
       insert into Kunden (kundName, ortId) values ('Martin',2);
       insert into Kunden (kundName, ortId) values ('Anton', 1);
       
       
       insert into Kunden (kundName, ortId) values ('Maria', null );
       insert into Kunden (kundName, ortId) values ('Martin', null );
       insert into Kunden (kundName, ortId) values ('Marta',  20);
       
       select * from Kunden;
       
       
       show table status;
       
       select kundName, ortName
       from Kunden 
       join Ort on (Kunden.ortId = Ort.ortId);
       
       
       update Ort set ortId = 1 where ortId = 10;
       delete from Ort where ortId = 1;
       

-- ENDE TEIL 1 (tag 3) ***************************************************************

--  TEIL 2 (tag 3) file_08.03_MySQL ***************************************************************
create database wifitag3 charset utf8 collate utf8_unicode_ci;
use wifitag3;

drop table if exists Kunden;
drop table if exists Ort;

create table Ort ( 
	ortId INT unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ortName varchar(100) not null
) engine InnoDB character set utf8 collate utf8_unicode_ci;
                                
                                
insert into Ort (ortName) values ('Wien'),('St.Pölten');
select *from Ort;

create table Kunden(
	kundId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	kundName varchar(100) not null ,
	ortId int unsigned,
    constraint orfkx foreign key (ortId) references Ort (ortId)
    on delete cascade -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
) engine InnoDB character set utf8 collate utf8_unicode_ci;
                        
                        
	   insert into Kunden (kundName, ortId) values ('Peter',1);
       insert into Kunden (kundName, ortId) values ('Martin',2);
       insert into Kunden (kundName, ortId) values ('Anton', 1);
       
       
       insert into Kunden (kundName, ortId) values ('Maria', null );
       insert into Kunden (kundName, ortId) values ('Martin', null );
       insert into Kunden (kundName, ortId) values ('Marta',  20);
       
       select * from Kunden;
       
       
       show table status;
       
       select kundName, ortName
       from Kunden 
       join Ort on (Kunden.ortId = Ort.ortId);
       
       
       update Ort set ortId = 1 where ortId = 10;
       delete from Ort where ortId = 1;
       
--  ENDE TEIL 2 (tag 3) file8.3.usw***************************************************************

-- TEIL 1 (tag 4) file 003***************************************************************

use carsharing;

select * from auto;
select * from mieter;
select * from verleih;

-- Erstelle eine alphabetische sortierte Liste der Marken und dazugehörigen Typen. ( distinct )
select distinct marke, typ from auto order by marke, typ;
select distinct marke, typ from auto where typ is not null order by marke, typ;

-- Wieviel Marken gibt es
select count( distinct marke ) from auto;

-- Welche ausleihbaren Autos wurden bisher noch nicht ausgeliehen
select autoid, marke, typ 
	from auto 
    where leihdauer > 0 and verleihanzahl = 0 
    order by marke, typ;

-- Welche Marken in der Kategorie p und k können ausgeliehen werden
select distinct marke, typ, kategorie
	from auto
    where ( kategorie = 'p' or  kategorie = 'k' ) and leihdauer > 0;

select distinct marke, typ, kategorie
	from auto
    where kategorie in('p','k') and leihdauer > 0;

-- Welche Marke hat keinen Typ
select autoId, marke, kategorie
	from auto
    where typ is null;
    
-- Ranking von den am häufigsten verliehenen Autos
select marke, sum( verleihanzahl) anzahl
	from auto
    group by marke
    order by anzahl desc;

-- Ranking von den am häufigsten verliehenen Auto Typen
select marke, typ, sum( verleihanzahl) anzahl
	from auto
    group by marke, typ
    order by anzahl desc;
    
-- Welche Auto Typen wurden mehr als 4 mal  ausgeliehen
select marke, typ, sum( verleihanzahl) anzahl
	from auto
    group by marke, typ
    having ( sum( verleihanzahl) > 4 )
    order by anzahl desc;
    

-- Welcher Mieter hat aktuell welches Auto ausgeliehen
select m.vorname, m.nachname , a.marke, a.typ
	from mieter m
    join verleih v on ( m.mieterId = v.mieterId)
    join auto a on ( a.autoId = v.autoId);


-- Wieviel Autos hat ein Mieter gerade ausgeliehen
select  m.vorname, m.nachname, count(m.mieterId) anzahl
	from mieter m
    join verleih v on ( m.mieterId = v.mieterId)
    group by m.mieterId, m.vorname, m.nachname;
    
 select count(*) from verleih;   

update mieter set vorname = 'Lina', nachname='Mayer' where mieterId = 2;
select * from mieter;


-- Wieviel Prozent der Autos sind zur Zeit ausgeliehen
select count(autoId) from verleih;
select count(autoId) from auto where leihdauer > 0;

-- Prozent: anzahl aus Verleih / anzahl der autos * 100
select ( count(v.autoId) / count(a.autoId) * 100 ) as prozent
	from auto a
    left join verleih v on ( a.autoId = v.autoId)
    where a.leihdauer > 0;
    
select format(( count(v.autoId) / count(a.autoId) * 100 ), 2, 'de_DE') as prozent
	from auto a
    left join verleih v on ( a.autoId = v.autoId)
    where a.leihdauer > 0;

select marke, typ, ausleihdatum
	from auto a
    left join verleih v on ( a.autoId = v.autoId)
    where a.leihdauer > 0;


-- ENDE TEIL 1 (tag 4) file 003***************************************************************

-- TEIL 2 (tag 4) file 004***************************************************************
use carsharing;

select * from verleih;

-- Bei wieviel Autos ist die Leihfrist überschritten (datediff)
select count(*) from verleih where datediff(now(),ausleihdatum) > leihdauer;

-- Bei welchen Autos ist die Leihfrist um wieviel Tage überschritten
select (datediff(now(),ausleihdatum) - verleih.leihdauer) as tage, marke, typ, vorname, nachname
	from verleih
    join auto on (verleih.autoId = auto.autoId)
    join mieter on (verleih.mieterId = mieter.mieterId);
    
-- Welches Auto wurde am meisten verliehen 
select max(verleihanzahl) from auto;

select verleihanzahl, marke, typ 
	from auto 
    where verleihanzahl = ( 
		select max(verleihanzahl) from auto
	)
    order by verleihanzahl desc;
    
-- Welche Autos wurden überdurchschnittlich oft verliehen
select verleihanzahl, marke, typ 
	from auto 
    where verleihanzahl > ( 
		select avg(verleihanzahl) from auto where leihdauer > 0 and verleihanzahl > 0 
	)
    order by verleihanzahl desc;
    
select avg(verleihanzahl) from auto where leihdauer > 0 and verleihanzahl > 0;

-- Welches Auto ist das am wenigsten ausgeliehene Autos, 
-- der ausleihbaren Autos und wurde bereits ausgeliehen
select marke, typ, verleihanzahl from auto order by verleihanzahl;

select marke, typ, verleihanzahl from auto 
where  leihdauer > 0 and verleihanzahl = (
	select min(verleihanzahl) from auto where verleihanzahl > 0
);

-- Wenn ein Auto von der Marke BMW gibt, dann sollen alle pkw ausgegeben weren
select * from auto where marke = 'bmw';
select * from auto where kategorie = 'p';
select marke, typ, kategorie from auto 
	where exists(
		select * from auto where marke = 'bmw'
    ) and kategorie = 'p';

-- ENDE TEIL 2 (tag 4) file 004***************************************************************
--  TEIL 3 (tag 4) file 005 Transaktionen***************************************************************

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

-- ENDE TEIL 3 (tag 4) file 005 Transaktionen***************************************************************
-- TEIL 4 (tag 4) file 005 user2-Transaktionen***************************************************************

use wifitag4;

select * from person;
start transaction;
update person set vorname='Anton' where id = 1;
commit;

-- ENDE TEIL 4 (tag 4) file 005 user2-Transaktionen***************************************************************
-- TEIL 5 (tag 4) file 006 Transaktion***************************************************************

use wifitag4;

drop table if exists konten;
create table konten(
	kntId int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (saldo) values (700.00), (500.00);
select * from konten;
 
set @betrag := 500;
set @kto_von := 1;
set @kto_nach := 2;

start transaction;

	select saldo from konten where kntId = @kto_von for update;
   
   -- if genug geld am konto
    
    update konten set saldo = saldo - @betrag where kntId = @kto_von;
    update konten set saldo = saldo + @betrag where kntId = @kto_nach;
    
    commit;
 
	-- else 
    rollback;
    
-- ENDE TEIL 5 (tag 4) file 006 Transaktion***************************************************************
-- ENDE TEIL 6 (tag 4) file 006 user2-Transaktion***************************************************************

use wifitag4;

start transaction;

	update konten set saldo = saldo - 500 where kntId = 2;

commit;

select * from konten where kntId = 1;
    
-- ENDE TEIL 6 (tag 4) file 006 user2-Transaktion***************************************************************
-- TEIL 1 (tag 5) **************************************************************

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

-- ENDE TEIL 1 (tag 5) **************************************************************

-- *************** PROZEDUREN **************************************************
use wifitag4;

delimiter $$

drop procedure if exists helloword $$ 
create procedure helloword()
begin
 select 'Hallo World';
end $$

delimiter ;

call helloword();

-- *************** PROZEDUREN **************************************************
use wifitag4;

drop table if exists anwender;
create table anwender(
	id int unsigned not null auto_increment primary key,
    vorname varchar(30)
)engine=innodb;

insert into anwender (vorname) values ('Peter'),('Maria'),('Sophia'); 

delimiter $$


drop procedure if exists paramdemo1 $$ 
create procedure paramdemo1(in hhhh int unsigned)
begin

 select * from anwender where id = hhhh;
 
end $$

delimiter ;

call paramdemo1(2);


-- *************** PROZEDUREN **************************************************
use wifitag4;

drop table if exists anwender;
create table anwender(
	id int unsigned not null auto_increment primary key,
    vorname varchar(30)
)engine=innodb;

insert into anwender (vorname) values ('Peter'),('Maria'),('Sophia'); 

delimiter $$

drop procedure if exists paramdemo2 $$ 
create procedure paramdemo2( out anw varchar(30) )
begin

 select vorname into anw from anwender where id = 1;
 
end $$

delimiter ;

call paramdemo2(@output);

select @output;

*****************************************************

use wifitag4;

drop table if exists anwender;
create table anwender(
	id int unsigned not null auto_increment primary key,
    vorname varchar(30)
)engine=innodb;

insert into anwender (vorname) values ('Peter'),('Maria'),('Sophia'); 

delimiter $$

drop procedure if exists paramdemo2 $$ 
create procedure paramdemo2( in ds int unsigned, out anw varchar(30) )
begin

 select vorname into anw from anwender where id = ds;
 
end $$

delimiter ;

call paramdemo2(2, @output);

select @output;

*************************************************************
use wifitag4;

drop table if exists anwender;
create table anwender(
	id int unsigned not null auto_increment primary key,
    vorname varchar(30)
)engine=innodb;

insert into anwender (vorname) values ('Peter'),('Maria'),('Sophia'); 

delimiter $$

drop procedure if exists paramdemo3 $$ 
create procedure paramdemo3( inout anw varchar(30) )
begin

 select concat( vorname, ' (',id,')') into anw from anwender where vorname = anw;
 
end $$

delimiter ;

set @anwender := 'Peter';

call paramdemo3(@anwender);

select @anwender;

***********************************************************

use wifitag4;

drop table if exists konten;
create table konten(
	konto int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (konto,saldo) values (1,1000.00),(2,1000.00); 

delimiter $$

drop procedure if exists ueberweisung $$ 
create procedure ueberweisung( in von int unsigned, in nach int unsigned, in betrag decimal(10,2) )
begin
	update konten set saldo = saldo - abs(betrag) where konto = von;
	update konten set saldo = saldo + abs(betrag) where konto = nach;
 
end $$

delimiter ;


call ueberweisung(1,2,500.00);

select * from konten;

*************************************************************

use wifitag4;

drop table if exists konten;
create table konten(
	konto int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (konto,saldo) values (1,1000.00),(2,1000.00); 

delimiter $$

drop procedure if exists ueberweisung $$ 
create procedure ueberweisung( in von int unsigned, in nach int unsigned, in betrag decimal(10,2), out erfolg boolean )
begin
	-- declare Variable innerhalb der prodzedur
	declare ktosaldo decimal(10,2) default 0.00;
    declare vonkto int unsigned default 0;
    declare nachkto int unsigned default 0;
    
    -- mit declare kann man auch einen handler definieren
    declare exit handler for sqlexception, not found
    begin
		show warnings;
        set erfolg := false;
        rollback;
    end;
	
    select konto into vonkto from konten where konto = von;
    select konto into nachkto from konten where konto = nach;
    
    
    start transaction;
		select saldo into ktosaldo from konten where konto = von for update;
		
		-- if bedingung then else end if: abs ist absolut betrag entfernt -
		if ktosaldo >= abs(betrag) then
		
			update konten set saldo = saldo - abs(betrag) where konto = von;
			update konten set saldo = saldo + abs(betrag) where konto = nach;
            set erfolg := true;
			
		else
			set erfolg := false;
		end if;
    commit;
    
 
end $$

delimiter ;

set @output := false;
call ueberweisung(1,2,3000.00, @output);

select @output;

select * from konten;

*************************************************************

use wifitag4;

drop table if exists konten;
create table konten(
	konto int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (konto,saldo) values (1,1000.00),(2,1000.00); 

delimiter $$

drop procedure if exists ueberweisung $$ 
create procedure ueberweisung( in von int unsigned, in nach int unsigned, in betrag decimal(10,2), out erfolg boolean )
begin
	-- declare Variable innerhalb der prodzedur
	declare ktosaldo decimal(10,2) default 0.00;
    declare vonkto int unsigned default 0;
    declare nachkto int unsigned default 0;
    
    -- mit declare kann man auch einen handler definieren
    declare exit handler for sqlexception, not found
    begin
		show warnings;
        set erfolg := false;
        rollback;
    end;
	
    select konto into vonkto from konten where konto = von;
    select konto into nachkto from konten where konto = nach;
    
    
    start transaction;
		select saldo into ktosaldo from konten where konto = von for update;
		
		-- if bedingung then else end if: abs ist absolut betrag entfernt -
		if ktosaldo >= abs(betrag) then
		
			update konten set saldo = saldo - abs(betrag) where konto = von;
			update konten set saldo = saldo + abs(betrag) where konto = nach;
            set erfolg := true;
			
		else
			set erfolg := false;
		end if;
    commit;
    
 
end $$

delimiter ;

set @output := false;
call ueberweisung(1,2,3000.00, @output);

select @output;

select * from konten;

***************************************************************
use wifitag4;

drop table if exists zufallszahl;
create table zufallszahl(
	zahl int unsigned not null
)engine=innodb;


delimiter $$

drop procedure if exists zufall $$ 
create procedure zufall( in anzahl int unsigned )
begin
	
    while anzahl > 0 do
		insert into zufallszahl (zahl) values ( floor( 1+rand()*100) );
		set anzahl := anzahl-1;
    end while;
	
 
end $$

delimiter ;

call zufall(1000);

select count(*) from zufallszahl;

*************************************************************