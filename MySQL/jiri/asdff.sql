create database carsharing character set utf8 collate  utf8_unicode_ci;

use carsharing;

show tables;

select distinct marke, typ from auto
where leihdauer > 0 and typ is not null
 order by marke;

