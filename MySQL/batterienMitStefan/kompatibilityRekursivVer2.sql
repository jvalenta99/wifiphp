use javawien_batterien;
use javawien_batterien_2;

drop table if exists bezToBez;
drop table if exists prodToKateg;
drop table if exists produkt;
drop table if exists kategorie;
drop table if exists bezeichnungen;
drop table if exists form;
drop table if exists material;
drop table if exists hersteller;


create table hersteller ( 
	her_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	her_name varchar(100) not null unique,
    her_info text    
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table material ( 
	mat_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	mat_name varchar(100) not null unique,
    mat_info text    
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table form ( 
	form_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	form_name varchar(100) not null unique,
    form_memo text,
    form_bild blob
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table bezeichnungen ( 
	bez_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	bez_name varchar(100) not null unique,
    bez_breite double, -- mm
    bez_tiefe double, -- mm
    bez_hoehe double, -- mm
    bez_spannung double, -- Volt
    form_FK int,
    bez_memo text, -- intere notiz
    constraint bez_FKx foreign key (form_FK) references form (form_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table kategorie ( 
	kat_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	kat_name varchar(100) not null unique,
    kat_info text
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table produkt ( 
	prod_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	prod_name varchar(100) not null,
    bez_FK int not null,
    mat_FK int not null,
    her_FK int not null,
    prod_kapazitaet double, -- mAh
    prod_info text,
    prod_bild blob,
    constraint prod_bez_FKx foreign key (bez_FK) references bezeichnungen (bez_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade, -- restrict, cascade, set null, no action
    constraint prod_mat_FKx foreign key (mat_FK) references material (mat_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade, -- restrict, cascade, set null, no action
    constraint prod_her_FKx foreign key (her_FK) references hersteller (her_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table prodToKateg ( 
	ptk_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prod_FK int not null,
	kat_FK int not null,
    ptk_memo text,
    constraint prod_FKx foreign key (prod_FK) references produkt (prod_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade, -- restrict, cascade, set null, no action
    constraint kat_FKx foreign key (kat_FK) references kategorie (kat_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table bezToBez ( 
	btb_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bez_from_FK int not null,
	bez_to_FK int not null,
    btb_memo text, -- intere notiz
    constraint bez_from_FKx foreign key (bez_from_FK) references bezeichnungen (bez_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade, -- restrict, cascade, set null, no action
    constraint bez_to_FKx foreign key (bez_to_FK) references bezeichnungen (bez_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;


insert into hersteller (her_name) values ('Duracell');
insert into hersteller (her_name) values ('Renata');
insert into hersteller (her_name) values ('Varta');
insert into hersteller (her_name) values ('Sony');
insert into hersteller (her_name) values ('Camelion');


insert into material (mat_name) values ('Zink-Kohle');
insert into material (mat_name) values ('Alkaline');
insert into material (mat_name) values ('Silberoxid');
insert into material (mat_name) values ('Lithium');
insert into material (mat_name, mat_info) values ('Zink-Luft', 'Zinc-Air');
insert into material (mat_name, mat_info) values ('NiMH', 'Nickel Metallhydrid');


insert into form (form_name, form_memo) values ('AA', 'LR6');
insert into form (form_name, form_memo) values ('AAA', 'LR03');
insert into form (form_name, form_memo) values ('C', 'LR14');
insert into form (form_name, form_memo) values ('D', 'LR20');
insert into form (form_name, form_memo) values ('9V', '6LR22');
insert into form (form_name, form_memo) values ('4.5V', '3LR12');
insert into form (form_name, form_memo) values ('Knopfzelle (groß)', 'CR2032');
insert into form (form_name, form_memo) values ('Knopfzelle (klein)', '377 oder LR44');
insert into form (form_name, form_memo) values ('Hoergeraetebatterie', 'PR10');

insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('301',11.6,11.6,4.2,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('303',11.6,11.6,5.4,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('309',7.9,7.9,5.4,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('315',7.9,7.9,1.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('317',5.8,5.8,1.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('319',5.8,5.8,2.7,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('321',6.8,6.8,1.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('329',7.9,7.9,3.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('335',5.8,5.8,1.2,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('337',4.8,4.8,1.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('339',6.8,6.8,1.4,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('341',7.9,7.9,1.4,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('344',11.6,11.6,3.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('346',7.9,7.9,1.2,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('350',11.6,11.6,3.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('357',11.6,11.6,5.4,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('361',7.9,7.9,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('362',7.9,7.9,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('364',6.8,6.8,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('365',11.6,11.6,1.6,1.5,8,'Renata');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('366',11.6,11.6,1.6,1.5,8,'Renata');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('370',9.5,9.5,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('371',9.5,9.5,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('373',9.5,9.5,1.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('376',6.8,6.8,2.6,1.5,8,'Renata');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('377',6.8,6.8,2.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('379',5.8,5.8,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('380',9.5,9.5,3.6,1.5,8,'Renata');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('381',11.6,11.6,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('384',7.9,7.9,3.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('386',11.6,11.6,4.2,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('389',11.6,11.6,3.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('390',11.6,11.6,3.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('391',11.6,11.6,2.1,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('392',7.9,7.9,3.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('393',7.9,7.9,5.4,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('394',9.5,9.5,3.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('395',9.5,9.5,2.7,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('396',7.9,7.9,2.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('397',7.9,7.9,2.6,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('399',9.5,9.5,2.7,1.5,8,'Renata Varta');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR43SW',11.6,11.6,4.2,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR44SW',11.6,11.6,5.4,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR754SW',7.9,7.9,5.4,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR716SW',7.9,7.9,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR516SW',5.8,5.8,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR527SW',5.8,5.8,2.7,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR616SW',6.8,6.8,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR731SW',7.9,7.9,3.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR512SW',5.8,5.8,1.2,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR416SW',4.8,4.8,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR614SW',6.8,6.8,1.4,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR714SW',7.9,7.9,1.4,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1136SW',11.6,11.6,3.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR712SW',7.9,7.9,1.2,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR44W',11.6,11.6,5.4,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR721W',7.9,7.9,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR721SW',7.9,7.9,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR621SW',6.8,6.8,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1116W',11.6,11.6,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1116SW',11.6,11.6,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR920W',9.5,9.5,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR920SW',9.5,9.5,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR916SW',9.5,9.5,1.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR626W',6.8,6.8,2.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR626SW',6.8,6.8,2.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR521SW',5.8,5.8,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR936W',9.5,9.5,3.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1120W',11.6,11.6,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR41SW',7.9,7.9,3.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR43W',11.6,11.6,4.2,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1130W',11.6,11.6,3.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1130SW',11.6,11.6,3.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR1120SW',11.6,11.6,2.1,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR41W',7.9,7.9,3.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR754W',7.9,7.9,5.4,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR936SW',9.5,9.5,3.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR927SW',9.5,9.5,2.7,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR726W',7.9,7.9,2.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR726SW ',7.9,7.9,2.6,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR927W ',9.5,9.5,2.7,1.5,8,'Industrie Code');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG0',5.8,5.8,2.1,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG1',6.8,6.8,2.1,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG2',7.9,7.9,2.6,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG3',7.9,7.9,3.6,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG4',6.8,6.8,2.6,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG5',7.9,7.9,5.4,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG6',9.5,9.5,2.1,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG7',9.5,9.5,2.7,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG8',11.6,11.6,2.1,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG9',9.5,9.5,3.6,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG10',11.6,11.6,3.1,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG11',7.9,7.9,2.1,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG12',11.6,11.6,4.2,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('AG13',11.6,11.6,5.4,1.5,8,'Camelion Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR63',5.8,5.8,2.1,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR60',6.8,6.8,2.1,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR59',7.9,7.9,2.6,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR41',7.9,7.9,3.6,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR66',6.8,6.8,2.6,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR48',7.9,7.9,5.4,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR69',9.5,9.5,2.1,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR57',9.5,9.5,2.7,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR55',11.6,11.6,2.1,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR45',9.5,9.5,3.6,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR54',11.6,11.6,3.1,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR58',7.9,7.9,2.1,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR43',11.6,11.6,4.2,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('LR44',11.6,11.6,5.4,1.5,8,'Alkaline');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR63',5.8,5.8,2.1,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR60',6.8,6.8,2.1,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR59',7.9,7.9,2.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR41',7.9,7.9,3.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR66',6.8,6.8,2.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR48',7.9,7.9,5.4,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR69',9.5,9.5,2.1,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR57',9.5,9.5,2.7,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR55',11.6,11.6,2.1,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR45',9.5,9.5,3.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR54',11.6,11.6,3.1,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR58',7.9,7.9,2.1,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR43',11.6,11.6,4.2,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR44',11.6,11.6,5.4,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR67',7.9,7.9,1.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR62',5.8,5.8,1.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR64',5.8,5.8,2.7,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR65',6.8,6.8,1.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR42',11.6,11.6,3.6,1.5,8,'Silberoxid');
insert into bezeichnungen (bez_name, bez_breite, bez_tiefe, bez_hoehe, bez_spannung, form_FK, bez_memo) values ('SR68',9.5,9.5,1.6,1.5,8,'Silberoxid');


insert into kategorie (kat_name) values ('Einwegbatterien');
insert into kategorie (kat_name) values ('Wiederaufladbar (Akkus)');
insert into kategorie (kat_name) values ('Knopfzellen');
insert into kategorie (kat_name) values ('Uhren (Silberoxid)');
insert into kategorie (kat_name) values ('Hörgeräte');
insert into kategorie (kat_name) values ('Photo');
insert into kategorie (kat_name) values ('Sicherheit');
insert into kategorie (kat_name) values ('Sondergrößen');


insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 301', 1, 3, 2, 130);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 303', 2, 3, 2, 175);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 309', 3, 3, 2, 80);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 315', 4, 3, 2, 23);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 317', 5, 3, 2, 10.5);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 319', 6, 3, 2, 21);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 321', 7, 3, 2, 14.5);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 329', 8, 3, 2, 37);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 335', 9, 3, 2, 6);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 337', 10, 3, 2, 8);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 339', 11, 3, 2, 11);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 341', 12, 3, 2, 15);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 344', 13, 3, 2, 105);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 346', 14, 3, 2, 9.5);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 350', 15, 3, 2, 105);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 357', 16, 3, 2, 160);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 361', 17, 3, 2, 24);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 362', 18, 3, 2, 23);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 364', 19, 3, 2, 19);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 365', 20, 3, 2, 47);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 366', 21, 3, 2, 47);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 370', 22, 3, 2, 40);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 371', 23, 3, 2, 35);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 373', 24, 3, 2, 29);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 376', 25, 3, 2, 27);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 377', 26, 3, 2, 24);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 379', 27, 3, 2, 16);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 380', 28, 3, 2, 82);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 381', 29, 3, 2, 50);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 384', 30, 3, 2, 45);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 386', 31, 3, 2, 130);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 389', 32, 3, 2, 80);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 390', 33, 3, 2, 60);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 391', 34, 3, 2, 50);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 392', 35, 3, 2, 45);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 393', 36, 3, 2, 80);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 394', 37, 3, 2, 79);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 395', 38, 3, 2, 55);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 396', 39, 3, 2, 32);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 397', 40, 3, 2, 32);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Renata 399', 41, 3, 2, 53);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG0', 82, 2, 5, 9);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG1', 83, 2, 5, 13);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG2', 84, 2, 5, 25);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG3', 85, 2, 5, 28);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG4', 86, 2, 5, 18);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG5', 87, 2, 5, 53);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG6', 88, 2, 5, 30);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG7', 89, 2, 5, 34);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG8', 90, 2, 5, 42);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG9', 91, 2, 5, 50);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG10', 92, 2, 5, 80);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG11', 93, 2, 5, 21);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG12', 94, 2, 5, 108);
insert into produkt (prod_name, bez_FK, mat_FK, her_FK, prod_kapazitaet) values ('Camelion AG13', 95, 2, 5, 138);


insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (1, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (1, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (1, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (2, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (2, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (2, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (3, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (3, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (3, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (4, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (4, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (4, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (5, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (5, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (5, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (6, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (6, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (6, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (7, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (7, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (7, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (8, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (8, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (8, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (9, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (9, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (9, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (10, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (10, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (10, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (11, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (11, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (11, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (12, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (12, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (12, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (13, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (13, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (13, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (14, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (14, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (14, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (15, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (15, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (15, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (16, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (16, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (16, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (17, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (17, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (17, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (18, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (18, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (18, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (19, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (19, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (19, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (20, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (20, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (20, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (21, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (21, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (21, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (22, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (22, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (22, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (23, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (23, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (23, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (24, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (24, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (24, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (25, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (25, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (25, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (26, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (26, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (26, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (27, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (27, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (27, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (28, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (28, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (28, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (29, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (29, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (29, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (30, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (30, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (30, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (31, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (31, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (31, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (32, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (32, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (32, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (33, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (33, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (33, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (34, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (34, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (34, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (35, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (35, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (35, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (36, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (36, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (36, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (37, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (37, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (37, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (38, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (38, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (38, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (39, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (39, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (39, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (40, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (40, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (40, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (41, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (41, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (41, 4, 'Uhr');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (42, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (42, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (43, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (43, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (44, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (44, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (45, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (45, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (46, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (46, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (47, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (47, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (48, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (48, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (49, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (49, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (50, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (50, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (51, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (51, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (52, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (52, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (53, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (53, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (54, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (54, 3, 'Knopfzelle');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (55, 1, 'Einwegbatterie');
insert into prodToKateg (prod_FK, kat_FK, ptk_memo) values (55, 3, 'Knopfzelle');


insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (1, 31, '301=386');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (1, 42, '301=SR43SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (1, 122, '301=SR43');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (2, 16, '303=357');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (2, 43, '303=SR44SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (2, 123, '303=SR44');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (3, 36, '309=393');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (3, 44, '309=SR754SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (3, 115, '309=SR48');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (4, 45, '315=SR716SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (4, 124, '315=SR67');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (5, 46, '317=SR516SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (5, 125, '317=SR62');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (6, 47, '319=SR527SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (6, 126, '319=SR64');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (7, 48, '321=SR616SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (7, 127, '321=SR65');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (8, 49, '329=SR731SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (9, 50, '335=SR512SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (10, 51, '337=SR416SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (11, 52, '339=SR614SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (12, 53, '341=SR714SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (13, 15, '344=350');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (13, 54, '344=SR1136SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (13, 128, '344=SR42');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (14, 55, '346=SR712SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (15, 13, '350=344');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (16, 2, '350=303');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (16, 56, '350=SR44W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (16, 123, '350=SR44');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (17, 18, '361=362');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (17, 57, '361=SR721W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (17, 121, '361=SR58');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (18, 17, '362=361');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (18, 58, '362=SR721SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (18, 121, '362=SR58');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (19, 59, '364=SR621SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (19, 111, '364=SR60');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (20, 21, '365=366');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (20, 60, '365=SR1116W');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (21, 20, '366=365');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (21, 61, '365=SR1116SW');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (22, 23, '370=371');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (22, 62, '370=SR920W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (22, 116, '370=SR69');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (23, 22, '371=370');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (23, 63, '371=SR920SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (23, 116, '371=SR69');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (24, 64, '373=SR916SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (24, 129, '373=SR68');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (25, 26, '376=377');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (25, 65, '376=SR626W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (25, 114, '376=SR66');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (26, 25, '377=376');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (26, 66, '377=SR626SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (26, 114, '377=SR66');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (27, 67, '379=SR521SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (27, 96, '379=SR63');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (28, 37, '380=394');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (28, 68, '380=SR936W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (28, 105, '380=SR45');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (29, 34, '381=391');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (29, 74, '381=SR1120SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (29, 104, '381=SR55');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (30, 35, '384=392');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (30, 70, '384=SR41SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (30, 113, '384=SR41');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (31, 1, '386=301');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (31, 71, '386=SR43W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (31, 122, '386=SR43');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (32, 33, '389=390');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (32, 72, '389=SR1130W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (32, 120, '389=SR54');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (33, 32, '390=389');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (33, 73, '390=SR1130SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (33, 120, '390=SR54');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (34, 29, '391=381');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (34, 69, '391=SR1120W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (34, 104, '391=SR55');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (35, 30, '392=384');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (35, 75, '392=SR41W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (35, 113, '392=SR41');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (36, 2, '393=309');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (36, 76, '393=SR754W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (36, 115, '393=SR48');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (37, 28, '394=380');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (37, 77, '394=SR936SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (37, 119, '394=SR45');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (38, 41, '395=399');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (38, 78, '395=SR927SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (38, 117, '395=SR57');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (39, 40, '396=397');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (39, 79, '396=SR726W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (39, 112, '396=SR59');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (40, 39, '397=396');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (40, 80, '397=SR726SW');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (40, 112, '397=SR59');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (41, 38, '399=395');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (41, 81, '399=SR927W');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (41, 117, '399=SR57');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (82, 96, 'AG0=LR63');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (83, 97, 'AG1=LR60');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (84, 98, 'AG2=LR59');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (85, 99, 'AG3=LR41');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (86, 100, 'AG4=LR66');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (87, 101, 'AG5=LR48');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (88, 102, 'AG6=LR69');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (89, 103, 'AG7=LR57');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (90, 104, 'AG8=LR55');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (91, 105, 'AG9=LR45');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (92, 106, 'AG10=LR54');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (93, 107, 'AG11=LR58');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (94, 108, 'AG12=LR43');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (95, 109, 'AG13=LR44');

insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (96, 110, 'LR63=SR63');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (97, 111, 'LR60=SR60');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (98, 112, 'LR59=SR59');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (99, 113, 'LR41=SR41');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (100, 114, 'LR66=SR66');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (101, 115, 'LR48=SR48');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (102, 116, 'LR69=SR69');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (103, 117, 'LR57=SR57');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (104, 118, 'LR55=SR55');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (105, 119, 'LR45=SR45');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (106, 120, 'LR54=SR54');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (107, 121, 'LR58=SR58');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (108, 122, 'LR43=SR43');
insert into bezToBez (bez_from_FK, bez_to_FK, btb_memo) values (109, 123, 'LR44=SR44');


show tables;

-- Abfragen

-- get all other bez's linked to selected bez
select bez_to_FK from bezToBez where bez_from_FK = '1';
-- get bez_name for the above list of bez's
select bez_name from bezeichnungen where bez_PK in(31, 42, 122, 108, 94);
-- combine the 2 querries above into a single one
select bez_name from bezeichnungen where bez_PK in(select bez_to_FK from bezToBez where bez_from_FK = '1');



-- Jiri's black magic
select bez.bez_PK as fromPK, bez.bez_name as fromName, toFK, bez3.bez_name as toName
from bezeichnungen as bez
left join 
(
select bez_from_FK as fromFK, bez_to_FK as toFK
from bezToBez as bez1
            union
            
select bez_to_FK as fromFK, bez_from_FK as toFK
from bezToBez as bez2
 
                
            union   
            
            select bez1.bez_from_FK, bez2.bez_to_FK
from bezToBez as bez1
join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
where bez2.bez_from_FK is not null
                
    union
            
            select  bez2.bez_to_FK, bez1.bez_from_FK
from bezToBez as bez1
join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
where bez2.bez_from_FK is not null
                
) as resultUnion on (bez_PK=resultUnion.fromFK)
left join bezeichnungen as bez3 on (resultUnion.toFK=bez3.bez_PK)
    having (fromPK != toFK)
    order by fromName,toName;
    
    
-- Jiri's black magic ver 2
select bez.bez_PK as fromPK, bez.bez_name as fromName, toFK, bez3.bez_name as toName
from bezeichnungen as bez
left join 
(
select bez_from_FK as fromFK, bez_to_FK as toFK
from bezToBez as bez1
            union
            
select bez_to_FK as fromFK, bez_from_FK as toFK
from bezToBez as bez2
 
                
            union   
            
            select bez1.bez_from_FK, bez2.bez_to_FK
				from bezToBez as bez1
				join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
				where bez2.bez_from_FK is not null
								
    union
            
            select  bez2.bez_to_FK, bez1.bez_from_FK
				from bezToBez as bez1
				join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
				where bez2.bez_from_FK is not null

	 union   
            
            select bez1.bez_from_FK, bez2.bez_from_FK
				from bezToBez as bez1
				join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_to_FK)
				where bez2.bez_from_FK is not null
                
    union
            
            select  bez2.bez_from_FK, bez1.bez_from_FK
				from bezToBez as bez1
				join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_to_FK)
				where bez2.bez_from_FK is not null
                
) as resultUnion on (bez_PK=resultUnion.fromFK)
left join bezeichnungen as bez3 on (resultUnion.toFK=bez3.bez_PK)
    having (fromPK != toFK)
    order by fromName,toName;