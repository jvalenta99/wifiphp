use carsharing;

select * from verleih;

-- Bei wieviel Autos ist die Leihfrist überschritten (datediff)
select count(*) from verleih where datediff(now(),ausleihdatum) > leihdauer;

-- Bei welchen Autos ist die Leihfrist um wieviel Tage überschritten
select (datediff(now(),ausleihdatum) - verleih.leihdauer) as tage, marke, typ, vorname, nachname
	from verleih
    join auto on (verleih.autoId = auto.autoId)
    join mieter on (verleih.mieterId = mieter.mieterId);
    
-- Welches Auto wurde am meisten verliehen 
select max(verleihanzahl) from auto;

select verleihanzahl, marke, typ 
	from auto 
    where verleihanzahl = ( 
		select max(verleihanzahl) from auto
	)
    order by verleihanzahl desc;
    
-- Welche Autos wurden überdurchschnittlich oft verliehen
select verleihanzahl, marke, typ 
	from auto 
    where verleihanzahl > ( 
		select avg(verleihanzahl) from auto where leihdauer > 0 and verleihanzahl > 0 
	)
    order by verleihanzahl desc;
    
select avg(verleihanzahl) from auto where leihdauer > 0 and verleihanzahl > 0;

-- Welches Auto ist das am wenigsten ausgeliehene Autos, 
-- der ausleihbaren Autos und wurde bereits ausgeliehen
select marke, typ, verleihanzahl from auto order by verleihanzahl;

select marke, typ, verleihanzahl from auto 
where  leihdauer > 0 and verleihanzahl = (
	select min(verleihanzahl) from auto where verleihanzahl > 0
);

-- Wenn ein Auto von der Marke BMW gibt, dann sollen alle pkw ausgegeben weren
select * from auto where marke = 'bmw';
select * from auto where kategorie = 'p';
select marke, typ, kategorie from auto 
	where exists(
		select * from auto where marke = 'bmw'
    ) and kategorie = 'p';

