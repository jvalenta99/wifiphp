SELECT * FROM javawien_batterien.products;

use javawien_batterien;
show tables;

alter table products add 
	constraint prodfFkx foreign key (manufacturer_FK) references manufacturer (man_PK);
    
alter table alternative_categories add 
	constraint acatTomCatFkx foreign key (mcat_FK) references main_category (mcat_PK);
    
alter table main_category add 
	constraint mcatToMatFkx foreign key (mcat_material_FK) references material (material_PK);
    
    show table status;
desc manufacturer;

desc products;
desc main_category;

