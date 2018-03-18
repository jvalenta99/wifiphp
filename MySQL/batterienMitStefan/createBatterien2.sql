use javawien_batterien;

select * From products;


drop table if exists prodToKateg;
drop table if exists bezToBez;

drop table if exists produkt;

drop table if exists kategorie;
drop table if exists bezeichnungen;
drop table if exists form;
drop table if exists material;
drop table if exists hersteller;



create table hersteller ( 
	her_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	her_name varchar(100) not null,
    her_info text    
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;




create table material ( 
	mat_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	mat_name varchar(100) not null,
    mat_info text    
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;


create table form ( 
	form_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	form_name varchar(100) not null,
    form_bild blob
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;



create table bezeichnungen ( 
	bez_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	bez_name varchar(100) not null,
    bez_breite double,
    bez_hoehe double,
    bez_tiefe double,
    bez_spannung double,
    form_FK int,
    bez_memo text, -- intere notiz
    constraint bez_FKx foreign key (form_FK) references form (form_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table kategorie ( 
	kat_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	kat_name varchar(100) not null,
    kat_info text
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;

create table produkt ( 
	prod_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	prod_name varchar(100) not null,
    bez_FK int not null,
    mat_FK int not null,
    her_FK int not null,
    prod_spannung double,
    kat_FK int not null,
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
    on update cascade, -- restrict, cascade, set null, no action
    constraint prod_kat_FKx foreign key (kat_FK) references prodToKateg (ptk_PK)
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


create table prodToKateg ( 
	ptk_PK INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	kat_FK int not null,
    constraint ptk_FKx foreign key (kat_FK) references kategorie (kat_PK)
    on delete restrict -- restrict, cascade, set null, no action
    on update cascade -- restrict, cascade, set null, no action
    
) engine InnoDB character set utf8 collate utf8_unicode_ci;









show tables;

