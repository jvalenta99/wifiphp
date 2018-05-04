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