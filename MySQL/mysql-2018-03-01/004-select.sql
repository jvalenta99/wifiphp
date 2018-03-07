use wifi;

-- Vergleichsoperatoren

select name, gehalt from mitarbeiter where gehalt = 2000;
select name, gehalt from mitarbeiter where gehalt <= 2000;
select name, gehalt from mitarbeiter where gehalt >= 2000;
select name, gehalt from mitarbeiter where gehalt <> 2000;

select name, gehalt from mitarbeiter where gehalt is null;
select name, gehalt from mitarbeiter where gehalt is not null;

select name, gehalt from mitarbeiter where name > 'P';

select name, gehalt from mitarbeiter where name like 'p%';

select name, gehalt from mitarbeiter where name like '%p%';

select name, gehalt from mitarbeiter where name like '_e%';

select name, gehalt from mitarbeiter where gehalt between 2000 and 3000;

select name, gehalt from mitarbeiter where name in ('peter','wolfgang','maria');

select name, gehalt from mitarbeiter where 
name = 'peter' or gehalt >= 2000 and gehalt <=3000;

select name, gehalt from mitarbeiter where 
name = 'peter' or ( gehalt >= 2000 and gehalt <=3000 );

select name, gehalt from mitarbeiter where 
( name = 'peter' or gehalt >= 2000 ) and gehalt <=3000;

update mitarbeiter set gehalt = 4000 where id=2;
delete from mitarbeiter where id=12;
update mitarbeiter set gehalt = 4500, name='Hans' where id=14;
update mitarbeiter set gehalt = gehalt+500 where id = 15;

select * from mitarbeiter order by gehalt;

select * from mitarbeiter where gehalt>2500 order by name desc;
select * from mitarbeiter order by gehalt, name desc;

select * from mitarbeiter order by gehalt, name limit 3;

select * from mitarbeiter order by gehalt, name limit 4,2;




