use wifitag4;

drop table if exists zufallszahl;
create table zufallszahl(
	zahl int unsigned not null
)engine=innodb;


delimiter $$

drop procedure if exists zufall $$ 
create procedure zufall( in anzahl int unsigned )
begin
	
    while anzahl > 0 do
		insert into zufallszahl (zahl) values ( floor( 1+rand()*100) );
		set anzahl := anzahl-1;
    end while;
	
 
end $$

delimiter ;

call zufall(1000);

select count(*) from zufallszahl;

