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