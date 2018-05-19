use wifitag4;

drop table if exists konten;
create table konten(
	konto int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (konto,saldo) values (1,1000.00),(2,1000.00); 

delimiter $$

drop procedure if exists ueberweisung $$ 
create procedure ueberweisung( in von int unsigned, in nach int unsigned, in betrag decimal(10,2), out erfolg boolean )
begin
	-- declare Variable innerhalb der prodzedur
	declare ktosaldo decimal(10,2) default 0.00;
    declare vonkto int unsigned default 0;
    declare nachkto int unsigned default 0;
    
    -- mit declare kann man auch einen handler definieren
    declare exit handler for sqlexception, not found
    begin
		show warnings;
        set erfolg := false;
        rollback;
    end;
	
    select konto into vonkto from konten where konto = von;
    select konto into nachkto from konten where konto = nach;
    
    
    start transaction;
		select saldo into ktosaldo from konten where konto = von for update;
		
		-- if bedingung then else end if: abs ist absolut betrag entfernt -
		if ktosaldo >= abs(betrag) then
		
			update konten set saldo = saldo - abs(betrag) where konto = von;
			update konten set saldo = saldo + abs(betrag) where konto = nach;
            set erfolg := true;
			
		else
			set erfolg := false;
		end if;
    commit;
    
 
end $$

delimiter ;

set @output := false;
call ueberweisung(1,2,3000.00, @output);

select @output;

select * from konten;