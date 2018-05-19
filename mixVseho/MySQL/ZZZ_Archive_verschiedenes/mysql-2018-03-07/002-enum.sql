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
