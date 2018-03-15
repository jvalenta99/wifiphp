use wifitag2;

-- ist eine gspeicherte rutine die automatisch aufgerufen wird 

-- insert, update oder delete
-- vor schreiben der Daten oder nach dem speichern

select * from verleih;
 
select * from auto; -- 4
select * from mieter; -- 6

delete from verleih where mieterid = 5 and autoid = 2;


update auto set verleihanzahl = verleihanzahl + 1 where autoid = 2;
update mieter set ausleihanzahl = ausleihanzahl + 1 where mieterId = 2;


delimiter $$
drop trigger if exists verleih_before_insert $$

create trigger verleih_before_insert before insert on verleih for each row
begin
	
    declare leihbar int unsigned default 0;
    declare istinverleihtabelle int unsigned default 0;
    
    select leihdauer into leihbar from auto where autoid = new.autoid;
    select autoId into istinverleihtabelle from verleih where autoid = new.autoid;
    
    -- select leihdauer from auto where autoid = 23;
    -- select autoId from verleih where autoid = 23;
    
	if leihbar > 0 then 
		update auto set verleihanzahl = verleihanzahl + 1 where autoid = new.autoid;
		update mieter set ausleihanzahl = ausleihanzahl + 1 where mieterId = new.mieterId;
	else
		signal sqlstate '45000';
	end if;
    
end $$
delimiter ;



insert into verleih (mieterid, autoid ) values (2, 6);