use wifitag2;

show tables;

desc zufallszahlen;

select count(*) from zufallszahlen where zahl = 1000;

drop index rndvalue on zufallszahlen;

create index zahlidx on zufallszahlen (zahl);
