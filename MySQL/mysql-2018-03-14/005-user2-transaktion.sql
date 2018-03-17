use wifitag4;

select * from person;
start transaction;
update person set vorname='Anton' where id = 1;
commit;