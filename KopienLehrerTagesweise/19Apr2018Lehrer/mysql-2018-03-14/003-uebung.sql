use carsharing;

select * from auto;
select * from mieter;
select * from verleih;

-- Erstelle eine alphabetische sortierte Liste der Marken und dazugehörigen Typen. ( distinct )
select distinct marke, typ from auto order by marke, typ;
select distinct marke, typ from auto where typ is not null order by marke, typ;

-- Wieviel Marken gibt es
select count( distinct marke ) from auto;

-- Welche ausleihbaren Autos wurden bisher noch nicht ausgeliehen
select autoid, marke, typ 
	from auto 
    where leihdauer > 0 and verleihanzahl = 0 
    order by marke, typ;

-- Welche Marken in der Kategorie p und k können ausgeliehen werden
select distinct marke, typ, kategorie
	from auto
    where ( kategorie = 'p' or  kategorie = 'k' ) and leihdauer > 0;

select distinct marke, typ, kategorie
	from auto
    where kategorie in('p','k') and leihdauer > 0;

-- Welche Marke hat keinen Typ
select autoId, marke, kategorie
	from auto
    where typ is null;
    
-- Ranking von den am häufigsten verliehenen Autos
select marke, sum( verleihanzahl) anzahl
	from auto
    group by marke
    order by anzahl desc;

-- Ranking von den am häufigsten verliehenen Auto Typen
select marke, typ, sum( verleihanzahl) anzahl
	from auto
    group by marke, typ
    order by anzahl desc;
    
-- Welche Auto Typen wurden mehr als 4 mal  ausgeliehen
select marke, typ, sum( verleihanzahl) anzahl
	from auto
    group by marke, typ
    having ( sum( verleihanzahl) > 4 )
    order by anzahl desc;
    

-- Welcher Mieter hat aktuell welches Auto ausgeliehen
select m.vorname, m.nachname , a.marke, a.typ
	from mieter m
    join verleih v on ( m.mieterId = v.mieterId)
    join auto a on ( a.autoId = v.autoId);


-- Wieviel Autos hat ein Mieter gerade ausgeliehen
select  m.vorname, m.nachname, count(m.mieterId) anzahl
	from mieter m
    join verleih v on ( m.mieterId = v.mieterId)
    group by m.mieterId, m.vorname, m.nachname;
    
 select count(*) from verleih;   

update mieter set vorname = 'Lina', nachname='Mayer' where mieterId = 2;
select * from mieter;


-- Wieviel Prozent der Autos sind zur Zeit ausgeliehen
select count(autoId) from verleih;
select count(autoId) from auto where leihdauer > 0;

-- Prozent: anzahl aus Verleih / anzahl der autos * 100
select ( count(v.autoId) / count(a.autoId) * 100 ) as prozent
	from auto a
    left join verleih v on ( a.autoId = v.autoId)
    where a.leihdauer > 0;
    
select format(( count(v.autoId) / count(a.autoId) * 100 ), 2, 'de_DE') as prozent
	from auto a
    left join verleih v on ( a.autoId = v.autoId)
    where a.leihdauer > 0;

select marke, typ, ausleihdatum
	from auto a
    left join verleih v on ( a.autoId = v.autoId)
    where a.leihdauer > 0;
