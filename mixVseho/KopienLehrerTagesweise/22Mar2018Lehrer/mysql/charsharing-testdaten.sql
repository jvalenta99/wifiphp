-- insert data

use carsharing;


-- Test-Autobestand
insert into auto (marke, typ, kategorie)
values
  ('Audi', 'A4', 'p'),
  ('BMW', '2er', 'p'),
  ('Audi', 'A4', 'p'),
  ('VW', 'Golf', 'p'),
  ('VW', 'Golf', 'p'),
  ('BMW', '3er', 'p'),
  ('VW', 'Polo', 'p'),
  ('VW', 'Polo', 'p'),
  ('Ford', 'Focus Kombi', 'k'),
  ('Renault', 'Kangoo', 't'),
  ('VW', 'Crafter', 't'),
  ('Ford', 'Focus Kombi', 'k');
insert into auto (marke, kategorie)
values
  ('Mercedes', 't'),
  ('Ford', 'p');  
  
insert into auto (marke, typ, kategorie, leihdauer)
values
  ('Ford', 'Transit', 't', 0),
  ('Opel', 'Astra', 'p', 0);      
  
-- Test-Mieterbestand
insert into mieter (nachname, vorname, adresse, eintrittdatum)
values
  ('Winkler', 'Peter', 'Wien', '2005-07-01'),
  ('Müller', 'Maria', 'St. Pölten', '1999-08-01'),
  ('Mayer', 'Marta', 'Wien', '2008-10-21'),
  ('Gruber', 'Hans', 'Eisenstadt', '2011-11-01'),
  ('Wagner', 'Thomas', 'Rheine', '2011-11-02');
  


set @aid := 1;
set @miId :=1;
insert into verleih (autoId, mieterId) values (@aid,@miId);
update mieter set ausleihanzahl = ausleihanzahl + 1 where mieterId = @miId;
update auto set verleihanzahl = verleihanzahl +1 where autoId = @aid;

set @aid := 2;
set @miId :=2;
insert into verleih (autoId, mieterId) values (@aid,@miId);
update mieter set ausleihanzahl = ausleihanzahl + 1 where mieterId = @miId;
update auto set verleihanzahl = verleihanzahl +1 where autoId = @aid;

set @aid := 4;
set @miId :=4;
insert into verleih (autoId, mieterId, ausleihdatum) values (@aid,@miId, SUBDATE(now(), INTERVAL 10 DAY));
update mieter set ausleihanzahl = ausleihanzahl + 1 where mieterId = @miId;
update auto set verleihanzahl = verleihanzahl +1 where autoId = @aid;

set @aid := 7;
set @miId :=3;
insert into verleih (autoId, mieterId, ausleihdatum) values (@aid,@miId, SUBDATE(now(), INTERVAL 5 DAY));
update mieter set ausleihanzahl = ausleihanzahl + 1 where mieterId = @miId;
update auto set verleihanzahl = verleihanzahl +1 where autoId = @aid;

update mieter set ausleihanzahl=12 where mieterId = 1;
update mieter set ausleihanzahl=10 where mieterId = 2;
update mieter set ausleihanzahl=6 where mieterId = 4;
update mieter set ausleihanzahl=2 where mieterId = 5;

update auto set verleihanzahl = 4 where autoId = 1;
update auto set verleihanzahl = 8 where autoId = 2;
update auto set verleihanzahl = 8 where autoId = 5;
update auto set verleihanzahl = 2 where autoId = 6;
update auto set verleihanzahl = 2 where autoId = 7;
update auto set verleihanzahl = 6 where autoId = 7;
update auto set verleihanzahl = 1 where autoId = 10;

select * from mieter;
select * from auto;
select * from verleih;