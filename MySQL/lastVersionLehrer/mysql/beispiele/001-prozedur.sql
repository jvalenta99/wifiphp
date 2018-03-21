use wifitag4;

delimiter $$

drop procedure if exists helloword $$ 
create procedure helloword()
begin
 select 'Hallo World';
end $$

delimiter ;

call helloword();