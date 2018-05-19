use wifitag4;

drop table if exists konten;
create table konten(
	konto int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (konto,saldo) values (1,1000.00),(2,1000.00); 

delimiter $$

drop procedure if exists ueberweisung $$ 
create procedure ueberweisung( in von int unsigned, in nach int unsigned, in betrag decimal(10,2) )
begin
	update konten set saldo = saldo - abs(betrag) where konto = von;
	update konten set saldo = saldo + abs(betrag) where konto = nach;
 
end $$

delimiter ;


call ueberweisung(1,2,500.00);

select * from konten;