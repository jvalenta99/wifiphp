show databases;

create database wifi;
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