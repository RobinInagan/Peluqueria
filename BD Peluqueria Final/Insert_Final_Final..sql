use peluqueriaf;

insert into cliente values (1000578129,'Danilo','Sainea','ds@gmail.com','2000-10-04'),(1010345231,'Robinson','Inagan','rs@gmail.com','2001-05-09'),
(1001867554,'Sergio','Mejia','sm@gmail.com','2004-01-04'),(1000345237,'Juan','Sosa','js@gmail.com','2000-01-03');
select * from cliente;

insert into telefonos_c values(1000578129,8926743),(1000578129,3112294),(1010345231,3012345),
(1001867554,3204218),(1000345237,3014567),(1000345237,3157651);

insert into horas values (1,'8:00'),(2,'8:30'),(3,'9:00'),(4,'9:30'),(5,'10:00'),(6,'10:30'),(7,'11:00'),(8,'11:30'),(9,'12:00'),
(10,'12:30'),(11,'14:00'),(12,'14:30'),(13,'15:00'),(14,'15:30'),(15,'16:00'),(16,'16:30'),(17,'17:00'),(18,'17:30'),(19,'18:00'),(20,'18:30');

insert into cargo values (1,'barbero'),(2,'manicurista'),(3,'tintes'),(4,'keratinas');

insert into servicio values(1,'corte',12000,1),(2,'Manicure',8000,2),(3,'Pedicure',9000,2),(4,'Tinte',70000,3),
(5,'Keratina',50000,4);

insert into dias values(1,'lunes'),(2,'martes'),(3,'miercoles'),(4,'jueves'),(5,'viernes'),(6,'sabado'),(7,'domingo');

insert into estado_cita values(1,'asignada'),(2,'finalizada');

insert into empleado values (75893234,'Luis','Salas','ls@gmail.com','cra 137 # 17-65',1,1),(86543234,'Dilan','Perez','dp@gmail.com','Calle 68 # 21-44',2,1),(52345895,'Tatiana','Bermudez','tb@gmail.com','cra 114 # 64-14',3,3),
(528755312,'Eliana ','Ramirez','em@gmail.com','av 1 # 22-11',4,2),(45893203,'Andrea','Romero','am@gmail.com','calle 68 #14-11',5,4);

insert into telefonos_e values (75893234,6547328),(75893234,3475328),(86543234,8962744),(52345895,7640821),(528755312,5674310),
(528755312,2348609),(45893203,4562184);
#HASTA AQUI SE INGRESO EN LA BD

alter table citas add constraint unique (cliente_idcliente,fecha_cita,horas_idhoras);
alter table citas add constraint unique (empleado_idempleado,fecha_cita,horas_idhoras);

delimiter //
create procedure incitas (in servicio1 int,in cliente int,in empleado1 int, in hora1 int, in fecha1 date)
begin
	if((select cargo_idcargo from empleado where cedula=empleado1)=(select cargo_idcargo from servicio where idservicio=servicio1))then
		if(SELECT (case dayofweek(fecha1) when 2 then 'Lunes' when 3 then 'Martes' when 4 then 'Miércoles' when 5 then 'Jueves' when 6 then 'Viernes' when 7 then 'Sábado' when 1 then 'Domingo' end)=(select dia from dias inner join empleado on iddias=dias_iddias where cedula=empleado1)) then
			select 'El empleado descansa ese dia' as Alerta;
		else
			insert into citas (Servicio_idServicio,
  Cliente_idCliente,Empleado_idEmpleado,Horas_idHoras, Fecha_cita,Estado_cita_idEstado_cita) values (servicio1,cliente,empleado1,hora1,fecha1,1);
        end if;
	else
		select 'El empleado no puede realizar este servicio' as Alerta; 
    end if;
end
//delimiter ;

call incitas (1,1000578129,52345895,1,'2021-10-11'); # validar empleado
call incitas (1,1000578129,75893234,1,'2021-10-11'); # validar dia 
call incitas (1,1000578129,75893234,1,'2021-10-13');
select * from citas;
call incitas (2,1001867554,528755312,10,'2021-10-13');
call incitas (2,1000578129,528755312,10,'2021-10-13'); # validar unique 

insert into roles values (1,'Administrador'),(2,'Cliente'),(3,'Empleado');
insert into usuario values (1,'admin','admin',1,null,null);
insert into usuario values (2,'Danilo','1234',2,1000578129,null),(3,'Juan','1234',2,1000345237,null),(4,'Luis','1234',3,null,75893234),(5,'Dilan','1234',3,null,86543234);
select * from usuario;

use peluqueriaf;
