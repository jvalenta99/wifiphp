use wifitag4;

start transaction;

	update konten set saldo = saldo - 500 where kntId = 2;

commit;

select * from konten where kntId = 1;