use wifitag4;

drop table if exists konten;
create table konten(
	kntId int unsigned not null auto_increment primary key,
    saldo decimal(10,2) not null default 0.00
)engine=innodb;

insert into konten (saldo) values (700.00), (500.00);
select * from konten;
 
set @betrag := 500;
set @kto_von := 1;
set @kto_nach := 2;

start transaction;

	select saldo from konten where kntId = @kto_von for update;
   
   -- if genug geld am konto
    
    update konten set saldo = saldo - @betrag where kntId = @kto_von;
    update konten set saldo = saldo + @betrag where kntId = @kto_nach;
    
    commit;
 
	-- else 
    rollback;
    
 