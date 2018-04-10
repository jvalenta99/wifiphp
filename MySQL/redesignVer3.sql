show databases;
use javawien_batterien_2;
show tables;
select bez.bez_name, prod.prod_name from bezeichnungen as bez
right join produkt as prod on (bez.bez_PK=prod.bez_FK);