use javawien_batterien_2;

show tables;

SELECT * FROM javawien_batterien_2.bezToBez;


-- links mischen mit rechts zeigend wieder auf kombinationen bei to auf from
select 

	b1.bez_PK,  
    btz1.bez_to_FK, 
    b1.bez_name as beznamefrom,
    btz2.bez_to_FK
        
	from bezeichnungen as b1
	right	join bezToBez as btz1 on (b1.bez_PK=btz1.bez_from_FK)
    left join bezToBez as btz2 on (btz1.bez_to_FK = btz2.bez_from_FK) ;
-- ***************************************************************

select 

	b1.bez_from_FK,
    b1.bez_to_FK
    from bezToBez as b1;
    
    
SELECT
	b1.bez_PK,  
    btz1.bez_to_FK, 
    b1.bez_name as beznamefrom,
    btz2.bez_to_FK    
FROM 
	bezeichnungen as b1
RIGHT JOIN bezToBez as btz1 on (b1.bez_PK=btz1.bez_from_FK)
LEFT JOIN bezToBez as btz2 on (btz1.bez_to_FK = btz2.bez_from_FK);

-- ----------

use javawien_batterien_2;
select bez_from_FK as fromFK, bez_to_FK as toFK
	from bezToBez

union

select bez2.bez_from_FK, bez2.bez_to_FK
	from bezToBez as bez1
	left join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
    where bez2.bez_from_FK is not null;
   
   
   
   
   
   
   
   
-- -- basis filter   
use javawien_batterien_2;
select bez_from_FK as fromFK, bez_to_FK as toFK
	from bezToBez
union

select bez_to_FK as fromFK, bez_from_FK as toFK
	from bezToBez;


select * from bezeichnungen as bez
	left join 
		(
			select bez_from_FK as fromFK, bez_to_FK as toFK
			from bezToBez as bez1
			union

			select bez_to_FK as fromFK, bez_from_FK as toFK
				from bezToBez as bez2
		) as resultUnion on (bez_PK=resultUnion.fromFK)
	left join bezeichnungen as bez3 on (resultUnion.toFK=bez3.bez_PK);

-- kompatibilitätstabelle from to mit reverse kontrolle mit sortierung und toName spalte
select bez.bez_PK as fromPK, bez.bez_name as fromName, toFK, bez3.bez_name as toName
	from bezeichnungen as bez
	left join 
		(
			select bez_from_FK as fromFK, bez_to_FK as toFK
			from bezToBez as bez1
			union

			select bez_to_FK as fromFK, bez_from_FK as toFK
				from bezToBez as bez2
		) as resultUnion on (bez_PK=resultUnion.fromFK)
	left join bezeichnungen as bez3 on (resultUnion.toFK=bez3.bez_PK)
    order by fromName,toName;

select bez.bez_PK as fromPK, bez.bez_name as fromName, toFK, bez3.bez_name as toName
	from bezeichnungen as bez
	left join 
		(
			select bez_from_FK as fromFK, bez_to_FK as toFK
			from bezToBez as bez1
			
            union

			select bez_to_FK as fromFK, bez_from_FK as toFK
				from bezToBez as bez2
                
            union   
            
            select bez1.bez_from_FK, bez2.bez_to_FK
				from bezToBez as bez1
				join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
				where bez2.bez_from_FK is not null
                
			union
            
            select  bez2.bez_to_FK, bez1.bez_from_FK
				from bezToBez as bez1
				join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
				where bez2.bez_from_FK is not null
							
                
		) as resultUnion on (bez_PK=resultUnion.fromFK)
	left join bezeichnungen as bez3 on (resultUnion.toFK=bez3.bez_PK)
    having (fromPK != toFK)
    order by fromName,toName;






-- 2.rekursion select only
select bez2.bez_from_FK, bez2.bez_to_FK
	from bezToBez as bez1
	left join bezToBez as bez2 on (bez1.bez_to_FK = bez2.bez_from_FK)
    where bez2.bez_from_FK is not null;
    
    
