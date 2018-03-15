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

