create database wifitag3 character set utf8 collate utf8_unicode_ci;

use wifitag3;

drop table if exists kunde;
drop table if exists ort;


create table ort (
	id int unsigned not null auto_increment primary key,
    ort varchar(100) not null
) engine InnoDB;



create table kunde (
	kundid int unsigned not null auto_increment primary key,
    vn varchar(100) not null,
    ortid int unsigned,
    constraint ortFkx foreign key (ortid) references ort (id)
    on delete no action
    on update no action
)engine InnoDB;



insert into ort (ort) values( 'wien' ) , ('St.Pölten');



insert into kunde ( vn , ortid ) values 
	('peter',1),
    ('maria',2),
    ('anton',1);
    
insert into kunde ( vn , ortid ) values 
	('sophia',null);
insert into kunde ( vn , ortid ) values 
	('pepi',null);
    
-- truncate kunde
-- truncate ort    
select * from kunde;

select vn, ortid, id, ort from kunde k
left join ort o 
on (o.id=k.ortid);

delete from ort where id=1;
update ort set id =10 where id=1;

   
    