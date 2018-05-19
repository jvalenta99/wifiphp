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