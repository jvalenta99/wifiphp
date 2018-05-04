use wifitag4;

-- sale_val >= 50.00 dann keine Versandkosten
-- sale_val >= 100 dann 2% dicount

drop table if exists sales;
create table sales(
	id int unsigned not null auto_increment primary key,
    custId int unsigned not null,
    sale_val decimal(10,2) not null default 0.00,
    discount_val decimal(10,2) not null default 0.00,
    free_shipping boolean not null default false
)engine=innodb; 


drop trigger if exists sales_insert_before;
delimiter $$
create trigger sales_insert_before before insert on sales for each row
begin
	if new.sale_val >= 50.00 then
		set new.free_shipping = true;
    end if;
    if new.sale_val >= 100.00 then
		set new.discount_val = new.sale_val*0.02;
    end if;
end $$
delimiter ;

drop trigger if exists sales_update_before;
delimiter $$
create trigger sales_update_before before update on sales for each row
begin
	if new.sale_val >= 50.00 then
		set new.free_shipping = true;
	else
		set new.free_shipping = false;
    end if;
    if new.sale_val >= 100.00 then
		set new.discount_val = new.sale_val*0.02;
	else
		set new.discount_val = 0.00;
    end if;
end $$
delimiter ;

insert into sales (custId, sale_val) values (1,100),(2,90.50),(1,120.10),(3,20.75),(1,10.25),(1,23.45);

update sales set sale_val = 23.54 where id = 1;

select * from sales;