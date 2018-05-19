use wifi;

create table teilnehmer (
	id int unsigned not null auto_increment primary key,
	vn varchar(80) not null
);
-- tabelle teilnehmer soll verändert werden
alter table teilnehmer change vn vn varchar(80) not null;

insert into teilnehmer (id,vn) values (id,'Peter');
insert into teilnehmer (vn) values ('Maria');
insert into teilnehmer (vn) values ('Anton');
insert into teilnehmer (vn) values ('');
insert into teilnehmer  values();

-- daten aus der tabelle telnehmer lesen
select * from teilnehmer;

-- löschen der datensätze
delete from teilnehmer; 
drop table if exists teilnehmer;

delete from teilnehmer where id=5;

