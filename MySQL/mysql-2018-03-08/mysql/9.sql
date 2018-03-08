create database wifitag3 charset utf8 collate utf8_unicode_ci;
use wifitag3;

drop table if exists Ort;
drop table if exists Kunden;
create table Ort ( ortId INT unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
						         ortName varchar(100) not null) engine InnoDB character set utf8 collate utf8_unicode_ci;
                                
                                
	   insert into Ort (ortName) values
                        
	                     ('Wien'),('St.Pölten');
                         
                         select *from Ort;
create table Kunden
     (kundId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
						kundName varchar(100) not null ,
                        ortId int unsigned,
                        constraint orfkx foreign key (ortId) references Ort (ortId)
                        on delete cascade on update cascade) engine InnoDB character set utf8 collate utf8_unicode_ci;
                        
                        
	   insert into Kunden (kundName, ortId) values ('Peter',1);
       insert into Kunden (kundName, ortId) values ('Martin',2);
       insert into Kunden (kundName, ortId) values ('Anton', 1);
       
       
       insert into Kunden (kundName, ortId) values ('Maria', null );
       insert into Kunden (kundName, ortId) values ('Martin', null );
       insert into Kunden (kundName, ortId) values ('Marta',  20);
       
       select * from Kunden;
       
       
       show table status;
       
       select kundName, ortName
       from Kunden 
       join Ort on (Kunden.ortId = Ort.ortId);
       
       
       update Ort set ortId = 1 where ortId = 10;
       select * from Kunden;
       