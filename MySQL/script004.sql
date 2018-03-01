use wifi;
-- vergleichsoperatoren

select name,gehalt from mitarbeiter where gehalt = 2300;
select name,gehalt from mitarbeiter where gehalt >= 2300;

select name, gehalt from mitarbeiter where gehalt is null;
select name, gehalt from mitarbeiter where name > 'P';
select name, gehalt from mitarbeiter where name LIKE 'p%';
select name, gehalt from mitarbeiter where name LIKE '%p%';
select name, gehalt from mitarbeiter where name LIKE '_e%';

select name, gehalt from mitarbeiter where gehalt between 2300 and 2800;

select name, gehalt from mitarbeiter where gehalt in (2700,3000,1800);

select name, gehalt from mitarbeiter where 
name = 'ulrich' or gehalt >= 2000 and  gehalt <=4000 ;

update mitarbeiter set gehalt = 2700 where id=2;
update mitarbeiter set gehalt = 4500, name = 'pepi23' where id=6;
update mitarbeiter set gehalt = gehalt + 500 where id=6;

select * from mitarbeiter where gehalt>2500 order by gehalt, name desc;
select * from mitarbeiter where gehalt<2500 order by gehalt, name limit 2;
select * from mitarbeiter order by gehalt, name limit 2,3; 



delete from mitarbeiter where id=3;

select * from mitarbeiter;


